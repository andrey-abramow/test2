<?php
require_once "Database.php"; 
abstract class DatabaseTable {
	
	// The table name.
    protected $_name = null;
	 
	protected  static $_database = null;
	// The table columns as key=>value
	protected $_attributes = array();
	
	function __construct($params=null) {
		if(!$this->_name) $this->_name = get_class($this);
		self::$_database =  Database::getInstance();
		if($params){
			foreach ($params as $key => $value) {
				if($key[0] != '_') // keys starting by underscore (_) are ignored
				$this->$key = $value;
			}
	    }
	}
	function __get($args) {
		return $this->_attributes[$args];
	}
	function __set($name, $value) {
		$this->_attributes[$name] = $value;
	}
    public static  function  findAll($options=null){
        $called_class = ($options['called_class']) ?
            $options['called_class'] : self ::get_called_class();
        $class = new $called_class();
        $columns = ($options['columns']) ? implode($options['columns'], ', ') : "*";
        $sql = "SELECT $columns FROM $class->_name";
        if ($options['where']) $sql .= " WHERE " . $options['where'];
        if ($options['order']) $sql .= " ORDER BY " . $options['order'];
        if ($options['limit']) $sql .= " LIMIT " . $options['limit'];
        if ($options['offset']) $sql .= " OFFSET " . $options['offset'];
        $result =   self::$_database->query($sql);
        $tab = null;
        while ($row = self::$_database->nextRow($result)) {
            $new_class = new $class($row);
            $tab[] = $new_class;
        }
        return $tab;

    }

	public static function find($id, $options=null) {
		$called_class = ($options['called_class']) ?
			$options['called_class'] : self ::get_called_class();
		$class = new $called_class();
		$columns = ($options['columns']) ? implode($options['columns'], ', ') : "*";
        $id = intval(self::$_database->realEscapeString($id));
        $sql = "SELECT $columns FROM $class->_name WHERE id = $id";
        $result =  self::$_database->query($sql);
        if(self::$_database->numberOfRows($result)>0) {
            $attributes = self::$_database->nextRow($result);
            foreach ($attributes as $key => $value) {
                $class->$key = $value;
            }
            return $class;
        }

		return false;
	}
	
	function save($insertId=false) {
		 if($this->id && !$insertId) // update
			return $this->update_attributes($this->_attributes);
		// insert
		$attributes = self::escape_attributes($this->_attributes);
		$columns = implode(array_keys($attributes), ', ');
		$values = implode($attributes, ', ');
  		$sql = "INSERT INTO $this->_name ($columns) VALUES ($values)";
	    self::$_database->query($sql);
		return self::$_database->insertId;
	}
	function update_attributes($attributes) {
		$attributes = self::escape_attributes($attributes);
		$set="";
		foreach ($attributes as $key => $value) {
			if($key != 'id') {
				$set .= "$key = $value, ";
				 
				$this->$key = substr($value, 1, -1);
			}
		}
		
		$set = substr($set, 0, -2);
 		$sql = "UPDATE $this->_name SET $set WHERE id = $this->id";
 		self::$_database->query($sql);
		
		return $this->id;
	}
	 
	
	function destroy() {
		$sql = "DELETE FROM $this->_name WHERE id = $this->id LIMIT 1";
		
		return self::$_database->query($sql);
	}
	
	// escape attributes to get a valid SQL string 
	// and protect against SQL injections
	static function escape_attributes($attributes) {
		foreach ($attributes as $key => $value) {
			$attributes[$key] = "'" . self::$_database->realEscapeString($value) . "'";
		}
		return $attributes;
	} 
	static function get_called_class()
	{
	    $bt = debug_backtrace();  
	    if (isset($bt[1]['file']) && isset($bt[1]['line']) && isset($bt[1]['function']))
	    {
	        $lines = file($bt[1]['file']);
	        $pattern = '/([a-zA-Z0-9\_]+)::'.$bt[1]['function'].'/';
	        preg_match($pattern, $lines[$bt[1]['line']-1], $matches);
			if (count($matches)>0)
	          return $matches[1];
	    }
	    return false;
	}
	 
	 
	
	 
}
?>
 <?php
 class Database{
	
	private static $_instance;
	private $_host         = DB_HOSTNAME;
	private $_userName     = DB_USERNAME;
	private $_password     = DB_PASSWORD;
	private $_databaseName = DB_DATABASE;
	private $_connectoin;
	
	private function __construct(){
		$this->_connectoin = mysql_connect($this->_host, $this->_userName,$this->_password) or die (mysql_error());
		$_dataBase = mysql_select_db($this->_databaseName);
	
	}
	
	public static function getInstance(){
		if(!self::$_instance){
			self::$_instance = new self();			
		}
		return self::$_instance;
	}
	
	public function query($query){
		$responce = mysql_query($query) or die(mysql_error());
		return $responce;
	}
	
	public function numberOfRows($responce){
		$rows = mysql_num_rows($responce);
		return $rows;
	}
	
	public function nextRow($responce){
	    $row = mysql_fetch_assoc($responce);
		return $row;
	}
	
	public function close(){
		mysql_close($this->_connectoin);
	}
	
	private function __clone(){
		//do nothing
	}
	
	public function realEscapeString($id){
		return mysql_real_escape_string($id);
	
	}
	
	public function insertId(){
		return mysql_insert_id();
	}
 }
 ?>
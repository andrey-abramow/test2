<?php

include_once 'lib/Parser.php';

class  IniParser extends  Parser{


    public function parseContent()
    {
        $result =null;
        $className = $this->getClassName();

        $temp =  new Zend_Config_Ini($this->_filename);
        foreach($temp->$className as $rows=>$values){
            echo var_dump($rows);
            $values->id = $rows;
            echo var_dump($values->id);
            $result[] = $values;

        }

        return $result;



    }
    private function  getClassName(){
        return substr($this->_filename, 7, strpos($this->_filename, '.ini')-7);
    }
}
<?php

include_once 'lib/Parser.php';
include_once 'Ini.php';

class  IniParser extends  Parser{


    public function parseContent()
    {
        $result =null;
        $className = $this->getClassName();

        $temp =  new Zend_Config_Ini($this->_filename);
        foreach($temp->$className as $rows=>$values){
             $values->id = $rows;
             $result[] = $values;
        }

        return $result;
    }
    private function  getClassName(){
        return substr($this->_filename, 7, strpos($this->_filename, '.ini')-7);
    }
}
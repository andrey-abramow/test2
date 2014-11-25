<?php

include_once 'ParserFactory.php';

class  IniParser extends  Parser{

    protected  $_filename;

    public function parseContent()
    {
        $result =null;
        $className = $this->getClassName();

        $temp =  new Zend_Config_Ini($this->_filename);
        foreach($temp->$className as $rows){



            $result[] = $rows;

        }

        return $result;



    }
    private function  getClassName(){
        return substr($this->_filename, 7, strpos($this->_filename, '.ini')-7);
    }
}
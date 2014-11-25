<?php
include_once 'lib/JsonParser.php';
include_once 'lib/IniParser.php';


 class ParserFactory{

    public static  function create($filename){
        if(strpos($filename, '.json')){
             return new JsonParser($filename);
        }elseif(strpos($filename, '.ini')){
            return new IniParser($filename);
        }

    }



 }
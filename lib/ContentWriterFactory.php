<?php
include_once 'PostWriter.php';
abstract class ContentWriterFactory{

    public static function getContentWriter($filename){
        if(strpos($filename, 'user')){
            return new UserWriter($filename);
        }elseif(strpos($filename, 'post')) {
            return new PostWriter($filename);
        }
    }
}
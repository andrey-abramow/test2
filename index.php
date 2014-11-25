<?php
include_once 'lib/ParserFactory.php';

include_once 'Libraries.php';
try {

    for ($i = 1; $i < $argc; $i++) {
        $filename = $argv[$i];
        $content = ParserFactory::create($filename)->parseContent();
        ContentWriterFactory::getContentWriter($filename)->writeContentToDatabase($content);
    }






 }catch(Exception $e){echo $e->getMessage();}

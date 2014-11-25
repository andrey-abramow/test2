<?php

include_once 'Libraries.php';

    for ($i = 1; $i < $argc; $i++) {
        $filename = $argv[$i];
        $content = ParserFactory::create($filename)->parseContent();
        ContentWriterFactory::getContentWriter($filename)->writeContentToDatabase($content);
    }







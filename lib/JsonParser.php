<?php
include_once 'ParserFactory.php';

class  JsonParser extends  Parser{

    protected  $_content;

    public function parseContent()
    {
         return json_decode($this->_content);

    }
}
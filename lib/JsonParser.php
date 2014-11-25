<?php
include_once 'lib/Parser.php';

class  JsonParser extends  Parser{


    public function parseContent()
    {

         return json_decode($this->_content);

    }
}
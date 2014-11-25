<?php

abstract class ContentWriter{

    public function __construct(){

    }
    public function writeContentToDatabase($content)
    {
        foreach($content as $row) {

            $tableInfo = $this->getTableInfoById($row->id);
            $this->writeRow($tableInfo,$row);


        }

    }
    abstract protected   function getTableInfoById($id);
    abstract protected   function writeRow($tableInfo,$row);




}
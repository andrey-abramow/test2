<?php

abstract class ContentWriter{

    public function __construct(){

    }
    public abstract  function writeContentToDatabase($content);



}
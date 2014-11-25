<?php
include_once 'ContentWriter.php';
class PostWriter extends  ContentWriter{


    protected  function getTableInfoById($id){

        $postInfo['post'] = Post::find($id);
        if (!$postInfo['post']) {
            $post = new Post();
            $postInfo['post']     = $post;
            $postInfo['isNewRow'] = true;

        }
        return $postInfo;

    }
    protected  function writeRow($postInfo,$row){

        if($row->id!="") $postInfo['post']->id       = $row->id;
                         $postInfo['post']->name     = $row->name;
                         $postInfo['post']->text     = $row->text;


        $postInfo['post']->save($postInfo['isNewRow']);

    }
}
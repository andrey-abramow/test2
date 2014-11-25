<?php
include_once 'ContentWriter.php';
class PostWriter extends  ContentWriter{

    public function writeContentToDatabase($content)
    {
        foreach($content as $row) {

            $postInfo = $this->getPostInfoById($row->id);
            $this->writeRow($postInfo,$row);


        }
    }
    private function getPostInfoById($id){

        $postInfo['post'] = Post::find($id);
        if (!$postInfo['post']) {
            $post = new Post();
            $postInfo['post']     = $post;
            $postInfo['isNewRow'] = true;

        }
        return $postInfo;

    }
    private function writeRow($postInfo,$row){

        if($row->id!="") $postInfo['post']->id       = $row->id;
                         $postInfo['post']->name     = $row->name;
                         $postInfo['post']->text     = $row->text;


        $postInfo['post']->save($postInfo['isNewRow']);

    }
}
<?php
include_once 'ContentWriter.php';

 class UserWriter extends ContentWriter{

     protected  function getTableInfoById($id){

         $userInfo['user'] = User::find($id);
         if (!$userInfo['user']) {
             $user = new User();
             $userInfo['user']     = $user;
             $userInfo['isNewRow'] = true;

         }
         return $userInfo;

     }
     protected  function writeRow($userInfo,$row){
          if($row->id!="")    $userInfo['user']->id       = $row->id;
                              $userInfo['user']->name     = $row->name;
                              $userInfo['user']->lastName = $row->lastName;
          if($row->age != '') $userInfo['user']->age      = $row->age;

          $userInfo['user']->save($userInfo['isNewRow']);
     }
}

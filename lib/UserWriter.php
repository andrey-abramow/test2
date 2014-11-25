<?php
 class UserWriter extends ContentWriter{

    public function writeContentToDatabase($content)
    {
         foreach($content as $row) {

             $userInfo = $this->getUserInfoById($row->id);
             $this->writeRow($userInfo,$row);


        }
    }
     private function getUserInfoById($id){

         $userInfo['user'] = User::find($id);
         if (!$userInfo['user']) {
             $user = new User();
             $userInfo['user']     = $user;
             $userInfo['isNewRow'] = true;

         }
         return $userInfo;

     }
     private function writeRow($userInfo,$row){

         if($row->id!="")    $userInfo['user']->id       = $row->id;
                             $userInfo['user']->name     = $row->name;
                             $userInfo['user']->lastName = $row->lastName;
         if($row->age != "") $userInfo['user']->age      = $row->age;


         $userInfo['user']->save($userInfo['isNewRow']);

     }
}

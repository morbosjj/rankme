<?php

include_once('../include/database.php');
include_once('../include/user.php');
require_once 'config.php';


$id_token = $_POST['id_token'];


$payload = $google_client->verifyIdToken($id_token);

if($payload) {
  $userid = $payload['sub'];
  $firstname = $payload['given_name'];
  $email = $payload['email'];
  $id_sub = $payload['sub'];

  if(isset($id_token)){
    $user = new User();
    $result = $user->setIdSub($id_sub)->idSubExist();
    $data = json_decode($result);
  }

    if($data->status === "success"){
      $authUser = new User();
      $results = $authUser->setIdSub($id_sub)
            ->setFirstname($firstname)
            ->setEmail($email)
            ->create();
      $newUsers = json_decode($results);
      header('location: https://rank-me.000webhostapp.com/index.php');
    }else{
      die('You currently registered your google account.');
    }
  

}else{
  echo 'Invalid ID token';
}
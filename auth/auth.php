<?php

include_once('../include/database.php');
include_once('../include/user.php');
require_once 'config.php';


$id_token = $_GET['id_token'];


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
    
    header('location: https://rank-me.000webhostapp.com/user/register-auth.php?id_sub='. $id_sub .'&firstname='. $firstname . "&email=". $email);
  }else{
    header('location: https://rank-me.000webhostapp.com/index.php');
  }
  

}else{
  echo 'Invalid ID token';
}
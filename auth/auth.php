<?php

include_once('./include/database.php');
include_once('./include/user.php');

$id_token = $_POST['id_token'];
$email = $_POST['email'];
$firstname = $_POST['firstname'];

if(isset($id_token)){
  $id = new User();
  $result = $id->setIdToken($id_token)->idTokenExist();
  $data = json_decode($result);

  if($data->status === "success"){
      $authUser = new User();
      $results = $authUser->setIdToken($id_token)
            ->setFirstname($firstname)
            ->setEmail($email)
            ->create();
      $newUsers = json_encode($results);
    //   header('location: index.php ');
    die('success');
  }else{
   die('You currently registered your google account.');
  }

}else {
  die('Error');
}
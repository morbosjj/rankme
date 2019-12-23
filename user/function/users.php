<?php

include_once '../../include/database.php';
include_once '../../include/user.php';

$action = $_POST['action'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

if($action === 'register-auth'){
	$id_sub = $_POST['id_sub'];
	$user = new User();
	$result = $user->setFirstname($firstname)
		->setLastname($lastname)
		->setEmail($email)
		->setpassword($password)
		->setIdSub($id_sub)
		->create();
	header('location: https://rank-me.000webhostapp.com');
	exit();
}else if($action === 'register-user'){
	$user_id_sub = rand();

	if(isset($email)){
		$check_email = new User();
		$result = $check_email->setEmail($email)->emailExist();
		$data = json_decode($result);
	}

	if($data->status === "success"){
		$user = new User();
		$result = $user->setFirstname($firstname)
		->setLastname($lastname)
		->setEmail($email)
		->setpassword($password)
		->setIdSub($user_id_sub)
		->create();

		header('location: https://rank-me.000webhostapp.com/user/login.php');
		exit();
	}else{
		header('location: https://rank-me.000webhostapp.com/user/register-user.php');
	}
}
<?php

include_once '../../include/database.php';
include_once '../../include/user.php';
include_once 'notification.php';

$action = $_POST['action'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];


if($action === 'register-auth'){
	$id_sub = $_POST['id_sub'];

	if($password != $cpassword){
		$_SESSION['error'] = "Password did not match";
		header('location: ../register-auth.php');
		
	}else if(strlen($password) < 6){
		$_SESSION['error'] = "Password is at least 6 characters";
		header('location: ../register-user.php');

	}else{
		$user = new User();
		$result = $user->setFirstname($firstname)
			->setLastname($lastname)
			->setEmail($email)
			->setpassword($password)
			->setIdSub($id_sub)
			->create();

		$_SESSION['success'] = "Successfully create an a account";
		header('location: https://rank-me.000webhostapp.com');
	}

}else if($action === 'register-user'){
	$user_id_sub = rand();

	if($password != $cpassword){
		$_SESSION['error'] = "Password did not match";
		header('location: ../register-user.php');
	}else if(strlen($password) < 6){
			$_SESSION['error'] = "Password is at least 6 characters";
			header('location: ../register-user.php');

	}else{
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

				$_SESSION['success'] = "Successfully create an a account";
				header('location: https://rank-me.000webhostapp.com/user/login.php');
			}else{
				$_SESSION['error'] = "Email is already registered";
				header('location: ../register-user.php');
			}
	}
}else if($action === 'login'){
	$user_login = new User();
	$result = $user_login->setEmail($email)
		->setPassword($password)
		->login();

		$data = json_decode($result);

		if($data->status === "success"){
			echo "<script type='text/javascript'>alert('Successful login.');</script>";
			header('location: ../../index.php');
		}else{
			echo "<script type='text/javascript'>alert('Incorrect email/password.');</script>";
			header('location: login.php');
		}

}else{
	unset($_SESSION['user']);
	header('location: https://rank-me.000webhostapp.com/index.php');
}
<?php
	include_once '../../include/database.php';
	include_once '../../include/user.php';
	include_once 'notification.php';
	require '../../vendor/autoload.php';
	require '../../auth/credential.php';

	$action = isset($_POST['action']) ? $_POST['action'] : "";
	$email = isset($_POST['email']) ? $_POST['email'] : "";
	$password = isset($_POST['password']) ? $_POST['password'] : "";
	$activate_code = bin2hex(random_bytes(4));

	if($action === 'register-auth'){
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$cpassword = $_POST['cpassword'];
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
					->setCode($activate_code)
					->create();

				$_SESSION['success'] = "Successfully create an a account";
				$_SESSION['user_id'] = $id_sub;
				$user->sendEmail($id_sub, $email, $activate_code);
				header('location: ../activation.php');
			}

		}else if($action === 'register-user'){
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$cpassword = $_POST['cpassword'];
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
						->setCode($activate_code)
						->create();
						
						$_SESSION['success'] = "Successfully create an account";
						$_SESSION['user_id'] = $user_id_sub;
						$user->sendEmail($user_id_sub, $email, $activate_code);
						header('location: ../activation.php');
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
					header('location: ../../index.php');
				}else{
					$_SESSION['error'] = "Email/Password is incorrect or account is disable";
					header('location: ../login.php');
				}

		}else if(isset($_GET['code']) || isset($_POST['activate'])){
			$tk = isset($_POST['activate']) ? $_POST['activation_code'] : $_GET['code'];
			$id = isset($_POST['activate']) ? $_POST['user_id'] : $_GET['user_id'];

			$inactive_user = new User();
			$result = $inactive_user->setIdSub($id)
						->setCode($tk)
						->activateAccount();

			$status = json_decode($result);
			
			if($status->status === "success"){
				$_SESSION['success'] = "Verified account.";
				header('location: https://rank-me.000webhostapp.com/index.php');

			}else{
				$_SESSION['error'] = 'Incorrect Activation Code';
				header('location: https://rank-me.000webhostapp.com/user/activation.php?code='. urlencode($tk) .'&user_id=' . urlencode($id));
			}

	}else{
		unset($_SESSION['user']);
		header('location: ../../index.php');
	}
	
?>
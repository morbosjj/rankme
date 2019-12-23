<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register - Rankme</title>
	<?php include_once 'layout/links.php' ?>	
</head>
<body class="hold-transition login-page">
	<div class="login-box">

		<div class="login-logo">
			<a href="#"><b>Bipol</b> Tech</a>
		</div>
	<!-- /.login-logo -->
	<div class="card">

	<div class="card-body login-card-body">
  		<p class="login-box-msg">Sign up and start your session</p>

  			<form action="function/users.php" method="POST">
  				<input type="hidden" value="<?php echo $_GET['id_sub']; ?>" name="id_sub">
  				<input type="hidden" value="register-auth" name="action">
  				<?php
  					if(isset($_GET['firstname'])){
  				?>
				    <div class="input-group mb-3">
				      <input type="text" name="firstname" class="form-control" placeholder="Firstname" required="" value="<?php echo $_GET['firstname'] ?>">
				      <div class="input-group-append">
				        <div class="input-group-text">
				          <span class="fas fa-user"></span>
				        </div>
				      </div>
				    </div>
				<?php
				 	}else {
				 		echo '<script src="auth/auth.js"></script>';
				 	}
				?>
			    <div class="input-group mb-3">
			      <input type="text" name="lastname" class="form-control" placeholder="Lastname" required="">
			      <div class="input-group-append">
			        <div class="input-group-text">
			          <span class="fas fa-user"></span>
			        </div>
			      </div>
			    </div>
				
				<?php
					if(isset($_GET['email'])){
				?>
			    <div class="input-group mb-3">
			      <input type="email" name="email" class="form-control" placeholder="Email" required="" value="<?php echo $_GET['email'] ?>">
			      <div class="input-group-append">
			        <div class="input-group-text">
			          <span class="fas fa-user"></span>
			        </div>
			      </div>
			    </div>
				<?php
					}else{
						echo '<script src="auth/auth.js"></script>';
					}
				?>
				<div class="input-group mb-3">
					<input type="password" name="password" class="form-control" placeholder="Password" required="">
				<div class="input-group-append">
					<div class="input-group-text">
					  <span class="fas fa-lock"></span>
					</div>
				</div>
    </div>

    <div class="input-group mb-3">
      	<input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required="">
	      <div class="input-group-append">
		        <div class="input-group-text">
		          <span class="fas fa-lock"></span>
		        </div>
	      </div>
    </div>

    <div class="row">
	      <div class="col-lg-6">
	          <button id="signin" onclick="exitRegister()" type="button" class="btn btn-dark btn-block btn-flat">Sign In</button>
	      </div>

	      <div class="col-lg-6">
	        <button type="submit" name="register" class="btn bg-orange btn-block btn-flat">Sign Up</button>
	      </div>
    </div>
  </form>
</div>
<!-- /.login-card-body -->
</div>
</div>

<script src="../js/config.js"></script>
<script>
	const DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/youtube/v3/rest"];
	function exitRegister(){
		gapi.load('auth2', exitCredentials);
	}

	function exitCredentials() {
		 gapi.auth2.init({
	            discoveryDocs: DISCOVERY_DOCS,
	            clientId: config.clientid,
	     }).then(() => {
	     	gapi.auth2.getAuthInstance().signOut();
			window.location.href = "https://rank-me.000webhostapp.com";
	     });	
	}
</script>
<script src="https://apis.google.com/js/platform.js?onload=init" async defer></script>
</body>
</html>
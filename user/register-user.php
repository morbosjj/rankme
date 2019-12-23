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

  				<input type="hidden" value="register-user" name="action">
				    <div class="input-group mb-3">
				      <input type="text" name="firstname" class="form-control" placeholder="Firstname" required>
				      <div class="input-group-append">
				        <div class="input-group-text">
				          <span class="fas fa-user"></span>
				        </div>
				      </div>
				    </div>

			    <div class="input-group mb-3">
			      <input type="text" name="lastname" class="form-control" placeholder="Lastname" required="">
			      <div class="input-group-append">
			        <div class="input-group-text">
			          <span class="fas fa-user"></span>
			        </div>
			      </div>
			    </div>
				
			    <div class="input-group mb-3">
			      <input type="email" name="email" class="form-control" placeholder="Email" required>
			      <div class="input-group-append">
			        <div class="input-group-text">
			          <span class="fas fa-user"></span>
			        </div>
			      </div>
			    </div>

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
	      	<a href="https://rank-me.000webhostapp.com">
	          <button type="button" class="btn btn-dark btn-block btn-flat">Sign In</button>
	        </a>
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

</body>
</html>
<?php require_once("function/notification.php");?>
<?php

if(isset($_SESSION['user'])){
  header('location: https://rank-me.000webhostapp.com');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="google-signin-client_id" content="328447961111-6ks6c3u6vmo8kvta8pjlbit7f3rpeoup.apps.googleusercontent.com">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include_once 'layout/links.php' ?>
	<title>Login - Register</title>
</head>
<body>
	<div class="content">
			<div class="login-box" style="margin-top: 0;">
				  <div class="login-logo">
				  		<div class="img-logo">
                            <img src="../img/logo.png" alt="rankme">
                        </div>

						<div class="text-logo">
							<a href="https://rank-me.000webhostapp.com">
								<h1>rankme</h1>
							</a>
		            	</div>
				  </div>

				  <div class="card">
					    <div class="card-body login-card-body">
					      	<p class="login-box-msg">Sign in to start your session</p>
									
									<div class="notification-message">
										<?php 
												echo success();
												echo error(); 
										?>
									</div>

							    <div class="g-signin2" id="authorize-button" data-onsuccess="onSignIn"></div>

				                <div class="middle-modal">
				                    <hr>
				                      <span class="">OR</span>
				                    <hr>
				                </div>
						      <form action="function/users.php" method="post">
						      	<input type="hidden" name="action" value="login">

							        <div class="input-group mb-3">
							          	<input type="email" name="email" class="form-control" placeholder="Email" required>
								          <div class="input-group-append">
									            <div class="input-group-text">
									              <span class="fas fa-user"></span>
									            </div>
								          </div>
							        </div>

							        <div class="input-group mb-3">
							          	<input type="password" name="password" class="form-control" placeholder="Password" required>
								          <div class="input-group-append">
								            <div class="input-group-text">
								              <span class="fas fa-lock"></span>
								            </div>
								          </div>
							        </div>

							        <div class="row">
							          <div class="col-lg-6">
								            <a href="register-user.php">
								              <button type="button" class="btn btn-dark btn-block btn-flat">Register</button>
								            </a>
							          </div>

							          <div class="col-lg-6">
							            	<button type="submit" name="login" class="btn bg-red btn-block btn-flat">Sign In</button>
							          </div>
							        </div>
						      </form>
					    </div>
				  </div>
			</div>

	</div>
<script src="../js/config.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script> 
<script src="../js/signin.js"></script>
<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>
</body>
</html>
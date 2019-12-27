<?php require_once("function/notification.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style.min.css">
	<title>Register - Rankme</title>
	<?php include_once 'layout/links.php' ?>	
</head>
<body class="hold-transition login-page">

	<div class="login-box">
		<div class="login-logo red">
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
					<p class="login-box-msg">Sign up and start your session</p>

						<div class="notification-message">
								<?php 
										echo success();
										echo error(); 
								?>
						</div>

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
										<input type="text" name="lastname" class="form-control" placeholder="Lastname" required>
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
								<input type="password" name="password" class="form-control" placeholder="Password" required>
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
											<a href="login.php">
												<button type="button" class="btn btn-dark btn-block btn-flat">Sign In</button>
											</a>
										</div>

										<div class="col-lg-6">
											<button type="submit" name="register" class="btn bg-red btn-block btn-flat" id="register-client">Sign Up</button>
										</div>
								</div>
						</form>
			</div>
		</div>
	</div>
</body>
</html>
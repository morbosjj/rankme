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
</div>

<div class="card">
	<div class="card-body login-card-body">
  		<p class="login-box-msg">Sign up and start your session</p>
  			<form action="function/users.php" method="POST">
  				<?php
  					if(isset($_GET)){
  				?>
  						<input type="hidden" value="<?php echo $_GET['id_sub']; ?>" name="id_sub">
  						<input type="hidden" value="register-auth" name="action">
				<?php
					}else{
				?>
						<input type="hidden" value="register-user" name="action">
				<?php
					}
				?>
				    <div class="input-group mb-3">
				    	<?php
				    		if(isset($_GET['firstname'])){
				    	?>
				      		<input type="text" name="firstname" class="form-control" placeholder="Firstname" value="<?php echo $_GET['firstname'] ?>" required>
					    <?php
					    	}else{
					    ?>
							<input type="text" name="firstname" class="form-control" placeholder="Firstname" required>
					    <?php
					    	}
					    ?>
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
				    	<?php
				    		if(isset($_GET['email'])){
				    	?>
				      		<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $_GET['email'] ?>" required>
						<?php
							}else{
						?>
							<input type="email" name="email" class="form-control" placeholder="Email" required>
						<?php
							}
						?>
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
					      	<?php
					      		if(isset($_GET)){
					      	?>
					      		<button id="signin" onclick="exitRegister()" type="button" class="btn btn-dark btn-block btn-flat">Sign In</button>
					        <?php
					        	}else{
					        ?>
								<a href="login.php">
					          		<button type="button" class="btn btn-dark btn-block btn-flat">Sign In</button>
					        	</a>
					        <?php
					        	}
					        ?>
					      </div>

					      <div class="col-lg-6">
					        <button type="submit" name="register" class="btn bg-red btn-block btn-flat">Sign Up</button>
					      </div>
				    </div>
			</form>
	</div>
</div>
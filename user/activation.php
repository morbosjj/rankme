<?php require_once("function/notification.php"); ?>
<?php 

if(isset($_SESSION['user'])){
  header('location: https://rank-me.000webhostapp.com');
}

?>
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
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Activation Code</p>

              <div class="notification-message">
                  <?php 
                      echo success();
                      echo error(); 
                  ?>
              </div>

              <form action="function/users.php" method="POST">
                <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="user_id">
          
                <div class="input-group mb-3">
                  <input type="text" name="activation_code" class="form-control" placeholder="Enter a Activation Code" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                      <div class="col-lg-6">
                        <button type="submit" name="activate" class="btn bg-red btn-block btn-flat" id="activate-client">Activate</button>
                      </div>
                  </div>
              </form>
        </div>
      </div>
    </div>
</body>
</html>
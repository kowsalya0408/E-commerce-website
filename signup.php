<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }



?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition register-page"  style="background-image: linear-gradient(to right,rgba(175,228,247), rgba(186,223,3));">
<div class="register-box">
  	<?php
      if(isset($_SESSION['error'])){
		   $msg=$_SESSION['error'];
	   
			 echo '<script type="text/javascript">alert("'.$msg.'");</script>'; 
        
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        $msg=$_SESSION['success'];
	   
			 echo '<script type="text/javascript">alert("'.$msg.'");</script>'; 
        unset($_SESSION['success']);
      }
    ?>
  	<div class="register-box-body">
    	<p class="login-box-msg"><h1 align="center" style="color:#B9DF0D">REGISTER</h1> </p>

    	<form action="register.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <hr>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-success" name="signup">Sign Up</button>
        		</div>
      		</div>
    	</form>
      <br>
      <a href="login.php">I already have an Account</a><br>
      <a href="index.php"><i class="fa fa-home"></i> Home</a>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>
<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page" style="background-image: linear-gradient(to right,rgba(175,228,247), rgba(186,223,3));">
<div class="login-box">
  	<?php
      if(isset($_SESSION['error'])){
       $msg=$_SESSION['error'];
	   
			 echo '<script type="text/javascript">alert("'.$msg.'");</script>'; 
         
       
        unset($_SESSION['error']);
      }
      if(isset($_SESSION['success'])){
        $msg=$_SESSION['error'];
	    echo '<script type="text/javascript">alert("'.$msg.'");</script>'; 
        unset($_SESSION['success']);
      }
    ?>
  	<div class="login-box-body">
    	<p class="login-box-msg"><h1 align="center" style="color:#B9DF0D">LOG IN</h1></p>

    	<form action="verify.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-success"  name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
      		</div>
    	</form>
      <br>
      <a href="password_forgot.php">I forgot my password</a><br>
      <a href="signup.php" class="text-center">Create an Account</a><br>
      <a href="index.php"><i class="fa fa-home"></i> Home</a>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>
<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page" style="background-image: linear-gradient(to right,rgba(175,228,247), rgba(186,223,3));">
<div class="login-box">

  	<div class="login-box-body">
    	<p class="login-box-msg">Change Password</p>

    	<form action="reset.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
			<div class="form-group has-feedback">
        		<input type="password" class="form-control" name="password" placeholder="new password" required>
        		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
      		</div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-success" name="reset"><i class="fa fa-mail-forward"></i> Reset</button>
        		</div>
      		</div>
    	</form>
      <br>
      <a href="login.php">I rememberd my password</a><br>
      <a href="index.php"><i class="fa fa-home"></i> Home</a>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>
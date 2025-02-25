<?php

	include 'includes/session.php';

	if(isset($_POST['reset'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email=:email");
		$stmt->execute(['email'=>$email]);
		
		$row = $stmt->fetch();
		//echo $email;
		//echo $password;
		if($row['numrows'] > 0)
		{
		$password = password_hash($password, PASSWORD_DEFAULT);
		//echo $password;
		try{
				$stmt = $conn->prepare("UPDATE users SET password=:password WHERE id=:id");
				$stmt->execute(['password'=>$password, 'id'=>$row['id']]);
				
				if($stmt){
				   echo '<script type="text/javascript">alert("PASSWORD CHANGED SUCCESSFULLY");</script>'; 
				   echo "<script>setTimeout(\"location='login.php'\",50);</script>";
				
				}
				
				
			
		}
		catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				echo '<script type="text/javascript">alert("'.$_SESSION['error'].'");</script>'; 
			}

	}
	ELSE
				{
					  echo '<script type="text/javascript">alert("EMAIL NOT FOUND");</script>'; 
					   echo "<script>setTimeout(\"location='login.php'\",50);</script>";
				}
	}
?>

<?php 

session_start();

include("connection.php");



	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//read from database
			$query = "select * from register where username = '$username' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_array($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['username'];
						$_SESSION['USN'] = $user_data['usn'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo '<script>alert("Username or password does not match")</script>';
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="wave.png">
	<div class="container">
		<div class="img">
			<img src="bg.svg">
		</div>
		<div class="login-content">
			<form action="login.php" method="POST">
				<img src="avatar.svg">
				<h2 class="title"> Student</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username" required autocomplete = "off">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" required>
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
				<input type="submit" name="submit" class="btn" value="Login">
				<a href="signUp1.php"><input type="button" class="btn" value="Sign-up"></a>
				<a href="Facultylogin.php"><input type="button" class="btn" value="Faculty Login"></a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="login.js"></script>
</body>
</html>
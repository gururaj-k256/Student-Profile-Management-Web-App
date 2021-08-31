<?php
if(isset($_POST['submit']))
{
   /*
  This file contains database configuration assuming you are running mysql using user "root" and password ""
    */

    $server = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "dbms";

       //create connection
    $conn= mysqli_connect($server, $dbUsername , $dbPassword, $dbname);

    //Check the connection
    if($conn == false){
        dir('Error: Cannot connect'); 
    }

    //$username = "username";
    //$password = "password";

    session_start();

    $name = $_SESSION['Name'];
    $usn = $_SESSION['USN'];
    $contact = $_POST['Contact'];
    $email = $_POST['email'];
    $address = $_POST['Address'];


    $sql = "INSERT INTO `personal` (`name`, `usn`, `contact`, `email`, `address`) VALUES ('$name', '$usn', '$contact', '$email', '$address');";
    if($conn->query($sql) == TRUE)
    {
      header("location: signUp3.php");
    }
    else
    {
      echo "Not done";
    }


mysqli_close($conn); 
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign-Up</title>
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
			<form action="signUp2.php" method="POST">
				<img src="avatar.svg">
				<h2 class="title">Sign-Up</h2>

                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Contact Number</h5>
                        <input type="tel" class="input" name="Contact">
                    </div>
                </div>  

              <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5>E-mail</h5>
                    <input type="email" class="input" name="email">
                </div>
              </div>

              <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5>Address</h5>
                    <input type="text" class="input" name="Address">
                </div>
              </div> 
              <input type="submit" name="submit" class="btn" value="Next">
                <a href="login.php"><input type="button" class="btn" value="Have an account? Login"></a>
        </div>
    </div>
    <script type="text/javascript" src="login.js"></script>
</body>
</html>
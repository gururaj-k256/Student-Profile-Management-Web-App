<?php

session_start();

include("function.php");

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbms";

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$con)
{
	die("failed to connect!");
}

$usn=$_SESSION['USN'];

$sql = "select * from personal where usn = '$usn' ";
$sql1 = "select * from academic where usn = '$usn' ";

$ret = $con->query($sql);
$ret1 = $con->query($sql1);

if(!$ret && !$ret1)
{
  echo '<script>alert("COULD NOT GET DATA!!")</script>';
}
else
{
  $result = $ret->fetch_assoc();
  $result1 = $ret1->fetch_assoc();
}

$sem = $result1['sem'];
$_SESSION['name'] = $result['name'];
$_SESSION['email'] = $result['email'];


$sql2 = "select * from facultyassign where sem = '$sem' ";

$ret2 = $con->query($sql2);

if(!$ret2)
{
  echo '<script>alert("COULD NOT GET DATA!!")</script>';
}
else
{
  $result2 = $ret2->fetch_assoc();
}

$sql3 = "select * from course where sem = '$sem' ";

$ret3 = $con->query($sql3);

if(!$ret3)
{
  echo '<script>alert("COULD NOT GET DATA!!")</script>';
}
else
{
  $result3 = $ret3->fetch_assoc();
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DBMS Project</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <style>
      h2{
        font-size: 32px;
        text-align: center;
        color:rgb(18, 247, 132);
        margin-bottom: 10px;
      }
      section{
        font-family: 'Poppins';
      }
      .wrap{
        padding: 10px;
        font-size: 18px;
        display: flex;        
      }
      .details{
        text-align: right;
        width: 50%;
        flex: 50%;
      }
      .fromDB{
        width: 50%;
        height: fit-content;
        flex: 50%;
      }
    </style>

</head>
<body>
      <header class="text-gray-400 bg-gray-900 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
          <a class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-green-500 rounded-full" viewBox="0 0 24 24">
              <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">Student Info</span>
              </a>
              <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                <a href = "index.php" class="mr-5 hover:text-green-400">Home</a>
                <a href = "aboutUs.php" class="mr-5 hover:text-green-400">About Us</a>
                <a href = "contactUs.php" class="mr-5 hover:text-green-400">Contact Us</a>
                <a href = "profile.php" class="mr-5 hover:text-green-400">Update Profile</a>
              </nav>
          <button class="inline-flex items-center bg-gray-800 border-0 py-1 px-3 focus:outline-none hover:bg-gray-700 rounded text-base mt-4 md:mt-0"><a href="logout.php">Log Out</a>
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </button>
        </div>
      </header>
      
      <hr style="margin:0px 50px">

      <section class="text-gray-400 bg-gray-900 body-font">
        <h2>
          Profile Details
        </h2>
        <div class = "wrap">
          <div class = "details">
            Name:           &nbsp&nbsp  <br><br>
            USN:            &nbsp&nbsp  <br><br>
            Sem:            &nbsp&nbsp  <br><br>
            Department:     &nbsp&nbsp  <br><br>
            Contact Number: &nbsp&nbsp  <br><br>
            Email-ID:       &nbsp&nbsp  <br><br>
            Address:        &nbsp&nbsp  <br><br>
            Handled By:     &nbsp&nbsp  <br><br>
            Courses:        &nbsp&nbsp  <br><br>
          </div>
          <div class = "fromDB">
            <?php echo $result['name']?><br><br>
            <?php echo $result['usn']?><br><br>
            <?php echo $result1['sem']?><br><br>
            <?php echo $result1['department']?><br><br>
            <?php echo $result['contact']?><br><br>
            <?php echo $result['email']?><br><br>
            <?php echo $result['address']?><br><br>
            <?php echo $result2['faculty']?><br><br>
            <?php echo $result3['c1'].' '.$result3['c2'].' '.$result3['c3'].' '.$result3['c4'].' '.$result3['c5'].' '.$result3['c6']?><br><br>
          </div>
        </div>

      </section>

      <hr style="margin:0px 50px">

      <footer class="text-gray-400 bg-gray-900 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
          <a class="flex title-font font-medium items-center md:justify-start justify-center text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-green-500 rounded-full" viewBox="0 0 24 24">
              <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
            </svg>
            <span class="ml-3 text-xl">Student Info</span>
          </a>
          <p class="text-sm text-gray-400 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-800 sm:py-2 sm:mt-0 mt-4">© 2021 BMSCE
            <a href="https://twitter.com/knyttneve" class="text-gray-500 ml-1" target="_blank" rel="noopener noreferrer">@bmsce</a>
          </p>
          <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
            <a class="text-gray-400">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-400">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-400">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-400">
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                <circle cx="4" cy="4" r="2" stroke="none"></circle>
              </svg>
            </a>
          </span>
        </div>
      </footer>
</body>
</html>
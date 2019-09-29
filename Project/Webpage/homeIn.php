<?php 
  session_start(); 

  if (!isset($_SESSION['FullName'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['FullName']);
  	unset($_SESSION['Email']);
  	unset($_SESSION['Phone']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="web.css"> 
	<link rel="stylesheet" type="text/css" href="CSS/home.css">
</head>
<body>
    <header>
        <section class="logo">
            <img src="imgs/pizzalogo.png" alt="Logo">
        </section>
        <nav class="menu">
            <a class="btn1" href="homeIn.php">Home</a>
            <a class="btn3" href="information.html">Information</a>
			<a class="btn2" href="homeIn.php?logout='1'">Logout</a>
        </nav>
    </header>
	<div style="color:red;">
	
		<!-- notification message -->
		
		<?php if (isset($_SESSION['success'])) : ?>
		  <div class="error success" >
			<h3>
			  <?php 
				echo $_SESSION['success']; 
				unset($_SESSION['success']);
			  ?>
			</h3>
		  </div>
		<?php endif ?>

		<!-- logged in user information -->
		
		<?php  if (isset($_SESSION['Email'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['FullName']; ?></strong></p>
			<p>Your phone number is: <strong><?php echo $_SESSION['Phone']; ?></strong></p>
		<?php endif ?>
	</div>
</body>
</html>
<?php include('server.php');

  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['FullName']);
  	unset($_SESSION['Email']);
  	unset($_SESSION['Phone']);
	unset($_SESSION['UserId']);
	unset($_SESSION['loggedin']);
  	header("location: home.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="CSS/web.css"> 
	<link rel="stylesheet" type="text/css" href="CSS/menu.css">
</head>
<body>
    <header>
        <section class="logo">
            <img src="imgs/pizzalogo.png" alt="Logo">
        </section>
        <nav class="menu">
			<?php if (isset($_SESSION['loggedin'])) : ?>
				<a class="focused" href="home.php">Home</a>
				<a class="nonfocused" href="order.php">Order</a>
				<a class="nonfocused" href="home.php?logout='1'">Logout</a>
			<?php else : ?>
				<a class="focused" href="home.php">Home</a>
				<a class="nonfocused" href="login.php">Login</a>
			<?php endif ?>
        </nav>
    </header>
		<main >
			<h1>
			Üdvözöljük pizzériánk weboldalán!
			</h1>
			<br />
			<?php if (isset($_SESSION['loggedin'])) : ?>
				<p style="background-color: #ffe6cc; display: inline-block; opacity: 0.7; border-radius: 30px;font-size: 24px; font-style: italic; letter-spacing: 2px; padding: 20px; text-align: center">
				Az "Order" menün belül tud házhoz rendelni pizzát.</p>
			<?php else : ?>
				<p style="background-color: #ffe6cc; display: inline-block; opacity: 0.7; border-radius: 30px;font-size: 24px; font-style: italic; letter-spacing: 2px; padding: 20px; text-align: center">
				Amennyiben még nem regisztrált, azt a "Login" menü alatt teheti meg, majd ha belépett rendelheti is a pizzát.</p>
			
			<?php endif ?>
		</main>
</body>
</html>
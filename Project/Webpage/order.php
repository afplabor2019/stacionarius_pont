<?php include('server.php');

  if (!isset($_SESSION['loggedin'])) {
  	$_SESSION['msg'] = "You must log in first!";
  	header('location: login.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order</title>

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
				<a class="nonfocused" href="home.php">Home</a>
				<a class="focused" href="order.php">Order</a>
				<a class="nonfocused" href="home.php?logout='1'">Logout</a>
			<?php else : ?>
				<a class="focused" href="home.php">Home</a>
				<a class="nonfocused" href="login.php">Login</a>
			<?php endif ?>

        </nav>
    </header>
</body>
</html>
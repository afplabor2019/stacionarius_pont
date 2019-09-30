<?php include('server.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="CSS/menu.css">
    <link rel="stylesheet" type="text/css" href="CSS/web.css">
</head>
<body>

    <header>	
        <section class="logo">
            <img src="imgs/pizzalogo.png" alt="Logo">
        </section>
        <nav>
            <a class="nonfocused" href="home.php">Home</a>
            <a class="focused" href="login.php">Login</a>
        </nav>
    </header>
	
        <div class="card">
			<?php if (isset($_SESSION['registered'])) : ?>
			  <div style="color:red; text-align: center; text-decoration-color: orange" >
				<h3>
				  <?php 
					echo $_SESSION['registered']; 
					unset($_SESSION['registered']);
				  ?>
				</h3>
			  </div>
			<?php endif ?>

            <h1>Login</h1>
            <div class="form">
				<?php include('errors.php'); ?>
                <form action="login.php" method="POST">
                    <div class="formgroup">
                        <label for="email">E-mail</label>
                        <input style="border: 2px solid orange" type="email" id="email" name="loginEmail" placeholder="E-mail" required>
                    </div>

                    <div class="formgroup">
                        <label for="password">Password</label>
                        <input style="border: 2px solid orange" type="password" name="loginPassword" id="password" placeholder="Password" required>
                    </div>

                    <div class="btn">
						<button style="border: 2px solid orange; height: 40px; width: 80px; background-color: white;
                        font-size: 20px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: black;
                        text-decoration: underline" name="Login" type="submit">Login</button>
                    </div>
					
					    <?php if(isset($msg)){?>
						  <p><?php echo $msg;?></p>
						<?php } ?>
                    <div class="login">
						<p style="color: white">Not registered yet?</p>
                        <a href="register.php" >Click here</a>
                    </div>
                </form>
            </div>
		</div> 
</body>
</html>
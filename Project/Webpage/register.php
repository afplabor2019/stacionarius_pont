<?php include('server.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" type="text/css" href="CSS/register.css">
    <link rel="stylesheet" type="text/css" href="CSS/web.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <section class="logo">
            <img src="imgs/pizzalogo.png" alt="Logo">
        </section>
        <nav>
            <a class="btn1" href="home.php">Home</a>
            <a class="btn2" href="register.php">Register</a>
        </nav>
    </header>

    <div class="contact">
        <div class="card">
            <div class="cardheader">
                <h1 style="color: #ffffff; text-align: center; text-decoration-color: orange">Join us!</h1>
            <div>
            
            <div class="form">
                <form action="register.php" method="POST">
				<?php include('errors.php'); ?>
					<div class="formgroup">
                        <p class="star">*</p>
                        <label for="fullname">Full name</label>
                        <input style="border: 2px solid orange" type="text" id="fname" name="fullname" value="<?php echo $FullName; ?>"  placeholder="Eg.: Donald Duck" required>
                    </div>

                    <div class="formgroup">
                        <p class="star">*</p>
                        <label for="phonenumber">Phone number</label>
                        <input style="border: 2px solid orange" type="number" id="pnumber" name="phonenumber" value="<?php echo $Phone; ?>" placeholder="Eg.: +69420420420">
                    </div>

                    <div class="formgroup">
                        <p class="star">*</p>
                        <label for="email">E-mail</label>
                        <input style="border: 2px solid orange" type="email" name="email" id="email" value="<?php echo $Email;?>"  placeholder="Eg.: donald.duck@gmail.com" required>
                    </div>

                    <div class="formgroup">
                        <p class="star">*</p>
                        <label for="password">Password</label>
                        <input style="border: 2px solid orange" type="password" name="password" id="password" placeholder="Password" required>
                    </div>

                    <div class="submitbtn">
                        <button style="border: 2px solid orange; height: 40px; width: 80px; background-color: white;
                        font-size: 20px; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; color: black;
                        text-decoration: underline" name="Register" type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</body>
</html>
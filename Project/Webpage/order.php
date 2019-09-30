<?php include('server.php');

  if (!isset($_SESSION['loggedin'])) {
  	$_SESSION['msg'] = "You must log in first!";
  	header('location: login.php');
  }
  
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
				<a class="nonfocused" href="home.php">Home</a>
				<a class="focused" href="order.php">Order</a>
				<a class="nonfocused" href="home.php?logout='1'">Logout</a>
        </nav>
    </header>
	<main>
		<h1>Order</h1>
			<form action="order.php" method="POST">
					<table>
						<tr>
							<th>
								<?php include('errors.php'); ?>
							</th>
						</tr>
						<tr>
							<td>
								<label>*Pizza type:</label>
							</td>
							<td>
							<select name="pizzaType" id="pizzaType">
								<option value="">-</option>
								<option value="Margarita">Margarita</option>
								<option value="Pepperoni">Pepperoni</option>
								<option value="Mushroom">Mushroom</option>
							</select>
							</td>
							<td>
							Prices:
							</td>
						</tr>
						<tr>
							<td>
								<label>*Size:</label>
							</td>
							<td>
								<input type="radio" name="Size" value="32cm" checked>32cm<br />
								<input type="radio" name="Size" value="48cm">48cm<br />
								<input type="radio" name="Size" value="62cm">62cm
							</td>
							<td>
							<p>Margarita:</p>
							<p>32cm: 1500 Ft</p>
							<p>48cm: 2500 Ft</p>
							<p>62cm: 3500 Ft</p>
							</td>
						</tr>
						<tr>
							<td>
								<label>*Amount:</label>
							</td>
							<td>
								<input type="number" name="Amount" min="1" max="20">
							</td>
							<td>
							<p>Pepperoni:</p>
							<p>32cm: 2000 Ft</p>
							<p>48cm: 3000 Ft</p>
							<p>62cm: 4000 Ft</p>
							</td>
						</tr>
						<tr>
							<td>
								<label>Plus Topping:</label>
							</td>
							<td>
								<input type="checkbox" name="Topping[]" value="Cheese">Cheese (200 Ft)<br />
								<input type="checkbox" name="Topping[]" value="Tomato">Tomato (100 Ft)<br />
								<input type="checkbox" name="Topping[]" value="Ham">Ham (150 Ft)<br />
								<input type="checkbox" name="Topping[]" value="Corn">Corn (150 Ft)
							</td>
							<td>
							<p>Mushroom:</p>
							<p>32cm: 2000 Ft</p>
							<p>48cm: 3000 Ft</p>
							<p>62cm: 4000 Ft</p>
							</td>
						</tr>					
						<tr>
							<td>
								<label>*Address:</label>
							</td>
							<td>
								<input type="text" name="Address">
							</td>
						</tr>
						<tr>
							<td>
								<label>Message:</label>
							</td>
							<td>
								  <textarea name="Message" rows="5" cols="30" placeholder="Enter message here..."></textarea>
							</td>
						</tr>
						<tr>
							<td>
								Price:
							</td>
							<td>

							</td>
						</tr>
						<tr style="text-align: center;">
							<td>
								<button name="Cart" type="submit" >Into Cart</button>
							</td>
							<td>
								<button name="Cancel" type="submit">Delete Cart</button>							
							</td>
							<td>
								<button name="Order" type="submit" >Order</button>								
							</td>
						</tr>
					</table>
					<?php 			
									$UserId = $_SESSION['UserId'];
									$sql = "SELECT * FROM incart WHERE UserId = '$UserId'";
									$result = $db->query($sql);
									if ($result->num_rows > 0): ?>
					<table>
						<tr>
							<td>
								In your cart: 
							</td>
							<td>
								Images(Later):
							</td>
						</tr>
								<?php  	
								while($row = $result->fetch_assoc()) {
									echo "<tr><td>Pizza type: " . $row["PizzaType"]. "<br /> Size:  " . $row["Size"] . "<br /> Pizza Amount: " . $row["PizzaAmount"] . 
									"<br /> Topping: " . $row["Topping"] . "<br /> Address: " . $row["Address"] . "<br /> Message: " . $row["Message"] . "<br /> Price: " . $row["Price"] . 
									"  Ft</td><td>Filler</td></tr>";
								}
								?>
					</table>
				<?php endif ?>
			</form>
	</main>
</body>
</html>
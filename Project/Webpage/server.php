<?php 
session_start();

// initializing variables
$FullName	= "";
$Email    	= "";
$Phone		= "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'users');

////////////////////////////////////////////////////////////////////////// REGISTER USER/////////////////////////////////////////////////////
if (isset($_POST['Register'])) {
  // receive all input values from the form
  $FullName = mysqli_real_escape_string($db, $_POST['fullname']);
  $Email = mysqli_real_escape_string($db, $_POST['email']);
  $Phone = mysqli_real_escape_string($db, $_POST['phonenumber']);
  $Password = mysqli_real_escape_string($db, $_POST['password']);
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  
  if (empty($FullName)) { array_push($errors, "Username is required"); }
  if (empty($Email)) { array_push($errors, "Email is required"); }
  if (empty($Phone)) { array_push($errors, "Password is required"); }
  if (empty($Password)) { array_push($errors, "Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  
  $user_check_query = "SELECT * FROM user WHERE Phone=$Phone OR Email='$Email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $finally = mysqli_fetch_assoc($result);
  
  if ($finally) { // if user exists
    if ($finally['Phone'] === $Phone) {
      array_push($errors, "Phone number already exists!");
    }

    if ($finally['Email'] === $Email) {
      array_push($errors, "Email already exists!");
    }
  }
  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$Passwordmd = md5($Password);//encrypt the password before saving in the database
  	$query = "INSERT INTO user (FullName, Phone, Email, Password) VALUES ('$FullName', '$Phone', '$Email', '$Passwordmd')";
  	mysqli_query($db, $query);
	
	//$_SESSION['Email'] = $Email;
	//$_SESSION['Phone'] = $Phone;
  	//$_SESSION['FullName'] = $FullName;
  	$_SESSION['registered'] = "Succesfully registered!";
	header('location: login.php');
  }
}


////////////////////////////////////////////////////////////////////////////////////LOGIN/////////////////////////////////////////////////

if (isset($_POST['Login'])) {
  $loginEmail = mysqli_real_escape_string($db, $_POST['loginEmail']);
  $loginPassword = mysqli_real_escape_string($db, $_POST['loginPassword']);

  if (empty($loginEmail)) {
  	array_push($errors, "Email is required!");
  }
  if (empty($loginPassword)) {
  	array_push($errors, "Password is required!");
  }

  if (count($errors) == 0) {
		$loginPassword = md5($loginPassword);
		$query = "SELECT * FROM user WHERE Email='$loginEmail' AND Password='$loginPassword'";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) {
			
			$sql = "SELECT FullName, Phone, UserId FROM user WHERE Email='$loginEmail'";
			$result = $db->query($sql);
			$temp = $result->fetch_assoc();
			
			$_SESSION['UserId'] = $temp["UserId"];
			$_SESSION['Phone'] = $temp["Phone"];
			$_SESSION['FullName'] = $temp["FullName"];
			$_SESSION['Email'] = $loginEmail;
			$_SESSION['loggedin'] = "You are now logged in";
			header('location: home.php');
  	}else {
  		array_push($errors, "Wrong email/password combination!");
  	}
  }
}

///////////////////////////////////////////////////////////////////////////////////ORDER///////////////////////////////////////////////////////////////////

  if(isset($_POST['Order'])){
	
	$UserId = $_SESSION['UserId'];
	
	$sql = "SELECT * FROM incart WHERE UserId = '$UserId'";
	$result = $db->query($sql);
  if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			$UserId = $row["UserId"];
			$PizzaType = $row["PizzaType"];
			$Size = $row["Size"];
			$Amount = $row["PizzaAmount"];
			$Topping = $row["Topping"];
			$Address = $row["Address"];
			$Message = $row["Message"];
			$Price = $row["Price"];
			$sql2 = "INSERT INTO orders (UserId, PizzaType, Size, PizzaAmount, Topping, Address, Message, Price) VALUES ('$UserId', '$PizzaType', '$Size', '$Amount', '$Topping', '$Address', '$Message', '$Price')";
			mysqli_query($db, $sql2);
			}
			
		$query = "DELETE FROM incart WHERE UserId = '$UserId'";
		mysqli_query($db, $query);
			
		header('location: home.php');
  }
  else{
	array_push($errors, "First fill the cart!");
  }
  }
  
///////////////////////////////////////////////////////////////////////////////////CART///////////////////////////////////////////////////////////////////

  if(isset($_POST['Cart'])){
	$PizzaType = mysqli_real_escape_string($db, $_POST['pizzaType']);
	$Size = mysqli_real_escape_string($db, $_POST['Size']);
	$Amount = mysqli_real_escape_string($db, $_POST['Amount']);
	isset($_POST['Topping']) ? $Toppings = $_POST['Topping'] : '';
	$Address = mysqli_real_escape_string($db, $_POST['Address']);
	$Message = mysqli_real_escape_string($db, $_POST['Message']);
	$Phone = $_SESSION['Phone'];
	$UserId = $_SESSION['UserId'];
	$TempPrice = 0;
	
	if(isset($_POST['Topping'])){
		$sql = "SELECT * FROM toppings";
		$result = $db->query($sql);
		while($row = $result->fetch_assoc()) {
			$Topp = $row["Topping"];
			$ToppPrice= $row["Price"];
			for($i = 0; $i<count($Toppings); $i++){
				if($Topp == $Toppings[$i]){
					$TempPrice += $ToppPrice;
				}
			}
		}
	}

	
	
	
	$Topping = "";	
    if(isset($Toppings)){
	foreach($Toppings as $top){
		$Topping .= $top." ";
	}
  }
	if ($PizzaType=="") { array_push($errors, "You must choose the pizza type!"); }
	if (empty($Amount)) { array_push($errors, "Amount is required!"); }
	if (empty($Address)) { array_push($errors, "Address is required"); }
	
	$sql = "SELECT Price FROM pizzas WHERE PizzaType='$PizzaType' AND Size='$Size'";
	$result = $db->query($sql);
	$temp = $result->fetch_assoc();
	$Price = $temp["Price"];
		

	
	if(count($errors) == 0){
		$Price += $TempPrice;
		$Price *= $Amount;
		$query = "INSERT INTO incart (UserId, PizzaType, Size, PizzaAmount, Topping, Address, Message, Price) VALUES ('$UserId', '$PizzaType', '$Size', '$Amount', '$Topping', '$Address', '$Message', '$Price')";
		mysqli_query($db, $query);

		header('location: order.php');
	}
	  
	  
  }
  
///////////////////////////////////////////////////////////////////////////////////CANCEL///////////////////////////////////////////////////////////////////
  
  if(isset($_POST['Cancel'])){
	  
		$UserId = $_SESSION["UserId"];
	  	$sql = "DELETE FROM incart WHERE UserId = '$UserId'";
		mysqli_query($db, $sql);
  }

?>

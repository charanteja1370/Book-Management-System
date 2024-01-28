<?php
	session_start();

	$customerid = $_SESSION['userd'];

	$_SESSION['err'] = 1;
	foreach($_POST as $key => $value){
		if(trim($value) == ''){
			$_SESSION['err'] = 0;
		}
		break;
	}

	if($_SESSION['err'] == 0){
		header("Location: purchase.php");
	} else {
		unset($_SESSION['err']);
	}

	require_once "./functions/database_functions.php";
	// print out header here
	$title = "Purchase Process";
	require "./template/header.php";
	// connect database
	$conn = db_connect();
	extract($_SESSION['ship']);

	

	// find customer
/*	 $customerid = getCustomerId($username, $address, $phoneNumber );
	if($customerid == null) {
		// insert customer into database and return customerid
		$customerid = setCustomerId($username, $address, $phoneNumber);
	} */
    
    $query = "update customers set username = '$username', address = '$address', phoneNumber = '$phoneNumber' where customerid = '$customerid'";

		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "insert false !" . mysqli_error($conn);
			exit;
		}

	$date = date("Y-m-d H:i:s");
	insertIntoOrder($conn, $customerid, $_SESSION['total_price'], $date, $username, $address, $phoneNumber);
    $amount = $_SESSION['total_price'];
	// take orderid from order to insert order items
	$orderid = getOrderId($conn, $customerid);

	foreach($_SESSION['cart'] as $isbn => $qty){
		$bookprice = getbookprice($isbn);
		$query = "INSERT INTO order_items VALUES 
		('$orderid', '$isbn', '$bookprice', '$qty')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Insert value false!" . mysqli_error($conn2);
			exit;
		}
		$query1 = "INSERT INTO delivery(customerid, amount, username, ship_address, phoneNumber) VALUES 
		('$customerid', '$amount', '$username', '$address', '$phoneNumber')";
		$result1 = mysqli_query($conn, $query1);
		if(!$result1){
			echo "Insert value false!" . mysqli_error($conn2);
			exit;
		}
	}

	session_unset();
?>
	<p class="lead text-success">Your order has been processed successfully. </p>

<?php
	if(isset($conn)){
		mysqli_close($conn);
	}
	require_once "./template/footer.php";
?>

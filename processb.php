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
		header("Location: purchaseb.php");
	} else {
		unset($_SESSION['err']);
	}

	require_once "./functions/database_functions.php";
	// print out header here
	$title = "Borrow Process";
	require "./template/header.php";
	// connect database
	$conn = db_connect();
	extract($_SESSION['ship']);

	

	// find customer
	/*$customerid = getCustomerId($username, $address, $phoneNumber );
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
	insertIntoBorrow($conn, $customerid, $_SESSION['totalb_price'], $date, $username, $address, $phoneNumber, $issueDate, $returnDate, $borrowDate);
    $amount = $_SESSION['totalb_price'];
	// take orderid from order to insert order items
	$borrowid = getBorrowId($conn, $customerid);

	foreach($_SESSION['cartb'] as $isbn => $months){
		$bookcostpm = getbookcostpm($isbn);
		$query = "INSERT INTO borrow_items VALUES 
		('$borrowid', '$isbn', '$bookcostpm', '$month')";
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
	<p class="lead text-success">Your order has been processed successfully. Please check your email to get your order confirmation and shipping detail!. 
	Your cart has been empty.</p>

<?php
	if(isset($conn)){
		mysqli_close($conn);
	}
	require_once "./template/footer.php";
?>
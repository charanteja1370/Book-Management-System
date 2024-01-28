<?php
	// the shopping cart needs sessions, to start one
	/*
		Array of session(
			cart => array (
				book_isbn (get from $_POST['book_isbn']) => number of books
			),
			items => 0,
			total_price => '0.00'
		)
	*/
	session_start();
	require_once "./functions/database_functions.php";
	require_once "./functions/cartb_functions.php";

	// book_isbn got from form post method, change this place later.
	if(isset($_POST['bookisbn'])){
		$book_isbn = $_POST['bookisbn'];
	}

	if(isset($book_isbn)){
		// new iem selected
		if(!isset($_SESSION['cartb'])){
			// $_SESSION['cart'] is associative array that bookisbn => qty
			$_SESSION['cartb'] = array();

			$_SESSION['totalb_items'] = 0;
			$_SESSION['totalb_price'] = '0.00';
		}

		if(!isset($_SESSION['cartb'][$book_isbn])){
			$_SESSION['cartb'][$book_isbn] = 1;
		} elseif(isset($_POST['cartb'])){
			$_SESSION['cartb'][$book_isbn]++;
			unset($_POST);
		}
	}

	// if save change button is clicked , change the qty of each bookisbn
	if(isset($_POST['save_change'])){
		foreach($_SESSION['cartb'] as $isbn =>$month){
			if($_POST[$isbn] == '0'){
				unset($_SESSION['cartb']["$isbn"]);
			} else {
				$_SESSION['cartb']["$isbn"] = $_POST["$isbn"];
			}
		}
	}

	// print out header here
	$title = "Your shopping cart";
	require "./template/header.php";

	if(isset($_SESSION['cartb']) && (array_count_values($_SESSION['cartb']))){
		$_SESSION['totalb_price'] = totalb_price($_SESSION['cartb']);
		$_SESSION['totalb_items'] = totalb_items($_SESSION['cartb']);
?>
   	<form action="cartb.php" method="post">
	   	<table class="table">
	   		<tr>
	   			<th>Item</th>
	   			<th>Price</th>
	  			<th>Months</th>
	   			<th>Total</th>
	   		</tr>
	   		<?php
		    	foreach($_SESSION['cartb'] as $isbn => $month){
					$conn = db_connect();
					$book = mysqli_fetch_assoc(getBookBByIsbn($conn, $isbn));
			?>
			<tr>
				<td><?php echo $book['book_title'] . " by " . $book['book_author']; ?></td>
				<td><?php echo "$" . $book['bookcostpm']; ?></td>
				<td><input type="text" value="<?php echo $month; ?>" size="2" name="<?php echo $isbn; ?>"></td>
				<td><?php echo "$" . $month * $book['bookcostpm']; ?></td>
			</tr>
			<?php } ?>
		    <tr>
		    	<th>&nbsp;</th>
		    	<th>&nbsp;</th>
		    	<th><?php echo $_SESSION['totalb_items']; ?></th>
		    	<th><?php echo "$" . $_SESSION['totalb_price']; ?></th>
		    </tr>
	   	</table>
	   	<input type="submit" class="btn btn-primary" name="save_change" value="Save Changes">
	</form>
	<br/><br/>
	<a href="checkoutb.php" class="btn btn-primary">Go To Checkout</a> 
	<a href="books.php" class="btn btn-primary">Continue Shopping</a>
	
<?php
	} else {
		echo "<p class=\"text-warning\">Your cart is empty! Please make sure you add some books in it!</p>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	require_once "./template/footer.php";
?>
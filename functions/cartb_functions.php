<?php
	/*
		loop through array of $_SESSION['cart'][book_isbn] => number
		get isbn => take from database => take book price
		price * number (quantity)
		return sum of price
	*/
	function totalb_price($cartb){
		$price = 0.0;
		if(is_array($cartb)){
		  	foreach($cartb as $isbn => $month){
		  		$bookcostpm = getbookcostpm($isbn);
		  		if($bookcostpm){
		  			$price += $bookcostpm * $month;
		  		}
		  	}
		}
		return $price;
	}

	/*
		loop through array of $_SESSION['cart'][book_isbn] => number
		$_SESSION['cart'] is associative array which is [book_isbn] => number of books for each book_isbn
		calculate sum of books 
	*/
	function totalb_items($cartb){
		$items = 0;
		if(is_array($cartb)){
			foreach($cartb as $isbn => $month){
				$items += $month;
			}
		}
		return $items;
	}
?>
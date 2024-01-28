<?php

include "dbConn.php"; // Using database connection file here

$borrowid = $_GET['borrowid']; // get id through query string

$qry = mysqli_query($db,"select * from borrow where borrowid=$borrowid"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $customerid = $_POST['customerid'];
    $amount = $_POST['amount'];
    $date=$_POST['date'];
    $username=$_POST['username'];
    $ship_address=$_POST['ship_address'];
    $phoneNumber=$_POST['phoneNumber'];
    $issueDate=$_POST['issueDate'];
    $dueDate=$_POST['dueDate'];
	$returnDate=$_POST['returnDate'];
    $edit = mysqli_query($db,"update borrow set customerid='$customerid' ,amount='$amount' , date='$date',username='$username',ship_address='$ship_address' ,phoneNumber='$phoneNumber' ,issueDate='$issueDate',returnDate='$issueDate' , dueDate='$dueDate' where borrowid='$borrowid'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:borrow_details.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>

<h3>Update Data</h3>

<form method="POST">
  <input type="text" name="customerid" value="<?php echo $data['customerid'] ?>" placeholder="customerid" Required>
  <input type="text" name="amount" value="<?php echo $data['amount'] ?>" placeholder="amount" Required>
  <input type="date" name="date" value="<?php echo $data['date'] ?>" placeholder="date" Required>
  <input type="text" name="username" value="<?php echo $data['username'] ?>" placeholder="username" Required>
  <input type="text" name="ship_address" value="<?php echo $data['ship_address'] ?>" placeholder="ship_address" Required>
  <input type="text" name="phoneNumber" value="<?php echo $data['phoneNumber'] ?>" placeholder="phoneNumer" Required>
  <input type="date" name="issueDate" value="<?php echo $data['issueDate'] ?>" placeholder="issueDate" Required>
 <input type="date" name="dueDate" value="<?php echo $data['dueDate'] ?>" placeholder="dueDate" Required> 
 <input type="date" name="returnDate" value="<?php echo $data['returnDate'] ?>" placeholder="returnDate" >
  <input type="submit" name="update" value="Update">
</form>

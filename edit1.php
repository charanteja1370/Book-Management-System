<?php

include "dbConn.php"; // Using database connection file here

$deliveryitemnumber = $_GET['deliveryitemnumber']; // get id through query string

$qry = mysqli_query($db,"select * from delivery where deliveryitemnumber=$deliveryitemnumber"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $amount = $_POST['amount'];
    $username = $_POST['username'];
    $ship_address=$_POST['ship_address'];
    $phoneNumber=$_POST['phoneNumber'];
    $courierssn=$_POST['courierssn'];
    $deliveryDate=$_POST['deliveryDate'];
    $status=$_POST['status'];
	
    $edit = mysqli_query($db,"update delivery set amount='$amount' ,username='$username' ,ship_address='$ship_address' ,phoneNumber='$phoneNumber' ,courierssn='$courierssn', deliveryDate='$deliveryDate',status='$status' where deliveryitemnumber='$deliveryitemnumber'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:all_records.php"); // redirects to all records page
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
  <input type="text" name="amount" value="<?php echo $data['amount'] ?>" placeholder="amount" Required>
  <input type="text" name="username" value="<?php echo $data['username'] ?>" placeholder="username" Required>
  <input type="text" name="ship_address" value="<?php echo $data['ship_address'] ?>" placeholder="ship_address" Required>
  <input type="text" name="phoneNumber" value="<?php echo $data['phoneNumber'] ?>" placeholder="phoneNumer" Required>
  <input type="text" name="courierssn" value="<?php echo $data['courierssn'] ?>" placeholder="courierssn" Required>
  <input type="date" name="deliveryDate" value="<?php echo $data['deliveryDate'] ?>" placeholder="deliveryDate" Required>
  <input type="text" name="status" value="<?php echo $data['status'] ?>" placeholder="status" Required>

  <input type="submit" name="update" value="Update">
</form>

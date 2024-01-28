<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
</head>
<body>

<h2 align="center">Order History</h2>

<table border="2" align="center">
  <tr>
    <td>CustomerID</td>
    <td>AMOUNT</td>
    <td>USERNAME</td>
    <td>SHIP_ADDRESS</td>
    <td>PHONE NUMBER</td> 
    <td>CourierSSN</td>
    <td>DELIVERY DATE</td>
    <td>DELIVERYITEM NUMBER</td>
    <td>DELIVERED</td>
  </tr>

<?php
include "dbConn.php"; // Using database connection file here
session_start();
$customerid = $_SESSION["customerid"];
$records = mysqli_query($db,"select * from delivery where customerid='$customerid'"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['customerid']; ?></td>
    <td><?php echo $data['amount']; ?></td>
    <td><?php echo $data['username']; ?></td> 
    <td><?php echo $data['ship_address']; ?></td>
    <td><?php echo $data['phoneNumber']; ?></td>  
    <td><?php echo $data['courierssn']; ?></td>
    <td><?php echo $data['deliveryDate']; ?></td>
    <td><?php echo $data['deliveryitemnumber']; ?></td>
    <td><?php echo $data['status']; ?></td>
      </tr>	
<?php
}
?>
</table>

</body>
</html>
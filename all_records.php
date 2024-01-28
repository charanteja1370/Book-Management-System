<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
</head>
<body>
<ul class="nav navbar-nav navbar-right">
                <li><a href="dellogout.php">Logout</a></li>
            </ul>
<h2 align="center">DELIVERY DETAILS</h2>

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
    <td>EDIT</td>
  </tr>

<?php
 $cnew=11111;
include "dbConn.php"; // Using database connection file here

$records = mysqli_query($db,"select * from delivery"); // fetch data from database

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
    <td><a href="edit1.php?deliveryitemnumber=<?php echo $data['deliveryitemnumber']; ?>">Edit</a></td>
  </tr>	
<?php
}
?>
</table>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
</head>
<body>

<h2 align="center">BORROW_REQUEST_DETAILS</h2>

<table border="2" align="center">
  <tr>
    <td>BORROW ID </td>
    <td>CUSTOMER ID</td>
    <td>AMOUNT</td>
    <td> DATE </td>
    <td>USERNAME</td>
    <td>SHIP_ADDRESS</td>
    <td>PHONE NUMBER</td> 
    <td>ISSUE DATE</td>
    <td>DUE DATE </td>
    <td>RETURN DATE</td>
    <td>EDIT</td>
  </tr>

<?php
include "dbConn.php"; // Using database connection file here

$records = mysqli_query($db,"select * from borrow"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['borrowid']; ?></td>
    <td><?php echo $data['customerid']; ?></td>
    <td><?php echo $data['amount']; ?></td> 
    <td><?php echo $data['date']; ?></td>
    <td><?php echo $data['username']; ?></td>  
    <td><?php echo $data['ship_address']; ?></td>
    <td><?php echo $data['phoneNumber']; ?></td>
    <td><?php echo $data['issueDate']; ?></td>
    <td><?php echo $data['dueDate']; ?></td>
    <td><?php echo $data['returnDate'];   ?></td>
    <td><a href="borrow_edit.php?borrowid=<?php echo $data['borrowid']; ?>">Edit</a></td>
  </tr>	
<?php
}
?>
</table>

</body>
</html>
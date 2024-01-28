<?php
$username = $_POST['username'];
$phoneNumber = $_POST['phoneNumber'];
$email = $_POST['email'];
$userId = $_POST['userId'];
$password = $_POST['password'];


//Database connection
$conn = new mysqli('localhost','root','','www_project');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
       $stmt = $conn->prepare("Insert into signup(username, phoneNumber, email, userId, password)
       values(?, ?, ?, ?, ?)");
       $stmt->bind_param("sisss", $username, $phoneNumber, $email, $userId, $password);
       $stmt->execute();
       $query = "INSERT INTO customers(customerid) VALUES 
		('$userId')";
		$result = mysqli_query($conn, $query);
		if(!$result){
			echo "Insert value false!" . mysqli_error($conn2);
			exit;
		}
       echo "Signed in Successfully";
       $stmt->close();
      
}
?>
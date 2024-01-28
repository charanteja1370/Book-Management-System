<?php
$firstName = $_POST['firstName'];
$secondName = $_POST['lastName'];
$email = $_POST['email'];
$comments = $_POST['comments'];

//Database connection
$conn = new mysqli('localhost','root','','project');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
       $stmt = $conn->prepare("Insert into contact(firstName, lastName, email, comments)
       values(?, ?, ?, ?)");
       $stmt->bind_param("ssss",$firstName, $secondName, $email, $comments);
       $stmt->execute();
       echo "Message sent Successfully";
       $stmt->close();
      
}
?>
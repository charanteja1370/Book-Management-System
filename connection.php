<?php
// mysql> CREATE USER 'tnpuser'@'localhost' IDENTIFIED BY 'password';
// Query OK, 0 rows affected (0.13 sec)

// mysql> GRANT ALL PRIVILEGES ON * . * TO 'tnpuser'@'localhost';
// Query OK, 0 rows affected (0.08 sec)

// mysql> FLUSH PRIVILEGES;
// Query OK, 0 rows affected (0.09 sec)


// Create connection
//$conn = mysqli_connect($hostname, $username, $password,$db);
function db_connect(){
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db = "www_project";
    $connection1=mysqli_connect($hostname,$username,$password,$db);
    conform_db_connect();
   // echo "connected";
    
    return $connection1;
 }
// Check connection
// if (!$conn) {
//    die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";


function conform_db_connect(){
    if(mysqli_connect_errno()){
        $mes="here is an error ";
        $mes.=mysqli_connect_error();
        $mes.=" (  ".mysqli_connect_errno()."  )  ";
        exit($mes);
      }
}



 function db_disconnect($connection1){
    if(isset($connection1)){
    mysqli_close($connection1);}
}

?>





 



 
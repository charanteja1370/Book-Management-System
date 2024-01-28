<?php

$db = mysqli_connect("localhost","root","","www_project");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>
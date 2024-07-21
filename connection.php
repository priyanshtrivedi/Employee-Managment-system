<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Employee";
mysqli_connect($servername, $username, $password, $dbname);
$conn = mysqli_connect($servername, $username, $password, $dbname);
if($conn){
    // echo "Connection OK";
}
else{
   echo "connection failed".mysqli_connect_error();
}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "asbs";

//Create connection
$conn = new mysqli($servername,$username,$password,$dbname);

//Check connection
if ($conn->connect_error) {
  die("connection Failed: ". $conn->connect_error);
}
else {
  //echo "Connected successfully";
}
 ?>

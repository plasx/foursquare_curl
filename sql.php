<?php
include 'config.php';
include 'sql.php';

function connect(){

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
var_dump(get_object_vars($conn));
echo "Connected successfully";
}

 ?>
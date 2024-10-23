<?php
$con = new mysqli("localhost", "root", "", "jaymitch_db");
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{ 
echo "Connected successfully";
}
?>
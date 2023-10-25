<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "mobilestore_mysql";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Kết nối MySQLi thất bại: " . $conn->connect_error);
}
// echo "Kết nối CSDL thành công.";
?>
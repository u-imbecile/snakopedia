
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "usersystem";  // Make sure this database exists in phpMyAdmin

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

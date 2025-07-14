<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

$fname = $_POST['firstname'] ?? '';
$lname = $_POST['lastname'] ?? '';
$email = $_POST['email'] ?? '';
$pass = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);

if (!$fname || !$lname || !$email || !$pass) {
  die("Missing required fields");
}

$sql = "INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
  die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("ssss", $fname, $lname, $email, $pass);

if ($stmt->execute()) {
  echo "Signup successful. <a href='login.html'>Login here</a>";
} else {
  echo "Execute failed: " . $stmt->error;
}

$conn->close();
?>

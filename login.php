<?php
session_start();
include 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Fetch user
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        // Optional: Set session variables
        $_SESSION['user'] = $user['firstname'];
        //redirecting user
        header("Location: index.html?login=success");
        exit();

    } else {
        echo "Incorrect password.";
    }
} else {
    echo "User not found.";
}

$conn->close();
?>
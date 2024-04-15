<?php
session_start();
require 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        setcookie("loggedIn", $user['username'], time() + 3600); // 1 hour cookie
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<script>alert('Invalid credentials');</script>";
    }
}
?>

<?php
// API for user login (auth.php page)
session_start();
header('Content-Type: application/json');
include('../config/db_conn.php');

$action = isset($_POST['action']) ? $_POST['action'] : '';

// Login
if ($action == 'login') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Simple check: hardcoded user "brandon" with password "1234"
    if ($username == 'brandon' && $password == '1234') {
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_name'] = 'Brandon';
        echo json_encode(["success" => true, "message" => "Login successful"]);
    } else {
        echo json_encode(["success" => false, "message" => "Invalid username or password"]);
    }
}

// Logout
if ($action == 'logout') {
    session_destroy();
    echo json_encode(["success" => true]);
}

// Check session
if ($action == 'checkSession') {
    if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] == true) {
        echo json_encode(["loggedIn" => true, "userName" => $_SESSION['user_name']]);
    } else {
        echo json_encode(["loggedIn" => false]);
    }
}

$conn->close();
?>

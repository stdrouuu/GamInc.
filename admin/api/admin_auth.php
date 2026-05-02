<?php
// Admin Login API
session_start();
header('Content-Type: application/json');
include('../../config/db_conn.php');

$action = isset($_POST['action']) ? $_POST['action'] : '';

// Admin Login
if ($action == 'login') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        echo json_encode(["success" => true, "message" => "Login successful"]);
    } else {
        echo json_encode(["success" => false, "message" => "Invalid username or password"]);
    }
}

// Admin Logout
if ($action == 'logout') {
    session_destroy();
    echo json_encode(["success" => true]);
}

// Check admin session
if ($action == 'checkSession') {
    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
        echo json_encode(["loggedIn" => true, "username" => $_SESSION['admin_username']]);
    } else {
        echo json_encode(["loggedIn" => false]);
    }
}

$conn->close();
?>

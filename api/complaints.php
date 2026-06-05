<?php
// API for complaints (user-facing)
session_start();
header('Content-Type: application/json');
include('../config/db_conn.php');

$session_id = session_id();
$action = isset($_GET['action']) ? $_GET['action'] : '';
if (empty($action) && isset($_POST['action'])) {
    $action = $_POST['action'];
}

// Submit a new complaint
if ($action == 'submit') {
    $category = $conn->real_escape_string($_POST['category'] ?? '');
    $message  = $conn->real_escape_string($_POST['message'] ?? '');
    $order_id = !empty($_POST['order_id']) ? intval($_POST['order_id']) : null;

    if (empty($category) || empty($message)) {
        echo json_encode(["success" => false, "message" => "Category and message are required."]);
        $conn->close();
        exit;
    }

    if ($order_id !== null) {
        $stmt = $conn->prepare("INSERT INTO complaints (session_id, order_id, category, message, status) VALUES (?, ?, ?, ?, 'open')");
        $stmt->bind_param("siss", $session_id, $order_id, $category, $message);
    } else {
        $stmt = $conn->prepare("INSERT INTO complaints (session_id, category, message, status) VALUES (?, ?, ?, 'open')");
        $stmt->bind_param("sss", $session_id, $category, $message);
    }

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Complaint submitted successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to submit complaint."]);
    }
    $stmt->close();
}

$conn->close();
?>

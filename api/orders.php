<?php
// API for order operations (user-facing)
session_start();
header('Content-Type: application/json');
include('../config/db_conn.php');

$session_id = session_id();
$action = isset($_GET['action']) ? $_GET['action'] : '';
if (empty($action) && isset($_POST['action'])) {
    $action = $_POST['action'];
}

// Get all orders for this session, newest first
if ($action == 'getOrders') {
    $filter = isset($_GET['status']) ? $conn->real_escape_string($_GET['status']) : '';

    $sql = "SELECT * FROM orders WHERE session_id = '$session_id'";
    if (!empty($filter) && in_array($filter, ['pending','processing','shipped','delivered'])) {
        $sql .= " AND status = '$filter'";
    }
    $sql .= " ORDER BY created_at DESC";

    $result = $conn->query($sql);
    $orders = [];
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
    echo json_encode($orders);
}

// Get items inside a specific order
if ($action == 'getOrderDetail') {
    $order_id = intval($_GET['id']);

    // Verify this order belongs to this session
    $check = $conn->query("SELECT id FROM orders WHERE id = $order_id AND session_id = '$session_id'");
    if ($check->num_rows == 0) {
        echo json_encode([]);
        $conn->close();
        exit;
    }

    $result = $conn->query("SELECT * FROM order_items WHERE order_id = $order_id");
    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    echo json_encode($items);
}

// Get order status counts for the user profile page
if ($action == 'getOrderCounts') {
    $statuses = ['pending', 'processing', 'shipped', 'delivered'];
    $counts = [];
    foreach ($statuses as $status) {
        $res = $conn->query("SELECT COUNT(*) as cnt FROM orders WHERE session_id = '$session_id' AND status = '$status'");
        $counts[$status] = intval($res->fetch_assoc()['cnt']);
    }
    echo json_encode($counts);
}

$conn->close();
?>

<?php
// API to get products from database
header('Content-Type: application/json');
include('../config/db_conn.php');

$action = isset($_GET['action']) ? $_GET['action'] : 'getAll';

// Get all products
if ($action == 'getAll') {
    $sql = "SELECT * FROM products ORDER BY id ASC";
    $result = $conn->query($sql);

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    echo json_encode($products);
}

// Get single product by id
if ($action == 'getOne') {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(["error" => "Product not found"]);
    }
}

// Search products by name
if ($action == 'search') {
    $keyword = $conn->real_escape_string($_GET['keyword']);
    $sql = "SELECT * FROM products WHERE name LIKE '%$keyword%' ORDER BY id ASC";
    $result = $conn->query($sql);

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    echo json_encode($products);
}

$conn->close();
?>

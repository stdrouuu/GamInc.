<?php
// API for favorites operations
session_start();
header('Content-Type: application/json');
include('../config/db_conn.php');

$session_id = session_id();

$action = isset($_GET['action']) ? $_GET['action'] : '';
if (empty($action) && isset($_POST['action'])) {
    $action = $_POST['action'];
}

// Get all favorites
if ($action == 'getFavorites') {
    $sql = "SELECT favorites.id as fav_id, products.* 
            FROM favorites 
            JOIN products ON favorites.product_id = products.id 
            WHERE favorites.session_id = '$session_id'
            ORDER BY favorites.id DESC";
    $result = $conn->query($sql);

    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }

    echo json_encode($items);
}

// Add to favorites (toggle)
if ($action == 'toggleFavorite') {
    $product_id = intval($_POST['product_id']);

    // Check if already favorited
    $check = $conn->query("SELECT * FROM favorites WHERE product_id = $product_id AND session_id = '$session_id'");
    
    if ($check->num_rows > 0) {
        // Remove from favorites
        $conn->query("DELETE FROM favorites WHERE product_id = $product_id AND session_id = '$session_id'");
        echo json_encode(["success" => true, "status" => "removed"]);
    } else {
        // Add to favorites
        $conn->query("INSERT INTO favorites (product_id, session_id) VALUES ($product_id, '$session_id')");
        echo json_encode(["success" => true, "status" => "added"]);
    }
}

// Check if product is favorited
if ($action == 'checkFavorite') {
    $product_id = intval($_GET['product_id']);
    $check = $conn->query("SELECT * FROM favorites WHERE product_id = $product_id AND session_id = '$session_id'");
    
    echo json_encode(["isFavorited" => $check->num_rows > 0]);
}

// Remove from favorites
if ($action == 'removeFavorite') {
    $fav_id = intval($_POST['fav_id']);
    $conn->query("DELETE FROM favorites WHERE id = $fav_id AND session_id = '$session_id'");

    echo json_encode(["success" => true]);
}

$conn->close();
?>

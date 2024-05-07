<?php
session_start();

// Include database connection and other necessary files
include('../server/connection.php' );

// Check if the user is logged in as admin
if(!isset($_SESSION['admin_logged_in'])){
    header("Location: login.php");
    exit();
}

// Check if the order ID is provided in the URL
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    
    // Update order status to 'delivered' in the database
    $stmt = $conn->prepare("UPDATE orders SET order_status = 'delivered' WHERE order_id = ?");
    $stmt->bind_param("i", $order_id);
    
    if($stmt->execute()){
        header("Location: order.php?order_id=" . $order_id);
        exit();
    } else {
        echo "Failed to mark order as delivered.";
    }
} else {
    echo "Order ID not provided.";
}
?>

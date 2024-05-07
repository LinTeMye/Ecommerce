
<?php include('header.php'); ?>


<?php 
    if(!isset($_SESSION['admin_logged_in'])){
        header("Location: login.php");
        exit();
    }

?>

<?php
// Get total product items
    $sql_total_products = "SELECT COUNT(*) AS total_products FROM products";
    $result_total_products = mysqli_query($conn, $sql_total_products);
    $row_total_products = mysqli_fetch_assoc($result_total_products);
    $total_products = $row_total_products['total_products'];

    // Get total pending orders
    $sql_total_pending_orders = "SELECT COUNT(*) AS total_pending_orders FROM orders WHERE order_status = 'not paid' OR order_status = 'Ordered'";
    $result_total_pending_orders = mysqli_query($conn, $sql_total_pending_orders);
    $row_total_pending_orders = mysqli_fetch_assoc($result_total_pending_orders);
    $total_pending_orders = $row_total_pending_orders['total_pending_orders'];

    // Get total delivered orders
    $sql_total_delivered_orders = "SELECT COUNT(*) AS total_delivered_orders FROM orders WHERE order_status = 'delivered'";
    $result_total_delivered_orders = mysqli_query($conn, $sql_total_delivered_orders);
    $row_total_delivered_orders = mysqli_fetch_assoc($result_total_delivered_orders);
    $total_delivered_orders = $row_total_delivered_orders['total_delivered_orders'];

    // Get total users
    $sql_total_users = "SELECT COUNT(*) AS total_users FROM users";
    $result_total_users = mysqli_query($conn, $sql_total_users);
    $row_total_users = mysqli_fetch_assoc($result_total_users);
    $total_users = $row_total_users['total_users'];

    ?>

        <div id="content">
            <div id="navbar">
                <h2>Dashboard</h2>
            
            </div>

            
            <div id="dashboard-stats">
            <div class="stat">
                <h3>Total Product Items</h3>
                <p id="total-menu-items"><?php echo $total_products; ?></p>
            </div>
            <div class="stat">
                <h3>Total Pending Orders</h3>
                <p id="total-pending-orders"><?php echo $total_pending_orders; ?></p>
            </div>
            <div class="stat">
                <h3>Total Delivered Orders</h3>
                <p id="total-delivered-orders"><?php echo $total_delivered_orders; ?></p>
            </div>
            <div class="stat">
                <h3>Total Users</h3>
                <p id="total-users"><?php echo $total_users; ?></p>
            </div>
        </div>
            
              
            </div>
            
        </div>
    

</body>

</html>
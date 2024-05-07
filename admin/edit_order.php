
<?php include('header.php'); ?>


<?php 
    if(isset($_GET['order_id'])){
        $product_id= $_GET['order_id'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id=? ");
    $stmt -> bind_param('i',$product_id) ;
    $stmt->execute();
    $order = $stmt->get_result();
    }
?>


    <div id="content">
        <div id="navbar">
            <h2>Edit Order</h2>
          
        </div>
        <?php foreach( $order as $r){ ?>
        <div class="order-info">
            <h2>Order # <?php echo $r['order_id'];?></h2>
            <div class="info-row">
                <p><strong>Customer id:</strong> <?php echo $r['user_id'];?></p>
                <p><strong>Phone Number:</strong> <?php echo $r['user_phone'];?></p>
            </div>
            <div class="info-row">
                <p><strong>Address:</strong> <?php echo $r['user_address'];?></p>
                <p><strong>Order Date:</strong>  <?php echo $r['order_date'];?></p>
            </div>
            <h3>Order Details:</h3>
            
            <div class="info-row">
                <p><strong>Total Price:</strong> <?php echo $r['order_cost'];?></p>
                <p><strong>Status:</strong><?php echo $r['order_status'];?></p>
            </div>
        </div>
        <?php  } ?>
        <a id="mark-delivered-btn" href="mark_delivered.php?order_id=<?php echo $r['order_id']; ?>">Mark as Delivered</a>

    </div>
</div>

    <script src="script.js"></script>
</body>

</html>

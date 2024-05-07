
<?php include('header.php'); ?>

<?php 
            if(isset($_GET['product_id'])){
                $product_id= $_GET['product_id'];
            $stmt = $conn->prepare("SELECT * FROM products WHERE product_id=? ");
            $stmt -> bind_param('i',$product_id) ;
            $stmt->execute();
            $products = $stmt->get_result();
            
        }else if(isset($_POST['edit_btn'])){
            $product_id=$_POST['product_id'];
            $title=$_POST['name'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $offer = $_POST['offer'];
            $color = $_POST['color'];
            $category = $_POST['category'];
            $stmt=  $conn->prepare("UPDATE products SET product_name=?, product_description=?, product_price=?, 
                                    product_special_offer=?, product_color=?, product_category=? WHERE product_id = ?");
            $stmt->bind_param('ssssssi',$title, $description, $price, $offer, $color, $category, $product_id);
            if($stmt->execute()){
            header('location: products.php?edit_success_message=Product has been edited successfully!');
            }else{
                header('location: products.php?edit_failure_message=Error occured, try again!');
            }
        
        
        }else{
            header('products.php');
            exit;
        }


?>




        <div id="content">
            <div id="navbar">
                <h2>Edit Product</h2>
             
            </div>

            <form id="new-product-form" method="POST" action="edit_product.php">
                <?php if(isset($_GET['error'])){echo $_GET['error'];}?>
                <div class="form-group">
                    <?php foreach( $products as $product ){  ?>
                        <input type="hidden" name="product_id" value="<?php echo $product['product_id'];?>"/>
                    <label for="product-name">Title:</label>
                    <input type="text" id="product-name" value="<?php echo $product['product_name'] ?>"  name="name" required>
                </div>
                <div class="form-group">
                    <label for="product-description">Description:</label>
                    <input type="text" id="product-desc" value="<?php echo $product['product_description'] ?>"  name="description" required>
                </div>
                <div class="form-group">
                    <label for="product-price">Price:</label>
                    <input type="number" id="product-price"  value="<?php echo $product['product_price'] ?>" name="price" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="product-category">Category:</label>
                    <input type="text" id="product-category"  value="<?php echo $product['product_category'] ?>" name="category" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="product-color">Color:</label>
                    <input type="text" id="product-color" value="<?php echo $product['product_color'] ?>"  name="color" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="product-offer">Special offer:</label>
                    <input type="number" id="product-offer" value="<?php echo $product['product_special_offer'] ?>" name="offer" step="0.01" required>
                </div>
             
                <button type="submit" name="edit_btn" value="Edit">Edit Menu</button>
                <?php } ?>
            </form>
        </div>
    </div>

</body>

</html>

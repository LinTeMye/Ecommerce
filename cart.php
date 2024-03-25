<?php 
session_start();
if(isset($_POST['add_to_cart'])){


  // if product are already in the cart
    if(isset($_SESSION['cart'])){
        
        $products_array_ids = array_column($_SESSION['cart'],"product_id"); 
        // if product has already been add to cart or not
        if(!in_array($_POST['product_id'], $products_array_ids)){
          $product_id = $_POST ['product_id'];
          $product_array = array(
                      'product_id' => $_POST['product_id'], 
                      'product_name' => $_POST['product_name'], 
                      'product_price' => $_POST['product_price'], 
                      'product_image' => $_POST['product_image'],
                      'product_quantity' =>$_POST['product_quantity']
                      );
             $_SESSION['cart'][$product_id] = $product_array; 
                    }
          // product has already been added
        else{
            echo '<script>alert("Product was already added to cart");</script>';
           // echo '<script>window.location="index.php"</script>';

        }


    // if this is the first product
    }else{
        
        $product_id = $_POST['product_id']; 
        $product_name = $_POST['product_name']; 
        $product_price = $_POST['product_price']; 
        $product_image = $_POST['product_image']; 
        $product_quantity = $_POST['product_quantity'];
        $product_array = array(
                    'product_id' => $product_id, 
                    'product_name' => $product_name, 
                    'product_price' => $product_price, 
                    'product_image' => $product_image,
                    'product_quantity' => $product_quantity,
                    );
           $_SESSION['cart'][$product_id] = $product_array; 
                    

    }

      // calculate total
      calculateTotalCart() ;



    //remove product from cart
  }else if(isset($_POST['remove_product'])){
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);
  
    // calculate total
    calculateTotalCart();

}else if(isset($_POST['edit_quantity'])){

      // get quantity from form
      $product_id = $_POST['product_id'];
      $product_quantity = $_POST['product_quantity'];

      // get product array from session
      $product_array = $_SESSION['cart'][$product_id];
      // update product quantity in array
      $product_array['product_quantity'] = $product_quantity;

      
      $_SESSION['cart'][$product_id]= $product_array;


      // calculateTotal
      calculateTotalCart();

}


else{
    // header('location: index.php');
}

function calculateTotalCart(){

    $total = 0;
    foreach($_SESSION['cart'] as $key => $value){
     $product = $_SESSION['cart'][$key];
     $price = $product['product_price'];
     $quantity = $product['product_quantity'];
     $total = $total + ($price * $quantity);
}

  $_SESSION['total'] = $total;
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="css/style.css">
    </head>
<body>

 <!-- nav bar  -->
 <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
  <div class="container">
    <img src="assets/imgs/logo.jpeg"/>
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
   
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        <li class="nav-item">
         <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
          <a href="account.php"><i class="fa-regular fa-user"></i></a>
        </li>
        
       
      </ul>
    </div>
  </div>
    </nav>

<!-- cart -->
<section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolde">Your Cart</h2>
            <hr>
        </div>
        <table class="mt-5 pt-5">
            <tr>
                <th>Discription</th>
                <!-- <th>Price</th> -->
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            <?php foreach($_SESSION['cart'] as $key => $value){ ?>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/<?php echo $value['product_image'];?>">
                        <div>
                            <p><?php echo $value['product_name'];?></p>
                            <small><span>$</span><?php echo $value['product_price'];?></small>
                            <br>
                            <form method="POST" action="cart.php" >
                              <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>"/>
                                <input type="submit" name="remove_product" class="remove-btn" value="remove" />

                            </form>
                            
                        </div>
                    </div>

                </td>
                <td>
                    
                    <form method="POST" action="cart.php">
                      <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>" />
                      <input type="number" name="product_quantity" value="<?php echo $value['product_quantity'];?>">
                      <input type="submit" class="edit-btn" value="edit" name="edit_quantity"/>
              
                    </form>
                    

                </td>
                <td>
                    <span>$</span>
                    <span class="product-price"><?php echo $value['product_quantity'] * $value ['product_price'];?></span>
                </td>
            </tr>
            <?php }  ?>
                  
            
        </table>
        <!-- total cart -->
        
            <div class="cart-total">
                <table>
                    <!-- <tr>
                        <td>Subtotal</td>
                        <td>$155</td>
                    </tr> -->
                    <tr>
                        <td>Total </td>
                        <td>$ <?php echo $_SESSION['total'];?></td>
                    </tr>
                </table>
            </div>
        <div class="checkout-container">
          <form method="POST" action="checkout.php">
            <input type="submit" class="btn checkout-btn" value="Checkout" name="checkout">
            </form>
        </div>
</section>



<!-- footer -->
<footer class="mt-5 py-5">
    <div class="row container mx-auto pt-5">
    <div class="footer-one col-lg-3 col-md-6 col-sm-12">
    <img src="assets/imgs/logo.jpeg">
    <p class="pt-3">We provide the best products for the most affordable prices</p>
    </div>
<div class="footer-one col-lg-3 col-md-6 col-sm-12">
    <h5 class="pb-2"> Featured</h5>
    <ul class="text-uppercase">
      <li><a href="#">men</a></li>
      <li><a href="#">women</a></li>
      <li><a href="#">kids</a></li>
      <li><a href="#">men</a></li>
      <li><a href="#">men</a></li>
    </ul>
</div>
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h5 class="pb-2">Contact Us</h5>
        <div>
          <h6 class="text-uppercase">Address</h6>
          <p>1234 Street Name, City</p>
        </div>
        <div>
          <h6 class="text-uppercase">Phone</h6>
          <p>123 456 7890</p>
        </div>
        <div>
          <h6 class="text-uppercase">Email</h6>
          <p>Ecommerce@email.com</p>
        </div>
      </div>
      <div class="footer-one col-lg-3 col-md-6 col-sm-12">
        <h5 class="pb-2">Instagram</h5>
        <div class="row">
          <img src="assets/imgs/footer1.ipg" class="img-fluid w-25 h-100 m-2">
          <img src="assets/imgs/footer1.ipg" class="img-fluid w-25 h-100 m-2">
          <img src="assets/imgs/footer1.ipg" class="img-fluid w-25 h-100 m-2">
          <img src="assets/imgs/footer1.ipg" class="img-fluid w-25 h-100 m-2">
          <img src="assets/imgs/footer1.ipg" class="img-fluid w-25 h-100 m-2">

        </div>
      </div>
</div>
      <div class="copyright mt-5">
        <div class="row container mx-auto">
          <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <img src="assets/imgs/payment.jpg">
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 mb-4 text-nowrap mb-2">
            <p>eCommerce @ 2024 All Right Reserved</p>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          </div>
        </div>
      </div>
</footer>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
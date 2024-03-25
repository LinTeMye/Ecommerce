

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
<!-- Home -->
<section id="home">
  <div class="container">
    <h5>Featured</h5>
  
      <h1>Bast Prices This Season</h1>
      <p>Eshop offers the best products for the most affordable prices</p>
      
      <button>Shop</button>
    
  </div>
</section>

<!-- Brand -->
<section id="brand" class="container" >
    <div class="row">
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/Nike.jpg">
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/Adidas.jpg">
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/North.jpg">
        <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/puma.jpg">
    </div>
</section>

<!-- New -->
<section id="new" class="w-100">
    <div class="row p-0 m-0">
      <!-- One -->
      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img class="img-fluid" src="assets/imgs/shoes.jpg">
        <div class="details">
          <h2>Extreamely Awesome Shoes</h2>
          <button class="text-uppercase">Shop Now</button>
        </div>
      </div>
      <!-- Two -->
      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img class="img-fluid" src="assets/imgs/jacket.jpg">
        <div class="details">
          <h2>Extreamely Awesome Jacket</h2>
          <button class="text-uppercase">Shop Now</button>
        </div>
      </div>

      <!--  Three -->
      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img class="img-fluid" src="assets/imgs/puffer.jpg">
        <div class="details">
        <h2>50% off</h2>
          <button class="text-uppercase">Shop Now</button>
        </div>
      </div>
    </div>
</section>

<!-- Featured -->
<section id="featured" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
    <h3>Our Featured</h3>
    <hr class="mx-auto">
    <p>Here you can check out our featured products</p>
  </div>
  <div class="row mx-auto container-fluid" >

  <?php include('server/get_featured_products.php');?>
  <?php while($row=$featured_products->fetch_assoc()){  ?>
     <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
      <div class="rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
      <h4 class="p-price">$<?php echo  $row['product_price'];?></h4>
      <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>"><button class="buy-btn">Buy Now</button></a>
     </div>
    <?php  } ?>
  </div>
</section>

<!-- banner -->
<section id="banner" class="my-5 py-5">
  <div class="container">
    <h4>MID SEASON SALE</h4>
    <h1>Autumn Collection <br> UP to 30% OFF</h1>
    <button class="text-uppercase">Shop now</button>
  </div>
</section>

<!-- Clothes  -->
<section id="featured" class="my-5">
  <div class="container text-center mt-5 py-5">
    <h3>Dresses & Coats</h3>
    <hr class="mx-auto">
    <p>Here you can check out our featured products</p>
  </div>
  <div class="row mx-auto container-fluid" >
    <?php include ('server/get_coats.php');?>
    <?php while($row=$coats_products->fetch_assoc()){ ?>
     <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image'];  ?>"/>
      <div class="rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name"><?php echo $row['product_name'];?></h5>
      <h4 class="p-price">$<?php echo $row['product_price'];?> </h4>
      <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>"><button class="buy-btn">Buy Now</button></a>
      
     </div>

     <?php } ?>

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

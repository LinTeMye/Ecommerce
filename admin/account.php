<?php include('header.php'); ?>


<?php 
    if(!isset($_SESSION['admin_logged_in'])){
        header("Location: login.php");
        exit();
    }

?>


<main class="col-md-9 ms-m-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap"> 
 <h1 class="h2">Admin Account</h1>
<div class="btn-toolbar mb-2 mb-md-0">
<div class="btn-group me-2">
</div>
</div>
</div>

<div class="container">
<p>Id: <?php echo $_SESSION['admin_id']; ?></p> 
<p>Name: <?php echo $_SESSION['admin_name']; ?></p> 
<p>Email: <?php echo $_SESSION['admin_email']; ?></p> 
</div>

</main>

<?php 
session_start();
include('../server/connection.php');

if(isset($_SESSION['admin_logged_in'])){
  header('location: index.php');
  exit;
}

if(isset($_POST['login_btn'])){

  $email = $_POST['email'];
  $password = md5 ($_POST['password']);

  $stmt = $conn->prepare("SELECT admin_id, admin_name, admin_email, admin_password FROM admins WHERE admin_email=? AND admin_password = ? LIMIT 1");

  $stmt->bind_param('ss',$email,$password);
  if($stmt->execute()){
    $stmt->bind_result($admin_id,$admin_name,$admin_email,$admin_password);
    $stmt->store_result();

    if($stmt->num_rows() == 1){
      $stmt->fetch();
      $_SESSION['admin_id']= $admin_id;
      $_SESSION['admin_name']= $admin_name;
      $_SESSION['admin_email']= $admin_email;
      $_SESSION['admin_logged_in'] = true;
      header('location: index.php?login_success=logged in successfully');
      exit;


    }else{
      header('location: login.php?error=Account does not exit');
      exit;

    }



  }else{
    // error
    header('location: login.php?error=something went wrong');
    exit;
  }
}





?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form id="login-form" enctype="multipart/form-data" method="POST" action="login.php">
      <div class="input-group">
        <label for="Email">Email</label>
        <input type="text" id="username" name="email" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
     <a href="index.html" ><button type="submit" name="login_btn">Login</button></a>
    </form>
  </div>
</body>
</html>

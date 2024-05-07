<?php 

include('server/connection.php');



      // if user has already registered, then take user to account page
     if(isset($_SESSION['logged_in'])){
      header('location: account.php');
      exit;
    }


if(isset($_POST['register'])){
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

// if passwords dont match
if($password !== $confirmPassword ){
  header('location: register.php?error=passwords dont match');


// if password is last then six character
}else if(strlen($password) < 6){
  header("Location: register.php?error=password must be at least 6 characters");



// if there is no error 
}else{
// check whether there is a user with this email or not
$stmt1=$conn->prepare("SELECT  count(*) FROM users WHERE user_email = ?");
$stmt1->bind_param('s',$email);
$stmt1->execute();
$stmt1->bind_result($num_rows);
$stmt1->store_result();
$stmt1->fetch();

// if there is a user with already registered with this email
if ($num_rows != 0) {
  header('location: register.php?error=this email already exists!');

  // if email doesn't register yet
}else{

        // create a new user

        $stmt = $conn->prepare("INSERT INTO users(user_name,user_email,user_password)
                 VALUES(?,?,?)");
        $stmt->bind_param('sss',$name,$email,md5($password));

        // if account was created successfully
        if ($stmt->execute()){
            $user_id = $stmt->insert_id;
            $_SESSION['user_id']= $user_id;
            $_SESSION['user_email']= $email;
            $_SESSION['user_name']=  $name;
            $_SESSION['logged_in']= true;
            header('location: login.php?register_success=Registered successfully');

            // account could not be created
        }else{
            header('location: register.php?error=could not create an account at the moment');
        }
        }
      }
    }

?>

<?php include('layouts/header.php');?>

    <!-- Register -->
    <section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Register</h2>
    </div>
        <div class="mx-auto container">
            <form id="register-form" method="POST" action="register.php">
              <p style="color: red;"><?php if(isset($_GET['error'])) { echo $_GET['error'];}?></p>
            <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required> 
                </div>
                <br>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required> 
                </div>
                <br>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required> 
                </div>
                <br>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="Confirm Password" required> 
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn" id="register-btn" name="register" value="Register">
                </div>
                <br>
                <div class="form-group">
                    <a id="login-url" href="login.php" class="btn">Do you have an account? Login</a>
                </div>
                <br>
            </form>
        </div>
    </section>



<!-- footer -->

<?php include('layouts/footer.php');?>
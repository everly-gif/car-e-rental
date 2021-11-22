<?php
$mysqli = new mysqli('localhost','root','','car_main') or die($mysqli->connect_error);
$table = 'user_info';
$alert=false;
$erroralert=false;
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $result=$mysqli->query("SELECT * FROM `user_info` WHERE email='$email' AND password_input='$password'");
    $details=$mysqli->query("SELECT name_input,mobile_no FROM `user_info` WHERE email='$email'");
    $id=$mysqli->query("SELECT id FROM `user_info` WHERE email='$email'");
    if(mysqli_num_rows($result) == 1){
      $data=mysqli_fetch_assoc($details);
      $ID=mysqli_fetch_assoc($id);
      session_start();
      $_SESSION['loggedin']=true;
      $_SESSION['email']=$email;
      $_SESSION['mobile']=$data['mobile_no'];
      $_SESSION['username']=$data['name_input'];
      $_SESSION['user_id'] = $ID['id'];
      $alert=true;

    }
    else{
        $erroralert="Wrong Credentials, try again!";
    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car E Rental</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css?v=<?php echo time(); ?>">
</head>
<body>
   
    <nav class="topnav navbar navbar-expand-md bg-dark navbar-light">
        <div class="container">
        <a class="navbar-brand" href="index.php">Car E Rental</a>
        <ul class="navbar-nav">
            <li class="nav-item"> 
                <a class="nav-link" href="faq.php">FAQ/ Contact Us</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link" href="rentals.php">Rentals</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link" href="subscription-main.php">Subscription</a>
            </li>
            <?php  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
            echo '<li class="nav-item"> 
                <a class="nav-link active" href="login.php">Login/ Sign Up</a></li>';}
            else{echo '<li class="nav-item"> <div class="dropdown"><button class="dropbtn">&#128101;'.$_SESSION['username'].'</button>
                <div class="dropdown-content"><a class="nav-link" href="user-details.php?id='.$_SESSION['user_id'].'">Profile</a><a class="nav-link" href="logout.php">Logout</a></div>
                </div></li>';
                
            }
            ?>
            
        </ul>
    </div>
    </nav>
    <?php if($alert) {
    
    echo ' <div class="alert alert-success 
        alert-dismissible fade show" role="alert" style="margin-bottom:0px;;border-radius:0px;">

        <strong>Success!</strong> You are logged in, Happy Renting :)
        <button type="button" class="close"
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button> 
    </div> ';

    echo '<meta http-equiv="refresh" content="3;url=rentals.php" />';
    
   }
   if($erroralert) {
    
    echo ' <div class="alert alert-danger 
        alert-dismissible fade show" role="alert" style="margin-bottom:0px;border-radius:0px;"> 
       <strong>Error!</strong> '. $erroralert.'<button type="button" class="close" 
       data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">×</span> 
       </button> 
        </div> '; 
   }

?>
    <div class="main  d-flex justify-content-between">
        <div class="col-sm rounded mx-auto d-block  front-img">
            <h2 id="tr">Travelling has never been easier!</h2>
            <div>
           
            <img src="Images/photo-1506015391300-4802dc74de2e-removebg-preview.png">
            
            </div>
            <h2 id="un">Unlock exclusive deals by logging in!</h2>
        </div>
        <div class="col-sm rounded mx-auto d-block float-right form-info">
            <form class="login content" method="post">
                
                <h2>Login</h2><br><br>
                <input type="email" name="email" placeholder="Enter email" required><br>
                <input type="password" name="password" placeholder="Enter Password" required><br>
                <button type="submit" name="submit" id="login-submit">Login</button><br>
                <a href="#" class="signup-links">forgot password?</a><br>
                <p>or</p>
                <p>Don't have an account?</p>
                <a href="sign-up.php" class="signup-links">Sign Up</a>
                
            </form>
        </div>
    </div>
    <footer class="footer">
        <p id=foo1>Copyright@2021 Car E Rental</p>
        <p id="foo2">All rights reserved</p>
       </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
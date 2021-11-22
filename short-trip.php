<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car E Rental</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/short-trip.css?v=<?php echo time(); ?>">
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
                <a class="nav-link active" href="rentals.php">Rentals</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link" href="subscription-main.php">Subscription</a>
            </li>
            <?php  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
            echo '<li class="nav-item"> 
                <a class="nav-link" href="login.php">Login/ Sign Up</a></li>';}
            else{echo '<li class="nav-item"> <div class="dropdown"><button class="dropbtn">&#128101;'.$_SESSION['username'].'</button>
                <div class="dropdown-content"><a class="nav-link" href="user-details.php?id='.$_SESSION['user_id'].'" >Profile</a><a class="nav-link" href="logout.php">Logout</a></div>
                </div></li>';
            }
            ?>
        </ul>
    </div>
    </nav>
    <div class="b1">
    <h2 id="heading">Choose Location of ride</h2>
    <form action="" method="post" class="search">
     <input type="text" name="str" id="search" placeholder="Enter A Place">
     <input class ="btn btn1"type="submit" name="submit" id="submit" value="View Availability" >
    </form>
    </div>
    <div>
    <h3 style="margin-top:30px;margin-left:20px; margin-bottom:20px;">Current Best Offers</h3>
    </div>
    <?php
    $mysqli = new mysqli('localhost','root','','car_main') or die($mysqli->connect_error);
    $table = 'shortterm_cars';
    if(isset($_POST['submit'])){
        $str=mysqli_real_escape_string($mysqli,$_POST['str']);
        $str=trim($str);
        $result=$mysqli->query(" SELECT * FROM shortterm_cars where location like ('%$str%')") ;
        if (mysqli_num_rows($result)==0){
            echo "<h5 style='margin-top:30px;margin-left:20px; margin-bottom:20px;'>Desired Search Not found ! Browse through other options </h5>";
            $result=$mysqli -> query("SELECT * FROM $table") or die($mysqli->error);
        }
   }
    else{
    $result=$mysqli -> query("SELECT * FROM $table") or die($mysqli->error);
   }
   ?>
    
    <div class="content" style="margin-left:160px;">
    <div class="container" >
    <div class="row " id="myProducts" >
   
    
    <?php 
    while($data=$result->fetch_assoc()){
         
        $products[]=$data;
    }
    
    foreach($products as $product) : ?>
    <div class="col-md-3 m-3 pcard" style="background-color:#f4eeed; border-radius:10px; height: 315px; padding:20px;
    text-align:center;" >
    
        <p><?php echo $product['Model']?></p>
        <?php  echo "<img src='{$product['pic']}' width='80%' height='auto'>"; ?>
        <p style="margin:20px;"><?php echo "INR " . $product['Price']."/day"?></p>
        <?php echo "<a class='btn2 'style='border-radius: 20px;background-color:#F0C929 !important;
        color: black; padding:10px 20px;text-decoration:none;' href='short-trip-details.php?id=".$product['id']."' role='button'>". "View" . "</a>" ?>
        <div class="loc-title"><p style="margin:20px;color:#1D19BE;"><?php echo "Location: ". $product['Location']?></p></div>
    </div>

  
    <?php endforeach; ?>
    
    </div>
    </div>
    </div>
    <footer class="footer">
    <p id=foo1>Copyright@2021 Car E Rental</p>
    <p id="foo2">All rights reserved</p>
   </footer>
   <script>
   if ( window.history.replaceState ) {
   window.history.replaceState( null, null, window.location.href );
  }
   </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
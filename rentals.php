<?php session_start();?>
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
    <link rel="stylesheet" href="css/rentals.css?v=<?php echo time(); ?>">
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
    <div class="container d-flex justify-content-start">
        <div class="col-sm rounded mx-auto d-block adv">
            <p>Save Time And Money While Renting Cars</p>
            <a class="btn btn-dark btn1" href="#rental" role="button">View All Rental Plans</a>
        </div>
        <div class="col-sm rounded mx-auto d-block float-right ">
            <img src="Images/modern-blue-urban-adventure-suv-vehicle-illustration_1344-205.jpg" class="img-fluid" alt="illustrator">
        </div>
        
    </div>
    <div class="info">
        <h2>Rent with us</h2>
        <p>Renting a car has never been easier! Car E Rental offers two specific plans to suit your needs. <br>Choose a plan and start browsing through our various availabiltiy<br> to find your perfect ride.</p>
    </div>
    <!--<h2 class="heading"> Rentals we offer</h2>-->
    <div id="rental" class ="slantedDiv  d-flex justify-content-start">
    <div class="col-sm rounded mx-auto d-block adv1">
    
    <p class="bol">Short Term Trips</p>
    <p>Rent a car for a few hours to a 

        day! <br>Visit nearby famous tourist 
        
        spots or use it as a transport 
        
        for work, Short term trips are 
        
        extremely affordable with no 
        
        down payment (T&c) and less 
        
        paper work.<br>
        
        Rent a car today!</p>
        <a class="btn btn-dark btn1" href="short-trip.php" role="button">View All Cars</a>
    </div>
    <div class="col-sm rounded mx-auto d-block">
    <img id="sales" src="Images/car4-removebg-preview.png" class="img-fluid" alt="salesman">
    </div>
    </div>
    <div class=" slantedDiv1 d-flex justify-content-start b3">
    <div class="col-sm rounded mx-auto d-block quality">
    <img id="quality" src="Images/car3-removebg-preview.png" class="img-fluid" alt="quality">
    </div>
    <div class="col-sm rounded mx-auto d-block adv1 wrap">
        <p class="bol">Scheduled Round Trips</p>
        <p>Scheduled Round Trips  

            are trips that are taken 
            
            for more than a day to a week. 
            
            Family trips, long car 
            
            drives, roadtrips all  fall 
            
            into this category. We 
            
            offer such trips with 
            
            affordable prices with no 
            
            down payment(T&c) and 
            
            less paper work.<br>
            
            Rent a car Today !</p>
            <a class="btn btn-dark btnc1" href="long-trip.php" role="button">View All Cars</a>
    </div>
    </div>
    <!--<div class="foot"><marquee><p>Exclusive Deals: Get 10 % off your first rent every month!</p></marquee></div>-->
    <div class="container ad">

        <h2 class="header">Advantages while Renting with us</h2>
        <ul>
            <li>&#9989; 0% down payment policy</li>
            <li>&#9989; Get the Car dropped off at your location</li>
            <li>&#9989; Extremely affordable</li>
            <li>&#9989; Quality check of all cars before renting</li>
            <li>&#9989; Less Paperwork</li>
            

        </ul>
    </div>
    <div class="main">
    <!--<h2  id= "rent" class="heading ">Rent a car that suits your needs!</h2>-->
    
    <div class="d-flex justify-content-start adv2">
        
        <div class="col-sm rounded mx-auto d-block">
            <img src="Images/photo-1541899481282-d53bffe3c35d-removebg-preview.png" class="img-fluid" alt="cars">
        </div>
        <div class="col-sm rounded mx-auto d-block">
            <img src="Images/photo-1506015391300-4802dc74de2e-removebg-preview.png" class="img-fluid" alt="cars">
        </div>
        <div class="col-sm rounded mx-auto d-block">
            <img src="Images/photo-1605270396307-d00ba5cda1d0-removebg-preview.png" class="img-fluid" alt="cars">
        </div>
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
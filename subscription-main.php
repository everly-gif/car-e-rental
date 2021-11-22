<?php
session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <title>Car Subscriptions</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/2aeffcb656.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="subscription-main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div class="bg-image"> 

      <div class="navbar-brand">
        <a class="nav-link" href="index.php">Car E Rental</a>
      </div>
      <nav class="topnav navbar transparent navbar-expand-lg navbar-inverse ">
        <div class="container">
              <ul class="navbar-nav">
              <li class="nav-item"> 
                <a class="nav-link" href="faq.php">FAQ/ Contact Us</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link" href="rentals.php">Rentals</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link active" href="subscription-main.php">Subscription</a>
            </li>
            <?php  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
            echo '<li class="nav-item"> 
                <a class="nav-link" href="login.php">Login/ Sign Up</a></li>';}
            else{echo '<li class="nav-item"> <div class="dropdown"><button class="dropbtn">&#128101;'.$_SESSION['username'].'</button>
                <div class="dropdown-content"><a class="nav-link" href="user-details.php?id='.$_SESSION['user_id'].'" >Profile</a><a class="nav-link" href="logout.php">Logout</a></div>
                </div></li>';
            }?>
            </ul>
        </div>
      </nav>

      <div class="container">
          <div class="heading" style="font-size: 80px;">
            <br><b> THE</b><br>
            <b> REVOLUTIONARY </b><br>
            <b> NEW WAY TO OWN </b><br>
            <b> CAR </b>
          </div>
          <div class="row">
                <div class="column">
                <a class="button-link" href="best-offers.php"><button class="btn"><i class="fas fa-gift"> </i>  Best Plans/Offers</button></a>
                </div>
                <div class="column">
                <a class="button-link" href="subscribe view all cars.html"><button class="btn"><i class="fas fa-car"> </i>  View all Cars</button></a>
                </div>
          </div>
      </div>
    </div>
    <div class="container-fluid" style="background-color: white;">
          <div class="row">
            <div class="col-sm-7 col-md-8">
              <p><h2>Why Subscription Plans?</h2></p>
              <p> Having a car is a great asset in a country like India where you 
                  have limited options for public transport. The trend of car 
                  subscription is relatively new in the country altogether; however, it 
                  is becoming immensely popular due to the several merits of the 
                  idea and the practicality of the business model. Make no mistake, 
                  purchasing a car in India doesn t come cheap, regardless of the 
                  make/model. For subscription you ask? Well, for starters, there is 
                  no down payment. That s right, zero down. It s effectively like a 
                  lease except the leasing market in India is practically non existent 
                  so subscription is filling in the void. From a personal working 
                  capital perspective, it s hard to match the allure of a zero down 
                  subscription structure.
              </p>

              <p>
                  As you subscribe to a car, you can avoid any need of putting any 
                  down payment or taking a loan and therefore paying the EMI. With 
                  the car subscription, you also do not need to worry about the 
                  maintenance of the car since it will be included in the subscription 
                  fee and will be carried out by the company. The car will be picked 
                  up regularly by the executives who will take the car for 
                  maintenance and then return the car to you, all at a time that is 
                  convenient to you. 
              </p>
              <p>
                  Subscription takes this typical process and turns it on its head 
                  since all subscriptions offer full stack prices that already includes 
                  the cost of service, maintenance, insurance, registration, and 
                  taxes. That means no additional out of pocket expenses aside 
                  from fuel. Certainly much more manageable for the individual.
                  It doesn t get much better from a financial perspective. 
              </p>
            </div>
           
            <div class="col-sm-4 col-md-4">
              <div class="well">
                <p class="process1"><h2>How it works</h2></p>
                <img src="Images/choose plan.png" alt="Avatar" style="width: 100px"><br>
                <p class="process2">Choose A Plan</p><br>
                <img src="Images/payment.png" alt="Avatar" style="width:100px"><br>
                <p class="process3">Make Payment</p><br>
                <img src="Images/hassle free ride.png" alt="Avatar" style="width: 100px"><br><br>
                <p class="process4">Enjoy Hassle free ride</p><br>
              </div>
            </div>
          </div>
          <div class="intro">
            <p><h2>Can anyone take a Car Subscription?</h2></p>
            <p>
              Our car subscription plans can be enjoyed by anyone who has a valid driving license, proof 
              of residence, and proof of identity. This subscription can be enjoyed by people from all 
              classes and the various car prices usually work out for most people. The cars can be used 
              just as you would use your own vehicle including road trips to beautiful nearby places. The 
              cars are no more than two years old and in excellent maintained condition. You can get all 
              the popular makes and models of cars.
            </p><br><br><br>
          </div>
    </div>
    <div class="container-fluid" style="background-color: white;">
      <div class= "well well-lg" style="background-color: #F0C929;">
        <h1>Subscribe. Drive. Swap. Repeat.</h1>
      </div>
      <br><br><br><br>
      <div class="intro">
          <p><h2><center>Subscription Plans</center></h2></p>
      </div>
      <div class="purchase-tab">
          <div class= "well" style="background-color: #F0C929;">
              <div class="row" style="padding: 10px;">
                <div class="col-sm-6" ><h1>1 Month</h1></div>
                <div class="col-sm-2"></div>
                <div class="col-sm-4"><h5>₹10,000-₹15,000/month</h5></div>
              </div>

              <div class="row" style="padding: 10px;">
                <div class="col-sm-6" >
                  <p><h5>Purchase one time for an entire month! Book cars faster with less paper work and reseasonable prices</h5></p>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                  <a class="button-link" href="subscription-1month.php"><button class="btn-purchase">Purchase this Plan</button></a>
                </div>
              </div>
          </div><br>

          <div class= "well" style="background-color: #F4EEED;">
            <div class="row" style="padding: 10px;">
              <div class="col-sm-6" ><h1>4 Months</h1></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-4"><h5>₹40,000-₹60,000/month</h5></div>
            </div>

            <div class="row" style="padding: 10px;">
              <div class="col-sm-6" >
                <p><h5>Purchase one time for  4 months! Book cars faster with less paper work and reseasonable prices</h5></p>
              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-4">
                <a class="button-link" href="subscription-4month.php"> <button class="btn-purchase">Purchase this Plan</button></a>
              </div>
            </div>
          </div><br>

          <div class= "well" style="background-color: #F0C929;">
            <div class="row" style="padding: 10px;">
              <div class="col-sm-6" ><h1>12 Months</h1></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-4"><h5>₹1,20,000-₹1,80,000/month</h5></div>
            </div>

            <div class="row" style="padding: 10px;">
              <div class="col-sm-6" >
                <p><h5>Purchase one time for 12 months! Book cars faster with less paper work and reseasonable prices</h5></p>
              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-4">
                <a class="button-link" href="subscription-12month.php"><button class="btn-purchase">Purchase this Plan</button></a>
              </div>
            </div>
          </div><br>

          <div class= "well" style="background-color: #F4EEED;">
            <div class="row" style="padding: 10px;">
              <div class="col-sm-6" ><h1>24 Months</h1></div>
              <div class="col-sm-2"></div>
              <div class="col-sm-4"><h5>₹2,40,000-₹3,60,000/month</h5></div>
            </div>

            <div class="row" style="padding: 10px;">
              <div class="col-sm-6" >
                <p><h5>Purchase one time for  24 months! Book cars faster with less paper work and reseasonable prices</h5></p>
              </div>
              <div class="col-sm-2"></div>
              <div class="col-sm-4">
                <a class="button-link" href="subscription-24month.php"><button class="btn-purchase">Purchase this Plan</button></a>
              </div>
            </div>
          </div><br><br><br>
      </div>
    </div>
    <div class="panel-footer" style="background-color:black;"><center>
      <p style="color:#F4EEED">Copyright@2021 Car E Rental</p>
      <p style="color:#F0C929"> All rights Reserved</p></center></div>
  
  </body>
</html>
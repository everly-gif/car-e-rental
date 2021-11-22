<?php session_start();?>
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
    <link rel="stylesheet" href="css/faq.css?v=<?php echo time(); ?>">
</head>
<body>
    <nav class="topnav navbar navbar-expand-md bg-dark navbar-light">
        <div class="container">
        <a class="navbar-brand" href="index.php">Car E Rental</a>
        <ul class="navbar-nav">
            <li class="nav-item"> 
                <a class="nav-link active" href="faq.php">FAQ/ Contact Us</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link" href="rentals.php">Rentals</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link" href="subscription-main.php">Subscription</a>
            </li>
            <?php  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
            echo '<li class="nav-item"> 
                <a class="nav-link" href="login.php">Login/ Sign Up</a></li>';}
            else{echo '<li class="nav-item"> <div class="dropdown"><button class="dropbtn">&#128101;'.$_SESSION['username'].'</button>
                <div class="dropdown-content"><a class="nav-link" href="user-details.php?id='.$_SESSION['user_id'].'">Profile</a><a class="nav-link" href="logout.php">Logout</a></div>
                </div></li>';
            }
            ?>
        </ul>
    </div>
    </nav>
    <h1 style="text-align: center; margin-top: 50px;">FAQ.</h1>
    <div class="accordion container1 container" id="accordionExample">
        <div class="card border-0">
          <div class="card-header yellow" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Is there any down payment?
              </button>
            </h2>
          </div>
      
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              No, we have a 0% down payment policy, we solely rely on the rental agreement.
            </div>
          </div>
        </div>
        <div class="card border-0">
          <div class="card-header grey" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Do you accept cash on delivery?
              </button>
            </h2>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
             No, we currently don't support cash on delivery. We only support online transactions.
            </div>
          </div>
        </div>
        <div class="card border-0">
          <div class="card-header yellow" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                What modes of online transactions do you support?
              </button>
            </h2>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
              We support most of the online mode transactions( credit card, debit card, paytm, etc..). This system is intergrated with razorpay, you can visit their website to know
               more about their various payment modes and services.
            </div>
          </div>
        </div>
        <div class="card border-0">
          <div class="card-header grey" id="headingFour">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                What states can avail your service?
              </button>
            </h2>
          </div>
          <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
            <div class="card-body">
              We plan to provide our services to all states of <b>India</b> by allowing reseravation of cars <b>atleast 1-2 days before planned day of travel </b>, but currently we only support a couple of states and few locations.
              To know more about this, please visit our <a href="rentals.php">rental pages</a>, the search availabiltiy option is only enabled for these states and locations.
            </div>
          </div>
        </div>
        
        <div class="card border-0">
          <div class="card-header yellow" id="headingFive">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                Do I have to drop off  the car at the same location I picked it up from?
              </button>
            </h2>
          </div>
          <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
            <div class="card-body">
             Yes, the car must be returned where you picked it up from.
            </div>
          </div>
        </div>
        <div class="card border-0">
            <div class="card-header grey" id="headingSix">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                  Any extra charges  other than damages fine?
                </button>
              </h2>
            </div>
            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
              <div class="card-body">
               It's important to keep in mind, all type of traffic/vehicle violations if any, (even <b>delayed drop off times</b>) would make you liable to incur those charges.
              </div>
            </div>
          </div>

          <div class="card border-0">
            <div class="card-header yellow" id="heading7">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                  Can I cancel my booking and get a refund?
                </button>
              </h2>
            </div>
            <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordionExample">
              <div class="card-body">
               No, you will not be allowed to cancel the booking once the payment is made, you can however contact us and the owner to shift
               your booking to a different date and time.
              </div>
            </div>
          </div>
      </div>
      <div class="wrapper d-flex justify-content-between">
      <h2>Can't find an answer to your question?</br>
      Drop us a message!</h2>
      
      <div>
        <a class="btn btn-dark btn1" href="#contact-us" role="button">Contact us!</a>
      </div>
    </div>
    <!--
    <div class="container d-flex justify-content-between">
        <div class="col-sm rounded mx-auto d-block">
        <form id="contact-us">
        <h2>Contact us</h2>
            <input type="text" placeholder="Enter name" required><br><br>
            <input type="email" placeholder="Enter email" required><br><br>
            <input type="text" placeholder="Subject" required><br><br>
            <textarea name="message" placeholder="Write your query here" required></textarea>
        </form>
        </div>
        <div class="col-sm rounded mx-auto d-block float-right ">
            <img src="Images/email-marketing-internet-chatting-24-hours-support-get-touch-initiate-contact-contact-us-feedback-online-form-talk-customers-concept_335657-25.jpg" class="img-fluid" alt="illustrator">
        </div>
    </div>-->
    <footer class="footer">
        <p id=foo1>Copyright@2021 Car E Rental</p>
        <p id="foo2">All rights reserved</p>
       </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
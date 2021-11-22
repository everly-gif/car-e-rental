<?php
session_start();?>
<!doctype html>
<html lang="en">
    <head>
            <title>12 Months Subscription</title>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <script src="https://kit.fontawesome.com/2aeffcb656.js" crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
            <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="css/subscription 12 months.css?v=<?php echo time();?>">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
      
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <nav class="topnav navbar navbar-expand-md bg-light navbar-light">
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

        <div class="container open-benefits car-sub-open-benefits">
            
            <div class="section-two">
                <div class="row about-section">
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <br>
                        <br>
                        <h2 class="what-is-revv"><span>What is a Car Subscription?</span></h2>
                        <p>It’s a different way of owning a car, without any down payment or car loan. Your monthly fee covers insurance, service &amp; maintenance. Plus, there are no long term commitments - you can return, extend or buy-out the car when you want. And all this at a price cheaper than an EMI! 
                            <br><br>
                        </p>
                        <div class="section-one"><h2>Subscription benefits</h2><br>
                            <div class="highlighter">
                                <div class="row">
                                    <div class="col-sm-6"><img src="Images/zero.svg"><span class="open-benefits-title">No Down Payment</span>
                                    </div>
                                    <div class="col-sm-6"><img src="Images/cheaper.svg"><span class="open-benefits-title">Cheaper than EMI</span>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-sm-6"><img src="Images/maintainance.svg"><span class="open-benefits-title">Free Service <br> & maintenance</span>
                                    </div>
                                    <div class="col-sm-6"><img src="Images/return.svg"><span class="open-benefits-title">Extend or <br> return anytime</span>
                                    </div>
                                </div><br><br><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12">
                        <img src="Images/subscribe car.png">
                    </div>
                </div>
            </div>
            
        </div><br><br>
        <div class="b1">
            <h2 id="heading"><b>Cars at affordable Price</b></h2>
            <form class="search">
             <input type="text"  id="search" placeholder="Search by Car Brand">
             <button class ="btn btn1"type="submit" id="submit" value="Search" ><i class="fa fa-search" aria-hidden="true"></i>  Search</button>
            </form>
        </div>
            <br><br>
            <p><h2 style="padding: 40px;">Most Preferred:</h2></p>
        <div class="container-fluid d-flex justify-content-center">
            <div class="row mt-5">
                <div class="col-sm-4">
                    <div class="card"> <img src="Images/Maruti alto k10.jpg" class="card-img-top" width="100%">
                        <div class="card-body pt-0 px-0">
                            <div class="d-flex flex-row justify-content-between mb-0 px-3"><h5><b>Maruti Alto K-10</b></h5>
                                <h6>₹1,42,788/year</h6>
                            </div>
                            <hr class="mt-2 mx-3">
                            <div class="d-flex flex-row justify-content-between px-3 pb-4">
                                <div class="d-flex flex-column"><span class="text-muted">Fuel Efficiency</span><small class="text-muted">kmpl</small></div>
                                <div class="d-flex flex-column">
                                    <h5 class="mb-0">24.01-24.07</h5><small class="text-muted text-right">(Manual)</small>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between p-3 mid">
                                <div class="d-flex flex-column"><small class="text-muted mb-1">ENGINE</small>
                                    <div class="d-flex flex-row"><img src="Images/engine.jpg" width="35px" height="25px">
                                        <div class="d-flex flex-column ml-1"><small class="ghj">1.0L 67.1bhp</small><small class="ghj">12V Series Petrol Engine</small></div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column"><small class="text-muted mb-2">MAX POWER</small>
                                    <div class="d-flex flex-row"><img src="Images/meter.jpg">
                                        <h6 class="ml-1">67 bhp @ 6000 RPM</h6>
                                    </div>
                                </div>
                            </div> <small class="text-muted key pl-3">Standard key Features</small>
                            <div class="mx-3 mt-3 mb-2"><a class="button-link" href="#"><button type="button" class="btn btn-danger btn-block"><small>Choose</small></button></a></div> <small class="d-flex justify-content-center text-muted">*Legal Disclaimer</small>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card"> <img src="Images/hyundai eon.jpg" class="card-img-top" width="100%">
                        <div class="card-body pt-0 px-0">
                            <div class="d-flex flex-row justify-content-between mb-0 px-3"><h5><b>Hyundai Eon</b></h5>
                                <h6>₹1,49,988/year</h6>
                            </div>
                            <hr class="mt-2 mx-3">
                            <div class="d-flex flex-row justify-content-between px-3 pb-4">
                                <div class="d-flex flex-column"><span class="text-muted">Fuel Efficiency</span><small class="text-muted">kmpl</small></div>
                                <div class="d-flex flex-column">
                                    <h5 class="mb-0">20.3-21.1</h5><small class="text-muted text-right">(Manual)</small>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between p-3 mid">
                                <div class="d-flex flex-column"><small class="text-muted mb-1">ENGINE</small>
                                    <div class="d-flex flex-row"><img src="Images/engine.jpg" width="35px" height="25px">
                                        <div class="d-flex flex-column ml-1"><small class="ghj">0.8L 55.2bhp</small><small class="ghj">9V Petrol Engine</small></div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column"><small class="text-muted mb-2">MAX POWER</small>
                                    <div class="d-flex flex-row"><img src="Images/meter.jpg">
                                        <h6 class="ml-1">55 bhp @ 5500 RPM</h6>
                                    </div>
                                </div>
                            </div> <small class="text-muted key pl-3">Standard key Features</small>
                            <div class="mx-3 mt-3 mb-2"><a class="button-link" href="#"><button type="button" class="btn btn-danger btn-block"><small>Choose</small></button></a></div> <small class="d-flex justify-content-center text-muted">*Legal Disclaimer</small>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card"> <img src="Images/mahindra kuv.jpg" class="card-img-top" width="100%">
                        <div class="card-body pt-0 px-0">
                            <div class="d-flex flex-row justify-content-between mb-0 px-3"><h5><b>Mahindra KUV-100</b></h5>
                                <h6>₹1,59,588/year</h6>
                            </div>
                            <hr class="mt-2 mx-3">
                            <div class="d-flex flex-row justify-content-between px-3 pb-4">
                                <div class="d-flex flex-column"><span class="text-muted">Fuel Efficiency</span><small class="text-muted">kmpl</small></div>
                                <div class="d-flex flex-column">
                                    <h5 class="mb-0">18.5</h5><small class="text-muted text-right">(Combined)</small>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between p-3 mid">
                                <div class="d-flex flex-column"><small class="text-muted mb-1">ENGINE</small>
                                    <div class="d-flex flex-row"><img src="Images/engine.jpg" width="35px" height="25px">
                                        <div class="d-flex flex-column ml-1"><small class="ghj">1.2L 82bhp</small><small class="ghj">12V mFALCON G80 Engine</small></div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column"><small class="text-muted mb-2">MAX POWER</small>
                                    <div class="d-flex flex-row"><img src="Images/meter.jpg">
                                        <h6 class="ml-1">82 bhp @ 5500RPM</h6>
                                    </div>
                                </div>
                            </div> <small class="text-muted key pl-3">Standard key Features</small>
                            <div class="mx-3 mt-3 mb-2"><a class="button-link" href="#"><button type="button" class="btn btn-danger btn-block"><small>Choose</small></button></a></div> <small class="d-flex justify-content-center text-muted">*Legal Disclaimer</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-3 mt-3 mb-2"><a class="button-link" href="subscribe view all cars.html"><button type="button" class="btn btn-danger btn-block"><i class="fas fa-car"> </i><small> View All Cars</small></button></a></div>
        </div>
        <div class="container-process">
        <p><h2 style="padding: 40px;"><b>How it Works</b></h2></p>
        <div><div style="width: 100%; position: relative; text-align: initial;">
            <div class="tab-content-section" style="padding: 40px;">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="left-icon"><img src="Images/img1.svg"></div>
                        <div class="img-details"><img src="Images/1.png" style="width: 62px; top: -12px; position: relative;">
                            <div class="details"><h5>Select &amp; Reserve</h5><p>Pick your car model and reserve online</p>
                            </div>
                        </div>
                 </div>
                
                
                    <div class="col-sm-6">
                        <div class="left-icon"><img src="Images/img2.svg"></div>
                        <div class="img-details"><img src="Images/2.png" style="width: 62px; top: -12px; position: relative;">
                            <div class="details"><h5>Super Fast Processing</h5><p>We will call you to understand your preferences, basic KYC, Refundable Security Deposit etc. (No CIBIL Check Required)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="left-icon"><img src="Images/img3.svg"></div>
                        <div class="img-details"><img src="Images/3.png" style="width: 62px; top: -12px; position: relative;">
                            <div class="details"><h5>Preparing Your Car</h5><p>After detailed quality checks and deep cleaning, your car is ready for delivery within 10-14 days</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="left-icon"><img src="Images/img4.svg"></div>
                        <div class="img-details"><img src="Images/4.png" style="width: 62px; top: -12px; position: relative;">
                            <div class="details"><h5>Home Delivery</h5><p>Get your car delivered at your doorstep</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="left-icon"><img src="Images/img5.svg"></div>
                        <div class="img-details"><img src="Images/5.png" style="width: 62px; top: -12px; position: relative;">
                            <div class="details"><h5>Hassle Free Experience</h5><p>Enjoy your car! We'll take care of routine service &amp; insurance claims with doorstep service</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="left-icon"><img src="Images/img6.svg"></div>
                        <div class="img-details"><img src="Images/6.png" style="width: 62px; top: -12px; position: relative;">
                            <div class="details"><h5>Return Anytime or Extend</h5><p>Continue using the car or return it anytime.</p>
                            </div>
                        </div>
                    </div>
                </div>
        
        </div>
    </div>
    <div style="width: 100%; position: relative; text-align: initial; height: 0px; overflow: hidden;">
        <div></div></div><div style="width: 100%; position: relative; text-align: initial; height: 0px; overflow: hidden;"><div></div></div><div style="width: 100%; position: relative; text-align: initial; height: 0px; overflow: hidden;"><div></div></div><div style="width: 100%; position: relative; text-align: initial; height: 0px; overflow: hidden;"><div></div></div></div>
        </div>   

<div class="panel-footer" style="background-color:black;"><center>
            <p style="color:#F4EEED">Copyright@2021 Car E Rental</p>
            <p style="color:#F0C929">All Rights Reserved</p></center>
        </div>
        
    </body>
</html>
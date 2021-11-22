<?php
session_start();
$alert=false;
$erroralert=false;
$order_id=false;
$days=false;
$mysqli = new mysqli('localhost','root','','car_main') or die($mysqli->connect_error);

if(isset($_POST['submit'])){
    $name=$_SESSION['username'];
    $mobile=$_SESSION['mobile'];
    $email=$_SESSION['email'];
    $userid=$_SESSION['user_id'];
    $carid=$_GET['id'];
    $date= mysqli_real_escape_string($mysqli,$_POST['date']);
    $date=trim($date);
    $date= date('Y-m-d',strtotime($date));
    $pt= mysqli_real_escape_string($mysqli,$_POST['pt']);
    $pt=trim($pt);
    $add=mysqli_real_escape_string($mysqli,$_POST['address']);
    $add=trim($add);
    $days=mysqli_real_escape_string($mysqli,$_POST['days']);
    $days=trim($days);
    $t_d=date('Y-m-d',strtotime('+'.($days-1). 'day', strtotime($date)));
    $dt=mysqli_real_escape_string($mysqli,$_POST['dt']);
    $dt=trim($dt);
    $travel=mysqli_real_escape_string($mysqli,$_POST['travel']);
    $travel=trim($travel);
    $ar=array();
    $query=$mysqli->query("SELECT * FROM `longtrip_bookings` WHERE (from_d BETWEEN '$date' AND '$t_d') AND (car_id='$carid')");
    $q=$mysqli->query("SELECT from_d,to_d FROM `longtrip_bookings` WHERE car_id='$carid'");

    if(mysqli_num_rows($q)>0){
    while($data=$q->fetch_assoc()){

        for($i = new DateTime( $data['from_d']); $i <= new DateTime( $data['to_d']); $i->modify('+1 day')){
            array_push($ar, $i->format("Y-m-d"));
        }
    }
}
    if(mysqli_num_rows($query)==0 && !in_array($date,$ar)){
        $data=$mysqli->query("INSERT INTO `longtrip_bookings`(`order_id`, `user_id`, `name`, `mobile`, `email`, `car_id`, `from_d`, `p_time`, `address`, `d_time`, `to_d`, `t_loc`, `paid`, `delivered`, `pay_id`, `timestamp`) VALUES('','$userid','$name','$mobile','$email','$carid','$date','$pt','$add','$dt','$t_d','$travel','N','N','No payment id',NOW())");
        $order_id = $mysqli->insert_id;
        if($data){
            $alert="These dates are available and locked for you, Please go ahead and make your payment <strong>within 3 mins</strong>
            otherwise these dates will be unlocked.<br>";
        }
        else{
            $erroralert="Your reservation failed";
        }
    }
    else{
       $erroralert="Looks like these dates are locked by someone ahead of you! come back 3 mins later to see if these dates <br> get unlocked. You can browse other availabilities while you wait :)";
    }

} 
?>
<?php 
$mysqli = new mysqli('localhost','root','','car_main') or die($mysqli->connect_error);
$pay=false;
if(isset($_POST['pay_id'])){
$pay=$_POST['pay_id'];
$order=$_POST['order_id'];
$qu=" UPDATE `longtrip_bookings` SET `paid`='Y',`pay_id`='$pay' WHERE `order_id`='$order' ";
$payment=mysqli_query($mysqli, $qu);

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
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
  
    <link rel="stylesheet" href="css/details.css?v=<?php echo time(); ?>">
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
            }?>
        </ul>
    </div>
    </nav>
    <?php if($alert) {
    
    echo ' <div class="alert alert-success 
        alert-dismissible fade show" id="alert" role="alert" style="margin-bottom:0px;;border-radius:0px;">
        <strong>Success!</strong>'. $alert.' 
        <button id="#rzp-button1" type="button" style="margin-top:20px;background-color:#4CAF50; color: white;margin-top:20px;
        border-radius: 20px;padding: 15px 32px;outline:none;text-align: center;
        text-decoration: none;
        display: inline-block;border:none;cursor:pointer;">Pay
        </button> 
        <button type="button" class="close" 
       data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">×</span> 
       </button> 
    </div> ';

   echo '<meta http-equiv="refresh" content="180;url=long-trip-details.php?id='.$carid. '"/>';
   
    
   }
   if($erroralert) {
    
    echo ' <div class="alert alert-danger 
        alert-dismissible fade show" role="alert" style="margin-bottom:0px;border-radius:0px;"> 
       <strong>Error!</strong> '. $erroralert.'<button type="button" class="close" 
       data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">×</span> 
       </button> 
        </div> '; 
   }?>
<div>
<div class=" main d-flex justify-content-between" style="">
<?php
$mysqli = new mysqli('localhost','root','','car_main') or die($mysqli->connect_error);
$table = 'longtrip';
$price=false;
if(isset($_GET['id']) && $_GET['id']>0){
    $id=mysqli_real_escape_string($mysqli,$_GET['id']);
    $sql="SELECT Model, pic, Price, Car_engine_size, No_of_airbags, Brake_horsep, Seats, Car_desc, Owner_name, Owner_email, Owner_mobile, Available FROM $table WHERE id='$id'";
    $result=$mysqli->query($sql);
    if(mysqli_num_rows($result)>0){
    $data=mysqli_fetch_assoc($result);
    $price=$data['Price'];
    echo "<div style=' margin:50px; margin-top:100px;width:33.33%; padding:20px;'>";
    echo "<h2 style='text-decoration:underline; font-family: 'Orelega One', cursive;'>". $data['Model'] ."</h2>";
    echo "<h5 >"."INR ". $data['Price'] . "/week"."</h5>";
    echo "<br>";
    echo "<p style='font-size:1.1rem;'>"."Car Engine Capacity: ". $data['Car_engine_size']."</p>";
    echo "<br>";
    echo "<p style='font-size:1.1rem;'>"."No. of Air Bags: ". $data['No_of_airbags']."</p>";
    echo "<br>";
    echo "<p style='font-size:1.1rem;'>"."BHP: ". $data['Brake_horsep']."</p>";
    echo "<br>";
    echo "<p style='font-size:1.1rem;'>"."Seats: ". $data['Seats']."</p>";
    echo "<br>";
    echo "</div>";
    echo "<div class='d-flex flex-column justify-content-center align-items-center' style='width:33.33%;background-color:#ffffff;'>";
    echo "<div >";
    echo "<img src='{$data['pic']}'  style='width: 514px;height: auto;left: 0px;top: 120px; margin-left:-100px;
    margin-right: auto;'  >";
    echo "</div>";
    echo "</div>";
    echo "<div style='margin:50px;margin-left:20px;margin-top:100px; width:33.33%; padding:20px;'>";
    echo "<div>";
    echo "<p>"."Availability: "."<strong>". $data['Available']."</strong>"."</p>";
    echo "<p style='line-height:2'>"."Car Description: " . $data['Car_desc']."</p>";
    echo "</div>";
    
   
    }
    else{
        header('location:long-trip.php');
        die();
    }
}
?>


<form method="post"  id="dateform">
<?php date_default_timezone_set('Asia/Kolkata');?>
<label style="margin:2px;">From</label>
<br>
<div class="col-md"style="width:100%;">
           
            
<input type='text' id="datetimepicker" style="width:100%;margin-left:-12px;" name="date" onkeydown="return false" class="assertive form-control" autocomplete="off" placeholder="dd-mm-yyyy" required >
                    
                
</div>
<label>Pickup time (24 hr format)</label>
<input type="time" id="pt" name="pt" style="margin-left:-2px;" required>
<?php if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){

echo '<a class="btn btn-dark btn1" href="login.php" role="button" style="margin-top:-2px;">Login to continue</a>';
}
else{
    echo '<input class ="btn btn1"  type="button" name="popup" id="popup" value="Book this Car" style="margin-top:0px;margin-left:20px;">
    <br>
    <br><small>*The payment gateway opens after successfull submission of details and you will have 3 mins <br>to make your payment.</small>';
    
}
?>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="padding:20px;">
    <span class="close">&times;</span>
    <p><em>Few more details and we'll reserve the car for you</em></p>
    <div>
        <div class="d-flex justify-content-between">
        <div style="width:70%;">
       
        <label>Pickup & Drop off Address</label>
        <br>
        <input type="text" name="address" id="address" required>
        <br>
        <label>How many days you plan to rent the car</label>
        <br>
        <input type="number" autocomplete="off" min="2" name="days" max="7" id="days" required>
        <br>
        <label>Drop off time (24 hr format)</label>
        <br>
        <input type="time" id="dt" name="dt" required>
        <br>
        <label>Location of travel</label>
        <br>
        <input type="text" autocomplete="off" id="travel" name="travel" required>
        <br>
        </div>
        <div style="float:right;"> <textarea readonly class="scrollable">CAR RENTAL AGREEMENT
This agreement is hereby made between you (hereafter referred to as "the Renter") and Car E Rental (hereafter referred to as "the Owner").
The Owner hereby agrees to rent this vehicle to the Renter:

The Renter will rent the car from the chosen date and time.

Car E Rental will do quality checks before each rental but as the renter do take safety precautions and quality checks at the time of delivery.

The Renter agrees to return the vehicle in its current condition (minus normal road wear-and-tear) to the Owner on the return date hour and location, with {fuel expectation}.

The Renter understands that the vehicle is for use only in locations submitted by you and cannot be taken to other locations.

The Renter swears to rent the car for travelling purpose only and not to use for any other purpose (such as for his own renting business, etc.).

The Renter swears and attests that he/she has a legal, valid license to drive this type of vehicle in this state/country, and that there are no outstanding warrants against said license. If the license has been expired or compromised, please update the license in your profile before making this purchase.

The Renter validates their license details submitted. The Renter further swears and attests that {he/she} has insurance that will cover the operation of this vehicle.

The license and issurance is supposed to be brought at time of delivery for verification and if found not legitimate, the owner owns rights to not rent the car.

The Renter agrees not to allow any other person to drive the vehicle, except for authorized driver who this agreement standsby.

The Renter agrees to use the vehicle only for routine, legal purposes (personal or business). The Renter further agrees to follow all city, state, county, and government rules and restrictions regarding use and operation of the vehicle.

The Renter agrees to hold harmless, indemnify, and release the Owner for any damages, injuries, property loss, or death caused while the Renter operates this vehicle. The Renter will be held accountable for any damages or cleaning fees incurred while renting the vehicle. The Renter has had the opportunity to inspect the vehicle before the renting term begins and confirms that it is in good operable condition.

The Renter attests every information provided is true and accurate to his/her best ability, and will not be changed under any condition when these details are submitted.

The Owner swears and attests that the vehicle is in good working order and has no liens or encumbrances. </textarea>
<div>
<input type="checkbox" id="agree" name="agree" value="agree" required>
<label for="agree" style="margin-top:2px;"> By checking this, you are binded by this agreement</label><br></div>
<input class="btn" id="submit" type="submit"  name="submit" value="Proceed" style="background-color:#000000;color:#F0C929;">


</div>

</div><!--form-->
  </div>

</div>

</form>
</div>
</div>

</div>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("popup");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<footer class="footer">
    <p id=foo1>Copyright@2021 Car E Rental</p>
    <p id="foo2">All rights reserved</p>
   </footer>
<script>
  if ( window.history.replaceState ) {
   window.history.replaceState( null, null, window.location.href );
  }
</script>

<?php
$j_ar=array();
$mysqli = new mysqli('localhost','root','','car_main') or die($mysqli->connect_error);
$carid=$_GET['id'];
$query=$mysqli->query("SELECT from_d,to_d FROM `longtrip_bookings` WHERE car_id='$carid'");


if(mysqli_num_rows($query)>0){
while($data=$query->fetch_assoc()){

    for($i = new DateTime( $data['from_d']); $i <= new DateTime( $data['to_d']); $i->modify('+1 day')){
        array_push($j_ar, $i->format("Y-m-d"));

    }
}
}
?>

<script type="text/javascript">
    $(function () {
          var jquery_disabledDate = <?php echo json_encode($j_ar);?>;
        $('#datetimepicker').datetimepicker({
            minDate: moment().add(1,'days'), // Current day
            maxDate: moment().add(30, 'days'),
            disabledDates: jquery_disabledDate,
            format: 'DD-MM-YYYY',
            useCurrent:false,
            icons: {
                time: 'fa fa-clock-o',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-arrow-circle-left',
                next: 'fa fa-arrow-circle-right',
                today: 'fa fa-check',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            }
        });
    });
</script>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "", // Enter the Key ID generated from the Dashboard
    "amount":  "100", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Rolling wheels",
    "description": "Rent Cars Smarter",
    "image": "Images/logo.jpeg",
     //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){

        if (response.razorpay_payment_id) {
                jQuery.ajax({
                         url:"",
                         cache: false,
                         type: "POST",
                         data: {
                                order_id:<?php echo $order_id;?>,
                                pay_id: response.razorpay_payment_id,
                        },
                        success: function() { 
                            setTimeout(function () {
                            // Closing the alert
                            $('#alert').alert('close');
                            });
                        swal("Your car is reserved!", "check profile dashboard for more details", "success")
                        .then((value) => {
                            window.location = "<?php echo 'user-details.php?id='.$_SESSION['user_id'];?>";
                            });
                                
                       }
                    });
            
                    
        }
    },
    "prefill": {
        "name": "<?php echo $_SESSION['username'];?>",
        "email": "<?php echo $_SESSION['email'];?>",
        "contact": "<?php echo "+91".$_SESSION['mobile'];?>"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#4CAF50"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
    swal("Oops",response.error.reason,"error");
});
document.getElementById('#rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
$(document).on('click', '#rzp-button1', function() {
    modal.style.display = "none";

});


</script>


<?php //echo (($price/7)*$days)*100;?>

</body>
</html>
<?php session_start();
if(!isset($_SESSION['username']) && ($_SESSION['user_id'] != true))
{
     header("Location:index.php"); //Do not allow  access.
     exit;}
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
    <link rel="stylesheet" href="css/user.css?v=<?php echo time(); ?>">
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
            <li class="nav-item" style="margin-bottom:0;"> 
                <a class="nav-link" href="subscription-main.php">Subscription</a>
            </li>
            <?php  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
            echo '<li class="nav-item"> 
                <a class="nav-link " href="login.php">Login/ Sign Up</a></li>';}
            else{echo '<li class="nav-item"> <div class="dropdown"><button class="dropbtn">&#128101;'.$_SESSION['username'].'</button>
                <div class="dropdown-content"><a class="nav-link" href="user-details.php?id='.$_SESSION['user_id'].'">Profile</a><a class="nav-link" href="logout.php">Logout</a></div>
                </div></li>';
            }
            ?>
            
        </ul>
    </div>
    </nav>
<div class="d-flex">
<?php 
$mysqli = new mysqli('localhost','root','','car_main') or die($mysqli->connect_error);
$table = 'user_info';
if(isset($_GET['id']) && $_GET['id']>0 && $_SESSION['user_id'] == $_GET['id']){
$id=mysqli_real_escape_string($mysqli,$_GET['id']);
$sql="SELECT name_input,email,license_number,expiry_date_input,mobile_no FROM $table WHERE id='$id'";
$result=$mysqli->query($sql);
if(mysqli_num_rows($result)>0){
    $data=mysqli_fetch_assoc($result);
    echo "<div class=' main container ' style='margin-top:60px;width:30%;margin-left:50px; '>
    <h1>Welcome, ".$data['name_input']."</h1><div style='width:90%;text-align:center;'><img class='img-fluid'src='Images/user-profile-removebg-preview.png' style='width:50%; margin-top:15px;'></div><div style='margin-top:40px;font-size:1.2vw;'><p>Email id: ".$data['email']."</p>
    <p>License Number: ".$data['license_number']."</p><p>Expiry Date: ".date('d-M-Y', strtotime($data['expiry_date_input']))."</p><p>License copy : <span style='color:green;'>Submitted</span></p><p>Mobile no: ".$data['mobile_no']."</p></div><div style='margin-bottom:50px;' ><br><a style='margin-left:0px;display: block;
    width: 90%;text-align:center;text-decoration:none;' id='myBtn' href='update-details.php?id=".$id."'class='change' role='button'>Update details</a></div>
    </div>";
}
}
else{
    header("Location:index.php"); //Do not allow access.
    exit;
}?>


<div style="width:70%;border-left:4px solid #F4EEED;padding:20px;"><div><div class="container main" style="margin-top:50px;"><h3>Your current live bookings</h3></div><div style="min-height:200px; box-shadow: 0px 0px 10px #F0C929;border-radius:29px;" class="main">

<div style="padding:15px;margin-top:10px;">
<p><b>Short Trip Bookings</b></p>
<table class="table" >
<thead style="background-color:#F0C929 !important;">
  <tr>
    <th scope="col">Order ID</th>
    <th scope="col">Payment ID</th>
    <th scope="col">Booking Date</th>
    <th scope="col">Car Model</th>
    <th scope="col">Status</th>
  </tr>
</thead>
<tbody>
<?php $mysqli = new mysqli('localhost','root','','car_main') or die($mysqli->connect_error);
$userid=$_SESSION['user_id'];
$query=$mysqli->query("SELECT order_id,pay_id,b_date,car_id FROM `shorttrip_bookings` WHERE `user_id`='$userid' AND paid='Y' AND delivered='N'");
$model=false;
if(mysqli_num_rows($query)>0){
while($data=mysqli_fetch_assoc($query)){
$carid=$data['car_id'];
$q=$mysqli->query("SELECT Model FROM `shortterm_cars` WHERE `id`=$carid");
if($d=mysqli_fetch_assoc($q)){
    $model=$d['Model'];
}
echo '

  <tr>
    <th scope="row">rollingwheels_'.$data['order_id'].'xzy795</th>
    <td>'.$data['pay_id'].'</td>
    <td>'.date('d-M-Y', strtotime($data['b_date'])).'</td>
    <td>'.$model.'</td>
    <td>Not delivered</td>

  </tr>';

}
}
else{
    echo '

  <tr>
    <th scope="row">-</th>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>

  </tr>';

}
?>
</tbody>
</table>
</div>
<div  style="padding:10px;margin-top:10px;">
<p><b>Scheduled Round Trip Bookings</b></p>
<table class="table" >
<thead style="background-color:#F0C929 !important;">
  <tr>
    <th scope="col">Order ID</th>
    <th scope="col">Payment ID</th>
    <th scope="col">Booking Date</th>
    <th scope="col">Car Model</th>
    <th scope="col">Status</th>
  </tr>
</thead>
<tbody>
<?php $mysqli = new mysqli('localhost','root','','car_main') or die($mysqli->connect_error);
$userid=$_SESSION['user_id'];
$query=$mysqli->query("SELECT order_id,pay_id,from_d,to_d,car_id FROM `longtrip_bookings` WHERE `user_id`='$userid' AND paid='Y' AND delivered='N'");
$model=false;
if(mysqli_num_rows($query)>0){
while($data=mysqli_fetch_assoc($query)){
$carid=$data['car_id'];
$q=$mysqli->query("SELECT Model FROM `longtrip` WHERE `id`=$carid");
if($d=mysqli_fetch_assoc($q)){
    $model=$d['Model'];
}
echo '

  <tr>
    <th scope="row">rollingwheels_'.$data['order_id'].'xzy795</th>
    <td>'.$data['pay_id'].'</td>
    <td>'.date('d-M-Y', strtotime($data['from_d'])).'<br>to <br>'.date('d-M-Y', strtotime($data['to_d'])).'</td>
    <td>'.$model.'</td>
    <td>Not delivered</td>

  </tr>';

}
}
else{
    echo '

  <tr>
    <th scope="row">-</th>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>

  </tr>';

}
?>
</tbody>
</table>
</div>
</div>
</div>
<h3 style="margin-top:30px;" class="container main"> Your Current Subscriptions</h3><div class="main"style="min-height:200px; box-shadow: 0px 0px 10px #F0C929;border-radius:29px;"><!--<p>Your subscriptions will show up here</p>--></div></div></div>

</div>

<div class="wrapper d-flex justify-content-between" style="background-color:#F0C929;">
      <h2>Want to delete your account?</br>
      Contact us!</h2>
      
      <div>
        <a class="btn btn-dark btn1" href="#contact-us" role="button">Contact us!</a>
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

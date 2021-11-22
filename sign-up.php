<?php
$mysqli = new mysqli('localhost','root','','car_main') or die($mysqli->connect_error);
$table = 'user_info';
$alert=false;
$erroralert=false;
if(isset($_POST['submit'])){
$name=mysqli_real_escape_string($mysqli,$_POST['name']);
$name=trim($name);
$email=mysqli_real_escape_string($mysqli,$_POST['email']);
$email=trim($email);
$password=mysqli_real_escape_string($mysqli,$_POST['password']);
$password=trim($password);
$license_no=mysqli_real_escape_string($mysqli,$_POST['ln']);
$license_no=trim($license_no);
$expiry=mysqli_real_escape_string($mysqli,$_POST['ed']);
$expiry=trim($expiry);
$filename=$_FILES['file']['name'];
$filetmp=$_FILES['file']['tmp_name'];
$filename= rand(1,100).'-'.time().'-'.$filename;
move_uploaded_file($filetmp,"license-uploads/".$filename);
$mobile=mysqli_real_escape_string($mysqli,$_POST['mobile']);
$mobile=trim($mobile);
$unique=$mysqli->query("SELECT * FROM `user_info` WHERE email='$email' OR license_number='$license_no' OR mobile_no='$mobile'");
if(mysqli_num_rows($unique) == 0){
$result=$mysqli->query("INSERT INTO `user_info` (`id`, `name_input`, `email`, `password_input`, `license_number`, `expiry_date_input`, `license_copy`, `mobile_no`) VALUES (NULL, '$name', '$email', '$password', '$license_no', '$expiry', CONCAT('license-uploads/','$filename'), '$mobile')");
if($result){
    $alert=true;
}
else{
    $erroralert="Something Went Wrong :(";
}
}
else{
    $erroralert="This email id, license or mobile number is already registered.";
}


}
?><!DOCTYPE html>
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
    <link rel="stylesheet" href="css/signup.css?v=<?php echo time(); ?>">
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
            <li class="nav-item"> 
                <a class="nav-link active" href="login.php">Login/ Sign Up</a>
            </li>
        </ul>
    </div>
    </nav>
    <?php if($alert) {
    
    echo ' <div class="alert alert-success 
        alert-dismissible fade show" role="alert" style="margin-bottom:0px;;border-radius:0px;">

        <strong>Success!</strong> Your account is 
        now created and you can login. 
        <button type="button" class="close"
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button> 
    </div> ';
    echo '<meta http-equiv="refresh" content="3;url=login.php" />';
     
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
            <form class="login" method="POST" enctype="multipart/form-data">
                
                <h2 id="form-header">Sign Up</h2><br><br>
                <div class="content">
                <div class="con">
                <label>Name </label>
                <input type="text" placeholder="Enter Name" id="name" name="name" required>
                </div>
                <div class="con">
                <label>Email Id</label>
                <input type="email" placeholder="Enter email" id="email" name="email" required>
                </div>
                <div class="con">
                <label>Password</label>
                <input type="password" placeholder="Enter Password" id="password" name="password" required>
                </div>
                <div class="con">
                <label>License details</label>
                <input type="text" placeholder="License Number" id="ln" name="ln" required>
                </div>
                <div class="con">
                <label> Expiry date</label>
                <input type="month" min="<?php echo date('M');?>" id="ed" name="ed">
                </div>
                <div class="con file-input">
                <div>
                <p>Attach a <br>soft-copy <br>of license</p>
                </div>
                <div>
                <label>Select File  <input type="file" placeholder="" id="license" name="file" required></label>
                </div>
                </div>
                <div class="cont">
                <span>Filename: </span><span style="" class="file-name"> No file choosen</span>
                </div>
                <div class="con">
                <label>Mobile number</label>
                <input type="tel" pattern="[0-9]{10}" placeholder="Enter number" id="mn" name="mobile" required>
                </div>
                <div class="con">
                <input type="checkbox" style="margin-top:24px;margin-right:2px;" name="agree" id="agree" value="agree" required>
                <label for="agree" ><small>I attest all the details mentioned above are accurate to my best ability,<br> I further attest I am a citizen of India , who is atleast 18 years old and<br> below 60 years old</small></label>
                </div>
                <button type="submit" id="login-submit" name="submit">Sign Up</button><br>
                <div class="form-footer">
                <p>Already Have an account?</p>
                <a href="login.php" class="signup-links">Log in</a>
               </div>
            </div>
            </form>
        </div>
    </div>
    <footer class="footer">
        <p id=foo1>Copyright@2021 Car E Rental</p>
        <p id="foo2">All rights reserved</p>
    </footer>
    <script>
        const file = document.querySelector('#license');
        file.addEventListener('change', (e) => {
        // Get the selected file
        const [file] = e.target.files;
        // Get the file name and size
        const { name: fileName} = file;
        // Convert size in bytes to kilo bytes
        // Set the text content
        const fileNameAndSize = `${fileName}`;
        document.querySelector('.file-name').textContent = fileNameAndSize;
        });
    </script>
    
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
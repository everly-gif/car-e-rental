<?php session_start();
if(!isset($_SESSION['username']) && ($_SESSION['user_id'] != true))
{
     header("Location:index.php"); //Do not allow  access.
     exit;}
?>

<?php
    $mysqli = new mysqli('localhost','root','','car_main') or die($mysqli->connect_error);
    $table = 'user_info';
    $alert=false;
    $alert1=false;
    $alert2=false;
    $erroralert=false;
    $id=mysqli_real_escape_string($mysqli,$_GET['id']);
    if(isset($_POST['submit0'])){
            $email=mysqli_real_escape_string($mysqli,$_POST['email']);
            $email=trim($email);
            $unique=$mysqli->query("SELECT * FROM `user_info` WHERE email='$email'");
            if(mysqli_num_rows($unique)==0){
            $result=$mysqli->query("UPDATE `user_info` SET `email`='$email' WHERE `id`='$id'");
            $query=$mysqli->query("UPDATE `longtrip_bookings` SET `email`='$email' WHERE `user_id`='$id'");
            $q=$mysqli->query("UPDATE `shorttrip_bookings` SET `email`='$email' WHERE `user_id`='$id'");
            if($result && $query && $q){
                
                $alert2="Updated Email Successfully";
            }
            else{
                $erroralert="Something went wrong";
            }
         
    
            }
            else{
                $erroralert="Email Id is already registered";
            }
        
        }


    if(isset($_POST['submit1'])){
   
        $mobile=mysqli_real_escape_string($mysqli,$_POST['mobile']);
        $mobile=trim($mobile);
        $unique=$mysqli->query("SELECT * FROM `user_info` WHERE mobile_no='$mobile'");
        if(mysqli_num_rows($unique)==0){
        $result=$mysqli->query("UPDATE `user_info` SET `mobile_no`='$mobile' WHERE `id`='$id'"); 
        $query=$mysqli->query("UPDATE `longtrip_bookings` SET `mobile`='$mobile' WHERE `user_id`='$id'");
        $q=$mysqli->query("UPDATE `shorttrip_bookings` SET `mobile`='$mobile' WHERE `user_id`='$id'");           
        if($result && $query && $q){
            
            $alert2="Updated Mobile Successfully";
        }
        else{
            $erroralert="Something went wrong";
        }
    }
    else{
        $erroralert="Mobile number already registered";
    }

    }
    
    
    if(isset($_POST['submit2'])){
        $filename=$_FILES['file']['name'];
        $filetmp=$_FILES['file']['tmp_name'];
        $filename= rand(1,100).'-'.time().'-'.$filename;
        move_uploaded_file($filetmp,"license-uploads/".$filename);
        $expiry=mysqli_real_escape_string($mysqli,$_POST['month']);
        $expiry=trim($expiry);
        $result=$mysqli->query("UPDATE `user_info` SET `license_copy`=CONCAT('license-uploads/','$filename'),`expiry_date_input`='$expiry' WHERE `id`='$id'");
        if($result){
           
            $alert="Updated license copy and expiry date successfully";
        }
        else{
            
            $erroralert="Something went wrong";
        }
    }
    if(isset($_POST['submit3'])){
        $password=mysqli_real_escape_string($mysqli,$_POST['password']);
        $password=trim($password);
        $cpassword=mysqli_real_escape_string($mysqli,$_POST['cpassword']);
        $cpassword=trim($cpassword);
        if($password == $cpassword){
            $result=$mysqli->query("UPDATE `user_info` SET `password_input`='$password' WHERE `id`='$id'");
            if($result){
                
                $alert1=" Updated password successfully";
            }
            else{
               
                $erroralert="Something went wrong";
            }
        }
        else{
            $erroralert="Passwords don't match";
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

    <?php if($alert) {
    
    echo ' <div class="alert alert-success 
        alert-dismissible fade show" role="alert" style="margin-bottom:0px;;border-radius:0px;">

        <strong>Success!</strong> '.$alert. 
        '<button type="button" class="close"
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button> 
    </div> ';
    echo '<meta http-equiv="refresh" content="2;url=user-details.php" />';
     
   }
   if($alert1) {
    
    echo ' <div class="alert alert-success 
        alert-dismissible fade show" role="alert" style="margin-bottom:0px;;border-radius:0px;">

        <strong>Success!</strong> '.$alert1. 
        '<button type="button" class="close"
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button> 
    </div> ';
    
    echo '<meta http-equiv="refresh" content="2;url=logout.php" />';
   }
   if($alert2) {
    
    echo ' <div class="alert alert-success 
        alert-dismissible fade show" role="alert" style="margin-bottom:0px;;border-radius:0px;">

        <strong>Success!</strong> '.$alert2. 
        '<button type="button" class="close"
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button> 
    </div> ';
    
    echo '<meta http-equiv="refresh" content="2;url=logout.php" />';
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


    <div>
    <?php 
    $mysqli = new mysqli('localhost','root','','car_main') or die($mysqli->connect_error);
    $table = 'user_info';
    
    if(isset($_GET['id']) && $_GET['id']>0 && $_SESSION['user_id'] == $_GET['id']){
        echo '<form method= "POST" class="container form" style="margin-top:50px;">
        <h1>Update Basic Information</h1><br>
        <p style="color:red;">Please be careful while updating details, if you face any issue contact us!</p>
        <div class="mb-3">
          <label for="email" class="form-label">New Email address</label>
          <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
        </div><button type="submit" style="margin-bottom:50px;"name="submit0" class="btn btn1 btn-primary">Save</button>
        </form>
        <form method="POST" class="container form" style="border-bottom:3px solid #F4EEED;">
        <div class="mb-3">
          <label for="mn" class="form-label">New Mobile number</label>
          <input type="tel" name="mobile" pattern="[0-9]{10}" class="form-control" id="mn" required><br>
        </div> <button type="submit" style="margin-bottom:50px;"name="submit1" class="btn btn1 btn-primary">Save</button>
        </form>
        <form class="container form"  method= "POST" enctype="multipart/form-data" style="border-bottom:3px solid #F4EEED;">
        <h1 style="margin-top:50px;">Update License Details</h1><br>
        <div class="mb-3 file-input">
        <p class="form-label">New license copy</p>
        <label for="file" class="form-label">Select a file
        <input type="file" name="file" id="file" required></label>
        <span>Filename: </span><span style="" class="file-name"> No file chosen</span>
        </div>
        <div class="mb-3">
        <label for="month" class="form-label">New Expiry date </label>
        <input type="month" name="month" class="form-control" id="month"required>
        </div>
        <button type="submit" style="margin-bottom:50px;" name="submit2" class="btn btn1 btn-primary">Save</button>
        </form>
        <br>
        <form class="container form"  method="POST">
        <h1>Change Password</h1>
        <br>
        <div class="mb-3">
        <label for="password" class="form-label">New Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <div class="mb-3">
        <label for="password" class="form-label">Confirm New Password</label>
        <input type="password" name="cpassword" class="form-control" id="cpassword" required>
        </div>
        <br>
        <button type="submit" name="submit3" style="margin-bottom:50px;"class="btn btn1 btn-primary">Save</button>
      </form>';
        
        
    
    }
    else{
        header("Location:index.php"); //Do not allow access.
        exit;
    }
    ?>
   
    </div>
    <script>
        const file = document.querySelector('#file');
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
    <footer class="footer">
        <p id=foo1>Copyright@2021 Car E Rental</p>
        <p id="foo2">All rights reserved</p>
       </footer>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

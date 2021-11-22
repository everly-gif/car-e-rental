<?php
$mysqli = new mysqli('localhost','root','','car_main') or die($mysqli->connect_error);
 $date='2021-05-04';
 $t_d='2021-05-06';
 $carid='6';
 $ar=array();
 $query=$mysqli->query("SELECT * FROM `longtrip_bookings` WHERE (from_d BETWEEN '$date' AND '$t_d') AND (car_id='$carid' AND `paid`='Y') OR (`timestamp` > (NOW() - INTERVAL 15 MINUTE)) AND (`paid`='N')");
 $q=$mysqli->query("SELECT from_d,to_d FROM `longtrip_bookings` WHERE (car_id='$carid' AND paid='Y') OR (car_id='$carid' AND(`timestamp` > (NOW() - INTERVAL 15 MINUTE)) AND `paid`='N')");
    //SELECT from_d,to_d FROM `longtrip_bookings` WHERE car_id='$carid'
    if(mysqli_num_rows($q)>0){
    while($data=$q->fetch_assoc()){

        for($i = new DateTime( $data['from_d']); $i <= new DateTime( $data['to_d']); $i->modify('+1 day')){
            array_push($ar, $i->format("Y-m-d"));
        
        }
    }
    print_r($ar);
}
    if(mysqli_num_rows($query)==0 && !in_array($date,$ar)){
        
        echo "These dates are available and locked for you, Please go ahead and make your payment <strong>within 3 mins</strong>
            otherwise these dates will be unlocked.<br>";
        
    }
    else{
       $erroralert="Looks like these dates are locked by someone ahead of you! come back 3 mins later to see if these dates <br> get unlocked. You can browse other availabilities while you wait :)";
    }
?>
<?php
$j_ar=array();
$mysqli = new mysqli('localhost','root','','car_main') or die($mysqli->connect_error);
//$carid=$_GET['id'];
$query=$mysqli->query("SELECT b_date FROM `shorttrip_bookings` WHERE car_id='5'");


if(mysqli_num_rows($query)>0){
while($data=$query->fetch_assoc()){

        array_push($j_ar, format("Y-m-d"));

    
}
print_r($j_ar);
}
?>
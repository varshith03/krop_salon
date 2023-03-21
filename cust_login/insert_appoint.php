<?php
include('includes/dbconnection.php');
$sid=$_GET['sid'];
$id=$_GET['id'];
$service=$_GET['service'];
$stylish=$_GET['stylish'];
$aptnumber=$_GET['aptnumber'];
$sql="select * from tblappointment where sid=$sid and cid='$id' and Services='$service' and stylist='$stylish' and AptNumber='$aptnumber'";
$result=mysqli_query($con,$sql);
$rowcount=mysqli_num_rows($result);
if($rowcount>0)
{
    $query="delete from tblappointment where sid=$sid and cid='$id' and Services='$service' and stylist='$stylish' and AptNumber='$aptnumber'";
    mysqli_query($con,$query);
}
else{
$query="insert into tblappointment(sid,cid,Services,stylist,amount,AptNumber) values('$sid','$id','$service','$stylish','$cost','$aptnumber')";
    mysqli_query($con,$query);
}
?>
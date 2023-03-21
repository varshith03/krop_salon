<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
// include('includes/dbconnection.php');
$sid=$_GET['sid'];
$id=$_GET['id'];
$remark=$_GET['remark'];
$status=$_GET['status'];
$Email=$_GET['Email'];
$Name=$_GET['Name'];
$AptNumber=$_GET['AptNumber'];
if($status==1){
	$status="ACCEPTED";
}else{
	$status="REJECTED";
}
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "kropsalons@gmail.com";
$mail->Password   = "xoanbukhvcvsyart";

$mail->IsHTML(true);
$mail->AddAddress($Email);
$mail->Subject = "Your Booking Status";
$content = "<b>Howdie $Name<br>
				Thank you for booking at kropsalons.com <br>
				Your Appointment is $status<br>
				And Remark of your appointment by the salon is $remark</b><br>
				<b>Link will be redirected for payment.</b><a href=http://localhost/krop_saloon/msms/admin/2.php?apt_no=$AptNumber>payment</a><br>
				Please ignore payment if appointment is cancelled";

$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}
echo "<script>alert('Email sent successfully');window.location='../admin/dashboard.php'</script>";
?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
// include('includes/dbconnection.php');
$email=$_GET['email'];
$sid=$_GET['sid'];
$oname=$_GET['oname'];
$salon_name=$_GET['salon_name'];
$status=$_GET['status'];
$password=$_GET['password'];
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
$mail->AddAddress($email);
$mail->Subject = "Your Booking Status";
$content = "<b>Howdie $oname<br>
				$salon_name
				Thank you for booking at kropsalons.com <br>
				Your Registration is $status<br>
				And Remark of your appointment by the salon is </b><br>
				Username=$sid
				Password=$password";

$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
} echo "<script>alert('Email sent successfully');window.location='../dashboard.php'</script>";
?>

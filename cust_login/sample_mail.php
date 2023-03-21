<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
// include('includes/dbconnection.php');
$id=$_GET['id'];
$sid=$_GET['sid'];
$AptNumber=$_GET['AptNumber'];

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
				<b>Please provide a valueable feedback by pressing the link</b><a href=http://localhost/krop_saloon/msms/cust_login/feedback_form.php?id=$id&sid=$sid&apt_no=$AptNumber>FEEDBACK</a><br>
				";

$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "Email sent successfully";
}
echo "<script>alert('Email sent successfully');window.location='../admin/dashboard.php'</script>";
?>

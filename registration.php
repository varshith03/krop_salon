<?php 
include('includes/dbconnection.php');
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {

    $oname=$_POST['oname'];
    $email=$_POST['email'];
    $salon_name=$_POST['salon_name'];
    $saddress=$_POST['saddress'];
	$document1=$_POST['document1'];
	$document2=$_POST['document2'];
    $phone=$_POST['phone'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	
	
	$document1 = $_FILES["document1"]["name"];

    $tempname1 = $_FILES["document1"]["tmp_name"];
	
	$document2 = $_FILES["document2"]["name"];

    $tempname2 = $_FILES["document2"]["tmp_name"];  

        $folder1 = "super_admin/documents/aadhar_card/".$document1;
		$folder2 = "super_admin/ documents/salon_doc/".$document2;
	
        move_uploaded_file($tempname1, $folder1);
        move_uploaded_file($tempname2, $folder2);
    $query=mysqli_query($con,"insert into registration(oname,email,salon_name,saddress,document1,document2,phone,password,cpassword) value('$oname','$email','$salon_name','$saddress','$document1','$document2','$phone','$password','$cpassword')");
    
 echo "<script>window.location.href='thankyou.php'</script>";  
 
     echo "<script>alert('Something Went Wrong. Please try again.');</script>"; 
    

  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>KROP SALONS || Registration</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i%7cMontserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Style -->
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <?php include_once('includes/header.php');?>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-caption">
                        <h2 class="page-title">Registration</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Registration</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h1>Registration</h1>
                            <p> Enter all details</p>
                            <form method="post" enctype="multipart/form-data" action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="control-label" for="oname">Owner Name</label>
                                        <input type="text" class="form-control" id="oname" placeholder="Owner Name" name="oname" required="true">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="control-label" for="email">Business Email</label>
                                         <input type="email" class="form-control" id="email" placeholder="Business Email" name="email" required="true">
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="salon_name">Salon Name</label>
                                        <input type="text" class="form-control" id="salon_name" placeholder="Salon Name" name="salon_name" required="true">
                                    </div>
									
									<div class="col-md-6">
                                        <label class="control-label" for="saddress">Salon Address</label>
                                        <input type="text" class="form-control" id="saddress" placeholder="Salon Address" name="saddress" required="true">
                                    </div>
									
									
									<div class="col-md-6">
                                        <label class="control-label" for="document1">Owner Aadhar Card</label>
                                        <input type="file" class="form-control" id="document1" placeholder="Upload AadharCard" name="document1" required="true">
                                    </div>
									
									
									<div class="col-md-6">
                                        <label class="control-label" for="document2">Salon Document</label>
                                        <input type="file" class="form-control" id="document2" placeholder="Upload Salon Document" name="document2" required="true">
                                    </div>
									
									<div class="col-md-6">
                                        <label class="control-label" for="phone">Owner Phone Number</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Owner Phone Number" required="true" maxlength="10" pattern="[0-9]+">
                                    </div>
									
									<div class="col-md-6">
                                        <label class="control-label" for="password">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required="true">
                                    </div>
									<div class="col-md-6">
                                        <label class="control-label" for="cpassword">Confirm Password</label>
                                        <input type="password" class="form-control" id="cpassword" placeholder="Re-Type Password" name="cpassword" onchange="validatepass()" required="true">
                                    </div>
									
							
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" id="submit" name="submit" class="btn btn-default">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <!-- footer-->
        <div class="container">
            <div class="footer-block">
                <!-- footer block -->
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget">
                            <h2 class="widget-title">Salon Address</h2>
                            <ul class="listnone contact">
                                <li><i class="fa fa-map-marker"></i> 4958 Norman Street Los Angeles, CA 90042 </li>
                                <li><i class="fa fa-phone"></i> +00 (800) 123-4567</li>
                                <li><i class="fa fa-fax"></i> +00 (123) 456 7890</li>
                                <li><i class="fa fa-envelope-o"></i> info@salon.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-widget footer-social">
                            <!-- social block -->
                            <h2 class="widget-title">Social Feed</h2>
                            <ul class="listnone">
                                <li>
                                    <a href="#"> <i class="fa fa-facebook"></i> Facebook </a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i> Google Plus</a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i> Linked In</a></li>
                                <li>
                                    <a href="#"> <i class="fa fa-youtube"></i>Youtube</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.social block -->
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="footer-widget widget-newsletter">
                            <!-- newsletter block -->
                            <h2 class="widget-title">Newsletters</h2>
                            <p>Enter your email address to receive new patient information and other useful information right to your inbox.</p>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Email Address">
                                <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Subscribe</button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </div>
                        <!-- newsletter block -->
                    </div>
                </div>
                <div class="tiny-footer">
                    <!-- tiny footer block -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="copyright-content">
                                <p>© Men Salon 2020 | all rights reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tiny footer block -->
            </div>
            <!-- /.footer block -->
        </div>
    </div>
    <!-- /.footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/menumaker.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/sticky-header.js"></script>
</body>

</html>
<script>
    
	function validatepass()
		{
			var pass=document.getElementById('password').value;
			var conpass=document.getElementById('cpassword').value;
			 if(conpass != pass)
				{
					alert("password mismatch");

                    document.getElementById("password").focus();
				}
										 
		}
</script>
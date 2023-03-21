

<!doctype html>
<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');

if(isset($_SESSION['bpmsaid']))
{
	echo "<script type='text/javascript'> document.location='../dashboard.php'; </script>";
}

if(isset($_POST['login']))
  {
	 
    $username=$_POST['username'];
    $password=($_POST['password']);
    $query=mysqli_query($con,"select id from super_admin where  username='$username' && password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['bpmsaid']=$ret['id'];
	   
      echo "<script type='text/javascript'> document.location ='../dashboard.php'; </script>";
    }
    else{
    echo "<script>alert('Invalid Details');</script>";
    }
  }
  ?>
<html lang="en">
  <head>
  	<title>KROP SALONS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg1.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h1 class="heading-section">KROP SALONS</h1>
					<h4 class="heading-section">ADMIN LOGIN</h4>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center"></h3>
		      	<form role="form" method="post" action="" class="signin-form">
		      		<div class="form-group">
		      			<input type="text"  name="username" class="form-control" placeholder="Username" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" name="password" type="password" class="form-control" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="login" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a><br>
								
									<a href="../../index.php" style="color: #fff">Go Home</a>
								</div>
	            </div>
	          </form>
	          
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

</body>
<!-- Custoner registration -->
<?php 
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if(isset($_POST['submit']))
  {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone_number=$_POST['phone_number'];
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	$repeat_password=$_POST['repeat_password'];
	
	
	 if ($password!=$repeat_password){
 echo "<script>validatepass();</script>"; 
	 }
else{
     echo $query=mysqli_query($con,"insert into cust_registration(name,email,phone_number,gender,password,repeat_password) value('$name','$email','$phone_number','$gender','$password','$repeat_password')");
   if($query) {
 echo "<script>window.location.href='clogin.php'</script>";  
  }
   else{
     echo "<script>alert('Something Went Wrong. Please try again.');</script>"; 
   }

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
					<h4 style="color: #fff">Registration Form</h4>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center"></h3>
		      	<form role="form" method="post" action="" class="signin-form">
				<div class="form-group">
                              <input type="text" class="form-control" name="name" placeholder="Full Name" required="true">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="email" placeholder="Email Address" required="true">
                            </div>
							<div class="form-group">
                              <input type="number" class="form-control" name="phone_number" placeholder="Phone Number" required="true">
                            </div>
							<div class="form-group">
                              <input type="radio"  name="gender" value="Male"  required="true">MALE
                              <input type="radio"  name="gender" value="Female"  required="true">FEMALE
                            </div>
							<div class="form-group">
                             
                              <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="true" 
							  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
							  
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control" name="repeat_password" id="repeat_password" onchange="validatepass()" placeholder="Repeat Password" required="true" 
							  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                            </div>
                            

                            
                            
                            <div class="form-group">
	            	<button type="submit" name="submit" class="form-control btn btn-primary submit px-3" style="color: #fff">Sign Up</button>
	            </div>
                            
                            <p class="no-c">Already have Account? <a href="clogin.php">Sign In</a></p>
                        </div>
                    </div>    
               </div>
              
               
           </div>
            
        </div>
		</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>        
<script src="assets/js/script.js"></script>


</html>
<script>
    
	function validatepass()
		{
			var pass=document.getElementById('password').value;
			var conpass=document.getElementById('repeat_password').value;
			 if(conpass != pass)
				{
					alert("Entered Password Doesn't Match");

                    document.getElementById("password").focus();
				}
										 
		}
</script>
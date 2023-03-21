<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
    if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{
	$sid=$_SESSION['bpmsaid'];
    if(isset($_POST['submit']))
    {
      
      $sid=$_POST['sid'];
	 $oname=$_POST['oname'];
	  $salon_name=$_POST['salon_name'];
        $status=$_POST['status'];
		 $saddress=$_POST['saddress'];
        $document1=$_POST['document1'];
		$document2=$_POST['document2'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
		$pwd=$_POST['password'];
		$password = md5($pwd);
		$SAID='SID'.$sid;
		
     
      $query=mysqli_query($con, "update  registration set status='$status' where sid='$sid'");
     if ($query) {
		  $query=mysqli_query($con,"insert into tbladmin(id,AdminName,UserName,MobileNumber,Email,Password) value('$sid','$oname','$SAID','$phone','$email','$password')");
      echo "<script>alert('All remark has been updated');window.location='test_mail/sample_mail.php?&email=$email&sid=$SAID&oname=$oname&salon_name=$salon_name&status=$status&password=$pwd'</script>";
  
    }
     else
     {
       echo '<script>alert("Something Went Wrong. Please try again.")</script>';
     }
  
    
  }
  

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>KROP SALONS || View Appointment</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h3 class="title1">View Registration</h3>
					
					
				
					<div class="table-responsive bs-example widget-shadow">
						<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
						<h4>View Salon Registration:</h4>
						<?php
$sid=$_GET['viewid'];
$ret=mysqli_query($con,"select * from registration where sid='$sid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
 

?>
						<table class="table table-bordered">
							<tr>
    <th>Salon ID</th>
    <td><?php echo $row['sid'];
	$apt=$row['sid']
	?>
	
	</td>
  </tr>
   <tr>
<th>Owner Name</th>
    <td><?php  echo $row['oname'];?></td>
  </tr>
  <tr>
<th>Salon Name</th>
    <td><?php  echo $row['salon_name'];?></td>
  </tr>
  <tr>
<th>Salon Address</th>
    <td><?php  echo $row['saddress'];?></td>
  </tr>
  
  <tr>
<th>Document 1</th>

    <td><?php echo "<a href='documents/aadhar_card/".$row['document1']."' target='new'>"; ?>view</a></td>
  </tr>
  <tr>
<th>Document 2</th>
 
    <td><?php echo "<a href='documents/salon_doc/".$row['document2']."' target='new'>"; ?>view</a></td>
  </tr>
<tr>
    <th>Email</th>
    <td><?php  echo $row['email'];?></td>
  </tr>
   <tr>
    <th>Mobile Number</th>
    <td><?php  echo $row['phone'];?></td>
  </tr>
  <tr>
    <th>Password</th>
    <td><?php  echo $row['password'];?></td>
  </tr>
  </th>
<tr>
    <th>Status</th>
    <td> <?php  
if($row['status']=="1")
{
  echo "Selected";
}

if($row['status']=="2")
{
  echo "Rejected";
}

     ;?></td>
  </tr>
						</table>
						<table class="table table-bordered">
							<?php if($row['Remark']==""){ ?>


<form name="page_submit"  method="post" enctype="multipart/form-data"> 

<tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
   </tr>

  <tr>
    <th>Status :</th>
    <td>
   <select name="status" class="form-control wd-450" required="true" >
     <option value="1" selected="true">Selected</option>
     <option value="2">Rejected</option>
   </select></td>
  </tr>


  <tr>
   
    <td>
   <input type="hidden" name="sid" value="<?php  echo $row['sid'];?>"></td>
   <input type="hidden" name="oname" value="<?php  echo $row['oname'];?>"/>
   <input type="hidden" name="salon_name" value="<?php  echo $row['salon_name'];?>"></td>
<input type="hidden" name="email" value="<?php echo $row['email'];?>"></td>
   <input type="hidden" name="password" value="<?php echo $row['password'];?>"></td>
    <input type="hidden" name="phone" value="<?php echo $row['phone'];?>"></td>

  </tr>


  <tr align="center">
    <td colspan="2"><button type="submit" name="submit"  class="btn btn-az-primary pd-x-20">Submit</button></td>
  </tr>
  </form>
<?php } else { ?>
						</table>
						<table class="table table-bordered">
							<tr>
    <th>Remark</th>
    <td><?php echo $row['Remark']; ?></td>
  </tr>




						</table>
						<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>
</body>
</html>
<?php }  ?>

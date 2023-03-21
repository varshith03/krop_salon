<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>KROP SALONS || Invoice List</title>

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
		
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables" id="exampl">
					<h3 class="title1">Invoice Details</h3>
					
	<?php
	$invid=intval($_GET['id']);
	$apt_no=$_GET['apt_no'];
	$query="SELECT ta.Name,ta.Email,ta.PhoneNumber,ta.gender,oi.userid,ta.services,oi.PostingDate FROM tblappointment ta,onlineinvoice oi where ta.AptNumber=oi.userid and ta.AptNumber=$apt_no GROUP BY ta.AptNumber";
$ret=mysqli_query($con,$query);
$cnt=1;
while ($row=mysqli_fetch_array($ret)) 
{

?>				
				
					<div class="table-responsive bs-example widget-shadow">
						<h4>Invoice <?php echo $invid;?></h4>
						<table class="table table-bordered" width="100%" border="1"> 
<tr>
<th colspan="6">Customer Details</th>	
</tr>
							 <tr> 
								<th>Name</th> 
								<td><?php echo $row[0]?></td> 
								<th>Contact no.</th> 
								<td><?php echo $row[2]?></td>
								<th>Email </th> 
								<td><?php echo $row[1]?></td>
							</tr> 
							 <tr> 
								<th>Gender</th> 
								<td><?php echo $row[3]?></td> 
								<th>Invoice Date</th> 
								<td colspan="3"><?php echo $row[6]?></td> 
							</tr> 
							<?php $query1="SELECT ta.Name,ta.Email,ta.PhoneNumber,ta.gender,oi.userid,ta.services,oi.PostingDate FROM tblappointment ta,onlineinvoice oi where ta.AptNumber=oi.userid and ta.AptNumber=$apt_no";
$ret1=mysqli_query($con,$query1);
while ($row1=mysqli_fetch_array($ret1)) 
{
?>	
							<tr> 
								<th>Service</th> 
								<td><?php echo $row1[5]?></td> 
								<th>Cost</th>
								<?php 
								
								$query2="SELECT cost FROM tblservices where ServiceName='$row1[5]'";
								$ret2=mysqli_query($con,$query2);
								while ($row2=mysqli_fetch_array($ret2))
								{
								$cost=$row2['cost'];
								$gt=$gt+$cost;
								?>
								<td colspan="3"><?php echo $cost?></td>
								
								<?php } ?>
							</tr>
							<?php
}
							?>
							<tr>
								<th colspan="4" style="text-align:center">
									Grand Total
								</th>
								<td colspan="3" id="gt1"><input type='text' name='gtotal' id='gtotal' value='<?php echo $gt?>'></td>
							</tr>
<?php }?>
</table> 
<table class="table table-bordered" width="100%" border="1"> 

<?php
$ret=mysqli_query($con,"select tblservices.ServiceName,tblservices.cost  
	from  tblinvoice 
	join tblservices on tblservices.ID=tblinvoice.ServiceId 
	where tblinvoice.BillingId='$invid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
	?>

<tr>
<th><?php echo $cnt;?></th>
<td><?php echo $row['ServiceName']?></td>

<td><?php echo $subtotal=$row['cost']?></td>
<td><?php echo $gt1;?></td>
</tr>
<?php 
$cnt=$cnt+1;
$gtotal+=$subtotal;
} ?>


</table>
  <p style="margin-top:1%"  align="center">
  <i class="fa fa-print fa-2x" style="cursor: pointer;"  OnClick="CallPrint(this.value)" ></i>
  <button onclick="window.location.href='1.gif';">Pay</button>
</p>

					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		 <?php include_once('includes/footer.php');?>
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
	  <script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>
</body>
</html>
<?php }  ?>

<script>

var gtotal=document.getElementById('gtotal').value;
 gtotal1=gtotal*0.2;
 var tt= document.getElementById('gt1').innerHTML= gtotal1;
</script>
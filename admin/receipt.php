<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>KROP SALONS RECEIPT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container bootdey">
<div class="row invoice row-printable">
    <div class="col-md-10">
        <!-- col-lg-12 start here -->
        <div class="panel panel-default plain" id="dash_0">
            <!-- Start .panel -->
            <div class="panel-body p30">
                <div class="row">
                    <!-- Start .row -->
                    <div class="col-lg-6">
                        <!-- col-lg-6 start here -->
                        <div class="invoice-logo"><img width="100" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Invoice logo"></div>
                    </div>
                    <!-- col-lg-6 end here -->
                    <div class="col-lg-6">
                        <!-- col-lg-6 start here -->
                        <div class="invoice-from">
                            <ul class="list-unstyled text-right">
                                <li>KROP SALONS</li>
                                <li>kropsalons@gmail.com</li>
                                <li>visit www.kropsalons.com</li>
                           
                            </ul>
                        </div>
                    </div>
                    <!-- col-lg-6 end here -->
                    <div class="col-lg-12">
                        <!-- col-lg-12 start here -->
                        <div class="invoice-details mt25">
                            <div class="well">
                                <ul class="list-unstyled mb0">
								<?php
	$invid=intval($_GET['id']);
	$apt_no=$_GET['apt_no'];
	$query="SELECT ta.Name,ta.Email,ta.PhoneNumber,ta.gender,oi.userid,ta.services,oi.PostingDate FROM tblappointment ta,onlineinvoice oi where ta.AptNumber=oi.userid and ta.AptNumber=$apt_no GROUP BY ta.AptNumber";
$ret=mysqli_query($con,$query);
$cnt=1;
while ($row=mysqli_fetch_array($ret)) 
{

?>	
								
								
                                    <li><strong>Invoice <?php echo $invid;?></strong> </li>
                                    <li><strong>Invoice Date:</strong> <?php echo $row[6]?></li>
                                    
                                    <li><strong>Status:</strong> <span class="label label-danger">UNPAID</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="invoice-to mt25">
                            <ul class="list-unstyled">
                                <li><strong>Invoiced To</strong></li>
                                <li><?php echo $row[0]?></li>
                                 
                                <li><?php echo $row[2]?></li>
                                <li><?php echo $row[1]?></li>
                            </ul>
                        </div>
                        <div class="invoice-items">
                            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th class="per5 text-center">SERVICE</th>
                                            <th class="per25 text-center">COST</th>
											
											<th class="per25 text-center">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $row1[5]?></td>
                                            <td class="text-center"><?php 
								
								$query2="SELECT cost FROM tblservices where ServiceName='$row1[5]'";
								$ret2=mysqli_query($con,$query2);
								while ($row2=mysqli_fetch_array($ret2))
								{
								$cost=$row2['cost'];
								$gt=$gt+$cost;
								?>
								<td><?php echo $cost?></td>
								
								<?php } ?>
							
				</tr>
				<?php
}
							?>
								
								
								
							
</td>
                                            <td class="text-center"><?php echo $gt?></td>
                                        </tr
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

</tr>
<?php 
$cnt=$cnt+1;
$gtotal+=$subtotal;
} ?>


</table>
	<p style="margin-top:1%"  align="center">
  <i class="fa fa-print fa-2x" style="cursor: pointer;"  OnClick="CallPrint(this.value)" ></i>
  <button onclick="window.location.href='receipt.html';">Pay</button>
</p>	
                                        
                            </div>
                        </div>
                        <div class="invoice-footer mt25">
                            <p class="text-center">Generated on Monday, October 08th, 2015 <a href="#" class="btn btn-default ml15"><i class="fa fa-print mr5"></i> Print</a></p>
                        </div>
                    </div>
                    <!-- col-lg-12 end here -->
                </div>
                <!-- End .row -->
            </div>
        </div>
        <!-- End .panel -->
    </div>
    <!-- col-lg-12 end here -->
</div>
</div>

<style type="text/css">
body{
    margin-top:10px;
    background:#eee;    
}
</style>

<script type="text/javascript">

</script>
</body>
</html>
<?php }  ?>
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$sid=$_GET['sid'];
$sid=$_GET['sid'];
if(isset($_POST['submit']))
  {
    $services=$_POST['services'];
	
	echo sizeof($services);
 for($i=0;$i<sizeof($services);$i++)
	{
    $query=mysqli_query($con,"insert into tblappointment(Services) value('$services[$i]')");
	}
    if ($query) {

 echo "<script>window.location.href='appointment.php'</script>";  
  }
  else
    {
     echo "<script>alert('Something Went Wrong. Please try again.');</script>"; 
    }

  
}

  ?>
  
  
  
  
  
<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>KROP SALONS || Salon List</title>
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
    <div class="page-header"><!-- page header -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-caption">
                        <h2 class="page-title">SALON LIST</h2>
                        <div class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Salon List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.page header -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-10 heading-section text-center ftco-animate" style="padding-bottom: 20px;">
           
            <h2 class="mb-4">KROP SALON LIST</h2>
            <p>KROP FINEST SALONS WITH GREAT SERVICE</p>
			<form method="post">
          </div>
		  </div>
               
<?php
$query1="SELECT `s_type` FROM `tblservices` group by `s_type`";
$result1=mysqli_query($con,$query1);
while ($row1=mysqli_fetch_array($result1)) {
	$stype=$row1[0];
	?>
<h3>Service Type:<?php echo $stype ?></h3>
<select name="stylist" id="stylist" required="true" class="form-control">
                                <option value="">Stylist for <?php echo $stype ?></option>
                                <?php $query=mysqli_query($con,"select * from tblstylist where sid=$sid and s_type='$stype'");
								  while($row=mysqli_fetch_array($query))
								  {
								  ?>
                               <option value="<?php echo $row['stylist_name'];?>"><?php echo $row['stylist_name'];?></option>
                               <?php } ?> 
                              </select>
<table class="table table-bordered"> <thead> <tr> <th>#</th><th>Salon ID</th><th>Salon Services</th> <th>Description</th> <th>Cost</th></tr> </thead>	
<?php
$query="select * from  tblservices where sid='$sid' and s_type='$stype'";
$result=mysqli_query($con,$query);
while ($row=mysqli_fetch_array($result)) {
$s_type=$row['s_type'];
?>
	
             <tr> <th scope="row"><?php echo $cnt;?></th><td><?php  echo $row['sid'];?></td> <td><?php  echo $row['ServiceName'];?></td> <td><?php  echo $row['Description'];?></td> <td><?php  echo $row['Cost'];?></td> </tr>   <?php 
$cnt=$cnt+1;
}
?>

</table> 

<?php }?>

<div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" id="submit" name="submit" class="btn btn-default">Book</button>
											
                                        </div>
									

										
										
										
										 </form>
										 
               
             
            </div>
        </div>
    </div>
    <div class="space-small bg-primary">
        <!-- call to action -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-7 col-md-8 col-xs-12">
                    <h1 class="cta-title">Login To Krop Salons </h1>
					<p>Login to ####</a>
                </div>
                <div class="col-lg-4 col-sm-5 col-md-4 col-xs-12">
                    <a href="cust_login/clogin.php" class="btn btn-white btn-lg mt20">Login</a>
					
					
                </div>
            </div>
        </div>
    </div>
    <?php include_once('includes/footer.php');?>
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

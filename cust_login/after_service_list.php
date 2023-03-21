	<?php
session_start();	
error_reporting(0);
include('includes/dbconnection.php');
if(!isset($_SESSION['cid']))
{
    echo "<script>document.location='logout.php';</script>";
}
$sid=$_GET['sid'];
$id=$_SESSION['cid'];
$cid=$id;
$aptnumber = mt_rand(100000000, 999999999);

if(isset($_POST['submit']))
{ $apt=$_POST['aptnumber'];
             echo "<script>window.location.href='appointment.php?sid=$sid&aptnumber=$apt'</script>";  
}
echo $id;
  ?>   
  
  
  
  
  
<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>KROP SALONS || Salon List</title>
    <!-- Bootstrap -->
    <script src="jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="css/bootstrap1.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i%7cMontserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome1.min.css" rel="stylesheet">
    <!-- Style -->
    <link href="css/style1.css" rel="stylesheet">
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
<select name="<?php echo $stype;?> " id="<?php echo $stype;?>" class="form-control">
                               
                                <?php $query=mysqli_query($con,"select * from tblstylist where sid=$sid and s_type='$stype'");
								  while($row=mysqli_fetch_array($query))
								  {
								  ?>
                               <option value="<?php echo $row['stylist_name'];?>"><?php echo $row['stylist_name'];?></option>
                               <?php } ?> 
                              </select>
<table class="table table-bordered"> <thead> <tr> <th>#</th><th>Salon ID</th><th>Salon Services</th> <th>Description</th> <th>Cost</th><th>Select Services</th></tr> </thead>	
<?php
$query="select * from  tblservices where sid='$sid' and s_type='$stype'";
$result=mysqli_query($con,$query);
while ($row=mysqli_fetch_array($result)) {
$s_type=$row['s_type'];
$id=$row['ID'];
?>
	       <input type='hidden' id='sid' value="<?php echo $sid; ?>">
           <input type='hidden' name ="aptnumber" id='aptnumber' value="<?php echo $aptnumber; ?>">
             <input type='hidden' id='cid' value="<?php echo $cid; ?>">
             <tr> <th scope="row"><?php echo $cnt;?></th><td><?php  echo $row['sid'];?></td> <td><?php  echo $row['ServiceName'];?></td> <td><?php  echo $row['Description'];?></td> <td><?php  echo $row['Cost'];?></td><td><input type="checkbox" name='<?php echo $stype."~".$id;?>'value="<?php echo $row['ServiceName'];?>" service='<?php echo $stype?>' onclick='check_list(this)'></td> </tr>   <?php 
$cnt=$cnt+1;
}
?>


</table> 
<script type="text/javascript">
   function check_list(fgd) {

       var a=fgd.value;
       var b=fgd.getAttribute('service');
       var c=document.getElementById(b).value;
       //var d=documeny.getElementById(b).value;
      var sid=document.getElementById("sid").value;
       var id=document.getElementById("cid").value;
       var aptnumber=document.getElementById("aptnumber").value;
                                        $.ajax({
                                                type:'GET', 
                                                url:"insert_appoint.php?service="+a+"&stylish="+c+"&sid="+sid+"&id="+id+"&aptnumber="+aptnumber,
                                            });
       // $.ajax({
       //  type:'GET',url:"insert_appoint.php?service="+a+"&stylish="+c+"&sid="+sid+"&id="+id,
       // });       
    } 
</script>
<?php }?>

<div class="col-md-12">
 <div class="form-group">
                                            <button type="submit" id="submit" name="submit" class="btn btn-default">Book</button>
											
                                        </div>
                                        

										
										
										
										 </form>
										 
               
             
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

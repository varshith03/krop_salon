<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(!isset($_SESSION['cid']))
{
    echo "<script>document.location='logout.php';</script>";
}

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>KROP SALONS || Salon List</title>
    <!-- Bootstrap -->
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
          </div>
          <h1>YOu have logged in </h1>     
          <table class="table table-bordered"> <thead> <tr> <th>#</th>  <th>Salon ID</th><th>Salon Name</th> <th>Salon Address</th> <th>Book Appointment</th></tr> </thead> <tbody>
<?php
$ret=mysqli_query($con,"select * from  registration where status=1");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

             <tr> <th scope="row"><?php echo $cnt;?></th><td><?php  echo $row['sid'];?></td> <td><?php  echo $row['salon_name'];?></td> <td><?php  echo $row['saddress'];?></td> <td><a href="after_service_list.php?sid=<?php  echo $row['sid'];?>"><button style="" name="book_apt">Book</td> </button></a></tr>   <?php 
$cnt=$cnt+1;
}?></tbody> </table> 
               
             
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

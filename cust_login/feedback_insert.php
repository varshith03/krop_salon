<?php
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    // $id= $_POST['id'];
    // echo "<script>alert('bdkgdfgfgdfgdfgdfgdfgsbfjdkafnkdf')</script>";
    // $sid= $_POST['sid'];
    // $AptNumber= $_POST['AptNumber'];
        $cid=$_POST['cid'];
        $sid=$_POST['sid'];
    $apt_no=$_POST['apt_no'];
     $f_points=$_POST['rating'];
    echo $cname=$_POST['cname'];
     $f_comments=$_POST['commentText'];
  ECHO $query="INSERT INTO tblfeedback( `cid`, `sid`, `name`, `apt_no`, `points`, `comments`) VALUES ('$cid','$sid','$cname','$apt_no','$f_points','$f_comments')";
     $feed=mysqli_query($con,$query);
     echo "<script>alert('Thank You for your Valuable Feedback');window.location='../index.php'</script>";
  }
  ?>
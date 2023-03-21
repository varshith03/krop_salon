<?php
if(isset($_POST['submit']))
  {
    
    $cid=$_GET['viewid'];
      $remark=$_POST['remark'];
      $status=$_POST['status'];
     
    
     
//    $query=mysqli_query($con, "update  tblappointment set Remark='$remark',Status='$status' where ID='$cid'");
//     if ($query) {
    echo "<script>alert('All remark has been updated');window.location='../test_mail/sample_mail.php?id=$cid&remark=$remark&status=$status'</script>";

//   }
//   else
//     {
//       echo '<script>alert("Something Went Wrong. Please try again.")</script>';
//     }

  
}
?>
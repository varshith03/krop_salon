<?php
session_start();
include('config.php');
include '../includes/dbconnection.php';

$apt=$_GET['apt_no'];
$gt=$_GET['gtotal'];
$gt1=$gt*0.2;
$_SESSION["amt"] = $gt;
$_SESSION["apt"] = $apt;
?>
<form action="submit.php" method="POST" class= "form-group">
<center>
<br>
<br>
<div class="card">
<input type="hidden" name="gt" value="<?php $gt ?>">
<input type="hidden" name="apt" value="<?php $apt ?>">
                        <div class="card-header">
                        <h2>Please Click On The Below Link</h2>
                        </div>
                           
<script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="<?php echo $publishableKey?>"
                data-amount="<?php echo str_replace(",","",$gt1)*100?>"
                data-name="Krop Salon"
                data-description="Online payment"
                data-image="https://cdn1.vectorstock.com/i/1000x1000/54/75/home-furniture-logo-vector-34005475.jpg"
                data-currency="inr"
                data-locale="auto">
                                </script>
                
</div>
</center>
</form>

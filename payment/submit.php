<?php
session_start();
    include('config.php');
    include '../includes/dbconnection.php';
     $amount = $_SESSION['amt'];
     $invoice_no = $_SESSION['apt'];

    $token = $_POST["stripeToken"];
    $token_card_type = $_POST["stripeTokenType"];
    
      header("Location:success.php?AptNumber=$invoice_no ");
    
?>
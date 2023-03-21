<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
$Cid=$_GET['Cid'];
$sid=$_GET['sid'];
$apt_no=$_GET['apt_no'];
  ?>

  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<style>

body{
font-family: 'Roboto', sans-serif;
  margin:0;
  pading:0;
}
form{
color:#f5ec00;
font-size:18px;
}
label{
color:#000;
}
</style>
<section style="borrder:2px solid #43a7d5">
<div>
 <h1 style="
    padding: 58px;
">Krop Salon</h1>
</div>

  <aside style="padding:15px;border: 25px solid;border-radius: 48px;border-color: #43a7d5;">
<p><b>Dear Customer,</b><br><br>
Thank you for getting your car services at our workshop. We would like to know how we performed. Please spare some moments to give us your valuable feedback as it will help us in improving our service.</p>

<form method="POST" action="feedback_insert.php">
<input type="hidden" name="cid" value="<?php echo $Cid?>">
<input type="hidden" name="sid" value="<?php echo $sid?>">
<input type="hidden" name="apt_no" value="<?php echo $apt_no?>">

<input type="text" name="cname"  placeholder="Enter your Name"><br><br>
<label>Rate Your overall experience with us ?</label><br>
<span class="star-rating">
  <input type="radio" name="rating" value="1"><i></i>
  <input type="radio" name="rating" value="2"><i></i>
  <input type="radio" name="rating" value="3"><i></i>
  <input type="radio" name="rating" value="4"><i></i>
  <input type="radio" name="rating" value="5"><i></i>
</span>
  <div class="clear"></div> 
  <hr class="survey-hr"> 
<label for="m_3189847521540640526commentText"> Any Other suggestions:</label><br/><br/>
<textarea cols="75" name="commentText" rows="5" style="width:320px"></textarea><br>
<br>
   <!-- <input type="hidden" name="id" value="<?php  echo $row['id'];?>">
   <input type="hidden" name="sid" value="<?php  echo $row['sid'];?>">
   <input type="hidden" name="AptNumber" value="<?php echo $row['AptNumber'];?>"> -->

  <div class="clear"></div> 
<input style="background:#43a7d5;color:#fff;padding:12px;border:0" type="submit" name="submit" value="Submit your review">&nbsp;
</form>
  </aside>
</section>
</body>
</html>

<style>
      aside{
  max-width:700px;
    margin:auto;
  }
  .survey-hr{
  margin:30px 0;
    border: .5px solid #ddd;
  }
  .star-rating {
     margin: 25px 0 0px;
    font-size: 0;
    white-space: nowrap;
    display: inline-block;
    width: 175px;
    height: 35px;
    overflow: hidden;
    position: relative;
    background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
    background-size: contain;
  }
  .star-rating i {
    opacity: 0;
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 20%;
    z-index: 1;
    background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
    background-size: contain;
  }
  .star-rating input {
    -moz-appearance: none;
    -webkit-appearance: none;
    opacity: 0;
    display: inline-block;
    width: 20%;
    height: 100%;
    margin: 0;
    padding: 0;
    z-index: 2;
    position: relative;
  }
  .star-rating input:hover + i,
  .star-rating input:checked + i {
    opacity: 1;
  }
  .star-rating i ~ i {
    width: 40%;
  }
  .star-rating i ~ i ~ i {
    width: 60%;
  }
  .star-rating i ~ i ~ i ~ i {
    width: 80%;
  }
  .star-rating i ~ i ~ i ~ i ~ i {
    width: 100%;
  }
  .choice {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    text-align: center;
    padding: 20px;
    display: block;
  }
  span.scale-rating{
  margin: 5px 0 15px;
      display: inline-block;

      width: 100%;

  }
  span.scale-rating>label {
    position:relative;
      -webkit-appearance: none;
    outline:0 !important;
      border: 1px solid grey;
      height:33px;
      margin: 0 5px 0 0;
    width: calc(10% - 7px);
      float: left;
    cursor:pointer;
  }
  span.scale-rating label {
    position:relative;
      -webkit-appearance: none;
    outline:0 !important;
      height:33px;
      margin: 0 5px 0 0;
    width: calc(10% - 7px);
      float: left;
    cursor:pointer;
  }
  span.scale-rating input[type=radio] {
    position:absolute;
      -webkit-appearance: none;
    opacity:0;
    outline:0 !important;
      /*border-right: 1px solid grey;*/
      height:33px;
      margin: 0 5px 0 0;

    width: 100%;
      float: left;
    cursor:pointer;
    z-index:3;
  }
  span.scale-rating label:hover{
  background:#fddf8d;
  }
  span.scale-rating input[type=radio]:last-child{
  border-right:0;
  }
  span.scale-rating label input[type=radio]:checked ~ label{
      -webkit-appearance: none;

      margin: 0;
    background:#fddf8d;
  }
  span.scale-rating label:before
  {
    content:attr(value);
      top: 7px;
      width: 100%;
      position: absolute;
      left: 0;
      right: 0;
      text-align: center;
      vertical-align: middle;
    z-index:2;
  }

    </style>
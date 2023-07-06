<?php

include 'connection.php';

session_start();

$userID = $_SESSION['username'];

/*if(!isset($admin_id)){
   header('location:login.php');
}*/

?>

<!DOCTYPE html>
<html>
<head>
   <link href="style.css" rel="stylesheet" type="text/css" />
   <link href="style3.css" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="css/style4.css">
   <link rel="stylesheet" href="admin_style.css">
   <header>
         <a href="#" class = "logo"><img src ="logo.png" alt = ""></a>
   
         <div class="bx bx-menu" id = "menu-icon"></div>
            <!--
            <ul class ="navbar">
               <li><a href="#home">Home</a></li>
                  <li><a href=car.php>Cars</a></li>
                  <li><a href=rent.php>Rent Now</a></li> 
                  <li><a href=about.php>About Us</a></li> 
                  <li><a href=contact.php>Contact</a></li> 
            </ul>
            -->
         <!-- signup-login section -->
            <div class="header-btn">
               <?php if (isset($_SESSION['username'])): ?>
                  <a href="#" class="sign-in">Welcome, <?php echo $_SESSION['username']; ?></a> 
                  <a href="user_logout.php">Logout</a>   
               <?php else: ?>
                  <a href=signup.html class="sign-up">Sign Up</a> <!-- href="#" -->
                  <a href=login.php class="sign-in">Sign In</a>    
               <?php endif; ?>
            </div>
      </header>
</head>


<section class = "dashboard">
   <h1 class="heading">Dashboard</h1>

   <div class="box-container">
      <div class="box">
         <a href="addinforental.php" class="btn">View Cars</a>
         <!--<a href="infocustomer.php" class="btn">View Customers' Car Rental Info</a>-->
         <a href="infocustomer2.php" class="btn">View Customers' Car Rental Info</a>
         <a href="messages.php" class="btn">View Messages</a>
      </div>
   </div>
   </section>

</html>
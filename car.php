<?php	
	include ("connection.php");

	session_start();
?>

<?php 


$query = "SELECT * FROM car";
$result = mysqli_query($conn, $query);

?>


<!DOCTYPE html>
<html>

  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Cars</title>
  <!-- link to css -->
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
		<header>
			<a href="#" class = "logo"><img src ="logo.png" alt = ""></a>
	
			<div class="bx bx-menu" id = "menu-icon"></div>
	
				<ul class ="navbar">
					<li><a href="index.php">Home</a></li>
						<li><a href=car.php>Cars</a></li> <!-- "#car" -->
                                <?php if (!isset($_SESSION['username'])) {?>
                    <p><a href="login.php" role="button" class="btn btn-warning  text-white ">Rent Now</a></p>
                    <?php
                    } else {
					?>
                    <li><a href=rent2.php>Rent Now</a></li> <!-- "#rent" -->
                    <?php
                    }
                    
                    ?>
						
						<li><a href=about.php>About Us</a></li> <!-- "#about" -->
						<li><a href=contact.php>Contact</a></li> <!-- "#contact" -->
				</ul>
				
			<!-- signup-login section -->
				<div class="header-btn">
					<?php if (isset($_SESSION['username'])): ?>
						<a href="#" class="sign-in">Welcome, <?php echo $_SESSION['username']; ?></a> 
						<a href="user_logout.php">Logout</a>   
					<?php else: ?>
						<a href=signup.php class="sign-up">Sign Up</a> <!-- href="#" -->
						<a href=login.php class="sign-in">Sign In</a>    
					<?php endif; ?>
				</div>
		</header>
			<!-- Services -->
			<section>
			<div class="box">
			   <h2>Available Car Rentals</h2>
			   <?php while($row = mysqli_fetch_assoc($result)){ ?>
				  <div class="box-img">
					 <img src="uploaded_img/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
					 <h3><b>  <?php echo $row['name']; ?></b></h3>
					 <h4><b>  RM <?php echo $row['price1']; ?> per hour | RM <?php echo $row['price2']; ?> full day </b></h4>
					 
					 <?php if (!isset($_SESSION['username'])) {?>
                    <p><a href="login.php" role="button" class="btn btn-warning  text-white ">Rent Now</a></p>
                    <?php
                    } else {
					?>
                    <li><a href=rent2.php>Rent Now</a></li> <!-- "#rent" -->
                    <?php
                    }
                    
                    ?>
					 <!--<a href="booking.php?car_id=<?php echo $row['$car_id']; ?>" class="book-now">Book Now</a>-->
					 
				  </div>
   <?php} ?> 
   <?php } ?>
  </section>
</div>
			<!-- </section> -->
			<!-- Go back to Home -->
			<section class="home" id="home">
			<div class="heading">
			<p><a href="index.php">Back</a></p>
			</div>
			</section>
		</body>
</html>

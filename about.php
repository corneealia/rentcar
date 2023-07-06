<?php	
	include ("connection.php");

	session_start();


?>

<!DOCTYPE html>
<html>
	<head>
	<link href="style.css" rel="stylesheet" type="text/css" />
		<title> About Section </title>
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
	<section class = "about" id = "about">
		<div class = "heading">
			<h1> <br><br><br><br>About Us </h1>
			<h3> Best Customer Experience </h3>
		</div>
		<div class = "about-container">
			<div class = "about-img">
				<img src ="img/about.png" alt ="">
			</div>
			<div class = "about-text">
				<h4> Find Great Deals for Car Rental in TerbaiCar Sdn.Bhd </h4>
					<p> We have great offers for daily and weekly in TerbaiCar Sdn.Bhd. </p>
					<p> Find the cheapest prices online, for your future Car Rental in TerbaiCar Sdn.Bhd in 4 quick easy steps.</p>
					<p> Book now at the lowest possible rates only with a small down payment and pay the rest when you pick up the car. </p>
				
				<br>
				<h4> Why Choose Us? </h4>
				<p> - You can reach us 24/7 on our mobile numbers </p>
				<p> - We pride ourselves on personalized service, great cars and excellent rates. </p>
				<p> - We offer a varied fleet of cars, ranging from the compact Perodua Myvi, Axia, Bezza and Alza. All our vehicles have air conditioning, power steering, electric windows. </p>
					<a href="#" class = "btn"> Learn More </a>
		</div>
	</section>
	 <!-- Go back to Home -->
	<section class="home" id="home">
	<div class="heading">
		<p><a href="index.php">Back</a></p>
	</div>
  </section>
	</body>
</html>
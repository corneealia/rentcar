<?php	
	include ("connection.php");

	session_start();
	//print_r($_SESSION);

	if(isset($_SESSION['username'])){
	   $username = $_SESSION['username'];
	}else{
	   $username = '';
	};



	/*if(isset($_SESSION['stu_id'])){
	   $stu_id = $_SESSION['stu_id'];
	}else{
	   $stu_id = '';
	};*/
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width-scale=1">
		
		<title>Car Rental Website</title>
		
		<!-- link to css -->
		<link href="style.css" rel="stylesheet" type="text/css" />
		<link href="style3.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<!-- header -->
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
 	
 	<!-- insert php here -->
 	<?php if (isset($_SESSION['username'])): ?> 
    <a href="#" class="sign-in">Welcome, <?php echo $_SESSION['username']; ?></a> 
    <a href="user_logout.php">Logout</a>   
  <?php else: ?>
    <a href=signup.php class="sign-up">Sign Up</a>
    <a href=login.php class="sign-in">Sign In</a>    
  <?php endif; ?>
</div>
		</header>
		
		<!-- Home section -->
			<section class="home" id="home">
				<!-- <div class="text"> -->
					<h1><br><font size="100px">Welcome to TerbaiCar</font></h1>
				<!-- </div> -->

  
		<!-- Picture section -->
			<h2><center>Automatic Slideshow</center></h2>
				<p><center>OUR CAR RENTAL SERVICES :</center></p>

				<div class="slideshow-container">

					<div class="mySlides fade">
						<div class="numbertext">1 / 3</div>
							<center><img src="rent4.jpg" style="width:130%"></center> <!-- width changed from 100 to 50, add <center> to position the image to center -->
								<div class="text">Caption Text</div>
					</div>

					<div class="mySlides fade">
						<div class="numbertext">2 / 3</div>
							<center><img src="rent3.jpg" style="width:130%"></center>
								<div class="text">Caption Two</div>
					</div>

				<div class="mySlides fade">
					<div class="numbertext">3 / 3</div>
							<center><img src="rent2.jpg" style="width:130%"></center>
								<div class="text">Caption Three</div>
				</div>
				<div class="mySlides fade">
					<div class="numbertext">3 / 3</div>
							<center><img src="rent1.jpg" style="width:130%"></center>
								<div class="text">Caption Four</div>

				</div>
			</section>
				
	<!-- <br> -->
	<div>
	<div style="text-align:center">
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
		<span class="dot"></span> 
	</div>
	</div>


	<script>
		let slideIndex = 0;
			showSlides();

		function showSlides() {
			let i;
				let slides = document.getElementsByClassName("mySlides");
				let dots = document.getElementsByClassName("dot");
				
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";  
			}
			
		slideIndex++;
			if (slideIndex > slides.length) {slideIndex = 1}    
				for (i = 0; i < dots.length; i++) {
					dots[i].className = dots[i].className.replace(" active", "");
				}
				
		slides[slideIndex-1].style.display = "block";  
			dots[slideIndex-1].className += " active";
				setTimeout(showSlides, 2000); // Change image every 2 seconds
		}
	</script>
	
		<!-- Cars page -->
			<section class="cars" id="cars">
				<div class="heading">
					<h1>How to book a car?</h1>
					<h3>Jom! We'll show you step-by-step :D</h3>
				</div>
			</section>
  
		<!-- Rent Now page -->
			<section class="rent" id="rent">
				<div class="heading">
					<h1>Come rent a car now with us</h1>
					<h3>Best services provided!</h3>
				</div>
			</section>
  
		<!-- About page -->
			<section class="about" id="about">
				<div class="heading">
					<h1>About us</h1>
					<h3>What is TerbaiCar about?</h3>
				</div>
			</section>
  
		<!-- Contact -->
			<section class="contact" id="contact">
				<div class="heading">
					<h1>Contact us</h1>
					<h3>+601234567890</h3>
				</div>
			</section>

		<!-- link to js -->
			<script src="script.js"></script>
			

				<script src="https://replit.com/public/js/replit-badge.js" theme="blue" defer></script> 
	</body>
</html>

<!-- Home Section @ Youtube: 17mins -->

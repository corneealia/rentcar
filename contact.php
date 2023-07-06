<?php  
   include ("connection.php");

   session_start();

   if(isset($_SESSION['user_id'])){
      $user_id = $_SESSION['user_id'];
   }else{
      $user_id = '';
   };

   if(isset($_POST['send'])){

      $name = $_POST['name'];
      $name = filter_var($name, FILTER_SANITIZE_STRING);
      $email = $_POST['email'];
      $email = filter_var($email, FILTER_SANITIZE_STRING);
      $number = $_POST['number'];
      $number = filter_var($number, FILTER_SANITIZE_STRING);
      $msg = $_POST['msg'];
      $msg = filter_var($msg, FILTER_SANITIZE_STRING);

       $sql = "INSERT INTO messages (user_id, name, email, number, message)
		VALUES (?, ?, ?, ?, ?)";
		$stmt= $conn->prepare($sql);
		$stmt->execute([$user_id, $name, $email, $number, $msg]);

      $select_message = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
      $select_message->execute([$name, $email, $number, $msg]);

   

   }

?>


<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Get in touch with us!</title>
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
		<div class = "heading">
		<h1><br><br><br><br>Call us now for more information!</h1>
		</div>

		<section class="contact">

   		<form action="" method="post">
     	 <h3>get in touch</h3>
     	 <input type="text" name="name" placeholder="Name" required maxlength="20" class="box">
      	<input type="email" name="email" placeholder="Email address" required maxlength="50" class="box">
      	<input type="number" name="number" min="0" max="9999999999" placeholder="Phone number" required onkeypress="if(this.value.length == 10) return false;" class="box">
      	<textarea name="msg" class="box" placeholder="Enter your message" cols="30" rows="10"></textarea>
      	<input type="submit" value="send message" name="send" class="btn">
  		 </form>

</section>

		 <!-- Go back to Home -->
		<section class="home" id="home">
		<div class="heading">
		<p><a href="index.php">Back</a></p>
		</div>
		</section>
	</body>
</html>
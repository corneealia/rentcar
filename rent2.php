<?php	
	include ("connection.php");

	session_start();

	

?>

<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Rent now!</title>
<script>
	function myFunction(){
		
	}
</script>
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
		<h1><br>Jom rent with us!</h1>
		</div>
		
		
		<form method = "post" action = "updaterentcar2.php"> <!-- action = "payment.php"> -->
	
			<fieldset>
				<legend>Personal Information</legend>
				Full Name : <td></td><td> <input type = "text" name = "full_name"> <br>
				Student ID : </td><td> <input type = "text" name = "stu_id"></td> <br>
			</fieldset>

			<!-- <fieldset>
				<legend>Personal Information</legend>
				Full Name : <td></td><td> <input type = "text" name = "full_name" value = "<?php if(isset($row['full_name'])) echo $row['full_name']; ?>" > <br>
				Student ID : </td><td> <input type = "text" name = "id" value = "<?php if(isset($row['stu_id'])) echo $row['stu_id']; ?>" ></td> <br>
			</fieldset> -->
	
			
			<fieldset>
			<legend>Car Information</legend>
			<!--Seater:<br>
			<input type="text" name="seater"><br>-->
			Model:<br>
			<select name="model">
				<?php
				$sql = "SELECT name FROM car";
			$result = mysqli_query($conn, $sql);

			
			// Loop through the result and add each model as an option
			while ($row = mysqli_fetch_array($result)) {
				echo "<option value='".$row['name']."'>".$row['name']."</option>";
				}?>
			</select><br><br>
			</fieldset>
			
				<fieldset>	
					<legend>Location</legend>
						Pick-Up Location : <br> <select name = "location_pickup" value = "<?php echo $row ['location_pickup']; ?>" > 
							<option value ="select your location">Select your location..</option>
							<option value ="kotaSamarahan">Kota Samarahan</option>
							<option value ="desaIlmu">Desa Ilmu</option>
							<option value ="palmVillage">Palm Village</option>
							<option value ="ks1">Uitm KS 1</option>
							<option value ="ks2">Uitm KS 2</option>
						</select><br>
						
						
						Drop-Off Location : <br><tr><td> <select name = "location_dropoff" value = "<?php echo $row ['location_dropoff']; ?>" > 
							<option value ="select your location">Select your location..</option>
							<option value ="kotaSamarahan">Kota Samarahan</option>
							<option value ="desaIlmu">Desa Ilmu</option>
							<option value ="palmVillage">Palm Village</option>
							<option value ="ks1">Uitm KS 1</option>
							<option value ="ks2">Uitm KS 2</option>

						</select><br><br>
						</td>
						</tr>
				</fieldset>
				
				<fieldset>	
					<legend>Date</legend>
						Pick-up Date:<br>
						<input type="date" name = "pickupD">
						<br>
						Drop-off Date:<br>
						<input type="date" name = "dropoffD">
						<br><br>
				</fieldset>
				

				<tr><td colspan = "2" align = "right"> <input type = "submit" name = "rent"> </td></tr>
				<tr><td colspan = "2" align = "right"> <input type = "reset"> </td></tr>
				<input type = "hidden" name = "id" value = "<?php echo $id; ?>">


		</form>
		 <!-- Go back to Home -->
		<section class="home" id="home">
		<div class="heading">
		<p><a href="index.php">Back</a></p>
		</div>
		</section>
	</body>
</html>
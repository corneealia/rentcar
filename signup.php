<?php	
	include ("connection.php");
	session_start();

	if(isset($_SESSION['stu_id'])){
	   $stu_id = $_SESSION['stu_id'];
	}else{
	   $stu_id = '';
	};

?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

	<head>
		<meta charset="UTF-8">
		<!---<title> Responsive Registration Form | CodingLab </title>--->
		<link rel="stylesheet" href="style2.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   
	<body>
		<div class="container">
			<div class="title">Registration</div>
				<div class="content">
					<form action="submit.php" method="POST">
					
						<div class="user-details">
							<div class="input-box">
								<span class="details">Full Name</span>
								<input type="text" name="full_name" required placeholder="enter your full name" maxlength="20"  class="box">
								</div>
								
								<div class="input-box">
									<span class="details">Username</span>
									<input type="text" name="username" required placeholder="enter your username" maxlength="20"  class="box">
								</div>
								
								<div class="input-box">
									<span class="details">Email</span>
									<input type="email" name="email" required placeholder="enter your email" maxlength="50"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
								</div>
								
								<div class="input-box">
									<span class="details">Student ID</span>
									<input type="text" name="stu_id" required placeholder="enter your student ID" maxlength="20"  class="box">
								</div>
								
								<div class="input-box">
									<span class="details">Phone Number</span>
									<input type="text" name="noTell" required placeholder="enter your phone number" maxlength="20"  class="box">
								</div>

								<div class="input-box">
  									<label for="university">University:</label>
 									 <select id="university" name="university">
    								<option value="">Select a University</option>
    								<option value="uitmks1">Universiti Teknologi MARA KS1</option>
    								<option value="uitmks2">Universiti Teknologi MARA KS2</option>
    								<option value="unimas">Universiti Malaysia Sarawak</option>
  									</select>
								</div>
								
								<div class="input-box">
									<span class="details">Password</span>
									  <input type="password" name="pass" required placeholder="enter your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
								</div>
								
								<div class="input-box">
									<span class="details">Confirm Password</span>
									 <input type="password" name="cpass" required placeholder="confirm your password" maxlength="20"  class="box" oninput="this.value = this.value.replace(/\s/g, '')">
								</div>
								
						</div>
						
				<div class="gender-details">
					<input type="radio" name="gender" value = "m" id="dot-1">
					<input type="radio" name="gender" value = "f" id="dot-2">
					<input type="radio" name="gender" value = "o" id="dot-3">
					<span class="gender-title">Gender</span>
					
				<div class="category">
					<label for="dot-1">
						<span class="dot one"></span>
						<span class="gender">Male</span>
					</label>
					
					<label for="dot-2">
						<span class="dot two"></span>
						<span class="gender">Female</span>
					</label>
					
					<label for="dot-3">
						<span class="dot three"></span>
						<span class="gender">Prefer not to say</span>
					</label>
				</div>
				</div>
				
				<!-- register button -->
				<div class="button">
					<input type="submit" value="Register">
					
				<!-- back button -->
					<section class="home" id="home"> <!-- <section class="home" id="home"> -->
						<p><a href="index.php"><input type = "button" value = "Back"> </a></p> <!-- <input type = "button" -->
					</section>
				</div>
			
			</div>
		</form>
		</div>
	</div>
		<script src="js/script.js"></script>
	</body>
</html>
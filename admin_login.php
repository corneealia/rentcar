<?php	
	include ("connection.php");

	session_start();

	if (isset($_POST ['username'])) {
		
		// Find username and password from database
		$sql = "SELECT * FROM login WHERE username = '".$_POST['username']
		."' AND password = '".$_POST['password']."'";
		$query = $conn -> query($sql);
		$row = $query -> fetch_assoc ();
		$num = $query -> num_rows;
		
		// Check if username and password are correct
		if ($num == 1) {
			$_SESSION ['userID'] = $row ['username'];
			$_SESSION ['userLevel'] = $row ['level'];
			$_SESSION ['username'] = $row ['name'];
			
			if ($row ['level'] == "admin") {
				header ("Location: admin_home.php");	
			} 
			
			else {
				header ("Location: index.php");
			}
			
		}

		else {
			echo "<script>
				alert ('You have entered a wrong username of password:');
					window.location = 'login.php';
				</script>";
		}
	}
?>


<!DOCTYPE html>
	<html lang="en" dir="ltr">
		<head>
		
			<meta charset="UTF-8">
				<link rel="stylesheet" href="style2.css">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			
		</head>
   
		<html>
	<body>
		<div class="container">
					<div class="title">Admin Login</div>
						<div class="content">
							<form method="post" acruon="login.php">
								<div class="user-details">
									
									<div class="input-box">
										<span class="details">Username</span>
										<input type="text" name="username" placeholder="Enter your username" required>
									</div>
									
									<div class="input-box">
										<span class="details">Password</span>
										<input type="password" name="password" placeholder="Enter your password" required>
									</div>
       
								</div>
			<!-- submit button -->
			<div class="button">
				<input type="submit" value="Login">
		  
			<!-- back button -->
				<section class="home" id="home">
					<p><a href="index.php">  <input type = "button" value = "Back"> </a></p>
				</section>
			</div>
		
				</form>
			</fieldset>
		</div>
	</body>
</html>
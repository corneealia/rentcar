<?php
	include ("connection.php");
	
	if (!empty ($_POST ['search'])) { // Function empty ()  is use to check for null, "",
		$sql = "SELECT * FROM customer JOIN rental USING  (stu_id) WHERE stu_id = '" .$_POST ['search']."'";
		$query = $conn -> query ($sql);
		$row = $query -> fetch_assoc ();
	}
	
	else {
		$sql = "SELECT * FROM customer JOIN rental USING (stu_id)";
		$query = $conn -> query ($sql);
		$row = $query -> fetch_assoc ();
	}
	
?>

<html>
	<head>
		<!-- Bootstrap CSS-->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all">
		<link rel="stylesheet" href="css/style4.css">
		<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
		
		<style>
		
		table {
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 75%;
		}

		td, th {
		  border: 1px solid #000000;
		  text-align: center;
		  padding: auto;
		}

		tr:nth-child(even) {
		  background-color: white;
		}
		
	</style>
	
	</head>

	<body>
			
			<div align = "center">
				<h1> Customers's Car Rental Info </h1>
				
				<!-- Tag <hr> is use for creating straight line -->
				<hr><br>
				
					<form method = "post" action = "infopurchases.php">
						<input type = "text" name = "search" placeholder = "Enter Cutomer ID">
						
						<input type = "submit" value = "search">
					</form>
					<br>
					<table border = "1">
						<tr>
							<th>Students's ID</th>
							<th>Name</th>
							<th>Username</th>
							<th>Date Pick Up</th>
							<th>Date Drop Off</th>
						
						</tr>
						
					<?php do { ?>
					<tr> 
						<td> <a href = "detail.php?id=<?php echo $row ['stu_id']; ?>">
						<?php echo $row ['stu_id']; ?> </a></td>
						<td> <?php echo $row ['full_name']; ?> </td>
						<td> <?php echo $row ['username']; ?> </td>
						<td> <?php echo $row ['date_pickup']; ?> </td>
						<td> <?php echo $row ['date_dropoof']; ?> </td>
					
					</tr>
					
					<?php } while ($row = $query -> fetch_assoc()) ?>
				</table>
				
				<td><a href = "addinforental.php" Target = "blank"> Insert New Menu</a>
					<br>
					<button onclick = "myPrint()">Print</button>
				<script type = "text/javascript">
					function myPrint() {
						window.print();
					}
				</script>
			</div>
			
			<script>
				function check () {
					// Function comfirm () will produce an alert box which will return true
					var choice = confirm ("Are you sure you want to remove this student?");
					
						if (choice == true) {
							return true;
						}
						
						else {
							return false;
						}
				//}
			</script>
			<a href="admin_home.php" class="btn">Back</a>
		</body>
	</html>
		
	
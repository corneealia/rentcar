<?php
	include ("connection.php");
	
	if (!empty ($_POST ['search'])) { // Function empty ()  is use to check for null, "",
		$sql = "SELECT * FROM rentform WHERE id = '" .$_POST ['search']."'"; //full_name initially
		$query = $conn -> query ($sql);
		$row = $query -> fetch_assoc ();
	}
	
	else {
		$sql = "SELECT * FROM rentform";
		$query = $conn -> query ($sql);
		$row = $query -> fetch_assoc ();

	}

	if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM rentform WHERE id = $id");
   //$delete_product_image->execute([$id]);
   //$fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   $delete_student = $conn->prepare("DELETE FROM `rentform` WHERE id = ?");
   $delete_student->execute([$id]);
   header('location:infocustomer2.php');
};
	
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
				
					<form method = "post" action = "infocustomer2.php"> <!-- infopurchases.php -->
						<input type = "text" name = "search" placeholder = "Enter Rental ID">
						
						<input type = "submit" value = "search">
					</form>
					<br>
					<table border = "1">
						<tr>
							<th>Rental ID</th>
							<th>Students's ID</th>
							<th>Name</th>
							<!--<th>Username</th>-->
							<th>Car Model</th>
							<th>Location Pick Up</th>
							<th>Location Drop off</th>
							<th>Date Pick Up</th>
							<th>Date Drop Off</th>
							<th>Action</th>
        					
						
						</tr>
						
					<?php do { ?>
					<tr> 
						<td> <?php echo $row ['id']; ?> </td>
						<td> <?php echo $row ['stu_id']; ?> </td>
						<td> <?php echo $row ['full_name']; ?> </td>
						<!-- insert php echo username here -->
						<td> <?php echo $row ['model']; ?> </td>
						<td> <?php echo $row ['location_pickup']; ?> </td>
						<td> <?php echo $row ['location_dropoff']; ?> </td>
						<td> <?php echo $row ['pickupD']; ?> </td>
						<td> <?php echo $row ['dropoffD']; ?> </td>
						<td>
           					<a href="editrentinfo.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> Edit </a>
        				
            				<a href="infocustomer2.php?delete=<?php echo $row['id']; ?>" class="btn" style="background-color:red; color:white;"> <i class="fas fa-trash"></i> Delete </a>
        				</td>
					
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
		
	
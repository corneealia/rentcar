<?php	
	include ("connection.php");

	session_start();
	$rent_ID = 'rent_ID'; //$rent_ID = ['rent_ID'];
	$full_name = $_POST['full_name'];
	$stu_id = $_POST['stu_id'];
	$model = $_POST['model'];
	$location_pickup = $_POST['location_pickup'];
	$location_dropoff = $_POST['location_dropoff'];
	$pickupD = $_POST['pickupD'];
	$dropoffD = $_POST['dropoffD'];


	if($conn->connect_error){
		die('Connection failed: ' .$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into rentform(full_name, stu_id, model, location_pickup, location_dropoff, pickupD, dropoffD)values(?,?,?,?,?,?,?)");
		$stmt->bind_param("sisssss", $full_name, $stu_id, $model, $location_pickup, $location_dropoff, $pickupD, $dropoffD);
		$stmt->execute();
		$rent_ID = $conn->insert_id;

		  // Retrieve the price of the selected car model
  $sql = "SELECT price2 FROM car WHERE name = '$model'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $car_price2 = $row['price2'];

  // Do any additional processing with the car model and price here
  

  // Output the results
  //echo "You selected the car model: " . $model . "<br>";
  //echo "The price of the car is: " . $car_price2;

		//header("Location: checkout.php");

	}

?>

<!DOCTYPE html>
<html>
	<div style="background-color: lightgray; padding: 20px; border-radius: 10px;">
  <h3 style="text-align: center;">Checkout Summary</h3>
  <hr>
  <p><strong>Your rental ID is : </strong> <span style="color: blue;"> <?php echo $rent_ID; ?> </span></p>
  <p><strong>Your name: </strong> <span style="color: blue;"> <?php echo $full_name; ?> </span></p>
  <p><strong>Your student ID is : </strong> <span style="color: blue;"> <?php echo $stu_id; ?> </span></p>
  <p><strong>You selected the car model:</strong> <span style="color: blue;"> <?php echo $model; ?> </span></p>
  <p><strong>The price of the car is:</strong> <span style="color: blue;"> RM<?php echo $car_price2; ?> </span></p>
  <p><strong>Pickup Location: </strong> <span style="color: blue;"> <?php echo $location_pickup; ?> </span></p>
  <p><strong>Drop off Location: </strong> <span style="color: blue;"> <?php echo $location_dropoff; ?> </span></p>
  <p><strong>Pickup Date: </strong> <span style="color: blue;"> <?php echo $pickupD; ?> </span></p>
  <p><strong>Drop off Date: </strong> <span style="color: blue;"> <?php echo $dropoffD; ?> </span></p>

<a href="index.php">Home</a>

</html>
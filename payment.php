<?php	
	include ("connection.php");

	session_start();

	$full_name = $_POST['full_name'];
	$stu_id = $_POST['stu_id'];
	$model = $_POST['model'];
	$location_pickup = $_POST['location_pickup'];
	$location_dropoff = $_POST['location_dropoff'];
	$pickupD = $_POST['pickupD'];
	$dropoffD = $_POST['dropoffD'];
	

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

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<form method = "post" action = "pay_submit.php">
	<div style="background-color: lightgray; padding: 20px; border-radius: 10px;">
  <h3 style="text-align: center;">Payment</h3>
  <hr>
  <p><strong>You selected the car model:</strong> <span style="color: blue;"> <?php echo $model; ?> </span></p>
  <p><strong>The price of the car is:</strong> <span style="color: blue;"> RM<?php echo $car_price2; ?> </span></p>

  <br>

     <input type="radio" id="choiceA" name="payment_method" value="card" onclick="showInput()">
    <label for="choiceA">Debit Card</label><br>
    <input type="radio" id="choiceB" name="payment_method" value="cash" onclick="hideInput()">
    <label for="choiceB">Cash / COD</label><br><br>
    <div id="card-input" style="display:none">
    Enter card number: <input type="text" id="cardNumber">
  </div>

  <script>
  	function showInput() {
  document.getElementById("card-input").style.display = "block";
}

function hideInput() {
  document.getElementById("card-input").style.display = "none";
}
  </script>

<tr><td colspan = "2" align = "right"> <input type = "submit" name = "proceed">

</div>
</form>



<a href="index.php">Home</a>
</body>
</html>
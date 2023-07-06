<?php

  include ("connection.php");

  session_start();

  $model = $_POST['model'];

  // Retrieve the price of the selected car model
  $sql = "SELECT price2 FROM car WHERE name = '$model'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $car_price2 = $row['price2'];

  // Do any additional processing with the car model and price here
  

  // Output the results
  echo "You selected the car model: " . $model . "<br>";
  echo "The price of the car is: " . $car_price2;
?>
<?php 
  include ("connection.php");

  session_start();

  $full_name = $_GET['full_name'];
 
  $model = $_GET['model'];
 
  $payment_method = $_POST['payment_method'];

      // Retrieve the price of the selected car model
 $sql = "SELECT price2 FROM car WHERE name = '$model'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $car_price2 = $row['price2'];

$status = "completed";
$sql = "INSERT INTO rent_payment (full_name, model, price, payment_method, status)
VALUES ('$full_name', '$model', '$car_price2', '$payment_method', '$status')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>
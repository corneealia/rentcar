<?php

include ("connection.php");

$id = $_GET['edit'];

if(isset($_POST['add_rentalcar'])){

   $car_name = $_POST['name'];
   $car_price1 = $_POST['price1'];
   $car_price2 = $_POST['price2'];
   $car_image = $_FILES['car_image']['name'];
   $car_image_tmp_name = $_FILES['car_image']['tmp_name'];
   $car_image_folder = 'uploaded_img/'.$car_image;

 
      $update_data = "UPDATE car SET name='$car_name', price1='$car_price1', price2='$car_price2', image='$car_image'  WHERE car_id = '$id'";
      $upload = mysqli_query($conn, $update_data);
   
      if( !empty ($upload)){
         move_uploaded_file($car_image_tmp_name, $car_image_folder);
         header('location:addinforental.php');
      }else{
         $message[] = 'please fill out all!'; 
      }

   
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style4.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM car WHERE car_id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the car rental</h3>
      <input type="text" class="box" name="name" value="<?php echo $row['name']; ?>" placeholder="enter the car name">
	  
      <input type="number" min="0" class="box" name="price1" value="<?php echo $row['price1']; ?>" placeholder="enter the car price per day">
	  
	  <input type="number" min="0" class="box" name="price2" value="<?php echo $row['price2']; ?>" placeholder="enter the car price full day">
	  
      <input type="file" class="box" name="car_image"  accept="image/png, image/jpeg, image/jpg">
	  
      <input type="submit" class="btn" name="add_rentalcar" value="add car">
      <a href="addinforental.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>
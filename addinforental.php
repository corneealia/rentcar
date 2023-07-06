<?php

include ("connection.php");


if(isset($_POST['add_rentalcar'])){

   $car_name = $_POST['car_name'];
   $car_price1 = $_POST['car_price1'];
   $car_price2 = $_POST['car_price2'];
   $car_image = $_FILES['car_image']['name'];
   $car_image_tmp_name = $_FILES['car_image']['tmp_name'];
   $car_image_folder = 'uploaded_img/'.$car_image;

   if(empty($car_name) || empty($car_price1) || empty($car_price2) || empty($car_image)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO car(name, price1, image, price2) VALUES('$car_name', '$car_price1', '$car_image', '$car_price2')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($car_image_tmp_name, $car_image_folder);
         $message[] = 'new product added successfully';
      }else{
         $message[] = 'could not add the product';
      }
   }

}

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM car WHERE car_id = $id");
   //$delete_product_image->execute([$id]);
   //$fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   $delete_product = $conn->prepare("DELETE FROM `car` WHERE car_id = ?");
   $delete_product->execute([$id]);
   header('location:addinforental.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
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

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new car</h3>
         <input type="text" placeholder="enter car name" name="car_name" class="box">
         <input type="number" placeholder="enter car price per day" name="car_price1" class="box">
		 <input type="number" placeholder="enter car price full day" name="car_price2" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="car_image" class="box">
         <input type="submit" class="btn" name="add_rentalcar" value="add car rental">
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM car");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>car image</th>
            <th>car name</th>
            <th>car price per day</th>
			<th>car price full day</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['price1']; ?></td>
			<td><?php echo $row['price2']; ?></td> <!-- full day price -->
            <td>
               <a href="editcar.php?edit=<?php echo $row['car_id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="addinforental.php?delete=<?php echo $row['car_id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>

<a href="admin_home.php" class="btn">Back</a>
</body>
</html>
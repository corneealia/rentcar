<?php

include ("connection.php");

$id = $_GET['edit'];

if(isset($_POST['editstudent'])){

   $rent_ID = 'rent_ID'; //$rent_ID = ['rent_ID'];
   $stu_id = $_POST['stu_id'];
   $full_name = $_POST['full_name'];
   //$stu_id = $_POST['stu_id'];
   $model = $_POST['model'];
   $location_pickup = $_POST['location_pickup'];
   $location_dropoff = $_POST['location_dropoff'];
   $pickupD = $_POST['pickupD'];
   $dropoffD = $_POST['dropoffD'];

 
      $update_data = "UPDATE rentform SET stu_id='$stu_id', full_name='$full_name', model='$model', location_pickup='location_pickup', location_dropoff='location_dropoff',
      pickupD='$pickupD', dropoffD='$dropoffD'";
      $upload = mysqli_query($conn, $update_data);
   

   
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
      
      $select = mysqli_query($conn, "SELECT * FROM rentform WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   <form action="" method="post" enctype="multipart/form-data">
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
                  <td> <input type="text" class="box" name="stu_id" value="<?php echo $row['stu_id']; ?>" placeholder="Enter name"> </td>
                  <td> <input type="text" class="box" name="full_name" value="<?php echo $row['full_name']; ?>" placeholder="Enter name"></td>
                  <!-- insert php echo username here -->
                  <td> <select name="model">
                     <?php
                     $sql = "SELECT name FROM car";
                     $result = mysqli_query($conn, $sql);

         
                     // Loop through the result and add each model as an option
                      while ($row = mysqli_fetch_array($result)) {
                     echo "<option value='".$row['name']."'>".$row['name']."</option>";
                     }?>

                  <td> Pick-Up Location : <br> <select name = "location_pickup" value = "<?php echo $row ['location_pickup']; ?>" > 
                     <option value ="select your location">Select your location..</option>
                     <option value ="kotaSamarahan">Kota Samarahan</option>
                     <option value ="desaIlmu">Desa Ilmu</option>
                     <option value ="palmVillage">Palm Village</option>
                     <option value ="ks1">Uitm KS 1</option>
                     <option value ="ks2">Uitm KS 2</option> </td>

                  <td> Drop-Off Location :  <select name = "location_dropoff" value = "<?php echo $row ['location_dropoff']; ?>" > 
                     <option value ="select your location">Select your location..</option>
                     <option value ="kotaSamarahan">Kota Samarahan</option>
                     <option value ="desaIlmu">Desa Ilmu</option>
                     <option value ="palmVillage">Palm Village</option>
                     <option value ="ks1">Uitm KS 1</option>
                     <option value ="ks2">Uitm KS 2</option>
                  </select> </td>

                  <td> Pick-up Date:
                  <input type="date" name = "pickupD"> </td>

                  <td> Drop-off Date:
                  <input type="date" name = "dropoffD"> </td>

                  <td>

                     <input type="submit" class="btn" name="edit" value="update">
                     <a href="infocustomer2.php" class="btn">go back!</a>
                  </td>
               
               </tr>
               
               <?php } while ($row = $query -> fetch_assoc()) ?>
            </table>
             </form>
   
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

   



</body>
</html>
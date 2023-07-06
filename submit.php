<?php

include ("connection.php");
  session_start();

  if(isset($_SESSION['stu_id'])){
     $stu_id = $_SESSION['stu_id'];
  }else{
     $stu_id = '';
  };

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $fullname = $_POST['fullname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $stu_id = $_POST['stu_id'];
  $noTell = $_POST['noTell'];
  $university = $_POST['university'];
  $password = $_POST['pass'];
  $cpass = $_POST['cpass'];
  $gender = $_POST['gender'];
  
 // $conn = mysqli_connect('host', 'username', 'password', 'database');

  $query = "INSERT INTO users (full_name, username, email, stu_id, hp_num, university, password, c_pass, gender)
            VALUES ('$fullname', '$username', '$email', '$stu_id', '$noTell', '$university', '$password', '$cpass', '$gender')";
  mysqli_query($conn, $query);

  header("Location: login.php");
exit;
}
?>
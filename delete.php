<?php
	include("connection.php");
	$id=@$_POST['id']; 
	$sql="DELETE FROM car WHERE car_id = '$id'";
	echo mysqli_error($conn);
	if ($conn -> query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

?>
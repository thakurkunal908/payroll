<?php 
require('./includes/common.php');
if(!isset($_SESSION)){
	header('Location:login.php');
}

$id=$_POST['save_id'];
$leaves=$_POST['leave'];
$overtime=$_POST['overtime'];
$conveyence=$_POST['conveyence'];

$query="INSERT INTO `record` (`employee_id`, `leaves`, `overtime`, `conveyence`) VALUES ('$id', '$leaves', '$overtime', '$conveyence')";
	mysqli_query($conn,$query) or die(mysqli_error($conn));
	$error = "Pay Slip saved!";
	header('location:index.php?error=' . $error);
 ?>
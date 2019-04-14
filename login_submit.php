<?php
require './includes/common.php';

$user_name=mysqli_real_escape_string($conn,$_POST['user_name']);
$password=$_POST['password'];


$query = "SELECT id,user_name FROM payroll.users WHERE `user_name` = '$user_name' and `password` = '$password'";
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
$total_rows = mysqli_num_rows($result);
if($total_rows == 0){
	$error = "<span class='red'>Please enter correct E-mail id and Password</span>";
	header('location: login.php?error=' . $error);
}else{
	$row = mysqli_fetch_array($result);
	$_SESSION['user_name'] = $row['user_name'];
	$_SESSION['user_id'] = $row['id'];
	header('Location:index.php');
}
?>
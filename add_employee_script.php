<?php
require './includes/common.php';

if(isset($_SESSION)){
	
}

$name=mysqli_real_escape_string($conn, $_POST['name']);
$dob=mysqli_real_escape_string($conn, $_POST['dob']);
$gender=mysqli_real_escape_string($conn, $_POST['gender']);
$address=mysqli_real_escape_string($conn, $_POST['address']);
$phone=mysqli_real_escape_string($conn, $_POST['phone']);
$email=mysqli_real_escape_string($conn, $_POST['email']);
$branch=mysqli_real_escape_string($conn, $_POST['branch']);
$department=mysqli_real_escape_string($conn, $_POST['department']);
$startdate=mysqli_real_escape_string($conn, $_POST['startdate']);
$shift=mysqli_real_escape_string($conn, $_POST['shift']);
$basic=mysqli_real_escape_string($conn, $_POST['basic']);

$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";

if (!preg_match($regex_email, $email)) {
    $error = "<span class='red'>Not a valid Email Id</span>";
    header('location: add_employee.php?error=' . $error);}

$query="SELECT id FROM payroll.employee WHERE employee.email = '$email'";
$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
$total_rows = mysqli_num_rows($result);
if($total_rows>0){
	$error = "Employee Already exists!";
	header('location: add_employee.php?error=' . $error);
}else{
	$insert="INSERT INTO `employee` (`name`, `dob`, `gender`, `address`, `branch`, `department`, `startdate`, `shift`, `basic` ,`phone` , `email`) VALUES ('$name', '$dob', '$gender', '$address', '$branch', '$department', '$startdate', '$shift', '$basic', '$phone', '$email')";
	mysqli_query($conn,$insert) or die(mysqli_error($conn));
	$error = "Employee Data Stored!";
	header('location: add_employee.php?error=' . $error);
}?>
<?php require './includes/common.php';?>
<?php
if(!isset($_SESSION['user_name'])){

    header('Location:index.php');
}

$user_name=mysqli_real_escape_string($conn, $_SESSION['user_name']);
$oldPassword = mysqli_real_escape_string($conn, $_POST['old-password']);
$newPassword = mysqli_real_escape_string($conn, $_POST['password']);
$rePassword = mysqli_real_escape_string($conn, $_POST['password1']);

if(strlen($newPassword)<5){

	header('location: settings.php?error=Weak Password must be greater then 6 characters.');

}else if(strcmp($newPassword,$rePassword) != 0)
{
     header('location: settings.php?error=The two passwords don\'t match');
} else 
{
    $fetch_query = "SELECT password FROM users WHERE `user_name` = '$user_name'";
	$result=mysqli_query($conn,$fetch_query) or die(mysqli_error($conn));
	$row=mysqli_fetch_array($result);
	print_r($row);
	if($row['password']==$oldPassword){
		echo 'matched';
		$update_query="UPDATE `users` SET `password` = '$newPassword' WHERE `users`.`user_name` ='$user_name'";
		mysqli_query($conn,$update_query) or die(mysqli_error($conn));
		 header('location: settings.php?error=Password Updated');
	}else{
		header('location: settings.php?error=Wrong Old Password');
	}
}
?>

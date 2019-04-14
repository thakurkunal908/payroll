<?php require './includes/common.php';?>

<?php

if(!isset($_SESSION['user_name'])){

    header('Location:login.php');
}

?>
 

<?php 

$id=$_GET['id'];

$query = "SELECT * FROM `employee` WHERE id = '$id'";

$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

$total_rows = mysqli_num_rows($result); 

if($total_rows == 0){
	$error = "Employee does not exists!";
	header('location: delete.php?error=' . $error);
}
else{
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Details | Payroll</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
    	<div class="row">
    		<div class="col-xs-12 col-md-8 col-md-offset-2">
    			<div class="panel panel-info">
			  		<div class="panel-heading">
			  			<h3>Employee ID : <?php echo $id; ?></h3>
			  		</div>
			  		<div class="panel-body">
			  			<table class="table table-striped">
			  				<thead><th></th><th></th></thead>
			  				<tbody>
			  					<tr><td>Name</td><td><?php echo ": ".$row['name']; ?></td></tr>
			  					<tr><td>DOB</td><td><?php echo ": ".$row['dob']; ?></td></tr>
			  					<tr><td>Gender</td><td><?php echo ": ".$row['gender']; ?></td></tr>
			  					<tr><td>Address</td><td><?php echo ": ".$row['address']; ?></td></tr>
			  					<tr><td>Phone</td><td><?php echo ": ".$row['phone']; ?></td></tr>
			  					<tr><td>Email</td><td><?php echo ": ".$row['email']; ?></td></tr>
			  					<tr><td>Branch</td><td><?php echo ": ".$row['branch']; ?></td></tr>
			  					<tr><td>Designation</td><td><?php echo ": ".$row['department']; ?></td></tr>
			  					<tr><td>Joining Date</td><td><?php echo ": ".$row['startdate']; ?></td></tr>
			  					<tr><td>Shift</td><td><?php echo ": ".$row['shift']; ?></td></tr>
			  					<tr><td>Basic Pay</td><td><?php echo ": ".$row['basic']; ?></td></tr>
			  				</tbody>
			  			</table>
			  		</div>
			  		<div class="panel-footer">
			  			<a href="view.php" class="btn btn-primary">Go Back</a>
			  			<?php if(isset($_GET['delete'])){ ?>
			  			<form action="delete.php" method="GET">
		                    <input type="hidden" name="del_id" value="<?php echo $id; ?> ">
		                    <br>
		                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
		                </form>
		               	<?php } ?>
			  		</div>
			  		<?php } ?>
				</div>
    		</div>
    	</div>
    </div>
<?php require './includes/common.php'; ?>

<?php

if(!isset($_SESSION['user_name'])){

    header('Location:login.php');
}

if(isset($_GET['delete'])){

    $del_id=mysqli_real_escape_string($conn,$_GET['del_id']);

    $sql = "DELETE FROM `employee` WHERE id = '$del_id'";
    
    if(mysqli_query($conn,$sql)){
       	$success = "Employee data deleted!";
		header('location: delete.php?success=' . $success);
    }else{
        echo 'query error:'.mysqli_error($conn);
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Delete Employee | Payroll</title>
		<link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
    	<?php include './includes/header.php'; ?>
			<div class="container">
				<div class="row">
					<div class="panel panel-default">
						<div class="panel-body">
					<div class="col-md-6 col-md-offset-3">
						<form action="details.php" method="GET">
							<div class="form-group">
								<h3>Enter Employee ID:</h3>
								<input type="text" class="form-control" name='id' placeholder="Employee ID" required="True">
								<br>
								<input type="submit" value="submit" name="delete" class='btn btn-danger'>
								
                            <h3 style="text-align: center" class="text-danger">
                                
                                <?php
                                	if(isset($_GET['success']))
                                	 {echo $_GET['success'];}
                                	if(isset($_GET['error'])) 
                                		{echo $_GET['error'];}
                                ?>
             
                            </h3>

							</form>
							</div>
						</div>
						</div>

					</div>
				</div>
			</div>	
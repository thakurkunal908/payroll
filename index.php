<?php require './includes/common.php'; ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Index | Payroll</title>
		<link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
    	<?php include './includes/header.php'; ?>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="thumbnail">
	                        <img src="./img/add.png" alt="">
	                        <div class="caption">
	                            <h3>ADD EMPLOYEE</h3>
	                            <a href="add_employee.php" name="add" value="add" class="btn btn-block
	                            btn-primary">CLICK</a>
	                        </div>
                        </div>   
					</div>
					<div class="col-md-4">
						<div class="thumbnail">
	                        <img src="./img/view.png" alt="">
	                        <div class="caption">
	                            <h3>VIEW EMPLOYEE</h3>
	                            <a href="view.php" name="add" value="add" class="btn btn-block
	                            btn-primary">CLICK</a>
	                        </div>
                        </div>   
					</div>
					<div class="col-md-4">
						<div class="thumbnail">
                        	<img src="./img/view.png" alt="">
                        	<div class="caption">
	                            <h3>DELETE EMPLOYEE</h3>
	                            <a href="delete.php" name="add" value="add" class="btn btn-block
	                            btn-primary">CLICK</a>
                        	</div>
                    	</div>   
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-danger">
							<div class="panel-heading">Salary Management</div>
							<div class="panel-body">
								<form action="pay.php" method="GET">
									<div class="form-group">
										<label>Enter Employee ID:</label>
										<input type="text" class="form-control" placeholder="Enter employee ID."name="id" required>
									</div>
									<div class="form-group">
										<label for="leave">Leave:</label>
										<input type="text" class="form-control" placeholder="Total Leave Days." name="leave" required> 
									</div>

									<div class="form-group">
										<label for="overtime">Overtime:</label>
										<input type="text" class="form-control" placeholder="overtime in hours." name="overtime" required>
									</div>

									<div class="form-group">
										<label for="Conveyence">Conveyence</label>
										<input type="text" class="form-control" placeholder="Conveyence" name="conveyence" required>
									</div>
										<h3 class="text-danger" style="text-align:center;">
											<?php
		                                    	if(isset($_GET['error'])) {echo $_GET['error'];}
		                                    ?>
	                                   	</h3>
									<div>
										<input type="submit" name="submit" value="Pay" class="btn btn-primary btn-lg">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php include './includes/footer.php'; ?>
	</body>
</html>
<?php require './includes/common.php';?>

<?php

if(!isset($_SESSION['user_name'])){

    header('Location:login.php');
}


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Employee | Payroll</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php include 'includes/header.php'; ?>
        <div class="container-fluid decor_bg" id="content">
            <div class="row">
                <div class="container ">
                    <div class="col-xs-12 col-md-6 col-md-offset-3">
                        <form action="add_employee_script.php" method="POST">
                            <div class="form-group">
                                <label class="control-label" for="date">Name:</label>
                                <input class="form-control" placeholder="Name" name="name"  required>
                            </div>

                            <div class="form-group"> <!-- Date input -->
                                <label class="control-label" for="date">DOB:</label>
                                <input class="form-control" id="date" name="dob" placeholder="MM/DD/YYY" type="date" required>
                            </div>

                            <div class="form-group"> <!-- Date input -->
                                <input type="radio" name="gender"  value="male" > Male<br>
                                <input type="radio" name="gender"  value="female"> Female<br>
                                <input type="radio" name="gender"  value="other"> Other
                            </div>
                                

                            <div class="form-group">
                                <label class="control-label" for="date">Address:</label>
                                <input class="form-control" placeholder="Address" name="address"  required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="date">Phone:</label>
                                <input class="form-control" placeholder="Phone" name="phone"  required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="date">Email:</label>
                                <input class="form-control" placeholder="Email" name="email"  required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="date">Branch:</label>
                                <input class="form-control" placeholder="Branch" name="branch"  required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="date">Designation:</label>
                                <input class="form-control" placeholder="Department" name="department"  required>
                            </div>

                            <div class="form-group"> <!-- Date input -->
                                <label class="control-label" for="date">Joining Date:</label>
                                <input class="form-control" id="date" name="startdate" placeholder="MM/DD/YYY" type="date" required />
                            </div>

                            <div class="form-group"> <!-- Date input -->
                                <input type="radio" name="shift"  value="day" checked="True"> Day<br>
                                <input type="radio" name="shift"  value="night">Night<br>
                            </div>

                            <div class="form-group"> <!-- Date input -->
                                <label class="control-label" for="date">Basic Pay:</label>
                                <input class="form-control" name="basic" placeholder="Basic pay" type="text"/>
                            </div>
                            <h3 style="text-align: center" class="text-danger">
                                <?php
                                    if(isset($_GET['error'])) {echo $_GET['error'];}
                                ?>
             
                            </h3>
                            <div>
                                <input type="submit" name="submit" value="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
</html>
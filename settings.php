<?php require './includes/common.php';?>
<?php
if(!isset($_SESSION['user_name']))
{
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Settings | Payroll</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php include 'includes/header.php'; ?>
        <div class="container-fluid" id="content">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4" id="settings-container">
                    <h4>Change Password</h4>
                    <form action="settings_script.php" method="POST">
                        <div class="form-group">
                            <input type="password" class="form-control" name="old-password"  placeholder="Old Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="New Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password1"  placeholder="Re-type New Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Change</button>
                        <!-- Displaying error using GET super global variable from setting_scripts page-->
                        <div><p class="text-danger">
                            <?php 
                                if(isset($_GET['error'])) {
                                echo "<br><br><b class='red'>" . $_GET['error'] . "</b>";
                            }
                            ?>    
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'includes/footer.php'; ?>
</html>
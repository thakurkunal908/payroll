<?php require './includes/common.php';?>

<?php

if(!isset($_SESSION['user_name'])){

    header('Location:login.php');
}


?>
 

<?php 

$query = "SELECT id,name,branch,department,phone,email FROM `employee`";

$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

$total_rows = mysqli_num_rows($result); 

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Employee Data | Payroll</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php include 'includes/header.php'; ?>

        <div class="container ">
            <div class="row">
                <div class="col-xs-12 ">
                    <div class="jumbotron"><h1 style="text-align: center;">Employee Data</h1></div>
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>Employee ID</th><th>Employee Name</th><th>Branch</th><th>Department</th><th>Phone</th><th>Email</th><th>Info</th>
                        </thead>
                        <tbody>
                            <?php 

                                if($total_rows==0){
                                    echo '<p class="text-danger" style="text-align: center; font-size: 2em;">No Employee Data Found!<p>';
                                }else{

                                $i=1;

                                while ($i<=$total_rows) {

                                    $row = mysqli_fetch_array($result);
                            ?>
                                <tr>

                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['branch'];?></td>
                                    <td><?php echo $row['department'];?></td>
                                    <td><?php echo $row['phone'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><a href='details.php?id=<?php echo $row['id'];?>'class="btn btn-info">View Details</a></td>
                                <?php 
                                    
                                    $i=$i+1;

                                    }
                                } 
                                ?> 
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php include './includes/footer.php'; ?>
    </body>
</html> 

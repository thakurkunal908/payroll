<?php require './includes/common.php';?>


<?php


if(!isset($_SESSION['user_name'])){

    header('Location:login.php');
}

if(isset($_POST['delete_id'])){
    $delete_id=$_POST['delete_id'];
    $query="DELETE FROM `record` WHERE `record`.`record_id`='$delete_id'";
    mysqli_query($conn,$query) or die(mysqli_error($conn));
    $response="Record Deleted!";
}
?>
 

<?php 

$query = "SELECT * FROM `record`";

$result = mysqli_query($conn,$query) or die(mysqli_error($conn));

$total_rows = mysqli_num_rows($result); 

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Past Records | Payroll</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php include 'includes/header.php'; ?>

        <div class="container">
            <div class="row" >
                <div class="col-xs-12">
                <div class="jumbotron"><h1 style="text-align: center;">Past Records</h1></div>
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>Employee ID</th><th>Leaves</th><th>Overtime</th><th>conveyence</th><th>Date</th><th></th><th></th>
                        </thead>
                        <tbody>
                            <?php 

                                if($total_rows==0){
                                    echo '<p class="text-danger" style="text-align: center; font-size: 2em;">No Records Found!<p>';
                                }else{

                                $i=1;

                                while ($i<=$total_rows) {

                                    $row = mysqli_fetch_array($result);
                            ?>   
                                <tr>

                                    <td><?php echo $row['employee_id'];?></td>
                                    <td><?php echo $row['leaves'];?></td>
                                    <td><?php echo $row['overtime'];?></td>
                                    <td><?php echo $row['conveyence'];?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    <td>
                                        <form action="pay.php" method="GET">
                                            <input type="hidden" value="<?php echo $row['employee_id']; ?>" name="id">
                                            <input type="hidden" value="<?php echo $row['leaves']; ?>" name="leave"> 
                                            <input type="hidden" value="<?php echo $row['overtime']; ?>" name="overtime">
                                            <input type="hidden" value="<?php echo $row['conveyence']; ?>" name="conveyence">
                                            <input type='hidden' value="saved" name="saved">
                                            <input type="submit" name="submit" value="Payslip" class="btn btn-primary">
                                         </form>
                                    </td>
                                    <td>
                                         <form action="past_record.php" method="POST"> 
                                            <input type="hidden" name="delete_id" value="<?php echo $row['record_id']; ?>">
                                            <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                                         </form>
                                    </td>
                                <?php 
                                    
                                    $i=$i+1;
                                    }
                                } 
                                ?> 
                                </tr>
                            </tbody>
                        </table>
                    </div>
                        <h3 style="text-align: center; color: red;"><?php 
                        if (isset($response)) {
                            echo $response;
                             
                         } ?></h3>
                </div>
            </div>
        </div>
    <?php include './includes/footer.php'; ?>
    </body>
</html> 

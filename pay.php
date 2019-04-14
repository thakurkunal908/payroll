<?php require './includes/common.php'; ?>


<?php if(!isset($_SESSION['user_name'])){
    header('Location:login.php');}
?>

<?php 

$id=mysqli_real_escape_string($conn, $_GET['id']);

$leave=mysqli_real_escape_string($conn, $_GET['leave']);

$overtime=mysqli_real_escape_string($conn, $_GET['overtime']);

$conveyence=mysqli_real_escape_string($conn, $_GET['conveyence']);

$query="SELECT basic,name,startdate,department FROM `employee` WHERE id = '$id'";

$result=mysqli_query($conn,$query) or die(mysqli_error($conn));

$row_fetched = mysqli_num_rows($result);

if($row_fetched==0){
    $error = "No employee found!";
    header('location: index.php?error=' . $error);
}

$row = mysqli_fetch_array($result);

$basic = $row['basic'];

$name = $row['name'];

$startdate = $row['startdate'];

$department = $row['department'];

$DA=$basic * (1/2);

$HRA=$basic * (1/10);

$MA=$basic * (3/100);

$PF = 780;

$PT = 200;

$worked = 30 - $leave;

$leave_dedcution = ($basic/30)*$leave;

$overtime = (($basic/30)/24)*$overtime;

$Salary = ($basic + $DA + $HRA + $MA + $overtime + $conveyence) - ($PF + $PT + $leave_dedcution);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pay Slip | Payroll</title>
		<link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
    	<?php include './includes/header.php'; ?>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-body">
                                <h2 style="text-align: center;">ORGANIZATION NAME</h2>
                                <h3 style="text-align: center;">2nd Floor, SMR RAJIV Estates,</h3>
                                <h3 style="text-align: center;">Commercial Complex, Outer Ring Road</h3>
                          </div>
                        </div>
					</div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-body">
                              <h3 style="text-align: center;">Pay Slip</h3>  
                              <h4>Employee id                          :<?php echo $id;?></h4>
                              <h4>Name                                 : <?php echo $name; ?></h4>
                              <h4>Department                           : <?php echo $department; ?></h4>
                              <h4>Date of Joining                      : <?php echo $startdate; ?></h4>
                              <h4>Days worked                          :<?php echo $worked; ?></h4>
                              <h4>Leave                                : <?php echo $leave; ?></h4>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <br>
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <th>Earnings</th><th>Amount</th><th>Deductions</th><th>Amount</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Basic Pay</td>
                                    <td><?php echo $basic; ?></td>
                                    <td>Provident Fund</td>
                                    <td><?php echo $PF; ?></td>
                                </tr>
                                <tr>
                                    <td>Dearness Allowance</td>
                                    <td><?php echo $DA; ?></td>
                                    <td>Profesional Tax</td>
                                    <td><?php echo $PT; ?></td>                                
                                   
                                    
                                </tr>
                                <tr>
                                    <td>Medical Allowance</td>
                                    <td><?php echo $MA; ?></td>
                                    <td>Leave Deduction</td>
                                    <td><?php echo $leave_dedcution; ?></td>
                                </tr>
                                <tr>
                                    <td>Overtime</td>
                                    <td><?php echo $overtime; ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>House Rent Allowance</td>
                                    <td><?php echo $HRA; ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Conveyance Allowance</td>
                                    <td><?php echo $conveyence; ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td><td></td><td>Total Salary</td><td><?php echo $Salary; ?></td>
                                </tr>
                            </tbody>
                        </table>
                            <form action="record.php" method="POST">
                            <input type="hidden" name="save_id" value="<?php echo $_GET['id']; ?> ">
                            <input type="hidden" name="leave" value="<?php echo $_GET['leave']; ?> ">
                            <input type="hidden" name="overtime" value="<?php echo $_GET['overtime']; ?> ">
                            <input type="hidden" name="conveyence" value="<?php echo $_GET['conveyence']; ?> ">
                            <?php   
                            if(isset($_GET['saved'])){?>
                            <input type="submit" name="save" value="Saved" class="btn btn-danger btn-lg" disabled='true'>
                            <?php   }else{ ?>
                            <input type="submit" name="save" value="Save" class="btn btn-success btn-lg">
                            <?php   } ?>
                            </form>
                    </div>
                </div>
            </div>
            <?php include './includes/footer.php'; ?>
        </body>



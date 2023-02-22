<?php include("../../env/con_db.php");?>
<?php 
    session_start(); 
    if ($_SESSION['level'] != '0') {
        header('location: logout.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบยืม-คืนอุปกรณ์</title>
    <link rel="stylesheet" href="asset/css/sidebars.css">
    <link rel="stylesheet" href="asset/css/box.css">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <?php include_once("../asset/css/index.php");?>

</head>

<body>
    <div class="d-flex bg-light" id="wrapper">
        <?php include_once("navbar.php");?>
        <!-- Page content-->
        <div class="container-fluid">
            <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php 
                            echo $_SESSION['success']; 
                            unset($_SESSION['success']);
                        ?>
            </div>
            <?php } ?>
            <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
                <?php 
                            echo $_SESSION['error']; 
                            unset($_SESSION['error']);
                        ?>
            </div>
            <?php } ?>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <div class="card text-dark bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fa fa-home fa-5x"></i> รายการยืม 7 จำนวน
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card text-dark bg-danger mb-3 ">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="fa fa-bell-slash fa-5x"></i> รายการค้างคืน 7 จำนวน
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card text-dark bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php   
                                    $i= 1;
                                    $sql= "SELECT SUM($i) as id FROM users";
                                    $array = mysqli_query($con,$sql);
                                    $sumuser = mysqli_fetch_assoc($array);       
                                ?>
                                <i class="fa fa-user fa-5x"></i> สมาชิกทั้งหมด <?php echo $sumuser['id']; ?> จำนวน
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card text-dark bg-info mb-3">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php   
                                    $i= 1;
                                    $sql= "SELECT SUM($i) as id FROM shop";
                                    $array = mysqli_query($con,$sql);
                                    $sumtool = mysqli_fetch_assoc($array);       
                                ?>
                                <i class="fa fa-tasks fa-5x"></i> อุปกรณ์ทั้งหมด <?php echo $sumtool['id']; ?> จำนวน
                            </h5>
                        </div>
                    </div>
                </div>

            </div>
            <?php include_once("board.php");?>
</body>

</html>
<script src="asset/js/sidebar.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<!-- script datatable -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
   <!-- end script datatable -->
<?php include("../asset/js/script.php") ?>
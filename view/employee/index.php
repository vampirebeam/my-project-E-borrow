<?php include("../../env/con_db.php");?>
<?php 
    session_start(); 
    if ($_SESSION['level'] != '1') {
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

            <div class="card">
            <div class="card-header bg-primary text-light">
                <h5><i class="fa-sharp fa-solid fa-repeat fa-1x"></i>&nbsp;สถาณะอุปกรณ์ทั้งหมด</h5>
            </div>
            <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">หน้าแรก</a></li>
                            <li class="breadcrumb-item active">ยืม - คืนอุปกรณ์</a></li>
                            <li class="breadcrumb-item"><a href="trading/history/index">ประวัติ</a></li>
                        </ol>
                    </nav>
            <div class="row">
                          <div class="col-sm-4">
                            <div class="card">
                                <div
                                    class="card-body list-group-item list-group-item-action list-group-item-warning p-3 text-center">
                                    <?php   
                                            $sql= " SELECT sum(status='รออนุมัติการยืม') id FROM history
                                                    WHERE username = '$_SESSION[username]'";
                                            $array = mysqli_query($con,$sql);
                                            $sum = mysqli_fetch_assoc($array);       
                                    ?>
                                    <i class="fa-solid fa-clock-rotate-left fa-4x">
                                        <h5 class="card-title mt-2">&nbsp;รออนุมัติการยืม <?php echo $sum['id']; ?> </h5>
                                    </i>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div
                                    class="card-body list-group-item list-group-item-action list-group-item-success p-3 text-center">
                                    <?php   
                                            $sql= " SELECT sum(status='อนุมัติการยืม') id FROM history
                                                    WHERE username = '$_SESSION[username]'";
                                            $array = mysqli_query($con,$sql);
                                            $sum = mysqli_fetch_assoc($array);       
                                    ?>
                                    <i class="fa-solid fa-clock-rotate-left fa-4x">
                                        <h5 class="card-title mt-2">&nbsp;อนุมัติการยืม <?php echo $sum['id']; ?> </h5>
                                    </i>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div
                                    class="card-body list-group-item list-group-item-action list-group-item-danger p-3 text-center">
                                    <?php   
                                            $sql=   "SELECT sum(status='ไม่อนุมัติการยืม') id FROM history
                                                     WHERE username = '$_SESSION[username]'";
                                            $array = mysqli_query($con,$sql);
                                            $sum = mysqli_fetch_assoc($array);       
                                    ?>
                                    <i class="fa-solid fa-clock-rotate-left fa-4x">
                                        <h5 class="card-title mt-2">&nbsp;ไม่อนุมัติการยืม <?php echo $sum['id']; ?> </h5>
                                    </i>

                                </div>
                            </div>
                        </div> 
            </div>
        </div>

            </div>
            
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
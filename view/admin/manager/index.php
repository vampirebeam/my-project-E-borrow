<?php include("../../../env/con_db.php");?>
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
    <link rel="stylesheet" href="../asset/css/sidebars.css">
    <link rel="stylesheet" href="../asset/css/box.css">
    <?php include_once("../../asset/css/index.php");?>

</head>

<body>
    <div class="d-flex bg-light" id="wrapper">
        <?php include_once("navbar.php");?>
        <!-- Page content-->
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-header bg-primary text-light">
                    <h5><i class="fa-solid fa-screwdriver-wrench fa-1x"></i>&nbsp;ส่วนของผู้ดูแล</h5>
                </div>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-sm-4">
                            <div class="card">
                                <button type="button" class="card-body list-group-item list-group-item-action list-group-item-primary p-3 text-center">
                                    <a href="employee/index"><i class="fa fa-user fa-4x"><h5 class="card-title">&nbsp;สมาชิก</h5></i></a>
                                </button> 
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <button  type="button" class="card-body list-group-item list-group-item-action list-group-item-danger p-3 text-center">
                                    <a href="section/index"><i class="fa-solid fa-database fa-4x"><h5 class="card-title">&nbsp;แผนก</h5></i></a>
                                </button> 
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <button  type="button" class="card-body list-group-item list-group-item-action list-group-item-warning p-3 text-center">
                                    <a href="tool/index"><i class="fa-solid fa-wand-magic-sparkles fa-4x"><h5 class="card-title">&nbsp;อุปกรณ์</h5></i></a>
                                </button> 
                            </div>
                        </div>    
                    </div>

                </div>
            </div>
        </div>
</body>

</html>
<script src="../asset/js/sidebar.js"></script>
<?php include("../../asset/js/script.php") ?>


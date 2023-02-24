<?php include("../../../../env/con_db.php");?>
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
    <link rel="stylesheet" href="../../asset/css/sidebars.css">
    <link rel="stylesheet" href="../../asset/css/box.css">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <?php include_once("../../../asset/css/index.php");?>

</head>

<body>
    <div class="d-flex bg-light" id="wrapper">
        <?php include_once("navbar.php");?>
        <!-- Page content-->

        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-header bg-primary text-light">
                    <h5><i class="fa-solid fa-clock-rotate-left fa-1x"></i>&nbsp;ประวัติ</h5>
                </div>
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../../index">หน้าแรก</a></li>
                            <li class="breadcrumb-item"><a href="../index">ยืม - คืนอุปกรณ์</a></li>
                            <li class="breadcrumb-item active" aria-current="page">ประวัติ</li>
                        </ol>
                    </nav>
                </div>
                <div class="card-body p-1">
                    <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                </div>
                <div class="card-body">
                    <div class="row mt-3">
                                <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr class="btn-primary">
                                            <th>ลำดับ</th>
                                            <th>ชื่ออุปกรณ์</th>
                                            <th>จำนวนที่ยืม</th>
                                            <th>วันที่ยืม</th>
                                            <th>วันที่คืน</th>
                                            <th>ชื่อผู้ยืม</th>
                                            <th>สถาณะ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM   history
                                                    -- WHERE username ='$_SESSION[username]'
                                                    ";
                                            
                                            $array = mysqli_query($con,$sql);
                                            $i= 1;
                                            foreach($array as $value){
                                                
                                         ?>
                                        
                                            <tr align="center">
                                                <td width="10%"><?php echo $i ?></td>
                                                <td width="20%"><?php echo $value['name']; ?></td>
                                                <td width="10%"><?php echo $value['total']; ?></td>
                                                <td width="10%"><?php echo $value['f_time']; ?></td>
                                                <td width="10%"><?php echo $value['l_time']; ?></td>
                                                <td width="10%"><?php echo $value['username']; ?></td>
                                                <td width="20%">
                                                <div class="dropdown show">
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleStatus<?php echo $value['id']; ?>">
                                                    <i class="fa-solid fa-pen-to-square"></i>อัพเดตสถาณะ
                                                    </button>

                                                </td>
                                            </tr>

                                        <?php
                                             
                                                $i++;
                                            }   
                                        ?>
                                    </tbody>
                                </table>
                    </div>
                </div>
</body>


</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<!-- script datatable -->
<script type="text/javascript">
$(document).ready(function() {
    $('#myTable').DataTable();
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#myTable1').DataTable();
});
</script>
<!-- end script datatable -->
<script src="../../asset/js/sidebar.js"></script>
<?php include("../../../asset/js/script.php") ?>
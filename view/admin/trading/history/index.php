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
                <div class="row">
                        <!-- <div class="col-sm-4">
                            <div class="card">
                                <div
                                    class="card-body list-group-item list-group-item-action list-group-item-primary p-3 text-center">
                                    <?php   
                                            $i= 1;
                                            $sql= "SELECT SUM($i) as id FROM history";
                                            $array = mysqli_query($con,$sql);
                                            $sum = mysqli_fetch_assoc($array);       
                                    ?>
                                    <i class="fa-solid fa-wand-magic-sparkles fa-4x">
                                        <h5 class="card-title mt-2">&nbsp;อุปกรณ์ที่อนุมัติ <?php echo $sum['id']; ?> </h5>
                                    </i>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div
                                    class="card-body list-group-item list-group-item-action list-group-item-primary p-3 text-center">
                                    <?php   
                                            $i= 1;
                                            $sql= "SELECT SUM($i) as id FROM history";
                                            $array = mysqli_query($con,$sql);
                                            $sum = mysqli_fetch_assoc($array);       
                                    ?>
                                    <i class="fa-solid fa-wand-magic-sparkles fa-4x">
                                        <h5 class="card-title mt-2">&nbsp;อุปกรณ์ที่รออนุมัติ <?php echo $sum['id']; ?> </h5>
                                    </i>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div
                                    class="card-body list-group-item list-group-item-action list-group-item-primary p-3 text-center">
                                    <?php   
                                            $i= 1;
                                            $sql= "SELECT SUM($i) SET status='อุปกรณ์ที่ไม่อนุมัติ' WHEN id  FROM history";
                                            $array = mysqli_query($con,$sql);
                                            $sum = mysqli_fetch_assoc($array);       
                                    ?>
                                    <i class="fa-solid fa-wand-magic-sparkles fa-4x">
                                        <h5 class="card-title mt-2">&nbsp;อุปกรณ์ที่ไม่อนุมัติ <?php echo $sum['id']; ?> </h5>
                                    </i>

                                </div>
                            </div>
                        </div> -->
                        
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
                                        <!-- Example split danger button -->
                                        <?php if($value['status'] == "รออนุมัติการยืม" ){ ?>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning">รออนุมัติการยืม</button>
                                                <button type="button"
                                                    class="btn btn-dark dropdown-toggle dropdown-toggle-split"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <span class="visually-hidden"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="controller/update_status?status=<?php echo $value['status']; ?>valuenum=<?php echo $value['id']; ?>"><?php echo $value['status']; ?></a></li>
                                                        <li><a class="dropdown-item" href="controller/update_status?status=อนุมัติการยืม&&valuenum=<?php echo $value['id']; ?>">อนุมัติการยืม</a></li>
                                                        <li><a class="dropdown-item" href="controller/update_status?status=ไม่อนุมัติการยืม&&valuenum=<?php echo $value['id']; ?>">ไม่อนุมัติการยืม</a></li>
                                                </ul>
                                            </div>
                                        <?php } elseif ($value['status'] == "อนุมัติการยืม"){ ?>
                                            
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success">อนุมัติการยืม</button>
                                                    <button type="button"
                                                        class="btn btn-dark dropdown-toggle dropdown-toggle-split"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <span class="visually-hidden"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="controller/update_status?status=<?php echo $value['status']; ?>valuenum=<?php echo $value['id']; ?>"><?php echo $value['status']; ?></a></li>
                                                        <li><a class="dropdown-item" href="controller/update_status?status=รออนุมัติการยืม&&valuenum=<?php echo $value['id']; ?>">รออนุมัติการยืม</a></li>
                                                        <li><a class="dropdown-item" href="controller/update_status?status=ไม่อนุมัติการยืม&&valuenum=<?php echo $value['id']; ?>">ไม่อนุมัติการยืม</a></li>
                                                    </ul>
                                                </div>

                                            <?php } else { ?>
                                                
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger">ไม่อนุมัติการยืม</button>
                                                    <button type="button"
                                                        class="btn btn-dark dropdown-toggle dropdown-toggle-split"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <span class="visually-hidden"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="controller/update_status?status=<?php echo $value['status']; ?>valuenum=<?php echo $value['id']; ?>"><?php echo $value['status']; ?></a></li>
                                                        <li><a class="dropdown-item" href="controller/update_status?status=รออนุมัติการยืม&&valuenum=<?php echo $value['id']; ?>">รออนุมัติการยืม</a></li>
                                                        <li><a class="dropdown-item" href="controller/update_status?status=อนุมัติการยืม&&valuenum=<?php echo $value['id']; ?>">อนุมัติการยืม</a></li>
                                                    </ul>
                                                </div>
                                                <?php } ?>
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
<!-- end script datatable -->
<script src="../../asset/js/sidebar.js"></script>
<?php include("../../../asset/js/script.php") ?>
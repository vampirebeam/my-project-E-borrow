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

            <div class="card mt-3">
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
                                    <th>สถาณะอนุมัติ</th>
                                    <th>สถาณะอุปกรณ์</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                            $sql = "SELECT  s.*,s.total as shoptotal , 
                                                            his.id, his.username , his.total as histotal , his.f_time , his.l_time, his.status, his.status_shop
                                                    FROM   history  AS his
                                                    INNER JOIN shop AS s 
                                                    ON  his.id_shop  = s.id_shop
                                                    WHERE his.username = '$_SESSION[username]'
                                                    ORDER BY his.id  DESC
                                                    ";
                                            $array = mysqli_query($con,$sql);
                                            $i= 1;
                                            foreach($array as $value){     
                                         ?>

                                <tr align="center">
                                    <input type="hidden" value="id_shop">
                                    <input type="hidden" value="s.total">
                                    <td width="10%"><?php echo $i ?></td>
                                    <td width="20%"><?php echo $value['name']; ?></td>
                                    <td width="10%"><?php echo $value['histotal']; ?></td>
                                    <td width="10%"><?php echo $value['f_time']; ?></td>
                                    <td width="10%"><?php echo $value['l_time']; ?></td>
                                    <td width="10%"><?php echo $value['username']; ?></td>
                                    <td width="10%">
                                        <!-- Example split danger button -->
                                        <?php if($value['status'] == "รออนุมัติการยืม" ){ ?>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning" style="width:150px;">รออนุมัติการยืม</button>
                                            </div>
                                        <?php } elseif ($value['status'] == "อนุมัติการยืม"){ ?>
                                            
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" style="width:150px;">อนุมัติการยืม</button>
                                                </div>

                                            <?php } else { ?>
                                                
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger" style="width:150px;">ไม่อนุมัติการยืม</button>
                                                </div>
                                                <?php } ?>
                                    </td>
                                    <td width="10%">
                                        <?php if($value['status_shop'] == "รออนุมัติการยืม" ){ ?>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-warning" style="width:150px;">รออนุมัติการยืม</button>
                                                </div>
                                        <?php } elseif ($value['status_shop'] == "กำลังใช้งาน"){ ?>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info" style="width:150px;">กำลังใช้งาน</button>
                                                </div>

                                        <?php } else { ?>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" style="width:150px;">คืนอุปกรณ์</button>
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
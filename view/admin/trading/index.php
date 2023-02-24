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
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <?php include_once("../../asset/css/index.php");?>

</head>

<body>
    <div class="d-flex bg-light" id="wrapper">
        <?php include_once("navbar.php");?>
        <!-- Page content-->
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-header bg-primary text-light">
                    <h5><i class="fa-sharp fa-solid fa-repeat fa-1x"></i>&nbsp;ยืม - คืนอุปกรณ์</h5>
                </div>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <div class="card">
                                <button type="button" class="card-body list-group-item list-group-item-action list-group-item-primary p-3 text-center" data-bs-toggle="modal" data-bs-target="#exampleAdd">
                                    <i class="fa-sharp fa-solid fa-cart-plus fa-4x">
                                            <h5 class="card-title">&nbsp;ยืมอุปกรณ์</h5>
                                        </i></a>
                                </button>
                            </div>
                        </div>
                        <!-- <div class="col-sm-4">
                            <div class="card">
                                <button type="button"
                                    class="card-body list-group-item list-group-item-action list-group-item-danger p-3 text-center">
                                    <a href="#"><i class="fa-sharp fa-solid fa-repeat fa-4x">
                                            <h5 class="card-title">&nbsp;คืนอุปกรณ์</h5>
                                        </i></a>
                                </button>
                            </div>
                        </div> -->
                        <div class="col-sm-6">
                            <div class="card">
                                <button type="button"
                                    class="card-body list-group-item list-group-item-action list-group-item-warning p-3 text-center">
                                    <a href="#"><i class="fa-solid fa-clock-rotate-left fa-4x">
                                            <h5 class="card-title">&nbsp;ประวัติ</h5>
                                        </i></a>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card mt-3">
                <div class="card-header bg-primary text-light">
                    <h5><i class="fa-solid fa-wand-magic-sparkles fa-1x"></i>&nbsp;อุปกรณ์</h5>
                </div>
                <div class="card-body">
                    <div class="row mt-3">

                       
                                <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr class="btn-primary">
                                            <th>ลำดับ</th>
                                            <th>ชื่ออุปกรณ์</th>
                                            <th>รหัสครุภัณฑ์</th>
                                            <th>Serlal Number</th>
                                            <th>จำนวน</th>
                                            <th>รูปภาพ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM   shop";
                                            $array = mysqli_query($con,$sql);
                                            $i= 1;
                                            foreach($array as $value){
                                        ?>
                                        <tr align="center">
                                            <td width="10%"><?php echo $i ?></td>
                                            <td width="20%"><?php echo $value['name']; ?></td>
                                            <td width="20%"><?php echo $value['cd']; ?></td>
                                            <td width="20%"><?php echo $value['serial']; ?></td>
                                            <td width="20%"><?php echo $value['total']; ?></td>
                                            <td width="10%">
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleShowShop<?php echo $value['id']; ?>">
                                                    <i class="fa-solid fa-eye"></i>
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
            </div>
        </div>
    </div>
</body>
<!-- modal exampleAdd -->
<form method="POST" action="#" enctype="multipart/form-data">
    <div class="modal fade" id="exampleAdd" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fa-solid fa-cart-plus"></i>&nbsp;ยืมอุปกรณ์</h5>
                </div>
                <div class="modal-body">
                    
                        <div class="input-group mb-3">
                            <span class="input-group-text">วันที่ยืม</span>
                            <input name="f_time" id="f_time" type="date" class="form-control" placeholder="วันที่ยืม"
                                aria-label="f_time" aria-describedby="basic-addon1" 
                                required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">วันที่คืน</span>
                            <input name="l_time" id="l_time" type="date" class="form-control" placeholder="วันที่คืน"
                                aria-label="l_time" aria-describedby="basic-addon1" min="<?php echo date('Y-m-d');?>"
                                required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-cart-plus"></i></span>
                            <select name="name" class="form-select" id="inputGroupSelect01" required>
                                    <option selected disabled>โปรดเลือกอุปกรณ์ที่ต้องการยืม...</option>
                                    <?php
                                        session_start();
                                        $sql = "SELECT * FROM shop";
                                        $array = mysqli_query($con,$sql);
                                        foreach($array as $value){
                                    ?>
                                        <option value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                        </div>
                         <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-tag"></i></span>
                            <input name="total" id="total" type="number" class="form-control" placeholder="จำนวนที่จะยืม"
                                aria-label="total" aria-describedby="basic-addon1" min="1" max="<?php echo $value['total']; ?>"
                                required>
                        </div> 
                        
                        

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">ยืมอุปกรณ์</button>
                </div>                 
            </div>
        </div>
    </div>
</form>
<!-- end modal exampleAddShop -->
<!-- modal exampleShowShop -->
<?php
                    $sql = "SELECT * FROM   shop";
                    $array = mysqli_query($con,$sql);
                    foreach($array as $value){
                ?>
<form method="POST"  enctype="multipart/form-data">
    <div class="modal fade" id="exampleShowShop<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLabel"><i
                            class="fa-regular fa-pen-to-square"></i>&nbsp;รูปภาพ</h5>

                </div>
                <div class="modal-body">
                    
                        <div class="input-group mb-3">
                            <img src="../manager/tool/public/<?php echo $value['pic']; ?>" class="img-thumbnail" alt="<?php echo $value['name']; ?>">
                                   
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                </div>                 
            </div>
        </div>
    </div>
</form>
                <?php   }   ?>
<!-- end modal exampleShowShop -->
</html>
<script src="../asset/js/sidebar.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<!-- script datatable -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
   <!-- end script datatable -->
<?php include("../../asset/js/script.php") ?>
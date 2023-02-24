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
                    <h5><i class="fa-solid fa-wand-magic-sparkles fa-1x"></i>&nbsp;อุปกรณ์</h5>
                </div>
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../../index">หน้าแรก</a></li>
                            <li class="breadcrumb-item"><a href="../index">ส่วนของผู้ดูแลระบบ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">อุปกรณ์</li>
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
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div
                                    class="card-body list-group-item list-group-item-action list-group-item-primary p-3 text-center">
                                    <?php   
                                            $i= 1;
                                            $sql= "SELECT SUM($i) as id FROM shop";
                                            $array = mysqli_query($con,$sql);
                                            $sum = mysqli_fetch_assoc($array);       
                                    ?>
                                    <i class="fa-solid fa-wand-magic-sparkles fa-4x">
                                        <h5 class="card-title mt-2">&nbsp;อุปกรณ์ทั้งหมด <?php echo $sum['id']; ?> </h5>
                                    </i>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <button type="button"
                                    class="card-body list-group-item list-group-item-action list-group-item-success p-3 text-center"
                                    data-bs-toggle="modal" data-bs-target="#exampleAddCd">
                                    <i class="fa-solid fa-square-plus fa-4x">
                                        <h5 class="card-title mt-2">&nbsp;เพิ่มครุภัณฑ์</h5>
                                    </i></a>
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <button type="button"
                                    class="card-body list-group-item list-group-item-action list-group-item-success p-3 text-center"
                                    data-bs-toggle="modal" data-bs-target="#exampleAddShop">
                                    <i class="fa-solid fa-cart-plus fa-4x">
                                        <h5 class="card-title mt-2">&nbsp;เพิ่มอุปกรณ์</h5>
                                    </i></a>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mt-3">
                            <h5><i class="fa-solid fa-wand-magic-sparkles fa-1x"></i>&nbsp;ครุภัณฑ์</h5>
                            <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr class="btn-primary">
                                        <th>ลำดับ</th>
                                        <th>รหัสครุภัณฑ์</th>
                                        <th>แก้ไข/ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            $sql = "SELECT * FROM   cd";
                                            $array = mysqli_query($con,$sql);
                                            $i= 1;
                                            foreach($array as $value){
                                        ?>
                                    <tr align="center">
                                        <td width="10%"><?php echo $i ?></td>
                                        <td width="50%"><?php echo $value['cd']; ?></td>
                                        <td width="20%">
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#exampleEditCd<?php echo $value['id']; ?>">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#exampleDalCd<?php echo $value['id']; ?>">
                                                <i class="fa-solid fa-trash"></i>
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

                <div class="card-body">
                    <div class="row mt-3">
                        <h5><i class="fa-solid fa-wand-magic-sparkles fa-1x"></i>&nbsp;อุปกรณ์</h5>
                        <table id="myTable1" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr class="btn-primary">
                                    <th>ลำดับ</th>
                                    <th>ชื่ออุปกรณ์</th>
                                    <th>รหัสครุภัณฑ์</th>
                                    <th>Serlal Number</th>
                                    <th>จำนวน</th>
                                    <th>รูปภาพ/แก้ไข/ลบ</th>
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
                                    <td width="10%"><?php echo $value['total']; ?></td>
                                    <td width="20%">
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#exampleShowShop<?php echo $value['id_shop']; ?>">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#exampleEditShop<?php echo $value['id_shop']; ?>">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleDalShop<?php echo $value['id_shop']; ?>">
                                            <i class="fa-solid fa-trash"></i>
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
    </div>
</body>

<!-- modal exampleAddCD -->
<form method="POST" action="controller/addnub" enctype="multipart/form-data">
    <div class="modal fade" id="exampleAddCd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fa fa-square-plus"></i>&nbsp;เพิ่มครุภัณฑ์
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa fa-square-plus"></i></span>
                        <input name="cd" id="cd" type="text" class="form-control" placeholder="ชื่อครุภัณฑ์"
                            aria-label="cd" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">เพิ่มครุภัณฑ์</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- end modal exampleAddCD -->
<!-- modal exampleEditCd -->
<?php
                    $sql = "SELECT * FROM   cd";
                    $array = mysqli_query($con,$sql);
                    foreach($array as $value){
                ?>
<form method="POST" action="controller/editcd?valuenum=<?php echo $value['id']; ?>" enctype="multipart/form-data">
    <div class="modal fade" id="exampleEditCd<?php echo $value['id']; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLabel"><i
                            class="fa-regular fa-pen-to-square"></i>&nbsp;อัพเดตข้อมูล</h5>

                </div>
                <div class="modal-body">

                    <div class="input-group mb-3">
                        <span class="input-group-text">แผนก</span>
                        <input name="cd" id="cd" type="text" class="form-control" placeholder="ชื่อครุภัณฑ์"
                            aria-label="cd" aria-describedby="basic-addon1" value="<?php echo $value['cd']; ?>"
                            required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-warning" data-bs-dismiss="modal">อัพเดตข้อมูล</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php   }   ?>
<!-- end  modal exampleEditCd -->
<!-- modal exampleDalCd -->
<?php
                    $sql = "SELECT * FROM   cd";
                    $array = mysqli_query($con,$sql);
                    foreach($array as $value){
                ?>
<div class="modal fade" id="exampleDalCd<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-trash fa-1x"></i>&nbsp;ลบข้อมูล
                </h5>

            </div>
            <div class="modal-body">
                ต้องการลบข้อมูล <?php echo $value['cd']; ?> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <a href="controller/delcd?valuenum=<?php echo $value['id']; ?>" type="button"
                    class="btn btn-danger">ลบข้อมูล</a>
            </div>
        </div>
    </div>
</div>
<?php                      
                    }   
                ?>
<!-- end  modal exampleDalCd -->

<!-- modal exampleAddShop -->
<form method="POST" action="controller/addshop" enctype="multipart/form-data">
    <div class="modal fade" id="exampleAddShop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fa-solid fa-cart-plus"></i>&nbsp;เพิ่มอุปกรณ์
                    </h5>
                </div>
                <div class="modal-body">

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-cart-plus"></i></span>
                        <input name="name" id="name" type="text" class="form-control" placeholder="ชื่ออุปกรณ์"
                            aria-label="name" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                        <input name="serial" type="text" class="form-control" placeholder="โปรดใส่ Serial ให้ถูกต้อง"
                            aria-label="tel" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-list-ol"></i></span>
                        <input name="total" type="text" class="form-control" placeholder="โปรดใส่จำนวน" aria-label="tel"
                            aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">ครุภัณฑ์</span>
                        <select name="cd" class="form-select" id="inputGroupSelect01" required>
                            <option selected>โปรดเลือกรหัสครุภัณฑ์...</option>
                            <?php
                                                        $sql = "SELECT * FROM cd";
                                                        $array = mysqli_query($con,$sql);
                                                        foreach($array as $section){
                                                    ?>
                            <option value="<?php echo $section['cd']; ?>"><?php echo $section['cd']; ?></option>
                            <?php
                                                            }
                                                        ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input name="pic" type="file" class="form-control" aria-label="file"
                            aria-describedby="basic-addon1" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">เพิ่มอุปกรณ์</button>
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
<form method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="exampleShowShop<?php echo $value['id_shop']; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLabel"><i
                            class="fa-regular fa-pen-to-square"></i>&nbsp;รูปภาพ</h5>

                </div>
                <div class="modal-body">

                    <div class="input-group mb-3">
                        <img src="public/<?php echo $value['pic']; ?>" class="img-thumbnail"
                            alt="<?php echo $value['name']; ?>">

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
<!-- modal exampleEditShop -->
<?php
                    $sql = "SELECT * FROM   shop";
                    $array = mysqli_query($con,$sql);
                    foreach($array as $value){
                ?>
<form method="POST" action="controller/editshop?valuenum=<?php echo $value['id_shop']; ?>" enctype="multipart/form-data">
    <div class="modal fade" id="exampleEditShop<?php echo $value['id_shop']; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLabel"><i
                            class="fa-regular fa-pen-to-square"></i>&nbsp;อัพเดตข้อมูล</h5>

                </div>
                <div class="modal-body">

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-cart-plus"></i></span>
                        <input name="name" id="name" type="text" class="form-control" placeholder="ชื่ออุปกรณ์"
                            aria-label="name" aria-describedby="basic-addon1" value="<?php echo $value['name']; ?>"
                            required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                        <input name="serial" type="text" class="form-control" placeholder="โปรดใส่ Serial ให้ถูกต้อง"
                            aria-label="tel" aria-describedby="basic-addon1" value="<?php echo $value['serial']; ?>"
                            required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-list-ol"></i></span>
                        <input name="total" type="text" class="form-control" placeholder="โปรดใส่จำนวน" aria-label="tel"
                            aria-describedby="basic-addon1" value="<?php echo $value['total']; ?>" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">ครุภัณฑ์</span>
                        <select name="cd" class="form-select" id="inputGroupSelect01" required>
                            <option selected><?php echo $value['cd']; ?></option>
                            <?php
                                                        $sql = "SELECT * FROM cd";
                                                        $array = mysqli_query($con,$sql);
                                                        foreach($array as $section){
                                                    ?>
                            <option value="<?php echo $section['cd']; ?>"><?php echo $section['cd']; ?></option>
                            <?php
                                                            }
                                                        ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input name="pic" type="file" class="form-control" aria-label="file"
                            aria-describedby="basic-addon1" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-warning" data-bs-dismiss="modal">อัพเดตข้อมูล</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php   }   ?>
<!-- end  modal exampleEditShop -->

<!-- modal exampleDalShop -->
<?php
                    $sql = "SELECT * FROM   shop";
                    $array = mysqli_query($con,$sql);
                    foreach($array as $value){
                ?>
<div class="modal fade" id="exampleDalShop<?php echo $value['id_shop']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-trash fa-1x"></i>&nbsp;ลบข้อมูล
                </h5>

            </div>
            <div class="modal-body">
                ต้องการลบข้อมูลอุปกรณ์ <?php echo $value['name']; ?> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <a href="controller/delshop?valuenum=<?php echo $value['id_shop']; ?>" type="button"
                    class="btn btn-danger">ลบข้อมูล</a>
            </div>
        </div>
    </div>
</div>
<?php                      
                    }   
                ?>
<!-- end  modal exampleDalShop -->



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
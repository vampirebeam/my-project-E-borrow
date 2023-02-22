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
                    <h5><i class="fa-solid fa-database fa-1x"></i>&nbsp;แผนก</h5>
                </div>
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../../index">หน้าแรก</a></li>
                            <li class="breadcrumb-item"><a href="../index">ส่วนของผู้ดูแลระบบ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">แผนก</li>
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
                        <div class="col-sm-6">
                            <div class="card">
                                <div
                                    class="card-body list-group-item list-group-item-action list-group-item-primary p-3 text-center">
                                    <?php   
                                            $i= 1;
                                            $sql= "SELECT SUM($i) as id FROM division";
                                            $array = mysqli_query($con,$sql);
                                            $sum = mysqli_fetch_assoc($array);       
                                    ?>
                                    <i class="fa-solid fa-database fa-4x">
                                        <h5 class="card-title mt-2">&nbsp;แผนกทั้งหมด <?php echo $sum['id']; ?> </h5>
                                    </i>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <button type="button" class="card-body list-group-item list-group-item-action list-group-item-success p-3 text-center" data-bs-toggle="modal" data-bs-target="#exampleRe">
                                    <i class="fa-solid fa-folder-plus fa-4x">
                                            <h5 class="card-title mt-2">&nbsp;เพิ่มแผนก</h5>
                                        </i></a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <form class="row mt-3 ">
                        <div class="card-header">
                            <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr class="btn-primary">
                                        <th>ลำดับ</th>
                                        <th>แผนก</th>
                                        <th>แก้ไข/ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM   division";
                                        $array = mysqli_query($con,$sql);
                                        $i= 1;
                                        foreach($array as $value){
                                    ?>
                                    <tr align="center">
                                        <td width="10%"><?php echo $i ?></td>
                                        <td width="50%"><?php echo $value['section']; ?></td>
                                        <td width="10%">
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleEdit<?php echo $value['id']; ?>">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleDal<?php echo $value['id']; ?>">
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
                    </form>
                </div>
            </div>
        </div>
</body>
<!-- modal register exampleRe -->
<form method="POST" action="controller/register" enctype="multipart/form-data">
    <div class="modal fade" id="exampleRe" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fa fa-user-plus"></i>&nbsp;เพิ่มแผนก</h5>
                </div>
                <div class="modal-body">
                        <div class="input-group mb-3">
                            <span class="input-group-text">แผนก</span>
                            <input name="section" id="section" type="text" class="form-control" placeholder="ชื่อแผนก"
                                aria-label="section" aria-describedby="basic-addon1" 
                                required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">เพิ่มแผนก</button>
                </div>                 
            </div>
        </div>
    </div>
</form>
<!-- end modal register -->

<!-- class modal edit  -->
<?php
                    $sql = "SELECT * FROM   division";
                    $array = mysqli_query($con,$sql);
                    foreach($array as $value){
                ?>
<form method="POST" action="controller/edit?valuenum=<?php echo $value['id']; ?>" enctype="multipart/form-data">
    <div class="modal fade" id="exampleEdit<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLabel"><i
                            class="fa-regular fa-pen-to-square"></i>&nbsp;อัพเดตข้อมูล</h5>

                </div>
                <div class="modal-body">
                    
                        <div class="input-group mb-3">
                            <span class="input-group-text">แผนก</span>
                                <input name="section" id="section" type="text" class="form-control" placeholder="ชื่อแผนก"
                                aria-label="section" aria-describedby="basic-addon1" value="<?php echo $value['section']; ?>" required>     
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
<!-- end class modal edit -->

<!-- class modal del  -->
<?php
                    $sql = "SELECT * FROM   division";
                    $array = mysqli_query($con,$sql);
                    foreach($array as $value){
                ?>
    <div class="modal fade" id="exampleDal<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-trash fa-1x"></i>&nbsp;ลบข้อมูล
                    </h5>

                </div>
                <div class="modal-body">
                    ต้องการลบข้อมูล ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <a href="controller/del?valuenum=<?php echo $value['id']; ?>" type="button"
                        class="btn btn-danger">ลบข้อมูล</a>
                </div>
            </div>
        </div>
    </div>
<?php                      
                    }   
                ?>
<!-- end class modal del -->

</html>
<style>
.eye {
    position: absolute;
    transform: translate(0,-50%);
    cursor: pointer;
    left: 95%;
    top: 50%;
}
</style>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

   <!-- script datatable -->
   <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
   <!-- end script datatable -->
    <!-- script show password -->
    <script type="text/javascript">
        var state= false;
        function toggle(){
            if(state){
                document.getElementById("password").setAttribute("type","password");
                document.getElementById("eye")
                state = false;
            }
            else{
                document.getElementById("password").setAttribute("type","text");
                state = true;
            }
        }
    </script>
    <!-- end script show password -->
<script src="../../asset/js/sidebar.js"></script>
<?php include("../../../asset/js/script.php") ?>
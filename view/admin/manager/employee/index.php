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
                    <h5><i class="fa-solid fa-gear fa-1x"></i>&nbsp;สมาชิก</h5>
                </div>
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../../index">หน้าแรก</a></li>
                            <li class="breadcrumb-item"><a href="../index">ส่วนของผู้ดูแลระบบ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">สมาชิก</li>
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
                                            $sql= "SELECT SUM($i) as id FROM users";
                                            $array = mysqli_query($con,$sql);
                                            $sum = mysqli_fetch_assoc($array);       
                                    ?>
                                    <i class="fa fa-user fa-4x">
                                        <h5 class="card-title mt-2">&nbsp;สมาชิกทั้งหมด <?php echo $sum['id']; ?> </h5>
                                    </i>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <button type="button" class="card-body list-group-item list-group-item-action list-group-item-success p-3 text-center" data-bs-toggle="modal" data-bs-target="#exampleRe">
                                    <i class="fa fa-user-plus fa-4x">
                                            <h5 class="card-title mt-2">&nbsp;เพิ่มสมาชิก</h5>
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
                                        <th>username</th>
                                        <th>ชื่อ</th>
                                        <th>นามสกุล</th>
                                        <th>เบอร์โทร</th>
                                        <th>แผนก</th>
                                        <th>ระดับ</th>
                                        <th>แก้ไข/ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM   users";
                                        $array = mysqli_query($con,$sql);
                                        $i= 1;
                                        foreach($array as $value){
                                    ?>
                                    <tr align="center">
                                        <td width="10%"><?php echo $i ?></td>
                                        <td width="10%"><?php echo $value['username']; ?></td>
                                        <td width="10%"><?php echo $value['name']; ?></td>
                                        <td width="10%"><?php echo $value['lname']; ?></td>
                                        <td width="10%"><?php echo $value['tel']; ?></td>
                                        <td width="10%"><?php echo $value['section']; ?></td>
                                        <td width="10%"><?php echo $value['level']; ?></td>
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
                        <i class="fa fa-user-plus"></i>&nbsp;เพิ่มสมาชิก</h5>
                </div>
                <div class="modal-body">
                    
                        <div class="input-group mb-3">
                            <span class="input-group-text">ชื่อ</span>
                            <input name="name" id="name" type="text" class="form-control" placeholder="ชื่อ"
                                aria-label="name" aria-describedby="basic-addon1" 
                                required>
                            <span class="input-group-text">นามสกุล</span>
                            <input name="lname" id="lname" type="text" class="form-control" placeholder="นามสกุล"
                                aria-label="lname" aria-describedby="basic-addon1" 
                                required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input name="username" id="username" type="text" class="form-control" placeholder="username"
                                aria-label="Username" aria-describedby="basic-addon1"
                                 required>
                        </div>
                        <div class="input-group mb-3">

                            <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                            <input id="password" name="password" type="password" class="form-control" placeholder="password"
                                 required>
                            <span class="eye">
                                <i class="fa fa-eye" aria-hidden="true" id="show" onclick="toggle()"></i>
                            </span>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                            <input name="tel" type="tel" class="form-control" placeholder="ตัวอย่าง 086XXXXXXX"
                                aria-label="tel" aria-describedby="basic-addon1" 
                                required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">แผนก</span>
                            <select name="section" class="form-select" id="inputGroupSelect01" required>
                                <option selected>โปรดเลือกแผนก...</option>
                                <?php
                                                        $sql = "SELECT * FROM division";
                                                        $array = mysqli_query($con,$sql);
                                                        foreach($array as $section){
                                                    ?>
                                                    <option value="<?php echo $section['section']; ?>"><?php echo $section['section']; ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    <option value="ผู้ดูแลระบบ">ผู้ดูแลระบบ</option>       
                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">สมัครสมาชิก</button>
                </div>                 
            </div>
        </div>
    </div>
</form>
<!-- end modal register -->

<!-- class modal edit  -->
<?php
                    $sql = "SELECT * FROM   users";
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
                            <span class="input-group-text">ชื่อ</span>
                            <input name="name" id="name" type="text" class="form-control" placeholder="ชื่อ"
                                aria-label="name" aria-describedby="basic-addon1" value="<?php echo $value["name"] ?>"
                                required>
                            <span class="input-group-text">นามสกุล</span>
                            <input name="lname" id="lname" type="text" class="form-control" placeholder="นามสกุล"
                                aria-label="lname" aria-describedby="basic-addon1" value="<?php echo $value["lname"] ?>"
                                required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input name="username" id="username" type="text" class="form-control" placeholder="username"
                                aria-label="Username" aria-describedby="basic-addon1"
                                value="<?php echo $value["username"] ?>" required>
                        </div>
                        <div class="input-group mb-3">

                            <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                            <input id="password" name="password" type="password" class="form-control" placeholder="password"
                                value="<?php echo $value["password"]; ?>" required>
                            <span class="eye">
                                <i class="fa fa-eye" aria-hidden="true" id="show" onclick="toggle()"></i>
                            </span>

                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                            <input name="tel" type="tel" class="form-control" placeholder="ตัวอย่าง 086XXXXXXX"
                                aria-label="tel" aria-describedby="basic-addon1" value="<?php echo $value["tel"] ?>"
                                required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">แผนก</span>
                            <select name="section" class="form-select" id="inputGroupSelect01" required>
                                <option selected><?php echo $value["section"] ?></option>
                                <?php
                                                        $sql = "SELECT * FROM division";
                                                        $array = mysqli_query($con,$sql);
                                                        foreach($array as $section){
                                                    ?>
                                <option value="<?php echo $section['section']; ?>"><?php echo $section['section']; ?></option>
                                                    <?php
                                                        }
                                                    ?>       
                            </select>
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
                    $sql = "SELECT * FROM   users";
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
                document.getElementById("eye");
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
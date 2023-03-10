<?php include("../../../env/con_db.php");?>
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
                    <h5><i class="fa-solid fa-gear fa-1x"></i>&nbsp;แก้ไขข้อมูลส่วนตัว</h5>
                </div>
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index">หน้าแรก</a></li>
                            <li class="breadcrumb-item active" aria-current="page">แก้ไขข้อมูลส่วนตัว</li>
                        </ol>
                    </nav>
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
                    <form  action="controller/update_password" method="POST" enctype="multipart/form-data">                       
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">ชื่อ</span>
                                <input name="name" type="text" class="form-control" placeholder="ชื่อ" aria-label="name"
                                    aria-describedby="basic-addon1" value="<?php echo $_SESSION["name"] ?>" required>
                                    <span class="input-group-text" id="basic-addon1">นามสกุล</span>
                                <input name="lname" type="text" class="form-control" placeholder="นามสกุล" aria-label="lname"
                                    aria-describedby="basic-addon1" value="<?php echo $_SESSION["lname"] ?>" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                                <input name="password" type="password" class="form-control" placeholder="password" aria-label="password"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                                <input name="tel" type="tel" class="form-control" placeholder="ตัวอย่าง 086XXXXXXX" aria-label="tel"
                                    aria-describedby="basic-addon1" value="<?php echo $_SESSION["tel"] ?>" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">แผนก</span>
                                <select name="section" class="form-select" id="inputGroupSelect01" required>
                                    <option selected ><?php echo $_SESSION["section"] ?></option>
                                    <option value="กองคลัง">กองคลัง</option>
                                    <option value="กองสำนักปลัด">กองสำนักปลัด</option>
                                    <option value="กองช่าง">กองช่าง</option>
                                    <option value="กองสาธารณสุข">กองสาธารณสุข</option>
                                    <option value="กองการศึกษา">กองการศึกษา</option>
                                    <option value="กองยุทธศาสตร์">กองยุทธศาสตร์</option>
                                </select>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $_SESSION["id"] ?>">
                            <button class="btn btn-success btn-lg btn-block" type="submit" >แก้ไขข้อมูลส่วนตัว</button>
                    </form>
                </div>
            </div>
            
            </div>
</body>

</html>
<script src="../asset/js/sidebar.js"></script>
<?php include("../../asset/js/script.php") ?>


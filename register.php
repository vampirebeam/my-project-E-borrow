<?php include("env/con_db.php");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก ยืม-คืนอุปกรณ์</title>
    <?php include_once("asset/css/index.php");?>

</head>

<body>
    <form class="vh-100" style="background-color: #508bfc;" action="controller/register" method="POST" enctype="multipart/form-data">
        
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <hr>
                            <a href="index" align="right" class="h6"> > เข้าสู่ระบบ </a>
                            <?php if (isset($_SESSION['success'])) { ?>
                                <div class="alert alert-success">
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
                        <div class="card-body p-5 text-center">
                            
                            <h3 class="mb-3">สมัครสมาชิก</h3>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Username</span>
                                <input name="username" type="text" class="form-control" placeholder="ID" aria-label="Username"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">password</span>
                                <input name="password" type="password" class="form-control" placeholder="password" aria-label="password"
                                    aria-describedby="basic-addon1" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">ชื่อ</span>
                                <input name="name" type="text" class="form-control" placeholder="ชื่อ" aria-label="name"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">นามสกุล</span>
                                <input name="lname" type="text" class="form-control" placeholder="นามสกุล" aria-label="lname"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                                <input name="tel" type="tel" class="form-control" placeholder="ตัวอย่าง 086XXXXXXX" aria-label="tel"
                                    aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">แผนก</span>
                                <select name="section" class="form-select" id="inputGroupSelect01" required>
                                    <option selected disabled>โปรดเลือกแผนก...</option>
                                    <?php
                                        session_start();
                                        $sql = "SELECT * FROM division";
                                        $array = mysqli_query($con,$sql);
                                        foreach($array as $_SESSION){
                                    ?>
                                        <option value="<?php echo $_SESSION['section']; ?>"><?php echo $_SESSION['section']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" name="level"  value="1">

                            <button class="btn btn-success btn-lg btn-block" type="submit" >สมัครสมาชิก</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
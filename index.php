<?php include("env/con_db.php");?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ ยืม-คืนอุปกรณ์</title>
    <?php include_once("asset/css/index.php");?>

</head>

<body>
    <form class="vh-100" style="background-color: #508bfc;" action="controller/login" method="POST" enctype="multipart/form-data">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            
                            <h3 class="mb-5">เข้าสู่ระบบ ยืม-คืนอุปกรณ์</h3>
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
                            <div class="form-outline mb-4">
                                <input type="id" id="typeEmailX-2" class="form-control form-control-lg" name="username" placeholder="Username" required/>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" placeholder="Password" required/>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">เข้าสู่ระบบ</button>
                            <a class="btn btn-success btn-lg btn-block" href="register">สมัครสมาชิก</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form> 
    
</body>
</html>
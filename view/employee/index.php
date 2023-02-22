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
    <title>USER</title>
    <link rel="stylesheet" href="asset/css/sidebars.css">
    <?php include_once("../asset/css/index.php");?>

</head>

<body>
<div class="d-flex" id="wrapper">
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
                
                            </div>
    
</body>
</html>
<script src="asset/js/sidebar.js"></script>
<?php include("../asset/js/script.php") ?>
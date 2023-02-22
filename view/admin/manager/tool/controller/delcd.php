<?php include("../../../../../env/con_db.php");?>
<?php
        session_start();
        $id = $_REQUEST['valuenum'];

$sql = "DELETE FROM cd 
		WHERE id = '$id'";
		$result = mysqli_query($con,$sql);
        mysqli_close($con);

        if($result){
            $_SESSION['success'] = "ลบครุภัณฑ์สำเร็จ";
            header('location:../index');
            }
            
            else{
            $_SESSION['error'] = "ลบครุภัณฑ์ผิดพลาด";
            header('location:../index');
            } 
?>
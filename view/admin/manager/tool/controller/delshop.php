<?php include("../../../../../env/con_db.php");?>
<?php
        session_start();
        $id = $_REQUEST['valuenum'];

$sql = "DELETE FROM shop 
		WHERE id = '$id'";
		$result = mysqli_query($con,$sql);
        mysqli_close($con);

        if($result){
            $_SESSION['success'] = "ลบอุปกรณ์สำเร็จ";
            header('location:../index');
            }
            
            else{
            $_SESSION['error'] = "ลบอุปกรณ์ผิดพลาด";
            header('location:../index');
            } 
?>
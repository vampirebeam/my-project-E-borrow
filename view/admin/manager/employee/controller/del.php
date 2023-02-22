<?php include("../../../../../env/con_db.php");?>
<?php
        session_start();
        $id = $_REQUEST['valuenum'];

$sql = "DELETE FROM users 
		WHERE id = '$id'";
		$result = mysqli_query($con,$sql);
        mysqli_close($con);

        if($result){
            $_SESSION['success'] = "ลบสมาชิกสำเร็จ";
            header('location:../index');
            }
            
            else{
            $_SESSION['error'] = "ลบสมาชิกผิดพลาด";
            header('location:../index');
            } 
?>
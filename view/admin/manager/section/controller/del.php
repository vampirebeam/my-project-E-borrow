<?php include("../../../../../env/con_db.php");?>
<?php
        session_start();
        $id = $_REQUEST['valuenum'];

$sql = "DELETE FROM division 
		WHERE id = '$id'";
		$result = mysqli_query($con,$sql);
        mysqli_close($con);

        if($result){
            $_SESSION['success'] = "ลบแผนกสำเร็จ";
            header('location:../index');
            }
            
            else{
            $_SESSION['error'] = "ลบแผนกผิดพลาด";
            header('location:../index');
            } 
?>
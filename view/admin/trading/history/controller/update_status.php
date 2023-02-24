<?php
    include("../../../../../env/con_db.php");

    session_start();
	$value = $_GET['valuenum'];
    $status = $_GET["status"];

	//เพิ่มเข้าไปในฐานข้อมูล

        $sql = "UPDATE history 
		SET status='$status'
        WHERE id='$value'";      

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
					if($result){
					$_SESSION['success'] = "อัพเดตสถาณะสำเร็จ";
					header('location:../index');
					}

        
					else{
					$_SESSION['error'] = "อัพเดตสถาณะผิดพลาด";
					header('location:../index');
					} 

?> 



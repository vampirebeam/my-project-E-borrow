<?php
    include("../../../../../env/con_db.php");

    session_start();
	$value = $_REQUEST['valuenum'];
	$id_shop = $_REQUEST['id_shop'];
    $status_shop = $_REQUEST["status_shop"];
	$histotal = $_REQUEST["histotal"];
	$max = $_REQUEST["shoptotal"];
	$sumtotal = $max + $histotal;
	//เพิ่มเข้าไปในฐานข้อมูล

	if($status_shop == "รออนุมัติการยืม" || $status_shop == "กำลังใช้งาน" ){
					$sql = "UPDATE history 
							SET status_shop='$status_shop'
							WHERE id='$value'";      

			$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

	}else{
					$sql = "UPDATE history 
							SET status_shop='$status_shop'
							WHERE id='$value'";      

			$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

			if($result){
				
				$sql = "UPDATE shop SET total='$sumtotal' WHERE id_shop='$id_shop'";
			
				$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
			
			}
		}
		
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



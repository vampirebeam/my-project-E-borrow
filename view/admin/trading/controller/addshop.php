<?php include("../../../../env/con_db.php");?>
<?php

    session_start();
    $name = $_REQUEST["name"];
    $f_time = $_REQUEST["f_time"];
    $l_time = $_REQUEST["l_time"];
    $total = $_REQUEST["total"];
    $username = $_REQUEST["username"];
    $status = $_REQUEST["status"];
	//เพิ่มเข้าไปในฐานข้อมูล
    
    $sql = "INSERT INTO history(name, f_time, l_time, total, username, status)
    VALUES('$name', '$f_time', '$l_time', '$total', '$username', '$status')";      

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
					if($result){
					$_SESSION['success'] = "ยืมอุปกรณ์สำเร็จ";
					header('location:../index');
					}

        
					else{
					$_SESSION['error'] = "ยืมอุปกรณ์ไม่สำเร็จ";
					header('location:../index');
					} 

?> 



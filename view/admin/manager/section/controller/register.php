<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include("../../../../../env/con_db.php");?>
<?php
    session_start();
    $section = $_POST["section"];
	//เพิ่มเข้าไปในฐานข้อมูล
    
    $sql = "INSERT INTO division(section)
    VALUES('$section')";         

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
					if($result){
					$_SESSION['success'] = "เพิ่มแผนกสำเร็จ";
					header('location:../index');
					}

        
					else{
					$_SESSION['error'] = "เพิ่มแผนกไม่สำเร็จ";
					header('location:../register');
					} 

?> 



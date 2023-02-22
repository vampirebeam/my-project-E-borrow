<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include("../../../../../env/con_db.php");?>
<?php
    session_start();
	$value = $_GET['valuenum'];
    $name = $_POST["name"];
    $serial = $_POST["serial"];
    $cd = $_POST["cd"];
    $total = $_POST["total"];

	//เพิ่มเข้าไปในฐานข้อมูล

        $sql = "UPDATE shop 
        SET name='$name',serial='$serial',cd='$cd',total='$total'
        WHERE id='$value'";      




	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
					if($result){
					$_SESSION['success'] = "อัพเดตข้อมูลอุปกรณ์สำเร็จ";
					header('location:../index');
					}

        
					else{
					$_SESSION['error'] = "อัพเดตข้อมูลอุปกรณ์ผิดพลาด";
					header('location:../index');
					} 

?> 



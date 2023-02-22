<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include("../../../../env/con_db.php");?>
<?php

    session_start();
    
	$id = $_SESSION['id'];
	$password = $_POST["password"];
	$name = $_POST["name"];
	$lname = $_POST["lname"];
    $tel = $_POST["tel"];
    $section = $_POST["section"];
	$salt = "%b-@PzfQjtEfX6(";
	$n_password = MD5($password.md5($salt));

	//เพิ่มเข้าไปในฐานข้อมูล

        $sql = "UPDATE users 
        SET password='$n_password',name='$name',lname='$lname',tel='$tel',section='$section'
        WHERE id='$id'";      

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
					if($result){
					$_SESSION['success'] = "อัพเดตข้อมูลสำเร็จ";
					header('location:../index');
					}

        
					else{
					$_SESSION['error'] = "อัพเดตข้อมูลผิดพลาด";
					header('location:../register');
					} 

?> 



<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include("../../../../../env/con_db.php");?>
<?php
    session_start();
	$username = $_POST["username"];
	$password = $_POST["password"];
	$name = $_POST["name"];
	$lname = $_POST["lname"];
    $tel = $_POST["tel"];
    $section = $_POST["section"];
	$salt = "%b-@PzfQjtEfX6(";
	$n_password = MD5($password.md5($salt));
	//เพิ่มเข้าไปในฐานข้อมูล
    
    $sql = "INSERT INTO users(username, password, name, lname, tel, section)
    VALUES('$username', '$n_password', '$name', '$lname', '$tel', '$section')";         

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
					if($result){
					$_SESSION['success'] = "สมัครสมาชิกสำเร็จ";
					header('location:../index');
					}

        
					else{
					$_SESSION['error'] = "สมัครสมาชิกไม่สำเร็จ";
					header('location:../register');
					} 

?> 



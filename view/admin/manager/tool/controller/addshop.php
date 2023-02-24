<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include("../../../../../env/con_db.php");?>
<?php

	function getTypeFile($fileName){
		return strtolower(substr(strrchr($fileName, "."), 1));
	}
		function Upload($file){
			
			$name = $file['name'];
			$type = getTypeFile($name);
			$fileList = array('jpg', 'png');
			//if(array_search($type, $fileList)) return false;
			
			$name = md5_file($file['tmp_name']).".".$type;
			$savePath = __DIR__."\\../public\\".$name;
			if(move_uploaded_file($file['tmp_name'], $savePath)){
				return $name;
			}
		
	}

    session_start();
    $name = $_POST["name"];
    $serial = $_POST["serial"];
    $cd = $_POST["cd"];
    $total = $_POST["total"];
    $pic = (Upload($_FILES["pic"])); 
	//เพิ่มเข้าไปในฐานข้อมูล
    
    $sql = "INSERT INTO shop(name, serial, cd, total, pic)
    VALUES('$name', '$serial', '$cd', '$total', '$pic')";      

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	
	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
					if($result){
					$_SESSION['success'] = "เพิ่มอุปกรณ์สำเร็จ";
					header('location:../index');
					}

        
					else{
					$_SESSION['error'] = "เพิ่มอุปกรณ์ไม่สำเร็จ";
					header('location:../index');
					} 

?> 



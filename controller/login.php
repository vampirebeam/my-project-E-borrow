<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php include("../env/con_db.php");?>
<?php 
    $username = ($_POST['username']);
    $password = ($_POST['password']);
    session_start();
        if(isset($_POST['username'])) {
            //รับค่า username & password
            if ($username = preg_replace("/[^a-z,@,.,ก-ฮ\d]/i", '', $username)); {  
                //ตรวจอักขระพิเศษ//       
                 $salt = "%b-@PzfQjtEfX6(";
                 $n_password = MD5($password.md5($salt));
                    //query 
                    $sql = "SELECT * FROM users
                    WHERE username ='$username' 
                    AND password ='$n_password' "; 

                    $result = mysqli_query($con,$sql);
                            
                    if(mysqli_num_rows($result)==1){

                        $row = mysqli_fetch_array($result);
                        $_SESSION["id"] = $row["id"];
                        $_SESSION["username"] = $row["username"];
                        $_SESSION["pass"] = $row["password"];
                        $_SESSION["name"] = $row["name"];
                        $_SESSION["lname"] = $row["lname"];
                        $_SESSION["tel"] = $row["tel"];
                        $_SESSION["section"] = $row["section"];
                        $_SESSION["level"] = $row["level"];

                        if($_SESSION["level"]=="0"){ //ถ้าเป็น admin ให้กระโดดไปหน้า
                            $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ";
					        header('location:../view/admin/index');
                        }

                          else if  ($_SESSION["level"]=="1"){ //ถ้าเป็น User ให้กระโดดไปหน้า
                            $_SESSION['success'] = "เข้าสู่ระบบสำเร็จ";
					        header('location:../view/employee/index');
                         }         
                    }else {
                            $_SESSION['error'] = "โปรดตรวจสอบ Username หรือ Password ให้ถูกต้อง";
					        header('location:../index');
                            echo "</script>"; //user & n_password incorrect back to login again
                        }				
            }   
        }
?>

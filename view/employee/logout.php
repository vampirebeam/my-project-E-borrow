<?php include("../env/con_db.php");?>
<?php
        session_start();
        session_destroy();
        header("Location: ../../index");	
?>
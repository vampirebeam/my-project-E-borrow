<?php 
    include("../../../env/con_db.php");
    
    $id=$_POST['id'];


    $sql = "SELECT * FROM shop WHERE id_shop=$id";
    $query = mysqli_query($con, $sql);

    // $num = mysqli_num_rows($query);
     $row = mysqli_fetch_array($query);

    
     $response = array(
            'id'=>$row['id_shop'],
            'total'=>$row['total']
     );

    
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    

?>

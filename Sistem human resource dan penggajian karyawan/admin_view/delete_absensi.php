<?php
include '../database.php';

if(isset($_POST['id'])){
    $id = $_POST['id']; 

    $sql = $db->prepare("DELETE FROM absensi WHERE nama = ?");
    $sql->bind_param("s", $id);

    if($sql->execute()){
        echo "data successfully deleted";
        header("Location: admin_absensi.php"); 
        exit();
    }else{
        echo "Error: " . $sql->error;
    }
}
?>

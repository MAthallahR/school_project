<?php
include '../database.php';
session_start();
if(isset($_POST['nama'])){
    $nama = $_SESSION['nama'];
    $keterangan = "hadir";
    $tanggal = date("Y-m-d");
    $absen_pada = date("H:i:s");

    $sql = "INSERT INTO absensi (nama, keterangan, tanggal, absen_pada, keluar_pada) VALUES ('$nama', '$keterangan', '$tanggal', '$absen_pada', NULL) ON DUPLICATE KEY UPDATE keluar_pada = '$absen_pada'";

    if ($db->query($sql)){
        $_SESSION['absen'] = true;
        header("Location: karyawan_absensi.php"); 
    } else {
        $db->error;
    }
    exit();
}
?>

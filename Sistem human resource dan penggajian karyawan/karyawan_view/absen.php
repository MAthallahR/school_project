<?php
include '../database.php';
session_start();
if(!isset($_SESSION['nama'])){
    header("Location: index.php");
    exit();
}

if(isset($_POST['nama'])){
    $nama = $_SESSION['nama'];
    $keterangan = "hadir";
    $absen_pada = date("Y-m-d H:i:s");

    $sql = "INSERT INTO absensi (nama, keterangan, absen_pada, keluar_pada) VALUES ('$nama', '$keterangan', '$absen_pada', NULL)";
    if ($db->query($sql)) {
        echo "Anda absen (checked in).";
        header("Location: karyawan_absensi.php"); 
    } else {
        echo "Gagal absen: " . $db->error;
    }
    exit();
}
?>

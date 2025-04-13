<?php
include '../database.php';
session_start();

if(isset($_POST['nama'])){
    $nama = $_SESSION['nama'];
    $tanggal = date("Y-m-d");
    $waktu = date("H:i:s");
    
    if(isset($_POST['absen'])){
        $keterangan = "Hadir";
        $sql = "INSERT INTO absensi (nama,keterangan,tanggal,absen_pada) VALUES ('$nama','$keterangan','$tanggal','$waktu')";
        $_SESSION['absen'] = true;

    }elseif(isset($_POST['keluar'])){
        $sql = "UPDATE absensi SET keluar_pada='$waktu' WHERE nama='$nama' AND tanggal='$tanggal'";
        $_SESSION['absen'] = false;     
    }elseif(isset($_POST['sakit'])){
        $keterangan = "Sakit";
        $alasan = $_POST['alasan'];
        $sql = "INSERT INTO absensi (nama,keterangan,tanggal,absen_pada,alasan) VALUES ('$nama','$keterangan','$tanggal','$waktu','$alasan')";
    }elseif(isset($_POST['izin'])){
        $keterangan = "Izin";
        $alasan = $_POST['alasan'];
        $sql = "INSERT INTO absensi (nama,keterangan,tanggal,absen_pada,alasan) VALUES ('$nama','$keterangan','$tanggal','$waktu','$alasan')";
    }
    if($db->query($sql)){
        header("Location: karyawan_absensi.php");
    }else{
        die("error: ".$db->error);
    }
    exit();
}
?>

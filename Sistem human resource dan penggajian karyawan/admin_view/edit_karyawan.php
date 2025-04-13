<?php
include '../database.php';
if(isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = $db->prepare("SELECT * FROM karyawan WHERE nama = ?");
    $sql->bind_param("s", $id);
    $sql->execute();
    $result = $sql->get_result();
    $row = $result->fetch_assoc();
}
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $ognama = $_POST['ognama'];
    $namabaru = $_POST['nama'];
    $nomortelp = $_POST['nomortelp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jabatan = $_POST['jabatan'];

    $sql = $db->prepare("UPDATE karyawan SET nama = ?, nomortelp = ?, jenis_kelamin = ?, jabatan = ? WHERE nama = ?");
    
    $sql->bind_param("sssss", $namabaru, $nomortelp, $jenis_kelamin, $jabatan, $ognama);

    if($sql->execute()) {
        header("Location: admin_karyawan.php");
        exit();
    } else {
        echo "Error" . $sql->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container{
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2{
            margin-top: 0;
            font-size: 24px;
            color: #333;
            text-align: center;
        }
        form{
            display: flex;
            flex-direction: column;
        }
        label{
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        select{
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        input[type="text"]:focus,
        select:focus{
            border-color: #007bff;
            outline: none;
        }
        button[type="submit"]{
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover{
            background-color: #0056b3;
        }
        .cancel-btn{
            display: inline-block;
            text-align: center;
            background-color: #dc3545;
            color: white;
            padding: 10px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }
        .cancel-btn:hover{
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit</h2>
        <form method="POST">
            <input type="hidden" name="ognama" value="<?php echo ucfirst($row['nama']); ?>">
            
            <label>Nama :</label>
            <input type="text" name="nama" value="<?php echo ucfirst($row['nama']); ?>" required>
            
            <label>Nomor Telpon	:</label>
            <input type="text" name="nomortelp" value="<?php echo ucfirst($row['nomortelp']); ?>" required>
            
            <label>Jenis Kelamin :</label>
            <select name="jenis_kelamin" required>
                <option value="laki" <?php echo ($row['jenis_kelamin'] == 'Laki') ? 'selected' : ''; ?>>Laki</option>
                <option value="perempuan" <?php echo ($row['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                <option value="binatang" <?php echo ($row['jenis_kelamin'] == 'Monyet') ? 'selected' : ''; ?>>Monyet    </option>
            </select>
            
            <label>Jabatan :</label>
            <input type="text" name="jabatan" value="<?php echo ucfirst($row['jabatan']); ?>" required>
            
            <button type="submit" name="update">Edit</button>
            <a href="admin_karyawan.php" class="cancel-btn">Cancel</a>
        </form>
    </div>
</body>
</html>

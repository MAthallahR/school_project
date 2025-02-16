<?php 
session_start();
if(!isset($_SESSION['nama'])){
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRD Penggajian</title>
    <style>
        body{
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container{
            display: flex;
            width: 100%;
            height: 100vh;
        }
        .sidebar{
            background-color: #303030;
            color: #fff;
            width: 200px;
            padding: 20px;
        }
        .sidebar ul{
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar li{
            padding: 10px 0;
            border-bottom: 1px solid #555;
            transform: translateX(-5px);
            transition: all 0.3s ease;
        }
        .sidebar li:hover {
            border-bottom: 1px solid #fff; 
            transform: translateX(0);
        }
        .sidebar a{
            color: #fff;
            text-decoration: none;
            transition: all .5s ease;
        }
        .sidebar a:hover{
            font-size: 1.4rem;
            color: #51eefc;
            animation: glow 1.5s infinite;
        }
        @keyframes glow{
            0%{
                text-shadow: 0 0 10px rgba(255, 255, 255, 2);
            }
            50%{
                text-shadow: 0 0 20px rgba(255, 255, 255, 5);
            }
            100%{
                text-shadow: 0 0 10px rgba(255, 255, 255, 2);
            }
        }
        .sidebar ul li:nth-child(2) a{
            color: #51eefc;
        }
        .sidebar ul li:nth-child(2) a:hover{
            animation: w 1.5s infinite;
        }
        @keyframes w{
            0%{
                text-shadow: 0 0 10px rgb(32, 32, 255);
            }
            50%{
                text-shadow: 0 0 20px rgb(32, 32, 255);
            }
            100%{
                text-shadow: 0 0 10px rgb(32, 32, 255);
            }
        }
        .main{
            flex: 1;
            padding: 20px;
        }
        .dashboardj{
            background-color: #303030;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
        }
        .dashboardj .kotak{
            display: inline-block;
            width: 200px;
            height: 100px;
            background-color: #51eefc;
            margin: 10px;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0. 1);
        }
        .sidebar{
            width: 200px; 
            transition: all 0.3s ease; 
        }
        .sidebar.closed{
            width: 0px;
            padding-left: 25px;
            margin-left: -50px;
            margin-top: -350px;
            transition: all 0.3s ease; 
        }
        .navbar{
            background-color: #6d9ac7;
            padding: 10px;
            margin-top: -20px;
            margin-left: -20px;
            margin-right: -20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar .logout{
          margin-left: 10px;
        }
        table{
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;
        }
        th{
            background-color: #f2f2f2;
        }
        th,td{
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .delete{
        background-color: #ff4d4d;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        }
        .delete:hover {
            background-color: #ff1a1a; 
        }
        .jk{
            color: #303030;
        }
        .tombol-absen{
            padding-right:100px
        }
        .absen{
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .absen:hover{
            background-color: #3e8e41;
        }
        .absen:disabled{
            background-color: #ccc;
            color: #666;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="sidebar" class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="karyawan_dashboard.php">Dashboard</a></li>
                <li><a href="#">Absensi</a></li>
                <li><a href="karyawan_karyawan.php">Karyawan</a></li>
                <li><a href="">Cetak slip gaji</a></li>
            </ul>
        </div>
        <div class="main">
        <div class="navbar">
          <button id="sidebartombol">
            <img src="https://png.pngtree.com/png-clipart/20230215/ourmid/pngtree-wild-of-beautiful-monkey-png-image_6602335.png" alt="" style="width: 50px; height: 50px;">
          </button>
          <div>
          <a href=""><?php echo ucfirst($_SESSION['nama']); ?></a>
          <a href="../logout.php" class="logout" onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</a>
          </div>
        </div>
            <h1>Absensi</h1>
            <div class="dashboardj">
                <div class="kotak">       
                    <?php
                    include('../database.php');
                    $sql = "SELECT COUNT(*) FROM karyawan";
                    $result=$db->query($sql);
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                            echo '<span class=jk>Jumlah Karyawan : </span>' .'<br>' .$row['COUNT(*)'];
                        }
                    }
                    ?>
                </div>
                <div class="kotak">
                    <?php 
                    echo '<span class=jk>Tanggal : </span>'. '<br>'.date('Y-m-d');
                    ?>
                </div>  
                <div class="kotak">
                    <?php 
                    $sqlabsen = "SELECT COUNT(*) FROM absensi";
                    $resultabsen = $db->query($sqlabsen);
                    if($resultabsen->num_rows>0){
                        while($rowabsen = $resultabsen->fetch_assoc()){
                            echo '<span class=jk>Jumlah Absensi : </span>' .'<br>' .$rowabsen['COUNT(*)'];   
                        }
                    }
                    ?>
                </div>
            </div>
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Absen Pada</th>
                    <th>Keluar Pada</th>
                </tr>
                <div class="tombol-absen">
                    <form action='absen.php' method='post' style='display:inline;'>
                        <input type='hidden' name='nama' value='<?php $_SESSION['nama']; ?>'>
                        <input type='submit' value='Absen' class='absen' id="absen-submit"> 
                    </form>
                    <form action='absen.php' method='post' style='display:inline;'>
                        <input type='hidden' name='nama' value='<?php echo $_SESSION['nama']; ?>'>
                        <input type='submit' value='Keluar' class='absen' id="keluar-submit" name="keluar" disabled> 
                    </form>
                </div>
            <?php 
            include('../database.php');
            
            $sql = "SELECT id, nama, keterangan, tanggal, absen_pada, keluar_pada from absensi";
            $result = $db->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                        <td>" . ucfirst($row['id']) . "</td>
                        <td>" . ucfirst($row['nama']) . "</td>
                        <td>" . ucfirst($row['keterangan']) . "</td>
                        <td>" . ($row['tanggal']) . "</td>
                        <td>" . ($row['absen_pada']) . "</td>
                        <td>" . ($row['keluar_pada']) . "</td>
                    </tr>";   
                }      
            }else{
                echo "<tr><td colspan='6'>tidak ada yang absen</td></tr>";
            }
            ?>
            </table>            
        </div>
    </div>
    <script>
        const sidebarToggle = document.getElementById('sidebartombol');
        const sidebar = document.getElementById('sidebar');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('closed'); 
        });
        <?php if (isset($_SESSION['absen']) && $_SESSION['absen']) { ?>
            document.getElementById("absen-submit").disabled = true;
            document.getElementById("keluar-submit").disabled = false;
            document.getElementById("absen-submit").value = "ANDA SUDAH ABSEN!";
        <?php } ?>


    </script>
</body>
</html>

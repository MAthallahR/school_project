
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
        .sidebar ul li:nth-child(3) a{
            color: #51eefc;
        }
        .sidebar ul li:nth-child(3) a:hover{
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
        .delete:hover{
            background-color: #ff1a1a; 
        }
        .edit{
        background-color:rgb(77, 213, 255);
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        }
        .edit:hover {
            background-color:rgb(26, 240, 255); 
        }
        .jk{
            color: #303030;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="sidebar" class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="admin_absensi.php">Absensi</a></li>
                <li><a href="#">Karyawan</a></li>
                <li><a href="admin_dafker.php">Pendaftaran Kerja</a></li>
                <li><a href="">Cetak slip gaji</a></li>
            </ul>
        </div>
        <div class="main">
        <div class="navbar">
          <button id="sidebartombol">
            <img src="https://png.pngtree.com/png-clipart/20230215/ourmid/pngtree-wild-of-beautiful-monkey-png-image_6602335.png" alt="" style="width: 50px; height: 50px;">
          </button>
          <div>
            Admin
            <a href="../logout.php" class="logout" onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</a>
          </div>
        </div>
            <h1>Karyawan</h1>
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
                <div class="kotak">nigga 3</div>
            </div>
            <table>
                <tr>
                    <th>Nama</th>
                    <th>Nomor Telpon</th>
                    <th>Jenis Kelamin</th>
                    <th>Jabatan</th>
                    <th>Actions</th>
                </tr>
            <?php 
            include('../database.php');
            $sql = "SELECT nama, nomortelp, jenis_kelamin, jabatan from karyawan";
            $result = $db->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>
                        <td>" . ucfirst($row['nama']) . "</td>
                        <td>" . ucfirst($row['nomortelp']) . "</td>
                        <td>" . ucfirst($row['jenis_kelamin']) . "</td>
                        <td>" . ucfirst($row['jabatan']) . "</td>
                        <td>
                            <form action='delete_karyawan.php' method='post' style='display:inline;'>
                                <input type='hidden' name='id' value='{$row['nama']}'>
                                <input type='submit' value='Delete' class='delete' onclick='return confirm(\"Are you sure you want to delete this record?\");'>
                            </form>
                            <form action='edit_karyawan.php' method='post' style='display:inline;'>
                                <input type='hidden' name='id' value='{$row['nama']}'>
                                <input type='submit' value='Edit' class='edit'>
                            </form>
                        </td>
                    </tr>";   
                }                      
            }else{
                echo "<tr><td colspan='6'>tidak ada karyawan</td></tr>";
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
    </script>
</body>
</html>

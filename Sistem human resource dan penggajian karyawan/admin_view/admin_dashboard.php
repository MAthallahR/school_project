    
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
        }
        .sidebar a{
            color: #fff;
            text-decoration: none;
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
            transition: width 0.3s ease; 
        }
        .sidebar.closed {
            width: 0px;
            margin-left: -50px;
            transition: width 0.3s ease; 

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
    </style>
</head>
<body>
    <div class="container">
        <div id="sidebar" class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="">Absensi</a></li>
                <li><a href="admin_karyawan.php">Karyawan</a></li>
                <li><a href="">Pendaftaran Kerja</a></li>
                <li><a href=""></a></li>
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
            <h1>Dashboard</h1>
            <div class="dashboardj">
                <div class="kotak">nigga 1</div>
                <div class="kotak">nigga 2</div>
                <div class="kotak">nigga 3</div>
            </div>
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

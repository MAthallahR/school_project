<?php
    session_start();
    include("database.php");
    if(isset($_POST['login1'])){
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE password='$password'";
        $result = $db->query($sql);
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            if($data['password'] == $password){ // passwordnya = admin
                $_SESSION["password"] = $data["password"];
                header('location: admin_dashboard.php');
                exit(); 
            }
        }else{
            $error = '<span class="error" id="error">password incorrect</span>';
        }
    }
    if(isset($_POST['login2'])){
        $token = $_POST['token'];
        $telp = $_POST['telp']; 

        $sqlk = "SELECT * FROM karyawan WHERE nomortelp='$telp'";
        $resultk = $db->query($sqlk);
        if($resultk->num_rows > 0){
            $datak = $resultk->fetch_assoc();
            if($datak['token'] == $token){
                $_SESSION["token"] = $datak["token"];
                header('location: karyawan_dashboard.php');
                exit(); 
            }else{
                $error = '<span class="error" id="error">token incorrect</span>';
            }
        }else{
            $error = '<span class="error" id="error">number is not the employee list</span>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    body{
        background-color: #303030;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    form{
        background-color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        border-radius: 5px;
        height: 350px;
        width: 450px;
        transition: all 0.3s;
    }
    .container{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 115px;
        margin-top: 25px;
    }
    .input{
        width: 300px;
        height: 30px;
        font-size: 16px;
        outline: none;
        padding: 6px 16px;
        border: 1px solid rgba(0, 0, 0, 0.233);
        border-radius: 4px;
        gap: 10px;
        transition: all 0.3s ease;
    }
    .ingput{
        position: relative;
        margin-bottom: 15px;
    }
    .input:focus{
        border-color: #3e8e41;
        animation: bayangan 2s infinite; 
    }
    @keyframes bayangan{
        0%{
            box-shadow: 0 0 5px rgba(62, 142, 65, 0.7), 0 0 10px rgba(62, 142, 65, 0.5);
        }
        50%{
            box-shadow: 0 0 15px rgba(62, 142, 65, 0.9), 0 0 20px rgba(62, 142, 65, 0.7);
        }
        100%{
            box-shadow: 0 0 5px rgba(62, 142, 65, 0.7), 0 0 10px rgba(62, 142, 65, 0.5);
        }
    }
    .ingput label{
        position: absolute;
        cursor: text;
        user-select: none;
        pointer-events: none; 
        top: 14px;
        left: 10px;
        font-size: 12px;
        font-weight: bold;
        background: #fff;
        padding: 0 5px;
        color: #999;
        transition: all .3s ease;
        border-radius: 5px; 
    }
    .ingput input:focus + label{
        top: -5px;
        color: #3e8e41;
        font-size: 11px;
    }
    .ingput input.has-value + label{
        top: -5px;
        font-size: 11px;
        color: #3e8e41;
    }
    .login{
        background-color: #4CAF50;
        margin-top: 15px;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.5s;
        width: 150px; 
    }
    .login:hover{
        background-color: #3e8e41;
        transform: translateY(-2px);
    }
    button{
        background-color: #51eefc;
        height: 40px;
        width: 100px; 
        margin: 20px;
        border: none;
        border-radius: 5px;;
        transition: all 0.3s;
        cursor: pointer;
    }
    button:hover{
        background: #1269cc;
        transform: scale(1.05);
        box-shadow: 0 0 5px #51eefc, 0 0 10px #51eefc; 
        animation: w 1.5s infinite;
    }
    @keyframes w{
        0%{
            box-shadow: 0 0 10px #51eefc, 0 0 20px #51eefc;
        }
        50%{
            box-shadow: 0 0 30px #51eefc, 0 0 40px #51eefc;
        }
        100%{
            box-shadow: 0 0 10px #51eefc, 0 0 20px #51eefc;
        }
    }
    .text{
        color: #1269cc;
        font-weight: bold;
        text-align: center;
    }
    button:hover .text{
        color: #51eefc;
    }
    .error{
        margin-top: 20px;
        color: red;
    }
    .animasi{
    animation: fadein 0.5s ease forwards;
    }
    @keyframes fadein{
        from{   
            transform: translateY(-20px);
        }
        to{
            transform: translateY(0);
        }
    }
    .buttong{
        display: flex;
        margin-top: -15px; 
    }
    .gambar{
        margin-right: -10px;
        border: 5px solid white;
        border-radius: 5px; 
        padding: 20px; 
        background-color: white; 
    }
    .gambar img{
        width: 255px;
        display: block; 
        border-radius: 5px;
    }
    .forms{
        display: flex;
        transition: all 0.3s;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .forms:hover{
        transform: scale(1.02);
    }
</style>
<body>
<div class="forms">
    <div class="gambar">
        <img src="https://cdn0-production-images-kly.akamaized.net/AwEA4f95P32p5tToO6yPl_bmw4w=/800x1066/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/1206778/original/091788000_1460967229-ad159740326pictured-the-v.jpg">
    </div>
    <form action="index.php" method="post" id="form">
        <h1 style="font-family: Arial, sans-serif;">LOGIN AS?</h1>

        <div class="buttong">
            <button type="button" onclick="guest()"><p class="text">Guest</p></button>
            <button type="button" onclick="karyawan()"><p class="text">Karyawan</p></button>
            <button type="button" onclick="admin()"><p class="text">Admin</p></button>
        </div>
        <div class="container" id="telp" style="display:none;">
            <div class="ingput">
                <input type="text" class="input" name="telp" autocomplete="off">
                <label for="input">No Telp</label>
            </div>
        </div>
        <div class="container" id="token" style="display:none;">
            <div class="ingput">
                <input type="password" class="input" name="token" autocomplete="off">
                <label for="input">Token</label>
            </div>
        </div>
        <div class="container" id="password" style="display:none;">
            <div class="ingput">
                <input type="password" class="input" name="password" autocomplete="off">
                <label for="input">Password</label>
            </div>
        </div>
        <input type="submit" value="Login" name="login1" class="login" id="login1" style="display:none;"> 
        <input type="submit" value="Login" name="login2" class="login" id="login2" style="display:none;"> 
        <?php 
        if(isset($error)){
            echo $error;
        } 
        ?>
    </form> 
</div>
<script>
    const inputFields = document.querySelectorAll('.ingput input');
    inputFields.forEach(inputField => {
        inputField.addEventListener('input', () => {
            if(inputField.value.trim() !== ''){
                inputField.classList.add('has-value');
            }else{
                inputField.classList.remove('has-value');
            }
        });
    });
    function guest(){
        window.location.href = 'guest_dashboard.php';
    }
    function karyawan(){
        const token = document.getElementById('token');
        const telp = document.getElementById('telp');
        const login = document.getElementById('login2');
        const password = document.getElementById('password'); 
        const loginadmin = document.getElementById('login1'); 
        const form = document.getElementById('form'); 
        const input = token.querySelector('input');
        
        if(password.style.display === 'block'){
        password.style.display = 'none'; 
        loginadmin.style.display = 'none'; 
        }

        if(token.style.display === 'none' || token.style.display === ''){
            token.style.display = 'block'; 
            telp.style.display = 'block';
            login.style.display = 'block'; 
            token.classList.add('animasi');
            telp.classList.add('animasi');  
            login.classList.add('animasi'); 
            form.style.height = '400px';
            input.setAttribute('required', 'required'); 
        }else{
            token.style.display = 'none'; 
            telp.style.display = 'none';
            login.style.display = 'none'; 
            form.style.height = '350px';
            input.removeAttribute('required'); 
        }
    }
    function admin(){
        const password = document.getElementById('password');
        const login = document.getElementById('login1');
        const token = document.getElementById('token');
        const telp = document.getElementById('telp');
        const loginkaryawan = document.getElementById('login2');
        const form = document.getElementById('form');
        const input = password.querySelector('input');
 
        if(token.style.display === 'block'){
        token.style.display = 'none'; 
        telp.style.display = 'none'; 
        loginkaryawan.style.display = 'none'; 
        }
        
        if(password.style.display === 'none' || password.style.display === ''){
            password.style.display = 'block'; 
            login.style.display = 'block'; 
            password.classList.add('animasi'); 
            login.classList.add('animasi'); 
            form.style.height = '350px';    
            input.setAttribute('required', 'required'); 
        }else{
            password.style.display = 'none'; 
            login.style.display = 'none'; 
            form.style.height = '350px';
            input.removeAttribute('required'); 
        }
    }
</script>
</body>
</html>

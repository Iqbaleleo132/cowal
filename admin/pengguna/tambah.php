<?php

session_start();
require 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        setTimout(function () {
            swall({
                title: 'Berhasil',
                text: 'yey! data berhasil ditambahkan',
                type: 'succes',
                timer: 3200,
                showConfirmbutton: true
            });
        },10);
        window.setTimeout(function(){
            window.location.replace('index.php);
        } ,2000);
    </script>
    ";
}

if(isset($_POST["tambah"])){
    if(tambah($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Yay! data pengguna berhasil ditambahkan!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yhaa .. data pengguna gagal ditambahkan :(')
                window.location = 'index.php'
            </script>
        ";
    }
}



?>

<?php require '../../layouts/sidebar_admin.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <link rel="stylesheet" href="../../assets/style/edit.css">

</head>
<body>

<div class="main">
    <h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
    <h1>Tambah Pengguna</h1>
    
    <form action="" method="POST">
        <label for="username">Username</label><br />
        <input type="text" name="username" id="username" class="form-control"><br /> <br />
    
        <label for="nama_lengkap">Nama Lengkap</label><br />
        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"><br /> <br />
    
        <label for="password">Password</label><br />
        <input type="password" name="password" id="password" class="form-control"><br /> <br />
    
        <label for="roles">Roles</label><br />
        <select name="roles" id="roles">
            <option value="maskapai">Maskapai</option>
            <option value="pelanggan">Pelanggan</option>
        </select><br /> <br />
    
        <button type="submit" name="tambah">Tambah</button>
    </form>
</div>


</body>
</html>


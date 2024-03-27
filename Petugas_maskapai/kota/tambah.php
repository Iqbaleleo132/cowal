<?php

session_start();
require 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '../../auth/login/index.php';
    </script>
    ";
}

if(isset($_POST["tambah"])){
    if(tambah($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Yay! data kota berhasil ditambahkan!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yhaa .. data kota gagal ditambahkan :(')
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
    <title>Tambah Kota</title>

    <link rel="stylesheet" href="../../assets/style/edit.css">
</head>
<body>
    <div class="main">
        <h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
        <h1>Tambah Kota</h1>
        
        <form action="" method="POST">
            <label for="nama_kota">Nama Kota</label><br />
            <input type="text" name="nama_kota" id="nama_kota" class="form-control"><br /> <br />
        
            <button type="submit" name="tambah">Tambah</button>
        </form>
    </div>
</body>
</html>

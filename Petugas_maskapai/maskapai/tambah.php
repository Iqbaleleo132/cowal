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
                alert('Yay! data maskapai berhasil ditambahkan!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yhaa .. data maskapai gagal ditambahkan :(')
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
    <title>Document</title>

    <link rel="stylesheet" href="../../assets/style/edit.css">
</head>
<body>
    
<div class="main">
    <h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
    <h1>Tambah Maskapai</h1>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="logo_maskapai">Logo Maskapai</label><br />
        <input type="file" name="logo_maskapai" id="logo_maskapai" class="form-control"><br /> <br />
    
        <label for="nama_maskapai">Nama Maskapai</label><br />
        <input type="text" name="nama_maskapai" id="nama_maskapai" class="form-control"><br /> <br />
    
        <label for="kapasitas">kapasitas</label><br />
        <input type="number" name="kapasitas" id="kapasitas" class="form-control"><br /> <br />
    
        <button type="submit" name="tambah">Tambah</button>
    </form>
</div>

</body>
</html>

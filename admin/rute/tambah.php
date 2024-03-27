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
                alert('Yay! data rute berhasil ditambahkan!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yhaa .. data rute gagal ditambahkan :(')
                window.location = 'index.php'
            </script>
        ";
    }
}

$maskapai = query("SELECT * FROM maskapai");
$kota = query("SELECT * FROM kota");


?>

<?php require '../../layouts/sidebar_admin.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal</title>

    <link rel="stylesheet" href="../../assets/style/edit.css">

</head>
<body>
    
    <div class="main">
        <h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
        <h1>Tambah Rute</h1>
        
        <form action="" method="POST">
            <label for="nama_maskapai">Nama Maskapai</label><br />
            <select name="id_maskapai" id="id_maskapai">
                <?php foreach($maskapai as $data) : ?>
                <option value="<?= $data["id_maskapai"]; ?>"><?= $data["nama_maskapai"]; ?></option>
                <?php endforeach; ?>
            </select><br /> <br />
        
            <label for="rute_asal">Rute Asal</label><br />
            <select name="rute_asal" id="rute_asal">
                <?php foreach($kota as $data) : ?>
                <option value="<?= $data["nama_kota"]; ?>"><?= $data["nama_kota"]; ?></option>
                <?php endforeach; ?>
            </select><br /> <br />
        
           
            <label for="rute_tujuan">Rute Tujuan</label><br />
            <select name="rute_tujuan" id="rute_tujuan">
                <?php foreach($kota as $data) : ?>
                <option value="<?= $data["nama_kota"]; ?>"><?= $data["nama_kota"]; ?></option>
                <?php endforeach; ?>
            </select><br /> <br />
        
            <label for="tanggal_pergi">Tanggal Pergi</label><br />
            <input type="date" name="tanggal_pergi" id="tanggal_pergi"><br /><br />
        
            <button type="submit" name="tambah">Tambah</button>
        </form>
    </div>

</body>
</html>

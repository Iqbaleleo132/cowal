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

$id = $_GET["id"];
$rute = query("SELECT * FROM rute INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai WHERE id_rute = '$id'")[0];

$maskapai = query("SELECT * FROM maskapai");
$kota = query("SELECT * FROM kota");


if(isset($_POST["edit"])){
    if(edit($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Yay! data rute berhasil diedit!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yhaa .. data rute gagal diedit :(')
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
    <title>edit rute</title>

    <link rel="stylesheet" href="../../assets/style/edit.css">

</head>
<body>
    
    <div class="main">
        <div class="box">
                <h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
                <h1>Edit Rute</h1>
                
                <form action="" method="POST">
                    <input type="hidden" name="id_rute" value="<?= $rute["id_rute"]; ?>">
                
                    <label for="nama_maskapai">Nama Maskapai</label><br />
                    <select name="id_maskapai" id="id_maskapai">  
                        <option value="<?= $rute["id_maskapai"]; ?>"><?= $rute["nama_maskapai"]; ?></option>
                        <?php foreach($maskapai as $data) : ?>
                        <option value="<?= $data["id_maskapai"]; ?>"><?= $data["nama_maskapai"]; ?></option>
                        <?php endforeach; ?>
                    </select><br /> <br />
                
                    <label for="rute_asal">Rute Asal</label><br />
                    <select name="rute_asal" id="rute_asal">
                        <option value="<?= $rute["rute_asal"]; ?>"><?= $rute["rute_asal"]; ?></option>
                        <?php foreach($kota as $data) : ?>
                        <option value="<?= $data["nama_kota"]; ?>"><?= $data["nama_kota"]; ?></option>
                        <?php endforeach; ?>
                    </select><br /> <br />
                
                   
                    <label for="rute_tujuan">Rute Tujuan</label><br />
                    <select name="rute_tujuan" id="rute_tujuan">
                        <option value="<?= $rute["rute_tujuan"]; ?>"><?= $rute["rute_tujuan"]; ?></option>
                        <?php foreach($kota as $data) : ?>
                        <option value="<?= $data["nama_kota"]; ?>"><?= $data["nama_kota"]; ?></option>
                        <?php endforeach; ?>
                    </select><br /> <br />
                
                    <label for="tanggal_pergi">Tanggal Pergi</label><br />
                    <input type="date" name="tanggal_pergi" id="tanggal_pergi" value="<?= $rute["tanggal_pergi"]; ?>"><br /><br />
                
                    <button type="submit" name="edit">Edit</button>
                </form>
        </div>
    </div>    

</body>
</html>

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

$rute = query("SELECT * FROM rute INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai ORDER BY rute_asal");


?>

<?php require '../../layouts/sidebar_maskapai.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rute</title>

    <!-- <link rel="stylesheet" href="../../assets/style/main.css"> -->
    <style>
        body {
    display: flex;
    height: 100vh;
    margin: 0;
    background: linear-gradient(
    rgb(255 255 0 / 50%),
    rgb(0 0 255 / 50%));
    
}

.content {
    flex: 1;
    padding: 30px;
}

.content h3 {
    margin-bottom: 20px;
    color: #333;
}

.content table {
    width: 100%;
    border-collapse: collapse;
    background: white;
}

.content th,
.content td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

.content th {
    background-color: #070F2B;
    color: #fff;
    font-weight: normal;
}

.content a {
    display: inline-block;
    margin-right: 10px;
    padding: 5px 10px;
    background-color: #50a3a2;
    color: #fff;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.content a:hover {
    background-color: #40918c;
}

.sidebar {
    width: 200px;
    background-color: #333;
    color: #fff;
    padding: 30px;
    border-radius: 5px;
}

.sidebar a {
    display: block;
    color: #fff;
    text-decoration: none;
    padding: 10px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}


.sidebar a.active {
    background-color: gold;
}
</style>
</head>
<body>
    
<div class="content">
    <h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
    <h1>Halaman Data Rute</h1>
    
    <a href="tambah.php">Tambah</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Maskapai</th>
            <th>Rute Asal</th>
            <th>Rute Tujuan</th>
            <th>Tanggal Pergi</th>
            <th>Aksi</th>
        </tr>
    
        <?php $no = 1; ?>
        <?php foreach($rute as $data) : ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $data["nama_maskapai"]; ?></td>
            <td><?= $data["rute_asal"]; ?></td>
            <td><?= $data["rute_tujuan"]; ?></td>
            <td><?= $data["tanggal_pergi"]; ?></td>
            <td>
                <a href="edit.php?id=<?= $data["id_rute"]; ?>">Edit</a>
                <a href="hapus.php?id=<?= $data["id_rute"]; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>

<?php

$page = "Pemesanan Tiket";

require 'functions.php';
session_start();

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '../auth/login/index.php';
    </script>
    ";
}

$orderTiket = query("SELECT * FROM order_tiket")

?>

<?php require '../../layouts/sidebar_admin.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../../assets/style/main.css"> -->
    <style>
        body {
    display: flex;
    height: 100vh;
    margin: 0;
    background-color: #f5f5f5;
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
    <!-- <h1>Halo, <?= $_SESSION["nama_lengkap"]; ?></h1> -->
    <h1>Data Pemesanan Tiket</h1>
    <table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Nomor Order</th>
        <th>Struk</th>
        <th>Status</th>
        <th>Riwayat Pemesanan</th>
        <th>Opsi</th>
    </tr>
    <?php foreach($orderTiket as $data) : ?>
        <tr>
            <td><?= $data["id_order"]; ?></td>
            <td><?= $data["struk"]; ?></td>
            <td>
                <?php 
                if($data["status"] == "Proses"){
                    ?>
                    <p  style="color: blue; text-decoration: none;">Proses</p>
                    <?php
                } else if($data["status"] == "Berhasil"){
                    ?>
                    <p style="color: green; text-decoration: none;">Berhasil</p>
                    <?php
                } else if($data["status"] == "Gagal"){
                    ?>
                    <p style="color: red; text-decoration: none;">Gagal</p>
                    <?php
                }
            ?>
            </td>
            <td><a href="order_detail.php?id=<?= $data["id_order"]; ?>" style="background:#F5DD61; color:black;">Detail</a></td>
            <td>
                <?php if ($data["status"] == "Proses"){
                    ?>
                    <a href="verif.php?id=<?= $data["id_order"]; ?>" style="background:blue;">Verifikasi</a>
                    <!-- <a href="reject.php?id=<?= $data["id_order"]; ?>" style="background:green;">Reject</a> -->
                    <?php }else if($data["status"] == "Berhasil" || $data["status"] == "Gagal"){
                        ?>
                    <a href="hapus.php?id=<?= $data["id_order"]; ?>" style="background:red;">Hapus</a>
                    <?php    
                } ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
        </body>
        </html>
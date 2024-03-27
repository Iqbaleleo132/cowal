<?php require '../../layouts/sidebar_admin.php'; ?>
<?php 

require 'functions.php';
session_start();

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "
    <script type='text/javascript'>
        alert('Parameter id tiket tidak valid!');
        window.location = 'index.php';
    </script>
    ";
    exit; 
}

$id_order = $_GET['id'];
$detailTiket = mysqli_query($conn, "SELECT * FROM order_detail 
INNER JOIN order_tiket ON order_detail.id_order = order_tiket.id_order
INNER JOIN user ON order_detail.id_user = user.id_user
INNER JOIN jadwal_penerbangan ON order_detail.id_penerbangan = jadwal_penerbangan.id_jadwal
INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute
INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai
WHERE order_detail.id_order = '$id_order'");

?>

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

<div class="container">
    <div class="content">
    <h1>Detail Pemesanan - E Ticketing</h1>
    <?php foreach ($detailTiket as $data) : ?>
        <h4>Nomor Order : <?= $data["id_order"]; ?></h4>
        <table class="table table-striped">
            <tr>
                <th>Nama Maskapai</th>
                <td><?= $data["nama_maskapai"]; ?></td>
            </tr>
            <tr>
                <th>Jumlah Tiket</th>
                <td><?= $data["jumlah_tiket"]; ?></td>
            </tr>
            <tr>
                <th>Rute Asal</th>
                <td><?= $data["rute_asal"]; ?></td>
            </tr>
            <tr>
                <th>Rute Tujuan</th>
                <td><?= $data["rute_tujuan"]; ?></td>
            </tr>
            <tr>
                <th>Waktu Berangkat</th>
                <td><?= $data["waktu_berangkat"]; ?></td>
            </tr>
            <tr>
                <th>Waktu Tiba</th>
                <td><?= $data["waktu_tiba"]; ?></td>
            </tr>
            <tr>
                <th>Harga</th>
                <td>Rp <?= number_format($data["harga"]); ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <?php 
                if($data["status"] == "Proses"){
                    ?>
                    <td style="color: blue; text-decoration: none;"><?= $data["status"]; ?></td>
                    <?php
                } else if($data["status"] == "Berhasil"){
                    ?>
                    <td style="color: green; text-decoration: none;"><?= $data["status"]; ?></td>
                    <?php
                } else if($data["status"] == "Gagal"){
                    ?>
                    <td style="color: red; text-decoration: none;"><?= $data["status"]; ?></td>
                    <?php
                }
            ?>
            </tr>
        </table>
    <?php endforeach; ?>
    <a href="index.php">Back</a>
</div>
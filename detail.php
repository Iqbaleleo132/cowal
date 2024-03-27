<?php

require 'layouts/navbar.php';

if (!isset($_SESSION["username"])) {
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = 'index.php';
    </script>
    ";
}

$id = $_GET["id"];

$tiket = query("SELECT * FROM jadwal_penerbangan 
INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE id_jadwal = '$id'")[0];

?>

<div class="detail-penerbangan"
    style="background: #071952; margin-left:25px; margin-right:25px; border-radius:20px;">
    <style>
        p,h1 {
            color:goldenrod;
        }
    </style>
    <h1>Detail Penerbangan</h1>
    <div class="wrapper-detail-penerbangan">
        <form action="" method="post">
            <img src="assets/images/<?= $tiket["logo_maskapai"]; ?>" width="200">
            <p>Nama Maskapai : <?= $tiket["nama_maskapai"]; ?></p>
            <p>Rute Penerbangan : <?= $tiket["rute_asal"] ?> - <?= $tiket["rute_tujuan"]; ?></p>
            <p>Tanggal pergi : <?= $tiket["tanggal_pergi"]; ?></p>
            <p>Rp. <?= number_format($tiket["harga"]); ?></p>
            <p>kapasitas Kursi : <?= $tiket["kapasitas"]; ?></p>
            <input type="number" name="qty" value="1"><br /><br>
            <button type="submit" name="kirim" style="background: black; margin:20px; color:goldenrod">Pesan Tiket</button>
        </form>
    </div>
</div>

<?php

if (isset($_POST["kirim"])) {
    if ($_POST["qty"] > $tiket["kapasitas"]) {
        echo "
            <script type='text/javascript'>
                alert('Maaf, Kuantitas kamu melebihi kursi yang tersedia');
                window.location = 'index.php';
            </script>
        ";
    } elseif ($_POST["qty"] <= 0) {
        echo "
            <script type='text/javascript'>
                alert('Silahkan memilih jumlah kursi penumpang');
                window.location = 'index.php';
            </script>
        ";
    } else {
        $qty = $_POST["qty"];
        $_SESSION["cart"][$id] = $qty;

        echo "
            <script type='text/javascript'>
                alert('Tiket berhasil di pesan');
                window.location = 'cart.php';
            </script>
        ";
    }
}


?>
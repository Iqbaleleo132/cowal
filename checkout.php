<?php

require 'layouts/navbar.php';
if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = 'index.php';
    </script>
    ";
}

?>

<?php if(empty($_SESSION["cart"])) {
    ?>
    <h1 style="color: red;">Anda Belum Memesan Tiket:(</h1>
    <?php
}else{
?>
    <div class="checkout-pswt">
        <h1>Checkout</h1>
        <div class="checkout">
            <form action="" method="post">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="hidden" name="id_user" value="<?= $_SESSION["id_user"]; ?>">
                <input type="text" value="<?= $_SESSION["nama_lengkap"]; ?>" disabled>
                <?php $grandtotal = 0; ?>
                <?php foreach ($_SESSION["cart"] as $id_tiket => $kapasitas) :
                    $tiket = query("SELECT * FROM jadwal_penerbangan 
                                    INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
                                    INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai 
                                    WHERE jadwal_penerbangan.id_jadwal = $id_tiket")[0];

                    $totalharga = $tiket["harga"] * $kapasitas;
                    $grandtotal += $totalharga;?>
                        <input type="hidden" name="id_penerbangan" value="<?= $id_tiket; ?>"><br><br>
                        <input type="hidden" name="jumlah_barang" value="<?= $kapasitas; ?>"><br><br>
                        <input type="hidden" name="subtotal" value="<?= $totalHarga; ?>"><br><br>
                <?php endforeach; ?>

                <h1 style="margin-top: 50px;">List Tiket</h1>
                <div class="wrapper-checkout">
                    <?php $grandtotal = 0; ?>
                    <?php foreach ($_SESSION["cart"] as $id_tiket => $kapasitas) :
                        $tiket = query("SELECT * FROM jadwal_penerbangan 
                                        INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
                                        INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai 
                                        WHERE jadwal_penerbangan.id_jadwal = $id_tiket")[0];
    
                        $totalharga = $tiket["harga"] * $kapasitas;
                        $grandtotal += $totalharga;?>
                                    <div class="card-checkout-tiket-pswt">
                                        <a href="detail.php?id=<?= $tiket["id_jadwal"] ?>" style="text-decoration: none; color: #000;">
                                            <div class="image"><img src="assets/images/<?= $tiket["logo_maskapai"]; ?>" width="80"></div><br>
                                            <div class="nama-maskapai"><?= $tiket["nama_maskapai"]; ?></div>
                                            <div class="tanggal-pergi"><?= $tiket["tanggal_pergi"]; ?></div>
                                            <div class="waktu-berangkat"><?= $tiket["waktu_berangkat"]; ?></div>
                                            <div class="rute-penerabangan"><?= $tiket["rute_asal"] ?> - <?= $tiket["rute_tujuan"]; ?></div>
                                            <div class="text-harga">Rp <?= number_format($tiket["harga"]); ?>@<?= $kapasitas; ?>Tiket</div>
                                            <div class="total">Rp <?= number_format($totalharga); ?></div>
                                        </div>

                    <?php endforeach; ?>
                </div>
                <h2>Grand Total <br>
                Rp. <?= number_format($grandtotal); ?>
                </h2>
                <button type="sbumit" name="checkout">Checkout</button>
            </form>
        </div>
    </div>
    <?php
} ?>
                                                                                                                                                                                                             
<?php 
    if (isset($_POST['checkout'])){
        if(checkout($_POST)){
            echo "
            <script type='text/javascript'>
                alert('Yash! Pemesanan anda telah berhasil! Selamat Berlibur.');
                window.location = 'history.php'
            </script>
            ";
        } else {
            echo mysqli_error($conn);
        }
    }

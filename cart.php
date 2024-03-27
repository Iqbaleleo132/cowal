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
    <h1>Anda Belum memsan tiket</h1>
    <?php
}else{
?>
    <div class="wrapper-keranjang">
        <h1>Pesanan Tiket Anda</h1>

<div class="keranjang">
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama maskapai</th>
                    <th>Rute</th>
                    <th>Tanggal Keberangkatan</th>
                    <th>Harga</th>
                    <th>Kapasitas</th>
                    <th>Total Harga</th>
                    <!-- <th>Aksi</th> -->
                </tr>

                <?php $i = 1; ?>
                <?php $grandtotal = 0; ?>
                <?php foreach ($_SESSION["cart"] as $id_order => $kapasitas) :
                    $order = query("SELECT * FROM jadwal_penerbangan 
                                    INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
                                    INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai 
                                    WHERE jadwal_penerbangan.id_jadwal = $id_order")[0];

                    $totalharga = $order["harga"] * $kapasitas;
                    $grandtotal += $totalharga;
                    ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $order["nama_maskapai"]; ?></td>
                        <td><?= $order["rute_asal"] ?> - <?= $order["rute_tujuan"]; ?></td>
                        <td><?= date("Y-m-d", strtotime($order["tanggal_pergi"])); ?></td>
                        <td><?= number_format($order["harga"]); ?></td>
                        <td><?= $kapasitas; ?></td>
                        <td><?= number_format($totalharga); ?></td>
                        <!-- <td>
                            <a href="edit.php?id=<?= $id_order; ?>">Edit</a>
                            <a href="hapus.php?id=<?= $id_order; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td> -->
                    </tr>
                <?php $i++; ?>
                <?php endforeach; ?>

                <tr>
                        <td>Grand Total</td>
                        <td colspan="5">Rp. <?= number_format($grandtotal); ?></td><br>
                        <td colspan="6"><a href="checkout.php" style="width: 100%; text-align:center;">Checkout</a></td>
                </tr>
            </table>
        </div>
    </div>
<?php
}
?>
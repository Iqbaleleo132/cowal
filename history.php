<?php require 'layouts/navbar.php'; ?>
</div>
<?php 

$id_user = $_SESSION["id_user"];
$orderTiket = mysqli_query($conn, "SELECT order_tiket.id_order, order_tiket.struk, order_tiket.status, order_detail.id_order, order_detail.id_user, user.id_user FROM order_tiket INNER JOIN order_detail ON order_tiket.id_order = order_detail.id_order INNER JOIN user On order_detail.id_user = user.id_user WHERE user.id_user = '$id_user' GROUP BY order_tiket.id_order");

?>

<div class="list-tiket-pesawat mt-5">
    <h1>History Pemesanan Tiket</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No Order</th>
            <th>Struk</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>
        <?php foreach($orderTiket as $data) : ?>
        <tr>
            <td><?= $data["id_order"]; ?></td>
            <td><?= $data["struk"]; ?></td>
            <td class="status">
                <?php 
                    if($data["status"] == "Proses"){
                        ?>                      
                            Pemesanan sedang diproses                       
                        <?php
                    } else if($data["status"] == "Berhasil"){
                        ?>
                         Pemesanan telah diterima
                        <?php
                    } else if($data["status"] == "Gagal"){
                        ?>
                        
                     Pemesanan ditolak, pastikan mengisi data dengan benar! 
                        
                        <?php
                    }
                ?>
            </td>
            <td>
                <a href="detailPemesanan.php?id=<?= $data["id_order"]; ?>">Detail</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
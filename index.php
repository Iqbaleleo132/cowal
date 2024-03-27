<?php require 'layouts/navbar.php'; 

$page = "index";

?>


<?php 
$jadwalPenerbangan = query("SELECT * FROM jadwal_penerbangan 
INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai ORDER BY tanggal_pergi, waktu_berangkat");

if (isset($_GET['query']) && !empty($_GET['query'])) {
    $search_query = $_GET['query'];
    $jadwalPenerbangan = query("SELECT * FROM jadwal_penerbangan 
                                INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
                                INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai 
                                WHERE nama_maskapai LIKE '%$search_query%' OR rute_asal LIKE '%$search_query%' OR rute_tujuan LIKE '%$search_query%' 
                                ORDER BY tanggal_pergi, waktu_berangkat");
}

?>

<form action="index.php" method="get" style="margin-left: 1600px;">
    <input type="text" id="search_query" name="query" required>
  <button type="submit" style="border-radius: 30px; background:#13005A; color:goldenrod;" >Search</button>
</form>


<h1 class="justify-content-center">Jadwal Penerbangan E-Ticketing</h1>
<div class="list-tiket-pswt">
    <div class="wrapper-tiket-pswt">
        <?php foreach ($jadwalPenerbangan as $data): ?>
            <div class="card-tiket-pswt">
                <a href="detail.php?id=<?= $data["id_jadwal"] ?>">
                    <div class="image"><img src="assets/images/<?= $data["logo_maskapai"]; ?>" width="110"></div><br>
                    <div class="nama-maskapai">
                        <?= $data["nama_maskapai"]; ?>
                    </div>
                    <div class="rute-penerabangan" style="color:aqua;">
                        <?= $data["rute_asal"] ?> -
                        <?= $data["rute_tujuan"]; ?>
                    </div>
                    <div class="text-harga">Rp
                        <?= number_format($data["harga"]); ?>
                    </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
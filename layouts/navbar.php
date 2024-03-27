<?php

require 'functions.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style/navbar.css">
    <link rel="stylesheet" href="assets/style/style.css">
    <title>Document</title>
    <style>
body {
  font-family: "Arial", sans-serif;
  margin: 0;
  padding: 0;
  
}

.navbar {
  background: #13005A;
  color: goldenrod;
  padding: 10px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.logo {
  font-size: 24px;
  font-weight: bold;
}

.menu {
  display: flex;
}

.menu a {
  color: goldenrod;
  text-decoration: none;
  margin-right: 20px;
  font-weight: bold;
}

.menu a:hover {
  color: white;
}

.authentication {
  display: flex;
  align-items: center;
}

.authentication span {
  margin-right: 10px;
}

.authentication a {
  color: #fff;
  text-decoration: none;
  margin-right: 10px;
  font-weight: bold;
}

.authentication a.logout:hover {
  color: #e74c3c;
}

/* jadwal.css */

.list-tiket-pswt {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  margin-top: 20px;
}

.wrapper-tiket-pswt {
  display: flex;
  justify-content: space-around;
  align-items: stretch;
  flex-wrap: wrap;
  max-width: 1200px;
  margin: 0 auto;
}

.card-tiket-pswt {
  background-color: #00337C ;
  border: 1px solid black;
  border-radius: 8px;
  margin: 10px;
  padding: 15px;
  width: 250px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease-in-out;
}

.card-tiket-pswt:hover {
  transform: scale(1.05);
}

.image {
  text-align: center;
}

.image img {
  border-radius: 20%;
}

.nama-maskapai {
  text-decoration: none;
  font-size: 18px;
  font-weight: bold;
  margin-top: 10px;
  color: white;
}

.rute-penerbangan {
  text-decoration: none;
  font-size: 14px;
  color: #0b7dda;
  margin-top: 5px;
}

.text-harga {
  font-size: 16px;
  font-weight: bold;
  color: white;
  margin-top: 10px;
}

h1 {
  text-align: center;
  margin-top: 30px;
}
a {
  text-decoration: none;
  color: inherit;
}

/*detail penerbangan*/

.detail-penerbangan {
  text-align: center;
  margin-top: 30px;
}

.wrapper-detail-penerbangan {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 20px;
}

.wrapper-detail-penerbangan img {
  border-radius: 8px;
}

h1 {
  color: #333;
}

p {
  font-size: 16px;
  margin: 5px 0;
}

label {
  display: block;
  font-size: 16px;
  margin-top: 10px;
}

input[type="date"] {
  width: 100%;
  padding: 8px;
  margin: 5px 0;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="number"] {
  width: 100%;
  padding: 8px;
  margin: 5px 0;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  background-color: #4caf50;
  color: #fff;
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-top: 10px;
}

button:hover {
  background-color: #45a049;
}

/* CSS KERANJANG */

.wrapper-keranjang {
  margin: 20px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

h1 {
  color: #333;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

th,
td {
  border: 1px solid #ddd;
  padding: 10px;
  text-align: left;
}

th {
  background-color: #f2f2f2;
}

td a {
  display: inline-block;
  padding: 5px 10px;
  text-decoration: none;
  background-color: #4caf50;
  color: #fff;
  border-radius: 3px;
}

td a:hover {
  background-color: #45a049;
}

td a + a {
  margin-left: 5px;
  background-color: #f44336;
}

td a + a:hover {
  background-color: #d32f2f;
}

td[colspan="7"] {
  text-align: right;
  padding-top: 10px;
}

td[colspan="7"] a {
  padding: 10px 20px;
  background-color: #2196f3;
  color: #fff;
  text-decoration: none;
  border-radius: 3px;
}

td[colspan="7"] a:hover {
  background-color: #0b7dda;
}




    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">E - Ticketing</div>
        <div class="menu">
            <a href="/e-ticketing/index.php" style="color:goldenrod;"class="<?php if($page == "index") echo"active" ?>">Jadwal Penerbangan</a>
            <a href="/e-ticketing/checkout.php" style="color:goldenrod;">Pemesanan Tiket</a>
            <a href="/e-ticketing/history.php" style="color:goldenrod;">Riwayat Pemesanan</a>
        </div>
        <div class="authentication">
            <?php if(isset($_SESSION["username"])){
                ?>
                <span>Halo, <?= $_SESSION["nama_lengkap"]; ?></span>
                <a class="logout" href="logout.php" style="color: goldenrod;">Logout</a>
                <?php
            }else{
                ?>
                <a href="auth/login/" style="color: goldenrod;">Login</a>
               
                <?php
            }?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
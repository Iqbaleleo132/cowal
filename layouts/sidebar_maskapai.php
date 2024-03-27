<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/e-ticketing/assets/style/sidebar.css">
    <link rel="stylesheet" href="/e-ticketing/assets/sweet-alert/css/bootstrap.min.css">
    <link rel="stylesheet" href="/e-ticketing/assets/sweet-alert/css/sweetalert.css">

    <title>Sidebar Maskapai</title>
</head>
<style>
    body {
        display: flex;
        height: 100vh;
        margin: 0;
        background-color: white;
    }

    .sidebar-admin {
        width: 200px;
        background-color: #211951;
        color: #fff;
        padding: 30px;
        border-radius: 5px;
        height: 880px;
    }

    .sidebar-admin a {
        display: block;
        color: #fff;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .sidebar-admin a:hover {
        background-color: black;
    }

    .sidebar-admin a.active {
        background-color: #50a3a2;
    }
</style>

<body>
    <div class="sidebar-admin">
        <!-- <a href="/e-ticketing/petugas_maskapai/index.php" class="<?php if($page == "Dashboard") echo"active" ?>"> Dashboard</a><br><br> -->
        <a href="/e-ticketing/petugas_maskapai/pengguna/"class="<?php if($page=="dasboard") echo "active" ?>">Data Pelanggan</a>&nbsp;&nbsp;
        <a href="/e-ticketing/petugas_maskapai/maskapai/"class="<?php if($page=="dasboard") echo "active" ?>">Data Maskapai</a>&nbsp;&nbsp;
        <a href="/e-ticketing/petugas_maskapai/kota/"class="<?php if($page=="dasboard") echo "active" ?>">Kota</a>&nbsp;&nbsp;
        <a href="/e-ticketing/petugas_maskapai/rute/"class="<?php if($page=="dasboard") echo "active" ?>">Data Rute</a>&nbsp;&nbsp;
        <a href="/e-ticketing/petugas_maskapai/jadwal/"class="<?php if($page=="dasboard") echo "active" ?>">Data Jadwal Penerbangan</a>&nbsp;&nbsp;
        <a href="/e-ticketing/petugas_maskapai/order" class="<?php if($page == "tiket") echo"active" ?>"> Data Pemesanan Tiket</a><br><br>&nbsp;&nbsp;
        <a href="/e-ticketing/logout.php"
            onClick="return confirm('Apakah anda yakin ingin logout?')">Logout</a>
    </div>

    <script src="/e-ticketing/sweet-alert/js/jquery-2.1.4.min.js"></script>
    <script src="/e-ticketing/sweet-alert/js/sweetalert.min.js"></script>
</body>

</html>
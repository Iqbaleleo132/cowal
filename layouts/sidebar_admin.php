<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/e-ticketing/assets/style/sidebar.css">
    <link rel="stylesheet" href="/e-ticketing/assets/sweet-alert/css/bootstrap.min.css">
    <link rel="stylesheet" href="/e-ticketing/assets/sweet-alert/css/sweetalert.css">

    <title>Sidebar Admin</title>
</head>
<style>
    body {
        display: flex;
        height: 100vh;
        margin: 0;
        font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        background: linear-gradient(90deg, rgba(34,193,195,1) 0%, rgba(240,45,253,1) 100%);

    }

    .sidebar-admin {
        width: 200px;
        background-color: #00224D;
        color: #fff;
        padding: 30px;
        border-radius: 5px;
        height: 900px;
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
        <a href="/e-ticketing/admin/index.php" class="<?php if($page == "Dashboard") echo"active" ?>"> Dashboard</a><br><br>
        <a href="/e-ticketing/admin/pengguna/" class="<?php if($page == "pengguna") echo"active" ?>">Data Pelanggan</a><br><br>&nbsp;&nbsp;
        <a href="/e-ticketing/admin/maskapai/" class="<?php if($page == "maskapai") echo"active" ?>">Data Maskapai</a><br><br>&nbsp;&nbsp;
        <a href="/e-ticketing/admin/kota" class="<?php if($page == "kota") echo"active" ?>">Data Kota</a><br><br>&nbsp;&nbsp;
        <a href="/e-ticketing/admin/rute" class="<?php if($page == "rute") echo"active" ?>"> Data Rute</a><br><br>&nbsp;&nbsp;
        <a href="/e-ticketing/admin/jadwal" class="<?php if($page == "penerbangan") echo"active" ?>"> Jadwal Penerbangan</a><br><br>&nbsp;&nbsp;
        <a href="/e-ticketing/admin/order" class="<?php if($page == "tiket") echo"active" ?>"> Data Pemesanan Tiket</a><br><br>&nbsp;&nbsp;
         <a href="/e-ticketing/logout.php"> Logout</a><br><br>
    </div>

    <script src="/e-ticketing/sweet-alert/js/jquery-2.1.4.min.js"></script>
    <script src="/e-ticketing/sweet-alert/js/sweetalert.min.js"></script>
</body>

</html>
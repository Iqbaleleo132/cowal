<?php
$page= "dasboard";
session_start();

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '../auth/login/index.php';
    </script>
    ";
}


?>

<?php require '../layouts/sidebar_maskapai.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
    display: flex;
    height: 100vh;
    margin: 0;
    background: linear-gradient(
    rgb(255 255 0 / 50%),
    rgb(0 0 255 / 50%));
    
}
    </style>
</head>
<body>
  <h1 style="justify-content:center;">Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
</body>
</html> 
<?php

session_start();
require 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '../../auth/login/index.php';
    </script>
    ";
}

$id = $_GET["id"];

if(hapus($id) > 0){
    echo "
    <script type='text/javascript'>
        alert('Yay! data maskapai berhasil dihapus');
        window.location = 'index.php';
    </script>
    ";
}else{
    echo "
    <script type='text/javascript'>
        alert('Yhaa .. data maskapai gagal ditambahkan :(')
        window.location = 'index.php';
    </script>
    ";
}


?>



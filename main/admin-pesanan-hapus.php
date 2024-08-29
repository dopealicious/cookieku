<?php 
session_start();
include('functions.php');

if (!isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
$id = $_GET["id_pesanan"];
if (hapuspesanan($id) > 0) {
        echo " <script> 
        alert('Data pesanan berhasil dihapus!');
        document.location.href = 'admin-pesanan-index.php'
        </script>
        ";
    } else {
        echo "<script> 
        alert('Data pesanan gagal dihapus!');
        document.location.href = 'admin-pesanan-index.php'
        </script>
    ";
}

?>
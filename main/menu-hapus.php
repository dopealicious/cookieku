<?php 
session_start();
include('functions.php');

if (!isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

$id = $_GET["id_kue"];
if (hapus($id) > 0) {
        echo " <script> 
        alert('data kue berhasil dihapus!');
        document.location.href = 'index.php'
        </script>
        ";
    } else {
        echo "<script> 
        alert('data kue gagal dihapus!');
        document.location.href = 'index.php'
        </script>
    ";
}
?>
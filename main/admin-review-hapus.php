<?php 
session_start();
include('functions.php');

if (!isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
$id = $_GET["id_review"];
if (hapusreview($id) > 0) {
        echo " <script> 
        alert('Data review berhasil dihapus!');
        document.location.href = 'admin-customer-index.php'
        </script>
        ";
    } else {
        echo "<script> 
        alert('Data review gagal dihapus!');
        document.location.href = 'admin-customer-index.php'
        </script>
    ";
}

?>
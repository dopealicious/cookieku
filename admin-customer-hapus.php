<?php 
session_start();
include('functions.php');

if (!isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
$id = $_GET["id_customer"];
if (hapus($id) > 0) {
        echo " <script> 
        alert('Data customer berhasil dihapus!');
        document.location.href = 'admin-customer-index.php'
        </script>
        ";
    } else {
        echo "<script> 
        alert('Data customer gagal dihapus!');
        document.location.href = 'admin-customer-index.php'
        </script>
    ";
}

?>
<?php 
session_start();
include('functions.php');

if (!isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
$id = $_GET["id_kue"];
if (hapuskue($id) > 0) {
        echo " <script> 
        alert('Data kue berhasil dihapus!');
        document.location.href = 'admin-menu-index.php'
        </script>
        ";
    } else {
        echo "<script> 
        alert('Data customer gagal dihapus!');
        document.location.href = 'admin-menu-index.php'
        </script>
    ";
}

?>



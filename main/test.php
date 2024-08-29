
<?php
// echo "Hello World!";
$conn = mysqli_connect("localhost", "root", "", "cookieku");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    global $conn;
    try {
        
        $datas = json_decode(file_get_contents('php://input'), true);
        foreach ($datas as $data) {
            $stok = $data["stok"];
            $id_kue = $data["id_kue"];
            $id_customer = $data["id_customer"];
            $name_customer = $data["name_customer"];
            $nama_kue = $data["nama_kue"];
            $harga_kue = $data["harga_kue"];
            $total_pesanan = $data["total_pesanan"];
            $total_harga = $data["total_harga"];
            $tanggal_pesanan = $data["tanggal_pesanan"];
            $bukti_pembayaran = $data["bukti_pembayaran"];
            // query insert data
            $query = "INSERT INTO `pesanan` VALUES (NULL, {$id_customer}, '{$name_customer}', '{$nama_kue}', '{$harga_kue}', {$total_pesanan}, '{$total_harga}', '{$tanggal_pesanan}', '{$bukti_pembayaran}', 'Belum Bayar')";
            $query2 = null;
            // mysqli_query($conn, $query);
            if (isset($stok)) {
                $menu = query("SELECT * FROM menu WHERE id_kue = {$id_kue}");
                if((int)$menu[0]["stok_kue"] < $total_pesanan ){
                    http_response_code(400);
                    echo "Pesanan gagal disimpan, jumlah stok lebih kecil dari total pemesanan"; 
                    return;
                }
                $sisa_stok = (int)$menu[0]["stok_kue"] - $total_pesanan;
                $query2 = "UPDATE `menu` SET stok_kue = {$sisa_stok} WHERE id_kue = {$id_kue}";
                // var_dump($query2);
            }

            if (isset($query2)) {
                mysqli_query($conn, $query2);
            }
            
            echo "Pesanan berhasil dilakukan!";
            
        }
    } catch (\Throwable $th) {
        throw $th;
    }
}

?>
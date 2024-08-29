<?php 
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "cookieku");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row; 
    }
    return $rows;
}

// ADMIN
function tambahkue($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $name = htmlspecialchars($data["nama_kue"]);
    $stok = htmlspecialchars($data["stok_kue"]);
    $harga = htmlspecialchars($data["harga_kue"]);
    $detail = htmlspecialchars( $data["detail_kue"]);
    // upload gambar
    $gambar = uploadkue();
    if (!$gambar) {
        return false;
    }

    // query insert data
    $query = "INSERT INTO menu
    VALUES
    ('', '$name', '$stok', '$harga', '$detail', '$gambar')
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapuskue($id){
    global $conn;
    $namaFile = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM menu WHERE id_kue='$id'"));
    unlink('img/kue/' . $namaFile["gambar_kue"]);
    $hapus = "DELETE FROM menu WHERE id_kue='$id'";
    mysqli_query($conn, $hapus);
    return mysqli_affected_rows($conn);
}

function uploadkue() {
    $namaFile = $_FILES['gambar_kue']['name'];
    $sizeFile = $_FILES['gambar_kue']['size'];
    $error = $_FILES['gambar_kue']['error'];
    $tmpName = $_FILES['gambar_kue']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script> 
        alert('Pilih gambarnya dulu!');
        </script>
        ";
        return false;
    }

    // cek yang diupload adalah gambar
    $extensionPicValid = ['jpg', 'jpeg', 'png'];
    $extensionPic = explode('.', $namaFile);
    $extensionPic = strtolower(end($extensionPic) );
    if (!in_array($extensionPic, $extensionPicValid) ) {
        echo "<script> 
        alert('Upload gambar yang sesuai format!');
        </script>
        ";
        return false;
    }

    // cek ukuran
    if ($sizeFile > 3000000) {
        echo "<script> 
        alert('Gambarnya kebesaran!');
        </script>
        ";
        return false;
    }

    // jika lolos seleksi, gambar akan diupload
    // generate nama gambar baru agar tidak sama dengan nama gambar yang lain/sudah ada
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensionPic;
    move_uploaded_file($tmpName, 'img/kue/' . $namaFileBaru);
    return $namaFileBaru;
}

function ubahkue($data) {
    global $conn;
    $idkue = $data["id_kue"];
    // ambil data dari tiap elemen dalam form
    $name = htmlspecialchars($data["nama_kue"]);
    $stok = htmlspecialchars($data["stok_kue"]);
    $harga = htmlspecialchars($data["harga_kue"]);
    $detail = htmlspecialchars($data["detail_kue"]);
    $gambarLama = htmlspecialchars($data['gambarLama']);

    // cek apakah ganti gambar atau ngga
    if ($_FILES['gambar_kue']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadkue();
    }
    
    // query update data 
    $query = "UPDATE menu SET 
        nama_kue = '$name',
        stok_kue = '$stok',
        harga_kue = '$harga',
        detail_kue = '$detail',
        gambar_kue = '$gambar'
        WHERE id_kue = $idkue
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function carikue($keyword) {
    $query = "SELECT * FROM menu 
            WHERE
            nama_kue LIKE '%$keyword%'
            ";
        return query($query);
}

function uploadpesanan() {
    $namaFile = $_FILES['gambar_kue']['name'];
    $sizeFile = $_FILES['gambar_kue']['size'];
    $error = $_FILES['gambar_kue']['error'];
    $tmpName = $_FILES['gambar_kue']['tmp_name'];


    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script> 
        alert('Pilih gambarnya dulu!');
        </script>
        ";
        return false;
    }

    // cek yang diupload adalah gambar
    $extentionPicValid = ['jpg', 'jpeg', 'png'];
    $extensionPic = explode('.', $namaFile);
    $extensionPic = strtolower(end($extensionPic) );
    if (!in_array($extensionPic, $extentionPicValid) ) {
        echo "<script> 
        alert('Upload gambar yang berformat benar!');
        </script>
        ";
        return false;
    }

    // cek ukuran
    if ($sizeFile > 3000000) {
        echo "<script> 
        alert('Gambarnya kebesaran!');
        </script>
        ";
        return false;
    }

    // jika lolos seleksi, gambar akan diupload
    // generate nama gambar baru agar tidak sama dengan nama gambar yang lain/sudah ada
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensionPic;


    move_uploaded_file($tmpName, 'img/kue/' . $namaFileBaru);

    return $namaFileBaru;


}

function hapuspesanan($id){
    global $conn;
    $namaFile = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pesanan WHERE id_pesanan='$id'"));
    unlink('img/bukti/' . $namaFile["gambar"]);
    $hapus = "DELETE FROM pesanan WHERE id_pesanan='$id'";
    mysqli_query($conn, $hapus);
    return mysqli_affected_rows($conn);
}

function ubahpesanan($data) {
    global $conn;
    $id = $data["id_pesanan"];

    // ambil data dari tiap elemen dalam form
    $status = $data["status_pesanan"];
    
    // query update data
    $query = "UPDATE pesanan SET
        status_pesanan = '$status'
        WHERE id_pesanan = $id
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function caripesanan($keyword) {
    $query = "SELECT * FROM pesanan 
            WHERE
            name_customer LIKE '%$keyword%'
            ";
        return query($query);
}


// function hapusreview($id) {
//     global $conn;
//     mysqli_query($conn, "DELETE FROM review WHERE id_review = $id");
//     return mysqli_affected_rows($conn);
// }

// function carireview($keyword) {
//     $query = "SELECT * FROM review 
//             WHERE
//             name_customer LIKE '%$keyword%' OR
//             ";
//         return query($query);
// }


// function ubahprofil($data) {
//     global $conn;
//     $id = $data["id_customer"];
//     // ambil data dari tiap elemen dalam form
//     $name = htmlspecialchars($data["name_customer"]);
//     $address = htmlspecialchars($data["address_customer"]);
//     $phone = htmlspecialchars($data["phone_customer"]);


//     // query update data
//     $query = "UPDATE customer SET
//         name_customer = '$name',
//         address_customer = '$address',
//         phone_customer = '$phone'
//         WHERE id_customer = $id
//     ";
//     mysqli_query($conn, $query);
//     return mysqli_affected_rows($conn);
// }

function tambah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $name = htmlspecialchars($data["name_customer"]);
    $username = htmlspecialchars($data["username_customer"]);
    $pass = htmlspecialchars($data["pass_customer"]);
    $email = htmlspecialchars($data["email_customer"]);
    $address = htmlspecialchars($data["address_customer"]);
    $phone = htmlspecialchars($data["phone_customer"]);


    // query insert data
    $query = "INSERT INTO customer 
    VALUES
    ('', '$name', '$username', '$pass', '$email', '$address', '$phone')
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    $id = $data["id_customer"];
    // ambil data dari tiap elemen dalam form
    $name = stripslashes($data["name_customer"]);
    $username = strtolower(stripslashes($data["username_customer"]));
    $pass = mysqli_real_escape_string($conn, $data["pass_customer"]);
    $email = ($data["email_customer"]);
    $address = ($data["address_customer"]);
    $phone = ($data["phone_customer"]);

    // enkripsi password
    $password = password_hash($pass, PASSWORD_DEFAULT);

        // query update data
        $query = "UPDATE customer SET
            name_customer = '$name',
            username_customer = '$username',
            pass_customer = '$password',
            email_customer = '$email',
            address_customer = '$address',
            phone_customer = '$phone'
            WHERE id_customer = $id
        ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM customer WHERE id_customer = $id");
    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM customer 
            WHERE
            name_customer LIKE '%$keyword%' OR
            username_customer LIKE '%$keyword%' OR
            email_customer LIKE '%$keyword%' OR
            address_customer LIKE '%$keyword%' OR
            phone_customer LIKE '%$keyword%' 
            ";
        return query($query);
}

function registadmin($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $nameadmin = stripslashes($data["nama_admin"]);
    $usernameadmin = strtolower(stripslashes($data["username_admin"]));
    $passadmin = mysqli_real_escape_string($conn, $data["pass_admin"]);

    // enkripsi password
    $passad = password_hash($passadmin, PASSWORD_DEFAULT);


    // tambahkan admin ke db
    mysqli_query($conn, "INSERT INTO administrator 
            VALUES('$nameadmin', '$usernameadmin', '$passad')");
    return mysqli_affected_rows($conn);
}


function registration($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $name = stripslashes($data["name_customer"]);
    $username = strtolower(stripslashes($data["username_customer"]));
    $pass = mysqli_real_escape_string($conn, $data["pass_customer"]);
    $email = ( $data["email_customer"]);
    $address = ($data["address_customer"]);
    $phone = ($data["phone_customer"]);

    // cek beberapa data telah dipakai atau belum
    $result = mysqli_query($conn, "SELECT username_customer, email_customer  FROM customer WHERE
                username_customer = '$username' OR email_customer = '$email'");

    if(mysqli_fetch_assoc($result)) {
        echo " <script> alert('Username/email telah digunakan!');
        </script>
        ";
        return false;
    }
    // enkripsi password
    $password = password_hash($pass, PASSWORD_DEFAULT);


    // tambahkan user baru ke db
    mysqli_query($conn, "INSERT INTO customer 
            VALUES('', '$name', '$username', '$password', '$email', 
            '$address', '$phone')");
    return mysqli_affected_rows($conn);
}

// CUSTOMER

// function customerPay($data) {
//     global $conn;
//     // ambil data dari tiap elemen dalam form
//     $idcustomer = htmlspecialchars($data['id_customer']);
//     $name = htmlspecialchars($data["nama_customer"]);
//     $email = htmlspecialchars($data["email_customer"]);
//     $namaKue = htmlspecialchars($data["nama_kue"]);
//     $hargaKue = htmlspecialchars($data["harga_kue"]);
//     $totalKue = htmlspecialchars($data["total_pesanan"]);
//     $totalBayar = htmlspecialchars($data["total_harga"]);
//     $tanggalPesan = htmlspecialchars($data["tanggal_pesanan"]);
//     $buktiBayar = htmlspecialchars($data["bukti_pembayaran"]);
//     $status = htmlspecialchars($data["status_pesanan"]);
//     // upload gambar
//     $gambar = uploadbukti();
//     if (!$gambar) {
//         return false;
//     }

//     // query insert data
//     $query = "INSERT INTO pesanan
//     VALUES
//     ('', '$idcustomer', '$name', '$email', '$namaKue', '$hargaKue',  $totalKue', '$totalBayar', '$tanggalPesan', '$buktiBayar', '$status')
//     ";
//     mysqli_query($conn, $query);
//     return mysqli_affected_rows($conn);
// }


function uploadbukti() {
    $namaFile = $_FILES['bukti_pembayaran']['name'];
    $sizeFile = $_FILES['bukti_pembayaran']['size'];
    $error = $_FILES['bukti_pembayaran']['error'];
    $tmpName = $_FILES['bukti_pembayaran']['tmp_name'];


    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script> 
        alert('Pilih gambarnya dulu!');
        </script>
        ";
        return false;
    }

    // cek yang diupload adalah gambar
    $extentionPicValid = ['jpg', 'jpeg', 'png'];
    $extensionPic = explode('.', $namaFile);
    $extensionPic = strtolower(end($extensionPic) );
    if (!in_array($extensionPic, $extentionPicValid) ) {
        echo "<script> 
        alert('Upload gambar yang berformat benar!');
        </script>
        ";
        return false;
    }

    // cek ukuran
    if ($sizeFile > 3000000) {
        echo "<script> 
        alert('Gambarnya kebesaran!');
        </script>
        ";
        return false;
    }

    // jika lolos seleksi, gambar akan diupload
    // generate nama gambar baru agar tidak sama dengan nama gambar yang lain/sudah ada
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensionPic;


    move_uploaded_file($tmpName, 'img/bukti/' . $namaFileBaru);

    return $namaFileBaru;


}


// Fungsi untuk mengupdate total harga dan total produk

function keranjang($namakue, $gambarkue, $hargakue) {
    // Membuat elemen div untuk item keranjang
    $cartItem = '<div class="cart-item">';

    // Menambahkan tombol remove ke elemen cart-item
    $cartItem .= '<span class="fas fa-times" onclick="removeFromCart()"></span>';

    // Menambahkan gambar produk ke elemen cart-item
    $cartItem .= '<img src=img/kue/"' . $gambarkue . '" alt="' . $namakue. '">';

    // Membuat elemen div untuk konten produk
    $cartItem .= '<div class="content">';

    // Menambahkan nama produk ke elemen content
    $cartItem .= '<h3>' . $namakue . '</h3>';

    // Menambahkan harga produk ke elemen content
    $cartItem .= '<div class="price">' . $hargakue . '</div>';

    // Menutup elemen content
    $cartItem .= '</div>';

    // Menutup elemen cart-item
    $cartItem .= '</div>';

    // Menampilkan elemen cart-item di dalam kontainer keranjang
    echo $cartItem;

    // Memanggil fungsi untuk memperbarui total harga
    updateTotalPrice(floatval($hargakue));
}





function updateTotalPrice() {
    $totalProductsElement = $_POST["total_pesanan"];
    $totalPriceElement = $_POST["total_harga"];

    $cartItems = $_POST["cart-items"];
    $totalProducts = 0;
    $totalPrice = 0;

    foreach ($cartItems as $cartItem) {
        $price = floatval(preg_replace("/[^\d.]/", "", $cartItem["price"]));
        $totalProducts++;
        $totalPrice += $price;
    }

    // Mengupdate nilai total produk dan total harga
    $totalProductsElement = $totalProducts;
    $totalPriceElement = $totalPrice;

    // Mengembalikan nilai total produk dan total harga yang sudah diupdate
    return [
        "total_pesanan" => $totalProducts,
        "total_harga" => $totalPrice
    ];
}

function nambahkue($idkue) {
    global $conn;
    echo " <script> alert('Stok barang tidak mencukupi!');
    </script>
    ";
    $_SESSION['total_pesanan'] += 1;
    $query = "SELECT harga_kue FROM menu WHERE id_kue = $idkue";
    $result = mysqli_query($conn, $query);
    $idkue = mysqli_fetch_assoc($result);
    $_SESSION['total_harga'] += $idkue['harga_kue'];
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function pesankue($idkue, $totalkue){
    global $conn;
    $query = "SELECT nama_kue harga_kue, stok_kue FROM menu WHERE id_kue = $idkue";
    $result = mysqli_query($conn, $query);
    $idkue = mysqli_fetch_assoc($result);

    // Cek stok kue kosong atau tidak
    if ($totalkue > $idkue['stok_kue']) {
        echo " <script> alert('Stok barang tidak mencukupi!');
        </script>
        ";
        return false;
    }
    // Menghitung total harga
    $subtotal = 0;

    $totalHarga = $idkue['harga_kue'] * $totalkue;

    if (customerbayar()) {
    // Mengurangi jumlah barang dari database
    $sisaKue = $idkue['stok_kue'] - $totalkue;
    $query = "UPDATE menu SET stok_kue = $sisaKue WHERE id_kue = $idkue";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
    }
}


// function customerbayar() {

// }

// ?>
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


function tambah($data) {
    global $conn;
    // ambil data dari tiap elemen dalam form
    $name = htmlspecialchars($data["name_customer"]);
    $username = htmlspecialchars($data["username_customer"]);
    $pass = htmlspecialchars($data["pass_customer"]);
    $email = htmlspecialchars( $data["email_customer"]);
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


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM customer WHERE id = $id");
    return mysqli_affected_rows($conn);
}

?>
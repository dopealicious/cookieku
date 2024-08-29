<?php
session_start();
include('functions.php');

if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}

$idcustomer = query("SELECT * FROM customer");

// Cek submit udah ditekan apa belum
// if (isset($_POST["simpan"])) {

//   // cek apakah data berhasil ditambahkan atau tidak
//   if (ubahprofil($_POST) > 0) {
//       echo " <script> alert('Data customer berhasil diubah!');
//       document.location.href = 'customer-index.php'
//       </script>
//       ";
//   } else {
//       echo "<script> 
//       alert('Data customer gagal diubah!');
//       document.location.href = 'customer-index.php'
//       </script>
//       ";
//   }
// }

?>


<!DOCTYPE html>
<html>

<head>
  <title>Form Order Cookies</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/3477ae541c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link href="https://fonts.googleapis.com/css?family=Alex Brush" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Alegreya Sans SC" rel="stylesheet" />
</head>

<body>
  <div class="order">
    <h1><span>Form Order Cookies</span></h1>
    <div id="orderProfile" class="orderProfile">
      <p><strong>Nama:</strong> <span id="name_customer"> <?php echo $_SESSION["username_customer"]; ?> </span></p>
       <span id="id_customer" style="display: none;"><?php echo $_SESSION["id_customer"]; ?></span>
      <p><strong>Alamat:</strong> <span id="address_customer"> <?php echo $_SESSION["address_customer"]; ?> </span></p>
      <p>
        <strong>No. Telepon:</strong> <span id="phone_customer"> <?php echo $_SESSION["phone_customer"]; ?> </span>
      </p>
    </div>

    <div id="orderForm">
      <div>
        <label for="catatan">Catatan:</label>
        <input class="btn" type="text" id="catatan" min="1" required />
      </div>
      <div>
        <label for="paymentMethod">Metode Pembayaran:</label>
        <select class="btn" id="paymentMethod" onchange="togglePaymentFields()" required2>
          <option value="">Pilih Metode Pembayaran</option>
          <option>COD</option>
          <option value="BankTransfer">Transfer Bank</option>
          <option value="Ewallet">Dompet Elektronik</option>
        </select>
      </div>
      <div id="bankTransferFields" class="paymentFields">
        <label for="bankName">Nama Bank:</label>
        <input type="text" id="bankName" value="BCA" readonly />
        <label for="accountNumber">Nomor Rekening:</label>
        <input type="text" id="accountNumber" value="011087712887121" readonly />
      </div>
      <div id="ewalletFields" class="paymentFields">
        <label for="ewalletName">Nama E-wallet:</label>
        <input type="text" id="ewalletName" value="Dana" readonly />
        <label for="ewalletId">ID E-wallet:</label>
        <input type="text" id="ewalletId" value="087701887121" readonly />
      </div>
      <div class="form-group">
        <label for="ProofOfPayment">Proof of Payment:</label>
        <input class="btn" type="file" id="ProofOfPayment" name="ProofOfPayment" required />
        <small>Accepted formats: JPG, JPEG, PNG</small>
        <img id="bukti_pembayaran" src="#" alt="Preview" style="display: none" />
      </div>
      <h3>Payment Details:</h3>
      <div id="cart-summary">
          <table id="payment" style="display: none;">
          </table>
          <div class="summary-row">
            <p>Total Items:</p>
            <p id="total-items">0</p>
          </div>
          <div class="summary-row">
            <p>Total Price:</p>
            <p id="total-price">Rp. 0</p>
          </div>
        </div> 
        <button class="btn" id="order">
          Order
        </button>
      </div>
    </div>
  </div>
  <script src="ordering.js"></script>
  <script src="cart.js"></script>
</body>

</html>
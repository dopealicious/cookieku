<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookieku";

$user= $_POST['user'];
$pass = $_POST['pass'];
$email = $_POST['email'];
echo "<b> Akun Login:</b> <br>";
echo $user. "<br>";
echo $email. "<br>";
echo $password. "<br>";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


// Insert the data into the database
$sql = "INSERT INTO customer_acc (id, user, pass, email) VALUES ('$user', '$pass', '$email')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

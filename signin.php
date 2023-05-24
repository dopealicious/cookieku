<?php
if (isset($_GET['Input'])) {
$email = $_GET['email'];
$password = $_GET['password'];
echo "<b>Akun Login:</b> <br>";
echo $email. "<br>";
echo $password. "<br>";
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookieku";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO account (email, password) 
VALUES ('novi@mail.com, 'novi')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>



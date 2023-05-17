<?php
// Retrieve the form data
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookieku";

$user= $_POST['name'];
$pass = $_POST['pass'];
$email = $_POST['email'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Insert the data into the database
$sql = "INSERT INTO account (user, pass, email) VALUES ('$name', '$pass', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>

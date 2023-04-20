<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$bank_name = $_POST["bank_name"];
$account_number = $_POST["account_number"];
$account_name = $_POST["account_name"];

// Insert data into the database
$sql = "INSERT INTO bank_details (bank_name, account_number, account_name) VALUES ('$bank_name', '$account_number', '$account_name')";

if (mysqli_query($conn, $sql)) {
  echo "Bank details submitted successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

<?php
include 'koneksi.php';

// Ambil data dari form
$date = $_POST['date'];
$description = $_POST['description'];
$category = $_POST['category'];
$amount = $_POST['amount'];
$type = $_POST['type'];

// Insert data ke tabel transactions
$sql = "INSERT INTO transactions (date, description, category, amount, type) VALUES ('$date', '$description', '$category', '$amount', '$type')";

if ($conn->query($sql) === TRUE) {
    echo "Transaction added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Redirect kembali ke halaman utama
header("Location: index.html");
exit();
?>



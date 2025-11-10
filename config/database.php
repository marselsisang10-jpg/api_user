<?php
$host = "localhost";
$db_name = "db_kuliah";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Koneksi gagal: " . $e->getMessage();
    exit;
}
?>

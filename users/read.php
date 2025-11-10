<?php
header("Content-Type: application/json");
include_once "../config/database.php";

$query = "SELECT * FROM users";
$stmt = $conn->prepare($query);
$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "success" => true,
    "data" => $users
]);
?>

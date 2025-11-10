<?php
header("Content-Type: application/json");
error_reporting(0); // menonaktifkan notice
include_once "../config/database.php";

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->username) && !empty($data->email) && !empty($data->password)){
    $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $conn->prepare($query);

    $password = password_hash($data->password, PASSWORD_DEFAULT);

    $stmt->bindParam(":username", $data->username);
    $stmt->bindParam(":email", $data->email);
    $stmt->bindParam(":password", $password);

    if($stmt->execute()){
        echo json_encode(["success" => true, "message" => "User berhasil ditambahkan"]);
    } else {
        echo json_encode(["success" => false, "message" => "Gagal menambahkan user"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Data tidak lengkap"]);
}
?>

<?php
header("Content-Type: application/json");
include_once "../config/database.php";

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->id)){
    $query = "UPDATE users SET username = :username, email = :email WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":username", $data->username);
    $stmt->bindParam(":email", $data->email);
    $stmt->bindParam(":id", $data->id);

    if($stmt->execute()){
        echo json_encode(["success" => true, "message" => "User berhasil diupdate"]);
    } else {
        echo json_encode(["success" => false, "message" => "Gagal update user"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "ID tidak ditemukan"]);
}
?>

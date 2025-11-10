<?php
header("Content-Type: application/json");
include_once "../config/database.php";

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->id)){
    $query = "DELETE FROM users WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $data->id);

    if($stmt->execute()){
        echo json_encode(["success" => true, "message" => "User berhasil dihapus"]);
    } else {
        echo json_encode(["success" => false, "message" => "Gagal hapus user"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "ID tidak ditemukan"]);
}
?>

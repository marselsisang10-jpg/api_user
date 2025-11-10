<?php
// Set header JSON
header("Content-Type: application/json; charset=UTF-8");

// Cek endpoint dan method
$endpoint = $_GET['endpoint'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];

// Routing sederhana
switch ($endpoint) {
    case 'users':
        include_once "config/database.php";

        // Tentukan action berdasarkan method
        switch ($method) {
            case 'GET':
                include_once "users/read.php";
                break;
            case 'POST':
                include_once "users/create.php";
                break;
            case 'PUT':
                include_once "users/update.php";
                break;
            case 'DELETE':
                include_once "users/delete.php";
                break;
            default:
                echo json_encode(["success" => false, "message" => "Metode HTTP tidak didukung"]);
                break;
        }
        break;

    default:
        echo json_encode(["success" => false, "message" => "Endpoint tidak ditemukan"]);
        break;
}
?>

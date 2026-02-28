<?php
header("Content-Type: application/json");

include_once '../config/Database.php';
include_once '../models/Menu.php';

$database = new Database();
$db = $database->getConnection();
$menu = new Menu($db);

$data = json_decode(file_get_contents("php://input"));
$menu->id = $data->id;

if ($menu->delete()) {
    echo json_encode(["message" => "Menu berhasil dihapus"]);
} else {
    echo json_encode(["message" => "Gagal menghapus menu"]);
}
?>
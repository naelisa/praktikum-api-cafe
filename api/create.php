/*
NAMA : Serli Nadia A.
NPM : 247006111080
*/

<?php
header("Content-Type: application/json");

include_once '../config/Database.php';
include_once '../models/Menu.php';

$database = new Database();
$db = $database->getConnection();
$menu = new Menu($db);

$data = json_decode(file_get_contents("php://input"));

$menu->nama_menu = $data->nama_menu;
$menu->kategori = $data->kategori;
$menu->harga = $data->harga;
$menu->stok = $data->stok;

if ($menu->create()) {
    echo json_encode(["message" => "Menu berhasil ditambahkan"]);
} else {
    echo json_encode(["message" => "Gagal menambahkan menu"]);
}
?>
<?php
/*
NAMA : Serli Nadia A.
NPM : 247006111080
*/
header("Content-Type: application/json");

include_once '../config/Database.php';
include_once '../models/Menu.php';

$database = new Database();
$db = $database->getConnection();
$menu = new Menu($db);

$stmt = $menu->read();
$data = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

http_response_code(200);

echo json_encode([
    "developer" => "Serli Nadia A.",
    "npm" => "247006111080",
    "data" => $data
], JSON_PRETTY_PRINT);
?>
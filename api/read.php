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

$stmt = $menu->read();
$data = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

echo json_encode($data, JSON_PRETTY_PRINT);
?>
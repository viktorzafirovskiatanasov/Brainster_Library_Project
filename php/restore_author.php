<?php


include_once './autoload.php';
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    Authors::editStatus(false , $id);
    echo json_encode(['status' => 'success']);
}
<?php

include_once './autoload.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    Users::unsetSession();
    echo json_encode(['status' => 'success']);
}
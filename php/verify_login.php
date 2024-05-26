<?php

include_once './autoload.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $role = Users::getUserRole();
    $login = Users::getSessionLogin();

    echo json_encode(['status' => 'success', 'role' => $role , 'login' => $login]); 

}

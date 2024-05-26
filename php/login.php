<?php
 include_once './autoload.php';
 header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = Users::getLogIn($username);
    if (empty($role)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid username or password']);
    } else if (!password_verify($password, $role[0]['password'])) {
        echo json_encode(['status' => 'error', 'message' => 'Incorrect password']);
    } else {
        Users::setSessionLogin($username);
        Users::setUserRole($role[0]['role']);
        echo json_encode(['status' => 'success', 'role' => $role[0]['role']]);
    }
}


?>
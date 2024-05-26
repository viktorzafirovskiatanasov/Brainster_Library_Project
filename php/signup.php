<?php
  include_once("./autoload.php");

  header('Content-Type: application/json');
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $role = 'user';
    
    
    
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $responseData = ['status' => 'error', 'message' => 'Invalid email'];
      echo json_encode($responseData);
      die();
    }
    
      $dbEmails = Users::getEmail($email);
      if(!empty($dbEmails)){
        
        $responseData = ['status' => 'error', 'message' => 'Email is already in use'];
        echo json_encode($responseData);
        die();
      }
       $dbUsername = Users::getUsername($username);
      if(!empty($dbUsername)){
        $responseData = ['status' => 'error', 'message' => 'Username is already in use'];
        echo json_encode($responseData);
        die();
      }
    
      $password = password_hash($password, PASSWORD_DEFAULT);
      Users::addUser($email,$username, $password ,$role );
      Users::setSessionLogin($username);
      Users::setUserRole($role[0]['role']);
      $responseData = ['status'=> 'success','message'=> 'YEY' , 'role' => $role , 'username' => $username];
      echo json_encode($responseData);



  };

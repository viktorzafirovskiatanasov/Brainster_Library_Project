<?php


include_once './autoload.php';

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $isLoggedIn = Users::getSessionLogin();
   if($isLoggedIn){
      $userId = Users::getUserID();
      $note = $_POST['note'];
      $bookId = $_POST['bookId'];
      Note::addNote($userId , $note , $bookId);
      echo json_encode(['status' => 'success']);
   }
   else{
      echo json_encode(['status'=> 'error']);
   }
  

  
}
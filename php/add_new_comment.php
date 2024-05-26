<?php


include_once './autoload.php';

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $isLoggedIn = Users::getSessionLogin();
   if($isLoggedIn){
    $userId = Users::getUserID();
       
        $bookId = $_POST['bookId'];
     $commentExists = Comment::doesExist($userId ,$bookId );      
     if(!empty($commentExists)){
        echo json_encode(['status'=> 'error' , 'message' => 'YOU CANT ADD MORE THEN 1 COMMECT ON A SINGLE BOOK PLEASE DELETE THE OLD COMMENT TO ADD A NEW ONE']);
     }
     else{ 
        $comment = $_POST['comment'];
        Comment::addComment($userId , $comment , $bookId);
        echo json_encode(['status' => 'success']);
     }
   }
   else {
      echo json_encode(['status'=> 'error' , 'message' => 'YOU HAVE TO BE LOGGED IN TO ADD A COMMENT']);   
   }
  

  
}
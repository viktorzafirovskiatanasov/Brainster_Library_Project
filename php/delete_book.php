<?php
  include_once './autoload.php';
  header('Content-Type: application/json');
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $book_id  = $_POST['bookid'];
  $isDeletedComment =   Comment::deleteCommentByBookId($book_id);
  $isDeletedNote =  Note::deleteNoteByBookId($book_id);
  $isDeletedBook =   Book::deleteBook($book_id);
  
  if( $isDeletedBook && $isDeletedComment && $isDeletedBook ) {
    echo json_encode(['status'=> 'success']);
  }
}
<?php


include_once './autoload.php';
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $comment_id = $_POST['comment_id'];
   Comment::deleteCommentById($comment_id);
   echo json_encode(['status' => 'success']);
}   
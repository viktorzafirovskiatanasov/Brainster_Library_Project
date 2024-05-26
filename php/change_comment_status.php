<?php
 
 include_once './autoload.php';
 header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $newStatus = $_POST['newStatus'];
    $comment_id = $_POST['comment_id'];
    Comment::updateCommentStatus($newStatus, $comment_id);
    echo json_encode(['status' => 'success', 'message' => 'New status succesfully added']);
}   
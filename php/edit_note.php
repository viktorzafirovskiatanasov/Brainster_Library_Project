<?php


include_once './autoload.php';
$note_id = 2;
$note = 'prv note';
Note::updateNote($note_id , $note);
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $note_id = $_POST['note_id'];
   $note = $_POST['note'];
   Note::updateNote($note_id , $note);
   echo json_encode(['status' => 'success']);
}   
<?php


include_once './autoload.php';
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $note_id = $_POST['note_id'];
   Note::deleteNoteById($note_id);
   echo json_encode(['status' => 'success']);
}     
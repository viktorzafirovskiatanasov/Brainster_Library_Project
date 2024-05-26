<?php
  include_once './autoload.php';
  header('Content-Type: application/json');
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $id = $_POST['id'];
    $newStatus = true;
    Authors::editStatus($newStatus,$id);
    
 }
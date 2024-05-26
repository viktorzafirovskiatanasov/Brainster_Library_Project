<?php


include_once './autoload.php';

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $userId = Users::getUserID();
   $bookId = $_POST['bookId'];
  $notes =  Note::getNotes($userId , $bookId);
  $html = '';
  
  foreach ($notes as $note) {
    $html .= '<div class="rounded">';
    $html .= '<div class="w-full h-64 flex flex-col overflow-auto justify-between dark:bg-gray-800 bg-white dark:border-gray-700 rounded-lg border border-gray-400 mb-6 py-5 px-4">';
    $html .= '<div>';
    $html .= '<p class="text-gray-800 note dark:text-gray-100 text-sm" contenteditable="false" >' . $note['note'] . '</p>';
    $html .= '</div>';
    $html .= '<div>';
    $html .= '<div class="flex edit items-center justify-between text-gray-800 dark:text-gray-100">';
    $html .= '<button class="w-8 h-8 bg-yellow-300 rounded-full text-white flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black edit" aria-label="edit note" data-edit-note-id="'.$note['id'].'" role="button">';
    $html .= '<i class="bi bi-pencil"></i>';
    $html .= '</button>';
    $html .= '<button class="w-8 submit hidden bg-emerald-400 h-8 rounded-full text-white flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="submit note" data-submit-note-id="'.$note['id'].'" role="button">';
    $html .= '<i class="bi bi-check-lg"></i>';
    $html .= '</button>';
    $html .= '<button class="w-8 cancel hidden bg-red-500 h-8 rounded-full text-white flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="submit note"  role="button">';
    $html .= '<i class="bi bi-x-lg"></i>';
    $html .= '</button>';
    $html .= '<button class="w-8 h-8 delete rounded-full bg-red-500 text-white flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="delete note" data-delete-note-id="'.$note['id'].'" role="button">';
    $html .= '<i class="bi bi-trash"></i>';
    $html .= '</button>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
 }
  echo json_encode(['status' => 'success', 'data' => $html]);

}
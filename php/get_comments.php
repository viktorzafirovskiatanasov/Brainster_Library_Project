<?php


include_once './autoload.php';

header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = Users::getUserID();
    $bookId = $_POST['bookId'];
    $comment = Comment::getCurrentUserComment($userId, $bookId);
    if(empty($comment)){$currentUser = '';}else{
        $html = '';
        $html .= '<div class="border shadow-2xl rounded-md p-3 ml-3 my-4">';
        $html .= '<div class="flex justify-between items-center">';
        $html .= '<h3 class="font-bold">' . $comment[0]['username'] . '</h3>';
        
        $html .= '<div class="flex">';
        $html .= '<button';
        $html .= ' disabled';
        $html .= ' class="py-2 px-5 mr-5 rounded-full text-sm text-white';
        
        // Conditionally set background color based on $comment['approval_status']
        if ($comment[0]['approval_status'] == 'PENDING') {
            $html .= ' bg-yellow-300';
        } elseif ($comment[0]['approval_status'] == 'DENIED') {
            $html .= ' bg-red-300';
        } else {
            $html .= ' bg-emerald-400';
        }
        
        $html .= '">';
        if ($comment[0]['approval_status'] == 'PENDING') {
            $html .= 'PENDING APPROVAL';
        } elseif ($comment[0]['approval_status'] == 'DENIED') {
            $html .= 'DENIED';
        } else {
            $html .= 'APPROVED';
        };
        $html .= '</button>';
        
        $html .= '<button class="w-8 h-8 delete-comment rounded-full bg-red-500 text-white flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black" data-comment-id="' . $comment[0]['id'] . '" role="button">';
        $html .= '<i class="bi bi-trash"></i>';
        $html .= '</button>';
        $html .= '</div>';
        
        $html .= '</div>';
        $html .= '<p class="text-gray-600 mt-2">' . $comment[0]['content'] . '</p>';
        $html .= '</div>';
        
        $currentUser = $html;}
    $html = '';
    $allComments = Comment::getAllComments($bookId);
    foreach ($allComments as $comment) {
       if($comment['approval_status'] == 'APPROVED'){
        $html .= '<div class="border shadow-2xl rounded-md p-3 ml-3 my-4">';
        $html .= '<div class="flex gap-3 items-center">';
        $html .= '<h3 class="font-bold">' . $comment['username'] . '</h3>';
        $html .= '</div>';
        $html .= '<p class="text-gray-600 mt-2">' . $comment['content'] . '</p>';
        $html .= '</div>';
       }
    }
    $allComments = $html;
    echo json_encode(['status' => 'success', 'allUsers' => $allComments, 'currentUser' => $currentUser]);
}

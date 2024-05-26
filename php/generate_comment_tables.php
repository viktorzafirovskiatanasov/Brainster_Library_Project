<?php
   
   include_once './autoload.php';
   header('Content-Type: application/json');
   if ($_SERVER['REQUEST_METHOD'] === 'GET') {
       $data = Comment::getAllComments();
       $pending = ''; 
       $approved = ''; 
       $denied = '';    
       foreach ($data as $comment) {
        if ($comment['approval_status'] == 'PENDING') {
            $pending .= '<tr data-id="' . $comment['id'] . '">';
            $pending .= '<td style="border-right: 1px solid grey">' .  $comment['content'] . '</td>';
            $pending .= '<td><button class="approve_button rounded-full bg-emerald-400 py-2 px-5" style="margin: 10px 15px 10px 0; background-color:green">APPROVE</button>';
            $pending .= '<button class="deny_button rounded-full bg-red-500 py-2 px-5">DENY</button></td>';
            $pending .= '</tr>';
        } else if ($comment['approval_status'] == 'APPROVED') {
            $approved .= '<tr data-id="' . $comment['id'] . '">';
            $approved .= '<td style="border-right: 1px solid grey">' .  $comment['content'] . '</td>';
            $approved .= '<td><button class="deny_button rounded-full bg-red-500 py-2 px-5" style="margin: 10px 15px 10px 0; background-color:red">DENY</button>';
            $approved .= '</tr>';
        } else {
            $denied .= '<tr data-id="' . $comment['id'] . '">';
            $denied .= '<td style="border-right: 1px solid grey">' .  $comment['content'] . '</td>';
            $denied .= '<td><button class="approve_button rounded-full bg-emerald-400 py-2 px-5" style="margin: 10px 15px 10px 0; background-color:green">APPROVE</button>';
            $denied .= '</tr>';
        }
    }
    
       
       echo json_encode(['status' => 'success', 'pending' => $pending , 'approved' => $approved , 'denied' => $denied ]);
   }

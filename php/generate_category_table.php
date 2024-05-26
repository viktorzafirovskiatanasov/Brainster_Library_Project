<?php
   
   include_once './autoload.php';
   header('Content-Type: application/json');
   
   if ($_SERVER['REQUEST_METHOD'] === 'GET') {
       $data = Category::getAllCategories();
       $html = ''; 
   
       foreach ($data as $category) {
           if ($category['is_deleted'] != 'true') {
               $html.= '<tr style="border-bottom : 2px solid black" data-id="' . $category['id'] . '" data-title="' . $category['title'] . '">';
               $html .= '<td  style = "border-right: 2px solid black">' . $category['title'] . '</td>';
               $html .= '<td><button data-id=' . $category['id'] . ' class="edit-button rounded-full bg-yellow-400 py-2 px-5" style = "margin: 10px 15px 10px 0; background-color:yellow">Edit</button>';
               $html .= '<button data-id=' . $category['id'] . ' class="delete-button rounded-full bg-red-500 py-2  px-5 "> Delete</button></td>';
               $html .= "</tr>";
           }
       }
   
       
       echo json_encode(['status' => 'success', 'data' => $html]);
   }

<?php 

include_once './autoload.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $data = Authors::getAllAuthors();
    $html = ''; 

    foreach ($data as $author) {
        if ($author['is_deleted'] != 'true') {
            $html.= '<tr style="border-bottom : 2px solid black"  data-id="' . $author['id'] . '" data-author-name="' . $author['name'] . '" data-author-surrname="' . $author['surrname'] . '" data-author-bio="' . $author['biography'] . '">';
            $html .= '<td  style="border-right: 1px solid black">' . $author['name'] . '</td>';
            $html .= '<td  style="border-right: 1px solid black">' . $author['surrname'] . '</td>';
            $html .= '<td  style="border-right: 1px solid black">' . $author['biography'] . '</td>';
            $html .= '<td><button data-id=' . $author['id'] . ' class="edit-button rounded-full py-2 px-5" style="margin: 10px 15px 10px 0; background-color:yellow">Edit</button>';
            $html .= '<button data-id=' . $author['id'] . ' class="delete-button rounded-full bg-red-500 py-2 px-5"> Delete</button></td>';
            $html .= "</tr>";
            
            
        }
    }

    
    echo json_encode(['status' => 'success', 'data' => $html]);
}

?>
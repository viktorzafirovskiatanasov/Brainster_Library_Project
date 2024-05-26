<?php 

include_once './autoload.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $data = Authors::getAllAuthors();
    $html = ''; 

    foreach ($data as $author) {
        if ($author['is_deleted'] == 'true') {
            $html.= '<tr style="border-bottom : 2px solid black"  data-id="' . $author['id'] . '">';
            $html .= '<td  style="border-right: 1px solid black">' . $author['name'] . '</td>';
            $html .= '<td  style="border-right: 1px solid black">' . $author['surrname'] . '</td>';
            $html .= '<td  style="border-right: 1px solid black">' . $author['biography'] . '</td>';
            $html .= '<td><button data-id=' . $author['id'] . ' class="restore-button rounded-full bg-emerald-400 py-2 px-5" >Restore</button>';
            $html .= "</tr>"; 
        }
    }

    
    echo json_encode(['status' => 'success', 'data' => $html]);
}

?>
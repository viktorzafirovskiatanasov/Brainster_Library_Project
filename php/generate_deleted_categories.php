<?php 

include_once './autoload.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $data = Category::getAllCategories();
    $html = ''; 

    foreach ($data as $category) {
        if ($category['is_deleted'] == 'true') {
            $html.= '<tr style="border-bottom : 2px solid black" data-id="' . $category['id'] . '">';
            $html .= '<td  style = "border-right: 2px solid black">' . $category['title'] . '</td>';
            $html .= '<td><button data-id=' . $category['id'] . ' class="restore-button rounded-full bg-emerald-400 py-2 px-5">Restore</button>';
            $html .= "</tr>";
        }
    }

    
    echo json_encode(['status' => 'success', 'data' => $html]);
}

?>
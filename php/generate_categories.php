<?php
include_once './autoload.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $categories = Category::getAllCategories();
    $html = '';

    foreach ($categories as $category) {
        if ($category['is_deleted'] !== 'true') {
            $html .= '<option value="' .$category['title']. '">' .$category['title']. '</option>';
        }
    }

    echo json_encode(['status' => 'success', 'data' => $html]);
}
?>

<?php
include_once './autoload.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $authors = Authors::getAllAuthors();
    $html = '';

    foreach ($authors as $author) {
        if ($author['is_deleted'] !== 'true') {
            $html .= '<option value="' . $author['name'] .' '. $author['surrname'] . '">' . $author['name'] .' '. $author['surrname'] . '</option>';
        }
    }

    echo json_encode(['status' => 'success', 'data' => $html]);
}
?>

<?php

include_once './autoload.php';
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {


    $categories = Category::getAllCategories();
    $authors = Authors::getAllAuthors();
    
    $categoryCheckboxes = array();
    foreach ($categories as $category) {

        if ($category['is_deleted'] != 'true') {

            $categoryCheckboxes[] = '<label class="px-5 select_filer text-center py-2 my-2 bg-red-500 rounded-lg"  ><input type="checkbox" class="hidden checkbox-input" name="categories[]" value="' . $category['id'] . '">' . $category['title'] . '</label>';
        }
    }
    $authorCheckboxes = array();
    foreach ($authors as $author) {
        if ($author['is_deleted'] != 'true') {

            $authorCheckboxes[] = '<label class="px-5 select_filer text-center py-2 my-2 bg-red-500 rounded-lg" ><input type="checkbox" class="hidden checkbox-input"  name="authors[]" value="' . $author['id'] . '">' . $author['name'] . ' ' . $author['surrname'] . '</label>';
        }
    }

    $response['html'] = array(
        'categories' => implode('', $categoryCheckboxes),
        'authors' => implode('', $authorCheckboxes),
    );

    echo json_encode(['status' => 'success', 'data' => $response]);
}

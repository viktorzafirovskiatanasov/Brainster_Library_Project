<?php


include_once './autoload.php';
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $resievedData = $_POST['formData'];
    $deserializedData = array();
    parse_str($resievedData, $deserializedData);


    foreach ($deserializedData as $key => $value) {
        if ($value == '') {
            echo  json_encode(['status' => 'error', 'message' => 'Please fill in all fields']);
            exit;
        }
    }

    $title = $deserializedData['title'];
    $author = urldecode($deserializedData['author']);
    $year = $deserializedData['year'];
    $pages = $deserializedData['pages'];
    $picture_url = $deserializedData['picture'];
    $category = Category::exists($deserializedData['category']);
    $nameAndSurnameArray = explode(' ', $author);
    $name = $nameAndSurnameArray[0];
    $surrname = implode(' ', array_slice($nameAndSurnameArray, 1));
    $authors = Authors::exists($name, $surrname);
    $authorId = $authors[0]['id'];
    $categoryId = $category[0]['id'];
    $exist = Book::exists($title, $authorId, $categoryId, $year, $pages, $picture_url);
    if (empty($exist)) {
        $response = Book::addNew($title, $authorId, $categoryId, $year, $pages, $picture_url);

        echo  json_encode(['status' => 'success', 'message' => 'Book added succefully']);
    } else {
        echo  json_encode(['status' => 'error', 'message' => 'You are trying to enter an existing book']);
    }
}

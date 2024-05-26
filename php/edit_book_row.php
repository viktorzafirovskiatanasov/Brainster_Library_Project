<?php
  include_once './autoload.php';
  header('Content-Type: application/json');
  
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $resievedData = $_POST['formData'];
     $deserializedData = array();
     parse_str($resievedData, $deserializedData);
     $id = $_POST['id'];
     $parts = explode(' ', $deserializedData['author'], 2);
     $name = $parts[0];
     $surrname = $parts[1];
     $title = $deserializedData['title'];
     $pages = $deserializedData['pages'];
     $year = $deserializedData['year'];
     $img_url = $deserializedData['picture'];
     $category = $deserializedData['category'];
     $authorId = Authors::getAuthorId($name,$surrname)[0]['id'];
     $categoryId = Category::getCategoryId($category)[0]['id'];
     if(Book::exists($title, $authorId, $categoryId, $year, $pages, $img_url)){
      echo json_encode(['status' => 'error', 'message' => 'This book already exists']);
     }else{
     $result = Book::editRow($title , $authorId ,$categoryId,$year,$pages,$img_url ,$id);

     if($result){
        echo json_encode(['status' => 'success', 'message' => 'Book edited succesfully']);
     }
     else{
        echo json_encode(['status' => 'error', 'message' => 'something went wrong']);
     }
   }

 }
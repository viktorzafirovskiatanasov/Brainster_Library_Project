<?php
  include_once './autoload.php';
  header('Content-Type: application/json');
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $resievedData = $_POST['formData'];
     $deserializedData = array();
     parse_str($resievedData, $deserializedData);
     $id = $_POST['id'];
     $title = $deserializedData['add_category_name'];
     if(Category::exists($title)){
        $responseData = ['status' => 'error', 'message' => 'Category already exists'];
        echo json_encode($responseData);
     }else{
     $response = Category::editTitle($title , $id);
     
    if($response){
        $responseData = ['status' => 'success', 'message' => 'Category Title has been updated'];
        echo json_encode($responseData);
    }
    else {
        $responseData = ['status' => 'error', 'message' => 'Failed to update category title'];
        echo json_encode($responseData);
    }
}

 }
?>
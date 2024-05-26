<?php
 
 include_once './autoload.php';
 header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $resievedData = $_POST['formData'];
    $deserializedData = array();
    parse_str($resievedData, $deserializedData);

    $title = $deserializedData['add_category_name'];
    $doesExist = Category::exists($title);
    if ($doesExist) {
        $responseData = ['status' => 'error', 'message' => 'Category Already Exists'];
        echo json_encode($responseData);
    }
    else{
            Category::addNew($title);
            $responseData = ['status'=> 'success', 'message'=> 'Category Added Succesfully'];
            echo json_encode($responseData);
        
    }

}

?>
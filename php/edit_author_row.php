<?php


include_once './autoload.php';
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $resievedData = $_POST['formData'];
   $deserializedData = array();
   parse_str($resievedData, $deserializedData);
   $id = $_POST['id'];
   $authorName = $deserializedData['add_author_name'];
   $authorSurrname = $deserializedData['add_author_surrname'];
   $authorBio = $deserializedData['add_author_bio'];
   $responseExists = Authors::exists($authorName, $authorSurrname);
   
   if(!empty($responseExists)){
    $responseData = ['status' => 'error', 'message' => 'You entered the information of an existing author'];
      echo json_encode($responseData);
   }
   else{
   $response = Authors::editRow($authorName,$authorSurrname,$authorBio ,$id);
  
  if($response){
      $responseData = ['status' => 'success', 'message' => 'Author Information has been modified'];
      echo json_encode($responseData);
  }
 }
}
?>


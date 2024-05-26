<?php 

include_once './autoload.php';
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
   $resievedData = $_POST['formData'];
   $deserializedData = array();
   parse_str($resievedData, $deserializedData);
   
   $name = $deserializedData['add_author_name'];
   $surrname = $deserializedData['add_author_surrname'];
   $bio = $deserializedData['add_author_bio'];
   if ($name == ''|| $surrname == '' || $bio == '') {
    $responseData = ['status' => 'error', 'message' => 'Please Fill in all fields'];
    echo json_encode($responseData);
   }else if (strlen($bio) < 20){
    $responseData = ['status' => 'error', 'message' => 'The bio needs to be at least 20 characters'];
    echo json_encode($responseData);
   }
    else{
        $doesExist = Authors::exists($name , $surrname);
   if (!empty($doesExist)) {
       $responseData = ['status' => 'error', 'message' => 'Author Already Exists'];
       echo json_encode($responseData);
   }
   else{
         $success =  Authors::addNew($name , $surrname , $bio);
         if($success){
           $responseData = ['status'=> 'success', 'message'=> 'Author Added Succesfully'];
           echo json_encode($responseData);
         }
       
   }
}

}

?>
  


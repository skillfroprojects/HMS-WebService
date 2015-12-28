<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

if (isset($_POST['surgery_id'])) {

    // receiving the post params    
    $Surgery_Id = $_POST['surgery_id'];
     
    $user = $db->DeleteGeneralStore($Surgery_Id);
    if ($user) {
            // user stored successfully
        $response["response"] = 1;
        $response["message"] = "Data Deleted.";
        echo json_encode($response);
        } else {
            // user failed to store
            $response["response"] = 2;
            $response["message"] = "Unknown error occurred during Deletion!";
            echo json_encode($response);
        }   
} else {
    $response["response"] = 3;
    $response["message"] = "Required parameters missing!";
    echo json_encode($response);
}
?>


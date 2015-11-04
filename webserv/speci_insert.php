<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['sp_name'])) {

    // receiving the post params
    $Sp_Name = $_POST['sp_name'];
    
    // check if user already exists with the same email
    if ($db->isSpecializeExisted($Sp_Name)) {
        // user already exists
        $response["response"] = 0;
        $response["message"] = $Sp_Name. "already exists";
        echo json_encode($response);
    } else {
        
        $user = $db->insertSpecialization($Sp_Name);
        if ($user) {
            // user stored successfully
        $response["response"] = 1;
        $response["message"] = "Data Inserted.";
        echo json_encode($response);
        } else {
            // user failed to store
            
            $response["response"] = 2;
            $response["message"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
} else {
    $response["response"] = 3;
    $response["message"] = "Required parameters missing!";
    echo json_encode($response);
}
?>


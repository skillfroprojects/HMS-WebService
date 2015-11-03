<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['sp_name'])) {

    // receiving the post params
    $Sp_Name = $_POST['sp_name'];
    
    //$Hospital_ID = '1';
    // check if user is already existed with the same email
    if ($db->isSpecializeExisted($Sp_Name)) {
        // user already existed
        $response["exist"] = 1;
        $response["error_msg"] = "Data already existed with " . $Sp_Name;
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertSpecialization($Sp_Name);
        if ($user) {
            // user stored successfully
        $response["success"] = 2;
        $response["message"] = "Data Inserted.";
        echo json_encode($response);
        } else {
            // user failed to store
            
            $response["error"] = 3;
            $response["error_msg"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
} else {
    $response["missing"] = 4;
    $response["error_msg"] = "Required parameters is missing!";
    echo json_encode($response);
}
?>


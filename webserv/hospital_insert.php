<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['hs_id']) && isset($_POST['email'])) {

    // receiving the post params
    $Cust_Name = $_POST['name'];
    $Cust_Email = $_POST['email'];
    $Cust_Password = $_POST['password'];
    //$password = $_POST['password'];

    // check if user is already existed with the same email
    if ($db->isUserExisted($Cust_Email)) {
        // user already existed
        $response["exist"] = 1;
        $response["error_msg"] = "User already existed with " . $Cust_Email;
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->storeUser($Cust_Name, $Cust_Email, $Cust_Password);
        if ($user) {
            // user stored successfully
        $response["success"] = 2;
        $response["message"] = "Product successfully created.";
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


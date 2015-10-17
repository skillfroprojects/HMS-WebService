<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['branch_name']) && isset($_POST['branch_location'])) {

    // receiving the post params
    $Branch_Name = $_POST['branch_name'];
    $Branch_Location = $_POST['branch_location'];
    $Branch_Addr1 = $_POST['branch_addr1'];
    $Branch_Addr2 = $_POST['branch_addr1'];
    $Branch_Postal_Code = $_POST['branch_postal_code'];
    $Branch_Email = $_POST['branch_email'];
    $Branch_Phone = $_POST['branch_phone'];
    $Branch_Phone_Other= $_POST['branch_phone_other'];
    $Hospital_ID = '1';
    // check if user is already existed with the same email
    if ($db->isBranchExisted($Branch_Name)) {
        // user already existed
        $response["exist"] = 1;
        $response["error_msg"] = "Branch Data already existed with " . $Branch_Name;
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertBranch($Branch_Name,$Branch_Location,$Branch_Addr1,$Branch_Addr2,$Branch_Postal_Code,$Branch_Email,$Branch_Phone,$Branch_Phone_Other);
        if ($user) {
            // user stored successfully
        $response["success"] = 2;
        $response["message"] = "Branch Details Inserted.";
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


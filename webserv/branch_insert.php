<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['branch_name']) && isset($_POST['branch_email'])) {

    // receiving the post params
    $Branch_Name = $_POST['branch_name'];
    $Branch_Location = $_POST['branch_location'];
    $Branch_Addr1 = $_POST['branch_addr1'];
    $Branch_Addr2 = $_POST['branch_addr2'];
    $Branch_Postal_Code = $_POST['branch_postal_code'];
    $Branch_Email = $_POST['branch_email'];
    $Branch_Phone = $_POST['branch_phone'];
    $Branch_Phone_Other= $_POST['branch_phone_other'];
    $Hospital_ID = '1';
    // check if branch already exists 
    if ($db->isBranchExisted($Branch_Name)) {
        // branch already exists
        $response["response"] = 0;
        $response["message"] = $Branch_Name. "already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertBranch($Branch_Name, $Hospital_ID,$Branch_Location,$Branch_Addr1,$Branch_Addr2,$Branch_Postal_Code,$Branch_Email,$Branch_Phone,$Branch_Phone_Other);
        if ($user) {
            // branch stored successfully
        $response["response"] = 1;
        $response["message"] = "Branch Details Inserted.";
        echo json_encode($response);
        } else {
            // branch failed to store
            
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


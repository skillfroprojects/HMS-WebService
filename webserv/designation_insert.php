<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['dept_id']) && isset($_POST['designation_name'])) {

    // receiving the post params
    $Br_ID = $_POST['br_id'];
    $Dept_Id = $_POST['dept_id'];
    $Designation_Name = $_POST['designation_name'];
    
    // check if Designation already exists 
    if ($db->isDesignationExist($Designation_Name)) {
        // department already exists
        $response["response"] = 0;
        $response["message"] = $Designation_Name. " already exists";
        echo json_encode($response);
    }else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertDesignation($Br_ID,$Dept_Id,$Designation_Name);
        if ($user) {
            // Designation Details stored successfully
        $response["response"] = 1;
        $response["message"] = "Designation Details Inserted.";
        echo json_encode($response);
        } else {
            // Designation Details failed to store
            
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


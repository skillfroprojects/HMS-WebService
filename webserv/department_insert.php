<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['dept_name']) && isset($_POST['dept_email'])) {

    // receiving the post params
    $Br_ID = $_POST['br_id'];
    $Dept_Name = $_POST['dept_name'];
    $Dept_Email = $_POST['dept_email'];
    $Dept_Phone = $_POST['dept_phone'];
    
    // check if department already exists 
    if ($db->isDepartmentExisted($Dept_Name)) {
        // department already exists
        $response["response"] = 0;
        $response["message"] = $Dept_Name. "already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertDepartment($Br_ID, $Dept_Name,$Dept_Email,$Dept_Phone);
        if ($user) {
            // department stored successfully
        $response["response"] = 1;
        $response["message"] = "Department Details Inserted.";
        echo json_encode($response);
        } else {
            // department failed to store
            
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


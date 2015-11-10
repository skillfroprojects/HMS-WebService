<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['ward_type'])) {

    // receiving the post params
    $Br_id = $_POST['branch_id'];
    $Ward_Type = $_POST['ward_type'];
    
    
    // check if Ward already exists 
    if ($db->isWardTypeExisted($Ward_Type)) {
        // Ward already exists
        $response["response"] = 0;
        $response["message"] = $Ward_Type. " already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        //$user = $db->insertLaboratory($Br_ID, $Lab_Name);
        $user = $db->insertWardType($Br_id,$Ward_Type);

        if ($user) {
            // Ward stored successfully
        $response["response"] = 1;
        $response["message"] = "Ward Type Inserted.";
        echo json_encode($response);
        } else {
            // Ward failed to store
            
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


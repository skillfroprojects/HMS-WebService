<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['room_type'])) {

    // receiving the post params
    $Br_id = $_POST['branch_id'];
    $Room_No = $_POST['room_no'];
    $Room_Type = $_POST['room_type'];
    $Bed_No = $_POST['bed_no'];
    $Bed_Status = $_POST['bed_status'];    
    
    // check if Bed already exists 
    if ($db->isBedExisted($Bed_No)) {
        // Bed already exists
        $response["response"] = 0;
        $response["message"] = $Bed_No. " already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        //$user = $db->insertLaboratory($Br_ID, $Lab_Name);
        $user = $db->insertBedDetails($Br_id, $Room_No,$Room_Type,$Bed_No,$Bed_Status);

        if ($user) {
            // Bed stored successfully
        $response["response"] = 1;
        $response["message"] = "Bed Details Inserted.";
        echo json_encode($response);
        } else {
            // Bed failed to store
            
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


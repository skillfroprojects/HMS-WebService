<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['room_type'])) {

    // receiving the post params
    $Br_id = $_POST['branch_id'];
    $Room_Type = $_POST['room_type'];
    
    
    // check if Room already exists 
    if ($db->isRoomTypeExisted($Room_Type)) {
        // Room already exists
        $response["response"] = 0;
        $response["message"] = $Room_Type. " already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        //$user = $db->insertLaboratory($Br_ID, $Lab_Name);
        $user = $db->insertRoomType($Br_id,$Room_Type);

        if ($user) {
            // Room stored successfully
        $response["response"] = 1;
        $response["message"] = "Room Type Inserted.";
        echo json_encode($response);
        } else {
            // Room failed to store
            
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


<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['br_id']) && isset($_POST['ambulance_id'])) {

    // receiving the post params
    $Br_id = $_POST['br_id'];
    $Ambulance_Type = $_POST['ambulance_type'];
    $Ambulance_Id = $_POST['ambulance_id'];
    $Pat_Name = $_POST['pat_name'];
    $Address = $_POST['address'];
    $Date = $_POST['date']; 
    $Time = $_POST['time'];
    // check if patient already exists 
    if ($db->isAmbulanceSchedule($Ambulance_Id)) {
        // Bed already allocated
        $response["response"] = 0;
        $response["message"] = $Ambulance_Id. " already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertAmbulanceSchedule($Br_Id,$Ambulance_Type,$Ambulance_Id,$Pat_Name,$Address,$Date,$Time);
        
        if ($user) {
            // Bed allocated successfully
        $response["response"] = 1;
        $response["message"] = "Ambulance Scheduled.";
        echo json_encode($response);
        } else {
            // Bed allocation failed
            
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


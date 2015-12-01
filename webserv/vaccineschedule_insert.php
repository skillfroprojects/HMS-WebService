<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['vac_child_id']) && isset($_POST['vac_name']) && isset($_POST['vac_doc_id'])) {

    // receiving the post params
    $Br_Id = $_POST['br_id'];
    $Vac_Child_Id = $_POST['vac_child_id'];
    $Vac_Name = $_POST['vac_name'];
    $Vac_Doc_Id = $_POST['vac_doc_id'];
    $Vac_App_Date = $_POST['vac_app_date'];
    $Vac_App_Time = $_POST['vac_app_time'];
    $Vac_Ward_No = $_POST['vac_ward_no'];
        
    // check if appointment exists 
    if ($db->isVaccineSchedule($Vac_Child_Id,$Vac_App_Date,$Vac_App_Time)) {
        
        $response["response"] = 0;
        $response["message"] = " Appoinment already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertVaccineSchedule($Br_Id,$Vac_Child_Id,$Vac_Name,$Vac_Doc_Id,$Vac_App_Date,$Vac_App_Time,$Vac_Ward_No);
        // Vaccination Scheduled successfully
        if ($user) {
            
        $response["response"] = 1;
        $response["message"] = "Vaccination Scheduled.";
        echo json_encode($response);
        } else {
            // Vaccination Scheduling failed
            
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


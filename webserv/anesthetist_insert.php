<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['ana_pat_id']) && isset($_POST['ana_bed_no']) && isset($_POST['ana_available_anesthetist'])) {

    // receiving the post params
    $Br_Id = $_POST['br_id'];
    $Ana_Pat_Id = $_POST['ana_pat_id'];
    $Ana_Bed_No = $_POST['ana_bed_no'];
    $Ana_Date = $_POST['ana_date'];
    $Ana_Time = $_POST['ana_time'];
    $Ana_Available_Anesthetist = $_POST['ana_available_anesthetist']; 
        
    // check if anesthetist already exists 
    if ($db->isAnesthetistScheduled($Ana_Available_Anesthetist,$Ana_Date,$Ana_Time)) {
     
        $response["response"] = 0;
        $response["message"] = $Ana_Available_Anesthetist. " already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertAnesthetist($Br_Id,$Ana_Pat_Id,$Ana_Bed_No,$Ana_Date,$Ana_Time,$Ana_Available_Anesthetist);
        // Anesthetist Scheduled successfully
        if ($user) {
            
        $response["response"] = 1;
        $response["message"] = "Anesthetist Scheduled.";
        echo json_encode($response);
        } else {
            // Anesthetist Scheduling failed
            
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


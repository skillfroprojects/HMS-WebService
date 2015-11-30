<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['bed_no']) && isset($_POST['pat_id'])) {

    // receiving the post params
    $Br_id = $_POST['br_id'];
    $Admission_Date = $_POST['admission_date'];
    $Discharge_Date = $_POST['discharge_date'];
    $Room_Type_Id = $_POST['room_type_id'];
    $Bed_No = $_POST['bed_no'];
    $Pat_Id = $_POST['pat_id']; 
    $Doctor_Id = $_POST['doctor_id'];
    $Staff_Id = $_POST['staff_id'];
    $Bed_Status = '1';
    $PAT_TYPE = 'InPatient';
    // check if patient already exists 
    if ($db->isBedAllocated($Pat_Id)) {
        // Bed already allocated
        $response["response"] = 0;
        $response["message"] = $Pat_Id. " already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertBedAllocation($Br_id,$Admission_Date,$Discharge_Date,$Room_Type_Id,$Bed_No,$Pat_Id,$Doctor_Id,$Staff_Id);
        $users = $db->updateBedStatus($Bed_No,$Bed_Status);
        $userss = $db->updatePatientType($Pat_Id,$PAT_TYPE);
        if ($user) {
            // Bed allocated successfully
        $response["response"] = 1;
        $response["message"] = "Bed Allocated.";
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


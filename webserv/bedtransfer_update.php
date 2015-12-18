<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['bed_id']) && isset($_POST['pat_id'])) {

    // receiving the post params
    $Bed_Allocation_Id = $_POST['bed_allocation_id'];
    $Admission_Date = $_POST['admission_date'];
    $Discharge_Date = $_POST['discharge_date'];
    $Room_Type_Id = $_POST['room_type_id'];
    $Bed_Id = $_POST['bed_id'];
    $Pat_Id = $_POST['pat_id']; 
    $Doctor_Id = $_POST['doctor_id'];
    $Staff_Id = $_POST['staff_id'];
    $Bed_Transfer_Reason = $_POST['bed_transfer_reason'];
        
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->updateBedTransfer($Bed_Allocation_Id,$Admission_Date,$Discharge_Date,$Room_Type_Id,$Bed_Id,$Pat_Id,$Doctor_Id,$Staff_Id,$Bed_Transfer_Reason);

        if ($user) {
            // Bed Transfered successfully
        $response["response"] = 1;
        $response["message"] = "Bed Transfered Successfully.";
        echo json_encode($response);
        } else {
            // Bed not available
            
            $response["response"] = 2;
            $response["message"] = "Unknown error occurred in updation!";
            echo json_encode($response);
        }
   
} else {
    $response["response"] = 3;
    $response["message"] = "Required parameters missing!";
    echo json_encode($response);
}
?>


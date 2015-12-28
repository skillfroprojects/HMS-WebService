<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['br_id']) && isset($_POST['surgery_pat_id'])) {

    // receiving the post params
    $Br_Id = $_POST['br_id'];
    $Surgery_Doctor_Id = $_POST['surgery_doctor_id'];
    $Surgery_Pat_Id = $_POST['surgery_pat_id'];
    $Surgery_Staff_Id = $_POST['surgery_staff_id'];
    $Surgery_Date = $_POST['surgery_date'];
    $Surgery_Time = $_POST['surgery_time']; 
    $Surgery_Type = $_POST['surgery_type'];
    $Surgery_Anesthetist_Id = $_POST['surgery_anesthetist_id'];
    $Surgery_Ot_No = $_POST['surgery_ot_no'];
    $Surgery_Requested_By = $_POST['surgery_requested_by'];
    $Surgery_Inventory_Managed_By = $_POST['surgery_inventory_managed_by'];
    $Surgery_Id = $_POST['surgery_id'];
    
    if ($_POST['surgery_id']=="")
    {
    // check if patient already exists 
    if ($db->isSurgeryExisted($Surgery_Pat_Id,$Surgery_Date,$Surgery_Time)) {
        // Bed already allocated
        $response["response"] = 0;
        $response["message"] = " Already Surgery Scheduled.";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertSurgery($Br_Id,$Surgery_Doctor_Id,$Surgery_Pat_Id,$Surgery_Staff_Id,$Surgery_Date,$Surgery_Time,$Surgery_Type,$Surgery_Anesthetist_Id,$Surgery_Ot_No,$Surgery_Requested_By,$Surgery_Inventory_Managed_By);
        
        if ($user) {
            // Bed allocated successfully
        $response["response"] = 1;
        $response["message"] = "Surgery Scheduled.";
        echo json_encode($response);
        } else {
            // Bed allocation failed
            
            $response["response"] = 2;
            $response["message"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
} else
         {
             $user = $db->updateSurgery($Surgery_Id,$Surgery_Doctor_Id,$Surgery_Pat_Id,$Surgery_Staff_Id,$Surgery_Date,$Surgery_Time,$Surgery_Type,$Surgery_Anesthetist_Id,$Surgery_Ot_No,$Surgery_Requested_By,$Surgery_Inventory_Managed_By,$Surgery_Status);
             if ($user) {
                    // user stored successfully
                $response["response"] = 1;
                $response["message"] = "Data Updated.";
                echo json_encode($response);
                } else {
                    // user failed to store
                    $response["response"] = 2;
                    $response["message"] = "Unknown error occurred during Updation!";
                    echo json_encode($response);
                }
         }   
    }else {
        $response["response"] = 3;
        $response["message"] = "Required parameters missing!";
        echo json_encode($response);
    }
?>



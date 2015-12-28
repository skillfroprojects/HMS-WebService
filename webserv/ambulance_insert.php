<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['br_id']) && isset($_POST['ambulance_no'])) {

    // receiving the post params
    $Br_id = $_POST['br_id'];
    $Ambulance_No = $_POST['ambulance_no'];
    $Ambulance_Name = $_POST['ambulance_name'];
    $Ambulance_Type = $_POST['ambulance_type'];
    $Ambulance_Charges = $_POST['ambulance_charges'];
    $Driver_Name = $_POST['driver_name']; 
    $Driver_License_No = $_POST['driver_license_no'];
    $Driver_Lincense_Image = $_POST['driver_lincense_image'];
    $Status = $_POST['status'];
    $Ambulance_Id = $_POST['ambulance_id'];
    
    if ($_POST['ambulance_id']=="")
    {
    // check if patient already exists 
    if ($db->isAmbulanceExisted($Ambulance_No)) {
        // Bed already allocated
        $response["response"] = 0;
        $response["message"] = $Ambulance_No. " already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertAmbulance($Br_Id,$Ambulance_No,$Ambulance_Name,$Ambulance_Type,$Ambulance_Charges,$Driver_Name,$Driver_License_No,$Driver_Lincense_Image,$Status);
        
        if ($user) {
            // Bed allocated successfully
        $response["response"] = 1;
        $response["message"] = "Ambulance Details Inserted.";
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
             $user = $db->updateAmbulance($Ambulance_Id,$Ambulance_No,$Ambulance_Name,$Ambulance_Type,$Ambulance_Charges,$Driver_Name,$Driver_License_No,$Driver_Lincense_Image,$Status);
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



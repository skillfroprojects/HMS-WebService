<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['br_id'])) {

    // receiving the post params
    $Br_ID = $_POST['br_id'];
    $Inventory_Type = $_POST['inventory_type'];
    $Inventory_Id = $_POST['inventory_id'];
    $Inv_Service_Id = $_POST['inv_service_id'];
    $Service_Person_Name = $_POST['service_person_name'];
    $Service_Person_Idproof = $_POST['service_person_idproof'];
    $Service_Date = $_POST['service_date'];
    
    
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        //$user = $db->insertLaboratory($Br_ID, $Lab_Name);
        $user = $db->insertInstrumentSchedule($Br_Id,$Inventory_Type,$Inventory_Id,$Inv_Service_Id,$Service_Person_Name,$Service_Person_Idproof,$Service_Date);

        if ($user) {
            // report stored successfully
        $response["response"] = 1;
        $response["message"] = "Schedule Inventory.";
        echo json_encode($response);
        } else {
            // report failed to store
            
            $response["response"] = 2;
            $response["message"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
 else {
    $response["response"] = 3;
    $response["message"] = "Required parameters missing!";
    echo json_encode($response);
}   

?>


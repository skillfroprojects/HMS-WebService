<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['br_id']) && isset($_POST['company_email'])) {

    // receiving the post params
    $Br_id = $_POST['br_id'];
    $Service_Company_Name = $_POST['service_company_name'];
    $Company_Address = $_POST['company_address'];
    $Company_Address1 = $_POST['company_address1'];
    $Postal_Code = $_POST['postal_code'];
    $Company_Email = $_POST['company_email'];
    $Company_Phone = $_POST['company_phone'];
    $Inv_Service_Id = $_POST['inv_service_id'];
    
    if ($_POST['inv_service_id']=="")
    {
    // check if patient already exists 
    if ($db->isInventoryServiceExisted($Company_Email)) {
        // Bed already allocated
        $response["response"] = 0;
        $response["message"] = $Company_Email. " already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertInstrumentService($Br_Id,$Service_Company_Name,$Company_Address,$Company_Address1,$Postal_Code,$Company_Email,$Company_Phone);
        
        if ($user) {
            // Bed allocated successfully
        $response["response"] = 1;
        $response["message"] = "Instrument Service Inserted.";
        echo json_encode($response);
        } else {
            // Bed allocation failed
            
            $response["response"] = 2;
            $response["message"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
}
  
     else
         {
             $user = $db->updateInstrumentService($Inv_Service_Id,$Service_Company_Name,$Company_Address,$Company_Address1,$Postal_Code,$Company_Email,$Company_Phone);
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


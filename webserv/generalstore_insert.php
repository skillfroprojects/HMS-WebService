<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['br_id']) && isset($_POST['name'])) {

    // receiving the post params
    $Br_id = $_POST['br_id'];
    $Inventory_Type = $_POST['inventory_type'];
    $Name = $_POST['name'];
    $Quantity = $_POST['quantity'];
    $Unique_Id_No = $_POST['unique_id_no'];
    $Description = $_POST['description']; 
    $Service_Frequency_Type = $_POST['service_frequency_type'];
    $Inventory_Id = $_POST['inventory_id'];
    
    if ($_POST['inventory_id']=="")
    {
    // check if inventory already exists 
        if ($db->isInventoryExisted($Name)) {
            // Bed already allocated
            $response["response"] = 0;
            $response["message"] = $Name. " already exists";
            echo json_encode($response);
        } else {
            // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
            $user = $db->insertGeneralStore($Br_Id,$Inventory_Type,$Name,$Quantity,$Unique_Id_No,$Description,$Service_Frequency_Type);

            if ($user) {
                // Bed allocated successfully
            $response["response"] = 1;
            $response["message"] = "Instrument Inserted.";
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
             $user = $db->updateGeneralStore($Inventory_Id,$Inventory_Type,$Name,$Quantity,$Unique_Id_No,$Description,$Service_Frequency_Type);
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


<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

if (isset($_POST['sp_name'])) {

    // receiving the post params
    $Br_Id = $_POST['br_id'];
    $Sp_Name = $_POST['sp_name'];
    $Sp_ID = $_POST['sp_id'];
    
    if ($_POST['sp_id']=="")
    {
        // check if user already exists with the same email
        if ($db->isSpecializeExisted($Sp_Name)) 
        {
            // user already exists
            $response["response"] = 0;
            $response["message"] = $Sp_Name. "already exists";
            echo json_encode($response);
        } else {

            $user = $db->insertSpecialization($Br_Id,$Sp_Name);
            if ($user) {
                // user stored successfully
            $response["response"] = 1;
            $response["message"] = "Data Inserted.";
            echo json_encode($response);
            } else {
                // user failed to store
                $response["response"] = 2;
                $response["message"] = "Unknown error occurred in registration!";
                echo json_encode($response);
            }
        }
     } else
     {
         $user = $db->UpdateSpecialization($Sp_ID,$Sp_Name);
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
} else {
    $response["response"] = 3;
    $response["message"] = "Required parameters missing!";
    echo json_encode($response);
}
?>


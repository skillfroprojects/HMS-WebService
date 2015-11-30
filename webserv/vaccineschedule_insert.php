<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['vaccine_child_age']) && isset($_POST['vaccine_name']) && isset($_POST['vaccine_dosage'])) {

    // receiving the post params
    $Br_Id = $_POST['br_id'];
    $Vaccine_Child_Age = $_POST['vaccine_child_age'];
    $Vaccine_Name = $_POST['vaccine_name'];
    $Vaccine_Dosage = $_POST['vaccine_dosage'];
    $Vaccine_Protects_Against = $_POST['vaccine_protects_against'];
    $Vaccine_Recommended_Days = $_POST['vaccine_recommended_days'];
        
    // check if child age already exists 
    if ($db->isVaccineDetails($Vaccine_Child_Age)) {
        
        $response["response"] = 0;
        $response["message"] = $Vaccine_Child_Age. " already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertVaccine($Br_Id,$Vaccine_Child_Age,$Vaccine_Name,$Vaccine_Dosage,$Vaccine_Protects_Against,$Vaccine_Recommended_Days);
        // Vaccine Details Filled successfully
        if ($user) {
            
        $response["response"] = 1;
        $response["message"] = "Vaccine Details Filled.";
        echo json_encode($response);
        } else {
            // vaccine insert failed
            
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


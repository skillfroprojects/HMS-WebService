<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

if (isset($_POST['diet_pat_id']) && isset($_POST['diet_meal_plan_id']) && isset($_POST['diet_bed_allocation_id'])) {

    // receiving the post params
    $Br_Id = $_POST['br_id'];
    $Diet_Pat_Id = $_POST['diet_pat_id'];
    $Diet_Meal_Plan_Id = $_POST['diet_meal_plan_id'];
    $Diet_Date_From = $_POST['diet_date_from'];
    $Diet_Date_To = $_POST['diet_date_to'];
    $Diet_Bed_Allocation_Id = $_POST['diet_bed_allocation_id'];
    
    // check if Diet Prescription already exists 
    if ($db->isDietPrescriptionExists($Diet_Pat_Id,$Diet_Date_From,$Diet_Date_To)) {
     
        $response["response"] = 0;
        $response["message"] = "Diet Already Prescribed";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertDietPrescription($Br_Id,$Diet_Pat_Id,$Diet_Meal_Plan_Id,$Diet_Date_From,$Diet_Date_To,$Diet_Bed_Allocation_Id);
        // Diet Prescribed successfully
        if ($user) {
            
        $response["response"] = 1;
        $response["message"] = "Diet Prescribed.";
        echo json_encode($response);
        } else {
            // Diet Prescription failed 
            
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


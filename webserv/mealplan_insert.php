<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

if (isset($_POST['meal_plan_name']) && isset($_POST['disease_type']) && isset($_POST['meal_calorie_level'])) {

    // receiving the post params
    $Br_Id = $_POST['br_id'];
    $Meal_Plan_Name = $_POST['meal_plan_name'];
    $Disease_Type = $_POST['disease_type'];
    $Meal_Calorie_Level = $_POST['meal_calorie_level'];
    $Meal_Plan_Breakfast = $_POST['meal_plan_breakfast'];
    $Meal_Plan_Lunch = $_POST['meal_plan_lunch'];
    $Meal_Plan_Afternoon_Snack = $_POST['meal_plan_afternoon_snack'];
    $Meal_Plan_Dinner = $_POST['meal_plan_dinner'];
    $Meal_Plan_Price = $_POST['meal_plan_price'];
        
    // check if Meal Plan already exists 
    if ($db->isMealPlanExists($Meal_Plan_Name)) {
     
        $response["response"] = 0;
        $response["message"] = $Meal_Plan_Name. " already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertMealPlan($Br_Id,$Meal_Plan_Name,$Disease_Type,$Meal_Calorie_Level,$Meal_Plan_Breakfast,$Meal_Plan_Lunch,$Meal_Plan_Afternoon_Snack,$Meal_Plan_Dinner,$Meal_Plan_Price);
        // Meal Plan Details Inserted successfully
        if ($user) {
            
        $response["response"] = 1;
        $response["message"] = "Meal Plan Details Inserted.";
        echo json_encode($response);
        } else {
            // Meal Plan Details failed to insert
            
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


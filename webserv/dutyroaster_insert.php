<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();
// json response array
//$response = array("error" => FALSE);

if (isset($_POST['schedule_emp_id']) && isset($_POST['schedule_pat_id'])) {
    // receiving the post params
    $Schedule_Id = $_POST['schedule_id'];
    $Schedule_Emp_Type = $_POST['schedule_emp_type'];
    $Schedule_Emp_Id = $_POST['schedule_emp_id'];
    $Schedule_Shift_Id = $_POST['schedule_shift_id'];
    $Schedule_Pat_Id = $_POST['schedule_pat_id'];
    $Schedule_From_Date = $_POST['schedule_from_date'];
    $Schedule_To_Date = $_POST['schedule_to_date'];
  
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertDuty($Schedule_Id,$Schedule_Emp_Type,$Schedule_Emp_Id,$Schedule_Shift_Id,$Schedule_Pat_Id,$Schedule_From_Date,$Schedule_To_Date);
        //$user = $db->insertDuty($Schedule_Id, $Schedule_Emp_Type,$Schedule_Emp_Id,$Schedule_Shift_Id,$Schedule_Pat_Id);
        if ($user) {
            // branch stored successfully
        $response["response"] = 1;
        $response["message"] = "Duty Roaster Details Inserted.";
        echo json_encode($response);
        } else {
            // branch failed to store
            
            $response["response"] = 2;
            $response["message"] = "Erro ..!";
            echo json_encode($response);
        }
    }
    else {
    $response["response"] = 3;
    $response["message"] = "Required parameters missing!";
    echo json_encode($response);
}
?>


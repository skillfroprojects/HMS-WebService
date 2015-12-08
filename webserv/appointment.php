<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['appointment_date']) && isset($_POST['appointment_time'])) {

    // receiving the post params
    $Br_Id = $_POST['br_id'];
    $App_Date = $_POST['appointment_date'];
    $App_Time = $_POST['appointment_time'];
    $Doc_ID = $_POST['doctor_id'];
    $Pat_ID = $_POST['patient_id'];
    $Pat_Email = $_POST['patient_email'];
    $Pat_Mobile = $_POST['patient_mobile'];     
 
    // check if user is already existed with the same email
    if ($db->isappointmentExisted($Doc_ID,$App_Date,$App_Time)) {
        // user already existed
        $response["response"] = 0;
        $response["error_msg"] = "Appointment already Booked for " . $App_Time;
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->register_appointment($Br_Id,$App_Date,$App_Time,$Doc_ID,$Pat_ID,$Pat_Email,$Pat_Mobile);
        if ($user) {
            // user stored successfully
        $response["response"] = 1;
        $user = mysql_query("SELECT * from Appointment_master WHERE Pat_Email = '$Pat_Email'");
        $user_data = mysql_fetch_array($user);
        $no_rows = mysql_num_rows($user);
  
        if ($no_rows == 1) {
            // user existed 
            //$stmt->close();
            $user['APP_ID'] = $user_data['APP_ID'];
            
        } else {
            
//            return NULL;
        }
        $response["APP_ID"] = $user_data['APP_ID'];
        $response["message"] = "Appointment booked responsefully.";
        echo json_encode($response);
        } else {
            // user failed to store
            
            $response["response"] = 2;
            $response["error_msg"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
} else {
    $response["response"] = 3;
    $response["error_msg"] = "Required parameters is missing!";
    echo json_encode($response);
}
?>


<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['patient_name']) && isset($_POST['patient_email'])) {

    // receiving the post params
    $App_Date = $_POST['appointment_date'];
    $App_Time = $_POST['appointment_time'];
    $Doc_Name = $_POST['doctor_name'];
    $Pat_Name = $_POST['patient_name'];
    $Pat_Email = $_POST['patient_email'];
    $Pat_Mobile = $_POST['patient_mobile'];
    $Br_Name = $_POST['branch_name'];
    
    //$Pat_Password = $_POST['password'];
    //$password = $_POST['password'];

    // check if user is already existed with the same email
    if ($db->isappointmentExisted($App_Time)) {
        // user already existed
        $response["success"] = 0;
        $response["error_msg"] = "Appointment already Booked for " . $App_Time;
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->register_appointment($App_Date,$App_Time,$Doc_Name,$Pat_Name,$Pat_Email,$Pat_Mobile,$Br_Name);
        if ($user) {
            // user stored successfully
        $response["success"] = 1;
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
        $response["message"] = "Appointment booked successfully.";
        echo json_encode($response);
        } else {
            // user failed to store
            
            $response["success"] = 2;
            $response["error_msg"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
} else {
    $response["success"] = 3;
    $response["error_msg"] = "Required parameters is missing!";
    echo json_encode($response);
}
?>


<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['em_pat_name'])) {

    // receiving the post params
    $Br_ID = $_POST['branch_id'];
    $Em_Pat_Name = $_POST['em_pat_name'];
    $Em_Gender = $_POST['em_gender'];
    $Em_Mode_Of_Arrival = $_POST['em_mode_of_arrival'];
    $Em_Accompanied_By = $_POST['em_accompanied_by'];
    $Em_Relatives_Notified = $_POST['em_relatives_notified'];
    $Em_Priority = $_POST['em_priority'];
    $Em_Date= $_POST['em_date'];
    $Em_Time_Of_Arrival = $_POST['em_time_of_arrival'];
    $Em_Referral_Doctor = $_POST['em_referral_doctor'];
    $Em_Ward_To_Admit = $_POST['em_ward_to_admit'];
    $Em_Bed_No = $_POST['em_bed_no'];
    $Em_Mlc = $_POST['em_mlc'];
    $Em_Mlc_Details = $_POST['em_mlc_details']; 
 
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        //$user = $db->insertLaboratory($Br_ID, $Lab_Name);
        $user = $db->insertEmergency($Br_id, $Em_Pat_Name,$Em_Gender,$Em_Mode_Of_Arrival,$Em_Accompanied_By,$Em_Relatives_Notified,$Em_Priority,$Em_Date,$Em_Time_Of_Arrival,$Em_Referral_Doctor,$Em_Ward_To_Admit,$Em_Bed_No,$Em_Mlc,$Em_Mlc_Details);

        if ($user) {
            // patient stored successfully
        $response["response"] = 1;
        $user = mysql_query("SELECT * from Emergency_Visit_master WHERE Em_Pat_Name = '$Em_Pat_Name'");
        $user_data = mysql_fetch_array($user);
        $no_rows = mysql_num_rows($user);
  
        if ($no_rows == 1) {
            // patient exists
            //$stmt->close();
            $user['em_id'] = $user_data['em_id'];
            
        } else {
            
//            return NULL;
        }
        $response["em_id"] = $user_data['em_id'];
        $response["message"] = "Patient Details Inserted.";
        echo json_encode($response);
        } else {
            // patient failed to store
            
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


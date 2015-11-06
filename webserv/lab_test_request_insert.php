<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['lab_test_name'])) {

    // receiving the post params
    $Br_ID = $_POST['branch_id'];
    $pat_id = $_POST['pat_id'];
    $lab_id = $_POST['lab_id'];
    $lab_requestor_id = $_POST['lab_requestor_id'];
    $lab_requested_by = $_POST['lab_requested_by'];
    $lab_test_name = $_POST['lab_test_name'];
    $lab_requested_date = $_POST['lab_requested_date'];
    $lab_request_completed_date= $_POST['lab_request_completed_date'];
    $lab_notify_to_doc = $_POST['lab_notify_to_doc'];
    $lab_notify_to_pat = $_POST['lab_notify_to_pat'];
    $lab_specimen = $_POST['lab_specimen'];
    $lab_specimen_collected_by = $_POST['lab_specimen_collected_by'];
    $lab_sample_no = $_POST['lab_sample_no'];
    $lab_request_status = $_POST['lab_request_status'];
    $lab_remarks = $_POST['lab_remarks'];
    $lab_request_type = $_POST['lab_request_type'];
    
    
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        //$user = $db->insertLaboratory($Br_ID, $Lab_Name);
        $user = $db->insertTestReports($Br_id, $pat_id,$lab_id,$lab_requestor_id,$lab_requested_by,$lab_test_name,$lab_requested_date,$lab_request_completed_date,$lab_notify_to_doc,$lab_notify_to_pat,$lab_specimen,$lab_specimen_collected_by,$lab_sample_no,$lab_request_status,$lab_remarks,$lab_request_type);

        if ($user) {
            // report stored successfully
        $response["response"] = 1;
        $response["message"] = "Report Details Inserted.";
        echo json_encode($response);
        } else {
            // report failed to store
            
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


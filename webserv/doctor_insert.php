<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['doc_name']) && isset($_POST['doc_email'])) {

    // receiving the post params
    $Br_ID = $_POST['branch_id'];
    $Doc_Name = $_POST['doc_name'];
    $Doc_Email = $_POST['doc_email'];
    $Doc_Date_Of_Birth = $_POST['doc_dob'];
    $Doc_Gender = $_POST['doc_gender'];
    $Doc_Mobile = $_POST['doc_mobile'];
    $Doc_Address1 = $_POST['doc_address1'];
    $Doc_Address2= $_POST['doc_address2'];
    $Doc_Postal_Code = $_POST['doc_postal_code'];
    $Doc_Qualification = $_POST['doc_qualification'];
    $Doc_Emergency_Availability = $_POST['doc_emergency_availability'];
    $Sp_ID = $_POST['specialization_id'];
    $Doc_Med_Licence_no = $_POST['doc_med_licence_no'];

    
    // check if user already exists with the same email
    if ($db->isDoctorExisted($Doc_Email)) {
        // user already exists
        $response["response"] = 0;
        $response["message"] = $Doc_Email. "already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertDoctor($Br_ID, $Doc_Name,$Doc_Email,$Doc_Date_Of_Birth,$Doc_Gender,$Doc_Mobile,$Doc_Address1,$Doc_Address2,$Doc_Postal_Code,$Doc_Qualification,$Doc_Emergency_Availability,$Sp_ID,$Doc_Med_Licence_no);
        if ($user) {
            // user stored successfully
        $response["response"] = 1;
        $response["message"] = "Doctor Details Inserted.";
        echo json_encode($response);
        } else {
            // user failed to store
            
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


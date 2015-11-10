<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['lab_name']) && isset($_POST['lab_email'])) {

    // receiving the post params
    $Br_ID = $_POST['branch_id'];
    $Lab_Name = $_POST['lab_name'];
    $Lab_Timing = $_POST['lab_timing'];
    $Lab_Addr1 = $_POST['lab_addr1'];
    $Lab_Addr2 = $_POST['lab_addr2'];
    $Lab_Postal_Code = $_POST['lab_postal_code'];
    $Lab_Phone = $_POST['lab_phone'];
    $Lab_Email= $_POST['lab_email'];
    $Lab_Landline_No = $_POST['lab_landline_no'];    
    $Login_uname = $_POST['lab_name'];
    $Login_name = $_POST['lab_email'];
    $Br_id = $_POST['branch_id'];  
    $Login_password = 'laboratory';
    $Login_type = 'laboratory';

    
    // check if lab already exists 
    if ($db->isLaboratoryExisted($Lab_Email)) {
        // lab already exists
        $response["response"] = 0;
        $response["message"] = $Lab_Email. "already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        //$user = $db->insertLaboratory($Br_ID, $Lab_Name);
        $user = $db->insertLaboratory($Br_ID, $Lab_Name,$Lab_Timing,$Lab_Addr1,$Lab_Addr2,$Lab_Postal_Code,$Lab_Phone,$Lab_Email,$Lab_Landline_No);
        $users = $db->loginUser($Login_uname,$Login_name,$Login_password,$Login_type,$Br_id);

        if ($user) {
            // lab stored successfully
        $response["response"] = 1;
        $user = mysql_query("SELECT * from Laboratory_master WHERE Lab_Email = '$Lab_Email'");
        $user_data = mysql_fetch_array($user);
        $no_rows = mysql_num_rows($user);
  
        if ($no_rows == 1) {
            // lab exists
            //$stmt->close();
            $user['lab_id'] = $user_data['lab_id'];
            
        } else {
            
//            return NULL;
        }
        $response["lab_id"] = $user_data['lab_id'];
        $response["message"] = "Laboratory Details Inserted.";
        echo json_encode($response);
        } else {
            // lab failed to store
            
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


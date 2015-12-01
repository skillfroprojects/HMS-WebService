<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['pharmacy_name']) && isset($_POST['pharma_email'])) {

    // receiving the post params
    $Br_ID = $_POST['branch_id'];
    $Pharmacy_Name = $_POST['pharmacy_name'];
    $Pharmacist_Name = $_POST['pharmacist_name'];
    $Pharma_Email = $_POST['pharma_email'];
    $Pharma_DOB = $_POST['pharma_dob'];
    $Pharma_Gender = $_POST['pharma_gender'];
    $Pharma_Phone = $_POST['pharma_phone'];
    $Pharma_Addr1= $_POST['pharma_addr1'];
    $Pharma_Addr2 = $_POST['pharma_addr2'];
    $Pharma_Postal_Code = $_POST['pharma_postal_code'];
    $Pharmacist_Licence_No = $_POST['pharmacist_licence_no'];
    $Pharma_Store_No = $_POST['pharma_store_no'];    
    $Login_uname = $_POST['pharmacy_name'];
    $Login_name = $_POST['pharma_email'];
    $Br_id = $_POST['branch_id'];  
    $Login_password = 'pharma';
    $Login_type = 'pharma';

    
    // check if pharma already exists 
    if ($db->isPharmacyExisted($Pharma_Email)) {
        // pharma already exists
        $response["response"] = 0;
        $response["message"] = $Pharma_Email. "already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertPharmacy($Br_ID, $Pharmacy_Name,$Pharmacist_Name,$Pharma_Email,$Pharma_DOB,$Pharma_Gender,$Pharma_Phone,$Pharma_Addr1,$Pharma_Addr2,$Pharma_Postal_Code,$Pharmacist_License_No,$Pharma_Store_No);

        if ($user) {
            // pharma stored successfully
        $response["response"] = 1;
        $user = mysql_query("SELECT * from Pharmacy_master WHERE Pharma_Email = '$Pharma_Email'");
        $user_data = mysql_fetch_array($user);
        $no_rows = mysql_num_rows($user);
  
        if ($no_rows == 1) {
            // pharma exists
            //$stmt->close();
            $Login_user_id = $user_data['pharma_id'];
            $user['pharma_id'] = $user_data['pharma_id'];
            $user['BR_ID'] = $user_data['br_id'];
            $users = $db->loginUser($Login_uname,$Login_name,$Login_password,$Login_user_id,$Login_type,$Br_id);
            
        } else {
            
//            return NULL;
        }
        $response["pharma_id"] = $user_data['pharma_id'];
        $response['BR_ID'] = $user_data['br_id'];
        $response["message"] = "Pharmacy Details Inserted.";
        echo json_encode($response);
        } else {
            // pharma failed to store
            
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


<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['pat_name']) && isset($_POST['pat_email'])) {

    // recieving the post params
    $BR_ID = $_POST['br_id'];
    $PAT_TITLE = $_POST['pat_title'];
    $PAT_TYPE = 'OutPatient';
    $PAT_NAME = $_POST['pat_name'];                    
    $PAT_EMAIL = $_POST['pat_email'];
    $PAT_GENDER = $_POST['pat_gender'];
    $PAT_MOBILE = $_POST['pat_mobile'];
    $PAT_ADDR1 = $_POST['pat_addri'];
    $PAT_ADDR2 = $_POST['pat_addr2'];
    $PAT_STATE = $_POST['pat_state'];
    $PAT_POSTAL_CODE = $_POST['pat_postal_code'];
    $PAT_BLOOD_GROUP = $_POST['pat_blood_group'];
    $PAT_HEIGHT = $_POST['pat_height'];
    $PAT_HEIGHT_UNIT = $_POST['pat_height_unit'];
    $PAT_WEIGHT = $_POST['pat_weight'];
    $PAT_WEIGHT_UNIT = $_POST['pat_weight_unit'];
    $PAT_MARITAL_STATUS = $_POST['pat_marital_status'];
    $PAT_EMP_STATUS = $_POST['pat_emp_status'];
    $PAT_REF_PHYSICIAN = $_POST['pat_ref_physician'];
    $PAT_REF_PHYSICIAN_NO = $_POST['pat_ref_physician_no'];
    $PAT_RELATIVE_NAME = $_POST['pat_relative_name'];
    $PAT_RELATION_TO_PATIENT = $_POST['pat_relation_to_patient'];
    $PAT_RELATIVE_ADDR = $_POST['pat_relative_addr'];
    $PAT_RELATIVE_STATE = $_POST['pat_relative_state'];
    $PAT_RELATIVE_PINCODE = $_POST['pat_relative_pincode'];
    $PAT_RELATIVE_PHONE = $_POST['pat_relative_phone'];
    $PAT_INS_NAME = $_POST['Pat_ins_name'];
    $PAT_INS_COMPANY = $_POST['pat_ins_company'];
    $PAT_INS_ID = $_POST['pat_ins_id'];
    $PAT_INS_COMPANY_NO = $_POST['pat_ins_company_no'];
    $PAT_POLICY_ID = $_POST['pat_policy_id'];
    $PAT_GROUP_NAME = $_POST['pat_group_name'];
    $PAT_INS_PARTY = $_POST['pat_ins_party'];
    $PAT_PROOF_NAME = $_POST['pat_proof_name'];
    $PAT_PROOF_NO = $_POST['pat_proof_no'];
    $PAT_REL_WITH_PARTY = $_POST['pat_rel_with_party'];
    $PAT_HEALTH_HISTORY_ID = $_POST['pat_health_history_id'];
    $PAT_CANCER_DETAILS = $_POST['pat_cancer_details'];
    $PAT_OTHER_MED_PROB = $_POST['pat_other_med_prob'];
    $PAT_PAST_SURGERIES_ID = $_POST['pat_past_surgeries_id'];
    $PAT_OTHER_SURGERIES = $_POST['pat_other_surgeries'];
    $PAT_TOBACCO = $_POST['pat_tobacco'];
    $PAT_SMOKING = $_POST['pat_smoking'];
    $PAT_ALCOHOL = $_POST['pat_alcohol'];
    $PAT_FAMILY_MEMBER = $_POST['pat_family_member'];
    $PAT_HISTORY_ID = $_POST['pat_history_id'];
    $Br_id = $_POST['br_id'];
    $Login_uname = $_POST['pat_name'];
    $Login_name = $_POST['pat_email'];
    $Login_password = 'patient';
    $Login_type = 'patient';
    $Login_user_id = $_POST['pat_id'];
    

    // check if user already exists with the same email
    if ($db->isUserExisted($PAT_EMAIL)) {
        // user already exists
        $response["response"] = 0;
        $response["message"] = $PAT_EMAIL. "already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertPatient($BR_ID,$PAT_TITLE,$PAT_TYPE,$PAT_NAME,$PAT_EMAIL,$PAT_GENDER,$PAT_MOBILE,$PAT_ADDR1,$PAT_ADDR2,$PAT_STATE,$PAT_POSTAL_CODE,$PAT_BLOOD_GROUP,$PAT_HEIGHT,$PAT_HEIGHT_UNIT,$PAT_WEIGHT,$PAT_WEIGHT_UNIT,$PAT_MARITAL_STATUS,$PAT_EMP_STATUS,$PAT_REF_PHYSICIAN,$PAT_REF_PHYSICIAN_NO,$PAT_RELATIVE_NAME,$PAT_RELATION_TO_PATIENT,$PAT_RELATIVE_ADDR,$PAT_RELATIVE_STATE,$PAT_RELATIVE_PINCODE,$PAT_RELATIVE_PHONE,$PAT_INS_NAME,$PAT_INS_COMPANY,$PAT_INS_ID,$PAT_INS_COMPANY_NO,$PAT_POLICY_ID,$PAT_GROUP_NAME,$PAT_INS_PARTY,$PAT_PROOF_NAME,$PAT_PROOF_NO,$PAT_REL_WITH_PARTY,$PAT_HEALTH_HISTORY_ID,$PAT_CANCER_DETAILS,$PAT_OTHER_MED_PROB,$PAT_PAST_SURGERIES_ID,$PAT_OTHER_SURGERIES,$PAT_TOBACCO,$PAT_SMOKING,$PAT_ALCOHOL,$PAT_FAMILY_MEMBER,$PAT_HISTORY_ID);
        $users = $db->loginUser($Login_uname,$Login_name,$Login_password,$Login_user_id,$Login_type,$Br_id);

        if ($user) {
            // user stored successfully
        $response["response"] = 1;
        $user = mysql_query("SELECT * from Patient_master WHERE PAT_EMAIL = '$PAT_EMAIL'");
        $user_data = mysql_fetch_array($user);
        $no_rows = mysql_num_rows($user);
  
        if ($no_rows == 1) {
            // user exists
            //$stmt->close();
            $user['PAT_ID'] = $user_data['PAT_ID'];
            $user['BR_ID'] = $user_data['BR_ID'];
            
        } else {
            
//            return NULL;
        }
        $response["PAT_ID"] = $user_data['PAT_ID'];
        $response["BR_ID"] = $user_data['BR_ID'];
        $response["message"] = "Patient successfully Registered.";
        echo json_encode($response);
        
        } else {
            // user registeration failed 
            
            $response["response"] = 3;
            $response["message"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
} else {
    $response["response"] = 4;
    $response["message"] = "Required parameters is missing!";
    echo json_encode($response);
}

?>


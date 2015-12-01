<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['child_name']) && isset($_POST['child_mandatory_email'])) {

    // recieving the post params
    $Br_Id = $_POST['br_id'];
    $Child_Name = $_POST['child_name'];
    $Child_Dob = $_POST['child_dob'];                    
    $Child_Gender = $_POST['child_gender'];
    $Child_Resides_With = $_POST['child_resides_with'];
    $Child_Mail_To = $_POST['child_mail_to'];
    $Child_Mandatory_Email = $_POST['child_mandatory_email'];
    $Child_Ins_Subscriber_Name = $_POST['child_ins_subscriber_name'];
    $Child_Ins_No = $_POST['child_ins_no'];
    $Child_Ins_Member_Id = $_POST['child_ins_member_id'];
    $Child_Mother_Name = $_POST['child_mother_name'];
    $Child_Mother_Dob = $_POST['child_mother_dob'];
    $Child_Mother_Addr = $_POST['child_mother_addr'];
    $Child_Mother_Postal_Code = $_POST['child_mother_postal_code'];
    $Child_Mother_Phone = $_POST['child_mother_phone'];
    $Child_Mother_Email = $_POST['child_mother_email'];
    $Child_Father_Name = $_POST['child_father_name'];
    $Child_Father_Dob = $_POST['child_father_dob'];
    $Child_Father_Addr = $_POST['child_father_addr'];
    $Child_Father_Postal_Code = $_POST['child_father_postal_code'];
    $Child_Father_Phone = $_POST['child_father_phone'];
    $Child_Father_Email = $_POST['child_father_email'];
    $Child_Emer_Name = $_POST['child_emer_name'];
    $Child_Emer_Relation = $_POST['child_emer_relation'];
    $Child_Emer_Phone = $_POST['child_emer_phone'];     
    $Br_id = $_POST['br_id'];
    $Login_uname = $_POST['child_name'];
    $Login_name = $_POST['child_mandatory_email'];
    $Login_password = 'patient';
    $Login_type = 'patient';
    $Login_user_id = $_POST['child_id'];
    

    // check if user already exists with the same email
    if ($db->isChildExisted($Child_Mandatory_Email)) {
        // user already exists
        $response["response"] = 0;
        $response["message"] = $Child_Mandatory_Email . "already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertChild($Br_Id,$Child_Name,$Child_Dob,$Child_Gender,$Child_Resides_With,$Child_Mail_To,$Child_Mandatory_Email,$Child_Ins_Subscriber_Name,$Child_Ins_No,$Child_Ins_Member_Id,$Child_Mother_Name,$Child_Mother_Dob,$Child_Mother_Addr,$Child_Mother_Postal_Code,$Child_Mother_Phone,$Child_Mother_Email,$Child_Father_Name,$Child_Father_Dob,$Child_Father_Addr,$Child_Father_Postal_Code,$Child_Father_Phone,$Child_Father_Email,$Child_Emer_Name,$Child_Emer_Relation,$Child_Emer_Phone);

        if ($user) {
            // user stored successfully
        $response["response"] = 1;
        $user = mysql_query("SELECT * from Children_master WHERE child_mandatory_email = '$Child_Mandatory_Email'");
        $user_data = mysql_fetch_array($user);
        $no_rows = mysql_num_rows($user);
  
        if ($no_rows == 1) {
            // user exists
            //$stmt->close();
            $Login_user_id = $user_data['child_id'];
            $user['Child_Id'] = $user_data['child_id'];
            $user['Br_Id'] = $user_data['br_id'];
            $users = $db->loginUser($Login_uname,$Login_name,$Login_password,$Login_user_id,$Login_type,$Br_id);
                      
        } else {
            
//            return NULL;
        }
        $response["Child_Id"] = $user_data['child_id'];
        $response["Br_Id"] = $user_data['br_id'];
        $response["message"] = "Child successfully Registered.";
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


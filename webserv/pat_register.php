<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['pat_name']) && isset($_POST['pat_email'])) {

    // recieving the post params
    $Pat_Int = '000001';
    $Pat_Name = $_POST['pat_name'];
    $Pat_Email = $_POST['pat_email'];
    $Pat_Gender = $_POST['pat_gender'];
    $Pat_Mobile = $_POST['pat_mobile'];
    $Pat_Addr1 = $_POST['pat_addr1'];
    $Pat_Addr2 = $_POST['pat_addr2'];
    $Pat_Postal_Code = $_POST['pat_postal_code'];
    $Pat_Blood_Group = $_POST['pat_blood_group'];
    $Login_uname = $_POST['pat_name'];
    $Login_name = $_POST['pat_email'];
    $Login_password = 'patient';
    $Login_type = 'patient';
    

    // check if user already exists with the same email
    if ($db->isUserExisted($Pat_Email)) {
        // user already exists
        $response["success"] = 0;
        $response["error_msg"] = "User already exists for this " . $Pat_Email;
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->storeUser($Pat_Name,$Pat_Email,$Pat_Gender,$Pat_Mobile,$Pat_Addr1,$Pat_Addr2,$Pat_Postal_Code,$Pat_Blood_Group);
        $users = $db->loginUser($Login_uname,$Login_name,$Login_password,$Login_type);

        if ($user) {
            // user stored successfully
        $response["success"] = 1;
        $user = mysql_query("SELECT * from Patient_master WHERE Pat_Email = '$Pat_Email'");
        $user_data = mysql_fetch_array($user);
        $no_rows = mysql_num_rows($user);
  
        if ($no_rows == 1) {
            // user exists
            //$stmt->close();
            $user['PAT_ID'] = $user_data['PAT_ID'];
            
        } else {
            
//            return NULL;
        }
        $response["PAT_ID"] = $user_data['PAT_ID'];
        $response["message"] = "Patient successfully Registered.";
        echo json_encode($response);
        
        } else {
            // user registeration failed 
            
            $response["success"] = 3;
            $response["error_msg"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
} else {
    $response["success"] = 4;
    $response["error_msg"] = "Required parameters is missing!";
    echo json_encode($response);
}

?>


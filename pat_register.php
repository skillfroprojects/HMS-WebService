<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['pat_name']) && isset($_POST['pat_email'])) {

    // receiving the post params
    $Pat_Int = '000001';
    $Pat_Name = $_POST['pat_name'];
    $Pat_Email = $_POST['pat_email'];
    $Pat_Gender = $_POST['pat_gender'];
    $Pat_Mobile = $_POST['pat_mobile'];
    $Pat_Addr1 = $_POST['pat_addr1'];
    $Pat_Addr2 = $_POST['pat_addr2'];
    $Pat_Postal_Code = $_POST['pat_postal_code'];
    $Pat_Blood_Group = $_POST['pat_blood_group'];
    //$Pat_Password = $_POST['password'];
    //$password = $_POST['password'];

    // check if user is already existed with the same email
    if ($db->isUserExisted($Pat_Email)) {
        // user already existed
        $response["success"] = 0;
        $response["error_msg"] = "User already existed with " . $Pat_Email;
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->storeUser($Pat_Name,$Pat_Email,$Pat_Gender,$Pat_Mobile,$Pat_Addr1,$Pat_Addr2,$Pat_Postal_Code,$Pat_Blood_Group);
        if ($user) {
            // user stored successfully
        $response["success"] = 1;
        $user = mysql_query("SELECT * from Patient_master WHERE Pat_Email = '$Pat_Email'");
        $user_data = mysql_fetch_array($user);
        $no_rows = mysql_num_rows($user);
  
        if ($no_rows == 1) {
            // user existed 
            //$stmt->close();
            $user['PAT_ID'] = $user_data['PAT_ID'];
            
        } else {
            
//            return NULL;
        }
        $response["PAT_ID"] = $user_data['PAT_ID'];
        $response["message"] = "Patient successfully Registed.";
        echo json_encode($response);
        //$response["success"] = 2;
        //$response["message"] = "Patient successfully Registed.";
        //echo json_encode($response);
        } else {
            // user failed to store
            
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


<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['staff_name']) && isset($_POST['staff_email'])) {

    // receiving the post params
    $Br_id = $_POST['branch_id'];
    $Staff_Name = $_POST['staff_name'];
    $Staff_Email = $_POST['staff_email'];
    $Staff_dob = $_POST['staff_dob'];
    $Staff_Gender = $_POST['staff_gender'];
    $Staff_Phone = $_POST['staff_phone'];
    $Staff_Addr1 = $_POST['staff_addr1'];
    $Staff_Addr2= $_POST['staff_addr2'];
    $Staff_Postal_Code = $_POST['staff_postal_code'];  
    $Dept_id = $_POST['dept_id'];
    $Designation_id= $_POST['designation_id'];
    $Staff_Joining_Date = $_POST['staff_joining_date'];  
    $Login_uname = $_POST['staff_name'];
    $Login_name = $_POST['staff_email'];
    $Login_password = 'staffemp';
    $Login_type = 'staff';

    
    // check if staff already exists 
    if ($db->isStaffExisted($Staff_Email)) {
        // staff already exists
        $response["response"] = 0;
        $response["message"] = $Staff_Email. "already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        //$user = $db->insertLaboratory($Br_ID, $Lab_Name);
        $user = $db->insertStaff($Br_id, $Staff_Name,$Staff_Email,$Staff_dob,$Staff_Gender,$Staff_Phone,$Staff_Addr1,$Staff_Addr2,$Staff_Postal_Code,$Dept_id,$Designation_id,$Staff_Joining_Date);
        $users = $db->loginUser($Login_uname,$Login_name,$Login_password,$Login_type,$Br_id);

        if ($user) {
            // staff stored successfully
        $response["response"] = 1;
        $user = mysql_query("SELECT * from Staff_master WHERE Staff_Email = '$Staff_Email'");
        $user_data = mysql_fetch_array($user);
        $no_rows = mysql_num_rows($user);
  
        if ($no_rows == 1) {
            // staff exists
            //$stmt->close();
            $user['staff_id'] = $user_data['staff_id'];
            
        } else {
            
//            return NULL;
        }
        $response["staff_id"] = $user_data['staff_id'];
        $response["message"] = "Staff Details Inserted.";
        echo json_encode($response);
        } else {
            // staff failed to store
            
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


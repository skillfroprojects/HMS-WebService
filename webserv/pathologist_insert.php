<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['pathologist_name']) && isset($_POST['pathologist_email'])) {

    // receiving the post params
    $Br_id = $_POST['branch_id'];
    $pathologist_name = $_POST['pathologist_name'];
    $lab_id = $_POST['lab_id'];
    //$lab_email = $_POST['lab_email'];
    $pathologist_addr1 = $_POST['pathologist_addr1'];
    $pathologist_addr2 = $_POST['pathologist_addr2'];
    $pathologist_postal_code = $_POST['pathologist_postal_code'];
    $pathologist_phone= $_POST['pathologist_phone'];
    $pathologist_email = $_POST['pathologist_email'];
    $pathologist_other_no = $_POST['pathologist_other_no'];  
    $Login_uname = $_POST['pathologist_name']; 
    $Login_password = 'laboratory';
    $Login_type = 'laboratory';

    
    // check if Pathologist already exists 
    if ($db->isPathologistExisted($pathologist_email)) {
        // Pathologist already exists
        $response["response"] = 0;
        $response["message"] = $pathologist_email. "already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        //$user = $db->insertLaboratory($Br_ID, $Lab_Name);
        $user = $db->insertPathologist($Br_id, $pathologist_name,$lab_id,$pathologist_addr1,$pathologist_addr2,$pathologist_postal_code,$pathologist_phone,$pathologist_email,$pathologist_other_no);
        $user1 = mysql_query("SELECT * from Laboratory_master WHERE lab_id = '$lab_id'");
        $user_data1 = mysql_fetch_array($user1);
        $no_rows1 = mysql_num_rows($user1);
  
        if ($no_rows1 == 1) {
            // Pathologist exists
            //$stmt->close();
            $Login_name = $user_data1['lab_email'];            
        } else {
            
//            return NULL;
        }
        
        if ($user) {
            // Pathologist stored successfully
        $response["response"] = 1;
        $user = mysql_query("SELECT * from Pathologist_master WHERE pathologist_email = '$pathologist_email'");
        $user_data = mysql_fetch_array($user);
        $no_rows = mysql_num_rows($user);
  
        if ($no_rows == 1) {
            // Pathologist exists
            //$stmt->close();
            $Login_user_id = $user_data['pathologist_id'];
            $user['pathologist_id'] = $user_data['pathologist_id'];
            $user['BR_ID'] = $user_data['br_id'];
            $users = $db->loginUser($Login_uname,$Login_name,$Login_password,$Login_user_id,$Login_type,$Br_id);
                        
        } else {
            
//            return NULL;
        }
        $response["pathologist_id"] = $user_data['pathologist_id'];
        $response['BR_ID'] = $user_data['br_id'];
        $response["message"] = "Pathologist Details Inserted.";
        echo json_encode($response);
        } else {
            // Pathologist failed to store
            
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


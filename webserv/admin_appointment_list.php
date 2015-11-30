<?php
include 'include/Config.php';
$db = new DB_Class();

//$response = array("error" => FALSE);

if (isset($_POST['BR_ID'])) {

// receiving the post params
$DOC_ID = $_POST['BR_ID'];
        
if (isset($_POST["type"])) { $Type  = $_POST["type"]; } else { $Type='DESC'; }; 
$Price_Type = $Type;
if (isset($_POST["page"])) { $page  = $_POST["page"]; } else { $page=1; }; 
if (isset($_POST["page_count"])) { $page_data  = $_POST["page_count"]; } else { $page_data=10; }; 
$start_from = ($page-1) * 10; 

$result = mysql_query("SELECT
        appointment_master.APP_ID,
        appointment_master.APP_DATE,
        appointment_master.APP_TIME,
        appointment_master.APP_TOKEN_NO,
        appointment_master.DOC_NAME,
        appointment_master.PAT_NAME,
        appointment_master.PAT_EMAIL,
        appointment_master.PAT_MOBILE,
        appointment_master.PAT_ID,
        appointment_master.BR_NAME,
        appointment_master.APP_REG_VIA,
        appointment_master.APP_REG_FRM_DEVICE,
        appointment_master.APP_CREATED_DATE,
        appointment_master.APP_CREATED_DEVICE,
        appointment_master.APP_CREATED_IP,
        appointment_master.APP_CREATED_BY,
        appointment_master.APP_MODIFY_DATE,
        appointment_master.APP_MODIFY_DEVICE,
        appointment_master.APP_MODIFT_IP,
        appointment_master.APP_MODIFY_BY,
        doctor_master.DOC_ID,
        doctor_master.BR_ID,
        doctor_master.DOC_NAME,
        doctor_master.DOC_EMAIL,
        doctor_master.DOC_DATE_OF_BIRTH,
        doctor_master.DOC_GENDER,
        doctor_master.DOC_MOBILE,
        doctor_master.DOC_ADDRESS1,
        doctor_master.DOC_ADDRESS2,
        doctor_master.DOC_POSTAL_CODE,
        doctor_master.DOC_QUALIFICATION,
        doctor_master.DOC_EMERGENCY_AVAILABILITY,
        doctor_master.SP_ID,
        doctor_master.DOC_MED_LICENCE_NO,
        doctor_master.DOC_REG_VIA,
        doctor_master.DOC_REG_FRM_DEVICE,
        doctor_master.DOC_CREATED_DATE,
        doctor_master.DOC_CREATED_DEVICE,
        doctor_master.DOC_CREATED_IP,
        doctor_master.DOC_CREATED_BY,
        doctor_master.DOC_MODIFY_DATE,
        doctor_master.DOC_MODIFY_DEVICE,
        doctor_master.DOC_MODIFY_IP,
        doctor_master.DOC_MODIFY_BY
        FROM
        appointment_master
        INNER JOIN doctor_master ON appointment_master.DOC_NAME = doctor_master.DOC_NAME
        WHERE
        doctor_master.BR_ID = '$BR_ID' LIMIT 10") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["appointment"] = array();
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $appointment = array();
                $appointment["PAT_NAME"] = $row["PAT_NAME"];
                $appointment["APP_DATE"] = $row["APP_DATE"];
                $appointment["APP_TIME"] = $row["APP_TIME"];                        
                array_push($response["appointment"], $appointment);  
    }
    
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["response"] = 2;
    $response["message"] = "No data found";

    // echo no users JSON
    echo json_encode($response);
}
} else {
    $response["response"] = 3;
    $response["message"] = "Required parameters is missing!";
    echo json_encode($response);
}
?>
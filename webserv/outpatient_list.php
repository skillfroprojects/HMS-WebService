<?php
include 'include/Config.php';
$db = new DB_Class();

//$response = array("error" => FALSE);

if (isset($_POST['DOC_NAME'])) {

// receiving the post params
$DOC_NAME = $_POST['DOC_NAME'];
        
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
        appointment_master.APP_MODIFY_BY
        FROM
        appointment_master
        WHERE
        appointment_master.DOC_NAME = $DOC_NAME LIMIT 10") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["outpatient"] = array();
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $outpatient = array();
                $outpatient["PAT_NAME"] = $row["PAT_NAME"];
                $outpatient["PAT_EMAIL"] = $row["PAT_EMAIL"];
                $outpatient["PAT_MOBILE"] = $row["PAT_MOBILE"];                        
                array_push($response["outpatient"], $outpatient);  
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
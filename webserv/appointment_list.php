<?php
include 'include/Config.php';
$db = new DB_Class();

//$response = array("error" => FALSE);

if (isset($_POST['br_id']) && isset($_POST['app_id'])) {

// receiving the post params
$BR_ID = $_POST['br_id'];
$APP_ID = $_POST['app_id'];

if (isset($_POST["type"])) { $Type  = $_POST["type"]; } else { $Type='DESC'; }; 
$Price_Type = $Type;
if (isset($_POST["page"])) { $page  = $_POST["page"]; } else { $page=1; }; 
if (isset($_POST["page_count"])) { $page_data  = $_POST["page_count"]; } else { $page_data=10; }; 
$start_from = ($page-1) * 10; 

$result = mysql_query("SELECT
    appointment_master.APP_DATE,
    appointment_master.APP_TIME,
    doctor_master.DOC_NAME,
    patient_master.PAT_NAME,
    appointment_master.DOC_ID,
    appointment_master.PAT_ID,
    appointment_master.PAT_EMAIL,
    appointment_master.PAT_MOBILE,
    appointment_master.BR_ID,
    appointment_master.APP_ID
    FROM
    appointment_master
    INNER JOIN doctor_master ON appointment_master.DOC_ID = doctor_master.DOC_ID
    INNER JOIN patient_master ON appointment_master.PAT_ID = patient_master.PAT_ID
    WHERE
    appointment_master.BR_ID = '$BR_ID' AND appointment_master.APP_ID = '$APP_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["message"] = "Data Fetched Successfully";
    
    while ($row = mysql_fetch_array($result)) {

            $response["APP_ID"] = $row["APP_ID"];
            $response["BR_ID"] = $row["BR_ID"];
            $response["PAT_ID"] = $row["PAT_ID"];
            $response["PAT_NAME"] = $row["PAT_NAME"];
            $response["DOC_ID"] = $row["DOC_ID"];
            $response["DOC_NAME"] = $row["DOC_NAME"];
            $response["APP_DATE"] = $row["APP_DATE"];
            $response["APP_TIME"] = $row["APP_TIME"];
            $response["PAT_EMAIL"] = $row["PAT_EMAIL"];
            $response["PAT_MOBILE"] = $row["PAT_MOBILE"];
    }
    
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
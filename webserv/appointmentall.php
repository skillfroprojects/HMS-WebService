<?php
include 'include/Config.php';
$db = new DB_Class();

//$response = array("error" => FALSE);

if (isset($_POST['br_id'])) {

// receiving the post params
$BR_ID = $_POST['br_id'];
$DOC_ID = $_POST['doc_id'];
$PAT_ID = $_POST['pat_id'];
        
if (isset($_POST["type"])) { $Type  = $_POST["type"]; } else { $Type='DESC'; }; 
$Price_Type = $Type;
if (isset($_POST["page"])) { $page  = $_POST["page"]; } else { $page=1; }; 
if (isset($_POST["page_count"])) { $page_data  = $_POST["page_count"]; } else { $page_data=10; }; 
$start_from = ($page-1) * 10; 

if (isset($_POST['doc_id'])) {
    $DOCTOR_ID = "AND appointment_master.DOC_ID = '$DOC_ID'";
}else if (isset($_POST['pat_id'])) {
    $PATIENT_ID = "AND appointment_master.PAT_ID = '$PAT_ID'";
}

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
    appointment_master.BR_ID = '$BR_ID' $DOCTOR_ID $PATIENT_ID") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["appointment"] = array();
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $appointment = array();
                $appointment["APP_ID"] = $row["APP_ID"];
                $appointment["BR_ID"] = $row["BR_ID"];
                $appointment["PAT_ID"] = $row["PAT_ID"];
                $appointment["PAT_NAME"] = $row["PAT_NAME"];
                $appointment["DOC_ID"] = $row["DOC_ID"];
                $appointment["DOC_NAME"] = $row["DOC_NAME"];
                $appointment["APP_DATE"] = $row["APP_DATE"];
                $appointment["APP_TIME"] = $row["APP_TIME"];
                $appointment["PAT_EMAIL"] = $row["PAT_EMAIL"];
                $appointment["PAT_MOBILE"] = $row["PAT_MOBILE"];
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
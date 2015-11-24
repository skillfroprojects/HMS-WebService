<?php
include 'include/Config.php';
$db = new DB_Class();

$result = mysql_query("SELECT
        patient_master.PAT_ID,
        patient_master.PAT_NAME,
        patient_master.PAT_TITLE,
        patient_master.PAT_EMAIL,
        bed_allocation_master.br_id
        FROM
        patient_master
        INNER JOIN bed_allocation_master ON patient_master.PAT_ID = bed_allocation_master.pat_id") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["inpatient"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Inpatient = array();
        $Inpatient["BR_ID"] = $row["br_id"];
        $Inpatient["PATIENT_ID"] = $row["PAT_ID"];
        $Inpatient["PATIENT_NAME"] = $row["PAT_NAME"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["inpatient"], $Inpatient);
    }
   
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["response"] = 0;
    $response["message"] = "No data found";

    // echo no users JSON
    echo json_encode($response);
}
?>
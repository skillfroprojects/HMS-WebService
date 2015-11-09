<?php
include 'include/Config.php';
$db = new DB_Class();

$result = mysql_query("Select DISTINCT * from bed_allocation_master") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["inpatient"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Inpatient = array();
        $Inpatient["BR_ID"] = $row["branch_id"];
        $Inpatient["PATIENT_NAME"] = $row["pat_id"];
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
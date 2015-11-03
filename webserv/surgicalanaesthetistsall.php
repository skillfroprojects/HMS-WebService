<?php
include 'include/Config.php';
$db = new DB_Class();

$result = mysql_query("Select DOC_NAME from doctor_master WHERE SP_ID='2'") or die("Error");

if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["surgicalanaesthetists"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Surgicalanaesthetists = array();
        $Surgicalanaesthetists["DOC_ID"] = $row["DOC_ID"];
        $Surgicalanaesthetists["DOC_NAME"] = $row["DOC_NAME"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["surgicalanaesthetists"], $Surgicalanaesthetists);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No data found";

    // echo no users JSON
    echo json_encode($response);
}
?>
<?php
include 'include/Config.php';
$db = new DB_Class();

$result = mysql_query("Select DISTINCT * from pharmacy_drug_master") or die("Error");

if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["drugform"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Drugform = array();
        $Drugform["drug_id"] = $row["drug_id"];
        $Drugform["drug_name"] = $row["drug_name"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["drugform"], $Drugform);
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
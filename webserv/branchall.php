<?php
include 'include/Config.php';
$db = new DB_Class();

$result = mysql_query("Select * from branch_master") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["branch"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Branch = array();
        $Branch["BR_ID"] = $row["BR_ID"];
        $Branch["BR_NAME"] = $row["BR_NAME"];
        $Branch["BR_LOCATION"] = $row["BR_LOCATION"];
        $Branch["BR_ADDR1"] = $row["BR_ADDR1"];
        $Branch["BR_ADDR2"] = $row["BR_ADDR2"];
        $Branch["BR_POSTAL_CODE"] = $row["BR_POSTAL_CODE"];
        $Branch["BR_EMAIL"] = $row["BR_EMAIL"];
        $Branch["BR_PHONE"] = $row["BR_PHONE"];
        $Branch["BR_PHONE_OTHER"] = $row["BR_PHONE_OTHER"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["branch"], $Branch);
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
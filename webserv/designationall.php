<?php
include 'include/Config.php';
$db = new DB_Class();

$result = mysql_query("Select DISTINCT * from designation_master") or die("Error");

if (mysql_num_rows($result) > 0) {
    // response
    $response["response"] = 1;
    $response["designation"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Designation = array();
        $Designation["desc_id"] = $row["designation_id"];
        $Designation["desc_name"] = $row["designation_name"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["designation"], $Designation);
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
<?php
include 'include/Config.php';
$db = new DB_Class();

$result = mysql_query("Select DISTINCT * from room_type_master") or die("Error");

if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["roomtype"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Roomtype = array();
        $Roomtype["room_type_id"] = $row["room_type_id"];
        $Roomtype["room_type"] = $row["room_type"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["roomtype"], $Roomtype);
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
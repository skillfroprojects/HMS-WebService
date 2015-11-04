<?php
include 'include/Config.php';
$db = new DB_Class();

$result = mysql_query("Select DISTINCT * from room_master") or die("Error");

if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["roomnumber"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // response
        $response["response"] = 1;
        // temp user array
        $Roomnumber = array();
        $Roomnumber["room_id"] = $row["room_id"];
        $Roomnumber["room_no"] = $row["room_no"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["roomnumber"], $Roomnumber);
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
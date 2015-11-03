<?php
include 'include/Config.php';
$db = new DB_Class();


if (isset($_POST['br_id'])) {

    $BR_ID = $_POST['br_id'];

$result = mysql_query("Select * from doctor_master where BR_ID = '$BR_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["doctor"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Doctor = array();
        $Doctor["BR_ID"] = $row["BR_ID"];
        $Doctor["DOC_Name"] = $row["DOC_NAME"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["doctor"], $Doctor);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 2;
    $response["message"] = "No data found";

    // echo no users JSON
    echo json_encode($response);
}
}
else {
    $response["missing"] = 3;
    $response["error_msg"] = "Required parameters is missing!";
    echo json_encode($response);
}
?>
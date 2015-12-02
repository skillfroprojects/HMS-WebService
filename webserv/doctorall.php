<?php
include 'include/Config.php';
$db = new DB_Class();


if (isset($_POST['br_id'])) {

    $BR_ID = $_POST['br_id'];

$result = mysql_query("Select * from doctor_master where BR_ID = '$BR_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
    // response
    $response["response"] = 1;
    $response["doctor"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Doctor = array();
        $Doctor["BR_ID"] = $row["BR_ID"];
        $Doctor["DOC_Name"] = $row["DOC_NAME"];
        $Doctor["DOC_EMAIL"] = $row["DOC_EMAIL"];
        $Doctor["DOC_MOBILE"] = $row["DOC_MOBILE"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["doctor"], $Doctor);
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
}
else {
    $response["response"] = 3;
    $response["message"] = "Required parameters is missing!";
    echo json_encode($response);
}
?>
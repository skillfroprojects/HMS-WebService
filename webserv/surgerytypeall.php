<?php
include 'include/Config.php';
$db = new DB_Class();

if (isset($_POST['sp_id'])) {

    $SP_ID = $_POST['sp_id'];

$result = mysql_query("Select * from surgery_type_master where sp_id = '$SP_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["surgerytype"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Surgerytype = array();
        $Surgerytype["sp_id"] = $row["sp_id"];
        $Surgerytype["surgery_type"] = $row["surgery_type"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["surgerytype"], $Surgerytype);
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
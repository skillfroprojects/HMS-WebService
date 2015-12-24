<?php
include 'include/Config.php';
$db = new DB_Class();

if (isset($_POST['br_id'])) {

    $BR_ID = $_POST['br_id'];

$result = mysql_query("Select * from ambulance_master where br_id = '$BR_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["ambulanceall"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Ambulanceall = array();
        $Ambulanceall["br_id"] = $row["br_id"];
        $Ambulanceall["ambulance_no"] = $row["ambulance_no"];
        $Ambulanceall["ambulance_name"] = $row["ambulance_name"];
        $Ambulanceall["ambulance_type"] = $row["ambulance_type"];
        $Ambulanceall["ambulance_charges"] = $row["ambulance_charges"];
        $Ambulanceall["driver_name"] = $row["driver_name"];
        $Ambulanceall["driver_license_no"] = $row["driver_license_no"];
        $Ambulanceall["driver_lincense_image"] = $row["driver_lincense_image"];
        $Ambulanceall["status"] = $row["status"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["ambulanceall"], $Ambulanceall);
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
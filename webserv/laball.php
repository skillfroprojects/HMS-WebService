<?php
include 'include/Config.php';
$db = new DB_Class();
if (isset($_POST['br_id'])) {

    $BR_ID = $_POST['br_id'];

$result = mysql_query("Select DISTINCT * from laboratory_master where laboratory_master.br_id = '$BR_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
    // response
    $response["response"] = 1;
    $response["laboratory"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Laboratory = array();
        $Laboratory["lab_id"] = $row["lab_id"];
        $Laboratory["br_id"] = $row["br_id"];
        $Laboratory["lab_name"] = $row["lab_name"];
        $Laboratory["lab_timing"] = $row["lab_timing"];
        $Laboratory["lab_addr1"] = $row["lab_addr1"];
        $Laboratory["lab_addr2"] = $row["lab_addr2"];
        $Laboratory["lab_postal_code"] = $row["lab_postal_code"];
        $Laboratory["lab_phone"] = $row["lab_phone"];
        $Laboratory["lab_email"] = $row["lab_email"];
        $Laboratory["lab_landline_no"] = $row["lab_landline_no"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["laboratory"], $Laboratory);
    }
    
    // echoing JSON response
    echo json_encode($response);
} 
 else {
        // no products found
        $response["response"] = 0;
        $response["message"] = "No data found";

        // echo no users JSON
        echo json_encode($response);
    }
}else {
        // no products found
        $response["response"] = 2;
        $response["message"] = "Required Parameters Missing";

        // echo no users JSON
        echo json_encode($response);
}
?>
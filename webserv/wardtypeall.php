<?php
include 'include/Config.php';
$db = new DB_Class();

if (isset($_POST['br_id'])) {

$BR_ID = $_POST['br_id'];
$result = mysql_query("Select * from ward_type_master where ward_type_master.br_id = '$BR_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["wardtype"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // response
        $response["response"] = 1;
        // temp user array
        $Wardtype = array();
        $Wardtype["ward_type_id"] = $row["ward_type_id"];
        $Wardtype["ward_type_name"] = $row["ward_type"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["wardtype"], $Wardtype);
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
}else {
        // no products found
        $response["response"] = 2;
        $response["message"] = "Required Parameters Missing";

        // echo no users JSON
        echo json_encode($response);
}
?>
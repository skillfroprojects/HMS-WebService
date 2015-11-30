<?php
include 'include/Config.php';
$db = new DB_Class();

if (isset($_POST['br_id'])) {

    $BR_ID = $_POST['br_id'];
$result = mysql_query("Select * from surgery_type_master where surgery_type_master.br_id = '$BR_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["surgerytype"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // response
        $response["response"] = 1;
        // temp user array
        $Surgerytype = array();
        $Surgerytype["sp_id"] = $row["sp_id"];
        $Surgerytype["surgery_type"] = $row["surgery_type"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["surgerytype"], $Surgerytype);
    }
   
     // echoing JSON response
    echo json_encode($response);
}else {
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
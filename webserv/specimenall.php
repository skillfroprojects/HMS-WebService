<?php
include 'include/Config.php';
$db = new DB_Class();
if (isset($_GET['br_id'])) {

    $BR_ID = $_GET['br_id'];
$result = mysql_query("Select * from lab_specimen_master where lab_specimen_master.br_id = '$BR_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["specimen"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // response
        $response["response"] = 1;
        // temp user array
        $Specimen = array();
        $Specimen["specimen_id"] = $row["specimen_id"];
        $Specimen["br_id"] = $row["br_id"];
        $Specimen["specimen_name"] = $row["specimen_name"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["specimen"], $Specimen);
    }
    
    // echoing JSON response
    echo json_encode($response);
}  else {
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
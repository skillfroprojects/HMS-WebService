<?php
include 'include/Config.php';
$db = new DB_Class();
if (isset($_POST['br_id'])) {

    $BR_ID = $_POST['br_id'];
$result = mysql_query("Select DISTINCT * from medico_legal_case_master where medico_legal_case_master.br_id = '$BR_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["medicolegal"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // response
        $response["response"] = 1;
        // temp user array
        $Medicolegal = array();
        $Medicolegal["mlc_id"] = $row["mlc_id"];
        $Medicolegal["br_id"] = $row["br_id"];
        $Medicolegal["mlc_name"] = $row["mlc_name"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["medicolegal"], $Medicolegal);
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
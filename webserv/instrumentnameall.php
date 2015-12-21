<?php
include 'include/Config.php';
$db = new DB_Class();

if (isset($_POST['inventory_type'])) {

$Inventory_Type = $_POST['inventory_type'];
$result = mysql_query("SELECT * FROM inventory_schedule_master INNER JOIN inventory_master ON inventory_schedule_master.inventory_id = inventory_master.inventory_id WHERE inventory_schedule_master.inventory_type ='$Inventory_Type'") or die("Error");

if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["instrumentname"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // response
        $response["response"] = 1;
        // temp user array
        $Instrumentname = array();
        $Instrumentname["inv_sch_id"] = $row["inv_sch_id"];
        $Instrumentname["br_id"] = $row["br_id"];
        $Instrumentname["inventory_type"] = $row["inventory_type"];
        $Instrumentname["inventory_id"] = $row["inventory_id"];
        $Instrumentname["name"] = $row["name"];
        
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["instrumentname"], $Instrumentname);
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
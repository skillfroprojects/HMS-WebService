<?php
include 'include/Config.php';
$db = new DB_Class();
if (isset($_POST['br_id'])) {

    $BR_ID = $_POST['br_id'];
    $result = mysql_query("Select * from inventory_master where inventory_master.br_id = '$BR_ID'") or die("Error");

    if (mysql_num_rows($result) > 0) {
        // looping through all results
        // products node
        $response["inventoryall"] = array();

        while ($row = mysql_fetch_array($result)) {
            // response
            $response["response"] = 1;
            // temp user array
            $InventoryAll = array();
            $InventoryAll["br_id"] = $row["br_id"];
            $InventoryAll["inventory_type"] = $row["inventory_type"];
            $InventoryAll["name"] = $row["name"];
            $InventoryAll["quantity"] = $row["quantity"];
            $InventoryAll["unique_id_no"] = $row["unique_id_no"];
            $InventoryAll["description"] = $row["description"];
            $InventoryAll["service_frequency_type"] = $row["service_frequency_type"];
            //$services["SERV_PRICE"] = $row["SERV_PRICE"];
            // push single product into final response array
            array_push($response["inventoryall"], $InventoryAll);
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
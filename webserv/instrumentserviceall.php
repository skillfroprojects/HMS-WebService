<?php
include 'include/Config.php';
$db = new DB_Class();
if (isset($_POST['br_id'])) {

    $BR_ID = $_POST['br_id'];
    $result = mysql_query("Select * from inventory_service_master where inventory_service_master.br_id = '$BR_ID'") or die("Error");

    if (mysql_num_rows($result) > 0) {
        // looping through all results
        // products node
        $response["inventoryserviceall"] = array();

        while ($row = mysql_fetch_array($result)) {
            // response
            $response["response"] = 1;
            // temp user array
            $InventoryServiceAll = array();
            $InventoryServiceAll["br_id"] = $row["br_id"];
            $InventoryServiceAll["service_company_name"] = $row["service_company_name"];
            $InventoryServiceAll["company_address"] = $row["company_address"];
            $InventoryServiceAll["company_address1"] = $row["company_address1"];
            $InventoryServiceAll["postal_code"] = $row["postal_code"];
            $InventoryServiceAll["company_email"] = $row["company_email"];
            $InventoryServiceAll["company_phone"] = $row["company_phone"];
            //$services["SERV_PRICE"] = $row["SERV_PRICE"];
            // push single product into final response array
            array_push($response["inventoryserviceall"], $InventoryServiceAll);
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
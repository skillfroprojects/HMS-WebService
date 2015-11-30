<?php
include 'include/Config.php';
$db = new DB_Class();

if (isset($_POST['br_id'])) {

    $BR_ID = $_POST['br_id'];

$result = mysql_query("Select DISTINCT * from pharmacy_drug_master where pharmacy_drug_master.br_id = '$BR_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["drugform"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Drugform = array();
        $Drugform["drug_id"] = $row["drug_id"];
        $Drugform["drug_id"] = $row["drug_id"];
        $Drugform["drug_name"] = $row["drug_name"];
        $Drugform["NDC_code"] = $row["NDC_code"];
        $Drugform["drug_brand_name"] = $row["drug_brand_name"];
        $Drugform["drug_form"] = $row["drug_form"];
        $Drugform["drug_mfg_date"] = $row["drug_mfg_date"];
        $Drugform["drug_expiry_date"] = $row["drug_expiry_date"];
        $Drugform["drug_unit_price"] = $row["drug_unit_price"];
        $Drugform["drug_box_price"] = $row["drug_box_price"];
        $Drugform["drug_box_quantity"] = $row["drug_box_quantity"];
        $Drugform["drug_total_stock"] = $row["drug_total_stock"];
        $Drugform["supplier_id"] = $row["supplier_id"];
        $Drugform["available_stock"] = $row["available_stock"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["drugform"], $Drugform);
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
<?php
include 'include/Config.php';
$db = new DB_Class();
if (isset($_POST['br_id'])) {

    $BR_ID = $_POST['br_id'];
$result = mysql_query("Select * from pharmacy_master where pharmacy_master.br_id = '$BR_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["pharmacy"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // response
        $response["response"] = 1;        
        // temp user array
        $Pharmacy = array();
        $Pharmacy["pharma_id"] = $row["pharma_id"];
         $Pharmacy["br_id"] = $row["br_id"];
        $Pharmacy["pharmacy_name"] = $row["pharmacy_name"];
        $Pharmacy["pharmacist_name"] = $row["pharmacist_name"];
        $Pharmacy["pharma_email"] = $row["pharma_email"];
        $Pharmacy["pharma_dob"] = $row["pharma_dob"];
        $Pharmacy["pharma_gender"] = $row["pharma_gender"];
        $Pharmacy["pharma_phone"] = $row["pharma_phone"];
        $Pharmacy["pharma_addr1"] = $row["pharma_addr1"];
        $Pharmacy["pharma_addr2"] = $row["pharma_addr2"];
        $Pharmacy["pharma_postal_code"] = $row["pharma_postal_code"];
        $Pharmacy["pharmacist_licence_no"] = $row["pharmacist_licence_no"];
        $Pharmacy["pharma_store_no"] = $row["pharma_store_no"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["pharmacy"], $Pharmacy);
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
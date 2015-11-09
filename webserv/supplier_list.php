<?php
include 'include/Config.php';
$db = new DB_Class();

//$response = array("error" => FALSE);

if (isset($_POST['BR_ID'])) {

// receiving the post params
$BR_ID = $_POST['BR_ID'];
        
if (isset($_POST["type"])) { $Type  = $_POST["type"]; } else { $Type='DESC'; }; 
$Price_Type = $Type;
if (isset($_POST["page"])) { $page  = $_POST["page"]; } else { $page=1; }; 
if (isset($_POST["page_count"])) { $page_data  = $_POST["page_count"]; } else { $page_data=10; }; 
$start_from = ($page-1) * 10; 

$result = mysql_query("SELECT
        pharmacy_supplier_master.supplier_id,
        pharmacy_supplier_master.br_id,
        pharmacy_supplier_master.pharma_id,
        pharmacy_supplier_master.supplier_name,
        pharmacy_supplier_master.supplier_email,
        pharmacy_supplier_master.supplier_phone,
        pharmacy_supplier_master.supplier_addr1,
        pharmacy_supplier_master.supplier_addr2,
        pharmacy_supplier_master.reg_via,
        pharmacy_supplier_master.reg_frm_device,
        pharmacy_supplier_master.created_date,
        pharmacy_supplier_master.created_device,
        pharmacy_supplier_master.created_ip,
        pharmacy_supplier_master.created_by,
        pharmacy_supplier_master.modify_date,
        pharmacy_supplier_master.modify_device,
        pharmacy_supplier_master.modify_ip,
        pharmacy_supplier_master.modify_by,
        pharmacy_master.pharma_id,
        pharmacy_master.br_id,
        pharmacy_master.pharmacy_name,
        pharmacy_master.pharmacist_name,
        pharmacy_master.pharma_email,
        pharmacy_master.pharma_dob,
        pharmacy_master.pharma_gender,
        pharmacy_master.pharma_phone,
        pharmacy_master.pharma_addr1,
        pharmacy_master.pharma_addr2,
        pharmacy_master.pharma_postal_code,
        pharmacy_master.pharmacist_licence_no,
        pharmacy_master.pharma_store_no,
        pharmacy_master.reg_via,
        pharmacy_master.reg_frm_device,
        pharmacy_master.created_date,
        pharmacy_master.created_device,
        pharmacy_master.created_ip,
        pharmacy_master.created_by,
        pharmacy_master.modify_date,
        pharmacy_master.modify_device,
        pharmacy_master.modify_ip,
        pharmacy_master.modify_by
        FROM
        pharmacy_supplier_master
        INNER JOIN pharmacy_master ON pharmacy_supplier_master.pharma_id = pharmacy_master.pharma_id
        WHERE
        pharmacy_supplier_master.br_id = '$BR_ID' LIMIT 10") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["supplier"] = array();
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $supplier = array();
                $supplier["PHARMA_NAME"] = $row["pharma_id"];
                $supplier["SUPPLIER_NAME"] = $row["supplier_name"];
                $supplier["SUPPLIER_EMAIL"] = $row["supplier_email"];
                $supplier["SUPPLIER_PHONE"] = $row["supplier_phone"];
             
                array_push($response["supplier"], $supplier);  
    }
    
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["response"] = 2;
    $response["message"] = "No data found";

    // echo no users JSON
    echo json_encode($response);
}
} else {
    $response["response"] = 3;
    $response["message"] = "Required parameters is missing!";
    echo json_encode($response);
}
?>
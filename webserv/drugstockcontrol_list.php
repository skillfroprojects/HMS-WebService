<?php
include 'include/Config.php';
$db = new DB_Class();

//$response = array("error" => FALSE);
   
if (isset($_POST["type"])) { $Type  = $_POST["type"]; } else { $Type='DESC'; }; 
$Price_Type = $Type;
if (isset($_POST["page"])) { $page  = $_POST["page"]; } else { $page=1; }; 
if (isset($_POST["page_count"])) { $page_data  = $_POST["page_count"]; } else { $page_data=10; }; 
$start_from = ($page-1) * 10; 

$result = mysql_query("SELECT
        pharmacy_drug_master.drug_id,
        pharmacy_drug_master.drug_name,
        pharmacy_drug_master.NDC_code,
        pharmacy_drug_master.drug_brand_name,
        pharmacy_drug_master.drug_form,
        pharmacy_drug_master.drug_mfg_date,
        pharmacy_drug_master.drug_expiry_date,
        pharmacy_drug_master.drug_unit_price,
        pharmacy_drug_master.drug_box_price,
        pharmacy_drug_master.drug_box_quantity,
        pharmacy_drug_master.drug_total_stock,
        pharmacy_drug_master.supplier_id,
        pharmacy_drug_master.available_stock,
        pharmacy_drug_master.reg_via,
        pharmacy_drug_master.reg_frm_device,
        pharmacy_drug_master.created_date,
        pharmacy_drug_master.created_device,
        pharmacy_drug_master.created_ip,
        pharmacy_drug_master.created_by,
        pharmacy_drug_master.modify_date,
        pharmacy_drug_master.modify_device,
        pharmacy_drug_master.modify_ip,
        pharmacy_drug_master.modify_by
        FROM
        pharmacy_drug_master LIMIT 10") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["drugstockcontrol"] = array();
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $drugstockcontrol = array();
                $drugstockcontrol["DRUG_NAME"] = $row["drug_name"];
                $drugstockcontrol["DRUG_BRAND_NAME"] = $row["drug_brand_name"];
                $drugstockcontrol["AVAILABLE_STOCK"] = $row["available_stock"];
                        
                array_push($response["drugstockcontrol"], $drugstockcontrol);
        
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

?>
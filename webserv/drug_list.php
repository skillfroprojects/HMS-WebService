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
pharmacy_drug_master.drug_id,
pharmacy_drug_master.br_id,
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
pharmacy_drug_master
WHERE
pharmacy_drug_master.br_id = '$BR_ID' LIMIT 10") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["drug"] = array();
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $drug = array();
                $drug["Drug_Name"] = $row["drug_name"];
                $drug["NDC_Code"] = $row["NDC_code"];
                $drug["Mfg_Date"] = $row["drug_mfg_date"];
                $drug["Expiry_Date"] = $row["drug_expiry_date"];
                $drug["Total_Stock"] = $row["drug_total_stock"];
                array_push($response["drug"], $drug);  
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
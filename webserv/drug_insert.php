<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();
// json response array
//$response = array("error" => FALSE);

if (isset($_POST['drug_name']) && isset($_POST['ndc_code'])) {
    // receiving the post params
    $Br_Id = $_POST['branch_id'];
    $Drug_Name = $_POST['drug_name'];
    $NDC_code = $_POST['ndc_code'];
    $Drug_Brand_Name = $_POST['drug_brand_name'];
    $Drug_Form = $_POST['drug_form'];
    $Drug_Mfg_Date = $_POST['drug_mfg_date'];
    $Drug_Expiry_Date = $_POST['drug_expiry_date'];
    $Drug_Unit_Price = $_POST['drug_unit_price'];
    $Drug_Box_Price= $_POST['drug_box_price'];
    $Drug_Box_Quantity= $_POST['drug_box_quantity'];
    $Drug_Total_Stock= $_POST['drug_total_stock'];
    $Supplier_Id= $_POST['supplier_id'];
    $Available_Stock= $_POST['available_stock'];
    // check if branch already exists 
    if ($db->isDrugExisted($NDC_code)) {
        // drug already exists
        $response["response"] = 0;
        $response["message"] = $NDC_code. "already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertDrug($Br_Id,$Drug_Name, $NDC_code,$Drug_Brand_Name,$Drug_Form,$Drug_Mfg_Date,$Drug_Expiry_Date,$Drug_Unit_Price,$Drug_Box_Price,$Drug_Box_Quantity,$Drug_Total_Stock,$Supplier_Id,$Available_Stock);
        if ($user) {
            // branch stored successfully
        $response["response"] = 1;
        $response["message"] = "Drug Details Inserted.";
        echo json_encode($response);
        } else {
            // branch failed to store
            
            $response["response"] = 2;
            $response["message"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
} else {
    $response["response"] = 3;
    $response["message"] = "Required parameters missing!";
    echo json_encode($response);
}
?>


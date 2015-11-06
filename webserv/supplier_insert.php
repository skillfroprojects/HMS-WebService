<?php

include_once 'include/DB_Functions.php';
$db = new DB_Functions();
// json response array
//$response = array("error" => FALSE);

if (isset($_POST['supplier_email'])) {
    // receiving the post params
    $Br_Id = $_POST['branch_id'];
    $Pharma_Id = $_POST['pharma_id'];
    $Supplier_Name = $_POST['supplier_name'];
    $Supplier_Email = $_POST['supplier_email'];
    $Supplier_Phone = $_POST['supplier_phone'];
    $Supplier_Addr1 = $_POST['supplier_addr1'];
    $Supplier_Addr2 = $_POST['supplier_addr2'];
   
    // check if branch already exists 
    if ($db->isSupplierExisted($Supplier_Email)) {
        // drug already exists
        $response["response"] = 0;
        $response["message"] = $Supplier_Email. "already exists";
        echo json_encode($response);
    } else {
        // create a new user$Cust_Name, $Cust_Email, $Cust_Phone,$Cust_Address,$Cust_City,$Cust_State
        $user = $db->insertSupplier($Br_Id, $Pharma_Id,$Supplier_Name,$Supplier_Email,$Supplier_Phone,$Supplier_Addr1,$Supplier_Addr2);
        if ($user) {
            // branch stored successfully
        $response["response"] = 1;
        $response["message"] = "Supplier Details Inserted.";
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


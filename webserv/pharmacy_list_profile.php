<?php
include 'include/Config.php';
$db = new DB_Class();

//$response = array("error" => FALSE);

if (isset($_POST['br_id']) && isset($_POST['pharma_id'])) {

// receiving the post params
$BR_ID = $_POST['br_id'];
$PHARMA_ID = $_POST['pharma_id'];
        
if (isset($_POST["type"])) { $Type  = $_POST["type"]; } else { $Type='DESC'; }; 
$Price_Type = $Type;
if (isset($_POST["page"])) { $page  = $_POST["page"]; } else { $page=1; }; 
if (isset($_POST["page_count"])) { $page_data  = $_POST["page_count"]; } else { $page_data=10; }; 
$start_from = ($page-1) * 10; 

        $result = mysql_query("SELECT
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
        pharmacy_master.pharma_store_no
        FROM
        pharmacy_master
        WHERE
        pharmacy_master.br_id = '$BR_ID' AND
        pharmacy_master.pharma_id = '$PHARMA_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["message"] = "Data Fetched";
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
                $response["pharma_id"] = $row["pharma_id"];
                $response["pharmacy_name"] = $row["pharmacy_name"];
                $response["pharmacist_name"] = $row["pharmacist_name"];
                $response["pharma_email"] = $row["pharma_email"];
                $response["pharma_dob"] = $row["pharma_dob"];
                $response["pharma_gender"] = $row["pharma_gender"];
                $response["pharma_phone"] = $row["pharma_phone"];
                $response["pharma_addr"] = $row["pharma_addr1"].",".$row["pharma_addr2"];
                $response["pharma_postal_code"] = $row["pharma_postal_code"];
                $response["pharmacist_licence_no"] = $row["pharmacist_licence_no"];
                $response["pharma_store_no"] = $row["pharma_store_no"];
                $response["IMAGE"] = "http://hms.yogintechnologies.com/webservice/man_logo.png";
        
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
<?php
include 'include/Config.php';
$db = new DB_Class();

//$response = array("error" => FALSE);

if (isset($_POST['br_id'])) {

// receiving the post params
$BR_ID = $_POST['br_id'];
        
if (isset($_POST["type"])) { $Type  = $_POST["type"]; } else { $Type='DESC'; }; 
$Price_Type = $Type;
if (isset($_POST["page"])) { $page  = $_POST["page"]; } else { $page=1; }; 
if (isset($_POST["page_count"])) { $page_data  = $_POST["page_count"]; } else { $page_data=10; }; 
$start_from = ($page-1) * 10; 

$result = mysql_query("SELECT
        laboratory_master.lab_id,
        laboratory_master.br_id,
        laboratory_master.lab_name,
        laboratory_master.lab_timing,
        laboratory_master.lab_addr1,
        laboratory_master.lab_addr2,
        laboratory_master.lab_postal_code,
        laboratory_master.lab_phone,
        laboratory_master.lab_email,
        laboratory_master.lab_landline_no,
        laboratory_master.reg_via,
        laboratory_master.reg_frm_device,
        laboratory_master.created_date,
        laboratory_master.created_device,
        laboratory_master.created_ip,
        laboratory_master.created_by,
        laboratory_master.modify_date,
        laboratory_master.modify_device,
        laboratory_master.modify_ip,
        laboratory_master.modify_by
        FROM
        laboratory_master
        WHERE
        laboratory_master.br_id = '$BR_ID' LIMIT 10") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["lab"] = array();
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $lab = array();
                $lab["LABORATORY_NAME"] = $row["lab_name"];
                $lab["ADDRESS"] = $row["lab_addr1"].",".$row["lab_addr2"];
                $lab["PHONE"] = $row["lab_phone"];
                $lab["EMAIL"] = $row["lab_email"];
                $lab["IMAGE"] = "http://hms.yogintechnologies.com/webservice/man_logo.png";
                array_push($response["lab"], $lab);
        
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
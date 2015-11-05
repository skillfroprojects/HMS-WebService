<?php
include 'include/Config.php';
$db = new DB_Class();

//$response = array("error" => FALSE);

if (isset($_POST['doc_id'])) {

// receiving the post params
$doc_id = $_POST['doc_id'];
        
if (isset($_POST["type"])) { $Type  = $_POST["type"]; } else { $Type='DESC'; }; 
$Price_Type = $Type;
if (isset($_POST["page"])) { $page  = $_POST["page"]; } else { $page=1; }; 
if (isset($_POST["page_count"])) { $page_data  = $_POST["page_count"]; } else { $page_data=10; }; 
$start_from = ($page-1) * 10; 

$result = mysql_query("SELECT
        bed_allocation_master.allocation_id,
        bed_allocation_master.branch_id,
        bed_allocation_master.pat_admit_date,
        bed_allocation_master.pat_discharge_date,
        bed_allocation_master.room_no,
        bed_allocation_master.room_type,
        bed_allocation_master.bed_no,
        bed_allocation_master.pat_id,
        bed_allocation_master.doc_id,
        bed_allocation_master.staff_id,
        bed_allocation_master.reg_via,
        bed_allocation_master.reg_frm_device,
        bed_allocation_master.created_date,
        bed_allocation_master.created_device,
        bed_allocation_master.created_ip,
        bed_allocation_master.created_by,
        bed_allocation_master.modify_date,
        bed_allocation_master.modify_device,
        bed_allocation_master.modify_ip,
        bed_allocation_master.modify_by
        FROM
        bed_allocation_master
        WHERE
        bed_allocation_master.doc_id = '$doc_id' LIMIT 10") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["inpatient"] = array();
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $inpatient = array();
                $inpatient["PAT_NAME"] = $row["pat_id"];
                $inpatient["ROOM_TYPE"] = $row["room_type"];
                $inpatient["ROOM_NO"] = $row["room_no"];  
                $inpatient["BED_NO"] = $row["bed_no"];  
                array_push($response["inpatient"], $inpatient);  
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
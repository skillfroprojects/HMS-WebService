<?php
include 'include/Config.php';
$db = new DB_Class();

//$response = array("error" => FALSE);

if (isset($_POST['pat_id'])) {

// receiving the post params
$pat_id = $_POST['pat_id'];
        
if (isset($_POST["type"])) { $Type  = $_POST["type"]; } else { $Type='DESC'; }; 
$Price_Type = $Type;
if (isset($_POST["page"])) { $page  = $_POST["page"]; } else { $page=1; }; 
if (isset($_POST["page_count"])) { $page_data  = $_POST["page_count"]; } else { $page_data=10; }; 
$start_from = ($page-1) * 10; 

$result = mysql_query("SELECT
        lab_report_request_master.lab_request_id,
        lab_report_request_master.pat_id,
        lab_report_request_master.lab_id,
        lab_report_request_master.lab_requestor_id,
        lab_report_request_master.lab_requested_by,
        lab_report_request_master.lab_test_name,
        lab_report_request_master.lab_requested_date,
        lab_report_request_master.lab_request_completed_date,
        lab_report_request_master.lab_notify_to_doc,
        lab_report_request_master.lab_notify_to_pat,
        lab_report_request_master.lab_specimen,
        lab_report_request_master.lab_specimen_collected_by,
        lab_report_request_master.lab_sample_no,
        lab_report_request_master.lab_request_status,
        lab_report_request_master.lab_remarks,
        lab_report_request_master.lab_request_type,
        lab_report_request_master.reg_via,
        lab_report_request_master.reg_frm_device,
        lab_report_request_master.created_date,
        lab_report_request_master.created_device,
        lab_report_request_master.created_ip,
        lab_report_request_master.created_by,
        lab_report_request_master.modify_date,
        lab_report_request_master.modify_device,
        lab_report_request_master.modify_ip,
        lab_report_request_master.modify_by
        FROM
        lab_report_request_master
        WHERE
        lab_report_request_master.pat_id = '$pat_id' LIMIT 10") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["report"] = array();
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $report = array();
                $report["PAT_NAME"] = $row["pat_id"];
                $report["TEST_NAME"] = $row["lab_test_name"];
                $report["LAB_NAME"] = $row["lab_id"];  
                $report["TEST_REQUESTED_DATE"] = $row["requested_date"];  
                array_push($response["report"], $report);  
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
<?php
include 'include/Config.php';
$db = new DB_Class();

//$response = array("error" => FALSE);

if (isset($_GET['br_id'])) {

// receiving the post params
$BR_ID = $_GET['br_id'];
$DOC_ID = $_GET['surgery_doctor_id'];
        
if (isset($_GET["type"])) { $Type  = $_GET["type"]; } else { $Type='DESC'; }; 
$Price_Type = $Type;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
if (isset($_GET["page_count"])) { $page_data  = $_GET["page_count"]; } else { $page_data=10; }; 
$start_from = ($page-1) * 10; 

if (isset($_GET['surgery_doctor_id'])) {
    $DOCTOR_ID = "AND surgery_master.surgery_doctor_id = '$DOC_ID'";
}

$result = mysql_query("SELECT
            surgery_master.surgery_id,
            surgery_master.br_id,
            surgery_master.surgery_doctor_id,
            surgery_master.surgery_pat_id,
            surgery_master.surgery_pat_feedback,
            surgery_master.surgery_staff_id,
            surgery_master.surgery_date,
            surgery_master.surgery_time,
            surgery_master.surgery_type,
            surgery_master.surgery_anesthetist_id,
            surgery_master.surgery_ot_no,
            surgery_master.surgery_start_time,
            surgery_master.surgery_end_time,
            surgery_master.surgery_requester_id,
            surgery_master.surgery_requested_by,
            surgery_master.surgery_rquester_remarks,
            surgery_master.surgery_request_approve_by,
            surgery_master.surgery_approver_remarks,
            surgery_master.surgery_inventory_managed_by,
            surgery_master.surgery_pr_id,
            surgery_master.surgery_test_reports_id,
            surgery_master.surgery_remark_id,
            surgery_master.surgery_status,
            surgery_master.reg_via,
            surgery_master.reg_frm_device,
            surgery_master.created_date,
            surgery_master.created_device,
            surgery_master.created_ip,
            surgery_master.created_by,
            surgery_master.modify_date,
            surgery_master.modify_device,
            surgery_master.modify_ip,
            surgery_master.modify_by,
            doctor_master.DOC_NAME,
            patient_master.PAT_NAME,
            staff_master.staff_name
            FROM
            surgery_master
            INNER JOIN doctor_master ON surgery_master.surgery_doctor_id = doctor_master.DOC_ID
            INNER JOIN patient_master ON surgery_master.surgery_pat_id = patient_master.PAT_ID
            INNER JOIN staff_master ON surgery_master.surgery_staff_id = staff_master.staff_id
            INNER JOIN anesthetist_schedule_master ON surgery_master.surgery_anesthetist_id = anesthetist_schedule_master.ana_schedule_id
            WHERE
            surgery_master.br_id = '$BR_ID' $DOCTOR_ID") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["surgery"] = array();
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $surgery = array();
                $surgery["br_id"] = $row["br_id"];
                $surgery["surgery_doctor_id"] = $row["surgery_doctor_id"];
                $surgery["doc_name"] = $row["DOC_NAME"];
                $surgery["surgery_pat_id"] = $row["surgery_pat_id"];
                $surgery["pat_name"] = $row["PAT_NAME"];
                $surgery["surgery_staff_id"] = $row["surgery_staff_id"];
                $surgery["staff_name"] = $row["staff_name"];
                $surgery["surgery_date"] = $row["surgery_date"];
                $surgery["surgery_time"] = $row["surgery_time"];
                $surgery["surgery_type"] = $row["surgery_type"];
                $surgery["surgery_anesthetist_id"] = $row["surgery_anesthetist_id"];
                $surgery["surgery_ot_no"] = $row["surgery_ot_no"];
                $surgery["surgery_requested_by"] = $row["surgery_requested_by"];
                $surgery["surgery_inventory_managed_by"] = $row["surgery_inventory_managed_by"];
                array_push($response["surgery"], $surgery);  
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
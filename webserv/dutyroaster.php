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
emergency_visit_master.em_id,
emergency_visit_master.br_id,
emergency_visit_master.em_pat_name,
emergency_visit_master.em_gender,
emergency_visit_master.em_mode_of_arrival,
emergency_visit_master.em_accompanied_by,
emergency_visit_master.em_relatives_notified,
emergency_visit_master.em_priority,
emergency_visit_master.em_date,
emergency_visit_master.em_time_of_arrival,
emergency_visit_master.em_referral_doctor,
emergency_visit_master.em_ward_to_admit,
emergency_visit_master.em_bed_no,
emergency_visit_master.em_mlc,
emergency_visit_master.em_mlc_details,
emergency_visit_master.reg_via,
emergency_visit_master.reg_frm_device,
emergency_visit_master.created_date,
emergency_visit_master.created_device,
emergency_visit_master.created_ip,
emergency_visit_master.created_by,
emergency_visit_master.modify_date,
emergency_visit_master.modify_device,
emergency_visit_master.modify_ip,
emergency_visit_master.modify_by
FROM
emergency_visit_master
WHERE
emergency_visit_master.br_id = '$BR_ID' LIMIT 10") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["doc"] = array();
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $doc = array();
                $doc["Patient Name"] = $row["em_pat_name"];
                $doc["Priority"] = $row["em_priority"];
                $doc["Date Time"] = $row["em_date"].$row["em_time_of_arrival"];
                $doc["Medico Legal Details"] = $row["em_mlc"];
                $doc["IMAGE"] = "http://hms.yogintechnologies.com/webservice/man_logo.png";
                array_push($response["doc"], $doc);  
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
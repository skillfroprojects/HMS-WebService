<?php
include 'include/Config.php';
$db = new DB_Class();

//$response = array("error" => FALSE);

if (isset($_POST['br_id']) && isset($_POST['em_id'])) {

// receiving the post params
$BR_ID = $_POST['br_id'];
$EM_ID = $_POST['em_id'];
        
if (isset($_POST["type"])) { $Type  = $_POST["type"]; } else { $Type='DESC'; }; 
$Price_Type = $Type;
if (isset($_POST["page"])) { $page  = $_POST["page"]; } else { $page=1; }; 
if (isset($_POST["page_count"])) { $page_data  = $_POST["page_count"]; } else { $page_data=10; }; 
$start_from = ($page-1) * 10; 

$result = mysql_query("SELECT
doctor_master.DOC_NAME,
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
emergency_visit_master.em_mlc_details
FROM
emergency_visit_master
INNER JOIN doctor_master ON emergency_visit_master.em_referral_doctor = doctor_master.DOC_ID
WHERE
emergency_visit_master.br_id = '$BR_ID' AND emergency_visit_master.em_id = '$EM_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["message"] = "Data Fetched Successfully";
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $response["br_id"] = $row["br_id"];
        $response["em_id"] = $row["em_id"];
        $response["em_pat_name"] = $row["em_pat_name"];
        $response["em_gender"] = $row["em_gender"];
        $response["em_mode_of_arrival"] = $row["em_mode_of_arrival"];
        $response["em_accompanied_by"] = $row["em_accompanied_by"];
        $response["em_relatives_notified"] = $row["em_relatives_notified"];
        $response["em_priority"] = $row["em_priority"];
        $response["Date_Time"] = $row["em_date"].$row["em_time_of_arrival"];
        $response["em_referral_doctor"] = $row["em_referral_doctor"];
        $response["DOC_NAME"] = $row["DOC_NAME"];
        $response["em_ward_to_admit"] = $row["em_ward_to_admit"];
        $response["em_bed_no"] = $row["em_bed_no"];
        $response["em_mlc"] = $row["em_mlc"];
        $response["em_mlc_details"] = $row["em_mlc_details"];
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
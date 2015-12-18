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
patient_master.PAT_ID,
patient_master.PAT_NAME,
patient_master.BR_ID,
patient_master.PAT_TITLE,
patient_master.PAT_EMAIL,
patient_master.PAT_GENDER,
patient_master.PAT_MOBILE,
patient_master.PAT_ADDR1,
patient_master.PAT_ADDR2,
patient_master.PAT_STATE,
patient_master.PAT_POSTAL_CODE,
patient_master.PAT_BLOOD_GROUP,
patient_master.PAT_HEIGHT,
patient_master.PAT_WEIGHT,
patient_master.PAT_MARITAL_STATUS,
patient_master.PAT_EMP_STATUS,
patient_master.PAT_RACE,
patient_master.PAT_ETHNICITY,
patient_master.PAT_REF_PHYSICIAN,
patient_master.PAT_REF_PHYSICIAN_NO,
patient_master.PAT_RELATIVE_NAME,
patient_master.PAT_RELATION_TO_PATIENT,
patient_master.PAT_RELATIVE_ADDR,
patient_master.PAT_RELATIVE_STATE,
patient_master.PAT_RELATIVE_PINCODE,
patient_master.PAT_RELATIVE_PHONE,
patient_master.PAT_INS_NAME,
patient_master.PAT_INS_COMPANY,
patient_master.PAT_INS_ID,
patient_master.PAT_INS_COMPANY_NO,
patient_master.PAT_POLICY_ID,
patient_master.PAT_GROUP_NAME,
patient_master.PAT_INS_PARTY,
patient_master.PAT_PROOF_NAME,
patient_master.PAT_PROOF_NO,
patient_master.PAT_REL_WITH_PARTY,
patient_master.PAT_HEALTH_HISTORY_ID,
patient_master.PAT_CANCER_DETAILS,
patient_master.PAT_OTHER_MED_PROB,
patient_master.PAT_PAST_SURGERIES_ID,
patient_master.PAT_OTHER_SURGERIES,
patient_master.PAT_TOBACCO,
patient_master.PAT_SMOKING,
patient_master.PAT_ALCOHOL,
patient_master.PAT_FAMILY_MEMBER,
patient_master.PAT_HISTORY_ID,
patient_master.PAT_REG_VIA,
patient_master.PAT_REG_FRM_DEVICE,
patient_master.CREATED_DATE,
patient_master.CREATED_DEVICE,
patient_master.CREATED_IP,
patient_master.CREATED_BY,
patient_master.MODIFY_DATE,
patient_master.MODIFY_DEVICE,
patient_master.MODIFY_IP,
patient_master.MODIFY_BY,
bed_allocation_master.bed_allocation_id,
bed_allocation_master.br_id,
bed_allocation_master.admission_date,
bed_allocation_master.discharge_date,
bed_allocation_master.room_id,
bed_allocation_master.room_type_id,
bed_allocation_master.bed_no,
bed_allocation_master.pat_id,
bed_allocation_master.doctor_id,
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
        INNER JOIN patient_master ON bed_allocation_master.pat_id = patient_master.PAT_ID
WHERE
        bed_allocation_master.docTOR_id = '$doc_id' LIMIT 10") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["inpatient"] = array();
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $inpatient = array();
                $inpatient["PAT_NAME"] = $row["PAT_NAME"];
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
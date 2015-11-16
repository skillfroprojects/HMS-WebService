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
        prescription_master.presc_id,
        prescription_master.doc_id,
        prescription_master.pat_id,
        prescription_master.staff_id,
        prescription_master.presc_date,
        prescription_master.presc_no_of_days,
        prescription_master.drug_name,
        prescription_master.drug_strength,
        prescription_master.drugs_per_day,
        prescription_master.presc_notes,
        prescription_master.ward_no,
        prescription_master.room_no,
        prescription_master.bed_no,
        prescription_master.reg_via,
        prescription_master.reg_frm_device,
        prescription_master.created_date,
        prescription_master.created_device,
        prescription_master.created_ip,
        prescription_master.created_by,
        prescription_master.modify_date,
        prescription_master.modify_device,
        prescription_master.modify_ip,
        prescription_master.modify_by,
        doctor_master.DOC_ID,
        doctor_master.BR_ID,
        doctor_master.DOC_NAME,
        doctor_master.DOC_EMAIL,
        doctor_master.DOC_DATE_OF_BIRTH,
        doctor_master.DOC_GENDER,
        doctor_master.DOC_MOBILE,
        doctor_master.DOC_ADDRESS1,
        doctor_master.DOC_ADDRESS2,
        doctor_master.DOC_POSTAL_CODE,
        doctor_master.DOC_QUALIFICATION,
        doctor_master.DOC_EMERGENCY_AVAILABILITY,
        doctor_master.SP_ID,
        doctor_master.DOC_MED_LICENCE_NO,
        doctor_master.DOC_REG_VIA,
        doctor_master.DOC_REG_FRM_DEVICE,
        doctor_master.DOC_CREATED_DATE,
        doctor_master.DOC_CREATED_DEVICE,
        doctor_master.DOC_CREATED_IP,
        doctor_master.DOC_CREATED_BY,
        doctor_master.DOC_MODIFY_DATE,
        doctor_master.DOC_MODIFY_DEVICE,
        doctor_master.DOC_MODIFY_IP,
        doctor_master.DOC_MODIFY_BY,
        patient_master.PAT_ID,
        patient_master.PAT_NAME,
        patient_master.PAT_EMAIL,
        patient_master.PAT_GENDER,
        patient_master.PAT_MOBILE,
        patient_master.PAT_ADDR1,
        patient_master.PAT_ADDR2,
        patient_master.PAT_POSTAL_CODE,
        patient_master.PAT_BLOOD_GROUP,
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
        staff_master.staff_name,
        staff_master.staff_id,
        staff_master.br_id,
        staff_master.staff_email,
        staff_master.staff_dob,
        staff_master.staff_gender,
        staff_master.staff_phone,
        staff_master.staff_addr1,
        staff_master.staff_addr2,
        staff_master.staff_postal_code,
        staff_master.dept_id,
        staff_master.designation_id,
        staff_master.staff_joining_date,
        staff_master.reg_via,
        staff_master.reg_frm_device,
        staff_master.created_date,
        staff_master.created_device,
        staff_master.created_ip,
        staff_master.created_by,
        staff_master.modify_date,
        staff_master.modify_device,
        staff_master.modify_ip,
        staff_master.modify_by
        FROM
        prescription_master
        INNER JOIN doctor_master ON prescription_master.doc_id = doctor_master.DOC_ID
        INNER JOIN patient_master ON prescription_master.pat_id = patient_master.PAT_ID
        INNER JOIN staff_master ON prescription_master.staff_id = staff_master.staff_id
        WHERE
        prescription_master.pat_id = '$pat_id' LIMIT 10") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["eprescription"] = array();
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $eprescription = array();
                $eprescription["DOCTOR_NAME"] = $row["DOC_NAME"];
                $eprescription["PATIENT_NAME"] = $row["PAT_NAME"];
                $eprescription["STAFF_NAME"] = $row["staff_name"];
                $eprescription["PRESCRIPTION_DATE"] = $row["presc_date"];
                $eprescription["PRESC_NOOFDAYS"] = $row["presc_no_of_days"];
                $eprescription["DRUG_NAME"] = $row["drug_name"];
                $eprescription["DRUG_STRENGTH"] = $row["drug_strength"];
                $eprescription["DRUG_PERDAY"] = $row["druds_per_day"];
                $eprescription["PRESC_NOTES"] = $row["presc_notes"];
                $eprescription["WARD_NO"] = $row["ward_no"];
                $eprescription["ROOM_NO"] = $row["room_no"];
                $eprescription["BED_NO"] = $row["bed_no"];
                array_push($response["eprescription"], $eprescription);
        
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
<?php
include 'include/Config.php';
$db = new DB_Class();

$response = array("error" => FALSE);

if (isset($_POST['BR_ID'])) {

// receiving the post params
$BR_ID = $_POST['BR_ID'];
        
if (isset($_POST["type"])) { $Type  = $_POST["type"]; } else { $Type='DESC'; }; 
$Price_Type = $Type;
if (isset($_POST["page"])) { $page  = $_POST["page"]; } else { $page=1; }; 
if (isset($_POST["page_count"])) { $page_data  = $_POST["page_count"]; } else { $page_data=10; }; 
$start_from = ($page-1) * 10; 

$result = mysql_query("SELECT
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
        specialization_master.SP_ID,
        specialization_master.SP_NAME,
        specialization_master.REG_VIA,
        specialization_master.REG_FRM_DEVICE,
        specialization_master.CREATED_DATE,
        specialization_master.CREATED_DEVICE,
        specialization_master.CREATED_IP,
        specialization_master.CREATED_BY,
        specialization_master.MODIFY_DATE,
        specialization_master.MODIFY_DEVICE,
        specialization_master.MODIFY_IP,
        specialization_master.MODIFY_BY
        FROM
        doctor_master
        INNER JOIN specialization_master ON doctor_master.SP_ID = specialization_master.SP_ID
        WHERE
        doctor_master.BR_ID = '$BR_ID' LIMIT 10") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["doc"] = array();
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $doc = array();
                $doc["DOC_NAME"] = $row["DOC_NAME"];
                $doc["SP_NAME"] = $row["SP_NAME"];
                $doc["DOC_ADDRESS"] = $row["DOC_ADDRESS1"].$row["DOC_ADDRESS2"];
                $doc["DOC_EMERGENCY_AVAILABILITY"] = $row["DOC_EMERGENCY_AVAILABILITY"];
                        
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
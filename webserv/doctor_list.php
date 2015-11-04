<?php
include 'include/Config.php';
$db = new DB_Class();

// receiving the post params
$Doc_ID = $_GET['doc_id'];
//$Service_ID = $_GET['salon_id'];

$result_doc = mysql_query("Select * from doctor_master");
if (mysql_num_rows($result_doc) > 0) {
    
    while ($row_doc = mysql_fetch_array($result_doc)) {
        
      $Doc_NM = $row_doc["DOC_NAME"];
        
//if (isset($_GET["type"])) { $Type  = $_GET["type"]; } else { $Type='DESC'; }; 
//$Price_Type = $Type;
//if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
//if (isset($_GET["page_count"])) { $page_data  = $_GET["page_count"]; } else { $page_data=10; }; 
//$start_from = ($page-1) * 10; 
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
INNER JOIN specialization_master ON doctor_master.SP_ID = specialization_master.SP_ID") or die("Error");

if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["doc"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $doc = array();
                $doc["DOC_NAME"] = $row["DOC_NAME"];
                $doc["SP_NAME"] = $row["SP_NAME"];
                $doc["DOC_ADDRESS1"] = $row["DOC_ADDRESS1"];
                $doc["DOC_ADDRESS2"] = $row["DOC_ADDRESS2"];
                $doc["DOC_EMERGENCY_AVAILABILITY"] = $row["DOC_EMERGENCY_AVAILABILITY"];
                        

                array_push($response["doc"], $doc);
        
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 2;
    $response["message"] = "No data found";

    // echo no users JSON
    echo json_encode($response);
}
    }
}

?>
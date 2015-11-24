<?php
include 'include/Config.php';
$db = new DB_Class();

$PAT_ID = $_POST['PAT_ID'];
$BR_ID = $_POST['BR_ID'];
$result = mysql_query("SELECT
    *
    FROM
    patient_master
    WHERE
    patient_master.BR_ID = '$BR_ID' AND
    patient_master.PAT_ID = '$PAT_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["message"] = "Data Fetched";

    //$response["inpatient"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        //$Inpatient = array();
        $response["BR_ID"] = $row["BR_ID"];
        $response["PATIENT_ID"] = $row["PAT_ID"];
        $response["PAT_TITLE"] = $row["PAT_TITLE"];
        $response["PATIENT_NAME"] = $row["PAT_NAME"];
        $response["PAT_EMAIL"] = $row["PAT_EMAIL"];
        $response["PAT_GENDER"] = $row["PAT_GENDER"];
        $response["PAT_MOBILE"] = $row["PAT_MOBILE"];
        $response["PAT_ADDR1"] = $row["PAT_ADDR1"];
        $response["PAT_ADDR1"] = $row["PAT_ADDR1"];
        $response["PAT_ADDR2"] = $row["PAT_ADDR2"];
        $response["PAT_STATE"] = $row["PAT_STATE"];
        $response["PAT_POSTAL_CODE"] = $row["PAT_POSTAL_CODE"];
        $response["PAT_BLOOD_GROUP"] = $row["PAT_BLOOD_GROUP"];
        $response["PAT_HEIGHT"] = $row["PAT_HEIGHT"];
        $response["PAT_HEIGHT_UNIT"] = $row["PAT_HEIGHT_UNIT"];
        $response["PAT_WEIGHT"] = $row["PAT_WEIGHT"];
        $response["PAT_WEIGHT_UNIT"] = $row["PAT_WEIGHT_UNIT"];
        $response["PAT_MARITAL_STATUS"] = $row["PAT_MARITAL_STATUS"];
        $response["PAT_EMP_STATUS"] = $row["PAT_EMP_STATUS"];
        $response["PAT_REF_PHYSICIAN"] = $row["PAT_REF_PHYSICIAN"];
        $response["PAT_REF_PHYSICIAN_NO"] = $row["PAT_REF_PHYSICIAN_NO"];
        $response["PAT_RELATIVE_NAME"] = $row["PAT_RELATIVE_NAME"];
        $response["PAT_RELATION_TO_PATIENT"] = $row["PAT_RELATION_TO_PATIENT"];
        $response["PAT_RELATIVE_ADDR"] = $row["PAT_RELATIVE_ADDR"];
        $response["PAT_RELATIVE_STATE"] = $row["PAT_RELATIVE_STATE"];
        $response["PAT_RELATIVE_PINCODE"] = $row["PAT_RELATIVE_PINCODE"];
        $response["PAT_RELATIVE_PHONE"] = $row["PAT_RELATIVE_PHONE"];
        $response["PAT_INS_NAME"] = $row["PAT_INS_NAME"];
        $response["PAT_INS_COMPANY"] = $row["PAT_INS_COMPANY"];
        $response["PAT_INS_ID"] = $row["PAT_INS_ID"];
        $response["PAT_INS_COMPANY_NO"] = $row["PAT_INS_COMPANY_NO"];
        $response["PAT_POLICY_ID"] = $row["PAT_POLICY_ID"];
        $response["PAT_GROUP_NAME"] = $row["PAT_GROUP_NAME"];
        $response["PAT_INS_PARTY"] = $row["PAT_INS_PARTY"];
        $response["PAT_PROOF_NAME"] = $row["PAT_PROOF_NAME"];
        $response["PAT_PROOF_NO"] = $row["PAT_PROOF_NO"];
        $response["PAT_REL_WITH_PARTY"] = $row["PAT_REL_WITH_PARTY"];
        $response["PAT_HEALTH_HISTORY_ID"] = $row["PAT_HEALTH_HISTORY_ID"];
        $response["PAT_CANCER_DETAILS"] = $row["PAT_CANCER_DETAILS"];
        $response["PAT_OTHER_MED_PROB"] = $row["PAT_OTHER_MED_PROB"];
        $response["PAT_PAST_SURGERIES_ID"] = $row["PAT_PAST_SURGERIES_ID"];
        $response["PAT_OTHER_SURGERIES"] = $row["PAT_OTHER_SURGERIES"];
        $response["PAT_TOBACCO"] = $row["PAT_TOBACCO"];
        $response["PAT_SMOKING"] = $row["PAT_SMOKING"];
        $response["PAT_ALCOHOL"] = $row["PAT_ALCOHOL"];
        $response["PAT_FAMILY_MEMBER"] = $row["PAT_FAMILY_MEMBER"];
        $response["PAT_HISTORY_ID"] = $row["PAT_HISTORY_ID"];
    
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        //array_push($response["inpatient"], $Inpatient);
         //echo json_encode($response);
    }
   
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["response"] = 0;
    $response["message"] = "No data found";

    // echo no users JSON
    echo json_encode($response);
}
?>
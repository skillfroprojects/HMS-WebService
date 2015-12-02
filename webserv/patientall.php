<?php
include 'include/Config.php';
$db = new DB_Class();

if (isset($_POST['BR_ID']) && isset($_POST['PAT_TYPE'])) {
    $PAT_TYPE = $_POST['PAT_TYPE'];
    $BR_ID = $_POST['BR_ID'];
    $result = mysql_query("SELECT
        *
        FROM
        patient_master
        WHERE
        patient_master.BR_ID = '$BR_ID' AND
        patient_master.PAT_TYPE = '$PAT_TYPE'") or die("Error");

    if (mysql_num_rows($result) > 0) {
         // response
        $response["response"] = 1;
        $response["message"] = "Data Fetched";
        $response["inpatient"] = array();

        while ($row = mysql_fetch_array($result)) {
            // temp user array
            $Inpatient = array();
            $Inpatient["BR_ID"] = $row["BR_ID"];
            $Inpatient["PATIENT_ID"] = $row["PAT_ID"];
            $Inpatient["PAT_TITLE"] = $row["PAT_TITLE"];
            $Inpatient["PATIENT_NAME"] = $row["PAT_NAME"];
            $Inpatient["PAT_EMAIL"] = $row["PAT_EMAIL"];
            $Inpatient["PAT_GENDER"] = $row["PAT_GENDER"];
            $Inpatient["PAT_MOBILE"] = $row["PAT_MOBILE"];
            $Inpatient["PAT_ADDR1"] = $row["PAT_ADDR1"];
            $Inpatient["PAT_ADDR1"] = $row["PAT_ADDR1"];
            $Inpatient["PAT_ADDR2"] = $row["PAT_ADDR2"];
            $Inpatient["PAT_STATE"] = $row["PAT_STATE"];
            $Inpatient["PAT_POSTAL_CODE"] = $row["PAT_POSTAL_CODE"];
            $Inpatient["PAT_BLOOD_GROUP"] = $row["PAT_BLOOD_GROUP"];
            $Inpatient["PAT_HEIGHT"] = $row["PAT_HEIGHT"];
            $Inpatient["PAT_HEIGHT_UNIT"] = $row["PAT_HEIGHT_UNIT"];
            $Inpatient["PAT_WEIGHT"] = $row["PAT_WEIGHT"];
            $Inpatient["PAT_WEIGHT_UNIT"] = $row["PAT_WEIGHT_UNIT"];
            $Inpatient["PAT_MARITAL_STATUS"] = $row["PAT_MARITAL_STATUS"];
            $Inpatient["PAT_EMP_STATUS"] = $row["PAT_EMP_STATUS"];
            $Inpatient["PAT_REF_PHYSICIAN"] = $row["PAT_REF_PHYSICIAN"];
            $Inpatient["PAT_REF_PHYSICIAN_NO"] = $row["PAT_REF_PHYSICIAN_NO"];
            $Inpatient["PAT_RELATIVE_NAME"] = $row["PAT_RELATIVE_NAME"];
            $Inpatient["PAT_RELATION_TO_PATIENT"] = $row["PAT_RELATION_TO_PATIENT"];
            $Inpatient["PAT_RELATIVE_ADDR"] = $row["PAT_RELATIVE_ADDR"];
            $Inpatient["PAT_RELATIVE_STATE"] = $row["PAT_RELATIVE_STATE"];
            $Inpatient["PAT_RELATIVE_PINCODE"] = $row["PAT_RELATIVE_PINCODE"];
            $Inpatient["PAT_RELATIVE_PHONE"] = $row["PAT_RELATIVE_PHONE"];
            $Inpatient["PAT_INS_NAME"] = $row["PAT_INS_NAME"];
            $Inpatient["PAT_INS_COMPANY"] = $row["PAT_INS_COMPANY"];
            $Inpatient["PAT_INS_ID"] = $row["PAT_INS_ID"];
            $Inpatient["PAT_INS_COMPANY_NO"] = $row["PAT_INS_COMPANY_NO"];
            $Inpatient["PAT_POLICY_ID"] = $row["PAT_POLICY_ID"];
            $Inpatient["PAT_GROUP_NAME"] = $row["PAT_GROUP_NAME"];
            $Inpatient["PAT_INS_PARTY"] = $row["PAT_INS_PARTY"];
            $Inpatient["PAT_PROOF_NAME"] = $row["PAT_PROOF_NAME"];
            $Inpatient["PAT_PROOF_NO"] = $row["PAT_PROOF_NO"];
            $Inpatient["PAT_REL_WITH_PARTY"] = $row["PAT_REL_WITH_PARTY"];
            $Inpatient["PAT_HEALTH_HISTORY_ID"] = $row["PAT_HEALTH_HISTORY_ID"];
            $Inpatient["PAT_CANCER_DETAILS"] = $row["PAT_CANCER_DETAILS"];
            $Inpatient["PAT_OTHER_MED_PROB"] = $row["PAT_OTHER_MED_PROB"];
            $Inpatient["PAT_PAST_SURGERIES_ID"] = $row["PAT_PAST_SURGERIES_ID"];
            $Inpatient["PAT_OTHER_SURGERIES"] = $row["PAT_OTHER_SURGERIES"];
            $Inpatient["PAT_TOBACCO"] = $row["PAT_TOBACCO"];
            $Inpatient["PAT_SMOKING"] = $row["PAT_SMOKING"];
            $Inpatient["PAT_ALCOHOL"] = $row["PAT_ALCOHOL"];
            $Inpatient["PAT_FAMILY_MEMBER"] = $row["PAT_FAMILY_MEMBER"];
            $Inpatient["PAT_HISTORY_ID"] = $row["PAT_HISTORY_ID"];

            //$services["SERV_PRICE"] = $row["SERV_PRICE"];
            // push single product into final response array
            array_push($response["inpatient"], $Inpatient);
          
        }
        // echoing JSON response
        echo json_encode($response);
    } 
    else {
        // no products found
        $response["response"] = 0;
        $response["message"] = "No data found";

        // echo no users JSON
        echo json_encode($response);
    }
}else {
        // no products found
        $response["response"] = 2;
        $response["message"] = "Required Parameters Missing";

        // echo no users JSON
        echo json_encode($response);
}
?>
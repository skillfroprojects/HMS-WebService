<?php
include 'include/Config.php';
$db = new DB_Class();

if (isset($_POST['br_id'])  && isset($_POST['sp_id'])) {

    $BR_ID = $_POST['br_id'];
    $SP_ID = $_POST['sp_id'];
    
$result = mysql_query("SELECT
doctor_master.DOC_ID,
doctor_master.DOC_NAME
FROM
doctor_master
WHERE
FIND_IN_SET('$SP_ID',doctor_master.SP_ID) AND
doctor_master.BR_ID = '$BR_ID'") or die("Error");

    if (mysql_num_rows($result) > 0) {
         // response
        $response["response"] = 1;
        $response["anesthetist"] = array();

        while ($row = mysql_fetch_array($result)) {
            // temp user array
            $Anesthetist = array();
            $Anesthetist["DOC_ID"] = $row["DOC_ID"];
            $Anesthetist["DOC_NAME"] = $row["DOC_NAME"];
            
            //$services["SERV_PRICE"] = $row["SERV_PRICE"];
            // push single product into final response array
            array_push($response["anesthetist"], $Anesthetist);
        }

        // echoing JSON response
        echo json_encode($response);
    }  else {
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

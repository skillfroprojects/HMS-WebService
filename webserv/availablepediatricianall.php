<?php
include 'include/Config.php';
$db = new DB_Class();

if (isset($_GET['br_id'])) {

    $Br_Id = $_GET['br_id'];
    
$result = mysql_query("SELECT
doctor_master.DOC_ID,
doctor_master.DOC_NAME
FROM
doctor_master
INNER JOIN specialization_master ON doctor_master.SP_ID = specialization_master.SP_ID
WHERE
specialization_master.SP_NAME = 'pediatrician' AND
doctor_master.BR_ID = '$Br_Id'") or die("Error");

    if (mysql_num_rows($result) > 0) {
         // response
        $response["response"] = 1;
        $response["pediatrics"] = array();

        while ($row = mysql_fetch_array($result)) {
            // temp user array
            $Pediatrics = array();
            $Pediatrics["DOC_ID"] = $row["DOC_ID"];
            $Pediatrics["DOC_NAME"] = $row["DOC_NAME"];
            
            //$services["SERV_PRICE"] = $row["SERV_PRICE"];
            // push single product into final response array
            array_push($response["pediatrics"], $Pediatrics);
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

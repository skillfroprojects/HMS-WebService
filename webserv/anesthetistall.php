<?php
include 'include/Config.php';
$db = new DB_Class();

$ANA_SCHEDULE_ID = $_POST['ana_schedule_id'];
$BR_ID = $_POST['br_id'];
$result = mysql_query("SELECT
    *
    FROM
    anesthetist_schedule_master
    WHERE
    anesthetist_schedule_master.br_id = '$BR_ID' AND
    anesthetist_schedule_master.ana_schedule_id = '$ANA_SCHEDULE_ID'") or die("Error");

if (mysql_num_rows($result) > 0) 
    {
     // response
    $response["response"] = 1;
    $response["message"] = "Data Fetched";

    //$response["inpatient"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        //$Inpatient = array();
        $response["BR_ID"] = $row["br_id"];
        $response["ANA_PAT_ID"] = $row["ana_pat_id"];
        $response["ANA_BED_NP"] = $row["ana_bed_no"];
        $response["ANA_DATE"] = $row["ana_date"];
        $response["ANA_TIME"] = $row["ana_time"];
        $response["ANA_AVAILABLE_ANESTHETIST"] = $row["ana_available_anesthetist"];
        
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
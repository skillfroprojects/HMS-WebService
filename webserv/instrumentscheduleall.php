<?php
include 'include/Config.php';
$db = new DB_Class();

if (isset($_POST['br_id'])) {

    $BR_ID = $_POST['br_id'];

$result = mysql_query("SELECT * FROM inventory_schedule_master INNER JOIN inventory_service_master ON inventory_schedule_master.inv_service_id = inventory_service_master.inv_service_id INNER JOIN inventory_master ON inventory_schedule_master.inventory_id = inventory_master.inventory_id
ORDER BY inventory_schedule_master.inv_sch_id where inventory_schedule_master.br_id = '$BR_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["instrumentscheduleall"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Instrumentscheduleall = array();
        $Instrumentscheduleall["br_id"] = $row["br_id"];
        $Instrumentscheduleall["inventory_type"] = $row["inventory_type"];
        $Instrumentscheduleall["inventory_id"] = $row["inventory_id"];
        $Instrumentscheduleall["name"] = $row["name"];
        $Instrumentscheduleall["inv_service_id"] = $row["inv_service_id"];
        $Instrumentscheduleall["service_company_name"] = $row["service_company_name"];
        $Instrumentscheduleall["service_person_name"] = $row["service_person_name"];
        $Instrumentscheduleall["service_person_idproof"] = $row["service_person_idproof"];
        $Instrumentscheduleall["service_date"] = $row["service_date"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["instrumentscheduleall"], $Instrumentscheduleall);
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
}
else {
    $response["response"] = 3;
    $response["message"] = "Required parameters is missing!";
    echo json_encode($response);
}
?>
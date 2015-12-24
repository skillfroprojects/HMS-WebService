<?php
include 'include/Config.php';
$db = new DB_Class();

if (isset($_POST['br_id'])) {

    $BR_ID = $_POST['br_id'];

$result = mysql_query("SELECT * FROM ambulance_schedule_master INNER JOIN ambulance_master ON ambulance_schedule_master.ambulance_id = ambulance_master.ambulance_id where ambulance_schedule_master.br_id = '$BR_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["ambulancescheduleall"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Ambulancescheduleall = array();
        $Ambulancescheduleall["br_id"] = $row["br_id"];
        $Ambulancescheduleall["ambulance_type"] = $row["ambulance_type"];
        $Ambulancescheduleall["ambulance_id"] = $row["ambulance_id"];
        $Ambulancescheduleall["ambulance_no"] = $row["ambulance_no"];
        $Ambulancescheduleall["pat_name"] = $row["pat_name"];
        $Ambulancescheduleall["address"] = $row["address"];
        $Ambulancescheduleall["date"] = $row["date"];
        $Ambulancescheduleall["time"] = $row["time"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["ambulancescheduleall"], $Ambulancescheduleall);
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
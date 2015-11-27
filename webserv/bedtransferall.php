<?php
include 'include/Config.php';
$db = new DB_Class();

$PAT_ID = $_GET['pat_id'];
$BR_ID = $_GET['br_id'];

$result = mysql_query("SELECT
bed_allocation_master.bed_transfer_reason,
bed_allocation_master.pat_id,
bed_allocation_master.bed_no,
bed_allocation_master.discharge_date,
bed_allocation_master.admission_date,
bed_allocation_master.br_id,
bed_allocation_master.bed_allocation_id,
room_type_master.room_type,
doctor_master.DOC_NAME,
staff_master.staff_name
FROM
bed_allocation_master
INNER JOIN room_type_master ON bed_allocation_master.room_type_id = room_type_master.room_type_id
INNER JOIN doctor_master ON bed_allocation_master.doctor_id = doctor_master.DOC_ID
INNER JOIN staff_master ON bed_allocation_master.staff_id = staff_master.staff_id
WHERE
bed_allocation_master.pat_id = '$PAT_ID' AND
bed_allocation_master.br_id = '$BR_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["message"] = "Data Fetched";

    //$response["inpatient"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        //$Inpatient = array();
        
        $response["Br_id"] = $row["br_id"];
        $response["Admission_Date"] = $row["admission_date"];
        $response["Discharge_Date"] = $row["discharge_date"];
        $response["Room_Type"] = $row["room_type"];
        $response["Bed_No"] = $row["bed_no"];
        $response["Pat_Id"] = $row["pat_id"];
        $response["Doctor_Name"] = $row["DOC_NAME"];
        $response["Staff_Name"] = $row["staff_name"];
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
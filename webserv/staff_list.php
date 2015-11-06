<?php
include 'include/Config.php';
$db = new DB_Class();

//$response = array("error" => FALSE);

if (isset($_POST['BR_ID'])) {

// receiving the post params
$BR_ID = $_POST['BR_ID'];
        
if (isset($_POST["type"])) { $Type  = $_POST["type"]; } else { $Type='DESC'; }; 
$Price_Type = $Type;
if (isset($_POST["page"])) { $page  = $_POST["page"]; } else { $page=1; }; 
if (isset($_POST["page_count"])) { $page_data  = $_POST["page_count"]; } else { $page_data=10; }; 
$start_from = ($page-1) * 10; 

$result = mysql_query("SELECT
        staff_master.staff_id,
        staff_master.br_id,
        staff_master.staff_name,
        staff_master.staff_email,
        staff_master.staff_dob,
        staff_master.staff_gender,
        staff_master.staff_phone,
        staff_master.staff_addr1,
        staff_master.staff_addr2,
        staff_master.staff_postal_code,
        staff_master.dept_id,
        staff_master.designation_id,
        staff_master.staff_joining_date,
        staff_master.reg_via,
        staff_master.reg_frm_device,
        staff_master.created_date,
        staff_master.created_device,
        staff_master.created_ip,
        staff_master.created_by,
        staff_master.modify_date,
        staff_master.modify_device,
        staff_master.modify_ip,
        staff_master.modify_by,
        schedule_master.schedule_id,
        schedule_master.schedule_emp_type,
        schedule_master.schedule_emp_id,
        schedule_master.schedule_shift_id,
        schedule_master.schedule_pat_id,
        schedule_master.schedule_from_date,
        schedule_master.schedule_to_date
        FROM
        staff_master
        INNER JOIN schedule_master ON schedule_master.schedule_emp_id = staff_master.staff_id
        WHERE
        staff_master.br_id = '$BR_ID' LIMIT 10") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["staff"] = array();
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $staff = array();
                $staff["STAFF_NAME"] = $row["staff_name"];
                $staff["DESIGNATION"] = $row["designation_name"];
                $staff["PHONE"] = $row["staff_phone"];
                $staff["IMAGE"] = "http://hms.yogintechnologies.com/webservice/man_logo.png";     
                array_push($response["staff"], $staff);
        
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
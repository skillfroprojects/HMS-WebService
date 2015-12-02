<?php
include 'include/Config.php';
$db = new DB_Class();

//$response = array("error" => FALSE);

if (isset($_POST['br_id']) && isset($_POST['staff_id'])) {

// receiving the post params
$BR_ID = $_POST['br_id'];
$STAFF_ID = $_POST['staff_id'];
        
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
        staff_master.staff_joining_date,
        designation_master.designation_name,
        department_master.dept_name
        FROM
        staff_master
        INNER JOIN designation_master ON staff_master.designation_id = designation_master.designation_id
        INNER JOIN department_master ON staff_master.dept_id = department_master.dept_id
        WHERE
        staff_master.br_id = '$BR_ID' AND
        staff_master.staff_id = '$STAFF_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["staff"] = array();
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $staff = array();
                $staff["staff_id"] = $row["staff_id"];
                $staff["staff_name"] = $row["staff_name"];
                $staff["staff_email"] = $row["staff_email"];
                $staff["staff_dob"] = $row["staff_dob"];
                $staff["staff_gender"] = $row["staff_gender"];
                $staff["staff_phone"] = $row["staff_phone"];
                $staff["staff_addr"] = $row["staff_addr1"].$row["staff_addr2"];
                $staff["staff_postal_code"] = $row["staff_postal_code"];
                $staff["staff_joining_date"] = $row["staff_joining_date"];
                $staff["dept_name"] = $row["dept_name"];
                $staff["designation_name"] = $row["designation_name"];
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
<?php
include 'include/Config.php';
$db = new DB_Class();

//$response = array("error" => FALSE);

if (isset($_POST['br_id']) && isset($_POST['lab_id'])) {

// receiving the post params
$BR_ID = $_POST['br_id'];
$LAB_ID = $_POST['lab_id'];

        $result = mysql_query("SELECT
        pathologist_master.pathologist_id,
        pathologist_master.br_id,
        pathologist_master.pathologist_name,
        pathologist_master.pathologist_addr1,
        pathologist_master.pathologist_addr2,
        pathologist_master.pathologist_postal_code,
        pathologist_master.pathologist_phone,
        pathologist_master.pathologist_email,
        pathologist_master.pathologist_other_no,
        laboratory_master.lab_name
        FROM
        pathologist_master
        INNER JOIN laboratory_master ON pathologist_master.lab_id = laboratory_master.lab_id
        WHERE
        pathologist_master.br_id = '$BR_ID' AND
        pathologist_master.lab_id = '$LAB_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
     // response
    $response["response"] = 1;
    $response["patho"] = array();
    
    while ($row = mysql_fetch_array($result)) {
       
        // temp user array
        $Patho = array();
                $Patho["pathologist_id"] = $row["pathologist_id"];
                $Patho["pathologist_name"] = $row["pathologist_name"];
                $Patho["pathologist_addr"] = $row["pathologist_addr1"].$row["pathologist_addr2"];
                $Patho["pathologist_postal_code"] = $row["pathologist_postal_code"];
                $Patho["pathologist_phone"] = $row["pathologist_phone"];
                $Patho["pathologist_email"] = $row["pathologist_email"];
                $Patho["pathologist_other_no"] = $row["pathologist_other_no"];
                $Patho["IMAGE"] = "http://hms.yogintechnologies.com/webservice/man_logo.png";
                array_push($response["patho"], $Patho);
        
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
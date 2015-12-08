<?php
include 'include/Config.php';
$db = new DB_Class();


if (isset($_POST['br_id'])) {

    $BR_ID = $_POST['br_id'];

$result = mysql_query("Select * from department_master where br_id = '$BR_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
   // response
    $response["response"] = 1;
    $response["department"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Department = array();
        $Department["br_id"] = $row["br_id"];
        $Department["dept_id"] = $row["dept_id"];
        $Department["dept_name"] = $row["dept_name"];
        $Department["dept_email"] = $row["dept_email"];
        $Department["dept_phone"] = $row["dept_phone"];
        $Department["dept_desc"] = $row["dept_desc"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["department"], $Department);
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
<?php
include 'include/Config.php';
$db = new DB_Class();
if (isset($_POST['br_id'])) {

    $BR_ID = $_POST['br_id'];
$result = mysql_query("Select * from staff_master where BR_ID = '$BR_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
    // response
    $response["response"] = 1;
    $response["staff"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Staff = array();
        $Staff["staff_id"] = $row["staff_id"];
        $Staff["staff_name"] = $row["staff_name"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["staff"], $Staff);
    }
  
    // echoing JSON response
    echo json_encode($response);
} 
}
else {
    // no products found
    $response["response"] = 0;
    $response["message"] = "No data found";

    // echo no users JSON
    echo json_encode($response);
}
?>
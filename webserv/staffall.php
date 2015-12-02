<?php
include 'include/Config.php';
$db = new DB_Class();

if (isset($_POST['br_id'])) {

$BR_ID = $_POST['br_id'];
$result = mysql_query("Select * from staff_master where staff_master.BR_ID = '$BR_ID'") or die("Error");

if (mysql_num_rows($result) > 0) {
    // response
    $response["response"] = 1;
    $response["staff"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $Staff = array();
        $Staff["staff_id"] = $row["staff_id"];
        $Staff["br_id"] = $row["br_id"];
        $Staff["staff_name"] = $row["staff_name"];
        $Staff["staff_email"] = $row["staff_email"];
        $Staff["staff_type"] = $row["staff_type"];
        $Staff["staff_dob"] = $row["staff_dob"];
        $Staff["staff_gender"] = $row["staff_gender"];
        $Staff["staff_phone"] = $row["staff_phone"];
        $Staff["staff_addr1"] = $row["staff_addr1"];
        $Staff["staff_addr2"] = $row["staff_addr2"];
        $Staff["staff_postal_code"] = $row["staff_postal_code"];
        $Staff["dept_id"] = $row["dept_id"];
        $Staff["designation_id"] = $row["designation_id"];
        $Staff["staff_joining_date"] = $row["staff_joining_date"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["staff"], $Staff);
    }
  
    // echoing JSON response
    echo json_encode($response);
} 
else {
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
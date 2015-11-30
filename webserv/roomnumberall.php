<?php
include 'include/Config.php';
$db = new DB_Class();
if (isset($_POST['room_type'])) {

    $Room_Type = $_POST['room_type'];
$result = mysql_query("Select * from room_master where room_master.room_type='$Room_Type'") or die("Error");

if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["roomnumber"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // response
        $response["response"] = 1;
        // temp user array
        $Roomnumber = array();
        $Roomnumber["room_id"] = $row["room_id"];
        $Roomnumber["br_id"] = $row["br_id"];
        $Roomnumber["room_no"] = $row["room_no"];
        $Roomnumber["room_type"] = $row["room_type"];
        $Roomnumber["room_charges"] = $row["room_charges"];
        //$services["SERV_PRICE"] = $row["SERV_PRICE"];
        // push single product into final response array
        array_push($response["roomnumber"], $Roomnumber);
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
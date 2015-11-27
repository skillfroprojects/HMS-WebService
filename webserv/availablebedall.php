<?php
include 'include/Config.php';
$db = new DB_Class();

if (isset($_POST['room_type'])) {

    $Room_Type = $_POST['room_type'];
    
$result = mysql_query("SELECT * FROM bed_master WHERE bed_master.room_type = '$Room_Type' AND bed_master.bed_status = '0'") or die("Error");

    if (mysql_num_rows($result) > 0) {
         // response
        $response["response"] = 1;
        $response["bednumber"] = array();

        while ($row = mysql_fetch_array($result)) {
            // temp user array
            $Bednumber = array();
            $Bednumber["bed_no"] = $row["bed_no"];
            //$services["SERV_PRICE"] = $row["SERV_PRICE"];
            // push single product into final response array
            array_push($response["bednumber"], $Bednumber);
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
}
else {
    $response["response"] = 3;
    $response["message"] = "Required parameters is missing!";
    echo json_encode($response);
}
?>

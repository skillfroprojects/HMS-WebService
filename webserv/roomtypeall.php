<?php
include 'include/Config.php';
$db = new DB_Class();
if (isset($_POST['br_id'])) {

    $BR_ID = $_POST['br_id'];
    $result = mysql_query("Select * from room_type_master where room_type_master.br_id = '$BR_ID'") or die("Error");

    if (mysql_num_rows($result) > 0) {
        // looping through all results
        // products node
        $response["roomtype"] = array();

        while ($row = mysql_fetch_array($result)) {
            // response
            $response["response"] = 1;
            // temp user array
            $Roomtype = array();
            $Roomtype["room_type_id"] = $row["room_type_id"];
            $Roomtype["br_id"] = $row["br_id"];
            $Roomtype["room_type"] = $row["room_type"];
            //$services["SERV_PRICE"] = $row["SERV_PRICE"];
            // push single product into final response array
            array_push($response["roomtype"], $Roomtype);
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
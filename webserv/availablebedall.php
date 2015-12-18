<?php
include 'include/Config.php';
$db = new DB_Class();

if (isset($_POST['room_type_id']) && isset($_POST['br_id'])) {

    $Room_Type = $_POST['room_type_id'];
    $Br_Id = $_POST['br_id'];
    
$result = mysql_query("SELECT * FROM bed_master WHERE bed_master.room_type_id = '$Room_Type' AND bed_master.bed_status = '0' AND bed_master.br_id = '$Br_Id'") or die("Error");

    if (mysql_num_rows($result) > 0) {
         // response
        $response["response"] = 1;
        $response["bednumber"] = array();

        while ($row = mysql_fetch_array($result)) {
            // temp user array
            $Bednumber = array();
            $Bednumber["bed_no"] = $row["bed_no"];
            $Bednumber["br_id"] = $row["br_id"];
            $Bednumber["room_id"] = $row["room_id"];
            $Bednumber["room_type_id"] = $row["room_type_id"];
            $Bednumber["bed_status"] = $row["bed_status"];
            //$services["SERV_PRICE"] = $row["SERV_PRICE"];
            // push single product into final response array
            array_push($response["bednumber"], $Bednumber);
        }

        // echoing JSON response
        echo json_encode($response);
    }  else {
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

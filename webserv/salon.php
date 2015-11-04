<?php
include_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_GET['salon_id'])) {

    // receiving the post params
    $Salon_UserID = $_GET['salon_id'];
if (isset($_GET["type"])) { $Type  = $_GET["type"]; } else { $Type='DESC'; }; 
$Price_Type = $Type;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
if (isset($_GET["page_count"])) { $page_data  = $_GET["page_count"]; } else { $page_data=10; }; 
echo $start_from = ($page-1) * 5; 
    // check if user is already existed with the same email
    $result = mysql_query("SELECT
deal_master.D_ID,
deal_master.DEAL_ID,
deal_master.DEAL_SALON_ID,
deal_master.DEAL_NAME,
deal_master.DEAL_SALON_SERV_DESCRIPTOR,
deal_master.DEAL_START_DATE,
deal_master.DEAL_END_DATE,
deal_master.DEAL_OPEN_TIME,
deal_master.DEAL_CLOSE_TIME,
deal_master.DEAL_TYPE,
deal_master.DEAL_SERVICE_ID,
deal_master.DEAL_PRICE,
deal_master.DEAL_ORG_PRICE,
deal_master.DEAL_DISC,
deal_master.DEAL_IS_ACTIVE,
deal_master.DEAL_CREATED_DATE,
deal_master.DEAL_CREATED_IP,
deal_master.DEAL_CREATED_BY,
deal_master.DEAL_MODIFY_DATE,
deal_master.DEAL_MODIFY_IP,
deal_master.DEAL_MODIFY_BY,
salon_master.SALON_ID,
salon_master.SALON_UNIQ_ID,
salon_master.SALON_NHB_ID,
salon_master.SALON_NAME,
salon_master.SALON_OWNER_NAME,
salon_master.SALON_EMAIL,
salon_master.SALON_OWNER_EMAIL,
salon_master.SALON_PHONE,
salon_master.SALON_OWNER_PHONE,
salon_master.SALON_ADDR,
salon_master.SALON_CITY_ID,
salon_master.SALON_DESC,
salon_master.SALON_IMG_ID,
salon_master.SALON_OPEN_TIME,
salon_master.SALON_CLOSE_TIME,
salon_master.SALON_LONGITUDE,
salon_master.SALON_LATITUDE,
salon_master.SALON_SERV_ID,
salon_master.SALON_NE_ID,
salon_master.SALON_CREATED_DATE,
salon_master.SALON_CREATED_IP,
salon_master.SALON_CREATED_BY,
salon_master.SALON_MODIFY_DATE,
salon_master.SALON_MODIFY_IP,
salon_master.SALON_MODIFY_BY
FROM
deal_master
INNER JOIN salon_master ON salon_master.SALON_ID = deal_master.DEAL_SALON_ID
WHERE
deal_master.DEAL_SALON_ID = '$Salon_UserID'
ORDER BY
deal_master.DEAL_PRICE $Price_Type") or die("Error");

if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["salon"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $salon = array();
        $salon["SALON_NAME"] = $row["SALON_NAME"];
            $salon["SALON_ID"] = $row["SALON_ID"];
            $salon["SALON_OWNER_NAME"] = $row["SALON_OWNER_NAME"];
            $salon["SALON_EMAIL"] = $row["SALON_EMAIL"];
            $salon["SALON_OWNER_EMAIL"] = $row["SALON_OWNER_EMAIL"];
            $salon["SALON_PHONE"] = $row["SALON_PHONE"];
            $salon["SALON_OWNER_PHONE"] = $row["SALON_OWNER_PHONE"];
            $salon["SALON_ADDR"] = $row["SALON_ADDR"];
            $salon["SALON_CITY_ID"] = $row["SALON_CITY_ID"];
            $salon["SALON_LONGITUDE"] = $row["SALON_LONGITUDE"];
            $salon["SALON_LATITUDE"] = $row["SALON_LATITUDE"];
            $salon["SALON_LATITUDE"] = $row["SALON_LATITUDE"];
            $salon["SALON_IMG_ID"] = $row["SALON_IMG_ID"];
            $salon["SALON_NHB_ID"] = $row["SALON_NHB_ID"];
            $deal["DEAL_ID"] = $row["DEAL_ID"];
            $salon["DEAL_NAME"] = $row["DEAL_NAME"];
            $salon["DEAL_DISC"] = $row["DEAL_DISC"];
            $salon["DEAL_TYPE"] = $row["DEAL_TYPE"];
            $St_Dt = $row["DEAL_START_DATE"];
            $salon["DEAL_START_DATE"] = date("m/d/Y", strtotime($St_Dt));
            $Ed_dt = $row["DEAL_END_DATE"];
            $salon["DEAL_END_DATE"] = date("m/d/Y", strtotime($Ed_dt));
            $St_Time = $row["DEAL_OPEN_TIME"];
            $Ed_Time = $row["DEAL_CLOSE_TIME"];
            $salon["DEAL_OPEN_TIME"] = date('H:i', strtotime($St_Time));
            $salon["DEAL_CLOSE_TIME"] = date('H:i', strtotime($Ed_Time));
            $salon["DEAL_TYPE"] = $row["DEAL_TYPE"];
            $salon["DEAL_PRICE"] = $row["DEAL_PRICE"];
            $salon["DEAL_ORG_PRICE"] = $row["DEAL_ORG_PRICE"];
            //$salon["DEAL_SERVICE_ID"] = $row["DEAL_SERVICE_ID"];        

            $DEAL_PRICE = $row["DEAL_PRICE"];
            $ORG_PRICE = $row["DEAL_ORG_PRICE"];

            $PRICE = ($ORG_PRICE - $DEAL_PRICE) / $ORG_PRICE * 100;
            $salon["DEAL_PRICE_PERCENTAGE"] = number_format($PRICE,0);
            array_push($response["salon"], $salon);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";

    // echo no users JSON
    echo json_encode($response);
}
} else {
    $response["missing"] = 4;
    $response["error_msg"] = "Required parameters is missing!";
    echo json_encode($response);
}

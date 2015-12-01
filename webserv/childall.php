<?php
include 'include/Config.php';
$db = new DB_Class();

if (isset($_POST['br_id'])) {
    
    $BR_ID = $_POST['br_id'];
    $result = mysql_query("SELECT
    children_master.child_id,
    children_master.br_id,
    children_master.child_name,
    children_master.child_dob,
    children_master.child_gender,
    children_master.child_resides_with,
    children_master.child_mail_to,
    children_master.child_mandatory_email,
    children_master.child_ins_subscriber_name,
    children_master.child_ins_no,
    children_master.child_ins_member_id,
    children_master.child_mother_name,
    children_master.child_mother_dob,
    children_master.child_mother_addr,
    children_master.child_mother_postal_code,
    children_master.child_mother_phone,
    children_master.child_mother_email,
    children_master.child_father_name,
    children_master.child_father_dob,
    children_master.child_father_addr,
    children_master.child_father_postal_code,
    children_master.child_father_phone,
    children_master.child_father_email,
    children_master.child_emer_name,
    children_master.child_emer_relation,
    children_master.child_emer_phone
    FROM
    children_master
    WHERE
    children_master.br_id = '$BR_ID'") or die("Error");

    if (mysql_num_rows($result) > 0) {
         // response
        
        $response["child"] = array();

        while ($row = mysql_fetch_array($result)) {
            // temp user array
            $Child = array();
            $Child["BR_ID"] = $row["br_id"];
            $Child["child_id"] = $row["child_id"];
            $Child["child_name"] = $row["child_name"];
            $Child["child_dob"] = $row["child_dob"];
            $Child["child_gender"] = $row["child_gender"];
            $Child["child_resides_with"] = $row["child_resides_with"];
            $Child["child_mail_to"] = $row["child_mail_to"];
            $Child["child_mandatory_email"] = $row["child_mandatory_email"];
            $Child["child_ins_subscriber_name"] = $row["child_ins_subscriber_name"];
            $Child["child_ins_no"] = $row["child_ins_no"];
            $Child["child_ins_member_id"] = $row["child_ins_member_id"];
            $Child["child_mother_name"] = $row["child_mother_name"];
            $Child["child_mother_dob"] = $row["child_mother_dob"];
            $Child["child_mother_addr"] = $row["child_mother_addr"];
            $Child["child_mother_postal_code"] = $row["child_mother_postal_code"];
            $Child["child_mother_phone"] = $row["child_mother_phone"];
            $Child["child_mother_email"] = $row["child_mother_email"];
            $Child["child_father_name"] = $row["child_father_name"];
            $Child["child_father_dob"] = $row["child_father_dob"];
            $Child["child_father_addr"] = $row["child_father_addr"];
            $Child["child_father_postal_code"] = $row["child_father_postal_code"];
            $Child["child_father_phone"] = $row["child_father_phone"];
            $Child["child_father_email"] = $row["child_father_email"];
            $Child["child_emer_name"] = $row["child_emer_name"];
            $Child["child_emer_relation"] = $row["child_emer_relation"];
            $Child["child_emer_phone"] = $row["child_emer_phone"];
            
            //$services["SERV_PRICE"] = $row["SERV_PRICE"];
            // push single product into final response array
            array_push($response["child"], $Child);
          
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
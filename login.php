<?php

require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['email']) && isset($_POST['password'])) {

 $email = $_POST['email'];
    $password = $_POST['password'];

    // get the user by email and password
    $user = $db->getUserByEmailAndPassword($email, $password);

    if ($user) {
        $response["success"] = 1;
        $response["admin_id"] = $user["admin_id"];
        $response["admin_name"] = $user["ADMIN_UNIQ_ID"];
        $response["admin_email"] = $user["ADMIN_USERNAME"];
        $response["message"] = "Login Success.";
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = 2;
        $response["error_msg"] = "Login credentials are wrong. Please try again!";
        echo json_encode($response);
    }
}
else {
    // required post params is missing
    $response["missing"] = 3;
    $response["error_msg"] = "Required parameters is missing!";
    echo json_encode($response);
}
?>


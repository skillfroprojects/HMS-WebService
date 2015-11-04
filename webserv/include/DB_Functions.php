<?php
include_once 'Config.php';
class DB_Functions {

    private $conn;

public function __construct() 
{
        $db = new DB_Class();
}

    // destructor
    function __destruct() {
        
    }
function mt_rand_str ($l, $c = 'ABCDEFGHIJKLMNOPQRSTYVWXYZabcdefghijklmnopqrstuvwxyz1234567890') {
    for ($s = '', $cl = strlen($c)-1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i);
    return $s;
}
    /**
     * Storing new user
     * returns user details
     */
    public function loginUser($Login_uname,$Login_name,$Login_password,$Login_type) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Login_Master (Login_uname,Login_name,Login_password,Login_type,Reg_Via,Reg_frm_Device,Created_Date,Created_Device,Created_IP,Created_By,Modify_Date,Modify_Device,Modify_IP,Modify_By) VALUES('$Login_uname','$Login_name','$Login_password','$Login_type', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    public function storeUser($Pat_Name,$Pat_Email,$Pat_Gender,$Pat_Mobile,$Pat_Addr1,$Pat_Addr2,$Pat_Postal_Code,$Pat_Blood_Group) {
        $CR_Date = date('d/m/Y');
        $result = mysql_query("INSERT INTO Patient_Master (PAT_NAME,PAT_EMAIL,PAT_GENDER,PAT_MOBILE,PAT_ADDR1,PAT_ADDR2,PAT_POSTAL_CODE,PAT_BLOOD_GROUP,CREATED_DATE,CREATED_IP,CREATED_BY,MODIFY_DATE,MODIFY_IP,MODIFY_BY) VALUES('$Pat_Name', '$Pat_Email','$Pat_Gender','$Pat_Mobile','$Pat_Addr1','$Pat_Addr2','$Pat_Postal_Code','$Pat_Blood_Group','$CR_Date','100','Admin','$CR_Date','100','Amin')");
        return $result;
    }
     public function insertBranch($Branch_Name, $Hospital_ID,$Branch_Location,$Branch_Addr1,$Branch_Addr2,$Branch_Postal_Code,$Branch_Email,$Branch_Phone,$Branch_Phone_Other) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Branch_Master(HS_ID,BR_NAME,BR_LOCATION,BR_ADDR1,BR_ADDR2,BR_POSTAL_CODE,BR_EMAIL,BR_PHONE,BR_PHONE_OTHER,BR_REG_VIA, BR_REG_FRM_DEVICE,BR_CREATED_DATE,BR_CREATED_DEVICE,BR_CREATED_IP,BR_CREATED_BY,BR_MODIFY_DATE,BR_MODIFY_DEVICE,BR_MODIFY_IP,BR_MODIFY_BY) VALUES('$Hospital_ID','$Branch_Name','$Branch_Location','$Branch_Addr1','$Branch_Addr2','$Branch_Postal_Code','$Branch_Email','$Branch_Phone','$Branch_Phone_Other', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    public function insertSpecialization($Sp_Name) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Specialization_Master (SP_NAME, REG_VIA, REG_FRM_DEVICE,CREATED_DATE, CREATED_DEVICE, CREATED_IP, CREATED_BY, MODIFY_DATE, MODIFY_DEVICE, MODIFY_IP, MODIFY_BY) VALUES('$Sp_Name', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
     public function insertDoctor($Br_ID, $Doc_Name,$Doc_Email,$Doc_Date_Of_Birth,$Doc_Gender,$Doc_Mobile,$Doc_Address1,$Doc_Address2,$Doc_Postal_Code,$Doc_Qualification, $Doc_Emergency_Availability,$Sp_ID, $Doc_Med_Licence_no) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Doctor_Master(BR_ID,DOC_NAME,DOC_EMAIL,DOC_DATE_OF_BIRTH,DOC_GENDER,DOC_MOBILE,DOC_ADDRESS1,DOC_ADDRESS2,DOC_POSTAL_CODE,DOC_QUALIFICATION, DOC_EMERGENCY_AVAILABILITY,SP_ID, DOC_MED_LICENCE_NO, DOC_REG_VIA, DOC_REG_FRM_DEVICE,DOC_CREATED_DATE, DOC_CREATED_DEVICE,DOC_CREATED_IP,DOC_CREATED_BY,DOC_MODIFY_DATE, DOC_MODIFY_DEVICE,DOC_MODIFY_IP,DOC_MODIFY_BY) VALUES('$Br_ID','$Doc_Name','$Doc_Email','$Doc_Date_Of_Birth','$Doc_Gender','$Doc_Mobile','$Doc_Address1','$Doc_Address2','$Doc_Postal_Code','$Doc_Qualification', '$Doc_Emergency_Availability','$Sp_ID', '$Doc_Med_Licence_no', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    public function updateUser($Cust_UserID,$Cust_Name,$Cust_Email,$Cust_Phone) {
        
        $result = mysql_query("Update Customer_master set Cust_Name = '$Cust_Name', Cust_Phone ='$Cust_Phone', Cust_Email = '$Cust_Email' where Cust_ID = '$Cust_UserID' ");
        return $result;
    }
    
    public function register_appointment($App_Date,$App_Time,$Doc_Name,$Pat_Name,$Pat_Email,$Pat_Mobile,$Br_Name) {

        $result = mysql_query("INSERT INTO appointment_master(APP_DATE,APP_TIME,DOC_NAME,PAT_NAME,PAT_EMAIL,PAT_MOBILE,BR_NAME) VALUES('$App_Date','$App_Time','$Doc_Name','$Pat_Name','$Pat_Email','$Pat_Mobile','$Br_Name')");
        return $result;
        
    }
    public function changePassword($Cust_UserID, $Cust_NewPassword, $Cust_OldPassword) {
        
        $result = mysql_query("Select * from Customer_master where Cust_ID= '$Cust_UserID' and Cust_Password='$Cust_OldPassword'");
        //$result = mysql_query("Update Customer_master set Cust_Password = '$Cust_NewPassword' where Cust_ID = '$Cust_UserID' ");
        $user_data = mysql_fetch_array($result);
        $no_rows = mysql_num_rows($result);
        if ($no_rows == 1) {
            // user existed 
            //$stmt->close();
            $result_update = mysql_query("Update Customer_master set Cust_Password = '$Cust_NewPassword' where Cust_ID = '$Cust_UserID' ");
            //$user['Cust_ID'] = $user_data['Cust_ID'];
            return $result_update;
        } else {
            // user not existed
            //$stmt->close();
            return NULL;
        }
       // return $result;
    }
       public function resetPassword($Cust_Id,$Cust_Email) {

        //$result = mssql_query("SELECT * FROM Login_Master where Login_UserName =  $email And Login_Password = $password");
        $user = mysql_query("SELECT Cust_ID from Customer_master WHERE Cust_Email = '$Cust_Email' and Cust_ID = '$Cust_Id'");
        $user_data = mysql_fetch_array($user);
        $no_rows = mysql_num_rows($user);
		
        if ($no_rows == 1) {
            // user existed 
            //$stmt->close();
            $user['Cust_ID'] = $user_data['Cust_ID'];
            return $user_data;
        } else {
            // user not existed
            //$stmt->close();
            return NULL;
        }
    }     
    /**
     * Get user by email and password
     */
    public function getUserByEmailAndPassword($email, $password) {

        //$result = mssql_query("SELECT * FROM Login_Master where Login_UserName =  $email And Login_Password = $password");
        $user = mysql_query("SELECT * from Login_master WHERE Login_name = '$email' and Login_password = '$password'");
        $user_data = mysql_fetch_array($user);
        $no_rows = mysql_num_rows($user);
		
        if ($no_rows == 1) {
            // user existed 
            //$stmt->close();
            $user['login_id'] = $user_data['login_id'];
            return $user_data;
        } else {
            // user not existed
            //$stmt->close();
            return NULL;
        }
    }

    /**
     * Check user is existed or not
     */
    public function isUserExisted($Pat_Email) {
        
        $result = mysql_query("SELECT PAT_EMAIL FROM Patient_master where PAT_EMAIL = '$Pat_Email'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Pat_Email;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }
    
    public function isDoctorExisted($Doc_Email) {
        
        $result = mysql_query("SELECT DOC_EMAIL FROM Doctor_master where DOC_EMAIL = '$Doc_Email'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Doc_Email;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }
    public function isSpecializeExisted($Sp_Name) {
        
        $result = mysql_query("SELECT sp_name FROM Specialization_master where sp_name = '$Sp_Name'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Sp_Name;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }
    
    public function isappointmentExisted($App_Time) {
        
        $result = mysql_query("SELECT APP_TIME FROM Appointment_master where APP_TIME = 'APP_TIME'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $App_Time;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }
public function isSpecialzationExisted($Branch_Name) {
        
        $result = mysql_query("SELECT BR_NAME FROM Branch_Master where BR_NAME = '$Branch_Name'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Branch_Name;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }

    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password) {

        $hash = base64_encode(sha1($password . $salt, true) . $salt);

        return $hash;
    }

}

?>

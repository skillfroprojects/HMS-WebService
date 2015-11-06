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
    public function loginUser($Login_uname,$Login_name,$Login_password,$Login_type,$Br_id) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Login_Master (Login_uname,Login_name,Login_password,Login_type,Br_id,Reg_Via,Reg_frm_Device,Created_Date,Created_Device,Created_IP,Created_By,Modify_Date,Modify_Device,Modify_IP,Modify_By) VALUES('$Login_uname','$Login_name','$Login_password','$Login_type','$Br_id', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
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
    
    public function insertDepartment($Br_ID, $Dept_Name,$Dept_Email,$Dept_Phone) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Department_Master(br_id,dept_name,dept_email,dept_phone,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_ID','$Dept_Name','$Dept_Email','$Dept_Phone', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
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
    
    public function insertPharmacy($Br_ID, $Pharmacy_Name,$Pharmacist_Name,$Pharma_Email,$Pharma_DOB,$Pharma_Gender,$Pharma_Phone,$Pharma_Addr1,$Pharma_Addr2,$Pharma_Postal_Code,$Pharmacist_Licence_No,$Pharma_Store_No) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Pharmacy_Master(br_id,pharmacy_name,pharmacist_name,pharma_email,pharma_dob,pharma_gender,pharma_phone,pharma_addr1,pharma_addr2,pharma_postal_code,pharmacist_licence_no,pharma_store_no,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_ID', '$Pharmacy_Name','$Pharmacist_Name','$Pharma_Email','$Pharma_DOB','$Pharma_Gender','$Pharma_Phone','$Pharma_Addr1','$Pharma_Addr2','$Pharma_Postal_Code','$Pharmacist_Licence_No','$Pharma_Store_No', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function insertLaboratory($Br_ID, $Lab_Name,$Lab_Timing,$Lab_Addr1,$Lab_Addr2,$Lab_Postal_Code,$Lab_Phone,$Lab_Email,$Lab_Landline_No) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Laboratory_Master(br_id,lab_name,lab_timing,lab_addr1,lab_addr2,lab_postal_code,lab_phone,lab_email,lab_landline_no,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_ID', '$Lab_Name','$Lab_Timing','$Lab_Addr1','$Lab_Addr2','$Lab_Postal_Code','$Lab_Phone','$Lab_Email','$Lab_Landline_No', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function insertPathologist($Br_id, $pathologist_name,$lab_id,$lab_email,$pathologist_addr1,$pathologist_addr2,$pathologist_postal_code,$pathologist_phone,$pathologist_email,$pathologist_other_no) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Pathologist_Master(br_id,pathologist_name,lab_id,lab_email,pathologist_addr1,pathologist_addr2,pathologist_postal_code,pathologist_phone,pathologist_email,pathologist_other_no,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_id','$pathologist_name','$lab_id','$lab_email','$pathologist_addr1','$pathologist_addr2','$pathologist_postal_code','$pathologist_phone','$pathologist_email','$pathologist_other_no', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function insertStaff($Br_id, $Staff_Name,$Staff_Email,$Staff_dob,$Staff_Gender,$Staff_Phone,$Staff_Addr1,$Staff_Addr2,$Staff_Postal_Code,$Dept_id,$Designation_id,$Staff_Joining_Date) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Staff_Master(br_id,staff_name,staff_email,staff_dob,staff_gender,staff_phone,staff_addr1,staff_addr2,staff_postal_code,dept_id,designation_id,staff_joining_date,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_id', '$Staff_Name','$Staff_Email','$Staff_dob','$Staff_Gender','$Staff_Phone','$Staff_Addr1','$Staff_Addr2','$Staff_Postal_Code','$Dept_id','$Designation_id','$Staff_Joining_Date', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function insertEmergency($Br_id, $Em_Pat_Name,$Em_Gender,$Em_Mode_Of_Arrival,$Em_Accompanied_By,$Em_Relatives_Notified,$Em_Priority,$Em_Date,$Em_Time_Of_Arrival,$Em_Referral_Doctor,$Em_Ward_To_Admit,$Em_Bed_No,$Em_Mlc,$Em_Mlc_Details) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Emergency_Visit_Master(br_id,em_pat_name,em_gender,em_mode_of_arrival,em_accompanied_by,em_relatives_notified,em_priority,em_date,em_time_of_arrival,em_referral_doctor,em_ward_to_admit,em_bed_no,em_mlc,em_mlc_details,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_id', '$Em_Pat_Name', '$Em_Gender', '$Em_Mode_Of_Arrival', '$Em_Accompanied_By', '$Em_Relatives_Notified', '$Em_Priority', '$Em_Date', '$Em_Time_Of_Arrival', '$Em_Referral_Doctor', '$Em_Ward_To_Admit', '$Em_Bed_No', '$Em_Mlc', '$Em_Mlc_Details', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function insertTestReports($Br_id, $pat_id,$lab_id,$lab_requestor_id,$lab_requested_by,$lab_test_name,$lab_requested_date,$lab_request_completed_date,$lab_notify_to_doc,$lab_notify_to_pat,$lab_specimen,$lab_specimen_collected_by,$lab_sample_no,$lab_request_status,$lab_remarks,$lab_request_type) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Lab_Report_Request_Master(br_id, pat_id,lab_id,lab_requestor_id,lab_requested_by,lab_test_name,lab_requested_date,lab_request_completed_date,lab_notify_to_doc,lab_notify_to_pat,lab_specimen,lab_specimen_collected_by,lab_sample_no,lab_request_status,lab_remarks,lab_request_type,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_id', '$pat_id', '$lab_id', '$lab_requestor_id', '$lab_requested_by', '$lab_test_name', '$lab_requested_date', '$lab_request_completed_date', '$lab_notify_to_doc', '$lab_notify_to_pat', '$lab_specimen', '$lab_specimen_collected_by', '$lab_sample_no', '$lab_request_status', '$lab_remarks', '$lab_request_type', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function insertWard($Br_id, $Ward_No,$Ward_Type) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Ward_Master(br_id,ward_no,ward_type,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_id', '$Ward_No','$Ward_Type', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function insertWardType($Br_id,$Ward_Type) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Ward_Type_Master(br_id,ward_type,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_id', '$Ward_Type', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function insertRoomDetails($Br_id, $Room_No,$Room_Type,$Room_Charges) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Room_Master(br_id,room_no,room_type,room_charges,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_id', '$Room_No','$Room_Type', '$Room_Charges', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function insertRoomType($Br_id,$Room_Type) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Room_Type_Master(br_id,room_type,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_id', '$Room_Type', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function insertBedDetails($Br_id, $Room_No,$Room_Type,$Bed_No,$Bed_Status) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Bed_Master(br_id,room_no,room_type,bed_no,bed_status,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_id', '$Room_No','$Room_Type', '$Bed_No', '$Bed_Status', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function insertDrug($Br_Id, $Drug_Name, $NDC_code,$Drug_Brand_Name,$Drug_Form,$Drug_Mfg_Date,$Drug_Expiry_Date,$Drug_Unit_Price,$Drug_Box_Price,$Drug_Box_Quantity,$Drug_Total_Stock,$Supplier_Id,$Available_Stock) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO pharmacy_drug_master(br_id,drug_name,NDC_code,drug_brand_name,drug_form,drug_mfg_date,drug_expiry_date,drug_unit_price,drug_box_price,drug_box_quantity,drug_total_stock,supplier_id,available_stock,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_Id', '$Drug_Name', '$NDC_code', '$Drug_Brand_Name', '$Drug_Form', '$Drug_Mfg_Date', '$Drug_Expiry_Date', '$Drug_Unit_Price', '$Drug_Box_Price', '$Drug_Box_Quantity', '$Drug_Total_Stock', '$Supplier_Id', '$Available_Stock', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function insertSupplier($Br_Id, $Pharma_Id,$Supplier_Name,$Supplier_Email,$Supplier_Phone,$Supplier_Addr1,$Supplier_Addr2) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO pharmacy_supplier_master(br_id,pharma_id,supplier_name,supplier_email,supplier_phone,supplier_addr1,supplier_addr2,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_Id', '$Pharma_Id', '$Supplier_Name', '$Supplier_Email', '$Supplier_Phone', '$Supplier_Addr1', '$Supplier_Addr2', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
     public function insertDuty($Schedule_Id, $Schedule_Emp_Type,$Schedule_Emp_Id,$Schedule_Shift_Id,$Schedule_Pat_Id,$Schedule_From_Date,$Schedule_To_Date) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO schedule_master(schedule_id,schedule_emp_type,schedule_emp_id,schedule_shift_id,schedule_pat_id,schedule_from_date,schedule_to_date,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Schedule_Id', '$Schedule_Emp_Type', '$Schedule_Emp_Id', '$Schedule_Shift_Id', '$Schedule_Pat_Id', '$Schedule_From_Date', '$Schedule_To_Date', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
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
public function isBranchExisted($Branch_Name) {
        
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
    
    public function isDepartmentExisted($Dept_Name) {
        
        $result = mysql_query("SELECT dept_name FROM department_master where dept_name = '$Dept_Name'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Dept_Name;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }

    public function isPharmacyExisted($Pharma_Email) {
        
        $result = mysql_query("SELECT pharma_email FROM department_master where pharma_email = '$Pharma_Email'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Pharma_Email;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }
    
    public function isLaboratoryExisted($Lab_Email) {
        
        $result = mysql_query("SELECT lab_email FROM Laboratory_master where lab_email = '$Lab_Email'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Lab_Email;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }
    
    public function isPathologistExisted($pathologist_email) {
        
        $result = mysql_query("SELECT pathologist_email FROM Pathologist_master where pathologist_email = '$pathologist_email'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $pathologist_email;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }

    public function isStaffExisted($Staff_Email) {
        
        $result = mysql_query("SELECT staff_email FROM Staff_master where staff_email = '$Staff_Email'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Staff_Email;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }
    
    public function isWardExisted($Ward_No) {
        
        $result = mysql_query("SELECT ward_no FROM Ward_master where ward_no = '$Ward_No'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Ward_No;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }
    
    public function isWardTypeExisted($Ward_Type) {
        
        $result = mysql_query("SELECT ward_type FROM Ward_Type_master where ward_type = '$Ward_Type'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Ward_Type;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }
    
    public function isRoomExisted($Room_No) {
        
        $result = mysql_query("SELECT room_no FROM Room_master where room_no = '$Room_No'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Room_No;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }
    
    public function isRoomTypeExisted($Room_Type) {
        
        $result = mysql_query("SELECT room_type FROM Room_Type_master where room_type = '$Room_Type'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Room_Type;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }
    
    public function isBedExisted($Bed_No) {
        
        $result = mysql_query("SELECT bed_no FROM Bed_master where bed_no = '$Bed_No'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Bed_No;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }
    
    public function isDrugExisted($NDC_code) {
        
        $result = mysql_query("SELECT NDC_code FROM pharmacy_drug_master where NDC_code = '$NDC_code'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $NDC_code;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }
    
     public function isSupplierExisted($Supplier_Email) {
        
        $result = mysql_query("SELECT supplier_email FROM pharmacy_supplier_master where supplier_email = '$Supplier_Email'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Supplier_Email;
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

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
    public function loginUser($Login_uname,$Login_name,$Login_password,$Login_user_id,$Login_type,$Br_id) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Login_Master (Login_uname,Login_name,Login_password,Login_user_id,Login_type,Br_id,Reg_Via,Reg_frm_Device,Created_Date,Created_Device,Created_IP,Created_By,Modify_Date,Modify_Device,Modify_IP,Modify_By) VALUES('$Login_uname','$Login_name','$Login_password','$Login_user_id','$Login_type','$Br_id', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    public function storeUser($Pat_Name,$Pat_Email,$Pat_Gender,$Pat_Mobile,$Pat_Addr1,$Pat_Addr2,$Pat_Postal_Code,$Pat_Blood_Group) {
        $CR_Date = date('d/m/Y');
        $result = mysql_query("INSERT INTO Patient_Master (PAT_NAME,PAT_EMAIL,PAT_GENDER,PAT_MOBILE,PAT_ADDR1,PAT_ADDR2,PAT_POSTAL_CODE,PAT_BLOOD_GROUP,CREATED_DATE,CREATED_IP,CREATED_BY,MODIFY_DATE,MODIFY_IP,MODIFY_BY) VALUES('$Pat_Name', '$Pat_Email','$Pat_Gender','$Pat_Mobile','$Pat_Addr1','$Pat_Addr2','$Pat_Postal_Code','$Pat_Blood_Group','$CR_Date','100','Admin','$CR_Date','100','Amin')");
        return $result;
    }
    public function insertPatient($BR_ID,$PAT_TITLE,$PAT_TYPE,$PAT_NAME,$PAT_EMAIL,$PAT_GENDER,$PAT_MOBILE,$PAT_ADDR1,$PAT_ADDR2,$PAT_STATE,$PAT_POSTAL_CODE,$PAT_BLOOD_GROUP,$PAT_HEIGHT,$PAT_HEIGHT_UNIT,$PAT_WEIGHT,$PAT_WEIGHT_UNIT,$PAT_MARITAL_STATUS,$PAT_EMP_STATUS,$PAT_RACE,$PAT_ETHNICITY,$PAT_REF_PHYSICIAN,$PAT_REF_PHYSICIAN_NO,$PAT_RELATIVE_NAME,$PAT_RELATION_TO_PATIENT,$PAT_RELATIVE_ADDR,$PAT_RELATIVE_STATE,$PAT_RELATIVE_PINCODE,$PAT_RELATIVE_PHONE,$PAT_INS_NAME,$PAT_INS_COMPANY,$PAT_INS_ID,$PAT_INS_COMPANY_NO,$PAT_POLICY_ID,$PAT_GROUP_NAME,$PAT_INS_PARTY,$PAT_PROOF_NAME,$PAT_PROOF_NO,$PAT_REL_WITH_PARTY,$PAT_HEALTH_HISTORY_ID,$PAT_CANCER_DETAILS,$PAT_OTHER_MED_PROB,$PAT_PAST_SURGERIES_ID,$PAT_OTHER_SURGERIES,$PAT_TOBACCO,$PAT_SMOKING,$PAT_ALCOHOL,$PAT_FAMILY_MEMBER,$PAT_HISTORY_ID) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Patient_Master(BR_ID,PAT_TITLE,PAT_TYPE,PAT_NAME,PAT_EMAIL,PAT_GENDER,PAT_MOBILE,PAT_ADDR1,PAT_ADDR2,PAT_STATE,PAT_POSTAL_CODE,PAT_BLOOD_GROUP,PAT_HEIGHT,PAT_HEIGHT_UNIT,PAT_WEIGHT,PAT_WEIGHT_UNIT,PAT_MARITAL_STATUS,PAT_EMP_STATUS,PAT_RACE,PAT_ETHNICITY,PAT_REF_PHYSICIAN,PAT_REF_PHYSICIAN_NO,PAT_RELATIVE_NAME,PAT_RELATION_TO_PATIENT,PAT_RELATIVE_ADDR,PAT_RELATIVE_STATE,PAT_RELATIVE_PINCODE,PAT_RELATIVE_PHONE,PAT_INS_NAME,PAT_INS_COMPANY,PAT_INS_ID,PAT_INS_COMPANY_NO,PAT_POLICY_ID,PAT_GROUP_NAME,PAT_INS_PARTY,PAT_PROOF_NAME,PAT_PROOF_NO,PAT_REL_WITH_PARTY,PAT_HEALTH_HISTORY_ID,PAT_CANCER_DETAILS,PAT_OTHER_MED_PROB,PAT_PAST_SURGERIES_ID,PAT_OTHER_SURGERIES,PAT_TOBACCO,PAT_SMOKING,PAT_ALCOHOL,PAT_FAMILY_MEMBER,PAT_HISTORY_ID,PAT_REG_VIA, PAT_REG_FRM_DEVICE,CREATED_DATE,CREATED_DEVICE,CREATED_IP,CREATED_BY,MODIFY_DATE,MODIFY_DEVICE,MODIFY_IP,MODIFY_BY) VALUES('$BR_ID','$PAT_TITLE', '$PAT_TYPE','$PAT_NAME','$PAT_EMAIL','$PAT_GENDER','$PAT_MOBILE','$PAT_ADDR1','$PAT_ADDR2','$PAT_STATE','$PAT_POSTAL_CODE','$PAT_BLOOD_GROUP','$PAT_HEIGHT','$PAT_HEIGHT_UNIT','$PAT_WEIGHT','$PAT_WEIGHT_UNIT','$PAT_MARITAL_STATUS','$PAT_EMP_STATUS','$PAT_RACE','$PAT_ETHNICITY',$PAT_REF_PHYSICIAN',$PAT_REF_PHYSICIAN_NO','$PAT_RELATIVE_NAME','$PAT_RELATION_TO_PATIENT','$PAT_RELATIVE_ADDR','$PAT_RELATIVE_STATE','$PAT_RELATIVE_PINCODE','$PAT_RELATIVE_PHONE','$PAT_INS_NAME','$PAT_INS_COMPANY','$PAT_INS_ID','$PAT_INS_COMPANY_NO','$PAT_POLICY_ID','$PAT_GROUP_NAME','$PAT_INS_PARTY','$PAT_PROOF_NAME','$PAT_PROOF_NO','$PAT_REL_WITH_PARTY','$PAT_HEALTH_HISTORY_ID','$PAT_CANCER_DETAILS','$PAT_OTHER_MED_PROB','$PAT_PAST_SURGERIES_ID','$PAT_OTHER_SURGERIES','$PAT_TOBACCO','$PAT_SMOKING','$PAT_ALCOHOL','$PAT_FAMILY_MEMBER','$PAT_HISTORY_ID', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    public function insertChild($Br_Id,$Child_Name,$Child_Dob,$Child_Gender,$Child_Resides_With,$Child_Mail_To,$Child_Mandatory_Email,$Child_Ins_Subscriber_Name,$Child_Ins_No,$Child_Ins_Member_Id,$Child_Mother_Name,$Child_Mother_Dob,$Child_Mother_Addr,$Child_Mother_Postal_Code,$Child_Mother_Phone,$Child_Mother_Email,$Child_Father_Name,$Child_Father_Dob,$Child_Father_Addr,$Child_Father_Postal_Code,$Child_Father_Phone,$Child_Father_Email,$Child_Emer_Name,$Child_Emer_Relation,$Child_Emer_Phone) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Children_Master(br_id,child_name,child_dob,child_gender,child_resides_with,child_mail_to,child_mandatory_email,child_ins_subscriber_name,child_ins_no,child_ins_member_id,child_mother_name,child_mother_dob,child_mother_addr,child_mother_postal_code,child_mother_phone,child_mother_email,child_father_name,child_father_dob,child_father_addr,child_father_postal_code,child_father_phone,child_father_email,child_emer_name,child_emer_relation,child_emer_phone,reg_via, reg_frm_device,created_date,created_device,created_ip,created_by,modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_Id', '$Child_Name', '$Child_Dob', '$Child_Gender', '$Child_Resides_With', '$Child_Mail_To', '$Child_Mandatory_Email', '$Child_Ins_Subscriber_Name', '$Child_Ins_No', '$Child_Ins_Member_Id', '$Child_Mother_Name', '$Child_Mother_Dob', '$Child_Mother_Addr', '$Child_Mother_Postal_Code', '$Child_Mother_Phone', '$Child_Mother_Email', '$Child_Father_Name', '$Child_Father_Dob', '$Child_Father_Addr', '$Child_Father_Postal_Code', '$Child_Father_Phone', '$Child_Father_Email', '$Child_Emer_Name', '$Child_Emer_Relation', '$Child_Emer_Phone', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    public function updatePatient($PAT_ID,$PAT_TITLE,$PAT_NAME,$PAT_EMAIL,$PAT_GENDER,$PAT_MOBILE,$PAT_ADDR1,$PAT_ADDR2,$PAT_STATE,$PAT_POSTAL_CODE,$PAT_BLOOD_GROUP,$PAT_HEIGHT,$PAT_HEIGHT_UNIT,$PAT_WEIGHT,$PAT_WEIGHT_UNIT,$PAT_MARITAL_STATUS,$PAT_EMP_STATUS,$PAT_REF_PHYSICIAN,$PAT_REF_PHYSICIAN_NO,$PAT_RELATIVE_NAME,$PAT_RELATION_TO_PATIENT,$PAT_RELATIVE_ADDR,$PAT_RELATIVE_STATE,$PAT_RELATIVE_PINCODE,$PAT_RELATIVE_PHONE,$PAT_INS_NAME,$PAT_INS_COMPANY,$PAT_INS_ID,$PAT_INS_COMPANY_NO,$PAT_POLICY_ID,$PAT_GROUP_NAME,$PAT_INS_PARTY,$PAT_PROOF_NAME,$PAT_PROOF_NO,$PAT_REL_WITH_PARTY,$PAT_HEALTH_HISTORY_ID,$PAT_CANCER_DETAILS,$PAT_OTHER_MED_PROB,$PAT_PAST_SURGERIES_ID,$PAT_OTHER_SURGERIES,$PAT_TOBACCO,$PAT_SMOKING,$PAT_ALCOHOL,$PAT_FAMILY_MEMBER,$PAT_HISTORY_ID) {
        
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("Update Patient_Master set PAT_TITLE= '$PAT_TITLE',PAT_NAME = '$PAT_NAME', PAT_EMAIL = '$PAT_EMAIL',PAT_GENDER = '$PAT_GENDER',PAT_MOBILE = '$PAT_MOBILE',PAT_ADDR1 = '$PAT_ADDR1',PAT_ADDR2 = '$PAT_ADDR2',PAT_STATE = '$PAT_STATE',PAT_POSTAL_CODE = '$PAT_POSTAL_CODE',PAT_BLOOD_GROUP = '$PAT_BLOOD_GROUP' ,PAT_HEIGHT = '$PAT_HEIGHT',PAT_HEIGHT_UNIT = '$PAT_HEIGHT_UNIT',PAT_WEIGHT = '$PAT_WEIGHT',PAT_WEIGHT_UNIT = '$PAT_WEIGHT_UNIT',PAT_MARITAL_STATUS = '$PAT_MARITAL_STATUS',PAT_EMP_STATUS = '$PAT_EMP_STATUS',PAT_REF_PHYSICIAN = '$PAT_REF_PHYSICIAN',PAT_REF_PHYSICIAN_NO = '$PAT_REF_PHYSICIAN_NO',PAT_RELATIVE_NAME = '$PAT_RELATIVE_NAME',PAT_RELATION_TO_PATIENT = '$PAT_RELATION_TO_PATIENT',PAT_RELATIVE_ADDR = '$PAT_RELATIVE_ADDR',PAT_RELATIVE_STATE = '$PAT_RELATIVE_STATE',PAT_RELATIVE_PINCODE = '$PAT_RELATIVE_PINCODE',PAT_RELATIVE_PHONE = '$PAT_RELATIVE_PHONE',PAT_INS_NAME = '$PAT_INS_NAME',PAT_INS_COMPANY = '$PAT_INS_COMPANY',PAT_INS_ID = '$PAT_INS_ID',PAT_INS_COMPANY_NO = '$PAT_INS_COMPANY_NO',PAT_POLICY_ID = '$PAT_POLICY_ID',PAT_GROUP_NAME = '$PAT_GROUP_NAME',PAT_INS_PARTY = '$PAT_INS_PARTY',PAT_PROOF_NAME = '$PAT_PROOF_NAME',PAT_PROOF_NO = '$PAT_PROOF_NO',PAT_REL_WITH_PARTY = '$PAT_REL_WITH_PARTY',PAT_HEALTH_HISTORY_ID = '$PAT_HEALTH_HISTORY_ID',PAT_CANCER_DETAILS = '$PAT_CANCER_DETAILS',PAT_OTHER_MED_PROB = '$PAT_OTHER_MED_PROB',PAT_PAST_SURGERIES_ID = '$PAT_PAST_SURGERIES_ID',PAT_OTHER_SURGERIES = '$PAT_OTHER_SURGERIES',PAT_TOBACCO = '$PAT_TOBACCO',PAT_SMOKING = '$PAT_SMOKING',PAT_ALCOHOL = '$PAT_ALCOHOL',PAT_FAMILY_MEMBER = '$PAT_FAMILY_MEMBER',PAT_HISTORY_ID = '$PAT_HISTORY_ID' ,PAT_REG_VIA = '$reg_via',PAT_REG_FRM_DEVICE = '$reg_device',CREATED_DATE = '$CR_Date',CREATED_DEVICE = '$CR_device',CREATED_IP = '100',CREATED_BY = 'Admin',MODIFY_DATE= '$CR_Date',MODIFY_DEVICE = '$MD_device',MODIFY_IP = '100',MODIFY_BY = 'Admin' where PAT_ID = '$PAT_ID'");
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
    
    public function insertDepartment($Br_ID, $Dept_Name,$Dept_Email,$Dept_Phone,$Dept_Desc) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Department_Master(br_id,dept_name,dept_email,dept_phone,dept_desc,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_ID','$Dept_Name','$Dept_Email','$Dept_Phone','$Dept_Desc', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function insertDesignation($Br_ID,$Dept_Id,$Designation_Name) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Designation_Master(br_id,dept_id,designation_name,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by,modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_ID','$Dept_Id','$Designation_Name','$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
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
    
    public function insertAnesthetist($Br_Id,$Ana_Pat_Id,$Ana_Bed_No,$Ana_Date,$Ana_Time,$Ana_Available_Anesthetist) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Anesthetist_Schedule_Master(br_id,ana_pat_id,ana_bed_no,ana_date,ana_time,ana_available_anesthetist,reg_via,reg_frm_device,created_date,created_device, created_ip,created_by, modify_date, modify_device, modify_ip,modify_by) VALUES('$Br_Id', '$Ana_Pat_Id', '$Ana_Bed_No', '$Ana_Date', '$Ana_Time', '$Ana_Available_Anesthetist', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function insertVaccine($Br_Id,$Vaccine_Child_Age,$Vaccine_Name,$Vaccine_Dosage,$Vaccine_Protects_Against,$Vaccine_Recommended_Days) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Vaccine_Details_Master(br_id,vaccine_child_age,vaccine_name,vaccine_dosage,vaccine_protects_against,vaccine_recommended_days,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by,modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_Id', '$Vaccine_Child_Age', '$Vaccine_Name', '$Vaccine_Dosage', '$Vaccine_Protects_Against', '$Vaccine_Recommended_Days', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function insertVaccineSchedule($Br_Id,$Vac_Child_Id,$Vac_Name,$Vac_Doc_Id,$Vac_App_Date,$Vac_App_Time,$Vac_Ward_No) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Vaccine_Schedule_Master(br_id,vac_child_id,vac_name,vac_doc_id,vac_app_date,vac_app_time,vac_ward_no,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by,modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_Id', '$Vac_Child_Id', '$Vac_Name', '$Vac_Doc_Id', '$Vac_App_Date', '$Vac_App_Time', '$Vac_Ward_No', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
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
    
    public function insertPathologist($Br_id, $pathologist_name,$lab_id,$pathologist_addr1,$pathologist_addr2,$pathologist_postal_code,$pathologist_phone,$pathologist_email,$pathologist_other_no) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Pathologist_Master(br_id,pathologist_name,lab_id,pathologist_addr1,pathologist_addr2,pathologist_postal_code,pathologist_phone,pathologist_email,pathologist_other_no,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_id','$pathologist_name','$lab_id','$pathologist_addr1','$pathologist_addr2','$pathologist_postal_code','$pathologist_phone','$pathologist_email','$pathologist_other_no', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
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
    
    public function insertBedAllocation($Br_id,$Admission_Date,$Discharge_Date,$Room_Type_Id,$Bed_Id,$Pat_Id,$Doctor_Id,$Staff_Id) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Bed_Allocation_Master(br_id,admission_date,discharge_date,room_type_id,bed_id,pat_id,doctor_id,staff_id,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_id', '$Admission_Date', '$Discharge_Date', '$Room_Type_Id', '$Bed_Id', '$Pat_Id', '$Doctor_Id', '$Staff_Id', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function updateBedStatus($Bed_No,$Bed_Status) {
        
        $result = mysql_query("Update Bed_Master set bed_status= '$Bed_Status'  where bed_no = '$Bed_No'");
        return $result;
    }
    
    public function updatePatientType($Pat_Id,$PAT_TYPE) {
        
        $result = mysql_query("Update Patient_Master set PAT_TYPE= '$PAT_TYPE'  where PAT_ID = '$Pat_Id'");
        return $result;
    }
    
    public function updateBedTransfer($Bed_Allocation_Id,$Admission_Date,$Discharge_Date,$Room_Type_Id,$Bed_Id,$Pat_Id,$Doctor_Id,$Staff_Id,$Bed_Transfer_Reason) {
        
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("Update Bed_Allocation_Master set admission_date= '$Admission_Date',discharge_date = '$Discharge_Date', room_type_id = '$Room_Type_Id',bed_id = '$Bed_Id',pat_id = '$Pat_Id',doctor_id = '$Doctor_Id',staff_id = '$Staff_Id' ,bed_transfer_reason = '$Bed_Transfer_Reason' ,reg_via = '$reg_via',reg_frm_device = '$reg_device',created_date = '$CR_Date',created_device = '$CR_device',created_ip = '100',created_by = 'Admin',modify_date= '$CR_Date',modify_device = '$MD_device',modify_ip = '100',modify_by = 'Admin' where bed_allocation_id = '$Bed_Allocation_Id'");
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
    
    public function insertDuty($Schedule_Emp_Type,$Schedule_Emp_Id,$Schedule_Shift_Id,$Schedule_Pat_Id,$Schedule_From_Date,$Schedule_To_Date) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO schedule_master(schedule_emp_type,schedule_emp_id,schedule_shift_id,schedule_pat_id,schedule_from_date,schedule_to_date,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Schedule_Emp_Type', '$Schedule_Emp_Id', '$Schedule_Shift_Id', '$Schedule_Pat_Id', '$Schedule_From_Date', '$Schedule_To_Date', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function insertMealPlan($Br_Id,$Meal_Plan_Name,$Disease_Type,$Meal_Calorie_Level,$Meal_Plan_Breakfast,$Meal_Plan_Lunch,$Meal_Plan_Afternoon_Snack,$Meal_Plan_Dinner,$Meal_Plan_Price) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Meal_Plan_master(br_id,meal_plan_name,disease_type,meal_calorie_level,meal_plan_breakfast,meal_plan_lunch,meal_plan_afternoon_snack,meal_plan_dinner,meal_plan_price,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_Id', '$Meal_Plan_Name', '$Disease_Type', '$Meal_Calorie_Level', '$Meal_Plan_Breakfast', '$Meal_Plan_Lunch', '$Meal_Plan_Afternoon_Snack', '$Meal_Plan_Dinner', '$Meal_Plan_Price', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function insertDietPrescription($Br_Id,$Diet_Pat_Id,$Diet_Meal_Plan_Id,$Diet_Date_From,$Diet_Date_To,$Diet_Bed_Allocation_Id) {
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO Diet_Prescription_master(br_id,diet_pat_id,diet_meal_plan_id,diet_date_from,diet_date_to,diet_bed_allocation_id,reg_via,reg_frm_device,created_date,created_device,created_ip,created_by, modify_date,modify_device,modify_ip,modify_by) VALUES('$Br_Id', '$Diet_Pat_Id', '$Diet_Meal_Plan_Id', '$Diet_Date_From', '$Diet_Date_To', '$Diet_Bed_Allocation_Id', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
        return $result;
    }
    
    public function updateUser($Cust_UserID,$Cust_Name,$Cust_Email,$Cust_Phone) {
        
        $result = mysql_query("Update Customer_master set Cust_Name = '$Cust_Name', Cust_Phone ='$Cust_Phone', Cust_Email = '$Cust_Email' where Cust_ID = '$Cust_UserID' ");
        return $result;
    }
    
    public function register_appointment($Br_Id,$App_Date,$App_Time,$Doc_ID,$Pat_ID,$Pat_Email,$Pat_Mobile){
        $CR_Date = date('d/m/Y');
        $reg_via = "";
        $reg_device = "";
        $CR_device = "";
        $MD_device = "";
        $result = mysql_query("INSERT INTO appointment_master(BR_ID,APP_DATE,APP_TIME,DOC_ID,PAT_ID,PAT_EMAIL,PAT_MOBILE,APP_REG_VIA,APP_REG_FRM,APP_CREATED_DATE,APP_CREATED_DEVICE,APP_CREATED_IP,APP_CREATED_BY,APP_MODIFY_DATE,APP_MODIFY_DEVICE,APP_MODIFY_IP,APP_MODIFY_BY) VALUES('$Br_Id','$App_Date','$App_Time','$Doc_ID','$Pat_ID','$Pat_Email','$Pat_Mobile', '$reg_via', '$reg_device','$CR_Date', '$CR_device','100','Admin','$CR_Date', '$MD_device','100','Admin')");
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
    public function isUserExisted($PAT_EMAIL) {
        
        $result = mysql_query("SELECT PAT_EMAIL FROM Patient_master where PAT_EMAIL = '$PAT_EMAIL'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $PAT_EMAIL;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }
    
    public function isChildExisted($Child_Mandatory_Email) {
        
        $result = mysql_query("SELECT * from Children_master WHERE child_mandatory_email = '$Child_Mandatory_Email')");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Child_Mandatory_Email;
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
    
    public function isAnesthetistScheduled($Ana_Available_Anesthetist,$Ana_Date,$Ana_Time) {
        
        $result = mysql_query("SELECT ana_available_anesthetist FROM Anesthetist_Schedule_Master where ana_available_anesthetist = '$Ana_Available_Anesthetist' AND ana_date = '$Ana_Date' AND ana_time = '$Ana_Time'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Ana_Available_Anesthetist;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }
    
    public function isVaccineDetails($Vaccine_Child_Age) {
        
        $result = mysql_query("SELECT vaccine_child_age FROM Vaccine_Details_Master where vaccine_child_age = '$Vaccine_Child_Age'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Vaccine_Child_Age;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }
    
    public function isVaccineSchedule($Vac_Child_Id,$Vac_App_Date,$Vac_App_Time) {
        
        $result = mysql_query("SELECT vac_child_id FROM Vaccine_Schedule_Master where vac_child_id = '$Vac_Child_Id' AND vac_app_date = '$Vac_App_Date' AND vac_app_time = '$Vac_App_Time'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Vac_Child_Id;
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
    
    public function isappointmentExisted($Doc_ID,$App_Date,$App_Time) {
        
        $result = mysql_query("SELECT appointment_master.APP_DATE, appointment_master.APP_TIME, doctor_master.DOC_NAME FROM appointment_master INNER JOIN doctor_master ON appointment_master.DOC_ID = doctor_master.DOC_ID WHERE appointment_master.APP_DATE = '$App_Date' AND appointment_master.APP_TIME = '$App_Time' AND appointment_master.DOC_ID = '$Doc_ID'");
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
    
    public function isDepartmentExisted($Dept_Name,$Dept_Email) {
        
        $result = mysql_query("SELECT dept_name FROM department_master where dept_name = '$Dept_Name' AND dept_email = '$Dept_Email'");
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
    
    public function isDesignationExist($Designation_Name) {
        
        $result = mysql_query("SELECT designation_name FROM designation_master where designation_name = '$Designation_Name'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Designation_Name;
        } else {
            
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
    
    public function isBedAllocated($Pat_Id) {
        
        $result = mysql_query("SELECT pat_id FROM bed_allocation_master where pat_id = '$Pat_Id'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Pat_Id;
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
    
    public function isMealPlanExists($Meal_Plan_Name) {
        
        $result = mysql_query("SELECT meal_plan_name FROM Meal_Plan_master where meal_plan_name = '$Meal_Plan_Name'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Meal_Plan_Name;
        } else {
            // user not existed
            //$stmt->close();
            //echo $user;
            return FALSE;
        }
    }
            
    public function isDietPrescriptionExists($Diet_Pat_Id,$Diet_Date_From,$Diet_Date_To) {
        
        $result = mysql_query("SELECT diet_pat_id FROM Diet_Prescription_master where diet_pat_id = '$Diet_Pat_Id' AND diet_date_from = '$Diet_Date_From' AND diet_date_to = '$Diet_Date_To'");
        $user_data = mysql_fetch_array($result);
        $no_rows_res = mysql_num_rows($result);
        //$num_rows = mysql_num_rows($result);                
        if ($no_rows_res == 1) {
            // user existed 
            //$stmt->close();
            //echo $user;
            return $Diet_Pat_Id;
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

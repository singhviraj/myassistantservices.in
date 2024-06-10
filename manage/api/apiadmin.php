<?php
	session_start();
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    include "inc/config.php";

    $action = isset($_POST['action']) ? $_POST['action'] : "no_action";
    
//function for user login (BOD by laleshwar)
if ($action==='loginUsers'){
    $returned_data = new stdClass();
    if($_POST['loginid']==null or $_POST['password']== null){
        $returned_data->success = false;
        $returned_data->msg = 'Please Provide User Id And Password'; 
        die( json_encode($returned_data) );
    }
    
    $userId = $_POST['loginid'];
    $pass = md5($_POST['password']);
    $arr=$db->query("SELECT * FROM admin WHERE LoginID = '$userId' AND Password = '$pass' AND IsDeleted = 0 ");
    //var_dump( $arr); die;
    $dataCout= count($arr);
    if($dataCout == 0){
        $returned_data->result = $dataCout;
        $returned_data->success = false;
        $returned_data->data = 0;
        $returned_data->msg = 'Invalid Username or Password';
    }else{
        $data = new stdClass();
        $data->records = $arr ;
        $returned_data->success = true;
        $Username = $arr[0]["FirstName"]." ".$arr[0]["LastName"];
        $UserID = $arr[0]["UserID"];
        $UserType = $arr[0]["UserType"];
        $LoginID = $arr[0]["LoginID"];
        $EmailID = $arr[0]["EmailID"];
        $UniqueID = $arr[0]["UniqueID"];
    
        // if ( $arr[0]["IsVerified"] == 0) {
        //     $enCodeEmail = base64_encode($arr[0]["EmailID"]);
        //     $enCodeloginID = base64_encode($arr[0]["LoginID"]);
        //     $enCodeUniqueID = base64_encode($arr[0]["UniqueID"]);
        //     $VerificationURL = $ApplicationUrl."userVerification.php?EmailID=$enCodeEmail&LoginID=$enCodeloginID&UniqueID=$enCodeUniqueID" ;

        //     $to = $arr[0]["EmailID"]; // WebSite Owner Mail Static
        //     $subject = "Email Verification Mail";
        //     $txt = "Please Click On link Given Below to Verify Your Email"."\n".$VerificationURL;
        //     $headers = "From: webmaster@example.com";
        //     $check = mail($to,$subject,$txt,$headers);
        //     $returned_data->msg = 'You have not verified your account. Please Verify your account to login. We have send an Email Just Now'; 
        //     $returned_data->result = $dataCout;
        //     $returned_data->success = false;
        //     $returned_data->data = 0;
        //     die( json_encode($returned_data) );    
        // }
        if ( $arr[0]["IsActive"] == 0) {
            // Your verification is pending.  Please Verify your account to login.
            $returned_data->msg = 'Your Account is disable !! please contact to admin for activate Account'; 
            $returned_data->result = $dataCout;
            $returned_data->success = false;
            $returned_data->data = 0;
            die( json_encode($returned_data) );    
        }
        //// new BOC By laleshwar
        if($UserType == 5){
                $returned_data->result = $dataCout;
                $_SESSION['username'] = $Username;
                $_SESSION['UserID'] = $UserID;
                $_SESSION['UserType'] = $UserType;
                $_SESSION['LoginID'] = $LoginID;
                $_SESSION['EmailID'] = $EmailID;
                $_SESSION['UniqueID'] = $UniqueID;
                $returned_data->data = $data;
            }
            
    }

    die( json_encode($returned_data) );
} 


// get Master List of All tables.
if ($action==='ListCategoryData'){
    $returned_data = new stdClass();
    if($_SESSION['UserID']==null or $_SESSION['UserType']!=5){
        $returned_data->success = false;
        $returned_data->msg = 'Mandatory data missing..!'; 
        $returned_data->data = 0;
        die( json_encode($returned_data) );
    }
    $sql="SELECT ProductCategoryID, CategoryName FROM productcategory";
    $MasterCategory=$db->query($sql);
    if ($MasterCategory == true) {
        $returned_data->data = 1;
        $returned_data->MasterCategory = $MasterCategory;
        $returned_data->success = true;
        $returned_data->msg = 'All master data found.'; 
    } else {
        $returned_data->success = false;
        $returned_data->msg = 'Data Not Found..'; 
        $returned_data->data = 0;
    }
    die( json_encode($returned_data) );
}




// function for update Job
if ($action==='UpdateMasterJobdata'){
    $returned_data = new stdClass();
    if($_SESSION['UserID']==null or $_SESSION['UserType']!=5 or $_POST['jobId']==null){
        $returned_data->success = false;
        $returned_data->msg = 'Manadatory data missing.'; 
        $returned_data->data = 0; 
        die( json_encode($returned_data) );
    }
    $UserID = $_SESSION['UserID'];
    $jobId = isset($_POST['jobId']) ? $_POST['jobId'] : '';
    $jobname = isset($_POST['jobName']) ? $_POST['jobName'] : '';
    $comapny = isset($_POST['comapny']) ? $_POST['comapny'] : '';
    $category = isset($_POST['categoryType']) ? $_POST['categoryType'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $Contant = isset($_POST['Contant']) ? $_POST['Contant'] : '';
    $salary = isset($_POST['salary']) ? $_POST['salary'] : '';
    $CompanyDes = isset($_POST['companyDescription']) ? $_POST['companyDescription'] : '';
    $data = array(
        'JobName' => $jobname,
        'CompanyName' => $comapny,
        'JobCategory' => $category,
        'JobLocation' => $location,
        'Content' => $Contant,
        'Salary' => $salary,
        'Description' => $CompanyDes,
        'CraetedBy' => $UserID,
    );
    $rs=$db->update('jobs', $data, 'jobId',$jobId);
    if ($rs == true) {
        $returned_data->success = true;
        $returned_data->data=1;
        $returned_data->msg='Job updated Successfully!';
    }else{
        $returned_data->success = false;
        $returned_data->data=0;
        $returned_data->msg='Failed!, Job not updated';
    }       
    die( json_encode($returned_data) );
} 


// function for delete Job
if ($action==='deleteProject'){
    $returned_data = new stdClass();
    if($_SESSION['UserID']==null or $_SESSION['UserType']!=5){
        $returned_data->success = false;
        $returned_data->msg = 'Manadatory data missing.'; 
        $returned_data->data = 0; 
        die( json_encode($returned_data) );
    }
    $ProductID=$_POST['ProductID'];

    $sql="DELETE FROM masterproduct WHERE ProductID =$ProductID";

    $rs=$db->query($sql);
    if (count($rs)>0) {
        $returned_data->success=false;
        $returned_data->data=1;
        $returned_data->msg='Failed Please Try Again.';
    }else{
        $returned_data->success=true;
        $returned_data->data=0;
        $returned_data->msg=' Product deleted successfully!';
    }       
    die( json_encode($returned_data) );
} 


if ($action === 'insertMasterJobdata') {
    $returned_data = new stdClass();
    if (!isset($_POST['jobName']) || !isset($_SESSION['UserID']) || $_SESSION['UserType'] != 5) {
        $returned_data->data = 0;
        $returned_data->success = false;
        $returned_data->msg = 'Mandatory Data Missing..!';
        die(json_encode($returned_data));
    }
    $UserID = $_SESSION['UserID'];
    $jobname = isset($_POST['jobName']) ? $_POST['jobName'] : '';
    $comapny = isset($_POST['comapny']) ? $_POST['comapny'] : '';
    $category = isset($_POST['categoryType']) ? $_POST['categoryType'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $Contant = isset($_POST['Contant']) ? $_POST['Contant'] : '';
    $salary = isset($_POST['salary']) ? $_POST['salary'] : '';
    $CompanyDes = isset($_POST['companyDescription']) ? $_POST['companyDescription'] : '';
    $data = array(
        'JobName' => $jobname,
        'CompanyName' => $comapny,
        'JobCategory' => $category,
        'JobLocation' => $location,
        'Content' => $Contant,
        'Salary' => $salary,
        'Description' => $CompanyDes,
        'CraetedBy' => $UserID,
    );
    $result=$db->insert('jobs',$data,'');
    if($result==true){
        $returned_data->data=1;
        $returned_data->msg='Job Details saved successfully..!';
        $returned_data->success=true;  
    }else{
        $returned_data->data=0;
        $returned_data->msg='Failed!, Job not saved';
        $returned_data->success=false; 
    }
     die( json_encode($returned_data) );
}

// Fetch blog data (BOC by laleshwar 31-01-2024)
if ($action==='listAllJobs'){
    $returned_data = new stdClass();

    if($_SESSION['UserID']==null or $_SESSION['UserType']!=5){
        $returned_data->success = false;
        $returned_data->msg = 'Manadatory data missing.'; 
        $returned_data->data = 0; 
        die( json_encode($returned_data) );
    }
    
    $sql="SELECT JobID, JobName, CompanyName, JobLocation, DATE_FORMAT(Created_Date, '%m-%d-%Y') as Created_Date FROM `jobs` ORDER BY JobID DESC";
    $rs=$db->query($sql);

    if(count($rs)>0){
        $returned_data->data =  $rs;
        $returned_data->success =true;
        $returned_data->msg = 'Jobs data';
    }else{
        $returned_data->data = 0;
        $returned_data->data = false;
        $returned_data->msg = 'Jobs data not faund';
    }    
    die( json_encode($returned_data) );
}

if ($action==='getJobInforById'){
    $returned_data = new stdClass();

    if($_SESSION['UserID']==null or $_SESSION['UserType']!=5){
        $returned_data->success = false;
        $returned_data->msg = 'Manadatory data missing.'; 
        $returned_data->data = 0; 
        die( json_encode($returned_data) );
    }
    $jobId =$_POST['jobId'];
    $rs=$db->fetchSingleRow('jobs', 'JobID', $jobId);
     if($rs!=null){
         $returned_data->data =  $rs;
         $returned_data->success = true;
         $returned_data->msg = 'Job data';
     }else{
         $returned_data->data = 0;
         $returned_data->success = false;
         $returned_data->msg = 'Job data not found';
     }    
    die( json_encode($returned_data) );
}


// function for delete Blog
if ($action==='deleteJob'){
    $returned_data = new stdClass();
    if($_SESSION['UserID']==null or $_SESSION['UserType']!=5){
        $returned_data->success = false;
        $returned_data->msg = 'Manadatory data missing.'; 
        $returned_data->data = 0; 
        die( json_encode($returned_data) );
    }
    $jobId=$_POST['JobID'];

    $sql="DELETE FROM jobs WHERE JobID  =$jobId";

    $rs=$db->query($sql);
    if (count($rs)>0) {
        $returned_data->success=false;
        $returned_data->data=1;
        $returned_data->msg='Failed Please Try Again.';
    }else{
        $returned_data->success=true;
        $returned_data->data=0;
        $returned_data->msg=' Job deleted successfully!';
    }       
    die( json_encode($returned_data) );
} 

if ($action==='no_action'){
    $returned_data = new stdClass();
    $returned_data->error = 'Something is wrong :-(';
    die( json_encode($returned_data) );
}
   

?>
Something is wrong :-(
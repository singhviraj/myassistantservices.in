<?php
	session_start();
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    include "inc/config.php";

    $action = isset($_POST['action']) ? $_POST['action'] : "no_action";

//=================================== BOC by Laleshwar Start===================================================== 
//----- Product List for index page ----------
if ($action==='listProduct'){
    $returned_data = new stdClass();
    $sql="SELECT mp.ProductID, mp.ProductName, mp.SalesPrice, mp.BasePrice, mp.ImageOne, pc.ProductCategoryID,pc.CategoryName  FROM masterproduct mp LEFT JOIN productcategory pc ON mp.ProductCategoryID = pc.ProductCategoryID LIMIT 6";
    $MasterProduct=$db->query($sql);
    if ($MasterProduct == true) {
        $returned_data->data = 1;
        $returned_data->MasterProduct = $MasterProduct;
        $returned_data->success = true;
        $returned_data->msg = 'All Product Data found.'; 
    } else {
        $returned_data->success = false;
        $returned_data->msg = 'Data Not Found..'; 
        $returned_data->data = 0;
    }
    die( json_encode($returned_data) );
}

//----- All Product Listing for listing page  ----------
if ($action==='listAllProduct'){
    $returned_data = new stdClass();
    $sql="SELECT mp.ProductID, mp.ProductName, mp.SalesPrice, mp.BasePrice, mp.ImageOne, mp.AltTagFirst, pc.ProductCategoryID,pc.CategoryName  FROM masterproduct mp LEFT JOIN productcategory pc ON mp.ProductCategoryID = pc.ProductCategoryID";
    $AllProduct=$db->query($sql);
    if ($AllProduct == true) {
        $returned_data->data = 1;
        $returned_data->AllProduct = $AllProduct;
        $returned_data->success = true;
        $returned_data->msg = 'All Product Data found.'; 
    } else {
        $returned_data->success = false;
        $returned_data->msg = 'Data Not Found..'; 
        $returned_data->data = 0;
    }
    die( json_encode($returned_data) );
}

//function for All data display in product detail Page---
if ($action==='listProductDetails'){
    $returned_data = new stdClass();
    $productId = $_POST['productId'];
    //var_dump($productId); die();
    $sql="SELECT *  FROM masterproduct mp LEFT JOIN productcategory pc ON mp.ProductCategoryID = pc.ProductCategoryID WHERE mp.ProductID=$productId";
    $ProductDetails=$db->query($sql);
    if ($ProductDetails == true) {
        $returned_data->data = 1;
        $returned_data->ProductDetails = $ProductDetails;
        $returned_data->success = true;
        $returned_data->msg = 'Product Data found.'; 
    } else {
        $returned_data->success = false;
        $returned_data->msg = 'Data Not Found..'; 
        $returned_data->data = 0;
    }
    die( json_encode($returned_data) );
}

if ($action==='listAlljobs'){
    $returned_data = new stdClass();
    $jobName=$_POST['jobName'];
    $jobLocation=$_POST['jobLocation'];
    $string=$_POST['searchString'];
    // if($_SESSION['UserID']==null or $_SESSION['UserType']!=5){
    //     $returned_data->success = false;
    //     $returned_data->msg = 'Mandatory data missing..!'; 
    //     $returned_data->data = 0;
    //     die( json_encode($returned_data) );
    // }

    $sqlQuery = "SELECT JobID, JobName, CompanyName, JobCategory, Salary, JobLocation, Content, DATE_FORMAT(Created_Date, '%m-%d-%Y') as CreateDate FROM jobs";
    if($string=='0'){
        $str="ORDER BY JobID DESC limit 50";
    }else{
        $str1=" WHERE JobName LIKE '$jobName%' AND JobLocation LIKE '$jobLocation%' ORDER BY JobID DESC limit 50 ";
        $sqlQuery = $sqlQuery . $str1;
        // var_dump($sqlQuery); die;
    }
    $rs=$db->query($sqlQuery);
    if(count($rs)>0){
        $returned_data->data=$rs;
        $returned_data->success=true;
        $returned_data->msg='jobs data';
    }else{
        $returned_data->data=0;
        $returned_data->success=false;
        $returned_data->msg='jobs data not found';
    }
    
    die( json_encode($returned_data) );
}



    
if ($action==='listjobDetailData'){
    $returned_data = new stdClass();
    //echo "okay"; die;
    $jobId=$_POST['jobId'];
    $sql="SELECT JobID, JobName, CompanyName, JobCategory, JobLocation, Description, Salary, Content, DATE_FORMAT(Created_Date, '%d-%M-%Y') as CreateDate FROM `jobs` WHERE JobID = $jobId";
    //var_dump($sql); die;
    $jobDetail=$db->query($sql);
    if ($jobDetail == true) {
        $returned_data->data = 1;
        $returned_data->jobDetail = $jobDetail;
        $returned_data->success = true;
        $returned_data->msg = 'Job Data found..'; 
    } else {
        $returned_data->success = false;
        $returned_data->msg = 'Data Not Found..'; 
        $returned_data->data = 0;
    }
    die( json_encode($returned_data) );
}


if ($action==='listRecentBlogs'){
    $returned_data = new stdClass();
    // $productId = $_POST['productId'];
    $sql="SELECT BlogId,Name,Headshot,DATE_FORMAT(Create_at, '%d-%M-%Y') as AssignedDate FROM blog WHERE BlogId != (SELECT max(BlogId)
FROM blog ) ORDER BY BlogId LIMIT 10";
    //var_dump($sql); die;
    $BlogDetails=$db->query($sql);
    if ($BlogDetails == true) {
        $returned_data->data = 1;
        $returned_data->BlogDetails = $BlogDetails;
        $returned_data->success = true;
        $returned_data->msg = 'Blogs Data found.'; 
    } else {
        $returned_data->success = false;
        $returned_data->msg = 'Data Not Found..'; 
        $returned_data->data = 0;
    }
    die( json_encode($returned_data) );
}



if ($action==='listBlogDetailbyId'){
    $returned_data = new stdClass();
    $koopId = $_POST['koopId'];
    $sql="SELECT BlogId,Name,Headshot,DATE_FORMAT(Create_at, '%d-%M-%Y') as AssignedDate,Contant FROM `blog` WHERE BlogId=$koopId";
    $BlogById=$db->query($sql);
    if ($BlogById == true) {
        $returned_data->data = 1;
        $returned_data->BlogById = $BlogById;
        $returned_data->success = true;
        $returned_data->msg = 'Blogs Data found.'; 
    } else {
        $returned_data->success = false;
        $returned_data->msg = 'Data Not Found..'; 
        $returned_data->data = 0;
    }
    die( json_encode($returned_data) );
}

// user registeration

if ($action==='userRegister'){
   // echo "okay"; die();
    $returned_data = new stdClass();
    if($_POST['username']==null or $_POST['email']== null or $_POST['password']==null){
        $return_data->data=0;
        $return_data->success = false;
        $return_data->msg = 'Mandatory Data Missing..!'; 
        die( json_encode($return_data) );
    }

    $password=md5($_POST['password']);

    $data=array(
        'Username'=>$_POST['username'],
        'Email'=>$_POST['email'],
        'MobileNo'=>$_POST['mobileNo'],
        'Password'=>$password,
        'UserType' => 2
    );   
    $rs=$db->insert('users', $data);

    //var_dump($rs); die();
    
    if ($rs == true) {
        $returned_data->data = 1;
        $returned_data->success = true;
        $returned_data->msg = 'Register Successfully!.'; 
    } else {
        $returned_data->success = false;
        $returned_data->msg = 'Failed, please try again..'; 
        $returned_data->data = 0;
    }
    die( json_encode($returned_data) );
}

//function for user login

if ($action==='loginUsers'){
     
    $returned_data = new stdClass();
    if($_POST['username']== null or $_POST['password']==null){
        $return_data->data=0;
        $return_data->success = false;
        $return_data->msg = 'Mandatory Data Missing..!'; 
        die( json_encode($return_data) );
    }
    $Username = $_POST['username'];
    $pass = md5($_POST['password']);
    // $queryArray="SELECT * FROM `users` WHERE Username='$Username' AND Password='$pass'";
    // var_dump( $queryArray); die;
    $arr=$db->query("SELECT * FROM `users` WHERE Email='$Username' AND Password='$pass'");
    // var_dump($arr);
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
        $Username = $arr[0]["Username"];
        $UserType = $arr[0]["UserType"];
        $EmailID = $arr[0]["Email"];
    
        
        //// new BOC By laleshwar
        if($UserType == 2){
            $returned_data->result = $dataCout;
            $_SESSION['Username'] = $Username;
            $_SESSION['UserType'] = $UserType;
            $_SESSION['Email'] = $EmailID;
            $returned_data->data = $data;
        }
            
    }

    die( json_encode($returned_data) );
} 


//function for list blog in index page

if ($action==='listLatestBlog'){
    $returned_data = new stdClass();
    $sql="SELECT BlogId,Name,Headshot,DATE_FORMAT(Create_at, '%d-%M-%Y') as AssignedDate FROM blog  ORDER BY BlogId LIMIT 3";
    $BlogDetails=$db->query($sql);
    if ($BlogDetails == true) {
        $returned_data->data = 1;
        $returned_data->BlogDetails = $BlogDetails;
        $returned_data->success = true;
        $returned_data->msg = 'Blogs Data found.'; 
    } else {
        $returned_data->success = false;
        $returned_data->msg = 'Data Not Found..'; 
        $returned_data->data = 0;
    }
    die( json_encode($returned_data) );
}

//=================================== BOC by Laleshwar END=======================================================//


if ($action==='no_action'){
    $returned_data = new stdClass();
    $returned_data->error = 'Something is wrong :-(';
    die( json_encode($returned_data) );
}
   

?>
Something is wrong :-(
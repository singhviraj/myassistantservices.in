
<?php include 'includes/sessionCheck.php'; ?>
<html lang="en">
    <style>
        .nav.child_menu{
            display:block !important;
        }
    </style>
<!-- include for html Header -->
<?php include 'includes/include_head.php';?>
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/query-string/8.1.0/index.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        if(CKEDITOR) 
            {
                // Replace the <textarea name = "content"> with a CKEditor instance. 
                CKEDITOR.replace('editor');
            }
       var jobId = $.QueryString('jobId');
    //    alert(jobId);
        if (!(jobId == null)) {
            $('#BlogId').val(jobId);
            fnJobInfo(jobId);
        }else{
            
        }        

        $('#txtJobName').focus(function(event) {
            $('#txtJobName').css("background-color", "");
        });

        $('#txtCompany').focus(function(event) {
            $('#txtCompany').css("background-color", "");
        });

        $('#ddlCategoryType').focus(function(event) {
            $(this).css("background-color", "");
        });

        $('#txtLocation').focus(function(event) {
            $(this).css("background-color", "");
        });

        $('.btnSaveMasterJob').click(function(event) {
            fnCreateJob();
        });
        $('.btnUpdateJobData').click(function(event) {
            var ProjectID = $('#updateID').val();
            fnUpdateMasterProduct(ProjectID);
        });

        $('.btnResetMasterProduct').click(function(event) {
            fnClearControlMainProject();
        });
        
        // ============================================================================================
        
    });
</script>


<script type="text/javascript">

    function fnCreateJob(){
        if(!fnProductValidateForm()) return;
        var ckValue = CKEDITOR.instances.editor.getData();
        var form_data = new FormData();

        form_data.append("jobName", $('#txtJobName').val());
        form_data.append("comapny", $('#txtCompany').val());
        form_data.append("categoryType", $('#ddlCategoryType').val());
        form_data.append("location", $('#txtLocation').val());
        form_data.append("salary", $('#txtSalary').val());
        form_data.append("companyDescription", $('#txtCompanyDescription').val());
        form_data.append("Contant", ckValue);
        // Inside the fnCreatemasterBlog() function
        form_data.append("action", "insertMasterJobdata");
        $.ajax({
            type: "POST",
            url: "api/apiadmin.php",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                // Show loading indicator or disable the submit button if needed
            },
            success: function(data) {
                if (data.data == 1) {
                    // window.location.href = 'master-blog.php'; 
                    Alert.success(data.msg, {displayDuration: 4000,pos: 'top'});
                    $('#txtJobName').val('');
                    $('#txtCompany').val('');
                    $('#ddlCategoryType').val('');
                    $('#txtLocation').val('');
                    // $('#editor').val('');
                    CKEDITOR.instances['editor'].setData('');
                } else {
                    Alert.warning(data.msg, {displayDuration: 4000,pos: 'top'});
                }
            },
            error: function(xhr, status, error) {
                // Handle error
            }
        });

    }

    // function for clear text field for highlights
    function fnClearControlforHighlight() {
        $('#txtHighTitle').val('');
        $('.btnSaveHigh').removeAttr('disabled', 'disabled');
        $('.btnUpdateHigh').attr('disabled', 'disabled');
    };

    function fnProductValidateForm() {
        var ret = true;

        if ($('#txtJobName').val() == '') {
            $("#txtJobName").css("background-color", "#f2dede");
            ret = false;
        }

        if ($('#txtCompany').val() == '') {
            $("#txtCompany").css("background-color", "#f2dede");
            ret = false;
        }
        
        if ($('#ddlCategoryType').val() == '') {
            $("#ddlCategoryType").css("background-color", "#f2dede");
            ret = false;
        }
        if ($('#txtLocation').val() == '') {
            $("#txtLocation").css("background-color", "#f2dede");
            ret = false;
        }
        return ret;

    };
    //clear input field
    function fnClearControlMainProject() {
        $('#ddlCategoryType').val('');
        $('#txtBrandName').val('');
        $('#txtSalesPrice').val('');
        $('#txtBasePrice').val('');
        $('#ddlCategoryType').val('');
        $('#txtStock').val('');
        $('#fileImage1').val('');
        $('#fileImage2').val('');
        $('#altagImage1').val('');
        $('#altagImage2').val('');
        $('#txtDescripion').val('');
        $('#txtAvailability').val('');
        $('#txtVideoLink').val('');
    };

    // ---------get Product data by Product ID------
    function fnJobInfo(jobId) {
        // var jobId = 1;
        $.ajax({
            type: "POST",
            dataType: "json",
            success: SuccessHandler,
            url: 'api/apiadmin.php',
            data: {
                action: "getJobInforById",
                jobId: jobId,
            }
        });

        function SuccessHandler(data) {
            if (data.success == true) {
                console.log(data.data.JobID);
                $('.btnSaveMasterJob').css('background', '#999').attr('disabled', 'disabled');
                $('.btnResetMasterJob').css('background','#999').attr('disabled', 'disabled');
                $('.btnUpdateJobData').show();

                $('#txtJobId').val(data.data.JobID);
                $('#txtJobName').val(data.data.JobName);
                $('#txtCompany').val(data.data.CompanyName);
                $('#ddlCategoryType').val(data.data.JobCategory);
                $('#txtLocation').val(data.data.JobLocation);
                $('#editor').val(data.data.Content);
                $('#txtSalary').val(data.data.Salary);
                $('#txtCompanyDescription').val(data.data.Description);
                
            } else {
                Alert.warning(data.msg, {
                    displayDuration: 4000,
                    pos: 'top'
                });
            }
        };
    }

    // function update product data
    function fnUpdateMasterProduct(){
        var ckValue = CKEDITOR.instances.editor.getData();
        var form_data = new FormData();
        form_data.append("jobId", $('#txtJobId').val());
        form_data.append("jobName", $('#txtJobName').val());
        form_data.append("comapny", $('#txtCompany').val());
        form_data.append("salary", $('#txtSalary').val());
        form_data.append("companyDescription", $('#txtCompanyDescription').val());
        form_data.append("categoryType", $('#ddlCategoryType').val());
        form_data.append("location", $('#txtLocation').val());
        form_data.append("Contant", ckValue);
        // Inside the fnCreatemasterBlog() function
        form_data.append("action", "UpdateMasterJobdata");
        $.ajax({
            type: "POST",
            url: "api/apiadmin.php",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                // Show loading indicator or disable the submit button if needed
            },
            success: function(data) {
                if (data.data == 1) {
                    Alert.success(data.msg, {displayDuration: 4000,pos: 'top'});
                } else {
                    Alert.warning(data.msg, {displayDuration: 4000,pos: 'top'});
                }
            },
            error: function(xhr, status, error) {
                // Handle error
            }
        });
    }
    // List all data
    function fnListCategoryData() {
        jQuery.ajax({
            url: "api/apiadmin.php",
            data: {
                action: 'ListCategoryData',
            },
            type: "POST",
            success: SuccessHandler
        });

        function SuccessHandler(data) {
            if (data.data == 1) {
                var mData = data.MasterCategory;
                row = '';
                if (mData.length > 0) {
                    for (var K = 0; K < mData.length; K++) {
                        row += '<option value="'+ mData[K].ProductCategoryID+'">'+mData[K].CategoryName+'</option>';
                    }
                } else {
                    row = '<option value="0" >--- Select Category ---</option>';
                }
                // append into html
                $('#ddlCategoryType').html(row);

            } else {
                Alert.warning(data.msg, {
                    displayDuration: 4000,
                    pos: 'top'
                });
            }
        };
    }

    // function for validate highlight
    function fnValidateFormHighlights() {
        var ret = true;
        if ($('#txtHighTitle').val() == '') {
            $("#txtHighTitle").css("background-color", "#f2dede");
            ret = false;
        }
        return ret;
    }
    
</script>

<body class="nav-md">
    <div class="container body">
        <input type="hidden" id="ProjectID">
        <input type="hidden" id="updateID" data-name="project">
        <!-- include for Navigation and top -->
        <?php include 'includes/include_TopHeader_LeftNavigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->
            <div class="row tile_count">
            </div>
            <!-- page content -->
            <div class="clearfix"></div>
            <div class="row">

                <!-- Job Information-->
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Job Information</h2>
                            <ul class="nav navbar-right panel_toolbox" style="margin-right: -35px;">

                                <li><a class="collapse-link"><i class="fa fa-chevron-up" id="ProjectSec1"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" id="projectsectionclose">
                            <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                <div class="col-md-6 col-sm-6  ">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtJobName">Job Position </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text" id="txtJobName" class="form-control txtJobName"
                                                maxlength="100">
                                            <input type="hidden" id="txtJobId">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtCompany">Company Name</label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text" id="txtCompany" class="form-control txtCompany"
                                                maxlength="100">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtSalary">Salary<sup>(in months)</sup></label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text" id="txtSalary" class="form-control txtSalary"
                                                maxlength="100" placeholder="$111 - $999/mo">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6  ">  
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="ddlCategoryType">Job Category</label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <select class="form-control ddlCategoryType" id="ddlCategoryType">
                                                <option value=""> -- Select Category --</option>
                                                <option value="Full Time">Full Time</option>
                                                <option value="Part Time">Part Time</option>
                                                <option value="Remote">Remote</option>
                                                <option value="Freelancer">Freelancer</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtLocation">job Location </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text" name="" id="txtLocation" class="form-control txtLocation">
                                        </div>
                                    </div>  
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtCompanyDescription">Company Description </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <textarea name="" id="txtCompanyDescription" cols="30" rows="3" class="form-control txtCompanyDescription">

                                            </textarea>
                                        </div>
                                    </div>                                 
                                </div>

                                <div class="col-md-12 col-sm-12 ">
                                        
                                        <div class="x_content">

                                            <!-- <form method="post" action="" enctype="multipart/form-data" id="blogForm"> -->
                                                <div class="item form-group">
                                                    <label class="col-form-label" for="txtName">Job Description</label>
                                                </div>
                                                
                                                <div class=" item form-group">
                                                        <textarea name="editor1" id="editor"></textarea>
                                                </div>
                                            <!-- </form> -->
                                        </div>
                                </div>

                                <div class="item form-group">
                                    <div class="col-md-12 col-sm-12 offset-md-3">
                                        <a class="btn btn-default" href="dashboard.php"> Cancel</a>
                                        <button class="btn btn-default btnResetMasterJob"> <i class="fa fa-refresh"
                                                aria-hidden="true"></i> Reset</button>
                                        <button class="btn btn-primary btnSaveMasterJob"> <i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i> Submit
                                        </button>
                                        <button class="btn btn-primary btnUpdateJobData" style="display:none"> <i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i> Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>

    <!-- include for Footer -->
    <?php include 'includes/include_Footer.php';?>    
   
</body>
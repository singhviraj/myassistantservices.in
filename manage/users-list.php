<?php include 'includes/sessionCheck.php';?>
<html lang="en">
<!-- include for html Header -->
<?php include 'includes/include_head.php';?>
<body class="nav-md">
    <div class="container body">

        <!-- include for Navigation and top -->
        <?php include 'includes/include_TopHeader_LeftNavigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->
            
            <!-- page content -->
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                            <div class="x_title">
                                <h2>Users</h2>
                                <ul class="nav navbar-right panel_toolbox" style="margin-right:-40px">
                                    <li class="list"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    <div class="col-md-6">
                                        <div class="item form-group"> 
                                        <div class="col-md-12 col-sm-12 ">
                                            <label class="col-form-label col-md-4 col-sm-4 label-align" for="about-builder">First Name</label>
                                            <div class="col-md-8 col-sm-8 ">
                                                <input type="text" id="txtFname" required="required"
                                                class="form-control txtFname" maxlength="15" placeholder="Enter First name">
                                                 <input type="hidden" id="txtHiddenid" required="required" readonly>
                                                 <input type="hidden" id="usertype" value="2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 ">
                                            <label class="col-form-label col-md-4 col-sm-4 label-align" for="about-builder">Last Name</label>
                                            <div class="col-md-8 col-sm-8">
                                            <input type="text" name="" class="form-control txtLname"
                                            id="txtLname" required maxlength="15" placeholder=" Enter Last name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12">
                                            <label class="col-form-label col-md-4 col-sm-4 label-align" for="about-builder">Email ID</label>
                                            <div class="col-md-8 col-sm-8-">
                                                <input type="text" name="" class="form-control txtEmail" id="txtEmail" maxlength="50" placeholder="Enter Email Id">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="about-builder">Mobile Number</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input type="text" name="" class="form-control txtNumber" id="txtNumber" maxlength="10" required placeholder="Enter Mobile Number" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="about-builder">Phone Number</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input type="text" name="" class="form-control txtPhone" id="txtPhone" maxlength="10" required placeholder="Enter Phone Number" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12">
                                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="about-builder">WhatsApp Number</label>
                                                <div class="col-md-8 col-sm-8">
                                                    <input type="text" name="" class="form-control txtWhatsApp" id="txtWhatsApp" maxlength="10" required placeholder="Enter WhatsApp Number" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                                                </div>
                                            </div>
                                        </div>
                                        </div>                                    
                                    </div>
                                    <div class="col-md-12">
                                        <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 offset-md-3">
                                            <button class="btn btn-default btnResetUser ud-btn"> <i class="fa fa-refresh" aria-hidden="true"></i>  Reset</button>
                                            <button class="btn btn-primary ud-btn btnSaveUser">Submit </button>
                                            <button class="btn btn-success ud-btn btnUpdateUser">Update </button>
                                        </div>
                                    </div>                                        
                                    </div>
                            </div>
                        <div class="clearfix"></div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-responsive"
                                    id="myTableUsers" style="font-size:13px;">
                                    <thead>
                                        <tr>
                                            <th>S.No. </th>
                                            <th>Full Name</th>
                                            <th>Login ID</th>
                                            <th>Email ID</th>
                                            <th>Mobile No</th>
                                            <th>Phone No</th>
                                            <th>WhatsApp No</th> 
                                            <th style="width:70px">Action</th>                                         
                                        </tr>
                                    </thead>
                                    <tbody id="DataShowUsers">

                                    </tbody>
                                </table>
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
    <script type="text/javascript">        
        $(document).ready(function() {
            fnListUsersData();
            $('input[type=text]').focus(function(event) {
                $(this).css({'background-color' : '', 'border-color' : ''});
            });        
            $('.btnUpdateUser').css('background','#999').attr('disabled', 'disabled').click(function(event) {                fnUpdateUserData();
            });        
            $('.btnSaveUser').click(function(event) {
                fnInsertUser();
            });
            $('.btnResetUser').click(function(event) {
                fnclearControlUser();
            });
        });
    </script>
    <script type="text/javascript">
        //funtion for insert contacts data            
        function fnInsertUser(){    
            // if(!fncheckValidEmailUser()) return;  
            if (!fnValidateFormUsers()) return;
            jQuery.ajax({
                    url: "api/apiadmin.php",
                    data: {
                        action: 'insertUsersData',
                        FirstName: $('#txtFname').val(),
                        LastName: $('#txtLname').val(),
                        Email: $('#txtEmail').val(),
                        MobileNo:$('#txtNumber').val(),
                        PhoneNo:$('#txtPhone').val(),
                        WhatsAppNo:$('#txtWhatsApp').val()
                        },
                        type: "POST",
                        success: SuccessHandler
                    });
            function SuccessHandler(data) {
                //console.log(data);               
                if (data.data == 1) {
                    Alert.success(data.msg,{displayDuration: 4000, pos: 'top'});
                    $('#txtFname').val('');
                    $('#txtLname').val('');
                    $('#txtEmail').val('');
                    $('#txtNumber').val('');
                    $('#txtPhone').val('');
                    $('#txtWhatsApp').val('');
                    fnListUsersData();
                }else if(data.data == 2){
                    Alert.warning(data.msg,{displayDuration: 4000, pos: 'top'});
                }else {
                    Alert.error(data.msg,{displayDuration: 4000, pos: 'top'});
                }
            }
        }  
        //function for list Users data
        function fnListUsersData(){
            $('#myTableUsers').DataTable().destroy();
            $.ajax({
                type: "POST",
                dataType: "json",
                success: SuccessHandler,
                url: 'api/apiadmin.php',
                data: {
                    action: "listUsersData"
                }
            });

            function SuccessHandler(data) {   

               if(data.success==true){
                var row = "",
                jData = '';
                jData = data.data;
                var Status = '';
                if (jData.length > 0) {
                    for (var K = 0; K < jData.length; K++) {
                        if (jData[K].FirstName == null) {
                        var FirstName ='';
                        } else {
                            var FirstName = jData[K].FirstName;
                        }

                        if (jData[K].LastName == null) {
                        var LastName ='';
                        } else {
                            var LastName = jData[K].LastName;
                        }

                        if (jData[K].EmailID == null) {
                        var EmailID ='';
                        } else {
                            var EmailID = jData[K].EmailID;
                        }

                        if (jData[K].MobileNo == null) {
                        var MobileNo ='';
                        } else {
                            var MobileNo = jData[K].MobileNo;
                        }

                        if (jData[K].Phone == null) {
                        var Phone ='';
                        } else {
                            var Phone = jData[K].Phone;
                        }

                        if (jData[K].WhatsAppNo == null) {
                        var WhatsAppNo ='';
                        } else {
                            var WhatsAppNo = jData[K].WhatsAppNo;
                        }

                        if (jData[K].IsActive == 1) {
                            Status = '<a class="btn btn-warning btn-xs" onClick="fnChangeUserStatus(' + jData[K].UserID+',0)">Deactive</a>';
                        } else {
                            Status = '<a class="btn btn-success btn-xs" onClick="fnChangeUserStatus(' + jData[K].UserID+',1)">Active</a>';
                        }
                        row += '<tr><td>' + (K + 1) + '</td><td>' + FirstName +' '+ LastName +'</td><td>' + jData[K].LoginID + '</td><td>' + EmailID + '</td><td>' + MobileNo +'</td><td>' + Phone +'</td><td>' + WhatsAppNo +'</td><td><a class="btn btn-primary btn-xs" onclick="fnUserInfo('+jData[K].UserID+')"><i class="fa fa-pencil" aria-hidden="true"></i></a> | ' + Status + '</td></tr></tr>';
                    }
                    row;
                } else {
                    row = '';
                }
                    $('#DataShowUsers').html(row);
                    $('#myTableUsers').DataTable();

               }else{
                Alert.error('Something Went Wrong..!', {
                displayDuration: 4000,
                pos: 'top'
            });
               }
            };
        }

        // function for change user status
        function fnChangeUserStatus(UserID, status) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: 'api/apiadmin.php',
                success: SuccessHandler,
                data: {
                    action: "changeUserStatus",
                    UserId: UserID,
                    UserStatus: status
                }
            });

            function SuccessHandler(data) {
                //console.log(data)
                fnListUsersData();
            };

        }
        //function for insert user data
        function fnUserInfo(UserID) {
            $('.btnSaveUser').css('background','#999').attr('disabled', 'disabled');
            $('.btnUpdateUser').css('background','#26B99A').removeAttr('disabled');
            $.ajax({
                type: "POST",
                dataType: "json",
                success: SuccessHandler,
                url: 'api/apiadmin.php',
                data: {
                    action: "getUserInfoById",
                    UserID: UserID
                }
            });

            function SuccessHandler(data) {
                if (data.success==true) {
                    //console.log(data);
                    $('#txtHiddenid').val(data.data[0].UserID);
                    $('#txtFname').val(data.data[0].FirstName).css('background','');
                    $('#txtLname').val(data.data[0].LastName).css('background','');
                    $('#txtEmail').val(data.data[0].EmailID).css('background','');
                    $('#txtNumber').val(data.data[0].Phone).css('background','');
                    $('#txtPhone').val(data.data[0].MobileNo).css('background','');
                    $('#txtWhatsApp').val(data.data[0].WhatsAppNo).css('background','');
                } else {
                    Alert.error(data.msg, {displayDuration: 4000,pos: 'top'});
                }
            };
        }

        //function for update user data 
        function fnUpdateUserData(UserID) {
            if (!fnValidateFormUsers()) return;
            // if(!fncheckValidEmailUser()) return;
            $.ajax({
                type: "POST",
                dataType: "json",
                success: SuccessHandler,
                url: 'api/apiadmin.php',
                data: {
                    action:"updateUserDetail",
                    UserID : $('#txtHiddenid').val(),
                    FirstName: $('#txtFname').val(),
                    LastName:$('#txtLname').val(),
                    EmailID:$('#txtEmail').val(),
                    Phone:$('#txtPhone').val(),
                    MobileNo:$('#txtNumber').val(),
                    WhatsAppNo:$('#txtWhatsApp').val()
                }
            });

            function SuccessHandler(data) {
                if (data.data == 1) {
                    Alert.success(data.msg, {displayDuration: 4000,pos: 'top'});
                    fnListUsersData();
                }else{
                    Alert.error(data.msg, {displayDuration: 4000,pos: 'top'});
                }
                
            };
        }

        //function for email validation
        function fncheckValidEmailUser() {
            var ret = true;
            if (/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test($('#txtEmail').val()) || $('#txtEmail').val() == '') {
                ret = true;
            } else {
                $('#txtEmail').css("border-color", "#ff0000");
                ret = false;
            }  
            return ret;
        }
        // function for form validation 
        function fnValidateFormUsers() {
            var ret = true;

            if ($('#txtFname').val() == '') {
                $("#txtFname").css("background-color", "#f2dede");
                ret = false;
            }
            if ($('#txtLname').val() == '') {
                $("#txtLname").css("background-color", "#f2dede");
                ret = false;
            }
            if ($('#txtEmail').val() == '') {
                $("#txtEmail").css("background-color", "#f2dede");
                ret = false;           
            }
            if ($('#txtNumber').val() == '') {
                $("#txtNumber").css("background-color", "#f2dede");
                ret = false;
            }
           
            if ($('#txtWhatsApp').val() == '') {
                $("#txtWhatsApp").css("background-color", "#f2dede");
                ret = false;
            }
            return ret;

        } 
        //function for clear input field
        function fnclearControlUser() {
            $('#txtFname').val('');
            $('#txtLname').val('');
            $('#txtEmail').val('');
            $('#txtNumber').val('');
            $('#txtPhone').val('');
            $('#txtWhatsApp').val('');
            $('#txtNumber').removeAttr('disabled', 'disabled');
            $('.btnSaveUser').css('background','#337ab7').removeAttr('disabled', 'disabled');
            $('.btnUpdateUser').css('background','#999').attr('disabled', 'disabled');
        };   
    </script>
</body> 
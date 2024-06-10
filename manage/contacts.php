<?php include 'includes/sessionCheck.php';?>
<html lang="en">
<!-- include for html Header -->
<?php include 'includes/include_head.php';?>
<style>
    
    .checkBoxs{
        width: 20px;
        height: 20px;
    }
    .ud-btn{
        margin-bottom: 4px !important;
    }  
    
    .searchlist{
        float: right !important;
       letter-spacing: 5px;
       cursor: pointer;
       list-style: none;
       display: inline-flex;
       font-size: 19px;
    }
    div>ul>li{
        padding-left: 7px;
    }
    @media only screen and (max-width: 600px) {
      div>ul>li{
        padding-left: 0;
    }
        .searchlist {
            float: left;
            letter-spacing: 5px;
            cursor: pointer;
            list-style: none;
            display: inline-flex;
            font-size: 10px;
            margin-left: -37px;
        }
    }
    @media only screen and (max-width: 1200px) {
          div>ul>li{
            padding-left: 0;
        }
    }

</style>
<body class="nav-md">
    <div class="container body">

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
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Contacts</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="list"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="checkboxitem form-group">
                                    <input type="checkbox" id="checkBox" class="checkBoxs" onclick="fncheckBox();"> <label>As a user</label>
                                </div>
                                <div class="item form-group">                                    
                                    <input type="text" id="txtFname" required="required"
                                        class="form-control txtFname" maxlength="15" placeholder="Enter First name">
                                    <input type="hidden" id="txtid" required="required" readonly>   
                                </div>
                                <div class="item form-group">
                                    <input type="text" name="" class="form-control txtLname"
                                        id="txtLname" required maxlength="15" placeholder=" Enter Last name">
                                    </div>
                                <div class="item form-group">                                    
                                    <input type="text" name="" class="form-control txtEmail"
                                        id="txtEmail" maxlength="30" placeholder="Enter Email Id">
                                </div>
                                <div class="item form-group">
                                    <input type="text" name="" class="form-control txtNumber"
                                        id="txtNumber" maxlength="10" required placeholder="Enter Mobile Number" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                                </div>                                   
                                
                                <div class="item form-group">                                   
                                    <input type="text" name="" class="form-control txtPhone"
                                        id="txtPhone" maxlength="10" required placeholder="Enter Phone Number" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">                                        
                                </div>
                                <div class="item form-group">
                                   <input type="text" name="" class="form-control txtWhatsApp"
                                        id="txtWhatsApp" maxlength="10" required placeholder="Enter WhatsApp Number" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
                                </div>
                                <div class="item form-group">                                    
                                    <button class="btn btn-info ud-btn btnCancelContact" type="button">Cancel</button>
                                    <button class="btn btn-default btnResetContact ud-btn"> <i class="fa fa-refresh" aria-hidden="true"></i>  Reset</button>
                                    <button class="btn btn-primary ud-btn btnSaveContact">Submit </button>
                                    <button class="btn btn-success ud-btn btnUpdate">Update </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div style="float:left;">
                        <ul class="searchlist">
                            Search:<li onclick="fnListContactsData('A');" id='A'>A</li>
                            <li onclick="fnListContactsData('B');" id='B'>B</li>
                            <li onclick="fnListContactsData('C');" id='C'>C</li>
                            <li onclick="fnListContactsData('D');" id='D'>D</li>
                            <li onclick="fnListContactsData('E');" id="E">E</li>
                            <li onclick="fnListContactsData('F');" id="F">F</li>
                            <li onclick="fnListContactsData('G');" id="G">G</li>
                            <li onclick="fnListContactsData('H');" id="H">H</li>
                            <li onclick="fnListContactsData('I');" id="I">I</li>
                            <li onclick="fnListContactsData('J');" id="J">J</li>
                            <li onclick="fnListContactsData('K');" id="K">K</li>
                            <li onclick="fnListContactsData('L');" id="L">L</li>
                            <li onclick="fnListContactsData('M');" id="M">M</li>
                            <li onclick="fnListContactsData('N');" id="N">N</li>
                            <li onclick="fnListContactsData('O');" id="O">O</li>
                            <li onclick="fnListContactsData('P');" id="P">P</li>
                            <li onclick="fnListContactsData('Q');" id="Q">Q</li>
                            <li onclick="fnListContactsData('R');" id="R">R</li>
                            <li onclick="fnListContactsData('S');" id="S">S</li>
                            <li onclick="fnListContactsData('T');" id="T">T</li>
                            <li onclick="fnListContactsData('U');" id="U">U</li>
                            <li onclick="fnListContactsData('V');" id="V">V</li>
                            <li onclick="fnListContactsData('W');" id="W">W</li>
                            <li onclick="fnListContactsData('X');" id="X">X</li>
                            <li onclick="fnListContactsData('Y');" id="Y">Y</li>
                            <li onclick="fnListContactsData('Z');" id="Z">Z</li>
                        </ul>
                    </div>
                    <div class="x_panel col-sm-12 col-md-12 col ">
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-responsive"
                                    id="myTableforContact" style="font-size:13px;">
                                    <thead>
                                        <tr>
                                            <th>S.No. </th>
                                            <th>Full Name</th>
                                            <th>Email ID</th>
                                            <th>Mobile No</th>
                                            <th>Phone No</th>
                                            <th>WhatsApp No</th>                                          
                                        </tr>
                                    </thead>
                                    <tbody id="DataShowforContact">

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
            fnListContactsData('0');
            $('input[type=text]').focus(function(event) {
                $(this).css({'background-color' : '', 'border-color' : ''});
            });

            $('.btnSaveContact').click(function(event) {
                fnCreateContacts();                
            });

            $('.btnUpdate').css('background','#999').attr('disabled', 'disabled').click(function(event) {
                fnUpdateContactsData();
            });

            $('.btnResetContact').click(function(event) {
                fnClearControlContact();
            });
                   
            $('.btnCancelContact').click(function(event) {
                window.location.href="dashboard.php";
            });
            $(document).on('click','#getData',function(event){

                $('.btnSaveContact').css('background','#999').attr('disabled', 'disabled');
                $('#checkBox').attr('disabled', 'disabled');
                $('.btnUpdate').css('background','#169F85').removeAttr('disabled');
                $('#txtid').val($(this).attr('data-id'));
                $('#txtFname').val($(this).attr('data-fname')).css('background','');
                $('#txtLname').val($(this).attr('data-lname')).css('background','');
                $('#txtEmail').val($(this).attr('data-email')).css('background','');
                $('#txtNumber').val($(this).attr('data-mobile')).css('background','');
                $('#txtPhone').val($(this).attr('data-phone')).css('background','');
                $('#txtWhatsApp').val($(this).attr('data-whatsapp')).css('background','');
            });
        });
    </script>


<script type="text/javascript" defer>

    //funtion for insert contacts data
    function fnCreateContacts(){
        if (!fnValidateFormforContact()) return;
        // if(!fncheckValidEmailforContact()) return;
        var checkBox = document.getElementById("checkBox");
        if (checkBox.checked == true){
           var checkValue=1; 
        } else {
             var checkValue=0; 
        }
        jQuery.ajax({

            url: "api/apiadmin.php",
            data: {
                action: 'insertContactsData',
                FirstName: $('#txtFname').val(),
                LastName: $('#txtLname').val(),
                Email: $('#txtEmail').val(),
                MobileNo:$('#txtNumber').val(),
                PhoneNo:$('#txtPhone').val(),
                WhatsAppNo:$('#txtWhatsApp').val(),
                checkValue:checkValue
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
                fnListContactsData(0);
            }else if(data.data == 2){
                Alert.warning(data.msg,{displayDuration: 4000, pos: 'top'});
            }else {
                Alert.error(data.msg,{displayDuration: 4000, pos: 'top'});
            }
        }
    }

    //function for list Contacts data
    function fnListContactsData(searchString) {
         $('li').css('background-color','');
        $('#'+searchString).css('background-color','red');
        $.ajax({
            type: "POST",
            dataType: "json",
            success: SuccessHandler,
            url: 'api/apiadmin.php',
            data: {
                action: "listContactsData",
                searchString:searchString
            }
        });

        function SuccessHandler(data) {
            //console.log(data);
            $('#myTableforContact').DataTable().destroy();
            var row = "",
                jData = '';
            jData = data.data;
            var Status = '';
            if (jData.length > 0) {
                for (var K = 0; K < jData.length; K++) {
                    if (jData[K].LastName == null) {
                        var lastname = '';
                    } else {
                        var lastname = jData[K].LastName;
                    }

                    if (jData[K].PhoneNo == null) {
                        var phoneNo ='';
                    } else {
                        var phoneNo = jData[K].PhoneNo;
                    }

                    if (jData[K].WhatsAppNo == null) {
                        var WhatsAppNo = '';
                    } else {
                        var WhatsAppNo = jData[K].WhatsAppNo;
                    }

                    if (jData[K].EmailID == null) {
                        var EmailID = '';
                    } else if(jData[K].EmailID == ''){
                        var EmailID = '';
                    }else{
                        var EmailID = jData[K].EmailID;
                    }

                    row += '<tr><td>' + (K + 1) + '</td><td style="cursor: pointer;" id="getData" data-id="'+jData[K].ContactID+'" data-fname="'+jData[K].FirstName+'" data-lname="'+lastname+'" data-email="'+ EmailID +'" data-mobile="'+jData[K].MobileNO+'" data-phone="'+jData[K].PhoneNo+'" data-whatsapp="'+WhatsAppNo+'"  >' + jData[K].FirstName +' '+ lastname +'</td><td>' + EmailID + '</td><td>' + jData[K].MobileNO + '</td><td>' + phoneNo +'</td><td>' + WhatsAppNo + '</td></tr>';
                }
                row;
            } else {
                row = '';
            }
            $('#DataShowforContact').html(row);
            $('#myTableforContact').DataTable();
        };
    }

    
    // update contacts details
    function fnUpdateContactsData(){

        if (!fnValidateFormforContact()) return;
        // if(!fncheckValidEmailforContact()) return;
        var ContactID = $('#txtid').val();
        var FirstName = $('#txtFname').val();
        var LastName = $('#txtLname').val();
        var Email = $('#txtEmail').val();
        var MobileNo = $('#txtNumber').val();
        var PhoneNo= $('#txtPhone').val();
        var WhatsAppNo= $('#txtWhatsApp').val();
        $.ajax({ type: "POST", dataType: "json", success: SuccessHandler,
                url: 'api/apiadmin.php',
                data: {
                action: "updateContactinfoById",
                ContactID:ContactID,
                FirstName:FirstName,
                LastName:LastName,
                Email:Email,
                MobileNo:MobileNo,
                PhoneNo:PhoneNo,
                WhatsAppNo:WhatsAppNo,
                }
            });
        function SuccessHandler(data) {
                if (data.success === true) {
                Alert.success(data.msg,{displayDuration: 4000, pos: 'top'});
                fnListContactsData(0);
                }else{
                     Alert.error(data.msg,{displayDuration: 4000, pos: 'top'});
                     
                }       
        }
    } 

    // function for form validation 
    function fnValidateFormforContact() {
        var ret = true;
        if ($('#txtFname').val() == '') {
            $("#txtFname").css("background-color", "#f2dede");
            ret = false;
        }
        if ($('#txtNumber').val() == '') {
            $("#txtNumber").css("background-color", "#f2dede");
            ret = false;
        }
        return ret;
    }
    
    //function for email validation
    function fncheckValidEmailforContact() {
        var ret = true;
        if (/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test($('#txtEmail').val()) || $('#txtEmail').val() == '') {
            ret = true;
        } else {
            $('#txtEmail').css("border-color", "#ff0000");
            ret = false;
        }  
        return ret;
    }
    
    //function for clear input field
    function fnClearControlContact() {
        $('#txtFname').val('');
        $('#txtLname').val('');
        $('#txtEmail').val('');
        $('#txtNumber').val('');
        $('#txtPhone').val('');
        $('#txtWhatsApp').val('');
        $('.btnSaveContact').css('background','').removeAttr('disabled', 'disabled');
        $('.btnUpdate').css('background','#999').attr('disabled', 'disabled');        
        $('#checkBox').removeAttr('disabled','disabled');

    };

</script>
</body> 
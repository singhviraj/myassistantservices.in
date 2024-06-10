<?php include 'includes/sessionCheck.php'; ?>
<html lang="en">
<!-- include for html Header -->
<?php include 'includes/include_head.php';?>
<script type="text/javascript">
$(document).ready(function() {

    var BuilderID = $.QueryString('BuilderID');
    $('#BuilderID').val(BuilderID);
    if (!(BuilderID == null)) {
        fnBuilderInfo(BuilderID);
        fnBuilderMetaInfo(BuilderID);
    }

    $('input[type=text]').focus(function(event) {
        $(this).css("background-color", "");
    });

    $('#fileBuilderLogo').focus(function(event) {
        $('#fileBuilderLogo').css("background-color", "");
    });

    $('textarea').focus(function(event) {
        $(this).css("background-color", "");
    });

    $('.btnBuilderInfoSave').click(function(event) {
        fnCreatemasterbuilder();
    });

    $('.btnUpdateBuilderData').click(function(event) {
        var BuilderID = $.QueryString('BuilderID');
            fnUpdateBuilderInfo(BuilderID);
    });

    $('.btnBuilderInfoReset').click(function(event) {
        fnBuilderClearControl();
    });

    $('.btnBuilderMetaSave').click(function(event) {
        fnCreateBuildermetatag();
    });

    $('.btnBuilderMetaReset').click(function(event) {
        fnMetaClearControl();
    });
    $('.btnBuilderMetaUpdate').click(function(event) {
        fnUpdateBuilderMetaInfo();            
    });

});
</script>

<script type="text/javascript">
//============= Section 1 Builder Information Start ===========================
//----- Update Master Builder  Data ------------
function fnUpdateBuilderInfo(BuilderID) {

    if (!fnBuilderValidateForm()) return;
        if ($('#fileBuilderLogo').val() != '') {
        var builderLogo = document.getElementById('fileBuilderLogo').files[0];
        var image_name = builderLogo.name;
        var builderLogo2 = 1;
        var image_extension = image_name.split('.').pop().toLowerCase();
            if(jQuery.inArray(image_extension,['jpg','jpeg','png','']) == -1){
                Alert.warning('Invalid File Type, Please Choose jpg, jpeg And png', {
                        displayDuration: 4000,
                        pos: 'top'
                });
                return;
            }
        }else{
            var builderLogo2 = $('#builderLogoImageName').attr('dataBuilderLogo');
        }
        var action= "updateBuilderinfoById";
        var form_data = new FormData();
        form_data.append("file",builderLogo);
        form_data.append("check",builderLogo2);
        form_data.append("BuilderName",$('#txtBuilderName').val());
        form_data.append("AboutBuilder",$('#txtAboutBuilder').val());
        form_data.append("RegisteredOffice",$('#txtRegisteredOffice').val());
        form_data.append("RegionalOffice",$('#txtRegionalOffice').val());
        form_data.append("ReraNumber",$('#txtReraNumber').val());
        form_data.append("Website",$('#txtWebsite').val());
        form_data.append("VideoURL",$('#txtVideoUrl').val());
        form_data.append("YTURL",$('#txtYTUrl').val());
        form_data.append("action",action);
        form_data.append("BuilderID",BuilderID);
        $.ajax({ type: "POST", dataType: "json", success: SuccessHandler,
                url: "api/apiadmin.php",
                data:form_data,
                cache : false,
                contentType:false,
                processData: false,
                beforeSend: function(){
                //  $('#MsgBox').show();
                //   $('.lcMessage').text('Please Wait, till document gets uploaded.');
                //   $('.btnSave').attr("disabled","disabled");
                //   $('#MsgBox').addClass('alert-warning');
                
                },
            });

            function SuccessHandler(data) {
                // console.log(data);
                if (data.data == 1) {
                    $('#updateID').val(data.BuilderID);
                    $('#ShowBuilderLogo').html('<img src="assets/'+data.BuilderID+'/'+data.fileName+'" alt="" srcset="" height="100px" >');
                    Alert.success(data.msg, {
                        displayDuration: 4000,
                        pos: 'top'
                    });
                } else {
                    Alert.warning(data.msg, {
                        displayDuration: 4000,
                        pos: 'top'
                    });
                }
            };
    
}

// ---------get builder data by builder ID------
function fnBuilderInfo(BuilderID) {
    $.ajax({
        type: "POST",
        dataType: "json",
        success: SuccessHandler,
        url: 'api/apiadmin.php',
        data: {
            action: "getBuilderinfoById",
            BuilderID: BuilderID
        }
    });

    function SuccessHandler(data) {
       // console.log(data);
        if (data.success == true) {
            $('.btnBuilderInfoSave').css('background', '#999').attr('disabled', 'disabled');
            $('.btnBuilderInfoReset').css('background','#999').attr('disabled', 'disabled');
            $('.btnUpdateBuilderData').show();

            $('#txtBuilderName').val(data.data.BuilderName);
            $('#txtAboutBuilder').val(data.data.AboutBuilder);
            $('#txtRegisteredOffice').val(data.data.RegisteredOffice);
            $('#txtRegionalOffice').val(data.data.RegionalOffice);
            $('#txtReraNumber').val(data.data.RERA);
            $('#txtWebsite').val(data.data.Website);
            $('#txtVideoUrl').val(data.data.VideoURL);
            $('#txtYTUrl').val(data.data.YTURL);
           // $('#fileBuilderLogo').val();
            $('#builderLogoImageName').val(data.data.BuilderLogo);
            // $('#fileBuilderLogo').target.files[0].name;
            $('#ShowBuilderLogo').html('<img src="assets/'+BuilderID+'/'+data.data.BuilderLogo+'" alt="" srcset="" height="100px" >');
        } else {
            Alert.warning(data.msg, {
                displayDuration: 4000,
                pos: 'top'
            });
        }
    };
}

//------- Save  Master Builder  Data --------
function fnCreatemasterbuilder() {
        if (!fnBuilderValidateForm()) return;
        if ($('#fileBuilderLogo').val() != '') {
        var builderLogo = document.getElementById('fileBuilderLogo').files[0];
        var image_name = builderLogo.name;
        var image_extension = image_name.split('.').pop().toLowerCase();
        var builderLogo2 = 1;
            if(jQuery.inArray(image_extension,['jpg','jpeg','png','']) == -1){
                Alert.warning('Invalid File Type, Please Choose jpg, jpeg And png', {
                        displayDuration: 4000,
                        pos: 'top'
                });
                return;
            }
        }else{
            var builderLogo2 = 0;
        }
        var action= "insertMasterBuilderdata";
        var form_data = new FormData();
        form_data.append("file",builderLogo);
        form_data.append("check",builderLogo2);
        form_data.append("BuilderName",$('#txtBuilderName').val());
        form_data.append("AboutBuilder",$('#txtAboutBuilder').val());
        form_data.append("RegisteredOffice",$('#txtRegisteredOffice').val());
        form_data.append("RegionalOffice",$('#txtRegionalOffice').val());
        form_data.append("ReraNumber",$('#txtReraNumber').val());
        form_data.append("Website",$('#txtWebsite').val());
        form_data.append("VideoURL",$('#txtVideoUrl').val());
        form_data.append("YTURL",$('#txtYTUrl').val());
        form_data.append("action",action);
        $.ajax({ type: "POST", dataType: "json", success: SuccessHandler,
                    url: "api/apiadmin.php",
                    data:form_data,
                    cache : false,
                    contentType:false,
                    processData: false,
                    beforeSend: function(){
                //  $('#MsgBox').show();
                //   $('.lcMessage').text('Please Wait, till document gets uploaded.');
                //   $('.btnSave').attr("disabled","disabled");
                //   $('#MsgBox').addClass('alert-warning');
                    
                    },
            });

            function SuccessHandler(data) {
                    //console.log(data);
                if (data.data == 1) {
                    $('#updateID').val(data.BuilderID);
                    $('#ShowBuilderLogo').html('<img src="assets/'+data.BuilderID+'/'+data.fileName+'" alt="" srcset="" height="100px" >');
                    Alert.success(data.msg, {
                        displayDuration: 4000,
                        pos: 'top'
                    });
                } else {
                    Alert.warning(data.msg, {
                        displayDuration: 4000,
                        pos: 'top'
                    });
                }
            };
}

//---------  Validation of  Master Builder --------
function fnBuilderValidateForm() {
    var ret = true;

    if ($('#txtBuilderName').val() == '') {
        $("#txtBuilderName").css("background-color", "#f2dede");
        ret = false;
    }

    if ($('#txtAboutBuilder').val() == '') {
        $("#txtAboutBuilder").css("background-color", "#f2dede");
        ret = false;
    }

    return ret;

};

//---------  form control of  Master Builder --------
function fnBuilderClearControl() {
    $('#txtBuilderName').val('');
    $('#txtAboutBuilder').val('');
    $('#txtRegisteredOffice').val('');
    $('#txtRegionalOffice').val('');
    $('#txtReraNumber').val('');
    $('#txtWebsite').val('');
    $('#txtVideoUrl').val('');
    $('#txtYTUrl').val('');
    $('#fileBuilderLogo').val('');
};
//============= Section 1 Builder Information End ===========================


//============= Section 2 Builder Meta`s Start ===============================

// --------- get builder meta`s info   ------
function fnBuilderMetaInfo(BuilderID) {
    $('.btnBuilderMetaReset').css('background','#999').attr('disabled', 'disabled');
    $('.btnBuilderMetaSave').hide();
    $('.btnBuilderMetaUpdate').show();
    $.ajax({
        type: "POST",
        dataType: "json",
        success: SuccessHandler,
        url: 'api/apiadmin.php',
        data: {
            action: "getBuilderMetainfoById",
            BuilderID: BuilderID
        }
    });

    function SuccessHandler(data) {
       $('.btnBuilderMetaSave').css('background', '#999').attr('disabled', 'disabled');            
        if (data) {
            $('#txtCustomPageUrl').val(data.data.CustomPageURL);
            $('#txtFacebookUrl').val(data.data.FacebookURL);
            $('#txtTwitterUrl').val(data.data.TwitterURL);
            $('#txtInstagramUrl').val(data.data.InstagramURL);
            $('#txtGoogleUrl').val(data.data.GoogleURL);
            $('#txtpageTitle').val(data.data.PageTitle);
            $('#txtMetaDescription').val(data.data.MetaDescription);
            $('#txtMetaKeyword').val(data.data.MetaKeyword);
            $('#txtFacebookTitleOG').val(data.data.FacebookTitleOG);
            $('#txtFacebookUrlOG').val(data.data.FacebookUrlOG);
            $('#txtFacebookDescriptionOG').val(data.data.FacebookDescriptionOG);
            $('#txtTwitterTitleOG').val(data.data.TwitterTitleOG);
            $('#txtTwitterUrlOG').val(data.data.TwitterUrlOG);
            $('#txtTwitterDescriptionOG').val(data.data.TwitterDescriptionOG);
            $('#fileFacebookImageOG').attr("value",data.data.FacebookImageOG);
            $('#fileTwitterImageOG').attr("value",data.data.TwitterImageOG);
            $('#showFbmetaOg').html('<img src="assets/'+BuilderID+'/fbmetaOgImage/'+data.data.FacebookImageOG+'" alt="" srcset="" height="100px" >');
            $('#showTwmetaOg').html('<img src="assets/'+BuilderID+'/twmetaOgImage/'+data.data.TwitterImageOG+'" alt="" srcset="" height="100px" >');

        } else {
            Alert.warning(data.msg, {
                displayDuration: 4000,
                pos: 'top'
            });
        }
    };
}
//----- Update Master Builder  Meta Info ------------
function fnUpdateBuilderMetaInfo() {     
    var BuilderID = $('#BuilderID').val();
    if(!fnValidateForBuilderMeta()) return;
    if(($('#fileFacebookImageOG').val()!= '') || ($('#fileTwitterImageOG').val()!='')){
        if ($('#fileFacebookImageOG').val()!= '') {     
            var logoMetaFb = document.getElementById('fileFacebookImageOG').files[0];
            var image_name = logoMetaFb.name;
            var image_extension = image_name.split('.').pop().toLowerCase();
            var builderMetafb=1;

            if(jQuery.inArray(image_extension,['jpg','jpeg','png','']) == -1){
                Alert.warning('Invalid File Type, Please Choose jpg, jpeg And png', {
                    displayDuration: 4000,pos: 'top'});
                    return;
                } 
        }else{
                var builderMetafb=0;
        }

        if($('#fileTwitterImageOG').val()!=''){
            var logoMetaTw = document.getElementById('fileTwitterImageOG').files[0];
            var image_name2 = logoMetaTw.name
            var image_extension2 = image_name2.split('.').pop().toLowerCase();        
            var builderMetatw=1;

            if(jQuery.inArray(image_extension2,['jpg','jpeg','png','']) == -1){
                Alert.warning('Invalid File Type, Please Choose jpg, jpeg And png', {displayDuration: 4000,pos: 'top'});
                    return;
                }       
        }else{
                var builderMetatw=0;
        }
    }else{
                var builderMetafb=0;
                var builderMetatw=0;
            }
            var action= "updateBuilderMetainfoById";
            var form_data = new FormData();
            form_data.append("fbimage",logoMetaFb);
            form_data.append("twimage",logoMetaTw);
           // form_data.append("file_name",filename);
            form_data.append("BuilderId",BuilderID);
            form_data.append("metaFbCheck",builderMetafb);
            form_data.append("metaTwCheck",builderMetatw);
            form_data.append("customPageUrl",$('#txtCustomPageUrl').val());
            form_data.append("facebookUrl",$('#txtFacebookUrl').val());
            form_data.append("twitterUrl",$('#txtTwitterUrl').val());
            form_data.append("instagramUrl",$('#txtInstagramUrl').val());
            form_data.append("googleUrl",$('#txtGoogleUrl').val());
            form_data.append("PageTitle",$('#txtpageTitle').val());
            form_data.append("metaDescription",$('#txtMetaDescription').val());
            form_data.append("metaKeyword",$('#txtMetaKeyword').val());
            form_data.append("facebookTitleOG",$('#txtFacebookTitleOG').val());
            form_data.append("fileFacebookImageOG",$('#fileFacebookImageOG').val());
            form_data.append("facebookUrlOG",$('#txtFacebookUrlOG').val());
            form_data.append("facebookDescriptionOG",$('#txtFacebookDescriptionOG').val());
            form_data.append("twitterTitleOG",$('#txtTwitterTitleOG').val());
            form_data.append("twitterDescriptionOG",$('#txtTwitterDescriptionOG').val());
            form_data.append("fileTwitterImageOG",$('#fileTwitterImageOG').val());
            form_data.append("twitterUrlOG",$('#txtTwitterUrlOG').val());
            form_data.append("action",action);
            $.ajax({ type: "POST", dataType: "json", success: SuccessHandler,
                      url: "api/apiadmin.php",
                      data:form_data,
                      cache : false,
                      contentType:false,
                      processData: false,
                      beforeSend: function(){                      
                     },
				});

            function SuccessHandler(data) {
                    console.log(data);
                if (data.data == 1) {
                    //$('#updateID').val(data.BuilderID);
                    $('#showFbmetaOg').html('<img src="assets/'+data.BuilderID+'/fbmetaOgImage/'+data.fileName+'" alt="" srcset="" height="100px" >');
                    $('#showTwmetaOg').html('<img src="assets/'+data.BuilderID+'/twmetaOgImage/'+data.fileName2+'" alt="" srcset="" height="100px" >');
                    
                    Alert.success(data.msg, {displayDuration: 4000,pos: 'top'});
                } else {
                    Alert.warning(data.msg, {displayDuration: 4000,pos: 'top'});
                }
            };
}
//------- fn Add Builder meta`s Information --------
function fnCreateBuildermetatag() {  

    if(!fnValidateForBuilderMeta()) return;
    if(($('#fileFacebookImageOG').val()!= '') || ($('#fileTwitterImageOG').val()!='')){
        if ($('#fileFacebookImageOG').val()!= '') {     
            var logoMetaFb = document.getElementById('fileFacebookImageOG').files[0];
            var image_name = logoMetaFb.name;
            var image_extension = image_name.split('.').pop().toLowerCase();
            var builderMetafb=1;
            if(jQuery.inArray(image_extension,['jpg','jpeg','png','']) == -1){
                Alert.warning('Invalid File Type, Please Choose jpg, jpeg And png', {
                    displayDuration: 4000,pos: 'top'});
                    return;
                }
        }else{
            var builderMetafb=0;
        }

        if($('#fileTwitterImageOG').val()!=''){
            var logoMetaTw = document.getElementById('fileTwitterImageOG').files[0];
            var image_name2 = logoMetaTw.name
            var image_extension2 = image_name2.split('.').pop().toLowerCase();        
            var builderMetatw=1;

            if(jQuery.inArray(image_extension2,['jpg','jpeg','png','']) == -1){
                Alert.warning('Invalid File Type, Please Choose jpg, jpeg And png', {      displayDuration: 4000,pos: 'top'});
                    return;
                }       
        }else{
            var builderMetatw=0;
        }
        }else{
                var builderMetafb=0;
                var builderMetatw=0;
        }
        var action= "insertBuilderMetatagdata";
        var form_data = new FormData();
        form_data.append("fbimage",logoMetaFb);
        form_data.append("twimage",logoMetaTw);
        form_data.append("check1",builderMetafb);
        form_data.append("check2",builderMetatw);
        form_data.append("customPageUrl",$('#txtCustomPageUrl').val());
        form_data.append("facebookUrl",$('#txtFacebookUrl').val());
        form_data.append("twitterUrl",$('#txtTwitterUrl').val());
        form_data.append("instagramUrl",$('#txtInstagramUrl').val());
        form_data.append("googleUrl",$('#txtGoogleUrl').val());
        form_data.append("pageTitle",$('#txtpageTitle').val());
        form_data.append("metaDescription",$('#txtMetaDescription').val());
        form_data.append("metaKeyword",$('#txtMetaKeyword').val());
        form_data.append("facebookTitleOG",$('#txtFacebookTitleOG').val());
        form_data.append("fileFacebookImageOG",$('#fileFacebookImageOG').val());
        form_data.append("facebookUrlOG",$('#txtFacebookUrlOG').val());
        form_data.append("facebookDescriptionOG",$('#txtFacebookDescriptionOG').val());
        form_data.append("twitterTitleOG",$('#txtTwitterTitleOG').val());
        form_data.append("twitterDescriptionOG",$('#txtTwitterDescriptionOG').val());
        form_data.append("fileTwitterImageOG",$('#fileTwitterImageOG').val());
        form_data.append("twitterUrlOG",$('#txtTwitterUrlOG').val());
        form_data.append("BuilderId",$('#updateID').val());
        form_data.append("action",action);
        $.ajax({ type: "POST", dataType: "json", success: SuccessHandler,
                    url: "api/apiadmin.php",
                    data:form_data,
                    cache : false,
                    contentType:false,
                    processData: false,
                    beforeSend: function(){                      
                    },
            });

        function SuccessHandler(data) {
            if (data.data == 1) {
                $('#showFbmetaOg').html('<img src="assets/'+data.BuilderID+'/fbmetaOgImage/'+data.fileName+'" alt="" srcset="" height="100px" >');
                $('#showTwmetaOg').html('<img src="assets/'+data.BuilderID+'/twmetaOgImage/'+data.fileName2+'" alt="" srcset="" height="100px" >');
                
                Alert.success(data.msg, {displayDuration: 4000,pos: 'top'});
            } else {
                Alert.warning(data.msg, {displayDuration: 4000,pos: 'top'});
            }
        };
}

//------ Validation Meta`s Information ----------- 
function fnValidateForBuilderMeta() {
    var ret = true;

    if ($('#txtpageTitle').val() == '') {
        $("#txtpageTitle").css("background-color", "#f2dede");
        ret = false;
    }
    if ($('#txtMetaDescription').val() == '') {
        $("#txtMetaDescription").css("background-color", "#f2dede");
        ret = false;
    }
    return ret;
};

function fnMetaClearControl() {
    $('#txtCustomPageUrl').val('');
    $('#txtFacebookUrl').val('');
    $('#txtTwitterUrl').val('');
    $('#txtInstagramUrl').val('');
    $('#txtGoogleUrl').val('');
    $('#txtpageTitle').val('');
    $('#txtMetaDescription').val('');
    $('#txtMetaKeyword').val('');
    $('#txtFacebookTitleOG').val('');
    $('#txtFacebookUrlOG').val('');
    $('#txtFacebookDescriptionOG').val('');
    $('#txtTwitterTitleOG').val('');
    $('#txtTwitterUrlOG').val('');
    $('#txtTwitterDescriptionOG').val('');
};
//============= Section 2 Builder Meta`s Start ===========================
</script>



<body class="nav-md">
    <div class="container body">
        <input type="hidden" id="updateID" data-name="builder" value="">
        <input type="hidden" id="BuilderID">
        <!-- do as you do with project id -->
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

                <!--=================== Builder Information Start===================================-->
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Builder Information</h2>
                            <ul class="nav navbar-right panel_toolbox" style="margin-right: -35px;">

                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <div id="demo-form2" class="form-horizontal form-label-left">

                                <div class="col-md-6 col-sm-6  ">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="builder-name">Builder Name </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text" id="txtBuilderName" class="form-control txtBuilderName"
                                                maxlength="50">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="about-builder">About Builder </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <textarea id="txtAboutBuilder" class="form-control txtAboutBuilder"></textarea>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="registered-office">Registered Office </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <textarea id="txtRegisteredOffice" class="form-control txtRegisteredOffice"></textarea>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtRegionalOffice">Regional Office </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <textarea id="txtRegionalOffice" class="form-control txtRegionalOffice"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6  ">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtReraNumber">RERA
                                        </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text" id="txtReraNumber" class="form-control txtReraNumber"
                                                maxlength="50">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="website">Website
                                        </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text" id="txtWebsite" class="form-control txtWebsite"
                                                maxlength="50">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="video-url">Video
                                            URL </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text" id="txtVideoUrl" class="form-control txtVideoUrl"
                                                maxlength="100">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align" for="youtube-url"><i
                                                class="fa fa-youtube" style="font-size:20px"></i> YT URL
                                        </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text" id="txtYTUrl" class="form-control txtYTUrl"
                                                maxlength="50">
                                        </div>

                                    </div>

                                    <!-----------  Select Builder logo Start-------------->
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="fileBuilderLogo">Builder Logo</label>
                                        <div class="col-md-8 col-sm-8">
                                            <input type="file" id="fileBuilderLogo" name="fileBuilderLogo"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                    <div class="col-md-4 col-sm-4">
                                        <input type="hidden" name="builderLogoImageName" id="builderLogoImageName" dataBuilderLogo="0">
                                    </div>
                                        <div class="col-md-8 col-sm-8" id="ShowBuilderLogo">
                                            
                                        </div>
                                    </div>
                                    
                                    <!-----------  Select Builder logo End-------------->

                                </div>

                                <div class="item form-group">
                                    <div class="col-md-12 col-sm-12 offset-md-3">
                                        <a class="btn btn-default" href="builders-list.php">Cancel</a>
                                        <button class="btn btn-default btnBuilderInfoReset"> <i class="fa fa-refresh"
                                                aria-hidden="true"></i>Reset</button>
                                        <button class="btn btn-primary btnBuilderInfoSave"> <i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i>Submit </button>
                                        <button class="btn btn-primary btnUpdateBuilderData" style="display:none"> <i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i>Update </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=================== Builder Information End ===================================-->

                <!--====================== Builder Meta`s Information Start =========================-->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Builder Meta </h2>
                            <ul class="nav navbar-right panel_toolbox" style="margin-right: -40px;">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                <div class="col-md-6 col-sm-6  ">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtCustomPageUrl">Custom
                                            Page URL </label>
                                        <div class="col-md-8 col-sm-8">
                                            <input type="text" id="txtCustomPageUrl"
                                                class="form-control txtCustomPageUrl" maxlength="100">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtFacebookUrl">Facebook
                                            URL </label>
                                        <div class="col-md-8 col-sm-8">
                                            <input type="text" id="txtFacebookUrl" class="form-control txtFacebookUrl"
                                                maxlength="100">
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtTwitterUrl">Twitter
                                            URL
                                        </label>
                                        <div class="col-md-8 col-sm-8">
                                            <input type="text" id="txtTwitterUrl" class="form-control txtTwitterUrl"
                                                maxlength="100">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtInstagramUrl">Instagram
                                            URL </label>
                                        <div class="col-md-8 col-sm-8">
                                            <input type="text" id="txtInstagramUrl" class="form-control txtInstagramUrl"
                                                maxlength="100">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtGoogleUrl">Google
                                            URL </label>
                                        <div class="col-md-8 col-sm-8">
                                            <input type="text" id="txtGoogleUrl" class="form-control txtGoogleUrl"
                                                maxlength="100">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtpageTitle">Page
                                            Title </label>
                                        <div class="col-md-8 col-sm-8">
                                            <input type="text" id="txtpageTitle" class="form-control txtpageTitle"
                                                maxlength="100">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtMetaDescription">Meta
                                            Description</label>
                                        <div class="col-md-8 col-sm-8">
                                            <textarea id="txtMetaDescription" class="form-control txtMetaDescription"></textarea>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtMetaKeyword">Meta
                                            Keyword </label>
                                        <div class="col-md-8 col-sm-8">
                                            <textarea id="txtMetaKeyword" class="form-control txtMetaKeyword"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6  ">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtFacebookTitleOG">
                                            <i class="fa fa-facebook-f"></i> Title OG</label>
                                        <div class="col-md-8 col-sm-8">
                                            <input type="text" id="txtFacebookTitleOG"
                                                class="form-control txtFacebookTitleOG" maxlength="100">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="fileFacebookImageOG">
                                            <i class="fa fa-facebook fa-lg"></i> Image OG
                                        </label>
                                        <div class="col-md-8 col-sm-8">
                                            <input type="file" id="fileFacebookImageOG" name="fileFacebookImageOG"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <!-- Meta Og tag HIdden  div field -->
                                    <div class="item form-group">
                                    <div class="col-md-4 col-sm-4">
                                    </div>
                                        <div class="col-md-8 col-sm-8" id="showFbmetaOg">
                                            
                                        </div>
                                    </div>
                                    <!--/ Meta Og tag HIdden  div field -->
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtFacebookUrlOG">
                                            <i class="fa fa-facebook-f"></i> Url OG </label>
                                        <div class="col-md-8 col-sm-8">
                                            <input type="text" id="txtFacebookUrlOG"
                                                class="form-control txtFacebookUrlOG" maxlength="100">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtFacebookDescriptionOG">
                                            <i class="fa fa-facebook-f"></i> Description OG
                                        </label>
                                        <div class="col-md-8 col-sm-8">
                                            <textarea id="txtFacebookDescriptionOG"
                                                class="form-control txtFacebookDescriptionOG"></textarea>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtTwitterTitleOG">
                                            <i class="fa fa-twitter"></i> Title OG </label>
                                        <div class="col-md-8 col-sm-8">
                                            <input type="text" id="txtTwitterTitleOG"
                                                class="form-control txtTwitterTitleOG" maxlength="100">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="fileTwitterImageOG"> <i class="fa fa-twitter"></i>
                                            Image OG </label>
                                        <div class="col-md-8 col-sm-8">
                                            <input type="file" id="fileTwitterImageOG" name="fileTwitterImageOG"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <!-- Meta twiter Og tag HIdden  div field -->
                                    <div class="item form-group">
                                    <div class="col-md-4 col-sm-4">
                                    </div>
                                        <div class="col-md-8 col-sm-8" id="showTwmetaOg">
                                            
                                        </div>
                                    </div>
                                    <!--/ Meta twitter Og tag HIdden  div field -->
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtTwitterUrlOG"> <i class="fa fa-twitter"></i> Url OG </label>
                                        <div class="col-md-8 col-sm-8">
                                            <input type="text" id="txtTwitterUrlOG" class="form-control txtTwitterUrlOG"
                                                maxlength="100">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtTwitterDescriptionOG">
                                            <i class="fa fa-twitter"></i> Description OG
                                        </label>
                                        <div class="col-md-8 col-sm-8">
                                            <textarea id="txtTwitterDescriptionOG"
                                                class="form-control txtTwitterDescriptionOG"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <div class="col-md-12 col-sm-12 offset-md-3">
                                        <a class="btn btn-default" href="builders-list.php">Cancel</a>
                                        <button class="btn btn-default btnBuilderMetaReset"> <i class="fa fa-refresh"
                                                aria-hidden="true"></i>Reset</button>
                                        <button class="btn btn-primary btnBuilderMetaSave">
                                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>Submit </button>
                                        <button class="btn btn-primary btnBuilderMetaUpdate" style="display:none">
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>Update </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====================== Builder Meta`s Information End =========================-->

            </div>
            <!-- /page content -->
        </div>
    </div>

    <!-- include for Footer -->
    <?php include 'includes/include_Footer.php';?>

</body>
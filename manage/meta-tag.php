<?php include 'includes/sessionCheck.php'; ?>
<html lang="en">
<!-- include for html Header -->
<?php include 'includes/include_head.php';?>
<script type="text/javascript">
$(document).ready(function() {

    $('input[type=text]').focus(function(event) {
        $(this).css("background-color", "");
    });

    $('textarea').focus(function(event) {
        $(this).css("background-color", "");
    });

    var BuilderID = $.QueryString('BuilderID');
    if (!(BuilderID == null)) {

        fnBuilderMetaInfo(BuilderID);
    }

    $('.btnSaveMeta').click(function(event) {
        fnCreatemetatag();
    });

    $('.btnResetMeta').click(function(event) {
        fnMetaClearControl();
    });
    var updateID = window.parent.document.getElementById('updateID').value;
    if(updateID){
        fnProjectMetaInfo(updateID);
    }

});

// ---- redirect to builders list page click on cancel button ---
function fnBacktoList() {
    window.top.location.href = "builders-list.php";
}
</script>

<script type="text/javascript">
//------------project section-------------

// --------- get Project meta`s info  ------
function fnProjectMetaInfo(updateMasterID) {
    var updateMasterID = window.parent.document.getElementById('updateID').value;
   // alert(updateMasterID);
    $.ajax({
        type: "POST",
        dataType: "json",
        success: SuccessHandler,
        url: 'api/apiadmin.php',
        data: {
            action: "getProjectMetainfoById",
            ProjectID: updateMasterID
        }
    });

    function SuccessHandler(data) {
        if (data) {
            $('#updateID').val(data.data.ProjectID);
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

        } else {
            $('#IsFailed').show();
        }
    };
}

// --------- get builder meta`s info   ------
function fnBuilderMetaInfo(BuilderID) {

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

        } else {
            Alert.warning(data.msg, {
                displayDuration: 4000,
                pos: 'top'
            });
        }
    };
}

//----- Update Master Builder  Meta Info ------------
function fnUpdateBuilderMetaInfo(BuilderID) {
    var CustomPageURL = $('#txtCustomPageUrl').val();
    var FacebookURL = $('#txtFacebookUrl').val();
    var TwitterURL = $('#txtTwitterUrl').val();
    var InstagramURL = $('#txtInstagramUrl').val();
    var GoogleURL = $('#txtGoogleUrl').val();
    var PageTitle = $('#txtpageTitle').val();
    var MetaDescription = $('#txtMetaDescription').val();
    var MetaKeyword = $('#txtMetaKeyword').val();
    var FacebookTitleOG = $('#txtFacebookTitleOG').val();
    var FacebookUrlOG = $('#txtFacebookUrlOG').val();
    var FacebookDescriptionOG = $('#txtFacebookDescriptionOG').val();
    var TwitterTitleOG = $('#txtTwitterTitleOG').val();
    var TwitterUrlOG = $('#txtTwitterUrlOG').val();
    var TwitterDescriptionOG = $('#txtTwitterDescriptionOG').val();

    $.ajax({
        type: "POST",
        dataType: "json",
        success: SuccessHandler,
        url: 'api/apiadmin.php',
        data: {
            action: "updateBuilderMetainfoById",
            BuilderID: BuilderID,
            CustomPageURL: CustomPageURL,
            FacebookURL: FacebookURL,
            TwitterURL: TwitterURL,
            InstagramURL: InstagramURL,
            GoogleURL: GoogleURL,
            PageTitle: PageTitle,
            MetaDescription: MetaDescription,
            MetaKeyword: MetaKeyword,
            FacebookTitleOG: FacebookTitleOG,
            FacebookUrlOG: FacebookUrlOG,
            FacebookDescriptionOG: FacebookDescriptionOG,
            TwitterTitleOG: TwitterTitleOG,
            TwitterUrlOG: TwitterUrlOG,
            TwitterDescriptionOG: TwitterDescriptionOG,
        }
    });

    function SuccessHandler(data) {
        console.log(data);

        if (data.data == true) {
            Alert.success(data.msg, {
                displayDuration: 4000,
                pos: 'top'
            });
        }

    };
}

//------- fn Add meta`s Information --------
function fnCreatemetatag() {
    if (!fnValidateForm()) return;
    var updateID = window.parent.document.getElementById('updateID').value;
    var PageName = window.parent.document.getElementById('updateID').attributes['data-name'].value;
    var BuilderID = $.QueryString('BuilderID');
    if (BuilderID) {
        fnUpdateBuilderMetaInfo(BuilderID);
    } else {
        jQuery.ajax({
            url: "api/apiadmin.php",
            data: {
                action: 'insertMetatagdata',
                updateID: updateID,
                PageName: PageName,
                CustomPageURL: $('#txtCustomPageUrl').val(),
                FacebookURL: $('#txtFacebookUrl').val(),
                TwitterURL: $('#txtTwitterUrl').val(),
                InstagramURL: $('#txtInstagramUrl').val(),
                GoogleURL: $('#txtGoogleUrl').val(),
                PageTitle: $('#txtpageTitle').val(),
                MetaDescription: $('#txtMetaDescription').val(),
                MetaKeyword: $('#txtMetaKeyword').val(),
                FacebookTitleOG: $('#txtFacebookTitleOG').val(),
                FacebookUrlOG: $('#txtFacebookUrlOG').val(),
                FacebookDescriptionOG: $('#txtFacebookDescriptionOG').val(),
                TwitterTitleOG: $('#txtTwitterTitleOG').val(),
                TwitterUrlOG: $('#txtTwitterUrlOG').val(),
                TwitterDescriptionOG: $('#txtTwitterDescriptionOG').val()
            },
            type: "POST",
            success: SuccessHandler
        });

        function SuccessHandler(data) {
            console.log(data);

            if (data.data == 1) {
                Alert.success(data.msg, {
                    displayDuration: 4000,
                    pos: 'top'
                });
                // $('#txtCustomPageUrl').val('');
                // $('#txtFacebookUrl').val('');
                // $('#txtTwitterUrl').val('');
                // $('#txtInstagramUrl').val('');
                // $('#txtGoogleUrl').val('');
                // $('#txtpageTitle').val('');
                // $('#txtMetaDescription').val('');
                // $('#txtMetaKeyword').val('');
                // $('#txtFacebookTitleOG').val('');
                // $('#txtFacebookUrlOG').val('');
                // $('#txtFacebookDescriptionOG').val('');
                // $('#txtTwitterTitleOG').val('');
                // $('#txtTwitterUrlOG').val('');
                // $('#txtTwitterDescriptionOG').val('');

            } else {
                Alert.warning(data.msg, {
                    displayDuration: 4000,
                    pos: 'top'
                });


            }
        }
    }
}

//------ Validation Meta`s Information ----------- 
function fnValidateForm() {
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
    $('.form-control').val('');
};
</script>

<body>
    <div class="container-fluid" style="background: white;margin-left: -25px;">
        <!-- page content -->
        <div class="right_col" role="main">
            <!-- page content -->
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="col-md-6 col-sm-6  ">
                            <div class="item form-group">
                                <label class="col-form-label col-md-4 col-sm-4 label-align"
                                    for="txtCustomPageUrl">Custom
                                    Page URL </label>
                                <div class="col-md-8 col-sm-8">
                                    <input type="text" id="txtCustomPageUrl" class="form-control txtCustomPageUrl"
                                        maxlength="100">
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
                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="txtTwitterUrl">Twitter
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
                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="txtGoogleUrl">Google
                                    URL </label>
                                <div class="col-md-8 col-sm-8">
                                    <input type="text" id="txtGoogleUrl" class="form-control txtGoogleUrl"
                                        maxlength="100">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="txtpageTitle">Page
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
                                    <textarea id="txtMetaDescription" class="form-control txtMetaDescription"
                                        maxlength="250"></textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="txtMetaKeyword">Meta
                                    Keyword </label>
                                <div class="col-md-8 col-sm-8">
                                    <textarea id="txtMetaKeyword" class="form-control txtMetaKeyword"
                                        maxlength="250"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6  ">
                            <div class="item form-group">
                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="txtFacebookTitleOG">
                                    <i class="fa fa-facebook-f"></i> Title OG</label>
                                <div class="col-md-8 col-sm-8">
                                    <input type="text" id="txtFacebookTitleOG" class="form-control txtFacebookTitleOG"
                                        maxlength="100">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="fileFacebookImageOG">
                                    <i class="fa fa-facebook fa-lg"></i> Image OG
                                </label>
                                <div class="col-md-8 col-sm-8">

                                    <button type="button" class="btn btn-primary">Select Image</button>

                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="txtFacebookUrlOG">
                                    <i class="fa fa-facebook-f"></i> Url OG </label>
                                <div class="col-md-8 col-sm-8">
                                    <input type="text" id="txtFacebookUrlOG" class="form-control txtFacebookUrlOG"
                                        maxlength="100">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-4 col-sm-4 label-align"
                                    for="txtFacebookDescriptionOG">
                                    <i class="fa fa-facebook-f"></i> Description OG
                                </label>
                                <div class="col-md-8 col-sm-8">
                                    <textarea id="txtFacebookDescriptionOG"
                                        class="form-control txtFacebookDescriptionOG" maxlength="250"></textarea>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="txtTwitterTitleOG">
                                    <i class="fa fa-twitter"></i> Title OG </label>
                                <div class="col-md-8 col-sm-8">
                                    <input type="text" id="txtTwitterTitleOG" class="form-control txtTwitterTitleOG"
                                        maxlength="100">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="fileTwitterImageOG"> <i
                                        class="fa fa-twitter"></i>
                                    Image OG </label>
                                <div class="col-md-8 col-sm-8">
                                    <button type="button" class="btn btn-primary">Select Image</button>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-4 col-sm-4 label-align" for="txtTwitterUrlOG"> <i
                                        class="fa fa-twitter"></i> Url OG </label>
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
                                    <textarea id="txtTwitterDescriptionOG" class="form-control txtTwitterDescriptionOG"
                                        maxlength="250"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 offset-md-3">
                                <button class="btn btn-default" onclick="fnBacktoList();">Cancel</button>
                                <button class="btn btn-default btnResetMeta"> <i class="fa fa-refresh"
                                        aria-hidden="true"></i>Reset</button>
                                <button class="btn btn-primary btnSaveMeta"> <i class="fa fa-angle-double-right"
                                        aria-hidden="true"></i>Submit </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>

</body>

</html>
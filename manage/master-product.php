
<?php include 'includes/sessionCheck.php'; ?>
<html lang="en">
<!-- include for html Header -->
<?php include 'includes/include_head.php';?>

<script type="text/javascript">
    $(document).ready(function() {
        var ProductID = $.QueryString('ProductID');
        if (!(ProductID == null)) {
            $('#ProductID').val(ProductID);
            fnProductInfo(ProductID);
            fnListHighlightData(ProductID);
           //fnUpdateMasterProduct(ProductID);
        }else{
            
        }        

        $('#fileImage1').focus(function(event) {
            $('#fileImage1').css("background-color", "");
        });

        $('#fileImage2').focus(function(event) {
            $('#fileImage2').css("background-color", "");
        });

        $('#txtProductName').focus(function(event) {
            $(this).css("background-color", "");
        });

        $('#txtBrandName').focus(function(event) {
            $(this).css("background-color", "");
        });

        $('#txtDescripion').focus(function(event) {
            $(this).css("background-color", "");
        });

        $('#txtHighTitle').focus(function(event) {
            $(this).css("background-color", "");
        });

        $('#txtVideoLink').focus(function(event) {
            $(this).css("background-color", "");
        });

        $('.btnSaveMasterProduct').click(function(event) {
            fnCreateMasterProduct();
        });
        $('.btnUpdateProductData').click(function(event) {
            var ProjectID = $('#updateID').val();
            fnUpdateMasterProduct(ProjectID);
        });

        $('.btnResetMasterProduct').click(function(event) {
            fnClearControlMainProject();
        });

        $('#ddlProjectImageCategory').change(function() {
            var catID = $(this).find(':selected').val();
            fnSelectProjectImage(catID);
        });

        $('.btnSaveHigh').click(function(event) {
            fnInsertHighLights();
        });

        $('.btnUpdateHigh').attr('disabled', 'disabled').click(function(event) {
            fnUpdateHighLight();
        });

        $('.btnResetHigh').click(function(event) {
            fnClearControlforHighlight();
        });

        fnListCategoryData();
        
        // ============================================================================================
        
    });
</script>


<script type="text/javascript">
    // function for clear text field for highlights
    function fnClearControlforHighlight() {
        $('#txtHighTitle').val('');
        $('.btnSaveHigh').removeAttr('disabled', 'disabled');
        $('.btnUpdateHigh').attr('disabled', 'disabled');
    };

    function fnProductValidateForm() {
        var ret = true;

        if ($('#txtProductName').val() == '') {
            $("#txtProductName").css("background-color", "#f2dede");
            ret = false;
        }

        if ($('#fileImage1').val() == '') {
            $("#fileImage1").css("background-color", "#f2dede");
            ret = false;
        }
        
        if ($('#fileImage2').val() == '') {
            $("#fileImage2").css("background-color", "#f2dede");
            ret = false;
        }
        if ($('#txtDescripion').val() == '') {
            $("#txtDescripion").css("background-color", "#f2dede");
            ret = false;
        }

        if ($('#txtVideoLink').val() == '') {
            $("#txtVideoLink").css("background-color", "#f2dede");
            ret = false;
        }

        

        return ret;

    };
    //clear input field
    function fnClearControlMainProject() {
        $('#txtProductName').val('');
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

    //   Insert Master Product  Data
    function fnCreateMasterProduct() {  
        if(!fnProductValidateForm()) return;
        if(($('#fileImage1').val()!= '') || ($('#fileImage2').val()!='')  ||($('#txtTemplateFile').val()!='')) {
            if ($('#fileImage1').val()!= '') {     
                var firstImage = document.getElementById('fileImage1').files[0];
                var image_name = firstImage.name;
                var image_extension = image_name.split('.').pop().toLowerCase();
                var productfirstImage=1;
                if(jQuery.inArray(image_extension,['jpg','jpeg','png','']) == -1){
                    Alert.warning('Invalid File Type, Please Choose jpg, jpeg And png', {
                        displayDuration: 4000,pos: 'top'});
                        return;
                    }
            }else{
                var productfirstImage=0;
            }

            if($('#fileImage2').val()!=''){
                var secondImage = document.getElementById('fileImage2').files[0];
                var image_name2 = secondImage.name
                var image_extension2 = image_name2.split('.').pop().toLowerCase();        
                var productSecondImage=1;

                if(jQuery.inArray(image_extension2,['jpg','jpeg','png','']) == -1){
                    Alert.warning('Invalid File Type, Please Choose jpg, jpeg And png', {      displayDuration: 4000,pos: 'top'});
                        return;
                    }       
            }else{
                var productSecondImage=0;
            }

            if($('#txtTemplateFile').val()!=''){
                var template = document.getElementById('txtTemplateFile').files[0];
                var template_name = template.name
                var file_template = template_name.split('.').pop().toLowerCase();        
                var templatefile=1;

                if(jQuery.inArray(file_template,['xlsx','zip','xls','']) == -1){
                    Alert.warning('Invalid File Type, Please Choose xlsx And zip', {displayDuration: 4000,pos: 'top'});
                        return;
                    }                       
            }else{
                var templatefile=0;
            }

        }else{
                var productfirstImage=0;
                var productSecondImage=0;
                var templatefile=0;
        }
        var action= "insertProductData";
        var form_data = new FormData();
        form_data.append("fbimage",firstImage);
        form_data.append("twimage",secondImage);
        form_data.append("template",template);
        form_data.append("check1",productfirstImage);
        form_data.append("check2",productSecondImage);
        form_data.append("check3",templatefile);
        form_data.append("productName",$('#txtProductName').val());
        form_data.append("brandName",$('#txtBrandName').val());
        form_data.append("salesPrice",$('#txtSalesPrice').val());
        form_data.append("basePrice",$('#txtBasePrice').val());
        form_data.append("ddlCategoryType",$('#ddlCategoryType').val());
        form_data.append("stock",$('#txtStock').val());
        form_data.append("fileImage1",$('#fileImage1').val());
        form_data.append("altagImage1",$('#altagImage1').val());
        form_data.append("fileImage2",$('#fileImage2').val());
        form_data.append("altagImage2",$('#altagImage2').val());
         form_data.append("videoUrl",$('#txtVideoLink').val());
        form_data.append("descripion",$('#txtDescripion').val());
        form_data.append("availability",$('#txtTemplateFile').val());
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

                window.location.href = 'product-list.php'; 
                
                Alert.success(data.msg, {displayDuration: 4000,pos: 'top'});
            } else {
                Alert.warning(data.msg, {displayDuration: 4000,pos: 'top'});
            }
        };
    }

    // ---------get Product data by Product ID------
    function fnProductInfo(ProductID) {
        $.ajax({
            type: "POST",
            dataType: "json",
            success: SuccessHandler,
            url: 'api/apiadmin.php',
            data: {
                action: "getProductInfoById",
                ProductID: ProductID
            }
        });

        function SuccessHandler(data) {
            if (data.success == true) {

                $('.btnSaveMasterProduct').css('background', '#999').attr('disabled', 'disabled');
                $('.btnResetMasterProduct').css('background','#999').attr('disabled', 'disabled');
                $('.btnUpdateProductData').show();

                $('#txtProductId').val(data.data.ProductID);
                $('#txtProductName').val(data.data.ProductName);
                $('#ddlCategoryType').val(data.data.ProductCategoryID);
                $('#txtBrandName').val(data.data.BrandName);
                $('#txtSalesPrice').val(data.data.SalesPrice);
                $('#txtBasePrice').val(data.data.BasePrice);
                $('#txtStock').val(data.data.StockQuantity);
                $('#txtVideoLink').val(data.data.VideoURL);
                $('#altagImage1').val(data.data.AltTagFirst);
                $('#altagImage2').val(data.data.AltTagSecond);
                $('#txtDescripion').val(data.data.Description);
                $('#txtAvailability').val(data.data.Availability);
                $('#fileImage1').val(data.data.ImageOne);
                $('#fileImage2').val(data.data.ImageSecond);
                //$('#fileImage1').target.files[0].ImageOne;
                $('#fileImageAfter').html('<img src="assets/'+ProductID+'/firstimage/'+data.data.ImageOne+'" alt="" srcset="" height="100px" >');
                $('#fileImageSecondAfter').html('<img src="assets/'+ProductID+'/secondImage/'+data.data.ImageSecond+'" alt="" srcset="" height="100px" >');
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
        if(($('#fileImage1').val()!= '') || ($('#fileImage2').val()!='')){
            if ($('#fileImage1').val()!= '') {     
                var firstImage = document.getElementById('fileImage1').files[0];
                var image_name = firstImage.name;
                var image_extension = image_name.split('.').pop().toLowerCase();
                var productfirstImage=1;
                if(jQuery.inArray(image_extension,['jpg','jpeg','png','']) == -1){
                    Alert.warning('Invalid File Type, Please Choose jpg, jpeg And png', {
                        displayDuration: 4000,pos: 'top'});
                        return;
                    }
            }else{
                var productfirstImage=0;
            }

            if($('#fileImage2').val()!=''){
                var secondImage = document.getElementById('fileImage2').files[0];
                var image_name2 = secondImage.name
                var image_extension2 = image_name2.split('.').pop().toLowerCase();        
                var productSecondImage=1;

                if(jQuery.inArray(image_extension2,['jpg','jpeg','png','']) == -1){
                    Alert.warning('Invalid File Type, Please Choose jpg, jpeg And png', {displayDuration: 4000,pos: 'top'});
                        return;
                    }       
            }else{
                var productSecondImage=0;
            }
        }else{
                var productfirstImage=0;
                var productSecondImage=0;
        }
        var action= "updateProductData";
        var form_data = new FormData();
        form_data.append("fbimage",firstImage);
        form_data.append("twimage",secondImage);
        form_data.append("check1",productfirstImage);
        form_data.append("check2",productSecondImage);
        form_data.append("productId",$('#txtProductId').val());
        form_data.append("productName",$('#txtProductName').val());
        form_data.append("brandName",$('#txtBrandName').val());
        form_data.append("salesPrice",$('#txtSalesPrice').val());
        form_data.append("basePrice",$('#txtBasePrice').val());
        form_data.append("ddlCategoryType",$('#ddlCategoryType').val());
        form_data.append("stock",$('#txtStock').val());
        form_data.append("fileImage1",$('#fileImage1').val());
        form_data.append("altagImage1",$('#altagImage1').val());
        form_data.append("fileImage2",$('#fileImage2').val());
        form_data.append("altagImage2",$('#altagImage2').val());
        form_data.append("descripion",$('#txtDescripion').val());
        form_data.append("availability",$('#txtAvailability').val());
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
                fnListHighlightData();
                
                Alert.success(data.msg, {
                    displayDuration: 4000,
                    pos: 'top'
                });
            }else{
                Alert.error(data.msg, {
                    displayDuration: 4000,
                    pos: 'top'
                });
            }
        };
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

    //funtion for insert Highlights data
    function fnInsertHighLights() {
        if (!fnValidateFormHighlights()) return;
        jQuery.ajax({
            url: "api/apiadmin.php",
            data: {
                action: 'insertHighLightsData',
                highlight: $('#txtHighTitle').val(),
                projectId: $('#txtProductId').val()
            },
            type: "POST",
            success: SuccessHandler
        });

        function SuccessHandler(data) {     
            if (data.success == true) {
                Alert.success(data.msg, {
                    displayDuration: 4000,
                    pos: 'top'
                });
                $('#txtHighTitle').val('');
                fnListHighlightData();
            } else {
                Alert.error(data.msg, {
                    displayDuration: 4000,
                    pos: 'top'
                });
            }
        }
    }

    //function for list Highlights for Product
    function fnListHighlightData() {
       var ProductID = $.QueryString('ProductID');
        $('#myTableHighlight').DataTable().destroy();
        $.ajax({
            type: "POST",
            dataType: "json",
            success: SuccessHandler,
            url: 'api/apiadmin.php',
            data: {
                action: "listHighLightData",
                ProjectId:ProductID
            }
        });

        function SuccessHandler(data) {   
            var row = "",
                jData = '';
            jData = data.data;
            console.log(jData);
            var Status = '';
            if (jData.length > 0) {
                for (var K = 0; K < jData.length; K++) {
                    row += '<tr><td style="width:10%">' + (K + 1) + '</td><td style="width:70%">' + jData[K].HighlightText +
                        '</td><td style="width:20%"><a class="btn btn-primary btn-xs" onclick="fnHighlightInfo(' + jData[K]
                        .ProjectHighlightID +
                        ')"><i class="fa fa-pencil" aria-hidden="true"></i></a> |&nbsp; &nbsp;<a class="btn btn-danger btn-xs" onclick="btnDeleteHighLight(' +
                        jData[K]
                        .ProjectHighlightID + ')"><i class="fa fa-trash" aria-hidden="true"></i></a> ' + Status + '</td></tr>';
                }
                row;
            } else {
                row = '';
            }
            $('#DataShowHighlight').html(row);
            $('#myTableHighlight').DataTable();
        };
    }

    //function for get highlight information
    function fnHighlightInfo(ProjectHighlightID) {
        $('.btnUpdateHigh').removeAttr('disabled', 'disabled');
        $('.btnSaveHigh').attr('disabled', 'disabled');
        $.ajax({
            type: "POST",
            dataType: "json",
            success: SuccessHandler,
            url: 'api/apiadmin.php',
            data: {
                action: "getHighLightinfoById",
                ProjectHighlightID: ProjectHighlightID
            }
        });

        function SuccessHandler(data) {
            //console.log(data);
            if (data.success = true) {
                $('#hideHighlightId').val(data.data.ProjectHighlightID);
                $('#txtHighTitle').val(data.data.HighlightText).css('background','');
            } else {
                $('#IsFailed').show();
            }
        };
    }

      //function for update highlight
    function fnUpdateHighLight() {
        var ProductHighlightID = $('#hideHighlightId').val();
        $.ajax({
            type: "POST",
            dataType: "json",
            success: SuccessHandler,
            url: 'api/apiadmin.php',
            data: {
                action: "updateHighlightInfoById",
                ProductHighlightID: ProductHighlightID,
                HighlightText: $('#txtHighTitle').val()
            }
        });

        function SuccessHandler(data) {
            if (data.data == 1) {
                Alert.success(data.msg, {
                    displayDuration: 4000,
                    pos: 'top'
                });
                fnListHighlightData();
            } else {
                Alert.error(data.msg, {
                    displayDuration: 4000,
                    pos: 'top'
                });
            }
        };
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

                <!-- Product Information-->
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Product Information</h2>
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
                                            for="txtProductName">Product Name </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text" id="txtProductName" class="form-control txtProductName"
                                                maxlength="100">
                                            <input type="hidden" id="txtProductId">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="ddlCategoryType">Category</label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <select class="form-control ddlCategoryType" id="ddlCategoryType">
                                                <!-- here list category -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtBrandName">Brand Name</label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text" id="txtBrandName" class="form-control txtBrandName"
                                                maxlength="100">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtSalesPrice">Sales Price </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text" id="txtSalesPrice" class="form-control txtSalesPrice"
                                                onkeydown="if(event.key==='.'){event.preventDefault();}"
                                                oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');"
                                                maxlength="5">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtBasePrice">Base Price </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text" id="txtBasePrice" class="form-control txtBasePrice"
                                                onkeydown="if(event.key==='.'){event.preventDefault();}"
                                                oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');"
                                                maxlength="5">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtStock">Stock quantity </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text" id="txtStock" class="form-control txtStock"
                                                onkeydown="if(event.key==='.'){event.preventDefault();}"
                                                oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');"
                                                maxlength="4">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtTemplateFile">Upload template </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="file" id="txtTemplateFile" class="form-control txtTemplateFile">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6  ">
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="fileImage1">Image 1
                                        </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="file"  class="form-control fileImage1" id="fileImage1" multiple accept="image/gif, image/jpeg, image/png"></input>
                                        </div>    
                                                                         
                                    </div>
                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align" for="fileImageAfter"></label>
                                        <div class="col-md-8 col-sm-8" id="fileImageAfter"></div>                                            
                                    </div>   

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="altagImage1">Alt tag 1
                                        </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text"  class="form-control altagImage1" id="altagImage1" ></input>
                                        </div>                                        
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="fileImage2">Image 2
                                        </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="file"  class="form-control fleImage2" id="fileImage2"></input>
                                        </div> 
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align" for="fileImageSecondAfter"></label>
                                        <div class="col-md-8 col-sm-8" id="fileImageSecondAfter"></div>                                            
                                    </div>  

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="altagImage2">Alt tag 2
                                        </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text"  class="form-control altagImage2" id="altagImage2"></input>
                                        </div>                                        
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtVideoLink">Youtube link
                                        </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <input type="text"  class="form-control txtVideoLink" id="txtVideoLink"></input>
                                        </div>                                        
                                    </div>

                                    <div class="item form-group">
                                        <label class="col-form-label col-md-4 col-sm-4 label-align"
                                            for="txtDescripion">Description </label>
                                        <div class="col-md-8 col-sm-8 ">
                                            <textarea name="txtDescripion" cols="10" rows="3" id="txtDescripion" class="form-control"></textarea>
                                        </div>
                                    </div>                                   
                                </div>

                                <div class="item form-group">
                                    <div class="col-md-12 col-sm-12 offset-md-3">
                                        <a class="btn btn-default" href="projects-list.php"> Cancel</a>
                                        <button class="btn btn-default btnResetMasterProduct"> <i class="fa fa-refresh"
                                                aria-hidden="true"></i> Reset</button>
                                        <button class="btn btn-primary btnSaveMasterProduct"> <i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i> Submit
                                        </button>
                                        <button class="btn btn-primary btnUpdateProductData" style="display:none"> <i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i> Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Highlight-->
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Highlights</h2>
                            <ul class="nav navbar-right panel_toolbox" style="margin-right: -40px;">
                                <li class="list"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content collapse" id="projectHighlightsectionclose">
                            <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="item form-group">
                                    <div class="col-md-8 col-sm-8 ">
                                        <label for="txtHighTitle">Title</label>
                                        <input type="text" id="txtHighTitle" required="required"
                                            class="form-control txtHighTitle"></input>
                                            <input type="hidden" id="hideHighlightId">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <div class="col-md-12 col-sm-12 offset-md-3">
                                        <button class="btn btn-default btnResetHigh ud-btn"> <i
                                                class="fa fa-refresh" aria-hidden="true"></i>Reset</button>
                                        <button class="btn btn-primary btnSaveHigh">Submit </button>
                                        <button class="btn btn-primary btnUpdateHigh">Update </button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="myTableHighlight">
                                    <thead>
                                        <tr>
                                            <th>S.No. </th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="DataShowHighlight">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Product Height Section  -->

            </div>
            <!-- /page content -->
        </div>
    </div>

    <!-- include for Footer -->
    <?php include 'includes/include_Footer.php';?>    
   
</body>
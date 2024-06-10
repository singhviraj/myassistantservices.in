<?php include 'includes/sessionCheck.php'; ?>
<html lang="en">
 <!-- include for html Header -->
<?php include 'includes/include_head.php';?>
<script type="text/javascript">

    $(document).ready(function () {

		//$('#ddlState').focus(function (event) { $("#ddlState").css("background-color", ""); });
       // $('#ddlCity').focus(function (event) { $("#ddlCity").css("background-color", ""); });
		$('input[type=text]').focus(function (event) { $('input[type=text]').css("background-color", ""); });
		fnCustomerInfo();
	//   fnListState();

	//   $('#ddlState').change(function () {
    //     var lnCity = $(this).find(':selected').attr('data-state');      
    //     fnListCity(lnCity,0);
    //   });

    });
</script>

<script>

// list State Function
// function fnListState() {
//         var action = 'listState';
//         jQuery.ajax({
//                 url: "../api/index.php",
//                 data:{action:'listState'},
//                 type: "POST",
//                 success: SuccessHandler
//             });
//         function SuccessHandler(data) {
//             var jData = data.data.records;
//               var row = '<option value="0" >Select State</option>';
//                     if (jData.length > 0) {
//                         for (var K = 0; K < jData.length; K++) {
//                             row += '<option value="' + jData[K].state_id + '" data-State ="' + jData[K].state_id + '">' + jData[K].state_name + '</option>';
//                         }
//                     }
//                     $('#ddlState').html(row);
// 					fnCustomerInfo();
          
//         };

//   }


// function fnListCity(State_ID, lcCity){ 

//    var state_id = State_ID;
//    jQuery.ajax({
//     url: "../api/index.php",
//     data:{action:'listCity', state_id:state_id},
//     type: "POST",
//     success: SuccessHandler
//     });

//     function SuccessHandler(data) {
//     var cityData = data.data.records;
//     var row = '<option value="0" >Select City</option>';
//           if (cityData.length > 0) {
//               for (var K = 0; K < cityData.length; K++) {
//                   row += '<option value="' + cityData[K].ID + '" data-status="' + state_id + '">' + cityData[K].city + '</option>';
//               }
//           }
//           $('#ddlCity').html(row);
// 		  $('#ddlCity').val(lcCity);
//   };
// }

function fnCustomerInfo() {
	
		//MyCityID = "";

		$.ajax({ type: "POST", dataType: "json", success: SuccessHandler,
            url: 'api/apiadmin.php',
            data: {
                action: "adminInfo"
                }
        });
        function SuccessHandler(data) {
			var jData = data.data.records;
            if (jData.length == 1) {
				
                $('#txtFullName').text((jData[0].FirstName + " "+ jData[0].LastName).toUpperCase());
				//$('#txtCity').text(jData[0].custCity);
				//$('#txtState').text(jData[0].custState);
				$('#txtEmail').text(jData[0].EmailID);
				//$('#txtAddress').text(jData[0].Address);
				$('#txtMobile').text(jData[0].MobileNo);
				$('#txtContact').text(jData[0].Phone);
				//$('#txtZipCode').text(jData[0].ZipCode);
				$('#lcRealationshipNo').text(jData[0].UniqueID);
				$('#lcLoginID').text(jData[0].LoginID);
				

				//$('#lcAddress').val(jData[0].Address);
				//$('#ddlState').val(jData[0].State);
			//	var myCity = $("#ddlState option:selected").attr("data-state"); //$('#ddlState:selected').attr('data-state');
				
				//fnListCity(myCity, jData[0].City);
				
				//$('#lcZipCode').val(jData[0].ZipCode);
				$('#lcFirstName').val(jData[0].FirstName);
				$('#lcLastName').val(jData[0].LastName);
				$('#lcMobile').val(jData[0].MobileNo);
				$('#lcContact').val(jData[0].Phone);
				
				//$('#ddlCity').val(jData[0].City);

            }
            else {
                $('#txtFullName').text("");
            }
        };
}

// Update Profile Function..

function update_CustomerInfo() {

	   if (!ValidateForm()) return;
	  // var lcAddress = $('#lcAddress').val();
	  // var ddlState = $('#ddlState').val();
	   //var ddlCity = $('#ddlCity').val();
	   //var lcZipCode = $('#lcZipCode').val();
	   var lcFirstName = $('#lcFirstName').val();
	   var lcLastName = $('#lcLastName').val();
	   var lcMobile = $('#lcMobile').val();
	   var lcContact = $('#lcContact').val();

	   
	   $.ajax({ type: "POST", dataType: "json", success: SuccessHandler,
			   url: 'api/apiadmin.php',
			   data:{ 
						action: "updateadminRecords",
						mobile:lcMobile,
						Phone:lcContact,
						FirstName:lcFirstName,
						LastName:lcLastName,
						//Address:lcAddress,
						//State:ddlState,
						//City:ddlCity,
						//ZipCode:lcZipCode,
			        }
	   });
	   function SuccessHandler(data) {
		   if (data.success == 1) {
			   $('.lcMessage').text(data.msg);
			   $('#MsgBox').addClass('alert-success');
			   $('#MsgBox').show();
			   fnCustomerInfo();
			   fncreateHistory("Update Admin Info","Update information")
		   }else{
			   $('.lcMessage').text(data.msg);
			   $('#MsgBox').addClass('alert-danger');
			   $('#MsgBox').show();
		   }
		   
	   };
}


function ValidateForm() {
  var ret = true;

         if ($('#lcFirstName').val() == '') { $("#lcFirstName").css("background-color", "#f2dede"); ret = false; }
         if ($('#lcLastName').val() == '') { $("#lcLastName").css("background-color", "#f2dede"); ret = false; }
         if ($('#lcMobile').val() == '') { $("#lcMobile").css("background-color", "#f2dede"); ret = false; }
         if ($('#lcContact').val() == '') { $("#lcContact").css("background-color", "#f2dede"); ret = false; }
         //if ($('#ddlState ').val() == '0') { $("#ddlState ").css("background-color", "#f2dede"); ret = false; }
        // if ($('#ddlCity ').val() == '0') { $("#ddlCity ").css("background-color", "#f2dede"); ret = false; }
        // if ($('#lcZipCode').val() == '') { $("#lcZipCode").css("background-color", "#f2dede"); ret = false; }

				return ret;
        
		};


		

</script>

  <body class="nav-md">
    <div class="container body">
     
<!-- include for Navigation and top -->
<?php include 'includes/include_TopHeader_LeftNavigation.php';?>

        <!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>My Profile</h3>
              </div>

             
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profile <small>Information</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
					
						<div class="label label-success" style="font-size:11pt">
							<label>Login ID : </label>
							<label disabled="disabled" id="lcLoginID"></label>
						</div>
						<div class="clearfix" style="margin-top: 10px"></div>
						<div class="label label-primary" style="font-size:12pt">
							<label>Account-No</label>
							<label disabled="disabled" id="lcRealationshipNo"></label>
						</div>
						
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="images/user.png" alt="Avatar">
                        </div>
                      </div>
					  
					  
                      <h3><label id="txtFullName"></label></h3>

                      <ul class="list-unstyled user_data">
                        <!-- <li><i class="fa fa-map-marker user-profile-icon"></i> <label id="txtCity"></label>, <label id="txtState"></label>
                        </li> -->

                        <!-- <li>
                          <i class="fa fa-list-alt user-profile-icon red"></i> <label id="txtAddress"></label>
                        </li> -->

                        <li class="m-top-xs">
                          <i class="fa fa-envelope user-profile-icon green"></i>
                          <label id="txtEmail"></label>
						</li>
						<li class="m-top-xs">
                          <i class="fa fa-mobile-phone user-profile-icon purple"></i>
                          <label id="txtMobile"></label> , <i class="fa fa-phone-square user-profile-icon purple"></i> <label id="txtContact"></label>
                        </li>
						
						 <!-- <li class="m-top-xs">
                          <i class="fa fa-flag user-profile-icon blue"></i>
                          <label id="txtZipCode"></label>
						</li> -->
                      </ul>
					  
                      
                      <br />


                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

						
						<br/>
					<div class="x_content">

						<div class="row">
							<div class="x_panel">

							<div class="alert alert-dismissible fade in" role="alert" id="MsgBox" style="display: none;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
                                <strong> <label class="lcMessage"></label></strong>
                               </div>

							  <div class="x_content">
								<form class="form-horizontal form-label-left input_mask">

								  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<input type="text" class="form-control has-feedback-left" id="lcFirstName" placeholder="First Name">
									<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
								  </div>

								  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<input type="text" class="form-control" id="lcLastName" placeholder="Last Name">
									<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
								  </div>

								  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<input type="text" class="form-control has-feedback-left" id="lcMobile" placeholder="Mobile No" maxlength="10">
									<span class="fa fa-mobile-phone form-control-feedback left" aria-hidden="true"></span>
								  </div>

								  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
									<input type="text" class="form-control" id="lcContact" placeholder="Phone" maxlength="20">
									<span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
								  </div>
								  
								  
								  <!-- <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
									<input type="text" class="form-control" id="lcAddress" placeholder="Address">
									<span class="fa fa-list-alt form-control-feedback right" aria-hidden="true"></span>
								  </div>
								  

								  <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
									<select class="form-control" id="ddlState">
									</select>
								  </div>
								  
								  <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
									<select class="form-control" id="ddlCity">
									</select>
								  </div>
								  
								  <div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
									<input type="text" class="form-control" id="lcZipCode" placeholder="Zip Code" maxlength="6">
									<span class="fa fa-flag form-control-feedback right" aria-hidden="true"></span>
								   </div> -->
								  
								 
								  <div class="clearfix"></div>
								  <div class="ln_solid"></div>
								  
								  <div class="form-group">
									<div class="col-md-9 col-sm-9 col-xs-12">
									  <a href="dashboard.php" class="btn btn-primary">Cancel</a>
									  <button type="button" class="btn btn-success" onclick="update_CustomerInfo();">Update</button>

									</div>
								  </div>

								</form>
							  </div>
							</div>
						</div>
					</div>
                      <!-- end of Features -->

					</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<!-- include for Footer -->
<?php include 'includes/include_Footer.php';?>
      </div>
    </div>
  </body>
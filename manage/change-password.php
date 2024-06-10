<?php include 'includes/sessionCheck.php'; ?>
<html lang="en">
 <!-- include for html Header -->
<?php include 'includes/include_head.php';?>

<script type="text/javascript">

    $(document).ready(function () {
      
		$('input[type=password]').focus(function (event) { $("#txtPassword").css("background-color", ""); });
		$('input[type=password]').focus(function (event){
			$("#PasswordMatchValidation").html('').css("color", "");
		});
		$('input[type=password]').focus(function (event) { $("#txtConfirmPassword").css("background-color", ""); });
		$('input[type=password]').focus(function (event) { $("#txt_oldpwd").css("background-color", ""); });

    });
</script>

<script>

	function Password_Change() {
		if (!ValidateForm()) return;
		 var password = $('#txt_oldpwd').val();
		 var newPassword = $('#txtPassword').val();
                $.ajax({
					type: "POST",
					dataType: "json",
					url: 'api/apiadmin.php',
					data: {
						action: 'changePassword',
					    Password : password,
					    NewPassword : newPassword
					},
                    success: SuccessHandler
            });
			function SuccessHandler(data) {
				var KData = data.success;
				if (KData == true) {
					$('.lcMessage').text(data.msg);
					$('#MsgBox').addClass('alert-success');
					$('#MsgBox').show();
				} else {
					$('.lcMessage').text(data.msg);
					$('#MsgBox').addClass('alert-danger');
					$('#MsgBox').show();
				}
			};

	}

	function ValidateForm() {
    var ret = true;
  
	if ( $('#txtPassword').val() != $('#txtConfirmPassword').val() ) {
                 $("#PasswordMatchValidation").html('Confirm Password Not Match!').css("color", "#FF0000");
                   ret = false;
          }else {
                   var EnterPassword = $('#txtPassword').val();
                    var regularExpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
                    // var checkPattern = /^[a-zA-Z0-9]+[_][0-9]+$/;
                  if (!regularExpression.test(EnterPassword)) {
                        $("#PasswordMatchValidation").html('Please Enter Valid Password with Special characters').css("color", "#FF0000");
                        ret = false;
                    }
              }

			  if ($('#txtPassword').val() == '') { $("#txtPassword").css("background-color", "#f2dede"); ret = false; }
			  if ($('#txt_oldpwd').val() == '') { $("#txt_oldpwd").css("background-color", "#f2dede"); ret = false; }
              if ($('#txtConfirmPassword').val() == '') { $("#txtConfirmPassword").css("background-color", "#f2dede"); ret = false; }
			  return ret;
	}

</script>

  <body class="nav-md">
    <div class="container body">
     
<!-- include for Navigation and top -->
<?php include 'includes/include_TopHeader_LeftNavigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
						<div class="x_panel">

							<div class="x_title">
								<h2>
									Change Password</h2>
								<ul class="nav navbar-right panel_toolbox" style="min-width:0px;">
									<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
								</ul>
								<div class="clearfix">
								</div>
							</div>

							<div class="alert alert-dismissible fade in" role="alert" id="MsgBox" style="display: none;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
                                <strong> <label class="lcMessage"></label></strong>
                               </div>

							<div class="x_content">
								<br />
								<!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> -->
								<div class="form-horizontal form-label-left" >
								  <div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Current Password <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
									  <input type="password" id="txt_oldpwd" class="form-control col-md-7 col-xs-12 txt_oldpwd" placeholder="Enter Current Password" maxlength="50">
									</div>
								  </div>

								  <div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">New Password <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
									  <input type="password" id="txtPassword" class="form-control col-md-7 col-xs-12 txt_newpwd" placeholder="Enter New Password" maxlength="50"><span><small> Tips : a to z, 0 to 9,[@!_$+]</small></span>
									</div>
								  </div>

								  <div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Confirm Password <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
									  <input type="password" id="txtConfirmPassword" class="form-control col-md-7 col-xs-12 txt_confmpwd" placeholder="Confirm Password" maxlength="50"><span id="PasswordMatchValidation"></span>
									</div>
								  </div>

								  <div class="ln_solid"></div>
								  <div class="form-group">
									<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									  <a onclick="Password_Change();" class="btn btn-success">Change Password</a>
									  <a href="dashboard.php" class="btn btn-default">Cancel</a>
									</div>
								  </div>
								  </div>
								<!-- </form> -->
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
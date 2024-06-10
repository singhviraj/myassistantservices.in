
<?php include 'includes/sessionCheck.php'; ?>
<html lang="en">
<!-- include for html Header -->
<?php include 'includes/include_head.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>
 <!-- <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script> -->
 <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
    .nav.child_menu {
    display: block;
}
</style>
<body class="nav-md">
    <div class="container body">
        
        <?php include 'includes/include_TopHeader_LeftNavigation.php';?>

        <!-- page content -->
        <div class="right_col" role="main">
            <!-- top tiles -->
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
					<div class="x_panel">
						<div class="x_title">
							<h2>Blog</h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="#">Settings 1</a>
										<a class="dropdown-item" href="#">Settings 2</a>
									</div>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">

                            <form method="post" action="" enctype="multipart/form-data" id="blogForm">
                                <div class="item form-group">
                                    <label class="col-form-label" for="txtName">Title</label>
                                    <input type="text" id="txtName" class="form-control txtName" maxlength="100">
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label" for="blogHeadshot">File</label>
                                    <input type="file" id="blogHeadshot" class="form-control blogHeadshot">
                                </div>
                               <div class=" item form-group">
                                    <textarea name="editor1" id="editor"></textarea>
                               </div>
                                <button type="submit" class="btn btn-primary btnSaveBlog">Submit</button>
                            </form>
						</div>
					</div>
				</div>
            </div>
            <!-- /page content -->
        </div>
    </div>

<script>
        CKEDITOR.replace('editor');
        $(document).ready(function() {
            $('#blogForm').submit(function(event) {
                event.preventDefault();
                fnCreatemasterBlog();
            });
        });
</script>

<script>
        

        function fnCreatemasterBlog() {
            var ckValue = CKEDITOR.instances.editor.getData();
            var form_data = new FormData();

            form_data.append("file", $('#blogHeadshot')[0].files[0]);
            form_data.append("BlogName", $('#txtName').val());
            form_data.append("Contant", ckValue);
            // Inside the fnCreatemasterBlog() function
            var checkValue = ($('#blogHeadshot').val() !== '') ? 1 : 0;
            form_data.append("check", checkValue);
            form_data.append("action", "insertMasterBlogdata");

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
                        window.location.href = 'master-blog.php'; 
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
    </script>
						
    <!-- include for Footer -->
    <?php include 'includes/include_Footer.php';?>    
   
</body>
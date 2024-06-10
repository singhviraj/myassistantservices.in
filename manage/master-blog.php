<?php include 'includes/sessionCheck.php'; ?>
<html lang="en">
<!-- include for html Header -->
<?php include 'includes/include_head.php';?>

<script>
$(document).ready(function() {

    fnlistBlogs();

});

</script>

<script>
// function for list master project
function fnlistBlogs() {
    $.ajax({
        type: "POST",
        dataType: "json",
        success: SuccessHandler,
        url: 'api/apiadmin.php',
        data: {
            action: "listMasterBlog"
        }
    });
    function SuccessHandler(data) {
        var row = "",jData = '';
        jData = data.data;
        console.log(jData);
        var Status = '';
        if (jData.length > 0) {
            for (var K = 0; K < jData.length; K++) {
                                
                row += '<tr><td>' + (K + 1) + '</td><td>' + jData[K].Name + '</td><td> <img src="assets/blogs/' + jData[K].BlogId +
                    '/' + jData[K].Headshot +
                    '" width="200" height="150"></td><td>' + jData[K].Create_at + '</td><td> <a class="btn btn-danger btn-xs" onclick="fnDeleteBlog('+jData[K].BlogId+')"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Remove</a></td></tr>';
            }
            row;
        } else {
            row = '';
        }
        $('#DataShow').html(row);
        $('#myTable').DataTable();
    };
}

// function for delete Master product (BOC by laleshwar 30-06-2023)
    function fnDeleteBlog(BlogId){
        //alert(BlogId);
        jQuery.ajax({
            url: "api/apiadmin.php",
            data: {
                action: 'deleteBlog',
                blogId: BlogId
            },
            type: "POST",
            success: SuccessHandler
        });
        function SuccessHandler(data) {     
            if (data.success == true) {
                Alert.success(data.msg, {displayDuration: 4000,pos: 'top'});
                fnlistBlogs();
            } else {
                Alert.error(data.msg, {displayDuration: 4000,pos: 'top'});
            }
        };
    }

</script>

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
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2> Blog List</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a href="blog.php"><i class="fa fa-plus"></i> Add Blog </a>
                                </li>
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <!-- Project list -->
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table table-striped table-bordered bulk_action dataTable no-footer"
                                    id="myTable" style="font-size: 13px;">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px;">S.No</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Date</th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    <tbody id="DataShow">
                                        <tr>
                                            <td> First Blog</td>
                                            <td></td>
                                            <td>30-06-2023</td>
                                            <td></td>
                                        </tr>
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

</body>
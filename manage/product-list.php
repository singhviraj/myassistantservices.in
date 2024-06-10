<?php include 'includes/sessionCheck.php'; ?>
<html lang="en">
<!-- include for html Header -->
<?php include 'includes/include_head.php';?>

<script>
$(document).ready(function() {

    fnlistmasterproductdata();

});

// function for list master project
function fnlistmasterproductdata() {
    $.ajax({
        type: "POST",
        dataType: "json",
        success: SuccessHandler,
        url: 'api/apiadmin.php',
        data: {
            action: "listMasterProductData"
        }
    });
    function SuccessHandler(data) {
        var row = "",jData = '';
        jData = data.data;
        console.log(jData);
        var Status = '';
        if (jData.length > 0) {
            for (var K = 0; K < jData.length; K++) {
                if (jData[K].FirstName == null) {
                    var fName = '';
                } else {
                    var fName = jData[K].FirstName;
                }

                if (jData[K].LastName == null) {
                    var lName = '';
                } else {
                    var lName = jData[K].LastName;
                }
                
                row += '<tr><td>' + (K + 1) + '</td><td>' + jData[K].ProductName + '</td><td>' + jData[K].BrandName +
                    '</td><td>' + jData[K].CategoryName + '</td><td>' + jData[K].StockQuantity + '</td><td>' + jData[K]
                    .SalesPrice + '</td><td><a class="btn btn-primary btn-xs" href="master-product.php?ProductID='+jData[K].ProductID+'"><i class="fa fa-pencil" aria-hidden="true"></i></a> |&nbsp; <a class="btn btn-danger btn-xs" onclick="fnDeleteProjectBanner('+jData[K].ProductID+')"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>';
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
    function fnDeleteProjectBanner(ProductID){
        jQuery.ajax({
            url: "api/apiadmin.php",
            data: {
                action: 'deleteProject',
                ProductID: ProductID
            },
            type: "POST",
            success: SuccessHandler
        });
        function SuccessHandler(data) {     
            if (data.success == true) {
                Alert.success(data.msg, {displayDuration: 4000,pos: 'top'});
                fnlistmasterproductdata();
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
                            <h2> Projects List</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a href="master-product.php"><i class="fa fa-plus"></i> add product </a>
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
                                            <th>Product Name</th>
                                            <th>Brand name</th>
                                            <th>Category</th>
                                            <th>Stocks </th>
                                            <th>Price </th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>
                                    <tbody id="DataShow">

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
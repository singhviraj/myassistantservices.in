<?php include 'includes/sessionCheck.php'; ?>
<html lang="en">
 <!-- include for html Header -->
<?php include 'includes/include_head.php';?>
<script>
  $(document).ready(function() {
    fnFetchAllCount();
  });
</script>

<script>
  function fnFetchAllCount(){
    $.ajax({
        type: "POST",
        dataType: "json",
        success: SuccessHandler,
        url: 'api/apiadmin.php',
        data: {
          action: "fetchAlldataCount",
        }
    });

    function SuccessHandler(data) {
      //console.log(data);
      if (data.data == 1) {
        $('.lnProjects').html(data.TotalProject);
        $('.lnBuilders').html(data.TotalBuilder);
        $('.lnTotaUsers').html(data.TotalUsers);
        $('.lnStaff').html(data.TotalStaff);
        $('.lnCustomers').html(data.TotalCustomer);
        $('.lnLeadsTotal').html(data.LeadsCount);
      } else {
        console.log(data.msg);
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
            
              <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                  <div class="tile-stats" style="padding:15px">
                    <div class="icon"><i class="fa fa-user" style="font-size: 45px !important;"></i></div>
                    <div class="count lnTotaUsers" style="font-size: 29px;">100</div>
                    <h3 style="font-size: 20px;">Application Sent</h3>
                  </div>
              </div>

              <a href="users-list.php">
                <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                    <div class="tile-stats" style="padding:15px">
                      <div class="icon"><i class="fa fa-user" style="font-size: 45px !important;"></i></div>
                      <div class="count lnCustomers" style="font-size: 29px;">60</div>
                      <h3 style="font-size: 20px;">Interviews Schedule</h3>
                    </div>
                </div>
              </a>

              <a href="users-list.php">
              <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                  <div class="tile-stats" style="padding:15px">
                    <div class="icon"><i class="fa fa-users" style="font-size: 45px !important;"></i></div>
                    <div class="count lnStaff" style="font-size: 29px;">12000</div>
                    <h3 style="font-size: 20px;">Total Jobs</h3>
                  </div>
              </div>
              </a>

              <a href="all-lead-list.php">
                <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
                  <div class="tile-stats" style="padding:15px">
                    <div class="icon"><i class="fa fa-users" style="font-size: 45px !important;"></i></div>
                    <div class="count lnLeadsTotal" style="font-size: 29px;">9400</div>
                    <h3 style="font-size: 20px;">Total Users</h3>
                  </div>
                </div>
              </a>

            <hr/>     
            </div>
        <!-- page content -->
        <div class="clearfix"></div>    
        <div class="row">
              <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Outstanding<small>monthly</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="myOutStandigSale"></canvas>
                    <div class="form-group col-md-3 col-sm-6 col-xs-12 d-flex justify-content-center">
                      <select class="form-control" name="test" id="chnageYearFirstGraph">
                        <?php $date = strtotime(date("Y").' -1 year'); ?>
                      <option value="<?php echo date('Y', $date); ?>"><?php echo date('Y', $date); ?></option>
                      <option value="<?php echo date("Y") ?>" selected><?php echo date("Y") ?></option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Gross sales<small>monthly</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <canvas id="myGrossSaleGraph"></canvas>
                    <div class="form-group col-md-3 col-sm-6 col-xs-12 d-flex justify-content-center">
                      <select class="form-control" name="test" id="chnageYearSecondGraph">
                      <?php $date = strtotime(date("Y").' -1 year'); ?>
                      <option value="<?php echo date('Y', $date); ?>"><?php echo date('Y', $date); ?></option>
                      <option value="<?php echo date("Y") ?>" selected><?php echo date("Y") ?></option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        <!-- /page content -->
        </div> 
<!-- include for Footer -->
<?php include 'includes/include_Footer.php';?>

<!-- grap for gross sale and outstandig income -->
<script>
function fnCreateGraphofSales(sellingAmount, dueAmount) {
  const ctx = document.getElementById('myOutStandigSale').getContext('2d');
  var myOutStandigSale = new Chart(ctx, {
				type: 'bar',
				data: {
          labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
				  datasets: [{
					label: 'Total selling amount',
					backgroundColor: "#26B99A",
					data: sellingAmount//[5, 30, 40, 28, 92, 50, 45, 56, 99, 120, 87, 88]
				  }, {
					label: 'Total due amount',
					backgroundColor: "#03586A",
					data: dueAmount//[200, 506, 250, 480, 720, 340, 120, 300, 400, 280, 920, 220]
				  }]
				},

				options: {
				  scales: {
					yAxes: [{
					  ticks: {
						beginAtZero: true
					  }
					}]
				  }
				}
	});
}

function fnCreateGraphOfGrossSale(noOFPlanSale, TotalEarning) {
  const ctx = document.getElementById('myGrossSaleGraph').getContext('2d');
  var myGrossSaleGraph = new Chart(ctx, {
				type: 'line',
				data: {
				  labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
				  datasets: [
            {
              label: "No of Plans Sale",
              backgroundColor: "rgba(38, 185, 154, 0.31)",
              borderColor: "rgba(38, 185, 154, 0.7)",
              pointBorderWidth: 1,
              data: noOFPlanSale //[31, 343, 6, 39, 20, 35, 7,4, 6, 39, 220, 85]
				   },{
              label: "Total Earning",
              backgroundColor: "rgb(41,89,106)",
              borderColor: "rgb(208,70,80)",
              pointBorderWidth: 1,
              data: TotalEarning  //[31, 43, 6, 89, 20, 85, 7, 44, 6, 39, 20, 185]
				   }
        ]
				},
		});
}
</script>
    </div>
  </div>        
</body>
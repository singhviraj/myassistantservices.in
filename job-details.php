<?php  $url = $_GET['jobId']; 
?>
<?php include 'include/header.php' ?>

<main class="">
    <div class="container-xxl py-5 bg-dark page-header mb-5">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3">Job Details</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                    <i class="fa-solid fa-briefcase" style="font-size:80px;color:#0E2264"></i>
                        <div class="text-start ps-4">
                            <h3 class="mb-3 heading jobPosition"></h3>
                            <span class="text-truncate me-3"><i class="fas fa-building text-primary me-2"></i> <span id="companyName"></span></span>
                            
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2" aria-hidden="true"></i><span id="jobCategory"></span></span>

                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2" aria-hidden="true"></i> <span id="jobLocation"></span></span>
                        </div>
                    </div>
                    <div class="mb-5" id="Content">
                        <h4 class="mb-3 heading">Job description</h4>
                        <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                        <h4 class="mb-3 heading">Responsibility</h4>
                        <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet
                            voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-angle-right text-primary me-2" aria-hidden="true"></i>Dolor justo tempor
                                duo ipsum accusam</li>
                            <li><i class="fa fa-angle-right text-primary me-2" aria-hidden="true"></i>Elitr stet dolor
                                vero clita labore gubergren</li>
                            <li><i class="fa fa-angle-right text-primary me-2" aria-hidden="true"></i>Rebum vero dolores
                                dolores elitr</li>
                            <li><i class="fa fa-angle-right text-primary me-2" aria-hidden="true"></i>Est voluptua et
                                sanctus at sanctus erat</li>
                            <li><i class="fa fa-angle-right text-primary me-2" aria-hidden="true"></i>Diam diam stet
                                erat no est est</li>
                        </ul>
                        <h4 class="mb-3 heading">Qualifications</h4>
                        <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet
                            voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-angle-right text-primary me-2" aria-hidden="true"></i>Dolor justo tempor
                                duo ipsum accusam</li>
                            <li><i class="fa fa-angle-right text-primary me-2" aria-hidden="true"></i>Elitr stet dolor
                                vero clita labore gubergren</li>
                            <li><i class="fa fa-angle-right text-primary me-2" aria-hidden="true"></i>Rebum vero dolores
                                dolores elitr</li>
                            <li><i class="fa fa-angle-right text-primary me-2" aria-hidden="true"></i>Est voluptua et
                                sanctus at sanctus erat</li>
                            <li><i class="fa fa-angle-right text-primary me-2" aria-hidden="true"></i>Diam diam stet
                                erat no est est</li>
                        </ul>
                    </div>
                    <div class="">
                        <h4 class="mb-4 heading">Apply For The Job</h4>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6"><input type="text" name="name" class="form-control" id=""
                                        placeholder="Your Name" required=""></div>
                                <div class="col-12 col-sm-6"><input type="email" name="email" class="form-control" id=""
                                        placeholder="Your Email" required=""></div>
                                <div class="col-12 col-sm-6"><input type="text" name="website" class="form-control"
                                        id="" placeholder="Portfolio Website"></div>
                                <div class="col-12 col-sm-6"><input type="file" name="resume"
                                        class="form-control bg-white" id="" required=""></div>
                                <div class="col-12"><textarea class="form-control" name="coverletter" rows="5"
                                        placeholder="Coverletter" id=""></textarea></div>
                                <div class="col-12"><button class="btn btn-primary w-100" type="submit">Apply
                                        Now</button></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-thin rounded p-job mb-4">
                        <h4 class="mb-4 heading">Job Summery</h4>
                        <p><i class="fa fa-angle-right text-primary me-2" aria-hidden="true"></i>Published On:
                            <span id="post-date"></span></p>
                        <p><i class="fa fa-angle-right text-primary me-2" aria-hidden="true"></i>Salary: <span id="salary"></span></p>
                        <!-- <p><i class="fa fa-angle-right text-primary me-2" aria-hidden="true"></i>Job Nature: <span id="jobCategory"></span></p>
                        <p><i class="fa fa-angle-right text-primary me-2" aria-hidden="true"></i>Location: <span id="jobLocation"></span></p> -->
                        <!-- <p class="m-0"><i class="fa fa-angle-right text-primary me-2" aria-hidden="true"></i>Date Line:
                            01 Jan, 2045</p> -->
                    </div>
                    <div class="bg-thin rounded p-job">
                        <h4 class="mb-4 heading">Company Detail</h4>
                        <p class="m-0" id="companyDescription"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $( document ).ready(function() {
        var jobId = "<?php echo $url ?>";
        // var jobId='8';
    //    alert(jobId);
    fnListAllJobData();
        if (!(jobId == null)) {
            $('#BlogId').val(jobId);
            fnListAllJobData(jobId);
        }else{
            
        }        

    });
</script>

<script>
    function fnListAllJobData(jobId){
        $.ajax({
            type: "POST",
            dataType: "json",
            success: SuccessHandler,
            url: 'manage/api/apiadmin-view.php',
            data: {
                action: "listjobDetailData",
                jobId:jobId,
            }
        });
        function SuccessHandler(data) {
      	console.log(data);
          var row = '',row1='',row2='',row3='',row4='',row5='',row6='', row7='',row8='';
          if (data.data == 1) {
              var jData = data.jobDetail;
            //   console.log(jData[0].JobName);
              if (jData.length > 0) {
                  row+=jData[0].JobName;
                  row1+=jData[0].CompanyName;
                  row2+=jData[0].JobCategory;
                  row3+=jData[0].JobLocation;
                  row4+=jData[0].Content;
                  row5+=jData[0].CreateDate;
                  row6+=jData[0].Description;
                  row7+=jData[0].Salary;
                  row8+=jData[0].CreateDate;
              }
          }else {
              row = '';
          }
          $('.jobPosition').html(row);
          $('#companyName').html(row1);
          $('#jobCategory').html(row2);
          $('#jobLocation').html(row3);
          $('#Content').html(row4);
          $('#companyDescription').html(row6);
          $('#salary').html(row7);
          $('#post-date').html(row8);

      };
    }
</script>

<?php include 'include/footer.php' ?>
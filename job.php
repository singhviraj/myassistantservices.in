<?php include 'include/header.php' ?>
<style>
    @media (min-width: 789px)
    {
        .job-card {
            padding: 20px 150px;
        }
        
    }

    @media (min-width: 556px){
        btn-apply {
            padding: 10px 14px;
        }
    }
    /* .job-card {
    padding: 20px 0px; */
/* } */
.card-box {
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15);
    border-radius: 10px;
    background-color: #fff;
    padding: 20px;
}
.text-start {
    text-align: left!important;
}
.btn-apply{
    padding: 10px 35px;
}
.input-groupss {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    width: 100%;
}

</style>
<section class="p-3">
    <div class="container" style="background: rgb(244, 245, 249);">
        <div class="row input-groups no-gutters border-lt search-box">
            <div class="col-sm-12 col-md-5 no-gutterss">
                <input type="text" id="txtSeachJob" class="form-control" aria-label="Text input" placeholder="Search &quot;Jobs&quot;">
            </div>
            <div class="col-sm-12 col-md-5 no-gutterss">
                <input type="text" id="txtSeachLocation" class="form-control" aria-label="Text input" placeholder="location">
            </div>
            <div class="col-sm-12 col-md-2 input-groups-append no-gutterss">
                <button class="btn btn-search btn-block" type="button" id="btnSearch" onClick="fnlistAllJobs('1');" title="Search">
                    <i class="fa fa-search"> Search</i>
                    <!-- <span class="ml-1 text-uppercase">Search</span> -->
                </button>
            </div>
        </div>
    </div>
        <div id="listjobs">
            <!-- <div class="container job-card">
                <div class="basic-details card-box mb-2">
                    <div class="row">
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <div class="text-start ps-4">
                                <h5 class="">Web Developer</h5>
                                <div class="mb-3"><small>Company: Virtual Buddys Pvt Ltd</small></div><span class="text-truncate me-3"><i
                                        class="fa fa-map-marker-alt text-primary me-2"
                                        aria-hidden="true"></i>Delhi</span><span class="text-truncate me-3"><i
                                        class="far fa-clock text-primary me-2" aria-hidden="true"></i>Full Time</span><span
                                    class="text-truncate me-0"><i class="fa fa-map-marker text-primary me-2"
                                        aria-hidden="true"></i>Noida, Up</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <div class="d-flex mb-3"><a class="btn btn-primary btn-apply"
                                    href="job-details.php">Apply Now</a></div><small
                                class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"
                                    aria-hidden="true"></i>Post Date: 31/01/2024</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container job-card">
                <div class="basic-details card-box mb-2">
                    <div class="row">
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <div class="text-start ps-4">
                                <h5 class="">Web Developer</h5>
                                <div class="mb-3"><small>Company: Virtual Buddys Pvt Ltd</small></div><span class="text-truncate me-3"><i
                                        class="fa fa-map-marker-alt text-primary me-2"
                                        aria-hidden="true"></i>Delhi</span><span class="text-truncate me-3"><i
                                        class="far fa-clock text-primary me-2" aria-hidden="true"></i>Full Time</span><span
                                    class="text-truncate me-0"><i class="fa fa-map-marker text-primary me-2"
                                        aria-hidden="true"></i>Noida, Up</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <div class="d-flex mb-3"><a class="btn btn-primary btn-apply"
                                    href="job-details.php">Apply Now</a></div><small
                                class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"
                                    aria-hidden="true"></i>Post Date: 31/01/2024</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container job-card">
                <div class="basic-details card-box mb-2">
                    <div class="row">
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <div class="text-start ps-4">
                                <h5 class="">Web Developer</h5>
                                <div class="mb-3"><small>Company: Virtual Buddys Pvt Ltd</small></div><span class="text-truncate me-3"><i
                                        class="fa fa-map-marker-alt text-primary me-2"
                                        aria-hidden="true"></i>Delhi</span><span class="text-truncate me-3"><i
                                        class="far fa-clock text-primary me-2" aria-hidden="true"></i>Full Time</span><span
                                    class="text-truncate me-0"><i class="fa fa-map-marker text-primary me-2"
                                        aria-hidden="true"></i>Noida, Up</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <div class="d-flex mb-3"><a class="btn btn-primary btn-apply"
                                    href="job-details.php">Apply Now</a></div><small
                                class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"
                                    aria-hidden="true"></i>Post Date: 31/01/2024</small>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>

<script>
$(document).ready(function()
{
    fnlistAllJobs('0');

});
</script>
<script>
    function fnlistAllJobs(searchString){
        $.ajax({
            type: "POST",
            dataType: "json",
            success: SuccessHandler,
            url: 'manage/api/apiadmin-view.php',
            data: {
                action: "listAlljobs",
                jobName: $('#txtSeachJob').val(),
                jobLocation: $('#txtSeachLocation').val(),
                searchString:searchString,
            }
        });
        function SuccessHandler(data){
            var row='', jData='';
            jData=data.data;
            if(jData.length>0){
                for(var K = 0; K < jData.length; K++){
                    row+='<div class="container job-card">';
                    row+='<div class="basic-details card-box mb-2">';
                    row+='<div class="row">';
                    row+='<div class="col-md-9 col-sm-9 col-xs-9">';
                    row+='<div class="text-start ps-4">';
                    row+='<h5 class="">'+jData[K].JobName+'</h5>';
                    row+='<div class="mb-3"><small>Company: '+jData[K].CompanyName+'</small></div>';
                    row+='<span class="text-truncate me-3"><i class="far fa-money-bill-alt text-primary me-2" aria-hidden="true"></i>'+jData[K].Salary+'</span>';
                    row+='<span class="text-truncate me-3"><i class="far fa-clock text-primary me-2" aria-hidden="true"></i>'+jData[K].JobCategory+'</span>';
                    row+='<span class="text-truncate me-0"><i class="fa fa-map-marker-alt text-primary me-2" aria-hidden="true"></i>'+jData[K].JobLocation+'</span>';
                    row+='</div>';
                    row+='</div>';
                    row+='<div class="col-md-3 col-sm-3 col-xs-3">';
                    row+='<div class="d-flex mb-3">';
                    row+='<a class="btn btn-primary btn-apply" href="job-details.php?jobId='+jData[K].JobID+'">Apply Now</a>';
                    row+='</div>';
                    row+='<small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2" aria-hidden="true"></i>Post Date: '+jData[K].CreateDate+'</small>';
                    row+='</div>';
                    row+='</div>';
                    row+='</div>';
                    row+='</div>';
                }
                row;
            }else{
                row='';
            }
            $('#listjobs').html(row);
        }
    }
</script>

<?php include 'include/footer.php' ?>
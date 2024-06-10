<?php include 'include/header.php' ?>



<head>
<title>Font Awesome Icons</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
  u{
    text-decoration: underline;
  }
#more {display: none;
    font-size:small;
}
#moree {display: none;
    font-size:small;
}
#moreee {display: none;
    font-size:small;
}
#myBtn{
    background:transparent;
    border:none;
}
#myBtnn{
    background:transparent;
    border:none;
}
#myBtnnn{
    background:transparent;
    border:none;
}
p{
  font-style:normal;
  font-size:18px;
}
.row{
  border-collapse: separate;
  border-spacing: 15px;
}
</style>

<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");
  var see = document.getElementById("see");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
    see.style.top="500px";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
    see.style.top="2000px";
  }

  var dots = document.getElementById("dotss");
  var moreText = document.getElementById("moree");
  var btnText = document.getElementById("myBtnn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
    see.style.top="500px";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
    see.style.top="2000px";
  }

  var dots = document.getElementById("dotsss");
  var moreText = document.getElementById("moreee");
  var btnText = document.getElementById("myBtnnn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
    see.style.top="500px";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
    see.style.top="2000px";
  }
}
/*
function myDevulapalli() {
  var dots = document.getElementById("dotss");
  var moreText = document.getElementById("moree");
  var btnText = document.getElementById("myBtnn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
function FnAneesa() {
  var dots = document.getElementById("dotsss");
  var moreText = document.getElementById("moreee");
  var btnText = document.getElementById("myBtnnn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
*/

</script>

<style>
.position{
display:block;
padding:5px;


}
.pos{
  margin:5px;
  width:400px;
  display: inline-block;
  background-color:rgb(230,230,230);
}
</style>


<div class="position" style="position:relative">            
        
<div  class="pos" style="position:absolute;top:0;left:9px">
<img src="images/aneesa.jpg"  style="width :170px;height:170px;border-radius:50%" alt="">
<div style="float:right;margin-top:35px">
            <h4>Dr. Aneesa Majid</h4>
            <span>MD, MBA</span>
            <a href="mailto:amajid@physicianstaffingsolutions.com"><i class="fa fa-envelope-square" style="font-size:24px"></i></a>
             <a href="">  <i class="fa fa-linkedin-square" style="font-size:24px"></i> </a>
</div>
            <!--<h4>About</h4>-->
            <p>Aneesa S. Majid, MD, MBA, FSIR CPE is an experienced physician leader, executive coach, and entrepreneur, with over 20 years of clinical and business experience. Dr. Majid is a board-certified interventional radiologist, and previously was a partner in one of the longstanding IR/DR   </p><span id="dotsss">...</span><div id="moreee"><p>practices in Dallas, TX.While with this practice, Dr. Majid served as Chairperson of the radiology departments at Methodist Dallas and Methodist Charlton Hospitals. In 2014, she founded her own IR practice, MTVIR, PLLC, with locations in Dallas and west Texas. In 2013, Dr. Majid became a founder of ZipData, INC; a healthcare IT interoperability company currently focused on removing the e-fax from medical communication and improving data transfer. She assumed the role of CEO in September, 2020.   ZipData is currently undergoing commercialization in the US market.</p>
            <p>Dr. Majid has held numerous positions in the field of radiology, where she has expanded on both her diagnostic and interventional skills. Additionally, Dr. Majid has spearheaded multiple consultative roles, aiding various facilities in the progression and expansion of their radiology service line offerings. She has been responsible for collaborating with hospital leadership and physicians, participated in hiring decisions, and implemented new department procedures geared toward quality assurance and improved patient care outcomes. </p>
            <p>Dr. Majid received her medical degree from St. George’s University School of Medicine and completed her post-graduate training in surgery and radiology at VCU/Medical College of Virginia. Dr. Majid completed her fellowship training in vascular and interventional radiology at RUSH University Medical Center. </p> 
            <p>In 2017, Dr. Majid earned an MBA from Northwestern University - Kellogg School of Management, and focuses on leadership and organizations, operations management, and marketing strategy.  </p>
            <p>Dr. Majid became a certified executive coach through the Marshall Goldsmith Stakeholder Centered Coaching and the Physician Coaching Institute both part of the International Coaching Federation. Her focus is on leadership development and the effect on culture in healthcare organizations and the importance of civility and community in the workplace.</p>           
</div><button onclick="myFunction()" id="myBtnnn">Read more</button>
        </div>



<div  class="pos" style="position:absolute;top:0;left:450px">
<img src="images/kavi.jpg"  style="width :170px;height:170px;border-radius:50%" alt="">
<div style="float:right;margin-top:35px">
            <h4>Dr. Kavi </h4>
            <h4>Devulapalli</h4>
            <span>MD, MBA</span>
            <a href="mailto:amajid@physicianstaffingsolutions.com"><i class="fa fa-envelope-square" style="font-size:24px"></i></a>
             <a href="">  <i class="fa fa-linkedin-square" style="font-size:24px"></i> </a>
</div>
 <p>Dr. Kavi Devulapalli is a Columbia, Missouri based independent interventional radiologist who contracts with multiple hospitals and outpatient based practices. His clinical interests include benign prostatic hyperplasia, uterine fibroids, venous disease and  critical limb ischemia. </p><span id="dotss">...</span><div id="moree"><p>He is one of a few interventional radiologists with significant experience performing prostate artery embolization in office interventional suites.
        He graduated magna cum laude from Rice University. Subsequently, he underwent a combined medical and masters in public health program from Case Western Reserve University, where he was elected to the Alpha Omega Alpha honors society. Dr. Devulapalli completed a diagnostic radiology residency at the University of California San Francisco followed by a fellowship in vascular and interventional radiology at the University of North Carolina. He has published in the radiology literature and has been a speaker at regional, national and international educational meetings, though is perhaps best known for his blog, Line Monkey MD, which chronicles his scenic journey as an early career interventional radiologist.</p>
        <p>As an advocate for  physician entrepreneurship and interventional radiology independence, he is passionate about creating meaningful opportunities for independent practice. Along with Physician Staffing Solutions, he is the co-founder of Travelier which is focused on creating sustainable long-term relationships with healthcare systems centered on the creation of longitudinal clinical care programs.  </p>
        <p>Dr. Devulapalli is active in the Small and Rural Practice Committee in the Society of Interventional Radiology, the Annual Meeting Planning Committee for the Outpatient Endovascular and Interventional Society and the Vascular Panel of the Appropriateness Criteria Committee for the American College of Radiology. </p></div>
<button onclick="myFunction()" id="myBtnn">Read more</button>
</div>


<div  class="pos" style="position:absolute;top:0;left:900px">
<img src="images/sumit.jpg"  style="width :170px;height:170px;border-radius:50%" alt="">
<div style="float:right;margin-top:35px">
            <h4>Dr. Shamit Desai</h4>
            <span>MD, MBA</span>
            <a href="mailto:amajid@physicianstaffingsolutions.com"><i class="fa fa-envelope-square" style="font-size:24px"></i></a>
             <a href="">  <i class="fa fa-linkedin-square" style="font-size:24px"></i> </a>
</div>
<p>Dr. Shamit Desai, MD is a practicing interventional radiologist and a founding member of Physician Staffing Solutions, LLC. He attended Rutgers Medical School and Northwestern University Feinberg School of Medicine for his residency and fellowship in Vascular & Interventional <span id="dots">...</span></p><div id="more"><p>Radiology. His clinical practice focuses on superficial and deep venous disease, peripheral vascular disease, spine interventions, uterine fibroid embolization, and interventional oncology. He is the director of the venous thromboembolism (VTE) program at two Chicagoland hospitals. Dr. Desai is the special advisor for IR at Chicago Medical School of Rosalind Franklin University. He has published extensively in interventional radiology and vascular surgery, frequently hosted and made guest appearances on podcasts and other media in the field, and is a consultant and educator for several medical device companies. He is a proponent of the clinical progress of the field of interventional radiology, and serves on the Society of Interventional Radiology Private Practice Advisory Committee (PPAC). An invited speaker at the Society of Interventional Radiology 2023 Annual meeting, his talk was entitled "the Future and Frontiers of IR". He is the moderator for the first-of-kind session "IR Locums" at an SIR Connect Town Hall in 2024, and an update on novel business models in IR at Western Angiography and Interventional Society Annual meeting in September 2024.  He is a devoted husband and father of 2 and resides in Chicago. He enjoys tennis, film, travel, and spending time with his wife and two children.</p></div>
                <button onclick="myFunction()" id="myBtn">Read more</button>
</div>

</div>


<!--scrollbar-->
<div id="see" style="position:absolute;top:500px">

<div style="height:600px;width:2600px; overflow:hidden">

<div class="first" style="display:flex" style="width:2000px">
  <img src="images/aneesa.jpg"  style="object-fit:contain">
  <img src="images/kavi.jpg" style="object-fit:contain">
  <img src="images/sumit.jpg" style="object-fit:contain">
</div>
</div>

</div>



</div>

<style>
  .first{
width:1000px;
height:600px;
animation: bang 8s infinite;
  }

  @keyframes bang{
    0%{transform: translateX(0px);} 
    25%{transform: translateX(-500px);}
    60%{transform: translateX(-700px);}

  }
  </style>



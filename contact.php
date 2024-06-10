<?php include 'include/header.php'?>
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="images/breadcrumb_bg.jpg"
        style="background-image: url(&quot;images/breadcrumb_bg.jpg&quot;);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h3 class="title">Contact With Us</h3>
                        <nav class="breadcrumb">
                            <span property="itemListElement" typeof="ListItem">
                                <a href="index.html" style="color:white">Home</a>
                            </span>
                            <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                            <span property="itemListElement" typeof="ListItem">Contact</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- contact-area -->
    <section class="contact-area section-py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-info-wrap">
                        <h2 class="title">Keep In Touch With Us</h2>
                        <ul class="list-wrap">
                            <li>
                                <div class="icon">
                                <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div class="content">
                                    <p>611 South DuPont Highway, <br> Suite 102, Dover, DE 19901 </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                <i class="fa-solid fa-phone"></i>
                                </div>
                                <div class="content">
                                    <a href="tel:+13122787683">312-278-7683</a><br>
                                    <!-- <a href="tel:0123456789">+123 555 69090</a> -->
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                <i class="fa-solid fa-envelope"></i>
                                </div>
                                <div class="content">
                                    <a href="mailto:admin@physicianstaffingsolutions.com">admin@physicianstaffingsolutions.com</a><br>
                                    <!-- <a href="mailto:info@gmail.com">info@gmail.com</a> -->
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact-form-wrap">
                        <h4 class="title">Get in Touch</h4>
                        <form id="contact-form" action="assets/mail.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input name="name" type="text" placeholder="Name *" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input name="email" type="email" placeholder="E-mail *" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input name="phone" type="number" placeholder="Phone *" required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input name="subject" type="text" placeholder="Your Subject *" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-grp">
                                <textarea name="message" placeholder="Message" required=""
                                    class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                        <p class="ajax-response mb-0"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->
    <!--interested candidate form start--> 
    
<section class="pq-widgett pq-widget-background">
    <div class="container">
        <div class="row text-center">
            
            <div class="offset-md-2 col-md-8">
                <div class="form-card p-4 bg-white row">
                    <div class="head text-center">
                        
                        <p>Are you a candidate interested in working with us? Please fill the form below.</p>
                    </div>
                   <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="First Name">
                        </div>
                   </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="Lname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="Phone" placeholder="Phone No.">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        

                    <select name="category" id="categories" style="background-color:rgb(229, 226, 239)">
                    <option value="Physician">Physicians</option>
                    <option value="Practise">Practice</option>
                    <option value="Hospitals">Hospitals</option>
  
                    </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="number" class="form-control" name="Phone" placeholder="Zip Code">
                        </div>
                    </div>
                    
                    <div class="row">
                       
                        <div class="col-md-12">
                            <textarea name="" id="" cols="30" rows="3" class="form-control" placeholder="write something here"></textarea>
                        </div>
                        
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</main>

<?php include 'include/footer.php'?>
<?php $this->load->view('header');?>

    <section class="breadcrumb_outer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="text-capitalize">Signup Step 2</h2>
                </div>
                <div class="col-lg-6">
                     <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Signup Step 2</li>
                      </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- signup form Start -->
    <div class="signup_wrapper pad_top_bottom_50">
        <div class="container">
            <div class="form_wrapper_main">
                <div class="signup_header">
                    <h3>Apply now as a service provider</h3>
                    <p>Simply fill out the application</p>
                </div>
                <div class="step_wizard">
                    <a href="signup_step1.html" class="step_circle active"><i class="fas fa-check"></i></a>
                    <a href="#" class="step_circle current">2</a>
                    <a href="#" class="step_circle">3</a>
                    <a href="#" class="step_circle">4</a>
                </div>
                <div class="signup_header">
                    <h3>Tell us about yourself</h3>
                    <p>Where are you based?</p> 
                </div>
                <!-- form Start -->
                <div class="col-lg-6 col-md-8 col-lg-offset-3 col-md-offset-2 col-xs-12">
                    <div class="register_form_wrap">
                        <form method="post" action="<?php echo site_url('user/service_register_two');?>">
                            <div class="form_group">
                                <div class="form_input">
                                    <input type="text" name="location" placeholder="Enter a location">
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="form_input">
                                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6959761.014640264!2d50.69992317560584!3d31.566893458551075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ef7ec2ec16b1df1%3A0x40b095d39e51face!2sIran!5e0!3m2!1sen!2sin!4v1552371736211"allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="form_input">
                                    <select name="city" class="">
                                        <option value="">Select City</option>
                                        <option value="Tehran">Tehran </option>
                                        <option value="Mashhad">Mashhad</option>
                                        <option value="Isfahan">Isfahan</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="sellerid" value="<?=$sellerid?>">
                            <div class="button_wrap">
                                <button type="submit" name="submit" class="red_button submit_btn">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- form End -->
            </div>
        </div>
    </div>
    <!-- signup form End -->
    <section class="footer_links">
       <div class="container">
           <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer_widget add_widget">
                        <h3 class="widget_title">Find Us</h3>
                        <div class="widget_text">
                            <p>2307 Beverley Rd Brooklyn, Dubai - United Arab Emirates </p>
                            <p>Open Monday to Saturday From 7h to 18h or talk to an expert 0712-0610-3314 – available 24/7 </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer_widget">
                        <h3 class="widget_title">Customers</h3>
                        <div class="footer_menu">
                            <ul>
                                <li>
                                    <a href="#">My service requests</a>
                                </li>
                                <li>
                                    <a href="#">How it works?</a>
                                </li>
                                <li>
                                    <a href="#">How it works?</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer_widget">
                        <h3 class="widget_title">Provider</h3>
                        <div class="footer_menu">
                            <ul>
                                <li>
                                    <a href="#">Provider's Dashboard</a>
                                </li>
                                <li>
                                    <a href="#">Become a service provider</a>
                                </li>
                                <li>
                                    <a href="#">Why join helpbit</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="footer_widget">
                        <h3 class="widget_title">Services</h3>
                        <div class="footer_menu">
                            <ul>
                                <li>
                                    <a href="#">Beauty Services</a>
                                </li>
                                <li>
                                    <a href="#">Recent launches</a>
                                </li>
                                <li>
                                    <a href="#">Appliances Services</a>
                                </li>
                                <li>
                                    <a href="#">Trending Services</a>
                                </li>
                                <li>
                                    <a href="#">Home Cleaning</a>
                                </li>
                                <li>
                                    <a href="#">Pest Control</a>
                                </li>
                                <li>
                                    <a href="#">Home Needs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
           </div>
       </div>
    </section>
   

<?php $this->load->view('footer');?>    

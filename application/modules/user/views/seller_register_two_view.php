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
                        <form id="form" method="post" action="<?php echo site_url('user/service_register_two');?>">
                            <div class="form_group">
                                <div class="form_input">
                                    <input type="text" id="locationn" name="location" placeholder="Enter a location">
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
                                <button type="button" name="" onclick="submit_form();" class="red_button submit_btn">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- form End -->
            </div>
        </div>
    </div>
    <!-- signup form End -->
    

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function submit_form(){
            if($.trim($('#locationn').val()) == ''){
                swal('Please Select Location');
                return false;
            }
            $('#form').submit();
        }
    </script>
   

<?php $this->load->view('footer');?>    

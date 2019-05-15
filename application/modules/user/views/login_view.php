<?php $this->load->view('header');?>
        <!-- breadcrumb Start -->
    <section class="breadcrumb_outer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="text-capitalize">Login</h2>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb End -->
    <section class="login_outer">
        
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <?php
                // display error & success messages
                if(isset($message)) {					
                    if($success){
                    ?>
                      <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> <?php print_r($message); ?>
                      </div>						
                    <?php
                    }else{
                    ?>
                        <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Error!</strong> <?php print_r($message); ?>
                        </div>						
                    <?php
                    }
                }
                ?>
                <div class="login-inner">
                    <div class="login-header">
                        <h1><i class="fa fa-lock"></i>Login Using your email</h1></div>
                    <div class="login-form">
                        <form method="post" action="<?php echo site_url('user/login_check');?>">
                            <div class="form-group">
                                <input type="text" name="email" placeholder="Your Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Your Password" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6"><a href="#" class="forget-link">Forget Passowrd</a></div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-secondry pull-right">Login</button>
                                </div>
                            </div>
                            <input type="hidden" name="return_url" value="<?php echo $this->session->userdata('return_url');?>">
                            <div class="row">
                                <h3>don't you have account? <a href="<?php echo site_url('user/register'); ?>">Sign up Now</a></h3>
                            </div>
                        </form>
                    </div>
                    <div class="another-login text-center col-md-12">
                        <div class="row">
                            <div class="col-md-6 facebook">
                                <div class="social-login"><a href="#"><i class="fab fa-facebook-f"></i> Facebook </a></div>
                            </div>
                            <div class="col-md-6 google">
                                <div class="social-login"><a href="#"><i class="fab fa-google"></i> Google </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
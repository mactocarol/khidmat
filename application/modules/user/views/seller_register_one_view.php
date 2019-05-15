<?php $this->load->view('header');?>
    <section class="breadcrumb_outer">
    	<div class="container">
        	<div class="row">
            	<div class="col-lg-6">
                	<h2 class="text-capitalize">Signup Step 1</h2>
                </div>
                <div class="col-lg-6">
                	 <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Signup Step 1</li>
                      </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- signup form Start -->
    <div class="signup_wrapper pad_top_bottom_50">
    	<div class="container">
            <div class="form_wrapper_main">
                <!-- top category Start -->
                <form method="post" id="user_form" action="<?php echo site_url('user/service_register');?>">
                	<div class="signup_header">
                    	<h3>Apply now as a service provider</h3>
                        <p>Simply fill out the application</p>
                    </div>
                    <div class="step_wizard">
                        <a href="signup_step1.html" class="step_circle current">1</a>
                        <a href="#" class="step_circle">2</a>
                        <a href="#" class="step_circle">3</a>
                        <a href="#" class="step_circle">4</a>
                    </div>
                    <div class="signup_header">
                        <h3>What do you do?</h3>
                        <p>Please select a category</p> 
                    </div>
                    <div class="register_form_wrap">
                        <div class="cat_box">
                            <label>
                                <input type="checkbox" name="category[]" value="electronics">
                                <span class="label_box">
                                    <i class="fa fa-plug"></i>
                                    <span class="text">Electronics Repair</span>
                                </span>
                            </label>
                        </div>
                        <div class="cat_box">
                            <label>
                                <input type="checkbox" name="category[]" value="fashionservices">
                                <span class="label_box">
                                    <i class="fab fa-redhat"></i>
                                    <span class="text">Fashion Services</span>
                                </span>
                            </label>
                        </div>
                        <div class="cat_box">
                            <label>
                                <input type="checkbox" name="category[]" value="homeservice">
                                <span class="label_box">
                                    <i class="fas fa-home"></i>
                                    <span class="text">Home Services</span>
                                </span>
                            </label>
                        </div>
                        <div class="cat_box">
                            <label>
                                <input type="checkbox" name="category[]" value="Moving">
                                <span class="label_box">
                                    <i class="fas fa-truck-moving"></i>
                                    <span class="text">Moving Services</span>
                                </span>
                            </label>
                        </div>
                        <div class="cat_box">
                            <label>
                                <input type="checkbox" name="category[]" value="petcare">
                                <span class="label_box">
                                    <i class="fas fa-paw"></i>
                                    <span class="text">Pet Care</span>
                                </span>
                            </label>
                        </div>
                        <div class="cat_box">
                            <label>
                                <input type="checkbox" name="category[]" value="Beauty">
                                <span class="label_box">
                                    <i class="fas fa-eye"></i>
                                    <span class="text">Beauty Services</span>
                                </span>
                            </label>
                        </div>
                        <div class="cat_box">
                            <label>
                                <input type="checkbox" name="category[]" value="carservice">
                                <span class="label_box">
                                    <i class="fas fa-paw"></i>
                                    <span class="text">Car Services</span>
                                </span>
                            </label>
                        </div>
                        <div class="cat_box">
                            <label>
                                <input type="checkbox" name="category[]" value="storage">
                                <span class="label_box">
                                    <i class="fas fa-database"></i>
                                    <span class="text">Storage</span>
                                </span>
                            </label>
                        </div>
                        <div class="cat_box">
                            <label>
                                <input type="checkbox" name="category[]" value="fitness">
                                <span class="label_box">
                                    <i class="fas fa-dumbbell"></i>
                                    <span class="text">Fitness</span>
                                </span>
                            </label>
                        </div>
                        <div class="cat_box">
                            <label>
                                <input type="checkbox" name="category[]" value="laundary">
                                <span class="label_box">
                                    <i class="fas fa-tshirt"></i>
                                    <span class="text">Laundry Services</span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <!-- top category End -->
                    <!-- Bottom category Start -->
                    <div class="category_box_wrap2">
                        <div class="category_heading pad_top_bottom_30">
                            <h3>Please select the category</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12 cat_list electronics">
                                <div class="cat_check_list">
                                    <label>
                                        <input type="checkbox" name="electronics[]" value="1">
                                        <span class="c_circle">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="c_text">Mobile Repair</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12 cat_list electronics">
                                <div class="cat_check_list">
                                    <label>
                                        <input type="checkbox" name="electronics[]" value="2">
                                        <span class="c_circle">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="c_text">Laptop Repair</span>
                                    </label>
                                </div>
                            </div>
                           <div class="col-md-3 col-sm-6 col-xs-12 cat_list electronics">
                                <div class="cat_check_list">
                                    <label>
                                        <input type="checkbox" name="electronics[]" value="3">
                                        <span class="c_circle">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="c_text">tablet Repair</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12 cat_list electronics">
                                <div class="cat_check_list">
                                    <label>
                                        <input type="checkbox" name="electronics[]" value="4">
                                       <span class="c_circle">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="c_text">Home Appliances Repair</span>
                                    </label>
                                </div>
                            </div>
                           <div class="col-md-3 col-sm-6 col-xs-12 cat_list homeservice">
                                <div class="cat_check_list">
                                    <label>
                                        <input type="checkbox" name="homeservice[]" value="plumbing">
                                        <span class="c_circle">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="c_text">plumbing</span>
                                    </label>
                                </div>
                            </div>
                           <div class="col-md-3 col-sm-6 col-xs-12 cat_list homeservice">
                                <div class="cat_check_list">
                                    <label>
                                        <input type="checkbox" name="homeservice[]" value="wall Painting">
                                       <span class="c_circle">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="c_text">Wall Painting</span>
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="sellerid" value="<?=$sellerid?>">
                            <div class="button_wrap col-sm-12 col-xs-12">
                                <button type="submit" name="submit" class="red_button submit_btn">Next</button>
                            </div>
                        </div>
                    </div>
                     <!-- Bottom category End -->
                </form>
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

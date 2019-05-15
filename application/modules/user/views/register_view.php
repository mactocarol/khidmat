<?php $this->load->view('header');?>
<section class="breadcrumb_outer">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-6">
            	<h2 class="text-capitalize">Registration</h2>
            </div>
            <div class="col-lg-6">
            	 <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Registration</li>
                  </ol>
            </div>
        </div>
    </div>
</section>
<section class="login_outer">
	<div class="container">
    	<div class=" col-md-6 col-md-offset-3">
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
            	<div class="login-header"><h1><i class="fa fa-lock"></i> create an account</h1></div>
                <div class="login-form">
                	<form method="post" id="user_form" action="<?php echo site_url('user/register');?>">
                    	<div class="form-group">
                        	<input type="text" placeholder="UserName" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                        	<input type="email" placeholder="Your Email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                        	<input type="password" placeholder="Your Password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                        	<input type="password" placeholder="Your Confirm Password" name="confirm_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                        	<div class="row">
                            	<div class="col-md-12">
                                 <div class="form-user">
                                        <input class="form-check-input" type="radio" id="user" name="user" value="seller">
                                        <label class="form-check-label" for="user">Seller</label>
                                    </div>
                                     <div class="form-user">
                                        <input class="form-check-input" type="radio" id="buyer" name="user" value="buyer" checked>
                                        <label class="form-check-label" for="buyer">Buyer</label>
                                    </div>
                             </div>
                             </div>
                        </div>
                        <div class="row">
                        	<div class="col-md-8"><div class="form-groupcheckbox">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="terms" name="terms" required>
                                    <label class="form-check-label" for="terms">
                                        I Agree <a href="#">Terms and Condition</a>
                                    </label>
                                </div>
                            </div></div>
                            <div class="col-md-4"><button type="submit" class="btn btn-primary pull-right">Register</button></div>
                        </div>
                        <div class="row">
                        	<h3>already have account? <a href="<?php echo site_url('user')?>">Login</a></h3>
                        </div>
                    </form>
                </div>
                <div class="another-login text-center col-md-12">
                	<div class="row">
                    	
                    	<div class="col-md-6 facebook"><div class="social-login"><a href="#"><i class="fa fa-facebook"></i> Facebook </a></div></div>
                        <div class="col-md-6 google"><div class="social-login"><a href="#"><i class="fa fa-google-plus"></i> Google </a></div></div>
                    </div>
                </div>
            	
        	</div>
        </div>
    </div>
</section>
        	
        
          
           
  
   
   
    
           
<section class="quality_outer">
    <div class="container">
        <div class="row">
        	<div class="col-md-4">
            	<div class="quality_inner">
                	<i class="fa fa-shield"></i>
                	<h3>High Quality & Trusted Professionals</h3>
                    <p>We provide only verified, background checked and high quality professionals</p>
                </div>
            </div>
            <div class="col-md-4">
            	<div class="quality_inner">
                	<i class="fa fa-user"></i>
                	<h3>Matched to Your Needs</h3>
                    <p>We match you with the right professionals with the right budget</p>
                </div>
            </div>
            <div class="col-md-4">
            	<div class="quality_inner">
                	<i class="fa fa-thumbs-up"></i>
                	<h3>Hassle Free Service Delivery</h3>
                    <p>Super convenient, guaranteed service from booking to delivery</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="counter_outer text-center">
    <div class="container">
        <div class="row">
        	<div class="col-md-3">
            	<h3>254</h3>
                	<p>total services</p>
            </div>
            <div class="col-md-3">
            	<h3>172</h3>
                	<p>won awards</p>
            </div>
            <div class="col-md-3">
            	<h3>12168</h3>
                	<p>happy coustomer every year</p>
            </div>
            <div class="col-md-3">
            	<h3>254</h3>
                	<p>verified experties</p>
            </div>
		</div>
    </div>
</section>

<section class="footer_links">
	
    	<div id="parentHorizontalTab">
            <ul class="resp-tabs-list hor_1">
               
                <li>Beauty Services</li>
                 <li>Recent launches </li>
                <li>Appliances Services</li>
                <li>Trending Services </li>
                <li>Home Cleaning</li>
                <li>Pest Control</li>
                <li>Home Needs</li>
                 <li>Home Needs</li>
            </ul>
            <div class="resp-tabs-container hor_1 container">
                <div>
                	<div class="row">
                    	<ul>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Winter Moisture Infusion </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Monthly Premium Package </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Facials & Clean-Ups </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Style My Hair </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> L'Oréal Anti Dandruff Hair Spa </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Waxing - Detan Liposoluble </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Seasoul Body Polish </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Massages </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Pre Bridal Magic Package </a></li> 
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Pre Bridal Supreme Package </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Friend's Wedding Look </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Stunning Bridal Look </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> All in one Dhamaka Package </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Festive Economy Package </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Pedicure </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Threading </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Detanning  </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Manicure </a></li>
                    </ul>
                     
					</div>
                </div>
                <div>
                  <div class="row">
                    <ul>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Men's Grooming & Massages </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Renovation & Refurbishment </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Construction </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Interior Design </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> HomeSpection </a></li>
                    </ul>
					</div>
                </div>
                <div>
                  <div class="row">
                    <ul>
                      <li><a href="#"> <i class="fa fa-long-arrow-right"></i>     Washing Machine  </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Refrigerator  </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Geyser  </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Water Purifier  </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> TV  </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Microwave Oven  </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Chimney and Hob  </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> Wet Servicing  </a></li>
                        <li><a href="#"> <i class="fa fa-long-arrow-right"></i> AC  </a></li>
                    </ul>
					</div>
                </div>
                 <div>
                	<div class="row">
                    <div class="col-md-4">
        <ul>
            <li><a href="#"> Winter Moisture Infusion </a></li>
            <li><a href="#"> Monthly Premium Package </a></li>
            <li><a href="#">  Facials & Clean-Ups </a></li>
            <li><a href="#"> Style My Hair </a></li>
            <li><a href="#">  L'Oréal Anti Dandruff Hair Spa </a></li>
            <li><a href="#">  Waxing - Detan Liposoluble </a></li>
        </ul>
 </div>
<div class="col-md-4">
        <ul>
            <li><a href="#"> Pre Bridal Magic Package </a></li>
             <li><a href="#">Pre Bridal Supreme Package </a></li>
             <li><a href="#">Friend's Wedding Look </a></li>
             <li><a href="#">Stunning Bridal Look </a></li>
             <li><a href="#">All in one Dhamaka Package</a></li>
            <li><a href="#">Seasoul Body Polish</a></li>
        </ul>
    </div>
<div class="col-md-4">
    <ul>
        <li><a href="#">Massages </a></li>
        <li><a href="#">Festive Economy Package </a></li>
        <li><a href="#"> Pedicure</a></li>
        <li><a href="#">Threading</a></li> 
        <li><a href="#"> Detanning </a></li>
        <li><a href="#">Manicure </a></li>

    </ul>
</div>
					</div>
                </div>
                <div>
                    <div class="row">
                    <div class="col-md-4">
        <ul>
            <li><a href="#"> Winter Moisture Infusion </a></li>
            <li><a href="#"> Monthly Premium Package </a></li>
            <li><a href="#">  Facials & Clean-Ups </a></li>
            <li><a href="#"> Style My Hair </a></li>
            <li><a href="#">  L'Oréal Anti Dandruff Hair Spa </a></li>
            <li><a href="#">  Waxing - Detan Liposoluble </a></li>
        </ul>
 </div>
<div class="col-md-4">
        <ul>
            <li><a href="#"> Pre Bridal Magic Package </a></li>
             <li><a href="#">Pre Bridal Supreme Package </a></li>
             <li><a href="#">Friend's Wedding Look </a></li>
             <li><a href="#">Stunning Bridal Look </a></li>
             <li><a href="#">All in one Dhamaka Package</a></li>
            <li><a href="#">Seasoul Body Polish</a></li>
        </ul>
    </div>
<div class="col-md-4">
    <ul>
        <li><a href="#">Massages </a></li>
        <li><a href="#">Festive Economy Package </a></li>
        <li><a href="#"> Pedicure</a></li>
        <li><a href="#">Threading</a></li> 
        <li><a href="#"> Detanning </a></li>
        <li><a href="#">Manicure </a></li>

    </ul>
</div>
					</div>
                </div>
                <div>
                   <div class="row">
                    <div class="col-md-4">
        <ul>
            <li><a href="#"> Winter Moisture Infusion </a></li>
            <li><a href="#"> Monthly Premium Package </a></li>
            <li><a href="#">  Facials & Clean-Ups </a></li>
            <li><a href="#"> Style My Hair </a></li>
            <li><a href="#">  L'Oréal Anti Dandruff Hair Spa </a></li>
            <li><a href="#">  Waxing - Detan Liposoluble </a></li>
        </ul>
 </div>
<div class="col-md-4">
        <ul>
            <li><a href="#"> Pre Bridal Magic Package </a></li>
             <li><a href="#">Pre Bridal Supreme Package </a></li>
             <li><a href="#">Friend's Wedding Look </a></li>
             <li><a href="#">Stunning Bridal Look </a></li>
             <li><a href="#">All in one Dhamaka Package</a></li>
            <li><a href="#">Seasoul Body Polish</a></li>
        </ul>
    </div>
<div class="col-md-4">
    <ul>
        <li><a href="#">Massages </a></li>
        <li><a href="#">Festive Economy Package </a></li>
        <li><a href="#"> Pedicure</a></li>
        <li><a href="#">Threading</a></li> 
        <li><a href="#"> Detanning </a></li>
        <li><a href="#">Manicure </a></li>

    </ul>
</div>
					</div>
                </div>
                 <div>
                	<div class="row">
                    <div class="col-md-4">
        <ul>
            <li><a href="#"> Winter Moisture Infusion </a></li>
            <li><a href="#"> Monthly Premium Package </a></li>
            <li><a href="#">  Facials & Clean-Ups </a></li>
            <li><a href="#"> Style My Hair </a></li>
            <li><a href="#">  L'Oréal Anti Dandruff Hair Spa </a></li>
            <li><a href="#">  Waxing - Detan Liposoluble </a></li>
        </ul>
 </div>
<div class="col-md-4">
        <ul>
            <li><a href="#"> Pre Bridal Magic Package </a></li>
             <li><a href="#">Pre Bridal Supreme Package </a></li>
             <li><a href="#">Friend's Wedding Look </a></li>
             <li><a href="#">Stunning Bridal Look </a></li>
             <li><a href="#">All in one Dhamaka Package</a></li>
            <li><a href="#">Seasoul Body Polish</a></li>
        </ul>
    </div>
<div class="col-md-4">
    <ul>
        <li><a href="#">Massages </a></li>
        <li><a href="#">Festive Economy Package </a></li>
        <li><a href="#"> Pedicure</a></li>
        <li><a href="#">Threading</a></li> 
        <li><a href="#"> Detanning </a></li>
        <li><a href="#">Manicure </a></li>

    </ul>
</div>
					</div>
                </div>
                <div>
                    <div class="row">
                    <div class="col-md-4">
        <ul>
            <li><a href="#"> Winter Moisture Infusion </a></li>
            <li><a href="#"> Monthly Premium Package </a></li>
            <li><a href="#">  Facials & Clean-Ups </a></li>
            <li><a href="#"> Style My Hair </a></li>
            <li><a href="#">  L'Oréal Anti Dandruff Hair Spa </a></li>
            <li><a href="#">  Waxing - Detan Liposoluble </a></li>
        </ul>
 </div>
<div class="col-md-4">
        <ul>
            <li><a href="#"> Pre Bridal Magic Package </a></li>
             <li><a href="#">Pre Bridal Supreme Package </a></li>
             <li><a href="#">Friend's Wedding Look </a></li>
             <li><a href="#">Stunning Bridal Look </a></li>
             <li><a href="#">All in one Dhamaka Package</a></li>
            <li><a href="#">Seasoul Body Polish</a></li>
        </ul>
    </div>
<div class="col-md-4">
    <ul>
        <li><a href="#">Massages </a></li>
        <li><a href="#">Festive Economy Package </a></li>
        <li><a href="#"> Pedicure</a></li>
        <li><a href="#">Threading</a></li> 
        <li><a href="#"> Detanning </a></li>
        <li><a href="#">Manicure </a></li>

    </ul>
</div>
					</div>
                </div>
                
            </div>
        </div>
</section>
<!---->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstr‌​apValidator.js"></script>-->

<script>
//    $(document).ready(function() {
//	//alert('http://localhost/caroldata.com/hmvc_hotel_booking/registration/register_email_exists');
//    $('#add_form').bootstrapValidator({
//        //container: '#messages',
//        feedbackIcons: {
//            valid: 'glyphicon glyphicon-ok',
//            invalid: 'glyphicon glyphicon-remove',
//            validating: 'glyphicon glyphicon-refresh'
//        },
//        fields: {
//            username: {
//                validators: {
//					notEmpty: {
//						message : 'The Username Field is required'
//					},
//					 remote: {  
//					 type: 'POST',
//					 url: "<?php echo site_url();?>user/check_username_exists",
//					 data: function(validator) {
//						 return {
//							 //email: $('#email').val()
//							 email: validator.getFieldElements('username').val()
//							 };
//						},
//					 message: 'This Username is already in use.'     
//					 },
//                     callback: {
//                        message: 'please enter only letters and numbers',
//                        callback: function(value, validator, $field) {
//                            if (!isUsernameValid(value)) {
//                              return {
//                                valid: false,
//                              };
//                            }
//                            else
//                            {
//                              return {
//                                valid: true,
//                              };    
//                            }
//
//                        }
//                    },
//                    stringLength: {
//						min: 3 ,
//						max: 15,
//						message: 'The Username length min 3 and max 15 character Long'
//					}
//				},
//			},
//            f_name: {
//                validators: {
//                    notEmpty: {
//                        message: 'The First Name is required'
//                    },
//                }
//            },
//			contact: {
//                validators: {
//                    notEmpty: {
//                        message: 'The Contact is required'
//                    },
//                }
//            },
//            category: {
//                validators: {
//                    notEmpty: {
//                        message: 'The Category is required'
//                    },
//                }
//            },
//            //dob: {
//            //    validators: {
//            //        notEmpty: {
//            //            message: 'The Date Of Birth is required and cannot be empty'
//            //        },
//            //    }
//            //},
//            gender: {
//                validators: {
//                    notEmpty: {
//                        message: 'The Gender is required'
//                    },
//                }
//            },
//			email: {
//                validators: {
//					notEmpty: {
//						message : 'The email Field is required'
//					},
//					 remote: {  
//					 type: 'POST',
//					 url: "<?php echo site_url();?>user/check_email_exists",
//					 data: function(validator) {
//						 return {
//							 //email: $('#email').val()
//							 email: validator.getFieldElements('email').val()
//							 };
//						},
//					 message: 'This email is already in use.'     
//					 }
//				},
//			},    
//			
//			password: {
//				validators: {
//                    notEmpty: {
//						message : 'The password Field is required'
//					},
//					identical: {
//                        field: 'repassword',
//                        message: 'The password and its confirm are not the same'
//                    },
//					stringLength: {
//						min: 6 ,
//						max: 15,
//						message: 'The password length min 6 and max 15 character Long'
//					}
//				}
//			},
//			repassword: {
//				validators: {
//                    notEmpty: {
//						message : 'The password Field is required'
//					},
//					identical: {
//                        field: 'password',
//                        message: 'The password and its confirm are not the same'
//                    }
//					
//				}
//			},
//        }
//    });
//
//});
    
function isUsernameValid(value)
{
  var fieldNum = /^[a-z0-9]+$/i;

  if ((value.match(fieldNum))) {
      return true
  }
  else
  {
      return false
  }

}
</script>
<?php $this->load->view('footer');?>
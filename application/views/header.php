<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>khidmat</title>
    <link href="<?php echo base_url('/front/css/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('/front/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('/front/fonts/axiforma/font.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('/front/css/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('front');?>/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('front');?>/js/plugins/jqueryui/jquery-ui.css">
    
    <link href="<?php echo base_url('/front/css/style.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('/front/css/custom.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('/front/css/responsive.css');?>" rel="stylesheet">
    
    <script src="<?php echo base_url('front');?>/js/jquery.min.js"></script>
    <script src="<?php echo base_url('front');?>/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('front');?>/js/plugins/jqueryui/jquery-ui.js"></script>
	<script>
	$( function() {
		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 75, 300 ],
			slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			}
		});
		$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			" - $" + $( "#slider-range" ).slider( "values", 1 ) );
	} );
	</script>

	<script src="<?php echo base_url('front');?>/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
   
</head>
<body>
    <!-- header Start -->
    <header class="main_header user_header">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-xs-12">
                    <div class="site_logo">
                        <a href="<?php echo site_url();?>"><img src="<?php echo base_url('front');?>/images/logo.png"></a>
                    </div>
                    <button type="button" class="navbar_toggle">
                      Menu  
                    </button>
                </div>
                <div class="col-md-9 col-xs-12">
                    <nav class="navigation_wrap pull-right">
                      <div class="navigation_menu">
                        <ul class="">
                            <?php 
                                $user_id = $this->session->userdata('user_id');
                                $userDetail = get_user($user_id); 
                            ?>
                            
                            <?php if($userDetail->user_type == '2'){ ?>
                                <li><a href="<?php echo site_url('user/vendor_services');?>">My Services </a></li>
                            <?php }else{ ?>
                                <li><a href="<?php echo site_url('catalog/1');?>">Services </a></li>
                            <?php } ?>

                            <li><a href="javascript:void(0)">Help </a></li>
                            <li><a href="<?php echo site_url('blog');?>">blog</a></li>
                           
                            <?php if($user_id){ ?>
                                    <li class="icon">
                                        <a href="<?php echo site_url('chat');?>">
                                          <img src="<?php echo base_url('front/'); ?>images/message.png">
                                          <span class="badge-1">10</span>
                                        </a>
                                    </li>
                                    <li class="icon">
                                        <a href="javascript:void(0)">
                                          <img src="<?php echo base_url('front/'); ?>images/notification.png">
                                          <span class="badge-1">10</span>
                                        </a>
                                         <ul class="submenu noti_submenu">
                                            <div class="noti_menu_text">
                                                Notification(10)
                                            </div>
                                            <li>
                                                <a href="javascript:void(0)">
                                                 <span class="noti_icon">
                                                     <i class="fas fa-shopping-cart"></i>
                                                 </span>
                                                 <div class="menu_noti_txt">
                                                     <h5>Your order is placed</h5>
                                                     <p>Dummy text of the printing and</p>
                                                 </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                 <span class="noti_icon">
                                                     <i class="far fa-comment-alt"></i>
                                                 </span>
                                                 <div class="menu_noti_txt">
                                                     <h5>New Message received</h5>
                                                     <p>Dummy text of the printing and</p>
                                                 </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                 <span class="noti_icon">
                                                     <i class="fas fa-cart-arrow-down"></i>
                                                 </span>
                                                 <div class="menu_noti_txt">
                                                     <h5>Your Item is Shipped</h5>
                                                     <p>Dummy text of the printing and</p>
                                                 </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                 <span class="noti_icon">
                                                     <i class="fas fa-shopping-cart"></i>
                                                 </span>
                                                 <div class="menu_noti_txt">
                                                     <h5>Your order is placed</h5>
                                                     <p>Dummy text of the printing and</p>
                                                 </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                 <span class="noti_icon">
                                                     <i class="far fa-comment-alt"></i>
                                                 </span>
                                                 <div class="menu_noti_txt">
                                                     <h5>New Message received</h5>
                                                     <p>Dummy text of the printing and</p>
                                                 </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)">
                                                 <span class="noti_icon">
                                                     <i class="fas fa-cart-arrow-down"></i>
                                                 </span>
                                                 <div class="menu_noti_txt">
                                                     <h5>Your Item is Shipped</h5>
                                                     <p>Dummy text of the printing and</p>
                                                 </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>


                                <?php if($userDetail->user_type == '2'){ ?>
                                    <li><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li>
                                <?php }else{ ?>
                                    
                                <?php } ?>

                                <!-- <li><a href="<?php echo site_url('dashboard');?>">Dashboard</a></li> -->
                                <li class="login-btn">
                                    <a href="javascript:void(0)">
                                        <span class="u_img">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6IMTq-efHer8sp1p23DxIw_NsFFUtc6ZI0vAexxMm0MPEsii-" class="img-fluid" alt="User Thumb">
                                        </span>
                                        <?php echo $userDetail->f_name; ?>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="<?php echo site_url('user/dashboard');?>">
                                                <i class="fas fa-clipboard-list"></i>
                                                My Listing
                                            </a>
                                        </li>
                                        
                                        <li>
                                            <a href="<?php echo site_url('user/profile');?>">
                                                <i class="fas fa-user"></i>
                                                My Account
                                            </a>
                                        </li>

                                        <li class="logout_btn">
                                            <a href="<?php echo site_url('user/logout');?>">
                                                <i class="fas fa-sign-out-alt"></i>
                                                logout
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            <?php } else { ?>

                                <li class="login-btn">
                                    <a href="<?php echo site_url('user');?>">
                                        <span class="u_img">
                                            <img src="https://cdn2.iconfinder.com/data/icons/weby-flat-vol-1/512/1_key-danger-hack-private-protect-security_issue-512.png" class="img-fluid" alt="User Thumb">
                                        </span>
                                        login / signup
                                    </a>
                                </li>

                            <?php } ?>

                        </ul>
                      </div><!--/.nav-collapse -->
                  </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header End -->
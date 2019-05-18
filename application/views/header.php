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
                            <li><a href="<?php echo site_url('catalog/1');?>">Services </a></li>
                            <li><a href="#">Help </a></li>
                            <li><a href="#">blog</a></li>
                            <!--<li><a href="#">become a professional</a></li>-->
                            <!--<li><a href="#"><i class="fa fa-map-marker"></i> select location</a></li>-->
                            <?php if($this->session->userdata('user_id')){ ?>
                                <li><a href="<?php echo site_url('user/dashboard');?>">My Listing</a></li>
                                <li><a href="<?php echo site_url('user/profile');?>">My Account</a></li>
                                <li class="login-btn"><a href="<?php echo site_url('user/logout');?>">logout</a></li>
                            <?php } else { ?>
                                <li class="login-btn"><a href="<?php echo site_url('user');?>">login / signup</a></li>
                            <?php } ?>
                        </ul>
                      </div><!--/.nav-collapse -->
                  </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header End -->
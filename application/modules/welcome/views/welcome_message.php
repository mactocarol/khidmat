<?php $this->load->view('header');?>
    <div class="banner_outer ">
        <div class="container">
            <div class="row">
                <h1 class="text-center text-capitalize">Ready to Live Smarter?</h1>
                <h3 class="text-center text-capitalize">Get instant access to reliable and affordable services</h3>
                <div class="form_outer">
                    <form class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="location_search">
                                    <input type="text" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Location"><i class="fa fa-location-arrow"></i></div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Search For A Services">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <h4 class="text-capitalize text-center">E.g. Salon at Home, Plumber, Wedding Photographer</h4>
            </div>
        </div>
    </div>
    <section class="service_outer text-center">
        <div class="container">
            <div class="title_bar">
                <h2>Our Trending Services</h2></div>
            <div class="row">
                <?php foreach($services as $row){?>
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <a href="<?php echo site_url('catalog/'.$row['id']);?>" class="service_box">
                            <span class="trending_services"><img src="<?php echo base_url('front');?>/images/icons/4.png"></span>
                            <h3><?=($row['title'])?$row['title']:''?></h3>
                        </a>
                    </div>
                <?php } ?>
                <!--<div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <a href="service.html" class="service_box">
                        <span class="trending_services"><img src="<?php echo base_url('front');?>/images/icons/2.png"></span>
                        <h3>pest control</h3>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <a href="service.html" class="service_box">
                        <span class="trending_services"><img src="<?php echo base_url('front');?>/images/icons/3.png"></span>
                        <h3>appliances</h3>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <a href="service.html" class="service_box">
                        <span class="trending_services"><img src="<?php echo base_url('front');?>/images/icons/4.png"></span>
                        <h3>electrical</h3>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <a href="service.html" class="service_box">
                        <span class="trending_services"><img src="<?php echo base_url('front');?>/images/icons/5.png"></span>
                        <h3>Weddings & Events</h3>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <a href="service.html" class="service_box">
                        <span class="trending_services"><img src="<?php echo base_url('front');?>/images/icons/6.png"></span>
                        <h3>vehicle care</h3>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <a href="service.html" class="service_box">
                        <span class="trending_services"><img src="<?php echo base_url('front');?>/images/icons/7.png"></span>
                        <h3>Beauty & Spa</h3>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <a href="service.html" class="service_box">
                        <span class="trending_services"><img src="<?php echo base_url('front');?>/images/icons/8.png"></span>
                        <h3>geyser services</h3>
                    </a>
                </div>
               <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <a href="service.html" class="service_box">
                        <span class="trending_services"><img src="<?php echo base_url('front');?>/images/icons/9.png"></span>
                        <h3>carpentry</h3>
                    </a>
                </div>
               <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <a href="service.html" class="service_box">
                        <span class="trending_services"><img src="<?php echo base_url('front');?>/images/icons/10.png"></span>
                        <h3>plumbing</h3>
                    </a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <a href="service.html" class="service_box">
                        <span class="trending_services"><img src="<?php echo base_url('front');?>/images/icons/11.png"></span>
                        <h3>painting</h3>
                    </a>
                </div>
               <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <a href="service.html" class="service_box">
                        <span class="trending_services"><img src="<?php echo base_url('front');?>/images/icons/12.png"></span>
                        <h3>View more</h3>
                    </a>
                </div>-->

            </div>
        </div>
    </section>

    <section class="pop_category_outer ">
        <div class="container">
            <div class="title_bar text-center">
                <h2>most popular categories</h2></div>
            <div class="row">

                <div class="col-md-3">
                    <a href="" class="pop_category_box">
                        <img src="<?php echo base_url('front');?>/images/service/ser1.jpg">
                        <h4 class="text-capitalize">private parties</h4>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="" class="pop_category_box">
                        <img src="<?php echo base_url('front');?>/images/service/ser2.jpg">
                        <h4 class="text-capitalize">live music</h4>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="" class="pop_category_box">
                        <img src="<?php echo base_url('front');?>/images/service/ser3.jpg">
                        <h4 class="text-capitalize">cuisine</h4>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="" class="pop_category_box">
                        <img src="<?php echo base_url('front');?>/images/service/ser4.jpg">
                        <h4 class="text-capitalize">coworking</h4>
                    </a>
                </div>

                <div class="col-md-3">
                    <a href="" class="pop_category_box">
                        <img src="<?php echo base_url('front');?>/images/service/ser5.jpg">
                        <h4 class="text-capitalize">catering</h4>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="" class="pop_category_box">
                        <img src="<?php echo base_url('front');?>/images/service/ser6.jpg">
                        <h4 class="text-capitalize">cafe</h4>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="" class="pop_category_box">
                        <img src="<?php echo base_url('front');?>/images/service/ser7.jpg">
                        <h4 class="text-capitalize">bars</h4>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="" class="pop_category_box">
                        <img src="<?php echo base_url('front');?>/images/service/ser8.jpg">
                        <h4 class="text-capitalize">art gallery</h4>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section class="services_carousal">
        <div class="container">
            <div class="row">
                <div class="title_bar">
                    <h2>suggest services</h2></div>

                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <a href="#"><img src="<?php echo base_url('front');?>/images/service/ser9.jpg" alt="Conference and Event"></a>
                        <h3><a href="#">Conference and Event</a></h3>
                    </div>
                    <div class="item">
                        <a href="#"><img src="<?php echo base_url('front');?>/images/service/ser10.jpg" alt="Gym - Fitness"></a>
                        <h3><a href="#">Gym - Fitness</a></h3>
                    </div>
                    <div class="item">
                        <a href="#"><img src="<?php echo base_url('front');?>/images/service/ser11.jpg" alt="Salon at home for Women"></a>
                        <h3><a href="#">Salon at home for Women</a></h3>
                    </div>
                    <div class="item">
                        <a href="#"><img src="<?php echo base_url('front');?>/images/service/ser12.jpg" alt="Pest Control"></a>
                        <h3><a href="#">Pest Control</a></h3>
                    </div>
                    <div class="item">
                        <a href="#"><img src="<?php echo base_url('front');?>/images/service/ser13.jpg" alt="Pre-Wedding Shoot"></a>
                        <h3><a href="#">Pre-Wedding Shoot</a></h3>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="services_carousal">
        <div class="container">
            <div class="row">
                <div class="title_bar">
                    <h2>wedding services</h2></div>

                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <a href="#"><img src="<?php echo base_url('front');?>/images/service/ser14.jpg" alt="Light Makeup & Hair"></a>
                        <h3><a href="#">Light Makeup & Hair</a></h3>
                    </div>
                    <div class="item">
                        <a href="#"><img src="<?php echo base_url('front');?>/images/service/ser15.jpg" alt="Wedding Photographer"></a>
                        <h3><a href="#">Wedding Photographer</a></h3>
                    </div>
                    <div class="item">
                        <a href="#"><img src="<?php echo base_url('front');?>/images/service/ser16.jpg" alt="Bridal Makeup Artist"></a>
                        <h3><a href="#">Bridal Makeup Artist</a></h3>
                    </div>
                    <div class="item">
                        <a href="#"><img src="<?php echo base_url('front');?>/images/service/ser17.jpg" alt="Pre-Wedding Shoot"></a>
                        <h3><a href="#">Pre-Wedding Shoot</a></h3>
                    </div>
                    <div class="item">
                        <a href="#"><img src="<?php echo base_url('front');?>/images/service/ser18.jpg" alt="Pest Control"></a>
                        <h3><a href="#">Pest Control</a></h3>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <section class="services_featured">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo base_url('front');?>/images/service/ser17.jpg">
                    <h3>Painting & Renovation Your Home ?</h3>
                    <p>Get inspiration and ideas from 1000+ projects on home renovation and design.</p>
                    <a href="#">Browse ideas <i class="fa fa-angle-right"></i></a>
                </div>
                <div class="col-md-4">
                    <img src="<?php echo base_url('front');?>/images/service/ser18.jpg">
                    <h3>Beauty & Spa</h3>
                    <p>Get inspiration and ideas from 1000+ projects on home renovation and design.</p>
                    <a href="#">Browse ideas <i class="fa fa-angle-right"></i></a>
                </div>
                <div class="col-md-4">
                    <img src="<?php echo base_url('front');?>/images/service/ser19.jpg">
                    <h3>Appliance Repair</h3>
                    <p>Get inspiration and ideas from 1000+ projects on home renovation and design.</p>
                    <a href="#">Browse ideas <i class="fa fa-angle-right"></i></a>
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
    
    <div id="location" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body text-center">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                    <div class="location-pin">
                        <div class='pin'></div>
                        <div class='pulse'></div>
                    </div>
                    <h2>Set Location to view services in your locality !</h2>
                    <p>Allow location access on the next step.</p>
                    <div class="button_panel">
                        <button class="btn btn-primary"> <img src="<?php echo base_url('front');?>/images/location-current.png"> use current location</button>
                        <button class="btn btn-default" data-toggle="modal" data-target="#map_location" id="manually">Enter manually</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <?php $this->load->view('footer'); ?>
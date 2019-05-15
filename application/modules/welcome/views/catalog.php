<?php $this->load->view('header'); ?>
        <!-- breadcrumb Start -->
    <section class="breadcrumb_outer breadcrumb_outer_new">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="text-capitalize">
                    <?php
                    $parent = get_parent($id);
                    print_r($parent);
                    ?>
                    </h2>
                </div>
                <div class="col-lg-6">
                     <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">custom services</li>
                      </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb End -->
    <div class="s_progress_bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="progress_steps">
                        <a href="#" class="prog_box active">
                            <span class="icon"><i class="fas fa-shopping-bag"></i></span>
                            <span class="icon_text">Your Need</span>
                        </a>
                        <a href="#" class="prog_box">
                            <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                            <span class="icon_text">Your Location</span>
                        </a>
                        <a href="#" class="prog_box">
                            <span class="icon"><i class="far fa-calendar-alt"></i></span>
                            <span class="icon_text">Schedule</span>
                        </a>
                        <a href="#" class="prog_box">
                            <span class="icon"><i class="fas fa-user"></i></span>
                            <span class="icon_text">select provider</span>
                        </a>
                         <a href="#" class="prog_box">
                            <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                            <span class="icon_text">Checkout</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service section Start -->
    <div class="service_page_wrapper">
        <div class="container">            
            <!-- Service tabs Start -->
            <div class="service_tabs">
                <div class="service_tabs_inner">
                    <ul class="s_tab_menu tab_menu">
                        <?php foreach($services as $key=>$value){?>
                            <li data-show="<?=($value['title'])?implode('-',explode(' ',$value['title'])):''?>" class="<?=($value['id']==$id)?'active':''?>">
                                <i class="fas fa-broom"></i><span class="tab_text"><?=($value['title'])?$value['title']:''?></span>
                            </li>
                        <?php } ?>
                        <!--<li data-show="cleaning">
                            <i class="fas fa-broom"></i><span class="tab_text">Cleaning</span>
                        </li>
                        <li data-show="pest_control" class="active">
                            <i class="fas fa-bug"></i><span class="tab_text">Pest Control</span>
                        </li>
                        <li data-show="appliances">
                            <i class="fas fa-tv"></i><span class="tab_text">Appliances</span>
                        </li>
                       <li data-show="electrical">
                            <i class="fas fa-plug"></i><span class="tab_text">Electrical</span>
                        </li>
                        <li data-show="wedding">
                            <i class="fas fa-ring"></i><span class="tab_text">Wedding & Events</span>
                        </li>
                        <li data-show="vehicle">
                            <i class="fas fa-tools"></i><span class="tab_text">Vehicle Care</span>
                        </li>
                        <li data-show="beauty_spa">
                            <i class="fas fa-spa"></i><span class="tab_text">Beauty & Spa</span>
                        </li>
                        <li data-show="geyser">
                            <i class="fas fa-wrench"></i><span class="tab_text">Geyser Services</span>
                        </li>
                        <li data-show="plumbing">
                            <i class="fas fa-shower"></i><span class="tab_text">Plumbing</span>
                        </li>
                        <li data-show="painting">
                            <i class="fas fa-paint-roller"></i><span class="tab_text">Painting</span>
                        </li>-->
                    </ul>
                </div>
            </div>
            <!-- Service tabs End -->
            <div class="service_tab_content">
                <?php foreach($services as $key=>$value){?>
                <div class="tab_content <?=($value['id']==$id)?'active':''?>" id="<?=($value['title'])?implode('-',explode(' ',$value['title'])):''?>">
                     <div class="tab_content_list">
                        <?php foreach($value['subcategory'] as $keyy=>$valuee){?>
                            <a href="<?php echo site_url('catalog/'.$value['id'].'/'.$valuee['id']);?>" class="cont_list_wrap hover">
                                <span class="icon"><i class="fas fa-bug"></i></span>
                                <div class="list_content">
                                    <span><?=($valuee['title'])?$valuee['title']:''?></span>
                                </div>
                            </a>
                        <?php } ?>
                        <!--<a href="service_cart.html" class="cont_list_wrap hover">
                            <span class="icon"><i class="fas fa-bug"></i></span>
                            <div class="list_content">
                                <span>Cockroach Control</span>
                            </div>
                        </a>
                        <a href="service_cart.html" class="cont_list_wrap hover">
                            <span class="icon"><i class="fas fa-bug"></i></span>
                            <div class="list_content">
                                <span>Mosquitoes Control</span>
                            </div>
                        </a>
                        <a href="service_cart.html" class="cont_list_wrap hover">
                            <span class="icon"><i class="fas fa-bug"></i></span>
                            <div class="list_content">
                                <span>Ant Control</span>
                            </div>
                        </a>
                        <a href="service_cart.html" class="cont_list_wrap hover">
                            <span class="icon"><i class="fas fa-bug"></i></span>
                            <div class="list_content">
                                <span>Rodent Control</span>
                            </div>
                        </a>
                        <a href="service_cart.html" class="cont_list_wrap hover">
                            <span class="icon"><i class="fas fa-bug"></i></span>
                            <div class="list_content">
                                <span>Termite Control</span>
                            </div>
                        </a>-->
                    </div>
                </div>
                <?php } ?>
                
                <!--<div class="tab_content active" id="pest_control">
                   <div class="tab_content_list">
                    	<a href="service_cart.html" class="cont_list_wrap hover">
                    		<span class="icon"><i class="fas fa-bug"></i></span>
                    		<div class="list_content">
                    			<span>Bed bug control</span>
                    		</div>
                    	</a>
                    	<a href="service_cart.html" class="cont_list_wrap hover">
                    		<span class="icon"><i class="fas fa-bug"></i></span>
                    		<div class="list_content">
                    			<span>Cockroach Control</span>
                    		</div>
                    	</a>
                    	<a href="service_cart.html" class="cont_list_wrap hover">
                    		<span class="icon"><i class="fas fa-bug"></i></span>
                    		<div class="list_content">
                    			<span>Mosquitoes Control</span>
                    		</div>
                    	</a>
                    	<a href="service_cart.html" class="cont_list_wrap hover">
                    		<span class="icon"><i class="fas fa-bug"></i></span>
                    		<div class="list_content">
                    			<span>Ant Control</span>
                    		</div>
                    	</a>
                		<a href="service_cart.html" class="cont_list_wrap hover">
                    		<span class="icon"><i class="fas fa-bug"></i></span>
                    		<div class="list_content">
                    			<span>Rodent Control</span>
                    		</div>
                    	</a>
                    	<a href="service_cart.html" class="cont_list_wrap hover">
                    		<span class="icon"><i class="fas fa-bug"></i></span>
                    		<div class="list_content">
                    			<span>Termite Control</span>
                    		</div>
                    	</a>
                    </div>
                </div>-->
                <!--<div class="tab_content" id="appliances">
                    <div class="tab_content_list">
                        <a href="service_cart.html" class="cont_list_wrap hover">
                            <span class="icon"><i class="fas fa-bug"></i></span>
                            <div class="list_content">
                                <span>Bed bug control</span>
                            </div>
                        </a>
                        <a href="service_cart.html" class="cont_list_wrap hover">
                            <span class="icon"><i class="fas fa-bug"></i></span>
                            <div class="list_content">
                                <span>Cockroach Control</span>
                            </div>
                        </a>
                        <a href="service_cart.html" class="cont_list_wrap hover">
                            <span class="icon"><i class="fas fa-bug"></i></span>
                            <div class="list_content">
                                <span>Mosquitoes Control</span>
                            </div>
                        </a>
                        <a href="service_cart.html" class="cont_list_wrap hover">
                            <span class="icon"><i class="fas fa-bug"></i></span>
                            <div class="list_content">
                                <span>Ant Control</span>
                            </div>
                        </a>
                        <a href="service_cart.html" class="cont_list_wrap hover">
                            <span class="icon"><i class="fas fa-bug"></i></span>
                            <div class="list_content">
                                <span>Rodent Control</span>
                            </div>
                        </a>
                        <a href="service_cart.html" class="cont_list_wrap hover">
                            <span class="icon"><i class="fas fa-bug"></i></span>
                            <div class="list_content">
                                <span>Termite Control</span>
                            </div> 
                        </a>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <!-- Service section End -->
    
   <?php $this->load->view('footer'); ?>
<?php $this->load->view('header'); ?>
       
        <!-- breadcrumb Start -->
    <section class="breadcrumb_outer breadcrumb_outer_new">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="text-capitalize">Payment</h4>
                </div>
                <div class="col-lg-6">
                     <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="<?=site_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">payment</li>
                      </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb End -->
    
    <div class="">
        <div class="container">
            <div class="col-md-12">
                <div class="servicename">
                    <p><strong>Service Name : </strong><?php echo ($this->session->userdata('services')) ? $this->session->userdata('services')->title : ''; ?></p>
                </div>
                <hr>
                <div class="service">
                <?php $service = ($this->session->userdata('service_cart')) ? $this->session->userdata('service_cart') : $this->session->userdata('service_cart1'); ?>
                <?php foreach($service as $key => $value){ ?>
                    <strong><?=$key?> : </strong><?=$value?><br>
                <?php } ?>
                <?php ?>
                </div>
                <hr>
                <div class="location">
                <p><strong>Location : </strong><?php echo ($this->session->userdata('location_cart')) ? ($this->session->userdata('location_cart')['location']) : '--'; ?></p>
                <p><strong>City : </strong><?php echo ($this->session->userdata('location_cart')) ? ($this->session->userdata('location_cart')['city']) : '--'; ?></p>
                </div>
                <hr>
                <div class="provider">
                <p><strong>Provider : </strong><?php echo ($vendor) ? ($vendor->f_name.' '.$vendor->l_name) : '--'; ?></p>
                <p><strong>Charge : </strong><?php echo ($vendor_services) ? ($vendor_services->charges).' AED' : '--'; ?></p>
                </div>
                <hr>
                <div class="Billing">
                <?php $billing = ($this->session->userdata('billing_cart')) ? $this->session->userdata('billing_cart') : ''; ?>
                <?php // print_r($_SESSION); ?>
                <?php if(!empty($billing)){ foreach($billing as $key => $value){ ?>
                    <strong><?=$key?> : </strong><?=$value?><br>
                <?php } }  ?>
                <?php ?>
                </div>
                <hr>
            </div>
            <div class="col-md-12">
                <form method="post" action="<?php echo site_url('payment');?>">
                <input type="hidden" name="payment_method" value="paypal">
                <button class="btn btn-primary">Pay</button>
                </form>
            </div>
        </div>        
    </div>    
    
 

<?php $this->load->view('footer'); ?>
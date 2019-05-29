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
                <?php //print_r($this->session->userdata('service_cart1'));?>
                <div class="service">
                <?php $service = ($this->session->userdata('service_cart')) ? $this->session->userdata('service_cart') : $this->session->userdata('service_cart1'); ?>
                <?php if($this->session->userdata('service_cart')){
                        foreach($this->session->userdata('service_cart') as $key => $value){ ?>
                            <strong><?=$key?> : </strong><?=implode(', ',$value)?><br>
                <?php } } ?>
                <?php
                if($this->session->userdata('service_cart1')){
                foreach($this->session->userdata('service_cart1') as $key=>$value){            
                    if($value['list'] != '_'){
                        if(!in_array($value['list'],$listt)){
                            $listt[] = $value['list'];
                            echo '<p><h4>'.implode(' ',explode('_',$value['list'])).'</h4></p>';
                        }            
                    }
                    
                    foreach($value as $keyy=>$row){
                        if($keyy != 'list'){
                            if($keyy == 'label'){                        
                                echo '<p><strong>'.ucwords(implode(' ',explode('_',$value['keylabel']))).'</strong> : '.$row.'</p>';
                            }
                            if($keyy == 'select'){                        
                                echo '<p><strong>'.ucwords(implode(' ',explode('_',$value['keyselect']))).'</strong> : '.$row.'</p>';
                            }
                            if($keyy == 'qty'){                        
                                echo '<p><strong>'.ucwords(implode(' ',explode('_',$value['keyqty']))).'</strong> : '.$row.'</p>';
                            }
                        }                
                    }
                }
                }
                ?>
                </div>
                <hr>
                <div class="location">
                <?php foreach($this->session->userdata('location_cart') as $keyyy => $row){ ?>
                <p><strong><?=$keyyy?> : </strong><?php echo $row; ?></p>
                <?php } ?>                                
                </div>
                
                <?php if($schedule = $this->session->userdata('schedule_cart')) {?>
                <hr>
                <div class="schedule">
                <p><strong>Schedule Time : </strong><?php echo ($schedule) ? $schedule['dateslots'].' '.$schedule['timeslots'] : '--'; ?></p>                
                </div>
                <?php } ?>
                
                <hr>
                <div class="provider">
                <p><strong>Provider : </strong><?php echo ($vendor) ? ($vendor->f_name.' '.$vendor->l_name) : '--'; ?></p>
                <p><strong>Charge : </strong><?php echo ($vendor_services) ? ($vendor_services->charges).' AED' : '--'; ?></p>
                </div>
                <hr>
                <div class="Billing">
                
                    <strong>Payment Method : </strong><?php print_r($this->session->userdata('payment_method')['payment_method'])?><br>
                
                </div>
                <hr>
            </div>
            <div class="col-md-12">
                <form method="post" action="<?php echo site_url('payment');?>">
                <input type="hidden" name="payment_method" value="<?php print_r($this->session->userdata('payment_method')['payment_method'])?>">
                <button class="btn btn-primary">Submit Order</button>
                </form>
            </div>
        </div>        
    </div>    
    
 

<?php $this->load->view('footer'); ?>
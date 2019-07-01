<?php $this->load->view('header');?>
<section class="breadcrumb_outer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="text-capitalize">Order Detail</h2>
            </div>
            <div class="col-lg-6">
                 <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                  </ol>
            </div>
        </div>
    </div>
</section>  
<section class="template2_outer">
  <div class="container">
      <div class="template2_in">

          <?php
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


          <div class="row">
              <div class="col-md-8">
                  <div class="template2_left">
                  <h2><?=($order['servicename'])?json_decode($order['servicename']):''?></h2>
                    <div class="section_box">
                        <div class="section_content">
                            <!-- <?php if($order['payment_status'] == 2){ ?>    
                            <img src="<?php echo base_url('front');?>/images/right.png">
                            <span>Accepted</span>
                            <?php } else { ?>
                            <span>Pending</span>
                            <?php } ?>  -->

                            <?php if($order['order_status'] == 2){ ?>    
                              <img src="<?php echo base_url('front');?>/images/right.png">
                              <span>Accepted</span>
                            <?php }elseif($order['order_status'] == 1){ ?>
                              <span style="color: orange;">Pending</span>
                            <?php }else{ ?> 
                              <img height="25" width="25" src="https://2.bp.blogspot.com/-SCbOaY9CwqU/WsJPsDgZbWI/AAAAAAAABqU/NiSJaXtY1tEdDYcyBFU8LNFAxfCWQNmcgCLcBGAs/s1600/wrong.png">
                              <span style="color: red;">Cancle</span>  
                            <?php } ?>    


                        </div>
                        <div class="section_content">
                          <i class="far fa-calendar-alt"></i>
                          <span><?=date('d M Y h:i:s',strtotime($order['created_at']))?></span>
                        </div>
                        <div class="section_content">
                          <i class="fas fa-map-marker-alt"></i>
                          <?php $location = json_decode($order['location']);?>
                          <span><?=($order['location'])? $location->house.', '.$location->street.', '.$location->location.' near '.$location->landmark:'--'?></span>
                        </div>
                        <div class="section_content">     
                          <i class="fas fa-wallet"></i>
                          <span>AED <?=($order['amount'])? $order['amount'] : '' ;?>(<?=($order['payment_type'])? $order['payment_type'] : '' ;?>)</span>
                        </div>
                        <div class="section_content">
                          <i class="fa fa-cog" aria-hidden="true"></i>
                          <span>Order No : <?=($order['order_id'])?($order['order_id']):''?></span>
                        </div>
                        
                        <?php $schedule = json_decode($order['schedule']); ?>
                        
                        <?php if($schedule != '' && $schedule != '1'){?>
                        <div class="section_content">
                          <i class="fa fa-cog" aria-hidden="true"></i>
                          <span>Schedule Time : <?=($schedule)?($schedule->dateslots.' '.$schedule->timeslots):''?></span>
                        </div>
                        <?php } ?>
                    
                        <div class="section_content">
                        <h4>Services</h4>    
                            <p>
                            <?php $service = json_decode($order['services']); ?>                            
                            <?php foreach($service as $key => $value){  //print_r($value); 
                                if(is_array($value)){
                                if(isset($value->label)){
                                    //print_r($value);
                                    if($value->list != '_'){
                                        if(!in_array($value->list,$listt)){
                                            $listt[] = $value->list;
                                            echo '<p><h4>'.implode(' ',explode('_',$value->list)).'</h4></p>';
                                        }            
                                    }
                                    
                                    foreach($value as $keyy=>$row){

                                        if($keyy != 'list'){
                                            if($keyy == 'label'){                        
                                                echo '<strong>'.ucwords(implode(' ',explode('_',$value->keylabel))).'</strong> : '.$row.'<br>';
                                            }
                                            if($keyy == 'select'){                        
                                                echo '<strong>'.ucwords(implode(' ',explode('_',$value->keyselect))).'</strong> : '.$row.'</br>';
                                            }
                                            if($keyy == 'qty'){                        
                                                echo '<strong>'.ucwords(implode(' ',explode('_',$value->keyqty))).'</strong> : '.$row.'</br>';
                                            }
                                        }                
                                    }
                                }else{ ?>
                                <strong><?=$key?> : </strong><?= implode(',',$value) ?><br>
                            <?php } } }?>
                            <?php ?>
                            </p>
                        </div>
                        
                        <!--<div class="section_content">
                        <h4>Billing Address</h4>    
                        <?php $billing = json_decode($order['billing']);
                        if(!empty($billing)){ ?>
                          <p>
                            <strong>Name : </strong><?=$billing->name?><br>
                            <strong>Email : </strong><?=$billing->email?><br>
                            <strong>Address : </strong><?=$billing->address?><br>
                            <strong>City : </strong><?=$billing->city?><br>
                            <strong>State : </strong><?=$billing->state?><br>
                            <strong>Zipcode : </strong><?=$billing->zipcode?><br>
                          </p>
                        <?php } else { ?>
                            <p>No Information Provided</p>
                        <?php } ?>
                        </div>-->

                        <div class="section_content">
                        <h4>Payment Method</h4>    
                          <p>
                            <strong><?php echo ($order['payment_method'] == 'stripe') ? 'credit / debit Card' : 'Cash'; ?></strong>
                          </p>
                        </div>

                        <div class="section_content">
                        <h4>Payment Status</h4>    
                          <p>
                            <strong style="color: <?php echo ($order['payment_status'] == 'pending') ? 'orange' : 'green'; ?>;" ><?php echo ($order['payment_status'] == 'pending') ? 'Pending' : 'Paid'; ?></strong>
                          </p>
                        </div>

                        <!--<div class="Request_btn button">
                          <button class="btn btn_start"><i class="fa fa-play" aria-hidden="true"></i><span>Start</span></button>
                          <span class="btn_or">OR</span>
                          <button class="btn btn_stop"><i class="fa fa-times" aria-hidden="true"></i><span>Cancel</span></button>
                        </div>-->

                        <?php 
                        
                        if($result->user_type == 2){
                          if($order['order_status'] != '2'){
                            ?>
                              <div class="Request_btn button">
                                <button onclick="changeStatus('2')" class="btn btn_start"><span>Accept</span></button>
                                
                                <?php if($order['order_status'] != 3){ ?>
                                <button onclick="changeStatus('3')" class="btn btn_stop"><i class="fa fa-times" aria-hidden="true"></i><span>Reject</span></button>
                                <?php } ?>

                              </div>
                            <?php
                          }else if($order['order_status'] == '2'){
                            if($order['payment_method'] != 'stripe'){
                              if($order['payment_status'] == 'pending'){
                                ?>
                                  <div class="Request_btn button">
                                    <button onclick="changePaymentStatus();" class="btn btn_start"><span>Payment Done</span></button>
                                  </div>
                                <?php
                              }
                            }
                          }
                        }
                       

                        
                        if($order['payment_method'] == 'stripe'){
                          if($order['order_status'] == '2'){
                            if($result->user_type == 1){
                              if($order['payment_status'] == 'pending'){
                                ?>
                                <div class="Request_btn button">
                                <a href="<?php echo site_url('stripe_pay/pay/'.base64_encode($order['order_id'])); ?>">
                                <button  class="btn btn_start">
                                <i class="fa fa-credit-card" aria-hidden="true"></i>
                                <span>Pay for start your work</span>
                                </button>
                                </a>
                                </div>
                                <?php
                              }else{
                                
                                if($order['review_status'] != 'sent'){
                              ?>
                                <div class="review_form_wrap">
                                  <div class="review_heading">
                                    Give us reviews
                                  </div>
                                  <div class="review_form">
                                    <form method="post" id="form" action="<?php echo site_url('user/reviewRating');?>">
                                      <div class="form_group">
                                        <label>Your Review</label>
                                        <div class="input_group">
                                        <textarea class="bg_blue_light" name="review_text" placeholder="Enter Your Comment"></textarea>
                                        </div>
                                      </div>
                                      <!-- ratings -->
                                      <input type="hidden" value="<?php echo $pageId; ?>" name="orderId">
                                      <div class="form_group">
                                        <label>Your Rating</label>
                                        <div class="input_group">
                                         <div class="radio_box">
                                          <label>
                                          <input type="radio" name="rating" value="5">
                                          <span class="r_check"></span>
                                          <span class="r_texts">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                          </span>
                                          </label>
                                          <label>
                                          <input type="radio" name="rating" value="4">
                                          <span class="r_check"></span>
                                          <span class="r_texts">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                          </span>
                                          </label>
                                          <label>
                                          <input type="radio" name="rating" value="3">
                                          <span class="r_check"></span>
                                          <span class="r_texts">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                          </span>
                                          </label>
                                          <label>
                                          <input type="radio" name="rating" value="2">
                                          <span class="r_check"></span>
                                          <span class="r_texts">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                          </span>
                                          </label>
                                          <label>
                                          <input type="radio" name="rating" value="1">
                                          <span class="r_check"></span>
                                          <span class="r_texts">
                                            <i class="fa fa-star"></i>
                                          </span>
                                          </label>
                                        </div>
                                        </div>
                                      </div>
                                      <!-- ratings -->
                                       <div class="form_group profile_btns">
                                        <input type="submit" name="review_submit" class="red_button review_sub_btn" value="Submit">
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                <?php
                              }
                              }
                            }
                          }
                        }
                        ?>


                    </div>
                  </div>
                </div>
              <div class="col-md-4">
                <div class="customer_detail">
                  

                  <?php
                  /*echo '<pre>';
                  print_r($result);
                  print_r($order);
                  die();*/

                  if($result->user_type == 1){
                    $vendor = get_user($order['vendor_id']);
                    $text = 'Service Provider Detail';
                  }else{
                    $vendor = get_user($order['user_id']);
                    $text = 'Request User Detail';
                  }

                  ?>
                  <h3><?php echo $text; ?></h3>
                  
                  <div class="buyer_detail_box template2_inr">
                    <img width="200" height="200" onerror="$(this).attr('src','https://dummyimage.com/200x200/ffffff/e12454?text=<?=($vendor->f_name); ?>')"  src="<?php echo base_url('upload/profile_image/').$vendor->image; ?>">
                    <h2><?=($vendor->f_name).' '.($vendor->l_name)?></h2>
                    <span><?=($vendor->country).', '.($vendor->city)?></span>
                    <span><i class="fa fa-phone" aria-hidden="true"></i><?=($vendor->phone)?></span>
                    <span><i class="fa fa-envelope" aria-hidden="true"></i><?=($vendor->email)?></span>                  
                    <a href="<?php echo base_url('chat/message/').base64_encode($vendor->id); ?>" type="button" class="btn btn_accepted"> Chat</a>
                  </div>

                  <div class="map_section">
                    <div id="map" style="width:100%; height:300px;"></div>
                  </div>
                </div>
              </div>

              </div>
            </div>
          </div>
</section>

<script type="text/javascript">
  function  changeStatus(status) {
    $.ajax({
      url: "<?php echo base_url('user/changeOrderStatus'); ?>",
      data : {
        status:status,
        id:"<?php echo $order['id']; ?>",
      },
      type:'POST',
      success: function(result){
        location.reload();
      }
    });
  }

  function changePaymentStatus(){
    $.ajax({
      url: "<?php echo base_url('user/changePaymentStatus'); ?>",
      data : {
        id:"<?php echo $order['id']; ?>",
      },
      type:'POST',
      success: function(result){
        //location.reload();
      }
    });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCCQzJ9DJLTRjrxLkRk6jaSrvcc5BfDtWM" type="text/javascript"></script>
<script type="text/javascript">
initialize(<?=$vendor->placeLat?>, <?=$vendor->placeLong?>);    
function initialize(lat, long) {    
    var latlng = new google.maps.LatLng(lat,long);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 10,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
	
	var marker = new google.maps.Marker({
        position: latlng,
        map: map        
      });    
	  
}

</script>

<?php $this->load->view('footer');?> 
<?php $this->load->view('header'); ?>
       
        <!-- breadcrumb Start -->
    <section class="breadcrumb_outer breadcrumb_outer_new">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="text-capitalize"><?php
                    $parent = get_parent($services->category_id);
                    print_r($parent);
                    ?> <br><br> <?=($services)?$services->title:''?></h4>
                </div>
                <div class="col-lg-6">
                     <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="<?=site_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?=($services)?$services->title:''?></li>
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
                        <a href="#" class="prog_box needs active">
                            <span class="icon"><i class="fas fa-shopping-bag"></i></span>
                            <span class="icon_text">Your Need</span>
                        </a>
                        <a href="#" class="prog_box location">
                            <span class="icon"><i class="fas fa-map-marker-alt"></i></span>
                            <span class="icon_text">Your Location</span>
                        </a>
                        <a href="#" class="prog_box schedule" style="display: none;">
                            <span class="icon"><i class="far fa-calendar-alt"></i></span>
                            <span class="icon_text">Schedule</span>
                        </a>
                        <a href="#" class="prog_box provider">
                            <span class="icon"><i class="fas fa-user"></i></span>
                            <span class="icon_text">select provider</span>
                        </a>
                         <a href="#" class="prog_box checkout">
                            <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                            <span class="icon_text">Checkout</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service section Start -->
    <div class="service_need_wrapper">
        <div class="container">
        	<div class="row">
            	<div class="col-md-7 tab">
                	<h1><?=($services)?$services->description:''?></h1>
                    <form id="form" method="post">
                        
                        <?php foreach($options as $row) { ?>
                            <?php //print_r(count($row)); ?>    
                            <?php foreach($row as $key => $value) { ?>
                                <?php if(count($row) == 1){?>
                                        <?php if($value['field_type'] == 'select-box'){?>
                                            <div class="form-group">
                                                <label><?=($value['field_key'])?$value['field_key']:''?></label>
                                                <select class="form-control" id="<?=($value['field_name'])?$value['field_name']:''?>" name="<?=($value['field_name'])?$value['field_name']:''?>" onclick="submit_form();">
                                                    <?php foreach(explode(',',$value['field_value']) as $res) { ?>                
                                                        <option><?=$res?></option>
                                                    <?php } ?>
                                                  </select>
                                            </div>                        
                                        <?php } ?>
                                        <?php if($value['field_type'] == 'input'){?>
                                            <div class="form-group">
                                                <label><?=($value['field_name'])?$value['field_name']:''?></label>
                                                <input class="form-control" id="<?=($value['field_name'])?$value['field_name']:''?>" name="<?=($value['field_key'])?$value['field_key']:''?>" value="" onclick="submit_form();">                                                    
                                            </div>                        
                                        <?php } ?>
                                        <?php if($value['field_type'] == 'radio'){?>
                                            <div class="form-group">
                                                <label><?=($value['field_key'])?$value['field_key']:''?></label>
                                                <div class="form-radio-option">
                                                    <?php foreach(explode(',',$value['field_value']) as $key => $res) { ?>
                                                    <div class="option1">
                                                     <input type="radio" id="<?=$res?>" name="<?=($value['field_name'])?$value['field_name']:''?>" value="<?=$res?>" <?=($key==0)?'checked':''?> onclick="submit_form();">
                                                        <label for="<?=$res?>"><i class="<?php echo explode(',',$value['field_icon'])[$key]; ?>"></i> <span><?=$res?></span></label>                                               
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>                        
                                        <?php } ?>
                                <?php }else{ ?>
                                        <?php if(count($row) == 2) { $col = 4; }?>
                                        <?php if(count($row) == 3) { $col = 3; }?>
                                        <h4><?php if($value['list_name']) { if($key == 0) { echo $value['list_name']; }  $l = implode('_',explode(' ',$value['list_name'])); }else{ $l = '_'; }?></h4>
                                        <?php if($value['field_type'] == 'label'){?>
                                            <input type="hidden" id="keylabel" name="keylabel" value="<?=($value['field_key'])?$value['field_key']:''?>">
                                            <div class="col-md-<?=$col?>">
                                            <div class="form-group">
                                                <label><small><?=($value['field_key'])?$value['field_key']:''?></small></label>                                                
                                                <?php $mm = count(explode(',',$value['field_value'])); ?>
                                                <?php foreach(explode(',',$value['field_value']) as $k=>$res) { ?>
                                                <div class="form-group">
                                                    <label class="form-control"><?=$res?></label>
                                                    <input id="label<?=$k.$l?>" name="<?=($value['field_name'])?$value['field_name'].$k:''?>" type="hidden" value="<?=$res?>">
                                                </div>    
                                                <?php  } ?>                                                
                                            </div>
                                            </div>
                                        <?php } ?>
                                        <?php if($value['field_type'] == 'select-box'){?>
                                            <input type="hidden" id="keyselect" name="keyselect" value="<?=($value['field_key'])?$value['field_key']:''?>">
                                            <div class="col-md-<?=$col?>">
                                            <label><small><?=($value['field_key'])?$value['field_key']:''?></small></label>
                                            <?php for($i=0;$i<$mm;$i++){?>
                                                <div class="form-group">                                                    
                                                    <select class="form-control" id="select<?=$i.$l?>" name="<?=($value['field_name'])?$value['field_name'].$i:''?>">
                                                        <?php foreach(explode(',',$value['field_value']) as $res) { ?>                
                                                            <option><?=$res?></option>
                                                        <?php } ?>
                                                      </select>
                                                </div>
                                            <?php } ?>    
                                            </div>
                                        <?php } ?>
                                        <?php if($value['field_type'] == 'qty'){?>
                                            <input type="hidden" id="keyqty" name="keyqty" value="<?=($value['field_key'])?$value['field_key']:''?>">
                                            <div class="col-md-<?=$col?>">
                                            <label><small><?=($value['field_key'])?$value['field_key']:''?></small></label>
                                            <?php for($i=0;$i<$mm;$i++){?>
                                                <div class="form-group">                                                    
                                                    <input class="form-control" value="1" id="qty<?=$i.$l?>" name="<?=($value['field_name'])?$value['field_name'].$i:''?>">                                                       
                                                </div>
                                            <?php } ?>    
                                            </div>
                                        <?php } ?>
                                        <?php if($value['field_type'] == 'qty'){?>
                                            <div class="col-md-<?=$col?>">
                                            <label><small><?=($value['field_key'])?$value['field_key']:''?></small></label>
                                            <?php for($i=0;$i<$mm;$i++){?>
                                                <div class="form-group">                                                    
                                                    <span class="form-control btn btn-primary" onclick="submit_form1(<?=$i?>,'<?=$l?>');"><?=($value['field_value'])?$value['field_value']:''?></span>                                                                                                        
                                                </div>
                                            <?php } ?>    
                                            </div>
                                        <?php } ?>
                                <?php } ?>
                                
                            <?php } ?>
                        <?php } ?>
                    	                        
                        
                        
                    </form>
                    <div class="col-md-12 form-group">
                    <p>We will send a trusted courier to collect your device from your location (home or office) and take it to be repaired in-store. We will bring the fixed device back to your location_This is your lowest cost option. </p>
                    </div>
                </div>
                <div class="col-md-5">
                	
                    <div class="basket_panel_outer">
                    	<h2>Your Basket</h2>
                        <div class="basket_panel_inner">
                        	<div class="basket_need_item">
                            	<div class="need_item_title row"><h3><?=($services)?$services->title:''?> <!--<i class="far fa-times-circle"></i>--></h3></div>
                                <div id="cart">
                                    Your Cart is Empty! Add Service Now
                                </div>
                                
                                <div id="location_cart">
                                    
                                </div>
                                
                                <div id="provider_cart">
                                    
                                </div>
                                
                                <!--<p>Types of services : Classic Manicure</p>
                                <p>Broken back cover, Broken Screen</p>
                                <div class="spinner_outer row">
                               <!--<span> Number Of Customer : </span>
                                     <div class="spinner_inner">
                                    <button class="btn btn-dark btn-sm" id="minus-btn"><i class="fa fa-minus"></i></button>
                                    <input type="text" id="qty_input" class="" value="1" min="1">
                                     <button class="btn btn-dark btn-sm" id="plus-btn"><i class="fa fa-plus"></i></button>
                                </div>--
                                </div>-->
                            </div>
                            
                            
                             
                           <!--<div class="total_panel">
                           	<div class="row">
                            	<strong>Total</strong>
                            	<span>$349.0</span>
                            </div>
                           </div>-->
                            <div class="continue_div">
                                <button class="red_button text-uppercase" id="continue" onclick="load_next_tab();">Continue <i class="fas fa-long-arrow-alt-right"></i></button>
                            </div>
                            <span class="error alert-danger" style="display: none">Please Select atleast one service</span>
                            <span class="error1 alert-danger" style="display: none">Please save your location</span>
                            <span class="error2 alert-danger" style="display: none">Please select any provider</span>
                            <span class="error3 alert-danger" style="display: none">Please save billing or shipping address</span>
                        </div>
                    </div>
                	
                </div>
            </div>
           
            
        </div>
    </div>
    <!-- Service section End -->
    
   
<script>
	$(document).ready(function(){
    $('#qty_input').prop('disabled', true);
    $('#plus-btn').click(function(){
    	$('#qty_input').val(parseInt($('#qty_input').val()) + 1 );
    	    });
        $('#minus-btn').click(function(){
    	$('#qty_input').val(parseInt($('#qty_input').val()) - 1 );
    	if ($('#qty_input').val() == 0) {
			$('#qty_input').val(1);
		}

    	    });
 });
</script>

<script>
    function submit_form(){
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('welcome/add_services');?>',
            data: $('#form').serialize(),
            success: function (response) {
              //alert('form was submitted');
              $('#cart').html(response);
            }
          });
    }
    
    function submit_form1(id,lab){
        var label = $('#label'+id+lab).val();
        var keylabel = $('#keylabel').val();
        var keyselect = $('#keyselect').val();
        var keyqty = $('#keyqty').val();
        var list = lab;
        //alert(keylabel);
        console.log({'label':label,'select':select,'qty':qty,'list':lab,'keylabel':keylabel,'keyselect':keyselect,'keyqty':keyqty});
        var select = $('#select'+id+lab).val();
        var qty = $('#qty'+id+lab).val();
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('welcome/add_services1');?>',
            data: {'label':label,'select':select,'qty':qty,'list':lab,'keylabel':keylabel,'keyselect':keyselect,'keyqty':keyqty},
            success: function (response) {
              //alert('form was submitted');
              $('#cart').html(response);
            }
          });
    }
    
    function save_location(){
        
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('welcome/save_location');?>',
            data: $('#locationform').serialize(),
            success: function (response) {
              console.log(response);
              $('#location_cart').html('<hr>'+response);
            }
          });
    }
    
    function select_provider(){
        
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('welcome/select_provider');?>',
            data: $('#providerform').serialize(),
            success: function (response) {
              console.log(response);
              $('#provider_cart').html('<hr>'+response);
            }
          });
    }
    
    function save_billing(){
        
        $.ajax({
            type: 'post',
            url: '<?php echo site_url('welcome/save_billing');?>',
            data: $('#billingform').serialize(),
            success: function (response) {
              console.log(response);
              //$('#location_cart').html('<hr>'+response);
            }
          });
    }
    
    
    function load_next_tab(){
        
        var nextpage = 'location';
        if($('#next_tab').val()){
          nextpage = $('#next_tab').val();  
        }
        //alert(nextpage);
        
        if(nextpage == 'finished'){
            var url = '<?php echo site_url('welcome/load_next_tab1/');?>';
        }else{
            var url = '<?php echo site_url('welcome/load_next_tab/');?>';
        }
        
        $.ajax({
            type: 'post',
            url: url,
            data: {'nextpage':nextpage},
            success: function (response) {
              console.log(response);
              if(response == 0){                
                if(nextpage == 'location'){
                    $('.error').show();
                }
                if(nextpage == 'provider'){
                    $('.error1').show();
                }
                if(nextpage == 'checkout'){
                    $('.error2').show();
                }
                if(nextpage == 'finish'){
                    $('.error3').show();
                }
              }else{
                
                    if(nextpage == 'location'){
                        $('.tab').html(response);
                        $('.error').hide();
                        $('.needs').removeClass('active');
                        $('.location').addClass('active');
                    }
                    if(nextpage == 'provider'){
                        $('.tab').html(response);
                        $('.error').hide();
                        $('.error1').hide();
                        $('.location').removeClass('active');
                        $('.provider').addClass('active');
                    }
                    if(nextpage == 'checkout'){
                        $('.tab').html(response);
                        $('.error1').hide();
                        $('.error2').hide();
                        $('.provider').removeClass('active');
                        $('.checkout').addClass('active');
                        $('#continue').hide();
                    }
                    if(nextpage == 'finished'){
                        window.location = "<?php echo site_url('welcome/checkout'); ?>";
                    }
              }
            }
          });
    }
</script>

<?php $this->load->view('footer'); ?>
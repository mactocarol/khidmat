<h1>Select the services provider</h1>
<form id="providerform" method="post" action="#">
        <div class="job-filter-result">
        <?php foreach($vendors as $row){ ?>    
        <div class="job-list">
            <div class="row">
                <div class="col-lg-2"><img src="<?php echo base_url('upload/profile_image/'.$row['image']);?>"></div>
                <div class="col-lg-5">
                    <div class="job-title-outer">
                    <h4><a href="#"><?=($row['f_name'])?$row['f_name'].' '.$row['l_name']:''?></a></h4>
                        
                    </div>
                    <p><span class="total-rate">4.5</span>
                        <img src="<?php echo base_url('front');?>/images/rating.png"></p>
                   
                </div>
                <div class="col-lg-5 text-right">
                    <div class="job-price">AED <?=($row['charges'])?$row['charges']:''?></div>
                  <p>All Prices include VAT</p>
                  <p>Minimum service order : AED <?=($row['charges'])?$row['charges']:''?></p>
                    
                </div>
                <input name="vndor" type="radio" onclick="select_provider();" value="<?=$row['id']?>">
            </div>
        </div>
        <?php } ?>
        <input type="hidden" value="checkout" id="next_tab">
    </div>
</form>
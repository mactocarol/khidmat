<div class="servicebox">
    <h1>Select the services provider</h1>
    <form id="providerform" method="post" action="javascript:void(0)">
        <div class="job-filter-result" style="overflow-y: scroll; height: 750px;">
            <?php foreach($vendors as $row){ ?>

                <label class="joblist_label">
                    <input name="vndor" type="radio" onclick="select_provider();" value="<?=$row['id']?>" <?php echo ($this->session->userdata('provider_cart') && $this->session->userdata('provider_cart')['vndor'] == $row['id']) ? 'checked' : ''?>>
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
                                <div class="job-price">
                                    <!-- AED <?= ($row['price']) ? $row['price'] : ''?></div>
                            <h5>All Prices include VAT</h5>
                            <h5>Minimum service order : AED <?= ($row['price']) ? $row['price'] : ''?></h5> -->

                                    AED PRICE FOR
                                    <h5>One Day : <?= ($row['price']) ? $row['price']->price : ''?></h5>
                                    <h5>One Week : <?= ($row['price']) ? $row['price']->weekPrice : ''?></h5>
                                    <h5>One Month : <?= ($row['price']) ? $row['price']->monthPrice : ''?></h5>
                                    <h5>One Year : <?= ($row['price']) ? $row['price']->yearPrice : ''?></h5>



                                </div>
                            </div>
                        </div>
                        <h5>All Prices include VAT</h5>
                    </div>
                </label>
                <?php } ?>
                <input type="hidden" value="checkout" id="next_tab">
        </div>
    </form>
</div>
<div id="loader" style="display:none;"><img src="https://media.theaustralian.com.au/fe/sop/wait.gif"></div>
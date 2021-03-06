<?php $this->load->view('header');?>
<section class="breadcrumb_outer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="text-capitalize">My Listing</h2>
            </div>
            <div class="col-lg-6">
                 <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Listing</li>
                  </ol>
            </div>
        </div>
    </div>
</section>  
<section class="body_btn">
    <div class="container">
  <button type="button" class="btn btn-custom">All(1)</button>
  <button type="button" class="btn btn-success-custom">Accepted(1)</button>
  <button type="button" class="btn btn-primary-custom">In progress(1)</button>
  <button type="button" class="btn btn-warning-custom">Pending(1)</button>
  <!--<button type="button" class="btn btn-danger-custom">Reject</button> -->    
    </div>
</section>

<section class="body_content">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ">
        <div class="custom_table">
               <div class="table_header">
                  <span>My Listing</span>
                  <!--<a href="#" type="button" class="btn btn-calender"><i class="fa fa-calendar" aria-hidden="true"></i>
                  Calender view</a>-->
                </div>
                <div class="table_section">
                    <table class="table table-customize">
                        <thead>
                            <tr>
                                <th>Order No.</th>
                                <th>Service Requested</th>
                                <th>Scheduled Date and Time</th>
                                <th>Request type</th>
                                <th>Status</th>
                                <th>Cost</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($orders)){?>
                            <?php foreach($orders as $row){?>
                            <tr>
                                <td><?=($row['order_id'])?($row['order_id']):''?></td>
                                <td><?php echo ($row['servicename'])?json_decode($row['servicename']):''?></td>
                                <td><?=($row['created_at'])?date('d M Y h:i:s',strtotime($row['created_at'])):''?></td>
                                <td>On-site</td>
                                <td>
                                    <?php if($row['payment_status'] == 1){?>
                                    <a href="#" type="button" class="btn btn_warning">Pending</a>
                                    <?php } ?>
                                    <?php if($row['payment_status'] == 2){?>
                                    <a href="#" type="button" class="btn btn_accepted"> Accepted</a>
                                    <?php } ?>
                                </td>
                                <td><?=($row['amount'])?($row['amount']):''?></td>
                                <td><a href="<?php echo site_url('user/orderDetail/'.base64_encode($row['order_id'])); ?>" type="button" class="btn btn_view"> view</a></td>
                            </tr>
                            <?php } } else { ?>
                            <tr>
                                <td colspan="7"><center>No Orders Yet.</center></td>                                
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
     </div>
    </div>
</section>
<?php $this->load->view('footer');?> 
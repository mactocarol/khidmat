<section class="profile_wrap">
    <div class="container">
        <?php include_once('side_bar.php'); ?>
        <div class="col-md-9">
            <div class="registration_wrap_inner">
                <?php if($this->session->flashdata('password_sucess') || $this->session->flashdata('sucess')) : ?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $this->session->flashdata('password_sucess'); ?><?php echo $this->session->flashdata('sucess'); ?><?php echo $this->session->flashdata('image') ?></strong> 
                    </div>
                <?php endif; ?>
                <?php if($this->session->flashdata('image')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong><?php echo $this->session->flashdata('image') ?></strong> 
                    </div>
                <?php endif; ?>
                <form id="profile_form" action="<?= base_url('myaccounts/change_profile');?>" method="post">
                    <table class="table-bordered positining ">
                        <tr style="text-align: center;">
                            <th >S.No.</td>
                            <th >Hotel</td>
                            <th >Order Id</td>
                            <th >Amount</td>
                            <th >Status</td>
                            <th >Action</td>
                        </tr>
                        <?php if(isset($results) && !empty($results)) {
                                $count=$this->uri->segment(3,0);
                                foreach($results as $row){ ?>
                        <tr>
                            
                            <td><?= ++$count; ?></td>
                            <td><?php echo isset($row['name'])  ? $row['name'] : ''; ?></td>
                            <td><?php echo isset($row['txn_id'])  ? $row['txn_id'] : ''; ?></td>
                            <td><?php echo isset($row['payment_amt'])  ? $row['currency_code'] .' '.$row['payment_amt'] : ''; ?></td>
                            <td><?php echo isset($row['status'])  ? $row['status'] : ''; ?></td>
                            <td><a href="<?php echo site_url(); ?>myaccounts/booking_detail/<?php echo $row['booking_id'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        </tr>
                        <?php  } }else{?>
                            <td colspan="6">No Orders Yet</td>
                        <?php } ?>
                    </table>
                    <?php foreach ($pagination as $link) {
                            echo "$link";
                            } ?>
                </form>
            </div>
        </div>
    </div>
</section>


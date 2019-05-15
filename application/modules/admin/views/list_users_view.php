<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List Users
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?=$title?></li>
      </ol>
    </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Main row -->
          <div class="row">            
            <section class="col-lg-7 connectedSortable">         
                <?php
                if($this->session->flashdata('item')) {
                    $items = $this->session->flashdata('item');
                    if($items->success){
                    ?>
                        <div class="alert alert-success" id="alert">
                                <strong>Success!</strong> <?php print_r($items->message); ?>
                        </div>
                    <?php
                    }else{
                    ?>
                        <div class="alert alert-danger" id="alert">
                                <strong>Error!</strong> <?php print_r($items->message); ?>
                        </div>
                    <?php
                    }
                }
                ?>
            </section>
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">                
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Users</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                      <th width="10%">Sr. No.</th>                        
                      <th>UserName</th>
                      <th>Email</th>
                      <th>Category</th>
                      <th>Membership</th>
                      <th>User Uploads</th>
                      <th>Status</th>
                      <th style="width:5px">Action</th>                  
                    </tr>
                    </thead>
                    <tbody>
                          
						  <?php if(isset($results)) {
                                $count = 0;                              
                                foreach($results as $row){ ?>
                            <tr>
                                <td><?= ++$count; ?></td>
                                <td>
                                    <?php echo isset($row['username']) ? $row['username'] : ''; ?>                                    
                                  </td>
                                <td>
                                    <?php echo isset($row['email']) ? $row['email'] : '';   ?>
                                </td>                               
                                <td>
                                    <?php echo isset($row['name']) ? $row['name'] : '';   ?>
                                </td>
                                <td>
                                    <?php print_r(get_membership($row['id'])->title);   ?><br>
                                    <small><u><a href="#" onclick="plan_modal(<?=$row['id']?>);" data-toggle="modal" data-target="#planModal">change</a></u></small>
                                </td>
                                <td>
                                    <small><u><a href="#" onclick="video_modal(<?=$row['id']?>);" data-toggle="modal" data-target="#videoModal">Videos</a></u></small>
                                    <small><u><a href="#" onclick="audio_modal(<?=$row['id']?>);" data-toggle="modal" data-target="#audioModal">Audios</a></u></small>
                                    <small><u><a href="#" onclick="picture_modal(<?=$row['id']?>);" data-toggle="modal" data-target="#pictureModal">Pictures</a></u></small>
                                    <small><u><a href="#" onclick="job_modal(<?=$row['id']?>);" data-toggle="modal" data-target="#jobModal">Jobs</a></u></small>
                                </td>
                                <td>
                                    <?php echo ($row['is_verified'] == 1) ? '<a href="'.site_url('admin/status/'.$row['is_verified'].'/'.$row['id']).'"><button class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button></a>' : '<a href="'.site_url('admin/status/'.$row['is_verified'].'/'.$row['id']).'"><button class="btn btn-danger"><i class="fa fa-close" aria-hidden="true"></i></button></a>';   ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>admin/edit_user/<?php echo $row['id'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="<?php echo base_url(); ?>admin/delete/<?php echo $row['id'];?>" onclick=" var c = confirm('Are you sure want to delete?'); if(!c) return false;"><i class="fa fa-close" aria-hidden="true"></i></a>&nbsp;&nbsp;                                    
                                </td>                                
                            </tr>                          
                    <?php  } }?>                      
                                                      
                    </tbody>
                  </table>
                 
              
                </div>
                <!-- /.box-body -->
              </div>
    
            </section>
            <!-- /.Left col -->
          </div>
          <!-- /.row (main row) -->
        
        </section>

    <!-- /.content -->
  </div>
  <!-- Modal -->
<div id="planModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User Membership</h4>
      </div>
      <div class="modal-body">
        <p>
            <form method="post" action="<?php echo site_url('admin/update_user_plan');?>">
                <div class="form-group">
                <label>Plan</label>
                <select name="plan" id="plan" class="form-control">
                    <option value="">Select Plan</option>
                    <?php if(!empty($plan)){
                            foreach($plan as $p){ ?>
                                <option value="<?=$p['id']?>"><?=$p['title']?></option>            
                    <?php   }
                    }
                    ?>                    
                </select>
                <input name="userid" type="hidden" id="userid" value="">
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Account Validity (till Date)</label>
                        <input type="text" placeholder="select account validity date" class="input-text form-control" id="datepicker1" name="account_valid" value="" required>
                        
                     </div>
                </div>
                <div class="box-footer">
                    <input type="submit" class="btn btn-primary" value="Update">                                
                 </div>
            </form>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- video Modal -->
<div id="videoModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: auto";>

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User Videos</h4>
      </div>
      <div class="modal-body">
        <p>
            <div id="video">
                
            </div>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- audio Modal -->
<div id="audioModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: auto";>

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User Audios</h4>
      </div>
      <div class="modal-body">
        <p>
            <div id="audio">
                
            </div>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- video Modal -->
<div id="pictureModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: auto";>

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User Pictures</h4>
      </div>
      <div class="modal-body">
        <p>
            <div id="picture">
                
            </div>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Job Modal -->
<div id="jobModal" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: auto";>

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">User Jobs</h4>
      </div>
      <div class="modal-body">
        <p>
            <div id="jobs">
                
            </div>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-------End ---->
<script>
    function plan_modal(id) {
        $(".modal-body #userid").val( id );
        $.ajax({
			url: "<?php echo site_url('admin/get_user_plan');?>",
			type: "POST",
			data: {"user_id":id},            
			success: function (data) {
                //console.log(data);
				$(".modal-body #plan").html( data );
			}
		});
 
   }
   
   function video_modal(id) {
        $(".modal-body #userid").val( id );
        $.ajax({
			url: "<?php echo site_url('admin/get_user_video');?>",
			type: "POST",
			data: {"user_id":id},            
			success: function (data) {
                //console.log(data);
				$(".modal-body #video").html( data );
			}
		});
 
   }
   
   function audio_modal(id) {
        $(".modal-body #userid").val( id );
        $.ajax({
			url: "<?php echo site_url('admin/get_user_audio');?>",
			type: "POST",
			data: {"user_id":id},            
			success: function (data) {
                //console.log(data);
				$(".modal-body #audio").html( data );
			}
		});
 
   }
   
   function picture_modal(id) {
        $(".modal-body #userid").val( id );
        $.ajax({
			url: "<?php echo site_url('admin/get_user_picture');?>",
			type: "POST",
			data: {"user_id":id},            
			success: function (data) {
                //console.log(data);
				$(".modal-body #picture").html( data );
			}
		});
 
   }
   function job_modal(id) {
        $(".modal-body #userid").val( id );
        $.ajax({
			url: "<?php echo site_url('admin/get_user_jobs');?>",
			type: "POST",
			data: {"user_id":id},            
			success: function (data) {
                //console.log(data);
				$(".modal-body #jobs").html( data );
			}
		});
 
   }
</script>

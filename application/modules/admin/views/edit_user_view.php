<?php $this->load->view('admin/includes/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit User
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
        <!-- Left col -->
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
        <section class="col-lg-12 connectedSortable">                
               <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Edit User</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form role="form" id="edit_investor_form" name="" method="post" action="<?php echo base_url().'admin/edit_user/'.$reslt->id; ?>" enctype="multipart/form-data">
                        <!-- text input -->
                        <section class="col-lg-12 connectedSortable">
                            <div class="form-group">
                                <label>First Name </label>
                                <input type="text" class="form-control" name="f_name" placeholder="First Name" value="<?php echo isset($reslt->f_name)? $reslt->f_name:'';?>">
                             </div>
                            <div class="form-group">
                                <label>Last Name </label>
                                <input type="text" class="form-control" name="l_name" placeholder="Last Name" value="<?php echo isset($reslt->l_name)? $reslt->l_name:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Username </label>
                                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo isset($reslt->username)? $reslt->username:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Email </label>
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo isset($reslt->email)? $reslt->email:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Contact</label>
                                <input type="text" class="form-control" name="contact" placeholder="Contact Number" value="<?php echo isset($reslt->contact)? $reslt->contact:'';?>">
                             </div>
                             <div class="form-group">
                                <label>User Profile Image </label>
                                <input type="file" class="form-control" name="profile_image" >
                                <img src="<?php echo base_url('upload/profile_image/thumb/'.$reslt->image);?>" width="100">
                             </div>
                             <div class="form-group">
                                <label>User Cover Image </label>
                                <input type="file" class="form-control" name="cover_image" >
                                <img src="<?php echo base_url('upload/cover_image/'.$reslt->cover_image);?>" width="200">
                             </div>
                             <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo isset($reslt->address)? $reslt->address:'';?>">
                             </div>
                             <div class="form-group">
                                <label>About Me</label>
                                <textarea class="form-control" name="about_me" rows='5' placeholder="About me" ><?php echo isset($reslt->about_me)? $reslt->about_me:'';?></textarea>
                             </div>
                             <div class="form-group">
                                <label>Category</label>                                
                                <?php $category = explode(',',$reslt->user_type);?>
                                <select  id="boot-multiselect-demo" name="category[]"  required multiple="multiple">                            
                                    <?php foreach($categories as $c):?>
                                    <option value="<?=$c['id']?>" <?php if($c['id'] == $category[0] || $c['id'] == $category[1] || $c['id'] == $category[2] || $c['id'] == $category[3] || $c['id'] == $category[4] || $c['id'] == $category[5] || $c['id'] == $category[6] || $c['id'] == $category[7] || $c['id'] == $category[8]) echo 'selected';?>><?=$c['name']?></option>
                                    <?php endforeach;?>
                                </select>
                             </div>                             
                             <div class="form-group">
                                <label>Gender</label><br>
                                Male <input type="radio"  name="gender" value="male" <?php if($reslt->gender == 'male') echo "checked";?>>
                                Female <input type="radio"  name="gender" value="female" <?php if($reslt->gender == 'female') echo "checked";?>>
                             </div>
                             <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="text" placeholder="Enter Your DOB" class="input-text form-control" id="datepicker" name="dob" value="<?php echo isset($reslt->dob)? $reslt->dob:'';?>">
                                
                             </div>
                             <div class="form-group">
                                <label>Company name (if any)</label>
                                <input type="text" class="form-control" name="companyname" placeholder=" Company name (if any)" value="<?php echo isset($reslt->companyname)? $reslt->companyname:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Company Logo (if any)</label>
                                <input type="file" class="form-control" name="companylogo" >
                                <img src="<?php echo base_url('upload/profile_image/logo/'.$reslt->companylogo);?>" width="100">
                             </div>
                             <div class="form-group">
                                <label>Designation</label>
                                <input type="text" class="form-control" name="designation" placeholder=" Your Current Designation (if any)" value="<?php echo isset($reslt->designation)? $reslt->designation:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Experience</label>
                                <input type="text" class="form-control" name="experience" placeholder="Your Experience" value="<?php echo isset($reslt->experience)? $reslt->experience:'';?>">
                             </div>
                             <div class="form-group">
                                <label>Password </label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="">
                             </div>
                             <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Confirm Password" value="">
                             </div>
                             
                             <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Update">                                
                             </div>
                        </section>
                        
                  </form>
                </div>
               </div>
        </section>
        <!-- /.Left col -->
   
    </div>

    </section>
    <!-- /.content -->
  </div>

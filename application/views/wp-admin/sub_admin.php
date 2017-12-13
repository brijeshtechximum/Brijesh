<!-- =============================================== -->
<?php $this->load->view('wp-admin/includes/header'); ?>
<!-- =============================================== -->

<!-- =============================================== -->
<?php $this->load->view('wp-admin/includes/left-menu'); ?>
<!-- =============================================== -->

	<?php $post_data = $this->session->flashdata('post_data'); ?>
  	
    <!-- Content Header (Page header) -->
    <section class="content-header">
	
      <h1>
        Sub Admin <?php  getToken(); ?>
       
      </h1>
    </section>
	
    <!-- Main content -->
    <section class="content">
	<div class="box-body ">
            <br>
        <?php if(empty($admin_list)){ ?>
            <div class="login-box-body login-box">
			 <?php echo $this->session->flashdata('error'); ?>
			
                <p class="login-box-msg" style="font-size: 20px;">Create Sub Admin</p>
                

                <form action="<?php echo base_url();?>wp-admin/sub_admin/add_sub_admin" method="post">
				 <div class="form-group has-feedback">
				 <?php echo form_error('name'); ?>
                    <input required type="text" name="name" value="<?php echo set_value('name'); ?>" class="form-control" placeholder="Name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
				 <?php echo form_error('email'); ?>
                    <input required type="email" name="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
				  <?php echo form_error('password'); ?>
                    <input required type="text" name="password"  class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
				  <?php  echo getTokenField(); ?>
				  
				   <div class="form-group has-feedback checkbox">
					
					 <div class="checkbox">
					 <?php echo form_error('generation'); ?>
					  <label><input type="checkbox" value="Generation" name="generation">Generation</label>
					</div>
					<div class="checkbox">
					<?php echo form_error('renewable'); ?>
					  <label><input type="checkbox" value="Renewable" name="renewable" >Renewable</label>
					</div>
					<div class="checkbox">
					<?php echo form_error('TD'); ?>
					  <label><input type="checkbox" value="T&amp;D" name="TD"> T&amp;D</label>
					</div>
					<div class="checkbox">
					<?php echo form_error('state_sector_generation'); ?>
					  <label><input type="checkbox" value="State Sector Generation" name="state_sector_generation"> State Sector Generation</label>
					</div>
						</div>
				  
                  <div class="row">
                    <div class="col-xs-8">
                      <div class="checkbox icheck">
                       <!-- <label>
                          <input type="checkbox"> Remember Me
                       </label> -->
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                      <center><button type="submit" class="btn btn-primary btn-block btn-flat" style="margin-left: -232px!important;">Save</button></center>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>


            </div>
			<?php }else{ ?>
			
			 <div class="login-box-body login-box">
			 <?php print_r( $this->session->flashdata('error')); ?>
			
                <p class="login-box-msg" style="font-size: 20px;">Edit Sub Admin</p><?php  getToken(); ?>
                

                <form action="<?php echo base_url();?>wp-admin/sub_admin/edit_sub_admin/<?php echo $admin_list['id'];?>" method="post">
				 <div class="form-group has-feedback">
				 <?php echo form_error('name'); ?>
                    <input  type="text" name="name" value="<?php echo $admin_list['username']; ?>" class="form-control" placeholder="Name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
				  <?php echo form_error('email'); ?>
                    <input required type="email" name="email" value="<?php echo $admin_list['email']; ?>" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
				  <?php echo form_error('password'); ?>
				 
                    <input required type="text" name="password" value="<?php echo base64_decode($admin_list['password']); ?>" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
				   <?php  echo getTokenField(); ?>
				   <div class="form-group has-feedback checkbox">
					<?php $forms = unserialize($admin_list['assign_form']); ?>
					 <div class="checkbox">
					 <?php echo form_error('generation'); ?>
					  <label><input type="checkbox" value="Generation" name="generation" <?php if(in_array("Generation",$forms)){ echo "checked"; } ?>>Generation</label>
					</div>
					<div class="checkbox">
					<?php echo form_error('renewable'); ?>
					  <label><input type="checkbox" value="Renewable" name="renewable" <?php if(in_array("Renewable",$forms)){ echo "checked"; } ?>>Renewable</label>
					</div>
					<div class="checkbox">
					<?php echo form_error('TD'); ?>
					  <label><input type="checkbox" value="T&amp;D" name="TD" <?php if(in_array("T&D",$forms)){ echo "checked"; } ?>> T&amp;D</label>
					</div>
					<div class="checkbox">
					<?php echo form_error('state_sector_generation'); ?>
					  <label><input type="checkbox" value="State Sector Generation" name="state_sector_generation" <?php if(in_array("State Sector Generation",$forms)){ echo "checked"; } ?> > State Sector Generation</label>
					</div>
						</div>
				  
                  <div class="row">
                    <div class="col-xs-8">
                      <div class="checkbox icheck">
                       <!-- <label>
                          <input type="checkbox"> Remember Me
                       </label> -->
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                      <center><button type="submit" class="btn btn-primary btn-block btn-flat" style="margin-left: -232px!important;">Update</button></center>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>


            </div>
			<?php } ?>
            
           </div>
    </section>
    <!-- /.content -->
  


<!-- =============================================== -->
<?php $this->load->view('wp-admin/includes/footer'); ?>
<!-- =============================================== -->
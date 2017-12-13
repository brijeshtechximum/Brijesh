<!-- =============================================== -->
<?php $this->load->view('wp-admin/includes/header'); ?>
<!-- =============================================== -->
<?php 
$user_detail=$this->session->userdata('login_session')['username'];
 ?>
<!-- =============================================== -->
<?php $this->load->view('wp-admin/includes/left-menu'); ?>
<!-- =============================================== -->

	<?php $post_data = $this->session->flashdata('post_data'); ?>
  	
  	
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
        <small>it all starts here</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-default">
        
        <form action="<?php echo base_url() ?>wp-admin/settings/change_new_password" method="post">
	        <div class="box-body">
				<div class="row">
						<?php if($this->session->flashdata('message_name')){ ?> 
      <div class="col-sm-12" style="margin-bottom: 20px;">
      	 <?php echo $this->session->flashdata('message_name'); ?>
      </div>
       <?php } ?>
	  <div class="col-sm-12">
       <div class="form-group">
        <label>Current Password</label>
        <input type="password" name="old_password" class="form-control" placeholder="Enter Current Password" required>
       </div>
      </div>
      
      <div class="col-sm-12">
       <div class="form-group">
        <label>New Password</label>
        <input type="password" name="newpassword" id="new_password" class="form-control" placeholder="Enter New Password" required>
       </div>
      </div>
	  
	  <div class="col-sm-12">
       <div class="form-group">
        <label>Confirm New Password</label>
        <input type="password" name="re_password" id="new_password" class="form-control" placeholder="Enter New Password" required>
       </div>
      </div>
      
     
                   </div>
					<!-- /.row -->
			</div>
	        <!-- /.box-body -->
		<div class="box-footer">
	        	<button type="reset" class="btn btn-default">Cancel</button>
	        	<input type="hidden" name="username" value="<?php echo $user_detail ?>">
	        	<button type="submit" class="btn btn-danger pull-right">Change Password</button>
	      	</div>
      	</form>	        
      </div>

    </section>
    <!-- /.content -->
  


<!-- =============================================== -->
<?php $this->load->view('wp-admin/includes/footer'); ?>
<!-- =============================================== -->
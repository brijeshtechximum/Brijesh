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
        Settings
        <small>it all starts here</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-default">
        
        <form action="<?php echo base_url() ?>wp-admin/settings/change_settings/<?php echo $user_details['username'] ?>" method="post">
	        <div class="box-body">
				<div class="row">
						<?php if($this->session->flashdata('message_name')){ ?> 
      <div class="col-sm-12" style="margin-bottom: 20px;">
      	 <?php echo $this->session->flashdata('message_name'); ?>
      </div>
       <?php } ?>
      <div class="col-sm-12">
       <div class="form-group">
        <label>Username</label>
        <input type="text" name="admin" class="form-control" value="<?php echo $user_details['username'] ?>" disabled>
       </div>
      </div>
      
      <div class="col-sm-12">
       <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $user_details['email'] ?>" required>
       </div>
      </div>
      
                   </div>
					<!-- /.row -->
			</div>
	        <!-- /.box-body -->
		<div class="box-footer">
	        	<button type="reset" class="btn btn-default">Cancel</button>
	        	<button type="submit" class="btn btn-danger pull-right">Update</button>
	      	</div>
      	</form>	        
      </div>

    </section>
    <!-- /.content -->
  


<!-- =============================================== -->
<?php $this->load->view('wp-admin/includes/footer'); ?>
<!-- =============================================== -->
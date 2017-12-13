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
        Social
        <small>it all starts here</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-default">
        
        <form action="<?php echo base_url() ?>wp-admin/settings/updated_social" method="post">
	        <div class="box-body">
				<div class="row">
						<?php if($this->session->flashdata('message_name')){ ?> 
      <div class="col-sm-12" style="margin-bottom: 20px;">
      	 <?php echo $this->session->flashdata('message_name'); ?>
      </div>
       <?php } ?>
      <div class="col-sm-12">
       <div class="form-group">
        <label>Facebook</label>
        <input type="text" name="facebook" class="form-control" value="<?php echo $social_detail['facebook'] ?>" >
       </div>
      </div>
      
      <div class="col-sm-12">
       <div class="form-group">
        <label>Twitter</label>
        <input type="text" name="twitter" class="form-control" value="<?php echo $social_detail['twitter'] ?>" >
       </div>
      </div>
      
      <div class="col-sm-12">
       <div class="form-group">
        <label>Google-Plus</label>
        <input type="text" name="googleplus" class="form-control" value="<?php echo $social_detail['googleplus'] ?>" >
       </div>
      </div>
      
      <div class="col-sm-12">
       <div class="form-group">
        <label>LinkedIn</label>
        <input type="text" name="linkedin" class="form-control" value="<?php echo $social_detail['linkedin'] ?>" >
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
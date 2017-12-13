<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/form-navigation'); ?>
	<div class="container">
	  <div class="row">
	    <div class="col-md-12">
	    	<br >
	    	<?php echo sprintf($msg, $this->session->userdata('user')['name']);?>
	    </div>		<div class="col-md-12">			<?php 	$app_id =  $this->session->userdata('app_id');					$new_id = substr($app_id,4,2);										if($new_id == 'GN'){				?>			<a href="<?php echo base_url(); ?>wp-admin/users/form_gen/<?php print_r($app_id)?>" class="btn btn-success">	Print your application	</a>			<?php } if($new_id == 'RN'){ ?>						<a href="<?php echo base_url(); ?>wp-admin/users/form_ren/<?php print_r($app_id)?>" class="btn btn-success">	Print your application	</a>			<?php } if($new_id == 'ST'){ ?>						<a href="<?php echo base_url(); ?>wp-admin/users/form_ss/<?php print_r($app_id)?>" class="btn btn-success">	Print your application	</a>			<?php } if($new_id == 'SG'){ ?>						<a href="<?php echo base_url(); ?>wp-admin/users/form_ssgn/<?php print_r($app_id)?>" class="btn btn-success">	Print your application	</a>			<?php } ?>		</div>
	  </div>
	</div>
<?php $this->load->view('includes/footer'); ?>
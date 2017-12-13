<!-- =============================================== -->

<?php $this->load->view('wp-admin/includes/header'); ?>

<!-- =============================================== -->

<?php $this->load->view('wp-admin/includes/left-menu'); ?>

<!-- =============================================== -->

<!-- Content Header (Page header) -->

<section class="content-header">
  <h1> Admin List </h1>
</section>

<!-- Main content -->

<section class="content">
  <div class="box box-default">
    <div class="row">
      <?php if($this->session->flashdata('msg')){ ?>
      <div class="col-sm-12" style="margin-bottom: 20px;"> <?php echo $this->session->flashdata('msg'); ?> </div>
      <?php } ?>
    </div>
	<form method="POST" action="<?php echo base_url();?>wp-admin/sub_admin/assign/<?php echo $admin_id; ?>">
    <div class="box-body listing_data">
      <table id="" class="table table-bordered table-striped ">
        <thead>
          <tr>
			<th>Assing</th>
            <th>S.no</th>
            <th>Name</th>
            <th>Email</th>
			
			
            
            <!--<th>Action</th>----> 
            
          </tr>
        </thead>
        <tbody>
          <?php 
	
						

						$i=0;

						foreach($users as $item){

							$i++; 

						?>
          <tr>
			<td><input type="checkbox" name="user_form_id[]" value="<?php echo $item->id ?>"  <?php if(!empty($user_form_id)){ if(in_array($item->id,unserialize($user_form_id['user_form_id']))){ echo "checked"; } }?>></td>
            <td><?php echo $i ?></td>
            <td><?php echo $item->name ?></td>
            <td><?php echo $item->email ?></td>
			
			
          <!-- <td align="center"><a href="<?php echo base_url(); ?>wp-admin/sub_admin/form_list/<?php echo $item->id ?>" class="btn btn-success"><input type="checkbox"></a></td>-->
		  
            
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
	<div class="box-body listing_data">
	<input type="submit" class="btn btn-primary" value="save" style="float:right; ">
	</div>
	</form>
  </div>
</section>

<!-- /.content --> 

<!-- =============================================== -->

<?php $this->load->view('wp-admin/includes/footer'); ?>

<!-- =============================================== -->
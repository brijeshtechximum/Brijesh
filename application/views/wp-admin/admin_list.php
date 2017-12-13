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
      <?php if($this->session->flashdata('message_name')){ ?>
      <div class="col-sm-12" style="margin-bottom: 20px;"> <?php echo $this->session->flashdata('message_name'); ?> </div>
      <?php } ?>
    </div>
    <div class="box-body listing_data">
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
          <tr>
            <th>S.no</th>
            <th>Name</th>
            <th>Email</th>
			<th>Role</th>
			<th>Assing Forms</th>
			<th>Action</th>
            
            <!--<th>Action</th>----> 
            
          </tr>
        </thead>
        <tbody>
          <?php 

						

						$i=0;

						foreach($list as $item){

							$i++; 
							


						?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $item->username ?></td>
            <td><?php echo $item->email ?></td>
			
			<td><?php if($item->role == 1){ echo "Super Admin"; }else{ echo "Sub Admin"; } ?></td> 
			<td><?php  if(empty($item->assign_form)){echo "No Form Assing"; }else{$v = unserialize($item->assign_form); foreach($v as $b){print_r(htmlspecialchars($b)."&nbsp");} } ?></td></td>
		   <td align="center">   <a href="<?php echo base_url(); ?>wp-admin/sub_admin/admin_edit/<?php echo $item->id ?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>     <a href="<?php echo base_url(); ?>wp-admin/sub_admin/admin_delete/<?php echo $item->id ?>" class="btn btn-danger"><i class="fa fa-close"></i></a></td>
            
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- /.content --> 

<!-- =============================================== -->

<?php $this->load->view('wp-admin/includes/footer'); ?>

<!-- =============================================== -->
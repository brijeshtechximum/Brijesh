<!-- =============================================== -->

<?php $this->load->view('wp-admin/includes/header'); ?>

<!-- =============================================== -->

<?php $this->load->view('wp-admin/includes/left-menu'); ?>

<!-- =============================================== -->

<!-- Content Header (Page header) -->

<section class="content-header">
  <h1> Users <small>it all starts here</small> </h1>
</section>

<!-- Main content -->
<?php $assign_form = $this->session->userdata('login_session')['assign_form'];
$form= array();
$form_arr = unserialize($assign_form);
if(!empty($form_arr)){
$form = array_merge($form, $form_arr);
}
 ?>
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
			<?php if($this->session->userdata('login_session')['email'] == "admin" || in_array("Generation",$form)) {?>
            <th>Generation</th>
			<?php } if($this->session->userdata('login_session')['email'] == "admin" || in_array("Renewable",$form)) {?>
            <th>Renewal</th>
			<?php } if($this->session->userdata('login_session')['email'] == "admin" || in_array("T&D",$form)) {?>
            <th>T & D</th>
			<?php } if($this->session->userdata('login_session')['email'] == "admin" || in_array("State Sector Generation",$form)) {?>
			<th>State Sector Generation</th>
			<?php } ?>
            
            <!--<th>Action</th>----> 
            
          </tr>
        </thead>
        <tbody>
          <?php 

						

						$i=0;

						foreach($details as $item){

							$i++; 

						?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $item['name'] ?></td>
            <td><?php echo $item['email'] ?></td>
		<?php if($this->session->userdata('login_session')['email'] == "admin" || in_array("Generation",$form)) {?>
            <td><?php if($item['gid']){?>
              <a target="_blank" href="<?php echo base_url(); ?>wp-admin/users/form_gen/<?=$item['gid']?>" class="btn btn-info">
              <?=$item['gid']?>
              </a>
              <?php }else{ echo "Not Applied"; }?></td>
		<?php } ?>
		<?php if($this->session->userdata('login_session')['email'] == "admin" || in_array("Renewable",$form)) {?>
            <td><?php if($item['rid']){?>
              <a target="_blank" href="<?php echo base_url(); ?>wp-admin/users/form_ren/<?=$item['rid']?>" class="btn btn-info">
              <?=$item['rid']?>
              </a>
              <?php }else{ echo "Not Applied"; }?></td>
		<?php } ?>
		<?php if($this->session->userdata('login_session')['email'] == "admin" || in_array("T&D",$form)) {?>
            <td><?php if($item['sid']){?>
              <a target="_blank" href="<?php echo base_url(); ?>wp-admin/users/form_ss/<?=$item['sid']?>" class="btn btn-info">
              <?=$item['sid']?>
              </a>
              <?php }else{ echo "Not Applied"; }?></td>
		<?php } ?>	
		<?php if($this->session->userdata('login_session')['email'] == "admin" || in_array("State Sector Generation",$form)) {?>
			   <td><?php if($item['ssgid']){?>
              <a target="_blank" href="<?php echo base_url(); ?>wp-admin/users/form_ssgn/<?=$item['ssgid']?>" class="btn btn-info">
              <?=$item['ssgid']?>
              </a>
              <?php }else{ echo "Not Applied"; }?></td>
		<?php } ?>
            
            <!--<td align="center"><a href="<?php echo base_url(); ?>wp-admin/enquiry/delete/<?php echo $item['id'] ?>" class="btn btn-danger"><i class="fa fa-close"></i></a></td>--> 
            
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
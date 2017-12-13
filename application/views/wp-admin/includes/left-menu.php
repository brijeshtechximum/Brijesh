<!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>resources/Bilingual_REC_Logo.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>RECL</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        
        <li>
          <a href="<?php echo base_url(); ?>wp-admin/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url(); ?>wp-admin/users">
            <i class="fa fa-user"></i> <span>Users</span>
          </a>
        </li>	
	<?php if($this->session->userdata('login_session')['role'] == 1) { ?>		
		<li>         
			<a href="#">     
				<i class="fa fa-users"></i> <span>Create Sub Admin </span>  
				<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				</span>				
			</a>    
			<ul class="treeview-menu">
				<li><a href="<?php echo base_url(); ?>wp-admin/sub_admin"><i class="fa fa-circle-o"></i> Add</a></li>
				<li><a href="<?php echo base_url(); ?>wp-admin/sub_admin/admin_list"><i class="fa fa-circle-o"></i>List</a></li>
				<!--<li><a href="<?php echo base_url(); ?>wp-admin/sub_admin/assign_to"><i class="fa fa-circle-o"></i>Assign To</a></li>-->
			</ul>
		</li>
		<?php } ?>
        <!-- <li class="treeview">
		
          <a href="#">
            <i class="fa fa-cog"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>wp-admin/settings/social"><i class="fa fa-circle-o"></i> Social</a></li>
            <li><a href="<?php echo base_url(); ?>wp-admin/settings/change_password"><i class="fa fa-circle-o"></i> Change Password</a></li>
            <li><a href="<?php echo base_url(); ?>wp-admin/settings"><i class="fa fa-circle-o"></i>Settings</a></li>
            <li><a href="<?php echo base_url(); ?>wp-admin/login/logout"><i class="fa fa-power-off"></i>Sign Out</a></li>
          </ul>
        </li>
       -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<div class="row">
  		<br />
  		<div class="col-sm-12" style="padding: 0px 30px;">
		  	<?php 
				$status = $this->session->flashdata('status');
				$status_s = $status['status'];
				$status_m = $status['message'];
				
				$form_validation = $this->session->flashdata('form_validation');
			?>
			
			<?php if($status_s=='success'){ ?>
			<div class="alert alert-success alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-check"></i> Congrats</h4>
	            <?php echo $status_m; ?>
          	</div>
			<?php } ?>
			
			<?php if($status_s=="error"){ ?>
			<div class="alert alert-danger alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-ban"></i> Error</h4>
	            <?php echo $status_m; ?>
          	</div>
			<?php } ?>
			
			<?php if(!empty($form_validation)){ ?>
			<div class="alert alert-danger alert-dismissible">
	            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            <h4><i class="icon fa fa-ban"></i> Error</h4>
	            <p><?php echo $form_validation; ?></p>
	      	</div>
			<?php } ?>
		</div>		
  	</div>
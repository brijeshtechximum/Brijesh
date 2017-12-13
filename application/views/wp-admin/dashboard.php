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
        Dashboard
        <small>it all starts here</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
         <a href="<?php echo base_url(); ?>wp-admin/users"> <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <h2 class="info-box-number" style="    font-size: 16px;color:#000">Users</h2>
              
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
       <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="<?php echo base_url(); ?>wp-admin/settings/change_password"> <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-database"></i></span>

            <div class="info-box-content">
              <h2 class="info-box-number" style="    font-size: 16px;color:#000">Change Password</h2>
            </div>
            <!-- /.info-box-content -->
          <!-- </div></a>
          <!-- /.info-box -->
        <!--</div>
        <!-- /.col -->

        <!-- fix for small devices only 
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="<?php echo base_url(); ?>wp-admin/settings"> <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-cog"></i></span>

            <div class="info-box-content">
              <h2 class="info-box-number" style="    font-size: 16px;color:#000">Settings</h2>
            </div>-->
            <!-- /.info-box-content 
          </div></a>-->
          <!-- /.info-box 
        </div>-->
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <a href="<?php echo base_url(); ?>wp-admin/login/logout"> <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-power-off"></i></span>

            <div class="info-box-content">
              <h2 class="info-box-number" style="    font-size: 16px;color:#000">Sign Out</h2>
            </div>
            <!-- /.info-box-content -->
          </div></a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->      </div>     		

    </section>
    <!-- /.content -->
  


<!-- =============================================== -->
<?php $this->load->view('wp-admin/includes/footer'); ?>
<!-- =============================================== -->
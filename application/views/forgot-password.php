<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/form-navigation'); ?>

  <section class="loginform">

    <div class="container">
<style>
body{background-image: url(http://www.recindia.nic.in/images/languagePageBg.jpg);
        background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;}
</style>
      <div class="row">

        <div class="col-md-6 col-md-offset-3">
          <div class="form">
          <form class="" action="<?php echo $action;?>" method="<?php echo $action_method;?>">

          <div class="loginheading">

          <h3>FORGOT PASSWORD</h3>

          </div>

            <div class="form-group col-md-12">

              <?php echo $this->session->flashdata('success'); ?>

              

              <input type="text" class="form-control" name="email" placeholder="EMAIL ID" value="<?php echo set_value('email');?>">

              <?php echo form_error('email');?>

            </div>

            <div class="col-md-12">

              <button type="submit" class="btn btnwide btn-warning">RESET PASSWORD</button>

            </div>
              
              <div class="col-md-12 col-sm-12 text-right forgotlink">

            <a href="<?php echo base_url(); ?>">Login</a>

            </div>

            

          </form>
           </div>
        </div>

      </div>

    </div>

  </section>

<?php $this->load->view('includes/footer'); ?>
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

          <h3>SIGN UP</h3>

          </div>

            <div class="form-group col-md-12">

              <input name="name" type="text" class="form-control" placeholder="NAME" value="<?php echo set_value('name');?>">

              <?php echo form_error('name');?>

            </div>

            <div class="form-group col-md-12">

              <input name="email" type="text" class="form-control" placeholder="EMAIL ID" value="<?php echo set_value('email');?>">

              <?php echo form_error('email');?>

            </div>

            <div class="form-group col-md-12">

              <input name="password" type="password" class="form-control" placeholder="PASSWORD" value="<?php echo set_value('password');?>">

              <?php echo form_error('password');?>

            </div>

            <div class="form-group col-md-12">

              <input name="passconf" type="password" class="form-control" placeholder="CONFIRM PASSWORD" value="<?php echo set_value('passconf');?>">

              <?php echo form_error('passconf');?>

            </div>

            <div class="col-md-12">

              <button type="submit" class="btn btnwide btn-warning">SIGN UP</button>

            </div>

            <div class="col-md-12 col-sm-6 text-right forgotlink">

            Already Have Acount? <a href="<?php echo base_url();?>">Login</a>

            </div>

          </form>
         </div>
        </div>

      </div>

    </div>

  </section>

  <?php 

  $form_validation = $this->session->flashdata('form_validation');

        if(!empty($form_validation)){ 

            echo "test".$form_validation;

		}

  ?>

<?php $this->load->view('includes/footer'); ?>
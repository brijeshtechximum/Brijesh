<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/form-navigation'); ?>
  <section class="loginform">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form class="loan-form ovrauto" action="<?php echo $action;?>" method="<?php echo $action_method;?>">
          <div class="loginheading">
          <h3>RESET PASSWORD</h3>
          </div>
            <div class="form-group col-md-12">
              <?php echo $this->session->flashdata('success'); ?>
              <label>New Password</label>
              <input type="password" class="form-control" name="password" value="<?php echo set_value('password');?>">
              <?php echo form_error('password');?>
            </div>
            
            <div class="form-group col-md-12">
              <label>Confirm Password</label>
              <input type="password" class="form-control" name="passconf" value="<?php echo set_value('passconf');?>">
              <?php echo form_error('passconf');?>
            </div>
            
            <div class="col-md-12">
              <button type="submit" class="btn btnwide btn-primary">RESET PASSWORD</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </section>
<?php $this->load->view('includes/footer'); ?>
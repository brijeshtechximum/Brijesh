<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/form-navigation'); ?>

  <section class="loginform">

    <div class="container">
<style>
body{background-image: url(http://www.recindia.nic.in/images/languagePageBg.jpg);
        background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;}
	
	.capbox {
	background-color: #ffffff;
	
	border-width: 0px 12px 0px 0px;
	display: inline-block;
	*display: inline;
	zoom: 1; /* FOR IE7-8 */
	padding: 8px 8px 8px 8px;
    width:100%;
	position: relative;
	    margin-bottom: 5px;
}
.capbox-inner {
    font: bold 14px arial, sans-serif;
    color: #cdcdcd;
    background-color: #ffffff;
    margin: 0px 10px 0px 150px;
    padding: 3px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
}
.CaptchaDiv {
    font: bold 17px verdana, arial, sans-serif;
    font-style: italic;
    color: #ffffff;
    background-color: #005bab;
    padding: 4px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 0;
    position: absolute;
    height: 100%;
    top: 0;
    left: 0;
    padding: 5px 30px;
    line-height: 40px;
    font-size: 22px;
}
#CaptchaInput {
	margin: 1px 0px 1px 0px;
	width: 100%;
}
.capbox-inner input {
    width: 100%;
    border: 0;
    font-size: 16px;
    color: #000000;
    margin-top: 8px;
}
.capbox-inner input:focus{
	outline:none;
	border:0;
	outline-offset:0;
}
</style>
      <div class="row">

        <div class="col-md-6 col-md-offset-3">

         <div class="form">

          <form class="" action="<?php echo $action;?>" method="<?php echo $action_method;?>">

          <div class="loginheading">

          <h3>LOG IN</h3>

          </div>

          <?php echo $this->session->flashdata('success');?>

            <div class="form-group col-md-12">

              <input name="email" type="text" class="form-control" placeholder="EMAIL ID" value="<?php echo set_value('email')?>">

              <?php echo form_error('email');?>

            </div>

            <div class="form-group col-md-12">

              <input name="password" type="password" class="form-control" placeholder="PASSWORD" value="<?php echo set_value('password')?>">

              <?php echo form_error('password');?>

            </div>
			<div class="form-group col-md-12">
			
			<div class="capbox">
				<div id="" class="CaptchaDiv"><?php print_r($this->session->userdata('captcha')); ?></div>
				<div class="capbox-inner"> 
				<input type="text" name="captcha"  size="15" id="CaptchaInput"  Placeholder="Captcha">
		 
		</div> 
		</div>
		<?php echo $this->session->flashdata('cap'); ?>
		</div>
		

            <div class="col-md-12">

              <button type="submit" class="btn btnwide btn-warning">LOGIN</button>

            </div>
			
			

            <div class="col-md-6 col-sm-6 text-left forgotlink">

            <a href="<?php echo base_url();?>signup">Create New Account</a>

            </div>

            <div class="col-md-6 col-sm-6 text-right forgotlink">

            <a href="<?php echo base_url();?>forgot-password">Forgot Password?</a>

            </div>
			

          </form>
          
          </div>

        </div>

      </div>

    </div>

  </section>

<?php $this->load->view('includes/footer'); ?>
<script>
    $(document).ready(function(){
        $('form').submit(function(){
            var CaptchaDiv = $.trim($('.CaptchaDiv').text());
            var CaptchaInput = $.trim($('#CaptchaInput').val());
            if(CaptchaDiv == CaptchaInput){
                return true;
            }else{
            alert('Please Enter Valid Captcha');
                return false;
            }

        });
    });	
</script>
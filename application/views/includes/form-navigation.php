	<header>
  <div class="form-head">
    <div class="container">
      
      <div class="row text-center">	
        <div class="loginul">
          <ul>
            <?php //checking if user is logged in or not to set relative navigation menu's
            $user_logged_in = $this->session->userdata('user'); if (!$user_logged_in) { ?>
	            <li class="active" style="width: auto;">Apply Online Loan Application Form</li>
	            <!--<li><a href="<?php echo base_url();?>signup">Sign up</a></li>-->
            <?php }else{ ?>
				<?php if($this->session->userdata('form_id')) { ?><li class="" style="width: auto;"><a href="<?php echo base_url();?>form1">Home</a></li><?php } ?>
            	<li class="active" style="width: auto;"><a href="<?php echo base_url();?>form1/apply_new">Apply New</a></li>
				<li class="" style="width: auto;"><a href="<?php echo base_url();?>forms-list">Hi <?php echo $this->session->userdata('user')['name']; ?></a></li>
	            <li><a href="<?php echo base_url();?>logout">Logout</a></li>
            <?php }?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/form-navigation'); ?>
<style>
	body{background-image: url(http://www.recindia.nic.in/images/languagePageBg.jpg);
        background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;}
</style>	
  <section class="loginform">

    <div class="container">

      <div class="row">

        <div class="col-md-6 col-md-offset-3">

         <div class="form">

         

          <div class="loginheading">

          <h2 style="color: #faa831;" ><strong>Now You Are Blocked !</strong></h2>

          </div>
		  <hr>

        

            <div class="form-group col-md-12" style="text-align: center;">

            <span style="font-size: 2em; color: white; font-family: 'Century Gothic';"> This IP Address <u><?php echo $this->input->ip_address(); ?></u> is Blocked for 8 hours.</span>

            </div>

            <div class="form-group col-md-12">

              <span style="font-size: 1em; color: white; font-family: 'Century Gothic';"> You have tried many time with wrong credentials. Please Try after 8 hours<span>

            </div>
			
		

           
			
			

           
			

        
          
          </div>

        </div>

      </div>

    </div>

  </section>

<?php $this->load->view('includes/footer'); ?>

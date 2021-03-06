	<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/form-navigation'); ?>
 <section class="">
    <div class="container">
      <div class="row">
        <div class="col-md-12 generalcontain">
          <h3><u>General Notes:</u></h3>
          <ul class="geninstruction">
            
            
            <li>Information under this section is required in respect of <u><strong>each Core Promoter</strong></u> responsible for execution of Project. Core Promoter mean promoter:<br><br>
              <ul>
                <li>Having project management experience, and/or</li>
                <li>Having management control, and/or</li>
                <li>Having significant percentage (at least 26%) of equity amount.</li>
              </ul>
            </li>
            <li>Please also support the above with records and evidence as may be available to enable REC to form a considered opinion. Please indicate the names of Core Promoters based on the above criteria.</li>
            <li>Please provide information on separate sheet for <u><strong>each Core Promoter</strong></u> on the following points:-</li>
            
            </ul>
          <div class="clearfix"></div>
          <form action="index6.html">
            <div class="form-group">
              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="agree" value="agree" id="chky" checked />
                    Agreed to all Instructions and Ready to Fill Form </label>
                </div>
              </div>
            </div>
            <div class="col-md-12">
				<div class="pull-right"> 
				
				<button type="button" class="btn print  btn-primary">Print</button>
				<a href="<?php echo base_url();?>wp-admin/users/form2_next_step4/<?php echo $this->uri->segment('4');?>" class="agree btn btn-primary">Submit</a> 
			</div>
              <!--<div class="pull-right"> <button class="agree btn btn-primary"  id="chkybutton" disabled>Submit</button> </div>-->
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  
<?php $this->load->view('includes/footer'); ?>

<script>

	$(document).ready(function(){
		$('.print').click( function()
           {
            window.print();
           }
        );	
	});
	
  	<?php if($this->uri->segment(4)){
  		$sec_a_step =$this->uri->segment(4);
  	}else{ $sec_a_step = 'step1'; }?>
  	<?php if($this->uri->segment(3)=='section_a'){?>
  		$('.steps a').attr("disabled","disabled");
  		$('.steps a').attr("class","btn btn-circle btn-default");
  		$('.<?php echo $sec_a_step;?> a').attr("class","btn btn-circle btn-default btn-primary");
  		
  		<?php $stepshow = str_replace("step","", $sec_a_step); ?>
  		
  		$('#step-1').hide();
  		$('#step-2').hide();
  		$('#step-3').hide();
  		$('#step-<?php echo $stepshow;?>').show();
  		
  	<?php } ?>;
  	
  </script>
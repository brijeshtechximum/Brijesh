<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/form-navigation'); ?>

<div class="form-head">
  <div class="container">
    <div class="row text-center">
      <h3>Section B: Promoter/Entity Appraisal Information</h3>
      <h5>Part I</h5>
    </div>
  </div>
</div>
<main>
  <section class="">
    <div class="container">
	<div class="loan-form">
      <div class="row">
        <div class="col-md-12 generalcontain">
          <h3><u>General Notes:</u></h3>
          <ul class="geninstruction">
            <li>Any Company/Entity contributing equity into the proposed project is known as promoter in REC.</li>
            
            <li>Group Companies: The key criterion for a company to be considered as a group company of other are:
              <ul>
                <li>A company which, directly or indirectly, holds 10% (ten percent) or more of the share capital of the other company or</li>
                <li>A company in which the company, directly or indirectly, has the power to direct or cause to be directed the management and policies of such company whether through the ownership of securities or agreement or any other arrangement or otherwise</li>
              </ul>
            </li>
            <li>Following information has to be given for each Company/Entity contributing equity into the proposed power project. In case the company contributing equity is a shell company or not putting in funds directly out of its own sources, information is also to be given for company actually bringing in/providing the equity funds.</li>
            <li>However if any company/entity is contributing 100% upfront equity, information is required only for points 1 to 24. Information in Part II will still be required in case the said entity is Core Promoter as per criteria specified therein.</li>
            <li>Please use separate form/sheet for each promoter bringing equity into the project</li>
            </ul>
          <div class="clearfix"></div>
          <form action="<?php echo base_url(); ?>form2/secform" method="post">
            <div class="form-group">
              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="agree" value="agree" id="chky">
                    Agreed to all Instructions and Ready to Fill Form </label>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="pull-right"> <button class="agree btn btn-primary" type="submit" id="chkybutton" disabled="">Submit</button> </div>
            </div>
          </form>
        </div>
      </div>
	  </div>
    </div>
  </section>
</main>

<?php $this->load->view('includes/footer'); ?>

<script>
$(document).ready(function(){
      $('#chky').click(function() {
        if ($(this).is(':checked')) {
			$('#chkybutton').removeAttr('disabled');
        } else {
            $('#chkybutton').attr('disabled', 'disabled');
        }
    });
});
	
  	<?php if($this->uri->segment(4)){
  		$sec_a_step =$this->uri->segment(4);
  	}else{ $sec_a_step = 'step1'; }?>
  	
  		$('.steps a').attr("disabled","disabled");
  		$('.steps a').attr("class","btn btn-circle btn-default");
  		$('.<?php echo $sec_a_step;?> a').attr("class","btn btn-circle btn-default btn-primary");
  		
  		<?php $stepshow = str_replace("step","", $sec_a_step); ?>
  		
  		$('#step-1').hide();
  		$('#step-2').hide();
  		$('#step-3').hide();
  		$('#step-<?php echo $stepshow;?>').show();

  </script>
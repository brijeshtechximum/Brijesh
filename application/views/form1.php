<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/form-navigation'); ?>
<div class="form-head">
  <div class="container">
  
    <div class="row text-center">
    
      <h3>Loan Application</h3>
    </div>
  </div>
  </div>
<section class="main-form"> 
    <div class="container">
      <div class="row">
        <div class="mainselection">
          <div class="col-lg-12 col-md-12">
            <h2>Select Your Form Type</h2>
            <div class="keyproject">
              <div class="checkkey generation"><i class="fa fa-circle" aria-hidden="true"></i> GENERATION (PVT.)</div>
              <div class="checkkey renewal"><i class="fa fa-circle" aria-hidden="true"></i> RENEWABLE</div>
              <div class="checkkey statesector"><i class="fa fa-circle" aria-hidden="true"></i> T&D </div>
			  <div class="checkkey statesector1"><i class="fa fa-circle" aria-hidden="true"></i> STATE SECTOR - GENERATION </div>
            </div>
          </div>
        </div>
      </div>
    <div class="row">
        <div class="col-md-12 generalcontain hideinstruction">
          <h3 class="text-center"><u>Instructions:</u></h3>
          <ul class="geninstruction1">
            <li> <strong>Processing Fees in REC: </strong><br>
              <br>
              Non-refundable processing fee @ 0.1% of loan sanction amount subject to minimum of Rs.5 lakh and maximum of Rs.30 lakhs. Private Sector Borrower shall be required to pay 50% of the processing fee at the time of submission of loan application and the balance amount of processing fee shall be paid within 30 days from the date of intimation by REC for issue of sanction letter. This amount is exclusive of service tax/applicable taxes.
			  <br> <br>
			   <strong>Only .pdf and zip file can be uploaded: </strong><br>
              <br>
              In this form only one file can be uploaded at each upload option, In case of multiple attachments please make a zip of all the files then upload file. </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="generationthings">
      <div class="container">
        <div class="stepwizard">
          <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step gn_steps gn_step1"> <a href="#step-1" id="idSon" type="button" class="btn btn-primary btn-circle">1</a>
              <p>Step 1</p>
            </div>
            <div class="stepwizard-step gn_steps gn_step2"> <a href="#step-2" id="idSon1" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
              <p>Step 2</p>
            </div>
            <div class="stepwizard-step gn_steps gn_step3"> <a href="#step-3" id="idSon2" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
              <p>Step 3</p>
            </div>
            <div class="stepwizard-step gn_steps gn_step4"> <a href="#step-4" id="idSon3" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
              <p>Step 4</p>
            </div>
            <div class="stepwizard-step gn_steps gn_step5"> <a href="#step-5" id="idSon4" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
              <p>Step 5</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
         <div class="loan-form"> 
          	<div class="row setup-content" id="step-1">
		
          	<form role="form" action="<?php echo base_url(); ?>form1/process_generation_a" method="post" enctype="multipart/form-data">
            <div class="col-md-12 text-center">
              <h2 class="formheading">Generation Form</h2>
            </div>
			
            <div class="col-md-12">
              <div class="sub-part"> 
                  
                  <?php // pr($this->session->flashdata('step1')); ?>
                  
                <h4>A. Project Summary</h4>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_name]'])) { echo $this->session->flashdata('step1')['gn_a[project_name]']; } ?></span></div>
                  <label>1) Project Name</label>
                  <input required="" type="text" class="form-control" name="gn_a[project_name]" value="<?php echo $gn_a['project_name'];?>">
                </div>
				
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_type]'])) {echo $this->session->flashdata('step1')['gn_a[project_type]']; } ?></span></div>
                  <label>2) Project Type</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" name="gn_a[project_type]" value="Thermal" 
                      onClick="$('#dvGenprotyp').hide(); $('#dvGenprotyp123').removeAttr('required');" 
                      	<?php if($gn_a['project_type']=='Thermal'){ echo 'checked'; }; if(empty($gn_a['project_type'])){ echo 'checked'; } ?>  />
                      Thermal </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="gn_a[project_type]" value="Hydro"  onClick="$('#dvGenprotyp').hide();  $('#dvGenprotyp123').removeAttr('required');"
                      <?php if($gn_a['project_type']=='Hydro'){ echo 'checked'; };?>
                      />
                      Hydro </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="gn_a[project_type]" value="Nuclear" onClick=" $('#dvGenprotyp').hide(); $('#dvGenprotyp123').removeAttr('required'); "
                      <?php if($gn_a['project_type']=='Nuclear'){ echo 'checked'; };?>
                      />
                      Nuclear </label>
                    <label class="radio-inline">
                      <input required="" type="radio" id="chkGenprotyp" value="Other" name="gn_a[project_type]"  onClick="$('#dvGenprotyp').show(); $('#dvGenprotyp123').attr('required','');"
                      <?php if($gn_a['project_type']=='Other'){ echo 'checked'; };?>
                      />
                      Others </label>
                    <br>
                    <br>
                    
                    <?php if($gn_a['project_type']=="Other"){ $display = 'block'; $required = 'required'; }else{$display = 'none'; $required = '';}?>
                    
                    <div class="" id="dvGenprotyp" style="display: <?php echo $display;?>"> <span class="">
                      <input <?php echo $required; ?> id="dvGenprotyp123" type="text" class="form-control" name="gn_a[project_type_others]" value="<?php echo $gn_a['project_type_others'];?>">
                      </span> </div>
                  </div>
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_type]'])) {echo $this->session->flashdata('step1')['gn_a[project_capacity]']; }  ?></span></div>
                  <label>3) Capacity of each unit (In MW)</label>
                  <input required="" type='number' step='0.01' class="form-control project_mw_g" name="gn_a[project_capacity]" value="<?php echo $gn_a['project_capacity'];?>">
                </div>
				
				
				  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_unit]'])) {echo $this->session->flashdata('step1')['gn_a[project_unit]']; } ?></span></div>
                  <label>3a) No. of Units</label>
                  <input required="" type='number' class="form-control project_mw_g" name="gn_a[project_unit]" value="<?php echo $gn_a['project_unit'];?>">
                </div>
				
				  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_each_unit]'])) { echo $this->session->flashdata('step1')['gn_a[project_each_unit]']; } ?></span></div>
                  <label>3b) Capacity of each unit(In MW)</label>
                  <input required="" type='number' class="form-control project_mw_g" name="gn_a[project_each_unit]" value="<?php echo $gn_a['project_each_unit'];?>">
                </div>
				
				
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_location]'])) { echo $this->session->flashdata('step1')['gn_a[project_location]']; } ?></span></div>
                  <label>4) Location including Village/ Tehsil/ District/ State</label>
                  <input required="" type="text" class="form-control" name="gn_a[project_location]" value="<?php echo $gn_a['project_location'];?>">
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_power_sale_arrangement]'])) { echo $this->session->flashdata('step1')['gn_a[project_power_sale_arrangement]']; } ?></span></div>
                  <label>5) Power Sale Arrangement</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" name="gn_a[project_power_sale_arrangement]" value="Captive" onClick="$('#dvPowersale').hide();  $('#dvPowersale123').removeAttr('required');"  
                 <?php if($gn_a['project_power_sale_arrangement']=='Captive'){ echo 'checked'; } if(empty($gn_a['project_power_sale_arrangement'])){ echo 'checked'; }  ?>
                      />
                      Captive </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="gn_a[project_power_sale_arrangement]" value="Merchant" onClick="$('#dvPowersale').hide();  $('#dvPowersale123').removeAttr('required');"
                      	<?php if($gn_a['project_power_sale_arrangement']=='Merchant'){ echo 'checked'; };?>
                      />
                      Merchant </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="gn_a[project_power_sale_arrangement]" value="IPP" onClick="$('#dvPowersale').hide();  $('#dvPowersale123').removeAttr('required');"
                      	<?php if($gn_a['project_power_sale_arrangement']=='IPP'){ echo 'checked'; };?>
                      />
                      IPP </label>
                    <label class="radio-inline">
                      <input required="" type="radio" value="Others" name="gn_a[project_power_sale_arrangement]" onClick="$('#dvPowersale').show();  $('#dvPowersale123').attr('required','');"
                      	<?php if($gn_a['project_power_sale_arrangement']!='Captive' && $gn_a['project_power_sale_arrangement']!='Merchant' && $gn_a['project_power_sale_arrangement']!='IPP'){ echo 'checked'; };?>
                      />
                      Others </label>
                    <br>
                    <br>
                    <?php if($gn_a['project_power_sale_arrangement']!='Captive' && 
                    		 $gn_a['project_power_sale_arrangement']!='Merchant' && 
                    		 $gn_a['project_power_sale_arrangement']!='IPP'){ $display1 = 'block'; $required = 'required';  } else { $display1 = 'none'; $required = '';}?>
                    <div class="" id="dvPowersale" style="display: <?php echo $display1;?>"> <span class="">
                      <input <?php echo $required; ?> id="dvPowersale123" type="text" class="form-control" name="gn_a[project_power_sale_arrangement_other]" value="<?php echo $gn_a['project_power_sale_arrangement_other'];?>">
                      </span> </div>
                  </div>
                </div>
                <h5>6) Total Estimated Project Cost (In Rs. Cr.)</h5>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_cost_without_idc]'])) { echo $this->session->flashdata('step1')['gn_a[project_cost_without_idc]']; } ?></span></div>
                  <label>a. Project Cost without IDC<strong>(Rs. Cr.)</strong></label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control cost_idc"  name="gn_a[project_cost_without_idc]" value="<?php echo $gn_a['project_cost_without_idc'];?>">
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_idc_interest_durin_construction]'])) { echo $this->session->flashdata('step1')['gn_a[project_idc_interest_durin_construction]']; } ?></span></div>
                  <label>b. IDC (Interest During Construction)<strong>(Rs. Cr.)</strong></label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control idc_intrst" value="<?php echo $gn_a['project_idc_interest_durin_construction'];?>" name="gn_a[project_idc_interest_durin_construction]">
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_cost_with_idc]'])) { echo $this->session->flashdata('step1')['gn_a[project_cost_with_idc]']; } ?></span></div>
                  <label>c. Project Cost with IDC <strong>(Rs. Cr.)</strong><!--System Calculated value =(a+b)--></label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control project_cost_idc"  readonly value="<?php echo $gn_a['project_cost_with_idc'];?>">
				  
				  <input required="" type="hidden" class="form-control project_cost_idc1" name="gn_a[project_cost_with_idc]"  value="<?php echo $gn_a['project_cost_with_idc'];?>" >
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_cost_per_mw]'])) { echo $this->session->flashdata('step1')['gn_a[project_cost_per_mw]']; } ?></span></div>
                  <label>7) Cost per MW(In Rs. Cr./Mw)<!--System Calculated value (=6.c/3)--></label>
                  <input required=""  type="number"  class="form-control costMW" readonly value="<?php echo $gn_a['project_cost_per_mw'];?>">
				  
				  <input required="" type="hidden" class="form-control costMW1" name="gn_a[project_cost_per_mw]"  value="<?php echo $gn_a['project_cost_per_mw'];?>">
				  
				  
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_cost_debt]'])) { echo $this->session->flashdata('step1')['gn_a[project_cost_debt]']; } ?></span></div>
                  <label>8) Debt % (In % of Project cost)</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control debt_percent" value="<?php echo $gn_a['project_cost_debt'];?>" name="gn_a[project_cost_debt]">
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_cost_debt]'])) { echo $this->session->flashdata('step1')['gn_a[project_cost_equity]']; } ?></span></div>
                  <label>9) Equity % (In % of Project cost)</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control equity_percent" name="gn_a[project_cost_equity]" value="<?php echo $gn_a['project_cost_equity'];?>">
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_amount_equity]'])) { echo $this->session->flashdata('step1')['gn_a[project_amount_equity]']; } ?></span></div>
                  <label>10) Equity Amount<!--Calculated value =9/6--></label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control equityAmnt" readonly value="<?php echo $gn_a['project_amount_equity'];?>">
				  
				  <input required="" type="hidden" class="form-control equityAmnt1"  name="gn_a[project_amount_equity]" value="<?php echo $gn_a['project_amount_equity'];?>">
				  
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_debt_amount]'])) { echo $this->session->flashdata('step1')['gn_a[project_debt_amount]']; } ?></span></div>
                  <label>11) Debt Amount<!--Calculated value =8/6--></label>
                  <input required=""  type="number"  step="0.01" class="form-control debtAmnt" readonly value="<?php echo $gn_a['project_debt_amount'];?>">
				  
				  <input required="" type="hidden" class="form-control debtAmnt1" name="gn_a[project_debt_amount]" value="<?php echo $gn_a['project_debt_amount'];?>">
				  
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_loan_requested]'])) { echo $this->session->flashdata('step1')['gn_a[project_loan_requested]']; } ?></span></div>
                  <label>12) Loan Requested(In Rs. Cr.)</label>
                  <input required=""  type="number" step="0.01" class="form-control" name="gn_a[project_loan_requested]" value="<?php echo $gn_a['project_loan_requested'];?>">
                </div>
                <div class="form-group col-md-4">
                  <label>13) Lead under FI(If any)</label>
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_lead_fi]'])) {echo $this->session->flashdata('step1')['gn_a[project_lead_fi]']; } ?></span></div>
                  <input required=""  type="text" step="0.01" class="form-control"  name="gn_a[project_lead_fi]" value="<?php echo $gn_a['project_lead_fi'];?>">
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_construction_period]'])) { echo $this->session->flashdata('step1')['gn_a[project_construction_period]']; } ?></span></div>
                  <label>14) Project Construction Period(in years)</label>
                  <input required="" type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control"  name="gn_a[project_construction_period]" value="<?php echo $gn_a['project_construction_period'];?>">
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_loan_repayment_period]'])) { echo $this->session->flashdata('step1')['gn_a[project_loan_repayment_period]']; } ?></span></div>
                  <label>15) Loan Repayment Period(in years)</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control"  name="gn_a[project_loan_repayment_period]" value="<?php echo $gn_a['project_loan_repayment_period'];?>">
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_scheduled_completion_date]'])) {echo $this->session->flashdata('step1')['gn_a[project_scheduled_completion_date]']; } ?></span></div>
                  <label>16) SCOD(Original)</label>
                  <input required="" type="text" class="span2 form-control" id="dp35" name="gn_a[project_scheduled_completion_date]"  value="<?php echo $gn_a['project_scheduled_completion_date'];?>" placeholder="dd/mm/yyyy">
                </div>
				
				 <div class="form-group col-md-4">
				 <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[renifed_applicable]'])) {echo $this->session->flashdata('step1')['gn_a[renifed_applicable]']; } ?></span></div>
                  <label>16a) SCOD(Revised if Applicable)</label>
                  <input required="" type="text" class="span2 form-control" id="dp36" name="gn_a[renifed_applicable]"  value="<?php echo $gn_a['renifed_applicable'];?>" placeholder="dd/mm/yyyy">
                </div>
				
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_irr]'])) {echo $this->session->flashdata('step1')['gn_a[project_irr]']; } ?></span></div>
                  <label>17) Project IRR %</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control" name="gn_a[project_irr]" value="<?php echo $gn_a['project_irr'];?>">
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_dscr]'])) {echo $this->session->flashdata('step1')['gn_a[project_dscr]']; } ?></span></div>
                  <label>18) Project DSCR(avg.)</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control" name="gn_a[project_dscr]" value="<?php echo $gn_a['project_dscr'];?>">
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_levellised_tariff]'])) {echo $this->session->flashdata('step1')['gn_a[project_levellised_tariff]']; } ?></span></div>
                  <label>19) Levellised Tariff(Rs./Unit) </label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control" name="gn_a[project_levellised_tariff]" value="<?php echo $gn_a['project_levellised_tariff'];?>">
                </div>
				
				 <div class="form-group col-md-4">
				 <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_year_tariff]'])) { echo $this->session->flashdata('step1')['gn_a[project_year_tariff]']; } ?></span></div>
                  <label>19a) Year Tariff(Rs./Unit) </label>
                  <input required=""  type="number" step="0.01" class="form-control" name="gn_a[project_year_tariff]" value="<?php echo $gn_a['project_year_tariff'];?>">
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[project_levellised_cost_of_generation_excluding_roe]'])) { echo $this->session->flashdata('step1')['gn_a[project_levellised_cost_of_generation_excluding_roe]']; } ?></span></div>
                  <label>20) Levellised cost of generation Excluding RoE</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control" name="gn_a[project_levellised_cost_of_generation_excluding_roe]" value="<?php echo $gn_a['project_levellised_cost_of_generation_excluding_roe'];?>">
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
              <div class="sub-part">
                <h4>B. Entity Summary</h4>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_a[borrower_name]'])) { echo $this->session->flashdata('step1')['gn_b[borrower_name]']; }?></span></div>
                  <label>1) Name of The Borrower</label>
                  <input required="" type="text" class="form-control" name="gn_b[borrower_name]" value="<?php echo $gn_b['borrower_name'];?>">
                </div>
                <div class="form-group col-md-12">
                  <div class="sub-part">
                    <h5>2) Name of Directors of the Borrower</h5>
                    <div id="borrowerdirector">
                      <ul>
						
                      	<?php if($gn_b['directors'] != "N;" && !empty($gn_b['directors'])){
							$directors = unserialize($gn_b['directors']); 
							foreach($directors as $k=>$v) { ?>
                        <li>
                          <div class="dvborrowerdirector">
                            <div class="form-group col-md-11">
							<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_b[directors][]'])) { echo $this->session->flashdata('step1')['gn_b[directors][]']; } ?></span></div>
                              	<label> Director</label> 
                              	 <input required="" type="text" class="form-control" name="gn_b[directors][]" value="<?php echo $v;?>">
                            </div>
							<?php if($k>0){?>
							<div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removeborrowerdirector' class='btn btn-danger addsub'>X</button></div></div>
							<?php }?>                             
                          </div>
                        </li>
                        <?php }}else{?>
                         <li>
                          <div class="dvborrowerdirector">
                            <div class="form-group col-md-11">
							<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_b[directors][]'])) { echo $this->session->flashdata('step1')['gn_b[directors][]']; } ?></span></div>
                              	<label> Director</label> 
                              	<input required="" type="text" class="form-control" name="gn_b[directors][]">
                              </div>
                          </div>
                        </li>
                       <?php }?>
                      </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">
                      <label>Add Director (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addborrowerdirector" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="sub-part">
                    <h5>3) Details of Promoters of Borrower </h5>
                    <div id="promotersdetails">
                    <?php foreach($gn_b1 as $k=>$v){?>	
                      <div class="promotersdiv">
                        <div class="form-group col-md-6">
						<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_b1[borrower_promoters_name][]'])) {echo $this->session->flashdata('step1')['gn_b1[borrower_promoters_name][]']; } ?></span></div>
                          <label>Name of The Promoters of Borrower</label>
                          <input required="" class="form-control" type="text" name="gn_b1[borrower_promoters_name][]" value="<?php echo $v['borrower_promoters_name'];?>">
                        </div>
                        <div class="form-group col-md-6">
						<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_b1[shareholding_promoter][]'])) { echo $this->session->flashdata('step1')['gn_b1[shareholding_promoter][]']; }?></span></div>
                          <label>% Shareholding of Promoter </label>
                          <input required="" class="form-control" min="0" max="100" type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" name="gn_b1[shareholding_promoter][]" value="<?php echo $v['shareholding_promoter'];?>" >
                        </div>
                        <div class="form-group col-md-6">
						<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_b1[phn_no][]'])) {echo $this->session->flashdata('step1')['gn_b1[phn_no][]']; }?></span></div>
                          <label>Phone No.</label>
                          <input required="" class="form-control" maxlength="10" type="text" name="gn_b1[phn_no][]" value="<?php echo $v['phn_no'];?>">
                        </div>
                        <div class="form-group col-md-6">
						<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_b1[email][]'])) { echo $this->session->flashdata('step1')['gn_b1[email][]']; }?></span></div>
                          <label>Email</label>
                          <input required="" class="form-control" type="email" name="gn_b1[email][]" value="<?php echo $v['email'];?>">
                        </div>
                        <div class="form-group col-md-11">
						<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_b1[address][]'])) { echo $this->session->flashdata('step1')['gn_b1[address][]']; } ?></span></div>
                          <label>Address(Address of the Promoter) </label>
                          <input required="" class="form-control" type="text" name="gn_b1[address][]" value="<?php echo $v['address'];?>">
                        </div>
                         <?php if($k>0){?>
                         <div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removepromoter' class='btn btn-danger addsub'>X</button></div></div>
                         <?php }?>
                      </div>
                      <?php }?>
                    </div>
                    <div class="form-group col-md-12">
                      <label>Promoters (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addpromotersdetails" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_b[group_company_name]'])){echo $this->session->flashdata('step1')['gn_b[group_company_name]']; } ?></span></div>
                  <label>4) Name of Group Company</label>
                  <input required="" type="text" class="form-control" name="gn_b[group_company_name]" value="<?php echo $gn_b['group_company_name'];?>">
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_b[group_company_structure]'])){ echo $this->session->flashdata('step1')['gn_b[group_company_structure]']; }?></span></div>
                  <label>5) Structure of Group Company</label>
                  <textarea required=""  class="form-control" rows="5" name="gn_b[group_company_structure]" id="txtPowersale"><?php echo $gn_b['group_company_structure'];?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_b[group_company_promoter]'])){ echo $this->session->flashdata('step1')['gn_b[group_company_promoter]']; }?></span></div>
                  <label>6) Promoter's Contribution(Equity Shares/CCPS/CCD/Others)</label>
                  <textarea required=""  class="form-control" rows="5" id="txtPowersale" name="gn_b[group_company_promoter]"><?php echo $gn_b['group_company_promoter'];?></textarea>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
			 
                <h4>C. KYC Details</h4>
                <div class="mtop1"></div>
                <div class="clearfix"></div>
                <div class="attachheading"> 1) Authorized Signatory For the Project
                  <div class="attach pull-right"> 
                  	
                  	<span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input  type="file" accept="application/pdf, application/zip"  name="authorized_signatory_for_project_file" >
                    </span> 
					<?php if($gn_c['authorized_signatory_for_project_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_c['authorized_signatory_for_project_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
                   
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_c[authorized_signatory_project_name]'])){  echo $this->session->flashdata('step1')['gn_c[authorized_signatory_project_name]']; }?></span></div>
                  <label>a) Name</label>
                  <input required="" class="form-control" type="text" name="gn_c[authorized_signatory_project_name]" 
                  value="<?php echo $gn_c['authorized_signatory_project_name']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_c[authorized_signatory_project_address]'])){ echo $this->session->flashdata('step1')['gn_c[authorized_signatory_project_address]']; }?></span></div>
                  <label>b) Address</label>
                  <input required="" class="form-control" type="text" name="gn_c[authorized_signatory_project_address]" 
                  value="<?php echo $gn_c['authorized_signatory_project_address']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_c[authorized_signatory_project_phone]'])){ echo $this->session->flashdata('step1')['gn_c[authorized_signatory_project_phone]']; }?></span></div>
                  <label>c) Phone</label>
                  <input required="" class="form-control" maxlength="10" type="text" name="gn_c[authorized_signatory_project_phone]" 
                  value="<?php echo $gn_c['authorized_signatory_project_phone']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_c[authorized_signatory_project_email]'])){ echo $this->session->flashdata('step1')['gn_c[authorized_signatory_project_email]']; }?></span></div>
                  <label>d) Email</label>
                  <input required="" class="form-control" type="email" name="gn_c[authorized_signatory_project_email]"
                  value="<?php echo $gn_c['authorized_signatory_project_email']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_c[authorized_signatory_project_pan]'])){ echo $this->session->flashdata('step1')['gn_c[authorized_signatory_project_pan]']; }?></span></div>
                  <label>e) PAN</label>
                  <input required="" class="form-control" type="text" name="gn_c[authorized_signatory_project_pan]" pattern="[a-zA-z]{5}\d{4}[a-zA-Z]{1}" placeholder="ABCDS1234Y"
                  value="<?php echo $gn_c['authorized_signatory_project_pan']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_c[authorized_signatory_project_aadhar]'])){ echo $this->session->flashdata('step1')['gn_c[authorized_signatory_project_aadhar]']; }?></span></div>
                  <label>f) Aadhar Number</label>
                  <input required="" class="form-control" type="text" placeholder ="" pattern="^\d{4}\d{4}\d{4}$" name="gn_c[authorized_signatory_project_aadhar]"
                  value="<?php echo $gn_c['authorized_signatory_project_aadhar']; ?>"
                  >
                </div>
                <div class="mtop1"></div>
                <div class="clearfix"></div>
                <div class="attachheading"> 2) Authorized Person on Behalf of Borrower
                  <div class="attach pull-right"> 
                  	
                  	<span class="btn btn-primary btn-file"> 
                  		<span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    	<input  type="file" accept="application/pdf, application/zip"  name="authorized_person_on_behalf_of_borrower_file" >
                    </span> 
                   <?php if($gn_c['authorized_person_on_behalf_of_borrower_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_c['authorized_person_on_behalf_of_borrower_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
                    </div>
					
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php  if(isset($this->session->flashdata('step1')['gn_c[authorized_person_borrower_name]'])){echo $this->session->flashdata('step1')['gn_c[authorized_person_borrower_name]']; }?></span></div>
                  <label>a) Name</label>
                  <input required="" class="form-control" type="text" name="gn_c[authorized_person_borrower_name]"
                  value="<?php echo $gn_c['authorized_person_borrower_name']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_c[authorized_person_borrower_address]'])){ echo $this->session->flashdata('step1')['gn_c[authorized_person_borrower_address]']; }?></span></div>
                  <label>b) Address</label>
                  <input required="" class="form-control" type="text" name="gn_c[authorized_person_borrower_address]"
                  value="<?php echo $gn_c['authorized_person_borrower_address']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_c[authorized_person_borrower_phone]'])){ echo $this->session->flashdata('step1')['gn_c[authorized_person_borrower_phone]']; }?></span></div>
                  <label>c) Phone</label>
                  <input required="" class="form-control" maxlength="10" type="text" name="gn_c[authorized_person_borrower_phone]"
                  value="<?php echo $gn_c['authorized_person_borrower_phone']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_c[authorized_person_borrower_email]'])){echo $this->session->flashdata('step1')['gn_c[authorized_person_borrower_email]']; }?></span></div>
                  <label>d) Email</label>
                  <input required="" class="form-control" type="email" name="gn_c[authorized_person_borrower_email]"
                  value="<?php echo $gn_c['authorized_person_borrower_email']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['gn_c[authorized_person_borrower_pan]'])){echo $this->session->flashdata('step1')['gn_c[authorized_person_borrower_pan]']; }?></span></div>
                  <label>e) PAN</label>
                  <input required="" class="form-control" type="text" name="gn_c[authorized_person_borrower_pan]" pattern="[a-zA-z]{5}\d{4}[a-zA-Z]{1}" placeholder="ABCDS1234Y"
                  value="<?php echo $gn_c['authorized_person_borrower_pan']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php  if(isset($this->session->flashdata('step1')['gn_c[authorized_person_borrower_adhaar_number]'])){echo $this->session->flashdata('step1')['gn_c[authorized_person_borrower_adhaar_number]']; }?></span></div>
                  <label>f) Aadhar Number</label>
                  <input required="" class="form-control" type="text" placeholder ="" pattern="^\d{4}\d{4}\d{4}$" name="gn_c[authorized_person_borrower_adhaar_number]"
				value="<?php echo $gn_c['authorized_person_borrower_adhaar_number']; ?>" >
				  <?php if(isset($_GET['fid'])) { ?>
				  <input type="hidden" name="form_id" value="<?php  print_r($_GET['fid']); ?>">
				 <?php } ?>
                </div>
              </div>
            </div>
            
            <div class="col-md-12 text-right">
				
              <button type="submit" class="btn btn-primary">Save & Next</button>
            </div>
            </form>
          </div>
         
        
          	<div class="row setup-content" id="step-2">
          	<form role="form" action="<?php echo base_url(); ?>form1/process_generation_2" method="post" enctype="multipart/form-data">
			 
            <div class="col-md-12">
              <div class="sub-part">
                <h4>Project Details </h4>
                <div class="form-group ">
                  <div class="clearfix"></div>
                  <div class="attachheading"> 1) Means of Finance (Rs. Crore) <strong>(Attach the document as per the format given below)</strong>
				  
				  
				  
                    <div class="attach pull-right"> 
                   
	                      <span class="btn btn-primary btn-file"> 
						  <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
	                      	<input  type="file" accept="application/pdf, application/zip"  name="means_of_finance_field" >
	                      </span>
						  
						   <?php if($gn_2['means_of_finance_field_data']) { ?>
							 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_2['means_of_finance_field_data']); ?>"> 
								<span><i class="fa fa-download" aria-hidden="true"></i></span>
							</a> 
							<?php } ?>
                      
                      </div>
                  </div>
				 
                  <div class="clearfix"></div>
                  <div class="col-md-12">
                    <table class="table table-bordered gentable">
                      <thead>
                        <tr>
                          <th>&nbsp;</th>
                          <th></th>
                          <th></th>
                          <th>Amount(Rs. Cr.) </th>
						   <th>%</th>
                          <th>Remarks</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span></span>
                            <div>Equity </div></td>
                          <td><span></span>
                            <div>&nbsp;</div></td>
                          <td><span>Voting%</span>
                            <div>&nbsp;</div></td>
                          <td><span>Amount</span>
                            <div>&nbsp;</div></td>
							 <td><span>Remarks</span>
                            <div>&nbsp;</div></td>
                          <td><span>Remarks</span>
                            <div>&nbsp;</div></td>
                        </tr>
                        <tr>
                          <td><span></span>
                            <div>Debt </div></td>
                          <td><span>Instrument</span>
                            <div>&nbsp;</div></td>
                          <td><span></span>
                            <div><strong></strong></div></td>
                          <td><span>Amount</span>
                            <div>&nbsp;</div></td>
							 <td><span>Remarks</span>
                            <div>&nbsp;</div></td>
                          <td><span>Remarks</span>
                            <div>&nbsp;</div></td>
                        </tr>
						<tr>
                          <td><span></span>
                            <div>Rec Loan Sought</div></td>
                          <td><span>Instrument</span>
                            <div>&nbsp;</div></td>
                          <td><span>Voting%</span>
                            <div><strong></strong></div></td>
                          <td><span>Amount</span>
                            <div>&nbsp;</div></td>
							 <td><span>Remarks</span>
                            <div>&nbsp;</div></td>
                          <td><span>Remarks</span>
                            <div>&nbsp;</div></td>
                        </tr>
                        <tr>
                          <td><span></span>
                            <div><strong>Total</strong></div></td>
                          <td><span>Instrument</span>
                            <div>&nbsp;</div></td>
                          <td><span>Voting%</span>
                            <div>&nbsp;</div></td>
                          <td><span>Amount</span>
                            <div><strong></strong></div></td>
							 <td><span>Remarks</span>
                            <div>&nbsp;</div></td>
                          <td><span>Remarks</span>
                            <div>&nbsp;</div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="form-group col-md-12">
				  
				 
				  
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[name_of_lead_bank]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[name_of_lead_bank]']; } ?></span></div>
                    <label>2) Name of the Lead Bank/Financial Institution </label>
                    <input required="" type="text" class="form-control" name="phase1_project_details[name_of_lead_bank]" value="<?php echo $gn_2['name_of_lead_bank']?>">
                  </div>
                  <div class="">
                    <div class="col-md-12">
					
                      <h6>3) Sanction details of other banks</h6>
                    </div>
					
                    <div id="insertbanktable">
                    	<?php $js=1; foreach($gn_san as $itgn){  ?>
						
                      <div class="test test_<?=$js?>">
                        <div class="form-group col-md-3">
						
											
					 <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[name_of_bank_FI][]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[name_of_bank_FI][]']; } ?></span></div>
                          <label>Name of Bank/FI</label>
                          <input required="" type="text" class="form-control" value="<?=$itgn['name_of_bank_FI']?>" name="phase1_project_details[name_of_bank_FI][]">
                        </div>
                        <div class="form-group col-md-3">
						
						
					 <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[name_of_bank_amount][]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[name_of_bank_amount][]']; } ?></span></div>
                          <label>Amount</label>
                          <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$"  value="<?=$itgn['name_of_bank_amount']?>"  step="0.01" class="form-control" name="phase1_project_details[name_of_bank_amount][]">
                        </div>
                        <div class="form-group col-md-4">
                          <label>Status</label>
                          <div class="">
                            <label for="chkYsanction" class="radio-inline">
                              <?php if($itgn['name_of_bank_status']){ ?>
                              	<input required="" type="radio" id="chkYsanction<?=$js?>" name="phase1_project_details[name_of_bank_status<?=$js?>]" value="Sanctioned" onClick="ShowHideSanction(<?=$js?>)"  <?php if($itgn['name_of_bank_status']=="Sanctioned"){echo "checked";} ?>/>
                              <?php }else{ ?>	
                              	<input required="" type="radio" id="chkYsanction<?=$js?>" name="phase1_project_details[name_of_bank_status<?=$js?>]" value="Sanctioned" onClick="ShowHideSanction(<?=$js?>)" checked />
                              <?php } ?>
                              Sanctioned </label>
                            <label for="chkNsanction" class="radio-inline">
                              <input required="" type="radio" id="chkNsanction<?=$js?>" name="phase1_project_details[name_of_bank_status<?=$js?>]" value="Applied" onClick="ShowHideSanction(<?=$js?>)"   <?php if($itgn['name_of_bank_status']=="Applied"){echo "checked";} ?> />
                              Applied </label>
                            <div class="attach pull-right" id="dvSanction<?=$js?>" style="display: <?php if($itgn['name_of_bank_status']){if($itgn['name_of_bank_status']=="Sanctioned"){echo "block";}else{echo "none";}}else{echo "block";} ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                              <input type="file" accept="application/pdf, application/zip"   id="txtSanction" name="name_of_bank_status_attach<?=$js?>">
                              <input  type="hidden" id="txtSanction" name="name_of_bank_status_attachname<?=$js?>" value="<?=$itgn['name_of_bank_status_attach']?>">
                              </span> 
							   <?php if($itgn['name_of_bank_status_attach']) { ?>
							 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $itgn['name_of_bank_status_attach']); ?>"> 
								<span><i class="fa fa-download" aria-hidden="true"></i></span>
							</a> 
							<?php } ?>
							  </div>
                          </div>
                        </div>
                         <div class="form-group col-md-1"><label>Remove</label><div class="add-feild"><button type="button" data-id="<?=$itgn['id']?>" id="removebank" class="btn btn-danger addsub deleteData">X</button></div></div>
                      </div>
                      <?php $js++; } ?>
                    </div>
                    <div class="form-group col-md-12">
                      <label>Banks (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addmorebank" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-6">
				
				
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[cost_comparison_bench_marking]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[cost_comparison_bench_marking]']; } ?></span></div>
                  <label>4) Cost Comparison with  CERC/SERC Bench marking</label>
                  <input required="" class="form-control"   type='number' pattern='^\d+(?:\.\d{1,2})?$' step='0.01' name="phase1_project_details[cost_comparison_bench_marking]" value="<?php echo $gn_2['cost_comparison_bench_marking']?>">
                </div>
                <div class="form-group col-md-6">
				
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[prepare_by_whom]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[prepare_by_whom]']; } ?></span></div>
                  <label>5) DPR (Name of the consultant) </label>
                  <input required="" class="form-control" type="text" name="phase1_project_details[prepare_by_whom]" value="<?php echo $gn_2['prepare_by_whom']?>">
                </div>
                <div class="form-group col-md-6">
				
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[dpr_year]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[dpr_year]']; } ?></span></div>
                  <label>6) DPR year </label>
                  <input required="" class="form-control" type="number" name="phase1_project_details[dpr_year]"  value="<?php echo $gn_2['dpr_year']?>">
                </div>
				 <div class="form-group col-md-2">
				 
				 
				  <label>6) DPR Attachment </label>
				<div class="attach">
	                      <span class="btn btn-primary btn-file"> 
						  <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
	                      	<input  type="file" accept="application/pdf, application/zip"  name="drp_attachment" >
	                      </span>
						  
						   <?php if($gn_2['drp_attachment']) { ?>
							 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_2['drp_attachment']); ?>"> 
								<span><i class="fa fa-download" aria-hidden="true"></i></span>
							</a> 
							<?php } ?>
                      </div>
				</div>
				
                <div class="form-group col-md-4">
				
				
                  <label>6) DPR year </label>
				  
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[name_of_statutory_auditors]]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[name_of_statutory_auditors]']; } ?></span></div>
                  <label>7) Name of the Statutory Auditors </label>
                  <input required="" class="form-control" type="text" name="phase1_project_details[name_of_statutory_auditors]" value="<?php echo $gn_2['name_of_statutory_auditors']?>">
                </div>
                <div class="form-group col-md-12">
				
				
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[information_memorandum_financial_mode]]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[information_memorandum_financial_mode]]']; } ?></span></div>
                  <label>8) Information Memorandum with Financial Model of Lead Bank/FI (if not available then of Borrower Co)</label>
                  <div class="attach">
                    <input required="" class="form-control" type="text" name="phase1_project_details[information_memorandum_financial_mode]" value="<?php echo $gn_2['information_memorandum_financial_mode']?>">
                    <span class="btn btn-primary btn-file attach-c" style="right: <?php if($gn_2['information_memorandum_financial_mode_attach']) {echo "42px;";}else{echo "0px;"; } ?>"> 
					<span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input type="file" accept="application/pdf, application/zip"   name="information_memorandum_financial_mode_attach">
                    </span> 
					
					<?php if($gn_2['information_memorandum_financial_mode_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_2['information_memorandum_financial_mode_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
                      
                      
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="sub-part">
                    <div class="col-md-12">
                      <h6>9) PPA Details</h6>
                    </div>
					 <h5>9a) Tied up</h5>
					<?php if(empty($gn_2a)){ ?>
					 <div id="tideupcontains1">
					 	
                    <div class="tiedupholds1">
                    <div class="form-group col-md-4">
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[date_of_ppa][]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[date_of_ppa][]']; } ?></span></div>
                      <label>a) Date of PPA</label>
                      <input required="" type="text" class="span2 form-control dp12" placeholder="dd/mm/yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" name="phase1_project_details[date_of_ppa][]">
                    </div>
                    <div class="form-group col-md-4">
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[utility_discom][]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[utility_discom][]']; } ?></span></div>
                      <label>b) Utility/Discom</label>
                      <input required="" type="text" class="form-control" name="phase1_project_details[utility_discom][]"  >
                    </div>
                    <div class="form-group col-md-4">
					
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[ppa_capacity][]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[ppa_capacity][]']; } ?></span></div>
                      <label>c) Capacity</label>
                      <input required="" type="number" class="form-control" name="phase1_project_details[ppa_capacity][]">
                    </div>
                    <div class="form-group col-md-4">
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[ppa_tariff][]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[ppa_tariff][]']; } ?></span></div>
                      <label>d) Tariff</label>
                      <input required="" type="text" class="form-control" name="phase1_project_details[ppa_tariff][]">
                    </div>
                    <div class="form-group col-md-4">
					
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[ppa_mou_case_1][]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[ppa_mou_case_1][]']; } ?></span></div>
                      <label>e) MoU/Case-I</label>
                      <input required="" type="text" class="form-control" name="phase1_project_details[ppa_mou_case_1][]">
                    </div>
					<div class="form-group col-md-1 deleteData_gn" ><label>Remove</label><div class="add-feild"><button type="button" class="btn btn-danger addsub" disabled>X</button></div></div>
                    <div class="clearfix"></div>
                    <hr />
                    </div>
                    </div>
					<?php } else { ?>
					<!-- ---------------------------------------- -->
						
					 <div id="tideupcontains1">
					 	<?php $j=1; foreach($gn_2a as $data){ ?>
                    <div class="tiedupholds1">
                    <div class="form-group col-md-4">
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[date_of_ppa][]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[date_of_ppa][]']; } ?></span></div>
                      <label>a) Date of PPA</label>
                      <input required="" type="text" class="span2 form-control dp12"  placeholder="dd/mm/yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" name="phase1_project_details[date_of_ppa][]" value="<?php echo $data['date_of_ppa']?>">
                    </div>
                    <div class="form-group col-md-4">
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[utility_discom][]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[utility_discom][]']; } ?></span></div>
                      <label>b) Utility/Discom</label>
                      <input required="" type="text" class="form-control" name="phase1_project_details[utility_discom][]"  value="<?php echo $data['utility_discom']?>">
                    </div>
                    <div class="form-group col-md-4">
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[ppa_capacity][]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[ppa_capacity][]']; } ?></span></div>
                      <label>c) Capacity</label>
                      <input required="" type="number" class="form-control" name="phase1_project_details[ppa_capacity][]" value="<?php echo $data['ppa_capacity']?>">
                    </div>
                    <div class="form-group col-md-4">
					
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[ppa_tariff][]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[ppa_tariff][]']; } ?></span></div>
                      <label>d) Tariff</label>
                      <input required="" type="text" class="form-control" name="phase1_project_details[ppa_tariff][]" value="<?php echo $data['ppa_tariff']?>">
                    </div>
                    <div class="form-group col-md-4">
					
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[ppa_mou_case_1][]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[ppa_mou_case_1][]']; } ?></span></div>
                      <label>e) MoU/Case-I</label>
                      <label>e) MoU/Case-I</label>
                      <input required="" type="text" class="form-control" name="phase1_project_details[ppa_mou_case_1][]" value="<?php echo $data['ppa_mou_case_1']?>">
                    </div>
					<div class="form-group col-md-1 "><label>Remove</label><div class="add-feild">
					<button type="button" data-id="<?=$data['id']?>" id="removetideup1" class="btn btn-danger addsub deleteData_gn" >X</button></div></div>
                    <div class="clearfix"></div>
                    <hr />
                    </div>
					<?php $j++; }  ?>
                    </div>
					<?php } ?>
                    <div class="form-group col-md-12">
                      <label>Add (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addtideup1" class="btn btn-primary">Add</button>
                      </div>
                    </div>
					
					
					<!-- ---------------------------------------- -->
					
					
					
                   <!-- <div class="clearfix"></div>
                    <h5>9b) Yet to be tied up</h5>
                    <div class="form-group col-md-4">
                      <label>a) Capacity</label>
                      <input required="" type="number" class="form-control" name="phase1_project_details[yet_tied_capacity]" value="<?php echo $gn_2['yet_tied_capacity']?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label>b) Proposed through</label>
                      <input required="" type="text" class="form-control" name="phase1_project_details[yet_tied_proposed_through]" value="<?php echo $gn_2['yet_tied_proposed_through']?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label>c) Expected Tariff</label>
                      <input required="" type="text" class="form-control" name="phase1_project_details[yet_tied_expected_tariff]" value="<?php echo $gn_2['yet_tied_expected_tariff']?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label>d) Details of bidding participated</label>
                      <input required="" type="text" class="form-control" name="phase1_project_details[yet_tied_detail_bidding_participated]" value="<?php echo $gn_2['yet_tied_detail_bidding_participated']?>">
                    </div>-->
					
					  <div class="clearfix"></div>
                    <h5>9b) Yet to be tied up</h5>
					<?php if(empty($gn_2b)) { ?>
					 <div id="yettideupcontainer1">
                    <div class="yettideupholds1">
					
                    <div class="form-group col-md-4">
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details1[yet_tied_capacity][]'])) { echo  $this->session->flashdata('step2')['project_details1[yet_tied_capacity][]']; } ?></span></div>
					<label>a) Capacity</label>
                      <input required="" type="number" class="form-control" name="project_details1[yet_tied_capacity][]" >
                    </div>
					
					
                    <div class="form-group col-md-4">
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details1[yet_tied_proposed_through][]'])) { echo  $this->session->flashdata('step2')['project_details1[yet_tied_proposed_through][]']; } ?></span></div>
                      <label>b) Proposed through</label>
                      <input required="" type="text" class="form-control" name="project_details1[yet_tied_proposed_through][]" >
                    </div>
					
                    <div class="form-group col-md-4">
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details1[yet_tied_expected_tariff][]'])) { echo  $this->session->flashdata('step2')['project_details1[yet_tied_expected_tariff][]']; } ?></span></div>
                      <label>c) Expected Tariff</label>
                      <input required="" type="text" class="form-control" name="project_details1[yet_tied_expected_tariff][]" >
                    </div>
					
                    <div class="form-group col-md-4">
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details1[yet_tied_detail_bidding_participated][]'])) { echo  $this->session->flashdata('step2')['project_details1[yet_tied_detail_bidding_participated][]']; } ?></span></div>
                      <label>d) Details of bidding participated</label>
                      <input required="" type="text" class="form-control" name="project_details1[yet_tied_detail_bidding_participated][]" >
                    </div>
                    <div class="form-group col-md-1"><label>Remove</label><div class="add-feild"><button type="button" class="btn btn-danger addsub" disabled>X</button></div></div>
                    <div class="clearfix"></div><hr>
					</div>
					</div>
					<?php }else { ?>
					
                    <div id="yettideupcontainer1">
					<?php $j=1; foreach($gn_2b as $data2){ ?>
					
                    <div class="yettideupholds1">
					
                    <div class="form-group col-md-4">
					
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details1[yet_tied_capacity][]'])) { echo  $this->session->flashdata('step2')['project_details1[yet_tied_capacity][]']; } ?></span></div>
                      <label>a) Capacity</label>
                      <input required="" type="number" class="form-control" name="project_details1[yet_tied_capacity][]" value="<?php echo $data2['yet_tied_capacity']?>">
                    </div>
					
                    <div class="form-group col-md-4">
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details1[yet_tied_proposed_through][]'])) { echo  $this->session->flashdata('step2')['project_details1[yet_tied_proposed_through][]']; } ?></span></div>
                      <label>b) Proposed through</label>
                      <input required="" type="text" class="form-control" name="project_details1[yet_tied_proposed_through][]" value="<?php echo $data2['yet_tied_proposed_through']?>">
                    </div>
					
                    <div class="form-group col-md-4">
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details1[yet_tied_expected_tariff][]'])) { echo  $this->session->flashdata('step2')['project_details1[yet_tied_expected_tariff][]']; } ?></span></div>
                      <label>c) Expected Tariff</label>
                      <input required="" type="text" class="form-control" name="project_details1[yet_tied_expected_tariff][]" value="<?php echo $data2['yet_tied_expected_tariff']?>">
                    </div>
					
                    <div class="form-group col-md-4">
					
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details1[yet_tied_detail_bidding_participated][]'])) { echo  $this->session->flashdata('step2')['project_details1[yet_tied_detail_bidding_participated][]']; } ?></span></div>
                      <label>d) Details of bidding participated</label>
                      <input required="" type="text" class="form-control" name="project_details1[yet_tied_detail_bidding_participated][]" value="<?php echo $data2['yet_tied_detail_bidding_participated']?>">
                    </div>
                    <div class="form-group col-md-1"><label>Remove</label><div class="add-feild"><button type="button" data-id="<?=$data2['id']?>" id="removeyettideup1"class="btn btn-danger addsub deleteData_gn2" >X</button></div></div>
                    <div class="clearfix"></div><hr>
					</div>
					<?php $j++; } ?>
					</div>
					<?php } ?>
				  <div class="form-group col-md-12">
                      <label>Add (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addyettideup1" class="btn btn-primary">Add</button>
                      </div>
                    </div>
					
                  </div>
                </div>
              </div>
            </div>
			
            <div class="form-group col-md-12">
			
			<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[plant_technology_capacity]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[plant_technology_capacity]']; } ?></span></div>
              <label>10) Plant & Technology(Capacity, major components of the project, technology, make/class of key equipment and key design parameters)</label>
			  <textarea required=""  class="form-control" rows="5" id="" name="phase1_project_details[plant_technology_capacity]"><?php echo $gn_2['plant_technology_capacity']?></textarea>
            </div>
			
			<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[infrastructure_land_requirement]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[infrastructure_land_requirement]']; } ?></span></div>
			
            <div class="form-group col-md-12">
              <label>11) Infrastructure(Land Requirement, Availability and type of land existing infrastructure in the surroundings required/proposed infrastructure for access to location required/proposed infrastructure for fuel – receiving and storing) </label>
              <textarea required=""  class="form-control" rows="5" id="" name="phase1_project_details[infrastructure_land_requirement]"><?php echo $gn_2['infrastructure_land_requirement']?></textarea>
            </div>
			
            <div class="form-group col-md-12">
			
			<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[water_estimated_requirement_source]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[water_estimated_requirement_source]']; } ?></span></div>
              <label>12) Water(estimated requirement, source and plan to meet the water requirement)</label>
              <textarea required=""  class="form-control" rows="5" id="" name="phase1_project_details[water_estimated_requirement_source]"><?php echo $gn_2['water_estimated_requirement_source']?></textarea>
            </div>
			
            <div class="form-group col-md-12">
			
			<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[fuel_estimated_requirement_source]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[fuel_estimated_requirement_source]']; } ?></span></div>
              <label>13) Fuel(estimated requirement, source and plan to meet the fuel requirement( wherever required))</label>
              <textarea required=""  class="form-control" rows="5" id="" name="phase1_project_details[fuel_estimated_requirement_source]"><?php echo $gn_2['fuel_estimated_requirement_source']?></textarea>
            </div>
			
            <div class="form-group col-md-12">
			
			<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[project_plant_implementation_schedule]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[project_plant_implementation_schedule]']; } ?></span></div>
              <label>14) Project Plant & Implementation Schedule(Start date, major activities and milestones and the COD)</label>
              <textarea required=""  class="form-control" rows="5" id="" name="phase1_project_details[project_plant_implementation_schedule]"><?php echo $gn_2['project_plant_implementation_schedule']?></textarea>
            </div>
			
            <div class="form-group col-md-12">
			
			<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[pan_for_power_evacuation_infrastructure_existing]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[pan_for_power_evacuation_infrastructure_existing]']; } ?></span></div>
              <label>15) Plan for Power Evacuation(Infrastructure existing/required/proposed)</label>
              <textarea required=""  class="form-control" rows="5" id="" name="phase1_project_details[pan_for_power_evacuation_infrastructure_existing]"><?php echo $gn_2['pan_for_power_evacuation_infrastructure_existing']?></textarea>
            </div>
			
            <div class="form-group col-md-12">
			
			<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[power_sale_offtake_banking]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[power_sale_offtake_banking]']; } ?></span></div>
              <label>16) Power Sales & Offtake(Arrangement for offtake and sale of power through PPAs, nature of buyers, tariff, wheeling/banking)</label>
              <textarea required=""  class="form-control" rows="5" id="" name="phase1_project_details[power_sale_offtake_banking]"><?php echo $gn_2['power_sale_offtake_banking']?></textarea>
            </div>
            <div class="form-group">
              <div class="clearfix"></div>
              <div class="attachheading"> 17) Project cost <strong>(Attach the document as per the format given below)</strong>
                <div class="attach pull-right"> <span class="btn btn-primary btn-file"> 
				<span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                  <input type="file" accept="application/pdf, application/zip"   name="year_wise_project_cost_attach">
                  </span> 
				  
				  <?php if($gn_2['year_wise_project_cost_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_2['year_wise_project_cost_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
				  </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-12">
                <table class="table table-bordered gentable">
                  <thead>
                    <tr>
                      <th>&nbsp;</th>
                      <th>Project Head</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>Amount in Rs. Cr.</th>
                      <th>% to Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>1</div></td>
                      <td><span>Project Head</span>
                        <div>Cost of land & Site Development</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>2</div></td>
                      <td><span>Project Head</span>
                        <div>Plant Machinery & Equipment (Incl. Taxes & Duties) </div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>3</div></td>
                      <td><span>Project Head</span>
                        <div>Initial Spares</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>4</div></td>
                      <td><span>Project Head</span>
                        <div>Civil & Infrastructural Works</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>5</div></td>
                      <td><span>Project Head</span>
                        <div>Construction & Pre-commissioning Expenses</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>6</div></td>
                      <td><span>Project Head</span>
                        <div>Overheads (Incl. Contingencies)</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>7</div></td>
                      <td><span>Project Head</span>
                        <div>Capital Costs Excluding IDC & FC</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td rowspan="3"><span>&nbsp;</span>
                        <div>8</div></td>
                      <td><span>Project Head</span>
                        <div>-IDC, </div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      
                      <td><span>Project Head</span>
                        <div>-FC, FV & Hedging Costs </div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      
                      <td><span>Project Head</span>
                        <div>Total – IDC, FV, FV & HC</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>9</div></td>
                      <td><span>Project Head</span>
                        <div>Working Capital Margin</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>10</div></td>
                      <td><span>Project Head</span>
                        <div>Total Project Cost ( Incl. WC margin)</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h5>18) Licenses & Approvals </h5>
                <div class="form-group col-md-4">
				
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[licenses_approval_pollution_clearance]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[licenses_approval_pollution_clearance]']; } ?></span></div>
                  <label>a) Pollution Clearance</label>
                  <div class="">
                    <label for="chkshare" class="radio-inline">
                      <input required="" type="radio" id="chkYshare"   name="phase1_project_details[licenses_approval_pollution_clearance]" value="Yes" onClick="ShowHideShare()" 
                      
                      	<?php if($gn_2['licenses_approval_pollution_clearance']=='Yes'){echo 'checked'; $lapca = 'block';}else{$lapca = 'none';}?> 
                      
                      />
                      Yes </label>
                    <label for="chkNshare" class="radio-inline">
                      <input required="" type="radio" id="chkNshare"   name="phase1_project_details[licenses_approval_pollution_clearance]" value="No" onClick="ShowHideShare()"  
                      	<?php if($gn_2['licenses_approval_pollution_clearance']=='No'){echo 'checked'; $lapca = 'none';}?>
                      />
                      No </label>
					  
					   <label for="chkNashare" class="radio-inline">
                      <input required="" type="radio" id="chkNashare"   name="phase1_project_details[licenses_approval_pollution_clearance]" value="NA" onClick="ShowHideShare()"  
                      	<?php if($gn_2['licenses_approval_pollution_clearance']=='NA'){echo 'checked'; $lapca = 'none';}?>
                      />
                      NA </label>
                    <div class="attach pull-right" id="dvShare" style="display: <?php echo $lapca;?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtShareHold" name="licenses_approval_pollution_clearance_attach" >
                      </span> 
						 <?php if($gn_2['licenses_approval_pollution_clearance_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_2['licenses_approval_pollution_clearance_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					  
					  </div>
                  </div>
                </div>
                <div class="form-group col-md-4">
				
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[licenses_approval_water_allocation]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[licenses_approval_water_allocation]']; } ?></span></div>
                  <label>b) Water allocation </label>
                  <div class="">
                    <label for="chkYwater" class="radio-inline">
                      <input required="" type="radio" id="chkYwater" onClick="ShowHideWater()" value="Yes"  name="phase1_project_details[licenses_approval_water_allocation]" 

						<?php if($gn_2['licenses_approval_water_allocation']=='Yes'){echo 'checked'; $lawp ='block';}else{$lawp = 'none';}?>
					  />
                      Yes </label>
					  
                    <label for="chkNwater" class="radio-inline">
                      <input required="" type="radio" id="chkNwater" name="phase1_project_details[licenses_approval_water_allocation]"  value="No"  onClick="ShowHideWater()"                        
                      <?php if($gn_2['licenses_approval_water_allocation']=='No'){echo 'checked'; $lawp ='none';}?>                      
                      />
                      No </label>
					   <label for="chkNawater" class="radio-inline">
                      <input required="" type="radio" id="chkNawater" name="phase1_project_details[licenses_approval_water_allocation]"  value="NA"  onClick="ShowHideWater()"                        
                      <?php if($gn_2['licenses_approval_water_allocation']=='NA'){echo 'checked'; $lawp ='none';}?>                      
                      />
                      NA </label>
                    <div class="attach pull-right" id="dvWater" style="display: <?php echo $lawp;?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtWater" name="licenses_approval_water_allocation_attach" >
                      </span>
						 <?php if($gn_2['licenses_approval_water_allocation_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_2['licenses_approval_water_allocation_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>

					  </div>
                  </div>
                </div>
				
                <div class="form-group col-md-4">
				
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[licenses_approval_environment_clearance]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[licenses_approval_environment_clearance]']; } ?></span></div>
                  <label>c) Environmental clearance</label>
                  <div class="">
                    <label for="chkYevs" class="radio-inline">
                      <input required="" 
                      	type="radio" id="chkYevs" 
                      	name="phase1_project_details[licenses_approval_environment_clearance]" 
                      	value="Yes" onClick="ShowHideEvs()" 
						<?php if($gn_2['licenses_approval_environment_clearance']=='Yes'){echo 'checked'; $laec = 'block';}else{$laec = 'none';}?> 
					  />
                      Yes </label>
                    <label for="chkNevs" class="radio-inline">
                      <input required="" type="radio" id="chkNevs" name="phase1_project_details[licenses_approval_environment_clearance]" value="No" onClick="ShowHideEvs()"  
                      <?php if($gn_2['licenses_approval_environment_clearance']=='No'){echo 'checked'; $laec = 'none';}?>
                      />
                      No </label>
					  
					  <label for="chkNaevs" class="radio-inline">
                      <input required="" type="radio" id="chkNaevs" name="phase1_project_details[licenses_approval_environment_clearance]" value="NA" onClick="ShowHideEvs()"  
                      <?php if($gn_2['licenses_approval_environment_clearance']=='NA'){echo 'checked'; $laec = 'none';}?>
                      />
                      NA </label>
                    <div class="attach pull-right" id="dvEvs" style="display: <?php echo $laec; ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtEvs" name="licenses_approval_environment_clearance_attach"  >
                      </span> 
					   <?php if($gn_2['licenses_approval_environment_clearance_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_2['licenses_approval_environment_clearance_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                <div class="clearfix"></div>
				
				
                <div class="form-group col-md-4">
				
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[licenses_approval_forest_land_clearance]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[licenses_approval_forest_land_clearance]']; } ?></span></div>
                  <label>d) Forest Land clearance (Project site)</label>
                  <div class="">
                    <label for="chkYforest" class="radio-inline">
                      <input required="" type="radio" id="chkYforest" value="Yes" name="phase1_project_details[licenses_approval_forest_land_clearance]" onClick="ShowHideForest()"  
                      <?php if($gn_2['licenses_approval_forest_land_clearance']=='Yes'){echo 'checked'; $laflc = 'block';}else{$laflc = 'none';}?>
                      />
                      Yes </label>
                    <label for="chkNforest" class="radio-inline">
                      <input required="" type="radio" id="chkNforest" value="No" name="phase1_project_details[licenses_approval_forest_land_clearance]" onClick="ShowHideForest()" 
                      <?php if($gn_2['licenses_approval_forest_land_clearance']=='No'){echo 'checked'; $laflc = 'none';}?>
                       />
                      No </label>
                    <label for="chkNAforest" class="radio-inline">
                      <input required="" type="radio" id="chkNAforest" name="phase1_project_details[licenses_approval_forest_land_clearance]"  value="NA" onClick="ShowHideForest()"  
                      	<?php if($gn_2['licenses_approval_forest_land_clearance']=='NA'){echo 'checked'; $laflc = 'none';}?>
                      />
                      NA </label>
                    <div class="attach pull-right" id="dvForest" style="display: <?php echo $laflc;?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtForest" name="licenses_approval_forest_land_clearance_attach"  >
                      </span> 
					   <?php if($gn_2['licenses_approval_forest_land_clearance_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_2['licenses_approval_forest_land_clearance_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
				
                <div class="form-group col-md-4">
				
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[licenses_approval_forest_land_evacuation]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[licenses_approval_forest_land_evacuation]']; } ?></span></div>
                  <label>e) Forest Land clearance (Evacuation) </label>
                  <div class="">
                    <label for="chkYevacuation" class="radio-inline">
                      <input required="" type="radio" id="chkYevacuation"  name="phase1_project_details[licenses_approval_forest_land_evacuation]" value="Yes" onClick="ShowHideEvacuation()" 
<?php if($gn_2['licenses_approval_forest_land_evacuation']=='Yes'){echo 'checked'; $lafle = 'block';}else{$lafle = 'none';}?>
 />
                      Yes </label>
                    <label for="chkNevacuation" class="radio-inline">
                      <input required="" type="radio" id="chkNevacuation" name="phase1_project_details[licenses_approval_forest_land_evacuation]" value="No" onClick="ShowHideEvacuation()"  
                      <?php if($gn_2['licenses_approval_forest_land_evacuation']=='No'){echo 'checked'; $lafle = 'none';}?>
                      />
                      No </label>
                    <label for="chkNAevacuation" class="radio-inline">
                      <input required="" type="radio" id="chkNAevacuation" name="phase1_project_details[licenses_approval_forest_land_evacuation]" value="NA" onClick="ShowHideEvacuation()" 
                      <?php if($gn_2['licenses_approval_forest_land_evacuation']=='NA'){echo 'checked'; $lafle = 'none';}?>
                       />
                      NA </label>
                    <div class="attach pull-right" id="dvEvacuation" style="display: <?php echo $lafle;?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtEvacuation" name="licenses_approval_forest_land_evacuation_attach" value="" >
                      </span> 
					   <?php if($gn_2['licenses_approval_forest_land_evacuation_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_2['licenses_approval_forest_land_evacuation_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
				
                <div class="form-group col-md-4">
				
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[licenses_approval_civil_aviation_clearance]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[licenses_approval_civil_aviation_clearance]']; } ?></span></div>
                  <label>f) Civil aviation clearance (chimney height)</label>
                  <div class="">
                    <label for="chkYcivil" class="radio-inline">
                      <input required="" type="radio" id="chkYcivil"  name="phase1_project_details[licenses_approval_civil_aviation_clearance]" value="Yes" onClick="ShowHideCivil()" 
					<?php if($gn_2['licenses_approval_civil_aviation_clearance']=='Yes'){echo 'checked'; $lacac = 'block';}else{ $lacac = 'none';}?> />
                      Yes </label>
                    <label for="chkNcivil" class="radio-inline">
                      <input required="" type="radio" id="chkNcivil"  name="phase1_project_details[licenses_approval_civil_aviation_clearance]" value="No"  onClick="ShowHideCivil()"  
                      <?php if($gn_2['licenses_approval_civil_aviation_clearance']=='No'){echo 'checked'; $lacac = 'none';}?>
                      />
                      No </label>
					   <label for="chkNacivil" class="radio-inline">
                      <input required="" type="radio" id="chkNacivil"  name="phase1_project_details[licenses_approval_civil_aviation_clearance]" value="NA"  onClick="ShowHideCivil()"  
                      <?php if($gn_2['licenses_approval_civil_aviation_clearance']=='NA'){echo 'checked'; $lacac = 'none';}?>
                      />
                      NA </label>
                    <div class="attach pull-right" id="dvCivil" style="display: <?php echo $lacac;?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtCivil"   name="licenses_approval_civil_aviation_clearance_attach" >
                      </span> 
					  <?php if($gn_2['licenses_approval_civil_aviation_clearance_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_2['licenses_approval_civil_aviation_clearance_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
				
				 <div class="form-group col-md-4">
				 
				 <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[PPA]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[PPA]']; } ?></span></div>
                  <label>g) PPA</label>
                  <div class="">
                    <label for="chkYppa" class="radio-inline">
                      <input required="" type="radio" id="chkYppa"  name="phase1_project_details[PPA]" value="Yes" onClick="ShowHidePPA()" 
					<?php if($gn_2['PPA']=='Yes'){echo 'checked'; $lacac = 'block';}else{ $lacac = 'none';}?> />
                      Yes </label>
                    <label for="chkNppa" class="radio-inline">
                      <input required="" type="radio" id="chkNppa"  name="phase1_project_details[PPA]" value="No"  onClick="ShowHidePPA()"  
                      <?php if($gn_2['PPA']=='No'){echo 'checked'; $lacac = 'none';}?>
                      />
                      No </label>
					   <label for="chkNappa" class="radio-inline">
                      <input required="" type="radio" id="chkNappa"  name="phase1_project_details[PPA]" value="NA"  onClick="ShowHidePPA()"  
                      <?php if($gn_2['PPA']=='NA'){echo 'checked'; $lacac = 'none';}?>
                      />
                      NA </label>
                    <div class="attach pull-right" id="dvppa" style="display: <?php echo $lacac;?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtCivil"   name="ppa_attach" >
                      </span> 
					  <?php if($gn_2['ppa_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_2['ppa_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
				
			 <div class="form-group col-md-4">
				<label> Any other Document </label>
 				<div class=""> 
                <div class="attach"> <span class="btn btn-primary btn-file"> 
				<span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                  <input type="file" accept="application/pdf, application/zip"   name="other_document">
                  </span> 
				  
				  <?php if($gn_2['other_document']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_2['other_document']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
				  </div>
              </div>
			  </div>
               
              </div>
            </div>
			
            <div class="col-md-12 text-right">
             <button class="btn btn-default prevBtn pull-left" type="button">Previous</button>
              <button type="submit" class="btn btn-primary">Save & Next</button>
            </div>
            </form>
          </div>
          
          
          
          <div class="row setup-content" id="step-3">
          	<form  role="form" action="<?php echo base_url(); ?>form1/process_generation_3" method="post" enctype="multipart/form-data">
			 
            <div class="col-md-12">
              <div class="sub-part">
                <h5>19) Location, Land, Water & Infrastructure </h5>
                <div class="form-group col-md-12">
				
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[location_geological_coord]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[location_geological_coord]']; } ?></span></div>
                  <label>a) Geological Coordinates(Geographic Coordinates (of at least four corners) – indicating the corners in the NESW directions)</label>
                  <textarea required=""  class="form-control" rows="5" id="" name="phase1_loc_lan_wat[location_geological_coord]"><?php echo $gn_3['location_geological_coord'];?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[location_weather_located]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[location_weather_located]']; } ?></span></div>
                  <label>b) Whether located in Backward area (attracting concession from State Govt., please specify)(please specify details of the Grant/Concessions) </label>
                  <textarea required=""  class="form-control" rows="5" id=""  name="phase1_loc_lan_wat[location_weather_located]"><?php echo $gn_3['location_weather_located'];?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[location_mearest_forest]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[location_mearest_forest]']; } ?></span></div>
                  <label>c) Nearest Forest/ lake or any natural bodies, Bird Sanctuary or any such protected areas(Name and Distance from the site)</label>
                  <textarea required=""  class="form-control" rows="5" id=""  name="phase1_loc_lan_wat[location_mearest_forest]"><?php echo $gn_3['location_mearest_forest'];?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[location_mearest_port_distance]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[location_mearest_port_distance]']; } ?></span></div>
                  <label>d) Nearest Port/Distance(Name and Distance from Plant Location)</label>
                  <textarea required=""  class="form-control" rows="5" id=""  name="phase1_loc_lan_wat[location_mearest_port_distance]"><?php echo $gn_3['location_mearest_port_distance'];?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[location_railway_station_distance]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[location_railway_station_distance]']; } ?></span></div>
                  <label>e) Nearest Railway Station/ Distance(Name and Distance from Plant Location)</label>
                  <textarea required=""  class="form-control" rows="5" id=""  name="phase1_loc_lan_wat[location_railway_station_distance]"><?php echo $gn_3['location_railway_station_distance'];?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[location_nearest_national_highway]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[location_nearest_national_highway]']; } ?></span></div>
                  <label>f) Nearest national Highway/State Highway/District Roads(Names and Distances)</label>
                  <textarea required=""  class="form-control" rows="5" id=""  name="phase1_loc_lan_wat[location_nearest_national_highway]"><?php echo $gn_3['location_nearest_national_highway'];?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[location_coal_gas_source]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[location_coal_gas_source]']; } ?></span></div>
                  <label>g) Coal/Gas Source(Name of the Source, distance from the plant)</label>
                  <textarea required=""  class="form-control" rows="5" id=""  name="phase1_loc_lan_wat[location_coal_gas_source]"><?php echo $gn_3['location_coal_gas_source'];?></textarea>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h5>20) Land requirement & availability</h5>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[land_classification_current]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[land_classification_current]']; } ?></span></div>
                  <label>a) Classification/Current Use of land and ownership(Whether Forest/Agriculture/Commercial or Industrial land. If combination, please specify the break-up 
                    whether Government/Private Land/Others)</label>
                  <textarea required=""  class="form-control" rows="5" id=""  name="phase1_loc_lan_wat[land_classification_current]"><?php echo $gn_3['land_classification_current'];?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[land_land_required]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[land_land_required]']; } ?></span></div>
                  <label>b) Land Required for the entire plant as per DPR(In acres. Please specify the  acre/MW, (as per DPR))</label>
                  <textarea required=""  class="form-control" rows="5" id=""   name="phase1_loc_lan_wat[land_land_required]"><?php echo $gn_3['land_land_required'];?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[land_land_required_for_main_plant]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[land_land_required_for_main_plant]']; } ?></span></div>
                  <label>c) Land Required for Main Plant(In acres)</label>
                  <textarea required=""  class="form-control" rows="5" id=""   name="phase1_loc_lan_wat[land_land_required_for_main_plant]"><?php echo $gn_3['land_land_required_for_main_plant'];?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[land_acquired_till_date]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[land_acquired_till_date]']; } ?></span></div>
                  <label>d) Land Acquired till date(Please specify the details)</label>
                  <textarea required=""  class="form-control" rows="5" id=""   name="phase1_loc_lan_wat[land_acquired_till_date]"><?php echo $gn_3['land_acquired_till_date'];?></textarea>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h5>21) Fuel related details</h5>
                <div class="form-group col-md-12">
                  
                  <div class="clearfix"></div>
                  <div class="col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_domestic_coal_gas]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_domestic_coal_gas]']; } ?></span></div>
				  <label>a) Domestic coal/Gas </label>
                    <input required="" type="text"  class="form-control" placeholder="GCV"  name="phase1_loc_lan_wat[fuel_domestic_coal_gas]" value="<?php echo $gn_3['fuel_domestic_coal_gas'];?>">
                  </div>
                  <div class="col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_request_per_annum_capacity]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_request_per_annum_capacity]']; } ?></span></div>
				   <label>GCV </label>
                    <input required="" type="text"  name="phase1_loc_lan_wat[fuel_request_per_annum_capacity]" value="<?php echo $gn_3['fuel_request_per_annum_capacity'];?>" pattern='^\d+(?:\.\d{1,2})?$' step='0.01' class="form-control" placeholder="Requirement per annum @100% capacity">
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-12">
                 
                  <div class="clearfix"></div>
                  <div class="col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_imported_call]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_imported_call]']; } ?></span></div>
					 <label>b) Imported Coal</label>
                    <input required="" type="text" class="form-control" placeholder="GCV" name="phase1_loc_lan_wat[fuel_imported_call]" value="<?php echo $gn_3['fuel_imported_call'];?>">
                  </div>
                  <div class="col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_imported_call_request_per_annum_capacity]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_imported_call_request_per_annum_capacity]']; } ?></span></div>
				   <label>Requirement per annum </label>
                    <input required="" type="text" class="form-control"  name="phase1_loc_lan_wat[fuel_imported_call_request_per_annum_capacity]" value="<?php echo $gn_3['fuel_imported_call_request_per_annum_capacity'];?>" placeholder="Requirement per annum @100% capacity" pattern='^\d+(?:\.\d{1,2})?$' step='0.01'>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_plan_meeting_fuel_requirement]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_plan_meeting_fuel_requirement]']; } ?></span></div>
                  <label>c) Plan for meeting the fuel requirement of plant life </label>
                  <div class="clearfix"></div>
                  <div class="col-md-12">
                    <input required="" type="text" class="form-control" placeholder="" name="phase1_loc_lan_wat[fuel_plan_meeting_fuel_requirement]" value="<?php echo $gn_3['fuel_plan_meeting_fuel_requirement'];?>">
                  </div>
                  <div class="clearfix"></div>
                </div>
                <h5>d) Details of LOA/fuel supply agreement</h5>
                <div class="form-group col-md-12">
                  <div class="col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_loa_with]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_loa_with]']; } ?></span></div>
                    <label>i) LOA with </label>
                    <div class="attach">
                      <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[fuel_loa_with]" value="<?php echo $gn_3['fuel_loa_with'];?>">
                      <span class="btn btn-primary btn-file attach-c" style="right:<?php if($gn_3['fuel_loa_with_attach']){echo "42px;"; }else{echo "0px;"; } ?>"> 
					  <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  name="fuel_loa_with_attach" >
                      </span>
					  
					<?php if($gn_3['fuel_loa_with_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_3['fuel_loa_with_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					
					  </div>
                  </div>
				  
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_loa_date]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_loa_date]']; } ?></span></div>
                    <label>ii) LOA Date</label>
                    <input required="" type="text" class="span2 form-control" id="dp3" placeholder="dd/mm/yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" name="phase1_loc_lan_wat[fuel_loa_date]" value="<?php echo $gn_3['fuel_loa_date'];?>">
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_quantum_fuel_supply]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_quantum_fuel_supply]']; } ?></span></div>
                    <label>iii) Quantum of fuel supply</label>
                    <input required="" type="number" class="form-control" placeholder=""  name="phase1_loc_lan_wat[fuel_quantum_fuel_supply]" value="<?php echo $gn_3['fuel_quantum_fuel_supply'];?>" pattern='^\d+(?:\.\d{1,2})?$' step='0.01' >
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_validity_of_loa]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_validity_of_loa]']; } ?></span></div>
                    <label>iv) Validity of LOA </label>
                    <input required="" type="text" class="form-control" placeholder=""   name="phase1_loc_lan_wat[fuel_validity_of_loa]" value="<?php echo $gn_3['fuel_validity_of_loa'];?>">
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[cmmitments]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[cmmitments]']; } ?></span></div>
                    <label>v) Obligation/commitments (Guarantee/bonds)</label>
                    <input required="" type="text" class="form-control" placeholder=""  name="phase1_loc_lan_wat[cmmitments]" value="<?php echo $gn_3['cmmitments'];?>">
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_supply_agreement]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_supply_agreement]']; } ?></span></div>
                    <label>vi) Fuel Supply Agreement</label>
                    <div class="attach">
                      <input required="" type="text" class="form-control"   name="phase1_loc_lan_wat[fuel_supply_agreement]" value="<?php echo $gn_3['fuel_supply_agreement'];?>">
                      <span class="btn btn-primary btn-file attach-c" style="right:<?php if($gn_3['fuel_supply_agreement_attachment']){echo "42px;"; }else{echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  name="fuel_supply_agreement_attachment" >
                      </span> 
					  
					  <?php if($gn_3['fuel_supply_agreement_attachment']) { ?>
					<a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_3['fuel_supply_agreement_attachment']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					
					  </div>
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_annual_contracted_quantity]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_annual_contracted_quantity]']; } ?></span></div>
                    <label>vii) Annual contacted quantity</label>
                    <input required="" type="number" class="form-control" placeholder=""  name="phase1_loc_lan_wat[fuel_annual_contracted_quantity]" value="<?php echo $gn_3['fuel_annual_contracted_quantity'];?>" pattern='^\d+(?:\.\d{1,2})?$' step='0.01' >
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_end_use_application]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_end_use_application]']; } ?></span></div>
                    <label>viii) End-Use application</label>
                    <input required="" type="text" class="form-control" placeholder=""  name="phase1_loc_lan_wat[fuel_end_use_application]" value="<?php echo $gn_3['fuel_end_use_application'];?>">
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_compensation_for_short]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_compensation_for_short]']; } ?></span></div>
                    <label>ix) Compensation for short supply/lifting</label>
                    <input required="" type="number" class="form-control"  name="phase1_loc_lan_wat[fuel_compensation_for_short]" placeholder="" value="<?php echo $gn_3['fuel_compensation_for_short'];?>" step='0.01' >
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <label>x) Price </label>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_price]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_price]']; } ?></span></div>
					 <label>Base Price </label>
                      <input required=""  type="number" step="0.01" class="form-control" placeholder="Base price"  name="phase1_loc_lan_wat[fuel_price]" value="<?php echo $gn_3['fuel_price'];?>">
                    </div>
                    <div class="col-md-6">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_escalation]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_escalation]']; } ?></span></div>
					<label>Escalation </label>
                      <input required="" type="text" class="form-control" placeholder="Escalation" name="phase1_loc_lan_wat[fuel_escalation]" value="<?php echo $gn_3['fuel_escalation'];?>">
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h5>13) Water related details </h5>
                <h5>a) Quantum of water required </h5>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[water_per_day]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[water_per_day]']; } ?></span></div>
                  <label>i) Per day</label>
                  <input required="" type="text" class="form-control" placeholder="Core" name="phase1_loc_lan_wat[water_per_day]" value="<?php echo $gn_3['water_per_day'];?>">
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[water_per_annum]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[water_per_annum]']; } ?></span></div>
                  <label>ii) Per annum</label>
                  <input required="" type="text" class="form-control" placeholder="Non-Core" name="phase1_loc_lan_wat[water_per_annum]" value="<?php echo $gn_3['water_per_annum'];?>">
                </div>
                <h5>b) Source of water supply </h5>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[water_name_of_source]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[water_name_of_source]']; } ?></span></div>
                  <label>i) Name of source</label>
                  <input required="" type="text" class="form-control" placeholder="Core" name="phase1_loc_lan_wat[water_name_of_source]" value="<?php echo $gn_3['water_name_of_source'];?>">
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[water_distance]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[water_distance]']; } ?></span></div>
                  <label>ii) Distance </label>
                  <input required="" type="text" class="form-control" placeholder="Non-Core" name="phase1_loc_lan_wat[water_distance]" value="<?php echo $gn_3['water_distance'];?>">
                </div>
                <div class="clearfix"></div>
                <h5></h5>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[water_allocation]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[water_allocation]']; } ?></span></div>
                  <label>c) Allocation </label>
                  <div class="attach">
                    <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[water_allocation]" value="<?php echo $gn_3['water_allocation'];?>">
                    <span class="btn btn-primary btn-file attach-c" style="right:<?php if($gn_3['water_allocation_attach']){echo "42px;"; }else{echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input  type="file" accept="application/pdf, application/zip"  name="water_allocation_attach" >
                    </span> 
					
					  <?php if($gn_3['water_allocation_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_3['water_allocation_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					
					</div>
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[water_transportation]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[water_transportation]']; } ?></span></div>
                  <label>d) Transportation </label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[water_transportation]" value="<?php echo $gn_3['water_transportation'];?>">
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[water_cooling_system]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[water_cooling_system]']; } ?></span></div>
                  <label>e) Technology of cooling system</label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[water_cooling_system]" value="<?php echo $gn_3['water_cooling_system'];?>">
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h5>14) Hydro related </h5>
                <h5>a) Resettlement & Rehabilitation (R&R) impact </h5>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_resettlement]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_resettlement]']; } ?></span></div>
                  <label>i) No of villages affected</label>
                  <input required="" type="text" class="form-control" placeholder="" name="phase1_loc_lan_wat[hydro_resettlement]" value="<?php echo $gn_3['hydro_resettlement'];?>">
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_family_resettled]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_family_resettled]']; } ?></span></div>
                  <label>ii) No of families need to be resettled/rehabilitated</label>
                  <input required="" type="text" class="form-control" placeholder="" name="phase1_loc_lan_wat[hydro_family_resettled]" value="<?php echo $gn_3['hydro_family_resettled'];?>">
                </div>
                <h5>b) Environmental Impact of the project </h5>
                <div class="col-md-12">
                  <div class="attach"> <span class="btn btn-primary btn-file "> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input  type="file" accept="application/pdf, application/zip"  name="hydro_environmental_impact"  >
                    </span>
					
					  <?php if($gn_3['hydro_environmental_impact']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_3['hydro_environmental_impact']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>


					</div>
                </div>
                <div class="clearfix"></div>
                <div class="mtop1"></div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_extent_deforestation]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_extent_deforestation]']; } ?></span></div>
                  <label>i) Extent of deforestation of the project</label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[hydro_extent_deforestation]" value="<?php echo $gn_3['hydro_extent_deforestation'];?>">
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_flora_fauna]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_flora_fauna]']; } ?></span></div>
                  <label>ii) Steps required for protection of flora and fauna </label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[hydro_flora_fauna]" value="<?php echo $gn_3['hydro_flora_fauna'];?>">
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_forests_wildlife]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_forests_wildlife]']; } ?></span></div>
                  <label>iii) Steps required for protection of forests and wildlife </label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[hydro_forests_wildlife]" value="<?php echo $gn_3['hydro_forests_wildlife'];?>">
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_archaelogical_monuments]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_archaelogical_monuments]']; } ?></span></div>
                  <label>iv) Is there any submergence of any religious or archaeological monuments </label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[hydro_archaelogical_monuments]" value="<?php echo $gn_3['hydro_archaelogical_monuments'];?>">
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_degradation_catchment_area]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_degradation_catchment_area]']; } ?></span></div>
                  <label>v) Any Degradation of catchment area & surplusing of reservoir Due to the project </label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[hydro_degradation_catchment_area]" value="<?php echo $gn_3['hydro_degradation_catchment_area'];?>">
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_rock_mass_rating]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_rock_mass_rating]']; } ?></span></div>
                  <label>vi) Rock Mass Rating </label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[hydro_rock_mass_rating]" value="<?php echo $gn_3['hydro_rock_mass_rating'];?>">
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-12">
                  <h6>vii) Topography</h6>
                  <div class="form-group col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[typo_access_to_site]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[typo_access_to_site]']; } ?></span></div>
                    <label>vii.1) Access to the site </label>
                    <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[typo_access_to_site]" value="<?php echo $gn_3['typo_access_to_site'];?>">
                  </div>
                  <div class="form-group col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[typo_issue_pretaining_heavy_equipment]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[typo_issue_pretaining_heavy_equipment]']; } ?></span></div>
                    <label>vii.2) Issues pertaining to movement of heavy equipment/machinery to site </label>
                    <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[typo_issue_pretaining_heavy_equipment]" value="<?php echo $gn_3['typo_issue_pretaining_heavy_equipment'];?>">
                  </div>
                  <div class="form-group col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[typo_potential_land_side_problems]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[typo_potential_land_side_problems]']; } ?></span></div>
                    <label>vii.3) Potential land side problems if any </label>
                    <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[typo_potential_land_side_problems]" value="<?php echo $gn_3['typo_potential_land_side_problems'];?>">
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-12">
                  <h6>viii) Hydology</h6>
                  <div class="form-group col-md-6">
                    <label>viii.1) No of years for which data available </label>
                    <div class="attach">
                      <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[hydo_year_data_avail]"  value="<?php echo $gn_3['hydo_year_data_avail'];?>">
                      <span class="btn btn-primary btn-file attach-c" style="right:<?php if($gn_3['hydo_year_data_avail_attach']){echo "42px;"; }else{echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  name="hydo_year_data_avail_attach" >
                      </span>
					  
					   <?php if($gn_3['hydo_year_data_avail_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_3['hydo_year_data_avail_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>

					  </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[seismic_zone]'])) { echo $this->session->flashdata('step3')['phase1_loc_lan_wat[seismic_zone]']; } ?></span></div>
                  <label>ix) Seismic Zone </label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[seismic_zone]" value="<?php echo $gn_3['seismic_zone'];?>">
                </div>
              </div>
            </div>
			 
            <div class="col-md-12 text-right">
			<button class="btn btn-default prevBtn pull-left" type="button">Previous</button>
              <button type="submit" class="btn btn-primary">Save & Next</button>
            </div>
            </form>
          </div>
          
         
          <div class="row setup-content" id="step-4">
          	<form role="form" action="<?php echo base_url(); ?>form1/process_generation_4" method="post" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="sub-part">
                <h5>15) Project Construction and Implementation Details</h5>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['contract_project1'])) { echo $this->session->flashdata('step4')['contract_project1']; } ?></span></div>
                  <label>1) Contracting & Project Development(Construction contracts and type of bidding- whether Competitive Bidding or Negotiated Contract basis.)</label>
                  <textarea required=""  class="form-control" rows="5" name="contract_project1" value=""><?=$gn_4['contract_project1']?></textarea>
                </div>
                <div class="form-group col-md-12">
                  <div class="sub-part">
                    <h5>2) EPC Route</h5>
                    <div class="form-group col-md-12">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['contract_epc_route'])) { echo $this->session->flashdata('step4')['contract_epc_route']; } ?></span></div>
                      <label>a) Please provide the details of the current status of the EPC contacts </label>
                      <input required="" type="text" class="form-control" name="contract_epc_route"  value="<?=$gn_4['contract_epc_route']?>">
                    </div>
                    <h5>b) Provide the following details of each of the EPC contractors</h5>
                    <div class="form-group col-md-12">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['contract_contractor_past_record'])) { echo $this->session->flashdata('step4')['contract_contractor_past_record']; } ?></span></div>
                      <label>i) Experience and past track record of the Contractor</label>
                      <input required="" type="text" class="form-control" name="contract_contractor_past_record"  value="<?=$gn_4['contract_contractor_past_record']?>">
                    </div>
                    <div class="form-group col-md-12">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['contract_num_of_plants'])) { echo $this->session->flashdata('step4')['contract_num_of_plants']; } ?></span></div>
                      <label>ii) How many plants of the similar technology and size did the Contractor implement?</label>
                      <input required="" type="text" class="form-control" name="contract_num_of_plants" value="<?=$gn_4['contract_num_of_plants']?>">
                    </div>
                    <div class="form-group col-md-12">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['contract_installations_india'])) { echo $this->session->flashdata('step4')['contract_installations_india']; } ?></span></div>
                      <label>iii) List of all the installations/implementations in India</label>
                      <input required="" type="text" class="form-control" name="contract_installations_india" value="<?=$gn_4['contract_installations_india']?>">
                    </div>
                    <div class="form-group col-md-12">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['contract_installations_abroad'])) { echo $this->session->flashdata('step4')['contract_installations_abroad']; } ?></span></div>
                      <label>iv) List of all the installations/implementations in other countries</label>
                      <input required="" type="text" class="form-control" name="contract_installations_abroad" value="<?=$gn_4['contract_installations_abroad']?>">
                    </div>
                    <div class="form-group col-md-12">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['contract_past_project_implemeted_time_cost'])) { echo $this->session->flashdata('step4')['contract_past_project_implemeted_time_cost']; } ?></span></div>
                      <label>v) Whether the past projects were implemented in time and costs?</label>
                      <input required="" type="text" class="form-control" name="contract_past_project_implemeted_time_cost" value="<?=$gn_4['contract_past_project_implemeted_time_cost']?>">
                    </div>
                    <div class="form-group col-md-12">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['contract_years_in_business_tunover_employees'])) { echo $this->session->flashdata('step4')['contract_years_in_business_tunover_employees']; } ?></span></div>
                      <label>vi) Number of years in business, Turnover of the EPC Contractor and number of employees</label>
                      <input required="" type="text" class="form-control" name="contract_years_in_business_tunover_employees" value="<?=$gn_4['contract_years_in_business_tunover_employees']?>"> 
                    </div>
                    <div class="form-group col-md-12">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['contract_years_in_business'])) { echo $this->session->flashdata('step4')['contract_years_in_business']; } ?></span></div>
                      <label>vii) Number of years in business </label>
                      <input required="" type="text" class="form-control" name="contract_years_in_business" value="<?=$gn_4['contract_years_in_business']?>">
                    </div>
                    <div class="form-group col-md-12">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['contract_epc_contractor_group_company'])) { echo $this->session->flashdata('step4')['contract_epc_contractor_group_company']; } ?></span></div>
                      <label>viii) Whether the EPC Contractor is a group company</label>
                      <input required="" type="text" class="form-control" name="contract_epc_contractor_group_company" value="<?=$gn_4['contract_epc_contractor_group_company']?>">
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['contract_non_epc_route'])) { echo $this->session->flashdata('step4')['contract_non_epc_route']; } ?></span></div>
                  <label>3) Non-EPC Route (EPCM)(Status of Key Contracts for Main Plant Equipment & Works, Status of Key Contracts for Balance of Plant (BOP) packages, Details of Equipments Suppliers for Main Plant Equipment (BTG) ) </label>
                  <textarea required=""  class="form-control" rows="5"  name="contract_non_epc_route"><?=$gn_4['contract_non_epc_route']?></textarea>
                </div>
                <div class="form-group col-md-12">
                  <div class="sub-part">
                    <h5>4) Project Management Team</h5>
                    <div id="teammember">
                      <ul>
                      	<?php 
                      	if($gn_4['project_management_team_member'] != "N;" && !empty($gn_4['project_management_team_member'])){ 
                      		$unserialize=unserialize($gn_4['project_management_team_member']);
							foreach($unserialize as $item){ 
                      	?>
                        <li>
                          <div class="teamdiv">
                            <div class="form-group col-md-11">
							<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['project_management_team_member[]'])) { echo $this->session->flashdata('step4')['project_management_team_member[]']; } ?></span></div>
                              <label>Team Member</label>
                              <input required="" type="text" class="form-control" name="project_management_team_member[]" value="<?=$item?>">
                            </div>
                             <div class="form-group col-md-1"><label>Remove</label><div class="add-feild"><button type="button" id="removemember" class="btn btn-danger addsub" >X</button></div></div> 
                          </div>
                        </li>
                        <?php }}else{?>
                        	<li>
                          <div class="teamdiv">
                            <div class="form-group col-md-11">
							<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['project_management_team_member[]'])) { echo $this->session->flashdata('step4')['project_management_team_member[]']; } ?></span></div>
                              <label>Team Member</label>
                              <input required="" type="text" class="form-control" name="project_management_team_member[]" value="">
                            </div>
                             <div class="form-group col-md-1"><label>Remove</label><div class="add-feild"><button type="button" id="removemember" class="btn btn-danger addsub" disabled>X</button></div></div>
                          </div>
                        </li>
                        <?php } ?>
                      </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">
                      <label>Add Member (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addteammember" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['owners_engineer'])) { echo $this->session->flashdata('step4')['owners_engineer']; } ?></span></div>
                  <label>5) Owners Engineer(Please give the following details of the owner's Engineers)<br>
                    &raquo;	Name and Background and qualifications<br>
                    &raquo;  Past experience in power projects – number of similar projects done in the past, outside the group's projects </label>
				  <textarea required=""  class="form-control" rows="5" name="owners_engineer"><?=$gn_4['owners_engineer']?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['cost_overrun'])) { echo $this->session->flashdata('step4')['cost_overrun']; } ?></span></div>
                  <label>6) Cost Overrun: Please highlight the key clauses with respect to Change Request/LDs/Performance Guarantees and Caps under LDs in the Contacts and explain as to how cost overruns, if any, are taken care </label>
                  <textarea required=""  class="form-control" rows="5" name="cost_overrun"><?=$gn_4['cost_overrun']?></textarea>
                </div>
                <div class="form-group col-md-10">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['time_schedule'])) { echo $this->session->flashdata('step4')['time_schedule']; } ?></span></div>
                  <label>7) Time Schedule: Please provide project implementation schedule and current status in terms of the Key Milestones, highlighting the delays if any </label>
                  <textarea required=""  class="form-control" rows="5" name="time_schedule"><?=$gn_4['time_schedule']?></textarea>
                </div>
				<div class ="form-group col-md-2">
				<label>Attachment</label>
					 <div class="attach"> <span class="btn btn-primary btn-file "> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input  type="file" accept="application/pdf, application/zip"  name="time_schedule_file" >
                    </span> 
					<?php if($gn_4['time_schedule_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $gn_4['time_schedule_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					</div>
				</div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['om_contract'])) { echo $this->session->flashdata('step4')['om_contract']; } ?></span></div>
                  <label>8) <strong>O&M Contract</strong>- Please specify the status of the O&M Contract, and if already awarded, give the following details:<br>
                    &raquo;	Experience and past track record of the Contractor<br>
                    &raquo;	List of all the O&M contracts done in India </label>
                  <textarea required=""  class="form-control" rows="5" name="om_contract"><?=$gn_4['om_contract']?></textarea>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h5>16) List of Documents to be submitted CHECK LIST  (YES/NO) </h5>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['copies_of_licenses'])) { echo $this->session->flashdata('step4')['copies_of_licenses']; } ?></span></div>
                  <label>a) Copies of Licenses/Approvals obtained and/or the communication from authorities reflecting the current status of each of the Licenses/approvals</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" name="copies_of_licenses" value="1" <?php if($gn_4['copies_of_licenses']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="copies_of_licenses" value="0"  <?php if($gn_4['copies_of_licenses']=="0"){echo "checked";} ?>/>
                      No </label>

                  </div>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['project_allotment_letter'])) { echo $this->session->flashdata('step4')['project_allotment_letter']; } ?></span></div>
                  <label>b) Project Allotment Letter/ MOU signed with State/Central Government, if applicable </label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" name="project_allotment_letter" value="1"  <?php if($gn_4['project_allotment_letter']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="project_allotment_letter" value="0"  <?php if($gn_4['project_allotment_letter']=="0"){echo "checked";} ?>/>
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['dpr'])) { echo $this->session->flashdata('step4')['dpr']; } ?></span></div>
                  <label>c) Detailed Project Report (DPR) – </label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" name="dpr" value="1"  <?php if($gn_4['dpr']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="dpr" value="0"  <?php if($gn_4['dpr']=="0"){echo "checked";} ?>/>
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['feasibility_report'])) { echo $this->session->flashdata('step4')['feasibility_report']; } ?></span></div>
                  <label>d) Feasibility Report, Cost Estimates and any other studies conducted</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" name="feasibility_report" value="1"  <?php if($gn_4['feasibility_report']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="feasibility_report" value="0"  <?php if($gn_4['feasibility_report']=="0"){echo "checked";} ?>/>
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['hydrology_studies'])) { echo $this->session->flashdata('step4')['hydrology_studies']; } ?></span></div>
                  <label>e) Hydrology Studies ( In case of Small  Hydro Power)/Wind Assessment Report/Solar Radiation Report</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" name="hydrology_studies" value="1"  <?php if($gn_4['hydrology_studies']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="hydrology_studies" value="0"  <?php if($gn_4['hydrology_studies']=="0"){echo "checked";} ?>/>
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['land_search_report'])) { echo $this->session->flashdata('step4')['land_search_report']; } ?></span></div>
                  <label>f) Land search report showing chain of transaction leading to present owner for the last 12 years</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" name="land_search_report" value="1"  <?php if($gn_4['land_search_report']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="land_search_report" value="0"  <?php if($gn_4['land_search_report']=="0"){echo "checked";} ?>/>
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['mutation_of_all_transaction'])) { echo $this->session->flashdata('step4')['mutation_of_all_transaction']; } ?></span></div>
                  <label>g) Mutation of all transaction for the last 12 years sanctioned by A.C. Gr.-II. </label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" name="mutation_of_all_transaction" value="1"  <?php if($gn_4['mutation_of_all_transaction']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="mutation_of_all_transaction" value="0"  <?php if($gn_4['mutation_of_all_transaction']=="0"){echo "checked";} ?>/>
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['proof_of_acquisition_land'])) { echo $this->session->flashdata('step4')['proof_of_acquisition_land']; } ?></span></div>
                  <label>h) Proof of acquisition of land </label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" name="proof_of_acquisition_land"  value="1"   <?php if($gn_4['proof_of_acquisition_land']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="proof_of_acquisition_land"  value="0"  <?php if($gn_4['proof_of_acquisition_land']=="0"){echo "checked";} ?>/>
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['letter_allocation_allotment_assurance_fuel_water'])) { echo $this->session->flashdata('step4')['letter_allocation_allotment_assurance_fuel_water']; } ?></span></div>
                  <label>i) Letter of Allocation, Allotment or Assurance on Fuel and Water</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" name="letter_allocation_allotment_assurance_fuel_water" value="1"  <?php if($gn_4['letter_allocation_allotment_assurance_fuel_water']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="letter_allocation_allotment_assurance_fuel_water" value="0"  <?php if($gn_4['letter_allocation_allotment_assurance_fuel_water']=="0"){echo "checked";} ?>/>
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['copies_fuel_supply_agreement_case'])) { echo $this->session->flashdata('step4')['copies_fuel_supply_agreement_case']; } ?></span></div>
                  <label>j) Copies of fuel supply agreement in case of Biomass </label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" name="copies_fuel_supply_agreement_case" value="1"  <?php if($gn_4['copies_fuel_supply_agreement_case']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="copies_fuel_supply_agreement_case" value="0"  <?php if($gn_4['copies_fuel_supply_agreement_case']=="0"){echo "checked";} ?>/>
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['copies_of_major_contracts'])) { echo $this->session->flashdata('step4')['copies_of_major_contracts']; } ?></span></div>
                  <label>k) Copies of the major Contracts/Agreements entered into – for Project engineering, procurement and construction </label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" name="copies_of_major_contracts" value="1"  <?php if($gn_4['copies_of_major_contracts']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="copies_of_major_contracts" value="0"  <?php if($gn_4['copies_of_major_contracts']=="0"){echo "checked";} ?>/>
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['project_layout_diagram'])) { echo $this->session->flashdata('step4')['project_layout_diagram']; } ?></span></div>
                  <label>l) Project Layout Diagram</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" name="project_layout_diagram" value="1"  <?php if($gn_4['project_layout_diagram']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="project_layout_diagram" value="0"  <?php if($gn_4['project_layout_diagram']=="0"){echo "checked";} ?>/>
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['pert_cpm_charts'])) { echo $this->session->flashdata('step4')['pert_cpm_charts']; } ?></span></div>
                  <label>m) PERT/CPM charts showing the detailed schedule of the project </label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" name="pert_cpm_charts" value="1"  <?php if($gn_4['pert_cpm_charts']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="pert_cpm_charts" value="0"  <?php if($gn_4['pert_cpm_charts']=="0"){echo "checked";} ?>/>
                      No </label>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                  <h6>n) List of all the Consultants with name, experience, contact persons details</h6>
                  <div class="clearfix"></div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['list_of_consltants'])) { echo $this->session->flashdata('step4')['list_of_consltants']; } ?></span></div>
                    <label>i) DPR </label>
                    <div class="">
                      <label class="radio-inline">
                        <input required="" type="radio" name="list_of_consltants" value="1"  <?php if($gn_4['list_of_consltants']=="1"){echo "checked";} ?> />
                        Yes </label>
                      <label class="radio-inline">
                        <input required="" type="radio" name="list_of_consltants" value="0"  <?php if($gn_4['list_of_consltants']=="0"){echo "checked";} ?>/>
                        No </label>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label>ii) Project Management </label>
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['project_management'])) { echo $this->session->flashdata('step4')['project_management']; } ?></span></div>
                    <div class="">
                      <label class="radio-inline">
                        <input required="" type="radio" name="project_management" value="1"  <?php if($gn_4['project_management']=="1"){echo "checked";} ?> />
                        Yes </label>
                      <label class="radio-inline">
                        <input required="" type="radio" name="project_management" value="0"  <?php if($gn_4['project_management']=="0"){echo "checked";} ?>/>
                        No </label>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['detailed_engineering'])) { echo $this->session->flashdata('step4')['detailed_engineering']; } ?></span></div>
                    <label>iii) Detailed Engineering </label>
                    <div class="">
                      <label class="radio-inline">
                        <input required="" type="radio" name="detailed_engineering" value="1"  <?php if($gn_4['detailed_engineering']=="1"){echo "checked";} ?> />
                        Yes </label>
                      <label class="radio-inline">
                        <input required="" type="radio" name="detailed_engineering" value="0"  <?php if($gn_4['detailed_engineering']=="0"){echo "checked";} ?>/>
                        No </label>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['owners_engineers'])) { echo $this->session->flashdata('step4')['owners_engineers']; } ?></span></div>
                    <label>iv) Owner's Engineers </label>
                    <div class="">
                      <label class="radio-inline">
                        <input required="" type="radio" name="owners_engineers" value="1"  <?php if($gn_4['owners_engineers']=="1"){echo "checked";} ?> />
                        Yes </label>
                      <label class="radio-inline">
                        <input required="" type="radio" name="owners_engineers" value="0"  <?php if($gn_4['owners_engineers']=="0"){echo "checked";} ?>/>
                        No </label>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['procurement'])) { echo $this->session->flashdata('step4')['procurement']; } ?></span></div>
                    <label>v) Procurement </label>
                    <div class="">
                      <label class="radio-inline">
                        <input required="" type="radio" name="procurement" value="1"  <?php if($gn_4['procurement']=="1"){echo "checked";} ?> />
                        Yes </label>
                      <label class="radio-inline">
                        <input required="" type="radio" name="procurement" value="0"  <?php if($gn_4['procurement']=="0"){echo "checked";} ?>/>
                        No </label>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['contractor_for_main_plant_bop'])) { echo $this->session->flashdata('step4')['contractor_for_main_plant_bop']; } ?></span></div>
                    <label>vi) Contractors (for Main Plant and BOP) </label>
                    <div class="">
                      <label class="radio-inline">
                        <input required="" type="radio" name="contractor_for_main_plant_bop" value="1"  <?php if($gn_4['contractor_for_main_plant_bop']=="1"){echo "checked";} ?> />
                        Yes </label>
                      <label class="radio-inline">
                        <input required="" type="radio" name="contractor_for_main_plant_bop" value="0"  <?php if($gn_4['contractor_for_main_plant_bop']=="0"){echo "checked";} ?>/>
                        No </label>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['supplier_main_plant_machine_btg_package'])) { echo $this->session->flashdata('step4')['supplier_main_plant_machine_btg_package']; } ?></span></div>
                    <label>vii) Suppliers of Main Plant & Machinery (BTG packages) </label>
                    <div class="">
                      <label class="radio-inline">
                        <input required="" type="radio" name="supplier_main_plant_machine_btg_package" value="1"  <?php if($gn_4['supplier_main_plant_machine_btg_package']=="1"){echo "checked";} ?> />
                        Yes </label>
                      <label class="radio-inline">
                        <input required="" type="radio" name="supplier_main_plant_machine_btg_package" value="0"  <?php if($gn_4['supplier_main_plant_machine_btg_package']=="0"){echo "checked";} ?>/>
                        No </label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
			 
            <!-- <div class="col-md-12 text-center">
			<h3> <button type="submit" class="fa fa-hand-o-right">Entity Details</button></h3>
             <h3><a href="http://techximumproject.com/recl/form/phase2/" target="_blank"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Entity Details</a></h3>
            </div>-->
            <div class="col-md-12 text-right">
				<button class="btn btn-default prevBtn pull-left" type="button">Previous</button>
              <button type="submit" class="btn btn-primary">Save & Next</button>
            </div>
            </form>
          </div>
          
          <div class="row setup-content" id="step-5">
          	<form role="form" action="<?php echo base_url(); ?>form1/process_generation_agree" method="post" enctype="multipart/form-data">
            <div class="col-md-12 generalcontain">
			
              <h3><u>DECLARATION FORM</u></h3>
              <p>I/we confirm/affirm and undertake as below: -</p>
              <ul class="geninstruction">
                <li>That no insolvency proceedings initiated against me/us nor have I/we ever been adjudicated insolvent. Further, that no litigation is pending against the securities proposed to be offered in shape of movable or immovable, in any court in India or outside India</li>
                <li>That neither I have been defaulter of any bank or financial institution nor any accounts has been written off by any bank/financial institution and that my name doesn't appear in RBI caution list/defaulter list etc</li>
                <li>I am /we are not  closely related to any of the Directors of REC</li>
                <li>That I /we have read the application form and am/are aware of all the term and conditions of availing finance from REC. I also authorize REC to exchange, share, part with all the information relating to me/our loan details and repayment history information to other bank/financial institution/credit bureaus/agencies as may be required and shall not hold the REC for use of this information.</li>
                <li>I/we shall furnish any information required by REC to process my application for loan and also to be bound by the rules or by the revised additional terms and conditions which may at any time hereafter be made while the loan obtained by me is still outstanding</li>
                <li>And the information given in the application is correct, complete and up to date in all respects and I/we have not withheld any information.</li>
                <li>We undertake that any photocopied document submitted along with loan application format or during the appraisal process or any time thereafter is exact copy of original document. </li>
                <li>Any material discrepancy/deviation subsequently found in any particulars herein furnished would entitle REC to treat the loan application as defunct, in which case the processing fees already paid would be forfeited and  a fresh application would be required to be filed to seek financial assistance from REC</li>
                <li>All information pertaining to borrower and all promoters including information contained in Loan application form including Information memorandum prepared by Lead Bank/FI or syndicator or company or any annexure thereto are true, correct, updated, accurate and is neither misleading nor qualified. We undertake that all information pertaining to promoters has been obtained from authorized representatives of promoters</li>
                <li>We understand that information furnished by REC towards project, borrower or promoters forms the basis of appraisal. We undertake to inform REC of any up-dations on all/any information furnished to REC for appraisal and undertake to notify REC in writing and in a prompt manner of any of the fact, matter or circumstance (whether existing on or before the submission of Loan application form or arising afterwards) which would could reasonably be expected to cause any of the information given to become, in any manner untrue, inaccurate, in complete or misleading.</li>
                <li>We undertake that any change in promoter group structure will be immediately   communicated to REC</li>
                <li>The information given herein before and the Statements and other papers enclosed are to the best of our knowledge and belief, true and correct in all particulars.</li>
                <li>No borrowing arrangements except as indicated above are made.</li>
                <li>No legal action is being taken against me/us.</li>
                <li>I/We shall furnish all other information that may be required by you in connection with the application.</li>
                <li>REC or its nominees or any other agency authorized by REC may at any time inspect/ verify our assets, books of accounts, etc., in my / our factory & business premises.</li>
                <li>We acknowledge and accept that mere submission of above documents alone will not entitle an applicant for registration and sanction of loan.</li>
                <li>We accept that REC is having its right to reject any loan application at any stage</li>
              </ul>
			   <div class="form-group">
                <div class="col-md-4">
                
                    <label>Place </label>
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step5')['place'])) { echo $this->session->flashdata('step5')['place']; } ?></span></div>
                      <input  class="form-control" type="text" name="place" placeholder="Place" value="<?php echo $gn_a['place']?>" required/>
                     
                </div>
				<div class="col-md-4">
                
                    <label>Date </label>
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step5')['date'])) { echo $this->session->flashdata('step5')['date']; } ?></span></div>
                      <input  class="form-control" id="dp31" type="text" name="date" placeholder="Date" value="<?php echo $gn_a['date']?>" required/>
                     
                </div>
				
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="checkbox">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step5')['declaration_agree'])) { echo $this->session->flashdata('step5')['declaration_agree']; } ?></span></div>
                    <label>
                      <input required="" type="checkbox" name="declaration_agree" value="1"<?php if($gn_a['declaration_agree'] == 1 ){echo "checked"; }?> />
                      I agree with the terms above. </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 text-right">
				<button class="btn btn-default prevBtn pull-left" type="button">Previous</button>
              <button type="submit" class="btn btn-primary">Save & go to Entity appraisal form</button>
            </div>
           </form>
          </div>
        </div>
      </div>
    </div>
    <div class="renewalthings">
      <div class="container">
        <div class="stepwizard">
          <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step rn_renew rn_renew1"> <a href="#renew-1" id="idRen" type="button" class="btn btn-circle btn-primary">1</a>
              <p>Step 1</p>
            </div>
            <div class="stepwizard-step rn_renew rn_renew2"> <a href="#renew-2" id="idRen1" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
              <p>Step 2</p>
            </div>
            <div class="stepwizard-step rn_renew rn_renew3"> <a href="#renew-3" id="idRen2" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
              <p>Step 3</p>
            </div>
            <div class="stepwizard-step rn_renew rn_renew4"> <a href="#renew-4" id="idRen3" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
              <p>Step 4</p>
            </div>
            <div class="stepwizard-step rn_renew rn_renew5"> <a href="#renew-5" id="idRen4" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
              <p>Step 5</p>
            </div>
            <div class="stepwizard-step rn_renew rn_renew6"> <a href="#renew-6" id="idRen5" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
              <p>Step 6</p>
            </div>
          </div>
        </div>
      </div>
	
      <div class="container">
	  <div class="loan-form">
          <div class="row setup-content" id="renew-1">
          	<form role="form" action="<?php echo base_url(); ?>form1/process_rn_1" method="post" enctype="multipart/form-data">
			
            <div class="col-md-12 text-center">
              <h2 class="formheading">Renewable Form</h2>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h4>A. Project Summary</h4>
                <div class="form-group col-md-12">
				
			<?php if(isset($this->session->flashdata('step1')['rn_aproject_name'])) { ?>
			  
			  <div class="has-error"><span class="help-block">
			  
			  <?php echo  $this->session->flashdata('step1')['rn_aproject_name']; ?>
			  
			  </span></div>
			  
			    
			  <?php } ?>
			  
			  
                  <label>1) Project Name</label>
                  <input required="" type="text" class="form-control" name="rn_aproject_name" value="<?php print($rn_1['rn_aproject_name']); ?>">
                </div>
				
				<div class="form-group col-md-12">
				
				<?php if(isset($this->session->flashdata('step1')['project_type'])) { ?>
			  
			  <div class="has-error"><span class="help-block">
			  
			  <?php echo  $this->session->flashdata('step1')['project_type']; ?>
			  
			  </span></div>
			  
			    
			  <?php } ?>
			  
                  <label>2) Project Type</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required class="radioChange" type="radio" value="Wind" name="project_type" id="radio-1-1" <?php if($rn_1['project_type'] == "Wind"){echo "checked";}?>/>
                      Wind </label>
                    <label class="radio-inline">
                      <input  required class="radioChange" type="radio" value="Solar" name="project_type" id="radio-1-2" <?php if($rn_1['project_type'] == "Solar"){echo "checked";}?>/>
                      Solar </label>
                    <label class="radio-inline">
                      <input required class="radioChange" type="radio" value="Solar-thermal" name="project_type" id="radio-1-3" <?php if($rn_1['project_type'] == "Solar-thermal"){echo "checked";}?>/>
                      Solar-thermal </label>
                    <label class="radio-inline">
                      <input required class="radioChange" type="radio"  value="Biomass" name="project_type" id="radio-1-4" <?php if($rn_1['project_type'] == "Biomass"){echo "checked";}?>/>
                      Biomass </label>
                    <label class="radio-inline">
                      <input required class="radioChange" type="radio" value="Small hydro" name="project_type" id="radio-1-5" <?php if($rn_1['project_type'] == "Small hydro"){echo "checked";}?>/>
                      Small hydro </label>
                    <label class="radio-inline">
                      <input required class="radioChange" type="radio" value="Waste to energy" name="project_type" id="radio-1-6" <?php if($rn_1['project_type'] == "Waste to energy"){echo "checked";}?>/>
                      Waste to energy </label>
                    <label class="radio-inline">
                      <input required class="radioChange" type="radio" value="Others" name="project_type" id="radio-1-7" <?php if($rn_1['project_type'] == "Others"){echo "checked";}?>/>
                      Others </label>
                    <br>
                    <br>
                    <div class="" id="otherfeildopen" style="display: <?php if($rn_1['project_type'] == "Others"){echo "block";}else{echo "none" ;}?>"> <span class="">
					
						
			<?php if(isset($this->session->flashdata('step1')['project_type_other'])) { ?>
			  
			  <div class="has-error"><span class="help-block">
			  
			  <?php echo  $this->session->flashdata('step1')['project_type_other']; ?>
			  
			  </span></div>
			  
			    
			  <?php } ?>
					
                      <input type="text" class="form-control"  name="project_type_other" value="<?php print_r($rn_1['project_type_other']); ?>" >
                      </span> </div>
                  </div>
                </div>
				
                <!--<div class="form-group col-md-12">
                  <label>2) Project Type</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" value="Wind" onClick="ShowHideRnwprotyp()" name="project_type" <?php if($rn_1['project_type'] == "Wind"){echo "checked";}?> />
                      Wind </label>
                    <label class="radio-inline">
                      <input required="" type="radio" value="Solar" onClick="ShowHideRnwprotyp()" name="project_type" <?php if($rn_1['project_type'] == "Solar"){echo "checked";}?>/>
                      Solar </label>
                    <label class="radio-inline">
                      <input required="" type="radio" value="Sola-thermal" onClick="ShowHideRnwprotyp()" name="project_type" <?php if($rn_1['project_type'] == "Sola-thermal"){echo "checked";}?>/>
                      Solar-thermal </label>
                    <label class="radio-inline">
                      <input required="" type="radio" value="Biomass" onClick="ShowHideRnwprotyp()" name="project_type" <?php if($rn_1['project_type'] == "Biomass"){echo "checked";}?>/>
                      Biomass </label>
                    <label class="radio-inline">
                      <input required="" type="radio" value="Small hydro" onClick="ShowHideRnwprotyp()" name="project_type" <?php if($rn_1['project_type'] == "small hydro"){echo "checked";}?>/>
                      Small hydro </label>
                    <label class="radio-inline">
                      <input required="" type="radio" value="Waste to energy" onClick="ShowHideRnwprotyp()" name="project_type" <?php if($rn_1['project_type'] == "Waste to energy"){echo "checked";}?>/>
                      Waste to Energy </label>
                    <label class="radio-inline">
                      <input required="" type="radio" value="Others" id="chkRnwprotyp" onClick="ShowHideRnwprotyp()" name="project_type" <?php if($rn_1['project_type'] == "Others"){echo "checked";}?> />
                      Others </label>
                    <br>
                    <br>
                    <div class="" id="dvRnwprotyp" style="display: <?php if($rn_1['project_type'] == "Others"){echo "block";}else{echo "none" ;}?>"> <span class="">
                      <input  type="text" class="form-control" name="project_type_other" value="<?php print_r($rn_1['project_type_other']); ?>">
                      </span> </div>
                  </div>
                </div>-->
                <div class="form-group col-md-6">
				
				<?php if(isset($this->session->flashdata('step1')['project_capacity'])) { ?>
			  
			  <div class="has-error"><span class="help-block">
			  
			  <?php echo  $this->session->flashdata('step1')['project_capacity']; ?>
			  
			  </span></div>
			  			    
			  <?php } ?>
			  
                  <label>3) Project Capacity (In Mw)</label>
                  <input required="" type="number" class="form-control project_mw" name="project_capacity" value="<?php print_r($rn_1['project_capacity']); ?>" >
                </div>
                <div class="form-group col-md-6">
				
				<?php if(isset($this->session->flashdata('step1')['location'])) { ?>
			  
			  <div class="has-error"><span class="help-block">
			  
			  <?php echo  $this->session->flashdata('step1')['location']; ?>
			  
			  </span></div>
			  			    
			  <?php } ?>
			  
                  <label>4) Location including Village Tehsil District State</label>
                  <input required="" type="text" class="form-control" name="location" value="<?php print_r($rn_1['location']); ?>" >
                </div>
                <div class="form-group col-md-12">
				
				<?php if(isset($this->session->flashdata('step1')['powersale1'])) { ?>
			  
			  <div class="has-error"><span class="help-block">
			  
			  <?php echo  $this->session->flashdata('step1')['powersale1']; ?>
			  
			  </span></div>
			  			    
			  <?php } ?>
			  
                  <label>5) Power Sale Arrangement</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" value="Captive" name="powersale1" onClick="$('#dvPowersale1111').hide();" <?php if($rn_1['powersale1'] == "Captive"){echo "checked";}?> />
                      Captive </label>
                    <label class="radio-inline">
                      <input required="" type="radio" value="Merchant" name="powersale1" onClick="$('#dvPowersale1111').hide();" <?php if($rn_1['powersale1'] == "Merchant"){echo "checked";}?>/>
                      Merchant </label>
                    <label class="radio-inline">
                      <input required="" type="radio" value="IPP" name="powersale1" onClick="$('#dvPowersale1111').hide();" <?php if($rn_1['powersale1'] == "IPP"){echo "checked";}?>/>
                      IPP </label>
                    <label class="radio-inline">
                      <input required="" type="radio" value="Others" id="chkPowersale1" name="powersale1" onClick="$('#dvPowersale1111').show();" <?php if($rn_1['powersale1'] == "Others"){echo "checked";}?>/>
                      Others </label>
                    <br>
                    <br>
                    <div class="" id="dvPowersale1111" style="display: <?php if($rn_1['powersale1'] == "Others"){echo "block";}else{echo "none" ;}?> "> <span class="">
					
					<?php if(isset($this->session->flashdata('step1')['chkPowersale1_othes'])) { ?>
					  
					  <div class="has-error"><span class="help-block">
					  
					  <?php echo  $this->session->flashdata('step1')['chkPowersale1_othes']; ?>
					  
					  </span></div>
									
					 <?php } ?>
					
                      <input type="text" class="form-control" name="chkPowersale1_othes" value="<?php print_r($rn_1['chkPowersale1_othes']); ?>" >
                      </span> </div>
                  </div>
                </div>
				
				
                <h5>6) Total Estimated Project Cost (In Rs. Cr.)</h5>
                <div class="form-group col-md-4">
				
				<?php if(isset($this->session->flashdata('step1')['cost_without_idc'])) { ?>
			  
			  <div class="has-error"><span class="help-block">
			  
			  <?php echo  $this->session->flashdata('step1')['cost_without_idc']; ?>
			  
			  </span></div>
			  			    
			  <?php } ?>
			  
                  <label>a. Project Cost without IDC</label>
                  <input required="" type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control cost_idc1" name="cost_without_idc" value="<?php print_r($rn_1['cost_without_idc']); ?>" >
                </div>
                <div class="form-group col-md-4">
				
				<?php if(isset($this->session->flashdata('step1')['idc'])) { ?>
			  
			  <div class="has-error"><span class="help-block">
			  
			  <?php echo  $this->session->flashdata('step1')['idc']; ?>
			  
			  </span></div>
			  			    
			  <?php } ?>
			  
                  <label>b. IDC (Interest During Construction)</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control idc_intrst1" name="idc" value="<?php print_r($rn_1['idc']); ?>" >
                </div>
				
                <div class="form-group col-md-4">
						
                  <label>c. Project Cost with IDC<!--System Calculated value =(a+b)--></label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control project_cost_idc_debt" readonly="" value="<?php print($rn_1['cost_with_idc']); ?>" >
                  <input required="" type="hidden" class="form-control project_cost_idc_debt1"  name="cost_with_idc" value="<?php print($rn_1['cost_with_idc']); ?>">
                </div>
                <div class="form-group col-md-4">
				
                  <label>7) Cost per MW(In Rs. Cr./Mw)<!--System Calculated value (=6.c/3)--></label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control costMW1" readonly="" value="<?php print($rn_1['cost_per_mw']); ?>" >
                  <input required="" type="hidden" class="form-control costMW11"  name="cost_per_mw" value="<?php print($rn_1['cost_per_mw']); ?>">
                </div>
				
                <div class="form-group col-md-4">
				
			<?php if(isset($this->session->flashdata('step1')['debt'])) { ?>
			  
			<div class="has-error"><span class="help-block">
			  
			<?php echo  $this->session->flashdata('step1')['debt']; ?>
			  
			</span></div>
			  			    
			<?php } ?>
			
                  <label>8) Debt % (In % of Project cost)</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control debt_percent1" name="debt" value="<?php print($rn_1['debt']); ?>">
                </div>
				
                <div class="form-group col-md-4">
				
				
			<?php if(isset($this->session->flashdata('step1')['equity'])) { ?>
			  
			<div class="has-error"><span class="help-block">
			  
			<?php echo  $this->session->flashdata('step1')['equity']; ?>
			  
			</span></div>
			  			    
			<?php } ?>
			
                  <label>9) Equity % (In % of Project cost)</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control equity_percent1" name="equity" value="<?php print($rn_1['equity']); ?>">
                </div>
				
                <div class="form-group col-md-4">
						
                  <label>10) Equity Amount<!--Calculated value =9/6--></label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control equityAmnt1"  readonly="" value="<?php print($rn_1['equity_amnt']); ?>">
                  <input required="" type="hidden" class="form-control equityAmnt11"  name="equity_amnt" value="<?php print($rn_1['equity_amnt']); ?>">
                </div>
				
                <div class="form-group col-md-4">
				
				<label>11) Debt Amount<!--Calculated value =8/6--></label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control debtAmnt1"  readonly="" value="<?php print($rn_1['debt_amnt']); ?>">
                  <input required="" type="hidden" class="form-control debtAmnt11" name="debt_amnt" value="<?php print($rn_1['debt_amnt']); ?>">
                </div>
				
                <div class="form-group col-md-4">
				
					
			<?php if(isset($this->session->flashdata('step1')['loan_reqst'])) { ?>
			  
			<div class="has-error"><span class="help-block">
			  
			<?php echo  $this->session->flashdata('step1')['loan_reqst']; ?>
			  
			</span></div>
			  			    
			<?php } ?>
			
                  <label>12) Loan Requested(In Rs. Cr.)</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01"  class="form-control" name="loan_reqst" value="<?php print($rn_1['loan_reqst']); ?>" >
                </div>
				
                <div class="form-group col-md-4">
				
				<?php if(isset($this->session->flashdata('step1')['lead_fi'])) { ?>
			  
			<div class="has-error"><span class="help-block">
			  
			<?php echo  $this->session->flashdata('step1')['lead_fi']; ?>
			  
			</span></div>
			  			    
			<?php } ?>
			
                  <label>13) Lead FI(If any)</label>
                  <input required=""  type="text" step="0.01"  class="form-control" name="lead_fi" value="<?php print($rn_1['lead_fi']); ?>">
                </div>
				
                <div class="form-group col-md-4">
				
				<?php if(isset($this->session->flashdata('step1')['cons_period'])) { ?>
			  
			<div class="has-error"><span class="help-block">
			  
			<?php echo  $this->session->flashdata('step1')['cons_period']; ?>
			  
			</span></div>
			  			    
			<?php } ?>
				
                  <label>14) Construction Period(in years)</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01"  class="form-control" name="cons_period" value="<?php print($rn_1['cons_period']); ?>">
                </div>
				
                <div class="form-group col-md-4">
				
				<?php if(isset($this->session->flashdata('step1')['loan_repay_period'])) { ?>
			  
			<div class="has-error"><span class="help-block">
			  
			<?php echo  $this->session->flashdata('step1')['loan_repay_period']; ?>
			  
			</span></div>
			  			    
			<?php } ?>
				
                  <label>15) Loan Repayment Period(in years)</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01"  class="form-control" name="loan_repay_period" value="<?php print($rn_1['loan_repay_period']); ?>">
                </div>
				
                <div class="form-group col-md-4">
				
				
				<?php if(isset($this->session->flashdata('step1')['prj_complt_date'])) { ?>
			  
			<div class="has-error"><span class="help-block">
			  
			<?php echo  $this->session->flashdata('step1')['prj_complt_date']; ?>
			  
			</span></div>
			  			    
			<?php } ?>
			
                  <label>16) Scheduled Project Completion date</label>
                  <input required="" type="text" class="span2 form-control" id="dp4" placeholder="dd/mm/yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" name="prj_complt_date" value="<?php print($rn_1['prj_complt_date']); ?>" >
                </div>
				 
                <div class="form-group col-md-4">
				
				<?php if(isset($this->session->flashdata('step1')['cost_without_roe'])) { ?>
			  
			<div class="has-error"><span class="help-block">
			  
			<?php echo  $this->session->flashdata('step1')['cost_without_roe']; ?>
			  
			</span></div>
			  			    
			<?php } ?>
			
                  <label>17) Levellised cost of generation Excluding RoE</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01"  class="form-control" name="cost_without_roe" value="<?php print($rn_1['cost_without_roe']); ?>" >
                </div>
				
				
				 <div class="form-group col-md-4">
				 
				 <?php if(isset($this->session->flashdata('step1')['awarding_project'])) { ?>
			  
			<div class="has-error"><span class="help-block">
			  
			<?php echo  $this->session->flashdata('step1')['awarding_project']; ?>
			  
			</span></div>
			  			    
			<?php } ?>
			
                  <label>18) Awarding of project</label>
                  <input required="" type="text"  class="form-control" name="awarding_project" value="<?php print($rn_1['awarding_project']); ?>" >
                </div>
               
			   <div class="form-group col-md-12">
			   
			    <?php if(isset($this->session->flashdata('step1')['type_consumer'])) { ?>
			  
			<div class="has-error"><span class="help-block">
			  
			<?php echo  $this->session->flashdata('step1')['type_consumer']; ?>
			  
			</span></div>
			  			    
			<?php } ?>
			   
                  <label>19) Type of consumer</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" value="Group Captive" name="type_consumer" onClick="$('#dvtypeconsumer').hide();" <?php if($rn_1['type_consumer'] == "Group Captive"){echo "checked";}?> />
                      Group Captive </label>
                    <label class="radio-inline">
                      <input required="" type="radio" value="DISCOMS/State Utility" name="type_consumer" onClick="$('#dvtypeconsumer').hide();" <?php if($rn_1['type_consumer'] == "DISCOMS/State Utility"){echo "checked";}?>/>
                      DISCOMS/State Utility </label>
                    <label class="radio-inline">
                      <input required="" type="radio" value="Trading Companies" name="type_consumer" onClick="$('#dvtypeconsumer').hide();" <?php if($rn_1['type_consumer'] == "Trading Companies"){echo "checked";}?>/>
                      Trading Companies </label>
                    <label class="radio-inline">
                      <input required="" type="radio" value="Others" id="chkPowersale1" name="type_consumer" onClick="$('#dvtypeconsumer').show();" <?php if($rn_1['type_consumer'] == "Others"){echo "checked";}?>/>
                      Others </label>
                    <br>
                    <br>
                    <div class="" id="dvtypeconsumer" style="display: <?php if($rn_1['type_consumer'] == "Others"){echo "block";}else{echo "none" ;}?> "> <span class="">
					
					<?php if(isset($this->session->flashdata('step1')['type_consumer_othes'])) { ?>
					  
					  <div class="has-error"><span class="help-block">
					  
					  <?php echo  $this->session->flashdata('step1')['type_consumer_othes']; ?>
					  
					  </span></div>
									
					 <?php } ?>
					
                      <input type="text" class="form-control" name="type_consumer_othes" value="<?php print_r($rn_1['type_consumer_othes']); ?>" >
                      </span> </div>
                  </div>
                </div>
			   
			   
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
              <div class="sub-part">
                <h4>B. Entity Summary</h4>
                <div class="form-group col-md-12">
				
			<?php if(isset($this->session->flashdata('step1')['borrower_name'])) { ?>
			  
			<div class="has-error"><span class="help-block">
			  
			<?php echo  $this->session->flashdata('step1')['borrower_name']; ?>
			  
			</span></div>
			  			    
			<?php } ?>
				
                  <label>1) Name of The Borrower</label>
                  <input required="" type="text" class="form-control" name="borrower_name"  value="<?php print($rn_1['borrower_name']); ?>" >
                </div>
                <div class="form-group col-md-12">
                  <div class="sub-part">
				  
				  				  
                    <h5>2) Name of Directors of the Borrower</h5>
                    <div id="borrowerdirector1">
                      <ul>
                        <?php if($rn_1['directors']){$directors = unserialize($rn_1['directors']); foreach($directors as $k=>$v){?>
                        <li>
                          <div class="dvborrowerdirector">
                            <div class="form-group col-md-11">
							
			<?php if(isset($this->session->flashdata('step1')['directors[]'])) { ?>
			  
			<div class="has-error"><span class="help-block">
			  
			<?php echo  $this->session->flashdata('step1')['directors[]']; ?>
			  
			</span></div>
			  			    
			<?php } ?>
							
                              	<label> Director</label> 
                              	 <input required="" type="text" class="form-control" name="directors[]" value="<?php echo $v;?>">
                            </div>
							<?php if($k>0){?>
							<div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removeborrowerdirector' class='btn btn-danger addsub'>X</button></div></div>
							<?php }?>                             
                          </div>
                        </li>
                        <?php }}else{?>
                        	<li>
                          <div class="dvborrowerdirector">
                            <div class="form-group col-md-11">
							
							<?php if(isset($this->session->flashdata('step1')['directors[]'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['directors[]']; ?>
							  
							</span></div>
											
							<?php } ?>
													
                              	<label> Director</label> 
                              	 <input required="" type="text" class="form-control" name="directors[]" value="">
                            </div>
							
							<div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removeborrowerdirector' class='btn btn-danger addsub'>X</button></div></div>
							                             
                          </div>
                        </li>
                       <?php }?>
                      </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">
                      <label>Add Director (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addborrowerdirector1" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="sub-part">
                    <h5>3) Details of Promoters of Borrower </h5>
                    
                    <div id="promotersdetails1">
                    	<?php if($rn_1a){ foreach($rn_1a as $pm){?>
                      <div class="promotersdiv">
                        <div class="form-group col-md-6">
						
						<?php if(isset($this->session->flashdata('step1')['promoter_name[]'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['promoter_name[]']; ?>
							  
							</span></div>
											
							<?php } ?>
						
                          <label>Name of The Promoters of Borrower</label>
                          <input value="<?php echo $pm['promoter_name'];?>" required="" class="form-control" type="text" name="promoter_name[]">
                        </div>
						
                        <div class="form-group col-md-6">
						
							<?php if(isset($this->session->flashdata('step1')['promoter_shareholding[]'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['promoter_shareholding[]']; ?>
							  
							</span></div>
											
							<?php } ?>
						
                          <label>% Shareholding of Promoter </label>
                          <input value="<?php echo $pm['promoter_shareholding'];?>" required="" class="form-control" type="text" name="promoter_shareholding[]">
                        </div>
						
                        <div class="form-group col-md-6">
						
						<?php if(isset($this->session->flashdata('step1')['promoter_phn[]'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['promoter_phn[]']; ?>
							  
							</span></div>
											
							<?php } ?>
							
                          <label>Phone No.</label>
                          <input value="<?php echo $pm['promoter_phn'];?>" required="" class="form-control"  type="text" maxlength="10" step="0.01"  name="promoter_phn[]">
                        </div>
						
                        <div class="form-group col-md-6">
						
						<?php if(isset($this->session->flashdata('step1')['promoter_email[]'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['promoter_email[]']; ?>
							  
							</span></div>
											
							<?php } ?>
							
                          <label>Email</label>
                          <input value="<?php echo $pm['promoter_email'];?>" required="" class="form-control" type="email" name="promoter_email[]">
                        </div>
						
                        <div class="form-group col-md-11">
						
						<?php if(isset($this->session->flashdata('step1')['promoter_add[]'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['promoter_add[]']; ?>
							  
							</span></div>
											
							<?php } ?>
							
                          <label>Address(Address of the Promoter) </label>
                          <input value="<?php echo $pm['promoter_add'];?>" required="" class="form-control" type="text" name="promoter_add[]">
                        </div>
                        <div class="form-group col-md-1">
                          <label>Remove</label>
                          <div class="add-feild">
                            <button type="button" class="btn btn-danger addsub" onclick="$(this).parent().parent().parent().remove()" >X</button>
                          </div>
                        </div>
                      </div>
                      <?php }}else{?>
                      	<div class="promotersdiv">
                        <div class="form-group col-md-6">
						
						
						<?php if(isset($this->session->flashdata('step1')['promoter_name[]'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['promoter_name[]']; ?>
							  
							</span></div>
											
							<?php } ?>
							
                          <label>Name of The Promoters of Borrower</label>
                          <input required="" class="form-control" type="text" name="promoter_name[]">
                        </div>
						
                        <div class="form-group col-md-6">
						
						<?php if(isset($this->session->flashdata('step1')['promoter_shareholding[]'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['promoter_shareholding[]']; ?>
							  
							</span></div>
											
							<?php } ?>
							
                          <label>% Shareholding of Promoter </label>
                          <input required="" class="form-control" type="text" name="promoter_shareholding[]">
                        </div>
						
						
                        <div class="form-group col-md-6">
						
						<?php if(isset($this->session->flashdata('step1')['promoter_phn[]'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['promoter_phn[]']; ?>
							  
							</span></div>
											
							<?php } ?>
							
                          <label>Phone No.</label>
                          <input required="" class="form-control"  type="text" maxlength="10" step="0.01"  name="promoter_phn[]">
                        </div>
						
						
                        <div class="form-group col-md-6">
						
							<?php if(isset($this->session->flashdata('step1')['promoter_email[]'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['promoter_email[]']; ?>
							  
							</span></div>
											
							<?php } ?>
							
                          <label>Email</label>
                          <input required="" class="form-control" type="email" name="promoter_email[]">
                        </div>
						
                        <div class="form-group col-md-11">
						
						<?php if(isset($this->session->flashdata('step1')['promoter_add[]'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['promoter_add[]']; ?>
							  
							</span></div>
											
							<?php } ?>
							
                          <label>Address(Address of the Promoter) </label>
                          <input required="" class="form-control" type="text" name="promoter_add[]">
                        </div>
                        <div class="form-group col-md-1">
                          <label>Remove</label>
                          <div class="add-feild">
                            <button type="button" class="btn btn-danger addsub" onclick="$(this).parent().parent().parent().remove()" >X</button>
                          </div>
                        </div>
                      </div>
                      <?php }?>
                    </div>
                    <div class="form-group col-md-12">
                      <label>Promoters (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addpromotersdetails1" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-12">
				
				<?php if(isset($this->session->flashdata('step1')['group_comp_name[]'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['group_comp_name[]']; ?>
							  
							</span></div>
											
							<?php } ?>
							
                  <label>4) Name of Group Company</label>
                  <input required="" type="text" class="form-control" name="group_comp_name" value="<?php print($rn_1['group_comp_name']); ?>">
                </div>
				
                <div class="form-group col-md-12">
				
				<?php if(isset($this->session->flashdata('step1')['group_company_struc[]'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['group_company_struc[]']; ?>
							  
							</span></div>
											
							<?php } ?>
							
                  <label>5) Structure of Group Company</label>
                  <textarea required=""  class="form-control" rows="5" id="txtPowersale" name="group_company_struc"><?php print($rn_1['group_company_struc']); ?></textarea>
                </div>
				
                <div class="form-group col-md-12">
				
					<?php if(isset($this->session->flashdata('step1')['promoter_contri[]'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['promoter_contri[]']; ?>
							  
							</span></div>
											
							<?php } ?>
							
                  <label>6) Promoter's Contribution(Equity Shares/CCPS/CCD/Others)</label>
                  <textarea required=""  class="form-control" rows="5" id="txtPowersale" name="promoter_contri"><?php print($rn_1['promoter_contri']); ?></textarea>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h4>C. KYC Details</h4>
                <div class="mtop1"></div>
                <div class="clearfix"></div>
                <div class="attachheading"> 1) Authorized Signatory For the Project
                  <div class="attach pull-right"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input  type="file" accept="application/pdf, application/zip"  name="auth_sign_prj" >
                    </span> 
					<?php if($rn_1['auth_sign_prj']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_1['auth_sign_prj']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					</div>
                </div>
                <div class="clearfix"></div>
				
                <div class="form-group col-md-4">
				
					<?php if(isset($this->session->flashdata('step1')['auth_sign_name'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['auth_sign_name']; ?>
							  
							</span></div>
											
							<?php } ?>
				
                  <label>a) Name</label>
                  <input required="" class="form-control" type="text" name="auth_sign_name" value="<?php print($rn_1['auth_sign_name']); ?>">
                </div>
				
                <div class="form-group col-md-4">
				<?php if(isset($this->session->flashdata('step1')['auth_sign_add'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['auth_sign_add']; ?>
							  
							</span></div>
											
							<?php } ?>
							
                  <label>b) Address</label>
                  <input required="" class="form-control" type="text" name="auth_sign_add" value="<?php print($rn_1['auth_sign_add']); ?>">
                </div>
				
                <div class="form-group col-md-4">
				
					<?php if(isset($this->session->flashdata('step1')['auth_sign_phn'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['auth_sign_phn']; ?>
							  
							</span></div>
											
							<?php } ?>
				
                  <label>c) Phone</label>
                  <input required="" class="form-control" type='text' maxlength="10" step='0.01'  name="auth_sign_phn" value="<?php print($rn_1['auth_sign_phn']); ?>">
                </div>
				
                <div class="form-group col-md-4">
				
				<?php if(isset($this->session->flashdata('step1')['auth_sign_email'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['auth_sign_email']; ?>
							  
							</span></div>
											
							<?php } ?>
							
                  <label>d) Email</label>
                  <input required="" class="form-control" type="email" name="auth_sign_email" value="<?php print($rn_1['auth_sign_email']); ?>">
                </div>
				
                <div class="form-group col-md-4">
				
					
				<?php if(isset($this->session->flashdata('step1')['auth_sign_pan'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['auth_sign_pan']; ?>
							  
							</span></div>
											
							<?php } ?>
				
                  <label>e) PAN</label>
                  <input required="" class="form-control" type="text" name="auth_sign_pan" pattern="[a-zA-z]{5}\d{4}[a-zA-Z]{1}" placeholder="ABCDS1234Y" value="<?php print($rn_1['auth_sign_pan']); ?>">
                </div>
				
                <div class="form-group col-md-4">
				
				<?php if(isset($this->session->flashdata('step1')['auth_sign_adhar'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['auth_sign_adhar']; ?>
							  
							</span></div>
											
							<?php } ?>
				
                  <label>f) Aadhar Number</label>
                  <input required="" class="form-control" type="text" pattern="^\d{4}\d{4}\d{4}$" name="auth_sign_adhar" value="<?php print($rn_1['auth_sign_adhar']); ?>" >
                </div>
                <div class="mtop1"></div>
                <div class="clearfix"></div>
                <div class="attachheading"> 2) Authorized Person on Behalf of Borrower 
                  <div class="attach pull-right"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input  type="file" accept="application/pdf, application/zip"   name="auth_person_file" >
                    </span> 
					<?php if($rn_1['auth_person_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_1['auth_person_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					</div>
                </div>
                <div class="clearfix"></div>
				
                <div class="form-group col-md-4">
				
				<?php if(isset($this->session->flashdata('step1')['auth_person_name'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['auth_person_name']; ?>
							  
							</span></div>
											
							<?php } ?>
				
                  <label>a) Name</label>
                  <input required="" class="form-control" type="text" name="auth_person_name" value="<?php print($rn_1['auth_person_name']); ?>">
                </div>
				
                <div class="form-group col-md-4">
				
				<?php if(isset($this->session->flashdata('step1')['auth_person_add'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['auth_person_add']; ?>
							  
							</span></div>
											
							<?php } ?>
				
                  <label>b) Address</label>
                  <input required="" class="form-control" type="text" name="auth_person_add" value="<?php print($rn_1['auth_person_add']); ?>">
                </div>
				
                <div class="form-group col-md-4">
				
				<?php if(isset($this->session->flashdata('step1')['auth_person_phn'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['auth_person_phn']; ?>
							  
							</span></div>
											
							<?php } ?>
				
                  <label>c) Phone</label>
                  <input required="" class="form-control" type='text'  maxlength="10" step='0.01'  name="auth_person_phn" value="<?php print($rn_1['auth_person_phn']); ?>">
                </div>
				
                <div class="form-group col-md-4">
				
				<?php if(isset($this->session->flashdata('step1')['auth_person_email'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['auth_person_email']; ?>
							  
							</span></div>
											
							<?php } ?>
				
                  <label>d) Email</label>
                  <input required="" class="form-control" type="email" name="auth_person_email" value="<?php print($rn_1['auth_person_email']); ?>">
                </div>
				
                <div class="form-group col-md-4">
				
					
				<?php if(isset($this->session->flashdata('step1')['auth_person_pan'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['auth_person_pan']; ?>
							  
							</span></div>
											
							<?php } ?>
				
                  <label>e) PAN</label>
                  <input required="" class="form-control" type="text" pattern="[a-zA-z]{5}\d{4}[a-zA-Z]{1}" placeholder="ABCDS1234Y" name="auth_person_pan" value="<?php print($rn_1['auth_person_pan']); ?>">
                </div>
				
                <div class="form-group col-md-4">
				
						
							<?php if(isset($this->session->flashdata('step1')['auth_person_adhar'])) { ?>
			  
							<div class="has-error"><span class="help-block">
							  
							<?php echo  $this->session->flashdata('step1')['auth_person_adhar']; ?>
							  
							</span></div>
											
							<?php } ?>
				
                  <label>f) Aadhar Number</label>
                  <input required="" class="form-control" type="text"  pattern="^\d{4}\d{4}\d{4}$" name="auth_person_adhar" value="<?php print($rn_1['auth_person_adhar']); ?>">
				  <?php if(isset($_GET['fid'])) { ?>
				  <input type="hidden" name="form_id" value="<?php  print_r($_GET['fid']); ?>">
				 <?php } ?>
                </div>
              </div>
            </div>
             
            <div class="col-md-12 text-right">
			
              <button type="submit" class="btn btn-primary">Save & Next</button>
            </div>
            </form>
          </div>
		  		  
		  
          <div class="row setup-content" id="renew-2">
		
          	<form role="form" action="<?php echo base_url(); ?>form1/process_rn_2" method="post" enctype="multipart/form-data">
			
            <div class="col-md-12">
              <div class="sub-part">
			 
                <h4>Project Details </h4>
                <div class="form-group ">
                  <div class="clearfix"></div>
                  <div class="attachheading"> 1) Means of Finance (Rs. Crore) as per below format in the form of attachment:
                    <div class="attach pull-right"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  name="means_finance_file" >
                      </span> 
					  <?php if($rn_2['means_finance_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_2['means_finance_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-12">
                    <table class="table table-bordered gentable">
                      <thead>
                        <tr>
                          <th>&nbsp;</th>
                          <th>Instrument</th>
                          <th>Voting%</th>
                          <th>Amount</th>
                          <th>Remarks</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span></span>
                            <div>Equity Contributors</div></td>
                          <td><span>Instrument</span>
                            <div>&nbsp;</div></td>
                          <td><span>Voting%</span>
                            <div>&nbsp;</div></td>
                          <td><span>Amount</span>
                            <div>&nbsp;</div></td>
                          <td><span>Remarks</span>
                            <div>&nbsp;</div></td>
                        </tr>
                        <tr>
                          <td><span></span>
                            <div>Debt Contributors</div></td>
                          <td><span>Instrument</span>
                            <div>&nbsp;</div></td>
                          <td><span>Voting%</span>
                            <div><strong>N.A</strong></div></td>
                          <td><span>Amount</span>
                            <div>&nbsp;</div></td>
                          <td><span>Remarks</span>
                            <div>&nbsp;</div></td>
                        </tr>
                        <tr>
                          <td><span></span>
                            <div><strong>Total</strong></div></td>
                          <td><span>Instrument</span>
                            <div>&nbsp;</div></td>
                          <td><span>Voting%</span>
                            <div>&nbsp;</div></td>
                          <td><span>Amount</span>
                            <div><strong>'X'</strong></div></td>
                          <td><span>Remarks</span>
                            <div>&nbsp;</div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="form-group col-md-12">
				  	<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['lead_bank'])) { echo $this->session->flashdata('step2')['lead_bank']; } ?></span></div>
                    <label>2) Name of the Lead Bank/Financial Institution </label>
                    <input required="" type="text" class="form-control" name="lead_bank" value="<?php print($rn_2['lead_bank']); ?>">
                  </div>
                  <div class="">
                    <div class="col-md-12">
                      <h6>3) Sanction details of other banks(if any)</h6>
                    </div>
					
                    <div id="insertbanktable1">
                    	<?php if($rn_2a){$i=0; foreach($rn_2a as $pm){?>
						
						 <input type="hidden" name="files[]" value="<?php print_r($pm['sanction_file']); ?>">
                      <div class="test1 test1_1">
                        <div class="form-group col-md-3">
						<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['bank_name[]'])) { echo $this->session->flashdata('step2')['bank_name[]']; } ?></span></div>
                          <label>Name of Bank/FI</label>
                          <input required="" type="text" class="form-control" name="bank_name[]" value="<?php echo $pm['bank_name']; ?>">
                        </div>
                        <div class="form-group col-md-3">
						<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['amnt[]'])) { echo $this->session->flashdata('step2')['amnt[]']; } ?></span></div>
                          <label>Amount</label>
                          <input value="<?php echo $pm['amnt']; ?>" required="" type='number' pattern='^\d+(?:\.\d{1,2})?$' step='0.01'  class="form-control" name="amnt[]">
                        </div>
                        <div class="form-group col-md-4">
                          <label>Status</label>
                          <div class="">
                            <label for="chkYsanction" class="radio-inline">
                              <input required="" value="Sanctioned" type="radio" id="chkY1sanction<?=$i;?>" name="chkSanction<?=$i;?>" onclick="ShowHideSanction1(<?=$i;?>)" <?php if($pm['chkSanction'] == "Sanctioned"){echo "checked"; }?>>
                              Sanctioned </label>
                            <label for="chkNsanction" class="radio-inline">
                              <input required="" type="radio" id="chkN1sanction<?=$i;?>" name="chkSanction<?=$i;?>" onclick="ShowHideSanction1(<?=$i;?>)" value="Applied" <?php if($pm['chkSanction'] == "Applied"){echo "checked"; } ?> >
                              Applied </label>
							  
                            <div class="attach pull-right" id="dv1Sanction<?=$i;?>" style="display: <?php if($pm['chkSanction'] == "Sanctioned"){echo "block"; }else {echo "none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
							
                              <input  type="file" accept="application/pdf, application/zip"  id="txtSanction" name="sanction_file<?=$i;?>" value="0" >
							  <input  type="hidden" id="txtSanction" name="sanction_files<?=$i?>" value="<?=$pm['sanction_file']?>">
                              </span> 
							  <?php if($pm['sanction_file']) { ?>
								 <a target="blank" class="btn btn-success btn-file attach-c" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $pm['sanction_file']); ?>"> 
									<span><i class="fa fa-download" aria-hidden="true"></i></span>
								</a>  
								<?php } ?>
							  </div>
                          </div>
                        </div>
                        <div class="form-group col-md-1">
                          <label>Remove</label>
                          <div class="add-feild">
                            <button type="button" id="removebank1" class="btn btn-danger addsub" >X</button>
                          </div>
                        </div>
                      </div>
					 
                      <?php  $i++; }}?>
                      
                     
                    </div>
                    <div class="form-group col-md-12">
                      <label>Banks (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addmorebank1" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['caost_compare_cerc'])) { echo $this->session->flashdata('step2')['caost_compare_cerc']; } ?></span></div>
                  <label>4) Cost Comparison with  CERC/SERC Bench marking</label>
                  <input required="" class="form-control" type="text" name="caost_compare_cerc" value="<?php print($rn_2['caost_compare_cerc']); ?>">
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['dpr_whom'])) { echo $this->session->flashdata('step2')['dpr_whom']; } ?></span></div>
                  <label>5) DPR prepared by whom </label>
                  <input required="" class="form-control" type="text" name="dpr_whom" value="<?php print($rn_2['dpr_whom']); ?>">
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['dpr_y'])) { echo $this->session->flashdata('step2')['dpr_y']; } ?></span></div>
                  <label>6) DPR year </label>
                  <input required="" class="form-control" type="text" name="dpr_y" value="<?php print($rn_2['dpr_y']); ?>">
                </div>
				
				<div class="form-group col-md-2">
				  <label>6) DPR Attachment </label>
					<div class="attach">
	                      <span class="btn btn-primary btn-file"> 
						  <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
	                      	<input  type="file" accept="application/pdf, application/zip"  name="drp_attachment" >
	                      </span>
						  
						   <?php if($rn_2['drp_attachment']) { ?>
							 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_2['drp_attachment']); ?>"> 
								<span><i class="fa fa-download" aria-hidden="true"></i></span>
							</a> 
							<?php } ?>
					</div>
				</div>
				
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['statutory_auditor'])) { echo $this->session->flashdata('step2')['statutory_auditor']; } ?></span></div>
                  <label>7) Name of the Statutory Auditors </label>
                  <input required="" class="form-control" type="text" name="statutory_auditor" value="<?php print($rn_2['statutory_auditor']); ?>">
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['info_memo_fin'])) { echo $this->session->flashdata('step2')['info_memo_fin']; } ?></span></div>
                  <label>8) Information Memorandum with Financial Model of Lead Bank/FI (if not available then of Borrower Co)</label>
                  <div class="attach">
                    <input required="" class="form-control" type="text" name="info_memo_fin" value="<?php print($rn_2['statutory_auditor']); ?>">
                    <span class="btn btn-primary btn-file attach-c" style="right: <?php if($rn_2['info_memo_fin_file']){ echo "42;";} else { echo "0px;"; } ?> "> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input  type="file" accept="application/pdf, application/zip"  name="info_memo_fin_file"  >
                    </span> 
					<?php if($rn_2['info_memo_fin_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_2['info_memo_fin_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					</div>
                </div>
                <div class="col-md-12">
                  <div class="sub-part">
                    <div class="col-md-12">
                      <h6>9 a) PPA</h6>
                    </div>
                    <div class="form-group col-md-3">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['ppa_whom'])) { echo $this->session->flashdata('step2')['ppa_whom']; } ?></span></div>
                      <label>i) PPA with Whom</label>
                      <input required="" type="text" class="form-control" name="ppa_whom" value="<?php print($rn_2['ppa_whom']); ?>">
                    </div>
                    <div class="form-group col-md-3">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['ppa_date'])) { echo $this->session->flashdata('step2')['ppa_date']; } ?></span></div>
                      <label>ii) Date of PPA</label>
                      <input required="" type="text" class="span2 form-control" id="dp5" placeholder="dd/mm/yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" name="ppa_date" value="<?php print($rn_2['ppa_date']); ?>">
                    </div>
                    <div class="form-group col-md-3">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['tariff'])) { echo $this->session->flashdata('step2')['tariff']; } ?></span></div>
                      <label>iii) Tariff</label>
                      <input required="" type="text" class="form-control" name="tariff" value="<?php print($rn_2['tariff']); ?>">
                    </div>
					
					  <div class="form-group col-md-3">
					  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['escalation'])) { echo $this->session->flashdata('step2')['escalation']; } ?></span></div>
                      <label>iv) Escalation(% per year) </label>
                      <input required="" type="text" class="form-control" name="escalation" value="<?php print($rn_2['escalation']); ?>">
                    </div> 
					
                    <div class="form-group col-md-3">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['capacity'])) { echo $this->session->flashdata('step2')['capacity']; } ?></span></div>
                      <label>v) Capacity</label>
                      <input required="" type="text" class="form-control" name="capacity" value="<?php print($rn_2['capacity']); ?>">
                    </div>
                    <div class="form-group col-md-3">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['tenture'])) { echo $this->session->flashdata('step2')['tenture']; } ?></span></div>
                      <label>vi) Tenure</label>
                      <input required="" type="text" class="form-control" name="tenture" value="<?php print($rn_2['tenture']); ?>">
                    </div>
                    <div class="form-group col-md-3">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['schdl_cod'])) { echo $this->session->flashdata('step2')['schdl_cod']; } ?></span></div>
                      <label>vii) Scheduled COD</label>
                      <input required="" type="text" class="form-control" id="dp37" placeholder="dd/mm/yyyy" name="schdl_cod" value="<?php print($rn_2['schdl_cod']); ?>">
                    </div>
                    <div class="form-group col-md-3">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['cr_ratng_pwr_prchse'])) { echo $this->session->flashdata('step2')['cr_ratng_pwr_prchse']; } ?></span></div>
                      <label>viii) Credit rating of Power Purchaser</label>
                      <input required="" type="text" class="form-control" name="cr_ratng_pwr_prchse" value="<?php print($rn_2['cr_ratng_pwr_prchse']); ?>">
                    </div>
                    <div class="form-group col-md-3">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['pmnt_secrty'])) { echo $this->session->flashdata('step2')['pmnt_secrty']; } ?></span></div>
                      <label>ix) Payment security mechanism</label>
                      <input required="" type="text" class="form-control" name="pmnt_secrty" value="<?php print($rn_2['pmnt_secrty']); ?>">
                    </div>
					
					<div class="form-group col-md-3">
				  <label>x) PPA Attachment </label>
					<div class="attach">
	                      <span class="btn btn-primary btn-file"> 
						  <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
	                      	<input  type="file" accept="application/pdf, application/zip"  name="ppa_attachment" >
	                      </span>
						  
						   <?php if($rn_2['ppa_attachment']) { ?>
							 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_2['ppa_attachment']); ?>"> 
								<span><i class="fa fa-download" aria-hidden="true"></i></span>
							</a> 
							<?php } ?>
					</div>
				</div>
				
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                      <h6>9 b) Project Financials</h6>
                    </div>
                    <div class="form-group col-md-3">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['plf_cuf'])) { echo $this->session->flashdata('step2')['plf_cuf']; } ?></span></div>
                      <label>i) PLF/CUF(in %)</label>
                      <input required="" type="text" class="form-control" name="plf_cuf" value="<?php print($rn_2['plf_cuf']); ?>">
                    </div>
                    <div class="form-group col-md-3">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['est_anul_gen'])) { echo $this->session->flashdata('step2')['est_anul_gen']; } ?></span></div>
                      <label>ii) Estimated Annual Generation (mu)</label>
                      <input required="" type="text" class="form-control" name="est_anul_gen" value="<?php print($rn_2['est_anul_gen']); ?>">
                    </div>
                    <div class="form-group col-md-3">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['lvel_tariff'])) { echo $this->session->flashdata('step2')['lvel_tariff']; } ?></span></div>
                      <label>iii) Levelized Tariff ( As per Financial Model) </label>
                      <input required="" type="text" class="form-control" name="lvel_tariff" value="<?php print($rn_2['lvel_tariff']); ?>">
                    </div>
					
                    <div class="form-group col-md-3">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['lvel_gen_cost'])) { echo $this->session->flashdata('step2')['lvel_gen_cost']; } ?></span></div>
                      <label>iv) Levelized Cost of Generation ( As per Financial Model) </label>
                      <input required="" type="text" class="form-control" name="lvel_gen_cost" value="<?php print($rn_2['lvel_gen_cost']); ?>">
                    </div>
                    <div class="form-group col-md-3">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['avg_dscr'])) { echo $this->session->flashdata('step2')['avg_dscr']; } ?></span></div>
                      <label>v) Average DSCR (Loan period) </label>
                      <input required="" type="text" class="form-control" name="avg_dscr" value="<?php print($rn_2['avg_dscr']); ?>">
                    </div>
                    <div class="form-group col-md-3">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['min_dscr'])) { echo $this->session->flashdata('step2')['min_dscr']; } ?></span></div>
                      <label>vi) Minimum DSCR (Loan period)</label>
                      <input required="" type="text" class="form-control" name="min_dscr" value="<?php print($rn_2['min_dscr']); ?>">
                    </div>
					
					<div class="form-group col-md-3">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['max_dscr'])) { echo $this->session->flashdata('step2')['max_dscr']; } ?></span></div>
                      <label>vii) Maximum DSCR (Loan period)</label>
                      <input required="" type="text" class="form-control" name="max_dscr" value="<?php print($rn_2['max_dscr']); ?>">
                    </div>
					
                    <div class="form-group col-md-3">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['prj_irr_post_tax'])) { echo $this->session->flashdata('step2')['prj_irr_post_tax']; } ?></span></div>
                      <label>viii) Project IRR Post Tax(in %)</label>
                      <input required="" type="text" class="form-control" name="prj_irr_post_tax" value="<?php print($rn_2['prj_irr_post_tax']); ?>">
                    </div>
                    <div class="form-group col-md-3">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['prj_irr_pre_tax'])) { echo $this->session->flashdata('step2')['prj_irr_pre_tax']; } ?></span></div>
                      <label>ix) Project IRR PreTax(in %) </label>
                      <input required="" type="text" class="form-control" name="prj_irr_pre_tax" value="<?php print($rn_2['prj_irr_pre_tax']); ?>">
                    </div>
                  </div>
                </div>
              </div>
            </div>
			
			<div class="form-group col-md-12">
			<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['finance_model'])) { echo $this->session->flashdata('step2')['finance_model']; } ?></span></div>
                  <label>10) Financial model in form of excel sheet</label>
                  <div class="attach">
                    <input required="" class="form-control" type="text" name="finance_model" value="<?php print($rn_2['finance_model']); ?>">
                    <span class="btn btn-primary btn-file attach-c" style="right: <?php if($rn_2['finance_model_file']){ echo "42;";} else { echo "0px;"; } ?> "> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input  type="file" accept="application/pdf, application/zip"  name="finance_model_file"  >
                    </span> 
					<?php if($rn_2['finance_model_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_2['finance_model_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					</div>
                </div>
			
            <div class="form-group col-md-12">
			<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['pwr_sale_offtake'])) { echo $this->session->flashdata('step2')['pwr_sale_offtake']; } ?></span></div>
              <label>11) Power Sales & Offtake(Arrangement for offtake and sale of power through PPAs, nature of buyers, tariff, wheeling/banking)</label>
              <textarea required=""  class="form-control" rows="5" id="" name="pwr_sale_offtake"><?php print($rn_2['pwr_sale_offtake']);?></textarea>
            </div>
			
			<div class="form-group col-md-12">
			<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['evacuation_label'])) { echo $this->session->flashdata('step2')['evacuation_label']; } ?></span></div>
              <label>13) Evacuation at which label</label>
              <input required="" class="form-control" type="text" name="evacuation_label" value="<?php print($rn_2['evacuation_label']); ?>">
            </div>
			
            <div class="col-md-12">
              <div class="sub-part">
                <h5>14) Licenses & Approvals(as on date) </h5>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['chkShareHold1'])) { echo $this->session->flashdata('step2')['chkShareHold1']; } ?></span></div>
                  <label>a) Pollution Clearance</label>
                  <div class="">
                    <label for="chkshare1" class="radio-inline">
                      <input required="" value="Yes" type="radio" id="chkYshare1" name="chkShareHold1" onClick="ShowHideShare1()" <?php if($rn_2['chkShareHold1'] == "Yes"){echo "checked"; } ?> />
                      Yes </label>
                    <label for="chkNshare" class="radio-inline">
                      <input required="" value="No" type="radio" id="chkNshare1" name="chkShareHold1" onClick="ShowHideShare1()" <?php if($rn_2['chkShareHold1'] == "No"){echo "checked"; }?> />
                      No </label>
                    <div class="attach pull-right" id="dvShare1" style="display: <?php if($rn_2['chkShareHold1'] == "Yes"){echo "block";  }else{echo "none";} ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtShareHold1" name="chkShareHold1_file" >
                      </span> 
					  <?php if($rn_2['chkShareHold1_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_2['chkShareHold1_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['chkWater1'])) { echo $this->session->flashdata('step2')['chkWater1']; } ?></span></div>
                  <label>b) Water allocation </label>
                  <div class="">
                    <label for="chkYwater1" class="radio-inline">
                      <input required="" value="Yes" type="radio" id="chkYwater1" name="chkWater1" onClick="ShowHideWater1()" <?php if($rn_2['chkWater1'] == "Yes"){echo "checked"; } ?> />
                      Yes </label>
                    <label for="chkNwater1" class="radio-inline">
                      <input required="" value="No" type="radio" id="chkNwater1" name="chkWater1" onClick="ShowHideWater1()" <?php if($rn_2['chkWater1'] == "No"){echo "checked"; } ?> />
                      No </label>
                    <div class="attach pull-right" id="dvWater1" style="display: <?php if($rn_2['chkWater1'] == "Yes"){echo "block";  }else{echo "none";} ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtWater1" name="chkWater1_file" >
                      </span> 
					  <?php if($rn_2['chkWater1_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_2['chkWater1_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['chkEvs1'])) { echo $this->session->flashdata('step2')['chkEvs1']; } ?></span></div>
                  <label>c) Environmental clearance</label>
                  <div class="">
                    <label for="chkYevs1" class="radio-inline">
                      <input required="" value="Yes" type="radio" id="chkYevs1" name="chkEvs1" onClick="ShowHideEvs1()" <?php if($rn_2['chkEvs1'] == "Yes"){echo "checked"; } ?> />
                      Yes </label>
                    <label for="chkNevs1" class="radio-inline">
                      <input required="" value="No" type="radio" id="chkNevs1" name="chkEvs1" onClick="ShowHideEvs1()" <?php if($rn_2['chkEvs1'] == "No"){echo "checked"; } ?> />
                      No </label>
                    <div class="attach pull-right" id="dvEvs1" style="display: <?php if($rn_2['chkEvs1'] == "Yes"){echo "block";  }else{echo "none";} ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtEvs1" name="chkEvs1_file" >
                      </span> 
					   <?php if($rn_2['chkEvs1_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_2['chkEvs1_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['chkForest1'])) { echo $this->session->flashdata('step2')['chkForest1']; } ?></span></div>
                  <label>d) Forest Land clearance (Project site)</label>
                  <div class="">
                    <label for="chkYforest1" class="radio-inline">
                      <input required="" value="Yes" type="radio" id="chkYforest1" name="chkForest1" onClick="ShowHideForest1()" <?php if($rn_2['chkForest1'] == "Yes"){echo "checked"; } ?> />
                      Yes </label>
                    <label for="chkNforest1" class="radio-inline">
                      <input required="" value="No" type="radio" id="chkNforest1" name="chkForest1" onClick="ShowHideForest1()" <?php if($rn_2['chkForest1'] == "No"){echo "checked"; } ?> />
                      No </label>
                    <label for="chkNAforest1" class="radio-inline">
                      <input required="" value="NA" type="radio" id="chkNAforest1" name="chkForest1" onClick="ShowHideForest1()" <?php if($rn_2['chkForest1'] == "NA"){echo "checked"; } ?> />
                      NA </label>
                    <div class="attach pull-right" id="dvForest1" style="display: <?php if($rn_2['chkForest1'] == "Yes"){echo "block";  }else{echo "none";} ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtForest1" name="chkForest1_image" >
                      </span> 
					  <?php if($rn_2['chkForest1_image']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_2['chkForest1_image']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['chkEvacuation1'])) { echo $this->session->flashdata('step2')['chkEvacuation1']; } ?></span></div>
                  <label>e) Forest Land clearance (Evacuation) </label>
                  <div class="">
                    <label for="chkYevacuation1" class="radio-inline">
                      <input required="" value="Yes" type="radio" id="chkYevacuation1" name="chkEvacuation1" onClick="ShowHideEvacuation1()" <?php if($rn_2['chkEvacuation1'] == "Yes"){echo "checked"; } ?> />
                      Yes </label>
                    <label for="chkNevacuation" class="radio-inline">
                      <input required="" value="No" type="radio" id="chkNevacuation1" name="chkEvacuation1" onClick="ShowHideEvacuation1()" <?php if($rn_2['chkEvacuation1'] == "No"){echo "checked"; } ?> />
                      No </label>
                    <label for="chkNAevacuation1" class="radio-inline">
                      <input required="" value="NA" type="radio" id="chkNAevacuation1" name="chkEvacuation1" onClick="ShowHideEvacuation1()" <?php if($rn_2['chkEvacuation1'] == "NA"){echo "checked"; } ?> />
                      NA </label>
                    <div class="attach pull-right" id="dvEvacuation1" style="display: <?php if($rn_2['chkEvacuation1'] == "Yes"){echo "block";  }else{echo "none";} ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtEvacuation1" name="chkEvacuation1_file" >
                      </span> 
					  <?php if($rn_2['chkEvacuation1_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_2['chkEvacuation1_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['chkCivil1'])) { echo $this->session->flashdata('step2')['chkCivil1']; } ?></span></div>
                  <label>f) Civil aviation clearance (chimney height)</label>
                  <div class="">
                    <label for="chkYcivil1" class="radio-inline">
                      <input required="" value="Yes" type="radio" id="chkYcivil1" name="chkCivil1" onClick="ShowHideCivil1()" <?php if($rn_2['chkCivil1'] == "Yes"){echo "checked"; } ?>  />
                      Yes </label>
                    <label for="chkNcivil" class="radio-inline">
                      <input required="" value="No" type="radio" id="chkNcivil1" name="chkCivil1" onClick="ShowHideCivil1()" <?php if($rn_2['chkCivil1'] == "No"){echo "checked"; } ?> />
                      No </label>
                    <div class="attach pull-right" id="dvCivil1" style="display: <?php if($rn_2['chkCivil1'] == "Yes"){echo "block";  }else{echo "none";} ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtCivil1" name="chkCivil1_file" >
                      </span> 
					   <?php if($rn_2['chkCivil1_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_2['chkCivil1_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h5>13) Location, Land, Water & Infrastructure </h5>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['geo_cord'])) { echo $this->session->flashdata('step2')['geo_cord']; } ?></span></div>
                  <label>a) Geological Coordinates(Geographic Coordinates (of at least four corners) – indicating the corners in the NESW directions)</label>
                  <textarea required=""  class="form-control" rows="5" id="" name="geo_cord"><?php print($rn_2['geo_cord']); ?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['located_backward_area'])) { echo $this->session->flashdata('step2')['located_backward_area']; } ?></span></div>
                  <label>b) Whether located in Backward area (attracting concession from State Govt., please specify)(please specify details of the Grant/Concessions) </label>
                  <textarea required=""  class="form-control" rows="5" id="" name="located_backward_area"><?php print($rn_2['located_backward_area']); ?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['nearst_forest'])) { echo $this->session->flashdata('step2')['nearst_forest']; } ?></span></div>
                  <label>c) Nearest Forest/ lake or any natural bodies, Bird Sanctuary or any such protected areas(Name and Distance from the site)</label>
                  <textarea required=""  class="form-control" rows="5" id="" name="nearst_forest"><?php print($rn_2['nearst_forest']); ?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['nrst_port'])) { echo $this->session->flashdata('step2')['nrst_port']; } ?></span></div>
                  <label>d) Nearest Port/Distance(Name and Distance from Plant Location)</label>
                  <textarea required=""  class="form-control" rows="5" id="" name="nrst_port"><?php print($rn_2['nrst_port']); ?></textarea>
                </div>
				
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['nrst_rail'])) { echo $this->session->flashdata('step2')['nrst_rail']; } ?></span></div>
                  <label>e) Nearest Railway Station/ Distance(Name and Distance from Plant Location)</label>
                  <textarea required=""  class="form-control" rows="5" id="" name="nrst_rail"><?php print($rn_2['nrst_rail']); ?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['nrst_nh'])) { echo $this->session->flashdata('step2')['nrst_nh']; } ?></span></div>
                  <label>f) Nearest national Highway/State Highway/District Roads(Names and Distances)</label>
                  <textarea required=""  class="form-control" rows="5" name="nrst_nh" ><?php print($rn_2['nrst_nh']); ?></textarea>
                </div>
              </div>
            </div>
			
            <div class="col-md-12 text-right">
			<button class="btn btn-default prevBtn pull-left" type="button">Previous</button>
              <button type="submit" class="btn btn-primary">Save & Next</button>
            </div>
            </form>
          </div>
		  
          <div class="row setup-content" id="renew-3">
		  
          	<form role="form" action="<?php echo base_url(); ?>form1/process_rn_3" method="post" enctype="multipart/form-data">
			
            <div class="col-md-12">
              <div class="sub-part">
                <h5>13) Land requirement & availability</h5>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['curnt_user_of_land'])) { echo $this->session->flashdata('step3')['curnt_user_of_land']; } ?></span></div>
                  <label>a) Classification/Current Use of land and ownership(Whether Forest/Agriculture/Commercial or Industrial land. If combination, please specify the break-up 
                    whether Government/Private Land/Others)</label>
                  <textarea required=""  class="form-control" rows="5" name="curnt_user_of_land"><?php print($rn_3['curnt_user_of_land'])?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['land_req_per_dpr'])) { echo $this->session->flashdata('step3')['land_req_per_dpr']; } ?></span></div>
                  <label>b) Land Required for the entire plant as per DPR(In acres. Please specify the  acre/MW, (as per DPR))</label>
                  <textarea required=""  class="form-control" rows="5" name="land_req_per_dpr"><?php print($rn_3['land_req_per_dpr'])?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['land_req_main_plant'])) { echo $this->session->flashdata('step3')['land_req_main_plant']; } ?></span></div>
                  <label>c) Land Required for Main Plant(In acres)</label>
                  <textarea required=""  class="form-control" rows="5" id="" name="land_req_main_plant"><?php print($rn_3['land_req_main_plant'])?></textarea>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['land_aqr_till_date'])) { echo $this->session->flashdata('step3')['land_aqr_till_date']; } ?></span></div>
                  <label>d) Land Acquired till date(Please specify the details)</label>
                  <textarea required=""  class="form-control" rows="5" id="" name="land_aqr_till_date"><?php print($rn_3['land_aqr_till_date'])?></textarea>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h5>14) Fuel related details</h5>
               <?php if($rn_1['project_type']=='Biomass' || $rn_1['project_type']=='Waste to energy'){$display = "block";}else{$display = "none";} ?>
                <div class="show14abc" style="display:<?=$display; ?>">
                <div class="form-group col-md-12">
                 
                  <div class="clearfix"></div>
                  <div class="col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['domestc_coal_gas'])) { echo $this->session->flashdata('step3')['domestc_coal_gas']; } ?></span></div>
				   <label>a) Fuel </label>
                    <input type="text" class="form-control" placeholder="GCV" name="domestc_coal_gas" value = "<?php print($rn_3['domestc_coal_gas']); ?>">
                  </div>
                  <div class="col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['domestc_coal_gas_capacity'])) { echo $this->session->flashdata('step3')['domestc_coal_gas_capacity']; } ?></span></div>
				   <label>GCV </label>
                    <input type="text" class="form-control" placeholder="Requirement per annum @100% capacity" name="domestc_coal_gas_capacity" value = "<?php print($rn_3['domestc_coal_gas_capacity']); ?>">
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-12">
                 
                  <div class="clearfix"></div>
                  <div class="col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['imprtd_coal'])) { echo $this->session->flashdata('step3')['imprtd_coal']; } ?></span></div>
				   <label>b) Imported Fuel</label>
                    <input type="text" class="form-control" placeholder="GCV" name="imprtd_coal" value = "<?php print($rn_3['imprtd_coal']); ?>">
                  </div>
                  <div class="col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['imprtd_coal_capacity'])) { echo $this->session->flashdata('step3')['imprtd_coal_capacity']; } ?></span></div>
				   <label>Requirement per annum</label>
                    <input type="text" class="form-control" placeholder="Requirement per annum @100% capacity" name="imprtd_coal_capacity" value = "<?php print($rn_3['imprtd_coal_capacity']); ?>">
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['plan_mett_fuel_req_plant'])) { echo $this->session->flashdata('step3')['plan_mett_fuel_req_plant']; } ?></span></div>
                  <label>c) Fuel Availability (Tonnes per day) </label>
                  <div class="clearfix"></div>
                  <div class="col-md-12">
                    <input type="text" class="form-control" placeholder="" name="plan_mett_fuel_req_plant" value = "<?php print($rn_3['plan_mett_fuel_req_plant']); ?>">
                  </div>
				 
                  <div class="clearfix"></div>
                </div>
				 <div class="form-group col-md-4">
				 <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['fuel_supp_agrmnt'])) { echo $this->session->flashdata('step3')['fuel_supp_agrmnt']; } ?></span></div>
                    <label>vi) Fuel Supply Agreement</label>
                    <div class="attach">
                      <input type="text" class="form-control" name="fuel_supp_agrmnt"value = "<?php print($rn_3['fuel_supp_agrmnt']); ?>">
                      <span class="btn btn-primary btn-file attach-c" style="right:<?php if($rn_3['fuel_supp_agrmnt_file']) { echo "42px;"; }else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  name="fuel_supp_agrmnt_file" >
                      </span> 
						<?php if($rn_3['fuel_supp_agrmnt_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_3['fuel_supp_agrmnt_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['anul_contrct_qty'])) { echo $this->session->flashdata('step3')['anul_contrct_qty']; } ?></span></div>
                    <label>vii) Annual contracted quantity</label>
                    <input type="text" class="form-control" placeholder="" name="anul_contrct_qty" value = "<?php print($rn_3['anul_contrct_qty']); ?>">
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['end_use_app'])) { echo $this->session->flashdata('step3')['end_use_app']; } ?></span></div>
                    <label>viii) End-Use application</label>
                    <input type="text" class="form-control" placeholder="" name="end_use_app" value = "<?php print($rn_3['end_use_app']); ?>">
                  </div>
				<div class="form-group">
                    <div class="col-md-12">
					
                      <label>x) Price </label>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['base_price'])) { echo $this->session->flashdata('step3')['base_price']; } ?></span></div>
					<label> Basic Price</label>
                      <input type="text" class="form-control" placeholder="Base price" name="base_price" value = "<?php print($rn_3['base_price']); ?>">
                    </div>
                    <div class="col-md-6">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['escalation'])) { echo $this->session->flashdata('step3')['escalation']; } ?></span></div>
					<label> Escalation </label>
                      <input  type="text" class="form-control" placeholder="Escalation" name="escalation" value = "<?php print($rn_3['escalation']); ?>">
                    </div>
                    <div class="clearfix"></div>
                  </div>
				</div>
                <h5>15) Details of LOA/fuel supply agreement</h5>
                <div class="form-group col-md-12">
                  <div class="col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['loa_with'])) { echo $this->session->flashdata('step3')['loa_with']; } ?></span></div>
                    <label>i) LOA with </label>
                    <div class="attach">
                      <input required="" type="text" class="form-control" name="loa_with" value = "<?php print($rn_3['loa_with']); ?>">
                      <span class="btn btn-primary btn-file attach-c" style="right:<?php if($rn_3['loa_with_file']) { echo "42px;"; }else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  name="loa_with_file" >
                      </span> 
					  <?php if($rn_3['loa_with_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_3['loa_with_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['loa_date'])) { echo $this->session->flashdata('step3')['loa_date']; } ?></span></div>
                    <label>ii) LOA Date</label> 
                    <input required="" type="text" class="span2 form-control" id="dp6" placeholder="dd/mm/yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" name="loa_date" value = "<?php print($rn_3['loa_date']); ?>">
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['qntm_fuel_supply'])) { echo $this->session->flashdata('step3')['qntm_fuel_supply']; } ?></span></div>
                    <label>iii) Quantum of fuel supply</label>
                    <input required="" type="text" class="form-control" placeholder="" name="qntm_fuel_supply" value = "<?php print($rn_3['qntm_fuel_supply']); ?>">
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['validty_load'])) { echo $this->session->flashdata('step3')['validty_load']; } ?></span></div>
                    <label>iv) Validity of LOA </label>
                    <input required="" type="text" class="form-control" placeholder="" name="validty_load"value = "<?php print($rn_3['validty_load']); ?>">
                  </div>
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['obligation'])) { echo $this->session->flashdata('step3')['obligation']; } ?></span></div>
                    <label>v) Obligation/commitments (Guarantee/bonds)</label>
                    <input required="" type="text" class="form-control" placeholder="" name="obligation" value = "<?php print($rn_3['obligation']); ?>">
                  </div>
				  
				  
                  <div class="form-group col-md-4">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['compsn_shrt_sply'])) { echo $this->session->flashdata('step3')['compsn_shrt_sply']; } ?></span></div>
                    <label>vi) Compensation for short supply/lifting</label>
                    <input required="" type="text" class="form-control" placeholder="" name="compsn_shrt_sply" value = "<?php print($rn_3['compsn_shrt_sply']); ?>">
                  </div>
                 
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h5>15) Water related details </h5>
                <h5>a) Quantum of water required </h5>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['qntm_watr_req_per_day'])) { echo $this->session->flashdata('step3')['qntm_watr_req_per_day']; } ?></span></div>
                  <label>i) Per day</label>
                  <input required="" type="text" class="form-control" placeholder="Core" name="qntm_watr_req_per_day" value = "<?php print($rn_3['qntm_watr_req_per_day']); ?>">
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['qntm_watr_req_per_anm'])) { echo $this->session->flashdata('step3')['qntm_watr_req_per_anm']; } ?></span></div>
                  <label>ii) Per annum</label>
                  <input required="" type="text" class="form-control" placeholder="Non-Core" name="qntm_watr_req_per_anm" value = "<?php print($rn_3['qntm_watr_req_per_anm']); ?>">
                </div>
                <h5>b) Source of water supply </h5>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['name_source'])) { echo $this->session->flashdata('step3')['name_source']; } ?></span></div>
                  <label>i) Name of source</label>
                  <input required="" type="text" class="form-control" placeholder="Core" name="name_source" value = "<?php print($rn_3['name_source']); ?>">
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['distance'])) { echo $this->session->flashdata('step3')['distance']; } ?></span></div>
                  <label>ii) Distance </label>
                  <input required="" type="text" class="form-control" placeholder="Non-Core" name="distance" value = "<?php print($rn_3['distance']); ?>">
                </div>
                <div class="clearfix"></div>
                <h5></h5>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['alloction'])) { echo $this->session->flashdata('step3')['alloction']; } ?></span></div>
                  <label>c) Allocation </label>
                  <div class="attach">
                    <input required="" type="text" class="form-control" name="alloction" value = "<?php print($rn_3['alloction']); ?>">
                    <span class="btn btn-primary btn-file attach-c" style="right:<?php if($rn_3['alloction_file']) { echo "42px;"; }else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input  type="file" accept="application/pdf, application/zip"  name="alloction_file" >
                    </span> 
					<?php if($rn_3['alloction_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_3['alloction_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					</div>
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['trnsport'])) { echo $this->session->flashdata('step3')['trnsport']; } ?></span></div>
                  <label>d) Transportation </label>
                  <input required="" type="text" class="form-control" name="trnsport" value = "<?php print($rn_3['trnsport']); ?>">
                </div>
                <div class="form-group col-md-4">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['tech_coolng_systm'])) { echo $this->session->flashdata('step3')['tech_coolng_systm']; } ?></span></div>
                  <label>e) Technology of cooling system</label>
                  <input required="" type="text" class="form-control" name="tech_coolng_systm" value = "<?php print($rn_3['tech_coolng_systm']); ?>">
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h5>16) Hydro related </h5>
                <h5>a) Resettlement & Rehabilitation (R&R) impact </h5>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['num_vilg_affect'])) { echo $this->session->flashdata('step3')['num_vilg_affect']; } ?></span></div>
                  <label>i) No of villages affected</label>
                  <input required="" type="text" class="form-control" placeholder="" name="num_vilg_affect" value = "<?php print($rn_3['num_vilg_affect']); ?>">
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['num_fmly_rehbltn'])) { echo $this->session->flashdata('step3')['num_fmly_rehbltn']; } ?></span></div>
                  <label>ii) No of families need to be resettled/rehabilitated</label>
                  <input required="" type="text" class="form-control" placeholder="" name="num_fmly_rehbltn" value = "<?php print($rn_3['num_fmly_rehbltn']); ?>">
                </div>
                <h5>b) Environmental Impact of the project </h5>
                <div class="col-md-12">
                  <div class="attach"> <span class="btn btn-primary btn-file "> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input  type="file" accept="application/pdf, application/zip"  name="envrmnt_impact_prj_file" >
                    </span> 
					<?php if($rn_3['envrmnt_impact_prj_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_3['envrmnt_impact_prj_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					</div>
                </div>
                <div class="clearfix"></div>
                <div class="mtop1"></div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['extnt_deforst_prj'])) { echo $this->session->flashdata('step3')['extnt_deforst_prj']; } ?></span></div>
                  <label>i) Extent of deforestation of the project</label>
                  <input required="" type="text" class="form-control" name="extnt_deforst_prj" value = "<?php print($rn_3['extnt_deforst_prj']); ?>">
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['steps_flora_fauna'])) { echo $this->session->flashdata('step3')['steps_flora_fauna']; } ?></span></div>
                  <label>ii) Steps required for protection of flora and fauna </label>
                  <input required="" type="text" class="form-control" name="steps_flora_fauna" value = "<?php print($rn_3['steps_flora_fauna']); ?>">
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['steps_forests_wildlife'])) { echo $this->session->flashdata('step3')['steps_forests_wildlife']; } ?></span></div>
                  <label>iii) Steps required for protection of forests and wildlife </label>
                  <input required="" type="text" class="form-control" name="steps_forests_wildlife" value = "<?php print($rn_3['steps_forests_wildlife']); ?>">
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['archlogical_monumnts'])) { echo $this->session->flashdata('step3')['archlogical_monumnts']; } ?></span></div>
                  <label>iv) Is there any submergence of any religious or archaeological monuments </label>
                  <input required="" type="text" class="form-control" name="archlogical_monumnts" value = "<?php print($rn_3['archlogical_monumnts']); ?>">
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['dgrad_catchmnt_area'])) { echo $this->session->flashdata('step3')['dgrad_catchmnt_area']; } ?></span></div>
                  <label>v) Any Degradation of catchment area & surplusing of reservoir Due to the project </label>
                  <input required="" type="text" class="form-control" name="dgrad_catchmnt_area" value = "<?php print($rn_3['dgrad_catchmnt_area']); ?>">
                </div>
                <div class="form-group col-md-6">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['rock_mass_rating'])) { echo $this->session->flashdata('step3')['rock_mass_rating']; } ?></span></div>
                  <label>vi) Rock Mass Rating </label>
                  <input required="" type="text" class="form-control" name="rock_mass_rating" value = "<?php print($rn_3['rock_mass_rating']); ?>">
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-12">
                  <h6>vii) Topography</h6>
                  <div class="form-group col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['accs_to_site'])) { echo $this->session->flashdata('step3')['accs_to_site']; } ?></span></div>
                    <label>vii.1) Access to the site </label>
                    <input required="" type="text" class="form-control" name="accs_to_site" value = "<?php print($rn_3['accs_to_site']); ?>">
                  </div>
                  <div class="form-group col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['issue_pretng_hvy_eqpmnt'])) { echo $this->session->flashdata('step3')['issue_pretng_hvy_eqpmnt']; } ?></span></div>
                    <label>vii.2) Issues pertaining to movement of heavy equipment/machinery to site </label>
                    <input required="" type="text" class="form-control" name="issue_pretng_hvy_eqpmnt" value = "<?php print($rn_3['issue_pretng_hvy_eqpmnt']); ?>">
                  </div>
                  <div class="form-group col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['potential_land_prblm'])) { echo $this->session->flashdata('step3')['potential_land_prblm']; } ?></span></div>
                    <label>vii.3) Potential land side problems if any </label>
                    <input required="" type="text" class="form-control" name="potential_land_prblm" value = "<?php print($rn_3['potential_land_prblm']); ?>">
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-12">
                  <h6>viii) Hydology</h6>
                  <div class="form-group col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['num_yr_for_whch_data_avail'])) { echo $this->session->flashdata('step3')['num_yr_for_whch_data_avail']; } ?></span></div>
                    <label>viii.1) No of years for which data available </label>
                    <div class="attach">
                      <input required="" type="text" class="form-control" name="num_yr_for_whch_data_avail" value = "<?php print($rn_3['num_yr_for_whch_data_avail']); ?>">
                      <span class="btn btn-primary btn-file attach-c" style="right: <?php if($rn_3['num_yr_for_whch_data_avail_file']) { echo "42px;" ; }else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  name="num_yr_for_whch_data_avail_file" >
                      </span> 
					  <?php if($rn_3['num_yr_for_whch_data_avail_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_3['num_yr_for_whch_data_avail_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-12">
				<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['seismic_zone'])) { echo $this->session->flashdata('step3')['seismic_zone']; } ?></span></div>
                  <label>ix) Seismic Zone </label>
                  <input required="" type="text" class="form-control" name="seismic_zone" value = "<?php print($rn_3['seismic_zone']); ?>">
                </div>
              </div>
            </div>
			
            <div class="col-md-12 text-right">
			<button class="btn btn-default prevBtn pull-left" type="button">Previous</button>
              <button type="submit" class="btn btn-primary">Save & Next</button>
            </div>
            </form>
          </div>
          <div class="row setup-content" id="renew-4">
		  
          	<form role="form" action="<?php echo base_url(); ?>form1/process_rn_4" method="post" enctype="multipart/form-data">
			
            <div class="col-md-12">
			
			
			<h5>17) TECHNOLOGY SPECIFIC DETAILS(Please provide the following details as per the technology of project) </h5>
			<?php if($rn_1['project_type'] == "Small hydro" || $rn_1['project_type'] == "Biomass" || $rn_1['project_type'] == "Wind" || $rn_1['project_type'] == "Solar-thermal"){$display = "none";} else{ $display ="block";}?>
			 <div class="form-group col-md-12" style="display:<?php echo $display; ?>">
			 <?php if(isset($this->session->flashdata('step4')['description'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['description']; ?></span></div><?php } ?>
                  <label>Description</label>
                  <textarea   class="form-control" rows="5" name="description"><?php print($rn_4['description'])?></textarea>
                </div>
              <div class="">
                
				<div id="showSmallHydro" style="display: <?php if($rn_1['project_type'] == "Small hydro"){echo "block";}else{echo "none";}?> ">
				
                <h5><b>Small-hydro:</b></h5>
                <div class="form-group col-md-6">
				<?php if(isset($this->session->flashdata('step4')['chkAvailability'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['chkAvailability']; ?></span></div><?php } ?>
                  <label>1) Availability of water throughout the yearIf "No" mention the Nos. of months per year  water availability</label>
                  <div class="">
                    <label for="chkavailability" class="radio-inline">
                      <input  value="Yes" type="radio" id="chkYavailability" name="chkAvailability" onClick="ShowHideAvailability()" <?php if($rn_4['chkAvailability'] == "Yes"){echo "checked";}  if(empty($rn_4['chkAvailability'])){echo "checked"; }?>/>
                      Yes </label>
                    <label for="chkNavailability" class="radio-inline">
                      <input  value="No" type="radio" id="chkNavailability" name="chkAvailability" onClick="ShowHideAvailability()" <?php if($rn_4['chkAvailability'] == "No"){echo "checked";}  ?> />
                      No </label>
                    <div class="pull-right" id="dvAvailability" style="display: <?php if($rn_4['chkAvailability'] == "Yes"){echo "none";}else{echo "block";}?>"> <span class="">
                      <input  type="text" class="form-control" id="txtAvailability" name="chkAvailability_yes" value="<?php if($rn_4['chkAvailability'] == "No"){print_r($rn_4['chkAvailability_yes']);}?>">
                      </span> </div>
                  </div>
                </div>
                <div class="col-md-6">2) GPS coordinates  of upstream water head
                  <div class="clearfix">
                    <div class="form-group col-md-6">
					<?php if(isset($this->session->flashdata('step4')['lat'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['lat']; ?></span></div><?php } ?>
                      <label>Latitude</label>
                      <input  type="text" class="form-control" name="lat" value="<?php print($rn_4['lat']); ?>" >
                    </div>
                    <div class="form-group col-md-6">
					<?php if(isset($this->session->flashdata('step4')['long'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['long']; ?></span></div><?php } ?>
                      <label>Longitude</label>
                      <input  type="text" class="form-control" name="long" value="<?php print($rn_4['long']); ?>">
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6">3) Head
                  <div class="clearfix">
                    <div class="form-group col-md-4">
					<?php if(isset($this->session->flashdata('step4')['max_m'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['max_m']; ?></span></div><?php } ?>
                      <label>Maximum(m)</label>
                      <input  type="text" class="form-control" name="max_m" value="<?php print($rn_4['max_m']); ?>">
                    </div>
                    <div class="form-group col-md-4">
					<?php if(isset($this->session->flashdata('step4')['min_m'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['min_m']; ?></span></div><?php } ?>
                      <label>Minimum(m)</label>
                      <input  type="text" class="form-control" name="min_m" value="<?php print($rn_4['min_m']); ?>">
                    </div>
                    <div class="form-group col-md-4">
					<?php if(isset($this->session->flashdata('step4')['avg_m'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['avg_m']; ?></span></div><?php } ?>
                      <label>Average(m)</label>
                      <input  type="text" class="form-control" name="avg_m" value="<?php print($rn_4['avg_m']); ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">4) Discharge
                  <div class="clearfix">
                    <div class="form-group col-md-4">
					<?php if(isset($this->session->flashdata('step4')['max_ips'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['max_ips']; ?></span></div><?php } ?>
                      <label>Maximum(lps)</label>
                      <input  type="text" class="form-control" name="max_ips" value="<?php print($rn_4['max_ips']); ?>">
                    </div>
                    <div class="form-group col-md-4">
					<?php if(isset($this->session->flashdata('step4')['min_ips'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['min_ips']; ?></span></div><?php } ?>
                      <label>Minimum(lps)</label>
                      <input  type="text" class="form-control" name="min_ips" value="<?php print($rn_4['min_ips']); ?>">
                    </div>
                    <div class="form-group col-md-4">
					<?php if(isset($this->session->flashdata('step4')['avg_ips'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['avg_ips']; ?></span></div><?php } ?>
                      <label>Average(lps)</label>
                      <input  type="text" class="form-control" name="avg_ips" value="<?php print($rn_4['avg_ips']); ?>">
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-6">
				<?php if(isset($this->session->flashdata('step4')['est_pwr_gen_capacity_avail'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['est_pwr_gen_capacity_avail']; ?></span></div><?php } ?>
                  <label>5) Estimated power generation capacity available(MU) </label>
                  <input type="text" class="form-control" name="est_pwr_gen_capacity_avail" value="<?php print($rn_4['est_pwr_gen_capacity_avail']); ?>">
                </div>
				</div>
                <div class="clearfix"></div>
				<div class="show14abcbio" style="display:<?php if($rn_1['project_type'] == "Biomass"){echo "block";}else{echo "none";}?>" >
				
                <h5><b>Biomass</b></h5>
                 
                <div class="clearfix"></div>
                <div class="form-group col-md-6">
				<?php if(isset($this->session->flashdata('step4')['land_for_enrgy_plant_ha'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['land_for_enrgy_plant_ha']; ?></span></div><?php } ?>
                  <label>2) Land available for energy plantations(ha) </label>
                  <input  type="text" class="form-control" name="land_for_enrgy_plant_ha" value="<?php print($rn_4['land_for_enrgy_plant_ha'])?>">
                </div>
                <div class="form-group col-md-6">
				<?php if(isset($this->session->flashdata('step4')['est_pwr_gen_cap_mu'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['est_pwr_gen_cap_mu']; ?></span></div><?php } ?>
                  <label>3) Estimated power generation capacity available(MU) </label>
                  <input  type="text" class="form-control" name="est_pwr_gen_cap_mu" value="<?php print($rn_4['est_pwr_gen_cap_mu'])?>">
                </div>
				</div>
                <div class="clearfix"></div>
				<div id="showSolarPV" style="display:<?php if($rn_1['project_type'] == "Solar-thermal"){echo "block";}else{echo "none";}?>" >
				
                <h5><b>Solar PV/ Thermal</b></h5>
               
                <div class="form-group col-md-4">
				<?php if(isset($this->session->flashdata('step4')['isolation_lvl_per_day'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['isolation_lvl_per_day']; ?></span></div><?php } ?>
                  <label>1) Insolation level (kWh/sq meter/day) </label>
                  <input  type="text" class="form-control" name="isolation_lvl_per_day" value="<?php print($rn_4['isolation_lvl_per_day'])?>">
                </div>
                <div class="form-group col-md-4">
				<?php if(isset($this->session->flashdata('step4')['ghi'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['ghi']; ?></span></div><?php } ?>
                  <label>2) GHI </label>
                  <input  type="text" class="form-control" name="ghi" value="<?php print($rn_4['ghi'])?>">
                </div>
                <div class="form-group col-md-4">
				<?php if(isset($this->session->flashdata('step4')['dni'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['dni']; ?></span></div><?php } ?>
                  <label>3) DNI </label>
                  <input  type="text" class="form-control" name="dni" value="<?php print($rn_4['dni'])?>">
                </div>
                <div class="form-group col-md-4">
				<?php if(isset($this->session->flashdata('step4')['num_sunny_days_per_yr'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['num_sunny_days_per_yr']; ?></span></div><?php } ?>
                  <label>4) Number of sunny days available per year(days per year) </label>
                  <input  type="text" class="form-control" name="num_sunny_days_per_yr" value="<?php print($rn_4['num_sunny_days_per_yr'])?>">
                </div>
                <div class="form-group col-md-4">
				<?php if(isset($this->session->flashdata('step4')['est_pwqr_gen_cap_mu1'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['est_pwqr_gen_cap_mu1']; ?></span></div><?php } ?>
                  <label>5) Estimated power generation capacity available(MU) </label>
                  <input  type="text" class="form-control" name="est_pwqr_gen_cap_mu1" value="<?php print($rn_4['est_pwqr_gen_cap_mu1'])?>">
                </div>
				</div>
                <div class="clearfix"></div>
				<div id="showWind" style="display:<?php if($rn_1['project_type'] == "Wind"){echo "block";}else{echo "none";}?>">
				
                <h5><b>Wind</b></h5>
                <div class="form-group col-md-6">
				<?php if(isset($this->session->flashdata('step4')['avg_wind_speed'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['avg_wind_speed']; ?></span></div><?php } ?>
                  <label>1) Average wind speed(m/s)</label>
                  <input type="text" class="form-control" name="avg_wind_speed" value="<?php print($rn_4['avg_wind_speed'])?>">
                </div>
                <div class="form-group col-md-6">
				<?php if(isset($this->session->flashdata('step4')['num_days_wind_pwr_per_yr1'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['num_days_wind_pwr_per_yr1']; ?></span></div><?php } ?>
                  <label>2) Nos. of days available for wind power generation per year(days per year)</label>
                  <input  type="text" class="form-control" name="num_days_wind_pwr_per_yr1" value="<?php print($rn_4['num_days_wind_pwr_per_yr1'])?>"> 
                </div>
                <div class="form-group col-md-4">
				<?php if(isset($this->session->flashdata('step4')['wind'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['wind']; ?></span></div><?php } ?>
                  <label>3) Availability of land for wind farm </label>
                  <div class="">
                    <label class="radio-inline">
                      <input  type="radio" name="wind" value="Yes" <?php if($rn_4['wind'] == "Yes"){echo "checked";} if(empty($rn_4['wind'])){echo "checked"; }?>  />
                      Yes </label>
                    <label class="radio-inline">
                      <input  type="radio" name="wind" value="No" <?php if($rn_4['wind'] == "No"){echo "checked";}?>  />
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-4">
				<?php if(isset($this->session->flashdata('step4')['area_land_ha1'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['area_land_ha1']; ?></span></div><?php } ?>
                  <label>4) Area of land available(ha)</label>
                  <input type="text" class="form-control" name="area_land_ha1" value="<?php print($rn_4['area_land_ha1'])?>">
                </div>
                <div class="form-group col-md-4">
				<?php if(isset($this->session->flashdata('step4')['est_pwr_gen_cap_mu2'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['est_pwr_gen_cap_mu2']; ?></span></div><?php } ?>
                  <label>5) Estimated power generation capacity available(MU)</label>
                  <input  type="text" class="form-control" name="est_pwr_gen_cap_mu2" value="<?php print($rn_4['est_pwr_gen_cap_mu2'])?>">
                </div>
				
				<div class="form-group col-md-4">
				<?php if(isset($this->session->flashdata('step4')['wra_prepared'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step4')['wra_prepared']; ?></span></div><?php } ?>
                  <label>6) WRA prepared by whom</label>
                  <input  type="text" class="form-control" name="wra_prepared" value="<?php print($rn_4['wra_prepared'])?>">
                </div>
				
				<div class="form-group col-md-4">
				
                  <label>7) WRP Attachment</label>
				 <div class="attach"> <span class="btn btn-primary btn-file "> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input  type="file" accept="application/pdf, application/zip"  name="wrp_attachment" >
                    </span> 
					<?php if($rn_4['wrp_attachment']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_4['wrp_attachment']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					</div>
                </div>
				
              </div>
            </div>
			</div>
            <div class="col-md-12 text-right">
			<button class="btn btn-default prevBtn pull-left" type="button">Previous</button>
              <button type="submit" class="btn btn-primary ">Save & Next</button>
            </div>
            </form>
          </div>
          <div class="row setup-content" id="renew-5">
		 
          	<form role="form" action="<?php echo base_url(); ?>form1/process_rn_5" method="post" enctype="multipart/form-data">
			
            <div class="col-md-12">
              <div class="sub-part">
                <h5>18) Project Construction and Implementation Details</h5>
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['cntrct_prj_dvlpmnt'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['cntrct_prj_dvlpmnt']; ?></span></div><?php } ?>
                  <label>1) Contracting & Project Development(Construction contracts and type of bidding- whether Competitive Bidding or Negotiated Contract basis.)</label>
                  <textarea required=""  class="form-control" rows="5" id="" name="cntrct_prj_dvlpmnt"><?php print($rn_5['cntrct_prj_dvlpmnt'])?></textarea>
                </div>
                <div class="form-group col-md-12">
                  <div class="sub-part">
					
					 <div class="form-group col-md-12">
					 <?php if(isset($this->session->flashdata('step5')['epc_awarded'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['epc_awarded']; ?></span></div><?php } ?>
                  <label> EPC awarded by</label>
					  <div class="">
						<label class="radio-inline">
						  <input required="" value="Third Party" type="radio" name="epc_awarded" <?php if($rn_5['epc_awarded'] == "Third Party"){echo "checked";}?> />
						  Third Party </label>
						<label class="radio-inline">
						  <input required="" value="Own Subsidiary" type="radio" name="epc_awarded" <?php if($rn_5['epc_awarded'] == "Own Subsidiary"){echo "checked";}?> />
						  Own Subsidiary </label>
					  </div>
					</div>
					
                    <h5>2) EPC Route</h5>
                    <div class="form-group col-md-12">
					<?php if(isset($this->session->flashdata('step5')['crnt_status_epc_cntcts'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['crnt_status_epc_cntcts']; ?></span></div><?php } ?>
                      <label>a) Please provide the details of the current status of the EPC contacts </label>
                      <input required="" type="text" class="form-control" name="crnt_status_epc_cntcts" value="<?php print($rn_5['crnt_status_epc_cntcts'])?>">
                    </div>
                    <h5>b) Provide the following details of each of the EPC contractors</h5>
                    <div class="form-group col-md-12">
					<?php if(isset($this->session->flashdata('step5')['exp_past_track_record_cntrct'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['exp_past_track_record_cntrct']; ?></span></div><?php } ?>
                      <label>i) Experience and past track record of the Contractor</label>
                      <input required="" type="text" class="form-control" name="exp_past_track_record_cntrct" value="<?php print($rn_5['exp_past_track_record_cntrct'])?>">
                    </div>
                    <div class="form-group col-md-12">
					<?php if(isset($this->session->flashdata('step5')['num_plants_same_tech'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['num_plants_same_tech']; ?></span></div><?php } ?>
                      <label>ii) How many plants of the similar technology and size did the Contractor implement?</label>
                      <input required="" type="text" class="form-control" name="num_plants_same_tech" value="<?php print($rn_5['num_plants_same_tech'])?>">
                    </div>
                    <div class="form-group col-md-12">
					<?php if(isset($this->session->flashdata('step5')['list_all_inst_implmnt_india'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['list_all_inst_implmnt_india']; ?></span></div><?php } ?>
                      <label>iii) List of all the installations/implementations in India</label>
                      <input required="" type="text" class="form-control" name="list_all_inst_implmnt_india" value="<?php print($rn_5['list_all_inst_implmnt_india'])?>">
                    </div>
                    <div class="form-group col-md-12">
					<?php if(isset($this->session->flashdata('step5')['list_all_inst_implmnt_abroad'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['list_all_inst_implmnt_abroad']; ?></span></div><?php } ?>
                      <label>iv) List of all the installations/implementations in other countries</label>
                      <input required="" type="text" class="form-control" name="list_all_inst_implmnt_abroad" value="<?php print($rn_5['list_all_inst_implmnt_abroad'])?>">
                    </div>
                    <div class="form-group col-md-12">
					<?php if(isset($this->session->flashdata('step5')['past_prj_imlmnt_on_time'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['past_prj_imlmnt_on_time']; ?></span></div><?php } ?>
                      <label>v) Whether the past projects were implemented in time and costs?</label>
                      <input required="" type="text" class="form-control" name="past_prj_imlmnt_on_time" value="<?php print($rn_5['past_prj_imlmnt_on_time'])?>">
                    </div>
                    <div class="form-group col-md-12">
					<?php if(isset($this->session->flashdata('step5')['num_yr_busns_of_epc'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['num_yr_busns_of_epc']; ?></span></div><?php } ?>
                      <label>vi) Number of years in business, Turnover of the EPC Contractor and number of employees</label>
                      <input required="" type="text" class="form-control" name="num_yr_busns_of_epc" value="<?php print($rn_5['num_yr_busns_of_epc'])?>">
                    </div>
                    <div class="form-group col-md-12">
					<?php if(isset($this->session->flashdata('step5')['num_bsns_yr'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['num_bsns_yr']; ?></span></div><?php } ?>
                      <label>vii) Number of years in business </label>
                      <input required="" type="text" class="form-control" name="num_bsns_yr" value="<?php print($rn_5['num_bsns_yr'])?>">
                    </div>
                    <div class="form-group col-md-12">
					<?php if(isset($this->session->flashdata('step5')['epc_group_comp'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['epc_group_comp']; ?></span></div><?php } ?>
                      <label>viii) Whether the EPC Contractor is a group company</label>
                      <input required="" type="text" class="form-control" name="epc_group_comp" value="<?php print($rn_5['epc_group_comp'])?>">
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['non_epc_route_epcm'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['non_epc_route_epcm']; ?></span></div><?php } ?>
                  <label>3) Non-EPC Route (EPCM)(Status of Key Contracts for Main Plant Equipment & Works, Status of Key Contracts for Balance of Plant (BOP) packages, Details of Equipments Suppliers for Main Plant Equipment (BTG) ) </label>
                  <textarea required=""  class="form-control" rows="5" id="" name="non_epc_route_epcm"><?php print($rn_5['non_epc_route_epcm'])?></textarea>
                </div>
                <!--<div class="form-group col-md-12">
                  <div class="sub-part">
                    <h5>4) Project Management Team</h5>
                    <div id="teammember1">
                      <ul>
                        <li>
                          <div class="teamdiv">
                            <div class="form-group col-md-11">
                              <label>Team Member</label>
                              <input required="" type="text" class="form-control" name="team_member[]">
                            </div>
                            <div class="form-group col-md-1">
                              <label>Remove</label>
                              <div class="add-feild">
                                <button type="button" class="btn btn-danger addsub" disabled="">X</button>
                              </div>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">
                      <label>Add Member (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addteammember1" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </div>
                </div>-->
				
				
				
				
				<div class="form-group col-md-12">
                  <div class="sub-part">
                    <h5>4) Project Management Team</h5>
					<?php if(!empty($rn_5['team_member']) && $rn_5['team_member'] != "N;") {?>
                    <div id="teammember1">			
					<?php 							
					$j = unserialize($rn_5['team_member']);		
					?>
					  <ul>						
					  <?php foreach($j as $k) { ?>
                        <li>
                          <div class="teamdiv">
                            <div class="form-group col-md-11">
							<?php if(isset($this->session->flashdata('step5')['team_member[]'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['team_member[]']; ?></span></div><?php } ?>
                              <label>Team Member</label>
                              <input   type="text" class="form-control" name="team_member[]" value="<?php print_r($k);?>">
                            </div>
                            <div class="form-group col-md-1">
                              <label>Remove</label>
                              <div class="add-feild">
                                <button type="button" id="removemember1" class="btn btn-danger addsub" >X</button>
                              </div>
                            </div>
                          </div>
                        </li>											
						<?php } ?>
                      </ul>
                    </div>
					<?php }else{ ?>
						 <div id="teammember1">			
				
					  <ul>						
					 
                        <li>
                          <div class="teamdiv">
                            <div class="form-group col-md-11">
							<?php if(isset($this->session->flashdata('step5')['team_member[]'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['team_member[]']; ?></span></div><?php } ?>
                              <label>Team Member</label>
                              <input   type="text" class="form-control" name="team_member[]" value="">
                            </div>
                            <div class="form-group col-md-1">
                              <label>Remove</label>
                              <div class="add-feild">
                                <button type="button" class="btn btn-danger addsub" disabled="">X</button>
                              </div>
                            </div>
                          </div>
                        </li>											
						
                      </ul>
                    </div>
					<?php } ?>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">
                      <label>Add Member (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addteammember1" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </div>
                </div>
				
				
				
				
				
				
				
				
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['oenr_eng_details'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['oenr_eng_details']; ?></span></div><?php } ?>
                  <label>5) Owners Engineer(Please give the following details of the owner's Engineers)<br>
                    &raquo;	Name and Background and qualifications<br>
                    &raquo;  Past experience in power projects – number of similar projects done in the past, outside the group's projects </label>
                  <textarea required=""  class="form-control" rows="5" id="" name="oenr_eng_details"><?php print($rn_5['oenr_eng_details'])?></textarea>
                </div>
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['cost_overrun'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['cost_overrun']; ?></span></div><?php } ?>
                  <label>6) Cost Overrun: Please highlight the key clauses with respect to Change Request/LDs/Performance Guarantees and Caps under LDs in the Contacts and explain as to how cost overruns, if any, are taken care </label>
                  <textarea required=""  class="form-control" rows="5" id="" name="cost_overrun"><?php print($rn_5['cost_overrun'])?></textarea>
                </div>
                <div class="form-group col-md-10">
				<?php if(isset($this->session->flashdata('step5')['time_schdl'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['time_schdl']; ?></span></div><?php } ?>
                  <label>7) Time Schedule: Please provide project implementation schedule and current status in terms of the Key Milestones, highlighting the delays if any </label>
                  <textarea required=""  class="form-control" rows="5" id="" name="time_schdl"><?php print($rn_5['time_schdl'])?></textarea>
                </div>
				<div class="form-group col-md-2">
				<label>Attachment</label>
				 <div class="attach"> <span class="btn btn-primary btn-file "> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input  type="file" accept="application/pdf, application/zip"  name="time_schdl_file" >
                    </span> 
					<?php if($rn_5['time_schdl_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_5['time_schdl_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					</div>
				</div>
				
				<div class="form-group col-md-3">
				<label>O&M contract copy</label>
				 <div class="attach"> <span class="btn btn-primary btn-file "> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input  type="file" accept="application/pdf, application/zip"  name="om_cntrct_file" >
                    </span> 
					<?php if($rn_5['om_cntrct_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $rn_5['om_cntrct_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					</div>
				</div>
				 <div class="form-group col-md-6">
				 <?php if(isset($this->session->flashdata('step5')['company_name_om_contract'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['company_name_om_contract']; ?></span></div><?php } ?>
                      <label>Name of company with whom O&M contract is signed</label>
                      <input required="" type="text" class="form-control" name="company_name_om_contract" value="<?php print($rn_5['company_name_om_contract'])?>">
                </div>
					
				<div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['common_facilities'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['common_facilities']; ?></span></div><?php } ?>
                      <label>Common Facilities (If any then mention, Name of company and contract price)</label>
                      <input required="" type="text" class="form-control" name="common_facilities" value="<?php print($rn_5['common_facilities'])?>">
                    </div>	
				
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['om_cntrct'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['om_cntrct']; ?></span></div><?php } ?>
                  <label>8) <strong>O&M Contract</strong>- Please specify the status of the O&M Contract, and if already awarded, give the following details:<br>
                    &raquo;	Experience and past track record of the Contractor<br>
                    &raquo;	List of all the O&M contracts done in India </label>
                  <textarea required=""  class="form-control" rows="5" id="" name="om_cntrct"><?php print($rn_5['om_cntrct'])?></textarea>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h5>19) List of Documents to be submitted CHECK LIST  (YES/NO) </h5>
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['Doc1'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc1']; ?></span></div><?php } ?>
                  <label>a) Copies of Licenses/Approvals obtained and/or the communication from authorities reflecting the current status of each of the Licenses/approvals</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" value="Yes" type="radio" name="Doc1" <?php if($rn_5['Doc1'] == "Yes"){echo "checked";}?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" value="No" type="radio" name="Doc1" <?php if($rn_5['Doc1'] == "No"){echo "checked";}?> />
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['Doc2'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc2']; ?></span></div><?php } ?>
                  <label>b) Project Allotment Letter/ MOU signed with State/Central Government, if applicable </label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" value="Yes" type="radio" name="Doc2" <?php if($rn_5['Doc2'] == "Yes"){echo "checked";}?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" value="No" type="radio" name="Doc2" <?php if($rn_5['Doc2'] == "No"){echo "checked";}?> />
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['Doc3'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc3']; ?></span></div><?php } ?>
                  <label>c) Detailed Project Report (DPR) – </label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" value="Yes" type="radio" name="Doc3" <?php if($rn_5['Doc3'] == "Yes"){echo "checked";}?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" value="No" type="radio" name="Doc3"  <?php if($rn_5['Doc3'] == "No"){echo "checked";}?> />
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['Doc4'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc4']; ?></span></div><?php } ?>
                  <label>d) Feasibility Report, Cost Estimates and any other studies conducted</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" value="Yes" type="radio" name="Doc4" <?php if($rn_5['Doc4'] == "Yes"){echo "checked";}?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" value="No" type="radio" name="Doc4" <?php if($rn_5['Doc4'] == "No"){echo "checked";}?> />
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['Doc5'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc5']; ?></span></div><?php } ?>
                  <label>e) Hydrology Studies ( In case of Small  Hydro Power)/Wind Assessment Report/Solar Radiation Report</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" value="Yes" type="radio" name="Doc5" <?php if($rn_5['Doc5'] == "Yes"){echo "checked";}?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" value="No" type="radio" name="Doc5" <?php if($rn_5['Doc5'] == "No"){echo "checked";}?> />
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['Doc6'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc6']; ?></span></div><?php } ?>
                  <label>f) Land search report showing chain of transaction leading to present owner for the last 12 years</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" value="Yes" type="radio" name="Doc6" <?php if($rn_5['Doc6'] == "Yes"){echo "checked";}?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" value="No" type="radio" name="Doc6" <?php if($rn_5['Doc6'] == "No"){echo "checked";}?> />
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['Doc7'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['7']; ?></span></div><?php } ?>
                  <label>g) Mutation of all transaction for the last 12 years sanctioned by A.C. Gr.-II. </label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" value="Yes" type="radio" name="Doc7" <?php if($rn_5['Doc7'] == "Yes"){echo "checked";}?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" value="No" type="radio" name="Doc7" <?php if($rn_5['Doc7'] == "No"){echo "checked";}?> />
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['Doc8'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc8']; ?></span></div><?php } ?>
                  <label>h) Proof of acquisition of land </label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" value="Yes" type="radio" name="Doc8" <?php if($rn_5['Doc8'] == "Yes"){echo "checked";}?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" value="No" type="radio" name="Doc8" <?php if($rn_5['Doc8'] == "No"){echo "checked";}?> />
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['Doc9'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc9']; ?></span></div><?php } ?>
                  <label>i) Letter of Allocation, Allotment or Assurance on Fuel and Water</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" value="Yes" type="radio" name="Doc9" <?php if($rn_5['Doc9'] == "Yes"){echo "checked";}?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" value="No" type="radio" name="Doc9" <?php if($rn_5['Doc9'] == "No"){echo "checked";}?> />
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['Doc10'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc10']; ?></span></div><?php } ?>
                  <label>j) Copies of fuel supply agreement in case of Biomass </label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" value="Yes" type="radio" name="Doc10" <?php if($rn_5['Doc10'] == "Yes"){echo "checked";}?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" value="No" type="radio" name="Doc10"  <?php if($rn_5['Doc10'] == "No"){echo "checked";}?> />
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['Doc11'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc11']; ?></span></div><?php } ?>
                  <label>k) Copies of the major Contracts/Agreements entered into – for Project engineering, procurement and construction </label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" value="Yes" type="radio" name="Doc11" <?php if($rn_5['Doc11'] == "Yes"){echo "checked";}?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" value="No" type="radio" name="Doc11" <?php if($rn_5['Doc11'] == "No"){echo "checked";}?> />
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['Doc12'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc12']; ?></span></div><?php } ?>
                  <label>l) Project Layout Diagram</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" value="Yes" type="radio" name="Doc12" <?php if($rn_5['Doc12'] == "Yes"){echo "checked";}?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" value="No" type="radio" name="Doc12" <?php if($rn_5['Doc12'] == "No"){echo "checked";}?> />
                      No </label>
                  </div>
                </div>
                <div class="form-group col-md-12">
				<?php if(isset($this->session->flashdata('step5')['Doc13'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc13']; ?></span></div><?php } ?>
                  <label>m) PERT/CPM charts showing the detailed schedule of the project </label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" value="Yes" type="radio" name="Doc13" <?php if($rn_5['Doc13'] == "Yes"){echo "checked";}?> />
                      Yes </label>
                    <label class="radio-inline">
                      <input required="" value="No" type="radio" name="Doc13" <?php if($rn_5['Doc13'] == "No"){echo "checked";}?> />
                      No </label>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                  <h6>n) List of all the Consultants with name, experience, contact persons details</h6>
                  <div class="clearfix"></div>
                  <div class="form-group col-md-4">
				  <?php if(isset($this->session->flashdata('step5')['Doc14'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc184']; ?></span></div><?php } ?>
                    <label>i) DPR </label>
                    <div class="">
                      <label class="radio-inline">
                        <input required="" value="Yes" type="radio" name="Doc14" <?php if($rn_5['Doc14'] == "Yes"){echo "checked";}?> />
                        Yes </label>
                      <label class="radio-inline">
                        <input required="" value="No" type="radio" name="Doc14" <?php if($rn_5['Doc14'] == "No"){echo "checked";}?> />
                        No </label>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
				  <?php if(isset($this->session->flashdata('step5')['Doc15'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc15']; ?></span></div><?php } ?>
                    <label>ii) Project Management </label>
                    <div class="">
                      <label class="radio-inline">
                        <input required="" value="Yes" type="radio" name="Doc15" <?php if($rn_5['Doc15'] == "Yes"){echo "checked";}?> />
                        Yes </label>
                      <label class="radio-inline">
                        <input required=""  value="No" type="radio" name="Doc15" <?php if($rn_5['Doc15'] == "No"){echo "checked";}?> />
                        No </label>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
				  <?php if(isset($this->session->flashdata('step5')['Doc16'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc16']; ?></span></div><?php } ?>
                    <label>iii) Detailed Engineering </label>
                    <div class="">
                      <label class="radio-inline">
                        <input required="" value="Yes" type="radio" name="Doc16" <?php if($rn_5['Doc16'] == "Yes"){echo "checked";}?> />
                        Yes </label>
                      <label class="radio-inline">
                        <input required="" value="No" type="radio" name="Doc16"  <?php if($rn_5['Doc16'] == "No"){echo "checked";}?> />
                        No </label>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
				  <?php if(isset($this->session->flashdata('step5')['Doc17'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc17']; ?></span></div><?php } ?>
                    <label>iv) Owner's Engineers </label>
                    <div class="">
                      <label class="radio-inline">
                        <input required="" value="Yes" type="radio" name="Doc17" <?php if($rn_5['Doc17'] == "Yes"){echo "checked";}?> />
                        Yes </label>
                      <label class="radio-inline">
                        <input required="" value="No" type="radio" name="Doc17" <?php if($rn_5['Doc17'] == "No"){echo "checked";}?> />
                        No </label>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
				  <?php if(isset($this->session->flashdata('step5')['Doc18'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc18']; ?></span></div><?php } ?>
                    <label>v) Procurement </label>
                    <div class="">
                      <label class="radio-inline">
                        <input required="" value="Yes" type="radio" name="Doc18" <?php if($rn_5['Doc18'] == "Yes"){echo "checked";}?> />
                        Yes </label>
                      <label class="radio-inline">
                        <input required="" value="No" type="radio" name="Doc18" <?php if($rn_5['Doc18'] == "No"){echo "checked";}?> />
                        No </label>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
				  <?php if(isset($this->session->flashdata('step5')['Doc19'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc19']; ?></span></div><?php } ?>
                    <label>vi) Contractors (for Main Plant and BOP) </label>
                    <div class="">
                      <label class="radio-inline">
                        <input required="" value="Yes" type="radio" name="Doc19" <?php if($rn_5['Doc19'] == "Yes"){echo "checked";}?> />
                        Yes </label>
                      <label class="radio-inline">
                        <input required="" value="No" type="radio" name="Doc19" <?php if($rn_5['Doc19'] == "No"){echo "checked";}?> />
                        No </label>
                    </div>
                  </div>
                  <div class="form-group col-md-4">
				  <?php if(isset($this->session->flashdata('step5')['Doc20'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step5')['Doc20']; ?></span></div><?php } ?>
                    <label>vii) Suppliers of Main Plant & Machinery (BTG packages) </label>
                    <div class="">
                      <label class="radio-inline">
                        <input required="" value="Yes" type="radio" name="Doc20" <?php if($rn_5['Doc20'] == "Yes"){echo "checked";}?> />
                        Yes </label>
                      <label class="radio-inline">
                        <input required="" value="No" type="radio" name="Doc20" <?php if($rn_5['Doc20'] == "No"){echo "checked";}?> />
                        No </label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
			
            <!--<div class="col-md-12 text-center">
              <h3><button type="submit" class="fa fa-hand-o-right">Entity Details</button></h3>
            </div>-->
            <div class="col-md-12 text-right">
				<button class="btn btn-default prevBtn pull-left" type="button">Previous</button>
              <button type="submit" class="btn btn-primary">Save & Next</button>
            </div>
            </form>
          </div>
          <div class="row setup-content" id="renew-6">
          	<form role="form" action="<?php echo base_url(); ?>form1/process_rn_6" method="post" enctype="multipart/form-data">
            <div class="col-md-12 generalcontain">
              <h3><u>DECLARATION FORM</u></h3>
              <p>I/we confirm/affirm and undertake as below: -</p>
              <ul class="geninstruction">
                <li>That no insolvency proceedings initiated against me/us nor have I/we ever been adjudicated insolvent. Further, that no litigation is pending against the securities proposed to be offered in shape of movable or immovable, in any court in India or outside India</li>
                <li>That neither I have been defaulter of any bank or financial institution nor any accounts has been written off by any bank/financial institution and that my name doesn't appear in RBI caution list/defaulter list etc</li>
                <li>I am /we are not  closely related to any of the Directors of REC</li>
                <li>That I /we have read the application form and am/are aware of all the term and conditions of availing finance from REC. I also authorize REC to exchange, share, part with all the information relating to me/our loan details and repayment history information to other bank/financial institution/credit bureaus/agencies as may be required and shall not hold the REC for use of this information.</li>
                <li>I/we shall furnish any information required by REC to process my application for loan and also to be bound by the rules or by the revised additional terms and conditions which may at any time hereafter be made while the loan obtained by me is still outstanding</li>
                <li>And the information given in the application is correct, complete and up to date in all respects and I/we have not withheld any information.</li>
                <li>We undertake that any photocopied document submitted along with loan application format or during the appraisal process or any time thereafter is exact copy of original document. </li>
                <li>Any material discrepancy/deviation subsequently found in any particulars herein furnished would entitle REC to treat the loan application as defunct, in which case the processing fees already paid would be forfeited and  a fresh application would be required to be filed to seek financial assistance from REC</li>
                <li>All information pertaining to borrower and all promoters including information contained in Loan application form including Information memorandum prepared by Lead Bank/FI or syndicator or company or any annexure thereto are true, correct, updated, accurate and is neither misleading nor qualified. We undertake that all information pertaining to promoters has been obtained from authorized representatives of promoters</li>
                <li>We understand that information furnished by REC towards project, borrower or promoters forms the basis of appraisal. We undertake to inform REC of any up-dations on all/any information furnished to REC for appraisal and undertake to notify REC in writing and in a prompt manner of any of the fact, matter or circumstance (whether existing on or before the submission of Loan application form or arising afterwards) which would could reasonably be expected to cause any of the information given to become, in any manner untrue, inaccurate, in complete or misleading.</li>
                <li>We undertake that any change in promoter group structure will be immediately   communicated to REC</li>
                <li>The information given herein before and the Statements and other papers enclosed are to the best of our knowledge and belief, true and correct in all particulars.</li>
                <li>No borrowing arrangements except as indicated above are made.</li>
                <li>No legal action is being taken against me/us.</li>
                <li>I/We shall furnish all other information that may be required by you in connection with the application.</li>
                <li>REC or its nominees or any other agency authorized by REC may at any time inspect/ verify our assets, books of accounts, etc., in my / our factory & business premises.</li>
                <li>We acknowledge and accept that mere submission of above documents alone will not entitle an applicant for registration and sanction of loan.</li>
                <li>We accept that REC is having its right to reject any loan application at any stage</li>
              </ul>
			  <div class="form-group">
                <div class="col-md-4">
					<?php if(isset($this->session->flashdata('step6')['place'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step6')['place']; ?></span></div><?php } ?>
                    <label>Place </label>
                      <input  class="form-control" type="text" name="place" placeholder="Place" value="<?php echo $rn_1['place']?>" required/>
                     
                </div>
				<div class="col-md-4">
                <?php if(isset($this->session->flashdata('step6')['date'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step6')['date']; ?></span></div><?php } ?>
                    <label>Date </label>
                      <input  class="form-control" id="dp33" type="text" name="date" placeholder="dd/mm/yyyy" value="<?php echo $rn_1['date']?>" required/>
                     
                </div>
				
              </div>
			  
              <div class="form-group">
                <div class="col-md-12">
                  <div class="checkbox">
				  <?php if(isset($this->session->flashdata('step6')['agree'])) { ?><div class="has-error"><span class="help-block"><?php echo  $this->session->flashdata('step6')['agree']; ?></span></div><?php } ?>
                    <label>
                      <input required="" type="checkbox" name="agree" value="agree" <?php if($rn_1['status'] == "agree") { echo "checked"; } ?> />
                      I agree with the terms above. </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 text-right">
              <button type="s" class="btn btn-primary">Save & Next</button>
            </div>
            </form>
          </div>
       </div>
      </div>
    </div>
     
    
    <div class="statesectorthings">
      <div class="container">
        <div class="stepwizard">
          <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step state ss_step1"> <a href="#state-1" type="button" id="idTd" class="btn btn-primary btn-circle state_sector_1">1</a>
              <p>Step 1</p>
            </div>
            <div class="stepwizard-step state ss_step2"> <a href="#state-2" type="button" id="idTd1" class="btn btn-default btn-circle state_sector_2" disabled="disabled">2</a>
              <p>Step 2</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
      <?php echo $this->session->flashdata('success');?>
		<div class="loan-form">
        
          <div class="row setup-content" id="state-1">
			<form enctype="multipart/form-data"  role="form" name="state_sector" action="<?php echo base_url();?>form1/process_state_sector_form" method="POST">
            <div class="col-md-12 text-center">
              <h2 class="formheading">T&D </h2>
            </div>
			
            <div class="col-md-12">
              <div class="sub-part">
                  
             
                  
                  
                <h4>State Sector</h4>
                <div class="form-group col-md-4">
                    
                    
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector[borrower_name]'])) { echo  $this->session->flashdata('step1')['state_sector[borrower_name]']; } ?></span></div>
                    
                  <label>1) Name of Borrower</label>
                  <input required="" type="text" class="form-control" name="state_sector[borrower_name]" value= "<?php print($state_sector['borrower_name']); ?>" >
                </div>
                <div class="form-group col-md-4">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector[sector]'])) { echo  $this->session->flashdata('step1')['state_sector[sector]']; } ?></span></div>
                    
                  <label>2) Sector</label>
                  <select class="form-control" required="" name="state_sector[sector]" onChange="setorSelectCheck(this);">
                    <option value="" disabled>Select</option>
                    <option id="sectorOption" value="Transmission"  <?php if($state_sector['sector'] == "Transmission"){echo "selected"; } ?> >Transmission</option>
                    <option value="Distribution" <?php if($state_sector['sector'] == "Distribution"){echo "selected"; } ?>>Distribution</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector[state]'])) { echo  $this->session->flashdata('step1')['state_sector[state]']; } ?></span></div>
                    
                  <label>3) Name of State</label>
                  <select class="form-control" required="" name="state_sector[state]">
                    <option value=""  >Select State</option>
                    <option value="Andaman and Nicobar Islands" <?php if($state_sector['state'] == "Andaman and Nicobar Islands"){echo "selected"; } ?> >Andaman and Nicobar Islands</option>
                    <option value="Andhra Pradesh" <?php if($state_sector['state'] == "Andhra Pradesh"){echo "selected"; } ?> >Andhra Pradesh</option>
                    <option value="Arunachal Pradesh" <?php if($state_sector['state'] == "Arunachal Pradesh"){echo "selected"; } ?> >Arunachal Pradesh</option>
                    <option value="Assam" <?php if($state_sector['state'] == "Assam"){echo "selected"; } ?> >Assam</option>
                    <option value="Bihar" <?php if($state_sector['state'] == "Bihar"){echo "selected"; } ?> >Bihar</option>
                    <option value="Chandigarh" <?php if($state_sector['state'] == "Chandigarh"){echo "selected"; } ?> >Chandigarh</option>
                    <option value="Chhattisgarh" <?php if($state_sector['state'] == "Chhattisgarh"){echo "selected"; } ?> >Chhattisgarh</option>
                    <option value="Dadra and Nagar Haveli" <?php if($state_sector['state'] == "Dadra and Nagar Haveli"){echo "selected"; } ?> >Dadra and Nagar Haveli</option>
                    <option value="Daman and Diu" <?php if($state_sector['state'] == "Daman and Diu"){echo "selected"; } ?>>Daman and Diu</option>
                    <option value="Delhi" <?php if($state_sector['state'] == "Delhi"){echo "selected"; } ?> >Delhi</option>
                    <option value="Goa" <?php if($state_sector['state'] == "Goa"){echo "selected"; } ?> >Goa</option>
                    <option value="Gujarat" <?php if($state_sector['state'] == "Gujarat"){echo "selected"; } ?> >Gujarat</option>
                    <option value="Haryana" <?php if($state_sector['state'] == "Haryana"){echo "selected"; } ?> >Haryana</option>
                    <option value="Himachal Pradesh" <?php if($state_sector['state'] == "Himachal Pradesh"){echo "selected"; } ?> >Himachal Pradesh</option>
                    <option value="Jammu and Kashmir" <?php if($state_sector['state'] == "Jammu and Kashmir"){echo "selected"; } ?> >Jammu and Kashmir</option>
                    <option value="Jharkhand" <?php if($state_sector['state'] == "Jharkhand"){echo "selected"; } ?> >Jharkhand</option>
                    <option value="Karnataka" <?php if($state_sector['state'] == "Karnataka"){echo "selected"; } ?> >Karnataka</option>
                    <option value="Kerala" <?php if($state_sector['state'] == "Kerala"){echo "selected"; } ?> >Kerala</option>
                    <option value="Lakshadweep" <?php if($state_sector['state'] == "Lakshadweep"){echo "selected"; } ?> >Lakshadweep</option>
                    <option value="Madhya Pradesh" <?php if($state_sector['state'] == "Madhya Pradesh"){echo "selected"; } ?> >Madhya Pradesh</option>
                    <option value="Maharashtra" <?php if($state_sector['state'] == "Maharashtra"){echo "selected"; } ?> >Maharashtra</option>
                    <option value="Manipur" <?php if($state_sector['state'] == "Manipur"){echo "selected"; } ?> >Manipur</option>
                    <option value="Meghalaya" <?php if($state_sector['state'] == "Meghalaya"){echo "selected"; } ?> >Meghalaya</option>
                    <option value="Mizoram" <?php if($state_sector['state'] == "Mizoram"){echo "selected"; } ?> >Mizoram</option>
                    <option value="Nagaland" <?php if($state_sector['state'] == "Nagaland"){echo "selected"; } ?> >Nagaland</option>
                    <option value="Orissa" <?php if($state_sector['state'] == "Orissa"){echo "selected"; } ?> >Orissa</option>
                    <option value="Pondicherry" <?php if($state_sector['state'] == "Pondicherry"){echo "selected"; } ?> >Pondicherry</option>
                    <option value="Punjab" <?php if($state_sector['state'] == "Punjab"){echo "selected"; } ?> >Punjab</option>
                    <option value="Rajasthan" <?php if($state_sector['state'] == "Rajasthan"){echo "selected"; } ?> >Rajasthan</option>
                    <option value="Sikkim" <?php if($state_sector['state'] == "Sikkim"){echo "selected"; } ?> >Sikkim</option>
                    <option value="Tamil Nadu" <?php if($state_sector['state'] == "Tamil Nadu"){echo "selected"; } ?>>Tamil Nadu</option>
                    <option value="Tripura" <?php if($state_sector['state'] == "Tripura"){echo "selected"; } ?> >Tripura</option>
                    <option value="Uttaranchal" <?php if($state_sector['state'] == "Uttaranchal"){echo "selected"; } ?> >Uttaranchal</option>
                    <option value="Uttar Pradesh" <?php if($state_sector['state'] == "Uttar Pradesh"){echo "selected"; } ?> >Uttar Pradesh</option>
                    <option value="West Bengal" <?php if($state_sector['state'] == "West Bengal"){echo "selected"; } ?>>West Bengal</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector[project_name]'])) { echo  $this->session->flashdata('step1')['state_sector[project_name]']; } ?></span></div>
                    
                  <label>4) Name of the Project</label>
                  <input required="" type="text" class="form-control" name="state_sector[project_name]" value="<?php print($state_sector['project_name'])?>">
                </div>
                <div class="form-group col-md-5">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector[category]'])) { echo  $this->session->flashdata('step1')['state_sector[category]']; } ?></span></div>
                    
                  <label>5) Category</label>
                  <div class="">
                    <label for="chkYsiie" class="radio-inline">
                      <input required="" type="radio" id="chkYsiie" value="SI" name="state_sector[category]" onClick="ShowHideSiie()" <?php if($state_sector['category']== "SI"){echo "checked" ;}?> />
                      SI </label>
                    <label for="chkNnamea" class="radio-inline">
                      <input required="" type="radio" id="chkNsiie" value="EI" name="state_sector[category]" onClick="ShowHideSiie()"  <?php if($state_sector['category']== "EI"){echo "checked" ;}?> />
                      EI </label>
                    <label for="chkOnamea" class="radio-inline">
                      <input required="" type="radio" id="chkOsiie" value="Other" name="state_sector[category]" onClick="ShowHideSiie()" <?php if($state_sector['category']== "Other"){echo "checked" ;}?>  />
                      Other </label>
                    <div class="pull-right" id="dvSiie" style="display: <?php if($state_sector['category']== "SI"){echo "blocked" ;}else{echo "none"; }?>">
                        
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector[category_si]'])) { echo  $this->session->flashdata('step1')['state_sector[category_si]']; } ?></span></div>
                        
                        
                      <select id="SIIE" class="form-control" required="" onChange="admSelectCheck(this);" name="state_sector[category_si]">
                        <option  >Select SI Category</option>
                        <option value="Transmission" <?php if($state_sector['category_si'] == "Transmission"){echo "selected"; } ?> >Transmission</option>
                        <option value="Distribution" <?php if($state_sector['category_si'] == "Distribution"){echo "selected"; } ?> >Distribution</option>
                        <option id="admOption" value="Bulk" <?php if($state_sector['category_si'] == "Bulk"){echo "selected"; } ?> >Bulk</option>
                      </select>
                    </div>
                    <div class="pull-right" id="dvSiieO" style="display: <?php if($state_sector['category']== "Other"){echo "blocked" ;}else{echo "none"; }?>">
                        
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector[category_other]'])) { echo  $this->session->flashdata('step1')['state_sector[category_other]']; } ?></span></div>
                        
                       <input type="text" class="form-control" name="state_sector[category_other]" value="<?php if($state_sector['category']== "Other"){ print($state_sector['category_other']); }?>">
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-12">
                  <div class="sub-part">
                    <h4>A. Financial Details of Project</h4>
                    <div class="form-group col-md-4">
                        
                   
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_a[cost_excluding_idc]'])) { echo  $this->session->flashdata('step1')['state_sector_a[cost_excluding_idc]']; } ?></span></div>
                        
                      <label>1) Project Cost excluding(IDC)(in lakhs)</label>
                      <input required="" type="number" class="form-control state_project_cost_IDC" name="state_sector_a[cost_excluding_idc]" value="<?php print($state_sector_a['cost_excluding_idc'])?>" >
                    </div>
                    <div class="form-group col-md-4">
                        
                        
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_a[idc]'])) { echo  $this->session->flashdata('step1')['state_sector_a[idc]']; } ?></span></div>
                        
                      <label>2) IDC(in lakhs)</label>
                      <input required="" type="number" class="form-control state_IDC_lakhs" name="state_sector_a[idc]" value="<?php print($state_sector_a['idc'])?>" >
                    </div>
                    <div class="form-group col-md-4">
                                                
                      <label>3) Total Project Cost (in lakhs)</label>
                      <input required="" type="text" class="form-control state_total_projects" name="state_sector_a[total_cost]" value="<?php print($state_sector_a['total_cost'])?>" readonly>
					   
					   <input  type="hidden" class="form-control state_total_projects1" name="state_sector_a[total_cost]" value="<?php print($state_sector_a['total_cost'])?>" >
					  
                    </div>
                    <div class="form-group col-md-4">
                        
                                    
                        
                      <label>4) Debt Equity Ratio</label>
                      <input  type="text" class="form-control equity_ratio" name="state_sector_a[debt_equity_ratio]" value="<?php print($state_sector_a['debt_equity_ratio'])?>" readonly>
					  
					   <input type="hidden" class="form-control equity_ratio1" name="state_sector_a[debt_equity_ratio]" value="<?php print($state_sector_a['debt_equity_ratio'])?>" >
                    </div>
                    <div class="form-group col-md-4">
                        
                           
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_a[debt_equity_ratio]'])) { echo  $this->session->flashdata('step1')['state_sector_a[debt_equity_ratio]']; } ?></span></div>
                        
                      <label>5) Equity contribution(in lakhs)</label>
                      <input required="" type="number" class="form-control equity_contribution" name="state_sector_a[debt_equity_ratio]" value="<?php print($state_sector_a['debt_equity_ratio'])?>" >
                    </div>
                    <div class="form-group col-md-4">
                      <label>6) Total Loan Amount(in lakhs)</label>
                      <input type="number" class="form-control state_total_loan" name="state_sector_a[total_loan_amount]" value="<?php print($state_sector_a['total_loan_amount'])?>" readonly >
					  <input  type="hidden" class="form-control state_total_loan1" name="state_sector_a[total_loan_amount]" value="<?php print($state_sector_a['total_loan_amount'])?>" >
                    </div>
                    <div class="form-group col-md-6">
                        
                           
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_a[loan_amount_req_from_rec]'])) { echo  $this->session->flashdata('step1')['state_sector_a[loan_amount_req_from_rec]']; } ?></span></div>
                        
                        
                        
                      <label>7) Loan Amount requested from REC(in lakhs)</label>
                      <input required="" type="number" class="form-control state_loan_amount" name="state_sector_a[loan_amount_req_from_rec]" value="<?php print($state_sector_a['loan_amount_req_from_rec'])?>">
                    </div>
                    <div class="form-group col-md-6">
                        
                           
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_a[loan_amount_req_other_lenders]'])) { echo  $this->session->flashdata('step1')['state_sector_a[loan_amount_req_other_lenders]']; } ?></span></div>
                        
                        
                        
                      <label>8) Loan Amount requested from Other lenders(if any)(in lakhs)</label>
                      <input required="" type="number" class="form-control state_loan_amount_req" name="state_sector_a[loan_amount_req_other_lenders]" value="<?php print($state_sector_a['loan_amount_req_other_lenders'])?>" >
                    </div>
                      
                         
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_a[grant]'])) { echo  $this->session->flashdata('step1')['state_sector_a[grant]']; } ?></span></div>
                        
                      
                    <div class="form-group col-md-6">
                      <label>9) Grant (if any)(in lakhs)</label>
                      <input required="" type="text" class="form-control grant" name="state_sector_a[grant]" value="<?php print($state_sector_a['grant_total'])?>" >
                    </div>
                    <div class="form-group col-md-6">
                        
                           
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_a[hard_cost]'])) { echo  $this->session->flashdata('step1')['state_sector_a[hard_cost]']; } ?></span></div>
                        
                        
                      <label>10) Hard Cost(cost of equipment and Labour)(in lakhs)</label>
                      <input required="" type="text" class="form-control hard_cost1" name="state_sector_a[hard_cost]" value="<?php print($state_sector_a['hard_cost'])?>" >
                    </div>
                    <div class="form-group col-md-6">
                        
                           
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_a[soft_cost]'])) { echo  $this->session->flashdata('step1')['state_sector_a[soft_cost]']; } ?></span></div>
                        
                        
                      <label>11) Soft Cost (contigency, administrative charges and other charges)(in lakhs)</label>
                      <input required="" type="text" class="form-control soft_cost1" name="state_sector_a[soft_cost]" value="<?php print($state_sector_a['soft_cost'])?>" >
                    </div>
					
					<div class="form-group col-md-3">
					 <label> Hard Cost % </label>
						 <input required="" type="text" class="form-control hardsoftcost" value="" readonly >
                    </div>
					<div class="form-group col-md-3">
					 <label> Soft Cost % </label>
						 <input type="text" class="form-control hardsoftcost1" value="" readonly >
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <div class="sub-part">
                    <h4>B. Project Details</h4>
                    <div class="form-group col-md-12">
                        
                           <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[scope_of_work]'])) { echo  $this->session->flashdata('step1')['state_sector_b[scope_of_work]']; } ?></span></div>
                        
                        
                      <label>1) Scope of Work in prescribed Format -I(Attach document as per below format)</label>
                      <div class="attach">
                        <input required="" type="text" class="form-control" name="state_sector_b[scope_of_work]" value="<?php print($state_sector_b['scope_of_work'])?>">
                        <span class="btn btn-primary btn-file attach-c" style="right:<?php if($state_sector_b['scope_of_work_file']) { echo "42px;";}else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  name="scope_of_work_file" >
                        </span> 
						 <?php if($state_sector_b['scope_of_work_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_b['scope_of_work_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
						</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                      <table class="table table-bordered gentable">
                        <thead>
                          <tr>
                            <th>Sr. No.</th>
                            <th>Items</th>
                            <th>Unit rate</th>
                            <th>Quantity</th>
                            <th>Total Amount</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><span>Sr. No.</span>
                              <div>&nbsp;</div></td>
                            <td><span>Items</span>
                              <div>&nbsp;</div></td>
                            <td><span>Unit rate</span>
                              <div>&nbsp;</div></td>
                            <td><span>Quantity</span>
                              <div>&nbsp;</div></td>
                            <td><span>Total Amount</span>
                              <div>&nbsp;</div></td>
                          </tr>
                          <tr>
                            <td><span>Sr. No.</span>
                              <div>&nbsp;</div></td>
                            <td><span>Items</span>
                              <div>&nbsp;</div></td>
                            <td><span>Unit rate</span>
                              <div>&nbsp;</div></td>
                            <td><span>Quantity</span>
                              <div>&nbsp;</div></td>
                            <td><span>Total Amount</span>
                              <div>&nbsp;</div></td>
                          </tr>
                          <tr>
                            <td><span>Sr. No.</span>
                              <div>&nbsp;</div></td>
                            <td><span>Items</span>
                              <div>&nbsp;</div></td>
                            <td><span>Unit rate</span>
                              <div>&nbsp;</div></td>
                            <td><span>Quantity</span>
                              <div>&nbsp;</div></td>
                            <td><span>Total Amount</span>
                              <div>&nbsp;</div></td>
                          </tr>
                          <tr>
                            <td><span>Sr. No.</span>
                              <div>&nbsp;</div></td>
                            <td><span>Items</span>
                              <div>Total</div></td>
                            <td><span>Unit rate</span>
                              <div>&nbsp;</div></td>
                            <td><span>Quantity</span>
                              <div>&nbsp;</div></td>
                            <td><span>Total Amount</span>
                              <div>&nbsp;</div></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="form-group col-md-4">
                        
                           <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[project_area]'])) { echo  $this->session->flashdata('step1')['state_sector_b[project_area]']; } ?></span></div>
                        
                      <label>2) Project Area</label>
                      <input required="" type="text" class="form-control" name="state_sector_b[project_area]" value="<?php print($state_sector_b['project_area'])?>">
                    </div>
                    <div class="form-group col-md-4">
                        
                           <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[cost_estimates_basis]'])) { echo  $this->session->flashdata('step1')['state_sector_b[cost_estimates_basis]']; } ?></span></div>
                        
                      <label>3) Basis of Cost Estimates</label>
					   <div class="attach">
                        <input required="" type="text" class="form-control" name="state_sector_b[cost_estimates_basis]" value="<?php print($state_sector_b['cost_estimates_basis'])?>">
                        <span class="btn btn-primary btn-file attach-c" style="right:<?php if($state_sector_b['cost_estimates_basis_file']) { echo "42px;";}else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  name="cost_estimates_basis_file" >
                        </span> 
						<?php if($state_sector_b['cost_estimates_basis_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_b['cost_estimates_basis_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
						</div>
					  
                    </div>
                    <div class="form-group col-md-4">
                        
                           <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[dpr_preparation]'])) { echo  $this->session->flashdata('step1')['state_sector_b[dpr_preparation]']; } ?></span></div>
                        
                      <label>4)DPR Attachment</label>
                      <div class="attach">
                        <input required="" type="text" class="form-control" name="state_sector_b[dpr_preparation]" value="<?php print($state_sector_b['dpr_preparation'])?>">
                        <span class="btn btn-primary btn-file attach-c" style="right:<?php if($state_sector_b['dpr_preparation_file']) { echo "42px;";}else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  name="dpr_preparation_file" >
                        </span> 
						<?php if($state_sector_b['dpr_preparation_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_b['dpr_preparation_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
						</div>
                    </div>
                    <div class="form-group col-md-12">
                        
                        
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[detail_project_justification]'])) { echo  $this->session->flashdata('step1')['state_sector_b[detail_project_justification]']; } ?></span></div>
                        
                      <label>5) Detailed Justification for the project</label>
					  
					  <div class="attach" id="dvShare" style="display: block; padding-bottom: 10px;"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  id="txtShareHold" name="detail_project_justification_file"  >
                        </span> 
						<?php if($state_sector_b['detail_project_justification_file']) { ?>
						 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_b['detail_project_justification_file']); ?>"> 
							<span><i class="fa fa-download" aria-hidden="true"></i></span>
						</a> 
						<?php } ?>
						</div>
					  
					  
                      <textarea required=""  class="form-control" rows="5" id="" name="state_sector_b[detail_project_justification]"><?php print($state_sector_b['detail_project_justification'])?></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[single_line_project_diagram]'])) { echo  $this->session->flashdata('step1')['state_sector_b[single_line_project_diagram]']; } ?></span></div>
                        
                      <label>6) Single Line Diagram of the project</label>
                      <div class="attach">
                        <input required="" type="text" class="form-control" name="state_sector_b[single_line_project_diagram]" value="<?php print($state_sector_b['single_line_project_diagram'])?>">
                        <span class="btn btn-primary btn-file attach-c" style="right:<?php if($state_sector_b['single_line_project_diagram_file']) { echo "42px;";}else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  name="single_line_project_diagram_file"  >
                        </span> 
						<?php if($state_sector_b['single_line_project_diagram_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_b['single_line_project_diagram_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
						</div>
                    </div>
                    <div class="form-group col-md-6 " id="sectorDivCheck" style="display:<?php if($state_sector['sector'] == "Transmission"){echo "block"; }else{ echo "none"; } ?>;" >
                        
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[grid_map_of_proposed_proj]'])) { echo  $this->session->flashdata('step1')['state_sector_b[grid_map_of_proposed_proj]']; } ?></span></div>
                        
                        
                      <label>7) Grid Map of the proposed projects (Transmission)</label>
                      <div class="attach">
                        <input  type="text" class="form-control" name="state_sector_b[grid_map_of_proposed_proj]" value="<?php print($state_sector_b['grid_map_of_proposed_proj'])?>" >
                        <span class="btn btn-primary btn-file attach-c" style="right:<?php if($state_sector_b['grid_map_of_proposed_proj_file']) { echo "42px;";}else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  name="grid_map_of_proposed_proj_file" >
                        </span> 
						<?php if($state_sector_b['grid_map_of_proposed_proj_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_b['grid_map_of_proposed_proj_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
						</div>
                    </div>
                    <div class="form-group col-md-6">
                        
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[execution_mode]'])) { echo  $this->session->flashdata('step1')['state_sector_b[execution_mode]']; } ?></span></div>
                        
                      <label>8) Mode of Execution</label>
                      <select class="form-control" required="" name="state_sector_b[execution_mode]" >
                        <option value="" disabled="" selected="">Select</option>
                        <option value="Turnkey" <?php if($state_sector_b['execution_mode'] == "Turnkey"){echo "selected"; }?>>Turnkey</option>
                        <option value="Partial Turnkey" <?php if($state_sector_b['execution_mode'] == "Partial Turnkey"){echo "selected"; }?> >Partial Turnkey</option>
                        <option value="Department" <?php if($state_sector_b['execution_mode'] == "Department"){echo "selected"; }?> >Deparmental</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                        
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[tendering_status]'])) { echo  $this->session->flashdata('step1')['state_sector_b[tendering_status]']; } ?></span></div>
                        
                      <label>9) Status of Tendering</label>
					  <select class="form-control" name="state_sector_b[tendering_status]">
					  <option>Select</option>
				  <option value="NIT yet to be Floated"<?php if($state_sector_b['tendering_status'] == "NIT yet to be Floated"){ echo "selected"; } ?>>NIT yet to be Floated</option>
				  <option value="NIT Floated"<?php if($state_sector_b['tendering_status'] == "NIT Floated") { echo "selected"; } ?>>NIT Floated</option>
				  <option value="Tender Under Process"<?php if($state_sector_b['tendering_status'] == "Tender Under Process") { echo "selected"; } ?>>Tender Under Process</option>
				  <option value="Awarded"<?php if($state_sector_b['tendering_status'] == "Awarded") { echo "selected"; } ?>>Awarded</option>
					  </select>
                    </div>
                    
                    <div class="">
                    <div class="sub-part">
                    <div class="col-md-12">
                    <h6>10) Project Viablity</h6>
                    </div>
                    <div class="form-group col-md-6">
                        
                         <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[irr]'])) { echo  $this->session->flashdata('step1')['state_sector_b[irr]']; } ?></span></div>
                        
                      <label>a) IRR</label>
                      <div class="attach">
                        <input required="" type="text" class="form-control" name="state_sector_b[irr]" value="<?php print($state_sector_b['irr'])?>">
                        <span class="btn btn-primary btn-file attach-c" style="right:<?php if($state_sector_b['irr_file']) { echo "42px;";}else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  name="irr_file" >
                        </span> 
						<?php if($state_sector_b['irr_file']) { ?>
						 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_b['irr_file']); ?>"> 
							<span><i class="fa fa-download" aria-hidden="true"></i></span>
						</a> 
						<?php } ?>
						</div>
                      </div>
                    <div class="form-group col-md-6">
                        
                         <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[tendering_status]'])) { echo  $this->session->flashdata('step1')['state_sector_b[tendering_status]']; } ?></span></div>
                        
                        
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[dscr]'])) { echo  $this->session->flashdata('step1')['state_sector_b[dscr]']; } ?></span></div>
                        
                      <label>b) DSCR</label>
                      <div class="attach">
                        <input required="" type="text" class="form-control" name="state_sector_b[dscr]" value="<?php print($state_sector_b['dscr'])?>">
                        <span class="btn btn-primary btn-file attach-c" style="right:<?php if($state_sector_b['dscr_file']) { echo "42px;";}else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  name="dscr_file" >
                        </span> 
						<?php if($state_sector_b['dscr_file']) { ?>
						 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_b['dscr_file']); ?>"> 
							<span><i class="fa fa-download" aria-hidden="true"></i></span>
						</a> 
						<?php } ?>
						</div>
                      </div>
                    
                    </div>
                    </div>
                    <div class="">
                    <div class="sub-part">
                    <div class="col-md-12">
                    <h6>11) Regulatory approval of the Projectty</h6>
                    </div>
                    <div class="form-group col-md-3">
                        
                        
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[board_of_directors]'])) { echo  $this->session->flashdata('step1')['state_sector_b[board_of_directors]']; } ?></span></div>
                        
                      <label>a) Board of Directors</label>
                       <div class="attach">
                        <input required="" type="text" class="form-control" name="state_sector_b[board_of_directors]" value="<?php print($state_sector_b['board_of_directors'])?>">
                        <span class="btn btn-primary btn-file attach-c" style="right:<?php if($state_sector_b['board_of_directors_file']) { echo "42px;";}else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  name="board_of_directors_file" >
                        </span> 
						<?php if($state_sector_b['board_of_directors_file']) { ?>
						 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_b['board_of_directors_file']); ?>"> 
							<span><i class="fa fa-download" aria-hidden="true"></i></span>
						</a> 
						<?php } ?>
						</div>
                      </div>
                    <div class="form-group col-md-3">
                        
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[cea]'])) { echo  $this->session->flashdata('step1')['state_sector_b[cea]']; } ?></span></div>
                        
                      <label>b) CEA</label>
					  <div class="attach">
                        <input required="" type="text" class="form-control" name="state_sector_b[cea]" value="<?php print($state_sector_b['cea'])?>">
                        <span class="btn btn-primary btn-file attach-c" style="right:<?php if($state_sector_b['cea_file']) { echo "42px;";}else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  name="cea_file" >
                        </span> 
						<?php if($state_sector_b['cea_file']) { ?>
						 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_b['cea_file']); ?>"> 
							<span><i class="fa fa-download" aria-hidden="true"></i></span>
						</a> 
						<?php } ?>
						</div>
					 
					 </div>
                    <div class="form-group col-md-3">
                        
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[serc]'])) { echo  $this->session->flashdata('step1')['state_sector_b[serc]']; } ?></span></div>
                        
                      <label>c) SERC</label>
					   <div class="attach">
                        <input required="" type="text" class="form-control" name="state_sector_b[serc]" value="<?php print($state_sector_b['serc'])?>">
                        <span class="btn btn-primary btn-file attach-c" style="right:<?php if($state_sector_b['serc_file']) { echo "42px;";}else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  name="serc_file" >
                        </span> 
						<?php if($state_sector_b['serc_file']) { ?>
						 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_b['serc_file']); ?>"> 
							<span><i class="fa fa-download" aria-hidden="true"></i></span>
						</a> 
						<?php } ?>
						</div>
                      </div>
					   <div class="form-group col-md-3">
                           
                           <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[other]'])) { echo  $this->session->flashdata('step1')['state_sector_b[other]']; } ?></span></div>
                           
                      <label>d) Other</label>
					  <div class="attach">
                        <input required="" type="text" class="form-control" name="state_sector_b[other]" value="<?php print($state_sector_b['other'])?>">
                        <span class="btn btn-primary btn-file attach-c" style="right:<?php if($state_sector_b['other_file']) { echo "42px;";}else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  name="other_file" >
                        </span> 
						<?php if($state_sector_b['other_file']) { ?>
						 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_b['other_file']); ?>"> 
							<span><i class="fa fa-download" aria-hidden="true"></i></span>
						</a> 
						<?php } ?>
						</div>
                      </div>
                    
                    </div>
                    </div>
                    
                    <div class="form-group col-md-4">
                        
                         <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[proj_implementation_period]'])) { echo  $this->session->flashdata('step1')['state_sector_b[proj_implementation_period]']; } ?></span></div>
                        
                      <label>12) Project Implementation Period <strong>(in months)</strong></label>
					  <select class="form-control" name="state_sector_b[proj_implementation_period]" required>
					  <option disabled> Select </option>
					  <?php for($i=1; $i<=60; $i++) { if($state_sector_b['proj_implementation_period'] == $i){ $t="selected"; } else { $t = ""; } ?> 

						<?php  echo "<option ".$t." value= '".$i."'>".$i."</option>"; ?>
					  <?php } ?>
					  </select>
                    </div>
                    <div class="form-group col-md-4">
                        
                         <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[land_acquisitions_status]'])) { echo  $this->session->flashdata('step1')['state_sector_b[land_acquisitions_status]']; } ?></span></div>
                        
                      <label>13) Status of Land Acquisitions(if any)</label>
                      <!--<input required="" type="text" class="form-control" name="state_sector_b[land_acquisitions_status]" value="<?php //print($state_sector_b['land_acquisitions_status'])?>" >-->
					  <select name="state_sector_b[land_acquisitions_status]" class="form-control" required > 
						<option disabled >Select</option>
						<option value="Available" <?php if($state_sector_b['land_acquisitions_status'] == "Available" ){echo "selected"; } ?>>Available</option>
						<option value= "Not Available" <?php if($state_sector_b['land_acquisitions_status'] == "Not Available"){echo "selected"; } ?>>Not Available</option>
						<option value ="Under Process" <?php if($state_sector_b['land_acquisitions_status'] == "Under Process"){echo "selected"; } ?>>Under Process</option>
					  </select>
                    </div>
                    <div class="form-group col-md-4">
                        
                         <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[security_provided_for_loan]'])) { echo  $this->session->flashdata('step1')['state_sector_b[security_provided_for_loan]']; } ?></span></div>
                        
                      <label>14) Security to be provided for Loan</label>
                      <input required="" type="text" class="form-control" name="state_sector_b[security_provided_for_loan]" value="<?php print($state_sector_b['security_provided_for_loan'])?>" >
                    </div>
                    <div class="form-group col-md-4">
                        
                        
                         <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[escrow_cover_availability]'])) { echo  $this->session->flashdata('step1')['state_sector_b[escrow_cover_availability]']; } ?></span></div>
                        
                      <label>15) Availablity of Escrow cover</label>
                    
					  <select class="form-control" name="state_sector_b[escrow_cover_availability]" required>
					   <option disabled >Select </option>
					  <option value="yes" <?php if($state_sector_b['escrow_cover_availability'] == "yes") {echo "selected"; }?> >Yes </option>
					  <option value="no" <?php if($state_sector_b['escrow_cover_availability'] == "no") {echo "selected"; }?> >No </option>
					  </select>
                    </div>
                    <div class="form-group col-md-4">
                        
                         <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[loan_repayment_period_req]'])) { echo  $this->session->flashdata('step1')['state_sector_b[loan_repayment_period_req]']; } ?></span></div>
                        
                      <label>16) Loan Repayment period <strong>(in months)</strong></label>
                     					  
					  <select class="form-control" name="state_sector_b[loan_repayment_period_req]" required>
					  <option disabled> Select </option>
					  <?php for($i=1; $i<=240; $i++) { if($state_sector_b['loan_repayment_period_req'] == $i){ $t="selected"; } else { $t = ""; } ?> 

						<?php  echo "<option ".$t." value= '".$i."'>".$i."</option>"; ?>
					  <?php } ?>
					  </select>
					  
					  
                    </div>
					 <div class="form-group col-md-4">
                         
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[moratorium]'])) { echo  $this->session->flashdata('step1')['state_sector_b[moratorium]']; } ?></span></div>
                         
                      <label>17) Moratorium Period <strong>(in months)</strong></label>
                     					  
					  <select class="form-control" name="state_sector_b[moratorium]" required>
					  <option disabled > Select </option>
					  <?php for($i=1; $i<=60; $i++) { if($state_sector_b['moratorium'] == $i){ $t="selected"; } else { $t = ""; } ?> 

						<?php  echo "<option ".$t." value= '".$i."'>".$i."</option>"; ?>
					  <?php } ?>
					  </select>
					  
					  
                    </div>
                    <div class="form-group col-md-6">
                        
                         <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[clearance_req]'])) { echo  $this->session->flashdata('step1')['state_sector_b[clearance_req]']; } ?></span></div>
                        
                      <label>18) Clearances required(if any)</label>
                      <div class="attach">
                        <input required="" type="text" class="form-control" name="state_sector_b[clearance_req]" value="<?php print($state_sector_b['clearance_req'])?>">
                        <span class="btn btn-primary btn-file attach-c" style="right:<?php if($state_sector_b['clearance_req_file']) { echo "42px;";}else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  name="clearance_req_file">
                        </span> 
						<?php if($state_sector_b['clearance_req_file']) { ?>
						 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_b['clearance_req_file']); ?>"> 
							<span><i class="fa fa-download" aria-hidden="true"></i></span>
						</a> 
						<?php } ?>
						</div>
                    </div>
                    <div class="form-group col-md-6">
                        
                         <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_b[sanction_letter_of_agency]'])) { echo  $this->session->flashdata('step1')['state_sector_b[sanction_letter_of_agency]']; } ?></span></div>
                        
                      <label>19) Sanction letter of Agency(in case Grant component in project cost)</label>
                     
					   <div class="attach">
                        <input required="" type="text" class="form-control" name="state_sector_b[sanction_letter_of_agency]" value="<?php print($state_sector_b['sanction_letter_of_agency'])?>">
                        <span class="btn btn-primary btn-file attach-c" style="right:<?php if($state_sector_b['sanction_letter_of_agency_file']) { echo "42px;";}else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  name="sanction_letter_of_agency_file">
                        </span> 
						<?php if($state_sector_b['sanction_letter_of_agency_file']) { ?>
						 <a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_b['sanction_letter_of_agency_file']); ?>"> 
							<span><i class="fa fa-download" aria-hidden="true"></i></span>
						</a> 
						<?php } ?>
						</div>
                    </div>
                    <div class="col-md-12" id="showIE" style="display:none;">
                    <div class="sub-part">
                    <div class="col-md-12">
                    <h6>20) IE category Schemes</h6>
                    </div>
                    <div class="form-group col-md-4">
                      <label>a) Category of consumers</label>
                      <input   type="text" class="form-control" name="state_sector_b[consumer_cat]">
                     </div>
                    <div class="form-group col-md-4">
                      <label>b) Type of Meters to be installed under project</label>
                      <input type="text" class="form-control" name="state_sector_b[meter_type]">
                     </div>
                    <div class="form-group col-md-4">
                      <label>c) Ongoing IE schemes in the area</label>
                      <input type="text" class="form-control" name="state_sector_b[ongoing_ie_schemes]">
                     </div>
                    <div class="form-group col-md-4">
                      <label>d) Ground Water status report</label>
                      <input type="text" class="form-control" name="state_sector_b[ground_water_report]">
                     </div>
                    <div class="form-group col-md-4">
                      <label>e) Existing Pumpsets in the Project Area</label>
                      <input type="text" class="form-control" name="state_sector_b[existing_pumpsets]">
                     </div>
                    <div class="form-group col-md-4">
                      <label>f) Consumer Contribution (if Any)</label>
                      <input  type="text" class="form-control" name="state_sector_b[consumer_contribution]">
                     </div>
                     </div>
                    </div>
                    <div class="form-group col-md-12" id="admDivCheck" style="display:<?php if($state_sector['category_si'] == "Bulk"){echo "block"; }else{ echo "none"; } ?>;">
                      <div class="sub-part">
                    <div class="col-md-12">
                    <h6>21) For Bulk Category Schemes</h6>
                    </div>
                    <div class="form-group col-md-6">
                      <label>a) Purchase Orders for procurement</label>
                      <input type="text" class="form-control" name="state_sector_b[purchase_order]">
                     </div>
                    <div class="form-group col-md-6">
                      <label>b) Eligible bulk exposure for current FY</label>
                      <input type="text" class="form-control" name="state_sector_b[bulk_exposure]">
                     </div>
                     </div>
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <div class="sub-part">
                    <h4>C. Details of Borrower</h4>
                    <div class="form-group col-md-8">
                      <label>1) Attachment Power Positine, Consumer mix and Existing Infastructure</label>
					   <div class="attach" id="dvShare" style="display: block"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  id="txtShareHold" name="brief_write_file"  >
                        </span> 
						<?php if($state_sector_c['brief_write_file']) { ?>
						 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_c['brief_write_file']); ?>"> 
							<span><i class="fa fa-download" aria-hidden="true"></i></span>
						</a> 
						<?php } ?>
						</div>
                    </div>
                    <div class="form-group col-md-12">
                        
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[power_position]'])) { echo  $this->session->flashdata('step1')['state_sector_c[power_position]']; } ?></span></div>
                        
                      <label>2) Brief write up should include Power Positine, Consumer mix and Existing Infastructure  </label>
                      <!--<input required="" type="text" class="form-control" name="state_sector_c[power_position]" value="<?php print($state_sector_c['power_position'])?>">-->
					  <textarea class="form-control" name="state_sector_c[power_position]" required> <?php print($state_sector_c['power_position'])?> </textarea>
                    </div>
                    <!--<div class="form-group col-md-4">
                      <label>3) Consumer Mix</label>
                      <input required="" type="text" class="form-control" name="state_sector_c[consumer_mix]" value="<?php print($state_sector_c['consumer_mix'])?>">
                    </div>
                    <div class="form-group col-md-4">
                      <label>4) Existing Infastructure</label>
                      <input required="" type="text" class="form-control" name="state_sector_c[existing_infra]" value="<?php print($state_sector_c['existing_infra'])?>">
                    </div>-->
                    <div class="col-md-4">
						<div class="row">
						<div class="form-group col-md-8">
                            
                              <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[audit_ac_status]'])) { echo  $this->session->flashdata('step1')['state_sector_c[audit_ac_status]']; } ?></span></div>
                            
                      <label>5) Status of Audited Accounts</label>
                   
					  <select class="form-control" name="state_sector_c[audit_ac_status]" required>
					  <?php 
							$date=11;

							for($i=2010; $i<=date('Y'); $i++)
								
							{?>
								<option value="<?php print($i."-".$date); ?>"  <?php if($state_sector_c['audit_ac_status'] == $i."-".$date) { echo "selected"; }?>> <?php print_r($i."-".$date); ?></option>
								
						<?php $date++; } ?>
							
					  </select>
					  </div>
					  <div class="form-group col-md-4">
                      <label>&nbsp;</label>
					   <div class="attach" id="dvShare" style="display: block"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  id="txtShareHold" name="audit_ac_status_file"  >
                        </span> 
						<?php if($state_sector_c['audit_ac_status_file']) { ?>
						 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_c['audit_ac_status_file']); ?>"> 
							<span><i class="fa fa-download" aria-hidden="true"></i></span>
						</a> 
						<?php } ?>
						</div>
                   
					</div>
                    </div>
					</div>
                    <div class="form-group col-md-4">
                        
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[networth]'])) { echo  $this->session->flashdata('step1')['state_sector_c[networth]']; } ?></span></div>
                        
                      <label>6) Networth(Cr)</label>
                      <input required="" type="number" class="form-control" name="state_sector_c[networth]" value="<?php print($state_sector_c['networth'])?>">
                    </div>
                    <div class="form-group col-md-4">
                        
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[total_revenue]'])) { echo  $this->session->flashdata('step1')['state_sector_c[total_revenue]']; } ?></span></div>
                        
                      <label>7) Total Revenue(Cr)</label>
                      <input required="" type="text" class="form-control" name="state_sector_c[total_revenue]" value="<?php print($state_sector_c['total_revenue'])?>">
                    </div>
                    <div class="form-group col-md-4">
                        
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[total_expenditure]'])) { echo  $this->session->flashdata('step1')['state_sector_c[total_expenditure]']; } ?></span></div>
                        
                      <label>8) Total Expenditure(Cr)</label>
                      <input required="" type="text" class="form-control" name="state_sector_c[total_expenditure]" value="<?php print($state_sector_c['total_expenditure'])?>">
                    </div>
                    <div class="form-group col-md-4">
                        
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[profit_after_tax]'])) { echo  $this->session->flashdata('step1')['state_sector_c[profit_after_tax]']; } ?></span></div>
                        
                      <label>9) Profit After Tax(Cr)</label>
                      <input required="" type="text" class="form-control" name="state_sector_c[profit_after_tax]" value="<?php print($state_sector_c['profit_after_tax'])?>">
                    </div>
                    <div class="">
                    <div class="sub-part">
                    <div class="col-md-12">
                    <h6>10) Regulatory Status</h6>
                    </div>
                      <div class="form-group col-md-4">
                          
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[tariff_petition]'])) { echo  $this->session->flashdata('step1')['state_sector_c[tariff_petition]']; } ?></span></div>
                          
                      <label>a) Tariff Petition </label>
                      <!--<input required="" type="text" class="form-control" name="state_sector_c[tariff_petition]" value="<?php print($state_sector_c['tariff_petition'])?>">-->
					  <select class="form-control" name="state_sector_c[tariff_petition]" required>
					  <option disabled >Select</option>
					  <?php 
							$date=11;

							for($i=2010; $i<=date('Y'); $i++)
								
							{?>
								<option value="<?php print($i."-".$date); ?>"  <?php if($state_sector_c['tariff_petition'] == $i."-".$date) { echo "selected"; }?>> <?php print_r($i."-".$date); ?></option>
								
						<?php $date++; } ?>
							
					  </select>
                    </div>
                      <div class="form-group col-md-4">
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[tarriff_order]'])) { echo  $this->session->flashdata('step1')['state_sector_c[tarriff_order]']; } ?></span></div>
                          
                      <label>b) Tariff Order  </label>
                      <input required="" type="text" class="form-control" name="state_sector_c[tarriff_order]" value="<?php print($state_sector_c['tarriff_order'])?>">
                    </div>
                      <div class="form-group col-md-4">
                          
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[regulatory_assets_approved]'])) { echo  $this->session->flashdata('step1')['state_sector_c[regulatory_assets_approved]']; } ?></span></div>
                          
                      <label>c) Regulatory Assets Approved(Rs.Cr) </label>
                      <input required="" type="text" class="form-control" name="state_sector_c[regulatory_assets_approved]" value="<?php print($state_sector_c['regulatory_assets_approved'])?>">
                    </div>
                      <div class="form-group col-md-4">
                          
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[acs]'])) { echo  $this->session->flashdata('step1')['state_sector_c[acs]']; } ?></span></div>
                          
                      <label>d) ACS(Rs/kWh)</label>
                      <input required="" type="text" class="form-control" name="state_sector_c[acs]" value="<?php print($state_sector_c['acs'])?>">
                    </div>
                      <div class="form-group col-md-4">
                          
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[arr]'])) { echo  $this->session->flashdata('step1')['state_sector_c[arr]']; } ?></span></div>
                          
                      <label>e) ARR(Rs/kWh) </label>
                      <input required="" type="text" class="form-control" name="state_sector_c[arr]" value="<?php print($state_sector_c['arr'])?>">
                    </div>
                      </div>
                    </div>
                    <div class="">
                    <div class="sub-part">
                    <div class="col-md-12">
                        
                        
                        
                    <h6>11) Capex Plan approved by regulator(Cr.)</h6>
                    </div>
                      <div class="form-group col-md-4">
					  <?php 
							$date=18;

							for($i=2017; $i<=date('Y'); $i++)
								
							{?>
								<label>a) FY (<?php print_r($i."-".$date); ?>)</label>
								
						<?php $date++; } ?>
                          
                      
                           <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[fy1]'])) { echo  $this->session->flashdata('step1')['state_sector_c[fy1]']; } ?></span></div>
                          
                      <input required="" type="text" class="form-control" name="state_sector_c[fy1]" value="<?php print($state_sector_c['fy1'])?>">
                    </div>
                      <div class="form-group col-md-4">
					   <?php 
							$date=18;	
							for($i=2017; $i<=date('Y'); $i++)
								
								$date++;
								{?>
								
								<label>a) FY (<?php print_r($i."-".$date); ?>) </label>
								
						<?php $date++; } ?>
                      
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[fy2]'])) { echo  $this->session->flashdata('step1')['state_sector_c[fy2]']; } ?></span></div>
                          
                      <input required="" type="text" class="form-control" name="state_sector_c[fy2]" value="<?php print($state_sector_c['fy2'])?>" >
                    </div>
                      <div class="form-group col-md-4">
					   <?php 
							$date=18;	
							for($i=2017; $i<=date('Y'); $i++)
								$i++;
								$date1 = $date + 2;
								{?>
								
								<label>a) FY (<?php print_r($i."-".$date1); ?>) </label>
								
						<?php $date++; } ?>
                          
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[fy3]'])) { echo  $this->session->flashdata('step1')['state_sector_c[fy3]']; } ?></span></div>
                     
                      <input required="" type="text" class="form-control" name="state_sector_c[fy3]" value="<?php print($state_sector_c['fy3'])?>" >
                    </div>
                      
                      
                      </div>
                    </div>
                    
                    <div class="form-group col-md-4">
                        
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[default_status]'])) { echo  $this->session->flashdata('step1')['state_sector_c[default_status]']; } ?></span></div>
                        
                      <label>12) Default Status </label>
                     <!-- <input required="" type="text" class="form-control" name="state_sector_c[default_status]" value="<?php print($state_sector_c['default_status'])?>">-->
					  <select class="form-control" name="state_sector_c[default_status]" required>
						
							<option value="yes" <?php if($state_sector_c['default_status'] == "yes"){echo "selected"; } ?>> Yes </option>
							<option value="no" <?php if($state_sector_c['default_status'] == "no"){echo "selected"; } ?>> No </option>
					  <select/>
                    </div>
                    <div class="form-group col-md-4">
                        
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[entity_grade]'])) { echo  $this->session->flashdata('step1')['state_sector_c[entity_grade]']; } ?></span></div>
                        
                      <label>13) Entity Grade of Borrower</label>
                      <!--<input required="" type="text" class="form-control" name="state_sector_c[entity_grade]" value="<?php print($state_sector_c['entity_grade'])?>" >-->
					  
					   <select class="form-control" name="state_sector_c[entity_grade]" required>
					   <option disabled >Select</option>
					  <option value="A Plus" <?php if($state_sector_c['entity_grade'] == 'A Plus' ) { echo "selected"; }?> >A+</option>
					  <option value="A" <?php if($state_sector_c['entity_grade'] == 'A' ) { echo "selected"; }?> >A</option>
					  <option value="B" <?php if($state_sector_c['entity_grade'] == 'B' ) { echo "selected"; }?> >B</option>
					  <option value="C" <?php if($state_sector_c['entity_grade'] == 'C' ) { echo "selected"; }?> >C</option>
					  <option value="Not Yet Graded" <?php if($state_sector_c['entity_grade'] == 'Not Yet Graded' ) { echo "selected"; }?> >Not Yet Graded</option>
					  </select>
					  
                    </div>
                    <div class="col-md-4">
					<div class="row">
					<div class="form-group col-md-8">
                        
                           <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[rec_exposure]'])) { echo  $this->session->flashdata('step1')['state_sector_c[rec_exposure]']; } ?></span></div>
                        
                      <label>14) Exposure to REC(%)</label>
                      <input required="" type="number" class="form-control" name="state_sector_c[rec_exposure]" value="<?php print($state_sector_c['rec_exposure'])?>">
                    </div>
					<div class="form-group col-md-4">
						<label>&nbsp;</label>
					   <div class="attach" id="dvShare" style="display: block"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  id="txtShareHold" name="rec_exposure_file"  >
                        </span> 
						<?php if($state_sector_c['rec_exposure_file']) { ?>
						 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_c['rec_exposure_file']); ?>"> 
							<span><i class="fa fa-download" aria-hidden="true"></i></span>
						</a> 
						<?php } ?>
						</div>
					</div>
					</div>
					</div>
                    <div class="form-group col-md-12">
                        
                           <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[relaxations]'])) { echo  $this->session->flashdata('step1')['state_sector_c[relaxations]']; } ?></span></div>
                        
                      <label>15) Relaxations , if any</label>
                      <textarea required=""  class="form-control" rows="5" id="comment" name="state_sector_c[relaxations]"><?php print($state_sector_c['relaxations'])?></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[chkUtility]'])) { echo  $this->session->flashdata('step1')['state_sector_c[chkUtility]']; } ?></span></div>
                        
                      <label>16) MOUs signed with Utility</label>
					  <div class = "">
					  <label for="chkYmou" class="radio-inline">
					   <input required="" value="Yes" type="radio" id="chkYmou" name="state_sector_c[chkUtility]" onClick="ShowHideMou1()" <?php if($state_sector_c['chkUtility'] == "Yes"){echo "checked";}?> />
                      Yes </label>
                    <label for="chkNUtility" class="radio-inline">
                      <input required="" value="No" type="radio" id="chkNmou" name="state_sector_c[chkUtility]" onClick="ShowHideMou1()" <?php if($state_sector_c['chkUtility'] == "No"){echo "checked";}?> />
                      No </label>
					  
                      <div class="attach pull-right" id="dvmou" style="display: <?php if($state_sector_c['chkUtility'] == "Yes"){echo "block";}else{echo "none";} ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  id="txtShareHold" name="mou_sign_with_utility"  >
                        </span> 
						<?php if($state_sector_c['mou_sign_with_utility']) { ?>
						 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_c['mou_sign_with_utility']); ?>"> 
							<span><i class="fa fa-download" aria-hidden="true"></i></span>
						</a> 
						<?php } ?>
						</div>
						</div>
                    </div>
                    <div class="form-group col-md-4">
                        
                        
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['state_sector_c[chkappUtility]'])) { echo  $this->session->flashdata('step1')['state_sector_c[chkappUtility]']; } ?></span></div>
                        
                        
                      <label>17) Administrative Approval of Utility</label>
					   <div class = "">
					  <label for="chkYutility" class="radio-inline">
					   <input required="" value="Yes" type="radio" id="chkYutility" name="state_sector_c[chkappUtility]" onClick="ShowHideUtility1()" <?php if($state_sector_c['chkappUtility'] == "Yes"){echo "checked";}?> />
                      Yes </label>
                    <label for="chkNUtility" class="radio-inline">
                      <input required="" value="No" type="radio" id="chkNUtility" name="state_sector_c[chkappUtility]" onClick="ShowHideUtility1()" <?php if($state_sector_c['chkappUtility'] == "No"){echo "checked";}?> />
                      No </label>
                      <div class="attach  pull-right" id="dvUtility" style="display: <?php if($state_sector_c['chkappUtility'] == "Yes"){echo "block"; }else{echo "none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                        <input  type="file" accept="application/pdf, application/zip"  id="txtShareHold" name="admin_approve_utility"  >
                        </span> 
						<?php if($state_sector_c['admin_approve_utility']) { ?>
						 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $state_sector_c['admin_approve_utility']); ?>"> 
							<span><i class="fa fa-download" aria-hidden="true"></i></span>
						</a> 
						<?php } ?>
						</div>
						</div>
						 <?php if(isset($_GET['fid'])) { ?>
							<input type="hidden" name="form_id" value="<?php  print_r($_GET['fid']); ?>">
						<?php } ?>
                    </div>
                  </div>
                </div>
				
              </div>
            </div>
			<div id="msg" class="col-md-6 col-md-offset-3" style="text-align: center; color: red;"></div>
			<div id="msg2" class="col-md-6 col-md-offset-3" style="text-align: center; color: red;"></div>
            <div class="col-md-12 text-right">
			
              <button class="btn btn-primary" type="submit" id="sub" >Save & Next</button>
            </div>
			</form>
          </div>
        
		
		
         
          <div class="row setup-content" id="state-2">
		   <form action="<?php echo base_url();?>form1/process_state_sector_form_agree" method="POST">
            <div class="col-md-12 generalcontain">
              <h3><u>DECLARATION FORM</u></h3>
              <p>I/we confirm/affirm and undertake as below: -</p>
              <ul class="geninstruction">
                <li>That no insolvency proceedings initiated against me/us nor have I/we ever been adjudicated insolvent. Further, that no litigation is pending against the securities proposed to be offered in shape of movable or immovable, in any court in India or outside India</li>
                <li>That neither I have been defaulter of any bank or financial institution nor any accounts has been written off by any bank/financial institution and that my name doesn't appear in RBI caution list/defaulter list etc</li>
                <li>I am /we are not  closely related to any of the Directors of REC</li>
                <li>That I /we have read the application form and am/are aware of all the term and conditions of availing finance from REC. I also authorize REC to exchange, share, part with all the information relating to me/our loan details and repayment history information to other bank/financial institution/credit bureaus/agencies as may be required and shall not hold the REC for use of this information.</li>
                <li>I/we shall furnish any information required by REC to process my application for loan and also to be bound by the rules or by the revised additional terms and conditions which may at any time hereafter be made while the loan obtained by me is still outstanding</li>
                <li>And the information given in the application is correct, complete and up to date in all respects and I/we have not withheld any information.</li>
                <li>We undertake that any photocopied document submitted along with loan application format or during the appraisal process or any time thereafter is exact copy of original document. </li>
                <li>Any material discrepancy/deviation subsequently found in any particulars herein furnished would entitle REC to treat the loan application as defunct, in which case the processing fees already paid would be forfeited and  a fresh application would be required to be filed to seek financial assistance from REC</li>
                <li>All information pertaining to borrower and all promoters including information contained in Loan application form including Information memorandum prepared by Lead Bank/FI or syndicator or company or any annexure thereto are true, correct, updated, accurate and is neither misleading nor qualified. We undertake that all information pertaining to promoters has been obtained from authorized representatives of promoters</li>
                <li>We understand that information furnished by REC towards project, borrower or promoters forms the basis of appraisal. We undertake to inform REC of any up-dations on all/any information furnished to REC for appraisal and undertake to notify REC in writing and in a prompt manner of any of the fact, matter or circumstance (whether existing on or before the submission of Loan application form or arising afterwards) which would could reasonably be expected to cause any of the information given to become, in any manner untrue, inaccurate, in complete or misleading.</li>
                <li>We undertake that any change in promoter group structure will be immediately   communicated to REC</li>
                <li>The information given herein before and the Statements and other papers enclosed are to the best of our knowledge and belief, true and correct in all particulars.</li>
                <li>No borrowing arrangements except as indicated above are made.</li>
                <li>No legal action is being taken against me/us.</li>
                <li>I/We shall furnish all other information that may be required by you in connection with the application.</li>
                <li>REC or its nominees or any other agency authorized by REC may at any time inspect/ verify our assets, books of accounts, etc., in my / our factory & business premises.</li>
                <li>We acknowledge and accept that mere submission of above documents alone will not entitle an applicant for registration and sanction of loan.</li>
                <li>We accept that REC is having its right to reject any loan application at any stage</li>
              </ul>
			  
			   <div class="form-group">
                <div class="col-md-4">
                
                     
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['place'])) { echo  $this->session->flashdata('step2')['place']; } ?></span></div>
                    
                    <label>Place </label>
                      <input  class="form-control" required="" type="text" name="place" placeholder="Place" value="<?php echo $state_sector['place']?>" />
                     
                </div>
				<div class="col-md-4">
                
                     
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['date'])) { echo  $this->session->flashdata('step2')['date']; } ?></span></div>
                    
                    <label>Date </label>
                      <input  class="form-control" required="" type="text" name="date" id="dp30" placeholder="dd/mm/yyyy" value="<?php echo $state_sector['date']?>" /> 
                     
                </div>
				
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="checkbox">
                    <label>
                      <input required="" type="checkbox" name="state_sector_agree" value="1" <?php if($state_sector['state_sector_agree'] == "1"){echo "checked"; } ?>/>
                      I agree with the terms above. </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 text-right">
			<button class="btn btn-default prevBtn pull-left" type="button">Previous</button>
              <button class="btn btn-primary" type="submit">Save & Next</button>
            </div>
        </form>
		 </div>
		</div>
      </div>
    </div>
	
	<div class="statesector1things">
      <div class="container">
        <div class="stepwizard">
          <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step ssgn_steps ssgn_step-1"> <a href="#ssgn_step-1" id="idssg1" type="button" class="btn btn-primary btn-circle">1</a>
              <p>Step 1</p>
            </div>
            <div class="stepwizard-step ssgn_steps ssgn_step-2"> <a href="#ssgn_step-2" id="idssg2"  type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
              <p>Step 2</p>
            </div>
            <div class="stepwizard-step ssgn_steps ssgn_step-3"> <a href="#ssgn_step-3" id="idssg3"  type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
              <p>Step 3</p>
            </div>
            <div class="stepwizard-step ssgn_steps ssgn_step-4"> <a href="#ssgn_step-4" id="idssg4"  type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
              <p>Step 4</p>
            </div>
            <div class="stepwizard-step ssgn_steps ssgn_step-5"> <a href="#ssgn_step-5" id="idssg5"  type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
              <p>Step 5</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
         <div class="loan-form"> 
          	<div class="row setup-content" id="ssgn_step-1"> 
		
          	<form role="form" action="<?php echo base_url(); ?>form1/process_ss_generation_a" method="post" enctype="multipart/form-data">
            <div class="col-md-12 text-center">
              <h2 class="formheading">State Sector - Generation Form</h2>
            </div>
			
            <div class="col-md-12">
              <div class="sub-part">
                <h4>A. Project Summary</h4>
                <div class="form-group col-md-12">
                      
                             <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_name]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_name]']; } ?></span></div>
                    
                  <label>1) Project Name</label>
                  <input required="" type="text" class="form-control" name="ss_gn_a[project_name]" value="<?php echo $ss_gn_a['project_name'];?>">
                </div>
                <div class="form-group col-md-12">
                    
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_type]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_type]']; } ?></span></div>
                    
                  <label>2) Project Type</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" name="ss_gn_a[project_type]" value="Thermal" 
                      onClick="$('#dvGenprotyp2').hide(); $('#dvGenprotyp1234').removeAttr('required');" 
                      	<?php if($ss_gn_a['project_type']=='Thermal'){ echo 'checked'; } if(empty($ss_gn_a['project_type'])) { echo "checked"; } ?>  />
                      Thermal </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="ss_gn_a[project_type]" value="Hydro"  onClick="$('#dvGenprotyp2').hide();  $('#dvGenprotyp1234').removeAttr('required');"
                      <?php if($ss_gn_a['project_type']=='Hydro'){ echo 'checked'; };?>
                      />
                      Hydro </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="ss_gn_a[project_type]" value="Nuclear" onClick="$('#dvGenprotyp2').hide(); $('#dvGenprotyp1234').removeAttr('required'); "
                      <?php if($ss_gn_a['project_type']=='Nuclear'){ echo 'checked'; };?>
                      />
                      Nuclear </label>
                      
                      
                      
                    <label class="radio-inline">
                      <input required="" type="radio" id="chkGenprotyp2" value="Other" name="ss_gn_a[project_type]"  onClick="$('#dvGenprotyp2').show(); $('#dvGenprotyp1234').attr('required','');"
                      <?php if($ss_gn_a['project_type']=="Other" ){ echo 'checked'; };?>
                      />
                      Others </label>
                    <br>
                    <br>
                    
                    <?php if($ss_gn_a['project_type']=="Other"){ $display = 'block'; }else{$display = 'none';}?>
                    
                    <div class="" id="dvGenprotyp2" style="display: <?php echo $display;?>"> <span class="">
                        
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_type_others]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_type_others]']; } ?></span></div>
                        
                      <input id="dvGenprotyp1234" type="text" class="form-control" name="ss_gn_a[project_type_others]" value="<?php echo $ss_gn_a['project_type_others'];?>">
                      </span> </div>
                  </div>
                </div>
                <div class="form-group col-md-6">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_capacity]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_capacity]']; } ?></span></div>
                        
                    
                  <label>3) Project Capacity (In Mw)</label>
                  <input required="" type='number'  pattern='^\d+(?:\.\d{1,2})?$' step='0.01'  class="form-control project_mw_g2" name="ss_gn_a[project_capacity]" value="<?php echo $ss_gn_a['project_capacity'];?>">
                </div>
                <div class="form-group col-md-6">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_location]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_location]']; } ?></span></div>
                    
                  <label>4) Location including Village/ Tehsil/ District/ State</label>
                  <input required="" type="text" class="form-control" name="ss_gn_a[project_location]" value="<?php echo $ss_gn_a['project_location'];?>">
                </div>
                <div class="form-group col-md-12">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_power_sale_arrangement]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_power_sale_arrangement]']; } ?></span></div>
                    
                  <label>5) Power Sale Arrangement</label>
                  <div class="">
                    <label class="radio-inline"><!--onClick="$('#dvPowersale2').show();  $('#dvPowersale1234').attr('required','');"-->
                      <input required="" type="radio" name="ss_gn_a[project_power_sale_arrangement]" value="Captive" 
                      	<?php if($ss_gn_a['project_power_sale_arrangement']=='Captive'){ echo 'checked'; } if(empty($ss_gn_a['project_power_sale_arrangement'])){echo "checked"; } ?>
                      />
                      Captive </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="ss_gn_a[project_power_sale_arrangement]" value="Merchant" 
                      	<?php if($ss_gn_a['project_power_sale_arrangement']=='Merchant'){ echo 'checked'; } ?>
                      />
                      Merchant </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="ss_gn_a[project_power_sale_arrangement]" value="IPP" 
                      	<?php if($ss_gn_a['project_power_sale_arrangement']=='IPP'){ echo 'checked'; } ?>
                      />
                      IPP </label>
					   <label class="radio-inline">
                      <input required="" type="radio" value="PPA with DISCOM" name="ss_gn_a[project_power_sale_arrangement]"  <?php if($ss_gn_a['project_power_sale_arrangement']=="PPA with DISCOM"){ echo 'checked'; } ?> />
                      PPA with DISCOM </label>
					  
                    <label class="radio-inline">
                      <input required="" type="radio" value="Others" name="ss_gn_a[project_power_sale_arrangement]"  <?php if($ss_gn_a['project_power_sale_arrangement']=="Others"){ echo 'checked'; } ?> />
                      Others </label>
                    <br>
                    <br>
                      
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_power_sale_arrangement_other]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_power_sale_arrangement_other]']; } ?></span></div>
                      
					<label> Remarks</label>
                    <div class="" id="dvPowersale2" style="display: block"> <span class="">
                      <input required id="dvPowersale1234" type="text" class="form-control" name="ss_gn_a[project_power_sale_arrangement_other]" value="<?php echo $ss_gn_a['project_location'];?>">
                      </span> </div>
                  </div>
                </div>
                <h5>6) Total Estimated Project Cost (In Rs. Cr.)</h5>
                <div class="form-group col-md-4">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_cost_without_idc]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_cost_without_idc]']; } ?></span></div>
                    
                  <label>a. Project Cost without IDC</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control cost_idc2"  name="ss_gn_a[project_cost_without_idc]" value="<?php echo $ss_gn_a['project_cost_without_idc'];?>">
                </div>
                <div class="form-group col-md-4">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_idc_interest_durin_construction]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_idc_interest_durin_construction]']; } ?></span></div>
                    
                  <label>b. IDC (Interest During Construction)</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control idc_intrst2" value="<?php echo $ss_gn_a['project_idc_interest_durin_construction'];?>" name="ss_gn_a[project_idc_interest_durin_construction]">
                </div>
                <div class="form-group col-md-4">
                  <label>c. Project Cost with IDC<!--System Calculated value =(a+b)--></label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control project_cost_idc2" placeholder="=(a+b)" readonly value="<?php echo $ss_gn_a['project_cost_with_idc'];?>">
				  
				  <input required="" type="hidden" class="form-control project_cost_idc12" name="ss_gn_a[project_cost_with_idc]" placeholder="=(a+b)" value="<?php echo $ss_gn_a['project_cost_with_idc'];?>" >
                </div>
                <div class="form-group col-md-4">
                  <label>7) Cost per MW(In Rs. Cr./Mw)<!--System Calculated value (=6.c/3)--></label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control costMW2" readonly value="<?php echo $ss_gn_a['project_cost_per_mw'];?>">
				  
				  <input required="" type="hidden" class="form-control costMW12" name="ss_gn_a[project_cost_per_mw]" value="<?php echo $ss_gn_a['project_cost_per_mw'];?>">
				  
				  
                </div>
                <div class="form-group col-md-4">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_cost_debt]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_cost_debt]']; } ?></span></div>
                    
                  <label>8) Debt % (In % of Project cost)</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control debt_percent2" value="<?php echo $ss_gn_a['project_cost_debt'];?>" name="ss_gn_a[project_cost_debt]">
                </div>
                <div class="form-group col-md-4">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_cost_equity]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_cost_equity]']; } ?></span></div>
                    
                  <label>9) Equity % (In % of Project cost)</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control equity_percent2" name="ss_gn_a[project_cost_equity]" value="<?php echo $ss_gn_a['project_cost_equity'];?>">
                </div>
                <div class="form-group col-md-4">
                  <label>10) Equity Amount<!--Calculated value =9/6--></label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control equityAmnt2"  readonly value="<?php echo $ss_gn_a['project_amount_equity'];?>">
				  
				  <input required="" type="hidden" class="form-control equityAmnt12" placeholder="=9/6" name="ss_gn_a[project_amount_equity]" value="<?php echo $ss_gn_a['project_amount_equity'];?>">
				  
                </div>
                <div class="form-group col-md-4">
                  <label>11) Debt Amount<!--Calculated value =8/6--></label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control debtAmnt2"  readonly value="<?php echo $ss_gn_a['project_debt_amount'];?>">
				  
				  <input required="" type="hidden" class="form-control debtAmnt12" name="ss_gn_a[project_debt_amount]" value="<?php echo $ss_gn_a['project_debt_amount'];?>">
				  
                </div>
                <div class="form-group col-md-4">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_loan_requested]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_loan_requested]']; } ?></span></div>
                    
                  <label>12) Loan Requested(In Rs. Cr.)</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control" name="ss_gn_a[project_loan_requested]" value="<?php echo $ss_gn_a['project_loan_requested'];?>">
                </div>
				<div class="form-group col-md-6">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[finance_type]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[finance_type]']; } ?></span></div>
                    
                  <label>13) Finance type</label>
                  <div class="">
                    <label class="radio-inline">
                      <input required="" type="radio" name="ss_gn_a[finance_type]" value="Sole Financing" <?php if($ss_gn_a['finance_type']=='Sole Financing'){ echo 'checked'; } if(empty($ss_gn_a['finance_type'])){echo "checked"; } ?> />
                      Sole Financing </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="ss_gn_a[finance_type]" value="Co-Financing" <?php if($ss_gn_a['finance_type']=='Co-Financing'){ echo 'checked'; } ?> />
                      Co-Financing </label>
                    <label class="radio-inline">
                      <input required="" type="radio" name="ss_gn_a[finance_type]" value="Consortiun Financing" <?php if($ss_gn_a['finance_type']=='Consortiun Financing'){ echo 'checked'; } ?> />
                      Consortiun Financing </label>
                   
                  </div>
                </div>
                <div class="form-group col-md-6">
                    
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_lead_fi]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_lead_fi]']; } ?></span></div>
                    
                  <label>13) Lead FI(If any)</label>
                  <input required type="text" step="0.01" class="form-control"  name="ss_gn_a[project_lead_fi]" value="<?php echo $ss_gn_a['project_lead_fi'];?>">
                </div>
				
				<?php $name = unserialize($ss_gn_a['name']); ?>
				<?php $loan_out_total_loan = unserialize($ss_gn_a['loan_out_total_loan']); ?>
				
                  <div class="form-group col-md-12">
                    <h5>2) Other Lenders</h5>
                    <div id="otherLenders">
                      <ul>
                        <li>
						 <?php if(empty($name)) { ?>
                          <div class="dvotherLenders">
						 
                            <div class="form-group col-md-6">
                                
                                  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['name[]'])) { echo  $this->session->flashdata('step1')['name[]']; } ?></span></div>
                                
                              <label>Name</label>
                              <input required type="text" name="name[]" class="form-control">
                            </div>
                            <div class="form-group col-md-5">
                                
                                  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['loan_out_total_loan[]'])) { echo  $this->session->flashdata('step1')['loan_out_total_loan[]']; } ?></span></div>
                                
                                
                              <label>% of loan out of total loan</label>
                              <input required type="text" name="loan_out_total_loan[]" class="form-control">
                            </div>
						
                            <div class="form-group col-md-1">
                              <label>Remove</label>
                              <div class="add-feild">
                                <button type="button" class="btn btn-danger addsub" disabled="">X</button>
                              </div>
                            </div>
							<div class="clearfix"></div>
                          </div>
						 <?php }else {  ?>
							
							
                          <div class="dvotherLenders">
						<?php for($i=0; $i<sizeof($name); $i++) { ?> 
                            <div class="form-group col-md-6">
                                
                                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['name[]'])) { echo  $this->session->flashdata('step1')['name[]']; } ?></span></div>
                                
                              <label>Name</label>
                              <input type="text" name="name[]" value="<?php echo $name[$i]; ?>" class="form-control">
                            </div>
							 <div class="form-group col-md-5">
                                 
                                  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['loan_out_total_loan[]'])) { echo  $this->session->flashdata('step1')['loan_out_total_loan[]']; } ?></span></div>
                                 
                              <label>% of loan out of total loan</label>
                              <input type="text" name="loan_out_total_loan[]" value="<?php echo $loan_out_total_loan[$i]; ?>" class="form-control">
                            </div>
							 <div class="form-group col-md-1"> 
                              <label>Remove</label>
                              <div class="add-feild">
                                <button type="button" id="removeotherLenders" class="btn btn-danger addsub"   >X</button>
                              </div>
                            </div>
						<?php } ?>
                           
                          </div>
							
						 <?php } ?>
                        </li>
                      </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">
                      <label>Add Lenders (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addotherLenders" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </div>
                
				
                <div class="form-group col-md-4">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_construction_period]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_construction_period]']; } ?></span></div>
                    
                  <label>14) Construction Period(in years)</label>
                  <input required="" type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control"  name="ss_gn_a[project_construction_period]" value="<?php echo $ss_gn_a['project_construction_period'];?>">
                </div>
                <div class="form-group col-md-4">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_loan_repayment_period]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_loan_repayment_period]']; } ?></span></div>
                    
                  <label>15) Loan Repayment Period(in years)</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control"  name="ss_gn_a[project_loan_repayment_period]" value="<?php echo $ss_gn_a['project_loan_repayment_period'];?>">
                </div>
				
				 <div class="form-group col-md-4">
                     
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[moritorium_period]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[moritorium_period]']; } ?></span></div>
                     
                  <label>15) Moritorium Period(in Months)</label>
					<select class="form-control" name="ss_gn_a[moritorium_period]">
						<?php for($i=1; $i<=60; $i++ ) {
							if($ss_gn_a['moritorium_period']== $i){ $select = "selected"; }else { $select = ""; }
							echo"<option value=".$i." ".$select." >".$i."</option>";
						}
						?>
					</select>
                 
                </div>
				
                <div class="form-group col-md-4">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_scheduled_completion_date]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_scheduled_completion_date]']; } ?></span></div>
                    
                  <label>16) Scheduled Project Completion date</label>
                  <input required="" type="text" class="span2 form-control" id="dp1" placeholder="dd/mm/yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" name="ss_gn_a[project_scheduled_completion_date]"  value="<?php echo $ss_gn_a['project_scheduled_completion_date'];?>">
                </div>
                <div class="form-group col-md-4">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_irr]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_irr]']; } ?></span></div>
                    
                  <label>17) Project IRR %</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control" name="ss_gn_a[project_irr]" value="<?php echo $ss_gn_a['project_irr'];?>">
                </div>
                <div class="form-group col-md-4">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_dscr]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_dscr]']; } ?></span></div>
                    
                  <label>18) Project DSCR(avg.)</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control" name="ss_gn_a[project_dscr]" value="<?php echo $ss_gn_a['project_dscr'];?>">
                </div>
                <div class="form-group col-md-4">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_levellised_tariff]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_levellised_tariff]']; } ?></span></div>
                    
                  <label>19) Levellised Tariff </label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control" name="ss_gn_a[project_levellised_tariff]" value="<?php echo $ss_gn_a['project_levellised_tariff'];?>">
                </div>
                <div class="form-group col-md-4">
                    
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_a[project_levellised_cost_of_generation_excluding_roe]'])) { echo  $this->session->flashdata('step1')['ss_gn_a[project_levellised_cost_of_generation_excluding_roe]']; } ?></span></div>
                    
                  <label>20) Levellised cost of generation Excluding RoE</label>
                  <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" class="form-control" name="ss_gn_a[project_levellised_cost_of_generation_excluding_roe]" value="<?php echo $ss_gn_a['project_levellised_cost_of_generation_excluding_roe'];?>">
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
              <div class="sub-part">
                <h4>B. Entity Summary</h4>
                <div class="form-group col-md-12">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_b[borrower_name]'])) { echo  $this->session->flashdata('step1')['ss_gn_b[borrower_name]']; } ?></span></div>
                    
                  <label>1) Name of The Borrower</label>
                  <input required="" type="text" class="form-control" name="ss_gn_b[borrower_name]" value="<?php echo $ss_gn_b['borrower_name'];?>">
                </div>
                <div class="form-group col-md-12">
                  <div class="sub-part">
                    <h5>2) Name of Directors of the Borrower</h5>
                    <div id="borrowerdirector2">
                      <ul>
                      	<?php if($ss_gn_b['directors']){$directors = unserialize($ss_gn_b['directors']); foreach($directors as $k=>$v){?>
                        <li>
                          <div class="dvborrowerdirector">
                            <div class="form-group col-md-11">
                                
                                  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_b[directors][]'])) { echo  $this->session->flashdata('step1')['ss_gn_b[directors][]']; } ?></span></div>
                                
                              	<label> Director</label> 
                              	 <input required="" type="text" class="form-control" name="ss_gn_b[directors][]" value="<?php echo $v;?>">
                            </div>
							<?php if($k>0){?>
							<div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removeborrowerdirector2' class='btn btn-danger addsub'>X</button></div></div>
							<?php }?>                             
                          </div>
                        </li>
                        <?php }}else{?>
                         <li>
                          <div class="dvborrowerdirector">
                            <div class="form-group col-md-11">
                                
                                
                                  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_b[directors][]'])) { echo  $this->session->flashdata('step1')['ss_gn_b[directors][]']; } ?></span></div>
                                
                                
                                
                              	<label> Director</label> 
                              	<input required="" type="text" class="form-control" name="ss_gn_b[directors][]">
                              </div>
                          </div>
                        </li>
                       <?php }?>
                      </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">
                      <label>Add Director (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addborrowerdirector2" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="sub-part">
                    <h5>3) Details of Promoters of Borrower </h5>
                    <div id="promotersdetails2">
                    <?php foreach($ss_gn_b1 as $k=>$v){?>	
                      <div class="promotersdiv">
                        <div class="form-group col-md-6">
                            
                            
                                  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_b1[borrower_promoters_name][]'])) { echo  $this->session->flashdata('step1')['ss_gn_b1[borrower_promoters_name][]']; } ?></span></div>
                                
                            
                          <label>Name of The Promoters of Borrower</label>
                          <input required="" class="form-control" type="text" name="ss_gn_b1[borrower_promoters_name][]" value="<?php echo $v['borrower_promoters_name'];?>">
                        </div>
                        <div class="form-group col-md-6">
                            
                            
                                  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_b1[shareholding_promoter][]'])) { echo  $this->session->flashdata('step1')['ss_gn_b1[shareholding_promoter][]']; } ?></span></div>
                            
                          <label>% Shareholding of Promoter </label>
                          <input required="" class="form-control" min="0" max="100" type="number" step="0.01" name="ss_gn_b1[shareholding_promoter][]" value="<?php echo $v['shareholding_promoter'];?>">
                        </div>
                        <div class="form-group col-md-6">
                            
                            
                                  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_b1[phn_no][]'])) { echo  $this->session->flashdata('step1')['ss_gn_b1[phn_no][]']; } ?></span></div>
                            
                          <label>Phone No.</label>
                          <input required="" class="form-control" maxlength="10" type="text" name="ss_gn_b1[phn_no][]" value="<?php echo $v['phn_no'];?>">
                        </div>
                        <div class="form-group col-md-6">
                            
                            
                            
                                  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_b1[email][]'])) { echo  $this->session->flashdata('step1')['ss_gn_b1[email][]']; } ?></span></div>
                            
                          <label>Email</label>
                          <input required="" class="form-control" type="email" name="ss_gn_b1[email][]" value="<?php echo $v['email'];?>">
                        </div>
                        <div class="form-group col-md-11">
                            
                            
                            
                                  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_b1[address][]'])) { echo  $this->session->flashdata('step1')['ss_gn_b1[address][]']; } ?></span></div>
                            
                          <label>Address(Address of the Promoter) </label>
                          <input required="" class="form-control" type="text" name="ss_gn_b1[address][]" value="<?php echo $v['address'];?>">
                        </div>
                         <?php if($k>0){?>
                         <div class='form-group col-md-1'><label>Remove</label><div class='add-feild'><button type='button' id='removepromoter2' class='btn btn-danger addsub'>X</button></div></div>
                         <?php }?>
                      </div>
                      <?php }?>
                    </div>
                    <div class="form-group col-md-12">
                      <label>Promoters (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addpromotersdetails2" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-12">
                    
                    
                                  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_b[group_company_promoter]'])) { echo  $this->session->flashdata('step1')['ss_gn_b[group_company_promoter]']; } ?></span></div>
                    
                  <label>6) Promoter's Contribution(Equity Shares/CCPS/CCD/Others)</label>
                  <textarea required=""  class="form-control" rows="5" id="txtPowersale" name="ss_gn_b[group_company_promoter]"><?php echo $ss_gn_b['group_company_promoter'];?></textarea>
                </div>
              </div>
            </div>
			 <div class="col-md-12">
                    <table class="table table-bordered gentable">
                      <thead>
                        <tr>
                          <th>7)</th>
                          <th colspan="6">Financial performance of the Power Utility for the last 5 year</th>
                        </tr>
						<tr>
							<th>&nbsp;</th>
							<th>Parameters</th>
							<th>Year 1</th>
							<th>Year 2</th>
							<th>Year 3</th>
							<th>Year 4</th>
							<th>Year 5</th>
						</tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>(i)</td>
                          <td>Cap. utilization</td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
                        </tr>
                       <tr>
                          <td><div>(ii)</div></td>
                          <td>Turnover</td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
                        </tr>
                        <tr>
                          <td><div>(iii)</div></td>
                          <td>Net Profit</td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
                        </tr>
						<tr>
                          <td><div>(iv)</div></td>
                          <td>Net Worth</td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
                        </tr>
						<tr>
                          <td><div>(v)</div></td>
                          <td>RONW</td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
                        </tr>
						<tr>
                          <td><div>(vi)</div></td>
                          <td>Fixed Assets</td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
                        </tr>
						<tr>
                          <td><div>(vii)</div></td>
                          <td>Current Ratio</td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
                        </tr>
						<tr>
                          <td><div>(viii)</div></td>
                          <td>Debt-equity</td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
                        </tr>
						<tr>
                          <td><div>(ix)</div></td>
                          <td>D.S.C.R</td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
                        </tr>
						<tr>
                          <td><div>(x)</div></td>
                          <td>Interest servics <br>coverage ratio</td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
                        </tr>
						<tr>
                          <td><div>(xi)</div></td>
                          <td>Credit Ratio if any</td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
                          <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
						  <td><div>&nbsp;</div></td>
                        </tr>
						<tr>
                          <td colspan="7"><span></span>
                            <div>RONW - Return on Net worth DSCR - Debt Service Coverage Ratio <br> Pleace attach a brief write-up encloseing the relevant certificates from FI's/Bank for repayment etc.</div></td>
                          
                        </tr>
                      </tbody>
                    </table>
					<div class="col-md-12">
						 <div class="attachheading"> Financial performance of the Power Utility for the last 5 year Attachment
							<div class="attach pull-right"> 
                  	
								<span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
								<input  type="file" accept="application/pdf, application/zip"  name="financial_performance_power_utility_file" >
								</span> 
								<?php if($ss_gn_b['financial_performance_power_utility_file']) { ?>
								 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_b['financial_performance_power_utility_file']); ?>"> 
									<span><i class="fa fa-download" aria-hidden="true"></i></span>
								</a> 
								<?php } ?>
							</div>
						</div>
					 </div>
                  </div>
				  
				 
			
            <div class="col-md-12">
              <div class="sub-part">
			 
                <h4>C. KYC Details</h4>
                <div class="mtop1"></div>
                <div class="clearfix"></div>
                <div class="attachheading"> 1) Authorized Signatory For the Project
                  <div class="attach pull-right"> 
                  	
                  	<span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input  type="file" accept="application/pdf, application/zip"  name="authorized_signatory_for_project_file" >
                    </span> 
					<?php if($ss_gn_c['authorized_signatory_for_project_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_c['authorized_signatory_for_project_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
                   
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-4">
                    
                         <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_c[authorized_signatory_project_name]'])) { echo  $this->session->flashdata('step1')['ss_gn_c[authorized_signatory_project_name]']; } ?></span></div>
                    
                  <label>a) Name</label>
                  <input required="" class="form-control" type="text" name="ss_gn_c[authorized_signatory_project_name]" 
                  value="<?php echo $ss_gn_c['authorized_signatory_project_name']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
                    
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_c[authorized_signatory_project_address]'])) { echo  $this->session->flashdata('step1')['ss_gn_c[authorized_signatory_project_address]']; } ?></span></div>
                    
                  <label>b) Address</label>
                  <input required="" class="form-control" type="text" name="ss_gn_c[authorized_signatory_project_address]" 
                  value="<?php echo $ss_gn_c['authorized_signatory_project_address']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
                    
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_c[authorized_signatory_project_phone]'])) { echo  $this->session->flashdata('step1')['ss_gn_c[authorized_signatory_project_phone]']; } ?></span></div>
                    
                  <label>c) Phone</label>
                  <input required="" class="form-control" maxlength="10" type="text" name="ss_gn_c[authorized_signatory_project_phone]" 
                  value="<?php echo $ss_gn_c['authorized_signatory_project_phone']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
                    
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_c[authorized_signatory_project_email]'])) { echo  $this->session->flashdata('step1')['ss_gn_c[authorized_signatory_project_email]']; } ?></span></div>
                    
                  <label>d) Email</label>
                  <input required="" class="form-control" type="email" name="ss_gn_c[authorized_signatory_project_email]"
                  value="<?php echo $ss_gn_c['authorized_signatory_project_email']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
                    
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_c[authorized_signatory_project_pan]'])) { echo  $this->session->flashdata('step1')['ss_gn_c[authorized_signatory_project_pan]']; } ?></span></div>
                    
                  <label>e) PAN</label>
                  <input required="" class="form-control" type="text" name="ss_gn_c[authorized_signatory_project_pan]" pattern="[a-zA-z]{5}\d{4}[a-zA-Z]{1}" placeholder="ABCDS1234Y"
                  value="<?php echo $ss_gn_c['authorized_signatory_project_pan']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
                    
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_c[authorized_signatory_project_aadhar]'])) { echo  $this->session->flashdata('step1')['ss_gn_c[authorized_signatory_project_aadhar]']; } ?></span></div>
                    
                  <label>f) Aadhar Number</label>
                  <input required="" class="form-control" type="text" placeholder ="" pattern="^\d{4}\d{4}\d{4}$" name="ss_gn_c[authorized_signatory_project_aadhar]"
                  value="<?php echo $ss_gn_c['authorized_signatory_project_aadhar']; ?>"
                  >
                </div>
                <div class="mtop1"></div>
                <div class="clearfix"></div>
                <div class="attachheading"> 2) Authorized Person on Behalf of Borrower
                  <div class="attach pull-right"> 
                  	
                  	<span class="btn btn-primary btn-file"> 
                  		<span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    	<input  type="file" accept="application/pdf, application/zip"  name="authorized_person_on_behalf_of_borrower_file" >
                    </span> 
                   <?php if($ss_gn_c['authorized_person_on_behalf_of_borrower_file']) { ?>
					 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_c['authorized_person_on_behalf_of_borrower_file']); ?>"> 
                  		<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
                    </div>
					
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-4">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_c[authorized_person_borrower_name]'])) { echo  $this->session->flashdata('step1')['ss_gn_c[authorized_person_borrower_name]']; } ?></span></div>
                    
                  <label>a) Name</label>
                  <input required="" class="form-control" type="text" name="ss_gn_c[authorized_person_borrower_name]"
                  value="<?php echo $ss_gn_c['authorized_person_borrower_name']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
                    
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_c[authorized_person_borrower_address]'])) { echo  $this->session->flashdata('step1')['ss_gn_c[authorized_person_borrower_address]']; } ?></span></div>
                    
                  <label>b) Address</label>
                  <input required="" class="form-control" type="text" name="ss_gn_c[authorized_person_borrower_address]"
                  value="<?php echo $ss_gn_c['authorized_person_borrower_address']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
                    
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_c[authorized_person_borrower_phone]'])) { echo  $this->session->flashdata('step1')['ss_gn_c[authorized_person_borrower_phone]']; } ?></span></div>
                    
                  <label>c) Phone</label>
                  <input required="" class="form-control" maxlength="10" type="text" name="ss_gn_c[authorized_person_borrower_phone]"
                  value="<?php echo $ss_gn_c['authorized_person_borrower_phone']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
                    
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_c[authorized_person_borrower_email]'])) { echo  $this->session->flashdata('step1')['ss_gn_c[authorized_person_borrower_email]']; } ?></span></div>
                    
                  <label>d) Email</label>
                  <input required="" class="form-control" type="email" name="ss_gn_c[authorized_person_borrower_email]"
                  value="<?php echo $ss_gn_c['authorized_person_borrower_email']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
                    
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_c[authorized_person_borrower_pan]'])) { echo  $this->session->flashdata('step1')['ss_gn_c[authorized_person_borrower_pan]']; } ?></span></div>
                    
                  <label>e) PAN</label>
                  <input required="" class="form-control" type="text" name="ss_gn_c[authorized_person_borrower_pan]" pattern="[a-zA-z]{5}\d{4}[a-zA-Z]{1}" placeholder="ABCDS1234Y"
                  value="<?php echo $ss_gn_c['authorized_person_borrower_pan']; ?>"
                  >
                </div>
                <div class="form-group col-md-4">
                    
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['ss_gn_c[authorized_person_borrower_adhaar_number]'])) { echo  $this->session->flashdata('step1')['ss_gn_c[authorized_person_borrower_adhaar_number]']; } ?></span></div>
                    
                  <label>f) Aadhar Number</label>
                  <input required="" class="form-control" type="text" placeholder ="" pattern="^\d{4}\d{4}\d{4}$" name="ss_gn_c[authorized_person_borrower_adhaar_number]"
                  value="<?php echo $ss_gn_c['authorized_person_borrower_adhaar_number']; ?>" >
				   <?php if(isset($_GET['fid'])) { ?>
				  <input type="hidden" name="form_id" value="<?php  print_r($_GET['fid']); ?>">
				 <?php } ?>
                </div>
              </div>
            </div>
            
            <div class="col-md-12 text-right">
			
              <button type="submit" class="btn btn-primary">Save & Next</button>
            </div>
            </form>
          
             </div>
         
        
          	<div class="row setup-content" id="ssgn_step-2">
			
          	<form role="form" action="<?php echo base_url(); ?>form1/process_ss_generation_2" method="post" enctype="multipart/form-data">
			 
            <div class="col-md-12">
              <div class="sub-part">
                <h4>Project Details </h4>
                <div class="form-group ">
                  <div class="clearfix"></div>
                  <div class="attachheading"> 1) Means of Finance (Rs. Crore) as per below format in the form of attachment:
                    <div class="attach pull-right"> 
                   
	                      <span class="btn btn-primary btn-file"> 
						  <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
	                      	<input  type="file" accept="application/pdf, application/zip"  name="means_of_finance_field" >
	                      </span>
						  
						   <?php if($ss_gn_2['means_of_finance_field_data']) { ?>
							 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_2['means_of_finance_field_data']); ?>"> 
								<span><i class="fa fa-download" aria-hidden="true"></i></span>
							</a> 
							<?php } ?>
                      
                      </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-12">
                    <table class="table table-bordered gentable">
                      <thead>
                        <tr>
                          <th>&nbsp;</th>
                          <th>Name of Promoter</th>
                          <th>%</th>
                          <th>Amount</th>
                          <th>Remarks</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span></span>
                            <div>Equity Contributors</div></td>
                          <td><span>Name of Promoter</span>
                            <div>&nbsp;</div></td>
                          <td><span>%</span>
                            <div>&nbsp;</div></td>
                          <td><span>Amount</span>
                            <div>&nbsp;</div></td>
                          <td><span>Remarks</span>
                            <div>&nbsp;</div></td>
                        </tr>
                        <tr>
                          <td><span></span>
                            <div>Debt Contributors</div></td>
                          <td><span>Name of Promoter</span>
                            <div>&nbsp;</div></td>
                          <td><span>%</span>
                            <div><strong>N.A</strong></div></td>
                          <td><span>Amount</span>
                            <div>&nbsp;</div></td>
                          <td><span>Remarks</span>
                            <div>&nbsp;</div></td>
                        </tr>
                        <tr>
                          <td><span></span>
                            <div><strong>Total</strong></div></td>
                          <td><span>Name of Promoter</span>
                            <div>&nbsp;</div></td>
                          <td><span>%</span>
                            <div>&nbsp;</div></td>
                          <td><span>Amount</span>
                            <div><strong>'X'</strong></div></td>
                          <td><span>Remarks</span>
                            <div>&nbsp;</div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="form-group col-md-12">
                      
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[name_of_lead_bank]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[name_of_lead_bank]']; } ?></span></div>
                      
                    <label>2) Name of the Lead Bank/Financial Institution </label>
                    <input required="" type="text" class="form-control" name="phase1_project_details[name_of_lead_bank]" value="<?php echo $ss_gn_2['name_of_lead_bank']?>">
                  </div>
                  <div class="">
                    <div class="col-md-12">
                      <h6>3) Sanction details of other banks(if Sanctioned)</h6>
                    </div>
					
                    <div id="insertbanktable2">
                    	<?php $js=1; foreach($ss_gn_san as $itgn){  ?>
						
                      <div class="test test_<?=$js?>">
                        <div class="form-group col-md-3">
                            
                             <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['ss_phase1_project_details[name_of_bank_FI][]'])) { echo  $this->session->flashdata('step2')['ss_phase1_project_details[name_of_bank_FI][]']; } ?></span></div>
                      
                            
                          <label>Name of Bank/FI</label>
                          <input required="" type="text" class="form-control" value="<?=$itgn['name_of_bank_FI']?>" name="ss_phase1_project_details[name_of_bank_FI][]">
                        </div>
                        <div class="form-group col-md-3">
                                                         
                             <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['ss_phase1_project_details[name_of_bank_amount][]'])) { echo  $this->session->flashdata('step2')['ss_phase1_project_details[name_of_bank_amount][]']; } ?></span></div>
                            
                          <label>Amount</label>
                          <input required=""  type="number" pattern="^\d+(?:\.\d{1,2})?$"  value="<?=$itgn['name_of_bank_amount']?>"  step="0.01" class="form-control" name="ss_phase1_project_details[name_of_bank_amount][]">
                        </div>
                        <div class="form-group col-md-4">
                            
                             <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['ss_phase1_project_details[name_of_bank_status1]'])) { echo  $this->session->flashdata('step2')['ss_phase1_project_details[name_of_bank_status1]']; } ?></span></div>
                            
                          <label>Status</label>
                          <div class="">
                            <label for="chkYsanction" class="radio-inline">
                              <?php if($itgn['name_of_bank_status']){ ?>
                              	<input required="" type="radio" id="chkYsanction<?=$js?>" name="ss_phase1_project_details[name_of_bank_status<?=$js?>]" value="Sanctioned" onClick="ShowHideSanction(<?=$js?>)"  <?php if($itgn['name_of_bank_status']=="Sanctioned"){echo "checked";} ?>/>
                              <?php }else{ ?>	
                              	<input required="" type="radio" id="chkYsanction<?=$js?>" name="ss_phase1_project_details[name_of_bank_status<?=$js?>]" value="Sanctioned" onClick="ShowHideSanction(<?=$js?>)" checked />
                              <?php } ?>
                              Sanctioned </label>
                            <label for="chkNsanction" class="radio-inline">
                              <input required="" type="radio" id="chkNsanction<?=$js?>" name="ss_phase1_project_details[name_of_bank_status<?=$js?>]" value="Applied" onClick="ShowHideSanction(<?=$js?>)"   <?php if($itgn['name_of_bank_status']=="Applied"){echo "checked";} ?> />
                              Applied </label>
                            <div class="attach pull-right" id="dvSanction<?=$js?>" style="display: <?php if($itgn['name_of_bank_status']){if($itgn['name_of_bank_status']=="Sanctioned"){echo "block";}else{echo "none";}}else{echo "block";} ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                              <input type="file" accept="application/pdf, application/zip"   id="txtSanction" name="name_of_bank_status_attach<?=$js?>">
                              <input  type="hidden" id="txtSanction" name="name_of_bank_status_attachname<?=$js?>" value="<?=$itgn['name_of_bank_status_attach']?>">
                              </span> 
							   <?php if($itgn['name_of_bank_status_attach']) { ?>
							 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $itgn['name_of_bank_status_attach']); ?>"> 
								<span><i class="fa fa-download" aria-hidden="true"></i></span>
							</a> 
							<?php } ?>
							  </div>
                          </div>
                        </div>
                         <div class="form-group col-md-1"><label>Remove</label><div class="add-feild"><button type="button" data-id="<?=$itgn['id']?>" id="removebank2" class="btn btn-danger addsub ss_deleteData">X</button></div></div>
                      </div>
                      <?php $js++; } ?>
                    </div>
                    <div class="form-group col-md-12">
                      <label>Banks (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addmorebank2" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-6">
                    
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[cost_comparison_bench_marking]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[cost_comparison_bench_marking]']; } ?></span></div>
                    
                  <label>4) Cost Comparison with  CERC/SERC Bench marking</label>
                  <input required="" class="form-control"   type='number' pattern='^\d+(?:\.\d{1,2})?$' step='0.01' name="phase1_project_details[cost_comparison_bench_marking]" value="<?php echo $ss_gn_2['cost_comparison_bench_marking']?>">
                </div>
                <div class="form-group col-md-6">
                    
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[prepare_by_whom]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[prepare_by_whom]']; } ?></span></div>
                    
                  <label>5) DPR prepared by whom </label>
                  <input required="" class="form-control" type="text" name="phase1_project_details[prepare_by_whom]" value="<?php echo $ss_gn_2['prepare_by_whom']?>">
                </div>
                  
                <div class="form-group col-md-6">
                    
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[dpr_year]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[dpr_year]']; } ?></span></div>
                    
                  <label>6) DPR year </label>
                  <input required="" class="form-control" type="number" name="phase1_project_details[dpr_year]"  value="<?php echo $ss_gn_2['dpr_year']?>">
                </div>
				
				 <div class="form-group col-md-2">
                   
                     
				  <label>6) DPR Attachment </label>
				<div class="attach">
	                      <span class="btn btn-primary btn-file"> 
						  <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
	                      	<input  type="file" accept="application/pdf, application/zip"  name="drp_attachment" >
	                      </span>
						  
						   <?php if($ss_gn_2['drp_attachment']) { ?>
							 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_2['drp_attachment']); ?>"> 
								<span><i class="fa fa-download" aria-hidden="true"></i></span>
							</a> 
							<?php } ?>
                      </div>
				</div>
				
                <div class="form-group col-md-4">
                    
                      
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[name_of_statutory_auditors]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[name_of_statutory_auditors]']; } ?></span></div>
                    
                  <label>7) Name of the Statutory Auditors </label>
                  <input required="" class="form-control" type="text" name="phase1_project_details[name_of_statutory_auditors]" value="<?php echo $ss_gn_2['name_of_statutory_auditors']?>">
                </div>
                <div class="form-group col-md-12">
                    
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[information_memorandum_financial_mode]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[information_memorandum_financial_mode]']; } ?></span></div>
                    
                  <label>8) DPR/Information Memorandum with Financial Model of Lead Bank/FI (if not available then of Borrower Co)</label>
                  <div class="attach">
                    <input required="" class="form-control" type="text" name="phase1_project_details[information_memorandum_financial_mode]" value="<?php echo $ss_gn_2['information_memorandum_financial_mode']?>">
                    <span class="btn btn-primary btn-file attach-c" style="right: <?php if($ss_gn_2['information_memorandum_financial_mode_attach']) {echo "42px;";}else{echo "0px;"; } ?>"> 
					<span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input type="file" accept="application/pdf, application/zip"   name="information_memorandum_financial_mode_attach">
                    </span> 
					
					<?php if($ss_gn_2['information_memorandum_financial_mode_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_2['information_memorandum_financial_mode_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
                      
                      
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="sub-part">
                    <div class="col-md-12">
                      <h6>9) PPA</h6>					  
                    </div>
					
					<div class="attachheading"> PPA Attachment
                    <div class="attach pull-right"> 
                   
	                      <span class="btn btn-primary btn-file"> 
						  <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
	                      	<input  type="file" accept="application/pdf, application/zip"  name="ppa_attachment" >
	                      </span>
						  
						   <?php if($ss_gn_2['ppa_attachment']) { ?>
							 <a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_2['ppa_attachment']); ?>"> 
								<span><i class="fa fa-download" aria-hidden="true"></i></span>
							</a> 
							<?php } ?>
                      
                      </div>
                  </div>
					
				
                    <h5>Tied up</h5>
					<?php if(!empty($ss_gn_2a)){ ?>
                    <div id="tideupcontains">
					<?php $j=1; foreach($ss_gn_2a as $data){ ?>
                    <div class="tiedupholds">
                    <div class="form-group col-md-4">
                        
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details[date_of_ppa][]'])) { echo  $this->session->flashdata('step2')['project_details[date_of_ppa][]']; } ?></span></div>
                    
                        
                      <label>a) Date of PPA</label>
                      <input required="" type="date" class="span2 form-control" placeholder="dd/mm/yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" name="project_details[date_of_ppa][]" value="<?php echo $data['date_of_ppa']?>">
                    </div>
                    <div class="form-group col-md-4">
                        
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details[utility_discom][]'])) { echo  $this->session->flashdata('step2')['project_details[utility_discom][]']; } ?></span></div>
                    
                        
                      <label>b) Utility/Discom</label>
                      <input required="" type="text" class="form-control" name="project_details[utility_discom][]"  value="<?php echo $data['utility_discom']?>">
                    </div>
                    <div class="form-group col-md-4">
                        
                         <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details[ppa_capacity][]'])) { echo  $this->session->flashdata('step2')['project_details[ppa_capacity][]']; } ?></span></div>
                    
                        
                      <label>c) Capacity</label>
                      <input required="" type="number" class="form-control" name="project_details[ppa_capacity][]" value="<?php echo $data['ppa_capacity']?>">
                    </div>
                        
                    <div class="form-group col-md-4">
                        
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details[ppa_tariff][]'])) { echo  $this->session->flashdata('step2')['project_details[ppa_tariff][]']; } ?></span></div>
                    
                        
                      <label>d) Tariff</label>
                      <input required="" type="text" class="form-control" name="project_details[ppa_tariff][]" value="<?php echo $data['ppa_tariff']?>">
                    </div>
                        
                    <div class="form-group col-md-4">
                        
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details[ppa_mou_case_1][]'])) { echo  $this->session->flashdata('step2')['project_details[ppa_mou_case_1][]']; } ?></span></div>
                    
                      <label>e) MoU/Case-I</label>
                      <input required="" type="text" class="form-control" name="project_details[ppa_mou_case_1][]" value="<?php echo $data['ppa_mou_case_1']?>">
                    </div>
					<div class="form-group col-md-1"><label>Remove</label><div class="add-feild"><button type="button" id="removetideup" class="btn btn-danger addsub" >X</button></div></div>
                    <div class="clearfix"></div>
                    <hr />
                    </div>
					<?php $j++; } ?>
                    </div>
					
					<?php }else { ?>
					
					 <div id="tideupcontains">
                    <div class="tiedupholds">
                    <div class="form-group col-md-4">
                        
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details[date_of_ppa][]'])) { echo  $this->session->flashdata('step2')['project_details[date_of_ppa][]']; } ?></span></div>
                        
                      <label>a) Date of PPA</label>
                      <input required="" type="text" class="span2 form-control dp12" placeholder="dd/mm/yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" name="project_details[date_of_ppa][]">
                    </div>
                    <div class="form-group col-md-4">
                        
                           
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details[utility_discom][]'])) { echo  $this->session->flashdata('step2')['project_details[utility_discom][]']; } ?></span></div>
                    
                      <label>b) Utility/Discom</label>
                      <input required="" type="text" class="form-control" name="project_details[utility_discom][]">
                    </div>
                    <div class="form-group col-md-4">
                        
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details[ppa_capacity][]'])) { echo  $this->session->flashdata('step2')['project_details[ppa_capacity][]']; } ?></span></div>
                        
                      <label>c) Capacity</label>
                      <input required="" type="number" class="form-control" name="project_details[ppa_capacity][]">
                    </div>
                    <div class="form-group col-md-4">
                        
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details[ppa_tariff][]'])) { echo  $this->session->flashdata('step2')['project_details[ppa_tariff][]']; } ?></span></div>
                    
                        
                      <label>d) Tariff</label>
                      <input required="" type="text" class="form-control" name="project_details[ppa_tariff][]">
                    </div>
                    <div class="form-group col-md-4">
                        
                         <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details[ppa_mou_case_1][]'])) { echo  $this->session->flashdata('step2')['project_details[ppa_mou_case_1][]']; } ?></span></div>
                    
                      <label>e) MoU/Case-I</label>
                      <input required="" type="text" class="form-control" name="project_details[ppa_mou_case_1][]">
                    </div>
					<div class="form-group col-md-1"><label>Remove</label><div class="add-feild"><button type="button" class="btn btn-danger addsub" disabled>X</button></div></div>
                    <div class="clearfix"></div>
                    <hr />
                    </div>
					
                    </div>
					
					<?php } ?>
                    <div class="form-group col-md-12">
                      <label>Add (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addtideup" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <h5>Yet to be tied up</h5>
					<?php if(!empty($ss_gn_2a)){ ?>
                    <div id="yettideupcontainer">
					<?php $j=1; foreach($ss_gn_2b as $data2){ ?>
                    <div class="yettideupholds">
                    <div class="form-group col-md-4">
                        
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details1[yet_tied_capacity][]'])) { echo  $this->session->flashdata('step2')['project_details1[yet_tied_capacity][]']; } ?></span></div>
                        
                      <label>a) Capacity</label>
                      <input required="" type="number" class="form-control" name="project_details1[yet_tied_capacity][]" value="<?php echo $data2['yet_tied_capacity']?>">
                    </div>
                    <div class="form-group col-md-4">
                        
                        
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details1[yet_tied_proposed_through][]'])) { echo  $this->session->flashdata('step2')['project_details1[yet_tied_proposed_through][]']; } ?></span></div>
                        
                      <label>b) Proposed through</label>
                      <input required="" type="text" class="form-control" name="project_details1[yet_tied_proposed_through][]" value="<?php echo $data2['yet_tied_proposed_through']?>">
                    </div>
                    <div class="form-group col-md-4">
                        
                           
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details1[yet_tied_expected_tariff][]'])) { echo  $this->session->flashdata('step2')['project_details1[yet_tied_expected_tariff][]']; } ?></span></div>
                        
                      <label>c) Expected Tariff</label>
                      <input required="" type="text" class="form-control" name="project_details1[yet_tied_expected_tariff][]" value="<?php echo $data2['yet_tied_expected_tariff']?>">
                    </div>
                    <div class="form-group col-md-4">
					
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details1[yet_tied_detail_bidding_participated][]'])) { echo  $this->session->flashdata('step2')['project_details1[yet_tied_detail_bidding_participated][]']; } ?></span></div>
                        
                      <label>d) Remarks</label>
                                            
                      <input required="" type="text" class="form-control" name="project_details1[yet_tied_detail_bidding_participated][]" value="<?php echo $data2['yet_tied_detail_bidding_participated']?>">
                    </div>
                    <div class="form-group col-md-1"><label>Remove</label><div class="add-feild"><button type="button" id="removeyettideup" class="btn btn-danger addsub">X</button></div></div>
                    <div class="clearfix"></div><hr>
					</div>
					<?php $j++; } ?>
					</div>
					<?php }else{ ?>
						
						<div id="yettideupcontainer">
					
                    <div class="yettideupholds">
                    <div class="form-group col-md-4">
                        
                           <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details1[yet_tied_capacity][]'])) { echo  $this->session->flashdata('step2')['project_details1[yet_tied_capacity][]']; } ?></span></div>
                        
                        
                      <label>a) Capacity</label>
                      <input required="" type="number" class="form-control" name="project_details1[yet_tied_capacity][]" >
                    </div>
                    <div class="form-group col-md-4">
                        
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details1[yet_tied_proposed_through][]'])) { echo  $this->session->flashdata('step2')['project_details1[yet_tied_proposed_through][]']; } ?></span></div>
                        
                      <label>b) Proposed through</label>
                      <input required="" type="text" class="form-control" name="project_details1[yet_tied_proposed_through][]" >
                    </div>
                    <div class="form-group col-md-4">
                        
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details1[yet_tied_expected_tariff][]'])) { echo  $this->session->flashdata('step2')['project_details1[yet_tied_expected_tariff][]']; } ?></span></div>
                        
                      <label>c) Expected Tariff</label>
                      <input required="" type="text" class="form-control" name="project_details1[yet_tied_expected_tariff][]" >
                    </div>
                    <div class="form-group col-md-4">
                        
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_details1[yet_tied_detail_bidding_participated][]'])) { echo  $this->session->flashdata('step2')['project_details1[yet_tied_detail_bidding_participated][]']; } ?></span></div>
					
                      <label>d) Remarks</label>
                      <input required="" type="text" class="form-control" name="project_details1[yet_tied_detail_bidding_participated][]" >
                    </div>
                    <div class="form-group col-md-1"><label>Remove</label><div class="add-feild"><button type="button" class="btn btn-danger addsub" disabled>X</button></div></div>
                    <div class="clearfix"></div><hr>
					</div>
					
					</div>
					<?php } ?>
				  <div class="form-group col-md-12">
                      <label>Add (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addyettideup" class="btn btn-primary">Add</button>
                      </div>
                    </div>
				  </div>
				  
				   <div class="clearfix"></div>
				    <div class="form-group col-md-12">
                    <h5>NOT APPLICABLE</h5>
                        
                           <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[remarks]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[remarks]']; } ?></span></div>
                        
					 <label>Remarks </label>
                    <input required="" type="text" class="form-control" name="phase1_project_details[remarks]" value="<?php echo $ss_gn_2['remarks']?>">
				  </div>
                </div>
              </div>
            </div>
            <div class="form-group col-md-12">
                
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[plant_technology_capacity]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[plant_technology_capacity]']; } ?></span></div>
                
              <label>1) Plant & Technology(Capacity, major components of the project, technology, make/class of key equipment and key design parameters)</label>
              <textarea required=""  class="form-control" rows="5" id="" name="phase1_project_details[plant_technology_capacity]"><?php echo $ss_gn_2['plant_technology_capacity']?></textarea>
            </div>
            <div class="form-group col-md-12">
                
                <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[infrastructure_land_requirement]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[infrastructure_land_requirement]']; } ?></span></div>
                
              <label>2) Infrastructure(Land Requirement, Availability and type of land existing infrastructure in the surroundings required/proposed infrastructure for access to location required/proposed infrastructure for fuel – receiving and storing) </label>
              <textarea required=""  class="form-control" rows="5" id="" name="phase1_project_details[infrastructure_land_requirement]"><?php echo $ss_gn_2['infrastructure_land_requirement']?></textarea>
            </div>
            <div class="form-group col-md-12">
                
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[water_estimated_requirement_source]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[water_estimated_requirement_source]']; } ?></span></div>
                
              <label>3) Water(estimated requirement, source and plan to meet the water requirement)</label>
              <textarea required=""  class="form-control" rows="5" id="" name="phase1_project_details[water_estimated_requirement_source]"><?php echo $ss_gn_2['water_estimated_requirement_source']?></textarea>
            </div>
            <div class="form-group col-md-12">
                
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[fuel_estimated_requirement_source]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[fuel_estimated_requirement_source]']; } ?></span></div>
                
              <label>4) Fuel(estimated requirement, source and plan to meet the fuel requirement( wherever required))</label>
              <textarea required=""  class="form-control" rows="5" id="" name="phase1_project_details[fuel_estimated_requirement_source]"><?php echo $ss_gn_2['fuel_estimated_requirement_source']?></textarea>
            </div>
            <div class="form-group col-md-12">
                
                  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[project_plant_implementation_schedule]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[project_plant_implementation_schedule]']; } ?></span></div>
                
              <label>5) Project Plant & Implementation Schedule(Start date, major activities and milestones and the COD)</label>
              <textarea required=""  class="form-control" rows="5" id="" name="phase1_project_details[project_plant_implementation_schedule]"><?php echo $ss_gn_2['project_plant_implementation_schedule']?></textarea>
            </div>
            <div class="form-group col-md-12">
                
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[pan_for_power_evacuation_infrastructure_existing]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[pan_for_power_evacuation_infrastructure_existing]']; } ?></span></div>
                
              <label>6) Plan for Power Evacuation(Infrastructure existing/required/proposed)</label>
              <textarea required=""  class="form-control" rows="5" id="" name="phase1_project_details[pan_for_power_evacuation_infrastructure_existing]"><?php echo $ss_gn_2['pan_for_power_evacuation_infrastructure_existing']?></textarea>
            </div>
            <div class="form-group col-md-12">
                
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[power_sale_offtake_banking]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[power_sale_offtake_banking]']; } ?></span></div>
                
              <label>7) Power Sales & Offtake(Arrangement for offtake and sale of power through PPAs, nature of buyers, tariff, wheeling/banking)</label>
              <textarea required=""  class="form-control" rows="5" id="" name="phase1_project_details[power_sale_offtake_banking]"><?php echo $ss_gn_2['power_sale_offtake_banking']?></textarea>
            </div>
            <div class="form-group">
              <div class="clearfix"></div>
              <div class="attachheading"> 8) Year wise Project cost (Phasing of Expenditure)(Attach as per format)
                <div class="attach pull-right"> <span class="btn btn-primary btn-file"> 
				<span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                  <input type="file" accept="application/pdf, application/zip"   name="year_wise_project_cost_attach">
                  </span> 
				  
				  <?php if($ss_gn_2['information_memorandum_financial_mode_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_2['information_memorandum_financial_mode_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
				  </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-md-12">
                <table class="table table-bordered gentable">
                  <thead>
                    <tr>
                      <th>&nbsp;</th>
                      <th>Project Head</th>
                      <th>Year1</th>
                      <th>Year2</th>
                      <th>Year3</th>
                      <th>Total</th>
                      <th>% to Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>1</div></td>
                      <td><span>Project Head</span>
                        <div>Cost of land & Site Development</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>2</div></td>
                      <td><span>Project Head</span>
                        <div>Plant Machinery & Equipment (Incl. Taxes & Duties) </div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>3</div></td>
                      <td><span>Project Head</span>
                        <div>Initial Spares</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>4</div></td>
                      <td><span>Project Head</span>
                        <div>Civil & Infrastructural Works</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>5</div></td>
                      <td><span>Project Head</span>
                        <div>Construction & Pre-commissioning Expenses</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>6</div></td>
                      <td><span>Project Head</span>
                        <div>Overheads (Incl. Contingencies)</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>7</div></td>
                      <td><span>Project Head</span>
                        <div>Capital Costs Excluding IDC & FC</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td rowspan="3"><span>&nbsp;</span>
                        <div>8</div></td>
                      <td><span>Project Head</span>
                        <div>-IDC, </div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      
                      <td><span>Project Head</span>
                        <div>-FC, FV & Hedging Costs </div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      
                      <td><span>Project Head</span>
                        <div>Total – IDC, FV, FV & HC</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>9</div></td>
                      <td><span>Project Head</span>
                        <div>Working Capital Margin</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>10</div></td>
                      <td><span>Project Head</span>
                        <div>Total Project Cost ( Incl. WC margin)</div></td>
                      <td><span>Year1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Year3</span>
                        <div>&nbsp;</div></td>
                      <td><span>Total</span>
                        <div>&nbsp;</div></td>
                      <td><span>% to Total</span>
                        <div>&nbsp;</div></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h5>9) Licenses & Approvals </h5>
                <div class="form-group col-md-4">
                    
                    
                     
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[licenses_approval_pollution_clearance]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[licenses_approval_pollution_clearance]']; } ?></span></div>
                    
                  <label>a) Pollution Clearance</label>
                  <div class="">
                    <label for="chkYPollutionxyz" class="radio-inline">
                      <input required="" type="radio" id="chkYPollutionxyz"   name="phase1_project_details[licenses_approval_pollution_clearance]" value="Yes" onClick="ShowHidePollutionxyz()" 
                      
                      	<?php if($ss_gn_2['licenses_approval_pollution_clearance']=='Yes'){echo 'checked'; $lapca = 'block';}else{$lapca = 'none';}?> 
                      
                      />
                      Yes </label>
                    <label for="chkNPollutionxyz" class="radio-inline">
                      <input required="" type="radio" id="chkNPollutionxyz"   name="phase1_project_details[licenses_approval_pollution_clearance]" value="No" onClick="ShowHidePollutionxyz()"  
                      	<?php if($ss_gn_2['licenses_approval_pollution_clearance']=='No'){echo 'checked'; $lapca = 'none';}?>
                      />
                      No </label>
                    <div class="attach pull-right" id="dvPollutionxyz" style="display: <?php echo $lapca;?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtShareHold" name="licenses_approval_pollution_clearance_attach" >
                      </span> 
						 <?php if($ss_gn_2['licenses_approval_pollution_clearance_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_2['licenses_approval_pollution_clearance_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					  
					  </div>
                  </div>
                </div>
                <div class="form-group col-md-4">
                    
                      
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[licenses_approval_water_allocation]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[licenses_approval_water_allocation]']; } ?></span></div>
                    
                  <label>b) Water allocation </label>
                  <div class="">
                    <label for="chkYwaterxyz" class="radio-inline">
                      <input required="" type="radio" id="chkYwaterxyz" onClick="ShowHideWaterxyz()" value="Yes"  name="phase1_project_details[licenses_approval_water_allocation]" 

						<?php if($ss_gn_2['licenses_approval_water_allocation']=='Yes'){echo 'checked'; $lawp ='block';}else{$lawp = 'none';}?>
					  />
                      Yes </label>
                    <label for="chkNwaterxyz" class="radio-inline">
                      <input required="" type="radio" id="chkNwaterxyz" name="phase1_project_details[licenses_approval_water_allocation]"  value="No"  onClick="ShowHideWaterxyz()"  
                      
                      <?php if($ss_gn_2['licenses_approval_water_allocation']=='No'){echo 'checked'; $lawp ='none';}?>
                      
                      />
                      No </label>
                    <div class="attach pull-right" id="dvWaterxyz" style="display: <?php echo $lawp;?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtWater" name="licenses_approval_water_allocation_attach" >
                      </span>
						 <?php if($ss_gn_2['licenses_approval_water_allocation_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_2['licenses_approval_water_allocation_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>

					  </div>
                  </div>
                </div>
                <div class="form-group col-md-4">
                    
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[licenses_approval_environment_clearance]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[licenses_approval_environment_clearance]']; } ?></span></div>
                    
                  <label>c) Environmental clearance</label>
                  <div class="">
                    <label for="chkYevsxyz" class="radio-inline">
                      <input required="" 
                      	type="radio" id="chkYevsxyz" 
                      	name="phase1_project_details[licenses_approval_environment_clearance]" 
                      	value="Yes" onClick="ShowHideEvsxyz()" 
						<?php if($ss_gn_2['licenses_approval_environment_clearance']=='Yes'){echo 'checked'; $laec = 'block';}else{$laec = 'none';}?> 
					  />
                      Yes </label>
                    <label for="chkNevsxyz" class="radio-inline">
                      <input required="" type="radio" id="chkNevsxyz" name="phase1_project_details[licenses_approval_environment_clearance]" value="No" onClick="ShowHideEvsxyz()"  
                      <?php if($ss_gn_2['licenses_approval_environment_clearance']=='No'){echo 'checked'; $laec = 'none';}?>
                      />
                      No </label>
                    <div class="attach pull-right" id="dvEvsxyz" style="display: <?php echo $laec; ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtEvs" name="licenses_approval_environment_clearance_attach"  >
                      </span> 
					   <?php if($ss_gn_2['licenses_approval_environment_clearance_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_2['licenses_approval_environment_clearance_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-4">
                    
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[licenses_approval_forest_land_clearance]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[licenses_approval_forest_land_clearance]']; } ?></span></div>
                    
                  <label>d) Forest Land clearance (Project site)</label>
                  <div class="">
                    <label for="chkYforestxyz" class="radio-inline">
                      <input required="" type="radio" id="chkYforestxyz" value="Yes" name="phase1_project_details[licenses_approval_forest_land_clearance]" onClick="ShowHideForestxyz()"  
                      <?php if($ss_gn_2['licenses_approval_forest_land_clearance']=='Yes'){echo 'checked'; $laflc = 'block';}else{$laflc = 'none';}?>
                      />
                      Yes </label>
                    <label for="chkNforestxyz" class="radio-inline">
                      <input required="" type="radio" id="chkNforestxyz" value="No" name="phase1_project_details[licenses_approval_forest_land_clearance]" onClick="ShowHideForestxyz()" 
                      <?php if($ss_gn_2['licenses_approval_forest_land_clearance']=='No'){echo 'checked'; $laflc = 'none';}?>
                       />
                      No </label>
                    <label for="chkNAforestxyz" class="radio-inline">
                      <input required="" type="radio" id="chkNAforestxyz" name="phase1_project_details[licenses_approval_forest_land_clearance]"  value="NA" onClick="ShowHideForestxyz()"  
                      	<?php if($ss_gn_2['licenses_approval_forest_land_clearance']=='NA'){echo 'checked'; $laflc = 'none';}?>
                      />
                      NA </label>
                    <div class="attach pull-right" id="dvForestxyz" style="display: <?php echo $laflc;?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtForest" name="licenses_approval_forest_land_clearance_attach"  >
                      </span> 
					   <?php if($ss_gn_2['licenses_approval_forest_land_clearance_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_2['licenses_approval_forest_land_clearance_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                <div class="form-group col-md-4">
                    
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[licenses_approval_forest_land_evacuation]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[licenses_approval_forest_land_evacuation]']; } ?></span></div>
                    
                    
                  <label>e) Forest Land clearance (Evacuation) </label>
                  <div class="">
                    <label for="chkYevacuationxyz" class="radio-inline">
                      <input required="" type="radio" id="chkYevacuationxyz"  name="phase1_project_details[licenses_approval_forest_land_evacuation]" value="Yes" onClick="ShowHideEvacuationxyz()" 
<?php if($ss_gn_2['licenses_approval_forest_land_evacuation']=='Yes'){echo 'checked'; $lafle = 'block';}else{$lafle = 'none';}?>
 />
                      Yes </label>
                    <label for="chkNevacuationxyz" class="radio-inline">
                      <input required="" type="radio" id="chkNevacuationxyz" name="phase1_project_details[licenses_approval_forest_land_evacuation]" value="No" onClick="ShowHideEvacuationxyz()"  
                      <?php if($ss_gn_2['licenses_approval_forest_land_evacuation']=='No'){echo 'checked'; $lafle = 'none';}?>
                      />
                      No </label>
                    <label for="chkNAevacuationxyz" class="radio-inline">
                      <input required="" type="radio" id="chkNAevacuationxyz" name="phase1_project_details[licenses_approval_forest_land_evacuation]" value="NA" onClick="ShowHideEvacuationxyz()" 
                      <?php if($ss_gn_2['licenses_approval_forest_land_evacuation']=='NA'){echo 'checked'; $lafle = 'none';}?>
                       />
                      NA </label>
                    <div class="attach pull-right" id="dvEvacuationxyz" style="display: <?php echo $lafle;?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtEvacuation" name="licenses_approval_forest_land_evacuation_attach" value="" >
                      </span> 
					   <?php if($ss_gn_2['licenses_approval_forest_land_evacuation_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_2['licenses_approval_forest_land_evacuation_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                <div class="form-group col-md-4">
                    
                    
                       
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['phase1_project_details[licenses_approval_civil_aviation_clearance]'])) { echo  $this->session->flashdata('step2')['phase1_project_details[licenses_approval_civil_aviation_clearance]']; } ?></span></div>
                    
                    
                  <label>f) Civil aviation clearance (chimney height)</label>
                  <div class="">
                    <label for="chkYcivilxyz" class="radio-inline">
                      <input required="" type="radio" id="chkYcivilxyz"  name="phase1_project_details[licenses_approval_civil_aviation_clearance]" value="Yes" onClick="ShowHideCivilxyz()" 
<?php if($ss_gn_2['licenses_approval_civil_aviation_clearance']=='Yes'){echo 'checked'; $lacac = 'block';}else{ $lacac = 'none';}?>
 />
                      Yes </label>
                    <label for="chkNcivilxyz" class="radio-inline">
                      <input required="" type="radio" id="chkNcivilxyz"  name="phase1_project_details[licenses_approval_civil_aviation_clearance]" value="No"  onClick="ShowHideCivilxyz()"  
                      <?php if($ss_gn_2['licenses_approval_civil_aviation_clearance']=='No'){echo 'checked'; $lacac = 'none';}?>
                      />
                      No </label>
                    <div class="attach pull-right" id="dvCivilxyz" style="display: <?php echo $lacac;?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  id="txtCivil"   name="licenses_approval_civil_aviation_clearance_attach" >
                      </span> 
					  <?php if($ss_gn_2['licenses_approval_civil_aviation_clearance_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_2['licenses_approval_civil_aviation_clearance_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
			 
            <div class="col-md-12 text-right">
			<button class="btn btn-default prevBtn pull-left" type="button">Previous</button>
              <button type="submit" class="btn btn-primary">Save & Next</button>
            </div>
            </form>
          </div>
          
          
          <div class="row setup-content" id="ssgn_step-3">
		
          	<form  role="form" action="<?php echo base_url(); ?>form1/process_ss_generation_3" method="post" enctype="multipart/form-data">
			 
            <div class="col-md-12">
              <div class="sub-part">
                  
                  
                  <?php // pr($this->session->flashdata('step3')) ?>
              
                  
                <h5>10) Location, Land, Water & Infrastructure </h5>
                <div class="form-group col-md-12">
                    
                    
                          
                   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[location_geological_coord]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[location_geological_coord]']; } ?></span></div>
                    
                  <label>a) Geological Coordinates(Geographic Coordinates (of at least four corners) – indicating the corners in the NESW directions)</label>
                  <textarea required=""  class="form-control" rows="5" id="" name="phase1_loc_lan_wat[location_geological_coord]"><?php echo $ss_gn_3['location_geological_coord'];?></textarea>
                </div>
                  
                <div class="form-group col-md-12">
                                        
                   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[location_weather_located]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[location_weather_located]']; } ?></span></div>
                    
                  <label>b) Whether located in Backward area (attracting concession from State Govt., please specify)(please specify details of the Grant/Concessions) </label>
                  <textarea required=""  class="form-control" rows="5" id=""  name="phase1_loc_lan_wat[location_weather_located]"><?php echo $ss_gn_3['location_weather_located'];?></textarea>
                </div>
                  
                  
                <div class="form-group col-md-12">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[location_mearest_forest]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[location_mearest_forest]']; } ?></span></div>
                    
                  <label>c) Nearest Forest/ lake or any natural bodies, Bird Sanctuary or any such protected areas(Name and Distance from the site)</label>
                  <textarea required=""  class="form-control" rows="5" id=""  name="phase1_loc_lan_wat[location_mearest_forest]"><?php echo $ss_gn_3['location_mearest_forest'];?></textarea>
                </div>
                  
                <div class="form-group col-md-12">
                    
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[location_mearest_port_distance]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[location_mearest_port_distance]']; } ?></span></div>
                    
                  <label>d) Nearest Port/Distance(Name and Distance from Plant Location)</label>
                  <textarea required=""  class="form-control" rows="5" id=""  name="phase1_loc_lan_wat[location_mearest_port_distance]"><?php echo $ss_gn_3['location_mearest_port_distance'];?></textarea>
                </div>
                  
                  
                <div class="form-group col-md-12">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[location_railway_station_distance]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[location_railway_station_distance]']; } ?></span></div>
                    
                  <label>e) Nearest Railway Station/ Distance(Name and Distance from Plant Location)</label>
                  <textarea required=""  class="form-control" rows="5" id=""  name="phase1_loc_lan_wat[location_railway_station_distance]"><?php echo $ss_gn_3['location_railway_station_distance'];?></textarea>
                </div>
                  
                <div class="form-group col-md-12">
                    
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[location_nearest_national_highway]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[location_nearest_national_highway]']; } ?></span></div>
                    
                  <label>f) Nearest national Highway/State Highway/District Roads(Names and Distances)</label>
                  <textarea required=""  class="form-control" rows="5" id=""  name="phase1_loc_lan_wat[location_nearest_national_highway]"><?php echo $ss_gn_3['location_nearest_national_highway'];?></textarea>
                </div>
                  
                  
                <div class="form-group col-md-12">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[location_coal_gas_source]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[location_coal_gas_source]']; } ?></span></div>
                    
                  <label>g) Coal/Gas Source(Name of the Source, distance from the plant)</label>
                  <textarea required=""  class="form-control" rows="5" id=""  name="phase1_loc_lan_wat[location_coal_gas_source]"><?php echo $ss_gn_3['location_coal_gas_source'];?></textarea>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h5>11) Land requirement & availability</h5>
                <div class="form-group col-md-12">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[land_classification_current]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[land_classification_current]']; } ?></span></div>
                    
                  <label>a) Classification/Current Use of land and ownership(Whether Forest/Agriculture/Commercial or Industrial land. If combination, please specify the break-up 
                    whether Government/Private Land/Others)</label>
                  <textarea required=""  class="form-control" rows="5" id=""  name="phase1_loc_lan_wat[land_classification_current]"><?php echo $ss_gn_3['land_classification_current'];?></textarea>
                </div>
                  
                  
                <div class="form-group col-md-12">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[land_land_required]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[land_land_required]']; } ?></span></div>
                    
                  <label>b) Land Required for the entire plant as per DPR(In acres. Please specify the  acre/MW, (as per DPR))</label>
                  <textarea required=""  class="form-control" rows="5" id=""   name="phase1_loc_lan_wat[land_land_required]"><?php echo $ss_gn_3['land_land_required'];?></textarea>
                </div>
                  
                   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[land_land_required_for_main_plant]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[land_land_required_for_main_plant]']; } ?></span></div>
                  
                <div class="form-group col-md-12">
                  <label>c) Land Required for Main Plant(In acres)</label>
                  <textarea required=""  class="form-control" rows="5" id=""   name="phase1_loc_lan_wat[land_land_required_for_main_plant]"><?php echo $ss_gn_3['land_land_required_for_main_plant'];?></textarea>
                </div>
                  
                  
                <div class="form-group col-md-12">
                    
                   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[land_acquired_till_date]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[land_acquired_till_date]']; } ?></span></div>
                    
                  <label>d) Land Acquired till date(Please specify the details)</label>
                  <textarea required=""  class="form-control" rows="5" id=""   name="phase1_loc_lan_wat[land_acquired_till_date]"><?php echo $ss_gn_3['land_acquired_till_date'];?></textarea>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                  
                  
                <h5>12) Fuel related details</h5>
                <div class="form-group col-md-12">
                  
                  <div class="clearfix"></div>
                  <div class="col-md-6">
                      
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_domestic_coal_gas]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_domestic_coal_gas]']; } ?></span></div>
                      
				  <label>a) Domestic coal/Gas </label>
                    <input required="" type="text"  class="form-control" placeholder="GCV"  name="phase1_loc_lan_wat[fuel_domestic_coal_gas]" value="<?php echo $ss_gn_3['fuel_domestic_coal_gas'];?>">
                  </div>
                    
                  <div class="col-md-6">
                      
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_request_per_annum_capacity]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_request_per_annum_capacity]']; } ?></span></div>
                      
				   <label>Rquirement per annum </label>
                    <input required="" type="text"  name="phase1_loc_lan_wat[fuel_request_per_annum_capacity]" value="<?php echo $ss_gn_3['fuel_request_per_annum_capacity'];?>" pattern='^\d+(?:\.\d{1,2})?$' step='0.01' class="form-control" >
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="form-group col-md-12">
                 
                  <div class="clearfix"></div>
                  <div class="col-md-6">
                      
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_imported_call]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_imported_call]']; } ?></span></div>
                      
                      
					 <label>b) Imported Coal</label>
                    <input required="" type="text" class="form-control"  name="phase1_loc_lan_wat[fuel_imported_call]" value="<?php echo $ss_gn_3['fuel_imported_call'];?>">
                  </div>
                  <div class="col-md-6">
                      
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_imported_call_request_per_annum_capacity]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_imported_call_request_per_annum_capacity]']; } ?></span></div>
                      
				   <label>Requirement per annum </label>
                    <input required="" type="text" class="form-control"  name="phase1_loc_lan_wat[fuel_imported_call_request_per_annum_capacity]" value="<?php echo $ss_gn_3['fuel_imported_call_request_per_annum_capacity'];?>"  pattern='^\d+(?:\.\d{1,2})?$' step='0.01'>
                  </div>
                  <div class="clearfix"></div>
                </div>
				
				
				 <div class="form-group col-md-12">
                 
                  <div class="clearfix"></div>
                  <div class="col-md-6">
                      
                          
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_domestic_percent]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_domestic_percent]']; } ?></span></div>
                      
					 <label>c) Domestic Coal %</label>
                    <input required="" type="text" class="form-control"  name="phase1_loc_lan_wat[fuel_domestic_percent]" value="<?php echo $ss_gn_3['fuel_domestic_percent'];?>">
                  </div>
                     
                  <div class="col-md-6">
                      
                          
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_domestic_percent]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_domestic_percent]']; } ?></span></div>
                      
				   <label>d) Imported Coal % </label>
                    <input required="" type="text" class="form-control"  name="phase1_loc_lan_wat[fuel_imported_percent]" value="<?php echo $ss_gn_3['fuel_imported_percent'];?>"  pattern='^\d+(?:\.\d{1,2})?$' step='0.01'>
                  </div>
                  <div class="clearfix"></div>
                </div>
				
				
				
				
                <div class="form-group col-md-12">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_plan_meeting_fuel_requirement]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_plan_meeting_fuel_requirement]']; } ?></span></div>
                      
                    
                  <label>e) Plan for meeting the fuel requirement of plant life </label>
                  <div class="clearfix"></div>
                  <div class="col-md-12">
                    <input required="" type="text" class="form-control" placeholder="" name="phase1_loc_lan_wat[fuel_plan_meeting_fuel_requirement]" value="<?php echo $ss_gn_3['fuel_plan_meeting_fuel_requirement'];?>">
                  </div>
                  <div class="clearfix"></div>
                </div>
                <h5>f) Details of LOA/fuel supply agreement</h5>
                  
              
                <div class="form-group col-md-12">
                  <div class="col-md-4">
                      
                          
                   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_loa_with]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_loa_with]']; } ?></span></div>
                  
                      
                    <label>i) LOA with </label>
                    <div class="attach">
                      <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[fuel_loa_with]" value="<?php echo $ss_gn_3['fuel_loa_with'];?>">
                      <span class="btn btn-primary btn-file attach-c" style="right:<?php if($ss_gn_3['fuel_loa_with_attach']){echo "42px;"; }else{echo "0px;"; } ?>"> 
					  <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  name="fuel_loa_with_attach" >
                      </span>
					  
					<?php if($ss_gn_3['fuel_loa_with_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_3['fuel_loa_with_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					
					  </div>
                  </div>
				  
                  <div class="form-group col-md-4">
                      
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_loa_date]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_loa_date]']; } ?></span></div>
                  
                      
                    <label>ii) LOA Date</label>
                    <input required="" type="date" class="span2 form-control"  placeholder="dd/mm/yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" name="phase1_loc_lan_wat[fuel_loa_date]" value="<?php echo $ss_gn_3['fuel_loa_date'];?>">
                  </div>
                    
                  <div class="form-group col-md-4">
                      
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_quantum_fuel_supply]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_quantum_fuel_supply]']; } ?></span></div>
                      
                    <label>iii) Quantum of fuel supply</label>
                    <input required="" type="number" class="form-control" placeholder=""  name="phase1_loc_lan_wat[fuel_quantum_fuel_supply]" value="<?php echo $ss_gn_3['fuel_quantum_fuel_supply'];?>" pattern='^\d+(?:\.\d{1,2})?$' step='0.01' >
                  </div>
                    
                  <div class="form-group col-md-4">
                      
                         <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_validity_of_loa]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_validity_of_loa]']; } ?></span></div>
                      
                    <label>iv) Validity of LOA </label>
                    <input required="" type="text" class="form-control" placeholder=""   name="phase1_loc_lan_wat[fuel_validity_of_loa]" value="<?php echo $ss_gn_3['fuel_validity_of_loa'];?>">
                  </div>
                    
                    
                  <div class="form-group col-md-4">
                      
                         <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_validity_of_loa]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_validity_of_loa]']; } ?></span></div>
                      
                    <label>v) Obligation/commitments (Guarantee/bonds)</label>
                    <input required="" type="text" class="form-control" placeholder=""  name="phase1_loc_lan_wat[fuel_validity_of_loa]" value="<?php echo $ss_gn_3['fuel_validity_of_loa'];?>">
                  </div>
                    
                  <div class="form-group col-md-4">
                      
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_supply_agreement]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_supply_agreement]']; } ?></span></div>
                      
                    <label>vi) Fuel Supply Agreement</label>
                    <div class="attach">
                      <input required="" type="text" class="form-control"   name="phase1_loc_lan_wat[fuel_supply_agreement]" value="<?php echo $ss_gn_3['fuel_supply_agreement'];?>">
                      <span class="btn btn-primary btn-file attach-c" style="right:<?php if($ss_gn_3['fuel_supply_agreement_attachment']){echo "42px;"; }else{echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  name="fuel_supply_agreement_attachment" >
                      </span> 
					  
					  <?php if($ss_gn_3['fuel_supply_agreement_attachment']) { ?>
					<a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_3['fuel_supply_agreement_attachment']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					
					  </div>
                  </div>
                    
                  <div class="form-group col-md-4">
                      
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_annual_contracted_quantity]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_annual_contracted_quantity]']; } ?></span></div>
                      
                    <label>vii) Annual contacted quantity</label>
                    <input required="" type="number" class="form-control" placeholder=""  name="phase1_loc_lan_wat[fuel_annual_contracted_quantity]" value="<?php echo $ss_gn_3['fuel_annual_contracted_quantity'];?>" pattern='^\d+(?:\.\d{1,2})?$' step='0.01' >
                  </div>
                    
                  <div class="form-group col-md-4">
                      
                         <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_end_use_application]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_end_use_application]']; } ?></span></div>
                      
                    <label>viii) End-Use application</label>
                    <input required="" type="text" class="form-control" placeholder=""  name="phase1_loc_lan_wat[fuel_end_use_application]" value="<?php echo $ss_gn_3['fuel_end_use_application'];?>">
                  </div>
                    
                  <div class="form-group col-md-4">
                      
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_compensation_for_short]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_compensation_for_short]']; } ?></span></div>
                      
                    <label>ix) Compensation for short supply/lifting</label>
                    <input required="" type="number" class="form-control"  name="phase1_loc_lan_wat[fuel_compensation_for_short]" placeholder="" value="<?php echo $ss_gn_3['fuel_compensation_for_short'];?>" step='0.01' >
                  </div>
                  <div class="form-group">
                    <div class="col-md-12">
                        
                                             
                      <label>x) Price </label>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        
                           <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_price]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_price]']; } ?></span></div>
                        
					 <label>Base Price </label>
                      <input required=""  type="number" step="0.01" class="form-control" placeholder="Base price"  name="phase1_loc_lan_wat[fuel_price]" value="<?php echo $ss_gn_3['fuel_price'];?>">
                    </div>
                      
                      
                    <div class="col-md-6">
                        
                          <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_escalation]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[fuel_escalation]']; } ?></span></div>
                        
                                                
					<label>Escalation </label>
                      <input required="" type="text" class="form-control" placeholder="Escalation" name="phase1_loc_lan_wat[fuel_escalation]" value="<?php echo $ss_gn_3['fuel_escalation'];?>">
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h5>13) Water related details </h5>
                  
                                         
                <h5>a) Quantum of water required </h5>
                <div class="form-group col-md-6">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[water_per_day]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[water_per_day]']; } ?></span></div>
                    
                  <label>i) Per day</label>
                  <input required="" type="text" class="form-control" placeholder="Core" name="phase1_loc_lan_wat[water_per_day]" value="<?php echo $ss_gn_3['water_per_day'];?>">
                </div>
                  
                <div class="form-group col-md-6">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[water_per_annum]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[water_per_annum]']; } ?></span></div>
                    
                  <label>ii) Per annum</label>
                  <input required="" type="text" class="form-control" placeholder="Non-Core" name="phase1_loc_lan_wat[water_per_annum]" value="<?php echo $ss_gn_3['water_per_annum'];?>">
                </div>
                  
                <h5>b) Source of water supply </h5>
                <div class="form-group col-md-6">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[water_name_of_source]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[water_name_of_source]']; } ?></span></div>
                    
                  <label>i) Name of source</label>
                  <input required="" type="text" class="form-control" placeholder="Core" name="phase1_loc_lan_wat[water_name_of_source]" value="<?php echo $ss_gn_3['water_name_of_source'];?>">
                </div>
                  
                <div class="form-group col-md-6">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[water_distance]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[water_distance]']; } ?></span></div>
                    
                  <label>ii) Distance </label>
                  <input required="" type="text" class="form-control" placeholder="Non-Core" name="phase1_loc_lan_wat[water_distance]" value="<?php echo $ss_gn_3['water_distance'];?>">
                </div>
                <div class="clearfix"></div>
                <h5></h5>
                  
                <div class="form-group col-md-4">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[water_allocation]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[water_allocation]']; } ?></span></div>
                    
                  <label>c) Allocation </label>
                  <div class="attach">
                    <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[water_allocation]" value="<?php echo $ss_gn_3['water_allocation'];?>">
                    <span class="btn btn-primary btn-file attach-c" style="right:<?php if($ss_gn_3['water_allocation_attach']){echo "42px;"; }else{echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input  type="file" accept="application/pdf, application/zip"  name="water_allocation_attach" >
                    </span> 
					
					  <?php if($ss_gn_3['water_allocation_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_3['water_allocation_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					
					</div>
                </div>
                <div class="form-group col-md-4">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[water_transportation]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[water_transportation]']; } ?></span></div>
                    
                  <label>d) Transportation </label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[water_transportation]" value="<?php echo $ss_gn_3['water_transportation'];?>">
                </div>
                  
                <div class="form-group col-md-4">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[water_cooling_system]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[water_cooling_system]']; } ?></span></div>
                    
                  <label>e) Technology of cooling system</label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[water_cooling_system]" value="<?php echo $ss_gn_3['water_cooling_system'];?>">
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h5>14) Hydro related </h5>
                  
                  
                  
                <h5>a) Resettlement & Rehabilitation (R&R) impact </h5>
                <div class="form-group col-md-6">
                    
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_resettlement]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_resettlement]']; } ?></span></div>
                    
                  <label>i) No of villages affected</label>
                  <input required="" type="text" class="form-control" placeholder="" name="phase1_loc_lan_wat[hydro_resettlement]" value="<?php echo $ss_gn_3['hydro_resettlement'];?>">
                </div>
                  
                <div class="form-group col-md-6">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_family_resettled]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_family_resettled]']; } ?></span></div>
                    
                  <label>ii) No of families need to be resettled/rehabilitated</label>
                  <input required="" type="text" class="form-control" placeholder="" name="phase1_loc_lan_wat[hydro_family_resettled]" value="<?php echo $ss_gn_3['hydro_family_resettled'];?>">
                </div>
                <h5>b) Environmental Impact of the project </h5>
                <div class="col-md-12">
                  <div class="attach"> <span class="btn btn-primary btn-file "> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input  type="file" accept="application/pdf, application/zip"  name="hydro_environmental_impact"  >
                    </span>
					
					  <?php if($ss_gn_3['hydro_environmental_impact']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_3['hydro_environmental_impact']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>


					</div>
                </div>
                <div class="clearfix"></div>
                <div class="mtop1"></div>
                <div class="form-group col-md-6">
                    
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_extent_deforestation]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_extent_deforestation]']; } ?></span></div>
                    
                  <label>i) Extent of deforestation of the project</label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[hydro_extent_deforestation]" value="<?php echo $ss_gn_3['hydro_extent_deforestation'];?>">
                </div>
                  
                  
                <div class="form-group col-md-6">
                    
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_flora_fauna]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_flora_fauna]']; } ?></span></div>
                    
                  <label>ii) Steps required for protection of flora and fauna </label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[hydro_flora_fauna]" value="<?php echo $ss_gn_3['hydro_flora_fauna'];?>">
                </div>
                  
                <div class="form-group col-md-6">
                    
                    
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_forests_wildlife]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_forests_wildlife]']; } ?></span></div>
                    
                  <label>iii) Steps required for protection of forests and wildlife </label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[hydro_forests_wildlife]" value="<?php echo $ss_gn_3['hydro_forests_wildlife'];?>">
                </div>
                  
                  
                <div class="form-group col-md-6">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_archaelogical_monuments]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_archaelogical_monuments]']; } ?></span></div>
                    
                    
                  <label>iv) Is there any submergence of any religious or archaeological monuments </label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[hydro_archaelogical_monuments]" value="<?php echo $ss_gn_3['hydro_archaelogical_monuments'];?>">
                </div>
                  
                <div class="form-group col-md-6">
                    
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_degradation_catchment_area]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_degradation_catchment_area]']; } ?></span></div>
                    
                  <label>v) Any Degradation of catchment area & surplusing of reservoir Due to the project </label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[hydro_degradation_catchment_area]" value="<?php echo $ss_gn_3['hydro_degradation_catchment_area'];?>">
                </div>
                  
                <div class="form-group col-md-6">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_rock_mass_rating]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[hydro_rock_mass_rating]']; } ?></span></div>
                    
                  <label>vi) Rock Mass Rating </label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[hydro_rock_mass_rating]" value="<?php echo $ss_gn_3['hydro_rock_mass_rating'];?>">
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-12">
                  <h6>vii) Topography</h6>
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[typo_access_to_site]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[typo_access_to_site]']; } ?></span></div>
                    
                  <div class="form-group col-md-6">
                    <label>vii.1) Access to the site </label>
                    <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[typo_access_to_site]" value="<?php echo $ss_gn_3['typo_access_to_site'];?>">
                  </div>
                  <div class="form-group col-md-6">
                      
                         <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[typo_issue_pretaining_heavy_equipment]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[typo_issue_pretaining_heavy_equipment]']; } ?></span></div>
                      
                    <label>vii.2) Issues pertaining to movement of heavy equipment/machinery to site </label>
                    <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[typo_issue_pretaining_heavy_equipment]" value="<?php echo $ss_gn_3['typo_issue_pretaining_heavy_equipment'];?>">
                  </div>
                  <div class="form-group col-md-6">
                      
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[typo_potential_land_side_problems]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[typo_potential_land_side_problems]']; } ?></span></div>
                      
                    <label>vii.3) Potential land side problems if any </label>
                    <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[typo_potential_land_side_problems]" value="<?php echo $ss_gn_3['typo_potential_land_side_problems'];?>">
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-12">
                  <h6>viii) Hydology</h6>
                  <div class="form-group col-md-6">
                      
                         <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[hydo_year_data_avail]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[hydo_year_data_avail]']; } ?></span></div>
                      
                    <label>viii.1) No of years for which data available </label>
                    <div class="attach">
                      <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[hydo_year_data_avail]"  value="<?php echo $ss_gn_3['hydo_year_data_avail'];?>">
                      <span class="btn btn-primary btn-file attach-c" style="right:<?php if($ss_gn_3['hydo_year_data_avail_attach']){echo "42px;"; }else{echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input  type="file" accept="application/pdf, application/zip"  name="hydo_year_data_avail_attach" >
                      </span>
					  
					   <?php if($ss_gn_3['hydo_year_data_avail_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_3['hydo_year_data_avail_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>

					  </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-md-12">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['phase1_loc_lan_wat[seismic_zone]'])) { echo  $this->session->flashdata('step3')['phase1_loc_lan_wat[seismic_zone]']; } ?></span></div>
                    
                  <label>ix) Seismic Zone </label>
                  <input required="" type="text" class="form-control" name="phase1_loc_lan_wat[seismic_zone]" value="<?php echo $ss_gn_3['seismic_zone'];?>">
                </div>
              </div>
            </div>
			 
            <div class="col-md-12 text-right">
			<button class="btn btn-default prevBtn pull-left" type="button">Previous</button>
              <button type="submit" class="btn btn-primary">Save & Next</button>
            </div>
            </form>
         </div>
          
         
          <div class="row setup-content" id="ssgn_step-4">
          	<form role="form" action="<?php echo base_url(); ?>form1/process_ss_generation_4" method="post" enctype="multipart/form-data">
			
            <div class="col-md-12">
              <div class="sub-part">
                  
                 
                  
                <h5>15) Project Construction and Implementation Details</h5>
                <div class="form-group col-md-12">
                    
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['contract_project1'])) { echo  $this->session->flashdata('step4')['contract_project1']; } ?></span></div>
                    
                  <label>1) Contracting & Project Development(Construction contracts and type of bidding- whether Competitive Bidding or Negotiated Contract basis.)</label>
                  <textarea required=""  class="form-control" rows="5" name="contract_project1" value=""><?=$ss_gn_4['contract_project1']?></textarea>
                </div>
                <div class="form-group col-md-12">
                  <div class="sub-part">
                    <h5>2) EPC Route</h5>
                    <div class="form-group col-md-12">
                        
                            <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['contract_epc_route'])) { echo  $this->session->flashdata('step4')['contract_epc_route']; } ?></span></div>
                    
                        
                      <label>a) Please provide the details of the current status of the EPC contacts </label>
                      <input required="" type="text" class="form-control" name="contract_epc_route"  value="<?=$ss_gn_4['contract_epc_route']?>">
                    </div>
                   <!-- <h5>b) Provide the following details of each of the EPC contractors</h5>
                    <div class="form-group col-md-12">
                      <label>i) Experience and past track record of the Contractor</label>
                      <input required="" type="text" class="form-control" name="contract_contractor_past_record"  value="<?=$ss_gn_4['contract_contractor_past_record']?>">
                    </div>
                    <div class="form-group col-md-12">
                      <label>ii) How many plants of the similar technology and size did the Contractor implement?</label>
                      <input required="" type="text" class="form-control" name="contract_num_of_plants" value="<?=$ss_gn_4['contract_num_of_plants']?>">
                    </div>
                    <div class="form-group col-md-12">
                      <label>iii) List of all the installations/implementations in India</label>
                      <input required="" type="text" class="form-control" name="contract_installations_india" value="<?=$ss_gn_4['contract_installations_india']?>">
                    </div>
                    <div class="form-group col-md-12">
                      <label>iv) List of all the installations/implementations in other countries</label>
                      <input required="" type="text" class="form-control" name="contract_installations_abroad" value="<?=$ss_gn_4['contract_installations_abroad']?>">
                    </div>
                    <div class="form-group col-md-12">
                      <label>v) Whether the past projects were implemented in time and costs?</label>
                      <input required="" type="text" class="form-control" name="contract_past_project_implemeted_time_cost" value="<?=$ss_gn_4['contract_past_project_implemeted_time_cost']?>">
                    </div>
                    <div class="form-group col-md-12">
                      <label>vi) Number of years in business, Turnover of the EPC Contractor and number of employees</label>
                      <input required="" type="text" class="form-control" name="contract_years_in_business_tunover_employees" value="<?=$ss_gn_4['contract_years_in_business_tunover_employees']?>"> 
                    </div>
                    <div class="form-group col-md-12">
                      <label>vii) Number of years in business </label>
                      <input required="" type="text" class="form-control" name="contract_years_in_business" value="<?=$ss_gn_4['contract_years_in_business']?>">
                    </div>
                    <div class="form-group col-md-12">
                      <label>viii) Whether the EPC Contractor is a group company</label>
                      <input required="" type="text" class="form-control" name="contract_epc_contractor_group_company" value="<?=$ss_gn_4['contract_epc_contractor_group_company']?>">
                    </div>-->
                  </div>
                </div>
                <div class="form-group col-md-12">
                    
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['contract_non_epc_route'])) { echo  $this->session->flashdata('step4')['contract_non_epc_route']; } ?></span></div>
                    
                  <label>3) Non-EPC Route (EPCM)(Status of Key Contracts for Main Plant Equipment & Works, Status of Key Contracts for Balance of Plant (BOP) packages, Details of Equipments Suppliers for Main Plant Equipment (BTG) ) </label>
                  <textarea required=""  class="form-control" rows="5"  name="contract_non_epc_route"><?=$ss_gn_4['contract_non_epc_route']?></textarea>
                </div>
               <!-- <div class="form-group col-md-12">
                  <div class="sub-part">
                    <h5>4) Project Management Team</h5>
                    <div id="teammember2">
                      <ul>
                      	<?php 
                      	if($ss_gn_4['project_management_team_member']){
                      		$unserialize=unserialize($ss_gn_4['project_management_team_member']);
							foreach($unserialize as $item){ 
                      	?>
                        <li>
                          <div class="teamdiv">
                            <div class="form-group col-md-11">
                              <label>Team Member</label>
                              <input required="" type="text" class="form-control" name="project_management_team_member[]" value="<?=$item?>">
                            </div>
                             <div class="form-group col-md-1"><label>Remove</label><div class="add-feild"><button type="button" id="removemember" class="btn btn-danger addsub">X</button></div></div>
                          </div>
                        </li>
                        <?php }}else{?>
                        	<li>
                          <div class="teamdiv">
                            <div class="form-group col-md-11">
                              <label>Team Member</label>
                              <input required="" type="text" class="form-control" name="project_management_team_member[]" value="">
                            </div>
                             <div class="form-group col-md-1"><label>Remove</label><div class="add-feild"><button type="button" id="removemember2" class="btn btn-danger addsub">X</button></div></div>
                          </div>
                        </li>
                        <?php } ?>
                      </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-12">
                      <label>Add Member (+)</label>
                      <div class="add-feild">
                        <button type="button" id="addteammember2" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-12">
                  <label>5) Owners Engineer(Please give the following details of the owner's Engineers)<br>
                    &raquo;	Name and Background and qualifications<br>
                    &raquo;  Past experience in power projects – number of similar projects done in the past, outside the group's projects </label>
				  <textarea required=""  class="form-control" rows="5" name="owners_engineer"><?=$ss_gn_4['owners_engineer']?></textarea>
                </div>-->
                <div class="form-group col-md-12">
                    
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['cost_overrun'])) { echo  $this->session->flashdata('step4')['cost_overrun']; } ?></span></div>
                    
                  <label>6) Cost Overrun: Please highlight the key clauses with respect to Change Request/LDs/Performance Guarantees and Caps under LDs in the Contacts and explain as to how cost overruns, if any, are taken care </label>
                  <textarea required=""  class="form-control" rows="5" name="cost_overrun"><?=$ss_gn_4['cost_overrun']?></textarea>
                </div>
                  
                <div class="form-group col-md-10">
                    
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['time_schedule'])) { echo  $this->session->flashdata('step4')['time_schedule']; } ?></span></div>
                    
                  <label>7) Time Schedule: Please provide project implementation schedule and current status in terms of the Key Milestones, highlighting the delays if any </label>
                  <textarea required=""  class="form-control" rows="5" name="time_schedule"><?=$ss_gn_4['time_schedule']?></textarea>
                </div>
				<div class ="form-group col-md-2">
				<label>Attachment</label>
					 <div class="attach"> <span class="btn btn-primary btn-file "> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input  type="file" accept="application/pdf, application/zip"  name="time_schedule_file" >
                    </span> 
					<?php if($ss_gn_4['time_schedule_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['time_schedule_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					</div>
				</div>
                <div class="form-group col-md-12">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['om_contract'])) { echo  $this->session->flashdata('step4')['om_contract']; } ?></span></div>
                    
                  <label>8) <strong>O&M Contract</strong>- Please specify the status of the O&M Contract, and if already awarded, give the following details:<br>
                    &raquo;	Experience and past track record of the Contractor<br>
                    &raquo;	List of all the O&M contracts done in India </label>
                  <textarea required=""  class="form-control" rows="5" name="om_contract"><?=$ss_gn_4['om_contract']?></textarea>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="sub-part">
                <h5>16) List of Documents to be submitted CHECK LIST  (YES/NO) </h5>
                <div class="form-group col-md-12">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['DetailedPro'])) { echo  $this->session->flashdata('step4')['DetailedPro']; } ?></span></div>
                    
                  <label>1) Detailed Project Report (DPR) has been attached </label>
                  <div class="">
                    <label for="chkYDetailedPro" class="radio-inline">
                      <input required="" type="radio" id="chkYDetailedPro" name="DetailedPro" value="1" onClick="ShowHideDetailedPro()" <?php if($ss_gn_4['DetailedPro']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNDetailedPro" class="radio-inline">
                      <input required="" type="radio" id="chkNDetailedPro" name="DetailedPro" value="0" onClick="ShowHideDetailedPro()"  <?php if($ss_gn_4['DetailedPro']=="0"){echo "checked";} ?>/>
                      No </label>
					  <div class="attach pull-right" id="dvDetailedPro" style="display: <?php if($ss_gn_4['DetailedPro']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="DetailedPro_file">
                      </span> 
					  <?php if($ss_gn_4['DetailedPro_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['DetailedPro_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                  
                <div class="form-group col-md-12">
                    
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['promoter_company'])) { echo  $this->session->flashdata('step4')['promoter_company']; } ?></span></div>
                    
                  <label>2) Certified Copies of Memorandum and Article of Association of the Promoter Company / Firm as per the Company Act  have been attached</label>
                  <div class="">
                    <label for="chkYcompanyAct" class="radio-inline">
                      <input required="" type="radio" id="chkYcompanyAct" name="promoter_company" value="1" onClick="ShowHidecompanyAct()" <?php if($ss_gn_4['promoter_company']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNcompanyAct" class="radio-inline">
                      <input required="" type="radio" id="chkNcompanyAct" name="promoter_company" value="0" onClick="ShowHidecompanyAct()" <?php if($ss_gn_4['promoter_company']=="0"){echo "checked";} ?>/>
                      No </label>
					   <div class="attach pull-right" id="dvcompanyAct" style="display: <?php if($ss_gn_4['promoter_company']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="promoter_company_file" >
                      </span>
						<?php if($ss_gn_4['promoter_company_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['promoter_company_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                <div class="form-group col-md-12">
                    
                      
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['audited_balance'])) { echo  $this->session->flashdata('step4')['audited_balance']; } ?></span></div>
                    
                  <label>3) Audited Balance Sheets, Profit & Loss Statement, printed Annual reports of the company for the last 5 years have been attached </label>
                  <div class="">
                    <label for = "chkYAudited" class="radio-inline">
                      <input required="" type="radio" id="chkYAudited" name="audited_balance" value="1" onclick="ShowHideAudited()" <?php if($ss_gn_4['audited_balance']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNAudited" class="radio-inline">
                      <input required="" type="radio" id="chkNAudited" name="audited_balance" value="0" onclick="ShowHideAudited()" <?php if($ss_gn_4['audited_balance']=="0"){echo "checked";} ?>/>
                      No </label>
					   <div class="attach pull-right" id="dvAudited" style="display: <?php if($ss_gn_4['audited_balance']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="audited_balance_file" >
                      </span>
						<?php if($ss_gn_4['audited_balance_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['audited_balance_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                  
                <div class="form-group col-md-12">
                    
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['project_allotment'])) { echo  $this->session->flashdata('step4')['project_allotment']; } ?></span></div>
                    
                  <label>4) Project allotment letter has been attached</label>
                  <div class="">
                    <label for="chkYallotment" class="radio-inline">
                      <input required="" type="radio" id ="chkYallotment" name="project_allotment" value="1" onclick="ShowHideallotment()" <?php if($ss_gn_4['project_allotment']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNallotment" class="radio-inline">
                      <input required="" type="radio" id="chkNallotment" name="project_allotment" value="0" onclick="ShowHideallotment()" <?php if($ss_gn_4['project_allotment']=="0"){echo "checked";} ?>/>
                      No </label>
					   <div class="attach pull-right" id="dvAllotment" style="display: <?php if($ss_gn_4['project_allotment']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="project_allotment_file" >
                      </span> 
					  <?php if($ss_gn_4['project_allotment_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['project_allotment_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                  
                <div class="form-group col-md-12">
                    
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['implementation_scheme'])) { echo  $this->session->flashdata('step4')['implementation_scheme']; } ?></span></div>
                    
                  <label>5) MOU signed with State Govt. for implementation of Scheme has been attached</label>
                  <div class="">
                    <label for="chkYStateGovt" class="radio-inline">
                      <input required="" type="radio" id="chkYStateGovt" name="implementation_scheme" value="1" onClick="ShowHideStateGovt()" <?php if($ss_gn_4['implementation_scheme']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNStateGovt" class="radio-inline">
                      <input required="" type="radio" id="chkNStateGovt" name="implementation_scheme" value="0" onClick="ShowHideStateGovt()" <?php if($ss_gn_4['implementation_scheme']=="0"){echo "checked";} ?>/>
                      No </label>
					  <div class="attach pull-right" id="dvStateGovt" style="display: <?php if($ss_gn_4['implementation_scheme']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="implementation_scheme_file" >
                      </span> 
					  <?php if($ss_gn_4['implementation_scheme_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['implementation_scheme_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                  
                <div class="form-group col-md-12">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['undertake_project'])) { echo  $this->session->flashdata('step4')['undertake_project']; } ?></span></div>
                    
                  <label>6) Board’s resolution to undertake the project & borrow loan from REC has been attached</label>
                  <div class="">
                    <label for="chkYundertake" class="radio-inline">
                      <input required="" type="radio" id="chkYundertake" name="undertake_project" value="1" onClick="ShowHideundertake()" <?php if($ss_gn_4['undertake_project']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNundertake" class="radio-inline">
                      <input required="" type="radio" id="chkNundertake" name="undertake_project" value="0" onClick="ShowHideundertake()" <?php if($ss_gn_4['undertake_project']=="0"){echo "checked";} ?>/>
                      No </label>
					  <div class="attach pull-right" id="dvundertake" style="display: <?php if($ss_gn_4['undertake_project']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="undertake_project_file" >
                      </span> 
					  <?php if($ss_gn_4['undertake_project_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['undertake_project_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div> 
                  </div>
                </div>
                <div class="form-group col-md-12">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['geological_study'])) { echo  $this->session->flashdata('step4')['geological_study']; } ?></span></div>
                    
                  <label>7) Geological study, hydrological study, power potential study and compliance of various recommendations thereof have been attached </label>
                  <div class="">
                    <label for="chkYgeological" class="radio-inline">
                      <input required="" type="radio" id="chkYgeological" name="geological_study" value="1" onClick="ShowHideGeological()" <?php if($ss_gn_4['geological_study']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNgeological" class="radio-inline">
                      <input required="" type="radio" id="chkNgeological" name="geological_study" value="0" onClick="ShowHideGeological()" <?php if($ss_gn_4['geological_study']=="0"){echo "checked";} ?>/>
                      No </label>
					   <div class="attach pull-right" id="dvgeological" style="display: <?php if($ss_gn_4['geological_study']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="geological_study_file" >
                      </span> 
					  <?php if($ss_gn_4['geological_study_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['geological_study_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div> 
                  </div>
                </div>
                  
                <div class="form-group col-md-12">
                    
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['EPCcontracts'])) { echo  $this->session->flashdata('step4')['EPCcontracts']; } ?></span></div>
                    
                  <label>8) EPC and O & M contracts alongwith brief write-up indicating the highlights have been attached </label>
                  <div class="">
                    <label for="chkYEPCcontracts"  class="radio-inline">
                      <input required="" type="radio" id="chkYEPCcontracts" name="EPCcontracts"  value="1" onclick="ShowHideEPCcontracts()"  <?php if($ss_gn_4['EPCcontracts']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNEPCcontracts" class="radio-inline">
                      <input required="" type="radio" id="chkNEPCcontracts" name="EPCcontracts"  value="0" onclick="ShowHideEPCcontracts()" <?php if($ss_gn_4['EPCcontracts']=="0"){echo "checked";} ?>/>
                      No </label>
					   <div class="attach pull-right" id="dvEPCcontracts" style="display: <?php if($ss_gn_4['EPCcontracts']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="EPCcontracts_file" >
                      </span> 
					  <?php if($ss_gn_4['EPCcontracts_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['EPCcontracts_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div> 
                  </div>
                </div>
                  
                  
                <div class="form-group col-md-12">
                    
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['machinery'])) { echo  $this->session->flashdata('step4')['machinery']; } ?></span></div>
                    
                  <label>9) Import of equipment/machinery and necessary approvals from the concerned Department(s)/ Ministry(ies), etc. have been attached</label>
                  <div class="">
                    <label for="chkYImpMachinery" class="radio-inline">
                      <input required="" type="radio" id="chkYImpMachinery" name="machinery" value="1" onClick="ShowHideImpMachinery()" <?php if($ss_gn_4['machinery']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNImpMachinery" class="radio-inline">
                      <input required="" type="radio" id="chkNImpMachinery" name="machinery" value="0" onClick="ShowHideImpMachinery()" <?php if($ss_gn_4['machinery']=="0"){echo "checked";} ?>/>
                      No </label>
					    <div class="attach pull-right" id="dvImpMachinery" style="display: <?php if($ss_gn_4['machinery']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="machinery_file" >
                      </span> 
					  <?php if($ss_gn_4['machinery_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['machinery_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                  
                  
                <div class="form-group col-md-12"> 
                    
                     
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['transmission_cost'])) { echo  $this->session->flashdata('step4')['transmission_cost']; } ?></span></div>
                    
                  <label>10) Brief note on estimated transmission cost based on survey and status of work for power evacuation has been attached  </label>
                  <div class="">
                    <label for="chkYTransmission" class="radio-inline">
                      <input required="" type="radio" id="chkYTransmission" name="transmission_cost" value="1" onClick="ShowHideTransmission()"  <?php if($ss_gn_4['transmission_cost']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNTransmission" class="radio-inline">
                      <input required="" type="radio" id="chkNTransmission" name="transmission_cost" value="0" onClick="ShowHideTransmission()" <?php if($ss_gn_4['transmission_cost']=="0"){echo "checked";} ?>/>
                      No </label>
					   <div class="attach pull-right" id="dvTransmission" style="display: <?php if($ss_gn_4['transmission_cost']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="transmission_cost_file" >
                      </span> 
					  <?php if($ss_gn_4['transmission_cost_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['transmission_cost_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                <div class="form-group col-md-12">
                    
                       
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['financial_progress'])) { echo  $this->session->flashdata('step4')['financial_progress']; } ?></span></div>
                    
                  <label>11) Brief note on physical/financial progress of work against already completed works has been attached</label>
                  <div class="">
                    <label for="chkYphysical" class="radio-inline">
                      <input required="" type="radio" id="chkYphysical" name="financial_progress" value="1" onClick="ShowHidePhysical()" <?php if($ss_gn_4['financial_progress']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNphysical" class="radio-inline">
                      <input required="" type="radio" id="chkNphysical" name="financial_progress" value="0" onClick="ShowHidePhysical()" <?php if($ss_gn_4['financial_progress']=="0"){echo "checked";} ?>/>
                      No </label>
					   <div class="attach pull-right" id="dvphysical" style="display: <?php if($ss_gn_4['financial_progress']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="financial_progress_file" >
                      </span> 
					  <?php if($ss_gn_4['financial_progress_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['financial_progress_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                <div class="form-group col-md-12">
                    
                    
                         
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['purchase_agreement'])) { echo  $this->session->flashdata('step4')['purchase_agreement']; } ?></span></div>
                    
                  <label>12) Power Purchase Agreement/Wheeling/Banking Agreement signed with Transmission and / or Distribution Company has been attached</label>
                  <div class="">
                    <label for="chkYPowerAgreement" class="radio-inline">
                      <input required="" type="radio" id="chkYPowerAgreement" name="purchase_agreement" value="1" onClick="ShowHidePowerAgreement()" <?php if($ss_gn_4['purchase_agreement']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNPowerAgreement" class="radio-inline">
                      <input required="" type="radio" id="chkNPowerAgreement"name="purchase_agreement" value="0" onClick="ShowHidePowerAgreement()" <?php if($ss_gn_4['purchase_agreement']=="0"){echo "checked";} ?>/>
                      No </label>
					  <div class="attach pull-right" id="dvPowerAgreement" style="display: <?php if($ss_gn_4['purchase_agreement']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="purchase_agreement_file" >
                      </span> 
					  <?php if($ss_gn_4['purchase_agreement_file']) { ?>
				<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['purchase_agreement_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
                  
                <div class="form-group col-md-12">
                    
                    
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['statutory_clearances'])) { echo  $this->session->flashdata('step4')['statutory_clearances']; } ?></span></div>
                    
                  <label>13) Copies of statutory and non-statuary clearances or Status of Clearances with copies of necessary correspondences etc. have been attached  </label>
                  <div class="">
                    <label for="chkYStatusNecessary" class="radio-inline">
                      <input required="" type="radio" id="chkYStatusNecessary" name="statutory_clearances" value="1" onClick="ShowHideStatusNecessary()" <?php if($ss_gn_4['statutory_clearances']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNStatusNecessary" class="radio-inline">
                      <input required="" type="radio" id="chkNStatusNecessary" name="statutory_clearances" value="0" onClick="ShowHideStatusNecessary()" <?php if($ss_gn_4['statutory_clearances']=="0"){echo "checked";} ?>/>
                      No </label>
					  <div class="attach pull-right" id="dvStatusNecessary" style="display: <?php if($ss_gn_4['statutory_clearances']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="statutory_clearances_file" >
                      </span> 
					  <?php if($ss_gn_4['statutory_clearances_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['statutory_clearances_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
				
				 <div class="form-group col-md-12">
                     
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['statutory_clearances'])) { echo  $this->session->flashdata('step4')['statutory_clearances']; } ?></span></div>
                     
                  <label>14) Proof of completion of Land acquisition have been attached   </label>
                  <div class="">
                    <label for="chkYLandAcquisition" class="radio-inline">
                      <input required="" type="radio" id="chkYLandAcquisition" name="land_acquisition" value="1" onClick="ShowHideLandAcquisition()" <?php if($ss_gn_4['land_acquisition']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNLandAcquisition" class="radio-inline">
                      <input required="" type="radio" id="chkNLandAcquisition" name="land_acquisition" value="0" onClick="ShowHideLandAcquisition()" <?php if($ss_gn_4['land_acquisition']=="0"){echo "checked";} ?>/>
                      No </label>
					  <div class="attach pull-right" id="dvLandAcquisition" style="display: <?php if($ss_gn_4['land_acquisition']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="land_acquisition_file" >
                      </span> 
					  <?php if($ss_gn_4['land_acquisition_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['land_acquisition_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
				
				<div class="form-group col-md-12">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['earlier_loan'])) { echo  $this->session->flashdata('step4')['earlier_loan']; } ?></span></div>
                    
                  <label>15) Details of earlier loan (if any) & their repayment/security details has been attached   </label>
                  <div class="">
                    <label for="chkYEarlierLoan" class="radio-inline">
                      <input required="" type="radio" id="chkYEarlierLoan" name="earlier_loan" value="1" onClick="ShowHideEarlierLoan()" <?php if($ss_gn_4['earlier_loan']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNEarlierLoan" class="radio-inline">
                      <input required="" type="radio" id="chkNEarlierLoan" name="earlier_loan" value="0" onClick="ShowHideEarlierLoan()" <?php if($ss_gn_4['earlier_loan']=="0"){echo "checked";} ?>/>
                      No </label>
					  <div class="attach pull-right" id="dvEarlierLoan" style="display: <?php if($ss_gn_4['earlier_loan']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="earlier_loan_file" >
                      </span> 
					  <?php if($ss_gn_4['earlier_loan_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['earlier_loan_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div>
                  </div>
                </div>
				
				<div class="form-group col-md-12">
                    
                     
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['mobilization'])) { echo  $this->session->flashdata('step4')['mobilization']; } ?></span></div>
                    
                    
                  <label>16) Brief note on promoters’ contribution & its mobilization has been attached    </label>
                  <div class="">
                    <label for="chkYmobilization" class="radio-inline">
                      <input required="" type="radio" id="chkYmobilization" name="mobilization" value="1" onClick="ShowHidemobilization()" <?php if($ss_gn_4['mobilization']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNmobilization" class="radio-inline">
                      <input required="" type="radio" id="chkNmobilization" name="mobilization" value="0" onClick="ShowHidemobilization()" <?php if($ss_gn_4['mobilization']=="0"){echo "checked";} ?>/>
                      No </label>
					  <div class="attach pull-right" id="dvmobilization" style="display: <?php if($ss_gn_4['mobilization']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="mobilization_file" >
                      </span> 
					  <?php if($ss_gn_4['mobilization_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['mobilization_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div> 
                  </div>
                </div>
				
				<div class="form-group col-md-12">
                    
                     <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['relevent_document'])) { echo  $this->session->flashdata('step4')['relevent_document']; } ?></span></div>
                    
                  <label>17) Brief note on the security(ies) proposed to be offered, their present status / relevant documents/proof (if any) has been attached     </label>
                  <div class="">
                    <label for="chkYRelevantDocument" class="radio-inline">
                      <input required="" type="radio" id="chkYRelevantDocument" name="relevent_document" value="1" onClick="ShowHideRelevantDocument()" <?php if($ss_gn_4['relevent_document']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNRelevantDocument" class="radio-inline">
                      <input required="" type="radio" id="chkNRelevantDocument" name="relevent_document" value="0" onClick="ShowHideRelevantDocument()" <?php if($ss_gn_4['relevent_document']=="0"){echo "checked";} ?>/>
                      No </label>
					  <div class="attach pull-right" id="dvRelevantDocument" style="display: <?php if($ss_gn_4['relevent_document']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="relevent_document_file" >
                      </span> 
					  <?php if($ss_gn_4['relevent_document_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['relevent_document_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div> 
                  </div>
                </div>
				
				<div class="form-group col-md-12">
                    
                        <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['environment_aspects'])) { echo  $this->session->flashdata('step4')['environment_aspects']; } ?></span></div>
                    
                  <label>18) Brief note on environment aspects has been attached     </label>
                  <div class="">
                    <label for="chkYEnvironment" class="radio-inline">
                      <input required="" type="radio" id="chkYEnvironment" name="environment_aspects" value="1" onClick="ShowHideEnvironment()" <?php if($ss_gn_4['environment_aspects']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNEnvironment" class="radio-inline">
                      <input required="" type="radio" id="chkNEnvironment" name="environment_aspects" value="0" onClick="ShowHideEnvironment()" <?php if($ss_gn_4['environment_aspects']=="0"){echo "checked";} ?>/>
                      No </label>
					  <div class="attach pull-right" id="dvEnvironment" style="display: <?php if($ss_gn_4['environment_aspects']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="environment_aspects_file" >
                      </span> 
					  <?php if($ss_gn_4['environment_aspects_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['environment_aspects_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div> 
                  </div>
                </div>
				
				<div class="form-group col-md-12">
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['socio_economic'])) { echo  $this->session->flashdata('step4')['socio_economic']; } ?></span></div>
                    
                  <label>19) Brief note on socio-economic benefits from the project has been attached  </label>
                  <div class="">
                    <label for="chkYSocioEconomic" class="radio-inline">
                      <input required="" type="radio" id="chkYSocioEconomic" name="socio_economic" value="1" onClick="ShowHideSocioEconomic()" <?php if($ss_gn_4['socio_economic']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNSocioEconomic" class="radio-inline">
                      <input required="" type="radio" id="chkNSocioEconomic" name="socio_economic" value="0" onClick="ShowHideSocioEconomic()" <?php if($ss_gn_4['socio_economic']=="0"){echo "checked";} ?>/>
                      No </label>
					  <div class="attach pull-right" id="dvSocioEconomic" style="display: <?php if($ss_gn_4['socio_economic']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="socio_economic_file" > 
                      </span> 
					  <?php if($ss_gn_4['socio_economic_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['socio_economic_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div> 
                  </div>
                </div>
				
				<div class="form-group col-md-12">
                    
                    
                      <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['applicable_subsidy'])) { echo  $this->session->flashdata('step4')['applicable_subsidy']; } ?></span></div>
                    
                    
                  <label>20) Brief note on Central/ State Govt. policy and applicable subsidy / incentive for the project has been attached  </label>
                  <div class="">
                    <label for="chkYApplicableSubsidy" class="radio-inline">
                      <input required="" type="radio" id="chkYApplicableSubsidy" name="applicable_subsidy" value="1" onClick="ShowHideApplicableSubsidy()" <?php if($ss_gn_4['applicable_subsidy']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNApplicableSubsidy" class="radio-inline">
                      <input required="" type="radio" id="chkNApplicableSubsidy" name="applicable_subsidy" value="0" onClick="ShowHideApplicableSubsidy()" <?php if($ss_gn_4['applicable_subsidy']=="0"){echo "checked";} ?>/>
                      No </label>
					  <div class="attach pull-right" id="dvApplicableSubsidy" style="display: <?php if($ss_gn_4['applicable_subsidy']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="applicable_subsidy_file" > 
                      </span> 
					  <?php if($ss_gn_4['applicable_subsidy_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['applicable_subsidy_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div> 
                  </div>
                </div>
				
				<div class="form-group col-md-12">
                    
                   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step4')['risk_management'])) { echo  $this->session->flashdata('step4')['risk_management']; } ?></span></div>
                    
                  <label>21) Brief note on Risks & Management perception has been attached  </label>
                  <div class="">
                    <label for="chkYRiskManagement" class="radio-inline">
                      <input required="" type="radio" id="chkYRiskManagement" name="risk_management" value="1" onClick="ShowHideRiskManagement()" <?php if($ss_gn_4['risk_management']=="1"){echo "checked";} ?> />
                      Yes </label>
                    <label for="chkNRiskManagement" class="radio-inline">
                      <input required="" type="radio" id="chkNRiskManagement" name="risk_management" value="0" onClick="ShowHideRiskManagement()" <?php if($ss_gn_4['risk_management']=="0"){echo "checked";} ?>/>
                      No </label>
					  <div class="attach pull-right" id="dvRiskManagement" style="display: <?php if($ss_gn_4['risk_management']=="1"){echo "block";}else{ echo"none"; } ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="risk_management_file" > 
                      </span> 
					  <?php if($ss_gn_4['risk_management_file']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/forms/<?php print_r( $ss_gn_4['risk_management_file']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
					<?php } ?>
					  </div> 
                  </div>
                </div>
               
           
              </div>
            </div>
			 
           
            <div class="col-md-12 text-right">
			<button class="btn btn-default prevBtn pull-left" type="button">Previous</button>
              <button type="submit" class="btn btn-primary">Save & Next </button>
            </div>
            </form>
          </div>
          
          <div class="row setup-content" id="ssgn_step-5">
          	<form role="form" action="<?php echo base_url(); ?>form1/process_ss_generation_5" method="post" enctype="multipart/form-data">
            <div class="col-md-12 generalcontain">
              <h3><u>DECLARATION FORM</u></h3>
              <p>I/we confirm/affirm and undertake as below: -</p>
              <ul class="geninstruction">
                <li>That no insolvency proceedings initiated against me/us nor have I/we ever been adjudicated insolvent. Further, that no litigation is pending against the securities proposed to be offered in shape of movable or immovable, in any court in India or outside India</li>
                <li>That neither I have been defaulter of any bank or financial institution nor any accounts has been written off by any bank/financial institution and that my name doesn't appear in RBI caution list/defaulter list etc</li>
                <li>I am /we are not  closely related to any of the Directors of REC</li>
                <li>That I /we have read the application form and am/are aware of all the term and conditions of availing finance from REC. I also authorize REC to exchange, share, part with all the information relating to me/our loan details and repayment history information to other bank/financial institution/credit bureaus/agencies as may be required and shall not hold the REC for use of this information.</li>
                <li>I/we shall furnish any information required by REC to process my application for loan and also to be bound by the rules or by the revised additional terms and conditions which may at any time hereafter be made while the loan obtained by me is still outstanding</li>
                <li>And the information given in the application is correct, complete and up to date in all respects and I/we have not withheld any information.</li>
                <li>We undertake that any photocopied document submitted along with loan application format or during the appraisal process or any time thereafter is exact copy of original document. </li>
                <li>Any material discrepancy/deviation subsequently found in any particulars herein furnished would entitle REC to treat the loan application as defunct, in which case the processing fees already paid would be forfeited and  a fresh application would be required to be filed to seek financial assistance from REC</li>
                <li>All information pertaining to borrower and all promoters including information contained in Loan application form including Information memorandum prepared by Lead Bank/FI or syndicator or company or any annexure thereto are true, correct, updated, accurate and is neither misleading nor qualified. We undertake that all information pertaining to promoters has been obtained from authorized representatives of promoters</li>
                <li>We understand that information furnished by REC towards project, borrower or promoters forms the basis of appraisal. We undertake to inform REC of any up-dations on all/any information furnished to REC for appraisal and undertake to notify REC in writing and in a prompt manner of any of the fact, matter or circumstance (whether existing on or before the submission of Loan application form or arising afterwards) which would could reasonably be expected to cause any of the information given to become, in any manner untrue, inaccurate, in complete or misleading.</li>
                <li>We undertake that any change in promoter group structure will be immediately   communicated to REC</li>
                <li>The information given herein before and the Statements and other papers enclosed are to the best of our knowledge and belief, true and correct in all particulars.</li>
                <li>No borrowing arrangements except as indicated above are made.</li>
                <li>No legal action is being taken against me/us.</li>
                <li>I/We shall furnish all other information that may be required by you in connection with the application.</li>
                <li>REC or its nominees or any other agency authorized by REC may at any time inspect/ verify our assets, books of accounts, etc., in my / our factory & business premises.</li>
                <li>We acknowledge and accept that mere submission of above documents alone will not entitle an applicant for registration and sanction of loan.</li>
                <li>We accept that REC is having its right to reject any loan application at any stage</li>
              </ul>
			
			  
			   <div class="form-group">
                <div class="col-md-4">
                
                    <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step5')['place'])) { echo  $this->session->flashdata('step5')['place']; } ?></span></div>
                    
                    <label>Place </label>
                      <input  class="form-control" required="" type="text"  name="place" placeholder="Place" value="<?php echo $ss_gn_4['place']?>" />
                     
                </div>
				<div class="col-md-4">
                
                       <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step5')['date'])) { echo  $this->session->flashdata('step5')['date']; } ?></span></div>
                    
                    <label>Date </label>
                      <input  class="form-control" required="" type="text" name="date" id="dp32"  placeholder="Date" value="<?php echo $ss_gn_4['date']?>" />
                     
                </div>
				
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="checkbox">
                    <label>
                      <input required="" value="agree" name="agree" type="checkbox" <?php if($ss_gn_4['agree']){ echo "checked"; }?> />
                      I agree with the terms above. </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 text-right">
				<button class="btn btn-default prevBtn pull-left" type="button">Previous</button>
              <button type="submit" class="btn btn-primary">Save & Next</button>
            </div>
           </form>
          </div>
        </div>
      </div>
    </div>
   
  </section>
<?php $this->load->view('includes/footer'); ?>
<script>
		//generation
		
	$(document).ready(function(){
		$('.cost_idc').keyup(function(){
			var project_mw_g = $('.project_mw_g').val();
			var costIDC = $(this).val();
			var IDCInterest = $('.idc_intrst').val();
			var totalIDC = (+costIDC) + (+IDCInterest);
			var costMW	= (+totalIDC) / (+project_mw_g);
			
			$('.project_cost_idc').val(totalIDC);
			$('.costMW').val(costMW);
			
			$('.project_cost_idc1').val(totalIDC);
			$('.costMW1').val(costMW);
			
		});
		
		
		$('.cost_idc2').keyup(function(){
			
			var project_mw_g = $('.project_mw_g').val();
			var costIDC = $(this).val();
			var IDCInterest = $('.idc_intrst2').val();
			var totalIDC = (+costIDC) + (+IDCInterest);
			var costMW	= (+totalIDC) / (+project_mw_g);
			$('.project_cost_idc2').val(totalIDC);
			$('.costMW2').val(costMW);
			
			$('.project_cost_idc12').val(totalIDC);
			$('.costMW12').val(costMW);
			
		});
		
		$('.project_mw_g').keyup(function(){
			var project_mw_g = $(this).val();
			var costIDC = $('.cost_idc').val();
			var IDCInterest = $('.idc_intrst').val();
			var totalIDC = (+costIDC) + (+IDCInterest);
			var costMW	= (+totalIDC) / (+project_mw_g);
			$('.project_cost_idc').val(totalIDC);
			$('.costMW').val(costMW);
			
			$('.project_cost_idc1').val(totalIDC);
			$('.costMW1').val(costMW);
			
		});
		
		$('.project_mw_g2').keyup(function(){
			var project_mw_g = $(this).val();
			var costIDC = $('.cost_idc2').val();
			var IDCInterest = $('.idc_intrst2').val();
			var totalIDC = (+costIDC) + (+IDCInterest);
			var costMW	= (+totalIDC) / (+project_mw_g);
			$('.project_cost_idc2').val(totalIDC);
			$('.costMW2').val(costMW);
			
			$('.project_cost_idc12').val(totalIDC);
			$('.costMW12').val(costMW);
			
		});
		
		$('.idc_intrst').keyup(function(){
			var project_mw_g = $('.project_mw_g').val();
			var IDCInterest = $(this).val();
			var costIDC = $('.cost_idc').val();
			var totalIDC = (+costIDC) + (+IDCInterest);
			var costMW	= (+totalIDC) / (+project_mw_g);
			
			$('.project_cost_idc').val(totalIDC);
			$('.costMW').val(costMW);
			
			$('.project_cost_idc1').val(totalIDC);
			$('.costMW1').val(costMW);
		});
		
		$('.idc_intrst2').keyup(function(){
			var project_mw_g = $('.project_mw_g2').val();
			var IDCInterest = $(this).val();
			var costIDC = $('.cost_idc2').val();
			var totalIDC = (+costIDC) + (+IDCInterest);
			var costMW	= (+totalIDC) / (+project_mw_g);
			
			$('.project_cost_idc2').val(totalIDC);
			$('.costMW2').val(costMW);
			
			$('.project_cost_idc12').val(totalIDC);
			$('.costMW12').val(costMW);
		});
		
		
		
		
		$('.debt_percent2').keyup(function(){
			var debtPer = $(this).val();
			var project_cost_idc =  $('.project_cost_idc2').val();
			var totalDebt	= (+debtPer) / (+project_cost_idc);
			var num = totalDebt.toPrecision(2);
			$('.debtAmnt').val(num);
			$('.debtAmnt1').val(num);
		});
		//generation------------
		$('.debt_percent').keyup(function(){
			var debtPer = $(this).val();
			var project_cost_idc =  $('.project_cost_idc').val();
			var totalDebt	= (+debtPer) * (+project_cost_idc) / 100;
			var num = totalDebt.toPrecision(2);
			$('.debtAmnt').val(num);
			$('.debtAmnt1').val(num);
		});
		//generation------------
		$('.equity_percent').keyup(function(){
			var debtPer = $(this).val();
			var project_cost_idc =  $('.project_cost_idc').val();
			var totalDebt	= (+debtPer) * (+project_cost_idc) / 100;
			var num = totalDebt.toPrecision(2);
			$('.equityAmnt').val(num);
			$('.equityAmnt1').val(num);
		});
		
		
		<?php if($this->uri->segment(3)=='statesectorthings'){?>
			var td_steps = '<?php echo $this->uri->segment(4);?>';
			
				gnids = 'state-1';
				gnidh1 = 'state-2';
				
				if(td_steps=='step2'){
				gnids = 'state-2';
				gnidh1 = 'state-1';
				
			}
			
			$(".mainselection").toggle();
			$(".statesectorthings").toggle();
			$(".hideinstruction").toggle();
			//$(".gn_steps a").attr('disabled','disabled');
			$(".state_sector_1").attr('class','btn btn-default btn-circle');
			$(".state_sector_2").attr('class','btn btn-circle btn-primary');
			$("#"+gnids).toggle();
			$("#"+gnidh1).hide();
        
		<?php } ?>
		
		<?php if($this->uri->segment(3)=='gn'){?>
			var gn_steps = '<?php echo $this->uri->segment(4);?>';
			
				gnids = 'step-1';
				gnidh1 = 'step-2';
				gnidh2 = 'step-3';
				gnidh3 = 'step-4';
				gnidh4 = 'step-5';
				
				
				
			if(gn_steps=='step2'){
				gnids = 'step-2';
				gnidh1 = 'step-1';
				gnidh2 = 'step-3';
				gnidh3 = 'step-4';
				gnidh4 = 'step-5';
			}
			
			if(gn_steps=='step3'){
				gnids = 'step-3';
				gnidh1 = 'step-1';
				gnidh2 = 'step-2';
				gnidh3 = 'step-4';
				gnidh4 = 'step-5';
			}
			
			if(gn_steps=='step4'){
				gnids = 'step-4';
				gnidh1 = 'step-1';
				gnidh2 = 'step-3';
				gnidh3 = 'step-2';
				gnidh4 = 'step-5';
			}
			
			if(gn_steps=='step5'){
				gnids = 'step-5';
				gnidh1 = 'step-1';
				gnidh2 = 'step-3';
				gnidh3 = 'step-4';
				gnidh4 = 'step-2';
			}
		
			$(".mainselection").toggle();
			$(".generationthings").toggle();
			$(".hideinstruction").toggle();
			//$(".gn_steps a").attr('disabled','disabled');
			$(".gn_steps a").attr('class','btn btn-default btn-circle');
			$(".gn_"+gn_steps+" a").attr('class','btn btn-circle btn-primary');
			$("#"+gnids).toggle();
			$("#"+gnidh1).hide();
			$("#"+gnidh2).hide();
			$("#"+gnidh3).hide();
			$("#"+gnidh4).hide();
			$("#"+gnidh4).hide();
			
			
		
		<?php }?>	
		
		
		// renewal
		
		$('.cost_idc1').keyup(function(){
		
			var project_mw1 = $('.project_mw').val();
			var costIDC = $(this).val();
			var IDCInterest = $('.idc_intrst1').val();
			var totalIDC = (+costIDC) + (+IDCInterest);
			var costMW	= (+totalIDC) / (+project_mw1);
			$('.project_cost_idc_debt').val(totalIDC);
			$('.costMW1').val(costMW);
			
			$('.project_cost_idc11').val(totalIDC);
			$('.costMW11').val(costMW);
			
		});
		
			$('.project_mw').keyup(function(){
			var project_mw1 = $(this).val();
			var costIDC = $('.cost_idc1').val();
			var IDCInterest = $('.idc_intrst1').val();
			var totalIDC = (+costIDC) + (+IDCInterest);
			var costMW	= (+totalIDC) / (+project_mw1);
			$('.project_cost_idc_debt').val(totalIDC);
			$('.costMW1').val(costMW);
			
			$('.project_cost_idc11').val(totalIDC);
			$('.costMW11').val(costMW);
			
		});
		
		
		
		$('.idc_intrst1').keyup(function(){
			var project_mw = $('.project_mw').val();
			var costIDC = $(this).val();
			var IDCInterest = $('.cost_idc1').val();
			var totalIDC = (+costIDC) + (+IDCInterest);
			var costMW	= (+totalIDC) / (+project_mw);
			$('.project_cost_idc_debt').val(totalIDC);
			$('.costMW1').val(costMW);
			
			$('.project_cost_idc11').val(totalIDC);
			$('.costMW11').val(costMW);
		});
		//renewable--------------
		$('.debt_percent1').keyup(function(){
			var project_cost_idc1 = $('.project_cost_idc_debt').val();
			
			var debtPer = $(this).val();
			var totalDebt	= (+debtPer) * (+project_cost_idc1) / 100;
			
			$('.debtAmnt1').val(totalDebt);
			$('.debtAmnt11').val(totalDebt);
		});
		//renewable--------------
		$('.equity_percent1').keyup(function(){
			var project_cost_idc1 = $('.project_cost_idc_debt').val();
			
			var eqtyPer = $(this).val();
			var totalDebt	= (+eqtyPer) * (+project_cost_idc1) / 100;
			
			$('.equityAmnt1').val(totalDebt);
			$('.equityAmnt11').val(totalDebt);
		});
		//State sector Gen----------
		$('.equity_percent2').keyup(function(){
			var project_cost_idc2 = $('.project_cost_idc2').val();
			
			var eqtyPer = $(this).val();
			var totalDebt	= (+eqtyPer) * (+project_cost_idc2) / 100;
			
			$('.equityAmnt2').val(totalDebt);
			$('.equityAmnt12').val(totalDebt);
		});
		//State sector Gen----------
		$('.debt_percent2').keyup(function(){
			var project_cost_idc2 = $('.project_cost_idc2').val();
			
			var debtPer = $(this).val();
			var totalDebt	= (+debtPer) * (+project_cost_idc2) / 100;
			
			$('.debtAmnt2').val(totalDebt);
			$('.debtAmnt12').val(totalDebt);
		});
		
		//State sector
		
	
		$('.state_project_cost_IDC').keyup(function(){
			var State_project_cost_IDC = $(this).val();
			var state_IDC_lakhs = $('.state_IDC_lakhs').val();
			var totalIDC = (+State_project_cost_IDC) + (+state_IDC_lakhs);
			//alert(totalIDC);
			$('.state_total_projects').val(totalIDC);
			
			
			$('.state_total_projects1').val(totalIDC);
			
			
		});
		
		$('.state_IDC_lakhs').keyup(function(){
			var state_IDC_lakhs = $(this).val();
			var State_project_cost_IDC = $('.state_project_cost_IDC').val();
			var totalIDC =  (+state_IDC_lakhs) + (+State_project_cost_IDC);
		
			
			$('.state_total_projects').val(totalIDC);
			
			
			$('.state_total_projects1').val(totalIDC);
			
			
		});
		
		
		$('.state_loan_amount').keyup(function(){
			var state_loan_amount = $(this).val();
			var state_loan_amount_req = $('.state_loan_amount_req').val();
			var totalIDC =  (+state_loan_amount) + (+state_loan_amount_req);
				
			$('.state_total_loan1').val(totalIDC);
			$('.state_total_loan').val(totalIDC);
			
			
		});
		
		$('.state_loan_amount_req').keyup(function(){
			var state_loan_amount_req = $(this).val();
			var state_loan_amount = $('.state_loan_amount').val();
			var totalIDC =  (+state_loan_amount) + (+state_loan_amount_req);
					
			$('.state_total_loan').val(totalIDC);
			$('.state_total_loan1').val(totalIDC);
			
			
		});
		
		$('.equity_contribution').keyup(function(){
			var equity_contribution = $(this).val();
			var state_total_loan = $('.state_total_loan').val();
			var totalIDC = ((+state_total_loan) / ((+state_total_loan) + (+equity_contribution))) * 100;
			var totalIDC1 = ((+equity_contribution) / ((+state_total_loan) + (+equity_contribution))) * 100;
			var tot = totalIDC +" : "+ totalIDC1;
			if(isNaN(tot)){
				$('.equity_ratio').val(tot);
				$('.equity_ratio1').val(tot);
			 }
			
		}); 
		
		$('.state_loan_amount_req').keyup(function(){
			var state_total_loan = $('.state_total_loan').val();
			var equity_contribution = $('.equity_contribution').val();
			var totalIDC =  ((+state_total_loan) / ((+state_total_loan) + (+equity_contribution))) * 100 ;
			var totalIDC1 = ((+equity_contribution) / ((+state_total_loan) + (+equity_contribution))) * 100;
			 var tot = totalIDC +" : "+ totalIDC1;
			 if(isNaN(tot)){
				$('.equity_ratio').val(tot);
				$('.equity_ratio1').val(tot);
			 }
			
		});
		
		$('.state_loan_amount').keyup(function(){
			var state_total_loan = $('.state_total_loan').val();
			var equity_contribution = $('.equity_contribution').val();
			var totalIDC =  ((+state_total_loan) / ((+state_total_loan) + (+equity_contribution))) * 100 ;
			var totalIDC1 = ((+equity_contribution) / ((+state_total_loan) + (+equity_contribution))) * 100 ;
			 var tot = totalIDC +" : "+ totalIDC1;
			 if(isNaN(tot)){
				$('.equity_ratio').val(tot);
				$('.equity_ratio1').val(tot);
			 }
			
		});
		
		$('.hard_cost1').keyup(function(){
			var hard_cost = $(this).val();
			var soft_cost = $('.soft_cost1').val();
			var totalIDC = ((+hard_cost) / ((+hard_cost) + (+soft_cost))) * 100 ;
			var num = totalIDC.toPrecision(2);
				
				$('.hardsoftcost').val(num);
		});
		
		
		
		$('.soft_cost1').keyup(function(){
			var soft_cost = $(this).val();
			var hard_cost = $('.hard_cost1').val();
			var totalIDC = ((+soft_cost) / ((+hard_cost) + (+soft_cost))) * 100 ;
			var num = totalIDC.toPrecision(2);
				
				$('.hardsoftcost').val(num);
			
		});
		
		$('.soft_cost1').keyup(function(){
			var soft_cost = $(this).val();
			var hard_cost = $('.hard_cost1').val();
			var totalIDC = ((+hard_cost) / ((+hard_cost) + (+soft_cost))) * 100 ;
			var num = totalIDC.toPrecision(2);
				
				$('.hardsoftcost1').val(num);
			
		});
		
		$('.hard_cost1').keyup(function(){
			var hard_cost = $(this).val();
			var soft_cost = $('.soft_cost1').val();
			var totalIDC = ((+soft_cost) / ((+hard_cost) + (+soft_cost))) * 100 ;
			var num = totalIDC.toPrecision(2);
				
				$('.hardsoftcost1').val(num);
		});
		
		//-----T&D------
		$('.grant').keyup(function(){
			var grant  =  $(this).val();
			var equity_contribution = $('.equity_contribution').val();
			var state_total_loan = $('.state_total_loan').val();
			var state_total_projects = $('.state_total_projects').val();
			var totl = (+equity_contribution) + (+state_total_loan) + (+grant);
			if(state_total_projects == totl){
				 $('#sub').removeAttr('disabled', 'disabled');
				 var msg = "";
				 $('#msg').html(msg);
			}else{
				 $('#sub').attr('disabled', 'disabled');
				 var msg = "Incorrect Value of A5 A6 A9";
				 $('#msg').html(msg);
			}
		});
		
		$('.equity_contribution').keyup(function(){
			var equity_contribution  =  $(this).val();
			var grant = $('.grant').val();
			var state_total_loan = $('.state_total_loan').val();
			var state_total_projects = $('.state_total_projects').val();
			var totl = (+equity_contribution) + (+state_total_loan) + (+grant);
			if(state_total_projects == totl){
				 $('#sub').removeAttr('disabled', 'disabled');
				 var msg = "";
				 $('#msg').html(msg);
			}else{
				 $('#sub').attr('disabled', 'disabled');
				 var msg = "Incorrect Value of A5 A6 A9";
				 $('#msg').html(msg);
			}
		});
		
		$('.state_total_loan').keyup(function(){
			var state_total_loan  =  $(this).val();
			var equity_contribution = $('.equity_contribution').val();
			var grant = $('.grant').val();
			var state_total_projects = $('.state_total_projects').val();
			var totl = (+equity_contribution) + (+state_total_loan) + (+grant);
			if(state_total_projects == totl){
				 $('#sub').removeAttr('disabled', 'disabled');
				 var msg = "";
				 $('#msg').html(msg);
			}else{
				 $('#sub').attr('disabled', 'disabled');
				 var msg = "Incorrect Value of A5 A6 A9";
				 $('#msg').html(msg);
			}
		});
		
		$('.state_total_projects').keyup(function(){
			var state_total_projects  =  $(this).val();
			var equity_contribution = $('.equity_contribution').val();
			var state_total_loan = $('.state_total_loan').val();
			var grant = $('.grant').val();
			var totl = (+equity_contribution) + (+state_total_loan) + (+grant);
			if(state_total_projects == totl){
				 $('#sub').removeAttr('disabled', 'disabled');
				 var msg = "";
				 $('#msg').html(msg);
			}else{
				 $('#sub').attr('disabled', 'disabled');
				 var msg = "Incorrect Value of A5 A6 A9";
				 $('#msg').html(msg);
			}
		});
		
		$('.hard_cost1').keyup(function(){
			var hard_cost = $(this).val();
			var soft_cost = $('.soft_cost1').val();
			var state_total_projects = $('.state_total_projects').val();
			var to = (+hard_cost) + (+soft_cost);
			
			if(state_total_projects == to){
				 $('#sub').removeAttr('disabled', 'disabled');
				 var msg = "";
				 $('#msg2').html(msg);
			}else{
				 $('#sub').attr('disabled', 'disabled');
				 var msg = "Incorrect Value of A10 A11";
				 $('#msg2').html(msg);
			}	 
		});
		
		$('.soft_cost1').keyup(function(){
			var soft_cost = $(this).val();
			var hard_cost = $('.hard_cost1').val();
			var state_total_projects = $('.state_total_projects').val();
			var to = (+hard_cost) + (+soft_cost);
			
			if(state_total_projects == to){
				 $('#sub').removeAttr('disabled', 'disabled');
				 var msg = "";
				 $('#msg2').html(msg);
			}else{
				 $('#sub').attr('disabled', 'disabled');
				 var msg = "Incorrect Value of A10 A11";
				 $('#msg2').html(msg);
			}	 
		});
		
		 
		
		<?php if($this->uri->segment(3)=='rn'){?>
			var rn_steps = '<?php echo $this->uri->segment(4);?>';
			
				rnids = 'renew-1';
				rnidh1 = 'renew-2';
				rnidh2 = 'renew-3';
				rnidh3 = 'renew-4';
				rnidh4 = 'renew-5';
				rnidh5 = 'renew-6';
				
				
			if(rn_steps=='renew2'){
				rnids = 'renew-2';
				rnidh1 = 'renew-1';
				rnidh2 = 'renew-3';
				rnidh3 = 'renew-4';
				rnidh4 = 'renew-5';
				rnidh5 = 'renew-6';
			}
			
			if(rn_steps=='renew3'){
				rnids = 'renew-3';
				rnidh1 = 'renew-1';
				rnidh2 = 'renew-2';
				rnidh3 = 'renew-4';
				rnidh4 = 'renew-5';
				rnidh5 = 'renew-6';
			}
			
			if(rn_steps=='renew4'){
				rnids = 'renew-4';
				rnidh1 = 'renew-1';
				rnidh2 = 'renew-3';
				rnidh3 = 'renew-2';
				rnidh4 = 'renew-5';
				rnidh5 = 'renew-6';
			}
			
			if(rn_steps=='renew5'){
				rnids = 'renew-5';
				rnidh1 = 'renew-1';
				rnidh2 = 'renew-3';
				rnidh3 = 'renew-4';
				rnidh4 = 'renew-2';
				rnidh5 = 'renew-6';
			}
			
			if(rn_steps=='renew6'){
				rnids = 'renew-6';
				rnidh1 = 'renew-1';
				rnidh2 = 'renew-3';
				rnidh3 = 'renew-4';
				rnidh4 = 'renew-2';
				rnidh5 = 'renew-5';
			}
		
			$(".mainselection").toggle();
			$(".renewalthings").toggle();
			$(".hideinstruction").toggle();
			//$(".rn_renew a").attr('disabled','disabled');
			$(".rn_renew a").attr('class','btn btn-default btn-circle');
			$(".rn_"+rn_steps+" a").attr('class','btn btn-circle btn-primary');
			$("#"+rnids).toggle();
			$("#"+rnidh1).hide();
			$("#"+rnidh2).hide();
			$("#"+rnidh3).hide();
			$("#"+rnidh4).hide();
			$("#"+rnidh5).hide();
			
		
		<?php }?>	
		
		<?php if($this->uri->segment(3)=='ss_gn'){?>
			var ss_steps = '<?php echo $this->uri->segment(4);?>';
			
				ssids  = 'step-1';
				ssidh1 = 'ssgn_step-2';
				ssidh2 = 'ssgn_step-3';
				ssidh3 = 'ssgn_step-4';
				ssidh4 = 'ssgn_step-5';
				
				
				
			if(ss_steps=='step-2'){
				ssids  = 'ssgn_step-2';
				ssidh1 = 'ssgn_step-1';
				ssidh2 = 'ssgn_step-3';
				ssidh3 = 'ssgn_step-4';
				ssidh4 = 'ssgn_step-5';
				
			}
			
			if(ss_steps=='step-3'){
				ssids  = 'ssgn_step-3';
				ssidh1 = 'ssgn_step-1';
				ssidh2 = 'ssgn_step-2';
				ssidh3 = 'ssgn_step-4';
				ssidh4 = 'ssgn_step-5';
				
			}
			
			if(ss_steps=='step-4'){
				ssids  = 'ssgn_step-4';
				ssidh1 = 'ssgn_step-1';
				ssidh2 = 'ssgn_step-3';
				ssidh3 = 'ssgn_step-2';
				ssidh4 = 'ssgn_step-5';
				
			}
			
			if(ss_steps=='step-5'){
				ssids  = 'ssgn_step-5';
				ssidh1 = 'ssgn_step-1';
				ssidh2 = 'ssgn_step-2';
				ssidh3 = 'ssgn_step-3';
				ssidh4 = 'ssgn_step-4';
				
			}
			
			
			$(".mainselection").toggle();
			$(".statesector1things").toggle();
			$(".hideinstruction").toggle();
			//$(".ssgn_steps a").attr('disabled','disabled');
			$(".ssgn_steps a").attr('class','btn btn-default btn-circle');
			$(".ssgn_"+ss_steps+" a").attr('class','btn btn-circle btn-primary');
			$("#"+ssids).toggle();
			$("#"+ssidh1).hide();
			$("#"+ssidh2).hide();
			$("#"+ssidh3).hide();
			$("#"+ssidh4).hide();			
		
		<?php }?>
	});
	$(document).ready(function(){
		$('.deleteData').on('click',function(){
			var id = $(this).data('id');
			$.ajax({url: "<?php echo base_url(); ?>form1/deletesanction/"+id, success: function(result){
       		 	$("#div1").html(result);
    		}});
		});
	});
	
	$(document).ready(function(){
		$('.ss_deleteData').on('click',function(){
			var id = $(this).data('id');
			$.ajax({url: "<?php echo base_url(); ?>form1/ss_deletesanction/"+id, success: function(result){
       		 	$("#div1").html(result);
    		}});
		});
	});
	
	$(document).ready(function(){
		$('.deleteData_gn').on('click',function(){
			var id = $(this).data('id');
			$.ajax({url: "<?php echo base_url(); ?>form1/deletesanction_gn/"+id, success: function(result){
       		 	$("#div1").html(result);
    		}});
		});
	});
	
	$(document).ready(function(){
		$('.deleteData_gn2').on('click',function(){
			var id = $(this).data('id');
			$.ajax({url: "<?php echo base_url(); ?>form1/deletesanction_gn2/"+id, success: function(result){
       		 	$("#div1").html(result);
    		}});
		});
	});
	function ShowHidePowersale1() {
        var chkPowersale1 = document.getElementById("chkPowersale1");
        var dvPowersale1 = document.getElementById("dvPowersale1");
        dvPowersale1.style.display = chkPowersale1.checked ? "block" : "none";
    }

    $(document).ready(function(){
        
        <?php if(!empty($gn_a['project_name'])){ ?>
            if (!$('#idSon').hasClass('disabled')) {
            $('#idSon').addClass('btn-success');
            }
        <?php } ?>
        
         <?php if(!empty($gn_2['cost_comparison_bench_marking'])){ ?>
          
            if (!$('#idSon1').hasClass('disabled')) {
            $('#idSon1').addClass('btn-success');
            $('#idSon1').removeAttr('disabled');
            }
        <?php } ?>
        
        <?php if(!empty($gn_3['location_geological_coord'])){ ?>
            if (!$('#idSon2').hasClass('disabled')) {
            $('#idSon2').addClass('btn-success');
            $('#idSon2').removeAttr('disabled');
            }
        <?php } ?>
        
        <?php if(!empty($gn_4['contract_project1'])){ ?>
            if (!$('#idSon3').hasClass('disabled')) {
            $('#idSon3').addClass('btn-success');
            $('#idSon3').removeAttr('disabled');
            }
        <?php } ?>
        
        <?php if(!empty($gn_a['place'])){ ?>
            if (!$('#idSon4').hasClass('disabled')) {
            $('#idSon4').addClass('btn-success');
            $('#idSon4').removeAttr('disabled');
            }
        <?php } ?>
        
         <?php if(!empty($rn_1['rn_aproject_name'])){ ?>
            if (!$('#idRen').hasClass('disabled')) {
            $('#idRen').addClass('btn-success');
            $('#idRen').removeAttr('disabled');
            }
        <?php } ?>
        
        <?php if(!empty($rn_2['lead_bank'])){ ?>
            if (!$('#idRen1').hasClass('disabled')) {
            $('#idRen1').addClass('btn-success');
            $('#idRen1').removeAttr('disabled');
            }
        <?php } ?>
        
        <?php if(!empty($rn_3['curnt_user_of_land'])){ ?>
            if (!$('#idRen2').hasClass('disabled')) {
            $('#idRen2').addClass('btn-success');
            $('#idRen2').removeAttr('disabled');
            }
        <?php } ?>
        
        
        <?php if(!empty($rn_4['description'])){ ?>
         if (!$('#idRen3').hasClass('disabled')) {
            $('#idRen3').addClass('btn-success');
            $('#idRen3').removeAttr('disabled');
            }
        <?php }elseif(!empty($rn_4['avg_wind_speed'])){ ?>
         if (!$('#idRen3').hasClass('disabled')) {
            $('#idRen3').addClass('btn-success');
            $('#idRen3').removeAttr('disabled');
            }
        <?php }elseif(!empty($rn_4['chkAvailability_yes'])){?>
         if (!$('#idRen3').hasClass('disabled')) {
            $('#idRen3').addClass('btn-success');
            $('#idRen3').removeAttr('disabled');
            }
        <?php }elseif(!empty($rn_4['land_for_enrgy_plant_ha'])){?>
         if (!$('#idRen3').hasClass('disabled')) {
            $('#idRen3').addClass('btn-success');
            $('#idRen3').removeAttr('disabled');
            }
        <?php }elseif(!empty($rn_4['isolation_lvl_per_day'])){?>
         if (!$('#idRen3').hasClass('disabled')) {
            $('#idRen3').addClass('btn-success');
            $('#idRen3').removeAttr('disabled');
            }
        <?php } ?>
        
        
        
         <?php if(!empty($rn_5['cntrct_prj_dvlpmnt'])){ ?>
            if (!$('#idRen4').hasClass('disabled')) {
            $('#idRen4').addClass('btn-success');
            $('#idRen4').removeAttr('disabled');
            }
        <?php } ?>
         <?php if(!empty($rn_1['place'])){ ?>
            if (!$('#idRen5').hasClass('disabled')) {
            $('#idRen5').addClass('btn-success');
            $('#idRen5').removeAttr('disabled');
            }
        <?php } ?>
        
        
        
        <?php if(!empty($state_sector['borrower_name'])){ ?>
            if (!$('#idTd').hasClass('disabled')) {
            $('#idTd').addClass('btn-success');
            $('#idTd').removeAttr('disabled');
            }
        <?php } ?>
         <?php if(!empty($state_sector['place'])){ ?>
            if (!$('#idTd1').hasClass('disabled')) {
            $('#idTd1').addClass('btn-success');
            $('#idTd1').removeAttr('disabled');
            }
        <?php } ?>
        
        
        
         <?php if(!empty($ss_gn_a['project_name'])){ ?>
            if (!$('#idssg1').hasClass('disabled')) {
            $('#idssg1').addClass('btn-success');
            $('#idssg1').removeAttr('disabled');
            }
        <?php } ?>
         <?php if(!empty($ss_gn_2['name_of_lead_bank'])){ ?>
            if (!$('#idssg2').hasClass('disabled')) {
            $('#idssg2').addClass('btn-success');
            $('#idssg2').removeAttr('disabled');
            }
        <?php } ?>
         <?php if(!empty($ss_gn_3['location_geological_coord'])){ ?>
            if (!$('#idssg3').hasClass('disabled')) {
            $('#idssg3').addClass('btn-success');
            $('#idssg3').removeAttr('disabled');
            }
        <?php } ?>
         <?php if(!empty($ss_gn_4['contract_project1'])){ ?>
            if (!$('#idssg4').hasClass('disabled')) {
            $('#idssg4').addClass('btn-success');
            $('#idssg4').removeAttr('disabled');
            }
        <?php } ?> 
        <?php if(!empty($ss_gn_4['place'])){ ?>
            if (!$('#idssg5').hasClass('disabled')) {
            $('#idssg5').addClass('btn-success');
            $('#idssg5').removeAttr('disabled');
            }
        <?php } ?>
         
        
    });
</script>

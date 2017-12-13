<?php $this->load->view('includes/header'); ?>

<div class="form-head">
  <div class="container">
    <div class="row text-center">
      <h3>ENTITY APPRAISAL LOAN APPLICATION FORM</h3>
    </div>
  </div>
</div>



<section class="main-form"> 
    <!--<div class="container">
      <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width:2%"> 0% </div>
        <div class="progress-title"> Progress </div>
      </div>
    </div>-->
    <div class="container">
      <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
          <div class="stepwizard-step steps step1"> <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Step 1</p>
          </div>
          <div class="stepwizard-step steps step2"> <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Step 2</p>
          </div>
          <div class="stepwizard-step steps step3"> <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Step 3</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container loan-form">
      
        <div class="row setup-content" id="step-1">
        	
          <div class="form-group col-md-4 col-sm-4">
            <label>1) Name of the Borrower</label>
            <input type="text" readonly class="form-control" value="<?=$details['name_borrower']?>" name="name_borrower" required>
          </div>
          <div class="form-group col-md-4 col-sm-4">
            <label>2) PAN</label>
            <div class="attach">
              <input type="text" readonly class="form-control" required name="pan_borrower" value="<?=$details['pan_borrower']?>" required>
              
			   <?php if($details['pan_borrower_attach']){ ?>
                  	<a target="blank" href="<?=base_url();?>uploads/form2/<?php echo $details['pan_borrower_attach']; ?>" class="btn btn-success btn-file attach-b"> <span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
                   <?php } ?>
             
           </div>
          </div>
          <div class="form-group col-md-4 col-sm-4">
            <label>3) Date of Incorporation</label>
            <div class="attach">
              <input type="text" readonly required class="span2 form-control" required name="date_incorporation" id="dp1" placeholder="dd-mm-yyyy" value="<?=$details['date_incorporation']?>">
              <?php if($details['date_incorporation_attach']){ ?>
                  	<a target="blank" href="<?=base_url();?>uploads/form2/<?php echo $details['date_incorporation_attach']; ?>" class="btn btn-success btn-file attach-b"> <span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
                   <?php } ?>
				   </div>
          </div>
          <div class="form-group col-md-4 col-sm-4">
            <label>4) Date of commencement of Business</label>
            <div class="attach">
              <input type="text" readonly class="span2 form-control" value="<?=$details['date_commencement_business']?>" name="date_commencement_business" id="dp2" placeholder="dd-mm-yyyy" required>
               
			    <?php if($details['date_commencement_business_attach']){ ?>
                  	<a target="blank" href="<?=base_url();?>uploads/form2/<?php echo $details['date_commencement_business_attach']; ?>" class="btn btn-success btn-file attach-b"> <span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
                   <?php } ?>
			  </div>
          </div>
          <div class="form-group col-md-4 col-sm-4">
            <label>5) Clause in MOA authorizing setting up of power project</label>
            <div class="attach">
              <input type="text" readonly class="form-control" name="clause_moa_auth" required="" value="<?=$details['clause_moa_auth']?>">
             
			    <?php if($details['clause_moa_auth_attach']){ ?>
                  	<a target="blank" href="<?=base_url();?>uploads/form2/<?php echo $details['clause_moa_auth_attach']; ?>" class="btn btn-success btn-file attach-b"> <span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
                   <?php } ?>
			  </div>
          </div>
          <div class="form-group col-md-4 col-sm-4">
            <label>6) Name change, if any since incorporation</label>
            <div class="">
              <label for="chkYnamea" class="radio-inline">
                <input required type="radio" value="yes" id="chkYnamea" name="chkNamea" onClick="ShowHideNamea()" <?php if($details['chkNamea']=="yes"){echo "checked"; $namea = 'block';}else{echo "";  $namea = 'none';} ?> />
                Yes </label>
              <label for="chkNnamea" class="radio-inline">
                <?php if($details['chkNamea']){ ?>
                <input required type="radio" value="no" id="chkNnamea" name="chkNamea" onClick="ShowHideNamea()" <?php if($details['chkNamea']=="no"){echo "checked"; $namea = 'none'; } ?> />
                <?php }else{?>
                <input type="radio" value="no" id="chkNnamea" name="chkNamea" onClick="ShowHideNamea()" checked />	
                <?php } ?>
                No </label>
              <div class="attach pull-right" id="dvNamea" style="display: <?php echo $namea; ?>"> 
				<?php if($details['chkNnameatext']){ ?>
                  	<a target="blank" href="<?=base_url();?>uploads/form2/<?php echo $details['chkNnameatext']; ?>" class="btn btn-success btn-file"> <span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
                   <?php } ?>
				</div>
            </div>
          </div>
          <div class="form-group col-md-12">
            <label>7) Nature of activity & Constitution</label>
            <textarea class="form-control" rows="5" id="comment" name="nature_activity" required><?=$details['nature_activity']?></textarea>
          </div>
          <div class="form-group col-md-6 col-sm-6">
            <label>8) Registered Office Address</label>
            <input type="text" readonly class="form-control" name="registered_office" value="<?=$details['registered_office']?>" required>
          </div>
          <div class="form-group col-md-6 col-sm-6">
            <label>9) Address for communication</label>
            <input type="text" readonly class="form-control" name="adrress_communication" value="<?=$details['adrress_communication']?>" required>
          </div>
          <div class="form-group col-md-6 col-sm-6">
            <label>10 a) Telephone</label>
            <input type="number" readonly pattern="^\d+(?:\.\d{1,2})?$"  class="form-control" name="telephone" value="<?=$details['telephone']?>" required="">
          </div>
          <div class="form-group col-md-6 col-sm-6">
            <label>10 b)Fax No.</label>
            <input type="number" readonly pattern="^\d+(?:\.\d{1,2})?$" class="form-control" name="fax_No" value="<?=$details['fax_No']?>" required>
          </div>
          
          <div class="col-md-12 text-right">
			<button type="button" class="btn print  btn-primary">Print</button>
            <button type="submit" class="btn nextBtn btn-primary">Save & Next</button>
          </div>
         
        </div>
        
        
        <div class="row setup-content" id="step-2">
        	
          <div class="col-md-12">
            <div class="sub-part">
              <h4>11) Previous Relation with REC</h4>
              <div class="radiosection">
                <label>Any previous relationship with REC</label>
                <div class="form-group ">
                  <div class="radioradio">
                    <label for="chkYo" class="radio-inline">
                      <input type="radio" id="chkYo" name="chkPrevious" value="Yes" onClick="ShowHideDiv()" <?php if($detail_sec['chkPrevious']=="Yes"){echo "checked";} ?>/>
                      Yes </label>
                    <label for="chkNop" class="radio-inline">
                    	<?php if($detail_sec['chkPrevious']){ ?>
                    	<input type="radio" id="chkYo" name="chkPrevious" value="No" onClick="ShowHideDiv()" <?php if($detail_sec['chkPrevious']=="No"){echo "checked";} ?>/>
                    		<?php }else{ ?>
                        <input type="radio" id="chkNop" name="chkPrevious" value="No" onClick="ShowHideDiv()" checked />
                        <?php } ?>
                      No </label>
                      
                  </div>
                  <div id="dvRel" class="previousrelation" style="<?php if($detail_sec['chkPrevious']=='Yes'){echo 'display: block';}else{echo 'display: none';} ?>">
                    <hr>
                    <div class="form-group col-md-6 col-sm-6">
                      <label>a) Name of Project</label>
                      <input  type="text" readonly class="form-control" name="project_name" value="<?=$detail_sec['project_name']?>">
                    </div>
                    <div class="form-group col-md-6 col-sm-6">
                      <label>b) Type of Project</label>
                      <input  type="text" readonly class="form-control" name="project_type" value="<?=$detail_sec['project_type']?>">
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                      <label>c) Date of sanction</label>
                      <input  type="text" readonly class="span2 form-control" id="dp3" placeholder="dd-mm-yyyy" name="sanction_date" value="<?=$detail_sec['sanction_date']?>">
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                      <label>d) Amount (Rs. in Crore)</label>
                      <input  type="text" readonly class="form-control" name="amount_rs" value="<?=$detail_sec['amount_rs']?>">
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                      <label>e) Loan amount outstanding (Rs. in Crore)</label>
                      <input  type="text" readonly class="form-control" name="loan_amnt" value="<?=$detail_sec['loan_amnt']?>">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <h4>12) Details of the directors </h4>
              <div id="directordetails">
                <?php $js=0; foreach($detail_sec_mod as $itmDlt){  ?>
                	
                <div class="directordiv red test1_<?=$js?>">
                  <div class="form-group col-md-6 col-sm-6">
                    <label>Full Name</label>
                    <input required class="form-control" type="text" readonly name="fullName[]" value="<?=$itmDlt['fullName']?>">
                  </div>
                  <div class="form-group col-md-6 col-sm-6">
                    <label>Date of Birth</label>
                    <div class="attach">
                      <input required type="text" readonly class="span2 form-control"  value="<?=$itmDlt['birthDate']?>" id="dp4" placeholder="dd-mm-yyyy" name="birthDate[]">
                     
					  <?php if($itmDlt['birthdatefile']){ ?>
                  	<a target="blank" href="<?=base_url();?>uploads/form2/<?php echo $itmDlt['birthdatefile']; ?>" class="btn btn-success btn-file attach-b"> <span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
                   <?php } ?>
					  </div>
                  </div>
                  <div class="form-group col-md-6 col-sm-6">
                    <label>Age</label>
                    <input class="form-control" type="number" readonly name="age[]"  value="<?=$itmDlt['age']?>">
                  </div>
                  <div class="form-group col-md-6 col-sm-6">
                    <label>Address</label>
                    <div class="attach">
                      <input required class="form-control" type="text" readonly name="address[]" value="<?=$itmDlt['address']?>">
        
					  <?php if($itmDlt['addressfile']){ ?>
                  	<a target="blank" href="<?=base_url();?>uploads/form2/<?php echo $itmDlt['addressfile']; ?>" class="btn btn-success btn-file attach-b"> <span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
                   <?php } ?>

					  </div>
                  </div>
                  <div class="form-group col-md-6 col-sm-6">
                    <label>Qualification</label>
                    <input required class="form-control" type="text" readonly name="qualification[]"  value="<?=$itmDlt['qualification']?>">
                  </div>
                  <div class="form-group col-md-6 col-sm-6">
                    <label>PAN Number</label>
                    <div class="attach">
                      <input required class="form-control" type="text" readonly name="pannumber[]"  value="<?=$itmDlt['pannumber']?>">
                       
					  <?php if($itmDlt['pan_numberfile']){ ?>
                  	<a target="blank" href="<?=base_url();?>uploads/form2/<?php echo $itmDlt['pan_numberfile']; ?>" class="btn btn-success btn-file attach-b"> <span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
                   <?php } ?>
					  </div>
                  </div>
                  <div class="form-group col-md-6 col-sm-6">
                    <label>DIN Number</label>
                    <input required class="form-control" type="text" readonly name="din_number[]"  value="<?=$itmDlt['din_number']?>">
                  </div>
                  <div class="form-group col-md-6 col-sm-6">
                    <label>Experience in power and other sectors</label>
                    <input required class="form-control" type="text" readonly name="experience_power[]"  value="<?=$itmDlt['experience_power']?>">
                  </div>
                  <div class="form-group col-md-6 col-sm-6">
                    <label>Nature</label>
                    <input required class="form-control" type="text" readonly name="nature[]" placeholder="Promoter/Independent/Professional/family member, etc."  value="<?=$itmDlt['nature']?>">
                  </div>
                  <div class="form-group col-md-6 col-sm-6">
                    <label>Shareholding in the Company (%)</label>
                    <input required class="form-control" type="text" readonly name="shareHolding[]"  value="<?=$itmDlt['shareHolding']?>">
                  </div>
                  <div required class="form-group col-md-11 col-sm-11">
                    <label>Name of other Companies in which acting as Director and whether those companies are part of Promoter Group of Borrower</label>
                    <input class="form-control" type="text" readonly name="name_of_company[]"  value="<?=$itmDlt['name_of_company']?>"> 
                  </div>
                  <?php if($js>1){?>
                  
                  <?php }?>
                </div>
                <?php $js++;} ?>
              </div>
            </div>
          </div>
		  
          <div class="col-md-12">
            <div class="sub-part">
              <h4>13) If directors hold any Directorship</h4>
              <div class="radiosection">
                <label>If directors hold any Directorship in any company where REC has given loan, details thereof needs to be given. Confirmation that such company has not defaulted to REC shall be required</label>
                <div class="form-group ">
                  <div class="radioradio">
                    <label for="chkYhold" class="radio-inline">
                    <?php if(empty($detail_sec['chkHold'])){ ?>
                      		<input type="radio" id="chkYhold" value="Yes" name="chkHold" onClick="ShowHideHold()" checked />
                      <?php }else{ ?>
                      		<input type="radio" id="chkYhold" value="Yes" name="chkHold" onClick="ShowHideHold()" <?php if($detail_sec['chkHold']=='Yes'){echo "checked";} ?>/>
                      <?php } ?>
                      Yes </label>
                    <label for="chkNhold" class="radio-inline">
                      <input type="radio" id="chkNhold" value="No" name="chkHold" onClick="ShowHideHold()"  <?php if($detail_sec['chkHold']=='No'){echo "checked";} ?>/>
                      No </label>
                  </div>
                  <div id="dvHold" class="previousrelation" style="display: <?php if($detail_sec['chkHold']=='No'){echo "none";}else{echo "block";} ?>">
                    <hr>
					<?php foreach($detail_sec_c as $sec_bc){  ?>
                      <div class="AftChngAddPro">
					
                    <div>
                    <div class="form-group col-md-6 col-sm-6">
                      <label>a) Name of Project</label>
                      <input readonly type="text" class="form-control" name="project_name_directors[]" value="<?=$sec_bc->project_name_directors ?>">
                    </div>
                    <div class="form-group col-md-6 col-sm-6">
                      <label>b) Type of Project</label>
                      <input readonly type="text" class="form-control"  name="project_type_directors[]" value="<?=$sec_bc->project_type_directors ?>">
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                      <label>c) Date of sanction</label>
                      <input readonly type="text" class="span2 form-control" id="dp5" placeholder="dd-mm-yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" name="date_sanction_directors[]" value="<?=$sec_bc->date_sanction_directors  ?>">
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                      <label>d) Amount (Rs. in Crore)</label>
                      <input readonly type="number" class="form-control" name="amount_rs_directors[]" value="<?=$sec_bc->amount_rs_directors ?>">
                    </div>
                    <div class="form-group col-md-4 col-sm-4">
                      <label>e) Loan amount outstanding (Rs. in Crore)</label>
                      <input readonly type="number" class="form-control" name="loan_amount_directors[]" value="<?=$sec_bc->loan_amount_directors ?>">
                    </div>
                  
                    </div>
					
                    </div>
					<hr>
					<?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-12 text-right">
			<button type="button" class="btn print  btn-primary">Print</button>
            <button type="submit" class="btn nextBtn btn-primary">Save & Next</button>
          </div>
         
        </div>
        
        <div class="row setup-content" id="step-3">
        	
          <div class="form-group col-md-12">
                <label>14) Details of Bridge Finance loans availed and how the company proposes to deal with same</label>
                <div class="">
                  <div class="attach" id="dvFundsinfo">
					<?php if($detail_third['dtl_brig_fin_loan']){ ?>
                  	<a target="blank" href="<?=base_url();?>uploads/form2/<?php echo $detail_third['dtl_brig_fin_loan']; ?>" class="btn btn-success btn-file"> <span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
                   <?php } ?>
					</div>
                </div>
              </div>
          <div class="form-group col-md-12">
                <label>15) Details of funds drawl from banks/FIs till date</label>
                <div class="">
                  <div class="attach" id="dvFundsinfo"> 
					<?php if($detail_third['dtl_funds_drawl_frm_bank']){ ?>
                  	<a target="blank" href="<?=base_url();?>uploads/form2/<?php echo $detail_third['dtl_funds_drawl_frm_bank']; ?>" class="btn btn-success btn-file"> <span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
                   <?php } ?>
					</div>
                </div>
              </div>
          <div class="form-group col-md-12">
                <label>16) Copy of Board Resolution for setting up power project, Project cost approval</label>
                <div class="">
                  <div class="attach" id="dvFundsinfo"> 
					<?php if($detail_third['copy_board_resolution']){ ?>
                  	<a target="blank" href="<?=base_url();?>uploads/form2/<?php echo $detail_third['copy_board_resolution']; ?>" class="btn btn-success btn-file"> <span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
                   <?php } ?>
					</div>
                </div>
              </div>
          <div class="form-group col-md-12">
                <label>17) Cost Comparison with  CERC/SERC Bench marking</label>
                <input type="text" readonly class="form-control" name="cost_comp_with_cerc" value="<?=$detail_third['cost_comp_with_cerc']?>">
              </div>
          <div class="form-group col-md-12">
                <label>18) The Company shall identify and submit the following information for the authorised person, with respect to the purpose of the proposal under consideration:-</label>
                <div class="">
                  <div class="attach" id="dvFundsinfo"> 
					<?php if($detail_third['comp_shall_idntfy']){ ?>
                  	<a target="blank" href="<?=base_url();?>uploads/form2/<?php echo $detail_third['comp_shall_idntfy']; ?>" class="btn btn-success btn-file"> <span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
                   <?php } ?>
					</div>
                </div>
                

              </div>
          <div class="col-md-12">
                <table class="table table-bordered gentable">
                  <thead>
                    <tr>
                      <th width="17%">Name of the <br>Company</th>
                      <th width="26%">Name of the <br>Authorized Person</th>
                      <th width="16%">Designation</th>
                      <th width="41%">Mode of Authorization <br>(Board Approval or Authority Letter)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span>Name of the Authorized Person</span>
                        <div>(Borrowing Company)</div></td>
                      <td><span>Name of the Authorized Person</span>
                        <div>&nbsp;</div></td>
                      <td><span>Designation</span>
                        <div>&nbsp;</div></td>
                      <td><span>Mode of Authorization (Board Approval or Authority Letter)</span>
                        <div>The person so authorised shall be authorised to discuss, sign and submit to REC, the information on behalf of the company. </div></td>
                    </tr>
                  </tbody>
                </table>
              </div>
          <div class="form-group col-md-12">
                <label>19) Please give Statutory Auditor Certificate for Default Status, etc(as per format enclosed at Annexure 1)</label>
                <div class="">
                  <div class="attach" id="dvFundsinfo"> 
					<?php if($detail_third['statutory_audit_certfct']){ ?>
                  	<a target="blank" href="<?=base_url();?>uploads/form2/<?php echo $detail_third['statutory_audit_certfct']; ?>" class="btn btn-success btn-file"> <span><i class="fa fa-download" aria-hidden="true"></i></span>
                    </a> 
                   <?php } ?>
					</div>
                </div>
              </div>
          <div class="col-md-12 text-right">
			<div class="pull-right"> 
				<button type="button" class="btn print  btn-primary">Print</button>
				<a href="<?php echo base_url();?>wp-admin/users/form2_next_step1/<?php echo $this->uri->segment('4');?>" class="agree btn btn-primary">Save & Next</a> 
			</div>
            <!--<button class="btn nextBtn btn-primary">Save & Next</button>-->
          </div>
        </div>
      
    </div>
  </section>
  
<?php $this->load->view('wp-admin/includes/form_footer'); ?>
<script>
		
	$(document).ready(function(){
		$('#step-1').show();
	});
	
	$(document).ready(function(){
		$('.print').click( function()
           {
            window.print();
           }
        );	
	});
	
	$(document).ready(function(){
		
	  	$("#chkYo").click(function(){
	  		$("input[project_name]").attr('required');
	  		$("input[project_type]").attr('required');
	  		$("input[sanction_date]").attr('required');
	  		$("input[amount_rs]").attr('required');
	  		$("input[loan_amnt]").attr('required');
	  	});
	  	
	  	$("#chkNop").click(function(){
	  		$("input[project_name]").removeAttr('required');
	  		$("input[project_type]").removeAttr('required');
	  		$("input[sanction_date]").removeAttr('required');
	  		$("input[amount_rs]").removeAttr('required');
	  		$("input[loan_amnt]").removeAttr('required');
	  	});
  	
  	});	
  </script>
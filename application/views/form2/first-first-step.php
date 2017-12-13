<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/form-navigation'); ?>

<div class="form-head">
  <div class="container">
    <div class="row text-center">
      <h3>Entity Appraisal Loan Application Form</h3>
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
          <div class="stepwizard-step steps step1"> <a href="#step-1" id="idnxt" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Step 1</p>
          </div>
          <div class="stepwizard-step steps step2"> <a href="#step-2" id="idnxt1" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Step 2</p>
          </div>
          <div class="stepwizard-step steps step3"> <a href="#step-3" id="idnxt2" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Step 3</p>
          </div>
        </div>
      </div>
    </div>
	
    <div class="container loan-form">
    
        <div class="row setup-content" id="step-1">
        	<form class="" role="form" action="<?php echo base_url(); ?>form2/save_next_step" method="post" enctype="multipart/form-data">
			<div class="sub-part">
          <div class="form-group col-md-4">
		  
		   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['name_borrower'])) { echo  $this->session->flashdata('step1')['name_borrower']; } ?></span></div>
            <label>1) Name of the Borrower</label>
            <input type="text" class="form-control" value="<?=$details['name_borrower']?>" name="name_borrower" required>
          </div>
          <div class="form-group col-md-4">
		   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['pan_borrower'])) { echo  $this->session->flashdata('step1')['pan_borrower']; } ?></span></div>
            <label>2) PAN</label>
            <div class="attach">
              <input type="text" class="form-control" pattern="[a-zA-z]{5}\d{4}[a-zA-Z]{1}"	 name="pan_borrower" value="<?=$details['pan_borrower']?>" required>
              <span class="btn btn-primary btn-file attach-c" style="right:<?php if($details['pan_borrower_attach']) { echo "42px";}else{echo"0px";} ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
              <input type="file" accept="application/pdf, application/zip"  name="pan_borrower_attach"  >
              </span> 
             
			 <?php if($details['pan_borrower_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $details['pan_borrower_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
           </div>
          </div>
          <div class="form-group col-md-4">
		   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['date_incorporation'])) { echo  $this->session->flashdata('step1')['date_incorporation']; } ?></span></div>
            <label>3) Date of Incorporation</label>
            <div class="attach">
              <input type="text" required class="span2 form-control" required name="date_incorporation" id="dp1" placeholder="dd-mm-yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" value="<?=$details['date_incorporation']?>">
              <span class="btn btn-primary btn-file attach-c" style="right:<?php if($details['date_incorporation_attach']) { echo "42px";}else{echo"0px";} ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
              <input type="file" accept="application/pdf, application/zip"  name="date_incorporation_attach" >
              </span> 
			  
			   <?php if($details['date_incorporation_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $details['date_incorporation_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
			  
			  </div>
          </div>
          <div class="form-group col-md-4">
		   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['date_commencement_business'])) { echo  $this->session->flashdata('step1')['date_commencement_business']; } ?></span></div>
            <label>4) Date of commencement of Business</label>
            <div class="attach">
              <input type="text" class="span2 form-control" value="<?=$details['date_commencement_business']?>" name="date_commencement_business" id="dp2" placeholder="dd-mm-yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" required>
              <span class="btn btn-primary btn-file attach-c" style="right:<?php if($details['date_commencement_business_attach']) { echo "42px";}else{echo"0px";} ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
              <input type="file" accept="application/pdf, application/zip"  name="date_commencement_business_attach" >
              </span> 
			   <?php if($details['date_commencement_business_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $details['date_commencement_business_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
			  
			  </div>
          </div>
          <div class="form-group col-md-4">
		   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['clause_moa_auth'])) { echo  $this->session->flashdata('step1')['clause_moa_auth']; } ?></span></div>
            <label>5) Clause in MOA authorizing setting up of power project</label>
            <div class="attach">
              <input type="text" class="form-control" name="clause_moa_auth" required="" value="<?=$details['clause_moa_auth']?>">
              <span class="btn btn-primary btn-file attach-c" style="right:<?php if($details['clause_moa_auth_attach']) { echo "42px";}else{echo"0px"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
              <input type="file" accept="application/pdf, application/zip"  name="clause_moa_auth_attach" >
              </span> 
			   <?php if($details['clause_moa_auth_attach']) { ?>
					<a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $details['clause_moa_auth_attach']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
			  </div>
          </div>
          <div class="form-group col-md-4">
		   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['chkNamea'])) { echo  $this->session->flashdata('step1')['chkNamea']; } ?></span></div>
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
              <div class="attach pull-right" id="dvNamea" style="display: <?php echo $namea; ?>"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                <input type="file" accept="application/pdf, application/zip"  id="txtNamea" name="chkNnameatext" >
                </span> 
				<?php if($details['chkNnameatext']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $details['chkNnameatext']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
				</div>
            </div>
          </div>
          <div class="form-group col-md-12">
		   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['nature_activity'])) { echo  $this->session->flashdata('step1')['nature_activity']; } ?></span></div>
            <label>7) Nature of activity & Constitution</label>
            <textarea class="form-control" rows="5" id="comment" name="nature_activity" required><?=$details['nature_activity']?></textarea>
          </div>
          <div class="form-group col-md-6">
		   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['registered_office'])) { echo  $this->session->flashdata('step1')['registered_office']; } ?></span></div>
            <label>8) Registered Office Address</label>
            <input type="text" class="form-control" name="registered_office" value="<?=$details['registered_office']?>" required>
          </div>
          <div class="form-group col-md-6">
		   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['adrress_communication'])) { echo  $this->session->flashdata('step1')['adrress_communication']; } ?></span></div>
            <label>9) Address for communication</label>
            <input type="text" class="form-control" name="adrress_communication" value="<?=$details['adrress_communication']?>" required>
          </div>
          <div class="form-group col-md-6">
		   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['telephone'])) { echo  $this->session->flashdata('step1')['telephone']; } ?></span></div>
            <label>10 a) Telephone</label>
            <input type="text" maxlength="10"  class="form-control" name="telephone" value="<?=$details['telephone']?>" required="">
          </div>
          <div class="form-group col-md-6">
		   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step1')['fax_No'])) { echo  $this->session->flashdata('step1')['fax_No']; } ?></span></div>
            <label>10 b)Fax No.</label>
            <input type="number" class="form-control" name="fax_No" value="<?=$details['fax_No']?>" required>
          </div>
		  
           </div>
		    
            <button type="submit" class="btn btn-primary pull-right">Save & Next</button>
          </div>
          </form>
		 
       
        <div class="row setup-content" id="step-2">
        	<form  role="form" action="<?php echo base_url(); ?>form2/save_second_step" method="post" enctype="multipart/form-data">
          <div class="col-md-12">
		  <?php  pr($this->session->flashdata('step2')); ?>
            <div class="sub-part">
              <h4>11) Previous Relation with REC</h4>
              <div class="radiosection">
			   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['chkPrevious'])) { echo  $this->session->flashdata('step2')['chkPrevious']; } ?></span></div>
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
                    <div class="form-group col-md-6">
					 <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_name'])) { echo  $this->session->flashdata('step2')['project_name']; } ?></span></div>
                      <label>a) Name of Project</label>
                      <input  type="text" class="form-control" name="project_name" value="<?=$detail_sec['project_name']?>">
                    </div>
                    <div class="form-group col-md-6">
					 <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_type'])) { echo  $this->session->flashdata('step2')['project_type']; } ?></span></div>
                      <label>b) Type of Project</label>
                      <input  type="text" class="form-control" name="project_type" value="<?=$detail_sec['project_type']?>">
                    </div>
                    <div class="form-group col-md-4">
					 <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['sanction_date'])) { echo  $this->session->flashdata('step2')['sanction_date']; } ?></span></div>
                      <label>c) Date of sanction</label>
                      <input  type="text" class="span2 form-control" id="dp3" placeholder="dd-mm-yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" name="sanction_date" value="<?=$detail_sec['sanction_date']?>">
                    </div>
                    <div class="form-group col-md-4">
					 <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['amount_rs'])) { echo  $this->session->flashdata('step2')['amount_rs']; } ?></span></div>
                      <label>d) Amount (Rs. in Crore)</label>
                      <input  type="text" class="form-control" name="amount_rs" value="<?=$detail_sec['amount_rs']?>">
                    </div>
                    <div class="form-group col-md-4">
					 <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['loan_amnt'])) { echo  $this->session->flashdata('step2')['loan_amnt']; } ?></span></div>
                      <label>e) Loan amount outstanding (Rs. in Crore)</label>
                      <input  type="text" class="form-control" name="loan_amnt" value="<?=$detail_sec['loan_amnt']?>">
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
                <?php $js=0; foreach($detail_sec_mod as $itmDlt){ ?>
                	
                <div class="directordiv red test1_<?=$js?>">
                  <div class="form-group col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['fullName[]'])) { echo  $this->session->flashdata('step2')['fullName[]']; } ?></span></div>
                    <label>Full Name</label>
                    <input required class="form-control" type="text" name="fullName[]" value="<?=$itmDlt['fullName']?>">
                  </div>
                  <div class="form-group col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['birthDate[]'])) { echo  $this->session->flashdata('step2')['birthDate[]']; } ?></span></div>
                    <label>Date of Birth</label>
                    <div class="attach">
                      <input required type="text" class="span2 form-control"  value="<?=$itmDlt['birthDate']?>" id="dp4" placeholder="dd-mm-yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" name="birthDate[]">
                      <span class="btn btn-primary btn-file attach-c" style="right:<?php if($itmDlt['birthdatefile']) { echo "42px;"; }else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="birthdatefile<?=$js?>" >
					  <input type="hidden" name="birthdatefiles<?=$js?>" value="<?php print_r(preg_replace('/\s+/', '', $itmDlt['birthdatefile']));?>">
                      </span> 
						<?php if($itmDlt['birthdatefile']) { ?>
					<a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $itmDlt['birthdatefile']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					  </div>
                  </div>
                  <div class="form-group col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['age[]'])) { echo  $this->session->flashdata('step2')['age[]']; } ?></span></div>
                    <label>Age</label>
                    <input class="form-control" type="number" name="age[]"  value="<?=$itmDlt['age']?>">
                  </div>
                  <div class="form-group col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['address[]'])) { echo  $this->session->flashdata('step2')['address[]']; } ?></span></div>
                    <label>Address</label>
                    <div class="attach">
                      <input required class="form-control" type="text" name="address[]" value="<?=$itmDlt['address']?>">
                      <span class="btn btn-primary btn-file attach-c" style="right:<?php if($itmDlt['addressfile']) { echo "42px;"; }else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="addressfile<?=$js?>"  >
					   <input type="hidden" name="addressfiles<?=$js?>" value="<?php print_r(preg_replace('/\s+/', '', $itmDlt['addressfile']));?>" >
                      </span> 
					  <?php if($itmDlt['addressfile']) { ?>
					<a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $itmDlt['addressfile']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					  </div>
                  </div>
                  <div class="form-group col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['qualification[]'])) { echo  $this->session->flashdata('step2')['qualification[]']; } ?></span></div>
                    <label>Qualification</label>
                    <input required class="form-control" type="text" name="qualification[]"  value="<?=$itmDlt['qualification']?>">
                  </div>
                  <div class="form-group col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['pannumber[]'])) { echo  $this->session->flashdata('step2')['pannumber[]']; } ?></span></div>
                    <label>PAN Number</label>
                    <div class="attach">
                      <input required class="form-control" type="text" pattern="[a-zA-z]{5}\d{4}[a-zA-Z]{1}" name="pannumber[]"  value="<?=$itmDlt['pannumber']?>">
                      <span class="btn btn-primary btn-file attach-c" style="right:<?php if($itmDlt['pan_numberfile']) { echo "42px;"; }else{ echo "0px;"; } ?>"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                      <input type="file" accept="application/pdf, application/zip"  name="pan_numberfile<?=$js?>" >
					   <input type="hidden" name="pan_numberfiles<?=$js?>" value="<?php print_r(preg_replace('/\s+/', '', $itmDlt['pan_numberfile']));?>" >
                      </span> 
					   <?php if($itmDlt['pan_numberfile']) { ?>
					<a target="blank" class="btn btn-success btn-file attach-b" href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $itmDlt['pan_numberfile']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					  </div>
                  </div>
                  <div class="form-group col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['din_number[]'])) { echo  $this->session->flashdata('step2')['din_number[]']; } ?></span></div>
                    <label>DIN Number</label>
                    <input required class="form-control" type="text" name="din_number[]"  value="<?=$itmDlt['din_number']?>">
                  </div>
                  <div class="form-group col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['experience_power[]'])) { echo  $this->session->flashdata('step2')['experience_power[]']; } ?></span></div>
                    <label>Experience in power and other sectors</label>
                    <input required class="form-control" type="text" name="experience_power[]"  value="<?=$itmDlt['experience_power']?>">
                  </div>
                  <div class="form-group col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['nature[]'])) { echo  $this->session->flashdata('step2')['nature[]']; } ?></span></div>
                    <label>Nature</label>
                    <input required class="form-control" type="text" name="nature[]" placeholder="Promoter/Independent/Professional/family member, etc."  value="<?=$itmDlt['nature']?>">
                  </div>
                  <div class="form-group col-md-6">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['shareHolding[]'])) { echo  $this->session->flashdata('step2')['shareHolding[]']; } ?></span></div>
                    <label>Shareholding in the Company (%)</label>
                    <input required class="form-control" type="number" name="shareHolding[]" min="1" max="100" value="<?=$itmDlt['shareHolding']?>">
                  </div>
                  <div required class="form-group col-md-11">
				  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['name_of_company[]'])) { echo  $this->session->flashdata('step2')['name_of_company[]']; } ?></span></div>
                    <label>Name of other Companies in which acting as Director and whether those companies are part of Promoter Group of Borrower</label>
                    <input class="form-control" type="text" name="name_of_company[]"  value="<?=$itmDlt['name_of_company']?>"> 
                  </div>
				   <div class="form-group col-md-1">
                    <label>Remove</label>
                    <div class="add-feild">
                      <button type="button" class="btn btn-danger addsub" onclick="$(this).parent().parent().parent().remove()">X</button>
                    </div>
                  </div>
                  <?php if($js>1){?>
                 
                  <?php }?>
                </div>
                <?php $js++;} ?>
              </div>
              <div class="form-group col-md-12">
                <label>Director (+)</label>
                <div class="add-feild">
                  <button type="button" id="adddirectordetails" class="btn btn-primary">Add</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <h4>13) If directors hold any Directorship</h4>
              <div class="radiosection">
			  <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['chkHold'])) { echo  $this->session->flashdata('step2')['chkHold']; } ?></span></div>
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
				 <?php if(!empty($detail_sec_b)){  ?>
                  <div id="dvHold" class="previousrelation" style="display: <?php if($detail_sec['chkHold']=='No'){echo "none";}else{echo "block";} ?>">
                    <hr>
					
                    <div class="AftChngAddPro">
					<?php foreach($detail_sec_b as $sec_bc){  ?>
                    <div>
                    <div class="form-group col-md-6">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_name_directors[]'])) { echo  $this->session->flashdata('step2')['project_name_directors[]']; } ?></span></div>
                      <label>a) Name of Project</label>
                      <input type="text" class="form-control" name="project_name_directors[]" value="<?=$sec_bc->project_name_directors ?>">
                    </div>
                    <div class="form-group col-md-6">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_type_directors[]'])) { echo  $this->session->flashdata('step2')['project_type_directors[]']; } ?></span></div>
                      <label>b) Type of Project</label>
                      <input type="text" class="form-control"  name="project_type_directors[]" value="<?=$sec_bc->project_type_directors ?>">
                    </div>
                    <div class="form-group col-md-4">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['date_sanction_directors[]'])) { echo  $this->session->flashdata('step2')['date_sanction_directors[]']; } ?></span></div>
                      <label>c) Date of sanction</label>
                      <input type="text" class="span2 form-control dp12"  placeholder="dd-mm-yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" name="date_sanction_directors[]" value="<?=$sec_bc->date_sanction_directors  ?>">
                    </div>
                    <div class="form-group col-md-4">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['amount_rs_directors[]'])) { echo  $this->session->flashdata('step2')['amount_rs_directors[]']; } ?></span></div>
                      <label>d) Amount (Rs. in Crore)</label>
                      <input type="number" class="form-control" name="amount_rs_directors[]" value="<?=$sec_bc->amount_rs_directors ?>">
                    </div>
                    <div class="form-group col-md-4">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['loan_amount_directors[]'])) { echo  $this->session->flashdata('step2')['loan_amount_directors[]']; } ?></span></div>
                      <label>e) Loan amount outstanding (Rs. in Crore)</label>
                      <input type="number" class="form-control" name="loan_amount_directors[]" value="<?=$sec_bc->loan_amount_directors ?>">
                    </div>
                    <div class="form-group col-md-1 col-md-offset-11"><label>Remove</label><div class="add-feild"><button type="button" class="btn btn-danger addsub" id="AftChngAddProMinus" >X</button></div></div>
                    </div>
					<?php } ?>
                    </div>
					 
                    <div class="form-group col-md-12">
                <label>Project (+)</label>
                <div class="add-feild">
                  <button type="button" id="AftChngAddProPlus" class="btn btn-primary">Add</button>
                </div>
              </div>
                  </div>
				 <?php }else{  ?>
				 
				  <div id="dvHold" class="previousrelation" style="display: <?php if($detail_sec['chkHold']=='No'){echo "none";}else{echo "block";} ?>">
                    <hr>
					
                    <div class="AftChngAddPro">
                    <div>
                    <div class="form-group col-md-6">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_name_directors[]'])) { echo  $this->session->flashdata('step2')['project_name_directors[]']; } ?></span></div>
                      <label>a) Name of Project</label>
                      <input type="text" class="form-control" name="project_name_directors[]" >
                    </div>
                    <div class="form-group col-md-6">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['project_type_directors[]'])) { echo  $this->session->flashdata('step2')['project_type_directors[]']; } ?></span></div>
                      <label>b) Type of Project</label>
                      <input type="text" class="form-control"  name="project_type_directors[]" >
                    </div>
                    <div class="form-group col-md-4">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['date_sanction_directors[]'])) { echo  $this->session->flashdata('step2')['date_sanction_directors[]']; } ?></span></div>
                      <label>c) Date of sanction</label>
                      <input type="text" class="span2 form-control dp12"  placeholder="dd-mm-yyyy" pattern="\d{1,2}/\d{1,2}/\d{4}" name="date_sanction_directors[]" >
                    </div>
                    <div class="form-group col-md-4">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['amount_rs_directors[]'])) { echo  $this->session->flashdata('step2')['amount_rs_directors[]']; } ?></span></div>
                      <label>d) Amount (Rs. in Crore)</label>
                      <input type="number" class="form-control" name="amount_rs_directors[]" >
                    </div>
                    <div class="form-group col-md-4">
					<div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step2')['loan_amount_directors[]'])) { echo  $this->session->flashdata('step2')['loan_amount_directors[]']; } ?></span></div>
                      <label>e) Loan amount outstanding (Rs. in Crore)</label>
                      <input type="number" class="form-control" name="loan_amount_directors[]" >
                    </div>
                    <div class="form-group col-md-1 col-md-offset-11"><label>Remove</label><div class="add-feild"><button type="button" class="btn btn-danger addsub" id="AftChngAddProMinus" disabled="disabled">X</button></div></div>
                    </div>
                    </div>
					
                    <div class="form-group col-md-12">
                <label>Project (+)</label>
                <div class="add-feild">
                  <button type="button" id="AftChngAddProPlus" class="btn btn-primary">Add</button>
                </div>
              </div>
                  </div>
				 
				 <?php } ?>
                </div>
              </div>
            </div>
          </div>
          
           <button class="btn btn-default prevBtn pull-left" type="button">Previous</button>
            <button type="submit" class="btn btn-primary pull-right">Save & Next</button>
          </div>
          </form>
       
        
        <div class="row setup-content" id="step-3">
        	<form  role="form" action="<?php echo base_url(); ?>form2/save_third_step" method="post" enctype="multipart/form-data">
			
			<div class="sub-part">
          <div class="form-group col-md-12">
                <label>14) Details of Bridge Finance loans availed and how the company proposes to deal with same</label>
                <div class="">
                  <div class="attach" id="dvFundsinfo"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input type="file" accept="application/pdf, application/zip"  id="" name="dtl_brig_fin_loan" >
                    </span> 
					<?php if($detail_third['dtl_brig_fin_loan']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $detail_third['dtl_brig_fin_loan']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					</div>
                </div>
              </div>
          <div class="form-group col-md-12">
                <label>15) Details of funds drawl from banks/FIs till date</label>
                <div class="">
                  <div class="attach" id="dvFundsinfo"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input type="file" accept="application/pdf, application/zip"  id="" name="dtl_funds_drawl_frm_bank" >
                    </span> 
					<?php if($detail_third['dtl_funds_drawl_frm_bank']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $detail_third['dtl_funds_drawl_frm_bank']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					</div>
                </div>
              </div>
          <div class="form-group col-md-12">
                <label>16) Copy of Board Resolution for setting up power project, Project cost approval</label>
                <div class="">
                  <div class="attach" id="dvFundsinfo"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input type="file" accept="application/pdf, application/zip"  id="" name="copy_board_resolution" >
                    </span> 
					<?php if($detail_third['copy_board_resolution']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $detail_third['copy_board_resolution']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					</div>
                </div>
              </div>
          <div class="form-group col-md-12">
		   <div class="has-error"><span class="help-block"><?php if(isset($this->session->flashdata('step3')['cost_comp_with_cerc'])) { echo  $this->session->flashdata('step3')['cost_comp_with_cerc']; } ?></span></div>
                <label>17) Cost Comparison with  CERC/SERC Bench marking</label>
                <input type="text" class="form-control" name="cost_comp_with_cerc" value="<?=$detail_third['cost_comp_with_cerc']?>" required>
              </div>
          <div class="form-group col-md-12">
                <label>18) The Company shall identify and submit the following information for the authorised person, with respect to the purpose of the proposal under consideration:- <br><strong>(Attach the document as per the format given below)</strong></label>
                <div class="">
                  <div class="attach" id="dvFundsinfo"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input type="file" accept="application/pdf, application/zip"  id="" name="comp_shall_idntfy" >
                    </span> 
					<?php if($detail_third['comp_shall_idntfy']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $detail_third['comp_shall_idntfy']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
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
                <label>19) Please give Statutory Auditor Certificate for Default Status, etc(as per format enclosed at <a target="blank" href="<?php echo base_url(); ?>uploads/annexures/Annexure1.docx"> Annexure 1 </a>)</label>
                <div class="">
                  <div class="attach" id="dvFundsinfo"> <span class="btn btn-primary btn-file"> <span><i class="fa fa-paperclip" aria-hidden="true"></i></span>
                    <input type="file" accept="application/pdf, application/zip"  id="" name="statutory_audit_certfct" >
                    </span> 
					<?php if($detail_third['statutory_audit_certfct']) { ?>
					<a target="blank" class="btn btn-success btn-file" href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $detail_third['statutory_audit_certfct']); ?>"> 
                  	<span><i class="fa fa-download" aria-hidden="true"></i></span>
					</a> 
					<?php } ?>
					</div>
                </div>
              </div>
			  </div>
			  <button class="btn btn-default prevBtn pull-left" type="button">Previous</button>
            <button class="btn btn-primary pull-right">Save & Go to Section B Part-1</button>
          </div></form>
       
      
    </div>
  </section>
  
<?php $this->load->view('includes/footer'); ?>
<script>
		
		$(document).ready(function(){
		<?php 
	  	if($this->uri->segment(4)){
	  		$sec_a_step =$this->uri->segment(4);
	  	}else{ $sec_a_step = 'step1'; }?>
	  	
		//$('.steps a').attr("disabled","disabled");
		$('.steps a').attr("class","btn btn-circle btn-default");
		$('.<?php echo $sec_a_step;?> a').attr("class","btn btn-circle btn-default btn-primary");
		
		<?php $stepshow = str_replace("step","", $sec_a_step); ?>
		
		$('#step-1').hide();
		$('#step-2').hide();
		$('#step-3').hide();
		$('#step-<?php echo $stepshow;?>').show();
	
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
        
         <?php if(!empty($details['name_borrower'])){ ?>
            if (!$('#idnxt').hasClass('disabled')) {
            $('#idnxt').addClass('btn-success');
            $('#idnxt').removeAttr('disabled');
            }
        <?php } ?>
         <?php if(!empty($detail_sec['chkPrevious'])){ ?>
            if (!$('#idnxt1').hasClass('disabled')) {
            $('#idnxt1').addClass('btn-success');
            $('#idnxt1').removeAttr('disabled');
            }
        <?php } ?>
        <?php if(!empty($detail_third['cost_comp_with_cerc'])){ ?>
            if (!$('#idnxt2').hasClass('disabled')) {
            $('#idnxt2').addClass('btn-success');
            $('#idnxt2').removeAttr('disabled');
            }
        <?php } ?>
  	
  	});	
    
    
	
  </script>
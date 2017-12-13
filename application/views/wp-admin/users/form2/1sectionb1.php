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
          <div class="stepwizard-step steps step-1"> <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Step 1</p>
          </div>
          <div class="stepwizard-step steps step-2"> <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Step 2</p>
          </div>
          <div class="stepwizard-step steps step-3"> <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Step 3</p>
          </div>
          <div class="stepwizard-step steps step-4"> <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
            <p>Step 4</p>
          </div>
          <div class="stepwizard-step steps step-5"> <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
            <p>Step 5</p>
          </div>
          <div class="stepwizard-step steps step-6"> <a href="#step-6" type="button" class="btn btn-default btn-circle" disabled="disabled">6</a>
            <p>Step 6</p>
          </div>
          <div class="stepwizard-step steps step-7"> <a href="#step-7" type="button" class="btn btn-default btn-circle" disabled="disabled">7</a>
            <p>Step 7</p>
          </div>
          <div class="stepwizard-step steps step-8"> <a href="#step-8" type="button" class="btn btn-default btn-circle" disabled="disabled">8</a>
            <p>Step 8</p>
          </div>
          <div class="stepwizard-step steps step-9"> <a href="#step-9" type="button" class="btn btn-default btn-circle" disabled="disabled">9</a>
            <p>Step 9</p>
          </div>
          <div class="stepwizard-step steps step-10"> <a href="#step-10" type="button" class="btn btn-default btn-circle" disabled="disabled">10</a>
            <p>Step 10</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container loan-form">
      
        <div class="row setup-content" id="step-1">
        	<form action="<?php echo base_url(); ?>form2/sectionb1/step1" method="post" enctype="multipart/form-data">
          <div class="form-group col-md-4">
            <label>1) Name of the Promoter</label>
            <input type="text" class="form-control" name="promoter_name" required="" value="<?php echo $secb1['promoter_name']?>">
          </div>
          <div class="form-group col-md-4">
            <label>2) PAN</label>
            <div class="attach">
              <input type="text" class="form-control" name="pan" value="<?php echo $secb1['pan']?>">
              <span class="btn btn-primary btn-file attach-b"> <span>Attach Copy of PAN</span>
              <input type="file" name="pan_file" accept="application/pdf">
              </span> </div>
          </div>
          <div class="form-group col-md-4">
            <label>3)Date of Incorporation</label>
            <div class="attach">
              <input type="text" class="span2 form-control" id="dp6" placeholder="dd-mm-yyyy" name="incorp_date" required=""  value="<?php echo $secb1['incorp_date']?>">
              <span class="btn btn-primary btn-file attach-b"> <span>Attach Certificates</span>
              <input type="file" name="incorp_date_file" accept="application/pdf">
              </span> </div>
          </div>
          <div class="form-group col-md-6">
            <label>4) Date of commencement of Business</label>
            <div class="attach">
              <input type="text" class="span2 form-control" id="dp7" placeholder="dd-mm-yyyy" name="comncmnt_bsns_date" required=""  value="<?php echo $secb1['comncmnt_bsns_date']?>">
              <span class="btn btn-primary btn-file attach-b"> <span>Attach Certificates</span>
              <input type="file"  name="comncmnt_bsns_date_file" accept="application/pdf">
              </span> </div>
          </div>
          <div class="form-group col-md-6">
            <label>5) Name change, if any since incorporation</label>
            <div class="">
              <label for="chkYnameb" class="radio-inline">
                <input type="radio" id="chkYnameb" name="namechange_since_incorp" onClick="ShowHideNameb()" required="" value="Yes" <?php if($secb1['namechange_since_incorp']=="Yes"){echo "checked" ;} ?> />
                Yes </label>
              <label for="chkNnameb" class="radio-inline">
                <input type="radio" id="chkNnameb"  name="namechange_since_incorp" onClick="ShowHideNameb()"   required="" value="No" <?php if($secb1['namechange_since_incorp']=="No"){echo "checked" ; }?>/>
                No </label>
              <div class="attach pull-right" id="dvNameb" style="display: <?php if($secb1['namechange_since_incorp']=="No"){echo "none"; }else{ echo "block"; }?>"> <span class="btn btn-primary btn-file"> <span>Attach Relevent Document</span>
                <input type="file" id="txtNameb"  name="namechange_since_incorp_file" accept="application/pdf">
                </span> </div>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label>6) Nature of Business, Constitution, Type (Domestic/Foreign)</label>
            <div class="">
                    <label class="radio-inline">
                      <input type="radio" id="" name="bsns_nature" value="Domestic" required="" <?php if($secb1['bsns_nature']=="Domestic"){echo "checked" ;} ?> />
                      Domestic </label>
                    <label class="radio-inline">
                      <input type="radio" id="" name="bsns_nature" value="Foreign" required="" <?php if($secb1['bsns_nature']=="Foreign"){echo "checked" ;} ?>/>
                      Foreign </label>
                </div>
          </div>
          <div class="form-group col-md-6">
            <label>7) Registered Office Address</label>
            <input type="text" class="form-control" name="reg_ofc_add" required="" value="<?php echo $secb1['reg_ofc_add']?>">
          </div>
          <div class="form-group col-md-6">
            <label>8) Address for communication</label>
            <input type="text" class="form-control" name="communication_add" required="" value="<?php echo $secb1['communication_add']?>">
          </div>
          <div class="form-group col-md-6">
            <label>9) Location of main plants</label>
            <input type="text" class="form-control" name="main_plant_loc" required="" value="<?php echo $secb1['main_plant_loc']?>">
          </div>
          <div class="form-group col-md-6">
            <label>10) Committed Equity amount in the proposed power project</label>
            <input type="number" class="form-control" name="cmtd_eqty_amnt_in_prpsd_pwr_prj" pattern="^\d+(?:\.\d{1,2})?$" step="0.01" required="" value="<?php echo $secb1['cmtd_eqty_amnt_in_prpsd_pwr_prj']?>">
          </div>
          <div class="form-group col-md-6">
            <label><i class="fa fa-arrow-left" aria-hidden="true"></i> 11) Copy of Board Resolution for investment of committed equity (as per before)</label>
            <div class="attach">
              <input type="text" class="form-control" name="board_resoltn_invst_comtd_eqty_copy" required="" value="<?php echo $secb1['board_resoltn_invst_comtd_eqty_copy']?>">
              <span class="btn btn-primary btn-file attach-b"> <span>Attach Certificates</span>
              <input type="file"  name="board_resoltn_invst_comtd_eqty_copy_file" accept="application/pdf">
              </span> </div>
          </div>
          <div class="form-group col-md-7">
            <label>12) Instrument by which equity will be infused. Terms of instrument if it is not in the form of equity shares</label>
            <input type="text" class="form-control" name="instrmnt_to_infuse_eqty" required="" value="<?php echo $secb1['instrmnt_to_infuse_eqty']?>">
          </div>
          <div class="form-group col-md-5">
            <label>13) Clause in MOA authorizing setting up of power project</label>
            <div class="attach">
              <input type="text" class="form-control" name="claus_moa_authrz_setng_pwr_prj" required="" value="<?php echo $secb1['claus_moa_authrz_setng_pwr_prj']?>">
              <span class="btn btn-primary btn-file attach-b"> <span>Attach Memorandum & Articles of Association</span>
              <input type="file"  name="claus_moa_authrz_setng_pwr_prj_file" accept="application/pdf">
              </span> </div>
          </div>
          <div class="form-group col-md-6">
            <label>14) Promoter Group</label>
            <input type="text" class="form-control" name="prmtr_grp" required="" value="<?php echo $secb1['prmtr_grp']?>">
			</div>
          <div class="form-group col-md-6">
            <label>15) Peer Companies within the same industry</label>
            <input type="text" class="form-control" name="peer_comp_for_same_indstry" required="" value="<?php echo $secb1['peer_comp_for_same_indstry']?>">
          </div>
          <div class="col-md-12 text-right">
            <button type="submit" class="btn  btn-primary">Save & Next</button>
          </div>
          </form>
        </div>
        <div class="row setup-content" id="step-2">
		
		<form action="<?php echo base_url(); ?>form2/sectionb2/step2" method="POST" enctype="multipart/form-data">
          <div class="col-md-12">
            <div class="sub-part">
              <h4>16) Ever applied Loan from REC</h4>
              <div class="radiosection">
                <label>Has this company ever applied for loan from REC?</label>
                <div class="form-group ">
                  <div class="radioradio">
                    <label for="chkYo" class="radio-inline">
                      <input type="radio" id="chkYo" name="chkPrevious" value="yes" <?php if($secb2['chkPrevious']=="yes" || $secb2['chkPrevious'] == "" ){echo "checked" ;}?> onClick="ShowHideDiv()" required />
                      Yes </label>
                    <label for="chkNop" class="radio-inline">
                      <input type="radio" id="chkNop" name="chkPrevious" value="no" <?php if($secb2['chkPrevious']=="no"){echo "checked" ;}?> onClick="ShowHideDiv()" required />
                      No </label>
                  </div>
             <div id="dvRel" class="previousrelation" style="display: <?php if($secb2['chkPrevious']=="yes" || $secb2['chkPrevious'] == "" ){echo "block" ;}else{echo "none"; }?>">
                    <hr>
                    <div class="form-group col-md-6">
                      <label>a) Name of Project</label>
                      <input type="text" name="prjct_name" class="form-control dvRelinput" value="<?php echo $secb2{'prjct_name'}?>" >
                    </div>
                    <div class="form-group col-md-6">
                      <label>b) Type of Project</label>
                      <input type="text" name="prjct_typ" class="form-control dvRelinput" value="<?php echo $secb2{'prjct_typ'}?>" >
                    </div>
                    <div class="form-group col-md-4">
                      <label>c) Date of sanction</label>
                      <input type="text" class="span2 form-control dvRelinput" name="date_of_sanction" value="<?php echo $secb2{'date_of_sanction'}?>" id="dp8" placeholder="dd-mm-yyyy">
                    </div>
                    <div class="form-group col-md-4">
                      <label>d) Amount (Rs. in Crore)</label>
                      <input type="number" name="amount" class="form-control dvRelinput" value="<?php echo $secb2{'amount'}?>" >
                    </div>
                    <div class="form-group col-md-4">
                      <label>e) Loan amount outstanding (Rs. in Crore)</label>
                      <input type="number" name="loan_amount_outstanding" class="form-control dvRelinput" value="<?php echo $secb2{'loan_amount_outstanding'}?>" >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <h4>17) Details of the directors </h4>
              <div id="directordetails">
			   <?php $i=0; foreach($secb2a as $data){  ?>

                <div class="directordiv test1_<?=$i?>">
                  <div class="form-group col-md-6">
                    <label>Full Name</label>
                    <input class="form-control" name="fullName[]" value="<?=$data->fullName ?>" type="text" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Date of Birth</label>
                    <div class="attach">
                      <input type="text" name="birthDate[]" value="<?=$data->birthDate ?>" class="span2 form-control" id="dp9" placeholder="dd-mm-yyyy" required>
                      <span class="btn btn-primary btn-file attach-b"> <span>Attach Relevant Document</span>
					  <input type = "hidden" name="birthDate_attached[]" value="<?=$data->birthDatefile ?>">
                      <input type="file" name="birthdatefile<?=$i ?>" accept="application/pdf" >
                      </span> </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Age</label>
                    <input class="form-control" name="age[]" value="<?=$data->age ?>" type="number" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Address</label>
                    <div class="attach">
                      <input class="form-control" name="address[]" value="<?=$data->address ?>"" type="text" required>
                      <span class="btn btn-primary btn-file attach-b"> <span>Attach Relevant Document</span>
					  <input type = "hidden" name="addressfile_attached[]" value="<?=$data->addressfile ?>">
                      <input type="file" name="addressfile<?=$i ?>" accept="application/pdf">
                      </span> </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Qualification</label>
                    <input class="form-control" name="qualification[]" value="<?=$data->qualification ?>"" type="text" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>PAN Number</label>
                    <div class="attach">
                      <input class="form-control" name="pannumber[]" value="<?=$data->pannumber ?>"" type="text" required>
                      <span class="btn btn-primary btn-file attach-b"> <span>Attach Relevant Document</span>
					  <input type = "hidden" name="pan_numberfile_attached[]" value="<?=$data->addressfile ?>">
                      <input type="file" name="pan_numberfile<?=$i ?>" accept="application/pdf">
                      </span> </div>
                      
                  </div>
				   <div class="form-group col-md-6">
                    <label>DIN Number</label>
                    <input class="form-control" name="din_number[]" value="<?=$data->din_number ?>"" type="text" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Experience in power and other sectors</label>
                    <input class="form-control" name="experience_power[]" value="<?=$data->experience_power ?>"" type="text" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Nature</label>
                    <input class="form-control" name="nature[]" value="<?=$data->nature ?>"" type="text" placeholder="Promoter/Independent/Professional/family member, etc." required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Shareholding in the Company (%)</label>
                    <input class="form-control"  name="shareHolding[]" value="<?=$data->shareHolding ?>"" type="text" required>
                  </div>
                  <div class="form-group col-md-11">
                    <label>Name of other Companies in which acting as Director and whether those companies are part of Promoter Group of Borrower</label>
                    <input class="form-control" name="name_of_company[]" value="<?=$data->name_of_company ?>" " type="text" required>
                  </div>
				  <?php if($i>0){?>
                  <div class="form-group col-md-1">
                    <label>Remove</label>
                    <div class="add-feild">
                      <button type="button" class="btn btn-danger addsub" disabled>X</button>
                    </div>
                  </div>
				  <?php } ?>
                </div>
			   <?php $i++; } ?>
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
              <div class="attachheading">18) Authorized person/s for Contact-their email, phone, fax and address for correspondence along with authority letter.
                <div class="attach pull-right"> <span class="btn btn-primary btn-file"> <span>Attach Relevant Attachment</span>
                  <input type="file" name="authrzd_prson_contct_for_corspondenc_authority_letter_file" accept="application/pdf" >
                  </span> </div>
              </div>
              <div class="col-md-12">
                <table class="table table-bordered gentable">
                  <thead>
                    <tr>
                      <th width="18%">Name of the<br> Company</th>
                      <th width="28%">Name of the <br>Authorized Person</th>
                      <th width="18%">Designation</th>
                      <th width="36%">Mode of Authorization <br>(Board Approval or Authority Letter)</th>
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
                        <div>The person so authorised shall be authorised to discuss, sign and submit to REC, the information on behalf of the company.</div></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="form-group col-md-12">
            <label>19) Details of <strong>Promoter Group</strong> to whom this company belongs duly certified by Company Secretary(as per format enclosed at Annexure 1)</label>
            <div class="attach">
              <input class="form-control" name="promoter_certified_by_company_secretary" type="text" value = "<?php echo $secb2['promoter_certified_by_company_secretary'] ?>" required>
              <span class="btn btn-primary btn-file attach-b"> <span>Attach Relevant Document</span>
              <input type="file" name="promoter_certified_by_company_secretary_file" accept="application/pdf">
              </span> </div>
          </div>
          <div class="form-group col-md-12">
            <label>20) Whether the equity shares are listed on stock exchange? If yes, market capitalization based on 200 day moving average with 52 week high and low.</label>
            <input class="form-control" type="text" name="market_200_day_moving_avg_52_week_high_low" value = "<?php echo $secb2['market_200_day_moving_avg_52_week_high_low'] ?>" required>
          </div>
          <div class="form-group col-md-12">
            <label>21) Details of shares pledged, if any, of the promoters of the promoting company</label>
            <div class="attach">
              <input class="form-control" type="text" name="detail_pledged_pormoting_company" value = "<?php echo $secb2['detail_pledged_pormoting_company'] ?>" required>
              <span class="btn btn-primary btn-file attach-b"> <span>Attach Relevant Document</span>
              <input type="file"  name="detail_pledged_pormoting_company_file" accept="application/pdf">
              </span> </div>
          </div>
          <div class="form-group col-md-12">
            <label>22) Detailed Shareholding Pattern (% and amount wise) along with changes in last 4 financial years. Same should clearly state promoter and non-promoter shareholding</label>
            <div class="attach">
              <input class="form-control" name="shrholdng_pattrn_4_yr_state_prmotr_nonprmotr" type="text" value = "<?php echo $secb2['shrholdng_pattrn_4_yr_state_prmotr_nonprmotr'] ?>" required>
              <span class="btn btn-primary btn-file attach-b"> <span>Attach Relevant Document</span>
              <input type="file" name="shrholdng_pattrn_4_yr_state_prmotr_nonprmotr_file" accept="application/pdf">
              </span> </div>
          </div>
          <div class="form-group col-md-12">
            <label>23) Please give Statutory Auditor Certificate for Default Status/Cash loss(as per format enclosed at Annexure 2)</label>
            <div class="attach">
              <input class="form-control" type="text" name="sttory_adt_certificate_cash_loss" value = "<?php echo $secb2['sttory_adt_certificate_cash_loss'] ?>" required>
              <span class="btn btn-primary btn-file attach-b"> <span>Attach Relevant Document</span>
              <input type="file" name="sttory_adt_certificate_cash_loss_file" accept="application/pdf">
              </span> </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="form-group col-md-12">
                <label>24 a) Latest Credit Rating from credit rating agencies including those of subsidiaries. If rated by multiple agencies, please enclose all such ratings. </label>
                <div class="">
                  <label for="chkcredit1" class="radio-inline">
                    <input type="radio" id="chkYcredit1" name="chkCredit1" value="yes" onClick="ShowHideCredit1()" <?php if($secb2['chkCredit1']=="yes" || $secb2['chkCredit1'] == ""){echo "checked" ;}?> required />
                    Yes </label>
                  <label for="chkNcredit1" class="radio-inline">
                    <input type="radio" id="chkNcredit1" name="chkCredit1" value="no" onClick="ShowHideCredit1()"  <?php if($secb2['chkCredit1']=="no"){echo "checked" ;}?> required />
                    No </label>
                  <div class="attach pull-right" id="dvCredit1" style="display: <?php if($secb2['chkCredit1']=="yes" || $secb2['chkCredit1'] == ""){echo "block" ;}else{echo "none";}?>"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                    <input type="file" id="txtCredit1" name="latest_credit_rating_from_credit_rating_agencies_include_file" accept="application/pdf" >
                    </span> </div>
                </div>
              </div>
              <div class="form-group col-md-12">
                <label>24 b)Has your credit rating been downgraded in last 4 years. If yes provide details. Please also enclose complete rating report along with detailed rating rationale </label>
                <div class="">
                  <label for="chkcredit2" class="radio-inline">
                    <input type="radio" id="chkYcredit2" name="chkCredit2" value="yes" onClick="ShowHideCredit2()" <?php if($secb2['chkCredit2']=="yes"){echo "checked" ;}?> />
                    Yes </label>
                  <label for="chkNcredit1" class="radio-inline">
                    <input type="radio" id="chkNcredit2" name="chkCredit2" value="no" <?php if($secb2['chkCredit2']=="no"){echo "checked" ;}?> onClick="ShowHideCredit2()"  />
                    No </label>
                  <div class="attach pull-right" id="dvCredit2" style="display: <?php if($secb2['chkCredit2']=="yes"){echo "block" ;}else{echo "none";}?>"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                    <input type="file" id="txtCredit2" name="credit_rating_been_downgraded_enclose_complete_rating_file" accept="application/pdf" >
                    </span> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group col-md-12">
            <label>25) Details of <br>
              &nbsp; a)	Projects already commissioned <br>
              &nbsp; b)	Under Implementation <br>
              &nbsp; c)	Under Planning <br>
              along with equity and debt break up for each project and the manner and source of funding. This information is to be preferably given for all the projects taken up during the last 10 years </label>
            <div class="">
              <label for="chkYprodetails" class="radio-inline">
                <input type="radio" id="chkYprodetails" name="chkProdetails" value="yes" <?php if($secb2['chkProdetails']=="yes"){echo "checked" ;}else{}?> onClick="ShowHideProdetails()" />
                Yes </label>
              <label for="chkNprodetails" class="radio-inline">
                <input type="radio" id="chkNprodetails" name="chkProdetails" value="no" <?php if($secb2['chkProdetails']=="no"){echo "checked" ;}else{echo "checked" ;}?>  onClick="ShowHideProdetails()"  />
                No </label>
              <div class="attach pull-right" id="dvProdetails" style="display: <?php if($secb2['chkProdetails']=="yes"){echo "block" ;}else{echo "none";}?>"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                <input type="file" id="txtProdetails" name="detail_project_commissioned_under_inmplementation_under_pln_file" accept="application/pdf">
                </span> </div>
            </div>
          </div>
          <div class="form-group col-md-12">
            <label>26) Commitments made by company by way of undertakings/guarantees or otherwise towards investment of equity or any other investment in any entity both disclosed and not disclosed in Annual Report </label>
            <div class="">
              <label for="chkYannualreport" class="radio-inline">
                <input type="radio" id="chkYannualreport" name="chkAnnualreport" value="yes" <?php if($secb2['chkAnnualreport']=="yes"){echo "checked" ;}?> onClick="ShowHideAnnualreport()"  />
                Yes </label>
              <label for="chkNannualreport" class="radio-inline">
                <input type="radio" id="chkNannualreport" name="chkAnnualreport" value="no" <?php if($secb2['chkAnnualreport']=="no"){echo "checked" ;}else{echo "checked" ;}?> onClick="ShowHideAnnualreport()"  />
                No </label>
              <div class="attach pull-right" id="dvAnnualreport" style="display: <?php if($secb2['chkAnnualreport']=="yes"){echo "block" ;}else{echo "none";}?>"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                <input type="file" id="txtAnnualreport" name="commitments_made_company_by_way_undertaking_invstment_file" accept="application/pdf" >
                </span> </div>
            </div>
          </div>
          <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Save & Next</button>
          </div>
		  </form>
        </div>
		
		<!----------------------step 3----------------------------->
		
        <div class="row setup-content" id="step-3">
		<form action="<?php echo base_url(); ?>form2/sectionb3/step3" method="post" enctype="multipart/form-data">
          <div class="col-md-12">
            <div class="sub-part">
              <h4>27) Information for funds raised</h4>
              <div class="form-group col-md-12">
                <label>a) Details of funds raised maximum up to last 5 financial years by the company as per format below:</label>
                <div class="">
                  <label for="chkYfundsinfo" class="radio-inline">
                    <input type="radio" value="yes" id="chkYfundsinfo" name="chkFundsinfo" onClick="ShowHideFundsinfo()" <?php if($secb3['chkFundsinfo']=="yes"){echo "checked" ;}?> />
                    Yes </label>
                  <label for="chkNfundsinfo" class="radio-inline">
                    <input type="radio" value="no" id="chkNfundsinfo" name="chkFundsinfo" onClick="ShowHideFundsinfo()" <?php if($secb3['chkFundsinfo']=="no"){echo "checked" ;}else{echo "checked" ;}?>  />
                    No </label>
                  <div class="attach pull-right" id="dvFundsinfo" style="display: <?php if($secb3['chkFundsinfo']=="yes"){echo "block" ;}else{echo "none";}?>"> <span class="btn btn-primary btn-file"> <span>Attach Statutory Auditor Certificate</span>
                    <input type="file" id="txtFundsinfo" name="dtl_of_fnds_raisd_lst_5_fincl_yr_company_file" accept="application/pdf">
                    </span> </div>
                </div>
              </div>
              <div class="col-md-12">
                <table class="table table-bordered gentable">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Institution/<br>Investor</th>
                      <th colspan="3">Amount in Rs Crores</th>
                      <th>Nature of <br>instrument</th>
                      <th>Interest <br>rate if</th>
                      <th>Investors</th>
                      <th>Purpose/<br>projects</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span>Date</span>
                        <div>&nbsp;</div></td>
                      <td><span>Institution/Investor</span>
                        <div>&nbsp;</div></td>
                      <td><span>Amount in Rs Crores</span>
                        <div>Sanctioned</div></td>
                      <td><span>Amount in Rs Crores</span>
                        <div>Disbursed</div></td>
                      <td><span>Amount in Rs Crores</span>
                        <div>Outstanding</div></td>
                      <td><span>Nature of instrument</span>
                        <div>&nbsp;</div></td>
                      <td><span>Interest rate if</span>
                        <div>&nbsp;</div></td>
                      <td><span>Investors</span>
                        <div>&nbsp;</div></td>
                      <td><span>Purpose/projects</span>
                        <div>&nbsp;</div></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="form-group col-md-12">
                <label>b) Also please give a statement declaring list of defaults made by the promoter or group companies against any of the banks/FIs during last 10 years</label>
                <div class="">
                  <div class="attach" id="dvFundsinfo"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                    <input type="file" id="" name="statmnt_declrng_lst_deflt_made_prmotr_agnst_bank_lst_10_yr_file" accept="application/pdf">
                    </span> </div>
                </div>
              </div>
              <div class="form-group col-md-12">
                <label>c) Statement declaring that no insolvency /winding up proceedings initiated against the promoters or group companies during last 10 years</label>
                <div class="">
                  <div class="attach" id="dvFundsinfo"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                    <input type="file" id="" name="statmnt_declrng_insolvency_procedng_agnst_prmotrs_file" accept="application/pdf">
                    </span> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <h4>28) Source of Equity</h4>
              <div class="form-group">
                <div class="attachheading"> Details of infrastructure, industrial or other projects handled in the past as per format below:
                  <div class="attach pull-right"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                    <input type="file" name="dtail_infrstructr_indstrial_projcts_hndled_in_pst_file" accept="application/pdf">
                    </span> </div>
                </div>
              </div>
              <div class="col-md-12">
                <table class="table table-bordered gentable">
                  <thead>
                    <tr>
                      <th>&nbsp;</th>
                      <th>T<br>(latest Audited Yr)</th>
                      <th>T+1</th>
                      <th>Tn (SCOD Yr)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>Equity commitment for the project</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T+1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn (SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>Means:</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T+1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn (SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>Raising of additional Debt</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T+1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn (SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>Raising of Equity</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T+1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn (SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>•	Promoters</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T+1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn (SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>•	IPO/FPO</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T+1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn (SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>•	Others institutions</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T+1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn (SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>Marketable Securities</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T+1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn (SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>Internal Accruals</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T+1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn (SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>Any other source(with details)</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T+1</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn (SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="form-group col-md-12">
                <label>a) If cash surplus/internal accruals are proposed to be used, please give details of such cash surplus along with details of assumptions behind such cash surplus/internal accruals.</label>
                <textarea class="form-control" rows="5" id="" name="cash_internal_accruals_prposd_used" required ><?php print_r($secb3['cash_internal_accruals_prposd_used']); ?></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>b) Whether the issue of equity shares of the promoter company will take place for raising equity? Please give details along with copy of Board resolution</label>
                <div class="">
                  <div class="attach" id="dvFundsinfo"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                    <input type="file" id="" name="isu_equity_prmotr_cmpny_tke_raising_equty_file" accept="application/pdf" >
                    </span> </div>
                </div>
              </div>
              <div class="form-group col-md-12">
                <label>c) Are you planning to raise debt on your books of accounts for bringing in equity? If yes please give details along with Debt/Equity ratio and DSCR ratio both before/after raising such debt</label>
                <textarea class="form-control" rows="5" id="" name="plnning_to_raise_debt_your_book_acount_bringng_equty_ratio" required ><?php print_r($secb3['plnning_to_raise_debt_your_book_acount_bringng_equty_ratio']); ?></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>d) Are marketable securities going to be used for funding equity requirement? If yes please give details thereto</label>
                <textarea class="form-control" rows="5" id="" name="marketable_securities_going_used_fr_fndng_equty_requirmnt" required ><?php print_r($secb3['marketable_securities_going_used_fr_fndng_equty_requirmnt']); ?></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>e) Any other source of raising funds for equity investment in the project.<br>
                  Note: Commitment of equity for other projects where the company proposes to invest any equity are to be invariably included for calculating cash surplus available</label>
                <textarea class="form-control" rows="5" id="" name="source_raising_funds_equity_investment" required ><?php print_r($secb3['source_raising_funds_equity_investment']); ?></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>f) Statement of Calculation of Cash flow for investment into proposed power project:(as per format at Annexure 3) </label>
                <textarea class="form-control" rows="5" id="" name="statmnt_of_clculatn_cash_flow_fr_invstmnt_prposd_prject" required ><?php print_r($secb3['statmnt_of_clculatn_cash_flow_fr_invstmnt_prposd_prject']); ?></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>g) Bifurcation of Projected Gross Operating Revenues as per point 35(b)(1).<br>
                  <i>Please attach corroborative evidence of status of project completion for 2a and 2b above</i> </label>
                <div class="">
                  <div class="attach" id="dvFundsinfo"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                    <input type="file" id=""  name="projected_gross_operating_revenues_file" accept="application/pdf" >
                    </span> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Save & Next</button>
          </div>
		  </form>
        </div>
		
		<!------------------------step 4--------------------------->
		
        <div class="row setup-content" id="step-4">
		<form action="<?php echo base_url(); ?>form2/sectionb4/step4" method="post" enctype="multipart/form-data">
          <div class="col-md-12">
            <div class="sub-part">
              <h4>29) Business Profile</h4>
              <div class="form-group col-md-12">
                <label>a) Please attach a detailed note on business and financial policy of  your company</label>
                <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                  <input type="file" name="business_and_financial_policy_company_file" accept="application/pdf">
                  </span> </div>
              </div>
              <div class="form-group col-md-12">
                <label>b) Major business segments (BS) along with following details</label>
                <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                  <input type="file" name="major_business_segments_file" accept="application/pdf">
                  </span> </div>
              </div>
              <div class="col-md-12">
                <table class="table table-bordered gentable">
                  <thead>
                    <tr>
                      <th>&nbsp;</th>
                      <th>BS 1</th>
                      <th>BS 2</th>
                      <th>BS - n</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>Name of each major Business Segment</div></td>
                      <td><span>BS 1</span>
                        <div>&nbsp;</div></td>
                      <td><span>BS 2</span>
                        <div>&nbsp;</div></td>
                      <td><span>BS - n</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>Turnover in each business segment</div></td>
                      <td><span>BS 1</span>
                        <div>&nbsp;</div></td>
                      <td><span>BS 2</span>
                        <div>&nbsp;</div></td>
                      <td><span>BS - n</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>% to total turnover</div></td>
                      <td><span>BS 1</span>
                        <div>&nbsp;</div></td>
                      <td><span>BS 2</span>
                        <div>&nbsp;</div></td>
                      <td><span>BS - n</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>Industry Leader in each business segment</div></td>
                      <td><span>BS 1</span>
                        <div>&nbsp;</div></td>
                      <td><span>BS 2</span>
                        <div>&nbsp;</div></td>
                      <td><span>BS - n</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>Turnover  of  Industry  leader  in  each  of business segment</div></td>
                      <td><span>BS 1</span>
                        <div>&nbsp;</div></td>
                      <td><span>BS 2</span>
                        <div>&nbsp;</div></td>
                      <td><span>BS - n</span>
                        <div>&nbsp;</div></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="form-group col-md-12">
                <label>c) What are critical factors affecting each business segment of your business</label>
                <input type="text" class="form-control" name="critical_factors_affecting_business_segment" value="<?php print_r($secb4['critical_factors_affecting_business_segment'])?>" required>
              </div>
              <div class="form-group col-md-12">
                <label>d) Management view for key developments, risks, challenges, opportunities in each business segment</label>
                <input type="text" class="form-control" name="key_developments_risks_challenges_opportunities_business_segment" value="<?php print_r($secb4['key_developments_risks_challenges_opportunities_business_segment'])?>" required>
              </div>
              <div class="">
                <div class="">
                  <div class="form-group col-md-12">
                    <h6>e) For each business segment please provide details on major products for the latest Audited financial year as follows-</h6>
                    <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                      <input type="file" name="business_sgmt_provid_latest_audited_financial_year_file" accept="application/pdf" >
                      </span> </div>
                  </div>
                  <div class="col-md-12">
                    <table class="table table-bordered gentable">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Qty <br>Produced</th>
                          <th>Qty <br>Sold</th>
                          <th>Amount <br>of Sales</th>
                          <th>Per unit <br>Sale</th>
                          <th>Per unit cost of major cost <br>components</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span>Product</span>
                            <div>&nbsp;</div></td>
                          <td><span>Qty Produced</span>
                            <div>&nbsp;</div></td>
                          <td><span>Qty Sold</span>
                            <div>&nbsp;</div></td>
                          <td><span>Amount of Sales</span>
                            <div>&nbsp;</div></td>
                          <td><span>Per unit Sale</span>
                            <div>&nbsp;</div></td>
                          <td><span>Per unit cost of major cost components</span>
                            <div>&nbsp;</div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="form-group col-md-12">
                    <label>(i) Is your business exposed to foreign exchange fluctuations? If yes, do you have a written policy approved by your BOD on hedging or dealing with such foreign exchange currency risk. Please provide copy of company policy on this</label>
                    <div class="">
                      <label for="chkYforeign" class="radio-inline">
                        <input type="radio" value="yes" id="chkYforeign" name="chkForeign" onClick="ShowHideForeign()" <?php if($secb4['chkForeign']=="yes"){echo "checked" ;}?> required />
                        Yes </label>
                      <label for="chkNforeign" class="radio-inline">
                        <input type="radio" value="no" id="chkNforeign" name="chkForeign" onClick="ShowHideForeign()" <?php if($secb4['chkForeign']=="no"){echo "checked" ;}?> required />
                        No </label>
                      <div class="attach pull-right" id="dvForeign" style="display: <?php if($secb4['chkForeign']=="yes"){echo "blocl" ;}else{echo "none"; }?>"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                        <input type="file" id="txtForeign" name="foreign_exchange_fluctuations_file" accept="application/pdf">
                        </span> </div>
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label>(ii) Details of foreign currency exposure during past 4 years and amount of profit and loss on account of such exposure along with details of hedged/un hedged exposure</label>
                    <textarea class="form-control" rows="5" id="" name="foreign_currency_exposure_durng_pst_4_yr_profit_loss" required ><?php print_r($secb4['foreign_currency_exposure_durng_pst_4_yr_profit_loss'])?></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-12">
                <label>f) Details of Sundry Debtors and Sundry Creditors constituting more than 10% of the total debtors and total creditors of last audited year</label>
                <textarea class="form-control" rows="5" id="" name="sundry_debtors_and_sundry_creditors_contitutng_last_audtd_yr" required ><?php print_r($secb4['sundry_debtors_and_sundry_creditors_contitutng_last_audtd_yr'])?></textarea>
              </div>
            </div>
          </div>
          <div class="col-md-12 text-right">
             <button type="submit" class="btn btn-primary">Save & Next</button>
          </div>
		  </form>
        </div>
		
		<!-------------------------step-5-------------------------------->
		
        <div class="row setup-content" id="step-5">
		<form action="<?php echo base_url(); ?>form2/sectionb5/step5" method="post" enctype="multipart/form-data">
          <div class="col-md-12">
            <div class="sub-part">
              <h4>30) Financial Information</h4>
              <div class="form-group col-md-12">
                <label>a) Annual Report for past 4 years</label>
                <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach relevant document</span>
                  <input type="file" name="annual_report_file" accept="application/pdf" >
                  </span> </div>
              </div>
              <div class="form-group col-md-12">
                <label>b) Audited information of last four financial years and projections are to be given up to the year in which project is scheduled to achieve CoD (minimum 2 future financial years) as follows along with detailed Projected Balance sheet and P&L A/c with assumptions and their basis
                  (as per format at Annexure 4)</label>
                <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach relevant document</span>
                  <input type="file" name="audited_information_last_four_financial_years_file" accept="application/pdf" >
                  </span> </div>
              </div>
              <div class="form-group col-md-12">
                <label>c) A detailed note on reasons for material</label>
                <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach relevant document</span>
                  <input type="file" name="detailed_note_reasons_material_file" accept="application/pdf" >
                  </span> </div>
              </div>
              <div class="form-group col-md-12">
                <label>d) Excel based Financial Model for projections has to be enclosed detailing out assumptions and norms used for projecting each item of P&L Account and Balance Sheet</label>
                <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach relevant document</span>
                  <input type="file" name="excel_based_financial_model_for_projection_file" accept="application/pdf" >
                  </span> </div>
              </div>
              <div class="form-group col-md-12">
                <label>e) Complete details of each item of contingent liability in excess of 1% of new worth giving the background, current status and management comments on the likelihood of devolvement of contingent liability with full justification</label>
                <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach relevant document</span>
                  <input type="file" name="cmplete_detail_of_contigent_liability_excess_file" accept="application/pdf" >
                  </span> </div>
              </div>
              <div class="form-group col-md-12">
                <label>f) Has there been change in position of any contingent liabilities since the last balance sheet date or their effect on any accounting item. If yes please give details</label>
                <div class="">
                  <label for="chkYchangeposition" class="radio-inline">
                    <input type="radio" value="yes" id="chkYchangeposition" name="chkChangeposition" onClick="ShowHideChangeposition()" <?php if($secb5['chkChangeposition'] == "yes"){echo "checked"; }?> />
                    Yes </label>
                  <label for="chkNchangeposition" class="radio-inline">
                    <input type="radio" value="no" id="chkNchangeposition" name="chkChangeposition" onClick="ShowHideChangeposition()" <?php if($secb5['chkChangeposition'] == "no"){echo "checked"; }?> />
                    No </label>
                  <br>
                  <br>
                  <div id="dvChangeposition" style="display: <?php if($secb5['chkChangeposition'] == "yes"){echo "block"; }else{echo "none"; } ?> ">
                    <textarea class="form-control" rows="5" id="txtChangeposition" name="positn_change_contingnt_liabilites_last_blance_sheet"><?php print_r($secb5['positn_change_contingnt_liabilites_last_blance_sheet']); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-12">
                <label>g) Any significant changes affecting position of accounts contained in latest Annual Report</label>
                <textarea class="form-control" rows="5" id="" name="accounts_contained_latest_annual_report"><?php print_r($secb5['accounts_contained_latest_annual_report']); ?></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>h) Please give details of fresh litigations that might have begun after latest annual report along with accounting impact and impact on business</label>
                <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach relevant document</span>
                  <input type="file" name="details_fresh_litigations_file" accept="application/pdf" >
                  </span> </div>
              </div>
              <div class="form-group col-md-12">
                <label>i) Updates on litigations as contained in latest Annual report along with accounting effect if any.</label>
                <textarea class="form-control" rows="5" id="" name="updates_on_litigations_contained_anuual_report" ><?php print_r($secb5['updates_on_litigations_contained_anuual_report']); ?></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>j) Please give a note on off balance sheet items such as guarantees, receivables that have been factored, pension liabilities, derivatives etc and there accounting impact and significance</label>
                <textarea class="form-control" rows="5" id="" name="off_balance_sheet_items" ><?php print_r($secb5['off_balance_sheet_items']); ?></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>k) Reasons for interest accrued and due, if any.</label>
                <textarea class="form-control" rows="5" id="" name="reasons_for_interest_accrued"><?php print_r($secb5['reasons_for_interest_accrued']); ?></textarea>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
            <h4>31) Details of existing borrowing arrangements</h4>
              <div class="form-group col-md-12">
                <label>Details of existing borrowing arrangements in form as per Annexure 5. Further please give Amortization Schedule of Each existing Loan duly certified  by  practicing chartered accountant preferably Statutory Auditor in format </label>
                <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                  <input type="file" name="existing_borrowing_arrangements_file" accept="application/pdf" >
                  </span> </div>
              </div>
              <div class="col-md-12">
                <table class="table table-bordered gentable">
                  <thead>
                    <tr>
                      <th>&nbsp;</th>
                      <th>Each loan wise</th>
                      <th>T-2</th>
                      <th>T-1</th>
                      <th>T<br>(latest Audited Yr)</th>
                      <th>T1</th>
                      <th>T2</th>
                      <th>Tn(Upto SCOD Yr)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>a</div></td>
                      <td colspan="7"><span>Each loan wise</span>
                        <div><strong>Long Term Loans</strong></div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>&nbsp;</div></td>
                      <td><span>Each loan wise</span>
                        <div>Repayment of loan</div></td>
                      <td><span>T-2</span>
                        <div>&nbsp;</div></td>
                      <td><span>T-1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn(Upto SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>&nbsp;</div></td>
                      <td><span>Each loan wise</span>
                        <div>Payment of Interest</div></td>
                      <td><span>T-2</span>
                        <div>&nbsp;</div></td>
                      <td><span>T-1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn(Upto SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>&nbsp;</div></td>
                      <td><span>Each loan wise</span>
                        <div class="text-right"><strong>Sub total</strong></div></td>
                      <td><span>T-2</span>
                        <div>&nbsp;</div></td>
                      <td><span>T-1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn(Upto SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>b</div></td>
                      <td colspan="7"><span>Each loan wise</span>
                        <div><strong>Working Capital Loans</strong></div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>&nbsp;</div></td>
                      <td><span>Each loan wise</span>
                        <div>Repayment of loan</div></td>
                      <td><span>T-2</span>
                        <div>&nbsp;</div></td>
                      <td><span>T-1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn(Upto SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>&nbsp;</div></td>
                      <td><span>Each loan wise</span>
                        <div>Payment of Interest</div></td>
                      <td><span>T-2</span>
                        <div>&nbsp;</div></td>
                      <td><span>T-1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn(Upto SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>&nbsp;</div></td>
                      <td><span>Each loan wise</span>
                        <div class="text-right"><strong>Sub total</strong></div></td>
                      <td><span>T-2</span>
                        <div>&nbsp;</div></td>
                      <td><span>T-1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn(Upto SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>c</div></td>
                      <td colspan="7"><span>Each loan wise</span>
                        <div><strong>Other Short Term Loans</strong></div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>&nbsp;</div></td>
                      <td><span>Each loan wise</span>
                        <div>Repayment of loan</div></td>
                      <td><span>T-2</span>
                        <div>&nbsp;</div></td>
                      <td><span>T-1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn(Upto SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>&nbsp;</div></td>
                      <td><span>Each loan wise</span>
                        <div>Payment of Interest</div></td>
                      <td><span>T-2</span>
                        <div>&nbsp;</div></td>
                      <td><span>T-1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn(Upto SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>&nbsp;</div></td>
                      <td><span>Each loan wise</span>
                        <div class="text-right"><strong>Sub total</strong></div></td>
                      <td><span>T-2</span>
                        <div>&nbsp;</div></td>
                      <td><span>T-1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn(Upto SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                    <tr>
                      <td><span>&nbsp;</span>
                        <div>&nbsp;</div></td>
                      <td><span>Each loan wise</span>
                        <div class="text-right"><strong>Gross Total</strong></div></td>
                      <td><span>T-2</span>
                        <div>&nbsp;</div></td>
                      <td><span>T-1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T<br>(latest Audited Yr)</span>
                        <div>&nbsp;</div></td>
                      <td><span>T1</span>
                        <div>&nbsp;</div></td>
                      <td><span>T2</span>
                        <div>&nbsp;</div></td>
                      <td><span>Tn(Upto SCOD Yr)</span>
                        <div>&nbsp;</div></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Save & Next</button>
          </div>
		  </form>
        </div>
		
		<!----------------------------------step-6------------------------>
		
        <div class="row setup-content" id="step-6">
		<form action="<?php echo base_url(); ?>form2/sectionb6/step6" method="post" enctype="multipart/form-data">
          <div class="form-group col-md-12">
            <label>32) Name and address of the main Bankers having business dealings along with the copy of letter addressed to the Bankers as per Annexure "6" for making inquiries.</label>
            <textarea class="form-control" rows="5" id="" name="name_and_address_of_the_main_bankers_having_business_deal" required ><?php print_r($secb6['name_and_address_of_the_main_bankers_having_business_deal']); ?></textarea>
          </div>
          <div class="form-group col-md-12">
            <label>33) Changes in shareholding and management in past 4 years.</label>
            <input class="form-control" type="text" name="change_shareholding_and_management" value="<?php print_r($secb6['change_shareholding_and_management']); ?>" required>
          </div>
          <div class="form-group col-md-12">
            <label>34) A specific certificate, preferably from the Company Secretary, regarding compliance with Sec. 372 A of the Companies Act, 1956</label>
            <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
              <input type="file" name="specific_certificate_preferably_from_company_regard_cmpliance_file" accept="application/pdf" >
              </span> </div>
          </div>
          <div class="form-group col-md-12">
            <label>35) Details of charges created as on date on the assets of the company (list of charges available on MCA website duly certified by CS/Director to be given. Details of show cause notices, fines and penalties awarded.</label>
            <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
              <input type="file" name="mca_website_duly_certified_file" accept="application/pdf">
              </span> </div>
          </div>
          <div class="form-group col-md-12">
            <label>36) Name of Agency, if any hired, for loan syndication or consultant along with appointment letter.</label>
            <div class="">
              <label for="chkYcharges" class="radio-inline">
                <input type="radio" value="yes" id="chkYcharges" name="chkCharges" onClick="ShowHideCharges()" <?php if($secb6['chkCharges'] == "yes"){echo "checked"; }?> />
                Yes </label>
              <label for="chkNcharges" class="radio-inline">
                <input type="radio" id="chkNcharges" name="chkCharges" value="no" onClick="ShowHideCharges()" <?php if($secb6['chkCharges'] == "no"){echo "checked"; }?> />
                No </label>
              <br>
              <br>
              <div class="attach" id="dvCharges" style="display: <?php if($secb6['chkCharges'] == "yes"){echo "block" ;}else{echo "none" ; } ?> ">
                <input type="text" class="form-control" id="txtCharges" name = "loan_syndication_consultant_along_appointment" value="<?php print_r($secb6['loan_syndication_consultant_along_appointment']); ?>" required >
                <span class="btn btn-primary btn-file attach-b"> <span>Attach relevant document</span>
                <input type="file" name="loan_syndication_consultant_along_appointment_file" accept="application/pdf" >
                </span> </div>
            </div>
          </div>
          <div class="form-group col-md-12">
            <label>37) Latest CMA information provided to your working capital bankers</label>
            <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach relevant document</span>
              <input type="file" name="latest_cma_information_provided_your_working_bankers_file" accept="application/pdf" >
              </span> </div>
          </div>
          <div class="form-group col-md-12">
            <label>38) Due diligence report in form as per format at Annexure 7</label>
            <textarea class="form-control" rows="5" id="" name="due_diligence_report" required ><?php print_r($secb6['due_diligence_report']); ?></textarea>
          </div>
          <div class="form-group col-md-12">
            <label>39) Details of criminal cases, show cause notices, charge sheets etc pending, if any, against the promoter company and its directors.<br>
              An undertaking from the authorised person of the Company (on its letter head) with respect to the litigations against the company as under :-<br>
              <i>'There are no litigations filed by or pending against the company including criminal cases, show cause notices, charge sheets, litigations, civil, charges, penalties levied, fines, FIRs filed, investigations, offences under Prevention of Corruption Act, irregularities reported under FEMA Act, CBI, Crime Investigation Department (India), Coal Controller, DGMS, CERC, SERC, SFIO, SEBI, ED and other regulatory or statutory authorities etc',</i></label>
            <div class="attach"> <span class="btn btn-primary btn-file" > <span>Attach relevant document</span>
              <input type="file" name="details_criminal_cases_file" >
              </span> </div>
          </div>
          <div class="form-group col-md-12">
            <label>40) Names of the promoters proposing to undertake financing of project cost over-run, if any, by way of promoters' contribution</label>
            <textarea class="form-control" rows="5" id="" name="undertake_financing_of_project" required ><?php print_r($secb6['undertake_financing_of_project']); ?></textarea>
          </div>
          <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Save & Next</button>
          </div>
		  </form>
        </div>
		
		<!-----------------------------step-7-------------------->
		
        <div class="row setup-content" id="step-7">
		<form action="<?php echo base_url(); ?>form2/sectionb7/step7" method="post" enctype="multipart/form-data">
          <div class="col-md-12">
            <h4>Additional Information requirement for Special Grade Promoters contributing Equity:</h4>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <h4>A. Individuals contributing equity:</h4>
              <div class="form-group col-md-4">
                <label>1) Name</label>
                <input type="text" class="form-control" name="indvduls_contrbutng_eqty_name" value="<?php print_r($secb7['indvduls_contrbutng_eqty_name']); ?>" required >
              </div>
              <div class="form-group col-md-4">
                <label>2) PAN</label>
                <div class="attach">
                  <input type="text" class="form-control" name="pannumber" value="<?php print_r($secb7['pannumber']); ?>" required >
                  <span class="btn btn-primary btn-file attach-b"> <span>Attach Copy of PAN</span>
                  <input type="file" name="pannumber_file" accept="application/pdf">
                  </span> </div>
              </div>
              <div class="form-group col-md-4">
                <label>3) Date of birth </label>
                <div class="attach">
                  <input type="text" class="span2 form-control" name="date_of_birth" value="<?php print_r($secb7['date_of_birth']); ?>" id="dp10" placeholder="dd-mm-yyyy" required >
                  <span class="btn btn-primary btn-file attach-b"> <span>Attach Copy of document</span>
                  <input type="file" name="date_of_birth_file" accept="application/pdf">
                  </span> </div>
              </div>
              <div class="form-group col-md-12">
                <label>4) Address (both current and permanent)</label>
                <div class="attach">
                  <input type="text" class="form-control" name="curnt_address" placeholder="Current Address" value="<?php print_r($secb7['curnt_address']); ?>" required >
                  <span class="btn btn-primary btn-file attach-b"> <span>Attach copy of document</span>
                  <input type="file" name="curnt_address_file" accept="application/pdf">
                  </span> </div>
                <br>
                <div class="attach">
                  <input type="text" name="prmnt_address" class="form-control" placeholder="Permanent Address" value="<?php if($secb7['same_as'] ==  "same") { print_r($secb7['curnt_address']); }else{ print_r($secb7['prmnt_address']); } ?>">
                  <span class="btn btn-primary btn-file attach-b"> <span>Attach copy of document</span>
                  <input type="file" name="prmnt_address_file" accept="application/pdf">
                  </span> </div>
                <div class="col-md-12">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="same_as" value="same" id="chkSameas" <?php if($secb7['same_as'] ==  "same") { echo "checked" ;} ?>  >
                      Same as current address </label>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label>5) Telephone No</label>
                <input type="number" class="form-control" name="telphne_no" value="<?php print_r($secb7['telphne_no']); ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label>6) Net worth statement duly certified by Chartered Accountant </label>
                <div class="attach">
                  <input type="text" class="form-control" name="worth_statmnt_duly_crtifid_acountnt" value="<?php print_r($secb7['worth_statmnt_duly_crtifid_acountnt']); ?>" required>
                  <span class="btn btn-primary btn-file attach-b"> <span>Attach CA Certificate</span>
                  <input type="file"  name="worth_statmnt_duly_crtifid_acountnt_file" accept="application/pdf">
                  </span> </div>
              </div>
              <div class="form-group col-md-6">
                <label>7) Wealth tax statements duly certified by Chartered Accountant</label>
                <div class="attach"> 
                  <input type="text" class="form-control" name="wlth_tax_statmnt_crtifid_acountnt" value="<?php print_r($secb7['wlth_tax_statmnt_crtifid_acountnt']); ?>" required >
                  <span class="btn btn-primary btn-file attach-b"> <span>Attach CA Certificate</span>
                  <input type="file" name="wlth_tax_statmnt_crtifid_acountnt_file" accept="application/pdf">
                  </span>
				 </div>
              </div>
              <div class="form-group col-md-6">
                <label>8) Latest Income tax/Wealth tax assessment order</label>
                <div class="attach">
                  <input type="text" class="form-control" name="incmetax_asesmnt_ordr" value="<?php print_r($secb7['incmetax_asesmnt_ordr']); ?>" required >
                  <span class="btn btn-primary btn-file attach-b"> <span>Attach copy of document</span>
                  <input type="file" name="incmetax_asesmnt_ordr_file" accept="application/pdf">
                  </span> </div>
              </div>
              <div class="form-group col-md-6">
                <label>9) Income Tax Returns for past 3 years</label>
                <div class="attach">
                  <input type="text" class="form-control" name="income_tax_return_past_3_yr" value="<?php print_r($secb7['income_tax_return_past_3_yr']); ?>" required >
                  <span class="btn btn-primary btn-file attach-b"> <span>Attach copy of ITR</span>
                  <input type="file" name="income_tax_return_past_3_yr_file" accept="application/pdf">
                  </span> </div>
              </div>
              <div class="">
                <div class="">
                  <div class="col-md-12">
                    <h6>10) Relationship of the above promoter:</h6>
                  </div>
                  <div class="form-group col-md-6">
                    <label>a) With other individual promoters, if any;</label>
                    <input type="text" class="form-control" name="individuals_promoter" value="<?php print_r($secb7['individuals_promoter']); ?>" required >
                  </div>
                  <div class="form-group col-md-6">
                    <label>b) With other corporate promoters, if any.</label>
                    <input type="text" class="form-control"  name="corporate_promoter" value="<?php print_r($secb7['corporate_promoter']); ?>" required >
                  </div>
                </div>
              </div>
              <div class="form-group col-md-12">
                <label>11) Whether Indian /Foreign National (please give name of the country)/NRI</label>
                <input type="text" class="form-control" name="wethr_indian_foreign_nationl" value="<?php print_r($secb7['wethr_indian_foreign_nationl']); ?>" required >
                
              </div>
              <div class="form-group col-md-12">
                <label>12) Note on how the proposed equity contribution (means of equity) in the project would be met. In case the equity contribution is to be met by way of selling real estate including agricultural land, shares in group companies, etc., the Note may also elaborate on the proposed plan to mobilize required funds</label>
                <textarea class="form-control" rows="5" id="" name="seling_real_estate_inclding_agrcltral_land_shares" required ><?php print_r($secb7['seling_real_estate_inclding_agrcltral_land_shares']); ?></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>13) Note on existing business operations, if any</label>
                <textarea class="form-control" rows="5" id="comment" name="exstng_busines_oprtions" required ><?php print_r($secb7['exstng_busines_oprtions']); ?></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>14) Note on promoters‟ qualifications/experience in managing/operating businesses</label>
                <textarea class="form-control" rows="5" id="comment" name="prmtrs_qulifctions_exprnce_in_mngng_busines" required ><?php print_r($secb7['prmtrs_qulifctions_exprnce_in_mngng_busines']); ?></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>15) Details of current over dues, if any, to any bank/FI</label>
                <textarea class="form-control" name="dtls_of_curent_over_dues" rows="5" id="comment" required ><?php print_r($secb7['dtls_of_curent_over_dues']); ?>	</textarea>
              </div>
              <div class="form-group col-md-12">
                <label>16) Note  on  track  record  with  lenders  during  last  3  years  inter-alia  covering  recovery proceedings, CDR package, restructuring, rescheduling, etc</label>
                <textarea class="form-control" name="rcovry_cdr_pckge_restrctring_reschdlng" rows="5" id="comment" required ><?php print_r($secb7['rcovry_cdr_pckge_restrctring_reschdlng']); ?></textarea>
              </div>
            </div>
          </div>
          <div class="col-md-12 text-right">
             <button type="submit" class="btn btn-primary">Save & Next</button>
          </div>
		  </form>
        </div>
		
		<!-------------------------------------step-8------------------------>
		
        <div class="row setup-content" id="step-8">
		 <form action="<?php echo base_url(); ?>form2/sectionb8/step-8" method="post" enctype="multipart/form-data">
          <div class="col-md-12">
            <h4>Additional Information requirement for Special Grade Promoters contributing Equity:</h4>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <h4>B. PE Funds/VC Funds/ Infrastructure Funds/ Mutual Funds</h4>
              <div class="">
                <div class="">
                  <div class="col-md-12">
                    <h6>1) Details of corpus of the fund or scheme making the investment such as: </h6>
                  </div>
                  <div class="form-group col-md-6">
                    <label>a) Name of the fund</label>
                    <input type="text" class="form-control" name="corpus_fund_schm_makng_invstmnt" value="<?php print_r($secb8['corpus_fund_schm_makng_invstmnt']); ?>" required >
                  </div>
                  <div class="form-group col-md-6">
                    <label>b) Registered office address</label>
                    <div class="attach">
                      <input type="text" class="form-control" name="registrd_offce_addrs" value="<?php print_r($secb8['registrd_offce_addrs']); ?>" required >
                      <span class="btn btn-primary btn-file attach-b"> <span>Attach copy of document</span>
                      <input type="file" name="registrd_offce_addrs_file" accept="application/pdf" >
                      </span> </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>c) Communicating office address</label>
                    <div class="attach">
                      <input type="text" class="form-control" name="communicating_office_address" value="<?php print_r($secb8['communicating_office_address']); ?>" required >
                      <span class="btn btn-primary btn-file attach-b"> <span>Attach copy of document</span>
                      <input type="file" name="communicating_office_address_file" accept="application/pdf">
                      </span> </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label>d) Email address</label>
                    <input type="email" class="form-control" name="corpus_fund_email_address" value="<?php print_r($secb8['corpus_fund_email_address']); ?>" required >
                  </div>
                  <div class="form-group col-md-12">
                    <label>e) Website address, etc</label>
                    <input type="url" class="form-control" name="corpus_fund_website_address" value="<?php print_r($secb8['corpus_fund_website_address']); ?>" required>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label>2) Whether Domestic/Foreign</label>
                <div class="">
                    <label class="radio-inline">
                      <input type="radio" value="domestic" id="" name="dorf" checked />
                      Domestic </label>
                    <label class="radio-inline">
                      <input type="radio" value="foreign" id="" name="dorf"/>
                      Foreign </label>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label>3) Size/Corpus of the fund or scheme making the investment</label>
                <input type="text" class="form-control" name="size_corpus_fnd_schm_mkng_invstmnt" value="<?php print_r($secb8['size_corpus_fnd_schm_mkng_invstmnt']); ?>">
              </div>
              <div class="form-group col-md-12">
                <label>4) Credit Rating if any</label>
                <div class="">
                  <label for="chkYcreditrating" class="radio-inline">
                    <input required type="radio" value="yes" id="chkYcreditrating" name="chkCreditrating" onClick="ShowHideCreditrating()" <?php if($secb8['chkCreditrating'] == "yes" ){echo "checked"; }?> />
                    Yes </label>
                  <label for="chkNcreditrating" class="radio-inline">
                    <input required type="radio" value="no" id="chkNcreditrating" name="chkCreditrating" onClick="ShowHideCreditrating()" <?php if($secb8['chkCreditrating'] == "no" ){echo "checked"; }?>  />
                    No </label>
                  <div class="attach pull-right" id="dvCreditrating" style="display: <?php if($secb8['chkCreditrating'] == "yes" ){echo "block"; }else{echo "none"; }?>"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                    <input type="file" id="txtCreditrating" name="crdt_ratng_relvnt_certfcte_file" accept="application/pdf" >
                    </span> </div>
                </div>
              </div>
              <div class="form-group col-md-12">
                <label>5) Whether term-sheet already signed. If yes, please submit a copy of the same. If no, please elaborate.</label>
                <div class="">
                  <label class="radio-inline">
                    <input required type="radio" name="colorRadio" value="yes" <?php if($secb8['colorRadio'] == "yes" ){echo "checked"; }?> onchange="$('.yes').show(); $('.no').hide();" >
                    Yes</label>
                  <label class="radio-inline">
                    <input required type="radio" name="colorRadio" value="no" <?php if($secb8['colorRadio'] == "no" ){echo "checked"; }?>  onchange="$('.yes').hide(); $('.no').show();">
                    No</label>
                    
                  <div class="yes box pull-right" style="display: <?php if($secb8['colorRadio'] == "yes" ){echo "block"; }else{echo "none"; }?>" id="colorRadio">
                    <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                      <input type="file" id="txtTermsheet" name="whthr_trm_shet_alrdy_signd_file" accept="application/pdf" >
                      </span> </div>
                  </div>
                  
                  <div class="no box" style="display: <?php if($secb8['colorRadio'] == "no" ){echo "block"; }else{echo "none"; }?>">
                  <br>
					<label>Please elaborate.</label>
                    <textarea class="form-control" rows="5" id="" name="whthr_trm_shet_elaborate" placeholder="please elaborate..." ><?php print_r($secb8['whthr_trm_shet_elaborate']); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-12">
                <label>6) Note on equity subscription pattern and arrangements for phasing of equity</label>
                <textarea class="form-control" name="sbscrptn_patrn_and_arangmnts_phsng_eqty" rows="5" id="" required ><?php print_r($secb8['sbscrptn_patrn_and_arangmnts_phsng_eqty']); ?></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>7) Whether term-sheet/other agreement provide for any buy-back/assured return obligations on the company implementing the project. If so, please elaborate.</label>
                <textarea class="form-control" name="trm_shet_agremnt_prvde_buy_bck_asurd_rtrn_oblgtns_cmpny" rows="5" id="" required ><?php print_r($secb8['trm_shet_agremnt_prvde_buy_bck_asurd_rtrn_oblgtns_cmpny']); ?></textarea>
              </div>
              <div class="">
                <div class="">
                  <div class="col-md-12">
                    <h6>8) Detailed note on Fund inter-alia covering:(as may be applicable) </h6>
                  </div>
                  <div class="form-group col-md-4">
                    <label>a) Management</label>
                    <input type="text" class="form-control" name="fund_intr_alia_mngmnt" value="<?php print_r($secb8['fund_intr_alia_mngmnt']); ?>" required >
                  </div>
                  <div class="form-group col-md-4">
                    <label>b) Board of Trustees</label>
                    <input type="text" class="form-control" name="fund_intr_alia_bord_of_trshs" value="<?php print_r($secb8['fund_intr_alia_bord_of_trshs']); ?>" required >
                  </div>
                  <div class="form-group col-md-4">
                    <label>c) Investment Committee</label>
                    <input type="text" class="form-control" name="fund_intr_alia_invstmnt_cmite" value="<?php print_r($secb8['fund_intr_alia_invstmnt_cmite']); ?>" required >
                  </div>
                  <div class="form-group col-md-6">
                    <label>d) Sector Exposures</label>
                    <input type="text" class="form-control" name="fund_intr_alia_sctr_expsre" value="<?php print_r($secb8['fund_intr_alia_sctr_expsre']); ?>" required >
                  </div>
                  <div class="form-group col-md-6">
                    <label>e) Country exposures</label>
                    <input type="text" class="form-control" name="fund_intr_alia_cntry_expsre" value="<?php print_r($secb8['fund_intr_alia_cntry_expsre']); ?>" required >
                  </div>
                </div>
              </div>
              <div class="form-group col-md-12">
                <label>9) Registration status with Regulatory bodies in India (viz. RBI, SEBI, etc.) or abroad (specify)</label>
                <textarea class="form-control" name="rgstrtn_sts_with_regltry_bodes_in_india" rows="5" id="" required ><?php print_r($secb8['rgstrtn_sts_with_regltry_bodes_in_india']); ?></textarea>
              </div>
              <div class="form-group col-md-6">
                <label>10) Copy of constitution documents(e.g. Memorandum and Articles of Association)</label>
                <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach copy of document</span>
                  <input type="file" name="constiton_docmnts_memrndm_artcls_file" accept="application/pdf" >
                  </span> </div>
              </div>
              <div class="form-group col-md-6">
                <label>11) Copy of annual accounts</label>
                <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach copy of document</span>
                  <input type="file" name="anual_acounts_docmnts_file" accept="application/pdf" >
                  </span> </div>
              </div>
              <div class="form-group col-md-12">
                <label>12) Note on applicable regulatory framework</label>
                <textarea class="form-control" name="applicable_regulatory_framework" rows="5" id="" required ><?php print_r($secb8['applicable_regulatory_framework']); ?></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>13) Contact  details  for  communication  by REC  and  name  of  Authorised  signatory with authority letter to deal with REC</label>
                <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach copy of document</span>
                  <input type="file" name="dtls_comncton_rec_and_authrsd_sgntry_authrty_ltr_file" accept="application/pdf" >
                  </span> </div>
              </div>
              <div class="form-group col-md-12">
                <label>14) Proposed duration of the investment i.e. whether proposed to remain invested during the currency of debt from Banks/FIs or planning to divest earlier</label>
                <textarea class="form-control" name="prpsd_invstd_durng_curncy_debt_frm_bnks_fis_planning" rows="5" id="" required ><?php print_r($secb8['prpsd_invstd_durng_curncy_debt_frm_bnks_fis_planning']); ?></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>15) Whether equity investment is proposed to be made directly by the company or indirectly through associates? If yes, details thereof</label>
                <textarea class="form-control" name="whthr_eqty_invstmnt_prpsd_mde_dcrtly_cmpny" rows="5" id="" required ><?php print_r($secb8['whthr_eqty_invstmnt_prpsd_mde_dcrtly_cmpny']); ?></textarea>
              </div>
            </div>
          </div>
          <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Save & Next</button>
          </div>
		 </form>
        </div>
		
		<!----------------------------------step-9---------------------------------->
		
        <div class="row setup-content" id="step-9">
		<form action="<?php echo base_url(); ?>form2/sectionb9/step-9" method="post" enctype="multipart/form-data">
          <div class="col-md-12">
            <h4>Additional Information requirement for Special Grade Promoters contributing Equity:</h4>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <h4>C. Banks/FIs/IFCs</h4>
              <div class="">
                <div class="">
                  <div class="form-group col-md-12">
                    <label>1) Brief details</label>
                    <textarea class="form-control" name="banks_fis_brief_dtls" rows="5" id="" required><?php print_r($secb9['banks_fis_brief_dtls']); ?></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <label>2) Assets size (i.e. Advances + Investments)</label>
                    <textarea class="form-control" name="banks_fis_asets_sze_advncd_invstmnts" rows="5" id="" required><?php print_r($secb9['banks_fis_asets_sze_advncd_invstmnts']); ?></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <label>3) Is it intended that they will exercise management control</label>
                    <textarea class="form-control" name="banks_fis_intnded_that_exrsze_mngmnt_cntrl" rows="5" id="" required><?php print_r($secb9['banks_fis_intnded_that_exrsze_mngmnt_cntrl']); ?></textarea>
                  </div>
                  <div class="">
                    <div class="">
                      <div class="radiosection">
                        <label>4) Whether classified as IFC/NBFC by RBI(If yes, please mention RBI certificate no. and date)</label>
                        <div class="form-group">
                          <div class="radioradio">
                            <label for="chkYrbicertificate" class="radio-inline">
                              <input type="radio" value="yes" id="chkYrbicertificate" name="chkRbicertificate" onClick="ShowHideRbicertificate()" <?php if($secb9['chkRbicertificate'] == "yes") {echo "checked"; } ?>>
                              Yes </label>
                            <label for="chkNrbicertificate" class="radio-inline">
                              <input type="radio" value="no" id="chkNrbicertificate" name="chkRbicertificate" onClick="ShowHideRbicertificate()" <?php if($secb9['chkRbicertificate'] == "no") {echo "checked"; } ?>>
                              No </label>
                          </div>
                          <div id="dvRbicertificate" class="" style="display: <?php if($secb9['chkRbicertificate'] == "yes") {echo "block"; }else{echo "none;"; } ?>;">
                            <hr>
                            <div class="form-group col-md-4">
                              <label>RBI Certificate No. </label>
                              <input type="text" class="form-control" name="whethr_clasfied_rbi_crtfcate_no" value="<?php print_r($secb9['whethr_clasfied_rbi_crtfcate_no']); ?>" required>
                            </div>
                            <div class="form-group col-md-4">
                              <label>Date</label>
                              <input type="text" class="span2 form-control" name="whethr_clasfied_rbi_date" value="<?php print_r($secb9['whethr_clasfied_rbi_date']); ?>" id="dp11" placeholder="dd-mm-yyyy" required>
                            </div>
                            <div class="form-group col-md-4">
                              <label>Attachment</label>
                              <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                                <input type="file" name="whethr_clasfied_rbi_rlvnt_crtfcate_file" accept="application/pdf" >
                                </span> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label>5) Details as per <strong>"B"</strong> above, to the extent applicable</label>
                    <textarea class="form-control" name="dtls_as_per_abve_extnt_aplicble" rows="5" id="" required><?php print_r($secb9['dtls_as_per_abve_extnt_aplicble']); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Save & Next</button>
          </div>
		 </form> 
      </div>
        <!-------------------------step-10------------------------>
		
		<div class="row setup-content" id="step-10">
		 <form action="<?php echo base_url(); ?>form2/sectionb10/step1" method="post" enctype="multipart/form-data">
          <div class="col-md-12">
            <h4>Additional Information requirement for Special Grade Promoters contributing Equity:</h4>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <h4>D. NBFCs</h4>
              <div class="">
                <div class="">
                  <div class="form-group col-md-4">
                    <label>1) New Owned Funds</label>
                    <input type="text" class="form-control" name="nbfcs_new_ownd_funfs" value="<?php print_r($secb10['nbfcs_new_ownd_funfs']); ?>" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label>2) Track record of Profits for past three years</label>
                    <input type="text" class="form-control" name="nbfcs_track_recrd_prfts_pst_three_yrs" value="<?php print_r($secb10['nbfcs_track_recrd_prfts_pst_three_yrs']); ?>" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label>3) Credit Rating</label>
                    <div class="">
                      <label for="chkYcreditrating1" class="radio-inline">
                        <input type="radio" value="yes" id="chkYcreditrating1" name="chkCreditrating1" onClick="ShowHideCreditrating1()" <?php if($secb10['chkCreditrating1'] == "yes"){echo "checked" ;}?> />
                        Yes </label>
                      <label for="chkNcreditrating1" class="radio-inline">
                        <input type="radio" value="no" id="chkNcreditrating1" name="chkCreditrating1" onClick="ShowHideCreditrating1()"  <?php if($secb10['chkCreditrating1'] == "no"){echo "checked" ;}?> />
                        No </label>
                      <div class="attach pull-right" id="dvCreditrating1" style="display: <?php if($secb10['chkCreditrating1'] == "yes"){echo "block"; }else{echo "none"; }?>"> <span class="btn btn-primary btn-file"> <span>Attach relevant certificate</span>
                        <input type="file" id="txtCreditrating1" name="nbfcs_crdt_rtng_rlvnt_crtfcate_file" accept="application/pdf" >
                        </span> </div>
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label>4) Details as per <strong>"B"</strong> above, to the extent applicable</label>
                    <textarea class="form-control" name="dtls_as_per_b_abve_extnt_aplicble" rows="5" id="" required><?php print_r($secb10['dtls_as_per_b_abve_extnt_aplicble']); ?></textarea>
                  </div>
                </div>
              </div>
			   <div class="">
                <div class="">
                  <div class="form-group col-md-12">
				   <h4>E. Governments</h4>
                    <label>1) Documents emanating from Government supporting equity commitment for the project</label>
                    <div class="attach"> <span class="btn btn-primary btn-file"> <span>Attach copy of document</span>
                      <input type="file" name="docmnts_emntng_frm_gvrnmnt_eqty_comtmnt_prjct_file" accept="application/pdf" >
                      </span> </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label>2) Note on nature of equity support (cash or kind), arrangements for phasing of equity</label>
                    <textarea class="form-control" name="nature_of_eqty_suprt_arngmnts_phsng_eqty" rows="5" id="" required><?php print_r($secb10['nature_of_eqty_suprt_arngmnts_phsng_eqty']); ?></textarea>
                  </div>
                  <div class="form-group col-md-12">
                    <label>3) Status/Stage of actual allotment of equity shares</label>
                    <input type="text" class="form-control" name="status_stge_alotmnt_of_eqty_shrs" value="<?php print_r($secb10['status_stge_alotmnt_of_eqty_shrs']); ?>" required>
                  </div>
                </div>
             </div>
            </div>
          </div>
          <div class="col-md-12 text-right">
               <button type="submit" class="btn btn-primary">Save & Next</button>
          </div>
		 </form> 
        </div>
      
    
  </section>
</main>

<?php $this->load->view('includes/footer'); ?>

<script>
  $(document).ready(function() {
  	<?php if($this->uri->segment(3)){
  		$sec_a_step =$this->uri->segment(3);
  	}else{ $sec_a_step = 'step-1'; }?>
  	 
  		$('.steps a').attr("disabled","disabled");
  		$('.steps a').attr("class","btn btn-circle btn-default");
  		$('.<?php echo $sec_a_step;?> a').attr("class","btn btn-circle btn-default btn-primary");
  		  		
  		for(var i=1; i<=10; i++){
			$('#step-'+i).hide();
		}
		
  		$('#<?php echo $sec_a_step;?>').toggle();
  });	
  
  function ShowHideNameb() {
        var chkYnameb = document.getElementById("chkYnameb");
        var dvNameb = document.getElementById("dvNameb");
        dvNameb.style.display = chkYnameb.checked ? "block" : "none";
    } 
  	
  	function ShowHideCredit1() {
        var chkYcredit1 = document.getElementById("chkYcredit1");
        var dvCredit1 = document.getElementById("dvCredit1");
        dvCredit1.style.display = chkYcredit1.checked ? "block" : "none";
    }
    
    
     function ShowHideProdetails() {
        var chkYprodetails = document.getElementById("chkYprodetails");
        var dvProdetails = document.getElementById("dvProdetails");
        dvProdetails.style.display = chkYprodetails.checked ? "block" : "none";
    }
    
    
	function ShowHideAnnualreport() {
        var chkYannualreport = document.getElementById("chkYannualreport");
        var dvAnnualreport = document.getElementById("dvAnnualreport");
        dvAnnualreport.style.display = chkYannualreport.checked ? "block" : "none";
    }
    
    function ShowHideFundsinfo() {
        var chkYfundsinfo = document.getElementById("chkYfundsinfo");
        var dvFundsinfo = document.getElementById("dvFundsinfo");
        dvFundsinfo.style.display = chkYfundsinfo.checked ? "block" : "none";
    }
    
    function ShowHideForeign() {
        var chkYforeign = document.getElementById("chkYforeign");
        var dvForeign = document.getElementById("dvForeign");
        dvForeign.style.display = chkYforeign.checked ? "block" : "none";
    }
    
    
	function ShowHideChangeposition() {
        var chkYchangeposition = document.getElementById("chkYchangeposition");
        var dvChangeposition = document.getElementById("dvChangeposition");
        dvChangeposition.style.display = chkYchangeposition.checked ? "block" : "none";
    }
    
    
	function ShowHideCharges() {
        var chkYcharges = document.getElementById("chkYcharges");
        var dvCharges = document.getElementById("dvCharges");
        dvCharges.style.display = chkYcharges.checked ? "block" : "none";
    }
    function ShowHideCreditrating() {
        var chkYcreditrating = document.getElementById("chkYcreditrating");
        var dvCreditrating = document.getElementById("dvCreditrating");
        dvCreditrating.style.display = chkYcreditrating.checked ? "block" : "none";
    }
    
	function ShowHideRbicertificate() {
        var chkYrbicertificate = document.getElementById("chkYrbicertificate");
        var dvRbicertificate = document.getElementById("dvRbicertificate");
        dvRbicertificate.style.display = chkYrbicertificate.checked ? "block" : "none";
    }
    function ShowHideCreditrating1() {
        var chkYcreditrating1 = document.getElementById("chkYcreditrating1");
        var dvCreditrating1 = document.getElementById("dvCreditrating1");
        dvCreditrating1.style.display = chkYcreditrating1.checked ? "block" : "none";
    }
  </script>
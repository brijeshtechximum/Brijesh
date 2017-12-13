<?php $this->load->view('includes/header'); ?>
<?php //$this->load->view('includes/form-navigation'); ?>

  <header>
<div class="form-head">
  <div class="container">
    <div class="row text-center">
      <h3>ENTITY APPRAISAL LOAN APPLICATION FORM</h3>
      <h5>Part II</h5>
    </div>
  </div>
</div>
</header>
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
        </div>
      </div>
    </div>
	 
    <div class="container">
      <div class="loan-form">
	  <!------------------------step-1-------------------->
	 
        <div class="row setup-content" id="step-1">
		
		  <div class="col-md-12">
            <h4>Managerial Competence</h4>
          </div>
         
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>1.</strong> Can the Core Promoters management be considered to be broad-based?
                <div class="attach pull-right"> 
				  <?php if($sec_c1['core_prmtrs_mngmnt_broad_based_optnl_atchmnt_file']) { ?>
						<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c1['core_prmtrs_mngmnt_broad_based_optnl_atchmnt_file']); ?>"> 
						<span><i class="fa fa-download" aria-hidden="true"></i></span>
						</a> 
						<?php } ?>
				  </div>
              </div>
              <div class="">
                <div class="">
                  <div class="col-md-12">
                    <h6>a) To assess the above, the following information may be provided in respect of Directors:</h6>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <label>i) Name</label>
                    <input type="text" readonly class="form-control" name="respect_of_directors_name" value="<?php print($sec_c1['respect_of_directors_name']); ?>" required>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <label>ii) Age</label>
                    <input type="number" readonly class="form-control" name="respect_of_directors_age" value="<?php print($sec_c1['respect_of_directors_age']); ?>" required>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <label>iii) Address</label>
                    <input type="text" readonly class="form-control" name="respect_of_directors_address" value="<?php print($sec_c1['respect_of_directors_address']); ?>" required>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <label>iv) Qualification</label>
                    <input type="text" readonly class="form-control" name="respect_of_directors_qualification" value="<?php print($sec_c1['respect_of_directors_qualification']); ?>" required>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <label>v) PAN</label>
                    <input type="text" readonly class="form-control" name="respect_of_directors_pan" value="<?php print($sec_c1['respect_of_directors_pan']); ?>" required>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                    <label>vi) DIN</label>
                    <input type="text" readonly class="form-control" name="respect_of_directors_din" value="<?php print($sec_c1['respect_of_directors_din']); ?>" required>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-4 col-sm-4">
                <label>b) Total Experience in power sector</label>
                <input type="text" readonly class="form-control" name="total_exprnce_pwr_sctr" value="<?php print($sec_c1['total_exprnce_pwr_sctr']); ?>" required>
              </div>
              <div class="form-group col-md-4 col-sm-4">
                <label>c) Total Experience in other sectors</label>
                <input type="text" readonly class="form-control" name="total_exprnce_othr_sctr" value="<?php print($sec_c1['total_exprnce_othr_sctr']); ?>" required>
              </div>
              <div class="form-group col-md-4 col-sm-4">
                <label>d) Nature</label>
                <input type="text" readonly class="form-control" name="core_prmtrs_nature" value="<?php print($sec_c1['core_prmtrs_nature']); ?>" placeholder="Promoter/Independent/Professional/Family member etc" required>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>2.</strong> Do the Core Promoters employ qualified, experienced and professional management personnel?
                <div class="attach pull-right"> 
				  <?php if($sec_c1['emply_qulifed_exprnc_mngmnt_optnl_atchmnt_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c1['emply_qulifed_exprnc_mngmnt_optnl_atchmnt_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>
              </div>
              <div class="col-md-12">
                <h6>Please provide a brief write up covering the following information in respect of the Senior Management:</h6>
              </div>
              <div class="form-group col-md-12">
                <label>a) Relevant Qualification of the senior management relevant to the portfolio / work being handled</label>
                <textarea readonly  class="form-control" rows="5" name="relvnt_qulfcton_senr_mngmnt_prtflio" ><?php print($sec_c1['relvnt_qulfcton_senr_mngmnt_prtflio']); ?></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>b) Total experience of the senior management.</label>
                <textarea readonly  class="form-control" rows="5" name="total_exprnce_senior_mngmnt" ><?php print($sec_c1['total_exprnce_senior_mngmnt']); ?></textarea>
              </div>
              <div class="form-group col-md-12">
                <label>c) Relevant experience of the senior management relevant to the current portfolio / work being handled</label>
                <textarea readonly  class="form-control" rows="5" name="rlvnt_senr_mngmnt_curent_prtflio_handled" ><?php print($sec_c1['rlvnt_senr_mngmnt_curent_prtflio_handled']); ?></textarea>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>3.</strong> Do the Core Promoters have generally efficient systems and procedures?
                <div class="attach pull-right"> 
				    <?php if($sec_c1['genraly_eficient_systms_prcedurs_optnl_atchmnt_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c1['genraly_eficient_systms_prcedurs_optnl_atchmnt_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>
              </div>
              <div class="col-md-12">
                <h6>Please  provide  a  brief  write  up  covering  the  following  information  in  respect  of  the following:</h6>
              </div>
              <div class="form-group col-md-12">
                <label>a) Timely closing and finalization of books of accounts - Date of signing of Balance Sheet for the past 3 years</label>
                <textarea readonly  class="form-control" rows="5" name="timely_closng_finalztion_acounts"><?php print($sec_c1['timely_closng_finalztion_acounts']); ?></textarea>
              </div>
              <div class="">
                <div class="">
                  <div class="col-md-12">
                    <h6>b) Repute of the statutory & internal audit firms</h6>
                  </div>
                  <div class="form-group col-md-6 col-sm-6">
                    <label>i) Partners and total number of qualified CAs</label>
                    <input type="text" readonly class="form-control" name="prtnrs_total_nmbrs_qualfed_cas" value="<?php print($sec_c1['prtnrs_total_nmbrs_qualfed_cas']); ?>" required>
                  </div>
                  <div class="form-group col-md-6 col-sm-6">
                    <label>ii) Major audits of other companies</label>
                    <input type="text" readonly class="form-control" name="major_audts_othr_cmpny" value="<?php print($sec_c1['major_audts_othr_cmpny']); ?>" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label>iii) Companies in Promoter group being audited by Statutory Auditor/Internal Auditor</label>
                    <input type="text" readonly class="form-control" name="statry_audtrs_and_intrnl_audtrs" value="<?php print($sec_c1['statry_audtrs_and_intrnl_audtrs']); ?>" required>
                  </div>
                </div>
              </div>
              <div class="">
                <div class="">
                  <div class="col-md-12">
                    <h6>c) Independent process/quality certifications </h6>
                  </div>
                  <div class="form-group col-md-12">
                    <label>i) Presence of in house or independent Internal Audit Team/Division</label>
                    <input type="text" readonly class="form-control" name="presnce_indpndnt_intrnl_audt_dvsion" value="<?php print($sec_c1['presnce_indpndnt_intrnl_audt_dvsion']); ?>" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label>ii) Constitution of Audit Committee in consonance of Section 292 A of Companies Act 1956, </label>
                    <input type="text" readonly class="form-control" name="constution_audt_comite_sctn_292" value="<?php print($sec_c1['constution_audt_comite_sctn_292']); ?>" required>
                  </div>
                  <div class="form-group col-md-12">
                    <label>iii) Details of quality certifications (i.e. ISO etc.) assigned to the company by Independent agencies, if any</label>
                    <textarea readonly  class="form-control" rows="5" name="dtls_qulty_certfction_dasign_indpndnt_agncy" ><?php print($sec_c1['dtls_qulty_certfction_dasign_indpndnt_agncy']); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>4.</strong> Have the Core Promoters demonstrated their ability to satisfactorily complete infrastructure, industrial or other projects in the past?
              
              
              <div class="input-group col-md-3 col-sm-3 pull-right">
				  <input type="text" readonly class="form-control" name="dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts" value="<?php print($sec_c1['dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts']); ?>"  placeholder="" aria-describedby="basic-addon2" required>
				  <div class="attach input-group-addon"> 
				  <?php if($sec_c1['dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c1['dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>
</div>
              
              <div class="clearfix"></div>
                
              </div>
              <div class="">
                <div class="">
                  <div class="attachheading"> Details of infrastructure, industrial or other projects handled in the past as per format below:
                  </div>
                  <div class="col-md-12">
                    <table class="table table-bordered gentable">
                      <thead>
                        <tr>
                          <th>Name of the project</th>
                          <th>Sector</th>
                          <th>Project Capacity(if any)</th>
                          <th>Original Project Cost</th>
                          <th>Original targeted date of completion</th>
                          <th>Actual Project cost</th>
                          <th>Actual date of completion</th>
                          <th>Reasons for cost & time overrun (if any)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span>Name of the project</span>
                            <div>&nbsp;</div></td>
                          <td><span>Sector</span>
                            <div>&nbsp;</div></td>
                          <td><span>Project Capacity(if any)</span>
                            <div>&nbsp;</div></td>
                          <td><span>Original Project Cost</span>
                            <div>&nbsp;</div></td>
                          <td><span>Original targeted date of completion</span>
                            <div>&nbsp;</div></td>
                          <td><span>Actual Project cost</span>
                            <div>&nbsp;</div></td>
                          <td><span>Actual date of completion</span>
                            <div>&nbsp;</div></td>
                          <td><span>Reasons for cost & time overrun (if any)</span>
                            <div>&nbsp;</div></td>
                        </tr>
                      </tbody>
                    </table>
                    <p>Similar above details in respect of projects executed by Group companies may also please be provided separately. Relationship with Core Promoter Company needs to be provided along with Percentage equity holding of core promoter in the said group company. Please provide documentary evidence preferably in the form of a Certificate from the Statutory Auditor of your company.</p>
                    <div class="attach"> 
					  <?php if($sec_c1['simlr_dtls_core_prmtrs_statry_audtr_certfcate_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c1['simlr_dtls_core_prmtrs_statry_audtr_certfcate_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
					  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		   <span class="col-md-12" style="color:red;"><strong>NOTE</strong> : In case multiple attachments please make a zip of all the files then upload file.</span>
          <div class="col-md-12 text-right">
		  <button type="button" class="btn print  btn-primary">Print</button>
			 <button type="submit" class="btn nextBtn btn-primary">Save & Next</button>
          </div>
		 
        </div>
	 	
		<!-----------------------step-2------------------>
		
        <div class="row setup-content" id="step-2">
		
          <div class="col-md-12">
            <h4>Business and financial policy</h4>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>5.</strong> Is the size of the Core Promoters existing operations comparable to their expansion plans?
                <div class="attach pull-right"> 
				  <?php if($sec_c2['core_prmtrs_exstng_oprtions_expnsn_plns_optnl_certfcte_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c2['core_prmtrs_exstng_oprtions_expnsn_plns_optnl_certfcte_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>
              </div>
              <div class="">
                <div class="">
                  <div class="col-md-12">
                  <h6>Please provide a brief write up covering the following information:</h6>
                  </div>
                  <div class=" form-group col-md-12">
                    
                    <table class="table table-bordered gentable">
                      <thead>
                        <tr>
                          <th>Existing Aggregate</th>
                          <th>Existing + New Aggregate</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span>Existing Aggregate</span>
                            <div>Turnover</div></td>
                          <td><span>Existing + New Aggregate</span>
                            <div>Turnover</div></td>
                        </tr>
                        <tr>
                          <td><span>Existing Aggregate</span>
                            <div>Net worth</div></td>
                          <td><span>Existing + New Aggregate</span>
                            <div>Net worth</div></td>
                        </tr>
                        <tr>
                          <td><span>Existing Aggregate</span>
                            <div>Production Capacity</div></td>
                          <td><span>Existing + New Aggregate</span>
                            <div>Production Capacity</div></td>
                        </tr>
                        <tr>
                          <td><span>Existing Aggregate</span>
                            <div>Project Cost</div></td>
                          <td><span>Existing + New Aggregate</span>
                            <div>Project Cost</div></td>
                        </tr>
                        <tr>
                          <td><span>Existing Aggregate</span>
                            <div>Total debt</div></td>
                          <td><span>Existing + New Aggregate</span>
                            <div>Total debt</div></td>
                        </tr>
                      </tbody>
                    </table>
                    <textarea readonly  class="form-control" name="exstng_new_aggrgte_brf_infrmtion" rows="5" placeholder="Breif note..." ><?php print($sec_c2['exstng_new_aggrgte_brf_infrmtion']); ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>6.</strong> Do the Core Promoters deploy conservative debt gearing levels to pursue their business plans?
                <div class="attach pull-right"> 
				   <?php if($sec_c2['deploy_cnsrvtve_debt_optnl_atchmnt_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c2['deploy_cnsrvtve_debt_optnl_atchmnt_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>
              </div>
                  <div class=" form-group col-md-12">
                    <label>Please provide your existing debt equity ratio in respect of the existing operations and the debt equity ratio after the proposed expansion plans. Also please indicate average Debt/Equity ratio of Industry in which core promoters are working and the Debt/Equity ratio of top players of the industry in which core promoters are operating.</label>
                    <textarea readonly  class="form-control" rows="5" name="provide_exstng_debt_eqty_ratio_expnsn_pln" ><?php print($sec_c2['provide_exstng_debt_eqty_ratio_expnsn_pln']); ?></textarea>
                  </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>7.</strong> Are the expansion plans of the Core Promoter reasonable and stable in nature?
                <div class="attach pull-right">
				  <?php if($sec_c2['resnble_stble_nature_optnl_atchment_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c2['resnble_stble_nature_optnl_atchment_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>
              </div>
              <div class="">
                <div class="">
                  <div class="col-md-12">
                  <h6>Please provide the details of expansion plans project wise</h6>
                  </div>
                  <div class="col-md-12">
                    
                    <table class="table table-bordered gentable">
                      <thead>
                        <tr>
                          <th rowspan="2">Name of Project</th>
                          <th rowspan="2">Cost</th>
                          <th rowspan="2">Capacity</th>
                          <th rowspan="2">Debt</th>
                          <th rowspan="2">Equity</th>
                          <th rowspan="2">Net worth</th>
                          <th rowspan="2">Proposed Equity/Investment committed</th>
                          <th colspan="2">Already tied up</th>
                          <th colspan="2">Amount invested so far</th>
                        </tr>
                        <tr>
                          
                          <th>Debt</th>
                          <th>Equity</th>
                          <th>Debt</th>
                          <th>Equity</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span>Name of Project</span>
                            <div>&nbsp;</div></td>
                          <td><span>Cost</span>
                            <div>&nbsp;</div></td>
                          <td><span>Capacity</span>
                            <div>&nbsp;</div></td>
                          <td><span>Debt</span>
                            <div>&nbsp;</div></td>
                          <td><span>Equity</span>
                            <div>&nbsp;</div></td>
                          <td><span>Net worth</span>
                            <div>&nbsp;</div></td>
                          <td><span>Proposed Equity/Investment committed</span>
                            <div>&nbsp;</div></td>
                          <td><span>Debt<small>(Already tied up)</small></span>
                            <div>&nbsp;</div></td>
                          <td><span>Equity<small>(Already tied up)</small></span>
                            <div>&nbsp;</div></td>
                          <td><span>Debt<small>(Amount invested so far)</small></span>
                            <div>&nbsp;</div></td>
                          <td><span>Equity<small>(Amount invested so far)</small></span>
                            <div>&nbsp;</div></td>
                        </tr>
                     </tbody>
                    </table>
                    
                  </div>
                    <div class=" form-group col-md-12">
                    <label>a) The complexity and stability of the sector in which the expansion is planned – This might be taken from the sector reports (Industry outlook) released by various reputed credit rating agencies and other firms,</label>
                    <textarea readonly  class="form-control" rows="5" name="complxty_and_stablty_of_thr_sctr" ><?php print($sec_c2['complxty_and_stablty_of_thr_sctr']); ?></textarea>
                  </div>
                    <div class=" form-group col-md-12">
                    <label>b) The similarity of the expansion with the current operations and</label>
                    <textarea readonly  class="form-control" rows="5" name="simlrty_of_the_curnt_oprtion" ><?php print($sec_c2['simlrty_of_the_curnt_oprtion']); ?></textarea>
                  </div>
                    <div class=" form-group col-md-12">
                    <label>c) The ability of the management of the company to take up such related / unrelated expansions in the past</label>
                    <textarea readonly  class="form-control" rows="5" name="ablty_mngmnt_rlted_unrlted_expnsn" ><?php print($sec_c2['ablty_mngmnt_rlted_unrlted_expnsn']); ?></textarea>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>8.</strong> Do the Core Promoters have the policy of hedging foreign currency exposure?
                <div class="attach pull-right"> 
				  <?php if($sec_c2['polcy_hedgng_forgn_curncy_optnl_certfcte_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c2['polcy_hedgng_forgn_curncy_optnl_certfcte_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>
              </div>
              <div class="">
                <div class="">
                  <div class="col-md-12">
                  <h6>Please provide the following details:</h6>
                  </div>
                    <div class=" form-group col-md-12">
                    <label>a) Is your business exposed to foreign exchange fluctuations? Details of foreign currency exposure during past 4 years and amount of profit and loss on account of such exposure along with details of hedged/un hedged exposure</label>
                    <textarea readonly  class="form-control" rows="5" name="busness_expsd_forign_exchnge_flctutions" ><?php print($sec_c2['busness_expsd_forign_exchnge_flctutions']); ?></textarea>
                  </div>
                    <div class=" form-group col-md-12">
                    <label>b) Does the company have a written policy approved by your BOD on hedging or dealing with such foreign exchange currency risk. Please provide copy of company policy</label>
                    <textarea readonly  class="form-control" rows="5" name="writn_polcy_aprvd_bod_hedgng_dlng" ><?php print($sec_c2['writn_polcy_aprvd_bod_hedgng_dlng']); ?></textarea>
                  </div>
                    <div class=" form-group col-md-12">
                    <label>c) Whether the foreign exchange transactions are treated as per the approved policy guidelines</label>
                    <textarea readonly  class="form-control" rows="5" name="whther_forign_exchnge_trnsctions_aprvd_plcy_guidelne" ><?php print($sec_c2['whther_forign_exchnge_trnsctions_aprvd_plcy_guidelne']); ?></textarea>
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
		
		<!----------------------------step-3--------------------->
		

        <div class="row setup-content" id="step-3">
		
          <div class="col-md-12">
            <h4>Project Experience in Power Sector</h4>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>9.</strong> Do the Core Promoters have any experience in the power sector?
                <div class="attach pull-right"> 
				  <?php if($sec_c3['exprnce_prjct_pwr_sctr_optnl_atchmnt_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c3['exprnce_prjct_pwr_sctr_optnl_atchmnt_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>
              </div>
              <div class="">
                <div class="">
                  <div class="col-md-12">
                  <h6>Please provide a write up in respect of the experience of the Core Promoters in respect of managing/completing generation, transmission, distribution, power generating equipment supply and other associated activities of the power sector. The total experience in power sector may be indicated</h6>
                  </div>
                  <div class=" form-group col-md-12">
                    
                    <table class="table table-bordered gentable">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Type of Project</th>
                          <th>Capacity</th>
                          <th>Period of completion</th>
                          <th>Role/Position held by the Core Promoter during the completion period</th>
                          <th>Any other information</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span>S.No</span>
                            <div>&nbsp;</div></td>
                          <td><span>Type of Project</span>
                            <div>&nbsp;</div></td>
                          <td><span>Capacity</span>
                            <div>&nbsp;</div></td>
                          <td><span>Period of completion</span>
                            <div>&nbsp;</div></td>
                          <td><span>Role/Position held by the Core Promoter during the completion period</span>
                            <div>&nbsp;</div></td>
                          <td><span>Any other information</span>
                            <div>&nbsp;</div></td>
                        </tr>
                      </tbody>
                    </table>
                    <textarea required  class="form-control" name="respect_of_mngng_cmpltng_gnrtion_trnsmsion_dstrbtion" rows="5" placeholder="Breif note..." ><?php print($sec_c3['respect_of_mngng_cmpltng_gnrtion_trnsmsion_dstrbtion']); ?></textarea>
                    <p>(The above details needs to be provided in respect of all the power sector projects mentioned by yourselves in Question No. 4 above)</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>10.</strong> Have  the  Core  Promoters  developed  /  operated  any  power  project  comparable  to  the proposed project?
              
              <div class="input-group col-md-3 pull-right">
				  <input type="text" readonly class="form-control" name="devlped_oprtd_per_cmprble_prpsd_prjct" value="<?php print($sec_c3['devlped_oprtd_per_cmprble_prpsd_prjct']); ?>" placeholder="" aria-describedby="basic-addon2" required>
				  <div class="attach input-group-addon"> 
				   <?php if($sec_c3['devlped_oprtd_per_cmprble_prpsd_prjct_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c3['devlped_oprtd_per_cmprble_prpsd_prjct_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>
                  
</div>
              
              <div class="clearfix"></div>
              
              
                
              </div>
              <div class="col-md-12">
              <h6>Please provide the following details:</h6>
              </div>
              <div class="col-md-12">
              <table class="table table-bordered gentable">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Type of Project</th>
                          <th>Capacity</th>
                          <th>Technology used</th>
                          <th>Project cost(Rs. Crores)</th>
                          <th>Any other information</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span>S.No</span>
                            <div>&nbsp;</div></td>
                          <td><span>Type of Project</span>
                            <div>&nbsp;</div></td>
                          <td><span>Capacity</span>
                            <div>&nbsp;</div></td>
                          <td><span>Technology used</span>
                            <div>&nbsp;</div></td>
                          <td><span>Project cost(Rs. Crores)</span>
                            <div>&nbsp;</div></td>
                          <td><span>Any other information</span>
                            <div>&nbsp;</div></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                  <div class=" form-group col-md-12">
                    <p>(The  above  information  needs  to  be  provided  in  respect  of  the  power  sector  projects mentioned by yourselves in Question No. 4 above).</p>
                  </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>11.</strong> Do the Core Promoters have the experience in developing, operating, providing EPC services or manufacturing <br>equipment for power projects?
              
              
              <div class="input-group col-md-3 col-sm-3 pull-right">
			  <input type="text" readonly class="form-control" name="exprnce_devlpng_oprtng_epc_srvcs_mnfctriing" value="<?php print($sec_c3['exprnce_devlpng_oprtng_epc_srvcs_mnfctriing'])?>" aria-describedby="basic-addon2" required>
			  <div class="attach input-group-addon"> 
				  <?php if($sec_c3['exprnce_devlpng_oprtng_epc_srvcs_mnfctriing_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c3['exprnce_devlpng_oprtng_epc_srvcs_mnfctriing_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>                  
</div>
              
              <div class="clearfix"></div>
              
              
                
              </div>
              
              
                  <div class=" form-group col-md-12">
                    <p>The experience of core promoter in manufacturing equipment, developing, operating and providing EPC services for the power projects may be given for each project in a Tabular Form.</p>
                  </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>12.</strong> Do the Core Promoters have power operating capacities comparable to the top domestic players in the relevant space?
              
              
              <div class="input-group col-md-3 col-sm-3 pull-right">
			  <input type="text" readonly class="form-control" name="pwr_oprtng_capcties_top_domstc_plyrs" value="<?php print($sec_c3['pwr_oprtng_capcties_top_domstc_plyrs'])?>" aria-describedby="basic-addon2" required>
			  <div class="attach input-group-addon"> 
				   <?php if($sec_c3['pwr_oprtng_capcties_top_domstc_plyrs_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c3['pwr_oprtng_capcties_top_domstc_plyrs_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span> 
				</a> 
				<?php } ?>
				  </div>                  
</div>
              
              <div class="clearfix"></div>
              
              
                
              </div>
              
              
                  <div class=" form-group col-md-12">
                    <p>If yes, please provide the comparative details in a Tabular Form.</p>
                  </div>
            </div>
          </div>
		 
          <div class="col-md-12 text-right">
		  <button type="button" class="btn print  btn-primary">Print</button>
             <button type="submit" class="btn nextBtn btn-primary">Save & Next</button>
          </div>
		 
        </div>
		
        <!----------------------------step-4------------------------->
		
		<div class="row setup-content" id="step-4">
		
          <div class="col-md-12">
            <h4>Experience in setting up like size projects</h4>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>13.</strong> Have the Core Promoters developed any project of <u>similar nature</u> in the past?
              
               <div class="input-group col-md-3 col-sm-3 pull-right">
  <input required type="text" readonly class="form-control" name="core_prmtrs_prjct_simlr_natre" value="<?php print($sec_c4['core_prmtrs_prjct_simlr_natre']); ?>" aria-describedby="basic-addon2">
  <div class="attach input-group-addon">  
				  <?php if($sec_c4['core_prmtrs_prjct_simlr_natre_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c4['core_prmtrs_prjct_simlr_natre_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>                  
</div>
              
              <div class="clearfix"></div>
              
              
                
              </div>
                  
                  <div class=" form-group col-md-12">
                    <p>Please provide information of total cost of projects completed (both core sector and Non-core sector projects) of similar nature completed in the past.</p>
                  
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>14.</strong> Have the Core Promoters developed or operated any infrastructure project of <u>similar size</u>?
              <div class="input-group col-md-3 col-sm-3 pull-right">
  <input required type="text" readonly class="form-control" name="infrstrcture_prjct_simlr_size" value="<?php print($sec_c4['infrstrcture_prjct_simlr_size']);?>" aria-describedby="basic-addon2">
  <div class="attach input-group-addon">
				  <?php if($sec_c4['infrstrcture_prjct_simlr_size_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c4['infrstrcture_prjct_simlr_size_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>
</div>
<div class="clearfix"></div>
              
              
                
              </div>
                  
                  <div class=" form-group col-md-12">
                    <p>Please provide information of projects developed or operated in <u>infrastructure sector</u> in the past.</p>
                  
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>15.</strong> Have the Core Promoters set up or managed any like size industrial project?
              
              <div class="input-group col-md-3 col-sm-3 pull-right">
  <input required type="text" readonly class="form-control" name="setup__mnged_indstrial_size_prjct" value="<?php print($sec_c4['setup__mnged_indstrial_size_prjct']); ?>" aria-describedby="basic-addon2">
  <div class="attach input-group-addon"> 
				  <?php if($sec_c4['setup__mnged_indstrial_size_prjct_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c4['setup__mnged_indstrial_size_prjct_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>
</div>
<div class="clearfix"></div>
              
                
              </div>
                  
                  <div class=" form-group col-md-12">
                    <p>Please provide information of the <u>industrial</u> projects set up or managed in the past.</p>
                  
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>16.</strong> Do  the  Core  Promoter  have  the  experience  in  developing,  operating  or  providing  EPC services for infrastructure or industrial <br>projects of the like size projects?
              
              <div class="input-group col-md-3 col-sm-3 pull-right">
  <input required type="text" readonly class="form-control" name="providng_epc_srvces_indstrial_or_indstrial_prjcts" value="<?php print($sec_c4['providng_epc_srvces_indstrial_or_indstrial_prjcts']); ?>" aria-describedby="basic-addon2">
  <div class="attach input-group-addon"> 
				  <?php if($sec_c4['providng_epc_srvces_indstrial_or_indstrial_prjcts_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c4['providng_epc_srvces_indstrial_or_indstrial_prjcts_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>
</div>
<div class="clearfix"></div>
              
                
              </div>
                  
                  <div class=" form-group col-md-12">
                    <p>Please provide the information pertaining to the experience of Core Promoters in developing, operating or providing EPC services for infrastructure or industrial projects of similar size in the past</p>
                  
              </div>
            </div>
          </div>
          
          <div class="col-md-12">
            <h4>Experience in India/ Developing countries</h4>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>17.</strong> Do the Core Promoters have any experience of <u>developing/ managing businesses</u> in India or other developing economies?
              
              <div class="input-group col-md-3  col-sm-3 pull-right">
  <input required type="text" readonly class="form-control" name="manged_busines_devlpng_ecnomies" value="<?php print($sec_c4['manged_busines_devlpng_ecnomies']); ?>" aria-describedby="basic-addon2">
  <div class="attach input-group-addon"> 
				  <?php if($sec_c4['manged_busines_devlpng_ecnomies_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c4['manged_busines_devlpng_ecnomies_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>
</div>
<div class="clearfix"></div>
              
              
                
              </div>
                  
                  <div class=" form-group col-md-12">
                    <p>Please provide the information covering the Core Promoters experience, total number of successful years, type of experience in developing / managing businesses in India or other developing economies.</p>
                  
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>18.</strong> Do the Core Promoter have prior experience of dealing with the Government and other regulatory authorities in India?
              
              <div class="input-group col-md-3 col-sm-3 pull-right">
  <input required type="text" readonly class="form-control" name="prior_expirnce_dlng_gov_authrty_india" value="<?php print($sec_c4['prior_expirnce_dlng_gov_authrty_india']); ?>" aria-describedby="basic-addon2">
  <div class="attach input-group-addon"> 
				  <?php if($sec_c4['prior_expirnce_dlng_gov_authrty_india_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c4['prior_expirnce_dlng_gov_authrty_india_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>
</div>
<div class="clearfix"></div>
              
              
                
              </div>
                  
                  <div class=" form-group col-md-12">
                    <p>Please provide the information pertaining to experience of the Core Promoters in dealing with the Government and regulatory authorities in India.</p>
                  
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>19.</strong> Do the Core Promoters have experience of acquiring land and/or obtaining environmental clearances in India?
              
              <div class="input-group col-md-3 col-sm-3 pull-right">
  <input required type="text" readonly class="form-control" name="acquiring_land_clernce_india"  value="<?php print($sec_c4['acquiring_land_clernce_india']);?>" aria-describedby="basic-addon2">
  <div class="attach input-group-addon"> 
				  <?php if($sec_c4['acquiring_land_clernce_india_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c4['acquiring_land_clernce_india_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>
</div>
<div class="clearfix"></div>
              
                
              </div>
                  
                  <div class=" form-group col-md-12">
                    <p>Please provide the information pertaining to the experience of Core Promoters in acquiring land and/or obtaining environmental clearances in India in respect of any project in the past.</p>
                  
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="sub-part">
              <div class="attachheading h4font"><strong>20.</strong> Have the Core Promoters successfully developed/ managed any similar projects in India or other developing economies?
              
              <div class="input-group col-md-3 col-sm-3 pull-right">
  <input required type="text" readonly class="form-control" name="successfully_devlpng_simlr_prjcts_ecnomies" value="<?php print($sec_c4['successfully_devlpng_simlr_prjcts_ecnomies']); ?>" aria-describedby="basic-addon2">
  <div class="attach input-group-addon"> 
				  <?php if($sec_c4['successfully_devlpng_simlr_prjcts_ecnomies_file']) { ?>
				<a target="blank" class="btn btn-success btn-file " href="<?php echo base_url(); ?>uploads/form2/<?php print_r( $sec_c4['successfully_devlpng_simlr_prjcts_ecnomies_file']); ?>"> 
				<span><i class="fa fa-download" aria-hidden="true"></i></span>
				</a> 
				<?php } ?>
				  </div>
</div>
<div class="clearfix"></div>
              
              
                
              </div>
                  
                  <div class=" form-group col-md-12">
                    <p>Please provide the information about the number of similar projects which have been successfully developed or managed by the Core Promoters in the past in India or other developing economies.</p>
                  
              </div>
            </div>
          </div>
		 
          <div class="col-md-12 text-right">
			<button type="button" class="btn print  btn-primary">Print</button>
            <button type="submit" class="btn nextBtn btn-primary">Save &amp; Next</button>
          </div>
       
        </div>
        <div class="row setup-content" id="step-5">
          <div class="col-md-12 generalcontain">
		
            <h3><u>DECLARATION FORM</u></h3>
            <p>I/we confirm/affirm and undertake as below: -</p>
            <ul class="geninstruction">
              <li>That no insolvency proceedings initiated against me/us nor have I/we ever been adjudicated insolvent. Further, that no litigation is pending against the securities proposed to be offered in shape of movable or immovable, in any court in India or outside India.</li>
              <li>That neither I have been defaulter of any bank or financial institution nor any accounts has been written off by any bank/financial institution and that my name doesn‟t appear in RBI caution list/defaulter list etc.</li>
              <li>I am /we are not  closely related to any of the Directors of REC.</li>
              <li>That I /we have read the application form and am/are aware of all the term and conditions of availing finance from REC. I also authorize REC to exchange, share, part with all the information relating to me/our loan details and repayment history information to other bank/financial institution/credit bureaus/agencies as may be required and shall not hold the REC for use of this information.</li>
              <li>I/we shall furnish any information required by REC to process my application for loan and also to be bound by the rules or by the revised additional terms and conditions which may at any time hereafter be made while the loan obtained by me is still outstanding</li>
              <li>And the information given in the application is correct, complete and up to date in all respects and I/we have not withheld any information.</li>
              <li>We undertake that any photocopied document submitted along with loan application format or during the appraisal process or any time thereafter is exact copy of original document.</li>
              <li>Any material discrepancy/deviation subsequently found in any particulars herein furnished would entitle REC to treat the loan application as defunct, in which case the processing fees already paid would be forfeited and a fresh application would be required to be filed to seek financial assistance from REC.</li>
              <li>All information pertaining to borrower and all promoters including information contained in Loan application form including Information memorandum prepared by Lead Bank/FI or syndicator or company or any annexure thereto are true, correct, updated, accurate and is neither misleading nor qualified. We undertake that all information pertaining to promoters has been obtained from authorized representatives of promoters.</li>
              <li>We understand that information furnished by REC towards project, borrower or promoters forms the basis of appraisal. We undertake to inform REC of any up-dations on all/any information furnished to REC for appraisal and undertake to notify REC in writing and in a prompt manner of any of the fact, matter or circumstance (whether existing on or before the submission of Loan application form or arising afterwards) which would could reasonably be expected to cause any of the information given to become, in any manner untrue, inaccurate, in complete or misleading.</li>
              <li>We  undertake  that  any  change  in  promoter  group  structure  will  be  immediately communicated to REC</li>
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
                      <input  class="form-control" type="text" name="place" placeholder="Place" value="<?php echo $sec_c4['place']?>" required/>
                     
                </div>
				<div class="col-md-4">
                
                    <label>Date </label>
                      <input  class="form-control" id="dp34" type="text" name="date" placeholder="dd/mm/yyyy" value="<?php echo $sec_c4['date']?>" required/>
                     
                </div>
				
              </div>
            <div class="form-group">
              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="agree" value="agree"  <?php if($sec_c4['agree'] == "agree"){echo "checked";}?> />
                    I agree with the terms above. </label>
                </div>
              </div>
            
            <div class="col-md-12">
				<button type="button" class="btn print  btn-primary">Print</button>
              <div class="pull-right"> <button type="submit" class="agree btn btn-primary" disabled>Finish</button> </div>
			   
            </div>
            </div>
			
          </div>
          
        </div>

      </form>
    </div>
	</div>
  </section>
</main>
  
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
	
		
  	$('#chky').click(function() {
        if ($(this).is(':checked')) {
			$('#chkybutton').removeAttr('disabled');
        } else {
            $('#chkybutton').attr('disabled', 'disabled');
        }
    });
  </script>
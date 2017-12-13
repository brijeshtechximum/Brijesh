<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form1 extends CI_Controller {

	function __construct() {
       parent::__construct();
	   $this->load->model('Welcome_model','WM');
       $this->load->library('form_validation');
	   
	 }
	 
	 public function apply_new()
	 {
		$this->session->unset_userdata('form_id');
        $this->index();
	  }
	public function check($id)
	{
		
		$this->session->unset_userdata('form_id');
		$this->session->set_userdata('form_id', $id);
		$uri = $this->uri->segment(4);
		if($uri == "GN"){
		
			$this->db->select("url,app_id");	
			$this->db->from('tbl_generation_a');
			$this->db->where('form_id', $id);
			$this->db->where('user_id', $this->session->userdata('user')['id']);
			$url = $this->db->get()->row_array();
		}
		
		if($uri == "RN"){
			
			$this->db->select("url,app_id");	
			$this->db->from('tbl_renew_1');
			$this->db->where('form_id', $id);
			$this->db->where('user_id', $this->session->userdata('user')['id']);
			$url = $this->db->get()->row_array();
		}
		
		if($uri == "TD"){
			
			$this->db->select("url,app_id");	
			$this->db->from('tbl_state_sector');
			$this->db->where('form_id', $id);
			$this->db->where('user_id', $this->session->userdata('user')['id']);
			$url = $this->db->get()->row_array();
		}
		
		if($uri == "SSG"){
			$this->db->select("url,app_id");	
			$this->db->from('tbl_ss_generation_a');
			$this->db->where('form_id', $id);
			$this->db->where('user_id', $this->session->userdata('user')['id']);
			$url = $this->db->get()->row_array();
		}
		
	
		$this->session->set_userdata('app_id', $url['app_id']);
		if(!empty($url['url'])){
			redirect(base_url().$url['url']);
		}else{
			$this->index();
		}
	}

	public function index()
	{
		
		// redirect if user not logged in
		$user_logged_in = $this->session->userdata('user');    
		
    	if (!$user_logged_in) {
			redirect(base_url());
		}
		
		
		$data['form_show'] = trim($this->uri->segment(3));
		$data['step_show'] = trim($this->uri->segment(4));
		
		// fetch data if form is filed for generation form
		$user_id = $this->session->userdata('user')['id'];
			
		
		$data['gn_a'] = $this->WM->get_generation_a();
		
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_generation_2');
		$data['gn_2'] = $this->db->get()->row_array();
		
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_generation_2a');
		$data['gn_2a'] = $this->db->get()->result_array();
		
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_generation_2b');
		$data['gn_2b'] = $this->db->get()->result_array();
		
		
		//$data['gn_2a'] = $this->db->select('*')->from('tbl_generation_2a')->where('user_id', $user_id)->get()->result_array();
		//$data['gn_2b'] = $this->db->select('*')->from('tbl_generation_2b')->where('user_id', $user_id)->get()->result_array();
		$data['gn_b'] = $this->WM->get_generation_b();
		$data['gn_b1'] = $this->WM->get_generation_b1();
		$data['gn_c'] = $this->WM->get_generation_c();
		$data['gn_3'] = $this->WM->get_generation_3();
		$data['gn_san'] = $this->WM->get_generation_2_sanction();
		$data['gn_4'] = $this->WM->get_generation_4();
		$data['rn_1'] = $this->WM->renewal_form_v();
		
		$data['rn_1a'] = $this->WM->get_renewal_1a();
		$data['rn_2'] = $this->WM->renewal_form_2();
		$data['rn_2a'] = $this->WM->renewal_form_2a();
		
		$data['rn_3'] = $this->WM->renewal_form_3();
		$data['rn_4'] = $this->WM->renewal_form_4();
		$data['rn_5'] = $this->WM->renewal_form_5();
		$data['state_sector'] = $this->WM->fetch_state_sector();
		$data['state_sector_a'] = $this->WM->fetch_state_sector_a();
		$data['state_sector_b'] = $this->WM->fetch_state_sector_b();
		$data['state_sector_c'] = $this->WM->fetch_state_sector_c();
		
		$data['ss_gn_a'] = $this->WM->get_ss_generation_a();
		$data['ss_gn_b'] = $this->WM->get_ss_generation_b();
		$data['ss_gn_b1'] = $this->WM->get_ss_generation_b1();
		$data['ss_gn_c'] = $this->WM->get_ss_generation_c();
		
		$data['ss_gn_2'] = $this->WM->get_ss_generation_2();
		$data['ss_gn_san'] = $this->WM->get_ss_generation_2_sanction();
		$data['ss_gn_2a'] = $this->WM->get_ss_generation_2a();
		$data['ss_gn_2b'] = $this->WM->get_ss_generation_2b();
		$data['ss_gn_3'] = $this->WM->get_ss_generation_3();
		$data['ss_gn_4'] = $this->WM->get_ss_generation_4();
		$this->load->view('form1', $data); 
		}
	
	// saving and validations for state sector form
	public function process_state_sector_form(){
		
		$user_id = $this->session->userdata('user')['id'];    
		$check_state_form = $this->WM->check_state_secotr_form_exist($user_id);
		
		if($check_state_form){
			$form_id = $this->session->userdata('form_id');
		}else{
			
			if(!empty($this->input->post('form_id'))) {
				
				$this->session->set_userdata('form_id', $this->input->post('form_id'));
				$form_id = $this->session->userdata('form_id');
				
			}else{
			
			$this->session->unset_userdata('form_id');
		$this->db->select("form_id");
		$this->db->from("tbl_generation_a");
		$this->db->order_by("form_id","desc");
		//$this->db->where("user_id", $user_id);
		$result1 = $this->db->get()->row_array();
		
		if(empty($result1)){
			$result1 = 0;
		}else{
			$result1 = $result1['form_id'];
		}
		
		$this->db->select("form_id");
		$this->db->from("tbl_renew_1");
		$this->db->order_by("form_id","desc");
		$result2 = $this->db->get()->row_array();
		
		if(empty($result2)){
			$result2 = 0;
		}else{
			$result2 = $result2['form_id'];
		}
		
		$this->db->select("form_id");
		$this->db->from("tbl_state_sector");
		$this->db->order_by("form_id","desc");
		$result3 = $this->db->get()->row_array();
		
		if(empty($result3)){
			$result3 = 0;
		}else{
			$result3 = $result3['form_id'];
		}
		
		
		$this->db->select("form_id");
		$this->db->from("tbl_ss_generation_a");
		$this->db->order_by("form_id","desc");
		$result4 = $this->db->get()->row_array();
		if(empty($result4)){
			$result4 = 0;
		}else{
			$result4 = $result4['form_id'];
		}
		
		$getID=array($result1,$result2,$result3,$result4);
		$formID = max($getID) + 1;
		$this->session->set_userdata("form_id", $formID);
			
			$form_id = $this->session->userdata('form_id');
			
			
		}
		}
        
        
		// action here
		if($this->input->method(true)=="POST"){
		$user_id = $this->session->userdata('user')['id'];
		
		// set variable to the user to save form
		if($this->input->post('state_sector')['category']=='SI'){
			$category_si = $this->input->post('state_sector')['category_si'];
			$category_other = "";
		}elseif($this->input->post('state_sector')['category']=='EI'){
			$category_si = "";
			$category_other = "";
		}else{
			
			$category_si = "";
			$category_other = $this->input->post('state_sector')['category_other'];
		}
		
		// setting records for state sector
		$state_sector = array(
			'user_id'=>$this->session->userdata('user')['id'],
			'form_id' => $form_id,
			'borrower_name' => $this->input->post('state_sector')['borrower_name'],
		    'sector' => $this->input->post('state_sector')['sector'],
		    'state' => $this->input->post('state_sector')['state'],
		    'project_name' => $this->input->post('state_sector')['project_name'],
		    'category' => $this->input->post('state_sector')['category'],
			'category_si' => $category_si,
			'category_other' => $category_other,
		    'date_submitted' => date('Y-m-d H:i:s'),
			'status' => '1'
		);
		
		
		
		//check if user already filled up the form
		
		
		//processing sector state form A
		if($check_state_form){
			//update query execute if already have records any record for this form
			
			if($this->WM->update_state_form1($state_sector)){
				
				$this->session->set_flashdata('success', 
					'<div class="alert alert-success alert-dismissable"> 
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success !</strong> State Sector data processed for step 1. please continue to step 2 to complete your form.</div>');
						
			};
			
			
		}else{
			
			//insert query will execute id not exist any record for this form
			
					
			
			$ss_id = $this->WM->insert_state_form1($state_sector);
			if($ss_id){
				// setting records for state sector section A
				$state_sector_a = array(
					'ss_id'=>$ss_id,
					'user_id'=>$this->session->userdata('user')['id'],
					'app_id' => $this->session->userdata('app_id'),
					'form_id' => $form_id,
					'cost_excluding_idc' => $this->input->post('state_sector_a')['cost_excluding_idc'],
					'idc' => $this->input->post('state_sector_a')['idc'],
				    'total_cost' => $this->input->post('state_sector_a')['total_cost'],
				    'debt_equity_ratio' => $this->input->post('state_sector_a')['debt_equity_ratio'],
				    'total_loan_amount' => $this->input->post('state_sector_a')['total_loan_amount'],
				    'loan_amount_req_from_rec' => $this->input->post('state_sector_a')['loan_amount_req_from_rec'],
				    'loan_amount_req_other_lenders' => $this->input->post('state_sector_a')['loan_amount_req_other_lenders'],
					'grant_total' => $this->input->post('state_sector_a')['grant'],
					'hard_cost' => $this->input->post('state_sector_a')['hard_cost'],
					'soft_cost' => $this->input->post('state_sector_a')['soft_cost']
				);
				
				
				$this->WM->insert_state_form1_a($state_sector_a);
				
				$this->session->set_flashdata('success', 
					'<div class="alert alert-success alert-dismissable"> 
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success !</strong> State Sector data processed for step 1. please continue to step 2 to complete your form.</div>');
				
			}
		}

		//check if user already filled up the form a
		$check_state_form_a = $this->WM->check_state_secotr_form_a_exist($user_id);
		
		if($check_state_form_a){
				
				// setting records for state sector section A
				$state_sector_a = array(
					'user_id'=>$this->session->userdata('user')['id'],
					'app_id' => $this->session->userdata('app_id'),
					'form_id' => $form_id,
					'cost_excluding_idc' => $this->input->post('state_sector_a')['cost_excluding_idc'],
					'idc' => $this->input->post('state_sector_a')['idc'],
				    'total_cost' => $this->input->post('state_sector_a')['total_cost'],
				    'debt_equity_ratio' => $this->input->post('state_sector_a')['debt_equity_ratio'],
				    'total_loan_amount' => $this->input->post('state_sector_a')['total_loan_amount'],
				    'loan_amount_req_from_rec' => $this->input->post('state_sector_a')['loan_amount_req_from_rec'],
				    'loan_amount_req_other_lenders' => $this->input->post('state_sector_a')['loan_amount_req_other_lenders'],
					'grant_total' => $this->input->post('state_sector_a')['grant'],
					'hard_cost' => $this->input->post('state_sector_a')['hard_cost'],
					'soft_cost' => $this->input->post('state_sector_a')['soft_cost']
				);
				
				$this->WM->update_state_form1_a($state_sector_a);		
		}else{
			// setting records for state sector section A
			$state_sector_a = array(
				'user_id'=>$this->session->userdata('user')['id'],
				'app_id' => $this->session->userdata('app_id'),
				'form_id' => $form_id,
				'cost_excluding_idc' => $this->input->post('state_sector_a')['cost_excluding_idc'],
				'idc' => $this->input->post('state_sector_a')['idc'],
			    'total_cost' => $this->input->post('state_sector_a')['total_cost'],
			    'debt_equity_ratio' => $this->input->post('state_sector_a')['debt_equity_ratio'],
			    'total_loan_amount' => $this->input->post('state_sector_a')['total_loan_amount'],
			    'loan_amount_req_from_rec' => $this->input->post('state_sector_a')['loan_amount_req_from_rec'],
			    'loan_amount_req_other_lenders' => $this->input->post('state_sector_a')['loan_amount_req_other_lenders'],
				'grant_total' => $this->input->post('state_sector_a')['grant'],
				'hard_cost' => $this->input->post('state_sector_a')['hard_cost'],
				'soft_cost' => $this->input->post('state_sector_a')['soft_cost']
			);
			
			
			$this->WM->insert_state_form1_a($state_sector_a);
			
			$this->session->set_flashdata('success', 
				'<div class="alert alert-success alert-dismissable"> 
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success !</strong> State Sector data processed for step 1. please continue to step 2 to complete your form.</div>');
					
			}


		//check if user already filled up the form b
		$check_state_form_b = $this->WM->check_state_secotr_form_b_exist($user_id);
		if($check_state_form_b){
				// setting records for state sector section B
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				// uploading scope of work file
				if ( ! $this->upload->do_upload('scope_of_work_file'))
                { $error = array('error' => $this->upload->display_errors()); }
                else
                {
                        $scope_of_work_file = array('upload_data' => $this->upload->data());
						$state_sector_b = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'scope_of_work_file' => $scope_of_work_file['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_b_file($state_sector_b, 'scope_of_work_file');
						
                }
				// uploading cost_estimates_basis_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('cost_estimates_basis_file'))
                { $error = array('error' => $this->upload->display_errors()); }
                else
                {
                        $scope_of_work_file = array('upload_data' => $this->upload->data());
						$state_sector_b = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'cost_estimates_basis_file' => $scope_of_work_file['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_b_file($state_sector_b, 'cost_estimates_basis_file');
						
                }
				
				
				// uploading dpr_preparation_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('dpr_preparation_file'))
                { $error = array('error' => $this->upload->display_errors()); }
                else
                {
                        $scope_of_work_file = array('upload_data' => $this->upload->data());
						$state_sector_b = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'dpr_preparation_file' => $scope_of_work_file['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_b_file($state_sector_b, 'dpr_preparation_file');
						
                }
				
				// uploading board_of_directors_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('board_of_directors_file'))
                { $error = array('error' => $this->upload->display_errors()); }
                else
                {
                        $board_of_directors_file = array('upload_data' => $this->upload->data());
						$state_sector_b = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'board_of_directors_file' => $board_of_directors_file['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_b_file($state_sector_b, 'board_of_directors_file');
						
                }
				
				// uploading cea_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('cea_file'))
                { $error = array('error' => $this->upload->display_errors()); }
                else
                {
                        $cea_file = array('upload_data' => $this->upload->data());
						$state_sector_b = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'cea_file' => $cea_file['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_b_file($state_sector_b, 'cea_file');
						
                }
				
				// uploading serc_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('serc_file'))
                { $error = array('error' => $this->upload->display_errors()); }
                else
                {
                        $serc_file = array('upload_data' => $this->upload->data());
						$state_sector_b = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'serc_file' => $serc_file['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_b_file($state_sector_b, 'serc_file');
						
                }
				
				// uploading other_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('other_file'))
                { $error = array('error' => $this->upload->display_errors()); }
                else
                {
                        $other_file = array('upload_data' => $this->upload->data());
						$state_sector_b = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'other_file' => $other_file['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_b_file($state_sector_b, 'other_file');
						
                }
				
				// uploading clearance_req_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('clearance_req_file'))
                { $error = array('error' => $this->upload->display_errors()); }
                else
                {
                        $clearance_req_file = array('upload_data' => $this->upload->data());
						$state_sector_b = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'clearance_req_file' => $clearance_req_file['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_b_file($state_sector_b, 'clearance_req_file');
						
                }
				
				// uploading sanction_letter_of_agency_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('sanction_letter_of_agency_file'))
                { $error = array('error' => $this->upload->display_errors()); }
                else
                {
                        $sanction_letter_of_agency_file = array('upload_data' => $this->upload->data());
						$state_sector_b = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'sanction_letter_of_agency_file' => $sanction_letter_of_agency_file['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_b_file($state_sector_b, 'sanction_letter_of_agency_file');
						
                }
				
				// uploading detail_project_justification_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('detail_project_justification_file'))
                { $error = array('error' => $this->upload->display_errors()); }
                else
                {
                        $detail_project_justification_file = array('upload_data' => $this->upload->data());
						$state_sector_b = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'detail_project_justification_file' => $detail_project_justification_file['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_b_file($state_sector_b, 'detail_project_justification_file');
						
                }
				
				// uploading single_line_project_diagram_file
				
				$config2['upload_path']          = './uploads/forms/';
                $config2['allowed_types']        = '*';
                $config2['max_width'] = 0;
				$config2['max_height'] = 0;
				$config2['max_size'] = 0;
				$config2['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config2);
				
				
				if ( ! $this->upload->do_upload('single_line_project_diagram_file'))
                { $error = array('error' => $this->upload->display_errors()); }
                else
                {
                        $scope_of_work_file = array('upload_data' => $this->upload->data());
						$state_sector_b = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'single_line_project_diagram_file' => $scope_of_work_file['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_b_file($state_sector_b, 'single_line_project_diagram_file');
						
                }
				
				// uploading grid_map_of_proposed_proj_file
				
				$config3['upload_path']          = './uploads/forms/';
                $config3['allowed_types']        = '*';
                $config3['max_width'] = 0;
				$config3['max_height'] = 0;
				$config3['max_size'] = 0;
				$config3['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config3);
				
				if( $this->input->post('state_sector')['sector'] == "Transmission"){
				
					if ( ! $this->upload->do_upload('grid_map_of_proposed_proj_file'))
					{ $error = array('error' => $this->upload->display_errors()); }
					else
					{
							$scope_of_work_file = array('upload_data' => $this->upload->data());
							$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'grid_map_of_proposed_proj_file' => $scope_of_work_file['upload_data']['file_name']
							);
							
							$this->WM->update_state_form1_b_file($state_sector_b,'grid_map_of_proposed_proj_file');
							
					}
				}else{
					
					
							$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'grid_map_of_proposed_proj_file' => ""
							);
							
							$this->WM->update_state_form1_b_file($state_sector_b,'grid_map_of_proposed_proj_file');
				}	
				
				// uploading irr_file
				
				$config4['upload_path']          = './uploads/forms/';
                $config4['allowed_types']        = '*';
                $config4['max_width'] = 0;
				$config4['max_height'] = 0;
				$config4['max_size'] = 0;
				$config4['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config4);
				
				
				if ( ! $this->upload->do_upload('irr_file'))
                { $error = array('error' => $this->upload->display_errors()); }
                else
                {
                        $scope_of_work_file = array('upload_data' => $this->upload->data());
						$state_sector_b = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'irr_file' => $scope_of_work_file['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_b_file($state_sector_b, 'irr_file');
						
                }


				// uploading irr_file
				
				$config5['upload_path']          = './uploads/forms/';
                $config5['allowed_types']        = '*';
                $config5['max_width'] = 0;
				$config5['max_height'] = 0;
				$config5['max_size'] = 0;
				$config5['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config5);
				
				
				if ( ! $this->upload->do_upload('dscr_file'))
                { $error = array('error' => $this->upload->display_errors()); }
                else
                {
                        $scope_of_work_file = array('upload_data' => $this->upload->data());
						$state_sector_b = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'dscr_file' => $scope_of_work_file['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_b_file($state_sector_b, 'dscr_file');
						
                }
				
				if( $this->input->post('state_sector')['sector'] == "Transmission"){
					
					$grid_map_of_proposed_proj = $this->input->post('state_sector_b')['grid_map_of_proposed_proj'];
				}
				else{
					$grid_map_of_proposed_proj = "";
				}
				
				$state_sector_b = array(
					'user_id'=>$this->session->userdata('user')['id'],
					'app_id' => $this->session->userdata('app_id'),
					'form_id' => $form_id,
					'scope_of_work' => $this->input->post('state_sector_b')['scope_of_work'],
					'project_area' => $this->input->post('state_sector_b')['project_area'],
				    'cost_estimates_basis' => $this->input->post('state_sector_b')['cost_estimates_basis'],
				    'dpr_preparation' => $this->input->post('state_sector_b')['dpr_preparation'],
				    'detail_project_justification' => $this->input->post('state_sector_b')['detail_project_justification'],
				    'single_line_project_diagram' => $this->input->post('state_sector_b')['single_line_project_diagram'],
				    'grid_map_of_proposed_proj' => $grid_map_of_proposed_proj,
					'execution_mode' => $this->input->post('state_sector_b')['execution_mode'],
					'tendering_status' => $this->input->post('state_sector_b')['tendering_status'],
					'irr' => $this->input->post('state_sector_b')['irr'],
					'dscr' => $this->input->post('state_sector_b')['dscr'],
				    'board_of_directors' => $this->input->post('state_sector_b')['board_of_directors'],
				    'cea' => $this->input->post('state_sector_b')['cea'],
				    'serc' => $this->input->post('state_sector_b')['serc'],
					'other' => $this->input->post('state_sector_b')['other'],
				    'proj_implementation_period' => $this->input->post('state_sector_b')['proj_implementation_period'],
				    'land_acquisitions_status' => $this->input->post('state_sector_b')['land_acquisitions_status'],
				    'security_provided_for_loan' => $this->input->post('state_sector_b')['security_provided_for_loan'],
				    'escrow_cover_availability' => $this->input->post('state_sector_b')['escrow_cover_availability'],
				    'loan_repayment_period_req' => $this->input->post('state_sector_b')['loan_repayment_period_req'],
					'moratorium'  =>   $this->input->post('state_sector_b')['moratorium'],
				    'clearance_req' => $this->input->post('state_sector_b')['clearance_req'],
				    'sanction_letter_of_agency' => $this->input->post('state_sector_b')['sanction_letter_of_agency'],
				    'consumer_cat' => $this->input->post('state_sector_b')['consumer_cat'],
				    'meter_type' => $this->input->post('state_sector_b')['meter_type'],
				    'ongoing_ie_schemes' => $this->input->post('state_sector_b')['ongoing_ie_schemes'],
				    'ground_water_report' => $this->input->post('state_sector_b')['ground_water_report'],
				    'existing_pumpsets' => $this->input->post('state_sector_b')['existing_pumpsets'],
				    'consumer_contribution' => $this->input->post('state_sector_b')['consumer_contribution'],
				    'purchase_order' => $this->input->post('state_sector_b')['purchase_order'],
				    'bulk_exposure' => $this->input->post('state_sector_b')['bulk_exposure']
				);
				
				$this->WM->update_state_form1_b($state_sector_b);
		}else{
			 
			// setting records for state sector section B
			
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
            
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				// uploading scope of work file
				if ( ! $this->upload->do_upload('scope_of_work_file'))
                { $error = array('error' => $this->upload->display_errors()); $scope_of_work_file ='';}
                else
                {
                        $scope_of_work = array('upload_data' => $this->upload->data());
						$scope_of_work_file = $scope_of_work['upload_data']['file_name'];
						
                }
				
				// uploading cost_estimates_basis_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('cost_estimates_basis_file'))
                { $error = array('error' => $this->upload->display_errors()); $cost_estimates_basis_file ='';}
                else
                {
                        $cost_estimates_basis = array('upload_data' => $this->upload->data());
						$cost_estimates_basis_file = $cost_estimates_basis['upload_data']['file_name'];
						
				}
				
				// uploading dpr_preparation_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('dpr_preparation_file'))
                { $error = array('error' => $this->upload->display_errors()); $dpr_preparation_file ='';}
                else
                {
                        $dpr_preparation = array('upload_data' => $this->upload->data());
						$dpr_preparation_file = $dpr_preparation['upload_data']['file_name'];
						
				}
				
				
				// uploading board_of_directors_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('board_of_directors_file'))
                { $error = array('error' => $this->upload->display_errors()); $board_of_directors_file ='';}
                else
                {
                        $board_of_directors = array('upload_data' => $this->upload->data());
						$board_of_directors_file = $board_of_directors['upload_data']['file_name'];
						
				}
				
				
				// uploading cea_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('cea_file'))
                { $error = array('error' => $this->upload->display_errors()); $cea_file ='';}
                else
                {
                        $cea = array('upload_data' => $this->upload->data());
						$cea_file = $cea['upload_data']['file_name'];
						
				}
				
				
				// uploading serc_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('serc_file'))
                { $error = array('error' => $this->upload->display_errors()); $serc_file ='';}
                else
                {
                        $serc = array('upload_data' => $this->upload->data());
						$serc_file = $serc['upload_data']['file_name'];
						
				}
				
				
				// uploading other_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('other_file'))
                { $error = array('error' => $this->upload->display_errors()); $other_file ='';}
                else
                {
                        $other = array('upload_data' => $this->upload->data());
						$other_file = $other['upload_data']['file_name'];
						
				}
				
				// uploading clearance_req_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('clearance_req_file'))
                { $error = array('error' => $this->upload->display_errors()); $clearance_req_file ='';}
                else
                {
                        $clearance_req = array('upload_data' => $this->upload->data());
						$clearance_req_file = $clearance_req['upload_data']['file_name'];
						
				}
				
				
				// uploading sanction_letter_of_agency_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('sanction_letter_of_agency_file'))
                { $error = array('error' => $this->upload->display_errors()); $sanction_letter_of_agency_file ='';}
                else
                {
                        $sanction_letter_of_agency = array('upload_data' => $this->upload->data());
						$sanction_letter_of_agency_file = $sanction_letter_of_agency['upload_data']['file_name'];
						
				}
				
				// uploading detail_project_justification_file
				
				$config1['upload_path']          = './uploads/forms/';
                $config1['allowed_types']        = '*';
                $config1['max_width'] = 0;
				$config1['max_height'] = 0;
				$config1['max_size'] = 0;
				$config1['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config1);
				
				
				if ( ! $this->upload->do_upload('detail_project_justification_file'))
                { $error = array('error' => $this->upload->display_errors()); $detail_project_justification_file ='';}
                else
                {
                        $detail_project_justification = array('upload_data' => $this->upload->data());
						$detail_project_justification_file = $detail_project_justification['upload_data']['file_name'];
						
				}
				
				// uploading single_line_project_diagram_file
				
				$config2['upload_path']          = './uploads/forms/';
                $config2['allowed_types']        = '*';
                $config2['max_width'] = 0;
				$config2['max_height'] = 0;
				$config2['max_size'] = 0;
				$config2['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config2);
				
				
				if ( ! $this->upload->do_upload('single_line_project_diagram_file'))
                { $error = array('error' => $this->upload->display_errors()); $single_line_project_diagram_file='';}
                else
                {
                        $single_line_project_diagram = array('upload_data' => $this->upload->data());
						$single_line_project_diagram_file = $single_line_project_diagram['upload_data']['file_name'];
                }
				
				// uploading grid_map_of_proposed_proj_file
				
				$config3['upload_path']          = './uploads/forms/';
                $config3['allowed_types']        = '*';
                $config3['max_width'] = 0;
				$config3['max_height'] = 0;
				$config3['max_size'] = 0;
				$config3['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config3);
				
				if( $this->input->post('state_sector')['sector'] == "Transmission"){
				
					if ( ! $this->upload->do_upload('grid_map_of_proposed_proj_file'))
					{ $error = array('error' => $this->upload->display_errors()); $grid_map_of_proposed_proj_file='';}
					else
					{
							$grid_map_of_proposed_proj = array('upload_data' => $this->upload->data());
							$grid_map_of_proposed_proj_file = $grid_map_of_proposed_proj['upload_data']['file_name'];
					}
				}else{
					$grid_map_of_proposed_proj_file = "";
				}
				
				// uploading irr_file
				
				$config4['upload_path']          = './uploads/forms/';
                $config4['allowed_types']        = '*';
                $config4['max_width'] = 0;
				$config4['max_height'] = 0;
				$config4['max_size'] = 0;
				$config4['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config4);
				
				
				if ( ! $this->upload->do_upload('irr_file'))
                { $error = array('error' => $this->upload->display_errors()); $irr_file='';}
                else
                {
                        $irr = array('upload_data' => $this->upload->data());
						$irr_file = $irr['upload_data']['file_name'];
                }

				// uploading irr_file
				
				$config5['upload_path']          = './uploads/forms/';
                $config5['allowed_types']        = '*';
                $config5['max_width'] = 0;
				$config5['max_height'] = 0;
				$config5['max_size'] = 0;
				$config5['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config5);
				
				
				if ( ! $this->upload->do_upload('dscr_file'))
                { $error = array('error' => $this->upload->display_errors()); $dscr_file ='';}
                else
                {
                        $dscr = array('upload_data' => $this->upload->data());
						$dscr_file = $dscr['upload_data']['file_name'];
                }
				
				if( $this->input->post('state_sector')['sector'] == "Transmission"){
				
					$grid_map_of_proposed_proj = $this->input->post('state_sector_b')['grid_map_of_proposed_proj'];
				}
				else{
					$grid_map_of_proposed_proj = "";
				}
				
			$state_sector_b = array(
				'user_id'=>$this->session->userdata('user')['id'],
				'app_id' => $this->session->userdata('app_id'),
				'form_id' => $form_id,
				'scope_of_work' => $this->input->post('state_sector_b')['scope_of_work'],
				'scope_of_work_file' => $scope_of_work_file,
				'project_area' => $this->input->post('state_sector_b')['project_area'],
			    'cost_estimates_basis' => $this->input->post('state_sector_b')['cost_estimates_basis'],
			    'dpr_preparation' => $this->input->post('state_sector_b')['dpr_preparation'],
				'cost_estimates_basis_file' => $cost_estimates_basis_file,
			    'dpr_preparation_file' => $dpr_preparation_file,
				'detail_project_justification_file' => $detail_project_justification_file,
			    'detail_project_justification' => $this->input->post('state_sector_b')['detail_project_justification'],
			    'single_line_project_diagram' => $this->input->post('state_sector_b')['single_line_project_diagram'],
			    'single_line_project_diagram_file' => $single_line_project_diagram_file,
			    'grid_map_of_proposed_proj' => $grid_map_of_proposed_proj,
			    'grid_map_of_proposed_proj_file' => $grid_map_of_proposed_proj_file,
				'execution_mode' => $this->input->post('state_sector_b')['execution_mode'],
				'tendering_status' => $this->input->post('state_sector_b')['tendering_status'],
				'irr' => $this->input->post('state_sector_b')['irr'],
				'irr_file' => $irr_file,
				'dscr' => $this->input->post('state_sector_b')['dscr'],
				'dscr_file' => $dscr_file,
			    'board_of_directors' => $this->input->post('state_sector_b')['board_of_directors'],
				'board_of_directors_file' => $board_of_directors_file,
			    'cea' => $this->input->post('state_sector_b')['cea'],
				'cea_file' => $cea_file,
			    'serc' => $this->input->post('state_sector_b')['serc'],
				'serc_file' => $serc_file,
				'other' => $this->input->post('state_sector_b')['other'],
				'other_file' => $other_file,
			    'proj_implementation_period' => $this->input->post('state_sector_b')['proj_implementation_period'],
			    'land_acquisitions_status' => $this->input->post('state_sector_b')['land_acquisitions_status'],
			    'security_provided_for_loan' => $this->input->post('state_sector_b')['security_provided_for_loan'],
			    'escrow_cover_availability' => $this->input->post('state_sector_b')['escrow_cover_availability'],
			    'loan_repayment_period_req' => $this->input->post('state_sector_b')['loan_repayment_period_req'],
				'moratorium'  =>   $this->input->post('state_sector_b')['moratorium'],
			    'clearance_req' => $this->input->post('state_sector_b')['clearance_req'],
				'clearance_req_file' => $clearance_req_file,
			    'sanction_letter_of_agency' => $this->input->post('state_sector_b')['sanction_letter_of_agency'],
				'sanction_letter_of_agency_file' => $sanction_letter_of_agency_file,
			    'consumer_cat' => $this->input->post('state_sector_b')['consumer_cat'],
			    'meter_type' => $this->input->post('state_sector_b')['meter_type'],
			    'ongoing_ie_schemes' => $this->input->post('state_sector_b')['ongoing_ie_schemes'],
			    'ground_water_report' => $this->input->post('state_sector_b')['ground_water_report'],
			    'existing_pumpsets' => $this->input->post('state_sector_b')['existing_pumpsets'],
			    'consumer_contribution' => $this->input->post('state_sector_b')['consumer_contribution'],
			    'purchase_order' => $this->input->post('state_sector_b')['purchase_order'],
			    'bulk_exposure' => $this->input->post('state_sector_b')['bulk_exposure']
			);
			
			
			$this->WM->insert_state_form1_b($state_sector_b);
			
			$this->session->set_flashdata('success', 
				'<div class="alert alert-success alert-dismissable"> 
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success !</strong> State Sector data processed for step 1. please continue to step 2 to complete your form.</div>');
					
			}

		//check if user already filled up the form c
		$check_state_form_c = $this->WM->check_state_secotr_form_c_exist($user_id);
		if($check_state_form_c){
	
			// setting records for state sector section C
			
			// uploading mou_sign_with_utility
				
				$config6['upload_path']          = './uploads/forms/';
                $config6['allowed_types']        = '*';
                $config6['max_width'] = 0;
				$config6['max_height'] = 0;
				$config6['max_size'] = 0;
				$config6['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config6);
				
				
				if ( ! $this->upload->do_upload('mou_sign_with_utility'))
                { $error = array('error' => $this->upload->display_errors()); }
                else
                {
                        $mou_sign_with_utility = array('upload_data' => $this->upload->data());
						
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'mou_sign_with_utility' => $mou_sign_with_utility['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_c_file($state_sector_c, 'mou_sign_with_utility');
                }

				// uploading admin_approve_utility
				
				$config7['upload_path']          = './uploads/forms/';
                $config7['allowed_types']        = '*';
                $config7['max_width'] = 0;
				$config7['max_height'] = 0;
				$config7['max_size'] = 0;
				$config7['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config7);
				
				
				if ( ! $this->upload->do_upload('admin_approve_utility'))
                { $error = array('error' => $this->upload->display_errors()); $admin_approve_utility_file ='';}
                else
                {
                        $admin_approve_utility = array('upload_data' => $this->upload->data());
						
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'admin_approve_utility' => $admin_approve_utility['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_c_file($state_sector_c, 'admin_approve_utility');
                }
				
				// Brief write file
				
				$config7['upload_path']          = './uploads/forms/';
                $config7['allowed_types']        = '*';
                $config7['max_width'] = 0;
				$config7['max_height'] = 0;
				$config7['max_size'] = 0;
				$config7['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config7);
				
				
				if ( ! $this->upload->do_upload('brief_write_file'))
                { $error = array('error' => $this->upload->display_errors()); $admin_approve_utility_file ='';}
                else
                {
                        $brief_write_file = array('upload_data' => $this->upload->data());
						
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'brief_write_file' => $brief_write_file['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_c_file($state_sector_c, 'brief_write_file');
                }
				
				if ( ! $this->upload->do_upload('audit_ac_status_file'))
                { $error = array('error' => $this->upload->display_errors()); $audit_ac_status_file ='';}
                else
                {
                        $audit_ac_status_file = array('upload_data' => $this->upload->data());
						
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'audit_ac_status_file' => $audit_ac_status_file['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_c_file($state_sector_c, 'audit_ac_status_file');
                }
				
				if ( ! $this->upload->do_upload('rec_exposure_file'))
                { $error = array('error' => $this->upload->display_errors()); $rec_exposure_file ='';}
                else
                {
                        $rec_exposure_file = array('upload_data' => $this->upload->data());
						
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'rec_exposure_file' => $rec_exposure_file['upload_data']['file_name']
						);
						
						$this->WM->update_state_form1_c_file($state_sector_c, 'rec_exposure_file');
                }
				
			$state_sector_c = array(
				'user_id'=>$this->session->userdata('user')['id'],
				'app_id' => $this->session->userdata('app_id'),
				'form_id' => $form_id,
				'power_position'=>$this->input->post('state_sector_c')['power_position'],
				//'consumer_mix'=>$this->input->post('state_sector_c')['consumer_mix'],
				//'existing_infra'=>$this->input->post('state_sector_c')['existing_infra'],
				'audit_ac_status'=>$this->input->post('state_sector_c')['audit_ac_status'],
				'networth'=>$this->input->post('state_sector_c')['networth'],
				'total_revenue'=>$this->input->post('state_sector_c')['total_revenue'],
				'total_expenditure'=>$this->input->post('state_sector_c')['total_expenditure'],
				'profit_after_tax'=>$this->input->post('state_sector_c')['profit_after_tax'],
				'tariff_petition'=>$this->input->post('state_sector_c')['tariff_petition'],
				'tarriff_order'=>$this->input->post('state_sector_c')['tarriff_order'],
				'regulatory_assets_approved'=>$this->input->post('state_sector_c')['regulatory_assets_approved'],
				'acs'=>$this->input->post('state_sector_c')['acs'],
				'arr'=>$this->input->post('state_sector_c')['arr'],
				'fy1'=>$this->input->post('state_sector_c')['fy1'],
				'fy2'=>$this->input->post('state_sector_c')['fy2'],
				'fy3'=>$this->input->post('state_sector_c')['fy3'],
				'default_status'=>$this->input->post('state_sector_c')['default_status'],
				'entity_grade'=>$this->input->post('state_sector_c')['entity_grade'],
				'rec_exposure'=>$this->input->post('state_sector_c')['rec_exposure'],
				'relaxations'=>$this->input->post('state_sector_c')['relaxations'],
				'chkUtility' => $this->input->post('state_sector_c')['chkUtility'],
				'chkappUtility' => $this->input->post('state_sector_c')['chkappUtility']
			);
			
				$this->WM->update_state_form1_c($state_sector_c);		
		}else{
			    // setting records for state sector section C
			
				// uploading mou_sign_with_utility
				
				$config6['upload_path']          = './uploads/forms/';
                $config6['allowed_types']        = '*';
                $config6['max_width'] = 0;
				$config6['max_height'] = 0;
				$config6['max_size'] = 0;
				$config6['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config6);
				
				
				if ( ! $this->upload->do_upload('mou_sign_with_utility'))
                { $error = array('error' => $this->upload->display_errors()); $mou_sign_with_utility_file='';}
                else
                {
                        $mou_sign_with_utility = array('upload_data' => $this->upload->data());
						$mou_sign_with_utility_file = $mou_sign_with_utility['upload_data']['file_name'];
                }

				// uploading admin_approve_utility
				
				$config7['upload_path']          = './uploads/forms/';
                $config7['allowed_types']        = '*';
                $config7['max_width'] = 0;
				$config7['max_height'] = 0;
				$config7['max_size'] = 0;
				$config7['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config7);
				
				
				if ( ! $this->upload->do_upload('admin_approve_utility'))
                { $error = array('error' => $this->upload->display_errors()); $admin_approve_utility_file ='';}
                else
                {
                        $admin_approve_utility = array('upload_data' => $this->upload->data());
						$admin_approve_utility_file = $admin_approve_utility['upload_data']['file_name'];
                }
				
				// Brief write file
				
				$config7['upload_path']          = './uploads/forms/';
                $config7['allowed_types']        = '*';
                $config7['max_width'] = 0;
				$config7['max_height'] = 0;
				$config7['max_size'] = 0;
				$config7['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config7);
				
				
				if ( ! $this->upload->do_upload('brief_write_file'))
                { $error = array('error' => $this->upload->display_errors()); $brief_write_file1 ='';}
                else
                {
                        $brief_write_file = array('upload_data' => $this->upload->data());
						$brief_write_file1 = $brief_write_file['upload_data']['file_name'];
                }
				
				// audit_ac_status_file
				
				$config7['upload_path']          = './uploads/forms/';
                $config7['allowed_types']        = '*';
                $config7['max_width'] = 0;
				$config7['max_height'] = 0;
				$config7['max_size'] = 0;
				$config7['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config7);
				
				
				if ( ! $this->upload->do_upload('audit_ac_status_file'))
                { $error = array('error' => $this->upload->display_errors()); $audit_ac_status_file ='';}
                else
                {
                        $audit_ac_status = array('upload_data' => $this->upload->data());
						$audit_ac_status_file = $audit_ac_status['upload_data']['file_name'];
                }
				
				// rec_exposure_file
				
				$config7['upload_path']          = './uploads/forms/';
                $config7['allowed_types']        = '*';
                $config7['max_width'] = 0;
				$config7['max_height'] = 0;
				$config7['max_size'] = 0;
				$config7['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config7);
				
				
				if ( ! $this->upload->do_upload('rec_exposure_file'))
                { $error = array('error' => $this->upload->display_errors()); $rec_exposure_file ='';}
                else
                {
                        $rec_exposure = array('upload_data' => $this->upload->data());
						$rec_exposure_file = $rec_exposure['upload_data']['file_name'];
                }
				
			$state_sector_c = array(
				'user_id'=>$this->session->userdata('user')['id'],
				'app_id' => $this->session->userdata('app_id'),
				'form_id' => $form_id,
				'power_position'=>$this->input->post('state_sector_c')['power_position'],
				//'consumer_mix'=>$this->input->post('state_sector_c')['consumer_mix'],
				//'existing_infra'=>$this->input->post('state_sector_c')['existing_infra'],
				'audit_ac_status'=>$this->input->post('state_sector_c')['audit_ac_status'],
				'networth'=>$this->input->post('state_sector_c')['networth'],
				'total_revenue'=>$this->input->post('state_sector_c')['total_revenue'],
				'total_expenditure'=>$this->input->post('state_sector_c')['total_expenditure'],
				'profit_after_tax'=>$this->input->post('state_sector_c')['profit_after_tax'],
				'tariff_petition'=>$this->input->post('state_sector_c')['tariff_petition'],
				'tarriff_order'=>$this->input->post('state_sector_c')['tarriff_order'],
				'regulatory_assets_approved'=>$this->input->post('state_sector_c')['regulatory_assets_approved'],
				'acs'=>$this->input->post('state_sector_c')['acs'],
				'arr'=>$this->input->post('state_sector_c')['arr'],
				'fy1'=>$this->input->post('state_sector_c')['fy1'],
				'fy2'=>$this->input->post('state_sector_c')['fy2'],
				'fy3'=>$this->input->post('state_sector_c')['fy3'],
				'default_status'=>$this->input->post('state_sector_c')['default_status'],
				'entity_grade'=>$this->input->post('state_sector_c')['entity_grade'],
				'rec_exposure'=>$this->input->post('state_sector_c')['rec_exposure'],
				'relaxations'=>$this->input->post('state_sector_c')['relaxations'],
				'chkUtility' => $this->input->post('state_sector_c')['chkUtility'],
				'chkappUtility' => $this->input->post('state_sector_c')['chkappUtility'],
				'mou_sign_with_utility'=>$mou_sign_with_utility_file,
				'admin_approve_utility' => $admin_approve_utility_file,
				'brief_write_file' => $brief_write_file1,
				'rec_exposure_file' => $rec_exposure_file,
				'audit_ac_status_file' => $audit_ac_status_file
			);
			
			
			$this->WM->insert_state_form1_c($state_sector_c);
			
			$this->session->set_flashdata('success', 
				'<div class="alert alert-success alert-dismissable"> 
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success !</strong> State Sector data processed for step 1. please continue to step 2 to complete your form.</div>');
			
			
				$data = array(
					'url' => "form1/index/statesectorthings/step2",
				);
				$this->db->where('user_id', $user_id);
				$this->db->where("form_id", $this->session->userdata('form_id'));
				$this->db->update('tbl_state_sector', $data);
			
					
			}
		}
		redirect(base_url()."form1/index/statesectorthings/step2");
		#$this->load->view('form1');
		
	}


	public function process_state_sector_form_agree(){
		
		
		if($this->input->method(true)=="POST"){
			$status = array(
				'place' => $this->input->post('place'),
				'date' => $this->input->post('date'),
				"state_sector_agree"=>$this->input->post('state_sector_agree')
			);
			
			$this->db->where('user_id', $this->session->userdata('user')['id']);
			$this->db->where("form_id", $this->session->userdata('form_id'));
			$this->db->update('tbl_state_sector', $status);
			
			$this->db->select("url");
			$this->db->from("tbl_state_sector");
			$this->db->where('user_id', $this->session->userdata('user')['id']);
			$this->db->where("form_id", $this->session->userdata('form_id'));
			$url = $this->db->get()->row_array();
			if($url){
			$data = array(
					'url' => "",
				);
				$this->db->where('user_id', $this->session->userdata('user')['id']);
				$this->db->where("form_id", $this->session->userdata('form_id'));
				$this->db->update('tbl_state_sector', $data);
			}	
			
			if($this->input->post('state_sector_agree')){
				$data['msg'] = '<div class="alert alert-success">Dear %s, <br />Your State sector form has been successfully submitted. Please wait while we review your form. <br><br> Sincerely, <br>RECL Team</div>';	
			}else{
				$data['msg'] = '<div class="alert alert-warning">Dear %s, <br />Your State sector form has been successfully submitted. You must agree our T&C to complete your form if you do not afree to our T&C the form remains incomplete. 
				<br ><br > <a href="'.base_url().'form1/index/statesectorthings/step2" class="btn btn-default">Click here to go back to previous page</a> 
				<br><br> Sincerely, <br>RECL Team</div>';
			}
			
		}
		
		$this->load->view('success', $data);
	}
	
	public function process_generation_a()
	{
		
		$app_id = $this->session->userdata('app_id');
		$user_id = $this->session->userdata('user')['id'];
		$form_id = $this->session->userdata('form_id');
		
		//check if user already filled up the form A

		$check_gn_a = $this->WM->check_gn_a_exist($user_id);
		
		$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
		$config = 	array(
					array(
							'field' => 'gn_a[project_name]',
							'label' => 'Project name',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_type]',
							'label' => 'Project Type',
							'rules' => 'trim|required|max_length[10]|alpha',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_type_others]',
							'label' => 'Project Type',
							'rules' => 'trim|max_length[10]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_capacity]',
							'label' => 'Capacity of each unit',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_unit]',
							'label' => 'No. of Units',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_each_unit]',
							'label' => 'Capacity of each unit',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_location]',
							'label' => 'Location',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_power_sale_arrangement]',
							'label' => 'Power Sale Arrangement',
							'rules' => 'trim|required|max_length[10]|alpha',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_power_sale_arrangement_other]',
							'label' => 'Power Sale Arrangement',
							'rules' => 'trim|max_length[10]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_cost_without_idc]',
							'label' => 'Project Cost without IDC',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_idc_interest_durin_construction]',
							'label' => 'IDC (Interest During Construction)',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_cost_debt]',
							'label' => 'Debt % ',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_cost_equity]',
							'label' => 'Equity %',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_cost_equity]',
							'label' => 'Loan Requested',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_lead_fi]',
							'label' => 'Lead under',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_construction_period]',
							'label' => 'Project Construction Period',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_loan_repayment_period]',
							'label' => 'Loan Repayment Period',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_scheduled_completion_date]',
							'label' => 'SCOD',
							'rules' => 'trim|required|max_length[12]|callback_SCOD',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
									
								)
					),
					array(
							'field' => 'gn_a[renifed_applicable]',
							'label' => 'SCOD(Revised if Applicable)',
							'rules' => 'trim|required|max_length[12]|callback_SCOD',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
									
								)
					),
					array(
							'field' => 'gn_a[project_irr]',
							'label' => 'Project IRR %',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_dscr]',
							'label' => 'Project DSCR',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_levellised_tariff]',
							'label' => 'Levellised Tariff',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_year_tariff]',
							'label' => 'Year Tariff',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_a[project_levellised_cost_of_generation_excluding_roe]',
							'label' => 'Levellised cost of generation Excluding RoE',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_b[borrower_name]',
							'label' => 'Name of The Borrower',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_b[directors][]',
							'label' => 'Director',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_b1[borrower_promoters_name][]',
							'label' => 'Name of The Promoters of Borrower',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_b1[shareholding_promoter][]',
							'label' => '% Shareholding of Promoter ',
							'rules' => 'trim|required|max_length[3]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must be 100 or less then 100.',
								)
					),
					array(
							'field' => 'gn_b1[phn_no][]',
							'label' => 'Phone No.',
							'rules' => 'trim|required|max_length[12]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'gn_b1[email][]',
							'label' => 'Email',
							'rules' => 'trim|required|valid_email',
							'errors' => array(
									
									
									'valid_email'  =>	'{field} must be a valid email.'
								)
					),
					array(
							'field' => 'gn_b1[address][]',
							'label' => 'Address',
							'rules' => 'trim|required|max_length[12]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
									
								)
					),
					array(
							'field' => 'gn_b[group_company_name]',
							'label' => 'Name of Group Company',
							'rules' => 'trim|required|max_length[12]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
									
								)
					),
					array(
							'field' => 'gn_b[group_company_structure]',
							'label' => 'Structure of Group Company',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
									
								)
					),
					array(
							'field' => 'gn_b[group_company_promoter]',
							'label' => 'Promoter Contribution',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
									
								)
					),
					array(
							'field' => 'gn_c[authorized_signatory_project_name]',
							'label' => 'Name',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
									
								)
					),
					array(
							'field' => 'gn_c[authorized_signatory_project_address]',
							'label' => 'Address',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
									
								)
					),
					array(
							'field' => 'gn_c[authorized_signatory_project_phone]',
							'label' => 'Phone',
							'rules' => 'trim|required|max_length[12]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
									
								)
					),
					array(
							'field' => 'gn_c[authorized_signatory_project_email]',
							'label' => 'Email',
							'rules' => 'trim|required|valid_email',
							'errors' => array(
									
									
									
								)
					),
					array(
							'field' => 'gn_c[authorized_signatory_project_pan]',
							'label' => 'PAN',
							'rules' => 'trim|required|callback_pan',
							'errors' => array(
									
									
									
								)
					),
					array(
							'field' => 'gn_c[authorized_signatory_project_aadhar]',
							'label' => 'Aadhar Number',
							'rules' => 'trim|required|max_length[12]|numeric',
							'errors' => array(
									
									'pattern'	=> 	'{field} must be a valid Aadhar Number'
									
								)
					),
					array(
							'field' => 'gn_c[authorized_person_borrower_name]',
							'label' => 'Name',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
									
								)
					),
					array(
							'field' => 'gn_c[authorized_person_borrower_address]',
							'label' => 'Address',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
									
								)
					),
					array(
							'field' => 'gn_c[authorized_person_borrower_phone]',
							'label' => 'Phone',
							'rules' => 'trim|required|max_length[12]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
									
								)
					),
					array(
							'field' => 'gn_c[authorized_person_borrower_email]',
							'label' => 'Email',
							'rules' => 'trim|required|valid_email',
							'errors' => array(
									
									
									
								)
					),
					array(
							'field' => 'gn_c[authorized_person_borrower_pan]',
							'label' => 'PAN',
							'rules' => 'trim|required|callback_pan',
							'errors' => array(
									
									
									
								)
					),
					array(
							'field' => 'gn_c[authorized_person_borrower_adhaar_number]',
							'label' => 'Aadhar Number',
							'rules' => 'trim|required|max_length[12]|numeric',
							'errors' => array(
									
									'pattern'	=> 	'{field} must be a valid Aadhar Number'
									
								)
					),
					
			);
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE)
			{			
		
		//if already exists then do update records
		if($check_gn_a){
			
			
			if($this->input->post('gn_a')['project_type']==1){
				$project_type = $this->input->post('gn_a')['project_type'];
			}else{
				$project_type = $this->input->post('gn_a')['project_type'];
			}

			if($this->input->post('gn_a')['project_power_sale_arrangement']==1){
				$project_power_sale_arrangement = $this->input->post('gn_a')['project_power_sale_arrangement_other'];
			}else{
				$project_power_sale_arrangement = $this->input->post('gn_a')['project_power_sale_arrangement'];
			}
			
			if($this->input->post('gn_a')['project_type'] == "Thermal" || $this->input->post('gn_a')['project_type'] == "Hydro" || $this->input->post('gn_a')['project_type'] == "Nuclear"){
				
				$project_type_others = ""; 
				
			}else{
				$project_type_others = $this->input->post('gn_a')['project_type_others'];
			}
			
			if($this->input->post('gn_a')['project_power_sale_arrangement'] == "Captive" || $this->input->post('gn_a')['project_power_sale_arrangement'] == "Merchant" || $this->input->post('gn_a')['project_power_sale_arrangement'] == "IPP"){
				
				$project_power_sale_arrangement_other = ""; 
				
			}else{
				$project_power_sale_arrangement_other = $this->input->post('gn_a')['project_power_sale_arrangement_other'];
			}
				$db = get_instance()->db->conn_id;
				
			$gn_a = array(
				'user_id' => $user_id,
				'form_id' => $form_id,
				'project_name' => mysqli_real_escape_string($db, $this->input->post('gn_a')['project_name']),
				'project_type' =>$project_type,
				'project_type_others' =>$project_type_others,
				'project_capacity' =>$this->input->post('gn_a')['project_capacity'],
				'project_unit' =>$this->input->post('gn_a')['project_unit'],
				'project_each_unit' =>$this->input->post('gn_a')['project_each_unit'],
				'project_location' =>$this->input->post('gn_a')['project_location'],
				'project_power_sale_arrangement' =>$this->input->post('gn_a')['project_power_sale_arrangement'],
				'project_power_sale_arrangement_other' => $project_power_sale_arrangement_other,
				'project_cost_without_idc' =>$this->input->post('gn_a')['project_cost_without_idc'],
				'project_idc_interest_durin_construction' =>$this->input->post('gn_a')['project_idc_interest_durin_construction'],
				'project_cost_with_idc' =>$this->input->post('gn_a')['project_cost_with_idc'],
				'project_cost_per_mw' =>$this->input->post('gn_a')['project_cost_per_mw'],
				'project_cost_debt' =>$this->input->post('gn_a')['project_cost_debt'],
				'project_cost_equity' =>$this->input->post('gn_a')['project_cost_equity'],
				'project_amount_equity' =>$this->input->post('gn_a')['project_amount_equity'],
				'project_debt_amount' =>$this->input->post('gn_a')['project_debt_amount'],
				'project_loan_requested' =>$this->input->post('gn_a')['project_loan_requested'],
				'project_lead_fi' =>$this->input->post('gn_a')['project_lead_fi'],
				'project_construction_period' =>$this->input->post('gn_a')['project_construction_period'],
				'project_loan_repayment_period' =>$this->input->post('gn_a')['project_loan_repayment_period'],
				'project_scheduled_completion_date' =>$this->input->post('gn_a')['project_scheduled_completion_date'],
				'renifed_applicable' =>$this->input->post('gn_a')['renifed_applicable'],
				'project_irr' =>$this->input->post('gn_a')['project_irr'],
				'project_dscr' =>$this->input->post('gn_a')['project_dscr'],
				'project_levellised_tariff' =>$this->input->post('gn_a')['project_levellised_tariff'],
				'project_year_tariff' =>$this->input->post('gn_a')['project_year_tariff'],
				'project_levellised_cost_of_generation_excluding_roe' =>$this->input->post('gn_a')['project_levellised_cost_of_generation_excluding_roe'],
			); 
			
			//Insert query execute
			$this->WM->update_gn_a($gn_a);
			
			
		}else{
			//set variables for insert data in tbl_generation_a
			
			if(!empty($this->input->post('form_id'))) {
				
				$this->session->set_userdata('form_id', $this->input->post('form_id'));
				$form_id = $this->session->userdata('form_id');
				
			}else{
			
			
			$this->session->unset_userdata('form_id');
		$this->db->select("form_id");
		$this->db->from("tbl_generation_a");
		$this->db->order_by("form_id","desc");
		//$this->db->where("user_id", $user_id);
		$result1 = $this->db->get()->row_array();
		
		if(empty($result1)){
			$result1 = 0;
		}else{
			$result1 = $result1['form_id'];
		}
		
		$this->db->select("form_id");
		$this->db->from("tbl_renew_1");
		$this->db->order_by("form_id","desc");
		$result2 = $this->db->get()->row_array();
		
		if(empty($result2)){
			$result2 = 0;
		}else{
			$result2 = $result2['form_id'];
		}
		
		$this->db->select("form_id");
		$this->db->from("tbl_state_sector");
		$this->db->order_by("form_id","desc");
		$result3 = $this->db->get()->row_array();
		
		if(empty($result3)){
			$result3 = 0;
		}else{
			$result3 = $result3['form_id'];
		}
		
		
		$this->db->select("form_id");
		$this->db->from("tbl_ss_generation_a");
		$this->db->order_by("form_id","desc");
		$result4 = $this->db->get()->row_array();
		if(empty($result4)){
			$result4 = 0;
		}else{
			$result4 = $result4['form_id'];
		}
		
		$getID=array($result1,$result2,$result3,$result4);
		$formID = max($getID) + 1;
		$this->session->set_userdata("form_id", $formID);
			
			
			$form_id = $this->session->userdata('form_id');
			
			}	
			
			
			if($this->input->post('gn_a')['project_type']==1){
				$project_type = $this->input->post('gn_a')['project_type_others'];
			}else{
				$project_type = $this->input->post('gn_a')['project_type'];
			}

			if($this->input->post('gn_a')['project_power_sale_arrangement']==1){
				$project_power_sale_arrangement = $this->input->post('gn_a')['project_power_sale_arrangement_other'];
			}else{
				$project_power_sale_arrangement = $this->input->post('gn_a')['project_power_sale_arrangement'];
			}
			if($this->input->post('gn_a')['project_type'] == "Thermal" || $this->input->post('gn_a')['project_type'] == "Hydro" || $this->input->post('gn_a')['project_type'] == "Nuclear"){
				
				$project_type_others = ""; 
				
			}else{
				$project_type_others = $this->input->post('gn_a')['project_type_others'];
			}
			
			if($this->input->post('gn_a')['project_power_sale_arrangement'] == "Captive" || $this->input->post('gn_a')['project_power_sale_arrangement'] == "Merchant" || $this->input->post('gn_a')['project_power_sale_arrangement'] == "IPP"){
				
				$project_power_sale_arrangement_other = ""; 
				
			}else{
				$project_power_sale_arrangement_other = $this->input->post('gn_a')['project_power_sale_arrangement_other'];
			}
			$db = get_instance()->db->conn_id;
			$gn_a = array(
				'user_id' => $user_id,
				'form_id' => $form_id,
				'project_name' => mysqli_real_escape_string($db, $this->input->post('gn_a')['project_name']),
				'project_type' =>$project_type,
				'project_type_others' => $project_type_others,
				'project_capacity' =>$this->input->post('gn_a')['project_capacity'],
				'project_unit' =>$this->input->post('gn_a')['project_unit'],
				'project_each_unit' =>$this->input->post('gn_a')['project_each_unit'],
				'project_location' =>$this->input->post('gn_a')['project_location'],
				'project_power_sale_arrangement' =>$this->input->post('gn_a')['project_power_sale_arrangement'],
				'project_power_sale_arrangement_other' => $project_power_sale_arrangement_other,
				'project_cost_without_idc' =>$this->input->post('gn_a')['project_cost_without_idc'],
				'project_idc_interest_durin_construction' =>$this->input->post('gn_a')['project_idc_interest_durin_construction'],
				'project_cost_with_idc' =>$this->input->post('gn_a')['project_cost_with_idc'],
				'project_cost_per_mw' =>$this->input->post('gn_a')['project_cost_per_mw'],
				'project_cost_debt' =>$this->input->post('gn_a')['project_cost_debt'],
				'project_cost_equity' =>$this->input->post('gn_a')['project_cost_equity'],
				'project_amount_equity' =>$this->input->post('gn_a')['project_amount_equity'],
				'project_debt_amount' =>$this->input->post('gn_a')['project_debt_amount'],
				'project_loan_requested' =>$this->input->post('gn_a')['project_loan_requested'],
				'project_lead_fi' =>$this->input->post('gn_a')['project_lead_fi'],
				'project_construction_period' =>$this->input->post('gn_a')['project_construction_period'],
				'project_loan_repayment_period' =>$this->input->post('gn_a')['project_loan_repayment_period'],
				'project_scheduled_completion_date' =>$this->input->post('gn_a')['project_scheduled_completion_date'],
				'renifed_applicable' =>$this->input->post('gn_a')['renifed_applicable'],
				'project_irr' =>$this->input->post('gn_a')['project_irr'],
				'project_dscr' =>$this->input->post('gn_a')['project_dscr'],
				'project_levellised_tariff' =>$this->input->post('gn_a')['project_levellised_tariff'],
				'project_year_tariff' =>$this->input->post('gn_a')['project_year_tariff'],
				'project_levellised_cost_of_generation_excluding_roe' =>$this->input->post('gn_a')['project_levellised_cost_of_generation_excluding_roe'],
				'date_created' =>date('Y-m-d H::s'),
				'status' => '1'
			); 
			
			//Insert query execute
			$data = $this->WM->insert_gn_a($gn_a);
		}

		// GEN B
		
		$check_gn_b = $this->WM->check_gn_b_exist($user_id);
		
		//if already exists then do update records
		if($check_gn_b){
			
			
			if(is_array($this->session->userdata('app_id'))){
				$app_id = $this->session->userdata('app_id')['app_id'];
			}else{
				$app_id = $this->session->userdata('app_id');
			}
			
			$gn_b = array(
				'user_id' => $user_id,
				'app_id'=>$app_id,
				'form_id' => $this->session->userdata('form_id'),
				'borrower_name' =>$this->input->post('gn_b')['borrower_name'],
				'directors' =>serialize($this->input->post('gn_b')['directors']),
				'group_company_name' =>$this->input->post('gn_b')['group_company_name'],
				'group_company_structure' =>$this->input->post('gn_b')['group_company_structure'],
				'group_company_promoter' =>$this->input->post('gn_b')['group_company_promoter']
			); 
			
			//Insert query execute
			$this->WM->update_gn_b($gn_b);
			
			
		}else{
			//set variables for insert data in tbl_generation_a

			if(is_array($this->session->userdata('app_id'))){
				$app_id = $this->session->userdata('app_id')['app_id'];
			}else{
				$app_id = $this->session->userdata('app_id');
			}
				
			$gn_b = array(
				'user_id' => $user_id,
				'form_id' => $this->session->userdata('form_id'),
				'app_id'=>$app_id,
				'borrower_name' =>$this->input->post('gn_b')['borrower_name'],
				'directors' =>serialize($this->input->post('gn_b')['directors']),
				'group_company_name' =>$this->input->post('gn_b')['group_company_name'],
				'group_company_structure' =>$this->input->post('gn_b')['group_company_structure'],
				'group_company_promoter' =>$this->input->post('gn_b')['group_company_promoter']
			);
			
			//Insert query execute
			$this->WM->insert_gn_b($gn_b);
		}
		
		// GEN B1
		//set variables for insert data in tbl_generation_b1
		if(sizeof($this->input->post('gn_b1')['borrower_promoters_name'])>0){
		for($i=0; $i<sizeof($this->input->post('gn_b1')['borrower_promoters_name']); $i++){
				if(is_array($this->session->userdata('app_id'))){
				$app_id = $this->session->userdata('app_id')['app_id'];
			}else{
				$app_id = $this->session->userdata('app_id');
			}
			$gn_b1[] = array(
				'user_id' => $user_id,
				'form_id' => $this->session->userdata('form_id'),
				'app_id'=>$app_id,
				'borrower_promoters_name' =>$this->input->post('gn_b1')['borrower_promoters_name'][$i],
				'shareholding_promoter' =>$this->input->post('gn_b1')['shareholding_promoter'][$i],
				'phn_no' =>$this->input->post('gn_b1')['phn_no'][$i],
				'email' =>$this->input->post('gn_b1')['email'][$i],
				'address' =>$this->input->post('gn_b1')['address'][$i]
			);
			
		}
		//Insert query execute
			$this->WM->insert_gn_b1($gn_b1);
		}
		
		// GEN C
		 
	 
		
		$check_gn_c = $this->WM->check_gn_c_exist($user_id);
		
		//if already exists then do update records
		if($check_gn_c){
			
			
			// uploading authorized_signatory_for_project_file
				
				$config8['upload_path']          = './uploads/forms/';
                $config8['allowed_types']        = '*';
                $config8['max_width'] = 0;
				$config8['max_height'] = 0;
				$config8['max_size'] = 0;
				$config8['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config8);
				
				if ( ! $this->upload->do_upload('authorized_signatory_for_project_file'))
                { $error = array('error' => $this->upload->display_errors()); }
                else
                {
                        $authorized_signatory_for_project = array('upload_data' => $this->upload->data());
						
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'authorized_signatory_for_project_file' => $authorized_signatory_for_project['upload_data']['file_name']
						);
						
						$this->WM->update_gn_c_file($state_sector_c, 'authorized_signatory_for_project_file');
                }

				// uploading authorized_person_on_behalf_of_borrower_file
				
				$config9['upload_path']          = './uploads/forms/';
                $config9['allowed_types']        = '*';
                $config9['max_width'] = 0;
				$config9['max_height'] = 0;
				$config9['max_size'] = 0;
				$config9['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config9);
				
				
				if ( ! $this->upload->do_upload('authorized_person_on_behalf_of_borrower_file'))
                { $error = array('error' => $this->upload->display_errors());}
                else
                {
                        $authorized_person_on_behalf_of_borrower = array('upload_data' => $this->upload->data());
						
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'authorized_person_on_behalf_of_borrower_file' => $authorized_person_on_behalf_of_borrower['upload_data']['file_name']
						);
						
						$this->WM->update_gn_c_file($state_sector_c, 'authorized_person_on_behalf_of_borrower_file');
                }
			
			if(is_array($this->session->userdata('app_id'))){
				$app_id = $this->session->userdata('app_id')['app_id'];
			}else{
				$app_id = $this->session->userdata('app_id');
			}
			
			$gn_c = array(
				'user_id' => $user_id,
				'app_id'=>$app_id,
				'form_id' => $this->session->userdata('form_id'),
				'authorized_signatory_project_name'=>$this->input->post('gn_c')['authorized_signatory_project_name'],
				'authorized_signatory_project_address'=>$this->input->post('gn_c')['authorized_signatory_project_address'],
				'authorized_signatory_project_phone'=>$this->input->post('gn_c')['authorized_signatory_project_phone'],
				'authorized_signatory_project_email'=>$this->input->post('gn_c')['authorized_signatory_project_email'],
				'authorized_signatory_project_pan'=>$this->input->post('gn_c')['authorized_signatory_project_pan'],
				'authorized_signatory_project_aadhar'=>$this->input->post('gn_c')['authorized_signatory_project_aadhar'],
				'authorized_person_borrower_name'=>$this->input->post('gn_c')['authorized_person_borrower_name'],
				'authorized_person_borrower_address'=>$this->input->post('gn_c')['authorized_person_borrower_address'],
				'authorized_person_borrower_phone'=>$this->input->post('gn_c')['authorized_person_borrower_phone'],
				'authorized_person_borrower_email'=>$this->input->post('gn_c')['authorized_person_borrower_email'],
				'authorized_person_borrower_pan'=>$this->input->post('gn_c')['authorized_person_borrower_pan'],
				'authorized_person_borrower_adhaar_number'=>$this->input->post('gn_c')['authorized_person_borrower_adhaar_number']
			); 
			
			//Insert query execute
			$this->WM->update_gn_c($gn_c);
			
			
		}else{
			//set variables for insert data in tbl_generation_c
			
			// uploading authorized_signatory_for_project_file
				
				$config8['upload_path']          = './uploads/forms/';
                $config8['allowed_types']        = '*';
                $config8['max_width'] = 0;
				$config8['max_height'] = 0;
				$config8['max_size'] = 0;
				$config8['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config8);
				
				
				if ( ! $this->upload->do_upload('authorized_signatory_for_project_file'))
                { $error = array('error' => $this->upload->display_errors()); $authorized_signatory_for_project_file='';}
                else
                {
                        $authorized_signatory_for_project = array('upload_data' => $this->upload->data());
						$authorized_signatory_for_project_file = $authorized_signatory_for_project['upload_data']['file_name'];
                }

				// uploading authorized_person_on_behalf_of_borrower_file
				
				$config9['upload_path']          = './uploads/forms/';
                $config9['allowed_types']        = '*';
                $config9['max_width'] = 0;
				$config9['max_height'] = 0;
				$config9['max_size'] = 0;
				$config9['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config9);
				
				
				if ( ! $this->upload->do_upload('authorized_person_on_behalf_of_borrower_file'))
                { $error = array('error' => $this->upload->display_errors()); $authorized_person_on_behalf_of_borrower_file ='';}
                else
                {
                        $authorized_person_on_behalf_of_borrower = array('upload_data' => $this->upload->data());
						$authorized_person_on_behalf_of_borrower_file = $authorized_person_on_behalf_of_borrower['upload_data']['file_name'];
                }
			
			if(is_array($this->session->userdata('app_id'))){
				$app_id = $this->session->userdata('app_id')['app_id'];
			}else{
				$app_id = $this->session->userdata('app_id');
			}
			
			$gn_c = array(
				'user_id' => $user_id,
				'app_id'=>$app_id,
				'form_id' => $this->session->userdata('form_id'),
				'authorized_signatory_project_name'=>$this->input->post('gn_c')['authorized_signatory_project_name'],
				'authorized_signatory_project_address'=>$this->input->post('gn_c')['authorized_signatory_project_address'],
				'authorized_signatory_project_phone'=>$this->input->post('gn_c')['authorized_signatory_project_phone'],
				'authorized_signatory_project_email'=>$this->input->post('gn_c')['authorized_signatory_project_email'],
				'authorized_signatory_project_pan'=>$this->input->post('gn_c')['authorized_signatory_project_pan'],
				'authorized_signatory_project_aadhar'=>$this->input->post('gn_c')['authorized_signatory_project_aadhar'],
				'authorized_person_borrower_name'=>$this->input->post('gn_c')['authorized_person_borrower_name'],
				'authorized_person_borrower_address'=>$this->input->post('gn_c')['authorized_person_borrower_address'],
				'authorized_person_borrower_phone'=>$this->input->post('gn_c')['authorized_person_borrower_phone'],
				'authorized_person_borrower_email'=>$this->input->post('gn_c')['authorized_person_borrower_email'],
				'authorized_person_borrower_pan'=>$this->input->post('gn_c')['authorized_person_borrower_pan'],
				'authorized_person_borrower_adhaar_number'=>$this->input->post('gn_c')['authorized_person_borrower_adhaar_number'],
				'authorized_person_on_behalf_of_borrower_file'=>$authorized_person_on_behalf_of_borrower_file,
				'authorized_signatory_for_project_file'=>$authorized_signatory_for_project_file
			);
			
			//Insert query execute
			$this->WM->insert_gn_c($gn_c);
			
			
				$data = array(
					'url' => "form1/index/gn/step2",
				);
				$this->db->where('user_id', $user_id);
				$this->db->where("form_id", $this->session->userdata('form_id'));
				$this->db->update('tbl_generation_a', $data);
				
			
		}

			// reidresct to step 2
			
			$app_id = $this->WM->check_app_id($user_id);
			$this->session->set_userdata("app_id", $app_id);
			
			redirect(base_url()."form1/index/gn/step2");
			
		}else{
				//$error = array('project_name' => form_error('project_name'));
				$error = $this->form_validation->error_array();
				$this->session->set_flashdata('step1', $error);
				redirect(base_url()."form1/index/gn/step1");
			}
	}

	public function pan($pan){
		if (! preg_match('/[A-Z]{5}[0-9]{4}[A-Z]{1}/', $pan)) {
			$this->form_validation->set_message('pan', 'Enter a valid Pan Number');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function SCOD($SCOD){
		if (! preg_match('/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/', $SCOD)) {
			$this->form_validation->set_message('SCOD', 'Enter a valid Date');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//processing step 2 form generation
	public function process_generation_2(){
		$data['gn_a'] = $this->WM->get_generation_a();
		
		if($data['gn_a']){
			$this->session->set_userdata("app_id", $data['gn_a']['app_id']);	
		}
		if($this->input->method(true)=="POST"){
				
			$user_id = $this->session->userdata('user')['id'];
			$app_id = $this->session->userdata('app_id');	
			$form_id = $this->session->userdata('form_id');	
			
			// check if data already exists
			$gn2 = $this->WM->check_gn2_exist($user_id);

			//if already exists then do update records
			if($gn2){
				
				//licenses_approval_pollution_clearance_attach
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if($_POST['phase1_project_details']['licenses_approval_pollution_clearance']=='No' || $_POST['phase1_project_details']['licenses_approval_pollution_clearance']=='NA'){
						
					$state_sector_b = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'licenses_approval_pollution_clearance_attach' => ''
					);
					
					$this->WM->update_gn2_file($state_sector_b, 'licenses_approval_pollution_clearance_attach');	
						
				}else{
					if(!empty($_FILES['licenses_approval_pollution_clearance_attach']['name'])){
						if ( ! $this->upload->do_upload('licenses_approval_pollution_clearance_attach'))
		                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_pollution_clearance_attach ='';}
		                else
		                {
		                        $licenses_approval_pollution_clearance_attach_data = array('upload_data' => $this->upload->data());
								$licenses_approval_pollution_clearance_attach = $licenses_approval_pollution_clearance_attach_data;
								
								$state_sector_b = array(
									'user_id'=>$this->session->userdata('user')['id'],
									'licenses_approval_pollution_clearance_attach' => $licenses_approval_pollution_clearance_attach['upload_data']['file_name']
								);
								
								$this->WM->update_gn2_file($state_sector_b, 'licenses_approval_pollution_clearance_attach');
								
								
		                }
					}
				}
				unset($config);
				
				//licenses_approval_water_allocation_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				if($_POST['phase1_project_details']['licenses_approval_water_allocation']=='No' || $_POST['phase1_project_details']['licenses_approval_water_allocation']=='NA'){
						
						$state_sector_b = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'licenses_approval_water_allocation_attach' => ''
						);
						
						$this->WM->update_gn2_file($state_sector_b, 'licenses_approval_water_allocation_attach');	
						
				}else{
					if(!empty($_FILES['licenses_approval_water_allocation_attach']['name'])){
						if ( ! $this->upload->do_upload('licenses_approval_water_allocation_attach'))
		                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_water_allocation_attach ='';}
		                else
		                {
		                        $licenses_approval_water_allocation_attach_data = array('upload_data' => $this->upload->data());
								$licenses_approval_water_allocation_attach = $licenses_approval_water_allocation_attach_data;
								
								$state_sector_b = array(
									'user_id'=>$this->session->userdata('user')['id'],
									'licenses_approval_water_allocation_attach' => $licenses_approval_water_allocation_attach['upload_data']['file_name']
								);
								
								$this->WM->update_gn2_file($state_sector_b, 'licenses_approval_water_allocation_attach');
								
								
		                }
					}
				}
				unset($config);
				
				
				//licenses_approval_environment_clearance_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if($_POST['phase1_project_details']['licenses_approval_environment_clearance']=='No' || $_POST['phase1_project_details']['licenses_approval_environment_clearance']=='NA'){
						
						$state_sector_b = array(
									'user_id'=>$this->session->userdata('user')['id'],
									'licenses_approval_environment_clearance_attach' => ''
								);
						
						$this->WM->update_gn2_file($state_sector_b, 'licenses_approval_environment_clearance_attach');	
						
				}else{
					if(!empty($_FILES['licenses_approval_environment_clearance_attach']['name'])){
						if ( ! $this->upload->do_upload('licenses_approval_environment_clearance_attach'))
		                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_environment_clearance_attach ='';}
		                else
		                {
		                        $licenses_approval_environment_clearance_attach_data = array('upload_data' => $this->upload->data());
								$licenses_approval_environment_clearance_attach = $licenses_approval_environment_clearance_attach_data;
								
								$state_sector_b = array(
									'user_id'=>$this->session->userdata('user')['id'],
									'licenses_approval_environment_clearance_attach' => $licenses_approval_environment_clearance_attach['upload_data']['file_name']
								);
								
								$this->WM->update_gn2_file($state_sector_b, 'licenses_approval_environment_clearance_attach');
								
								
		                }
					}
				}
				unset($config);
				//licenses_approval_forest_land_clearance_attach
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				if($_POST['phase1_project_details']['licenses_approval_forest_land_clearance']=='No' || $_POST['phase1_project_details']['licenses_approval_forest_land_clearance']=='NA'){
						
					$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'licenses_approval_forest_land_clearance_attach' => ''
							);
					
					$this->WM->update_gn2_file($state_sector_b, 'licenses_approval_forest_land_clearance_attach');	
						
				}else{
					if(!empty($_FILES['licenses_approval_forest_land_clearance_attach']['name'])){
						if ( ! $this->upload->do_upload('licenses_approval_forest_land_clearance_attach'))
		                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_forest_land_clearance_attach ='';}
		                else
		                {
		                        $licenses_approval_forest_land_clearance_attach_data = array('upload_data' => $this->upload->data());
								$licenses_approval_forest_land_clearance_attach = $licenses_approval_forest_land_clearance_attach_data;
								
								$state_sector_b = array(
									'user_id'=>$this->session->userdata('user')['id'],
									'licenses_approval_forest_land_clearance_attach' => $licenses_approval_forest_land_clearance_attach['upload_data']['file_name']
								);
								
								$this->WM->update_gn2_file($state_sector_b, 'licenses_approval_forest_land_clearance_attach');
								
								
		                }
					}
				}
				unset($config);
				
				//licenses_approval_forest_land_evacuation_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if($_POST['phase1_project_details']['licenses_approval_forest_land_evacuation']=='No' || $_POST['phase1_project_details']['licenses_approval_forest_land_evacuation']=='NA'){
						
					$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'licenses_approval_forest_land_evacuation_attach' => ''
							);
					
					$this->WM->update_gn2_file($state_sector_b, 'licenses_approval_forest_land_evacuation_attach');	
						
				}else{
					if(!empty($_FILES['licenses_approval_forest_land_evacuation_attach']['name'])){
						if ( ! $this->upload->do_upload('licenses_approval_forest_land_evacuation_attach'))
		                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_forest_land_evacuation_attach ='';}
		                else
		                {
		                        $licenses_approval_forest_land_evacuation_attach_data = array('upload_data' => $this->upload->data());
								$licenses_approval_forest_land_evacuation_attach = $licenses_approval_forest_land_evacuation_attach_data;
								
								$state_sector_b = array(
									'user_id'=>$this->session->userdata('user')['id'],
									'licenses_approval_forest_land_evacuation_attach' => $licenses_approval_forest_land_evacuation_attach['upload_data']['file_name']
								);
								
								$this->WM->update_gn2_file($state_sector_b, 'licenses_approval_forest_land_evacuation_attach');
								
								
		                }
					}
				}
				unset($config);
				//licenses_approval_civil_aviation_clearance_attach
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if($_POST['phase1_project_details']['licenses_approval_civil_aviation_clearance']=='No' || $_POST['phase1_project_details']['licenses_approval_civil_aviation_clearance']=='NA'){
						
					$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'licenses_approval_civil_aviation_clearance_attach' => ''
							);
					
					$this->WM->update_gn2_file($state_sector_b, 'licenses_approval_civil_aviation_clearance_attach');	
						
				}else{
					if(!empty($_FILES['licenses_approval_civil_aviation_clearance_attach']['name'])){
						if ( ! $this->upload->do_upload('licenses_approval_civil_aviation_clearance_attach'))
		                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_civil_aviation_clearance_attach ='';}
		                else
		                {
		                        $licenses_approval_civil_aviation_clearance_attach_data = array('upload_data' => $this->upload->data());
								$licenses_approval_civil_aviation_clearance_attach = $licenses_approval_civil_aviation_clearance_attach_data;
								
								$state_sector_b = array(
									'user_id'=>$this->session->userdata('user')['id'],
									'licenses_approval_civil_aviation_clearance_attach' => $licenses_approval_civil_aviation_clearance_attach['upload_data']['file_name']
								);
								
								$this->WM->update_gn2_file($state_sector_b, 'licenses_approval_civil_aviation_clearance_attach');
								
								
		                }
					}
				}
				unset($config);
				
				//means_of_finance_field
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if(!empty($_FILES['means_of_finance_field']['name'])){
					if ( ! $this->upload->do_upload('means_of_finance_field'))
	                { $error = array('error' => $this->upload->display_errors()); $means_of_finance_field ='';}
	                else
	                {
	                        $means_of_finance_field_data = array('upload_data' => $this->upload->data());
							$means_of_finance_field = $means_of_finance_field_data;
							
							$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'means_of_finance_field_data' => $means_of_finance_field_data['upload_data']['file_name']
							);
							
							$this->WM->update_gn2_file($state_sector_b, 'means_of_finance_field_data');
							
							
	                }
				}
				unset($config);
				
				
				//information_memorandum_financial_mode_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if(!empty($_FILES['information_memorandum_financial_mode_attach']['name'])){
					if ( ! $this->upload->do_upload('information_memorandum_financial_mode_attach'))
	                { $error = array('error' => $this->upload->display_errors()); $information_memorandum_financial_mode_attach ='';
					
					}
	                else
	                {
	                        $information_memorandum_financial_mode_attach_data = array('upload_data' => $this->upload->data());
							$information_memorandum_financial_mode_attach = $information_memorandum_financial_mode_attach_data;
							
							$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'information_memorandum_financial_mode_attach' => $information_memorandum_financial_mode_attach['upload_data']['file_name']
							);
							
							$this->WM->update_gn2_file($state_sector_b, 'information_memorandum_financial_mode_attach');
	                }
				}
				
				unset($config);
				
				//year_wise_project_cost_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if(!empty($_FILES['year_wise_project_cost_attach']['name'])){
					if ( ! $this->upload->do_upload('year_wise_project_cost_attach'))
	                { $error = array('error' => $this->upload->display_errors()); $year_wise_project_cost_attach ='';}
	                else
	                {
	                        $year_wise_project_cost_attach = array('upload_data' => $this->upload->data());
							$year_wise_project_cost_attach = $year_wise_project_cost_attach;
							$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'year_wise_project_cost_attach' => $year_wise_project_cost_attach['upload_data']['file_name']
							);
							
							$this->WM->update_gn2_file($state_sector_b, 'year_wise_project_cost_attach');
	                }
                }
				unset($config);
				
				//ppa_attach
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
			if($_POST['phase1_project_details']['PPA']=='No' || $_POST['phase1_project_details']['PPA']=='NA'){
						
					$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'ppa_attach' => ''
							);
					
					$this->WM->update_gn2_file($state_sector_b, 'ppa_attach');	
						
			}else{
					
				if(!empty($_FILES['ppa_attach']['name'])){
					if ( ! $this->upload->do_upload('ppa_attach'))
	                { $error = array('error' => $this->upload->display_errors()); $ppa_attach ='';}
	                else
	                {
	                        $ppa_attach_data = array('upload_data' => $this->upload->data());
							$ppa_attach = $ppa_attach_data;
							$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'ppa_attach' => $ppa_attach['upload_data']['file_name']
							);
							
							$this->WM->update_gn2_file($state_sector_b, 'ppa_attach');
	                }
                }
			}
				unset($config);
				
				//other_document
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if(!empty($_FILES['other_document']['name'])){
					if ( ! $this->upload->do_upload('other_document'))
	                { $error = array('error' => $this->upload->display_errors()); $other_document ='';}
	                else
	                {
	                        $other_document_data = array('upload_data' => $this->upload->data());
							$other_document = $other_document_data;
							$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'other_document' => $other_document['upload_data']['file_name']
							);
							
							$this->WM->update_gn2_file($state_sector_b, 'other_document');
	                }
                }
				unset($config);
				
					$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if(!empty($_FILES['drp_attachment']['name'])){
					if ( ! $this->upload->do_upload('drp_attachment'))
	                { $error = array('error' => $this->upload->display_errors()); $drp_attachment ='';}
	                else
	                {
	                        $other_document_data = array('upload_data' => $this->upload->data());
							$drp_attachment = $other_document_data;
							$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'drp_attachment' => $drp_attachment['upload_data']['file_name']
							);
							
							$this->WM->update_gn2_file($state_sector_b, 'drp_attachment');
	                }
                }
				unset($config);
				
				$gn_2 = array(
					'user_id'=>$this->session->userdata('user')['id'],
					'app_id'=>$this->session->userdata('app_id'),
					'form_id' => $form_id,
					'name_of_lead_bank'=>$this->input->post('phase1_project_details')['name_of_lead_bank'],
					'cost_comparison_bench_marking'=>$this->input->post('phase1_project_details')['cost_comparison_bench_marking'],
					'prepare_by_whom'=>$this->input->post('phase1_project_details')['prepare_by_whom'],
					'dpr_year'=>$this->input->post('phase1_project_details')['dpr_year'],
					'name_of_statutory_auditors'=>$this->input->post('phase1_project_details')['name_of_statutory_auditors'],
					'information_memorandum_financial_mode'=>$this->input->post('phase1_project_details')['information_memorandum_financial_mode'],
					'plant_technology_capacity'=>$this->input->post('phase1_project_details')['plant_technology_capacity'],
					'infrastructure_land_requirement'=>$this->input->post('phase1_project_details')['infrastructure_land_requirement'],
					'water_estimated_requirement_source'=>$this->input->post('phase1_project_details')['water_estimated_requirement_source'],
					'fuel_estimated_requirement_source'=>$this->input->post('phase1_project_details')['fuel_estimated_requirement_source'],
					'project_plant_implementation_schedule'=>$this->input->post('phase1_project_details')['project_plant_implementation_schedule'],
					'pan_for_power_evacuation_infrastructure_existing'=>$this->input->post('phase1_project_details')['pan_for_power_evacuation_infrastructure_existing'],
					'power_sale_offtake_banking'=>$this->input->post('phase1_project_details')['power_sale_offtake_banking'],
					'licenses_approval_pollution_clearance'=>$this->input->post('phase1_project_details')['licenses_approval_pollution_clearance'],
					'licenses_approval_water_allocation'=>$this->input->post('phase1_project_details')['licenses_approval_water_allocation'],
					'licenses_approval_environment_clearance'=>$this->input->post('phase1_project_details')['licenses_approval_environment_clearance'],
					'licenses_approval_forest_land_clearance'=>$this->input->post('phase1_project_details')['licenses_approval_forest_land_clearance'],
					'licenses_approval_forest_land_evacuation'=>$this->input->post('phase1_project_details')['licenses_approval_forest_land_evacuation'],
					'licenses_approval_civil_aviation_clearance'=>$this->input->post('phase1_project_details')['licenses_approval_civil_aviation_clearance'],
					'ppa'=>$this->input->post('phase1_project_details')['PPA']
				);

				$this->db->where('user_id',$user_id);
				$this->db->where('form_id', $form_id);
				$this->db->update('tbl_generation_2', $gn_2);
				//pr($_POST);
				//pr($_FILES);
		
			}else{
				
				
				
				//licenses_approval_pollution_clearance_attach
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
					if ( ! $this->upload->do_upload('licenses_approval_pollution_clearance_attach'))
	                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_pollution_clearance_attach ='';}
	                else
	                {
	                        $licenses_approval_pollution_clearance_attach_data = array('upload_data' => $this->upload->data());
							$licenses_approval_pollution_clearance_attach = $licenses_approval_pollution_clearance_attach_data['upload_data']['file_name'];
						 
	                }
				
				unset($config);
				
				//licenses_approval_water_allocation_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
					if ( ! $this->upload->do_upload('licenses_approval_water_allocation_attach'))
	                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_water_allocation_attach ='';}
	                else
	                {
	                        $licenses_approval_water_allocation_attach_data = array('upload_data' => $this->upload->data());
							$licenses_approval_water_allocation_attach = $licenses_approval_water_allocation_attach_data['upload_data']['file_name'];
							 
							
							
	                }
			
				unset($config);
				
				
				//licenses_approval_environment_clearance_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
					if ( ! $this->upload->do_upload('licenses_approval_environment_clearance_attach'))
	                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_environment_clearance_attach ='';}
	                else
	                {
	                        $licenses_approval_environment_clearance_attach_data = array('upload_data' => $this->upload->data());
							$licenses_approval_environment_clearance_attach = $licenses_approval_environment_clearance_attach_data['upload_data']['file_name'];
							
							 
							
	                }
				
				unset($config);
				//licenses_approval_forest_land_clearance_attach
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
					if ( ! $this->upload->do_upload('licenses_approval_forest_land_clearance_attach'))
	                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_forest_land_clearance_attach ='';}
	                else
	                {
	                        $licenses_approval_forest_land_clearance_attach_data = array('upload_data' => $this->upload->data());
							$licenses_approval_forest_land_clearance_attach = $licenses_approval_forest_land_clearance_attach_data['upload_data']['file_name'];
							 
							
	                }
				
				unset($config);
				
				//licenses_approval_forest_land_evacuation_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
					if ( ! $this->upload->do_upload('licenses_approval_forest_land_evacuation_attach'))
	                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_forest_land_evacuation_attach ='';}
	                else
	                {
	                        $licenses_approval_forest_land_evacuation_attach_data = array('upload_data' => $this->upload->data());
							$licenses_approval_forest_land_evacuation_attach = $licenses_approval_forest_land_evacuation_attach_data['upload_data']['file_name'];
						 
	                }
				
				unset($config);
				//licenses_approval_civil_aviation_clearance_attach
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
					if ( ! $this->upload->do_upload('licenses_approval_civil_aviation_clearance_attach'))
	                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_civil_aviation_clearance_attach ='';}
	                else
	                {
	                        $licenses_approval_civil_aviation_clearance_attach_data = array('upload_data' => $this->upload->data());
							$licenses_approval_civil_aviation_clearance_attach = $licenses_approval_civil_aviation_clearance_attach_data['upload_data']['file_name'];
							
							
							
	                }
				
				unset($config);
				
				
				
				//means_of_finance_field
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
				if ( ! $this->upload->do_upload('means_of_finance_field'))
                { $error = array('error' => $this->upload->display_errors()); 
                
                	$means_of_finance_field ='';
				}
                else
                {
                        $means_of_finance_field_data = array('upload_data' => $this->upload->data());
						$means_of_finance_field = $means_of_finance_field_data['upload_data']['file_name'];
                }
				unset($config);
				
				
				//information_memorandum_financial_mode_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
				if ( ! $this->upload->do_upload('information_memorandum_financial_mode_attach'))
                { $error = array('error' => $this->upload->display_errors()); $information_memorandum_financial_mode_attach ='';}
                else
                {
                        $information_memorandum_financial_mode_attach_data = array('upload_data' => $this->upload->data());
						$information_memorandum_financial_mode_attach = $information_memorandum_financial_mode_attach_data['upload_data']['file_name'];
                }
				unset($config);
				
				//year_wise_project_cost_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
				if ( ! $this->upload->do_upload('year_wise_project_cost_attach'))
                { $error = array('error' => $this->upload->display_errors()); $year_wise_project_cost_attach ='';}
                else
                {
                        $year_wise_project_cost_attach = array('upload_data' => $this->upload->data());
						$year_wise_project_cost_attach = $year_wise_project_cost_attach['upload_data']['file_name'];
                }
				unset($config);
				
				//ppa_attach
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
				if ( ! $this->upload->do_upload('ppa_attach'))
                { $error = array('error' => $this->upload->display_errors()); $ppa_attach ='';}
                else
                {
                        $ppa_attach_data = array('upload_data' => $this->upload->data());
						$ppa_attach = $ppa_attach_data['upload_data']['file_name'];
                }
				unset($config);
				
				//other_document
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
				if ( ! $this->upload->do_upload('other_document'))
                { $error = array('error' => $this->upload->display_errors()); $other_document ='';}
                else
                {
                        $other_document_data = array('upload_data' => $this->upload->data());
						$other_document = $other_document_data['upload_data']['file_name'];
                }
				unset($config);
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
				if ( ! $this->upload->do_upload('drp_attachment'))
                { $error = array('error' => $this->upload->display_errors()); $drp_attachment ='';}
                else
                {
                        $other_document_data = array('upload_data' => $this->upload->data());
						$drp_attachment = $other_document_data['upload_data']['file_name'];
                }
				unset($config);
				
				$gn_2 = array(
					'user_id'=>$this->session->userdata('user')['id'],
					'app_id'=>$this->session->userdata('app_id'),
					'form_id' => $form_id,
					'name_of_lead_bank'=>$this->input->post('phase1_project_details')['name_of_lead_bank'],
					'means_of_finance_field_data'=> $means_of_finance_field,
					'cost_comparison_bench_marking'=>$this->input->post('phase1_project_details')['cost_comparison_bench_marking'],
					'prepare_by_whom'=>$this->input->post('phase1_project_details')['prepare_by_whom'],
					'dpr_year'=>$this->input->post('phase1_project_details')['dpr_year'],
					'name_of_statutory_auditors'=>$this->input->post('phase1_project_details')['name_of_statutory_auditors'],
					'information_memorandum_financial_mode_attach' => $information_memorandum_financial_mode_attach,
					'information_memorandum_financial_mode'=>$this->input->post('phase1_project_details')['information_memorandum_financial_mode'],
					'plant_technology_capacity'=>$this->input->post('phase1_project_details')['plant_technology_capacity'],
					'infrastructure_land_requirement'=>$this->input->post('phase1_project_details')['infrastructure_land_requirement'],
					'water_estimated_requirement_source'=>$this->input->post('phase1_project_details')['water_estimated_requirement_source'],
					'fuel_estimated_requirement_source'=>$this->input->post('phase1_project_details')['fuel_estimated_requirement_source'],
					'project_plant_implementation_schedule'=>$this->input->post('phase1_project_details')['project_plant_implementation_schedule'],
					'pan_for_power_evacuation_infrastructure_existing'=>$this->input->post('phase1_project_details')['pan_for_power_evacuation_infrastructure_existing'],
					'power_sale_offtake_banking'=>$this->input->post('phase1_project_details')['power_sale_offtake_banking'],
					'licenses_approval_pollution_clearance'=>$this->input->post('phase1_project_details')['licenses_approval_pollution_clearance'],
					'licenses_approval_water_allocation'=>$this->input->post('phase1_project_details')['licenses_approval_water_allocation'],
					'licenses_approval_environment_clearance'=>$this->input->post('phase1_project_details')['licenses_approval_environment_clearance'],
					'licenses_approval_forest_land_clearance'=>$this->input->post('phase1_project_details')['licenses_approval_forest_land_clearance'],
					'licenses_approval_forest_land_evacuation'=>$this->input->post('phase1_project_details')['licenses_approval_forest_land_evacuation'],
					'year_wise_project_cost_attach'=>$year_wise_project_cost_attach,
					'licenses_approval_civil_aviation_clearance'=>$this->input->post('phase1_project_details')['licenses_approval_civil_aviation_clearance'],
					'ppa'=>$this->input->post('phase1_project_details')['PPA'],
					
					'drp_attachment' => $drp_attachment,
					'licenses_approval_pollution_clearance_attach'=>$licenses_approval_pollution_clearance_attach,
					'licenses_approval_water_allocation_attach'=>$licenses_approval_water_allocation_attach,
					'licenses_approval_environment_clearance_attach'=>$licenses_approval_environment_clearance_attach,
					'licenses_approval_forest_land_clearance_attach'=>$licenses_approval_forest_land_clearance_attach,
					'licenses_approval_forest_land_evacuation_attach'=>$licenses_approval_forest_land_evacuation_attach,
					'licenses_approval_civil_aviation_clearance_attach'=>$licenses_approval_civil_aviation_clearance_attach,
					'ppa_attach'=>$ppa_attach,
					'other_document'=>$other_document
					
				);
				// insert database records
				$this->WM->insert_gn_2($gn_2);	
				
				$data = array(
					'url' => "form1/index/gn/step3",
				);
				$this->db->where('user_id', $user_id);
				$this->db->where("form_id", $this->session->userdata('form_id'));
				$this->db->update('tbl_generation_a', $data);
				
			}
			
		$this->WM->deleteDta($user_id);
		if(!empty($this->input->post('phase1_project_details')['name_of_bank_FI'])){
				 $js=0;
					for($i=0;$i<sizeof($this->input->post('phase1_project_details')['name_of_bank_FI']); $i++){
				 $js = $i+1;
				 //pr($js);die;
				
					//echo "hewsdsdsdewe";die;
					$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
		    		$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					
					if(!empty($_FILES['name_of_bank_status_attach'.$js]['name'])){	
						
						if ( ! $this->upload->do_upload('name_of_bank_status_attach'.$js))
							{ 
								$error = array('error' => $this->upload->display_errors()); $file = $this->input->post('name_of_bank_status_attachname'.$js);
							}
							else
							{	
								$chkfile_data = array('upload_data' => $this->upload->data()); 
								$file = $chkfile_data['upload_data']['file_name'];
								
							}
					}else
					{
						echo '('.$js.')'.$this->input->post('phase1_project_details')['name_of_bank_status'.$js]; 
						if($this->input->post('phase1_project_details')['name_of_bank_status'.$js]=='Sanctioned'){
							$file = $this->input->post('name_of_bank_status_attachname'.$js);
						}else{ $file = '';}
						
					}
					
		
					unset($config);
					
					
					$sen[] = array(
						'user_id' => $user_id,
						'form_id' => $form_id,
						'app_id'=>$this->session->userdata('app_id'),
						'name_of_bank_FI' => $this->input->post('phase1_project_details')['name_of_bank_FI'][$i],
						'name_of_bank_amount' => $this->input->post('phase1_project_details')['name_of_bank_amount'][$i],
						'name_of_bank_status' => $this->input->post('phase1_project_details')['name_of_bank_status'.$js],
						'name_of_bank_status_attach' => $file,
					);
				
			}
			
			$this->db->insert_batch('tbl_generation_2_sanction',$sen);
		}
		
		
			$this->WM->deleteDta2a($user_id);
			if(!empty($this->input->post('phase1_project_details')['date_of_ppa'])) {
			
				 $js=0;
			for($i=0;$i<sizeof($this->input->post('phase1_project_details')['date_of_ppa']); $i++){
				 $js = $i+1;
				 //pr($js);die;
				
					//echo "hewsdsdsdewe";die;
					$gn_2a[] = array(
						'user_id' => $user_id,
						'form_id' => $form_id,
						'app_id'=>$this->session->userdata('app_id'),
						'date_of_ppa' => $this->input->post('phase1_project_details')['date_of_ppa'][$i],
						'utility_discom' => $this->input->post('phase1_project_details')['utility_discom'][$i],
						'ppa_capacity' => $this->input->post('phase1_project_details')['ppa_capacity'][$i],
						'ppa_tariff' => $this->input->post('phase1_project_details')['ppa_tariff'][$i],
						'ppa_mou_case_1' => $this->input->post('phase1_project_details')['ppa_mou_case_1'][$i],
						
					);
			}		
				$this->db->insert_batch('tbl_generation_2a',$gn_2a);
				
		}
			$this->WM->deleteDta2b($user_id);
		if(!empty($this->input->post('project_details1')['yet_tied_capacity'])) {
			
				 $js=0;
					for($i=0;$i<sizeof($this->input->post('project_details1')['yet_tied_capacity']); $i++){
				 $js = $i+1;
				 //pr($js);die;
				
					//echo "hewsdsdsdewe";die;
					$gn_2b[] = array(
						'user_id' => $user_id,
						'form_id' => $form_id,
						'app_id'=>$this->session->userdata('app_id'),
						'yet_tied_capacity' => $this->input->post('project_details1')['yet_tied_capacity'][$i],
						'yet_tied_proposed_through' => $this->input->post('project_details1')['yet_tied_proposed_through'][$i],
						'yet_tied_expected_tariff' => $this->input->post('project_details1')['yet_tied_expected_tariff'][$i],
						'yet_tied_detail_bidding_participated' => $this->input->post('project_details1')['yet_tied_detail_bidding_participated'][$i],						
					);
				
			}
			
			$this->db->insert_batch('tbl_generation_2b',$gn_2b);
		}	
			

				
			redirect(base_url()."form1/index/gn/step3");
		}
	}

	// processing step three gebneration
	public function process_generation_3(){
		$data['gn_a'] = $this->WM->get_generation_a();
		
		if($data['gn_a']){
			$this->session->set_userdata("app_id", $data['gn_a']['app_id']);	
		}
		$user_id = $this->session->userdata('user')['id'];
		
		if($this->input->method(true)=="POST"){
			//check if already exists
			$gn3 = $this->WM->check_gn3_exist($user_id);
				$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
		$config = 	array(
					array(
							'field' => 'phase1_loc_lan_wat[location_geological_coord]',
							'label' => 'Geological Coordinates',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[location_weather_located]',
							'label' => 'Whether located in Backward area',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[location_mearest_forest]',
							'label' => 'Nearest Forest',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[location_mearest_port_distance]',
							'label' => 'Nearest Port',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[location_railway_station_distance]',
							'label' => 'Nearest Railway Station',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[location_nearest_national_highway]',
							'label' => 'Nearest national Highway',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[location_coal_gas_source]',
							'label' => 'Coal/Gas Source',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[land_classification_current]',
							'label' => 'Classification/Current Use of land',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[land_land_required]',
							'label' => 'Land Required for the entire plant',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[land_land_required_for_main_plant]',
							'label' => 'Land Required for Main',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[land_acquired_till_date]',
							'label' => 'Land Acquired till date',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[fuel_domestic_coal_gas]',
							'label' => 'Domestic coal/Gas',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[fuel_request_per_annum_capacity]',
							'label' => 'GCV',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[fuel_imported_call]',
							'label' => 'Imported Coal',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[fuel_imported_call_request_per_annum_capacity]',
							'label' => 'Requirement per annum',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[fuel_plan_meeting_fuel_requirement]',
							'label' => 'Plan for meeting the fuel requirement of plant life',
							'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[fuel_loa_with]',
							'label' => 'LOA with',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[fuel_loa_date]',
							'label' => 'LOA Date',
							'rules' => 'trim|required|max_length[12]|callback_SCOD',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[fuel_loa_with]',
							'label' => 'LOA with',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[fuel_quantum_fuel_supply]',
							'label' => 'Quantum of fuel supply',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[fuel_validity_of_loa]',
							'label' => 'Validity of LOA',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[cmmitments]',
							'label' => 'Obligation/commitments',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[fuel_supply_agreement]',
							'label' => 'Fuel Supply Agreement',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[fuel_annual_contracted_quantity]',
							'label' => 'Annual contacted quantity',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[fuel_end_use_application]',
							'label' => 'End-Use application',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[fuel_compensation_for_short]',
							'label' => 'Compensation for short supply/lifting',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[fuel_price]',
							'label' => 'Base Price',
							'rules' => 'trim|required|max_length[10]|numeric',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[fuel_escalation]',
							'label' => 'Escalation',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[water_per_day]',
							'label' => 'Per day',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[water_per_annum]',
							'label' => 'Per annum',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[water_name_of_source]',
							'label' => 'Name of source',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[water_distance]',
							'label' => 'Distance',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[water_allocation]',
							'label' => 'Allocation',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[water_transportation]',
							'label' => 'Transportation',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[water_cooling_system]',
							'label' => 'Technology of cooling system',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[hydro_resettlement]',
							'label' => 'No of villages affected',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[hydro_family_resettled]',
							'label' => 'No of families need to be resettled',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[hydro_extent_deforestation]',
							'label' => 'Extent of deforestation of the project',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[hydro_flora_fauna]',
							'label' => 'Steps required for protection of flora',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[hydro_forests_wildlife]',
							'label' => 'Steps required for protection of forests',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[hydro_archaelogical_monuments]',
							'label' => 'Is there any submergence of any religious',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[hydro_degradation_catchment_area]',
							'label' => ' Any Degradation of catchment area',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[hydro_rock_mass_rating]',
							'label' => 'Rock Mass Rating',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[typo_access_to_site]',
							'label' => 'Access to the site',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[typo_issue_pretaining_heavy_equipment]',
							'label' => 'Issues pertaining to movement',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[typo_potential_land_side_problems]',
							'label' => 'Potential land side problems',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[hydo_year_data_avail]',
							'label' => 'No of years for which data available',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'phase1_loc_lan_wat[seismic_zone]',
							'label' => 'Seismic Zone',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
				);
					
				$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE)
			{
					
			if($gn3){
				
				
				//fuel_loa_with_attach
					
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	         $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if(!empty($_FILES['fuel_loa_with_attach']['name'])){
			
				if ( ! $this->upload->do_upload('fuel_loa_with_attach'))
				{ $error = array('error' => $this->upload->display_errors()); 
				
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'fuel_loa_with_attach' => ''
						);
						
						$this->WM->update_gn_3_file($state_sector_c, 'fuel_loa_with_attach');
				
				}
				else
				{
						$fuel_loa_with_attach_data = array('upload_data' => $this->upload->data());
						$fuel_loa_with_attach = $fuel_loa_with_attach_data['upload_data']['file_name'];
						
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'fuel_loa_with_attach' => $fuel_loa_with_attach
						);
						
						$this->WM->update_gn_3_file($state_sector_c, 'fuel_loa_with_attach');
							
				}
			}
	        
			
			//fuel_supply_agreement_attachment
			unset($config);		
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	       $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if(!empty($_FILES['fuel_supply_agreement_attachment']['name'])){
			
				if ( ! $this->upload->do_upload('fuel_supply_agreement_attachment'))
				{ $error = array('error' => $this->upload->display_errors()); 
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'fuel_supply_agreement_attachment' => ''
						);
						
						$this->WM->update_gn_3_file($state_sector_c, 'fuel_supply_agreement_attachment');
				}
				else
				{
						$fuel_supply_agreement_attachment_data = array('upload_data' => $this->upload->data());
						$fuel_supply_agreement_attachment = $fuel_supply_agreement_attachment_data['upload_data']['file_name'];
						
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'fuel_supply_agreement_attachment' => $fuel_supply_agreement_attachment
						);
						
						$this->WM->update_gn_3_file($state_sector_c, 'fuel_supply_agreement_attachment');
				}
			}
			
			//water_allocation_attach
			unset($config);		
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if(!empty($_FILES['water_allocation_attach']['name'])){
				if ( ! $this->upload->do_upload('water_allocation_attach'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'water_allocation_attach' => ''
						);
						
						$this->WM->update_gn_3_file($state_sector_c, 'water_allocation_attach');
						
				}
				else
				{
						$water_allocation_attach_data = array('upload_data' => $this->upload->data());
						$water_allocation_attach = $water_allocation_attach_data['upload_data']['file_name'];
						
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'water_allocation_attach' => $water_allocation_attach
						);
						
						$this->WM->update_gn_3_file($state_sector_c, 'water_allocation_attach');
				}
			}
			
			
			/*
			'hydo_year_data_avail_attach'=>$hydo_year_data_avail_attach,
			*/
			
			//hydro_environmental_impact
			unset($config);		
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if(!empty($_FILES['hydro_environmental_impact']['name'])){
				if ( ! $this->upload->do_upload('hydro_environmental_impact'))
				{ $error = array('error' => $this->upload->display_errors()); 
				
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'hydro_environmental_impact' => ''
						);
						
						$this->WM->update_gn_3_file($state_sector_c, 'hydro_environmental_impact');
					
				}
				else
				{
						$hydro_environmental_impact_data = array('upload_data' => $this->upload->data());
						$hydro_environmental_impact = $hydro_environmental_impact_data['upload_data']['file_name'];
						
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'hydro_environmental_impact' => $hydro_environmental_impact
						);
						
						$this->WM->update_gn_3_file($state_sector_c, 'hydro_environmental_impact');
				}
			}
			
			//hydo_year_data_avail_attach
			unset($config);		
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if(!empty($_FILES['hydo_year_data_avail_attach']['name'])){
				if ( ! $this->upload->do_upload('hydo_year_data_avail_attach'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'hydo_year_data_avail_attach' => ''
						);
						
						$this->WM->update_gn_3_file($state_sector_c, 'hydo_year_data_avail_attach');
				}
				else
				{
						$hydo_year_data_avail_attach_data = array('upload_data' => $this->upload->data());
						$hydo_year_data_avail_attach = $hydo_year_data_avail_attach_data['upload_data']['file_name'];
						
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'hydo_year_data_avail_attach' => $hydo_year_data_avail_attach
						);
						
						$this->WM->update_gn_3_file($state_sector_c, 'hydo_year_data_avail_attach');
				}
			}
			
			$gn_3 = array(
				'user_id'=>$this->session->userdata('user')['id'],
				'app_id'=>$this->session->userdata('app_id'),
				'form_id' => $this->session->userdata('form_id'),
				'location_geological_coord'=>$this->input->post('phase1_loc_lan_wat')['location_geological_coord'],
				'location_weather_located'=>$this->input->post('phase1_loc_lan_wat')['location_weather_located'],
				'location_mearest_forest'=>$this->input->post('phase1_loc_lan_wat')['location_mearest_forest'],
				'location_mearest_port_distance'=>$this->input->post('phase1_loc_lan_wat')['location_mearest_port_distance'],
				'location_railway_station_distance'=>$this->input->post('phase1_loc_lan_wat')['location_railway_station_distance'],
				'location_nearest_national_highway'=>$this->input->post('phase1_loc_lan_wat')['location_nearest_national_highway'],
				'location_coal_gas_source'=>$this->input->post('phase1_loc_lan_wat')['location_coal_gas_source'],
				'land_classification_current'=>$this->input->post('phase1_loc_lan_wat')['land_classification_current'],
				'land_land_required'=>$this->input->post('phase1_loc_lan_wat')['land_land_required'],
				'land_land_required_for_main_plant'=>$this->input->post('phase1_loc_lan_wat')['land_land_required_for_main_plant'],
				'land_acquired_till_date'=>$this->input->post('phase1_loc_lan_wat')['land_acquired_till_date'],
				'fuel_domestic_coal_gas'=>$this->input->post('phase1_loc_lan_wat')['fuel_domestic_coal_gas'],
				'fuel_request_per_annum_capacity'=>$this->input->post('phase1_loc_lan_wat')['fuel_request_per_annum_capacity'],
				'fuel_imported_call'=>$this->input->post('phase1_loc_lan_wat')['fuel_imported_call'],
				'fuel_imported_call_request_per_annum_capacity'=>$this->input->post('phase1_loc_lan_wat')['fuel_imported_call_request_per_annum_capacity'],
				'fuel_plan_meeting_fuel_requirement'=>$this->input->post('phase1_loc_lan_wat')['fuel_plan_meeting_fuel_requirement'],
				'fuel_loa_with'=>$this->input->post('phase1_loc_lan_wat')['fuel_loa_with'],
				'fuel_loa_date'=>$this->input->post('phase1_loc_lan_wat')['fuel_loa_date'],
				'fuel_quantum_fuel_supply'=>$this->input->post('phase1_loc_lan_wat')['fuel_quantum_fuel_supply'],
				'fuel_validity_of_loa'=>$this->input->post('phase1_loc_lan_wat')['fuel_validity_of_loa'],
				'fuel_supply_agreement'=>$this->input->post('phase1_loc_lan_wat')['fuel_supply_agreement'],
				'fuel_annual_contracted_quantity'=>$this->input->post('phase1_loc_lan_wat')['fuel_annual_contracted_quantity'],
				'fuel_end_use_application'=>$this->input->post('phase1_loc_lan_wat')['fuel_end_use_application'],
				'fuel_compensation_for_short'=>$this->input->post('phase1_loc_lan_wat')['fuel_compensation_for_short'],
				'fuel_price'=>$this->input->post('phase1_loc_lan_wat')['fuel_price'],
				'fuel_escalation'=>$this->input->post('phase1_loc_lan_wat')['fuel_escalation'],
				'water_per_day'=>$this->input->post('phase1_loc_lan_wat')['water_per_day'],
				'water_per_annum'=>$this->input->post('phase1_loc_lan_wat')['water_per_annum'],
				'water_name_of_source'=>$this->input->post('phase1_loc_lan_wat')['water_name_of_source'],
				'water_distance'=>$this->input->post('phase1_loc_lan_wat')['water_distance'],
				'water_allocation'=>$this->input->post('phase1_loc_lan_wat')['water_allocation'],
				'water_transportation'=>$this->input->post('phase1_loc_lan_wat')['water_transportation'],
				'water_cooling_system'=>$this->input->post('phase1_loc_lan_wat')['water_cooling_system'],
				'hydro_resettlement'=>$this->input->post('phase1_loc_lan_wat')['hydro_resettlement'],
				'hydro_family_resettled'=>$this->input->post('phase1_loc_lan_wat')['hydro_family_resettled'],
				'hydro_extent_deforestation'=>$this->input->post('phase1_loc_lan_wat')['hydro_extent_deforestation'],
				'hydro_flora_fauna'=>$this->input->post('phase1_loc_lan_wat')['hydro_flora_fauna'],
				'hydro_forests_wildlife'=>$this->input->post('phase1_loc_lan_wat')['hydro_forests_wildlife'],
				'hydro_archaelogical_monuments'=>$this->input->post('phase1_loc_lan_wat')['hydro_archaelogical_monuments'],
				'hydro_degradation_catchment_area'=>$this->input->post('phase1_loc_lan_wat')['hydro_degradation_catchment_area'],
				'hydro_rock_mass_rating'=>$this->input->post('phase1_loc_lan_wat')['hydro_rock_mass_rating'],
				'typo_access_to_site'=>$this->input->post('phase1_loc_lan_wat')['typo_access_to_site'],
				'typo_issue_pretaining_heavy_equipment'=>$this->input->post('phase1_loc_lan_wat')['typo_issue_pretaining_heavy_equipment'],
				'typo_potential_land_side_problems'=>$this->input->post('phase1_loc_lan_wat')['typo_potential_land_side_problems'],
				'seismic_zone'=>$this->input->post('phase1_loc_lan_wat')['seismic_zone'],
				'hydo_year_data_avail'=>$this->input->post('phase1_loc_lan_wat')['hydo_year_data_avail'],
			);
			//insert data 
			$this->WM->update_gn_3($gn_3);
				
			}else{
			//fuel_loa_with_attach
					
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('fuel_loa_with_attach'))
	        { $error = array('error' => $this->upload->display_errors()); $fuel_loa_with_attach ='';}
	        else
	        {
	                $fuel_loa_with_attach_data = array('upload_data' => $this->upload->data());
					$fuel_loa_with_attach = $fuel_loa_with_attach_data['upload_data']['file_name'];
	        }
	        
			
			//fuel_supply_agreement_attachment
			unset($config);		
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('fuel_supply_agreement_attachment'))
	        { $error = array('error' => $this->upload->display_errors()); $fuel_supply_agreement_attachment ='';}
	        else
	        {
	                $fuel_supply_agreement_attachment_data = array('upload_data' => $this->upload->data());
					$fuel_supply_agreement_attachment = $fuel_supply_agreement_attachment_data['upload_data']['file_name'];
	        }
			
			//water_allocation_attach
			unset($config);		
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	         $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('water_allocation_attach'))
	        { $error = array('error' => $this->upload->display_errors()); $water_allocation_attach ='';}
	        else
	        {
	                $water_allocation_attach_data = array('upload_data' => $this->upload->data());
					$water_allocation_attach = $water_allocation_attach_data['upload_data']['file_name'];
	        }
			
			
			/*
			'hydo_year_data_avail_attach'=>$hydo_year_data_avail_attach,
			*/
			
			//hydro_environmental_impact
			unset($config);		
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('hydro_environmental_impact'))
	        { $error = array('error' => $this->upload->display_errors()); $hydro_environmental_impact ='';}
	        else
	        {
	                $hydro_environmental_impact_data = array('upload_data' => $this->upload->data());
					$hydro_environmental_impact = $hydro_environmental_impact_data['upload_data']['file_name'];
	        }
			
			//hydo_year_data_avail_attach
			unset($config);		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('hydo_year_data_avail_attach'))
	        { $error = array('error' => $this->upload->display_errors()); $hydo_year_data_avail_attach ='';}
	        else
	        {
	                $hydo_year_data_avail_attach_data = array('upload_data' => $this->upload->data());
					$hydo_year_data_avail_attach = $hydo_year_data_avail_attach_data['upload_data']['file_name'];
	        }
			 
			$gn_3 = array(
				'user_id'=>$this->session->userdata('user')['id'],
				'app_id'=>$this->session->userdata('app_id'),
				'form_id' => $this->session->userdata("form_id"),
				'location_geological_coord'=>$this->input->post('phase1_loc_lan_wat')['location_geological_coord'],
				'location_weather_located'=>$this->input->post('phase1_loc_lan_wat')['location_weather_located'],
				'location_mearest_forest'=>$this->input->post('phase1_loc_lan_wat')['location_mearest_forest'],
				'location_mearest_port_distance'=>$this->input->post('phase1_loc_lan_wat')['location_mearest_port_distance'],
				'location_railway_station_distance'=>$this->input->post('phase1_loc_lan_wat')['location_railway_station_distance'],
				'location_nearest_national_highway'=>$this->input->post('phase1_loc_lan_wat')['location_nearest_national_highway'],
				'location_coal_gas_source'=>$this->input->post('phase1_loc_lan_wat')['location_coal_gas_source'],
				'land_classification_current'=>$this->input->post('phase1_loc_lan_wat')['land_classification_current'],
				'land_land_required'=>$this->input->post('phase1_loc_lan_wat')['land_land_required'],
				'land_land_required_for_main_plant'=>$this->input->post('phase1_loc_lan_wat')['land_land_required_for_main_plant'],
				'land_acquired_till_date'=>$this->input->post('phase1_loc_lan_wat')['land_acquired_till_date'],
				'fuel_domestic_coal_gas'=>$this->input->post('phase1_loc_lan_wat')['fuel_domestic_coal_gas'],
				'fuel_request_per_annum_capacity'=>$this->input->post('phase1_loc_lan_wat')['fuel_request_per_annum_capacity'],
				'fuel_imported_call'=>$this->input->post('phase1_loc_lan_wat')['fuel_imported_call'],
				'fuel_imported_call_request_per_annum_capacity'=>$this->input->post('phase1_loc_lan_wat')['fuel_imported_call_request_per_annum_capacity'],
				'fuel_plan_meeting_fuel_requirement'=>$this->input->post('phase1_loc_lan_wat')['fuel_plan_meeting_fuel_requirement'],
				'fuel_loa_with'=>$this->input->post('phase1_loc_lan_wat')['fuel_loa_with'],
				'fuel_loa_date'=>$this->input->post('phase1_loc_lan_wat')['fuel_loa_date'],
				'fuel_quantum_fuel_supply'=>$this->input->post('phase1_loc_lan_wat')['fuel_quantum_fuel_supply'],
				'fuel_validity_of_loa'=>$this->input->post('phase1_loc_lan_wat')['fuel_validity_of_loa'],
				'fuel_supply_agreement'=>$this->input->post('phase1_loc_lan_wat')['fuel_supply_agreement'],
				'fuel_annual_contracted_quantity'=>$this->input->post('phase1_loc_lan_wat')['fuel_annual_contracted_quantity'],
				'fuel_end_use_application'=>$this->input->post('phase1_loc_lan_wat')['fuel_end_use_application'],
				'fuel_compensation_for_short'=>$this->input->post('phase1_loc_lan_wat')['fuel_compensation_for_short'],
				'fuel_price'=>$this->input->post('phase1_loc_lan_wat')['fuel_price'],
				'fuel_escalation'=>$this->input->post('phase1_loc_lan_wat')['fuel_escalation'],
				'water_per_day'=>$this->input->post('phase1_loc_lan_wat')['water_per_day'],
				'water_per_annum'=>$this->input->post('phase1_loc_lan_wat')['water_per_annum'],
				'water_name_of_source'=>$this->input->post('phase1_loc_lan_wat')['water_name_of_source'],
				'water_distance'=>$this->input->post('phase1_loc_lan_wat')['water_distance'],
				'water_allocation'=>$this->input->post('phase1_loc_lan_wat')['water_allocation'],
				'water_transportation'=>$this->input->post('phase1_loc_lan_wat')['water_transportation'],
				'water_cooling_system'=>$this->input->post('phase1_loc_lan_wat')['water_cooling_system'],
				'hydro_resettlement'=>$this->input->post('phase1_loc_lan_wat')['hydro_resettlement'],
				'hydro_family_resettled'=>$this->input->post('phase1_loc_lan_wat')['hydro_family_resettled'],
				'hydro_extent_deforestation'=>$this->input->post('phase1_loc_lan_wat')['hydro_extent_deforestation'],
				'hydro_flora_fauna'=>$this->input->post('phase1_loc_lan_wat')['hydro_flora_fauna'],
				'hydro_forests_wildlife'=>$this->input->post('phase1_loc_lan_wat')['hydro_forests_wildlife'],
				'hydro_archaelogical_monuments'=>$this->input->post('phase1_loc_lan_wat')['hydro_archaelogical_monuments'],
				'hydro_degradation_catchment_area'=>$this->input->post('phase1_loc_lan_wat')['hydro_degradation_catchment_area'],
				'hydro_rock_mass_rating'=>$this->input->post('phase1_loc_lan_wat')['hydro_rock_mass_rating'],
				'typo_access_to_site'=>$this->input->post('phase1_loc_lan_wat')['typo_access_to_site'],
				'typo_issue_pretaining_heavy_equipment'=>$this->input->post('phase1_loc_lan_wat')['typo_issue_pretaining_heavy_equipment'],
				'typo_potential_land_side_problems'=>$this->input->post('phase1_loc_lan_wat')['typo_potential_land_side_problems'],
				'seismic_zone'=>$this->input->post('phase1_loc_lan_wat')['seismic_zone'],
				'hydo_year_data_avail'=>$this->input->post('phase1_loc_lan_wat')['hydo_year_data_avail'],
				'fuel_loa_with_attach'=>$fuel_loa_with_attach,
				'fuel_supply_agreement_attachment'=>$fuel_supply_agreement_attachment,
				'water_allocation_attach'=>$water_allocation_attach,
				'hydro_environmental_impact'=>$hydro_environmental_impact,
				'hydo_year_data_avail_attach'=>$hydo_year_data_avail_attach
			);
			//insert data 
			$this->WM->insert_gn_3($gn_3);}
			
			$data = array(
					'url' => "form1/index/gn/step4",
				);
				$this->db->where('user_id', $user_id);
				$this->db->where("form_id", $this->session->userdata('form_id'));
			redirect(base_url()."form1/index/gn/step4");
			
			}else{
				$error = $this->form_validation->error_array();
				$this->session->set_flashdata('step3', $error);
				redirect(base_url()."form1/index/gn/step3");
			}
		}
	}

	// process process_generation_4
	public function process_generation_4(){
		$data['gn_a'] = $this->WM->get_generation_a();
		
		if($data['gn_a']){
			$this->session->set_userdata("app_id", $data['gn_a']['app_id']);	
		}
		$user_id = $this->session->userdata('user')['id'];
		
		if($this->input->method(true)=="POST"){
			//check if already exists
			$gn4 = $this->WM->check_gn4_exist($user_id);
			
			if($gn4){
				
				$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
				$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if(!empty($_FILES['time_schedule_file']['name'])){
				if ( ! $this->upload->do_upload('time_schedule_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$update_gn_4_file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'time_schedule_file' => ''
						);
						
						$this->WM->update_gn_4_file($update_gn_4_file, 'time_schedule_file');
				}
				else
				{
						$time_schedule_file_data = array('upload_data' => $this->upload->data());
						$time_schedule_file = $time_schedule_file_data['upload_data']['file_name'];
						
						$update_gn_4_file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'time_schedule_file' => $time_schedule_file
						);
						
						$this->WM->update_gn_4_file($update_gn_4_file, 'time_schedule_file');
				}
			}
				
			$gen_4 =array(
				'user_id'=>$this->session->userdata('user')['id'],
				'app_id'=>$this->session->userdata('app_id'),
				'form_id' => $this->session->userdata("form_id"),
				'contract_project1'=>$this->input->post('contract_project1'), 
				'contract_epc_route'=>$this->input->post('contract_epc_route'), 
				'contract_non_epc_route'=>$this->input->post('contract_non_epc_route'),

				 
				'contract_contractor_past_record'=>$this->input->post('contract_contractor_past_record'), 
				'contract_num_of_plants'=>$this->input->post('contract_num_of_plants'), 
				'contract_installations_india'=>$this->input->post('contract_installations_india'), 
				'contract_installations_abroad'=>$this->input->post('contract_installations_abroad'), 
				'contract_past_project_implemeted_time_cost'=>$this->input->post('contract_past_project_implemeted_time_cost'), 
				'contract_years_in_business_tunover_employees'=>$this->input->post('contract_years_in_business_tunover_employees'), 
				'contract_years_in_business'=>$this->input->post('contract_years_in_business'), 
				'contract_epc_contractor_group_company'=>$this->input->post('contract_epc_contractor_group_company'), 
				'project_management_team_member'=>serialize($this->input->post('project_management_team_member')),
				'owners_engineer'=>$this->input->post('owners_engineer'), 
				'cost_overrun'=>$this->input->post('cost_overrun'), 
				'time_schedule'=>$this->input->post('time_schedule'), 
				'om_contract'=>$this->input->post('om_contract'), 
				'copies_of_licenses'=>$this->input->post('copies_of_licenses'), 
				'project_allotment_letter'=>$this->input->post('project_allotment_letter'), 
				'dpr'=>$this->input->post('dpr'), 
				'feasibility_report'=>$this->input->post('feasibility_report'), 
				'hydrology_studies'=>$this->input->post('hydrology_studies'), 
				'land_search_report'=>$this->input->post('land_search_report'), 
				'mutation_of_all_transaction'=>$this->input->post('mutation_of_all_transaction'), 
				'proof_of_acquisition_land'=>$this->input->post('proof_of_acquisition_land'), 
				'letter_allocation_allotment_assurance_fuel_water'=>$this->input->post('letter_allocation_allotment_assurance_fuel_water'), 
				'copies_fuel_supply_agreement_case'=>$this->input->post('copies_fuel_supply_agreement_case'), 
				'copies_of_major_contracts'=>$this->input->post('copies_of_major_contracts'), 
				'project_layout_diagram'=>$this->input->post('project_layout_diagram'), 
				'pert_cpm_charts'=>$this->input->post('pert_cpm_charts'), 
				'list_of_consltants'=>$this->input->post('list_of_consltants'), 
				'project_management'=>$this->input->post('project_management'), 
				'detailed_engineering'=>$this->input->post('detailed_engineering'), 
				'owners_engineers'=>$this->input->post('owners_engineers'), 
				'procurement'=>$this->input->post('procurement'), 
				'contractor_for_main_plant_bop'=>$this->input->post('contractor_for_main_plant_bop'), 
				'supplier_main_plant_machine_btg_package'=>$this->input->post('supplier_main_plant_machine_btg_package')
			);
			$this->WM->update_gn_4($gen_4);
		}else {
			
		// time_schedule_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('time_schedule_file'))
	        { $error = array('error' => $this->upload->display_errors()); $time_schedule_file ='';}
	        else
	        {
	                $time_schedule_file_data = array('upload_data' => $this->upload->data());
					$time_schedule_file = $time_schedule_file_data['upload_data']['file_name'];
	        }
			
		$gen_4 =array(
			'user_id'=>$this->session->userdata('user')['id'],
			'app_id'=>$this->session->userdata('app_id'),
			'form_id' => $this->session->userdata("form_id"),
			'contract_project1'=>$this->input->post('contract_project1'), 
			'contract_epc_route'=>$this->input->post('contract_epc_route'), 
						
			'contract_non_epc_route'=>$this->input->post('contract_non_epc_route'), 
			'contract_contractor_past_record'=>$this->input->post('contract_contractor_past_record'), 
			'contract_num_of_plants'=>$this->input->post('contract_num_of_plants'), 
			'contract_installations_india'=>$this->input->post('contract_installations_india'), 
			'contract_installations_abroad'=>$this->input->post('contract_installations_abroad'), 
			'contract_past_project_implemeted_time_cost'=>$this->input->post('contract_past_project_implemeted_time_cost'), 
			'contract_years_in_business_tunover_employees'=>$this->input->post('contract_years_in_business_tunover_employees'), 
			'contract_years_in_business'=>$this->input->post('contract_years_in_business'), 
			'contract_epc_contractor_group_company'=>$this->input->post('contract_epc_contractor_group_company'), 
			'project_management_team_member'=>serialize($this->input->post('project_management_team_member')),
			'owners_engineer'=>$this->input->post('owners_engineer'), 
			
			'cost_overrun'=>$this->input->post('cost_overrun'), 
			'time_schedule'=>$this->input->post('time_schedule'), 
			'time_schedule_file' => $time_schedule_file,
			'om_contract'=>$this->input->post('om_contract'), 
			'copies_of_licenses'=>$this->input->post('copies_of_licenses'), 
			'project_allotment_letter'=>$this->input->post('project_allotment_letter'), 
			'dpr'=>$this->input->post('dpr'), 
			'feasibility_report'=>$this->input->post('feasibility_report'), 
			'hydrology_studies'=>$this->input->post('hydrology_studies'), 
			'land_search_report'=>$this->input->post('land_search_report'), 
			'mutation_of_all_transaction'=>$this->input->post('mutation_of_all_transaction'), 
			'proof_of_acquisition_land'=>$this->input->post('proof_of_acquisition_land'), 
			'letter_allocation_allotment_assurance_fuel_water'=>$this->input->post('letter_allocation_allotment_assurance_fuel_water'), 
			'copies_fuel_supply_agreement_case'=>$this->input->post('copies_fuel_supply_agreement_case'), 
			'copies_of_major_contracts'=>$this->input->post('copies_of_major_contracts'), 
			'project_layout_diagram'=>$this->input->post('project_layout_diagram'), 
			'pert_cpm_charts'=>$this->input->post('pert_cpm_charts'), 
			'list_of_consltants'=>$this->input->post('list_of_consltants'), 
			'project_management'=>$this->input->post('project_management'), 
			'detailed_engineering'=>$this->input->post('detailed_engineering'), 
			'owners_engineers'=>$this->input->post('owners_engineers'), 
			'procurement'=>$this->input->post('procurement'), 
			'contractor_for_main_plant_bop'=>$this->input->post('contractor_for_main_plant_bop'), 
			'supplier_main_plant_machine_btg_package'=>$this->input->post('supplier_main_plant_machine_btg_package')
			);
		
			$this->WM->insert_gn4($gen_4);
				
				$data = array(
					'url' => "form1/index/gn/step5",
				);
				$this->db->where('user_id', $user_id);
				$this->db->where("form_id", $this->session->userdata('form_id'));
				$this->db->update('tbl_generation_a', $data);
			}
		}
		redirect(base_url()."form1/index/gn/step5");
	}

	public function process_generation_agree(){ 
		
		$data['gn_a'] = $this->WM->get_generation_a();
		
		if($data['gn_a']){
			$this->session->set_userdata("app_id", $data['gn_a']['app_id']);	
		}

		if($this->input->method(true)=="POST"){
			$status = array(
				'place' => $this->input->post('place'),
				'date' => $this->input->post('date'),
				"declaration_agree"=>$this->input->post('declaration_agree')
			);
			
			$this->db->where('user_id', $this->session->userdata('user')['id']);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			$this->db->update('tbl_generation_a', $status);
			
			$this->db->select("url");
			$this->db->from('tbl_generation_a');
			$this->db->where('user_id', $this->session->userdata('user')['id']);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			$data = $this->db->get()->row_array();
			if($data['url'])
			{
				$data = array(
					'url' => "form1/index/gn/step5"
				);
				$this->db->where('user_id', $this->session->userdata('user')['id']);
				$this->db->where("form_id", $this->session->userdata('form_id'));
				$this->db->update('tbl_generation_a', $data);
			}
			
			
			if($this->input->post('declaration_agree')){
				$data['msg'] = '<div class="alert alert-success">Dear %s, <br />Your Generation form has been successfully submitted. Please wait while we review your form. <br><br> Sincerely, <br>RECL Team</div>';	
			}else{
				$data['msg'] = '<div class="alert alert-warning">Dear %s, <br />Your Generation form has been successfully submitted. You must agree our T&C to complete your form if you do not afree to our T&C the form remains incomplete. 
				<br ><br > <a href="'.base_url().'form1/index/gn/step5" class="btn btn-default">Click here to go back to previous page</a> 
				<br><br> Sincerely, <br>RECL Team</div>';
			}
			
			
			redirect(base_url()."form2");
		}
		
		#$this->load->view('success', $data);
		
		
		
	}
	
	// renewal form goes here
	public function process_rn_1(){
		
		$data['rn_1'] = $this->WM->renewal_form_v();
		
		if($data['rn_1']){
			$this->session->set_userdata('app_id', $data['rn_1']['app_id']);
		}
		
		//checking if records exists
		if($this->input->method(TRUE)=="POST"){
		$user_id = $this->session->userdata('user')['id'];
		
		$check_rn_1 = $this->WM->check_rn1_exist($user_id);
		
		
		// inserting borrower
		
		
	
		if($check_rn_1){
			
			if($this->input->post('project_type')=='Others'){ $project_type_other = $this->input->post('project_type_other'); }
			else{ $project_type_other = ""; }
			
			if($this->input->post('powersale1')=='Others'){ $chkPowersale1_othes = $this->input->post('chkPowersale1_othes'); }
			else{$chkPowersale1_othes = ""; }
			
			// inserting images
			
			//auth_sign_prj
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('auth_sign_prj'))
	        { $error = array('error' => $this->upload->display_errors()); $auth_sign_prj ='';}
	        else
	        {
	                $auth_sign_prj_data = array('upload_data' => $this->upload->data());
					$auth_sign_prj = $auth_sign_prj_data['upload_data']['file_name'];
					
					$state_sector_c = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'auth_sign_prj' => $auth_sign_prj
					);
					
					$this->WM->update_rn_1_file($state_sector_c, 'auth_sign_prj');
					
					
	        }
			
			unset($config);
			
			//auth_person_file
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('auth_person_file'))
	        { $error = array('error' => $this->upload->display_errors()); $auth_person_file ='';}
	        else
	        {
	                $auth_person_file_data = array('upload_data' => $this->upload->data());
					$auth_person_file = $auth_person_file_data['upload_data']['file_name'];
					
					$state_sector_c = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'auth_person_file' => $auth_person_file
					);
					
					$this->WM->update_rn_1_file($state_sector_c, 'auth_person_file');
					
	        }
			
			//Setting data 
			if($this->input->post('type_consumer') == "Others")
			{
				$type_consumer_othes = $this->input->post('type_consumer_othes'); 
			}else
			{
				$type_consumer_othes = "";
			}
			
			$rn_1 = array(
				'user_id'=>$this->session->userdata('user')['id'],
				'app_id'=>$this->session->userdata('app_id'),
				'form_id' => $this->session->userdata("form_id"),
				'rn_aproject_name'=>$this->input->post('rn_aproject_name'),
				'project_type'=>$this->input->post('project_type'),
				'project_type_other' => $project_type_other,
				'project_capacity'=>$this->input->post('project_capacity'),
				'location'=>$this->input->post('location'),
				'powersale1'=>$this->input->post('powersale1'),
				'chkPowersale1_othes'=>$chkPowersale1_othes,
				'cost_without_idc'=>$this->input->post('cost_without_idc'),
				'idc'=>$this->input->post('idc'),
				'cost_with_idc'=>$this->input->post('cost_with_idc'),
				'cost_per_mw'=>$this->input->post('cost_per_mw'),
				'debt'=>$this->input->post('debt'),
				'equity'=>$this->input->post('equity'),
				'equity_amnt'=>$this->input->post('equity_amnt'),
				'debt_amnt'=>$this->input->post('debt_amnt'),
				'loan_reqst'=>$this->input->post('loan_reqst'),
				'lead_fi'=>$this->input->post('lead_fi'),
				'cons_period'=>$this->input->post('cons_period'),
				'loan_repay_period'=>$this->input->post('loan_repay_period'),
				'prj_complt_date'=>$this->input->post('prj_complt_date'),
				'awarding_project'=>$this->input->post('awarding_project'),
				'type_consumer'=>$this->input->post('type_consumer'),
				'type_consumer_othes'=>$type_consumer_othes,
				'cost_without_roe'=>$this->input->post('cost_without_roe'),
				'borrower_name'=>$this->input->post('borrower_name'),
				'directors'=>serialize($this->input->post('directors')),
				'group_comp_name'=>$this->input->post('group_comp_name'),
				'group_company_struc'=>$this->input->post('group_company_struc'),
				'promoter_contri'=>$this->input->post('promoter_contri'),
				'auth_sign_name'=>$this->input->post('auth_sign_name'),
				'auth_sign_add'=>$this->input->post('auth_sign_add'),
				'auth_sign_phn'=>$this->input->post('auth_sign_phn'),
				'auth_sign_email'=>$this->input->post('auth_sign_email'),
				'auth_sign_pan'=>$this->input->post('auth_sign_pan'),
				'auth_sign_adhar'=>$this->input->post('auth_sign_adhar'),
				'auth_person_name'=>$this->input->post('auth_person_name'),
				'auth_person_add'=>$this->input->post('auth_person_add'),
				'auth_person_phn'=>$this->input->post('auth_person_phn'),
				'auth_person_email'=>$this->input->post('auth_person_email'),
				'auth_person_pan'=>$this->input->post('auth_person_pan'),
				'auth_person_adhar'=>$this->input->post('auth_person_adhar'),
			);
			
			$this->WM->update_rn_1($rn_1);
			
		}else{
			
			if(!empty($this->input->post('form_id'))) {
				
				$this->session->set_userdata('form_id', $this->input->post('form_id'));
				$form_id = $this->session->userdata('form_id');
				
			}else{
			
		$this->session->unset_userdata('form_id');
		$this->db->select("form_id");
		$this->db->from("tbl_generation_a");
		$this->db->order_by("form_id","desc");
		//$this->db->where("user_id", $user_id);
		$result1 = $this->db->get()->row_array();
		
		if(empty($result1)){
			$result1 = 0;
		}else{
			$result1 = $result1['form_id'];
		}
		
		$this->db->select("form_id");
		$this->db->from("tbl_renew_1");
		$this->db->order_by("form_id","desc");
		$result2 = $this->db->get()->row_array();
		
		if(empty($result2)){
			$result2 = 0;
		}else{
			$result2 = $result2['form_id'];
		}
		
		$this->db->select("form_id");
		$this->db->from("tbl_state_sector");
		$this->db->order_by("form_id","desc");
		$result3 = $this->db->get()->row_array();
		
		if(empty($result3)){
			$result3 = 0;
		}else{
			$result3 = $result3['form_id'];
		}
		
		
		$this->db->select("form_id");
		$this->db->from("tbl_ss_generation_a");
		$this->db->order_by("form_id","desc");
		$result4 = $this->db->get()->row_array();
		if(empty($result4)){
			$result4 = 0;
		}else{
			$result4 = $result4['form_id'];
		}
		
		$getID=array($result1,$result2,$result3,$result4);
		$formID = max($getID) + 1;
		$this->session->set_userdata("form_id", $formID);
					
		}	
			
			if($this->input->post('project_type')=='Others'){ $project_type_other = $this->input->post('project_type_other'); }
			else{ $project_type_other = ""; }
			
			if($this->input->post('powersale1')=='Others'){ $chkPowersale1_othes = $this->input->post('chkPowersale1_othes'); }
			else{$chkPowersale1_othes = ""; }
			
			// inserting images
			
			//auth_sign_prj
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('auth_sign_prj'))
	        { $error = array('error' => $this->upload->display_errors()); $auth_sign_prj ='';}
	        else
	        {
	                $auth_sign_prj_data = array('upload_data' => $this->upload->data());
					$auth_sign_prj = $auth_sign_prj_data['upload_data']['file_name'];
	        }
			
			unset($config);
			
			//auth_person_file
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	         $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('auth_person_file'))
	        { $error = array('error' => $this->upload->display_errors()); $auth_person_file ='';}
	        else
	        {
	                $auth_person_file_data = array('upload_data' => $this->upload->data());
					$auth_person_file = $auth_person_file_data['upload_data']['file_name'];
	        }
			
			//Setting data 
			if(is_array($this->session->userdata('app_id'))){
				$app_id = $this->session->userdata('app_id')['app_id'];
			}else{
				$app_id = $this->session->userdata('app_id');
			}
			
			if($this->input->post('type_consumer') == "Others")
			{
				$type_consumer_othes = $this->input->post('type_consumer_othes'); 
			}else
			{
				$type_consumer_othes = "";
			}
			
			$rn_1 = array(
				'user_id'=>$this->session->userdata('user')['id'],
				'form_id' => $this->session->userdata('form_id'),
				'rn_aproject_name'=>$this->input->post('rn_aproject_name'),
				'project_type'=>$this->input->post('project_type'),
				'project_type_other' => $project_type_other,
				'project_capacity'=>$this->input->post('project_capacity'),
				'location'=>$this->input->post('location'),
				'powersale1'=>$this->input->post('powersale1'),
				'chkPowersale1_othes'=>$chkPowersale1_othes,
				'cost_without_idc'=>$this->input->post('cost_without_idc'),
				'idc'=>$this->input->post('idc'),
				'cost_with_idc'=>$this->input->post('cost_with_idc'),
				'cost_per_mw'=>$this->input->post('cost_per_mw'),
				'debt'=>$this->input->post('debt'),
				'equity'=>$this->input->post('equity'),
				'equity_amnt'=>$this->input->post('equity_amnt'),
				'debt_amnt'=>$this->input->post('debt_amnt'),
				'loan_reqst'=>$this->input->post('loan_reqst'),
				'lead_fi'=>$this->input->post('lead_fi'),
				'cons_period'=>$this->input->post('cons_period'),
				'loan_repay_period'=>$this->input->post('loan_repay_period'),
				'prj_complt_date'=>$this->input->post('prj_complt_date'),
				'awarding_project'=>$this->input->post('awarding_project'),
				'type_consumer'=>$this->input->post('type_consumer'),
				'type_consumer_othes'=>$type_consumer_othes,
				'cost_without_roe'=>$this->input->post('cost_without_roe'),
				'borrower_name'=>$this->input->post('borrower_name'),
				'directors'=>serialize($this->input->post('directors')),
				'group_comp_name'=>$this->input->post('group_comp_name'),
				'group_company_struc'=>$this->input->post('group_company_struc'),
				'promoter_contri'=>$this->input->post('promoter_contri'),
				'auth_sign_name'=>$this->input->post('auth_sign_name'),
				'auth_sign_add'=>$this->input->post('auth_sign_add'),
				'auth_sign_phn'=>$this->input->post('auth_sign_phn'),
				'auth_sign_email'=>$this->input->post('auth_sign_email'),
				'auth_sign_pan'=>$this->input->post('auth_sign_pan'),
				'auth_sign_adhar'=>$this->input->post('auth_sign_adhar'),
				'auth_person_name'=>$this->input->post('auth_person_name'),
				'auth_person_add'=>$this->input->post('auth_person_add'),
				'auth_person_phn'=>$this->input->post('auth_person_phn'),
				'auth_person_email'=>$this->input->post('auth_person_email'),
				'auth_person_pan'=>$this->input->post('auth_person_pan'),
				'auth_person_adhar'=>$this->input->post('auth_person_adhar'),
				'auth_sign_prj'=>$auth_sign_prj,
				'auth_person_file'=>$auth_person_file,
				'date_created'=>date('Y-m-d H:i:s'),
				'status'=>'1'
			);
			
			// insert records
			$this->WM->insert_rn_1($rn_1);
			
			$data = array(
					'url' => "form1/index/rn/renew2",
				);
				$this->db->where('user_id', $user_id);
				$this->db->where("form_id", $this->session->userdata('form_id'));
				$this->db->update('tbl_renew_1', $data);
			
		}
			if($this->input->post('promoter_name')>0){
			for($i=0; $i<sizeof($this->input->post('promoter_name')); $i++){
				
				if(is_array($this->session->userdata('app_id'))){
				$app_id = $this->session->userdata('app_id')['app_id'];
				}else{
					$app_id = $this->session->userdata('app_id');
				}
					$rn1a[] = array(
						'user_id' => $user_id,
						'app_id'=>$app_id,
						'form_id' => $this->session->userdata('form_id'),
						'promoter_name' => $this->input->post('promoter_name')[$i],
						'promoter_shareholding' => $this->input->post('promoter_shareholding')[$i],
						'promoter_phn' =>$this->input->post('promoter_phn')[$i],
						'promoter_email' =>$this->input->post('promoter_email')[$i],
						'promoter_add' =>$this->input->post('promoter_add')[$i],
					);	
						
			}

			$this->WM->insert_rn_1a($rn1a);

		}
		
		redirect(base_url()."form1/index/rn/renew2");

		}
	}

	public function process_rn_2(){
		$data['rn_1'] = $this->WM->renewal_form_v();
		
		if($data['rn_1']){
			$this->session->set_userdata('app_id', $data['rn_1']['app_id']);
		}
		$user_id = $this->session->userdata('user')['id'];
		$check_rn_1 = $this->WM->check_rn2_exist($user_id);
		if($check_rn_1){

			
			//means_finance_file
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('means_finance_file'))
	        { $error = array('error' => $this->upload->display_errors()); $means_finance_file ='';}
	        else
	        {
	                $means_finance_file_data = array('upload_data' => $this->upload->data());
					$means_finance_file = $means_finance_file_data['upload_data']['file_name'];
					
					$rn = array(
						'means_finance_file' => $means_finance_file
					);
					$this->WM->update_rn_2_file($rn, 'means_finance_file');
					
	        }
			
			unset($config);
			
			//info_memo_fin_file
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	         $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('info_memo_fin_file'))
	        { $error = array('error' => $this->upload->display_errors()); $info_memo_fin_file ='';}
	        else
	        {
	                $info_memo_fin_file_data = array('upload_data' => $this->upload->data());
					$info_memo_fin_file = $info_memo_fin_file_data['upload_data']['file_name'];
					
					$rn = array(
						
						'info_memo_fin_file' => $info_memo_fin_file
					);
					
					$this->WM->update_rn_2_file($rn, 'info_memo_fin_file');
					
	        }

			unset($config);
			
			
			//chkShareHold1_file
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	         $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if($this->input->post('chkShareHold1') == "No"){
				$rn = array(
							'chkShareHold1_file' => ""
						);
						
						$this->WM->update_rn_2_file($rn, 'chkShareHold1_file');	
			}else{
			
				if ( ! $this->upload->do_upload('chkShareHold1_file'))
				{ $error = array('error' => $this->upload->display_errors()); $chkShareHold1_file ='';}
				else
				{
						$chkShareHold1_file_data = array('upload_data' => $this->upload->data());
						$chkShareHold1_file = $chkShareHold1_file_data['upload_data']['file_name'];
						
						$rn = array(
							'chkShareHold1_file' => $chkShareHold1_file
						);
						
						$this->WM->update_rn_2_file($rn, 'chkShareHold1_file');		
				}
			}

			unset($config);
			
			//chkWater1_file
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if($this->input->post('chkWater1') == "No"){
				$rn = array(
							'chkWater1_file' => ""
						);
						
						$this->WM->update_rn_2_file($rn, 'chkWater1_file');	
			}else{
			
				if ( ! $this->upload->do_upload('chkWater1_file'))
				{ $error = array('error' => $this->upload->display_errors()); $chkWater1_file ='';}
				else
				{
					$chkWater1_file_data = array('upload_data' => $this->upload->data());
					$chkWater1_file = $chkWater1_file_data['upload_data']['file_name'];
					
					$rn = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'chkWater1_file' => $chkWater1_file
					);
					
					$this->WM->update_rn_2_file($rn, 'chkWater1_file');
				}
			}
			
			unset($config);
			
			//chkEvs1_file
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if($this->input->post('chkEvs1') == "No"){
				$rn = array(
							'chkEvs1_file' => ""
						);
						
						$this->WM->update_rn_2_file($rn, 'chkEvs1_file');	
			}else{
			
				if ( ! $this->upload->do_upload('chkEvs1_file'))
				{ $error = array('error' => $this->upload->display_errors()); $chkEvs1_file ='';}
				else
				{
					$chkEvs1_file_data = array('upload_data' => $this->upload->data());
					$chkEvs1_file = $chkEvs1_file_data['upload_data']['file_name'];
					
					$rn = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'chkEvs1_file' => $chkEvs1_file
					);
					
					$this->WM->update_rn_2_file($rn, 'chkEvs1_file');
						
				}
			}
			unset($config);
			
			//chkForest1_image
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if($this->input->post('chkForest1') == "No" || $this->input->post('chkForest1') == "NA" ){
				$rn = array(
							'chkForest1_image' => ""
						);
						
						$this->WM->update_rn_2_file($rn, 'chkForest1_image');	
			}else{
			
				if ( ! $this->upload->do_upload('chkForest1_image'))
				{ $error = array('error' => $this->upload->display_errors()); $chkForest1_image ='';}
				else
				{
					$chkForest1_image_data = array('upload_data' => $this->upload->data());
					$chkForest1_image = $chkForest1_image_data['upload_data']['file_name'];
					
					$rn = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'chkForest1_image' => $chkForest1_image
					);
					
						$this->WM->update_rn_2_file($rn, 'chkEvs1_file');
				}
			}	

			unset($config);
			
			
			//chkEvacuation1_file
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if($this->input->post('chkEvacuation1') == "No" || $this->input->post('chkEvacuation1') == "NA" ){
				$rn = array(
							'chkEvacuation1_file' => ""
						);
						
						$this->WM->update_rn_2_file($rn, 'chkEvacuation1_file');	
			}else{
			
				if ( ! $this->upload->do_upload('chkEvacuation1_file'))
				{ $error = array('error' => $this->upload->display_errors()); $chkEvacuation1_file ='';}
				else
				{
					$chkEvacuation1_file_data = array('upload_data' => $this->upload->data());
					$chkEvacuation1_file = $chkEvacuation1_file_data['upload_data']['file_name'];
					
					$rn = array(
						'chkEvacuation1_file' => $chkEvacuation1_file
					);
					
					$this->WM->update_rn_2_file($rn, 'chkEvacuation1_file');	
				}
			}	

			unset($config);
			
			//chkCivil1_file
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if($this->input->post('chkEvacuation1') == "No"){
				$rn = array(
							'chkCivil1_file' => ""
						);
						
						$this->WM->update_rn_2_file($rn, 'chkCivil1_file');	
			}else{
			
				if ( ! $this->upload->do_upload('chkCivil1_file'))
				{ $error = array('error' => $this->upload->display_errors()); $chkCivil1_file ='';}
				else
				{
					$chkCivil1_file_data = array('upload_data' => $this->upload->data());
					$chkCivil1_file = $chkCivil1_file_data['upload_data']['file_name'];
					
					$rn = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'chkCivil1_file' => $chkCivil1_file
					);
					
					$this->WM->update_rn_2_file($rn, 'chkCivil1_file');
				}
			}	

			unset($config);
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('drp_attachment'))
	        { $error = array('error' => $this->upload->display_errors()); $drp_attachment ='';}
	        else
	        {
	                $drp_attachment_data = array('upload_data' => $this->upload->data());
					$drp_attachment = $drp_attachment_data['upload_data']['file_name'];
					
					$rn = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'drp_attachment' => $drp_attachment
					);
					
					$this->WM->update_rn_2_file($rn, 'drp_attachment');
					
					
	        }
			
			unset($config);
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('ppa_attachment'))
	        { $error = array('error' => $this->upload->display_errors()); $ppa_attachment ='';}
	        else
	        {
	                $ppa_attachment_data = array('upload_data' => $this->upload->data());
					$ppa_attachment = $ppa_attachment_data['upload_data']['file_name'];
					
					$rn = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'ppa_attachment' => $ppa_attachment
					);
					
					$this->WM->update_rn_2_file($rn, 'ppa_attachment');
					
					
	        }
			unset($config);
			
			//finance_model_file
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('finance_model_file'))
	        { $error = array('error' => $this->upload->display_errors()); $finance_model_file ='';}
	        else
	        {
	                $finance_model_file_data = array('upload_data' => $this->upload->data());
					$finance_model_file = $finance_model_file_data['upload_data']['file_name'];
					
					$rn = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'finance_model_file' => $finance_model_file
					);
					
					$this->WM->update_rn_2_file($rn, 'ppa_attachment');
					
					
	        }
			
			$rn_2 = array(
				'user_id'=>$this->session->userdata('user')['id'],
				'app_id'=>$this->session->userdata('app_id'),
				'form_id' => $this->session->userdata('form_id'),
				'lead_bank'=>$this->input->post('lead_bank'),
				'caost_compare_cerc'=>$this->input->post('caost_compare_cerc'),
				'dpr_whom'=>$this->input->post('dpr_whom'),
				'dpr_y'=>$this->input->post('dpr_y'),
				'statutory_auditor'=>$this->input->post('statutory_auditor'),
				'info_memo_fin'=>$this->input->post('info_memo_fin'),
				'ppa_whom'=>$this->input->post('ppa_whom'),
				'ppa_date'=>$this->input->post('ppa_date'),
				'tariff'=>$this->input->post('tariff'),
				'capacity'=>$this->input->post('capacity'),
				'tenture'=>$this->input->post('tenture'),
				'schdl_cod'=>$this->input->post('schdl_cod'),
				'cr_ratng_pwr_prchse'=>$this->input->post('cr_ratng_pwr_prchse'),
				'pmnt_secrty'=>$this->input->post('pmnt_secrty'),
				'ppa_attachment' =>$ppa_attachment,
				'plf_cuf'=>$this->input->post('plf_cuf'),
				'est_anul_gen'=>$this->input->post('est_anul_gen'),
				'lvel_tariff'=>$this->input->post('lvel_tariff'),
				'lvel_gen_cost'=>$this->input->post('lvel_gen_cost'),
				'escalation' => $this->input->post("escalation"),
				'avg_dscr'=>$this->input->post('avg_dscr'),
				'min_dscr'=>$this->input->post('min_dscr'),
				'max_dscr'=>$this->input->post('max_dscr'),
				'prj_irr_post_tax'=>$this->input->post('prj_irr_post_tax'),
				'prj_irr_pre_tax'=>$this->input->post('prj_irr_pre_tax'),
				'pwr_sale_offtake'=>$this->input->post('pwr_sale_offtake'),
				'evacuation_label' => $this->input->post("evacuation_label"),
				'finance_model' => $this->input->post('finance_model'),
				'chkShareHold1'=>$this->input->post('chkShareHold1'),
				'chkWater1'=>$this->input->post('chkWater1'),
				'chkEvs1'=>$this->input->post('chkEvs1'),
				'chkForest1'=>$this->input->post('chkForest1'),
				'chkEvacuation1'=>$this->input->post('chkEvacuation1'),
				'chkCivil1'=>$this->input->post('chkCivil1'),
				'geo_cord'=>$this->input->post('geo_cord'),
				'located_backward_area'=>$this->input->post('located_backward_area'),
				'nearst_forest'=>$this->input->post('nearst_forest'),
				'nrst_port'=>$this->input->post('nrst_port'),
				'nrst_rail'=>$this->input->post('nrst_rail'),
				'nrst_nh'=>$this->input->post('nrst_nh'),
				'datetime'=>date('Y-m-d H:i:s')
			);
			
			// insert 
			
			$this->db->where('user_id', $user_id);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			$this->db->update('tbl_renew_2', $rn_2);
			
			$this->WM->update_rn_form_2delete();
		if(!empty($this->input->post('bank_name'))){	
			for($i=0; $i<sizeof($this->input->post('bank_name')); $i++){
				
				if(empty($_FILES['sanction_file'.$i]['name'])){
					//sanction_file
					if(empty($this->input->post("sanction_files".$i))){
						$sanction_file  = "";
					}else{
						$sanction_file  = $this->input->post("sanction_files".$i);
					}					
					
				}else{
					
					$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
		    		$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
					
					$this->load->library('upload', $config);
			
					if ( ! $this->upload->do_upload('sanction_file'.$i))
			        { $error = array('error' => $this->upload->display_errors()); $chkCivil1_file ='';}
			        else
			        {
			                $chkfile_data = array('upload_data' => $this->upload->data());
							$sanction_file = $chkfile_data['upload_data']['file_name'];
			        }
		
					unset($config);
					
				}
				$sen[] = array(
						'form_id' => $this->session->userdata('form_id'),
						'user_id'=>$this->session->userdata('user')['id'],
						'bank_name' => $this->input->post('bank_name')[$i],
						'amnt' => $this->input->post('amnt')[$i],
						'chkSanction' => $this->input->post('chkSanction'.$i),
						'sanction_file' =>$sanction_file
					);
				
			}
			$this->WM->update_rn_form_2($sen);
		}	
			
			// inserting 
			
			
			
		}else{
			//means_finance_file
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('means_finance_file'))
	        { $error = array('error' => $this->upload->display_errors()); $means_finance_file ='';}
	        else
	        {
	                $means_finance_file_data = array('upload_data' => $this->upload->data());
					$means_finance_file = $means_finance_file_data['upload_data']['file_name'];
	        }
			
			unset($config);
			
			//means_finance_file
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('info_memo_fin_file'))
	        { $error = array('error' => $this->upload->display_errors()); $info_memo_fin_file ='';}
	        else
	        {
	                $info_memo_fin_file_data = array('upload_data' => $this->upload->data());
					$info_memo_fin_file = $info_memo_fin_file_data['upload_data']['file_name'];
	        }

			unset($config);
			
			
			//chkShareHold1_file
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('chkShareHold1_file'))
	        { $error = array('error' => $this->upload->display_errors()); $chkShareHold1_file ='';}
	        else
	        {
	                $chkShareHold1_file_data = array('upload_data' => $this->upload->data());
					$chkShareHold1_file = $chkShareHold1_file_data['upload_data']['file_name'];
	        }

			unset($config);
			
			//chkWater1_file
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('chkWater1_file'))
	        { $error = array('error' => $this->upload->display_errors()); $chkWater1_file ='';}
	        else
	        {
	                $chkWater1_file_data = array('upload_data' => $this->upload->data());
					$chkWater1_file = $chkWater1_file_data['upload_data']['file_name'];
	        }

			unset($config);
			
			//chkEvs1_file
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('chkEvs1_file'))
	        { $error = array('error' => $this->upload->display_errors()); $chkEvs1_file ='';}
	        else
	        {
	                $chkEvs1_file_data = array('upload_data' => $this->upload->data());
					$chkEvs1_file = $chkEvs1_file_data['upload_data']['file_name'];
	        }

			unset($config);
			
			//chkForest1_image
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('chkForest1_image'))
	        { $error = array('error' => $this->upload->display_errors()); $chkForest1_image ='';}
	        else
	        {
	                $chkForest1_image_data = array('upload_data' => $this->upload->data());
					$chkForest1_image = $chkForest1_image_data['upload_data']['file_name'];
	        }

			unset($config);
			
			
			//chkEvacuation1_file
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('chkEvacuation1_file'))
	        { $error = array('error' => $this->upload->display_errors()); $chkEvacuation1_file ='';}
	        else
	        {
	                $chkEvacuation1_file_data = array('upload_data' => $this->upload->data());
					$chkEvacuation1_file = $chkEvacuation1_file_data['upload_data']['file_name'];
	        }

			unset($config);
			
			//chkCivil1_file
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('chkCivil1_file'))
	        { $error = array('error' => $this->upload->display_errors()); $chkCivil1_file ='';}
	        else
	        {
	                $chkCivil1_file_data = array('upload_data' => $this->upload->data());
					$chkCivil1_file = $chkCivil1_file_data['upload_data']['file_name'];
	        }

			unset($config);
			
			$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
				if ( ! $this->upload->do_upload('drp_attachment'))
                { $error = array('error' => $this->upload->display_errors()); $drp_attachment ='';}
                else
                {
                        $other_document_data = array('upload_data' => $this->upload->data());
						$drp_attachment = $other_document_data['upload_data']['file_name'];
                }
				
				
				unset($config);
				
				//ppa_attachment
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
				if ( ! $this->upload->do_upload('ppa_attachment'))
                { $error = array('error' => $this->upload->display_errors()); $ppa_attachment ='';}
                else
                {
                        $other_document_data = array('upload_data' => $this->upload->data());
						$ppa_attachment = $other_document_data['upload_data']['file_name'];
                }
				unset($config);
				
				//finance_model_file
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
				if ( ! $this->upload->do_upload('finance_model_file'))
                { $error = array('error' => $this->upload->display_errors()); $finance_model_file ='';}
                else
                {
                        $other_document_data = array('upload_data' => $this->upload->data());
						$finance_model_file = $other_document_data['upload_data']['file_name'];
                }
				unset($config);
			
			$rn_2 = array(
				'user_id'=>$this->session->userdata('user')['id'],
				'app_id'=>$this->session->userdata('app_id'),
				'form_id' => $this->session->userdata('form_id'),
				'means_finance_file'=>$means_finance_file,
				'info_memo_fin_file'=>$info_memo_fin_file,
				'chkShareHold1_file'=>$chkShareHold1_file,
				'chkWater1_file' =>$chkWater1_file,
				'chkEvs1_file' =>$chkEvs1_file,
				'chkForest1_image' =>$chkForest1_image,
				'chkEvacuation1_file' =>$chkEvacuation1_file,
				'chkCivil1_file' =>$chkCivil1_file,
				'lead_bank'=>$this->input->post('lead_bank'),
				'caost_compare_cerc'=>$this->input->post('caost_compare_cerc'),
				'dpr_whom'=>$this->input->post('dpr_whom'),
				'dpr_y'=>$this->input->post('dpr_y'),
				'drp_attachment' => $drp_attachment,
				'statutory_auditor'=>$this->input->post('statutory_auditor'),
				'info_memo_fin'=>$this->input->post('info_memo_fin'),
				'ppa_whom'=>$this->input->post('ppa_whom'),
				'ppa_date'=>$this->input->post('ppa_date'),
				'tariff'=>$this->input->post('tariff'),
				'capacity'=>$this->input->post('capacity'),
				'tenture'=>$this->input->post('tenture'),
				'schdl_cod'=>$this->input->post('schdl_cod'),
				'cr_ratng_pwr_prchse'=>$this->input->post('cr_ratng_pwr_prchse'),
				'pmnt_secrty'=>$this->input->post('pmnt_secrty'),
				'ppa_attachment' => $ppa_attachment,
				'plf_cuf'=>$this->input->post('plf_cuf'),
				'est_anul_gen'=>$this->input->post('est_anul_gen'),
				'lvel_tariff'=>$this->input->post('lvel_tariff'),
				'lvel_gen_cost'=>$this->input->post('lvel_gen_cost'),
				'escalation' => $this->input->post("escalation"),
				'avg_dscr'=>$this->input->post('avg_dscr'),
				'min_dscr'=>$this->input->post('min_dscr'),
				'max_dscr'=>$this->input->post('max_dscr'),
				'prj_irr_post_tax'=>$this->input->post('prj_irr_post_tax'),
				'prj_irr_pre_tax'=>$this->input->post('prj_irr_pre_tax'),
				'pwr_sale_offtake'=>$this->input->post('pwr_sale_offtake'),
				'evacuation_label' => $this->input->post("evacuation_label"),
				'finance_model' => $this->input->post("finance_model"),
				'finance_model_file' => $finance_model_file,
				'chkShareHold1'=>$this->input->post('chkShareHold1'),
				'chkWater1'=>$this->input->post('chkWater1'),
				'chkEvs1'=>$this->input->post('chkEvs1'),
				'chkForest1'=>$this->input->post('chkForest1'),
				'chkEvacuation1'=>$this->input->post('chkEvacuation1'),
				'chkCivil1'=>$this->input->post('chkCivil1'),
				'geo_cord'=>$this->input->post('geo_cord'),
				'located_backward_area'=>$this->input->post('located_backward_area'),
				'nearst_forest'=>$this->input->post('nearst_forest'),
				'nrst_port'=>$this->input->post('nrst_port'),
				'nrst_rail'=>$this->input->post('nrst_rail'),
				'nrst_nh'=>$this->input->post('nrst_nh'),
				'datetime'=>date('Y-m-d H:i:s')
			);
			
			// insert 
			
			$this->db->insert('tbl_renew_2', $rn_2 );
			
			$data = array(
					'url' => "form1/index/rn/renew3",
				);
				$this->db->where('user_id', $user_id);
				$this->db->where('form_id', $this->session->userdata('form_id'));
				$this->db->update('tbl_renew_1', $data);
				
			$this->WM->update_rn_form_2delete();
		if(!empty($this->input->post('bank_name'))){	
			for($i=0; $i<sizeof($this->input->post('bank_name')); $i++){
				
				if(empty($_FILES['sanction_file'.$i]['name'])){
					//sanction_file
					if(empty($this->input->post("sanction_files".$i))){
						$sanction_file  = "";
					}else{
						$sanction_file  = $this->input->post("sanction_files".$i);
					}					
					
				}else{
					
					$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
		    		$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
					
					$this->load->library('upload', $config);
			
					if ( ! $this->upload->do_upload('sanction_file'.$i))
			        { $error = array('error' => $this->upload->display_errors()); $chkCivil1_file ='';}
			        else
			        {
			                $chkfile_data = array('upload_data' => $this->upload->data());
							$sanction_file = $chkfile_data['upload_data']['file_name'];
			        }
		
					unset($config);
					
				}
				$sen[] = array(
						'form_id' => $this->session->userdata('form_id'),
						'user_id'=>$this->session->userdata('user')['id'],
						'bank_name' => $this->input->post('bank_name')[$i],
						'amnt' => $this->input->post('amnt')[$i],
						'chkSanction' => $this->input->post('chkSanction'.$i),
						'sanction_file' =>$sanction_file
					);
				
			}
			$this->WM->insert_rn_form_2($sen);
		}
			
			// inserting 
			
			
			
		}
		
		redirect(base_url()."form1/index/rn/renew3");
		
	}

	public function process_rn_3(){
		$data['rn_1'] = $this->WM->renewal_form_v();
		
		if($data['rn_1']){
			$this->session->set_userdata('app_id', $data['rn_1']['app_id']);
		}
		//check data exists
		
		$user_id = $this->session->userdata('user')['id'];
		 
		$chk_data = $this->WM->check_rn3_exist($user_id);
		if($chk_data){
			
		//loa_with_file
		$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('loa_with_file'))
        { $error = array('error' => $this->upload->display_errors()); $loa_with_file ='';}
        else
        {
                $loa_with_file_data = array('upload_data' => $this->upload->data());
				$loa_with_file = $loa_with_file_data['upload_data']['file_name'];
				
				$state_sector_c = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'loa_with_file' => $loa_with_file
					);
					
					$this->WM->update_rn_3_file($state_sector_c, 'loa_with_file');
					
        }

		unset($config);
		
		//alloction_file
		$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('alloction_file'))
        { $error = array('error' => $this->upload->display_errors()); $alloction_file ='';}
        else
        {
                $alloction_file_data = array('upload_data' => $this->upload->data());
				$alloction_file = $alloction_file_data['upload_data']['file_name'];
				
				$state_sector_c = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'alloction_file' => $alloction_file
					);
					
					$this->WM->update_rn_3_file($state_sector_c, 'alloction_file');
        }

		unset($config);
		
		//fuel_supp_agrmnt_file
		$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('alloction_file'))
        { $error = array('error' => $this->upload->display_errors()); $fuel_supp_agrmnt_file ='';}
        else
        {
                $fuel_supp_agrmnt_file_data = array('upload_data' => $this->upload->data());
				$fuel_supp_agrmnt_file = $fuel_supp_agrmnt_file_data['upload_data']['file_name'];
				
				$state_sector_c = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'fuel_supp_agrmnt_file' => $fuel_supp_agrmnt_file
					);
					
					$this->WM->update_rn_3_file($state_sector_c, 'fuel_supp_agrmnt_file');
        }

		unset($config);
		
		
		//envrmnt_impact_prj_file
		$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('envrmnt_impact_prj_file'))
        { $error = array('error' => $this->upload->display_errors()); $envrmnt_impact_prj_file ='';}
        else
        {
                $envrmnt_impact_prj_file_data = array('upload_data' => $this->upload->data());
				$envrmnt_impact_prj_file = $envrmnt_impact_prj_file_data['upload_data']['file_name'];
				
				$state_sector_c = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'envrmnt_impact_prj_file' => $envrmnt_impact_prj_file
					);
					
					$this->WM->update_rn_3_file($state_sector_c, 'envrmnt_impact_prj_file');
        }

		unset($config);
		
		//num_yr_for_whch_data_avail_file
		$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('num_yr_for_whch_data_avail_file'))
        { $error = array('error' => $this->upload->display_errors()); $num_yr_for_whch_data_avail_file ='';}
        else
        {
                $num_yr_for_whch_data_avail_file_data = array('upload_data' => $this->upload->data());
				$num_yr_for_whch_data_avail_file = $num_yr_for_whch_data_avail_file_data['upload_data']['file_name'];
				
				$state_sector_c = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'num_yr_for_whch_data_avail_file' => $num_yr_for_whch_data_avail_file
					);
					
					$this->WM->update_rn_3_file($state_sector_c, 'num_yr_for_whch_data_avail_file');
        }

		unset($config);
		
		/*'loa_with_file'
		'fuel_supp_agrmnt_file'
		'alloction_file'
		'envrmnt_impact_prj_file'
		'num_yr_for_whch_data_avail_file'
		*/
		
		$data = array(
		'user_id'=>$this->session->userdata('user')['id'],
		'app_id'=>$this->session->userdata('app_id'),
		'form_id' => $this->session->userdata('form_id'),
		'curnt_user_of_land'=>$this->input->post('curnt_user_of_land'), 
		'land_req_per_dpr'=>$this->input->post('land_req_per_dpr'), 
		'land_req_main_plant'=>$this->input->post('land_req_main_plant'), 
		'land_aqr_till_date'=>$this->input->post('land_aqr_till_date'), 
		'domestc_coal_gas'=>$this->input->post('domestc_coal_gas'), 
		'domestc_coal_gas_capacity'=>$this->input->post('domestc_coal_gas_capacity'), 
		'imprtd_coal'=>$this->input->post('imprtd_coal'), 
		'imprtd_coal_capacity'=>$this->input->post('imprtd_coal_capacity'), 
		'plan_mett_fuel_req_plant'=>$this->input->post('plan_mett_fuel_req_plant'), 
		'loa_with'=>$this->input->post('loa_with'), 
		'loa_date'=>$this->input->post('loa_date'), 
		'qntm_fuel_supply'=>$this->input->post('qntm_fuel_supply'), 
		'validty_load'=>$this->input->post('validty_load'), 
		'obligation'=>$this->input->post('obligation'), 
		'fuel_supp_agrmnt'=>$this->input->post('fuel_supp_agrmnt'), 
		'anul_contrct_qty'=>$this->input->post('anul_contrct_qty'), 
		'end_use_app'=>$this->input->post('end_use_app'), 
		'compsn_shrt_sply'=>$this->input->post('compsn_shrt_sply'), 
		'base_price'=>$this->input->post('base_price'), 
		'escalation'=>$this->input->post('escalation'), 
		'qntm_watr_req_per_day'=>$this->input->post('qntm_watr_req_per_day'), 
		'qntm_watr_req_per_anm'=>$this->input->post('qntm_watr_req_per_anm'), 
		'name_source'=>$this->input->post('name_source'), 
		'distance'=>$this->input->post('distance'), 
		'alloction'=>$this->input->post('alloction'), 
		'trnsport'=>$this->input->post('trnsport'), 
		'tech_coolng_systm'=>$this->input->post('tech_coolng_systm'), 
		'num_vilg_affect'=>$this->input->post('num_vilg_affect'), 
		'num_fmly_rehbltn'=>$this->input->post('num_fmly_rehbltn'), 
		'extnt_deforst_prj'=>$this->input->post('extnt_deforst_prj'), 
		'steps_flora_fauna'=>$this->input->post('steps_flora_fauna'), 
		'steps_forests_wildlife'=>$this->input->post('steps_forests_wildlife'), 
		'archlogical_monumnts'=>$this->input->post('archlogical_monumnts'), 
		'dgrad_catchmnt_area'=>$this->input->post('dgrad_catchmnt_area'), 
		'rock_mass_rating'=>$this->input->post('rock_mass_rating'), 
		'accs_to_site'=>$this->input->post('accs_to_site'), 
		'issue_pretng_hvy_eqpmnt'=>$this->input->post('issue_pretng_hvy_eqpmnt'), 
		'potential_land_prblm'=>$this->input->post('potential_land_prblm'), 
		'num_yr_for_whch_data_avail'=>$this->input->post('num_yr_for_whch_data_avail'), 
		'seismic_zone'=>$this->input->post('seismic_zone') 
		);
		
		$this->WM->update_rn_3($data);
			
		}else{
			
		//loa_with_file
		$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('loa_with_file'))
        { $error = array('error' => $this->upload->display_errors()); $loa_with_file ='';}
        else
        {
                $loa_with_file_data = array('upload_data' => $this->upload->data());
				$loa_with_file = $loa_with_file_data['upload_data']['file_name'];
        }

		unset($config);
		
		//alloction_file
		$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('alloction_file'))
        { $error = array('error' => $this->upload->display_errors()); $alloction_file ='';}
        else
        {
                $alloction_file_data = array('upload_data' => $this->upload->data());
				
				$alloction_file = $alloction_file_data['upload_data']['file_name'];
        }

		unset($config);
		
		//fuel_supp_agrmnt_file
		$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('alloction_file'))
        { $error = array('error' => $this->upload->display_errors()); $fuel_supp_agrmnt_file ='';}
        else
        {
                $fuel_supp_agrmnt_file_data = array('upload_data' => $this->upload->data());
				$fuel_supp_agrmnt_file = $fuel_supp_agrmnt_file_data['upload_data']['file_name'];
        }

		unset($config);
		
		
		//envrmnt_impact_prj_file
		$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('envrmnt_impact_prj_file'))
        { $error = array('error' => $this->upload->display_errors()); $envrmnt_impact_prj_file ='';}
        else
        {
                $envrmnt_impact_prj_file_data = array('upload_data' => $this->upload->data());
				$envrmnt_impact_prj_file = $envrmnt_impact_prj_file_data['upload_data']['file_name'];
        }

		unset($config);
		
		//num_yr_for_whch_data_avail_file
		$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('num_yr_for_whch_data_avail_file'))
        { $error = array('error' => $this->upload->display_errors()); $num_yr_for_whch_data_avail_file ='';}
        else
        {
                $num_yr_for_whch_data_avail_file_data = array('upload_data' => $this->upload->data());
				$num_yr_for_whch_data_avail_file = $num_yr_for_whch_data_avail_file_data['upload_data']['file_name'];
        }

		unset($config);
		
		/*'loa_with_file'
		'fuel_supp_agrmnt_file'
		'alloction_file'
		'envrmnt_impact_prj_file'
		'num_yr_for_whch_data_avail_file'
		*/
		
		$data = array(
		'user_id'=>$this->session->userdata('user')['id'],
		'app_id'=>$this->session->userdata('app_id'),
		'form_id' => $this->session->userdata('form_id'),
		'loa_with_file'=>$loa_with_file,
		'fuel_supp_agrmnt_file'=>$fuel_supp_agrmnt_file,
		'alloction_file'=>$alloction_file,
		'envrmnt_impact_prj_file'=>$envrmnt_impact_prj_file,
		'num_yr_for_whch_data_avail_file'=>$num_yr_for_whch_data_avail_file,
		'curnt_user_of_land'=>$this->input->post('curnt_user_of_land'), 
		'land_req_per_dpr'=>$this->input->post('land_req_per_dpr'), 
		'land_req_main_plant'=>$this->input->post('land_req_main_plant'), 
		'land_aqr_till_date'=>$this->input->post('land_aqr_till_date'), 
		'domestc_coal_gas'=>$this->input->post('domestc_coal_gas'), 
		'domestc_coal_gas_capacity'=>$this->input->post('domestc_coal_gas_capacity'), 
		'imprtd_coal'=>$this->input->post('imprtd_coal'), 
		'imprtd_coal_capacity'=>$this->input->post('imprtd_coal_capacity'), 
		'plan_mett_fuel_req_plant'=>$this->input->post('plan_mett_fuel_req_plant'), 
		'loa_with'=>$this->input->post('loa_with'), 
		'loa_date'=>$this->input->post('loa_date'), 
		'qntm_fuel_supply'=>$this->input->post('qntm_fuel_supply'), 
		'validty_load'=>$this->input->post('validty_load'), 
		'obligation'=>$this->input->post('obligation'), 
		'fuel_supp_agrmnt'=>$this->input->post('fuel_supp_agrmnt'), 
		'anul_contrct_qty'=>$this->input->post('anul_contrct_qty'), 
		'end_use_app'=>$this->input->post('end_use_app'), 
		'compsn_shrt_sply'=>$this->input->post('compsn_shrt_sply'), 
		'base_price'=>$this->input->post('base_price'), 
		'escalation'=>$this->input->post('escalation'), 
		'qntm_watr_req_per_day'=>$this->input->post('qntm_watr_req_per_day'), 
		'qntm_watr_req_per_anm'=>$this->input->post('qntm_watr_req_per_anm'), 
		'name_source'=>$this->input->post('name_source'), 
		'distance'=>$this->input->post('distance'), 
		'alloction'=>$this->input->post('alloction'), 
		'trnsport'=>$this->input->post('trnsport'), 
		'tech_coolng_systm'=>$this->input->post('tech_coolng_systm'), 
		'num_vilg_affect'=>$this->input->post('num_vilg_affect'), 
		'num_fmly_rehbltn'=>$this->input->post('num_fmly_rehbltn'), 
		'extnt_deforst_prj'=>$this->input->post('extnt_deforst_prj'), 
		'steps_flora_fauna'=>$this->input->post('steps_flora_fauna'), 
		'steps_forests_wildlife'=>$this->input->post('steps_forests_wildlife'), 
		'archlogical_monumnts'=>$this->input->post('archlogical_monumnts'), 
		'dgrad_catchmnt_area'=>$this->input->post('dgrad_catchmnt_area'), 
		'rock_mass_rating'=>$this->input->post('rock_mass_rating'), 
		'accs_to_site'=>$this->input->post('accs_to_site'), 
		'issue_pretng_hvy_eqpmnt'=>$this->input->post('issue_pretng_hvy_eqpmnt'), 
		'potential_land_prblm'=>$this->input->post('potential_land_prblm'), 
		'num_yr_for_whch_data_avail'=>$this->input->post('num_yr_for_whch_data_avail'), 
		'seismic_zone'=>$this->input->post('seismic_zone') 
		);
		
		$this->WM->insert_rn_3($data);
		
		$data = array(
					'url' => "form1/index/rn/renew4",
				);
		
				$this->db->where('form_id', $this->session->userdata('form_id'));
				$this->db->where('user_id', $this->session->userdata('user')['id']);
				$this->db->update('tbl_renew_1', $data);
		
		}
		
		redirect(base_url()."form1/index/rn/renew4");
	}

	public function process_rn_4(){
		
		
		$data['rn_1'] = $this->WM->renewal_form_v();
		
		if($data['rn_1']){
			$this->session->set_userdata('app_id', $data['rn_1']['app_id']);
		}
		//check data exists
		
		$user_id = $this->session->userdata('user')['id'];
		 
		$chk_data = $this->WM->check_rn4_exist($user_id);
		 
		if($chk_data){
			
		$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
		$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('wrp_attachment'))
        { $error = array('error' => $this->upload->display_errors()); $wrp_attachment ='';}
        else
        {
                $wrp_attachment_data = array('upload_data' => $this->upload->data());
				$wrp_attachment = $wrp_attachment_data['upload_data']['file_name'];
				
				$wrp = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'wrp_attachment' => $wrp_attachment
					);
					
				$this->WM->update_rn_4_file($wrp, 'wrp_attachment');
				
        }
		
		$data = array(
		'user_id'=>$this->session->userdata('user')['id'],
		'app_id'=>$this->session->userdata('app_id'),
		'form_id' => $this->session->userdata('form_id'),
		'chkAvailability'=>$this->input->post('chkAvailability'), 
		'chkAvailability_yes'=>$this->input->post('chkAvailability_yes'), 
		'lat'=>$this->input->post('lat'), 
		'long'=>$this->input->post('long'), 
		'max_m'=>$this->input->post('max_m'), 
		'min_m'=>$this->input->post('min_m'), 
		'avg_m'=>$this->input->post('avg_m'), 
		'max_ips'=>$this->input->post('max_ips'), 
		'min_ips'=>$this->input->post('min_ips'), 
		'avg_ips'=>$this->input->post('avg_ips'), 
		'est_pwr_gen_capacity_avail'=>$this->input->post('est_pwr_gen_capacity_avail'), 
		'chkBiomass'=>$this->input->post('chkBiomass'), 
		'biomass_type'=>serialize($this->input->post('biomass_type')), 
		'qty_tons_yr'=>serialize($this->input->post('qty_tons_yr')), 
		'total_qty'=>$this->input->post('total_qty'), 
		'land_for_enrgy_plant_ha'=>$this->input->post('land_for_enrgy_plant_ha'), 
		'est_pwr_gen_cap_mu'=>$this->input->post('est_pwr_gen_cap_mu'), 
		
		
		'isolation_lvl_per_day'=>$this->input->post('isolation_lvl_per_day'), 
		'ghi'=>$this->input->post('ghi'), 
		'dni'=>$this->input->post('dni'), 
		'num_sunny_days_per_yr'=>$this->input->post('num_sunny_days_per_yr'), 
		'est_pwqr_gen_cap_mu1'=>$this->input->post('est_pwqr_gen_cap_mu1'), 
		'avg_wind_speed'=>$this->input->post('avg_wind_speed'), 
		'num_days_wind_pwr_per_yr1'=>$this->input->post('num_days_wind_pwr_per_yr1'), 
		'wind'=>$this->input->post('wind'), 
		'area_land_ha1'=>$this->input->post('area_land_ha1'), 
		'est_pwr_gen_cap_mu2'=>$this->input->post('est_pwr_gen_cap_mu2'),
		'description' => $this->input->post('description'),
		'wra_prepared' => $this->input->post('wra_prepared')
		);
		
		$this->WM->update_rn_4($data);
			
		}else{
			
		$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('wrp_attachment'))
        { $error = array('error' => $this->upload->display_errors()); $wrp_attachment ='';}
        else
        {
                $wrp_attachment_data = array('upload_data' => $this->upload->data());
				$wrp_attachment = $wrp_attachment_data['upload_data']['file_name'];
        }
		
		$data = array(
		'user_id'=>$this->session->userdata('user')['id'],
		'app_id'=>$this->session->userdata('app_id'),
		'form_id' => $this->session->userdata('form_id'),
		'chkAvailability'=>@$this->input->post('chkAvailability'), 
		'chkAvailability_yes'=>$this->input->post('chkAvailability_yes'), 
		'lat'=>$this->input->post('lat'), 
		'long'=>$this->input->post('long'), 
		'max_m'=>$this->input->post('max_m'), 
		'min_m'=>$this->input->post('min_m'), 
		'avg_m'=>$this->input->post('avg_m'), 
		'max_ips'=>$this->input->post('max_ips'), 
		'min_ips'=>$this->input->post('min_ips'), 
		'avg_ips'=>$this->input->post('avg_ips'), 
		'est_pwr_gen_capacity_avail'=>$this->input->post('est_pwr_gen_capacity_avail'), 
		
		'land_for_enrgy_plant_ha'=>$this->input->post('land_for_enrgy_plant_ha'), 
		'est_pwr_gen_cap_mu'=>$this->input->post('est_pwr_gen_cap_mu'), 
		
		
		'isolation_lvl_per_day'=>$this->input->post('isolation_lvl_per_day'), 
		'ghi'=>$this->input->post('ghi'), 
		'dni'=>$this->input->post('dni'), 
		'num_sunny_days_per_yr'=>$this->input->post('num_sunny_days_per_yr'), 
		'est_pwqr_gen_cap_mu1'=>$this->input->post('est_pwqr_gen_cap_mu1'), 
		'avg_wind_speed'=>$this->input->post('avg_wind_speed'), 
		'num_days_wind_pwr_per_yr1'=>$this->input->post('num_days_wind_pwr_per_yr1'), 
		'wind'=>@$this->input->post('wind'), 
		'area_land_ha1'=>$this->input->post('area_land_ha1'), 
		'est_pwr_gen_cap_mu2'=>$this->input->post('est_pwr_gen_cap_mu2'),
		'wra_prepared' => $this->input->post('wra_prepared'),
		'description' => $this->input->post('description'),
		'wrp_attachment' => $wrp_attachment
		);
		
		$this->WM->insert_rn_4($data);
			
			$data = array(
					'url' => "form1/index/rn/renew5",
				);
				$this->db->where('user_id', $user_id);
				$this->db->where('form_id', $this->session->userdata('form_id'));
				$this->db->update('tbl_renew_1', $data);
		}
		
		redirect(base_url()."form1/index/rn/renew5");
		
	}



		public function process_rn_5(){
			
		$data['rn_1'] = $this->WM->renewal_form_v();
		
		if($data['rn_1']){
			$this->session->set_userdata('app_id', $data['rn_1']['app_id']);
		}	
		//check data exists
		
		$user_id = $this->session->userdata('user')['id'];
		 
		$chk_data = $this->WM->check_rn5_exist($user_id);
		
		
		if($chk_data){
			
		//time_schdl_file
		
		$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('time_schdl_file'))
        { $error = array('error' => $this->upload->display_errors()); $time_schdl_file ='';}
        else
        {
                $time_schdl_file_data = array('upload_data' => $this->upload->data());
				$time_schdl_file = $time_schdl_file_data['upload_data']['file_name'];
				
				$time_schdl = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'time_schdl_file' => $time_schdl_file
					);
					
				
				$this->WM->update_rn_5_file($time_schdl, 'time_schdl_file');
        }
		
		$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('om_cntrct_file'))
        { $error = array('error' => $this->upload->display_errors()); $om_cntrct_file ='';}
        else
        {
                $om_cntrct_file_data = array('upload_data' => $this->upload->data());
				$om_cntrct_file = $om_cntrct_file_data['upload_data']['file_name'];
				
				$time_schdl = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'om_cntrct_file' => $om_cntrct_file
					);
					
				
				$this->WM->update_rn_5_file($time_schdl, 'om_cntrct_file');
        }
		
		
		$data = array(
		'user_id'=>$this->session->userdata('user')['id'],
		'app_id'=>$this->session->userdata('app_id'),
		'form_id' => $this->session->userdata('form_id'),
		'cntrct_prj_dvlpmnt'=>$this->input->post('cntrct_prj_dvlpmnt'),
		'epc_awarded' =>$this->input->post('epc_awarded'),
		'crnt_status_epc_cntcts'=>$this->input->post('crnt_status_epc_cntcts'), 
		'exp_past_track_record_cntrct'=>$this->input->post('exp_past_track_record_cntrct'), 
		'num_plants_same_tech'=>$this->input->post('num_plants_same_tech'), 
		'list_all_inst_implmnt_india'=>$this->input->post('list_all_inst_implmnt_india'), 
		'list_all_inst_implmnt_abroad'=>$this->input->post('list_all_inst_implmnt_abroad'), 
		'past_prj_imlmnt_on_time'=>$this->input->post('past_prj_imlmnt_on_time'), 
		'num_yr_busns_of_epc'=>$this->input->post('num_yr_busns_of_epc'), 
		'num_bsns_yr'=>$this->input->post('num_bsns_yr'), 
		'epc_group_comp'=>$this->input->post('epc_group_comp'), 
		'non_epc_route_epcm'=>$this->input->post('non_epc_route_epcm'), 
		'team_member'=>serialize($this->input->post('team_member')), 
		'oenr_eng_details'=>$this->input->post('oenr_eng_details'), 
		'cost_overrun'=>$this->input->post('cost_overrun'), 
		'time_schdl'=>$this->input->post('time_schdl'), 
		'om_cntrct'=>$this->input->post('om_cntrct'), 
		'company_name_om_contract' => $this->input->post("company_name_om_contract"),
		'common_facilities' => $this->input->post("common_facilities"),
		'Doc1'=>$this->input->post('Doc1'), 
		'Doc2'=>$this->input->post('Doc2'), 
		'Doc3'=>$this->input->post('Doc3'), 
		'Doc4'=>$this->input->post('Doc4'), 
		'Doc5'=>$this->input->post('Doc5'), 
		'Doc6'=>$this->input->post('Doc6'), 
		'Doc7'=>$this->input->post('Doc7'), 
		'Doc8'=>$this->input->post('Doc8'), 
		'Doc9'=>$this->input->post('Doc9'), 
		'Doc10'=>$this->input->post('Doc10'), 
		'Doc11'=>$this->input->post('Doc11'), 
		'Doc12'=>$this->input->post('Doc12'), 
		'Doc13'=>$this->input->post('Doc13'), 
		'Doc14'=>$this->input->post('Doc14'), 
		'Doc15'=>$this->input->post('Doc15'), 
		'Doc16'=>$this->input->post('Doc16'), 
		'Doc17'=>$this->input->post('Doc17'), 
		'Doc18'=>$this->input->post('Doc18'), 
		'Doc19'=>$this->input->post('Doc19'), 
		'Doc20'=>$this->input->post('Doc20'), 
		);
		
		$this->db->where('user_id',$user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->update('tbl_renew_5',$data);
			
		}else{
			
		$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('time_schdl_file'))
        { $error = array('error' => $this->upload->display_errors()); $time_schdl_file ='';}
        else
        {
                $time_schdl_file_data = array('upload_data' => $this->upload->data());
				$time_schdl_file = $time_schdl_file_data['upload_data']['file_name'];
        }
		
		
		$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('om_cntrct_file'))
        { $error = array('error' => $this->upload->display_errors()); $om_cntrct_file ='';}
        else
        {
                $om_cntrct_file_data = array('upload_data' => $this->upload->data());
				$om_cntrct_file = $om_cntrct_file_data['upload_data']['file_name'];
        }
		
		$data = array(
		'user_id'=>$this->session->userdata('user')['id'],
		'app_id'=>$this->session->userdata('app_id'),
		'form_id' => $this->session->userdata('form_id'),
		'cntrct_prj_dvlpmnt'=>$this->input->post('cntrct_prj_dvlpmnt'), 
		'epc_awarded' =>$this->input->post('epc_awarded'),
		'crnt_status_epc_cntcts'=>$this->input->post('crnt_status_epc_cntcts'), 
		'exp_past_track_record_cntrct'=>$this->input->post('exp_past_track_record_cntrct'), 
		'num_plants_same_tech'=>$this->input->post('num_plants_same_tech'), 
		'list_all_inst_implmnt_india'=>$this->input->post('list_all_inst_implmnt_india'), 
		'list_all_inst_implmnt_abroad'=>$this->input->post('list_all_inst_implmnt_abroad'), 
		'past_prj_imlmnt_on_time'=>$this->input->post('past_prj_imlmnt_on_time'), 
		'num_yr_busns_of_epc'=>$this->input->post('num_yr_busns_of_epc'), 
		'num_bsns_yr'=>$this->input->post('num_bsns_yr'), 
		'epc_group_comp'=>$this->input->post('epc_group_comp'), 
		'non_epc_route_epcm'=>$this->input->post('non_epc_route_epcm'), 
		'team_member'=>serialize($this->input->post('team_member')), 
		'oenr_eng_details'=>$this->input->post('oenr_eng_details'), 
		'cost_overrun'=>$this->input->post('cost_overrun'), 
		'time_schdl'=>$this->input->post('time_schdl'), 
		'time_schdl_file' => $time_schdl_file,
		'om_cntrct'=>$this->input->post('om_cntrct'), 
		'company_name_om_contract' => $this->input->post("company_name_om_contract"),
		'om_cntrct_file' => $om_cntrct_file,
		'common_facilities' => $this->input->post("common_facilities"),
		'Doc1'=>$this->input->post('Doc1'), 
		'Doc2'=>$this->input->post('Doc2'), 
		'Doc3'=>$this->input->post('Doc3'), 
		'Doc4'=>$this->input->post('Doc4'), 
		'Doc5'=>$this->input->post('Doc5'), 
		'Doc6'=>$this->input->post('Doc6'), 
		'Doc7'=>$this->input->post('Doc7'), 
		'Doc8'=>$this->input->post('Doc8'), 
		'Doc9'=>$this->input->post('Doc9'), 
		'Doc10'=>$this->input->post('Doc10'), 
		'Doc11'=>$this->input->post('Doc11'), 
		'Doc12'=>$this->input->post('Doc12'), 
		'Doc13'=>$this->input->post('Doc13'), 
		'Doc14'=>$this->input->post('Doc14'), 
		'Doc15'=>$this->input->post('Doc15'), 
		'Doc16'=>$this->input->post('Doc16'), 
		'Doc17'=>$this->input->post('Doc17'), 
		'Doc18'=>$this->input->post('Doc18'), 
		'Doc19'=>$this->input->post('Doc19'), 
		'Doc20'=>$this->input->post('Doc20'),
		);
		
		$this->db->insert('tbl_renew_5', $data);
		
		$data = array(
					'url' => "form1/index/rn/renew6",
				);
				$this->db->where('user_id', $user_id);
				$this->db->where('form_id', $this->session->userdata('form_id'));
				$this->db->update('tbl_renew_1', $data);
		
		}

		
		redirect(base_url()."form1/index/rn/renew6");
		
	}

	public function process_rn_6(){
		$data['rn_1'] = $this->WM->renewal_form_v();
		//print_r($data['rn_1']);
		if($data['rn_1']['app_id']){
			$this->session->set_userdata('app_id', $data['rn_1']['app_id']);
		}
		
		 
		if($this->input->method(true)=="POST"){
			$status = array(
				'place' =>$this->input->post("place"),
				'date' => $this->input->post('date'),
				"status"=>$this->input->post('agree')
			);
			
			$this->db->where('user_id', $this->session->userdata('user')['id']);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			$this->db->update('tbl_renew_1', $status);
			
			$this->db->select("url");
			$this->db->from("tbl_renew_1");
			$this->db->where('user_id', $this->session->userdata('user')['id']);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			$url = $this->db->get()->row_array();
			
			if($url['url']){
			$data = array(
					'url' => "form1/index/rn/renew6",
				);
				$this->db->where('user_id', $this->session->userdata('user')['id']);
				$this->db->where('form_id', $this->session->userdata('form_id'));
				$this->db->update('tbl_renew_1', $data);
			}
			
		}
		
		redirect(base_url()."form2");
		
	}
	
	// deliting generation files section a
	public function delete_gn3_files(){
		if($this->uri->segment('3')){
			$file = $this->uri->segment('3');
			// delete file if file exists
			$result = $this->db->select('authorized_signatory_for_project_file')->from('tbl_generation_c')->get()->row_array();
			if($result){
				if(unlink("./uploads/forms/".$result['authorized_signatory_for_project_file'])){
					$this->db->update('tbl_generation_c', array('authorized_signatory_for_project_file'=>''));
				}
			}
		}
		//redirect to the previous url
		redirect($_SERVER['HTTP_REFERER']);
	} 
	
	// deliting generation files section a
	public function delete_gn3_files1(){
		if($this->uri->segment('3')){
			$file = $this->uri->segment('3');
			// delete file if file exists
			$result = $this->db->select('authorized_person_on_behalf_of_borrower_file')->from('tbl_generation_c')->get()->row_array();
			if($result){
				if(unlink("./uploads/forms/".$result['authorized_person_on_behalf_of_borrower_file'])){
					$this->db->update('tbl_generation_c', array('authorized_person_on_behalf_of_borrower_file'=>''));
				}
			}
		}
		//redirect to the previous url
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	// deliting generation files section 2
	public function delete_gn2_means_of_finance_file(){
		if($this->uri->segment('3')){
			$file = $this->uri->segment('3');
			// delete file if file exists
			$result = $this->db->select('means_of_finance_field_data')->from('tbl_generation_2')->get()->row_array();
			if($result){
				if(unlink("./uploads/forms/".$result['means_of_finance_field_data'])){
					$this->db->update('tbl_generation_2', array('means_of_finance_field_data'=>''));
				}
			}
		}
		//redirect to the previous url
		redirect($_SERVER['HTTP_REFERER']);
	} 
	
	function deletesanction($id){
		$file=$this->WM->getSanImage($id);
		if($file['name_of_bank_status_attach']){
			unlink('./uploads/forms/'.$file['name_of_bank_status_attach']);	
		}
		if($this->WM->deleteSanID($id)){
			echo "Successfully";
		}	
	}
	
	function ss_deletesanction($id){
		$file=$this->WM->ss_getSanImage($id);
		if($file['name_of_bank_status_attach']){
			unlink('./uploads/forms/'.$file['name_of_bank_status_attach']);	
		}
		if($this->WM->ss_deleteSanID($id)){
			echo "Successfully";
		}	
	}
	function deletesanction_gn($id){
	
		if($this->WM->deleteSanID_gn($id)){
			echo "Successfully";
		}	
	}
	
	function deletesanction_gn2($id){
	
		if($this->WM->deleteSanID_gn2($id)){
			echo "Successfully";
		}	
	}
	
	public function process_ss_generation_a()
	{
		$data['ss_gn_a'] = $this->WM->get_ss_generation_a();
		
		if($data['ss_gn_a']){
			$this->session->set_userdata("app_id", $data['ss_gn_a']['app_id']);	
		}
		
		$app_id = $this->session->userdata('app_id');
		$user_id = $this->session->userdata('user')['id'];
		
		//check if user already filled up the form A

		$check_ss_gn_a = $this->WM->check_ss_gn_a_exist($user_id);
		
		
		//if already exists then do update records
		if($check_ss_gn_a){
			
			
			if($this->input->post('ss_gn_a')['project_type']==1){
				$project_type = $this->input->post('ss_gn_a')['project_type'];
			}else{
				$project_type = $this->input->post('ss_gn_a')['project_type'];
			}

			if($this->input->post('ss_gn_a')['project_power_sale_arrangement']==1){
				$project_power_sale_arrangement = $this->input->post('ss_gn_a')['project_power_sale_arrangement_other'];
			}else{
				$project_power_sale_arrangement = $this->input->post('ss_gn_a')['project_power_sale_arrangement'];
			}
			
			if($this->input->post('ss_gn_a')['project_type'] == "Thermal" || $this->input->post('ss_gn_a')['project_type'] == "Hydro" || $this->input->post('ss_gn_a')['project_type'] == "Nuclear"){
				
				$project_type_others = ""; 
				
			}else{
				$project_type_others = $this->input->post('ss_gn_a')['project_type_others'];
			}

			$ss_gn_a = array(
				'user_id' => $user_id,
				'form_id' => $this->session->userdata('form_id'),
				'project_name' =>$this->input->post('ss_gn_a')['project_name'],
				'project_type' =>$project_type,
				'project_type_others' =>$project_type_others,
				'project_capacity' =>$this->input->post('ss_gn_a')['project_capacity'],
				'project_location' =>$this->input->post('ss_gn_a')['project_location'],
				'project_power_sale_arrangement' =>$this->input->post('ss_gn_a')['project_power_sale_arrangement'],
				'project_cost_without_idc' =>$this->input->post('ss_gn_a')['project_cost_without_idc'],
				'project_idc_interest_durin_construction' =>$this->input->post('ss_gn_a')['project_idc_interest_durin_construction'],
				'project_cost_with_idc' =>$this->input->post('ss_gn_a')['project_cost_with_idc'],
				'project_cost_per_mw' =>$this->input->post('ss_gn_a')['project_cost_per_mw'],
				'project_cost_debt' =>$this->input->post('ss_gn_a')['project_cost_debt'],
				'project_cost_equity' =>$this->input->post('ss_gn_a')['project_cost_equity'],
				'project_amount_equity' =>$this->input->post('ss_gn_a')['project_amount_equity'],
				'project_debt_amount' =>$this->input->post('ss_gn_a')['project_debt_amount'],
				'project_loan_requested' =>$this->input->post('ss_gn_a')['project_loan_requested'],
				'project_lead_fi' =>$this->input->post('ss_gn_a')['project_lead_fi'],
				'finance_type' => $this->input->post('ss_gn_a')['finance_type'],
				'project_construction_period' =>$this->input->post('ss_gn_a')['project_construction_period'],
				'project_loan_repayment_period' =>$this->input->post('ss_gn_a')['project_loan_repayment_period'],
				'moritorium_period' => $this->input->post('ss_gn_a')['moritorium_period'],
				'project_scheduled_completion_date' =>$this->input->post('ss_gn_a')['project_scheduled_completion_date'],
				'project_irr' =>$this->input->post('ss_gn_a')['project_irr'],
				'project_dscr' =>$this->input->post('ss_gn_a')['project_dscr'],
				'project_levellised_tariff' =>$this->input->post('ss_gn_a')['project_levellised_tariff'],
				'project_levellised_cost_of_generation_excluding_roe' =>$this->input->post('ss_gn_a')['project_levellised_cost_of_generation_excluding_roe'],
				'name' => serialize($this->input->post("name")),
				'loan_out_total_loan' => serialize($this->input->post("loan_out_total_loan")),
			); 
			
			//Insert query execute
			$this->WM->update_ss_gn_a($ss_gn_a);
			
			
		}else{
			
			if(!empty($this->input->post('form_id'))) {
				
				$this->session->set_userdata('form_id', $this->input->post('form_id'));
				$form_id = $this->session->userdata('form_id');
				
			}else{
			
			$this->session->unset_userdata('form_id');
		$this->db->select("form_id");
		$this->db->from("tbl_generation_a");
		$this->db->order_by("form_id","desc");
		//$this->db->where("user_id", $user_id);
		$result1 = $this->db->get()->row_array();
		
		if(empty($result1)){
			$result1 = 0;
		}else{
			$result1 = $result1['form_id'];
		}
		
		$this->db->select("form_id");
		$this->db->from("tbl_renew_1");
		$this->db->order_by("form_id","desc");
		$result2 = $this->db->get()->row_array();
		
		if(empty($result2)){
			$result2 = 0;
		}else{
			$result2 = $result2['form_id'];
		}
		
		$this->db->select("form_id");
		$this->db->from("tbl_state_sector");
		$this->db->order_by("form_id","desc");
		$result3 = $this->db->get()->row_array();
		
		if(empty($result3)){
			$result3 = 0;
		}else{
			$result3 = $result3['form_id'];
		}
		
		
		$this->db->select("form_id");
		$this->db->from("tbl_ss_generation_a");
		$this->db->order_by("form_id","desc");
		$result4 = $this->db->get()->row_array();
		if(empty($result4)){
			$result4 = 0;
		}else{
			$result4 = $result4['form_id'];
		}
		
		$getID=array($result1,$result2,$result3,$result4);
		$formID = max($getID) + 1;
		$this->session->set_userdata("form_id", $formID);
			
			
		}	
			
			
			
			//set variables for insert data in tbl_generation_a
			
			if($this->input->post('ss_gn_a')['project_type']==1){
				$project_type = $this->input->post('ss_gn_a')['project_type_others'];
			}else{
				$project_type = $this->input->post('ss_gn_a')['project_type'];
			}

			if($this->input->post('ss_gn_a')['project_power_sale_arrangement']==1){
				$project_power_sale_arrangement = $this->input->post('ss_gn_a')['project_power_sale_arrangement_other'];
			}else{
				$project_power_sale_arrangement = $this->input->post('ss_gn_a')['project_power_sale_arrangement'];
			}
			if($this->input->post('ss_gn_a')['project_type'] == "Thermal" || $this->input->post('ss_gn_a')['project_type'] == "Hydro" || $this->input->post('ss_gn_a')['project_type'] == "Nuclear"){
				
				$project_type_others = ""; 
				
			}else{
				$project_type_others = $this->input->post('ss_gn_a')['project_type_others'];
			}
			
			$ss_gn_a = array(
				'user_id' => $user_id,
				'form_id' => $this->session->userdata('form_id'),
				'project_name' =>$this->input->post('ss_gn_a')['project_name'],
				'project_type' =>$project_type,
				'project_type_others' => $project_type_others,
				'project_capacity' =>$this->input->post('ss_gn_a')['project_capacity'],
				'project_location' =>$this->input->post('ss_gn_a')['project_location'],
				'project_power_sale_arrangement' =>$this->input->post('ss_gn_a')['project_power_sale_arrangement'],
				'project_cost_without_idc' =>$this->input->post('ss_gn_a')['project_cost_without_idc'],
				'project_idc_interest_durin_construction' =>$this->input->post('ss_gn_a')['project_idc_interest_durin_construction'],
				'project_cost_with_idc' =>$this->input->post('ss_gn_a')['project_cost_with_idc'],
				'project_cost_per_mw' =>$this->input->post('ss_gn_a')['project_cost_per_mw'],
				'project_cost_debt' =>$this->input->post('ss_gn_a')['project_cost_debt'],
				'project_cost_equity' =>$this->input->post('ss_gn_a')['project_cost_equity'],
				'project_amount_equity' =>$this->input->post('ss_gn_a')['project_amount_equity'],
				'project_debt_amount' =>$this->input->post('ss_gn_a')['project_debt_amount'],
				'project_loan_requested' =>$this->input->post('ss_gn_a')['project_loan_requested'],
				'project_lead_fi' =>$this->input->post('ss_gn_a')['project_lead_fi'],
				'finance_type' => $this->input->post('ss_gn_a')['finance_type'],
				'project_construction_period' =>$this->input->post('ss_gn_a')['project_construction_period'],
				'project_loan_repayment_period' =>$this->input->post('ss_gn_a')['project_loan_repayment_period'],
				'moritorium_period' => $this->input->post('ss_gn_a')['moritorium_period'],
				'project_scheduled_completion_date' =>$this->input->post('ss_gn_a')['project_scheduled_completion_date'],
				'project_irr' =>$this->input->post('ss_gn_a')['project_irr'],
				'project_dscr' =>$this->input->post('ss_gn_a')['project_dscr'],
				'project_levellised_tariff' =>$this->input->post('ss_gn_a')['project_levellised_tariff'],
				'project_levellised_cost_of_generation_excluding_roe' =>$this->input->post('ss_gn_a')['project_levellised_cost_of_generation_excluding_roe'],
				'name' => serialize($this->input->post("name")),
				'loan_out_total_loan' => serialize($this->input->post("loan_out_total_loan")),
				'date_created' =>date('Y-m-d H::s'),
				'status' => '1'
			); 
			
			//Insert query execute
			$data = $this->WM->insert_ss_gn_a($ss_gn_a);
		}

		// GEN B
		
		$check_ss_gn_b = $this->WM->check_ss_gn_b_exist($user_id);
		
		//if already exists then do update records
		if($check_ss_gn_b){
			
			//financial_performance_power_utility_file
			
				$config8['upload_path']          = './uploads/forms/';
                $config8['allowed_types']        = '*';
                $config8['max_width'] = 0;
				$config8['max_height'] = 0;
				$config8['max_size'] = 0;
				$config8['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config8);
				
				if ( ! $this->upload->do_upload('financial_performance_power_utility_file'))
                { $error = array('error' => $this->upload->display_errors()); }
                else
                {
                        $financial_performance_power_utility = array('upload_data' => $this->upload->data());
						
						$ss_gn_b = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'financial_performance_power_utility_file' => $financial_performance_power_utility['upload_data']['file_name']
						);
						
						$this->WM->update_ss_gn_b_file($ss_gn_b, 'financial_performance_power_utility_file');
                }
			
			
			if(is_array($this->session->userdata('app_id'))){
				$app_id = $this->session->userdata('app_id')['app_id'];
			}else{
				$app_id = $this->session->userdata('app_id');
			}
			
			$ss_gn_b = array(
				'user_id' => $user_id,
				'app_id'=>$app_id,
				'form_id' => $this->session->userdata('form_id'),
				'borrower_name' =>$this->input->post('ss_gn_b')['borrower_name'],
				'directors' =>serialize($this->input->post('ss_gn_b')['directors']),
				'group_company_promoter' =>$this->input->post('ss_gn_b')['group_company_promoter']
			); 
			
			//Insert query execute
			$this->WM->update_ss_gn_b($ss_gn_b);
			
			
		}else{
			
			

				// uploading financial_performance_power_utility_file
				
				$config9['upload_path']          = './uploads/forms/';
                $config9['allowed_types']        = '*';
                $config9['max_width'] = 0;
				$config9['max_height'] = 0;
				$config9['max_size'] = 0;
				$config9['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config9);
				
				
				if ( ! $this->upload->do_upload('financial_performance_power_utility_file'))
                { $error = array('error' => $this->upload->display_errors()); $financial_performance_power_utility_file ='';}
                else
                {
                        $financial_performance_power_utility = array('upload_data' => $this->upload->data());
						$financial_performance_power_utility_file = $financial_performance_power_utility['upload_data']['file_name'];
                }
			 if(is_array($this->session->userdata('app_id'))){
				$app_id = $this->session->userdata('app_id')['app_id'];
			}else{
				$app_id = $this->session->userdata('app_id');
			}
			
			$ss_gn_b = array(
				'user_id' => $user_id,
				'app_id'=>$app_id,
				'form_id' => $this->session->userdata('form_id'),
				'borrower_name' =>$this->input->post('ss_gn_b')['borrower_name'],
				'directors' =>serialize($this->input->post('ss_gn_b')['directors']),
				'group_company_promoter' =>$this->input->post('ss_gn_b')['group_company_promoter'],
				'financial_performance_power_utility_file' => $financial_performance_power_utility_file
			);
			
			//Insert query execute
			$this->WM->insert_ss_gn_b($ss_gn_b);
		}
		
		// GEN B1
		//set variables for insert data in tbl_generation_b1
		if(sizeof($this->input->post('ss_gn_b1')['borrower_promoters_name'])>0){
		for($i=0; $i<sizeof($this->input->post('ss_gn_b1')['borrower_promoters_name']); $i++){
				
			$ss_gn_b1[] = array(
				'user_id' => $user_id,
				'form_id' => $this->session->userdata('form_id'),
				'app_id'=>$app_id,
				'borrower_promoters_name' =>$this->input->post('ss_gn_b1')['borrower_promoters_name'][$i],
				'shareholding_promoter' =>$this->input->post('ss_gn_b1')['shareholding_promoter'][$i],
				'phn_no' =>$this->input->post('ss_gn_b1')['phn_no'][$i],
				'email' =>$this->input->post('ss_gn_b1')['email'][$i],
				'address' =>$this->input->post('ss_gn_b1')['address'][$i]
			);
			
		}
		//Insert query execute
			$this->WM->insert_ss_gn_b1($ss_gn_b1);
		}
		
		// GEN C
		 
	 
		
		$check_ss_gn_c = $this->WM->check_ss_gn_c_exist($user_id);
		
		//if already exists then do update records
		if($check_ss_gn_c){
			
			
			// uploading authorized_signatory_for_project_file
				
				$config8['upload_path']          = './uploads/forms/';
                $config8['allowed_types']        = '*';
                $config8['max_width'] = 0;
				$config8['max_height'] = 0;
				$config8['max_size'] = 0;
				$config8['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config8);
				
				if ( ! $this->upload->do_upload('authorized_signatory_for_project_file'))
                { $error = array('error' => $this->upload->display_errors()); }
                else
                {
                        $authorized_signatory_for_project = array('upload_data' => $this->upload->data());
						
						$ss_gen_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'authorized_signatory_for_project_file' => $authorized_signatory_for_project['upload_data']['file_name']
						);
						
						$this->WM->update_ss_gn_c_file($ss_gen_c, 'authorized_signatory_for_project_file');
                }

				// uploading authorized_person_on_behalf_of_borrower_file
				
				$config9['upload_path']          = './uploads/forms/';
                $config9['allowed_types']        = '*';
                $config9['max_width'] = 0;
				$config9['max_height'] = 0;
				$config9['max_size'] = 0;
				$config9['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config9);
				
				
				if ( ! $this->upload->do_upload('authorized_person_on_behalf_of_borrower_file'))
                { $error = array('error' => $this->upload->display_errors());}
                else
                {
                        $authorized_person_on_behalf_of_borrower = array('upload_data' => $this->upload->data());
						
						$ss_gen_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'authorized_person_on_behalf_of_borrower_file' => $authorized_person_on_behalf_of_borrower['upload_data']['file_name']
						);
						
						$this->WM->update_ss_gn_c_file($ss_gen_c, 'authorized_person_on_behalf_of_borrower_file');
                }
			
			$ss_gn_c = array(
				'user_id' => $user_id,
				'app_id'=>$app_id,
				'form_id' => $this->session->userdata('form_id'),
				'authorized_signatory_project_name'=>$this->input->post('ss_gn_c')['authorized_signatory_project_name'],
				'authorized_signatory_project_address'=>$this->input->post('ss_gn_c')['authorized_signatory_project_address'],
				'authorized_signatory_project_phone'=>$this->input->post('ss_gn_c')['authorized_signatory_project_phone'],
				'authorized_signatory_project_email'=>$this->input->post('ss_gn_c')['authorized_signatory_project_email'],
				'authorized_signatory_project_pan'=>$this->input->post('ss_gn_c')['authorized_signatory_project_pan'],
				'authorized_signatory_project_aadhar'=>$this->input->post('ss_gn_c')['authorized_signatory_project_aadhar'],
				'authorized_person_borrower_name'=>$this->input->post('ss_gn_c')['authorized_person_borrower_name'],
				'authorized_person_borrower_address'=>$this->input->post('ss_gn_c')['authorized_person_borrower_address'],
				'authorized_person_borrower_phone'=>$this->input->post('ss_gn_c')['authorized_person_borrower_phone'],
				'authorized_person_borrower_email'=>$this->input->post('ss_gn_c')['authorized_person_borrower_email'],
				'authorized_person_borrower_pan'=>$this->input->post('ss_gn_c')['authorized_person_borrower_pan'],
				'authorized_person_borrower_adhaar_number'=>$this->input->post('ss_gn_c')['authorized_person_borrower_adhaar_number']
			); 
			
			//Insert query execute
			$this->WM->update_ss_gn_c($ss_gn_c);
			
			
		}else{
			//set variables for insert data in tbl_generation_c
			
			// uploading authorized_signatory_for_project_file
				
				$config8['upload_path']          = './uploads/forms/';
                $config8['allowed_types']        = '*';
                $config8['max_width'] = 0;
				$config8['max_height'] = 0;
				$config8['max_size'] = 0;
				$config8['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config8);
				
				
				if ( ! $this->upload->do_upload('authorized_signatory_for_project_file'))
                { $error = array('error' => $this->upload->display_errors()); $authorized_signatory_for_project_file='';}
                else
                {
                        $authorized_signatory_for_project = array('upload_data' => $this->upload->data());
						$authorized_signatory_for_project_file = $authorized_signatory_for_project['upload_data']['file_name'];
                }

				// uploading authorized_person_on_behalf_of_borrower_file
				
				$config9['upload_path']          = './uploads/forms/';
                $config9['allowed_types']        = '*';
                $config9['max_width'] = 0;
				$config9['max_height'] = 0;
				$config9['max_size'] = 0;
				$config9['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config9);
				
				
				if ( ! $this->upload->do_upload('authorized_person_on_behalf_of_borrower_file'))
                { $error = array('error' => $this->upload->display_errors()); $authorized_person_on_behalf_of_borrower_file ='';}
                else
                {
                        $authorized_person_on_behalf_of_borrower = array('upload_data' => $this->upload->data());
						$authorized_person_on_behalf_of_borrower_file = $authorized_person_on_behalf_of_borrower['upload_data']['file_name'];
                }
			
			$ss_gn_c = array(
				'user_id' => $user_id,
				'app_id'=>$app_id,
				'form_id' => $this->session->userdata('form_id'),
				'authorized_signatory_project_name'=>$this->input->post('ss_gn_c')['authorized_signatory_project_name'],
				'authorized_signatory_project_address'=>$this->input->post('ss_gn_c')['authorized_signatory_project_address'],
				'authorized_signatory_project_phone'=>$this->input->post('ss_gn_c')['authorized_signatory_project_phone'],
				'authorized_signatory_project_email'=>$this->input->post('ss_gn_c')['authorized_signatory_project_email'],
				'authorized_signatory_project_pan'=>$this->input->post('ss_gn_c')['authorized_signatory_project_pan'],
				'authorized_signatory_project_aadhar'=>$this->input->post('ss_gn_c')['authorized_signatory_project_aadhar'],
				'authorized_person_borrower_name'=>$this->input->post('ss_gn_c')['authorized_person_borrower_name'],
				'authorized_person_borrower_address'=>$this->input->post('ss_gn_c')['authorized_person_borrower_address'],
				'authorized_person_borrower_phone'=>$this->input->post('ss_gn_c')['authorized_person_borrower_phone'],
				'authorized_person_borrower_email'=>$this->input->post('ss_gn_c')['authorized_person_borrower_email'],
				'authorized_person_borrower_pan'=>$this->input->post('ss_gn_c')['authorized_person_borrower_pan'],
				'authorized_person_borrower_adhaar_number'=>$this->input->post('ss_gn_c')['authorized_person_borrower_adhaar_number'],
				'authorized_person_on_behalf_of_borrower_file'=>$authorized_person_on_behalf_of_borrower_file,
				'authorized_signatory_for_project_file'=>$authorized_signatory_for_project_file
			);
			
			//Insert query execute
			$this->WM->insert_ss_gn_c($ss_gn_c);
			
			$data = array(
                    'url' => "form1/index/ss_gn/step-2",
                );
                $this->db->where('user_id', $this->session->userdata('user')['id']);
                $this->db->where('form_id', $this->session->userdata('form_id'));
                $this->db->update('tbl_ss_generation_a', $data);
			
		}

		// reidresct to step 2
		
		$app_id = $this->WM->check_app_id($user_id);
		$this->session->set_userdata("app_id", $app_id);
		redirect(base_url()."form1/index/ss_gn/step-2");
	}
	
	//processing step 2 form state_sector generation 
	
	public function process_ss_generation_2(){
		
		$data['ss_gn_a'] = $this->WM->get_ss_generation_a();
		
		if($data['ss_gn_a']){
			$this->session->set_userdata("app_id", $data['ss_gn_a']['app_id']);	
		}
		if($this->input->method(true)=="POST"){
				
			$user_id = $this->session->userdata('user')['id'];
			$app_id = $this->session->userdata('app_id');	
			
			// check if data already exists
			$ss_gn2 = $this->WM->check_ss_gn2_exist($user_id);

			//if already exists then do update records
			if($ss_gn2){
				
				//licenses_approval_pollution_clearance_attach
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if($_POST['phase1_project_details']['licenses_approval_pollution_clearance']=='No'){
						
					$state_sector_b = array(
						'user_id'=>$this->session->userdata('user')['id'],
						'licenses_approval_pollution_clearance_attach' => ''
					);
					
					$this->WM->update_ss_gn2_file($state_sector_b, 'licenses_approval_pollution_clearance_attach');	
						
				}else{
					if(!empty($_FILES['licenses_approval_pollution_clearance_attach']['name'])){
						if ( ! $this->upload->do_upload('licenses_approval_pollution_clearance_attach'))
		                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_pollution_clearance_attach ='';}
		                else
		                {
		                        $licenses_approval_pollution_clearance_attach_data = array('upload_data' => $this->upload->data());
								$licenses_approval_pollution_clearance_attach = $licenses_approval_pollution_clearance_attach_data;
								
								$state_sector_b = array(
									'user_id'=>$this->session->userdata('user')['id'],
									'licenses_approval_pollution_clearance_attach' => $licenses_approval_pollution_clearance_attach['upload_data']['file_name']
								);
								
								$this->WM->update_ss_gn2_file($state_sector_b, 'licenses_approval_pollution_clearance_attach');
								
								
		                }
					}
				}
				unset($config);
				
				//licenses_approval_water_allocation_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				if($_POST['phase1_project_details']['licenses_approval_water_allocation']=='No'){
						
						$state_sector_b = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'licenses_approval_water_allocation_attach' => ''
						);
						
						$this->WM->update_ss_gn2_file($state_sector_b, 'licenses_approval_water_allocation_attach');	
						
				}else{
					if(!empty($_FILES['licenses_approval_water_allocation_attach']['name'])){
						if ( ! $this->upload->do_upload('licenses_approval_water_allocation_attach'))
		                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_water_allocation_attach ='';}
		                else
		                {
		                        $licenses_approval_water_allocation_attach_data = array('upload_data' => $this->upload->data());
								$licenses_approval_water_allocation_attach = $licenses_approval_water_allocation_attach_data;
								
								$state_sector_b = array(
									'user_id'=>$this->session->userdata('user')['id'],
									'licenses_approval_water_allocation_attach' => $licenses_approval_water_allocation_attach['upload_data']['file_name']
								);
								
								$this->WM->update_ss_gn2_file($state_sector_b, 'licenses_approval_water_allocation_attach');
								
								
		                }
					}
				}
				unset($config);
				
				
				//licenses_approval_environment_clearance_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if($_POST['phase1_project_details']['licenses_approval_environment_clearance']=='No'){
						
						$state_sector_b = array(
									'user_id'=>$this->session->userdata('user')['id'],
									'licenses_approval_environment_clearance_attach' => ''
								);
						
						$this->WM->update_ss_gn2_file($state_sector_b, 'licenses_approval_environment_clearance_attach');	
						
				}else{
					if(!empty($_FILES['licenses_approval_environment_clearance_attach']['name'])){
						if ( ! $this->upload->do_upload('licenses_approval_environment_clearance_attach'))
		                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_environment_clearance_attach ='';}
		                else
		                {
		                        $licenses_approval_environment_clearance_attach_data = array('upload_data' => $this->upload->data());
								$licenses_approval_environment_clearance_attach = $licenses_approval_environment_clearance_attach_data;
								
								$state_sector_b = array(
									'user_id'=>$this->session->userdata('user')['id'],
									'licenses_approval_environment_clearance_attach' => $licenses_approval_environment_clearance_attach['upload_data']['file_name']
								);
								
								$this->WM->update_ss_gn2_file($state_sector_b, 'licenses_approval_environment_clearance_attach');
								
								
		                }
					}
				}
				unset($config);
				//licenses_approval_forest_land_clearance_attach
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				if($_POST['phase1_project_details']['licenses_approval_forest_land_clearance']=='No' || $_POST['phase1_project_details']['licenses_approval_forest_land_clearance']=='NA'){
						
					$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'licenses_approval_forest_land_clearance_attach' => ''
							);
					
					$this->WM->update_ss_gn2_file($state_sector_b, 'licenses_approval_forest_land_clearance_attach');	
						
				}else{
					if(!empty($_FILES['licenses_approval_forest_land_clearance_attach']['name'])){
						if ( ! $this->upload->do_upload('licenses_approval_forest_land_clearance_attach'))
		                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_forest_land_clearance_attach ='';}
		                else
		                {
		                        $licenses_approval_forest_land_clearance_attach_data = array('upload_data' => $this->upload->data());
								$licenses_approval_forest_land_clearance_attach = $licenses_approval_forest_land_clearance_attach_data;
								
								$state_sector_b = array(
									'user_id'=>$this->session->userdata('user')['id'],
									'licenses_approval_forest_land_clearance_attach' => $licenses_approval_forest_land_clearance_attach['upload_data']['file_name']
								);
								
								$this->WM->update_ss_gn2_file($state_sector_b, 'licenses_approval_forest_land_clearance_attach');
								
								
		                }
					}
				}
				unset($config);
				
				//licenses_approval_forest_land_evacuation_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if($_POST['phase1_project_details']['licenses_approval_forest_land_evacuation']=='No' || $_POST['phase1_project_details']['licenses_approval_forest_land_evacuation']=='NA'){
						
					$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'licenses_approval_forest_land_evacuation_attach' => ''
							);
					
					$this->WM->update_ss_gn2_file($state_sector_b, 'licenses_approval_forest_land_evacuation_attach');	
						
				}else{
					if(!empty($_FILES['licenses_approval_forest_land_evacuation_attach']['name'])){
						if ( ! $this->upload->do_upload('licenses_approval_forest_land_evacuation_attach'))
		                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_forest_land_evacuation_attach ='';}
		                else
		                {
		                        $licenses_approval_forest_land_evacuation_attach_data = array('upload_data' => $this->upload->data());
								$licenses_approval_forest_land_evacuation_attach = $licenses_approval_forest_land_evacuation_attach_data;
								
								$state_sector_b = array(
									'user_id'=>$this->session->userdata('user')['id'],
									'licenses_approval_forest_land_evacuation_attach' => $licenses_approval_forest_land_evacuation_attach['upload_data']['file_name']
								);
								
								$this->WM->update_ss_gn2_file($state_sector_b, 'licenses_approval_forest_land_evacuation_attach');
								
								
		                }
					}
				}
				unset($config);
				//licenses_approval_civil_aviation_clearance_attach
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if($_POST['phase1_project_details']['licenses_approval_civil_aviation_clearance']=='No'){
						
					$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'licenses_approval_civil_aviation_clearance_attach' => ''
							);
					
					$this->WM->update_ss_gn2_file($state_sector_b, 'licenses_approval_civil_aviation_clearance_attach');	
						
				}else{
					if(!empty($_FILES['licenses_approval_civil_aviation_clearance_attach']['name'])){
						if ( ! $this->upload->do_upload('licenses_approval_civil_aviation_clearance_attach'))
		                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_civil_aviation_clearance_attach ='';}
		                else
		                {
		                        $licenses_approval_civil_aviation_clearance_attach_data = array('upload_data' => $this->upload->data());
								$licenses_approval_civil_aviation_clearance_attach = $licenses_approval_civil_aviation_clearance_attach_data;
								
								$state_sector_b = array(
									'user_id'=>$this->session->userdata('user')['id'],
									'licenses_approval_civil_aviation_clearance_attach' => $licenses_approval_civil_aviation_clearance_attach['upload_data']['file_name']
								);
								
								$this->WM->update_ss_gn2_file($state_sector_b, 'licenses_approval_civil_aviation_clearance_attach');
								
								
		                }
					}
				}
				unset($config);
				
				//means_of_finance_field
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if(!empty($_FILES['means_of_finance_field']['name'])){
					if ( ! $this->upload->do_upload('means_of_finance_field'))
	                { $error = array('error' => $this->upload->display_errors()); $means_of_finance_field ='';}
	                else
	                {
	                        $means_of_finance_field_data = array('upload_data' => $this->upload->data());
							$means_of_finance_field = $means_of_finance_field_data;
							
							$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'means_of_finance_field_data' => $means_of_finance_field_data['upload_data']['file_name']
							);
							
							$this->WM->update_ss_gn2_file($state_sector_b, 'means_of_finance_field_data');
							
							
	                }
				}
				unset($config);
				
				
				//information_memorandum_financial_mode_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if(!empty($_FILES['information_memorandum_financial_mode_attach']['name'])){
					if ( ! $this->upload->do_upload('information_memorandum_financial_mode_attach'))
	                { $error = array('error' => $this->upload->display_errors()); $information_memorandum_financial_mode_attach ='';
					
					}
	                else
	                {
	                        $information_memorandum_financial_mode_attach_data = array('upload_data' => $this->upload->data());
							$information_memorandum_financial_mode_attach = $information_memorandum_financial_mode_attach_data;
							
							$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'information_memorandum_financial_mode_attach' => $information_memorandum_financial_mode_attach['upload_data']['file_name']
							);
							
							$this->WM->update_ss_gn2_file($state_sector_b, 'information_memorandum_financial_mode_attach');
	                }
				}
				
				unset($config);
				
				//year_wise_project_cost_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if(!empty($_FILES['year_wise_project_cost_attach']['name'])){
					if ( ! $this->upload->do_upload('year_wise_project_cost_attach'))
	                { $error = array('error' => $this->upload->display_errors()); $year_wise_project_cost_attach ='';}
	                else
	                {
	                        $year_wise_project_cost_attach = array('upload_data' => $this->upload->data());
							$year_wise_project_cost_attach = $year_wise_project_cost_attach;
							$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'year_wise_project_cost_attach' => $year_wise_project_cost_attach['upload_data']['file_name']
							);
							
							$this->WM->update_ss_gn2_file($state_sector_b, 'year_wise_project_cost_attach');
	                }
                }
				unset($config);
				
				//---------------------------------
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if(!empty($_FILES['drp_attachment']['name'])){
					if ( ! $this->upload->do_upload('drp_attachment'))
	                { $error = array('error' => $this->upload->display_errors()); $drp_attachment ='';}
	                else
	                {
	                        $ppa_attachment_data = array('upload_data' => $this->upload->data());
							$drp_attachment = $ppa_attachment_data;
							$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'drp_attachment' => $drp_attachment['upload_data']['file_name']
							);
							
							$this->WM->update_ss_gn2_file($state_sector_b, 'drp_attachment');
	                }
                }
				unset($config);
				
				
				//---------------------------------
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				if(!empty($_FILES['ppa_attachment']['name'])){
					if ( ! $this->upload->do_upload('ppa_attachment'))
	                { $error = array('error' => $this->upload->display_errors()); $ppa_attachment ='';}
	                else
	                {
	                        $drp_attachment_data = array('upload_data' => $this->upload->data());
							$ppa_attachment = $drp_attachment_data;
							$state_sector_b = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'ppa_attachment' => $ppa_attachment['upload_data']['file_name']
							);
							
							$this->WM->update_ss_gn2_file($state_sector_b, 'ppa_attachment');
	                }
                }
				unset($config);
				
				
				$ss_gn_2 = array(
					'user_id'=>$this->session->userdata('user')['id'],
					'app_id'=>$this->session->userdata('app_id'),
					'form_id' => $this->session->userdata('form_id'),
					'name_of_lead_bank'=>$this->input->post('phase1_project_details')['name_of_lead_bank'],
					'cost_comparison_bench_marking'=>$this->input->post('phase1_project_details')['cost_comparison_bench_marking'],
					'prepare_by_whom'=>$this->input->post('phase1_project_details')['prepare_by_whom'],
					'dpr_year'=>$this->input->post('phase1_project_details')['dpr_year'],
					'name_of_statutory_auditors'=>$this->input->post('phase1_project_details')['name_of_statutory_auditors'],
					'information_memorandum_financial_mode'=>$this->input->post('phase1_project_details')['information_memorandum_financial_mode'],
					'plant_technology_capacity'=>$this->input->post('phase1_project_details')['plant_technology_capacity'],
					'infrastructure_land_requirement'=>$this->input->post('phase1_project_details')['infrastructure_land_requirement'],
					'water_estimated_requirement_source'=>$this->input->post('phase1_project_details')['water_estimated_requirement_source'],
					'fuel_estimated_requirement_source'=>$this->input->post('phase1_project_details')['fuel_estimated_requirement_source'],
					'project_plant_implementation_schedule'=>$this->input->post('phase1_project_details')['project_plant_implementation_schedule'],
					'pan_for_power_evacuation_infrastructure_existing'=>$this->input->post('phase1_project_details')['pan_for_power_evacuation_infrastructure_existing'],
					'power_sale_offtake_banking'=>$this->input->post('phase1_project_details')['power_sale_offtake_banking'],
					'licenses_approval_pollution_clearance'=>$this->input->post('phase1_project_details')['licenses_approval_pollution_clearance'],
					'licenses_approval_water_allocation'=>$this->input->post('phase1_project_details')['licenses_approval_water_allocation'],
					'licenses_approval_environment_clearance'=>$this->input->post('phase1_project_details')['licenses_approval_environment_clearance'],
					'licenses_approval_forest_land_clearance'=>$this->input->post('phase1_project_details')['licenses_approval_forest_land_clearance'],
					'licenses_approval_forest_land_evacuation'=>$this->input->post('phase1_project_details')['licenses_approval_forest_land_evacuation'],
					'licenses_approval_civil_aviation_clearance'=>$this->input->post('phase1_project_details')['licenses_approval_civil_aviation_clearance'],
					'remarks' => $this->input->post("phase1_project_details")['remarks']
				);

				$this->db->where('user_id',$this->session->userdata('user')['id']);
				$this->db->where('form_id',$this->session->userdata('form_id'));
				$this->db->update('tbl_ss_generation_2', $ss_gn_2);
				//pr($_POST);
				//pr($_FILES);
		
			}else{
				
				
				
				//licenses_approval_pollution_clearance_attach
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
					if ( ! $this->upload->do_upload('licenses_approval_pollution_clearance_attach'))
	                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_pollution_clearance_attach ='';}
	                else
	                {
	                        $licenses_approval_pollution_clearance_attach_data = array('upload_data' => $this->upload->data());
							$licenses_approval_pollution_clearance_attach = $licenses_approval_pollution_clearance_attach_data['upload_data']['file_name'];
						 
	                }
				
				unset($config);
				
				//licenses_approval_water_allocation_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
					if ( ! $this->upload->do_upload('licenses_approval_water_allocation_attach'))
	                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_water_allocation_attach ='';}
	                else
	                {
	                        $licenses_approval_water_allocation_attach_data = array('upload_data' => $this->upload->data());
							$licenses_approval_water_allocation_attach = $licenses_approval_water_allocation_attach_data['upload_data']['file_name'];
							 
							
							
	                }
			
				unset($config);
				
				
				//licenses_approval_environment_clearance_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
					if ( ! $this->upload->do_upload('licenses_approval_environment_clearance_attach'))
	                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_environment_clearance_attach ='';}
	                else
	                {
	                        $licenses_approval_environment_clearance_attach_data = array('upload_data' => $this->upload->data());
							$licenses_approval_environment_clearance_attach = $licenses_approval_environment_clearance_attach_data['upload_data']['file_name'];
							
							 
							
	                }
				
				unset($config);
				//licenses_approval_forest_land_clearance_attach
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
					if ( ! $this->upload->do_upload('licenses_approval_forest_land_clearance_attach'))
	                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_forest_land_clearance_attach ='';}
	                else
	                {
	                        $licenses_approval_forest_land_clearance_attach_data = array('upload_data' => $this->upload->data());
							$licenses_approval_forest_land_clearance_attach = $licenses_approval_forest_land_clearance_attach_data['upload_data']['file_name'];
							 
							
	                }
				
				unset($config);
				
				//licenses_approval_forest_land_evacuation_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
					if ( ! $this->upload->do_upload('licenses_approval_forest_land_evacuation_attach'))
	                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_forest_land_evacuation_attach ='';}
	                else
	                {
	                        $licenses_approval_forest_land_evacuation_attach_data = array('upload_data' => $this->upload->data());
							$licenses_approval_forest_land_evacuation_attach = $licenses_approval_forest_land_evacuation_attach_data['upload_data']['file_name'];
						 
	                }
				
				unset($config);
				//licenses_approval_civil_aviation_clearance_attach
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
					if ( ! $this->upload->do_upload('licenses_approval_civil_aviation_clearance_attach'))
	                { $error = array('error' => $this->upload->display_errors()); $licenses_approval_civil_aviation_clearance_attach ='';}
	                else
	                {
	                        $licenses_approval_civil_aviation_clearance_attach_data = array('upload_data' => $this->upload->data());
							$licenses_approval_civil_aviation_clearance_attach = $licenses_approval_civil_aviation_clearance_attach_data['upload_data']['file_name'];
							
							
							
	                }
				
				unset($config);
				
				
				
				//means_of_finance_field
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
				if ( ! $this->upload->do_upload('means_of_finance_field'))
                { $error = array('error' => $this->upload->display_errors()); 
                
                	$means_of_finance_field ='';
				}
                else
                {
                        $means_of_finance_field_data = array('upload_data' => $this->upload->data());
						$means_of_finance_field = $means_of_finance_field_data['upload_data']['file_name'];
                }
				unset($config);
				
				
				//information_memorandum_financial_mode_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
				if ( ! $this->upload->do_upload('information_memorandum_financial_mode_attach'))
                { $error = array('error' => $this->upload->display_errors()); $information_memorandum_financial_mode_attach ='';}
                else
                {
                        $information_memorandum_financial_mode_attach_data = array('upload_data' => $this->upload->data());
						$information_memorandum_financial_mode_attach = $information_memorandum_financial_mode_attach_data['upload_data']['file_name'];
                }
				unset($config);
				
				//year_wise_project_cost_attach
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
				if ( ! $this->upload->do_upload('year_wise_project_cost_attach'))
                { $error = array('error' => $this->upload->display_errors()); $year_wise_project_cost_attach ='';}
                else
                {
                        $year_wise_project_cost_attach = array('upload_data' => $this->upload->data());
						$year_wise_project_cost_attach = $year_wise_project_cost_attach['upload_data']['file_name'];
                }
				unset($config);
				
				//-----------------------
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
				if ( ! $this->upload->do_upload('drp_attachment'))
                { $error = array('error' => $this->upload->display_errors()); $drp_attachment ='';}
                else
                {
                        $drp_attachment_attach = array('upload_data' => $this->upload->data());
						$drp_attachment = $drp_attachment_attach['upload_data']['file_name'];
                }
				unset($config);
				
				$config['upload_path']          = './uploads/forms/';
                $config['allowed_types']        = '*';
                
				$config['max_size'] = 0;
				$config['encrypt_name'] = TRUE;
				
				$this->load->library('upload', $config);
				
				
				if ( ! $this->upload->do_upload('ppa_attachment'))
                { $error = array('error' => $this->upload->display_errors()); $ppa_attachment ='';}
                else
                {
                        $ppa_attachment_attach = array('upload_data' => $this->upload->data());
						$ppa_attachment = $ppa_attachmentt_attach['upload_data']['file_name'];
                }
				unset($config);
				
				$ss_gn_2 = array(
					'user_id'=>$this->session->userdata('user')['id'],
					'app_id'=>$this->session->userdata('app_id'),
					'form_id' => $this->session->userdata('form_id'),
					'name_of_lead_bank'=>$this->input->post('phase1_project_details')['name_of_lead_bank'],
					'means_of_finance_field_data'=> $means_of_finance_field,
					'cost_comparison_bench_marking'=>$this->input->post('phase1_project_details')['cost_comparison_bench_marking'],
					'prepare_by_whom'=>$this->input->post('phase1_project_details')['prepare_by_whom'],
					'dpr_year'=>$this->input->post('phase1_project_details')['dpr_year'],
					'name_of_statutory_auditors'=>$this->input->post('phase1_project_details')['name_of_statutory_auditors'],
					'information_memorandum_financial_mode_attach' => $information_memorandum_financial_mode_attach,
					'information_memorandum_financial_mode'=>$this->input->post('phase1_project_details')['information_memorandum_financial_mode'],
					'plant_technology_capacity'=>$this->input->post('phase1_project_details')['plant_technology_capacity'],
					'infrastructure_land_requirement'=>$this->input->post('phase1_project_details')['infrastructure_land_requirement'],
					'water_estimated_requirement_source'=>$this->input->post('phase1_project_details')['water_estimated_requirement_source'],
					'fuel_estimated_requirement_source'=>$this->input->post('phase1_project_details')['fuel_estimated_requirement_source'],
					'project_plant_implementation_schedule'=>$this->input->post('phase1_project_details')['project_plant_implementation_schedule'],
					'pan_for_power_evacuation_infrastructure_existing'=>$this->input->post('phase1_project_details')['pan_for_power_evacuation_infrastructure_existing'],
					'power_sale_offtake_banking'=>$this->input->post('phase1_project_details')['power_sale_offtake_banking'],
					'licenses_approval_pollution_clearance'=>$this->input->post('phase1_project_details')['licenses_approval_pollution_clearance'],
					'licenses_approval_water_allocation'=>$this->input->post('phase1_project_details')['licenses_approval_water_allocation'],
					'licenses_approval_environment_clearance'=>$this->input->post('phase1_project_details')['licenses_approval_environment_clearance'],
					'licenses_approval_forest_land_clearance'=>$this->input->post('phase1_project_details')['licenses_approval_forest_land_clearance'],
					'licenses_approval_forest_land_evacuation'=>$this->input->post('phase1_project_details')['licenses_approval_forest_land_evacuation'],
					'year_wise_project_cost_attach'=>$year_wise_project_cost_attach,
					'licenses_approval_civil_aviation_clearance'=>$this->input->post('phase1_project_details')['licenses_approval_civil_aviation_clearance'],
					'remarks' => $this->input->post("phase1_project_details")['remarks'],
					
					'licenses_approval_pollution_clearance_attach'=>$licenses_approval_pollution_clearance_attach,
					'licenses_approval_water_allocation_attach'=>$licenses_approval_water_allocation_attach,
					'licenses_approval_environment_clearance_attach'=>$licenses_approval_environment_clearance_attach,
					'licenses_approval_forest_land_clearance_attach'=>$licenses_approval_forest_land_clearance_attach,
					'licenses_approval_forest_land_evacuation_attach'=>$licenses_approval_forest_land_evacuation_attach,
					'licenses_approval_civil_aviation_clearance_attach'=>$licenses_approval_civil_aviation_clearance_attach,
					'drp_attachment' => $drp_attachment
					
				);
				// insert database records
				$this->WM->insert_ss_gn_2($ss_gn_2);
					
				$data = array(
                    'url' => "form1/index/ss_gn/step-3",
                );
                $this->db->where('user_id', $this->session->userdata('user')['id']);
                $this->db->where('form_id', $this->session->userdata('form_id'));
                $this->db->update('tbl_ss_generation_a', $data);
				
			}
		if($this->WM->ss_deleteDta($user_id)){
				if(!empty($this->input->post('ss_phase1_project_details')['name_of_bank_FI'])){
				 $js=0;
					for($i=0;$i<sizeof($this->input->post('ss_phase1_project_details')['name_of_bank_FI']); $i++){
				 $js = $i+1;
				 //pr($js);die;
				
					//echo "hewsdsdsdewe";die;
					$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
		    		$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);
					
					if(!empty($_FILES['name_of_bank_status_attach'.$js]['name'])){	
						
						if ( ! $this->upload->do_upload('name_of_bank_status_attach'.$js))
							{ 
								$error = array('error' => $this->upload->display_errors()); $file = $this->input->post('name_of_bank_status_attachname'.$js);
							}
							else
							{	
								$chkfile_data = array('upload_data' => $this->upload->data()); 
								$file = $chkfile_data['upload_data']['file_name'];
								
							}
					}else
					{
						echo '('.$js.')'.$this->input->post('ss_phase1_project_details')['name_of_bank_status'.$js];
						if($this->input->post('ss_phase1_project_details')['name_of_bank_status'.$js]=='Applied'){
							$file = $this->input->post('name_of_bank_status_attachname'.$js);
						}else{ $file = '';}
						
					}
					
		
					unset($config);
					
					
					$sen[] = array(
						'user_id' => $user_id,
						'app_id'=>$this->session->userdata('app_id'),
						'form_id' => $this->session->userdata('form_id'),
						'name_of_bank_FI' => $this->input->post('ss_phase1_project_details')['name_of_bank_FI'][$i],
						'name_of_bank_amount' => $this->input->post('ss_phase1_project_details')['name_of_bank_amount'][$i],
						'name_of_bank_status' => $this->input->post('ss_phase1_project_details')['name_of_bank_status'.$js],
						'name_of_bank_status_attach' => $file,
					);
				
			}
			
			$this->db->insert_batch('tbl_ss_generation_2_sanction',$sen);
			}
			
		}
		
			if($this->WM->ss_deleteDta2a($user_id)){
			if(!empty($this->input->post('project_details')['date_of_ppa'])){
				 $js=0;
			for($i=0;$i<sizeof($this->input->post('project_details')['date_of_ppa']); $i++){
				 $js = $i+1;
				 //pr($js);die;
				
					//echo "hewsdsdsdewe";die;
					$sen1[] = array(
						'user_id' => $user_id,
						'app_id'=>$this->session->userdata('app_id'),
						'form_id' => $this->session->userdata('form_id'),
						'date_of_ppa' => $this->input->post('project_details')['date_of_ppa'][$i],
						'utility_discom' => $this->input->post('project_details')['utility_discom'][$i],
						'ppa_capacity' => $this->input->post('project_details')['ppa_capacity'][$i],
						'ppa_tariff' => $this->input->post('project_details')['ppa_tariff'][$i],
						'ppa_mou_case_1' => $this->input->post('project_details')['ppa_mou_case_1'][$i],
						
					);
				
			}
			
			$this->db->insert_batch('tbl_ss_generation_2a',$sen1);

			}
		}
		
		if($this->WM->ss_deleteDta2b($user_id)){
			if(!empty($this->input->post('project_details1')['yet_tied_capacity'])){
				 $js=0;
					for($i=0;$i<sizeof($this->input->post('project_details1')['yet_tied_capacity']); $i++){
				 $js = $i+1;
				 //pr($js);die;
				
					//echo "hewsdsdsdewe";die;
					$sen2[] = array(
						'user_id' => $user_id,
						'app_id'=> $this->session->userdata('app_id'),
						'form_id' => $this->session->userdata('form_id'),
						'yet_tied_capacity' => $this->input->post('project_details1')['yet_tied_capacity'][$i],
						'yet_tied_proposed_through' => $this->input->post('project_details1')['yet_tied_proposed_through'][$i],
						'yet_tied_expected_tariff' => $this->input->post('project_details1')['yet_tied_expected_tariff'][$i],
						'yet_tied_detail_bidding_participated' => $this->input->post('project_details1')['yet_tied_detail_bidding_participated'][$i],						
					);
				
			}
			
			$this->db->insert_batch('tbl_ss_generation_2b',$sen2);

		}
		}

			redirect(base_url()."form1/index/ss_gn/step-3");
		}
	}
	
		// processing step three gebneration
	public function process_ss_generation_3(){
		$data['ss_gn_a'] = $this->WM->get_ss_generation_a();
		
		if($data['ss_gn_a']){
			$this->session->set_userdata("app_id", $data['ss_gn_a']['app_id']);	
		}
		$user_id = $this->session->userdata('user')['id'];
		
		if($this->input->method(true)=="POST"){
			//check if already exists
			$ss_gn3 = $this->WM->check_ss_gn3_exist($user_id);
			if($ss_gn3){
				
				
				//fuel_loa_with_attach
					
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	         $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if(!empty($_FILES['fuel_loa_with_attach']['name'])){
			
				if ( ! $this->upload->do_upload('fuel_loa_with_attach'))
				{ $error = array('error' => $this->upload->display_errors()); 
				
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'fuel_loa_with_attach' => ''
						);
						
						$this->WM->update_ss_gn_3_file($state_sector_c, 'fuel_loa_with_attach');
				
				}
				else
				{
						$fuel_loa_with_attach_data = array('upload_data' => $this->upload->data());
						$fuel_loa_with_attach = $fuel_loa_with_attach_data['upload_data']['file_name'];
						
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'fuel_loa_with_attach' => $fuel_loa_with_attach
						);
						
						$this->WM->update_ss_gn_3_file($state_sector_c, 'fuel_loa_with_attach');
							
				}
			}
	        
			
			//fuel_supply_agreement_attachment
			unset($config);		
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	       $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if(!empty($_FILES['fuel_supply_agreement_attachment']['name'])){
			
				if ( ! $this->upload->do_upload('fuel_supply_agreement_attachment'))
				{ $error = array('error' => $this->upload->display_errors()); 
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'fuel_supply_agreement_attachment' => ''
						);
						
						$this->WM->update_ss_gn_3_file($state_sector_c, 'fuel_supply_agreement_attachment');
				}
				else
				{
						$fuel_supply_agreement_attachment_data = array('upload_data' => $this->upload->data());
						$fuel_supply_agreement_attachment = $fuel_supply_agreement_attachment_data['upload_data']['file_name'];
						
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'fuel_supply_agreement_attachment' => $fuel_supply_agreement_attachment
						);
						
						$this->WM->update_ss_gn_3_file($state_sector_c, 'fuel_supply_agreement_attachment');
				}
			}
			
			//water_allocation_attach
			unset($config);		
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if(!empty($_FILES['water_allocation_attach']['name'])){
				if ( ! $this->upload->do_upload('water_allocation_attach'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'water_allocation_attach' => ''
						);
						
						$this->WM->update_ss_gn_3_file($state_sector_c, 'water_allocation_attach');
						
				}
				else
				{
						$water_allocation_attach_data = array('upload_data' => $this->upload->data());
						$water_allocation_attach = $water_allocation_attach_data['upload_data']['file_name'];
						
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'water_allocation_attach' => $water_allocation_attach
						);
						
						$this->WM->update_ss_gn_3_file($state_sector_c, 'water_allocation_attach');
				}
			}
			
			
			/*
			'hydo_year_data_avail_attach'=>$hydo_year_data_avail_attach,
			*/
			
			//hydro_environmental_impact
			unset($config);		
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if(!empty($_FILES['hydro_environmental_impact']['name'])){
				if ( ! $this->upload->do_upload('hydro_environmental_impact'))
				{ $error = array('error' => $this->upload->display_errors()); 
				
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'hydro_environmental_impact' => ''
						);
						
						$this->WM->update_ss_gn_3_file($state_sector_c, 'hydro_environmental_impact');
					
				}
				else
				{
						$hydro_environmental_impact_data = array('upload_data' => $this->upload->data());
						$hydro_environmental_impact = $hydro_environmental_impact_data['upload_data']['file_name'];
						
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'hydro_environmental_impact' => $hydro_environmental_impact
						);
						
						$this->WM->update_ss_gn_3_file($state_sector_c, 'hydro_environmental_impact');
				}
			}
			
			//hydo_year_data_avail_attach
			unset($config);		
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if(!empty($_FILES['hydo_year_data_avail_attach']['name'])){
				if ( ! $this->upload->do_upload('hydo_year_data_avail_attach'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'hydo_year_data_avail_attach' => ''
						);
						
						$this->WM->update_ss_gn_3_file($state_sector_c, 'hydo_year_data_avail_attach');
				}
				else
				{
						$hydo_year_data_avail_attach_data = array('upload_data' => $this->upload->data());
						$hydo_year_data_avail_attach = $hydo_year_data_avail_attach_data['upload_data']['file_name'];
						
						$state_sector_c = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'hydo_year_data_avail_attach' => $hydo_year_data_avail_attach
						);
						
						$this->WM->update_ss_gn_3_file($state_sector_c, 'hydo_year_data_avail_attach');
				}
			}
			
			$ss_gn_3 = array(
				'user_id'=>$this->session->userdata('user')['id'],
				'app_id'=>$this->session->userdata('app_id'),
				'form_id' => $this->session->userdata('form_id'),
				'location_geological_coord'=>$this->input->post('phase1_loc_lan_wat')['location_geological_coord'],
				'location_weather_located'=>$this->input->post('phase1_loc_lan_wat')['location_weather_located'],
				'location_mearest_forest'=>$this->input->post('phase1_loc_lan_wat')['location_mearest_forest'],
				'location_mearest_port_distance'=>$this->input->post('phase1_loc_lan_wat')['location_mearest_port_distance'],
				'location_railway_station_distance'=>$this->input->post('phase1_loc_lan_wat')['location_railway_station_distance'],
				'location_nearest_national_highway'=>$this->input->post('phase1_loc_lan_wat')['location_nearest_national_highway'],
				'location_coal_gas_source'=>$this->input->post('phase1_loc_lan_wat')['location_coal_gas_source'],
				'land_classification_current'=>$this->input->post('phase1_loc_lan_wat')['land_classification_current'],
				'land_land_required'=>$this->input->post('phase1_loc_lan_wat')['land_land_required'],
				'land_land_required_for_main_plant'=>$this->input->post('phase1_loc_lan_wat')['land_land_required_for_main_plant'],
				'land_acquired_till_date'=>$this->input->post('phase1_loc_lan_wat')['land_acquired_till_date'],
				'fuel_domestic_coal_gas'=>$this->input->post('phase1_loc_lan_wat')['fuel_domestic_coal_gas'],
				'fuel_request_per_annum_capacity'=>$this->input->post('phase1_loc_lan_wat')['fuel_request_per_annum_capacity'],
				'fuel_imported_call'=>$this->input->post('phase1_loc_lan_wat')['fuel_imported_call'],
				'fuel_imported_call_request_per_annum_capacity'=>$this->input->post('phase1_loc_lan_wat')['fuel_imported_call_request_per_annum_capacity'],
				
				'fuel_domestic_percent'=>$this->input->post('phase1_loc_lan_wat')['fuel_domestic_percent'],
				'fuel_imported_percent'=>$this->input->post('phase1_loc_lan_wat')['fuel_imported_percent'],
				
				'fuel_plan_meeting_fuel_requirement'=>$this->input->post('phase1_loc_lan_wat')['fuel_plan_meeting_fuel_requirement'],
				'fuel_loa_with'=>$this->input->post('phase1_loc_lan_wat')['fuel_loa_with'],
				'fuel_loa_date'=>$this->input->post('phase1_loc_lan_wat')['fuel_loa_date'],
				'fuel_quantum_fuel_supply'=>$this->input->post('phase1_loc_lan_wat')['fuel_quantum_fuel_supply'],
				'fuel_validity_of_loa'=>$this->input->post('phase1_loc_lan_wat')['fuel_validity_of_loa'],
				'fuel_supply_agreement'=>$this->input->post('phase1_loc_lan_wat')['fuel_supply_agreement'],
				'fuel_annual_contracted_quantity'=>$this->input->post('phase1_loc_lan_wat')['fuel_annual_contracted_quantity'],
				'fuel_end_use_application'=>$this->input->post('phase1_loc_lan_wat')['fuel_end_use_application'],
				'fuel_compensation_for_short'=>$this->input->post('phase1_loc_lan_wat')['fuel_compensation_for_short'],
				'fuel_price'=>$this->input->post('phase1_loc_lan_wat')['fuel_price'],
				'fuel_escalation'=>$this->input->post('phase1_loc_lan_wat')['fuel_escalation'],
				'water_per_day'=>$this->input->post('phase1_loc_lan_wat')['water_per_day'],
				'water_per_annum'=>$this->input->post('phase1_loc_lan_wat')['water_per_annum'],
				'water_name_of_source'=>$this->input->post('phase1_loc_lan_wat')['water_name_of_source'],
				'water_distance'=>$this->input->post('phase1_loc_lan_wat')['water_distance'],
				'water_allocation'=>$this->input->post('phase1_loc_lan_wat')['water_allocation'],
				'water_transportation'=>$this->input->post('phase1_loc_lan_wat')['water_transportation'],
				'water_cooling_system'=>$this->input->post('phase1_loc_lan_wat')['water_cooling_system'],
				'hydro_resettlement'=>$this->input->post('phase1_loc_lan_wat')['hydro_resettlement'],
				'hydro_family_resettled'=>$this->input->post('phase1_loc_lan_wat')['hydro_family_resettled'],
				'hydro_extent_deforestation'=>$this->input->post('phase1_loc_lan_wat')['hydro_extent_deforestation'],
				'hydro_flora_fauna'=>$this->input->post('phase1_loc_lan_wat')['hydro_flora_fauna'],
				'hydro_forests_wildlife'=>$this->input->post('phase1_loc_lan_wat')['hydro_forests_wildlife'],
				'hydro_archaelogical_monuments'=>$this->input->post('phase1_loc_lan_wat')['hydro_archaelogical_monuments'],
				'hydro_degradation_catchment_area'=>$this->input->post('phase1_loc_lan_wat')['hydro_degradation_catchment_area'],
				'hydro_rock_mass_rating'=>$this->input->post('phase1_loc_lan_wat')['hydro_rock_mass_rating'],
				'typo_access_to_site'=>$this->input->post('phase1_loc_lan_wat')['typo_access_to_site'],
				'typo_issue_pretaining_heavy_equipment'=>$this->input->post('phase1_loc_lan_wat')['typo_issue_pretaining_heavy_equipment'],
				'typo_potential_land_side_problems'=>$this->input->post('phase1_loc_lan_wat')['typo_potential_land_side_problems'],
				'seismic_zone'=>$this->input->post('phase1_loc_lan_wat')['seismic_zone'],
				'hydo_year_data_avail'=>$this->input->post('phase1_loc_lan_wat')['hydo_year_data_avail'],
			);
			//insert data 
			$this->WM->update_ss_gn_3($ss_gn_3);
				
			}else{
			//fuel_loa_with_attach
					
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('fuel_loa_with_attach'))
	        { $error = array('error' => $this->upload->display_errors()); $fuel_loa_with_attach ='';}
	        else
	        {
	                $fuel_loa_with_attach_data = array('upload_data' => $this->upload->data());
					$fuel_loa_with_attach = $fuel_loa_with_attach_data['upload_data']['file_name'];
	        }
	        
			
			//fuel_supply_agreement_attachment
			unset($config);		
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('fuel_supply_agreement_attachment'))
	        { $error = array('error' => $this->upload->display_errors()); $fuel_supply_agreement_attachment ='';}
	        else
	        {
	                $fuel_supply_agreement_attachment_data = array('upload_data' => $this->upload->data());
					$fuel_supply_agreement_attachment = $fuel_supply_agreement_attachment_data['upload_data']['file_name'];
	        }
			
			//water_allocation_attach
			unset($config);		
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	         $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('water_allocation_attach'))
	        { $error = array('error' => $this->upload->display_errors()); $water_allocation_attach ='';}
	        else
	        {
	                $water_allocation_attach_data = array('upload_data' => $this->upload->data());
					$water_allocation_attach = $water_allocation_attach_data['upload_data']['file_name'];
	        }
			
			
			/*
			'hydo_year_data_avail_attach'=>$hydo_year_data_avail_attach,
			*/
			
			//hydro_environmental_impact
			unset($config);		
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
	        $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('hydro_environmental_impact'))
	        { $error = array('error' => $this->upload->display_errors()); $hydro_environmental_impact ='';}
	        else
	        {
	                $hydro_environmental_impact_data = array('upload_data' => $this->upload->data());
					$hydro_environmental_impact = $hydro_environmental_impact_data['upload_data']['file_name'];
	        }
			
			//hydo_year_data_avail_attach
			unset($config);		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('hydo_year_data_avail_attach'))
	        { $error = array('error' => $this->upload->display_errors()); $hydo_year_data_avail_attach ='';}
	        else
	        {
	                $hydo_year_data_avail_attach_data = array('upload_data' => $this->upload->data());
					$hydo_year_data_avail_attach = $hydo_year_data_avail_attach_data['upload_data']['file_name'];
	        }
			 
			$ss_gn_3 = array(
				'user_id'=>$this->session->userdata('user')['id'],
				'app_id'=>$this->session->userdata('app_id'),
				'form_id' => $this->session->userdata('form_id'),
				'location_geological_coord'=>$this->input->post('phase1_loc_lan_wat')['location_geological_coord'],
				'location_weather_located'=>$this->input->post('phase1_loc_lan_wat')['location_weather_located'],
				'location_mearest_forest'=>$this->input->post('phase1_loc_lan_wat')['location_mearest_forest'],
				'location_mearest_port_distance'=>$this->input->post('phase1_loc_lan_wat')['location_mearest_port_distance'],
				'location_railway_station_distance'=>$this->input->post('phase1_loc_lan_wat')['location_railway_station_distance'],
				'location_nearest_national_highway'=>$this->input->post('phase1_loc_lan_wat')['location_nearest_national_highway'],
				'location_coal_gas_source'=>$this->input->post('phase1_loc_lan_wat')['location_coal_gas_source'],
				'land_classification_current'=>$this->input->post('phase1_loc_lan_wat')['land_classification_current'],
				'land_land_required'=>$this->input->post('phase1_loc_lan_wat')['land_land_required'],
				'land_land_required_for_main_plant'=>$this->input->post('phase1_loc_lan_wat')['land_land_required_for_main_plant'],
				'land_acquired_till_date'=>$this->input->post('phase1_loc_lan_wat')['land_acquired_till_date'],
				'fuel_domestic_coal_gas'=>$this->input->post('phase1_loc_lan_wat')['fuel_domestic_coal_gas'],
				'fuel_request_per_annum_capacity'=>$this->input->post('phase1_loc_lan_wat')['fuel_request_per_annum_capacity'],
				'fuel_imported_call'=>$this->input->post('phase1_loc_lan_wat')['fuel_imported_call'],
				'fuel_imported_call_request_per_annum_capacity'=>$this->input->post('phase1_loc_lan_wat')['fuel_imported_call_request_per_annum_capacity'],
				
				'fuel_domestic_percent'=>$this->input->post('phase1_loc_lan_wat')['fuel_domestic_percent'],
				'fuel_imported_percent'=>$this->input->post('phase1_loc_lan_wat')['fuel_imported_percent'],
				
				'fuel_plan_meeting_fuel_requirement'=>$this->input->post('phase1_loc_lan_wat')['fuel_plan_meeting_fuel_requirement'],
				'fuel_loa_with'=>$this->input->post('phase1_loc_lan_wat')['fuel_loa_with'],
				'fuel_loa_date'=>$this->input->post('phase1_loc_lan_wat')['fuel_loa_date'],
				'fuel_quantum_fuel_supply'=>$this->input->post('phase1_loc_lan_wat')['fuel_quantum_fuel_supply'],
				'fuel_validity_of_loa'=>$this->input->post('phase1_loc_lan_wat')['fuel_validity_of_loa'],
				'fuel_supply_agreement'=>$this->input->post('phase1_loc_lan_wat')['fuel_supply_agreement'],
				'fuel_annual_contracted_quantity'=>$this->input->post('phase1_loc_lan_wat')['fuel_annual_contracted_quantity'],
				'fuel_end_use_application'=>$this->input->post('phase1_loc_lan_wat')['fuel_end_use_application'],
				'fuel_compensation_for_short'=>$this->input->post('phase1_loc_lan_wat')['fuel_compensation_for_short'],
				'fuel_price'=>$this->input->post('phase1_loc_lan_wat')['fuel_price'],
				'fuel_escalation'=>$this->input->post('phase1_loc_lan_wat')['fuel_escalation'],
				'water_per_day'=>$this->input->post('phase1_loc_lan_wat')['water_per_day'],
				'water_per_annum'=>$this->input->post('phase1_loc_lan_wat')['water_per_annum'],
				'water_name_of_source'=>$this->input->post('phase1_loc_lan_wat')['water_name_of_source'],
				'water_distance'=>$this->input->post('phase1_loc_lan_wat')['water_distance'],
				'water_allocation'=>$this->input->post('phase1_loc_lan_wat')['water_allocation'],
				'water_transportation'=>$this->input->post('phase1_loc_lan_wat')['water_transportation'],
				'water_cooling_system'=>$this->input->post('phase1_loc_lan_wat')['water_cooling_system'],
				'hydro_resettlement'=>$this->input->post('phase1_loc_lan_wat')['hydro_resettlement'],
				'hydro_family_resettled'=>$this->input->post('phase1_loc_lan_wat')['hydro_family_resettled'],
				'hydro_extent_deforestation'=>$this->input->post('phase1_loc_lan_wat')['hydro_extent_deforestation'],
				'hydro_flora_fauna'=>$this->input->post('phase1_loc_lan_wat')['hydro_flora_fauna'],
				'hydro_forests_wildlife'=>$this->input->post('phase1_loc_lan_wat')['hydro_forests_wildlife'],
				'hydro_archaelogical_monuments'=>$this->input->post('phase1_loc_lan_wat')['hydro_archaelogical_monuments'],
				'hydro_degradation_catchment_area'=>$this->input->post('phase1_loc_lan_wat')['hydro_degradation_catchment_area'],
				'hydro_rock_mass_rating'=>$this->input->post('phase1_loc_lan_wat')['hydro_rock_mass_rating'],
				'typo_access_to_site'=>$this->input->post('phase1_loc_lan_wat')['typo_access_to_site'],
				'typo_issue_pretaining_heavy_equipment'=>$this->input->post('phase1_loc_lan_wat')['typo_issue_pretaining_heavy_equipment'],
				'typo_potential_land_side_problems'=>$this->input->post('phase1_loc_lan_wat')['typo_potential_land_side_problems'],
				'seismic_zone'=>$this->input->post('phase1_loc_lan_wat')['seismic_zone'],
				'hydo_year_data_avail'=>$this->input->post('phase1_loc_lan_wat')['hydo_year_data_avail'],
				'fuel_loa_with_attach'=>$fuel_loa_with_attach,
				'fuel_supply_agreement_attachment'=>$fuel_supply_agreement_attachment,
				'water_allocation_attach'=>$water_allocation_attach,
				'hydro_environmental_impact'=>$hydro_environmental_impact,
				'hydo_year_data_avail_attach'=>$hydo_year_data_avail_attach
			);
			//insert data 
			$this->WM->insert_ss_gn_3($ss_gn_3);
			
				$data = array(
                    'url' => "form1/index/ss_gn/step-4",
                );
                $this->db->where('user_id', $this->session->userdata('user')['id']);
                $this->db->where('form_id', $this->session->userdata('form_id'));
                $this->db->update('tbl_ss_generation_a', $data);
			
			}

			redirect(base_url()."form1/index/ss_gn/step-4");
		}
	}
	public function process_ss_generation_4()
	{
		
		$data['ss_gn_a'] = $this->WM->get_ss_generation_a();
		
		if($data['ss_gn_a']){
			$this->session->set_userdata("app_id", $data['ss_gn_a']['app_id']);	
		}
		$user_id = $this->session->userdata('user')['id'];
		
		if($this->input->method(true)=="POST"){
			//check if already exists
			$ss_gn4 = $this->WM->check_ss_gn4_exist($user_id);
			
		if($ss_gn4){
				
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if(!empty($_FILES['time_schedule_file']['name'])){
				if ( ! $this->upload->do_upload('time_schedule_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'time_schedule_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'time_schedule_file');
				}
				else
				{
						$time_schedule_file_data = array('upload_data' => $this->upload->data());
						$time_schedule_file = $time_schedule_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'time_schedule_file' => $time_schedule_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'time_schedule_file');
				}
			}
			
			//------------------------------------
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if($this->input->post("DetailedPro") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'DetailedPro_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'DetailedPro_file');
			}else{
				if(!empty($_FILES['DetailedPro_file']['name'])){
					if ( ! $this->upload->do_upload('DetailedPro_file'))
					{ $error = array('error' => $this->upload->display_errors()); 
						$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'DetailedPro_file' => ''
							);
							
							$this->WM->update_ss_gn_4_file($file, 'DetailedPro_file');
					}
					else
					{
							$DetailedPro_file_data = array('upload_data' => $this->upload->data());
							$DetailedPro_file = $DetailedPro_file_data['upload_data']['file_name'];
							
							$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'DetailedPro_file' => $DetailedPro_file
							);
							
							$this->WM->update_ss_gn_4_file($file, 'DetailedPro_file');
					}
				}
			}	
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if($this->input->post("promoter_company") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'promoter_company_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'promoter_company_file');
			}else{
			
				if(!empty($_FILES['promoter_company_file']['name'])){
					if ( ! $this->upload->do_upload('promoter_company_file'))
					{ $error = array('error' => $this->upload->display_errors()); 
						$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'promoter_company_file' => ''
							);
							
							$this->WM->update_ss_gn_4_file($file, 'promoter_company_file');
					}
					else
					{
							$promoter_company_file_data = array('upload_data' => $this->upload->data());
							$promoter_company_file = $promoter_company_file_data['upload_data']['file_name'];
							
							$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'promoter_company_file' => $promoter_company_file
							);
							
							$this->WM->update_ss_gn_4_file($file, 'promoter_company_file');
					}
				}
			}
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if($this->input->post("audited_balance") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'audited_balance_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'audited_balance_file');
			}else{
			
			if(!empty($_FILES['audited_balance_file']['name'])){
				if ( ! $this->upload->do_upload('audited_balance_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'audited_balance_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'audited_balance_file');
				}
				else
				{
						$audited_balance_file_data = array('upload_data' => $this->upload->data());
						$audited_balance_file = $audited_balance_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'audited_balance_file' => $audited_balance_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'audited_balance_file');
				}
			}
			}
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if($this->input->post("project_allotment") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'project_allotment_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'project_allotment_file');
			}else{
			
			if(!empty($_FILES['project_allotment_file']['name'])){
				if ( ! $this->upload->do_upload('project_allotment_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'project_allotment_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'project_allotment_file');
				}
				else
				{
						$project_allotment_file_data = array('upload_data' => $this->upload->data());
						$project_allotment_file = $project_allotment_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'project_allotment_file' => $project_allotment_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'project_allotment_file');
				}
			}
			}
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if($this->input->post("implementation_scheme") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'implementation_scheme_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'implementation_scheme_file');
			}else{
			if(!empty($_FILES['implementation_scheme_file']['name'])){
				if ( ! $this->upload->do_upload('implementation_scheme_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'implementation_scheme_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'implementation_scheme_file');
				}
				else
				{
						$implementation_scheme_file_data = array('upload_data' => $this->upload->data());
						$implementation_scheme_file = $implementation_scheme_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'implementation_scheme_file' => $implementation_scheme_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'implementation_scheme_file');
				}
			}
			}
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if($this->input->post("undertake_project") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'undertake_project_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'undertake_project_file');
			}else{
			if(!empty($_FILES['undertake_project_file']['name'])){
				if ( ! $this->upload->do_upload('undertake_project_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'undertake_project_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'undertake_project_file');
				}
				else
				{
						$undertake_project_file_data = array('upload_data' => $this->upload->data());
						$undertake_project_file = $undertake_project_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'undertake_project_file' => $undertake_project_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'undertake_project_file');
				}
			}
			}
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if($this->input->post("geological_study") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'geological_study_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'geological_study_file');
			}else{
			if(!empty($_FILES['geological_study_file']['name'])){
				if ( ! $this->upload->do_upload('geological_study_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'geological_study_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'geological_study_file');
				}
				else
				{
						$geological_study_file_data = array('upload_data' => $this->upload->data());
						$geological_study_file = $geological_study_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'geological_study_file' => $geological_study_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'geological_study_file');
				}
			}
			}
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if($this->input->post("EPCcontracts") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'EPCcontracts_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'EPCcontracts_file');
			}else{
			if(!empty($_FILES['EPCcontracts_file']['name'])){
				if ( ! $this->upload->do_upload('EPCcontracts_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'EPCcontracts_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'EPCcontracts_file');
				}
				else
				{
						$EPCcontracts_file_data = array('upload_data' => $this->upload->data());
						$EPCcontracts_file = $EPCcontracts_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'EPCcontracts_file' => $EPCcontracts_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'EPCcontracts_file');
				}
			}
			}
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if($this->input->post("machinery") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'machinery_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'machinery_file');
			}else{
				if(!empty($_FILES['machinery_file']['name'])){
					if ( ! $this->upload->do_upload('machinery_file'))
					{ $error = array('error' => $this->upload->display_errors()); 
						$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'machinery_file' => ''
							);
							
							$this->WM->update_ss_gn_4_file($file, 'machinery_file');
					}
					else
					{
							$machinery_file_data = array('upload_data' => $this->upload->data());
							$machinery_file = $machinery_file_data['upload_data']['file_name'];
							
							$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'machinery_file' => $machinery_file
							);
							
							$this->WM->update_ss_gn_4_file($file, 'machinery_file');
					}
				}
			}
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if($this->input->post("transmission_cost") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'transmission_cost_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'transmission_cost_file');
			}else{
			if(!empty($_FILES['transmission_cost_file']['name'])){
				if ( ! $this->upload->do_upload('transmission_cost_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'transmission_cost_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'transmission_cost_file');
				}
				else
				{
						$transmission_cost_file_data = array('upload_data' => $this->upload->data());
						$transmission_cost_file = $transmission_cost_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'transmission_cost_file' => $transmission_cost_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'transmission_cost_file');
				}
			}
			}
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if($this->input->post("financial_progress") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'financial_progress_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'financial_progress_file');
			}else{
			if(!empty($_FILES['financial_progress_file']['name'])){
				if ( ! $this->upload->do_upload('financial_progress_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'financial_progress_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'financial_progress_file');
				}
				else
				{
						$financial_progress_file_data = array('upload_data' => $this->upload->data());
						$financial_progress_file = $financial_progress_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'financial_progress_file' => $financial_progress_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'financial_progress_file');
				}
			}
			}
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if($this->input->post("purchase_agreement") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'purchase_agreement_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'purchase_agreement_file');
			}else{
			if(!empty($_FILES['purchase_agreement_file']['name'])){
				if ( ! $this->upload->do_upload('purchase_agreement_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'purchase_agreement_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'purchase_agreement_file');
				}
				else
				{
						$purchase_agreement_file_data = array('upload_data' => $this->upload->data());
						$purchase_agreement_file = $purchase_agreement_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'purchase_agreement_file' => $purchase_agreement_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'purchase_agreement_file');
				}
			}
			}
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if($this->input->post("statutory_clearances") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'statutory_clearances_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'statutory_clearances_file');
			}else{
			if(!empty($_FILES['statutory_clearances_file']['name'])){
				if ( ! $this->upload->do_upload('statutory_clearances_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'statutory_clearances_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'statutory_clearances_file');
				}
				else
				{
						$statutory_clearances_file_data = array('upload_data' => $this->upload->data());
						$statutory_clearances_file = $statutory_clearances_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'statutory_clearances_file' => $statutory_clearances_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'statutory_clearances_file');
				}
			}
			}
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if($this->input->post("land_acquisition") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'land_acquisition_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'land_acquisition_file');
			}else{
			if(!empty($_FILES['land_acquisition_file']['name'])){
				if ( ! $this->upload->do_upload('land_acquisition_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'land_acquisition_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'land_acquisition_file');
				}
				else
				{
						$land_acquisition_file_data = array('upload_data' => $this->upload->data());
						$land_acquisition_file = $land_acquisition_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'land_acquisition_file' => $land_acquisition_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'land_acquisition_file');
				}
			}
			}
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if($this->input->post("earlier_loan") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'earlier_loan_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'earlier_loan_file');
			}else{
			if(!empty($_FILES['earlier_loan_file']['name'])){
				if ( ! $this->upload->do_upload('earlier_loan_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'earlier_loan_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'earlier_loan_file');
				}
				else
				{
						$earlier_loan_file_data = array('upload_data' => $this->upload->data());
						$earlier_loan_file = $earlier_loan_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'earlier_loan_file' => $earlier_loan_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'earlier_loan_file');
				}
			}
			}
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if($this->input->post("mobilization") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'mobilization_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'mobilization_file');
			}else{
			if(!empty($_FILES['mobilization_file']['name'])){
				if ( ! $this->upload->do_upload('mobilization_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'mobilization_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'mobilization_file');
				}
				else
				{
						$mobilization_file_data = array('upload_data' => $this->upload->data());
						$mobilization_file = $mobilization_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'mobilization_file' => $mobilization_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'mobilization_file');
				}
			}
			}
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if($this->input->post("relevent_document") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'relevent_document_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'relevent_document_file');
			}else{
			if(!empty($_FILES['relevent_document_file']['name'])){
				if ( ! $this->upload->do_upload('relevent_document_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'relevent_document_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'relevent_document_file');
				}
				else
				{
						$relevent_document_file_data = array('upload_data' => $this->upload->data());
						$relevent_document_file = $relevent_document_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'relevent_document_file' => $relevent_document_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'relevent_document_file');
				}
			}
			}
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if($this->input->post("environment_aspects") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'environment_aspects_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'environment_aspects_file');
			}else{
			if(!empty($_FILES['environment_aspects_file']['name'])){
				if ( ! $this->upload->do_upload('environment_aspects_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'environment_aspects_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'environment_aspects_file');
				}
				else
				{
						$environment_aspects_file_data = array('upload_data' => $this->upload->data());
						$environment_aspects_file = $environment_aspects_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'environment_aspects_file' => $environment_aspects_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'environment_aspects_file');
				}
			}
			}
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if($this->input->post("socio_economic") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'socio_economic_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'socio_economic_file');
			}else{
			if(!empty($_FILES['socio_economic_file']['name'])){
				if ( ! $this->upload->do_upload('socio_economic_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'socio_economic_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'socio_economic_file');
				}
				else
				{
						$socio_economic_file_data = array('upload_data' => $this->upload->data());
						$socio_economic_file = $socio_economic_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'socio_economic_file' => $socio_economic_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'socio_economic_file');
				}
			}
			}
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if($this->input->post("applicable_subsidy") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'applicable_subsidy_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'applicable_subsidy_file');
			}else{
			if(!empty($_FILES['applicable_subsidy_file']['name'])){
				if ( ! $this->upload->do_upload('applicable_subsidy_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'applicable_subsidy_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'applicable_subsidy_file');
				}
				else
				{
						$time_schedule_file_data = array('upload_data' => $this->upload->data());
						$applicable_subsidy_file = $time_schedule_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'applicable_subsidy_file' => $applicable_subsidy_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'applicable_subsidy_file');
				}
			}
			}
			
			$config['upload_path']          = './uploads/forms/'; $config['allowed_types']        = '*';
			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			if($this->input->post("risk_management") == 0){
				$file = array(
								'user_id'=>$this->session->userdata('user')['id'],
								'risk_management_file' => ''
							);
							
				$this->WM->update_ss_gn_4_file($file, 'risk_management_file');
			}else{
			if(!empty($_FILES['risk_management_file']['name'])){
				if ( ! $this->upload->do_upload('risk_management_file'))
				{ $error = array('error' => $this->upload->display_errors()); 
					$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'risk_management_file' => ''
						);
						
						$this->WM->update_ss_gn_4_file($file, 'risk_management_file');
				}
				else
				{
						$risk_management_file_data = array('upload_data' => $this->upload->data());
						$risk_management_file = $risk_management_file_data['upload_data']['file_name'];
						
						$file = array(
							'user_id'=>$this->session->userdata('user')['id'],
							'risk_management_file' => $risk_management_file
						);
						
						$this->WM->update_ss_gn_4_file($file, 'risk_management_file');
				}
			}
			}
			
				
			$ss_gen_4 =array(
				'user_id'=>$this->session->userdata('user')['id'],
				'app_id'=>$this->session->userdata('app_id'),
				'form_id' => $this->session->userdata('form_id'),
				'contract_project1'=>$this->input->post('contract_project1'), 
				'contract_epc_route'=>$this->input->post('contract_epc_route'),
				
				 
				'contract_non_epc_route'=>$this->input->post('contract_non_epc_route'), 
				
				'cost_overrun'=>$this->input->post('cost_overrun'), 
				'time_schedule'=>$this->input->post('time_schedule'), 
				'om_contract'=>$this->input->post('om_contract'), 
				'DetailedPro'=>$this->input->post('DetailedPro'), 
				'promoter_company'=>$this->input->post('promoter_company'), 
				'audited_balance'=>$this->input->post('audited_balance'), 
				'project_allotment'=>$this->input->post('project_allotment'), 
				'implementation_scheme'=>$this->input->post('implementation_scheme'), 
				'undertake_project'=>$this->input->post('undertake_project'), 
				'geological_study'=>$this->input->post('geological_study'), 
				'EPCcontracts'=>$this->input->post('EPCcontracts'), 
				'machinery'=>$this->input->post('machinery'), 
				'transmission_cost'=>$this->input->post('transmission_cost'), 
				'financial_progress'=>$this->input->post('financial_progress'), 
				'purchase_agreement'=>$this->input->post('purchase_agreement'), 
				'statutory_clearances'=>$this->input->post('statutory_clearances'), 
				'land_acquisition'=>$this->input->post('land_acquisition'), 
				'earlier_loan'=>$this->input->post('earlier_loan'), 
				'mobilization'=>$this->input->post('mobilization'), 
				'relevent_document'=>$this->input->post('relevent_document'), 
				'environment_aspects'=>$this->input->post('environment_aspects'), 
				'socio_economic'=>$this->input->post('socio_economic'),
				'applicable_subsidy'=>$this->input->post('applicable_subsidy'), 
				'risk_management'=>$this->input->post('risk_management'),
			);
			$this->WM->update_ss_gn_4($ss_gen_4);
		}else {
			
		// time_schedule_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('time_schedule_file'))
	        { $error = array('error' => $this->upload->display_errors()); $time_schedule_file ='';}
	        else
	        {
	                $time_schedule_file_data = array('upload_data' => $this->upload->data());
					$time_schedule_file = $time_schedule_file_data['upload_data']['file_name'];
	        }
			
			//----------------------------------------------------
			
			// DetailedPro_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('DetailedPro_file'))
	        { $error = array('error' => $this->upload->display_errors()); $DetailedPro_file ='';}
	        else
	        {
	                $DetailedPro_file_data = array('upload_data' => $this->upload->data());
					$DetailedPro_file = $DetailedPro_file_data['upload_data']['file_name'];
	        }
			
			// promoter_company_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('promoter_company_file'))
	        { $error = array('error' => $this->upload->display_errors()); $promoter_company_file ='';}
	        else
	        {
	                $promoter_company_file_data = array('upload_data' => $this->upload->data());
					$promoter_company_file = $promoter_company_file_data['upload_data']['file_name'];
	        }
			
			// audited_balance_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('audited_balance_file'))
	        { $error = array('error' => $this->upload->display_errors()); $audited_balance_file ='';}
	        else
	        {
	                $audited_balance_file_data = array('upload_data' => $this->upload->data());
					$audited_balance_file = $audited_balance_file_data['upload_data']['file_name'];
	        }
			
			// project_allotment_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('project_allotment_file'))
	        { $error = array('error' => $this->upload->display_errors()); $project_allotment_file ='';}
	        else
	        {
	                $project_allotment_file_data = array('upload_data' => $this->upload->data());
					$project_allotment_file = $project_allotment_file_data['upload_data']['file_name'];
	        }
			
			// implementation_scheme_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('implementation_scheme_file'))
	        { $error = array('error' => $this->upload->display_errors()); $implementation_scheme_file ='';}
	        else
	        {
	                $implementation_scheme_file_data = array('upload_data' => $this->upload->data());
					$implementation_scheme_file = $implementation_scheme_file_data['upload_data']['file_name'];
	        }
			
			// undertake_project_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('undertake_project_file'))
	        { $error = array('error' => $this->upload->display_errors()); $undertake_project_file ='';}
	        else
	        {
	                $undertake_project_file_data = array('upload_data' => $this->upload->data());
					$undertake_project_file = $undertake_project_file_data['upload_data']['file_name'];
	        }
			
			// geological_study_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('geological_study_file'))
	        { $error = array('error' => $this->upload->display_errors()); $geological_study_file ='';}
	        else
	        {
	                $geological_study_file_data = array('upload_data' => $this->upload->data());
					$geological_study_file = $geological_study_file_data['upload_data']['file_name'];
	        }
			
			// EPCcontracts_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('EPCcontracts_file'))
	        { $error = array('error' => $this->upload->display_errors()); $EPCcontracts_file ='';}
	        else
	        {
	                $EPCcontracts_file_data = array('upload_data' => $this->upload->data());
					$EPCcontracts_file = $EPCcontracts_file_data['upload_data']['file_name'];
	        }
			
			// machinery_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('machinery_file'))
	        { $error = array('error' => $this->upload->display_errors()); $machinery_file ='';}
	        else
	        {
	                $machinery_file_data = array('upload_data' => $this->upload->data());
					$machinery_file = $machinery_file_data['upload_data']['file_name'];
	        }
			
			// transmission_cost_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('transmission_cost_file'))
	        { $error = array('error' => $this->upload->display_errors()); $transmission_cost_file ='';}
	        else
	        {
	                $transmission_cost_file_data = array('upload_data' => $this->upload->data());
					$transmission_cost_file = $transmission_cost_file_data['upload_data']['file_name'];
	        }
			
			// financial_progress_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('financial_progress_file'))
	        { $error = array('error' => $this->upload->display_errors()); $financial_progress_file ='';}
	        else
	        {
	                $financial_progress_file_data = array('upload_data' => $this->upload->data());
					$financial_progress_file = $financial_progress_file_data['upload_data']['file_name'];
	        }
			
			// purchase_agreement_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('purchase_agreement_file'))
	        { $error = array('error' => $this->upload->display_errors()); $purchase_agreement_file ='';}
	        else
	        {
	                $purchase_agreement_file_data = array('upload_data' => $this->upload->data());
					$purchase_agreement_file = $purchase_agreement_file_data['upload_data']['file_name'];
	        }
			
			// statutory_clearances_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('statutory_clearances_file'))
	        { $error = array('error' => $this->upload->display_errors()); $statutory_clearances_file ='';}
	        else
	        {
	                $statutory_clearances_file_data = array('upload_data' => $this->upload->data());
					$statutory_clearances_file = $statutory_clearances_file_data['upload_data']['file_name'];
	        }
			
			// land_acquisition_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('land_acquisition_file'))
	        { $error = array('error' => $this->upload->display_errors()); $land_acquisition_file ='';}
	        else
	        {
	                $land_acquisition_file_data = array('upload_data' => $this->upload->data());
					$land_acquisition_file = $land_acquisition_file_data['upload_data']['file_name'];
	        }
			
			// earlier_loan_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('earlier_loan_file'))
	        { $error = array('error' => $this->upload->display_errors()); $earlier_loan_file ='';}
	        else
	        {
	                $earlier_loan_file_data = array('upload_data' => $this->upload->data());
					$earlier_loan_file = $earlier_loan_file_data['upload_data']['file_name'];
	        }
			
			// mobilization_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('mobilization_file'))
	        { $error = array('error' => $this->upload->display_errors()); $mobilization_file ='';}
	        else
	        {
	                $mobilization_file_data = array('upload_data' => $this->upload->data());
					$mobilization_file = $mobilization_file_data['upload_data']['file_name'];
	        }
			
			// relevent_document_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('relevent_document_file'))
	        { $error = array('error' => $this->upload->display_errors()); $relevent_document_file ='';}
	        else
	        {
	                $relevent_document_file_data = array('upload_data' => $this->upload->data());
					$relevent_document_file = $relevent_document_file_data['upload_data']['file_name'];
	        }
			
			// environment_aspects_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('environment_aspects_file'))
	        { $error = array('error' => $this->upload->display_errors()); $environment_aspects_file ='';}
	        else
	        {
	                $environment_aspects_file_data = array('upload_data' => $this->upload->data());
					$environment_aspects_file = $environment_aspects_file_data['upload_data']['file_name'];
	        }
			
			// socio_economic_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('socio_economic_file'))
	        { $error = array('error' => $this->upload->display_errors()); $socio_economic_file ='';}
	        else
	        {
	                $socio_economic_file_data = array('upload_data' => $this->upload->data());
					$socio_economic_file = $socio_economic_file_data['upload_data']['file_name'];
	        }
			
			// applicable_subsidy_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('applicable_subsidy_file'))
	        { $error = array('error' => $this->upload->display_errors()); $applicable_subsidy_file ='';}
	        else
	        {
	                $applicable_subsidy_file_data = array('upload_data' => $this->upload->data());
					$applicable_subsidy_file = $applicable_subsidy_file_data['upload_data']['file_name'];
	        }
			
			// risk_management_file
		
			$config['upload_path']          = './uploads/forms/'; 
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('risk_management_file'))
	        { $error = array('error' => $this->upload->display_errors()); $risk_management_file ='';}
	        else
	        {
	                $risk_management_file_data = array('upload_data' => $this->upload->data());
					$risk_management_file = $risk_management_file_data['upload_data']['file_name'];
	        }
			
		$ss_gen_4 =array(
			'user_id'=>$this->session->userdata('user')['id'],
			'app_id'=>$this->session->userdata('app_id'),
			'form_id' => $this->session->userdata('form_id'),
			'contract_project1'=>$this->input->post('contract_project1'), 
			'contract_epc_route'=>$this->input->post('contract_epc_route'), 
			 
			'contract_non_epc_route'=>$this->input->post('contract_non_epc_route'), 
			
			'cost_overrun'=>$this->input->post('cost_overrun'), 
			'time_schedule'=>$this->input->post('time_schedule'), 
			'time_schedule_file' => $time_schedule_file,
			'om_contract'=>$this->input->post('om_contract'), 
			'DetailedPro'=>$this->input->post('DetailedPro'), 
			'promoter_company'=>$this->input->post('promoter_company'), 
			'audited_balance'=>$this->input->post('audited_balance'), 
			'project_allotment'=>$this->input->post('project_allotment'), 
			'implementation_scheme'=>$this->input->post('implementation_scheme'), 
			'undertake_project'=>$this->input->post('undertake_project'), 
			'geological_study'=>$this->input->post('geological_study'), 
			'EPCcontracts'=>$this->input->post('EPCcontracts'), 
			'machinery'=>$this->input->post('machinery'), 
			'transmission_cost'=>$this->input->post('transmission_cost'), 
			'financial_progress'=>$this->input->post('financial_progress'), 
			'purchase_agreement'=>$this->input->post('purchase_agreement'), 
			'statutory_clearances'=>$this->input->post('statutory_clearances'), 
			'land_acquisition'=>$this->input->post('land_acquisition'), 
			'earlier_loan'=>$this->input->post('earlier_loan'), 
			'mobilization'=>$this->input->post('mobilization'), 
			'relevent_document'=>$this->input->post('relevent_document'), 
			'environment_aspects'=>$this->input->post('environment_aspects'), 
			'socio_economic'=>$this->input->post('socio_economic'),
			'applicable_subsidy'=>$this->input->post('applicable_subsidy'), 
			'risk_management'=>$this->input->post('risk_management'),
			'DetailedPro_file' => $DetailedPro_file,
			'promoter_company_file' => $promoter_company_file,
			'audited_balance_file' => $audited_balance_file,
			'project_allotment_file' => $project_allotment_file,
			'implementation_scheme_file' => $implementation_scheme_file,
			'undertake_project_file' => $undertake_project_file,
			'geological_study_file' => $geological_study_file,
			'EPCcontracts_file' => $EPCcontracts_file,
			'machinery_file' => $machinery_file,
			'transmission_cost_file' => $transmission_cost_file,
			'financial_progress_file' => $financial_progress_file,
			'purchase_agreement_file' => $purchase_agreement_file,
			'statutory_clearances_file' => $statutory_clearances_file,
			'land_acquisition_file' => $land_acquisition_file,
			'earlier_loan_file' => $earlier_loan_file,
			'mobilization_file' => $mobilization_file,
			'relevent_document_file' => $relevent_document_file,
			'environment_aspects_file' => $environment_aspects_file,
			'socio_economic_file' => $socio_economic_file,
			'applicable_subsidy_file' => $applicable_subsidy_file,
			'risk_management_file' => $risk_management_file
			);
		
			$this->WM->insert_ss_gn4($ss_gen_4);
			
			$data = array(
                    'url' => "form1/index/ss_gn/step-5",
                );
                $this->db->where('user_id', $this->session->userdata('user')['id']);
                $this->db->where('form_id', $this->session->userdata('form_id'));
                $this->db->update('tbl_ss_generation_a', $data);
			
			}
		}
		redirect(base_url()."form1/index/ss_gn/step-5");
	
	}
	public function process_ss_generation_5()
	{
		$data = array(
			'place'=> $this->input->post('place'),
			'date' => $this->input->post('date'),
			'agree' => $this->input->post('agree')
		);
		$this->db->where("user_id", $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->update('tbl_ss_generation_4', $data);
		
		$this->db->select("url");
			$this->db->from('tbl_ss_generation_a');
			$this->db->where('user_id', $this->session->userdata('user')['id']);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			$data = $this->db->get()->row_array();
			if($data['url'])
			{
				$data = array(
					'url' => "",
				);
				$this->db->where('user_id', $this->session->userdata('user')['id']);
				$this->db->where("form_id", $this->session->userdata('form_id'));
				$this->db->update('tbl_ss_generation_a', $data);
			}
		
		$data['msg'] = '<div class="alert alert-success">Dear %s, <br />Your State Sector Generation form has been successfully submitted. Please wait while we review your form. <br><br> Sincerely, <br>RECL Team</div>';	
		
		$this->load->view("success", $data);
	}
	
}


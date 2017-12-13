<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form2 extends CI_Controller {

	function __construct() {
       parent::__construct();
	   $this->load->model('Welcome_model','WM');
       $this->load->library('form_validation');
	   $this->load->library('upload');
	   
	   $user_logged_in = $this->session->userdata('user');    
    	if (!$user_logged_in) {
			redirect(base_url());die;
		}
		
		$user_app_id = $this->session->userdata('app_id');    
    	if (!$user_app_id) {
			redirect(base_url());die;
		}
	   
	   }

	public function index()
	{
		// redirect if user not logged in
		$user_logged_in = $this->session->userdata('user');  
		$user_app_id = $this->session->userdata('app_id'); 
		
		
    	if (!$user_logged_in) {
			redirect(base_url());
		}
		
		$this->load->view('form2/index');
		
	}
	
	public function next_step(){
		$user_id = $this->session->userdata('user')['id'];
		$app_id = $this->session->userdata('app_id');
		$check_user = $this->WM->check_borrower_form($user_id);
			$data['details']=$this->WM->get_firststep($user_id);
			$data['detail_sec']=$this->WM->get_secondstep($user_id);
			$data['detail_sec_b']=$this->WM->get_secondstep_b($user_id);
			$data['detail_sec_mod']=$this->WM->get_secondstepmod($user_id);
			$data['detail_third']=$this->WM->get_thirdstep($user_id);
			$data['tabs'] = "step1";
			$this->load->view('form2/first-first-step',$data);
			
		
	}
	
	public function save_next_step(){
		extract($_POST);
		
		$user_id = $this->session->userdata('user')['id'];
		$app_id = $this->session->userdata('app_id');
		
			$new_id = substr($app_id,4,2);
		
		$check_user = $this->WM->check_borrower_form($user_id);
		
			$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
		$config = 	array(
							array(
									'field' => 'name_borrower',
									'label' => 'Name of the Borrower',
									'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),
								
							array(
									'field' => 'pan_borrower',
									'label' => 'PAN',
									'rules' => 'trim|required|max_length[10]|callback_pan1',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	
								
							array(
									'field' => 'date_incorporation',
									'label' => 'Date of Incorporation',
									'rules' => 'trim|required|max_length[10]|callback_SCOD',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	
								
							array(
									'field' => 'date_commencement_business',
									'label' => 'Date of commencement of Business',
									'rules' => 'trim|required|max_length[10]|callback_SCOD',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	

							array(
									'field' => 'clause_moa_auth',
									'label' => 'Clause in MOA authorizing setting up of power project',
									'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),		
								
							array(
									'field' => 'chkNamea',
									'label' => 'Clause in MOA authorizing setting up of power project',
									'rules' => 'trim|required|max_length[5]|alpha',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),
								
								
							array(
									'field' => 'nature_activity',
									'label' => 'Nature of activity & Constitution',
									'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	
							
							array(
									'field' => 'registered_office',
									'label' => 'Registered Office Address',
									'rules' => 'trim|required|max_length[70]|alpha_numeric_spaces',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),
							
							array(
									'field' => 'adrress_communication',
									'label' => 'Address for communication',
									'rules' => 'trim|required|max_length[70]|alpha_numeric_spaces',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),
								
							array(
									'field' => 'telephone',
									'label' => 'Telephone',
									'rules' => 'trim|required|max_length[12]|numeric',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
								),
					
							array(
									'field' => 'fax_No',
									'label' => 'Fax No.',
									'rules' => 'trim|required|max_length[10]|numeric',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
								),
										
						);
						
		$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE)
			{
		
		if($check_user){
			
			// Pan Attach 	
			if(!empty($_FILES['pan_borrower_attach']['name'])){
			$path = getcwd().'/uploads/form2/';
		    if(!is_dir($path)) //create the folder if it's not already exists
		    {
		      mkdir($path,0777,TRUE);
		    }
		    $config['upload_path'] = $path;
		    $config['allowed_types']        = '*';
		    $config['max_size'] = '0';
		    $config['encrypt_name']  = TRUE;
		    $this->load->library('upload');
		    $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('pan_borrower_attach'))
	                { $error = array('error' => $this->upload->display_errors()); }
	            else
	            {
				$data = array('upload_data' => $this->upload->data());
			    $upload_data = $this->upload->data();
				$pan_borrower_attach=$upload_data['file_name'];
				
				$state_sector_b = array(
						'user_id'=>$user_id,
						'pan_borrower_attach' => $pan_borrower_attach
					);
					
					$this->WM->update_ea_section_a_file($state_sector_b, 'pan_borrower_attach');
					
					
				}
		   }
			
			// Date Incorporation Attach
			
			if(!empty($_FILES['date_incorporation_attach']['name'])){
			$path = getcwd().'/uploads/form2/';
		    if(!is_dir($path)) //create the folder if it's not already exists
		    {
		      mkdir($path,0777,TRUE);
		    }
		    $config['upload_path'] = $path;
		    $config['allowed_types']        = '*';
		    $config['max_size'] = '0';
		    $config['encrypt_name']  = TRUE;
		    $this->load->library('upload');
		    $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('date_incorporation_attach'))
	                { $error = array('error' => $this->upload->display_errors()); }
	            else
	            {
				$data = array('upload_data' => $this->upload->data());
			    $upload_data = $this->upload->data();
				$date_incorporation_attach = $upload_data['file_name'];
				
					$state_sector_b = array(
						'user_id'=>$user_id,
						'date_incorporation_attach' => $date_incorporation_attach
					);
					
					$this->WM->update_ea_section_a_file($state_sector_b, 'date_incorporation_attach');
					
				}
		   }
			
			//Date_commencement_business_attach 
			
			if(!empty($_FILES['date_commencement_business_attach']['name'])){
			$path = getcwd().'/uploads/form2/';
		    if(!is_dir($path)) //create the folder if it's not already exists
		    {
		      mkdir($path,0777,TRUE);
		    }
		    $config['upload_path'] = $path;
		    $config['allowed_types']        = '*';
		    $config['max_size'] = '0';
		    $config['encrypt_name']  = TRUE;
		    $this->load->library('upload');
		    $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('date_commencement_business_attach'))
	                { $error = array('error' => $this->upload->display_errors()); }
	            else
	            {
				$data = array('upload_data' => $this->upload->data());
			    $upload_data = $this->upload->data();
				$fileDatebusiness=$upload_data['file_name'];
				
					$state_sector_b = array(
						'user_id'=>$user_id,
						'date_commencement_business_attach' => $fileDatebusiness
					);
					
					$this->WM->update_ea_section_a_file($state_sector_b, 'date_commencement_business_attach');
					
				}
		   }
			
			// Clause MOA Auth Attach
			
			if(!empty($_FILES['clause_moa_auth_attach']['name'])){
			$path = getcwd().'/uploads/form2/';
		    if(!is_dir($path)) //create the folder if it's not already exists
		    {
		      mkdir($path,0777,TRUE);
		    }
		    $config['upload_path'] = $path;
		    $config['allowed_types']        = '*';
		    $config['max_size'] = '0';
		    $config['encrypt_name']  = TRUE;
		    $this->load->library('upload');
		    $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('clause_moa_auth_attach'))
	                { $error = array('error' => $this->upload->display_errors()); }
	            else
	            {
				$data = array('upload_data' => $this->upload->data());
			    $upload_data = $this->upload->data();
				$fileclauseMoa=$upload_data['file_name'];
				
					$state_sector_b = array(
						'user_id'=>$user_id,
						'clause_moa_auth_attach' => $fileclauseMoa
					);
					
					$this->WM->update_ea_section_a_file($state_sector_b, 'clause_moa_auth_attach');
					
					
				}
		   }
			if($chkNamea== "no" ){
				$state_sector_b = array(
						'user_id'=>$user_id,
						'chkNnameatext' => ''
						);
						
						$this->WM->update_ea_section_a_file($state_sector_b, 'chkNnameatext');
			}else{
			if(!empty($_FILES['chkNnameatext']['name'])){
			$path = getcwd().'/uploads/form2/';
		    if(!is_dir($path)) //create the folder if it's not already exists
		    {
		      mkdir($path,0777,TRUE);
		    }
		    $config['upload_path'] = $path;
		    $config['allowed_types']        = '*';
		    $config['max_size'] = '0';
		    $config['encrypt_name']  = TRUE;
		    $this->load->library('upload');
		    $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('chkNnameatext'))
	                { $error = array('error' => $this->upload->display_errors()); 
	                	$state_sector_b = array(
						'user_id'=>$user_id,
						'chkNnameatext' => ''
						);
						
						$this->WM->update_ea_section_a_file($state_sector_b, 'chkNnameatext');
					}
	            else
	            {
				$data = array('upload_data' => $this->upload->data());
			    $upload_data = $this->upload->data();
				$filechkNnameatext=$upload_data['file_name'];
					
					$state_sector_b = array(
						'user_id'=>$user_id,
						'chkNnameatext' => $filechkNnameatext
					);
					
					$this->WM->update_ea_section_a_file($state_sector_b, 'chkNnameatext');
					
				}
		   }
		}
			
			
			if(is_array($this->session->userdata('app_id'))){
				$app_id = $this->session->userdata('app_id')['app_id'];
			}else{
				$app_id = $this->session->userdata('app_id');
			}
			
			$ea_section_a = array(
							'user_id'							=>$user_id,
							'app_id'							=>$app_id,
							'form_id'							=>$this->session->userdata('form_id'),
							'name_borrower'						=>$name_borrower,
							'pan_borrower'						=>$pan_borrower,
							'date_incorporation'				=>$date_incorporation,
							'date_commencement_business'		=>$date_commencement_business,
							'clause_moa_auth'					=>$clause_moa_auth,
							'chkNamea'							=>$chkNamea,
							'nature_activity'					=>$nature_activity,
							'registered_office'					=>$registered_office,
							'adrress_communication'				=>$adrress_communication,
							'telephone'							=>$telephone,
							'fax_No'							=>$fax_No
			);
			
				$this->WM->update_ea_section_a($ea_section_a);
			
		}else{
			
			// Pan Attach 	
			if(!empty($_FILES['pan_borrower_attach']['name'])){
			$path = getcwd().'/uploads/form2/';
		    if(!is_dir($path)) //create the folder if it's not already exists
		    {
		      mkdir($path,0777,TRUE);
		    }
		    $config['upload_path'] = $path;
		    $config['allowed_types']        = '*';
		    $config['max_size'] = '0';
		    $config['encrypt_name']  = TRUE;
		    $this->load->library('upload');
		    $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('pan_borrower_attach'))
	                { $error = array('error' => $this->upload->display_errors()); }
	            else
	            {
				$data = array('upload_data' => $this->upload->data());
			    $upload_data = $this->upload->data();
				$filePan=$upload_data['file_name'];
				}
		   }else{
		   		$filePan='';
		   }
			
			// Date Incorporation Attach
			
			if(!empty($_FILES['date_incorporation_attach']['name'])){
			$path = getcwd().'/uploads/form2/';
		    if(!is_dir($path)) //create the folder if it's not already exists
		    {
		      mkdir($path,0777,TRUE);
		    }
		    $config['upload_path'] = $path;
		    $config['allowed_types'] = '*';
		    $config['max_size'] = '0';
		    $config['encrypt_name']  = TRUE;
		    $this->load->library('upload');
		    $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('date_incorporation_attach'))
	                { $error = array('error' => $this->upload->display_errors()); }
	            else
	            {
				$data = array('upload_data' => $this->upload->data());
			    $upload_data = $this->upload->data();
				$fileDateIncor=$upload_data['file_name'];
				}
		   }else{
		   		$fileDateIncor='';
		   }
			
			//Date_commencement_business_attach 
			
			if(!empty($_FILES['date_commencement_business_attach']['name'])){
			$path = getcwd().'/uploads/form2/';
		    if(!is_dir($path)) //create the folder if it's not already exists
		    {
		      mkdir($path,0777,TRUE);
		    }
		    $config['upload_path'] = $path;
		    $config['allowed_types'] = '*';
		    $config['max_size'] = '0';
		    $config['encrypt_name']  = TRUE;
		    $this->load->library('upload');
		    $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('date_commencement_business_attach'))
	                { $error = array('error' => $this->upload->display_errors()); }
	            else
	            {
				$data = array('upload_data' => $this->upload->data());
			    $upload_data = $this->upload->data();
				$fileDatebusiness=$upload_data['file_name'];
				}
		   }else{
		   		$fileDatebusiness='';
		   }
			
			// Clause MOA Auth Attach
			
			if($chkNamea == "no"){
				$fileclauseMoa='';
			}else{
				if(!empty($_FILES['clause_moa_auth_attach']['name'])){
				$path = getcwd().'/uploads/form2/';
				if(!is_dir($path)) //create the folder if it's not already exists
				{
				  mkdir($path,0777,TRUE);
				}
				$config['upload_path'] = $path;
				$config['allowed_types']        = '*';
				$config['max_size'] = '0';
				$config['encrypt_name']  = TRUE;
				$this->load->library('upload');
				$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('clause_moa_auth_attach'))
						{ $error = array('error' => $this->upload->display_errors()); }
					else
					{
					$data = array('upload_data' => $this->upload->data());
					$upload_data = $this->upload->data();
					$fileclauseMoa=$upload_data['file_name'];
					}
				   }else{
						$fileclauseMoa='';
				   }
			}
			
			if(!empty($_FILES['chkNnameatext']['name'])){
			$path = getcwd().'/uploads/form2/';
		    if(!is_dir($path)) //create the folder if it's not already exists
		    {
		      mkdir($path,0777,TRUE);
		    }
		    $config['upload_path'] = $path;
		    $config['allowed_types']        = '*';
		    $config['max_size'] = '0';
		    $config['encrypt_name']  = TRUE;
		    $this->load->library('upload');
		    $this->upload->initialize($config);
				if ( ! $this->upload->do_upload('chkNnameatext'))
	                { $error = array('error' => $this->upload->display_errors()); }
	            else
	            {
				$data = array('upload_data' => $this->upload->data());
			    $upload_data = $this->upload->data();
				$filechkNnameatext=$upload_data['file_name'];
				}
		   }else{
		   		$filechkNnameatext='';
		   }
			
			$ea_section_a = array(
							'date_time'							=>date('Y-m-d H:i:s'),
							'app_id'=>$this->session->userdata('app_id'),
							'form_id'=>$this->session->userdata('form_id'),
							'user_id'							=>$user_id,
							'name_borrower'						=>$name_borrower,
							'pan_borrower'						=>$pan_borrower,
							'date_incorporation'				=>$date_incorporation,
							'date_commencement_business'		=>$date_commencement_business,
							'clause_moa_auth'					=>$clause_moa_auth,
							'chkNamea'							=>$chkNamea,
							'chkNnameatext'						=>$filechkNnameatext,
							'nature_activity'					=>$nature_activity,
							'registered_office'					=>$registered_office,
							'adrress_communication'				=>$adrress_communication,
							'telephone'							=>$telephone,
							'fax_No'							=>$fax_No,
							'pan_borrower_attach'				=>$filePan,
							'date_incorporation_attach'			=>$fileDateIncor,
							'date_commencement_business_attach'	=>$fileDatebusiness,
							'clause_moa_auth_attach'			=>$fileclauseMoa
			);
				$this->WM->insert_ea_section_a($ea_section_a);
				
				 if($new_id == 'GN'){
			   $data = array(
						'url' => "form2/next_step/section_a/step2",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_generation_a', $data);
		   }if($new_id == 'RN'){
			    $data = array(
                    'url' => "form2/next_step/section_a/step2",
                );
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
		   }
		   
		}
			redirect(base_url().'form2/next_step/section_a/step2');
		
			}else{
			//$error = array('project_name' => form_error('project_name'));
			$error = $this->form_validation->error_array();
			$this->session->set_flashdata('step1', $error);
			redirect(base_url()."form2/next_step/section_a/step1");
		}
	}
	
	public function save_second_step(){
		//pr($_POST);
	
		$user_id = $this->session->userdata('user')['id'];
		$app_id = $this->session->userdata('app_id');
		$check_user = $this->WM->check_ea_section_b($user_id);
		$new_id = substr($app_id,4,2);
		
		$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
		$config = 	array(
							array(
									'field' => 'chkPrevious',
									'label' => 'Any  relationship with REC',
									'rules' => 'trim|required|max_length[50]|alpha',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),
								
							array(
									'field' => 'project_name',
									'label' => 'Name of Project',
									'rules' => 'trim|max_length[50]|alpha_numeric_spaces',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	
								
							array(
									'field' => 'project_type',
									'label' => 'Type of Project',
									'rules' => 'trim|max_length[50]|alpha_numeric_spaces',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	
								
							array(
									'field' => 'sanction_date',
									'label' => 'Date of sanction',
									'rules' => 'trim|max_length[10]|callback_SCOD2',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	

							array(
									'field' => 'amount_rs',
									'label' => 'Amount',
									'rules' => 'trim|max_length[10]|numeric',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),		
								
							array(
									'field' => 'loan_amnt',
									'label' => 'Loan amount outstanding',
									'rules' => 'trim|max_length[10]|numeric',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	
								
						array(
									'field' => 'fullName[]',
									'label' => 'Full Name',
									'rules' => 'trim|max_length[50]|alpha_numeric_spaces',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	
							
							array(
									'field' => 'birthDate[]',
									'label' => 'Date of Birth',
									'rules' => 'trim|max_length[10]|callback_SCOD',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	
							
							array(
									'field' => 'age[]',
									'label' => 'Age',
									'rules' => 'trim|max_length[3]|numeric',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),
								
							array(
									'field' => 'address[]',
									'label' => 'Address',
									'rules' => 'trim|max_length[70]|alpha_numeric_spaces',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	
					
							array(
									'field' => 'qualification[]',
									'label' => 'Qualification',
									'rules' => 'trim|max_length[50]|alpha_numeric_spaces',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	
								
							array(
									'field' => 'pannumber[]',
									'label' => 'PAN Number',
									'rules' => 'trim|max_length[50]|alpha_numeric_spaces',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	
								
							array(
									'field' => 'din_number[]',
									'label' => 'DIN Number',
									'rules' => 'trim|max_length[50]|alpha_numeric_spaces',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	

								array(
									'field' => 'experience_power[]',
									'label' => 'Experience in power and other sectors',
									'rules' => 'trim|max_length[50]|alpha_numeric_spaces',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),		
									
								array(
									'field' => 'nature[]',
									'label' => 'Nature',
									'rules' => 'trim|max_length[70]|alpha_numeric_spaces',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),		
									
								array(
									'field' => 'shareHolding[]',
									'label' => 'Shareholding in the Company (%)',
									'rules' => 'trim|max_length[3]|numeric',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	

								array(
									'field' => 'name_of_company[]',
									'label' => 'Name of other Companies in which acting as Director',
									'rules' => 'trim|max_length[70]|alpha_numeric_spaces',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),

								array(
									'field' => 'chkHold',
									'label' => 'Any  relationship with REC',
									'rules' => 'trim|required|max_length[5]|alpha',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	

								array(
									'field' => 'project_name_directors[]',
									'label' => 'Name of Project',
									'rules' => 'trim|max_length[50]|alpha_numeric_spaces',
									'errors' => array(
											
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	
								
								array(
									'field' => 'project_type_directors[]',
									'label' => 'Type of Project',
									'rules' => 'trim|max_length[50]|alpha_numeric_spaces',
									'errors' => array(
											
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),
								
								
								array(
									'field' => 'date_sanction_directors[]',
									'label' => 'Date of sanction',
									'rules' => 'trim|max_length[10]|callback_SCOD3',
									'errors' => array(
											
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),
								
								array(
									'field' => 'amount_rs_directors[]',
									'label' => 'Amount',
									'rules' => 'trim|max_length[10]|numeric',
									'errors' => array(
											
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),	
								
								array(
									'field' => 'loan_amount_directors[]',
									'label' => 'Loan amount outstanding ',
									'rules' => 'trim|max_length[10]|numeric',
									'errors' => array(
											
											'max_length'     => '{field} must have at least {param} characters.',
										)
							    ),
						 );
						
		$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE)
			{
		
		if($check_user){
			
			$ea_sec_b=array(
				'chkPrevious'=>$this->input->post('chkPrevious'),
				'app_id'=>$this->session->userdata('app_id'),
				'form_id'=>$this->session->userdata('form_id'),
				'project_name'=>$this->input->post('project_name'),
				'project_type'=>$this->input->post('project_type'),
				'sanction_date'=>$this->input->post('sanction_date'),
				'amount_rs'=>$this->input->post('amount_rs'),
				'loan_amnt'=>$this->input->post('loan_amnt'),
				'chkHold'=>$this->input->post('chkHold'),
				
				'user_id'=>$user_id,
				'datetime'=>date('Y-m-d H:i:s')
			);
			
			$this->WM->update_ea_section_b($ea_sec_b);
			
			if ($this->input->post('chkHold') == "Yes") { 
				if(!empty($this->input->post('project_name_directors'))){
					for($i=0; $i<sizeof($this->input->post('project_name_directors')); $i++){
						  
						$es_sec_c[] = array(
							'user_id'=>$user_id,
							'app_id'=>$this->session->userdata('app_id'), 
							'form_id'=>$this->session->userdata('form_id'),
							'project_name_directors'=>$this->input->post('project_name_directors')[$i],
							'project_type_directors'=>$this->input->post('project_type_directors')[$i],
							'date_sanction_directors'=>$this->input->post('date_sanction_directors')[$i],
							'amount_rs_directors'=>$this->input->post('amount_rs_directors')[$i],
							'loan_amount_directors'=>$this->input->post('loan_amount_directors')[$i]
						);
					}
						$this->WM->insert_ea_section_c($es_sec_c); 
				}
			}else{
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id', $this->session->userdata('app_id'));
					$this->db->delete("tbl_ea_section_b_c");
				}
			
				
			
			//second stetp details of directors 
			 
					
			for($i=min(array_keys($this->input->post('fullName'))); $i<sizeof($this->input->post('fullName')); $i++){
				
				$config['upload_path']          = './uploads/form2/'; $config['allowed_types']        = '*';
				$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
                
				$j=$i;
			        
                   $this->upload->initialize($config);
					
					
					// upload birthdatefile
					if(!empty($_FILES['birthdatefile'.$j]['name'])){
	                    if ( ! $this->upload->do_upload('birthdatefile'.$j))
	                    { $error = array('error' => $this->upload->display_errors()); $birthdatefile = '';}
	                    else
	                    {
	                            $birthdatefile_data = array('upload_data' => $this->upload->data());
	                            $birthdatefile = $birthdatefile_data['upload_data']['file_name'];
	                    }
					 
					}else{
						
						if(empty($this->input->post('birthdatefiles'.$j))){
							$birthdatefile = "";
						}else{
							$birthdatefile = $this->input->post('birthdatefiles'.$j);
						}
					}
					
					// upload addressfile
					if(!empty($_FILES['addressfile'.$j]['name'])){
					$this->upload->initialize($config);
	                    if ( ! $this->upload->do_upload('addressfile'.$j))
	                    { $error = array('error' => $this->upload->display_errors()); $addressfile = '';}
	                    else
	                    {
	                            $addressfile_data = array('upload_data' => $this->upload->data());
	                            $addressfile = $addressfile_data['upload_data']['file_name'];
	                    }
					}else{
						if(empty($this->input->post('addressfiles'.$j))){
							$addressfile = "";
						}else{
							$addressfile = $this->input->post('addressfiles'.$j);
						}
					} 
                    
					
					// upload pan_numberfile
					if(!empty($_FILES['pan_numberfile'.$j]['name'])){
						$this->upload->initialize($config);
	                    if ( ! $this->upload->do_upload('pan_numberfile'.$j))
	                    { $error = array('error' => $this->upload->display_errors()); $pan_numberfile = '';}
	                    else
	                    {
	                            $pan_numberfile_data = array('upload_data' => $this->upload->data());
	                            $pan_numberfile = $pan_numberfile_data['upload_data']['file_name'];
	                    }
					}else{
						if(empty($this->input->post('pan_numberfiles'.$j))){
							$pan_numberfile = "";
						}else{
							$pan_numberfile = $this->input->post('pan_numberfiles'.$j);
						}
					}
					 
                    unset($config);
					
				$senc_data[] = array(
                    'user_id'=>$user_id,
                    'app_id'=>$this->session->userdata('app_id'),
					'form_id'=>$this->session->userdata('form_id'),
                    'fullName'=>$this->input->post('fullName')[$i],
                    'birthDate'=>$this->input->post('birthDate')[$i],
                    'age'=>$this->input->post('age')[$i],
                    'address'=>$this->input->post('address')[$i],
                    'qualification'=>$this->input->post('qualification')[$i],
                    'pannumber'=>$this->input->post('pannumber')[$i],
                    'din_number'=>$this->input->post('din_number')[$i],
                    'experience_power'=>$this->input->post('experience_power')[$i],
                    'nature'=>$this->input->post('nature')[$i],
                    'shareHolding'=>$this->input->post('shareHolding')[$i],
                    'name_of_company'=>$this->input->post('name_of_company')[$i],
                    'birthdatefile' => $birthdatefile,
					'addressfile' => $addressfile,
					'pan_numberfile' => $pan_numberfile
                );
				
				
            }
         	 
            // inserting 
     		if($senc_data){
            	$this->WM->insert_ea_form_2($senc_data);
			}	
      		
		}else{
			
			$ea_sec_b=array(
				'chkPrevious'=>$this->input->post('chkPrevious'),
				'app_id'=>$this->session->userdata('app_id'),
				'form_id'=>$this->session->userdata('form_id'),
				'project_name'=>$this->input->post('project_name'),
				'project_type'=>$this->input->post('project_type'),
				'sanction_date'=>$this->input->post('sanction_date'),
				'amount_rs'=>$this->input->post('amount_rs'),
				'loan_amnt'=>$this->input->post('loan_amnt'),
				'chkHold'=>$this->input->post('chkHold'),
				'user_id'=>$user_id,
				'datetime'=>date('Y-m-d H:i:s')
			);
			
			$this->WM->insert_ea_section_b($ea_sec_b);
			
			if ($this->input->post('chkHold') == "Yes") { 
				if(!empty($this->input->post('project_name_directors'))){
					for($i=0; $i<sizeof($this->input->post('project_name_directors')); $i++){
						  
						$es_sec_c[] = array(
							'user_id'=>$user_id,
							'app_id'=>$this->session->userdata('app_id'), 
							'form_id'=>$this->session->userdata('form_id'),
							'project_name_directors'=>$this->input->post('project_name_directors')[$i],
							'project_type_directors'=>$this->input->post('project_type_directors')[$i],
							'date_sanction_directors'=>$this->input->post('date_sanction_directors')[$i],
							'amount_rs_directors'=>$this->input->post('amount_rs_directors')[$i],
							'loan_amount_directors'=>$this->input->post('loan_amount_directors')[$i]
						);
					}
						$this->WM->insert_ea_section_c($es_sec_c); 
				}
			}
			
			
			//second stetp details of directors 
			
			$config['upload_path']          = './uploads/form2/'; $config['allowed_types']        = '*';
            $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
		if(!empty($this->input->post('fullName'))){
			for($i=0; $i<sizeof($this->input->post('fullName')); $i++){
                  
				$j=$i;
                $this->upload->initialize($config);
					// upload birthdatefile
                    if ( !empty($_FILE['birthdatefile'.$j]['name'])){
	                    if ( ! $this->upload->do_upload('birthdatefile'.$j))
	                    { $error = array('error' => $this->upload->display_errors()); $birthdatefile = '';}
	                    else
	                    {
	                            $birthdatefile_data = array('upload_data' => $this->upload->data());
	                            $birthdatefile = $birthdatefile_data['upload_data']['file_name'];
	                    }
					}else{
						$birthdatefile = '';
					}
                   
					// upload addressfile
					$this->upload->initialize($config);
					if ( !empty($_FILE['addressfile'.$j]['name'])){
	                    if ( ! $this->upload->do_upload('addressfile'.$j))
	                    { $error = array('error' => $this->upload->display_errors()); $addressfile = '';}
	                    else
	                    {
	                            $addressfile_data = array('upload_data' => $this->upload->data());
	                            $addressfile = $addressfile_data['upload_data']['file_name'];
	                    }
					}else{
						$addressfile = '';
					}	
				 
                   $this->upload->initialize($config);
					
					// upload pan_numberfile
					 if ( !empty($_FILE['pan_numberfile'.$j]['name'])){
	                    if ( ! $this->upload->do_upload('pan_numberfile'.$j))
	                    { $error = array('error' => $this->upload->display_errors()); $pan_numberfile = '';}
	                    else
	                    {
	                            $pan_numberfile_data = array('upload_data' => $this->upload->data());
	                            $pan_numberfile = $pan_numberfile_data['upload_data']['file_name'];
	                    }
						
					 }else{
						$pan_numberfile = '';
					}	
                    unset($config);
					
				$senc_data[] = array(
                    'user_id'=>$user_id,
                    'app_id'=>$this->session->userdata('app_id'),
					'form_id'=>$this->session->userdata('form_id'),
                    'fullName'=>$this->input->post('fullName')[$i],
                    'birthDate'=>$this->input->post('birthDate')[$i],
                    'age'=>$this->input->post('age')[$i],
                    'address'=>$this->input->post('address')[$i],
                    'qualification'=>$this->input->post('qualification')[$i],
                    'pannumber'=>$this->input->post('pannumber')[$i],
                    'din_number'=>$this->input->post('din_number')[$i],
                    'experience_power'=>$this->input->post('experience_power')[$i],
                    'nature'=>$this->input->post('nature')[$i],
                    'shareHolding'=>$this->input->post('shareHolding')[$i],
                    'name_of_company'=>$this->input->post('name_of_company')[$i],
                    'birthdatefile' => $birthdatefile,
					'addressfile' => $addressfile,
					'pan_numberfile' => $pan_numberfile
                );
				
				
            }
         
            	$this->WM->insert_ea_form_2($senc_data);
		}
			
           if($new_id == 'GN'){
			   $data = array(
						'url' => "form2/next_step/section_a/step3",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_generation_a', $data);
		   }if($new_id == 'RN'){
			    $data = array(
                    'url' => "form2/next_step/section_a/step3",
                );
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
		   }
		}
 
		redirect(base_url().'form2/next_step/section_a/step3');
		}else{
			//$error = array('project_name' => form_error('project_name'));
			$error = $this->form_validation->error_array();
			$this->session->set_flashdata('step2', $error);
			redirect(base_url()."form2/next_step/section_a/step2");
		}
	}
		
	public function save_third_step(){
			
			$user_id = $this->session->userdata('user')['id'];
			$app_id = $this->session->userdata('app_id');
			$new_id = substr($app_id,4,2);
			//check user exists
			$chk_user = $this->WM->check_ea_section_c($user_id);
			
			$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
			$config = 	array(
						array(
								'field' => 'cost_comp_with_cerc',
								'label' => 'Cost Comparison with CERC/SERC Bench marking',
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
					
				//	echo "hello"; die;
					
			
					}else{
						
					//$error = array('project_name' => form_error('project_name'));
					$error = $this->form_validation->error_array();
					$this->session->set_flashdata('step3', $error);
					redirect(base_url()."form2/next_step/section_a/step3");
				}			

			
			if($chk_user){
				
			$config['upload_path']          = './uploads/form2/'; $config['allowed_types']        = '*';
            $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
			
			
			// upload dtl_brig_fin_loan
            if ( ! $this->upload->do_upload('dtl_brig_fin_loan'))
            { $error = array('error' => $this->upload->display_errors()); $dtl_brig_fin_loan = '';}
            else
            {
                    $dtl_brig_fin_loan_data = array('upload_data' => $this->upload->data());
                   	$dtl_brig_fin_loan = $dtl_brig_fin_loan_data['upload_data']['file_name'];
					
					$state_sector_b = array(
						'user_id'=>$user_id,
						'dtl_brig_fin_loan' => $dtl_brig_fin_loan
					);
					
					$this->WM->update_ea_section_c_file($state_sector_b, 'dtl_brig_fin_loan');
					
            }

           
			// upload dtl_funds_drawl_frm_bank
            if ( ! $this->upload->do_upload('dtl_funds_drawl_frm_bank'))
            { $error = array('error' => $this->upload->display_errors()); $dtl_funds_drawl_frm_bank = '';}
            else
            {
                    $dtl_funds_drawl_frm_bank_data = array('upload_data' => $this->upload->data());
                   	$dtl_funds_drawl_frm_bank = $dtl_funds_drawl_frm_bank_data['upload_data']['file_name'];
					
					$state_sector_b = array(
						'user_id'=>$user_id,
						'dtl_funds_drawl_frm_bank' => $dtl_funds_drawl_frm_bank
					);
					
					$this->WM->update_ea_section_c_file($state_sector_b, 'dtl_funds_drawl_frm_bank');
            }

          
			// upload copy_board_resolution
            if ( ! $this->upload->do_upload('copy_board_resolution'))
            { $error = array('error' => $this->upload->display_errors()); $copy_board_resolution = '';}
            else
            {
                    $copy_board_resolution_data = array('upload_data' => $this->upload->data());
                   	$copy_board_resolution = $copy_board_resolution_data['upload_data']['file_name'];
					
					$state_sector_b = array(
						'user_id'=>$user_id,
						'copy_board_resolution' => $copy_board_resolution
					);
					
					$this->WM->update_ea_section_c_file($state_sector_b, 'copy_board_resolution');
            }

         
			// upload comp_shall_idntfy
            if ( ! $this->upload->do_upload('comp_shall_idntfy'))
            { $error = array('error' => $this->upload->display_errors()); $comp_shall_idntfy = '';}
            else
            {
                    $comp_shall_idntfy_data = array('upload_data' => $this->upload->data());
                   	$comp_shall_idntfy = $comp_shall_idntfy_data['upload_data']['file_name'];
					
					$state_sector_b = array(
						'user_id'=>$user_id,
						'comp_shall_idntfy' => $comp_shall_idntfy
					);
					
					$this->WM->update_ea_section_c_file($state_sector_b, 'comp_shall_idntfy');
            }
 
			
			// upload statutory_audit_certfct
            if ( ! $this->upload->do_upload('statutory_audit_certfct'))
            { $error = array('error' => $this->upload->display_errors()); $statutory_audit_certfct = '';}
            else
            {
                    $statutory_audit_certfct_data = array('upload_data' => $this->upload->data());
                   	$statutory_audit_certfct = $statutory_audit_certfct_data['upload_data']['file_name'];
					
					$state_sector_b = array(
						'user_id'=>$user_id,
						'statutory_audit_certfct' => $statutory_audit_certfct
					);
					
					$this->WM->update_ea_section_c_file($state_sector_b, 'statutory_audit_certfct');
            }
 
			
			// upload copy_board_resolution
            if ( ! $this->upload->do_upload('copy_board_resolution'))
            { $error = array('error' => $this->upload->display_errors()); $copy_board_resolution = '';}
            else
            {
                    $copy_board_resolution_data = array('upload_data' => $this->upload->data());
                   	$copy_board_resolution = $copy_board_resolution_data['upload_data']['file_name'];
					
					$state_sector_b = array(
						'user_id'=>$user_id,
						'copy_board_resolution' => $copy_board_resolution
					);
					
					$this->WM->update_ea_section_c_file($state_sector_b, 'copy_board_resolution');
            }

            
			
			$sec_c = array(
				
				'cost_comp_with_cerc' => $this->input->post('cost_comp_with_cerc'),
			);
				
			// update 
			$this->db->where('user_id', $this->session->userdata('user')['id']);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			$this->db->where('app_id', $this->session->userdata('app_id'));
			$this->db->update('tbl_ea_section_c', $sec_c);
			
			}else{
				
			
			$config['upload_path']          = './uploads/form2/'; $config['allowed_types']        = '*';
            $config['max_width'] = 0; $config['max_height'] = 0; $config['max_size'] = 0; $config['encrypt_name'] = TRUE;
            
            $this->upload->initialize($config);
			
			// upload dtl_brig_fin_loan
            if ( ! $this->upload->do_upload('dtl_brig_fin_loan'))
            { $error = array('error' => $this->upload->display_errors()); $dtl_brig_fin_loan = '';}
            else
            {
                    $dtl_brig_fin_loan_data = array('upload_data' => $this->upload->data());
                   	$dtl_brig_fin_loan = $dtl_brig_fin_loan_data['upload_data']['file_name'];
            }

          
			
			// upload dtl_funds_drawl_frm_bank
            if ( ! $this->upload->do_upload('dtl_funds_drawl_frm_bank'))
            { $error = array('error' => $this->upload->display_errors()); $dtl_funds_drawl_frm_bank = '';}
            else
            {
                    $dtl_funds_drawl_frm_bank_data = array('upload_data' => $this->upload->data());
                   	$dtl_funds_drawl_frm_bank = $dtl_funds_drawl_frm_bank_data['upload_data']['file_name'];
            }

            
			
			// upload copy_board_resolution
            if ( ! $this->upload->do_upload('copy_board_resolution'))
            { $error = array('error' => $this->upload->display_errors()); $copy_board_resolution = '';}
            else
            {
                    $copy_board_resolution_data = array('upload_data' => $this->upload->data());
                   	$copy_board_resolution = $copy_board_resolution_data['upload_data']['file_name'];
            }
			
			// upload comp_shall_idntfy
            if ( ! $this->upload->do_upload('comp_shall_idntfy'))
            { $error = array('error' => $this->upload->display_errors()); $comp_shall_idntfy = '';}
            else
            {
                    $comp_shall_idntfy_data = array('upload_data' => $this->upload->data());
                   	$comp_shall_idntfy = $comp_shall_idntfy_data['upload_data']['file_name'];
            }

             
			
			// upload statutory_audit_certfct
            if ( ! $this->upload->do_upload('statutory_audit_certfct'))
            { $error = array('error' => $this->upload->display_errors()); $statutory_audit_certfct = '';}
            else
            {
                    $statutory_audit_certfct_data = array('upload_data' => $this->upload->data());
                   	$statutory_audit_certfct = $statutory_audit_certfct_data['upload_data']['file_name'];
            }

           
			
			// upload copy_board_resolution
            if ( ! $this->upload->do_upload('copy_board_resolution'))
            { $error = array('error' => $this->upload->display_errors()); $copy_board_resolution = '';}
            else
            {
                    $copy_board_resolution_data = array('upload_data' => $this->upload->data());
                   	$copy_board_resolution = $copy_board_resolution_data['upload_data']['file_name'];
            }

            
			
			$sec_c = array(
				'user_id' => $user_id,
				'app_id'=>$this->session->userdata('app_id'),
				'form_id'=>$this->session->userdata('form_id'),
				'cost_comp_with_cerc' => $this->input->post('cost_comp_with_cerc'),
				'dtl_brig_fin_loan' => $dtl_brig_fin_loan,
				'dtl_funds_drawl_frm_bank' => $dtl_funds_drawl_frm_bank,
				'copy_board_resolution' => $copy_board_resolution,
				'comp_shall_idntfy' => $comp_shall_idntfy,
				'statutory_audit_certfct' => $statutory_audit_certfct
				
			);
			 
			$this->db->insert('tbl_ea_section_c', $sec_c);
			
			 if($new_id == 'GN'){
			   $data = array(
						'url' => "form2/form2b",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_generation_a', $data);
		   }if($new_id == 'RN'){
			    $data = array(
                    'url' => "form2/form2b",
                );
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
		   }
		}
		
		redirect(base_url().'form2/form2b');
	}

	// second form section
	public function form2b(){
		$this->load->view('form2/sectionb');
	}

	public function secform(){
		$data['secb1'] = $this->WM->fectch_sec_b1();
		$data['secb2'] = $this->WM->fectch_sec_b2();
		$data['secb2a'] = $this->WM->fectch_sec_b2a();
		$data['secb3'] = $this->WM->fectch_sec_b3();
		$data['secb4'] = $this->WM->fectch_sec_b4();
		$data['secb5'] = $this->WM->fectch_sec_b5();
		$data['secb6'] = $this->WM->fectch_sec_b6();
		$data['secb7'] = $this->WM->fectch_sec_b7();
		$data['secb8'] = $this->WM->fectch_sec_b8();
		$data['secb9'] = $this->WM->fectch_sec_b9();
		$data['secb10'] = $this->WM->fectch_sec_b10();
		$this->load->view('form2/sectionb1', $data);
	}
	 public function address($address){
                if (! preg_match('/^[a-zA-ZA,Z0-9\s\.\-\(\)\/\&]+$/', $address)) {
                    $this->form_validation->set_message('address', 'The %s field may only contain alpha characters & White spaces');
                    return FALSE;
                } else {
                    return TRUE;
                }
            }
	public function pan($pan){
		if(!empty($this->input->post('pan'))){
		if (! preg_match('/[A-Z]{5}[0-9]{4}[A-Z]{1}/', $pan)) {
			$this->form_validation->set_message('pan', 'Enter a valid Pan Number');
			return FALSE;
		} else {
			return TRUE;
		}
		}else{return TRUE;}
	}
	public function pan1($pan){
		
		if (! preg_match('/[A-Z]{5}[0-9]{4}[A-Z]{1}/', $pan)) {
			$this->form_validation->set_message('pan1', 'Enter a valid Pan Number');
			return FALSE;
		} else {
			return TRUE;
		}
		
	}
	public function SCOD($SCOD){
		if(!empty($this->input->post('birthDate'))){
		if (! preg_match('/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/', $SCOD)) {
			$this->form_validation->set_message('SCOD', 'Enter a valid Date');
			return FALSE;
		} else {
			return TRUE;
		}
		}else{return TRUE;}
	}
	public function SCOD1($SCOD){
		
		if (! preg_match('/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/', $SCOD)) {
			$this->form_validation->set_message('SCOD1', 'Enter a valid Date');
			return FALSE;
		} else {
			return TRUE;
		}
		
	}
	public function SCOD2($SCOD){
		if(!empty($this->input->post('sanction_date'))){
		if (! preg_match('/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/', $SCOD)) {
			$this->form_validation->set_message('SCOD2', 'Enter a valid Date');
			return FALSE;
		} else {
			return TRUE;
		}
		}else{return TRUE;}
		
	}
	public function SCOD3($SCOD){
		if(!empty($this->input->post('date_sanction_directors'))){
		if (! preg_match('/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/', $SCOD)) {
			$this->form_validation->set_message('SCOD3', 'Enter a valid Date');
			return FALSE;
		} else {
			return TRUE;
		}
		}else{return TRUE;}
		
	}
	// scetion B step 1 form
	public function sectionb1(){
		
		  $user_id = $this->session->userdata('user')['id'];
		  $app_id = $this->session->userdata('app_id');
		  $new_id = substr($app_id,4,2);
		  if($this->input->method(TRUE)=="POST"){
		  	//$this->WM->insert_data_array();
		  	
		  	$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
			$config = 	array(
					array(
							'field' => 'promoter_name',
							'label' => 'Name of the Promoter',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'pan',
							'label' => 'Pan',
							'rules' => 'trim|required|max_length[10]|callback_pan',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'incorp_date',
							'label' => 'Date of Incorporation',
							'rules' => 'trim|required|max_length[12]|callback_SCOD',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'comncmnt_bsns_date',
							'label' => 'Date of commencement of Business',
							'rules' => 'trim|required|max_length[12]|callback_SCOD',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'namechange_since_incorp',
							'label' => 'Name change, if any since incorporation',
							'rules' => 'trim|required|max_length[4]|alpha',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} Invalid Input',
								)
					),
					array(
							'field' => 'bsns_nature',
							'label' => 'Nature of Business, Constitution, Type',
							'rules' => 'trim|required|max_length[10]|alpha',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'reg_ofc_add',
							'label' => 'Registered Office Address',
							'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'communication_add',
							'label' => 'Address for communication',
							'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'main_plant_loc',
							'label' => 'Location of main plants',
							'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'cmtd_eqty_amnt_in_prpsd_pwr_prj',
							'label' => 'Committed Equity amount',
							'rules' => 'trim|required|max_length[8]|numeric',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
									'numeric'	=> '{field} Invalid Input.'
								)
					),
					array(
							'field' => 'board_resoltn_invst_comtd_eqty_copy',
							'label' => 'Copy of Board Resolution',
							'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'instrmnt_to_infuse_eqty',
							'label' => 'Instrument by which equity will be infused',
							'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'claus_moa_authrz_setng_pwr_prj',
							'label' => 'Clause in MOA authorizing',
							'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'prmtr_grp',
							'label' => 'Promoter Group',
							'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'peer_comp_for_same_indstry',
							'label' => 'Peer Companies within the same industry',
							'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
				);	
				
				$this->form_validation->set_rules($config);
				if ($this->form_validation->run() == TRUE)
				{
				
		  	// checkng data exists for this user in table tbl_section_b_entity_appraisal_info
		  	
		  	$chk_user = $this->WM->check_sec_b_entity_appr_info($user_id);
			
		  	if($chk_user){
		  		
				// update qwery
				
				// insert query executed below
		  	$config['upload_path']          = './uploads/form2/'; $config['allowed_types']        = '*';
           	$config['max_size'] = 0; $config['encrypt_name'] = TRUE;
				
			$insert_file = array();
			
			$this->upload->initialize($config);
			
		  	foreach($_FILES as $k=>$value){
		  		if(!empty($_FILES[$k]['name'])){
			  		// upload 
		            if ( ! $this->upload->do_upload($k))
		            { $error = array('error' => $this->upload->display_errors()); }
		            else
		            {
		                    $file_data = array('upload_data' => $this->upload->data());
		                   	$insert_file[$k] = $file_data['upload_data']['file_name'];
							
							$state_sector_b = array(
								'user_id'=>$user_id,
								$k => $insert_file
							);
							
							$this->WM->update_sec_b_entity_app_info_files($state_sector_b, $k);
					
					
		            }	
				}
		  	}
			
		  	$data = array(
				'user_id'=> $user_id,
		  		'app_id'=>$this->session->userdata('app_id'),
				'form_id'=> $this->session->userdata('form_id'),
			  	'promoter_name' => $this->input->post('promoter_name'),
				'pan' => $this->input->post('pan'),
				'incorp_date' => $this->input->post('incorp_date'),
				'comncmnt_bsns_date' => $this->input->post('comncmnt_bsns_date'),
				'namechange_since_incorp' => $this->input->post('namechange_since_incorp'),
				'bsns_nature' => $this->input->post('bsns_nature'),
				'reg_ofc_add' => $this->input->post('reg_ofc_add'),
				'communication_add' => $this->input->post('communication_add'),
				'main_plant_loc' => $this->input->post('main_plant_loc'),
				'cmtd_eqty_amnt_in_prpsd_pwr_prj' => $this->input->post('cmtd_eqty_amnt_in_prpsd_pwr_prj'),
				'board_resoltn_invst_comtd_eqty_copy' => $this->input->post('board_resoltn_invst_comtd_eqty_copy'),
				'instrmnt_to_infuse_eqty' => $this->input->post('instrmnt_to_infuse_eqty'),
				'claus_moa_authrz_setng_pwr_prj' => $this->input->post('claus_moa_authrz_setng_pwr_prj'),
				'prmtr_grp' => $this->input->post('prmtr_grp'),
				'peer_comp_for_same_indstry' => $this->input->post('peer_comp_for_same_indstry'),
				
			);
			
			if($this->input->post('namechange_since_incorp') == "No" ){
				$data = array_merge($data,array(
					'namechange_since_incorp_file' => '',
				));
			}
			
			$newArr = array_merge($data,$insert_file);
			
			
			$this->db->where('user_id', $user_id);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			$this->db->where('app_id', $this->session->userdata('app_id'));
			
			$this->db->update('tbl_section_b_entity_appraisal_info', $newArr);
				
		  	}else{
			
			// insert query executed below
		  	$config['upload_path']          = './uploads/form2/'; 
			$config['allowed_types']        = '*';
           	$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
				
			$insert_file = array();
			
			$this->upload->initialize($config);
			
		  	foreach($_FILES as $k=>$value){
		  		if(!empty($_FILES[$k]['name'])){
			  		// upload 
		            if ( ! $this->upload->do_upload($k))
		            { $error = array('error' => $this->upload->display_errors()); }
		            else
		            {
		                    $file_data = array('upload_data' => $this->upload->data());
		                   	$insert_file[$k] = $file_data['upload_data']['file_name'];
		            }	
				}
		  	}
			
		  	$data = array(
			  	'user_id' => $user_id,
			  	'app_id'=>$this->session->userdata('app_id'),
				'form_id'=>$this->session->userdata('form_id'),
			  	'promoter_name' => $this->input->post('promoter_name'),
				'pan' => $this->input->post('pan'),
				'incorp_date' => $this->input->post('incorp_date'),
				'comncmnt_bsns_date' => $this->input->post('comncmnt_bsns_date'),
				'namechange_since_incorp' => $this->input->post('namechange_since_incorp'),
				'bsns_nature' => $this->input->post('bsns_nature'),
				'reg_ofc_add' => $this->input->post('reg_ofc_add'),
				'communication_add' => $this->input->post('communication_add'),
				'main_plant_loc' => $this->input->post('main_plant_loc'),
				'cmtd_eqty_amnt_in_prpsd_pwr_prj' => $this->input->post('cmtd_eqty_amnt_in_prpsd_pwr_prj'),
				'board_resoltn_invst_comtd_eqty_copy' => $this->input->post('board_resoltn_invst_comtd_eqty_copy'),
				'instrmnt_to_infuse_eqty' => $this->input->post('instrmnt_to_infuse_eqty'),
				'claus_moa_authrz_setng_pwr_prj' => $this->input->post('claus_moa_authrz_setng_pwr_prj'),
				'prmtr_grp' => $this->input->post('prmtr_grp'),
				'peer_comp_for_same_indstry' => $this->input->post('peer_comp_for_same_indstry'),
			);
			
			$newArr = array_merge($data,$insert_file);
			
			$this->db->insert('tbl_section_b_entity_appraisal_info', $newArr);
			
			 if($new_id == 'GN'){
				
			   $data = array(
						'url' => "form2/secform/step-2",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_generation_a', $data);
		   }if($new_id == 'RN'){
			   
			    $data = array(
                    'url' => "form2/secform/step-2",
                );
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
		   }
		}
		 redirect(base_url()."form2/secform/step-2");
		 }else{
			//$error = array('project_name' => form_error('project_name'));
			$error = $this->form_validation->error_array();
			$this->session->set_flashdata('step1', $error);
			redirect(base_url()."form2/secform/step-1");
		}
	}
		  
		 
		  
	}
	public function sectionb2()
	{

			$user_id = $this->session->userdata('user')['id'];

			if(is_array($this->session->userdata('app_id'))){

			$app_id = $this->session->userdata('app_id')['app_id'];

			}else{

			$app_id = $this->session->userdata('app_id');

			}
			$new_id = substr($app_id,4,2);
			
			if($this->input->method(TRUE)=="POST"){

			$chk2_user = $this->WM->fectch_sec_b2();

			$chk2_user1 = $this->WM->fectch_sec_b2a();

			//update query here
			
			$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
			$config = 	array(
					array(
							'field' => 'chkPrevious',
							'label' => 'Has this company ever applied for loan from REC',
							'rules' => 'trim|max_length[5]|alpha',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'prjct_name',
							'label' => 'Name of Project',
							'rules' => 'trim|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'prjct_typ',
							'label' => 'Type of Project',
							'rules' => 'trim|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'date_of_sanction',
							'label' => 'Date of sanction',
							'rules' => 'trim|max_length[12]|callback_SCOD',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'amount',
							'label' => 'Amount',
							'rules' => 'trim|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
									
								)
					),
					array(
							'field' => 'loan_amount_outstanding',
							'label' => 'Loan amount outstanding',
							'rules' => 'trim|max_length[10]|numeric',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'fullName[]',
							'label' => 'Full Name',
							'rules' => 'trim|max_length[10]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'birthDate[]',
							'label' => 'Date of Birth',
							'rules' => 'trim|max_length[12]|callback_SCOD',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'age[]',
							'label' => 'Age',
							'rules' => 'trim|max_length[3]|numeric',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'address[]',
							'label' => 'Address',
							'rules' => 'trim|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'qualification[]',
							'label' => 'Qualification',
							'rules' => 'trim|max_length[10]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'pannumber[]',
							'label' => 'PAN Number',
							'rules' => 'trim|max_length[10]|callback_pan',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'din_number[]',
							'label' => 'DIN Number',
							'rules' => 'trim|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'experience_power[]',
							'label' => 'Experience in power and other sectors',
							'rules' => 'trim|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'nature[]',
							'label' => 'Nature',
							'rules' => 'trim|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'shareHolding[]',
							'label' => 'Shareholding in the Company',
							'rules' => 'trim|max_length[4]|numeric',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
									'numeric' 	=>	'{field} value should be 100 or less then 100'
								)
					),
					array(
							'field' => 'name_of_company[]',
							'label' => 'Name of other Companies',
							'rules' => 'trim|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'promoter_certified_by_company_secretary',
							'label' => 'Details of Promoter Group',
							'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'market_200_day_moving_avg_52_week_high_low',
							'label' => 'stock exchange',
							'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'detail_pledged_pormoting_company',
							'label' => 'Details of shares pledged',
							'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'shrholdng_pattrn_4_yr_state_prmotr_nonprmotr',
							'label' => 'Detailed Shareholding Pattern',
							'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'sttory_adt_certificate_cash_loss',
							'label' => 'Please give Statutory Auditor Certificate',
							'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'chkCredit1',
							'label' => 'Latest Credit Rating',
							'rules' => 'trim|required|max_length[4]|alpha',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'chkCredit2',
							'label' => 'your credit rating been downgraded',
							'rules' => 'trim|required|max_length[4]|alpha',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'chkProdetails',
							'label' => 'Details of ',
							'rules' => 'trim|required|max_length[4]|alpha',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'chkAnnualreport',
							'label' => 'Commitments made by company',
							'rules' => 'trim|required|max_length[4]|alpha',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
				);	
				$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE)
			{
			
			if($chk2_user){

			$config['upload_path'] = './uploads/form2/'; $config['allowed_types'] = '*';

			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;

			for($i=0; $i<sizeof($this->input->post('fullName')); $i++){

			$j=$i;

			$this->upload->initialize($config);
			

			if(!empty($_FILES['birthdatefile'.$j]['name'])){
				if ( ! $this->upload->do_upload('birthdatefile'.$j))

				{ $error = array('error' => $this->upload->display_errors()); $birthdatefile = '';

				}

				else

				{

				$birthdatefile_data = array('upload_data' => $this->upload->data());

				$birthdatefile = $birthdatefile_data['upload_data']['file_name'];

				}
			}else{
				$birthdatefile = $this->input->post('birthdatefiles'.$j);
			}
				

			// upload addressfile
		if(!empty($_FILES['addressfile'.$j]['name'])){
			if ( ! $this->upload->do_upload('addressfile'.$j))

			{ $error = array('error' => $this->upload->display_errors()); $addressfile = '';}

			else

			{

			$addressfile_data = array('upload_data' => $this->upload->data());

			$addressfile = $addressfile_data['upload_data']['file_name'];

			}
		}else{
			$addressfile = $this->input->post('addressfiles'.$j);
		}	

			// upload pan_numberfile
		if(!empty($_FILES['pan_numberfile'.$j]['name'])){
			if ( ! $this->upload->do_upload('pan_numberfile'.$j))

			{ $error = array('error' => $this->upload->display_errors()); $pan_numberfile = '';}

			else

			{

			$pan_numberfile_data = array('upload_data' => $this->upload->data());

			$pan_numberfile = $pan_numberfile_data['upload_data']['file_name'];

			}
		}else{
			$pan_numberfile = $this->input->post('pan_numberfiles'.$j);
		}

			$data1[] = array(

			'user_id'=>$user_id,

			'app_id' => $app_id,

			'form_id'=>$this->session->userdata('form_id'),

			'fullName' => $this->input->post('fullName')[$i],

			'birthDate' => $this->input->post('birthDate')[$i],

			'age' => $this->input->post('age')[$i],

			'address' => $this->input->post('address')[$i],

			'qualification' => $this->input->post('qualification')[$i],

			'pannumber' => $this->input->post('pannumber')[$i],

			'din_number' => $this->input->post('din_number')[$i],

			'experience_power' => $this->input->post('experience_power')[$i],

			'nature' => $this->input->post('nature')[$i],

			'shareHolding' => $this->input->post('shareHolding')[$i],

			'name_of_company' => $this->input->post('name_of_company')[$i],

			'birthdatefile' => $birthdatefile,

			'addressfile' => $addressfile,

			'pan_numberfile' => $pan_numberfile

			);

			$this->db->where('user_id', $user_id);
			
			$this->db->where('app_id', $this->session->userdata('app_id'));

			$this->db->where('form_id', $this->session->userdata('form_id'));

			$this->db->delete("tbl_section_b2_entity_appraisal_info2");

			$this->db->insert_batch("tbl_section_b2_entity_appraisal_info2", $data1);

			}

			$config['upload_path'] = './uploads/form2/';

			$config['allowed_types'] = '*';

			$config['max_size'] = 0;

			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);

			if(!empty($_FILES['authrzd_prson_contct_for_corspondenc_authority_letter_file']['name'])){

			if ( ! $this->upload->do_upload('authrzd_prson_contct_for_corspondenc_authority_letter_file'))

			{ $error = array('error' => $this->upload->display_errors()); $authrzd_prson_contct_for_corspondenc_authority_letter_file = '';

			}

			else

			{

			$data = array('upload_data' => $this->upload->data());

			$authrzd_prson_contct_for_corspondenc_authority_letter_file = $data['upload_data']['file_name'];

			$file1 = array(

			'authrzd_prson_contct_for_corspondenc_authority_letter_file' => $authrzd_prson_contct_for_corspondenc_authority_letter_file,

			);


			$this->WM->update_section_b2_file($file1, "authrzd_prson_contct_for_corspondenc_authority_letter_file");

			}

			}

			if(!empty($_FILES['promoter_certified_by_company_secretary_file']['name'])){

			if ( ! $this->upload->do_upload('promoter_certified_by_company_secretary_file'))

			{ $error = array('error' => $this->upload->display_errors()); $promoter_certified_by_company_secretary_file = '';

			}

			else

			{

			$data = array('upload_data' => $this->upload->data());

			$promoter_certified_by_company_secretary_file = $data['upload_data']['file_name'];

			$file1 = array(

			'promoter_certified_by_company_secretary_file' => $promoter_certified_by_company_secretary_file,

			);


			$this->WM->update_section_b2_file($file1, "promoter_certified_by_company_secretary_file");

			}

			}

			if(!empty($_FILES['detail_pledged_pormoting_company_file']['name'])){

			if ( ! $this->upload->do_upload('detail_pledged_pormoting_company_file'))

			{ $error = array('error' => $this->upload->display_errors()); $detail_pledged_pormoting_company_file = '';

			}

			else

			{

			$data = array('upload_data' => $this->upload->data());

			$detail_pledged_pormoting_company_file = $data['upload_data']['file_name'];

			$file1 = array(

			'detail_pledged_pormoting_company_file' => $detail_pledged_pormoting_company_file,

			);



			$this->WM->update_section_b2_file($file1, "detail_pledged_pormoting_company_file");

			}

			}

			if(!empty($_FILES['shrholdng_pattrn_4_yr_state_prmotr_nonprmotr_file']['name'])){

			if ( ! $this->upload->do_upload('shrholdng_pattrn_4_yr_state_prmotr_nonprmotr_file'))

			{ $error = array('error' => $this->upload->display_errors()); $shrholdng_pattrn_4_yr_state_prmotr_nonprmotr_file = '';

			}

			else

			{

			$data = array('upload_data' => $this->upload->data());

			$shrholdng_pattrn_4_yr_state_prmotr_nonprmotr_file = $data['upload_data']['file_name'];

			$file1 = array(

			'shrholdng_pattrn_4_yr_state_prmotr_nonprmotr_file' => $shrholdng_pattrn_4_yr_state_prmotr_nonprmotr_file,

			);



			$this->WM->update_section_b2_file($file1, "shrholdng_pattrn_4_yr_state_prmotr_nonprmotr_file");

			}

			}

			if(!empty($_FILES['sttory_adt_certificate_cash_loss_file']['name'])){

			if ( ! $this->upload->do_upload('sttory_adt_certificate_cash_loss_file'))

			{ $error = array('error' => $this->upload->display_errors()); $sttory_adt_certificate_cash_loss_file = '';

			}

			else

			{

			$data = array('upload_data' => $this->upload->data());

			$sttory_adt_certificate_cash_loss_file = $data['upload_data']['file_name'];

			$file1 = array(

			'sttory_adt_certificate_cash_loss_file' => $sttory_adt_certificate_cash_loss_file,

			);



			$this->WM->update_section_b2_file($file1, "sttory_adt_certificate_cash_loss_file");

			}

			}

			if(!empty($_FILES['latest_credit_rating_from_credit_rating_agencies_include_file']['name'])){

			if ( ! $this->upload->do_upload('latest_credit_rating_from_credit_rating_agencies_include_file'))

			{ $error = array('error' => $this->upload->display_errors()); $latest_credit_rating_from_credit_rating_agencies_include_file = '';

			}

			else

			{

			$data = array('upload_data' => $this->upload->data());

			$latest_credit_rating_from_credit_rating_agencies_include_file = $data['upload_data']['file_name'];

			$file1 = array(

			'latest_credit_rating_from_credit_rating_agencies_include_file' => $latest_credit_rating_from_credit_rating_agencies_include_file,

			);



			$this->WM->update_section_b2_file($file1, "latest_credit_rating_from_credit_rating_agencies_include_file");

			}

			}if($_POST['chkCredit1'] == "no"){

			$file1 = array(

			'latest_credit_rating_from_credit_rating_agencies_include_file' => "",

			);



			$this->WM->update_section_b2_file($file1, "latest_credit_rating_from_credit_rating_agencies_include_file");

			}

			if(!empty($_FILES['credit_rating_been_downgraded_enclose_complete_rating_file']['name'])){

			if ( ! $this->upload->do_upload('credit_rating_been_downgraded_enclose_complete_rating_file'))

			{ $error = array('error' => $this->upload->display_errors()); $credit_rating_been_downgraded_enclose_complete_rating_file = '';

			}

			else

			{

			$data = array('upload_data' => $this->upload->data());

			$credit_rating_been_downgraded_enclose_complete_rating_file = $data['upload_data']['file_name'];

			$file1 = array(

			'credit_rating_been_downgraded_enclose_complete_rating_file' => $credit_rating_been_downgraded_enclose_complete_rating_file

			);


			$this->WM->update_section_b2_file($file1, "credit_rating_been_downgraded_enclose_complete_rating_file");

			}

			}if($_POST['chkCredit2'] == "no"){

			$file1 = array(

			'credit_rating_been_downgraded_enclose_complete_rating_file' => "",

			);



			$this->WM->update_section_b2_file($file1, "credit_rating_been_downgraded_enclose_complete_rating_file");

			}

			if(!empty($_FILES['detail_project_commissioned_under_inmplementation_under_pln_file']['name'])){

			if ( ! $this->upload->do_upload('detail_project_commissioned_under_inmplementation_under_pln_file'))

			{ $error = array('error' => $this->upload->display_errors()); $detail_project_commissioned_under_inmplementation_under_pln_file = '';

			}

			else

			{

			$data = array('upload_data' => $this->upload->data());

			$detail_project_commissioned_under_inmplementation_under_pln_file = $data['upload_data']['file_name'];

			$file1 = array (

			'detail_project_commissioned_under_inmplementation_under_pln_file' => $detail_project_commissioned_under_inmplementation_under_pln_file,

			);



			$this->WM->update_section_b2_file($file1, "detail_project_commissioned_under_inmplementation_under_pln_file");

			}

			}if($_POST['chkProdetails'] == "no"){

			$file1 = array(

			'detail_project_commissioned_under_inmplementation_under_pln_file' => "",

			);



			$this->WM->update_section_b2_file($file1, "detail_project_commissioned_under_inmplementation_under_pln_file");

			}

			if(!empty($_FILES['commitments_made_company_by_way_undertaking_invstment_file']['name'])){

			if ( ! $this->upload->do_upload('commitments_made_company_by_way_undertaking_invstment_file'))

			{ $error = array('error' => $this->upload->display_errors()); $commitments_made_company_by_way_undertaking_invstment_file = '';

			}

			else

			{

			$birthdatefile_data = array('upload_data' => $this->upload->data());

			$commitments_made_company_by_way_undertaking_invstment_file = $birthdatefile_data['upload_data']['file_name'];

			$file1 = array(

			'commitments_made_company_by_way_undertaking_invstment_file' => $commitments_made_company_by_way_undertaking_invstment_file,

			);


			$this->WM->update_section_b2_file($file1, "commitments_made_company_by_way_undertaking_invstment_file");

			}

			}if($_POST['chkAnnualreport'] == "no"){

			$file1 = array(

			'commitments_made_company_by_way_undertaking_invstment_file' => "",

			);



			$this->WM->update_section_b2_file($file1, "commitments_made_company_by_way_undertaking_invstment_file");

			}

			if($_POST['chkPrevious'] == "yes"){

			$prjct_name = $this->input->post('prjct_name');

			$prjct_typ = $this->input->post('prjct_typ');

			$date_of_sanction = $this->input->post('date_of_sanction');

			$amount = $this->input->post('amount');

			$loan_amount_outstanding = $this->input->post('loan_amount_outstanding');

			}else{

			$prjct_name = "" ;

			$prjct_typ = "" ;

			$date_of_sanction = "" ;

			$amount = "" ;

			$loan_amount_outstanding = "" ;

			}

			$data2 = array (

			'user_id'=>$user_id,

			'app_id'=>$app_id,

			'form_id'=>$this->session->userdata('form_id'),

			'chkPrevious' => $this->input->post('chkPrevious'),

			'prjct_name' => $prjct_name,

			'prjct_typ' => $prjct_typ,

			'date_of_sanction' => $date_of_sanction,

			'amount' => $amount,

			'loan_amount_outstanding' => $loan_amount_outstanding,

			'promoter_certified_by_company_secretary' => $this->input->post('promoter_certified_by_company_secretary'),

			'market_200_day_moving_avg_52_week_high_low' => $this->input->post('market_200_day_moving_avg_52_week_high_low'),

			'detail_pledged_pormoting_company' => $this->input->post('detail_pledged_pormoting_company'),

			'shrholdng_pattrn_4_yr_state_prmotr_nonprmotr' => $this->input->post('shrholdng_pattrn_4_yr_state_prmotr_nonprmotr'),

			'sttory_adt_certificate_cash_loss' => $this->input->post('sttory_adt_certificate_cash_loss'),

			'chkCredit1' => $this->input->post('chkCredit1'),

			'chkCredit2' => $this->input->post('chkCredit2'),

			'chkProdetails' => $this->input->post('chkProdetails'),

			'chkAnnualreport' => $this->input->post('chkAnnualreport')

			);

			$this->db->where('user_id', $this->session->userdata('user')['id']);
			
			$this->db->where('app_id', $this->session->userdata('app_id'));
			
			$this->db->where('form_id', $this->session->userdata('form_id'));

			$this->db->update('tbl_section_b2_entity_appraisal_info', $data2);

			redirect(base_url()."form2/secform/step-3");

			}else{

			//insert here-------------------------------------------------------------------------

			for($i=0; $i<sizeof($this->input->post('fullName')); $i++){

			$j=$i;

			$config['upload_path'] = './uploads/form2/'; $config['allowed_types'] = '*';

			$config['max_size'] = 0; $config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);

			if(!empty($_FILES['birthdatefile'.$j]['name'])){

			if ( ! $this->upload->do_upload('birthdatefile'.$j))

			{ $error = array('error' => $this->upload->display_errors()); $birthdatefile = '';

			}

			else

			{

			$birthdatefile_data = array('upload_data' => $this->upload->data());

			$birthdatefile = $birthdatefile_data['upload_data']['file_name'];

			}

			}else{

			$birthdatefile = '';

			}

			// upload addressfile

			if(!empty($_FILES['addressfile'.$j]['name'])){

			if ( ! $this->upload->do_upload('addressfile'.$j))

			{ $error = array('error' => $this->upload->display_errors()); $addressfile = '';}

			else

			{

			$addressfile_data = array('upload_data' => $this->upload->data());

			$addressfile = $addressfile_data['upload_data']['file_name'];

			}

			}else{

			$addressfile = '';

			}

			// upload pan_numberfile

			if(!empty($_FILES['pan_numberfile'.$j]['name'])){

			if ( ! $this->upload->do_upload('pan_numberfile'.$j))

			{ $error = array('error' => $this->upload->display_errors()); $pan_numberfile = '';}

			else

			{

			$pan_numberfile_data = array('upload_data' => $this->upload->data());

			$pan_numberfile = $pan_numberfile_data['upload_data']['file_name'];

			}

			}else{

			$pan_numberfile = '';

			}



			$data1[] = array(

			'user_id'=>$user_id,

			'app_id' => $app_id,

			'form_id'=> $this->session->userdata('form_id'),

			'fullName' => $this->input->post('fullName')[$i],

			'birthDate' => $this->input->post('birthDate')[$i],

			'age' => $this->input->post('age')[$i],

			'address' => $this->input->post('address')[$i],

			'qualification' => $this->input->post('qualification')[$i],

			'pannumber' => $this->input->post('pannumber')[$i],

			'din_number' => $this->input->post('din_number')[$i],

			'experience_power' => $this->input->post('experience_power')[$i],

			'nature' => $this->input->post('nature')[$i],

			'shareHolding' => $this->input->post('shareHolding')[$i],

			'name_of_company' => $this->input->post('name_of_company')[$i],

			'birthdatefile' => $birthdatefile,

			'addressfile' => $addressfile,

			'pan_numberfile' => $pan_numberfile

			);

			$this->db->insert_batch("tbl_section_b2_entity_appraisal_info2", $data1);

			}

			$config['upload_path'] = './uploads/form2/';

			$config['allowed_types'] = '*';

			$config['max_size'] = 0;

			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);

			if(!empty($_FILES['authrzd_prson_contct_for_corspondenc_authority_letter_file']['name'])){

			if ( ! $this->upload->do_upload('authrzd_prson_contct_for_corspondenc_authority_letter_file'))

			{ $error = array('error' => $this->upload->display_errors()); $authrzd_prson_contct_for_corspondenc_authority_letter_file = '';

			}

			else

			{

			$data = array('upload_data' => $this->upload->data());

			$authrzd_prson_contct_for_corspondenc_authority_letter_file = $data['upload_data']['file_name'];

			}

			}else{

			$authrzd_prson_contct_for_corspondenc_authority_letter_file = '';

			}

			if(!empty($_FILES['promoter_certified_by_company_secretary_file']['name'])){

			if ( ! $this->upload->do_upload('promoter_certified_by_company_secretary_file'))

			{ $error = array('error' => $this->upload->display_errors()); $promoter_certified_by_company_secretary_file = '';

			}

			else

			{

			$data = array('upload_data' => $this->upload->data());

			$promoter_certified_by_company_secretary_file = $data['upload_data']['file_name'];

			}

			}else{

			$promoter_certified_by_company_secretary_file = '';

			}

			if(!empty($_FILES['detail_pledged_pormoting_company_file']['name'])){

			if ( ! $this->upload->do_upload('detail_pledged_pormoting_company_file'))

			{ $error = array('error' => $this->upload->display_errors()); $detail_pledged_pormoting_company_file = '';

			}

			else

			{

			$data = array('upload_data' => $this->upload->data());

			$detail_pledged_pormoting_company_file = $data['upload_data']['file_name'];

			}

			}else{

			$detail_pledged_pormoting_company_file = '';

			}

			if(!empty($_FILES['shrholdng_pattrn_4_yr_state_prmotr_nonprmotr_file']['name'])){

			if ( ! $this->upload->do_upload('shrholdng_pattrn_4_yr_state_prmotr_nonprmotr_file'))

			{ $error = array('error' => $this->upload->display_errors()); $shrholdng_pattrn_4_yr_state_prmotr_nonprmotr_file = '';

			}

			else

			{

			$data = array('upload_data' => $this->upload->data());

			$shrholdng_pattrn_4_yr_state_prmotr_nonprmotr_file = $data['upload_data']['file_name'];

			}

			}else{

			$shrholdng_pattrn_4_yr_state_prmotr_nonprmotr_file = '';

			}

			if(!empty($_FILES['sttory_adt_certificate_cash_loss_file']['name'])){

			if ( ! $this->upload->do_upload('sttory_adt_certificate_cash_loss_file'))

			{ $error = array('error' => $this->upload->display_errors()); $sttory_adt_certificate_cash_loss_file = '';

			}

			else

			{

			$data = array('upload_data' => $this->upload->data());

			$sttory_adt_certificate_cash_loss_file = $data['upload_data']['file_name'];

			}

			}else{

			$sttory_adt_certificate_cash_loss_file = '';

			}

			if(!empty($_FILES['latest_credit_rating_from_credit_rating_agencies_include_file']['name'])){

			if ( ! $this->upload->do_upload('latest_credit_rating_from_credit_rating_agencies_include_file'))

			{ $error = array('error' => $this->upload->display_errors()); $latest_credit_rating_from_credit_rating_agencies_include_file = '';

			}

			else

			{

			$data = array('upload_data' => $this->upload->data());

			$latest_credit_rating_from_credit_rating_agencies_include_file = $data['upload_data']['file_name'];

			}

			}else{

			$latest_credit_rating_from_credit_rating_agencies_include_file = '';

			}

			if(!empty($_FILES['credit_rating_been_downgraded_enclose_complete_rating_file']['name'])){

			if ( ! $this->upload->do_upload('credit_rating_been_downgraded_enclose_complete_rating_file'))

			{ $error = array('error' => $this->upload->display_errors()); $credit_rating_been_downgraded_enclose_complete_rating_file = '';

			print_r($error); die;

			}

			else

			{

			$data = array('upload_data' => $this->upload->data());

			$credit_rating_been_downgraded_enclose_complete_rating_file = $data['upload_data']['file_name'];

			}

			}else{

			$credit_rating_been_downgraded_enclose_complete_rating_file = '';

			}

			if(!empty($_FILES['detail_project_commissioned_under_inmplementation_under_pln_file']['name'])){

			if ( ! $this->upload->do_upload('detail_project_commissioned_under_inmplementation_under_pln_file'))

			{ $error = array('error' => $this->upload->display_errors()); $detail_project_commissioned_under_inmplementation_under_pln_file = '';

			}

			else

			{

			$data = array('upload_data' => $this->upload->data());

			$detail_project_commissioned_under_inmplementation_under_pln_file = $data['upload_data']['file_name'];

			}

			}else{

			$detail_project_commissioned_under_inmplementation_under_pln_file = '';

			}

			if(!empty($_FILES['commitments_made_company_by_way_undertaking_invstment_file']['name'])){

			if ( ! $this->upload->do_upload('commitments_made_company_by_way_undertaking_invstment_file'))

			{ $error = array('error' => $this->upload->display_errors()); $commitments_made_company_by_way_undertaking_invstment_file = '';

			}

			else

			{

			$birthdatefile_data = array('upload_data' => $this->upload->data());

			$commitments_made_company_by_way_undertaking_invstment_file = $birthdatefile_data['upload_data']['file_name'];

			}

			}else{

			$commitments_made_company_by_way_undertaking_invstment_file = '';

			}

			$data2 = array (

			'user_id'=>$user_id,

			'app_id'=>$app_id,

			'form_id'=> $this->session->userdata('form_id'),

			'chkPrevious' => $this->input->post('chkPrevious'),

			'prjct_name' => $this->input->post('prjct_name'),

			'prjct_typ' => $this->input->post('prjct_typ'),

			'date_of_sanction' => $this->input->post('date_of_sanction'),

			'amount' => $this->input->post('amount'),

			'loan_amount_outstanding' => $this->input->post('loan_amount_outstanding'),

			'promoter_certified_by_company_secretary' => $this->input->post('promoter_certified_by_company_secretary'),

			'market_200_day_moving_avg_52_week_high_low' => $this->input->post('market_200_day_moving_avg_52_week_high_low'),

			'detail_pledged_pormoting_company' => $this->input->post('detail_pledged_pormoting_company'),

			'shrholdng_pattrn_4_yr_state_prmotr_nonprmotr' => $this->input->post('shrholdng_pattrn_4_yr_state_prmotr_nonprmotr'),

			'sttory_adt_certificate_cash_loss' => $this->input->post('sttory_adt_certificate_cash_loss'),

			'chkCredit1' => $this->input->post('chkCredit1'),

			'chkCredit2' => $this->input->post('chkCredit2'),

			'chkProdetails' => $this->input->post('chkProdetails'),

			'chkAnnualreport' => $this->input->post('chkAnnualreport'),

			'authrzd_prson_contct_for_corspondenc_authority_letter_file' =>	$authrzd_prson_contct_for_corspondenc_authority_letter_file,

			'promoter_certified_by_company_secretary_file' => $promoter_certified_by_company_secretary_file,

			'detail_pledged_pormoting_company_file' => $detail_pledged_pormoting_company_file,

			'shrholdng_pattrn_4_yr_state_prmotr_nonprmotr_file' => $shrholdng_pattrn_4_yr_state_prmotr_nonprmotr_file,

			'sttory_adt_certificate_cash_loss_file' => $sttory_adt_certificate_cash_loss_file,

			'latest_credit_rating_from_credit_rating_agencies_include_file' => $latest_credit_rating_from_credit_rating_agencies_include_file,

			'credit_rating_been_downgraded_enclose_complete_rating_file' => $credit_rating_been_downgraded_enclose_complete_rating_file,

			'detail_project_commissioned_under_inmplementation_under_pln_file' => $detail_project_commissioned_under_inmplementation_under_pln_file,

			'commitments_made_company_by_way_undertaking_invstment_file' => $commitments_made_company_by_way_undertaking_invstment_file

			);

			$this->db->insert("tbl_section_b2_entity_appraisal_info" ,$data2);

			if($new_id == 'GN'){
				 
			   $data = array(
						'url' => "form2/secform/step-3",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_generation_a', $data);
		   }if($new_id == 'RN'){
			    
			    $data = array(
                    'url' => "form2/secform/step-3",
                );
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
		   }

			redirect(base_url()."form2/secform/step-3");

			}
			}else{
				//$error = array('project_name' => form_error('project_name'));
				$error = $this->form_validation->error_array();
				$this->session->set_flashdata('step2', $error);
				redirect(base_url()."form2/secform/step-2");
			}


			}

}
	
	public function sectionb3()
	{
	
		$user_id = $this->session->userdata('user')['id'];
		$app_id = $this->session->userdata('app_id');
		$new_id = substr($app_id,4,2);
		if($this->input->method(TRUE)=="POST"){
			
			$chk3_user = $this->WM->fectch_sec_b3();
			
			$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
			$config = 	array(
					array(
							'field' => 'chkFundsinfo',
							'label' => 'Details of funds raised maximum',
							'rules' => 'trim|required|max_length[5]|alpha',
							'errors' => array(
									'required' 	=> 	'{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'cash_internal_accruals_prposd_used',
							'label' => 'If cash surplus/internal accruals are proposed to be used',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 	=> 	'{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'chkAC28b',
							'label' => 'Whether the issue of equity shares of the promoter company',
							'rules' => 'trim|required|max_length[5]|alpha',
							'errors' => array(
									'required' 	=> 	'{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'plnning_to_raise_debt_your_book_acount_bringng_equty_ratio',
							'label' => 'Are you planning to raise debt on your books of accounts',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 	=> 	'{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'marketable_securities_going_used_fr_fndng_equty_requirmnt',
							'label' => 'Are marketable securities going to be used for funding equity requirement',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 	=> 	'{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'source_raising_funds_equity_investment',
							'label' => 'Any other source of raising funds for equity investment in the project',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 	=> 	'{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'statmnt_of_clculatn_cash_flow_fr_invstmnt_prposd_prject',
							'label' => 'Statement of Calculation of Cash flow',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 	=> 	'{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
				);	
				
				$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE)
			{
				
			if($chk3_user){
				//update query-------------------------
				
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
						
					$this->upload->initialize($config);
					if($_POST['chkFundsinfo'] == "no"){
					
						$file1 = array(
						'dtl_of_fnds_raisd_lst_5_fincl_yr_company_file' => "",
						);
						
						$this->WM->update_section_b3_file($file1, "dtl_of_fnds_raisd_lst_5_fincl_yr_company_file");
					}
					
					if(!empty($_FILES['dtl_of_fnds_raisd_lst_5_fincl_yr_company_file']['name'])){
						
					 if ( ! $this->upload->do_upload('dtl_of_fnds_raisd_lst_5_fincl_yr_company_file'))
						{ $error = array('error' => $this->upload->display_errors()); $dtl_of_fnds_raisd_lst_5_fincl_yr_company_file = '';
						 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$dtl_of_fnds_raisd_lst_5_fincl_yr_company_file = $data['upload_data']['file_name'];
						
						$file1 = array(
						'dtl_of_fnds_raisd_lst_5_fincl_yr_company_file' => $dtl_of_fnds_raisd_lst_5_fincl_yr_company_file,
						);
						
						$this->WM->update_section_b3_file($file1, "dtl_of_fnds_raisd_lst_5_fincl_yr_company_file");
					}
					}
					 
					  
					if(!empty($_FILES['statmnt_declrng_lst_deflt_made_prmotr_agnst_bank_lst_10_yr_file']['name'])){
						
					 if ( ! $this->upload->do_upload('statmnt_declrng_lst_deflt_made_prmotr_agnst_bank_lst_10_yr_file'))
						{ $error = array('error' => $this->upload->display_errors()); $statmnt_declrng_lst_deflt_made_prmotr_agnst_bank_lst_10_yr_file = '';
						 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$statmnt_declrng_lst_deflt_made_prmotr_agnst_bank_lst_10_yr_file = $data['upload_data']['file_name'];
						
						$file1 = array(
						'statmnt_declrng_lst_deflt_made_prmotr_agnst_bank_lst_10_yr_file' => $statmnt_declrng_lst_deflt_made_prmotr_agnst_bank_lst_10_yr_file,
						);
						
						$this->WM->update_section_b3_file($file1, "statmnt_declrng_lst_deflt_made_prmotr_agnst_bank_lst_10_yr_file");
						
						
					}
					
					}
					 
					  
					if(!empty($_FILES['statmnt_declrng_insolvency_procedng_agnst_prmotrs_file']['name'])){
						
					 if ( ! $this->upload->do_upload('statmnt_declrng_insolvency_procedng_agnst_prmotrs_file'))
						{ $error = array('error' => $this->upload->display_errors()); $statmnt_declrng_insolvency_procedng_agnst_prmotrs_file = '';
						  
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$statmnt_declrng_insolvency_procedng_agnst_prmotrs_file = $data['upload_data']['file_name'];
						
						$file1 = array(
						'statmnt_declrng_insolvency_procedng_agnst_prmotrs_file' => $statmnt_declrng_insolvency_procedng_agnst_prmotrs_file,
						);
					
						$this->WM->update_section_b3_file($file1, "statmnt_declrng_insolvency_procedng_agnst_prmotrs_file");
						
					}
					
					}
					  
					 
					  
					if(!empty($_FILES['dtail_infrstructr_indstrial_projcts_hndled_in_pst_file']['name'])){
						
					 if ( ! $this->upload->do_upload('dtail_infrstructr_indstrial_projcts_hndled_in_pst_file'))
						{ $error = array('error' => $this->upload->display_errors()); $dtail_infrstructr_indstrial_projcts_hndled_in_pst_file = '';
						  
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$dtail_infrstructr_indstrial_projcts_hndled_in_pst_file = $data['upload_data']['file_name'];
						
						$file1 = array(
						'dtail_infrstructr_indstrial_projcts_hndled_in_pst_file' => $dtail_infrstructr_indstrial_projcts_hndled_in_pst_file,
						);
						
						$this->WM->update_section_b3_file($file1, "dtail_infrstructr_indstrial_projcts_hndled_in_pst_file");
					}
					
					}
					
					if($this->input->post('chkAC28b') == "Yes"){ 
					  
						if(!empty($_FILES['isu_equity_prmotr_cmpny_tke_raising_equty_file']['name'])){
							
							 if ( ! $this->upload->do_upload('isu_equity_prmotr_cmpny_tke_raising_equty_file'))
								{ $error = array('error' => $this->upload->display_errors()); $isu_equity_prmotr_cmpny_tke_raising_equty_file = '';
								  
							}
							else
							{
								$data = array('upload_data' => $this->upload->data());
								$isu_equity_prmotr_cmpny_tke_raising_equty_file = $data['upload_data']['file_name'];
								
								$file1 = array(
								'isu_equity_prmotr_cmpny_tke_raising_equty_file' => $isu_equity_prmotr_cmpny_tke_raising_equty_file,
								);
							
								$this->WM->update_section_b3_file($file1, "isu_equity_prmotr_cmpny_tke_raising_equty_file");
							}
						
						}
					}else{
						
						$file1 = array(
								'isu_equity_prmotr_cmpny_tke_raising_equty_file' => "",
								);
							
								$this->WM->update_section_b3_file($file1, "isu_equity_prmotr_cmpny_tke_raising_equty_file");
					}
					
					  
					if(!empty($_FILES['projected_gross_operating_revenues_file']['name'])){
						
					 if ( ! $this->upload->do_upload('projected_gross_operating_revenues_file'))
						{ $error = array('error' => $this->upload->display_errors()); $projected_gross_operating_revenues_file = '';
						
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$projected_gross_operating_revenues_file = $data['upload_data']['file_name'];
						
						$file1 = array(
						'projected_gross_operating_revenues_file' => $projected_gross_operating_revenues_file,
						);
						
						$this->WM->update_section_b3_file($file1, "projected_gross_operating_revenues_file");
						
						
					}
					
					}
					
					 
					  
					$data = array(
						
						'user_id' => $user_id,
						'app_id'=>$this->session->userdata('app_id'),
						'form_id'=> $this->session->userdata('form_id'),
						'chkFundsinfo' => $this->input->POST('chkFundsinfo'),
						
						'cash_internal_accruals_prposd_used' => $this->input->POST('cash_internal_accruals_prposd_used'),
						'chkAC28b' => $this->input->post('chkAC28b'),
						'plnning_to_raise_debt_your_book_acount_bringng_equty_ratio' => $this->input->POST('plnning_to_raise_debt_your_book_acount_bringng_equty_ratio'),
						
						'marketable_securities_going_used_fr_fndng_equty_requirmnt' => $this->input->POST('marketable_securities_going_used_fr_fndng_equty_requirmnt'),
						
						'source_raising_funds_equity_investment' => $this->input->POST('source_raising_funds_equity_investment'),
						
						'statmnt_of_clculatn_cash_flow_fr_invstmnt_prposd_prject' => $this->input->POST('statmnt_of_clculatn_cash_flow_fr_invstmnt_prposd_prject')
						
					);
					
					$this->db->where('user_id', $user_id);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->update("tbl_section_b3_entity_appraisal_info", $data);
					
					redirect(base_url()."form2/secform/step-4");
				
			}else{
				//inser quere below---------------------
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
						
					$this->upload->initialize($config);
					
					if(!empty($_FILES['dtl_of_fnds_raisd_lst_5_fincl_yr_company_file']['name'])){
						
					 if ( ! $this->upload->do_upload('dtl_of_fnds_raisd_lst_5_fincl_yr_company_file'))
						{ $error = array('error' => $this->upload->display_errors()); $dtl_of_fnds_raisd_lst_5_fincl_yr_company_file = '';
						 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$dtl_of_fnds_raisd_lst_5_fincl_yr_company_file = $data['upload_data']['file_name'];
						
					}
					
					}else{
						$dtl_of_fnds_raisd_lst_5_fincl_yr_company_file = '';
					}
					 
					  
					if(!empty($_FILES['statmnt_declrng_lst_deflt_made_prmotr_agnst_bank_lst_10_yr_file']['name'])){
						
					 if ( ! $this->upload->do_upload('statmnt_declrng_lst_deflt_made_prmotr_agnst_bank_lst_10_yr_file'))
						{ $error = array('error' => $this->upload->display_errors()); $statmnt_declrng_lst_deflt_made_prmotr_agnst_bank_lst_10_yr_file = '';
						 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$statmnt_declrng_lst_deflt_made_prmotr_agnst_bank_lst_10_yr_file = $data['upload_data']['file_name'];
						
					}
					
					}else{
						$statmnt_declrng_lst_deflt_made_prmotr_agnst_bank_lst_10_yr_file = '';
					}
					 
					  
					if(!empty($_FILES['statmnt_declrng_insolvency_procedng_agnst_prmotrs_file']['name'])){
						
					 if ( ! $this->upload->do_upload('statmnt_declrng_insolvency_procedng_agnst_prmotrs_file'))
						{ $error = array('error' => $this->upload->display_errors()); $statmnt_declrng_insolvency_procedng_agnst_prmotrs_file = '';
						  
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$statmnt_declrng_insolvency_procedng_agnst_prmotrs_file = $data['upload_data']['file_name'];
						
					}
					
					}else{
						$statmnt_declrng_insolvency_procedng_agnst_prmotrs_file = '';
					}
					  
					  
					if(!empty($_FILES['dtail_infrstructr_indstrial_projcts_hndled_in_pst_file']['name'])){
						
					 if ( ! $this->upload->do_upload('dtail_infrstructr_indstrial_projcts_hndled_in_pst_file'))
						{ $error = array('error' => $this->upload->display_errors()); $dtail_infrstructr_indstrial_projcts_hndled_in_pst_file = '';
						  
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$dtail_infrstructr_indstrial_projcts_hndled_in_pst_file = $data['upload_data']['file_name'];
						
					}
					
					}else{
						$dtail_infrstructr_indstrial_projcts_hndled_in_pst_file = '';
					}
					
					 
					if(!empty($_FILES['isu_equity_prmotr_cmpny_tke_raising_equty_file']['name'])){
						
					 if ( ! $this->upload->do_upload('isu_equity_prmotr_cmpny_tke_raising_equty_file'))
						{ $error = array('error' => $this->upload->display_errors()); $isu_equity_prmotr_cmpny_tke_raising_equty_file = '';
						  
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$isu_equity_prmotr_cmpny_tke_raising_equty_file = $data['upload_data']['file_name'];
						
					}
					
					}else{
						$isu_equity_prmotr_cmpny_tke_raising_equty_file = '';
					}
					
					 
					if(!empty($_FILES['projected_gross_operating_revenues_file']['name'])){
						
					 if ( ! $this->upload->do_upload('projected_gross_operating_revenues_file'))
						{ $error = array('error' => $this->upload->display_errors()); $projected_gross_operating_revenues_file = '';
						
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$projected_gross_operating_revenues_file = $data['upload_data']['file_name'];
						
					}
					
					}else{
						$projected_gross_operating_revenues_file = '';
					}
					
					 
					$data = array(
						
						'user_id' => $user_id,
						'app_id'=>$this->session->userdata('app_id'),
						'form_id'=> $this->session->userdata('form_id'),
						'chkFundsinfo' => $this->input->POST('chkFundsinfo'),
						
						'cash_internal_accruals_prposd_used' => $this->input->POST('cash_internal_accruals_prposd_used'),
						
						'chkAC28b' => $this->input->post('chkAC28b'),
						
						'plnning_to_raise_debt_your_book_acount_bringng_equty_ratio' => $this->input->POST('plnning_to_raise_debt_your_book_acount_bringng_equty_ratio'),
						
						'marketable_securities_going_used_fr_fndng_equty_requirmnt' => $this->input->POST('marketable_securities_going_used_fr_fndng_equty_requirmnt'),
						
						'source_raising_funds_equity_investment' => $this->input->POST('source_raising_funds_equity_investment'),
						
						'statmnt_of_clculatn_cash_flow_fr_invstmnt_prposd_prject' => $this->input->POST('statmnt_of_clculatn_cash_flow_fr_invstmnt_prposd_prject'),
						
						'dtl_of_fnds_raisd_lst_5_fincl_yr_company_file' => $dtl_of_fnds_raisd_lst_5_fincl_yr_company_file,
						
						'statmnt_declrng_lst_deflt_made_prmotr_agnst_bank_lst_10_yr_file' => $statmnt_declrng_lst_deflt_made_prmotr_agnst_bank_lst_10_yr_file,
						
						'statmnt_declrng_insolvency_procedng_agnst_prmotrs_file' => $statmnt_declrng_insolvency_procedng_agnst_prmotrs_file,
						
						'dtail_infrstructr_indstrial_projcts_hndled_in_pst_file' => $dtail_infrstructr_indstrial_projcts_hndled_in_pst_file,
						
						'isu_equity_prmotr_cmpny_tke_raising_equty_file' => $isu_equity_prmotr_cmpny_tke_raising_equty_file,
						
						'projected_gross_operating_revenues_file' => $projected_gross_operating_revenues_file
					);
					
					$this->db->insert("tbl_section_b3_entity_appraisal_info", $data);
					
					if($new_id == 'GN'){
			   $data = array(
						'url' => "form2/secform/step-4",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_generation_a', $data);
		   }if($new_id == 'RN'){
			    $data = array(
                    'url' => "form2/secform/step-4",
                );
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
			}
					
					redirect(base_url()."form2/secform/step-4");
			}
			}else{
				//$error = array('project_name' => form_error('project_name'));
				$error = $this->form_validation->error_array();
				$this->session->set_flashdata('step3', $error);
				redirect(base_url()."form2/secform/step-3");
			}
		}	
	}
	public function sectionb4()
	{	
		$user_id = $this->session->userdata('user')['id'];
		$app_id = $this->session->userdata('app_id');
		$new_id = substr($app_id,4,2);
		if($this->input->method(TRUE)=="POST"){
			
			$chk4_user = $this->WM->fectch_sec_b4();
			
			$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
			$config = 	array(
					array(
							'field' => 'critical_factors_affecting_business_segment',
							'label' => 'What are critical factors affecting each business segment of your business',
							'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'key_developments_risks_challenges_opportunities_business_segment',
							'label' => 'Management view for key developments',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'chkForeign',
							'label' => 'Is your business exposed to foreign exchange fluctuations',
							'rules' => 'trim|required|max_length[5]|alpha',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'foreign_currency_exposure_durng_pst_4_yr_profit_loss',
							'label' => 'Details of foreign currency exposure during past 4 years',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'sundry_debtors_and_sundry_creditors_contitutng_last_audtd_yr',
							'label' => 'Details of Sundry Debtors and Sundry Creditors',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
				);
				$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE)
			{
				
			
			if($chk4_user){
				//update query-------------------------
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
				if(!empty($_FILES['business_and_financial_policy_company_file']['name'])){
					
				 if ( ! $this->upload->do_upload('business_and_financial_policy_company_file'))
					{ $error = array('error' => $this->upload->display_errors()); $business_and_financial_policy_company_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$business_and_financial_policy_company_file = $data['upload_data']['file_name'];
						
						$file1 = array(
						'business_and_financial_policy_company_file' => $business_and_financial_policy_company_file,
						);
						$this->WM->update_section_b4_file($file1, 'business_and_financial_policy_company_file');
						
					}
				}
				  unset($config);
				  
				  if(!empty($_FILES['major_business_segments_file']['name'])){
					
				 if ( ! $this->upload->do_upload('major_business_segments_file'))
					{ $error = array('error' => $this->upload->display_errors()); $major_business_segments_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$major_business_segments_file = $data['upload_data']['file_name'];
						
						$file1 = array(
						'major_business_segments_file' => $major_business_segments_file,
						);
						$this->WM->update_section_b4_file($file1, 'major_business_segments_file');
					}
				
				}
				  unset($config);
				  
				  if(!empty($_FILES['business_sgmt_provid_latest_audited_financial_year_file']['name'])){
					
				 if ( ! $this->upload->do_upload('business_sgmt_provid_latest_audited_financial_year_file'))
					{ $error = array('error' => $this->upload->display_errors()); $business_sgmt_provid_latest_audited_financial_year_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$business_sgmt_provid_latest_audited_financial_year_file = $data['upload_data']['file_name'];
						
						$file1 = array(
						'business_sgmt_provid_latest_audited_financial_year_file' => $business_sgmt_provid_latest_audited_financial_year_file,
						);
						$this->WM->update_section_b4_file($file1, 'business_sgmt_provid_latest_audited_financial_year_file');
					}
				
				}
				  unset($config);
				  if($_POST['chkForeign'] == "no"){
					  
					  $file4 = array(
						'foreign_exchange_fluctuations_file' => "",
						);
						$this->db->where('user_id', $user_id);
						$this->db->where('app_id', $this->session->userdata('app_id'));
						$this->db->where('form_id', $this->session->userdata('form_id'));
						$this->db->update('tbl_section_b4_entity_appraisal_info', $file4);
					  
				  }
				  
				if(!empty($_FILES['foreign_exchange_fluctuations_file']['name'])){
					
					if ( ! $this->upload->do_upload('foreign_exchange_fluctuations_file'))
					{ $error = array('error' => $this->upload->display_errors()); $foreign_exchange_fluctuations_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$foreign_exchange_fluctuations_file = $data['upload_data']['file_name'];
						
						$file1 = array(
						'foreign_exchange_fluctuations_file' => $foreign_exchange_fluctuations_file,
						);
						$this->WM->update_section_b4_file($file1, 'foreign_exchange_fluctuations_file');
					}
				
				}
				  unset($config);
				  
				if($_POST['chkNforeign'] == "no"){
					
					$file4 = array(
						'foreign_exchange_fluctuations_file' => "",
						);
						$this->db->where('user_id', $user_id);
						$this->db->where('app_id', $this->session->userdata('app_id'));
						$this->db->where('form_id', $this->session->userdata('form_id'));
						$this->db->update('tbl_section_b4_entity_appraisal_info', $file4);
				}
			
			$data = array(
				
				'user_id' => $user_id,
				'app_id'=>$this->session->userdata('app_id'),
				'form_id'=>$this->session->userdata('form_id'),
				'critical_factors_affecting_business_segment' => $this->input->POST('critical_factors_affecting_business_segment'),
				'key_developments_risks_challenges_opportunities_business_segment' => $this->input->POST('key_developments_risks_challenges_opportunities_business_segment'),
				
				'chkForeign' => $this->input->POST('chkForeign'),
				
				'foreign_currency_exposure_durng_pst_4_yr_profit_loss' =>  $this->input->POST('foreign_currency_exposure_durng_pst_4_yr_profit_loss'),
				
				'sundry_debtors_and_sundry_creditors_contitutng_last_audtd_yr' =>  $this->input->POST('sundry_debtors_and_sundry_creditors_contitutng_last_audtd_yr'),
				
			);
				$this->db->where('user_id', $user_id);
				$this->db->where('app_id', $this->session->userdata('app_id'));
				$this->db->where('form_id', $this->session->userdata('form_id'));
				$this->db->update('tbl_section_b4_entity_appraisal_info', $data);
					
				redirect(base_url()."form2/secform/step-5");
				
			}
			else{
				
				//insert query------------------------------
				
			$config['upload_path'] = './uploads/form2/';
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
				if(!empty($_FILES['business_and_financial_policy_company_file']['name'])){
					
				 if ( ! $this->upload->do_upload('business_and_financial_policy_company_file'))
					{ $error = array('error' => $this->upload->display_errors()); $business_and_financial_policy_company_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$business_and_financial_policy_company_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$business_and_financial_policy_company_file = '';
				}
				  unset($config);
				  
				  if(!empty($_FILES['major_business_segments_file']['name'])){
					
				 if ( ! $this->upload->do_upload('major_business_segments_file'))
					{ $error = array('error' => $this->upload->display_errors()); $major_business_segments_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$major_business_segments_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$major_business_segments_file = '';
				}
				  unset($config);
				  
				  if(!empty($_FILES['business_sgmt_provid_latest_audited_financial_year_file']['name'])){
					
				 if ( ! $this->upload->do_upload('business_sgmt_provid_latest_audited_financial_year_file'))
					{ $error = array('error' => $this->upload->display_errors()); $business_sgmt_provid_latest_audited_financial_year_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$business_sgmt_provid_latest_audited_financial_year_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$business_sgmt_provid_latest_audited_financial_year_file = '';
				}
				  unset($config);
				  
				  if(!empty($_FILES['foreign_exchange_fluctuations_file']['name'])){
					
				 if ( ! $this->upload->do_upload('foreign_exchange_fluctuations_file'))
					{ $error = array('error' => $this->upload->display_errors()); $foreign_exchange_fluctuations_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$foreign_exchange_fluctuations_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$foreign_exchange_fluctuations_file = '';
				}
				  unset($config);
			
			$data = array(
				
				'user_id' => $user_id,
				'app_id'=>$this->session->userdata('app_id'),
				'form_id'=> $this->session->userdata('form_id'),
				'critical_factors_affecting_business_segment' => $this->input->POST('critical_factors_affecting_business_segment'),
				'key_developments_risks_challenges_opportunities_business_segment' => $this->input->POST('key_developments_risks_challenges_opportunities_business_segment'),
				
				'chkForeign' => $this->input->POST('chkForeign'),
				
				'foreign_currency_exposure_durng_pst_4_yr_profit_loss' =>  $this->input->POST('foreign_currency_exposure_durng_pst_4_yr_profit_loss'),
				
				'sundry_debtors_and_sundry_creditors_contitutng_last_audtd_yr' =>  $this->input->POST('sundry_debtors_and_sundry_creditors_contitutng_last_audtd_yr'),
				'business_and_financial_policy_company_file' => $business_and_financial_policy_company_file,
				'major_business_segments_file' => $major_business_segments_file,
				'business_sgmt_provid_latest_audited_financial_year_file' => $business_sgmt_provid_latest_audited_financial_year_file,
				'foreign_exchange_fluctuations_file' => $foreign_exchange_fluctuations_file
			);
				$this->db->insert("tbl_section_b4_entity_appraisal_info", $data);
				
				if($new_id == 'GN'){
			   $data = array(
						'url' => "form2/secform/step-5",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_generation_a', $data);
		   }if($new_id == 'RN'){
			    $data = array(
                    'url' => "form2/secform/step-5",
                );
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
		   }
					
				redirect(base_url()."form2/secform/step-5");
				
			}
			
				}else{
				//$error = array('project_name' => form_error('project_name'));
				$error = $this->form_validation->error_array();
				$this->session->set_flashdata('step4', $error);
				redirect(base_url()."form2/secform/step-4");
			}		
		}
	}
	public function sectionb5()
	{
		$user_id = $this->session->userdata('user')['id'];
		$app_id = $this->session->userdata('app_id');
 		$new_id = substr($app_id,4,2);
			
		if($this->input->method(TRUE)=="POST"){
			
			$chk5_user = $this->WM->fectch_sec_b5();
			
			$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
			$config = 	array(
					array(
							'field' => 'chkChangeposition',
							'label' => 'Has there been change in position of any contingent liabilities',
							'rules' => 'trim|required|max_length[5]|alpha',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'positn_change_contingnt_liabilites_last_blance_sheet',
							'label' => 'position of any contingent liabilities',
							'rules' => 'trim|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'accounts_contained_latest_annual_report',
							'label' => 'Any significant changes affecting position',
							'rules' => 'trim|required|max_length[100]|alpha',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'updates_on_litigations_contained_anuual_report',
							'label' => 'Updates on litigations as contained in latest Annual report',
							'rules' => 'trim|required|max_length[100]|alpha',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'off_balance_sheet_items',
							'label' => 'Please give a note on off balance sheet items such as guarantees',
							'rules' => 'trim|required|max_length[100]|alpha',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'reasons_for_interest_accrued',
							'label' => 'Reasons for interest accrued',
							'rules' => 'trim|required|max_length[100]|alpha',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
				);
				$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE)
			{
			
			if($chk5_user){
				
				
				//update query------------------
				
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
				if(!empty($_FILES['annual_report_file']['name'])){
					
				 if ( ! $this->upload->do_upload('annual_report_file'))
					{ $error = array('error' => $this->upload->display_errors()); $annual_report_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$annual_report_file = $data['upload_data']['file_name'];
						
						$file1 = array(
						'annual_report_file' => $annual_report_file,
						);
						
						$this->WM->update_section_b5_file($file1, "annual_report_file");
					}
				
				}
				  unset($config);
				
				if(!empty($_FILES['audited_information_last_four_financial_years_file']['name'])){
					
				 if ( ! $this->upload->do_upload('audited_information_last_four_financial_years_file'))
					{ $error = array('error' => $this->upload->display_errors()); $audited_information_last_four_financial_years_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$audited_information_last_four_financial_years_file = $data['upload_data']['file_name'];
						
						$file1 = array(
						'audited_information_last_four_financial_years_file' => $audited_information_last_four_financial_years_file,
						);
					
						$this->WM->update_section_b5_file($file1, "audited_information_last_four_financial_years_file");
						
					}
				
				}
				  unset($config);
				  
				if(!empty($_FILES['detailed_note_reasons_material_file']['name'])){
					
				 if ( ! $this->upload->do_upload('detailed_note_reasons_material_file'))
					{ $error = array('error' => $this->upload->display_errors()); $detailed_note_reasons_material_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$detailed_note_reasons_material_file = $data['upload_data']['file_name'];
						
						$file1 = array(
						'detailed_note_reasons_material_file' => $detailed_note_reasons_material_file,
						);
						
						$this->WM->update_section_b5_file($file1, "detailed_note_reasons_material_file");
						
					}
				
				}
				  unset($config);
				  
				if(!empty($_FILES['excel_based_financial_model_for_projection_file']['name'])){
					
				 if ( ! $this->upload->do_upload('excel_based_financial_model_for_projection_file'))
					{ $error = array('error' => $this->upload->display_errors()); $excel_based_financial_model_for_projection_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$excel_based_financial_model_for_projection_file = $data['upload_data']['file_name'];
						
						$file1 = array(
						'excel_based_financial_model_for_projection_file' => $excel_based_financial_model_for_projection_file,
						);
						
						$this->WM->update_section_b5_file($file1, "excel_based_financial_model_for_projection_file");
					}
				
				}
				  unset($config);
				  
				if(!empty($_FILES['cmplete_detail_of_contigent_liability_excess_file']['name'])){
					
				 if ( ! $this->upload->do_upload('cmplete_detail_of_contigent_liability_excess_file'))
					{ $error = array('error' => $this->upload->display_errors()); $cmplete_detail_of_contigent_liability_excess_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$cmplete_detail_of_contigent_liability_excess_file = $data['upload_data']['file_name'];
						
						$file1 = array(
						'cmplete_detail_of_contigent_liability_excess_file' => $cmplete_detail_of_contigent_liability_excess_file,
						);
						
						$this->WM->update_section_b5_file($file1, "cmplete_detail_of_contigent_liability_excess_file");
						
					}
				
				}
				  unset($config);
				  
				if(!empty($_FILES['details_fresh_litigations_file']['name'])){
					
				 if ( ! $this->upload->do_upload('details_fresh_litigations_file'))
					{ $error = array('error' => $this->upload->display_errors()); $details_fresh_litigations_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$details_fresh_litigations_file = $data['upload_data']['file_name'];
						
						$file1 = array(
						'details_fresh_litigations_file' => $details_fresh_litigations_file,
						);
						
						$this->WM->update_section_b5_file($file1, "details_fresh_litigations_file");
						
					}
				
				}
				  unset($config);
				  
				if(!empty($_FILES['existing_borrowing_arrangements_file']['name'])){
					
				 if ( ! $this->upload->do_upload('existing_borrowing_arrangements_file'))
					{ $error = array('error' => $this->upload->display_errors()); $existing_borrowing_arrangements_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$existing_borrowing_arrangements_file = $data['upload_data']['file_name'];
						
						$file1 = array(
						'existing_borrowing_arrangements_file' => $existing_borrowing_arrangements_file,
						);
						
						$this->WM->update_section_b5_file($file1, "existing_borrowing_arrangements_file");
					}
				
				}
				  unset($config);
				  if($_POST['chkChangeposition'] == "yes"){
					  $positn_change_contingnt_liabilites_last_blance_sheet = $this->input->POST('positn_change_contingnt_liabilites_last_blance_sheet');
					  }else{
						  $positn_change_contingnt_liabilites_last_blance_sheet = "" ;
					  }
				$data = array(
					'user_id' => $user_id,
					'app_id'=>$this->session->userdata('app_id'),
					'form_id'=> $this->session->userdata('form_id'),
					'chkChangeposition' => $this->input->POST('chkChangeposition'),
					'positn_change_contingnt_liabilites_last_blance_sheet' => $positn_change_contingnt_liabilites_last_blance_sheet,
					'accounts_contained_latest_annual_report' => $this->input->POST('accounts_contained_latest_annual_report'),
					'updates_on_litigations_contained_anuual_report' => $this->input->POST('updates_on_litigations_contained_anuual_report'),
					'off_balance_sheet_items' => $this->input->POST('off_balance_sheet_items'),
					'reasons_for_interest_accrued' => $this->input->POST('reasons_for_interest_accrued'),
					
				);  
				
				
				
				 $this->db->where('user_id', $user_id);
				 $this->db->where('app_id', $this->session->userdata('app_id'));
				 $this->db->where('form_id', $this->session->userdata('form_id'));
				 $this->db->update("tbl_section_b5_entity_appraisal_info", $data);
				 redirect(base_url()."form2/secform/step-6");
				
		}else{
				//insert query---------------------------------------
				
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
				if(!empty($_FILES['annual_report_file']['name'])){
					
				 if ( ! $this->upload->do_upload('annual_report_file'))
					{ $error = array('error' => $this->upload->display_errors()); $annual_report_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$annual_report_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$annual_report_file = '';
				}
				  unset($config);
				
				if(!empty($_FILES['audited_information_last_four_financial_years_file']['name'])){
					
				 if ( ! $this->upload->do_upload('audited_information_last_four_financial_years_file'))
					{ $error = array('error' => $this->upload->display_errors()); $audited_information_last_four_financial_years_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$audited_information_last_four_financial_years_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$audited_information_last_four_financial_years_file = '';
				}
				  unset($config);
				  
				if(!empty($_FILES['detailed_note_reasons_material_file']['name'])){
					
				 if ( ! $this->upload->do_upload('detailed_note_reasons_material_file'))
					{ $error = array('error' => $this->upload->display_errors()); $detailed_note_reasons_material_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$detailed_note_reasons_material_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$detailed_note_reasons_material_file = '';
				}
				  unset($config);
				  
				if(!empty($_FILES['excel_based_financial_model_for_projection_file']['name'])){
					
				 if ( ! $this->upload->do_upload('excel_based_financial_model_for_projection_file'))
					{ $error = array('error' => $this->upload->display_errors()); $excel_based_financial_model_for_projection_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$excel_based_financial_model_for_projection_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$excel_based_financial_model_for_projection_file = '';
				}
				  unset($config);
				  
				if(!empty($_FILES['cmplete_detail_of_contigent_liability_excess_file']['name'])){
					
				 if ( ! $this->upload->do_upload('cmplete_detail_of_contigent_liability_excess_file'))
					{ $error = array('error' => $this->upload->display_errors()); $cmplete_detail_of_contigent_liability_excess_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$cmplete_detail_of_contigent_liability_excess_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$cmplete_detail_of_contigent_liability_excess_file = '';
				}
				  unset($config);
				  
				if(!empty($_FILES['details_fresh_litigations_file']['name'])){
					
				 if ( ! $this->upload->do_upload('details_fresh_litigations_file'))
					{ $error = array('error' => $this->upload->display_errors()); $details_fresh_litigations_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$details_fresh_litigations_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$details_fresh_litigations_file = '';
				}
				  unset($config);
				  
				if(!empty($_FILES['existing_borrowing_arrangements_file']['name'])){
					
				 if ( ! $this->upload->do_upload('existing_borrowing_arrangements_file'))
					{ $error = array('error' => $this->upload->display_errors()); $existing_borrowing_arrangements_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$existing_borrowing_arrangements_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$existing_borrowing_arrangements_file = '';
				}
				  unset($config);
				  
				$data = array(
					'user_id' => $user_id,
					'app_id'=>$this->session->userdata('app_id'),
					'form_id'=> $this->session->userdata('form_id'),
					'chkChangeposition' => $this->input->POST('chkChangeposition'),
					'positn_change_contingnt_liabilites_last_blance_sheet' => $this->input->POST('positn_change_contingnt_liabilites_last_blance_sheet'),
					'accounts_contained_latest_annual_report' => $this->input->POST('accounts_contained_latest_annual_report'),
					'updates_on_litigations_contained_anuual_report' => $this->input->POST('updates_on_litigations_contained_anuual_report'),
					'off_balance_sheet_items' => $this->input->POST('off_balance_sheet_items'),
					'reasons_for_interest_accrued' => $this->input->POST('reasons_for_interest_accrued'),
					'annual_report_file' => $annual_report_file,
					'audited_information_last_four_financial_years_file' => $audited_information_last_four_financial_years_file,
					'detailed_note_reasons_material_file' => $detailed_note_reasons_material_file,
					'excel_based_financial_model_for_projection_file' => $excel_based_financial_model_for_projection_file,
					'cmplete_detail_of_contigent_liability_excess_file' => $cmplete_detail_of_contigent_liability_excess_file,
					'details_fresh_litigations_file' => $details_fresh_litigations_file,
					'existing_borrowing_arrangements_file' => $existing_borrowing_arrangements_file
				);  
				 $this->db->insert("tbl_section_b5_entity_appraisal_info", $data);
				 
				if($new_id == 'GN'){
			   $data = array(
						'url' => "form2/secform/step-6",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_generation_a', $data);
		   }if($new_id == 'RN'){
			    $data = array(
                    'url' => "form2/secform/step-6",
                );
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
		   }
				
				 redirect(base_url()."form2/secform/step-6");
			}
			}else{
				//$error = array('project_name' => form_error('project_name'));
				$error = $this->form_validation->error_array();
				$this->session->set_flashdata('step5', $error);
				redirect(base_url()."form2/secform/step-5");
			}
		}
	
	}
	public function sectionb6()
	{
		
		$user_id = $this->session->userdata('user')['id'];
		$app_id = $this->session->userdata('app_id');
 		$new_id = substr($app_id,4,2);
			
		if($this->input->method(TRUE)=="POST"){
			
			$chk6_user = $this->WM->fectch_sec_b6();
			
			$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
			$config = 	array(
					array(
							'field' => 'name_and_address_of_the_main_bankers_having_business_deal',
							'label' => 'Name and address of the main Bankers',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'change_shareholding_and_management',
							'label' => 'Changes in shareholding and management in past 4 years',
							'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'chkCharges',
							'label' => 'Name of Agency',
							'rules' => 'trim|required|max_length[4]|alpha',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} Invalid Input.',
								)
					),
					array(
							'field' => 'loan_syndication_consultant_along_appointment',
							'label' => 'Name of Agency',
							'rules' => 'trim|max_length[100]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} Invalid Input.',
									
								)
					),
					array(
							'field' => 'due_diligence_report',
							'label' => 'Due diligence report',
							'rules' => 'trim|required|max_length[500]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'chkAClitigation',
							'label' => 'Undertaking for Litigations',
							'rules' => 'trim|required|max_length[4]|alpha',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} Invalid Input.',
								)
					),
					array(
							'field' => 'undrtking_litigatn_for_each_prmotr',
							'label' => 'Undertaking for Litigations',
							'rules' => 'trim|max_length[500]|alpha_numeric_spaces',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'undertake_financing_of_project',
							'label' => 'Names of the promoters proposing',
							'rules' => 'trim|required|max_length[500]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
				);
				$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE)
			{
			
			if($chk6_user){
				//update query-------------------------
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
				if(!empty($_FILES['certificate_preferably_from_company_regard_cmpliance_file']['name'])){
					
				 if ( ! $this->upload->do_upload('certificate_preferably_from_company_regard_cmpliance_file'))
					{ $error = array('error' => $this->upload->display_errors()); $certificate_preferably_from_company_regard_cmpliance_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$certificate_preferably_from_company_regard_cmpliance_file = $data['upload_data']['file_name'];
						
						$file1 =array(
							'certificate_preferably_from_company_regard_cmpliance_file' => $certificate_preferably_from_company_regard_cmpliance_file,
						);
						
						$this->WM->update_section_b6_file($file1, "certificate_preferably_from_company_regard_cmpliance_file");

						
					}
				
				}
				 
				  
				  if(!empty($_FILES['mca_website_duly_certified_file']['name'])){
					
				 if ( ! $this->upload->do_upload('mca_website_duly_certified_file'))
					{ $error = array('error' => $this->upload->display_errors()); $mca_website_duly_certified_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$mca_website_duly_certified_file = $data['upload_data']['file_name'];
						
						$file1 =array(
							'mca_website_duly_certified_file' => $mca_website_duly_certified_file,
						);
						
						$this->WM->update_section_b6_file($file1, "mca_website_duly_certified_file");
					}
				
				}
				 
					
					if($_POST['chkCharges'] == "no"){
						
						$loan_syndication_consultant_along_appointment_file = "" ;
						
						$file1 =array(
							'loan_syndication_consultant_along_appointment_file' => $loan_syndication_consultant_along_appointment_file,
						);
						
						$this->WM->update_section_b6_file($file1, "loan_syndication_consultant_along_appointment_file");
						
					}
				  
				  if(!empty($_FILES['loan_syndication_consultant_along_appointment_file']['name'])){
					
				 if ( ! $this->upload->do_upload('loan_syndication_consultant_along_appointment_file'))
					{ $error = array('error' => $this->upload->display_errors()); $loan_syndication_consultant_along_appointment_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$loan_syndication_consultant_along_appointment_file = $data['upload_data']['file_name'];
						
						$file1 =array(
							'loan_syndication_consultant_along_appointment_file' => $loan_syndication_consultant_along_appointment_file,
						);
						
						$this->WM->update_section_b6_file($file1, "loan_syndication_consultant_along_appointment_file");
						
					}
				
				}
				 
				  
				  if(!empty($_FILES['latest_cma_information_provided_your_working_bankers_file']['name'])){
					
				 if ( ! $this->upload->do_upload('latest_cma_information_provided_your_working_bankers_file'))
					{ $error = array('error' => $this->upload->display_errors()); $latest_cma_information_provided_your_working_bankers_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$latest_cma_information_provided_your_working_bankers_file = $data['upload_data']['file_name'];
						
						$file1 =array(
							'latest_cma_information_provided_your_working_bankers_file' => $latest_cma_information_provided_your_working_bankers_file,
						);
						
						$this->WM->update_section_b6_file($file1, "latest_cma_information_provided_your_working_bankers_file");
					}
				
				}
				  
				  
				  if(!empty($_FILES['details_criminal_cases_file']['name'])){
					
				 if ( ! $this->upload->do_upload('details_criminal_cases_file'))
					{ $error = array('error' => $this->upload->display_errors()); $details_criminal_cases_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$details_criminal_cases_file = $data['upload_data']['file_name'];
						
						$file1 =array(
							'details_criminal_cases_file' => $details_criminal_cases_file,
						);
						
						$this->WM->update_section_b6_file($file1, "details_criminal_cases_file");
					}
				
				}
				
				  
					if($_POST['chkCharges'] == "yes"){
						
						$loan_syndication_consultant_along_appointment = $this->input->POST("loan_syndication_consultant_along_appointment");
					}else{
						$loan_syndication_consultant_along_appointment = "" ;
					}
				  
				$data =  array(
					
					'user_id' => $user_id,
					'app_id'=>$this->session->userdata('app_id'),
					'form_id'=> $this->session->userdata('form_id'),
					'name_and_address_of_the_main_bankers_having_business_deal' => $this->input->POST("name_and_address_of_the_main_bankers_having_business_deal"),
					'change_shareholding_and_management' => $this->input->POST("change_shareholding_and_management"),
					'chkCharges' => $this->input->POST("chkCharges"),
					'loan_syndication_consultant_along_appointment' => $loan_syndication_consultant_along_appointment,
					'due_diligence_report' => $this->input->POST("due_diligence_report"),
					'chkAClitigation' => $this->input->post('chkAClitigation'),
					'undrtking_litigatn_for_each_prmotr' => $this->input->post('undrtking_litigatn_for_each_prmotr'),
					'undertake_financing_of_project' => $this->input->POST("undertake_financing_of_project"),

					);
					
					$this->db->where('user_id', $user_id);
					$this->db->where('app_id', $this->session->userdata('app_id'));
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->update("tbl_section_b6_entity_appraisal_info", $data);
					redirect(base_url()."form2/secform/step-7");
				
			}else{
				//insert query-------------------------
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
			  if(!empty($_FILES['certificate_preferably_from_company_regard_cmpliance_file']['name'])){
					
				 if ( ! $this->upload->do_upload('certificate_preferably_from_company_regard_cmpliance_file'))
					{ $error = array('error' => $this->upload->display_errors()); $certificate_preferably_from_company_regard_cmpliance_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$certificate_preferably_from_company_regard_cmpliance_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$certificate_preferably_from_company_regard_cmpliance_file = '';
				}
				 
				  
				  if(!empty($_FILES['mca_website_duly_certified_file']['name'])){
					
				 if ( ! $this->upload->do_upload('mca_website_duly_certified_file'))
					{ $error = array('error' => $this->upload->display_errors()); $mca_website_duly_certified_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$mca_website_duly_certified_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$mca_website_duly_certified_file = '';
				}
				  
				  
				  if(!empty($_FILES['loan_syndication_consultant_along_appointment_file']['name'])){
					
				 if ( ! $this->upload->do_upload('loan_syndication_consultant_along_appointment_file'))
					{ $error = array('error' => $this->upload->display_errors()); $loan_syndication_consultant_along_appointment_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$loan_syndication_consultant_along_appointment_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$loan_syndication_consultant_along_appointment_file = '';
				}
				 
				  
				  if(!empty($_FILES['latest_cma_information_provided_your_working_bankers_file']['name'])){
					
				 if ( ! $this->upload->do_upload('latest_cma_information_provided_your_working_bankers_file'))
					{ $error = array('error' => $this->upload->display_errors()); $latest_cma_information_provided_your_working_bankers_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$latest_cma_information_provided_your_working_bankers_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$latest_cma_information_provided_your_working_bankers_file = '';
				}
				
				  
				  if(!empty($_FILES['details_criminal_cases_file']['name'])){
					
				 if ( ! $this->upload->do_upload('details_criminal_cases_file'))
					{ $error = array('error' => $this->upload->display_errors()); $details_criminal_cases_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$details_criminal_cases_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$details_criminal_cases_file = '';
				} 
				  
				$data =  array(
					
					'user_id' => $user_id,
					'app_id'=>$this->session->userdata('app_id'),
					'form_id'=> $this->session->userdata('form_id'),
					'name_and_address_of_the_main_bankers_having_business_deal' => $this->input->POST("name_and_address_of_the_main_bankers_having_business_deal"),
					'change_shareholding_and_management' => $this->input->POST("change_shareholding_and_management"),
					'chkCharges' => $this->input->POST("chkCharges"),
					'loan_syndication_consultant_along_appointment' => $this->input->POST("loan_syndication_consultant_along_appointment"),
					'due_diligence_report' => $this->input->POST("due_diligence_report"),
					'chkAClitigation' => $this->input->post('chkAClitigation'),
					'undrtking_litigatn_for_each_prmotr' => $this->input->post('undrtking_litigatn_for_each_prmotr'),
					'undertake_financing_of_project' => $this->input->POST("undertake_financing_of_project"),
					'certificate_preferably_from_company_regard_cmpliance_file' => $certificate_preferably_from_company_regard_cmpliance_file,
					'mca_website_duly_certified_file' => $mca_website_duly_certified_file,
					'loan_syndication_consultant_along_appointment_file' => $loan_syndication_consultant_along_appointment_file,
					'latest_cma_information_provided_your_working_bankers_file' => $latest_cma_information_provided_your_working_bankers_file,
					'details_criminal_cases_file' => $details_criminal_cases_file
					);
					
					$this->db->insert("tbl_section_b6_entity_appraisal_info", $data);
					
					if($new_id == 'GN'){
			   $data = array(
						'url' => "form2/secform/step-7",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_generation_a', $data);
				}if($new_id == 'RN'){
			    $data = array(
                    'url' => "form2/secform/step-7",
                );
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
		   }
					redirect(base_url()."form2/secform/step-7");
			}	
				}else{
				//$error = array('project_name' => form_error('project_name'));
				$error = $this->form_validation->error_array();
				$this->session->set_flashdata('step6', $error);
				redirect(base_url()."form2/secform/step-6");
			}
		}	  
	}
	public function sectionb7()
	{
		$user_id = $this->session->userdata('user')['id'];
		$app_id = $this->session->userdata('app_id');
		$new_id = substr($app_id,4,2);
			
		if($this->input->method(TRUE)=="POST"){
			
			$chk7_user = $this->WM->fectch_sec_b7();
			
							
				$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
				$config = 	array(
						array(
								'field' => 'indvduls_contrbutng_eqty_name',
								'label' => 'Name',
								'rules' => 'trim|required|max_length[20]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'pannumber',
								'label' => 'Pan',
								'rules' => 'trim|required|max_length[10]|callback_pan1',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'date_of_birth',
								'label' => 'Date of birth',
								'rules' => 'trim|required|max_length[12]|callback_SCOD1',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'curnt_address',
								'label' => 'Address',
								'rules' => 'trim|required|max_length[200]|callback_address',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'prmnt_address',
								'label' => 'Address',
								'rules' => 'trim|required|max_length[200]|callback_address',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'same_as',
								'label' => 'Same as current address',
								'rules' => 'trim|required|max_length[5]|alpha',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} Invalid Input.',
									)
						),
						array(
								'field' => 'telphne_no',
								'label' => 'Telephone No',
								'rules' => 'trim|required|max_length[12]|numeric',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} Invalid Input.',
										'numeric'	=> 	'{field} invalid Input',
									)
						),
						array(
								'field' => 'worth_statmnt_duly_crtifid_acountnt',
								'label' => 'Net worth statement duly certified',
								'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} Invalid Input.',
										
									)
						),
						array(
								'field' => 'wlth_tax_statmnt_crtifid_acountnt',
								'label' => 'Wealth tax statements duly certified',
								'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} Invalid Input.',
										
									)
						),
						array(
								'field' => 'incmetax_asesmnt_ordr',
								'label' => 'Latest Income tax/Wealth tax assessment order',
								'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} Invalid Input.',
										
									)
						),
						array(
								'field' => 'income_tax_return_past_3_yr',
								'label' => 'Income Tax Returns for past 3 years',
								'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} Invalid Input.',
										
									)
						),
						array(
								'field' => 'individuals_promoter',
								'label' => 'With other individual promoters',
								'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} Invalid Input.',
										
									)
						),
						array(
								'field' => 'corporate_promoter',
								'label' => 'With other corporate promoters',
								'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} Invalid Input.',
										
									)
						),
						array(
								'field' => 'wethr_indian_foreign_nationl',
								'label' => 'Whether Indian /Foreign National',
								'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} Invalid Input.',
										
									)
						),
						array(
								'field' => 'seling_real_estate_inclding_agrcltral_land_shares',
								'label' => 'Note on how the proposed equity contribution',
								'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} Invalid Input.',
										
									)
						),
						array(
								'field' => 'exstng_busines_oprtions',
								'label' => ' Note on existing business operations',
								'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} Invalid Input.',
										
									)
						),
						array(
								'field' => 'prmtrs_qulifctions_exprnce_in_mngng_busines',
								'label' => 'Note on promoters',
								'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} Invalid Input.',
										
									)
						),
						array(
								'field' => 'dtls_of_curent_over_dues',
								'label' => 'Details of current over dues',
								'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} Invalid Input.',
										
									)
						),
						array(
								'field' => 'rcovry_cdr_pckge_restrctring_reschdlng',
								'label' => 'track record with lenders during last 3 years',
								'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} Invalid Input.',
										
									)
						),
						
					);	

				$this->form_validation->set_rules($config);
					if ($this->form_validation->run() == TRUE)
					{
					
					
			if($chk7_user){
				
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
			  if(!empty($_FILES['pannumber_file']['name'])){
					
				 if ( ! $this->upload->do_upload('pannumber_file'))
					{ $error = array('error' => $this->upload->display_errors()); $pannumber_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$pannumber_file = $data['upload_data']['file_name'];
						
						$file1 =array(
							'pannumber_file' => $pannumber_file,
						);
						
						$this->WM->update_section_b7_file($file1, "pannumber_file");
					}
				
				}
				
				unset($config);
				
				 if(!empty($_FILES['date_of_birth_file']['name'])){
					
				 if ( ! $this->upload->do_upload('date_of_birth_file'))
					{ $error = array('error' => $this->upload->display_errors()); $date_of_birth_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$date_of_birth_file = $data['upload_data']['file_name'];
						
						$file1 =array(
							'date_of_birth_file' => $date_of_birth_file,
						);
						
						$this->WM->update_section_b7_file($file1, "date_of_birth_file");
					}
				
				}
				  
				unset($config);
				
				 if(!empty($_FILES['curnt_address_file']['name'])){
					
				 if ( ! $this->upload->do_upload('curnt_address_file'))
					{ $error = array('error' => $this->upload->display_errors()); $curnt_address_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$curnt_address_file = $data['upload_data']['file_name'];
						
						$file1 =array(
							'curnt_address_file' => $curnt_address_file,
						);
						
						$this->WM->update_section_b7_file($file1, "curnt_address_file");
					}
				
				}
				
				
				unset($config);
				
				 if(!empty($_FILES['prmnt_address_file']['name'])){
					
				 if ( ! $this->upload->do_upload('prmnt_address_file'))
					{ $error = array('error' => $this->upload->display_errors()); $prmnt_address_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$prmnt_address_file = $data['upload_data']['file_name'];
						
						$file1 =array(
							'prmnt_address_file' => $prmnt_address_file,
						);
						
						$this->WM->update_section_b7_file($file1, "prmnt_address_file");
						
					}
				
				}
				  unset($config);
				  
				   if(!empty($_FILES['worth_statmnt_duly_crtifid_acountnt_file']['name'])){
					
				 if ( ! $this->upload->do_upload('worth_statmnt_duly_crtifid_acountnt_file'))
					{ $error = array('error' => $this->upload->display_errors()); $worth_statmnt_duly_crtifid_acountnt_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$worth_statmnt_duly_crtifid_acountnt_file = $data['upload_data']['file_name'];
						
						$file1 =array(
							'worth_statmnt_duly_crtifid_acountnt_file' => $worth_statmnt_duly_crtifid_acountnt_file,
						);
						
						$this->WM->update_section_b7_file($file1, "worth_statmnt_duly_crtifid_acountnt_file");
					}
				
				}
				  unset($config);
				  
				   if(!empty($_FILES['wlth_tax_statmnt_crtifid_acountnt_file']['name'])){
					
				 if ( ! $this->upload->do_upload('wlth_tax_statmnt_crtifid_acountnt_file'))
					{ $error = array('error' => $this->upload->display_errors()); $wlth_tax_statmnt_crtifid_acountnt_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$wlth_tax_statmnt_crtifid_acountnt_file = $data['upload_data']['file_name'];
						
						$file1 =array(
							'wlth_tax_statmnt_crtifid_acountnt_file' => $wlth_tax_statmnt_crtifid_acountnt_file,
						);
						
						$this->WM->update_section_b7_file($file1, "wlth_tax_statmnt_crtifid_acountnt_file");
					}
				
				}
				
				
				unset($config);
				  
				   if(!empty($_FILES['incmetax_asesmnt_ordr_file']['name'])){
					
				 if ( ! $this->upload->do_upload('incmetax_asesmnt_ordr_file'))
					{ $error = array('error' => $this->upload->display_errors()); $incmetax_asesmnt_ordr_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$incmetax_asesmnt_ordr_file = $data['upload_data']['file_name'];
						
						$file1 =array(
							'incmetax_asesmnt_ordr_file' => $incmetax_asesmnt_ordr_file,
						);
						
						$this->WM->update_section_b7_file($file1, "incmetax_asesmnt_ordr_file");
					}
				
				}
				
				
				unset($config);
				  
				   if(!empty($_FILES['income_tax_return_past_3_yr_file']['name'])){
					
				 if ( ! $this->upload->do_upload('income_tax_return_past_3_yr_file'))
					{ $error = array('error' => $this->upload->display_errors()); $income_tax_return_past_3_yr_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$income_tax_return_past_3_yr_file = $data['upload_data']['file_name'];
						
						$file1 =array(
							'income_tax_return_past_3_yr_file' => $income_tax_return_past_3_yr_file,
						);
						
						$this->WM->update_section_b7_file($file1, "income_tax_return_past_3_yr_file");
					}
				
				}
				
				unset($config);
				  
				$data = array(
				
					'user_id' => $user_id,
					'app_id'=>$this->session->userdata('app_id'),
					'form_id'=> $this->session->userdata('form_id'),
					'indvduls_contrbutng_eqty_name' => $this->input->POST('indvduls_contrbutng_eqty_name'),
					'pannumber' =>  $this->input->POST('pannumber'),
					'date_of_birth' =>  $this->input->POST('date_of_birth'),
					'curnt_address' =>  $this->input->POST('curnt_address'),
					'prmnt_address' =>  $this->input->POST('prmnt_address'),
					'same_as' => $this->input->POST('same_as'),
					'telphne_no' =>  $this->input->POST('telphne_no'),
					'worth_statmnt_duly_crtifid_acountnt' =>  $this->input->POST('worth_statmnt_duly_crtifid_acountnt'),
					'wlth_tax_statmnt_crtifid_acountnt' =>  $this->input->POST('wlth_tax_statmnt_crtifid_acountnt'),
					'incmetax_asesmnt_ordr' =>  $this->input->POST('incmetax_asesmnt_ordr'),
					'income_tax_return_past_3_yr' =>  $this->input->POST('income_tax_return_past_3_yr'),
					'individuals_promoter' =>  $this->input->POST('individuals_promoter'),
					'corporate_promoter' =>  $this->input->POST('corporate_promoter'),
					'wethr_indian_foreign_nationl' =>  $this->input->POST('wethr_indian_foreign_nationl'),
					'seling_real_estate_inclding_agrcltral_land_shares' =>  $this->input->POST('seling_real_estate_inclding_agrcltral_land_shares'),
					'exstng_busines_oprtions' =>  $this->input->POST('exstng_busines_oprtions'),
					'prmtrs_qulifctions_exprnce_in_mngng_busines' =>  $this->input->POST('prmtrs_qulifctions_exprnce_in_mngng_busines'),
					'dtls_of_curent_over_dues' =>  $this->input->POST('dtls_of_curent_over_dues'),
					'rcovry_cdr_pckge_restrctring_reschdlng' =>  $this->input->POST('rcovry_cdr_pckge_restrctring_reschdlng'),
					
				);
				
				$this->db->where('user_id', $user_id);
				$this->db->where('app_id', $this->session->userdata('app_id'));
				$this->db->where('form_id', $this->session->userdata('form_id'));
				$this->db->update("tbl_section_b7_entity_appraisal_info", $data);
				
				redirect(base_url()."form2/secform/step-8");
			}else{
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
			  if(!empty($_FILES['pannumber_file']['name'])){
					
				 if ( ! $this->upload->do_upload('pannumber_file'))
					{ $error = array('error' => $this->upload->display_errors()); $pannumber_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$pannumber_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$pannumber_file = '';
				}
				
				unset($config);
				
				 if(!empty($_FILES['date_of_birth_file']['name'])){
					
				 if ( ! $this->upload->do_upload('date_of_birth_file'))
					{ $error = array('error' => $this->upload->display_errors()); $date_of_birth_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$date_of_birth_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$date_of_birth_file = '';
				}
				  
				unset($config);
				
				 if(!empty($_FILES['curnt_address_file']['name'])){
					
				 if ( ! $this->upload->do_upload('curnt_address_file'))
					{ $error = array('error' => $this->upload->display_errors()); $curnt_address_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$curnt_address_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$curnt_address_file = '';
				}
				
				
				unset($config);
				
				 if(!empty($_FILES['prmnt_address_file']['name'])){
					
				 if ( ! $this->upload->do_upload('prmnt_address_file'))
					{ $error = array('error' => $this->upload->display_errors()); $prmnt_address_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$prmnt_address_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$prmnt_address_file = '';
				}
				  unset($config);
				  
				   if(!empty($_FILES['worth_statmnt_duly_crtifid_acountnt_file']['name'])){
					
				 if ( ! $this->upload->do_upload('worth_statmnt_duly_crtifid_acountnt_file'))
					{ $error = array('error' => $this->upload->display_errors()); $worth_statmnt_duly_crtifid_acountnt_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$worth_statmnt_duly_crtifid_acountnt_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$worth_statmnt_duly_crtifid_acountnt_file = '';
				}
				  unset($config);
				  
				   if(!empty($_FILES['wlth_tax_statmnt_crtifid_acountnt_file']['name'])){
					
				 if ( ! $this->upload->do_upload('wlth_tax_statmnt_crtifid_acountnt_file'))
					{ $error = array('error' => $this->upload->display_errors()); $wlth_tax_statmnt_crtifid_acountnt_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$wlth_tax_statmnt_crtifid_acountnt_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$wlth_tax_statmnt_crtifid_acountnt_file = '';
				}
				
				
				unset($config);
				  
				   if(!empty($_FILES['incmetax_asesmnt_ordr_file']['name'])){
					
				 if ( ! $this->upload->do_upload('incmetax_asesmnt_ordr_file'))
					{ $error = array('error' => $this->upload->display_errors()); $incmetax_asesmnt_ordr_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$incmetax_asesmnt_ordr_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$incmetax_asesmnt_ordr_file = '';
				}
				
				
				unset($config);
				  
				   if(!empty($_FILES['income_tax_return_past_3_yr_file']['name'])){
					
				 if ( ! $this->upload->do_upload('income_tax_return_past_3_yr_file'))
					{ $error = array('error' => $this->upload->display_errors()); $income_tax_return_past_3_yr_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$income_tax_return_past_3_yr_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$income_tax_return_past_3_yr_file = '';
				}
				
				unset($config);
				  
				$data = array(
				
					'user_id' => $user_id,
					'app_id'=>$this->session->userdata('app_id'),
					'form_id'=> $this->session->userdata('form_id'),
					'indvduls_contrbutng_eqty_name' => $this->input->POST('indvduls_contrbutng_eqty_name'),
					'pannumber' =>  $this->input->POST('pannumber'),
					'date_of_birth' =>  $this->input->POST('date_of_birth'),
					'curnt_address' =>  $this->input->POST('curnt_address'),
					'prmnt_address' =>  $this->input->POST('prmnt_address'),
					'same_as' => $this->input->POST('same_as'),
					'telphne_no' =>  $this->input->POST('telphne_no'),
					'worth_statmnt_duly_crtifid_acountnt' =>  $this->input->POST('worth_statmnt_duly_crtifid_acountnt'),
					'wlth_tax_statmnt_crtifid_acountnt' =>  $this->input->POST('wlth_tax_statmnt_crtifid_acountnt'),
					'incmetax_asesmnt_ordr' =>  $this->input->POST('incmetax_asesmnt_ordr'),
					'income_tax_return_past_3_yr' =>  $this->input->POST('income_tax_return_past_3_yr'),
					'individuals_promoter' =>  $this->input->POST('individuals_promoter'),
					'corporate_promoter' =>  $this->input->POST('corporate_promoter'),
					'wethr_indian_foreign_nationl' =>  $this->input->POST('wethr_indian_foreign_nationl'),
					'seling_real_estate_inclding_agrcltral_land_shares' =>  $this->input->POST('seling_real_estate_inclding_agrcltral_land_shares'),
					'exstng_busines_oprtions' =>  $this->input->POST('exstng_busines_oprtions'),
					'prmtrs_qulifctions_exprnce_in_mngng_busines' =>  $this->input->POST('prmtrs_qulifctions_exprnce_in_mngng_busines'),
					'dtls_of_curent_over_dues' =>  $this->input->POST('dtls_of_curent_over_dues'),
					'rcovry_cdr_pckge_restrctring_reschdlng' =>  $this->input->POST('rcovry_cdr_pckge_restrctring_reschdlng'),
					'pannumber_file' => $pannumber_file,
					'date_of_birth_file' => $date_of_birth_file,
					'curnt_address_file' => $curnt_address_file,
					'prmnt_address_file' => $prmnt_address_file,
					'worth_statmnt_duly_crtifid_acountnt_file' => $worth_statmnt_duly_crtifid_acountnt_file,
					'wlth_tax_statmnt_crtifid_acountnt_file' => $wlth_tax_statmnt_crtifid_acountnt_file,
					'incmetax_asesmnt_ordr_file' => $incmetax_asesmnt_ordr_file,
					'income_tax_return_past_3_yr_file' => $income_tax_return_past_3_yr_file
				);
				$this->db->insert("tbl_section_b7_entity_appraisal_info", $data);
				
				if($new_id == 'GN'){
			   $data = array(
						'url' => "form2/secform/step-8",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_generation_a', $data);
				}if($new_id == 'RN'){
			    $data = array(
                    'url' => "form2/secform/step-8",
                );
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
				}
				redirect(base_url()."form2/secform/step-8");
			}	
				
				}else{
						$error = $this->form_validation->error_array();
						$this->session->set_flashdata('step7', $error);
						redirect(base_url()."form2/secform/step-7");
					}
		}		
	}
	
	public function sectionb8()
	{
		$user_id = $this->session->userdata('user')['id'];
		$app_id = $this->session->userdata('app_id');
		$new_id = substr($app_id,4,2);
		if($this->input->method(TRUE)=="POST"){
			
			$chk8_user = $this->WM->fectch_sec_b8();
			
			
			$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
				$config = 	array(
						array(
								'field' => 'corpus_fund_schm_makng_invstmnt',
								'label' => 'Name of the fund',
								'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'registrd_offce_addrs',
								'label' => 'Registered office address',
								'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'communicating_office_address',
								'label' => 'Communicating office address',
								'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'corpus_fund_email_address',
								'label' => 'Email address',
								'rules' => 'trim|required|max_length[100]|valid_email',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'corpus_fund_website_address',
								'label' => 'Website address',
								'rules' => 'trim|required|max_length[100]|valid_url',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'managerial_personnel',
								'label' => 'Key Managerial Personnel',
								'rules' => 'trim|required|max_length[100]|alpha',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'dorf',
								'label' => 'Whether Domestic/Foreign',
								'rules' => 'trim|required|max_length[12]|alpha',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'size_corpus_fnd_schm_mkng_invstmnt',
								'label' => 'Size/Corpus of the fund or scheme making the investment',
								'rules' => 'trim|required|max_length[7]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'chkCreditrating',
								'label' => 'Credit Rating ',
								'rules' => 'trim|required|max_length[5]|alpha',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'colorRadio',
								'label' => 'Whether term-sheet already signed',
								'rules' => 'trim|required|max_length[5]|alpha',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'whthr_trm_shet_elaborate',
								'label' => 'Please elaborate.',
								'rules' => 'trim|max_length[200]|alpha_numeric_spaces',
								'errors' => array(
										
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'sbscrptn_patrn_and_arangmnts_phsng_eqty',
								'label' => 'on equity subscription pattern.',
								'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'trm_shet_agremnt_prvde_buy_bck_asurd_rtrn_oblgtns_cmpny',
								'label' => 'Whether term-sheet/other agreement provide.',
								'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'fund_intr_alia_mngmnt',
								'label' => 'Management',
								'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'fund_intr_alia_bord_of_trshs',
								'label' => 'Board of Trustees',
								'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'fund_intr_alia_invstmnt_cmite',
								'label' => 'Investment Committee',
								'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'fund_intr_alia_sctr_expsre',
								'label' => 'Sector Exposures',
								'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'key_managment_evalation',
								'label' => 'Key management Evalation',
								'rules' => 'trim|required|max_length[100]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'rgstrtn_sts_with_regltry_bodes_in_india',
								'label' => 'Registration status with Regulatory',
								'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'applicable_regulatory_framework',
								'label' => 'applicable regulatory framework',
								'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'prpsd_invstd_durng_curncy_debt_frm_bnks_fis_planning',
								'label' => 'Proposed duration of the investment',
								'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
						array(
								'field' => 'whthr_eqty_invstmnt_prpsd_mde_dcrtly_cmpny',
								'label' => 'Whether equity investment is proposed',
								'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
					);

			$this->form_validation->set_rules($config);
				if ($this->form_validation->run() == TRUE)
				{
			
			if($chk8_user){
				
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
				 if(!empty($_FILES['registrd_offce_addrs_file']['name'])){
					
				 if ( ! $this->upload->do_upload('registrd_offce_addrs_file'))
					{ $error = array('error' => $this->upload->display_errors()); $registrd_offce_addrs_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$registrd_offce_addrs_file = $data['upload_data']['file_name'];
						
						$file1 = array(
							'registrd_offce_addrs_file' => $registrd_offce_addrs_file,
						);
						
						$this->WM->update_section_b8_file($file1, "registrd_offce_addrs_file");
					}
				
				}
				  unset($config);
				  
				   if(!empty($_FILES['communicating_office_address_file']['name'])){
					
				 if ( ! $this->upload->do_upload('communicating_office_address_file'))
					{ $error = array('error' => $this->upload->display_errors()); $communicating_office_address_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$communicating_office_address_file = $data['upload_data']['file_name'];
						
						$file1 = array(
							'communicating_office_address_file' => $communicating_office_address_file,
						);
						
						$this->WM->update_section_b8_file($file1, "communicating_office_address_file");
					}
				
				}
				  unset($config);
				  
			if($this->input->POST('chkCreditrating') == "yes"){
				  
				   if(!empty($_FILES['crdt_ratng_relvnt_certfcte_file']['name'])){
					
				 if ( ! $this->upload->do_upload('crdt_ratng_relvnt_certfcte_file'))
					{ $error = array('error' => $this->upload->display_errors()); $crdt_ratng_relvnt_certfcte_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$crdt_ratng_relvnt_certfcte_file = $data['upload_data']['file_name'];
						
						$file1 = array(
							'crdt_ratng_relvnt_certfcte_file' => $crdt_ratng_relvnt_certfcte_file,
						);
						
						$this->WM->update_section_b8_file($file1, "crdt_ratng_relvnt_certfcte_file");
						
					}
				
				}
			}else{
					$file1 = array(
							'crdt_ratng_relvnt_certfcte_file' => "",
						);
						
						$this->WM->update_section_b8_file($file1, "crdt_ratng_relvnt_certfcte_file");
			}
				  unset($config);
				
			if($this->input->POST('colorRadio') == "yes"){			
				  
				   if(!empty($_FILES['whthr_trm_shet_alrdy_signd_file']['name'])){
					
				 if ( ! $this->upload->do_upload('whthr_trm_shet_alrdy_signd_file'))
					{ $error = array('error' => $this->upload->display_errors()); $whthr_trm_shet_alrdy_signd_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$whthr_trm_shet_alrdy_signd_file = $data['upload_data']['file_name'];
						
						$file1 = array(
							'whthr_trm_shet_alrdy_signd_file' => $whthr_trm_shet_alrdy_signd_file,
						);
						
						$this->WM->update_section_b8_file($file1, "whthr_trm_shet_alrdy_signd_file");
					}
				
				}
			}else{
				$file1 = array(
							'whthr_trm_shet_alrdy_signd_file' => '',
						);
						
						$this->WM->update_section_b8_file($file1, "whthr_trm_shet_alrdy_signd_file");
			}
				  unset($config);
				  
				   if(!empty($_FILES['constiton_docmnts_memrndm_artcls_file']['name'])){
					
				 if ( ! $this->upload->do_upload('constiton_docmnts_memrndm_artcls_file'))
					{ $error = array('error' => $this->upload->display_errors()); $constiton_docmnts_memrndm_artcls_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$constiton_docmnts_memrndm_artcls_file = $data['upload_data']['file_name'];
						
						$file1 = array(
							'constiton_docmnts_memrndm_artcls_file' => $constiton_docmnts_memrndm_artcls_file,
						);
						
						$this->WM->update_section_b8_file($file1, "constiton_docmnts_memrndm_artcls_file");
						
					}
				
				}
				  unset($config);
				  
				   if(!empty($_FILES['anual_acounts_docmnts_file']['name'])){
					
				 if ( ! $this->upload->do_upload('anual_acounts_docmnts_file'))
					{ $error = array('error' => $this->upload->display_errors()); $anual_acounts_docmnts_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$anual_acounts_docmnts_file = $data['upload_data']['file_name'];
						
						$file1 = array(
							'anual_acounts_docmnts_file' => $anual_acounts_docmnts_file,
						);
						
						$this->WM->update_section_b8_file($file1, "anual_acounts_docmnts_file");
					}
				
				}
				  unset($config);
				  
				   if(!empty($_FILES['dtls_comncton_rec_and_authrsd_sgntry_authrty_ltr_file']['name'])){
					
				 if ( ! $this->upload->do_upload('dtls_comncton_rec_and_authrsd_sgntry_authrty_ltr_file'))
					{ $error = array('error' => $this->upload->display_errors()); $dtls_comncton_rec_and_authrsd_sgntry_authrty_ltr_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$dtls_comncton_rec_and_authrsd_sgntry_authrty_ltr_file = $data['upload_data']['file_name'];
						
						$file1 = array(
							'dtls_comncton_rec_and_authrsd_sgntry_authrty_ltr_file' => $dtls_comncton_rec_and_authrsd_sgntry_authrty_ltr_file,
						);
						
						$this->WM->update_section_b8_file($file1, "dtls_comncton_rec_and_authrsd_sgntry_authrty_ltr_file");
						
					}
				
				}
				  unset($config);
				  
				  if($_POST['colorRadio'] == "no"){
					  $whthr_trm_shet_elaborate = $this->input->POST('whthr_trm_shet_elaborate');
				  }else{
					  
					   $whthr_trm_shet_elaborate = "" ;
				  }
				
				$data =  array(
					
					'user_id' => $user_id,
					'app_id'=>$this->session->userdata('app_id'),
					'form_id'=> $this->session->userdata('form_id'),
					'corpus_fund_schm_makng_invstmnt' => $this->input->POST('corpus_fund_schm_makng_invstmnt'),
					'registrd_offce_addrs' => $this->input->POST('registrd_offce_addrs'),
					'communicating_office_address' => $this->input->POST('communicating_office_address'),
					'corpus_fund_email_address' => $this->input->POST('corpus_fund_email_address'),
					'corpus_fund_website_address' => $this->input->POST('corpus_fund_website_address'),
					'managerial_personnel' => $this->input->POST('managerial_personnel'),
					'dorf' => $this->input->POST('dorf'),
					'size_corpus_fnd_schm_mkng_invstmnt' => $this->input->POST('size_corpus_fnd_schm_mkng_invstmnt'),
					'chkCreditrating' => $this->input->POST('chkCreditrating'),
					'colorRadio' => $this->input->POST('colorRadio'),
					'whthr_trm_shet_elaborate' => $whthr_trm_shet_elaborate,
					'sbscrptn_patrn_and_arangmnts_phsng_eqty' => $this->input->POST('sbscrptn_patrn_and_arangmnts_phsng_eqty'),
					'trm_shet_agremnt_prvde_buy_bck_asurd_rtrn_oblgtns_cmpny' => $this->input->POST('trm_shet_agremnt_prvde_buy_bck_asurd_rtrn_oblgtns_cmpny'),
					'fund_intr_alia_mngmnt' => $this->input->POST('fund_intr_alia_mngmnt'),
					'fund_intr_alia_bord_of_trshs' => $this->input->POST('fund_intr_alia_bord_of_trshs'),
					'fund_intr_alia_invstmnt_cmite' => $this->input->POST('fund_intr_alia_invstmnt_cmite'),
					'fund_intr_alia_sctr_expsre' => $this->input->POST('fund_intr_alia_sctr_expsre'),
					'fund_intr_alia_cntry_expsre' => $this->input->POST('fund_intr_alia_cntry_expsre'),
					'key_managment_evalation' => $this->input->post('key_managment_evalation'),
					'rgstrtn_sts_with_regltry_bodes_in_india' => $this->input->POST('rgstrtn_sts_with_regltry_bodes_in_india'),
					'applicable_regulatory_framework' => $this->input->POST('applicable_regulatory_framework'),
					'prpsd_invstd_durng_curncy_debt_frm_bnks_fis_planning' => $this->input->POST('prpsd_invstd_durng_curncy_debt_frm_bnks_fis_planning'),
					'whthr_eqty_invstmnt_prpsd_mde_dcrtly_cmpny' => $this->input->POST('whthr_eqty_invstmnt_prpsd_mde_dcrtly_cmpny'),
					
				);
				$this->db->where("user_id", $user_id);
				$this->db->where('app_id', $this->session->userdata('app_id'));
				$this->db->where('form_id', $this->session->userdata('form_id'));
				$this->db->update("tbl_section_b8_entity_appraisal_info", $data);
				redirect(base_url()."form2/secform/step-9");
				
			}else{
				
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
				 if(!empty($_FILES['registrd_offce_addrs_file']['name'])){
					
				 if ( ! $this->upload->do_upload('registrd_offce_addrs_file'))
					{ $error = array('error' => $this->upload->display_errors()); $registrd_offce_addrs_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$registrd_offce_addrs_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$registrd_offce_addrs_file = '';
				}
				  unset($config);
				  
				   if(!empty($_FILES['communicating_office_address_file']['name'])){
					
				 if ( ! $this->upload->do_upload('communicating_office_address_file'))
					{ $error = array('error' => $this->upload->display_errors()); $communicating_office_address_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$communicating_office_address_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$communicating_office_address_file = '';
				}
				  unset($config);
				  
				   if(!empty($_FILES['crdt_ratng_relvnt_certfcte_file']['name'])){
					
				 if ( ! $this->upload->do_upload('crdt_ratng_relvnt_certfcte_file'))
					{ $error = array('error' => $this->upload->display_errors()); $crdt_ratng_relvnt_certfcte_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$crdt_ratng_relvnt_certfcte_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$crdt_ratng_relvnt_certfcte_file = '';
				}
				  unset($config);
				  
				   if(!empty($_FILES['whthr_trm_shet_alrdy_signd_file']['name'])){
					
				 if ( ! $this->upload->do_upload('whthr_trm_shet_alrdy_signd_file'))
					{ $error = array('error' => $this->upload->display_errors()); $whthr_trm_shet_alrdy_signd_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$whthr_trm_shet_alrdy_signd_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$whthr_trm_shet_alrdy_signd_file = '';
				}
				  unset($config);
				  
				   if(!empty($_FILES['constiton_docmnts_memrndm_artcls_file']['name'])){
					
				 if ( ! $this->upload->do_upload('constiton_docmnts_memrndm_artcls_file'))
					{ $error = array('error' => $this->upload->display_errors()); $constiton_docmnts_memrndm_artcls_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$constiton_docmnts_memrndm_artcls_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$constiton_docmnts_memrndm_artcls_file = '';
				}
				  unset($config);
				  
				   if(!empty($_FILES['anual_acounts_docmnts_file']['name'])){
					
				 if ( ! $this->upload->do_upload('anual_acounts_docmnts_file'))
					{ $error = array('error' => $this->upload->display_errors()); $anual_acounts_docmnts_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$anual_acounts_docmnts_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$anual_acounts_docmnts_file = '';
				}
				  unset($config);
				  
				   if(!empty($_FILES['dtls_comncton_rec_and_authrsd_sgntry_authrty_ltr_file']['name'])){
					
				 if ( ! $this->upload->do_upload('dtls_comncton_rec_and_authrsd_sgntry_authrty_ltr_file'))
					{ $error = array('error' => $this->upload->display_errors()); $dtls_comncton_rec_and_authrsd_sgntry_authrty_ltr_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$dtls_comncton_rec_and_authrsd_sgntry_authrty_ltr_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$dtls_comncton_rec_and_authrsd_sgntry_authrty_ltr_file = '';
				}
				  unset($config);
				
				$data =  array(
					
					'user_id' => $user_id,
					'app_id'=>$this->session->userdata('app_id'),
					'form_id'=> $this->session->userdata('form_id'),
					'corpus_fund_schm_makng_invstmnt' => $this->input->POST('corpus_fund_schm_makng_invstmnt'),
					'registrd_offce_addrs' => $this->input->POST('registrd_offce_addrs'),
					'communicating_office_address' => $this->input->POST('communicating_office_address'),
					'corpus_fund_email_address' => $this->input->POST('corpus_fund_email_address'),
					'corpus_fund_website_address' => $this->input->POST('corpus_fund_website_address'),
					'managerial_personnel' => $this->input->POST('managerial_personnel'),
					'dorf' => $this->input->POST('dorf'),
					'size_corpus_fnd_schm_mkng_invstmnt' => $this->input->POST('size_corpus_fnd_schm_mkng_invstmnt'),
					'chkCreditrating' => $this->input->POST('chkCreditrating'),
					'colorRadio' => $this->input->POST('colorRadio'),
					'whthr_trm_shet_elaborate' => $this->input->POST('whthr_trm_shet_elaborate'),
					'sbscrptn_patrn_and_arangmnts_phsng_eqty' => $this->input->POST('sbscrptn_patrn_and_arangmnts_phsng_eqty'),
					'trm_shet_agremnt_prvde_buy_bck_asurd_rtrn_oblgtns_cmpny' => $this->input->POST('trm_shet_agremnt_prvde_buy_bck_asurd_rtrn_oblgtns_cmpny'),
					'fund_intr_alia_mngmnt' => $this->input->POST('fund_intr_alia_mngmnt'),
					'fund_intr_alia_bord_of_trshs' => $this->input->POST('fund_intr_alia_bord_of_trshs'),
					'fund_intr_alia_invstmnt_cmite' => $this->input->POST('fund_intr_alia_invstmnt_cmite'),
					'fund_intr_alia_sctr_expsre' => $this->input->POST('fund_intr_alia_sctr_expsre'),
					'fund_intr_alia_cntry_expsre' => $this->input->POST('fund_intr_alia_cntry_expsre'),
					'key_managment_evalation' => $this->input->post('key_managment_evalation'),
					'rgstrtn_sts_with_regltry_bodes_in_india' => $this->input->POST('rgstrtn_sts_with_regltry_bodes_in_india'),
					'applicable_regulatory_framework' => $this->input->POST('applicable_regulatory_framework'),
					'prpsd_invstd_durng_curncy_debt_frm_bnks_fis_planning' => $this->input->POST('prpsd_invstd_durng_curncy_debt_frm_bnks_fis_planning'),
					'whthr_eqty_invstmnt_prpsd_mde_dcrtly_cmpny' => $this->input->POST('whthr_eqty_invstmnt_prpsd_mde_dcrtly_cmpny'),
					'registrd_offce_addrs_file' => $registrd_offce_addrs_file,
					'communicating_office_address_file' => $communicating_office_address_file,
					'crdt_ratng_relvnt_certfcte_file' => $crdt_ratng_relvnt_certfcte_file,
					'whthr_trm_shet_alrdy_signd_file' => $whthr_trm_shet_alrdy_signd_file,
					'constiton_docmnts_memrndm_artcls_file' => $constiton_docmnts_memrndm_artcls_file,
					'anual_acounts_docmnts_file' => $anual_acounts_docmnts_file,
					'dtls_comncton_rec_and_authrsd_sgntry_authrty_ltr_file' => $dtls_comncton_rec_and_authrsd_sgntry_authrty_ltr_file
					
				);
				$this->db->insert("tbl_section_b8_entity_appraisal_info", $data);
				
				if($new_id == 'GN'){
			   $data = array(
						'url' => "form2/secform/step-9",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_generation_a', $data);
		   }if($new_id == 'RN'){
			    $data = array(
                    'url' => "form2/secform/step-9",
                );
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
		   }
				
				redirect(base_url()."form2/secform/step-9");
			}
			}else{
					//$error = array('project_name' => form_error('project_name'));
					$error = $this->form_validation->error_array();
					$this->session->set_flashdata('step8', $error);
					redirect(base_url()."form2/secform/step-8");
				}
		}		
	}
	public function sectionb9()
	{
		
		$user_id = $this->session->userdata('user')['id'];
		$app_id =  $this->session->userdata('app_id');
		$new_id = substr($app_id,4,2);
			
		if($this->input->method(TRUE)=="POST"){
			
			$chk9_user = $this->WM->fectch_sec_b9();
			$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
	$config = 	array(
					array(
							'field' => 'banks_fis_brief_dtls',
							'label' => 'Banks/FIs/IFCs',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'banks_fis_asets_sze_advncd_invstmnts',
							'label' => 'Assets size',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'banks_fis_intnded_that_exrsze_mngmnt_cntrl',
							'label' => 'management control',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'chkRbicertificate',
							'label' => 'IFC/NBFC by RBI',
							'rules' => 'trim|max_length[5]|alpha',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'whethr_clasfied_rbi_date',
							'label' => 'Date',
							'rules' => 'trim|max_length[10]|callback_SCOD',
							'errors' => array(
									
									'max_length'     => '{field} must have at least {param} characters.',
									
								)
					),
					
					array(
							'field' => 'dtls_as_per_abve_extnt_aplicble',
							'label' => 'Details as per "B" above',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
				);	
				
	$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE)
			{
					
			
			if($chk9_user){
				   //update Query-----------------------------
				   
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
			 if($_POST['chkRbicertificate'] == "yes"){	
				if(!empty($_FILES['whethr_clasfied_rbi_rlvnt_crtfcate_file']['name'])){	
				 if ( ! $this->upload->do_upload('whethr_clasfied_rbi_rlvnt_crtfcate_file'))
					{ $error = array('error' => $this->upload->display_errors()); $whethr_clasfied_rbi_rlvnt_crtfcate_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$whethr_clasfied_rbi_rlvnt_crtfcate_file = $data['upload_data']['file_name'];
						
						$file1 = array(
							'whethr_clasfied_rbi_rlvnt_crtfcate_file' => $whethr_clasfied_rbi_rlvnt_crtfcate_file,
						);
						
						$this->WM->update_section_b9_file($file1, "whethr_clasfied_rbi_rlvnt_crtfcate_file");
					}
				}else{
				
							$file1 = array(
								'whethr_clasfied_rbi_rlvnt_crtfcate_file' => '',
							);
							$this->WM->update_section_b9_file($file1, "whethr_clasfied_rbi_rlvnt_crtfcate_file");
						}
			}else{
				$file1 = array(
								'whethr_clasfied_rbi_rlvnt_crtfcate_file' => '',
							);
							$this->WM->update_section_b9_file($file1, "whethr_clasfied_rbi_rlvnt_crtfcate_file");
			}		
				  unset($config);
				  
				  if($_POST['chkRbicertificate'] == "yes"){
					  $whethr_clasfied_rbi_crtfcate_no = $this->input->POST("whethr_clasfied_rbi_crtfcate_no");
					  $whethr_clasfied_rbi_date = $this->input->POST("whethr_clasfied_rbi_date");
				  }else{
					  $whethr_clasfied_rbi_crtfcate_no = "";
					  $whethr_clasfied_rbi_date = ""; 
					 
					  
					 
				  }
				  
				 $data = array (
				 
					'user_id' => $user_id,
					'app_id'=>$this->session->userdata('app_id'),
					'form_id'=> $this->session->userdata('form_id'),
					'banks_fis_brief_dtls' => $this->input->POST("banks_fis_brief_dtls"),
					'banks_fis_asets_sze_advncd_invstmnts' => $this->input->POST("banks_fis_asets_sze_advncd_invstmnts"),
					'banks_fis_intnded_that_exrsze_mngmnt_cntrl' => $this->input->POST("banks_fis_intnded_that_exrsze_mngmnt_cntrl"),
					'chkRbicertificate' => $this->input->POST("chkRbicertificate"),
					'whethr_clasfied_rbi_crtfcate_no' => $whethr_clasfied_rbi_crtfcate_no,
					'whethr_clasfied_rbi_date' =>  $whethr_clasfied_rbi_date,
					'dtls_as_per_abve_extnt_aplicble' => $this->input->POST("dtls_as_per_abve_extnt_aplicble"),
					
				 );
				 
				 $this->db->where('user_id', $user_id);
				 $this->db->where('app_id', $this->session->userdata('app_id'));
				 $this->db->where('form_id', $this->session->userdata('form_id'));
				 $this->db->update('tbl_section_b9_entity_appraisal_info', $data);
				 redirect(base_url()."form2/secform/step-10");
				 
			}else
			{
				//insert Query-----------------------------
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
				
			if(!empty($_FILES['whethr_clasfied_rbi_rlvnt_crtfcate_file']['name'])){			
				 if ( ! $this->upload->do_upload('whethr_clasfied_rbi_rlvnt_crtfcate_file'))
					{ $error = array('error' => $this->upload->display_errors()); $whethr_clasfied_rbi_rlvnt_crtfcate_file = '';
				
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$whethr_clasfied_rbi_rlvnt_crtfcate_file = $data['upload_data']['file_name'];
						 
					}
			}else{
						
					$whethr_clasfied_rbi_rlvnt_crtfcate_file = $this->input->post('whethr_clasfied_rbi_rlvnt_crtfcate_file1');
							
							
			}	
				
				  unset($config);
				  
				 $data = array (
				 
					'user_id' => $user_id,
					'app_id'=>$this->session->userdata('app_id'),
					'form_id'=> $this->session->userdata('form_id'),
					'banks_fis_brief_dtls' => $this->input->POST("banks_fis_brief_dtls"),
					'banks_fis_asets_sze_advncd_invstmnts' => $this->input->POST("banks_fis_asets_sze_advncd_invstmnts"),
					'banks_fis_intnded_that_exrsze_mngmnt_cntrl' => $this->input->POST("banks_fis_intnded_that_exrsze_mngmnt_cntrl"),
					'chkRbicertificate' => $this->input->POST("chkRbicertificate"),
					'whethr_clasfied_rbi_crtfcate_no' => $this->input->POST("whethr_clasfied_rbi_crtfcate_no"),
					'whethr_clasfied_rbi_date' => $this->input->POST("whethr_clasfied_rbi_date"),
					'dtls_as_per_abve_extnt_aplicble' => $this->input->POST("dtls_as_per_abve_extnt_aplicble"),
					'whethr_clasfied_rbi_rlvnt_crtfcate_file' => $whethr_clasfied_rbi_rlvnt_crtfcate_file
				 );
				 
				 $this->db->insert('tbl_section_b9_entity_appraisal_info', $data);
				 
				 if($new_id == 'GN'){
			   $data = array(
						'url' => "form2/secform/step-10",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_generation_a', $data);
		   }if($new_id == 'RN'){
			    $data = array(
                    'url' => "form2/secform/step-10",
                );
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
		   }
				
				 redirect(base_url()."form2/secform/step-10");
			}
				
			}else{
				//$error = array('project_name' => form_error('project_name'));
				$error = $this->form_validation->error_array();
				$this->session->set_flashdata('step9', $error);
				redirect(base_url()."form2/secform/step-9");
			}	
		}	 
	}
	public function sectionb10() 
	{
		
		$user_id = $this->session->userdata('user')['id'];
		$app_id = $this->session->userdata('app_id');
		$new_id = substr($app_id,4,2);
		if($this->input->method(TRUE)=="POST"){
			
			$chk10_user = $this->WM->fectch_sec_b10($user_id);
			
			$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
	$config = 	array(
					array(
							'field' => 'nbfcs_new_ownd_funfs',
							'label' => 'New Owned Funds',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'nbfcs_track_recrd_prfts_pst_three_yrs',
							'label' => 'Track record of Profits',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'chkCreditrating1',
							'label' => 'Credit Rating',
							'rules' => 'trim|required|max_length[5]|alpha',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					
					array(
							'field' => 'dtls_as_per_b_abve_extnt_aplicble',
							'label' => 'Details as per "B" above',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'nature_of_eqty_suprt_arngmnts_phsng_eqty',
							'label' => 'Note on nature of equity support (cash or kind)',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'status_stge_alotmnt_of_eqty_shrs',
							'label' => 'Status/Stage of actual allotment',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
				);	
				
	$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE)
			{
		
			
			if($chk10_user){
				//update query------------------------------------
			$config['upload_path'] = './uploads/form2/';
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
				
			$this->upload->initialize($config);
			
			if(!empty($_FILES['nbfcs_crdt_rtng_rlvnt_crtfcate_file']['name'])){
				
			if ( ! $this->upload->do_upload('nbfcs_crdt_rtng_rlvnt_crtfcate_file'))
				{ $error = array('error' => $this->upload->display_errors()); $nbfcs_crdt_rtng_rlvnt_crtfcate_file = '';
				 
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$nbfcs_crdt_rtng_rlvnt_crtfcate_file = $data['upload_data']['file_name'];
					
					$file1 = array(
							'nbfcs_crdt_rtng_rlvnt_crtfcate_file' => $nbfcs_crdt_rtng_rlvnt_crtfcate_file,
						);
						
						$this->WM->update_section_b10_file($file1, "nbfcs_crdt_rtng_rlvnt_crtfcate_file");
				}
			
			}else{
				
				$file1 = array(
							'nbfcs_crdt_rtng_rlvnt_crtfcate_file' => "",
						);
						
						$this->WM->update_section_b10_file($file1, "nbfcs_crdt_rtng_rlvnt_crtfcate_file");
			 }
			
			unset($config);
			
			if(!empty($_FILES['docmnts_emntng_frm_gvrnmnt_eqty_comtmnt_prjct_file']['name'])){
				
			if ( ! $this->upload->do_upload('docmnts_emntng_frm_gvrnmnt_eqty_comtmnt_prjct_file'))
				{ $error = array('error' => $this->upload->display_errors()); $docmnts_emntng_frm_gvrnmnt_eqty_comtmnt_prjct_file = '';
				 
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$docmnts_emntng_frm_gvrnmnt_eqty_comtmnt_prjct_file = $data['upload_data']['file_name'];
					
					$file1 = array(
							'docmnts_emntng_frm_gvrnmnt_eqty_comtmnt_prjct_file' => $docmnts_emntng_frm_gvrnmnt_eqty_comtmnt_prjct_file,
						);
						
						$this->WM->update_section_b10_file($file1, "docmnts_emntng_frm_gvrnmnt_eqty_comtmnt_prjct_file");
					
				}
				
				}
				  unset($config);
				  
				if(is_array($this->session->userdata('app_id'))){
					$app_id = $this->session->userdata('app_id')['app_id'];
				}else{
					$app_id = $this->session->userdata('app_id');
				}
				  
				$data = array(
					
					'user_id' => $user_id,
					'app_id'=>$app_id,
					'form_id'=> $this->session->userdata('form_id'),
					'nbfcs_new_ownd_funfs' => $this->input->POST('nbfcs_new_ownd_funfs'),
					'nbfcs_track_recrd_prfts_pst_three_yrs' => $this->input->POST('nbfcs_track_recrd_prfts_pst_three_yrs'),
					'chkCreditrating1' => $this->input->POST('chkCreditrating1'),
					'dtls_as_per_b_abve_extnt_aplicble' => $this->input->POST('dtls_as_per_b_abve_extnt_aplicble'),
					'nature_of_eqty_suprt_arngmnts_phsng_eqty' => $this->input->POST('nature_of_eqty_suprt_arngmnts_phsng_eqty'),
					'status_stge_alotmnt_of_eqty_shrs' => $this->input->POST('status_stge_alotmnt_of_eqty_shrs'),
					
				);
				
						$this->db->where('user_id', $user_id);
						$this->db->where('app_id', $app_id);
						$this->db->where('form_id', $this->session->userdata('form_id'));
						$this->db->update("tbl_section_b10_entity_appraisal_info", $data);
						redirect(base_url()."form2/next_step1/");
			}else{
				//insert query------------------------------------
			$config['upload_path'] = './uploads/form2/';
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
				
			$this->upload->initialize($config);
			
			if(!empty($_FILES['nbfcs_crdt_rtng_rlvnt_crtfcate_file']['name'])){
				
			if ( ! $this->upload->do_upload('nbfcs_crdt_rtng_rlvnt_crtfcate_file'))
				{ $error = array('error' => $this->upload->display_errors()); $nbfcs_crdt_rtng_rlvnt_crtfcate_file = '';
				 
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$nbfcs_crdt_rtng_rlvnt_crtfcate_file = $data['upload_data']['file_name'];
					
				}
			
			}else{
				$nbfcs_crdt_rtng_rlvnt_crtfcate_file = '';
			}
			
			unset($config);
			
			if(!empty($_FILES['docmnts_emntng_frm_gvrnmnt_eqty_comtmnt_prjct_file']['name'])){
				
			if ( ! $this->upload->do_upload('docmnts_emntng_frm_gvrnmnt_eqty_comtmnt_prjct_file'))
				{ $error = array('error' => $this->upload->display_errors()); $docmnts_emntng_frm_gvrnmnt_eqty_comtmnt_prjct_file = '';
				 
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$docmnts_emntng_frm_gvrnmnt_eqty_comtmnt_prjct_file = $data['upload_data']['file_name'];
					
				}
				
				}else{
					$docmnts_emntng_frm_gvrnmnt_eqty_comtmnt_prjct_file = '';
				}
				  unset($config);
				  
				 if(is_array($this->session->userdata('app_id'))){
					$app_id = $this->session->userdata('app_id')['app_id'];
				}else{
					$app_id = $this->session->userdata('app_id');
				} 
				  
				$data = array(
					
					'user_id' => $user_id,
					'app_id'=>$app_id,
					'form_id'=> $this->session->userdata('form_id'),
					'nbfcs_new_ownd_funfs' => $this->input->POST('nbfcs_new_ownd_funfs'),
					'nbfcs_track_recrd_prfts_pst_three_yrs' => $this->input->POST('nbfcs_track_recrd_prfts_pst_three_yrs'),
					'chkCreditrating1' => $this->input->POST('chkCreditrating1'),
					'dtls_as_per_b_abve_extnt_aplicble' => $this->input->POST('dtls_as_per_b_abve_extnt_aplicble'),
					'nature_of_eqty_suprt_arngmnts_phsng_eqty' => $this->input->POST('nature_of_eqty_suprt_arngmnts_phsng_eqty'),
					'status_stge_alotmnt_of_eqty_shrs' => $this->input->POST('status_stge_alotmnt_of_eqty_shrs'),
					'nbfcs_crdt_rtng_rlvnt_crtfcate_file' => $nbfcs_crdt_rtng_rlvnt_crtfcate_file,
					'docmnts_emntng_frm_gvrnmnt_eqty_comtmnt_prjct_file' => $docmnts_emntng_frm_gvrnmnt_eqty_comtmnt_prjct_file
				);
				
				 $this->db->insert('tbl_section_b10_entity_appraisal_info', $data);
				 
				 if($new_id == 'GN'){
			   $data = array(
						'url' => "form2/next_step1/",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_generation_a', $data);
		   }if($new_id == 'RN'){
			    $data = array(
                    'url' => "form2/next_step1/",
                );
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
		   }
				 
				 redirect(base_url()."form2/next_step1/");
			}
			}else{
				//$error = array('project_name' => form_error('project_name'));
				$error = $this->form_validation->error_array();
				$this->session->set_flashdata('step10', $error);
				redirect(base_url()."form2/secform/step-10");
			}
		}
	}
	
	public function next_step1(){
		$user_id = $this->session->userdata('user')['id'];
		$app_id = $this->session->userdata('app_id');
		
		$check_user = $this->WM->check_borrower_form($app_id);
			$data['details']=$this->WM->get_firststep($app_id);
			$data['detail_sec']=$this->WM->get_secondstep($app_id);
			$data['detail_sec_mod']=$this->WM->get_secondstepmod($app_id);
			$data['detail_third']=$this->WM->get_thirdstep($app_id);
			$this->load->view('form2/first-first-step1',$data);
		
	}
	
	public function next_step2(){
		$user_id = $this->session->userdata('user')['id'];
		$data['sec_c1'] = $this->WM->fectch_sec_c1();
		$data['sec_c2'] = $this->WM->fectch_sec_c2();
		$data['sec_c3'] = $this->WM->fectch_sec_c3();
		$data['sec_c4'] = $this->WM->fectch_sec_c4();
		$this->load->view('form2/first-first-step2',$data);
		
	}
	public function sectionc1()
	{
	
		$user_id = $this->session->userdata('user')['id'];
		$app_id = $this->session->userdata('app_id');
		$new_id = substr($app_id,4,2);
			
		if($this->input->method(TRUE)=="POST"){
			
			$chk_c1_user = $this->WM->fectch_sec_c1();
			
			$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
		$config = 	array(
					array(
							'field' => 'respect_of_directors_name',
							'label' => 'Respect of Directors',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'respect_of_directors_age',
							'label' => 'Age',
							'rules' => 'trim|required|max_length[3]|numeric',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'respect_of_directors_address',
							'label' => 'Address',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'respect_of_directors_qualification',
							'label' => 'Qualification',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'respect_of_directors_pan',
							'label' => 'PAN',
							'rules' => 'trim|required|max_length[10]|callback_pan1',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					
					array(
							'field' => 'respect_of_directors_din',
							'label' => 'DIN',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'total_exprnce_pwr_sctr',
							'label' => 'Total Experience in power sector',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'total_exprnce_othr_sctr',
							'label' => 'Total Experience in other sectors',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'core_prmtrs_nature',
							'label' => 'Nature',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'relvnt_qulfcton_senr_mngmnt_prtflio',
							'label' => 'Relevant Qualification of the senior management ',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'total_exprnce_senior_mngmnt',
							'label' => 'Total experience of the senior management.',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'rlvnt_senr_mngmnt_curent_prtflio_handled',
							'label' => 'Relevant experience of the senior management current portfolio',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'timely_closng_finalztion_acounts',
							'label' => 'Timely closing and finalization of books of accounts',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					array(
							'field' => 'prtnrs_total_nmbrs_qualfed_cas',
							'label' => ' Partners and total number of qualified CAs',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'major_audts_othr_cmpny',
							'label' => 'Major audits of other companies',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'statry_audtrs_and_intrnl_audtrs',
							'label' => 'Statutory Auditor/Internal Auditor',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'presnce_indpndnt_intrnl_audt_dvsion',
							'label' => 'Presence of in house or independent Internal Audit Team/Division',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'constution_audt_comite_sctn_292',
							'label' => 'Audit Committee in consonance of Section 292',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'dtls_qulty_certfction_dasign_indpndnt_agncy',
							'label' => 'Details of quality certifications',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts',
							'label' => 'Core Promoters demonstrated their ability to satisfactorily',
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
			
			if($chk_c1_user){
				//Update Query-----------------------------
				
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
				if(!empty($_FILES['core_prmtrs_mngmnt_broad_based_optnl_atchmnt_file']['name'])){
					
				if ( ! $this->upload->do_upload('core_prmtrs_mngmnt_broad_based_optnl_atchmnt_file'))
					{ $error = array('error' => $this->upload->display_errors()); $core_prmtrs_mngmnt_broad_based_optnl_atchmnt_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$core_prmtrs_mngmnt_broad_based_optnl_atchmnt_file = $data['upload_data']['file_name'];
						
						$file1 = array(
							'core_prmtrs_mngmnt_broad_based_optnl_atchmnt_file' => $core_prmtrs_mngmnt_broad_based_optnl_atchmnt_file,
						);
						
						$this->WM->update_section_c1_file($file1, "core_prmtrs_mngmnt_broad_based_optnl_atchmnt_file");
					}
				
				}
				
				 
				
				if(!empty($_FILES['emply_qulifed_exprnc_mngmnt_optnl_atchmnt_file']['name'])){
					
				if ( ! $this->upload->do_upload('emply_qulifed_exprnc_mngmnt_optnl_atchmnt_file'))
					{ $error = array('error' => $this->upload->display_errors()); $emply_qulifed_exprnc_mngmnt_optnl_atchmnt_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$emply_qulifed_exprnc_mngmnt_optnl_atchmnt_file = $data['upload_data']['file_name'];
						
						$file1 = array(
							'emply_qulifed_exprnc_mngmnt_optnl_atchmnt_file' => $emply_qulifed_exprnc_mngmnt_optnl_atchmnt_file,
						);
						
						$this->WM->update_section_c1_file($file1, "emply_qulifed_exprnc_mngmnt_optnl_atchmnt_file");
					}
				
				}
				
				 
				
				if(!empty($_FILES['genraly_eficient_systms_prcedurs_optnl_atchmnt_file']['name'])){
					
				if ( ! $this->upload->do_upload('genraly_eficient_systms_prcedurs_optnl_atchmnt_file'))
					{ $error = array('error' => $this->upload->display_errors()); $genraly_eficient_systms_prcedurs_optnl_atchmnt_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$genraly_eficient_systms_prcedurs_optnl_atchmnt_file = $data['upload_data']['file_name'];
						
						$file1 = array(
							'genraly_eficient_systms_prcedurs_optnl_atchmnt_file' => $genraly_eficient_systms_prcedurs_optnl_atchmnt_file,
						);
						
						$this->WM->update_section_c1_file($file1, "genraly_eficient_systms_prcedurs_optnl_atchmnt_file");
					}
				
				}
				
				 
				
				if(!empty($_FILES['dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts_file']['name'])){
					
				if ( ! $this->upload->do_upload('dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts_file'))
					{ $error = array('error' => $this->upload->display_errors()); $dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts_file = $data['upload_data']['file_name'];
						
						$file1 = array(
							'dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts_file' => $dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts_file,
						);
						
						$this->WM->update_section_c1_file($file1, "dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts_file");	
					}
					
				
				}
				
				 
				
				if(!empty($_FILES['simlr_dtls_core_prmtrs_statry_audtr_certfcate_file']['name'])){
					
				if ( ! $this->upload->do_upload('simlr_dtls_core_prmtrs_statry_audtr_certfcate_file'))
					{ $error = array('error' => $this->upload->display_errors()); $simlr_dtls_core_prmtrs_statry_audtr_certfcate_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$simlr_dtls_core_prmtrs_statry_audtr_certfcate_file = $data['upload_data']['file_name'];
						
						$file1 = array(
							'simlr_dtls_core_prmtrs_statry_audtr_certfcate_file' => $simlr_dtls_core_prmtrs_statry_audtr_certfcate_file,
						);
					
						$this->WM->update_section_c1_file($file1, "simlr_dtls_core_prmtrs_statry_audtr_certfcate_file");

					}
				
				}
				
			 
				
				$data = array(
					'user_id' =>$user_id,
					'app_id'=>$this->session->userdata('app_id'),
					'form_id'=> $this->session->userdata('form_id'),
					'respect_of_directors_name' => $this->input->POST('respect_of_directors_name'),
					'respect_of_directors_age' => $this->input->POST('respect_of_directors_age'),
					'respect_of_directors_address' => $this->input->POST('respect_of_directors_address'),
					'respect_of_directors_qualification' => $this->input->POST('respect_of_directors_qualification'),
					'respect_of_directors_pan' => $this->input->POST('respect_of_directors_pan'),
					'respect_of_directors_din' => $this->input->POST('respect_of_directors_din'),
					'total_exprnce_pwr_sctr' => $this->input->POST('total_exprnce_pwr_sctr'),
					'total_exprnce_othr_sctr' => $this->input->POST('total_exprnce_othr_sctr'),
					'core_prmtrs_nature' => $this->input->POST('core_prmtrs_nature'),
					'relvnt_qulfcton_senr_mngmnt_prtflio' => $this->input->POST('relvnt_qulfcton_senr_mngmnt_prtflio'),
					'total_exprnce_senior_mngmnt' => $this->input->POST('total_exprnce_senior_mngmnt'),
					'rlvnt_senr_mngmnt_curent_prtflio_handled' => $this->input->POST('rlvnt_senr_mngmnt_curent_prtflio_handled'),
					'timely_closng_finalztion_acounts' => $this->input->POST('timely_closng_finalztion_acounts'),
					'prtnrs_total_nmbrs_qualfed_cas' => $this->input->POST('prtnrs_total_nmbrs_qualfed_cas'),
					'major_audts_othr_cmpny' => $this->input->POST('major_audts_othr_cmpny'),
					'statry_audtrs_and_intrnl_audtrs' => $this->input->POST('statry_audtrs_and_intrnl_audtrs'),
					'presnce_indpndnt_intrnl_audt_dvsion' => $this->input->POST('presnce_indpndnt_intrnl_audt_dvsion'),
					'constution_audt_comite_sctn_292' => $this->input->POST('constution_audt_comite_sctn_292'),
					'dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts' => $this->input->post('dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts'),
					'dtls_qulty_certfction_dasign_indpndnt_agncy' => $this->input->POST('dtls_qulty_certfction_dasign_indpndnt_agncy'),
				);
					$this->db->where('user_id', $user_id);
					$this->db->where('app_id', $this->session->userdata('app_id'));
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->update("tbl_section_c1_entity_appraisal_info", $data);
					redirect(base_url()."form2/next_step2/step-2");
			}else{
				//insert Query-----------------------------
				
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
				if(!empty($_FILES['core_prmtrs_mngmnt_broad_based_optnl_atchmnt_file']['name'])){
					
				if ( ! $this->upload->do_upload('core_prmtrs_mngmnt_broad_based_optnl_atchmnt_file'))
					{ $error = array('error' => $this->upload->display_errors()); $core_prmtrs_mngmnt_broad_based_optnl_atchmnt_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$core_prmtrs_mngmnt_broad_based_optnl_atchmnt_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$core_prmtrs_mngmnt_broad_based_optnl_atchmnt_file = '';
				}
				
				 
				
				if(!empty($_FILES['emply_qulifed_exprnc_mngmnt_optnl_atchmnt_file']['name'])){
					
				if ( ! $this->upload->do_upload('emply_qulifed_exprnc_mngmnt_optnl_atchmnt_file'))
					{ $error = array('error' => $this->upload->display_errors()); $emply_qulifed_exprnc_mngmnt_optnl_atchmnt_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$emply_qulifed_exprnc_mngmnt_optnl_atchmnt_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$emply_qulifed_exprnc_mngmnt_optnl_atchmnt_file = '';
				}
				
			 
				
				if(!empty($_FILES['genraly_eficient_systms_prcedurs_optnl_atchmnt_file']['name'])){
					
				if ( ! $this->upload->do_upload('genraly_eficient_systms_prcedurs_optnl_atchmnt_file'))
					{ $error = array('error' => $this->upload->display_errors()); $genraly_eficient_systms_prcedurs_optnl_atchmnt_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$genraly_eficient_systms_prcedurs_optnl_atchmnt_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$genraly_eficient_systms_prcedurs_optnl_atchmnt_file = '';
				}
				
				 
				if(!empty($_FILES['dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts_file']['name'])){
					
				if ( ! $this->upload->do_upload('dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts_file'))
					{ $error = array('error' => $this->upload->display_errors()); $dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts_file = '';
				}
				
				 
				
				if(!empty($_FILES['simlr_dtls_core_prmtrs_statry_audtr_certfcate_file']['name'])){
					
				if ( ! $this->upload->do_upload('simlr_dtls_core_prmtrs_statry_audtr_certfcate_file'))
					{ $error = array('error' => $this->upload->display_errors()); $simlr_dtls_core_prmtrs_statry_audtr_certfcate_file = '';
					 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$simlr_dtls_core_prmtrs_statry_audtr_certfcate_file = $data['upload_data']['file_name'];
						
					}
				
				}else{
					$simlr_dtls_core_prmtrs_statry_audtr_certfcate_file = '';
				}
				
				 
				
				$data = array(
					'user_id' =>$user_id,
					'app_id'=>$this->session->userdata('app_id'),
					'form_id'=> $this->session->userdata('form_id'),
					'respect_of_directors_name' => $this->input->POST('respect_of_directors_name'),
					'respect_of_directors_age' => $this->input->POST('respect_of_directors_age'),
					'respect_of_directors_address' => $this->input->POST('respect_of_directors_address'),
					'respect_of_directors_qualification' => $this->input->POST('respect_of_directors_qualification'),
					'respect_of_directors_pan' => $this->input->POST('respect_of_directors_pan'),
					'respect_of_directors_din' => $this->input->POST('respect_of_directors_din'),
					'total_exprnce_pwr_sctr' => $this->input->POST('total_exprnce_pwr_sctr'),
					'total_exprnce_othr_sctr' => $this->input->POST('total_exprnce_othr_sctr'),
					'core_prmtrs_nature' => $this->input->POST('core_prmtrs_nature'),
					'relvnt_qulfcton_senr_mngmnt_prtflio' => $this->input->POST('relvnt_qulfcton_senr_mngmnt_prtflio'),
					'total_exprnce_senior_mngmnt' => $this->input->POST('total_exprnce_senior_mngmnt'),
					'rlvnt_senr_mngmnt_curent_prtflio_handled' => $this->input->POST('rlvnt_senr_mngmnt_curent_prtflio_handled'),
					'timely_closng_finalztion_acounts' => $this->input->POST('timely_closng_finalztion_acounts'),
					'prtnrs_total_nmbrs_qualfed_cas' => $this->input->POST('prtnrs_total_nmbrs_qualfed_cas'),
					'major_audts_othr_cmpny' => $this->input->POST('major_audts_othr_cmpny'),
					'statry_audtrs_and_intrnl_audtrs' => $this->input->POST('statry_audtrs_and_intrnl_audtrs'),
					'presnce_indpndnt_intrnl_audt_dvsion' => $this->input->POST('presnce_indpndnt_intrnl_audt_dvsion'),
					'constution_audt_comite_sctn_292' => $this->input->POST('constution_audt_comite_sctn_292'),
					'dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts' => $this->input->post('dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts'),
					'dtls_qulty_certfction_dasign_indpndnt_agncy' => $this->input->POST('dtls_qulty_certfction_dasign_indpndnt_agncy'),
					'core_prmtrs_mngmnt_broad_based_optnl_atchmnt_file' => $core_prmtrs_mngmnt_broad_based_optnl_atchmnt_file,
					'emply_qulifed_exprnc_mngmnt_optnl_atchmnt_file' => $emply_qulifed_exprnc_mngmnt_optnl_atchmnt_file,
					'genraly_eficient_systms_prcedurs_optnl_atchmnt_file' => $genraly_eficient_systms_prcedurs_optnl_atchmnt_file,
					'dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts_file' => $dmnstrte_ablty_infrstrutre_indstrl_othr_prjcts_file,
					'simlr_dtls_core_prmtrs_statry_audtr_certfcate_file' => $simlr_dtls_core_prmtrs_statry_audtr_certfcate_file
				);
					$this->db->insert("tbl_section_c1_entity_appraisal_info", $data);
					
					if($new_id == 'GN'){
			   $data = array(
						'url' => "form2/next_step2/step-2",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_generation_a', $data);
		   }if($new_id == 'RN'){
			    $data = array(
                    'url' => "form2/next_step2/step-2",
                );
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
		   }
			}		
			redirect(base_url()."form2/next_step2/step-2");
			}else{
				//$error = array('project_name' => form_error('project_name'));
				$error = $this->form_validation->error_array();
				$this->session->set_flashdata('step1', $error);
				redirect(base_url()."form2/next_step2/step-1");
			}
		}	
	}
	public function sectionc2()
	{
		$user_id = $this->session->userdata('user')['id'];
		$app_id = $this->session->userdata('app_id');
		
		$new_id = substr($app_id,4,2);
			
		if($this->input->method(TRUE)=="POST"){
			
			$chk_c2_user = $this->WM->fectch_sec_c2();
			
			$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
		$config = 	array(
					array(
							'field' => 'exstng_new_aggrgte_brf_infrmtion',
							'label' => 'Breif',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'provide_exstng_debt_eqty_ratio_expnsn_pln',
							'label' => 'Provide your existing debt equity',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
										
					
					array(
							'field' => 'complxty_and_stablty_of_thr_sctr',
							'label' => 'The complexity and stability of the sector',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'simlrty_of_the_curnt_oprtion',
							'label' => 'The similarity of the expansion',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'ablty_mngmnt_rlted_unrlted_expnsn',
							'label' => 'The ability of the management',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'busness_expsd_forign_exchnge_flctutions',
							'label' => 'Business exposed to foreign exchange',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'writn_polcy_aprvd_bod_hedgng_dlng',
							'label' => 'The company have a written policy approved BOD',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'whther_forign_exchnge_trnsctions_aprvd_plcy_guidelne',
							'label' => 'Whether the foreign exchange transactions',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
				);	
				
	$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE)
			{
		
			
			if($chk_c2_user){
			
			//Update Query-----------------------------
				$config['upload_path'] = './uploads/form2/';
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
				
			$this->upload->initialize($config);
			
			if(!empty($_FILES['core_prmtrs_exstng_oprtions_expnsn_plns_optnl_certfcte_file']['name'])){
				
				if ( ! $this->upload->do_upload('core_prmtrs_exstng_oprtions_expnsn_plns_optnl_certfcte_file'))
					{ $error = array('error' => $this->upload->display_errors()); $core_prmtrs_exstng_oprtions_expnsn_plns_optnl_certfcte_file = '';
				 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$core_prmtrs_exstng_oprtions_expnsn_plns_optnl_certfcte_file = $data['upload_data']['file_name'];
						
						$file1 =array(
							'core_prmtrs_exstng_oprtions_expnsn_plns_optnl_certfcte_file' => $core_prmtrs_exstng_oprtions_expnsn_plns_optnl_certfcte_file,
						);
					
						$this->WM->update_section_c2_file($file1, 'core_prmtrs_exstng_oprtions_expnsn_plns_optnl_certfcte_file');
					}
			
			}
			unset($config);
			
			if(!empty($_FILES['deploy_cnsrvtve_debt_optnl_atchmnt_file']['name'])){
				
				if ( ! $this->upload->do_upload('deploy_cnsrvtve_debt_optnl_atchmnt_file'))
					{ $error = array('error' => $this->upload->display_errors()); $deploy_cnsrvtve_debt_optnl_atchmnt_file = '';
				 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$deploy_cnsrvtve_debt_optnl_atchmnt_file = $data['upload_data']['file_name'];
						
						$file1 =array(
							'deploy_cnsrvtve_debt_optnl_atchmnt_file' => $deploy_cnsrvtve_debt_optnl_atchmnt_file,
						);
						
						$this->WM->update_section_c2_file($file1, 'deploy_cnsrvtve_debt_optnl_atchmnt_file');
					}
			
			}
			unset($config);
			
			if(!empty($_FILES['resnble_stble_nature_optnl_atchment_file']['name'])){
				
				if ( ! $this->upload->do_upload('resnble_stble_nature_optnl_atchment_file'))
					{ $error = array('error' => $this->upload->display_errors()); $resnble_stble_nature_optnl_atchment_file = '';
				 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$resnble_stble_nature_optnl_atchment_file = $data['upload_data']['file_name'];
						
						$file1 =array(
							'resnble_stble_nature_optnl_atchment_file' => $resnble_stble_nature_optnl_atchment_file,
						);
						
						$this->WM->update_section_c2_file($file1, 'resnble_stble_nature_optnl_atchment_file');
						
					}
			
			}
			unset($config);
			
			if(!empty($_FILES['polcy_hedgng_forgn_curncy_optnl_certfcte_file']['name'])){
				
				if ( ! $this->upload->do_upload('polcy_hedgng_forgn_curncy_optnl_certfcte_file'))
					{ $error = array('error' => $this->upload->display_errors()); $polcy_hedgng_forgn_curncy_optnl_certfcte_file = '';
				 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$polcy_hedgng_forgn_curncy_optnl_certfcte_file = $data['upload_data']['file_name'];
						
						$file1 =array(
							'polcy_hedgng_forgn_curncy_optnl_certfcte_file' => $polcy_hedgng_forgn_curncy_optnl_certfcte_file,
						);
						
						$this->WM->update_section_c2_file($file1, 'polcy_hedgng_forgn_curncy_optnl_certfcte_file');
					}
			
			}
			unset($config);
			
			$data = array(
				
				'user_id' => $user_id,
				'app_id'=>$this->session->userdata('app_id'),
				'form_id' => $this->session->userdata('form_id'),
				'exstng_new_aggrgte_brf_infrmtion' => $this->input->POST('exstng_new_aggrgte_brf_infrmtion'),
				'provide_exstng_debt_eqty_ratio_expnsn_pln'=> $this->input->POST('provide_exstng_debt_eqty_ratio_expnsn_pln'),
				'complxty_and_stablty_of_thr_sctr' => $this->input->POST('complxty_and_stablty_of_thr_sctr'),
				'simlrty_of_the_curnt_oprtion' => $this->input->POST('simlrty_of_the_curnt_oprtion'),
				'ablty_mngmnt_rlted_unrlted_expnsn' => $this->input->POST('ablty_mngmnt_rlted_unrlted_expnsn'),
				'busness_expsd_forign_exchnge_flctutions' => $this->input->POST('busness_expsd_forign_exchnge_flctutions'),
				'writn_polcy_aprvd_bod_hedgng_dlng' => $this->input->POST('writn_polcy_aprvd_bod_hedgng_dlng'),
				'whther_forign_exchnge_trnsctions_aprvd_plcy_guidelne' => $this->input->POST('whther_forign_exchnge_trnsctions_aprvd_plcy_guidelne'),
				
			);
				$this->db->where('user_id', $user_id);
				$this->db->where('app_id', $this->session->userdata('app_id'));
				$this->db->where('form_id', $this->session->userdata('form_id'));
				$this->db->update('tbl_section_c2_entity_appraisal_info', $data);
				redirect(base_url()."form2/next_step2/step-3");
				
			}else{
			
			//insert Query-----------------------------
				
			$config['upload_path'] = './uploads/form2/';
			$config['allowed_types']        = '*';
			$config['max_size'] = 0; 
			$config['encrypt_name'] = TRUE;
				
			$this->upload->initialize($config);
			
			if(!empty($_FILES['core_prmtrs_exstng_oprtions_expnsn_plns_optnl_certfcte_file']['name'])){
				
				if ( ! $this->upload->do_upload('core_prmtrs_exstng_oprtions_expnsn_plns_optnl_certfcte_file'))
					{ $error = array('error' => $this->upload->display_errors()); $core_prmtrs_exstng_oprtions_expnsn_plns_optnl_certfcte_file = '';
				 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$core_prmtrs_exstng_oprtions_expnsn_plns_optnl_certfcte_file = $data['upload_data']['file_name'];
					
					}
			
			}else{
				$core_prmtrs_exstng_oprtions_expnsn_plns_optnl_certfcte_file = '';
			}
			unset($config);
			
			if(!empty($_FILES['deploy_cnsrvtve_debt_optnl_atchmnt_file']['name'])){
				
				if ( ! $this->upload->do_upload('deploy_cnsrvtve_debt_optnl_atchmnt_file'))
					{ $error = array('error' => $this->upload->display_errors()); $deploy_cnsrvtve_debt_optnl_atchmnt_file = '';
				 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$deploy_cnsrvtve_debt_optnl_atchmnt_file = $data['upload_data']['file_name'];
					
					}
			
			}else{
				$deploy_cnsrvtve_debt_optnl_atchmnt_file = '';
			}
			unset($config);
			
			if(!empty($_FILES['resnble_stble_nature_optnl_atchment_file']['name'])){
				
				if ( ! $this->upload->do_upload('resnble_stble_nature_optnl_atchment_file'))
					{ $error = array('error' => $this->upload->display_errors()); $resnble_stble_nature_optnl_atchment_file = '';
				 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$resnble_stble_nature_optnl_atchment_file = $data['upload_data']['file_name'];
					
					}
			
			}else{
				$resnble_stble_nature_optnl_atchment_file = '';
			}
			unset($config);
			
			if(!empty($_FILES['polcy_hedgng_forgn_curncy_optnl_certfcte_file']['name'])){
				
				if ( ! $this->upload->do_upload('polcy_hedgng_forgn_curncy_optnl_certfcte_file'))
					{ $error = array('error' => $this->upload->display_errors()); $polcy_hedgng_forgn_curncy_optnl_certfcte_file = '';
				 
					}
					else
					{
						$data = array('upload_data' => $this->upload->data());
						$polcy_hedgng_forgn_curncy_optnl_certfcte_file = $data['upload_data']['file_name'];
					
					}
			
			}else{
				$polcy_hedgng_forgn_curncy_optnl_certfcte_file = '';
			}
			unset($config);
			
			$data = array(
				
				'user_id' => $user_id,
				'app_id'=>$this->session->userdata('app_id'),
				'form_id' => $this->session->userdata('form_id'),
				'exstng_new_aggrgte_brf_infrmtion' => $this->input->POST('exstng_new_aggrgte_brf_infrmtion'),
				'provide_exstng_debt_eqty_ratio_expnsn_pln'=> $this->input->POST('provide_exstng_debt_eqty_ratio_expnsn_pln'),
				'complxty_and_stablty_of_thr_sctr' => $this->input->POST('complxty_and_stablty_of_thr_sctr'),
				'simlrty_of_the_curnt_oprtion' => $this->input->POST('simlrty_of_the_curnt_oprtion'),
				'ablty_mngmnt_rlted_unrlted_expnsn' => $this->input->POST('ablty_mngmnt_rlted_unrlted_expnsn'),
				'busness_expsd_forign_exchnge_flctutions' => $this->input->POST('busness_expsd_forign_exchnge_flctutions'),
				'writn_polcy_aprvd_bod_hedgng_dlng' => $this->input->POST('writn_polcy_aprvd_bod_hedgng_dlng'),
				'whther_forign_exchnge_trnsctions_aprvd_plcy_guidelne' => $this->input->POST('whther_forign_exchnge_trnsctions_aprvd_plcy_guidelne'),
				'core_prmtrs_exstng_oprtions_expnsn_plns_optnl_certfcte_file' => $core_prmtrs_exstng_oprtions_expnsn_plns_optnl_certfcte_file,
				'deploy_cnsrvtve_debt_optnl_atchmnt_file' => $deploy_cnsrvtve_debt_optnl_atchmnt_file,
				'resnble_stble_nature_optnl_atchment_file' => $resnble_stble_nature_optnl_atchment_file,
				'polcy_hedgng_forgn_curncy_optnl_certfcte_file' => $polcy_hedgng_forgn_curncy_optnl_certfcte_file
			);
				$this->db->insert("tbl_section_c2_entity_appraisal_info", $data);
				
				if($new_id == 'GN'){
			   $data = array(
						'url' => "form2/next_step2/step-3",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_generation_a', $data);
		   }if($new_id == 'RN'){
			    $data = array(
                    'url' => "form2/next_step2/step-3",
                );
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
		   }
				
				redirect(base_url()."form2/next_step2/step-3");
			}
			}else{
				//$error = array('project_name' => form_error('project_name'));
				$error = $this->form_validation->error_array();
				$this->session->set_flashdata('step2', $error);
				redirect(base_url()."form2/next_step2/step-2");
			}
		}	
	}		
	public function sectionc3()
	{
		
		$user_id = $this->session->userdata('user')['id'];
		$app_id = $this->session->userdata('app_id');
		$new_id = substr($app_id,4,2);
			
		if($this->input->method(TRUE)=="POST"){
			
			$chk_c3_user = $this->WM->fectch_sec_c3();
			
			$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
		$config = 	array(
					array(
							'field' => 'respect_of_mngng_cmpltng_gnrtion_trnsmsion_dstrbtion',
							'label' => 'Breif',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'devlped_oprtd_per_cmprble_prpsd_prjct',
							'label' => ' Have the Core Promoters developed',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'exprnce_devlpng_oprtng_epc_srvcs_mnfctriing',
							'label' => 'Core Promoters have the experience in developing',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'pwr_oprtng_capcties_top_domstc_plyrs',
							'label' => 'Core Promoters have power operating capacities',
							'rules' => 'trim|required|max_length[200]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					
				);	
				
	$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE)
			{
		
			
			if($chk_c3_user){
				
			//Update Query-----------------------------
				
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
			
					
					if ( ! $this->upload->do_upload('exprnce_prjct_pwr_sctr_optnl_atchmnt_file'))
						{ $error = array('error' => $this->upload->display_errors()); $exprnce_prjct_pwr_sctr_optnl_atchmnt_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$exprnce_prjct_pwr_sctr_optnl_atchmnt_file = $data['upload_data']['file_name'];
							
							$file1 = array(
								'exprnce_prjct_pwr_sctr_optnl_atchmnt_file' => $exprnce_prjct_pwr_sctr_optnl_atchmnt_file,
							);
							
								$this->WM->update_section_c3_file($file1, "exprnce_prjct_pwr_sctr_optnl_atchmnt_file");

						}
				
				
				
			
					
					if ( ! $this->upload->do_upload('devlped_oprtd_per_cmprble_prpsd_prjct_file'))
						{ $error = array('error' => $this->upload->display_errors()); $devlped_oprtd_per_cmprble_prpsd_prjct_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$devlped_oprtd_per_cmprble_prpsd_prjct_file = $data['upload_data']['file_name'];
							
							$file1 = array(
								'devlped_oprtd_per_cmprble_prpsd_prjct_file' => $devlped_oprtd_per_cmprble_prpsd_prjct_file,
							);
							
							$this->WM->update_section_c3_file($file1, "devlped_oprtd_per_cmprble_prpsd_prjct_file");
						}
				
				
					
					if ( ! $this->upload->do_upload('exprnce_devlpng_oprtng_epc_srvcs_mnfctriing_file'))
						{ $error = array('error' => $this->upload->display_errors()); $exprnce_devlpng_oprtng_epc_srvcs_mnfctriing_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$exprnce_devlpng_oprtng_epc_srvcs_mnfctriing_file = $data['upload_data']['file_name'];
							
							$file1 = array(
								'exprnce_devlpng_oprtng_epc_srvcs_mnfctriing_file' => $exprnce_devlpng_oprtng_epc_srvcs_mnfctriing_file,
							);
							
							$this->WM->update_section_c3_file($file1, "exprnce_devlpng_oprtng_epc_srvcs_mnfctriing_file");
						}
				
				
					
					if ( ! $this->upload->do_upload('pwr_oprtng_capcties_top_domstc_plyrs_file'))
						{ $error = array('error' => $this->upload->display_errors()); $pwr_oprtng_capcties_top_domstc_plyrs_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$pwr_oprtng_capcties_top_domstc_plyrs_file = $data['upload_data']['file_name'];
							
							$file1 = array(
								'pwr_oprtng_capcties_top_domstc_plyrs_file' => $pwr_oprtng_capcties_top_domstc_plyrs_file,
							);
							
							$this->WM->update_section_c3_file($file1, "pwr_oprtng_capcties_top_domstc_plyrs_file");
						}
		
				
				$data = array(
					'user_id' => $user_id,
					'app_id' => $app_id,
					'form_id'=> $this->session->userdata('form_id'),
					'respect_of_mngng_cmpltng_gnrtion_trnsmsion_dstrbtion' => $this->input->POST('respect_of_mngng_cmpltng_gnrtion_trnsmsion_dstrbtion'),
					'devlped_oprtd_per_cmprble_prpsd_prjct' => $this->input->post('devlped_oprtd_per_cmprble_prpsd_prjct'),
					'exprnce_devlpng_oprtng_epc_srvcs_mnfctriing' => $this->input->post('exprnce_devlpng_oprtng_epc_srvcs_mnfctriing'),
					'pwr_oprtng_capcties_top_domstc_plyrs' => $this->input->post('pwr_oprtng_capcties_top_domstc_plyrs')
				);
					$this->db->where('user_id', $user_id);
					$this->db->where('app_id', $this->session->userdata('app_id'));
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->update("tbl_section_c3_entity_appraisal_info", $data);
					redirect(base_url()."form2/next_step2/step-4");
					
			}else{
				
			//insert Query-----------------------------	
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
				if(!empty($_FILES['exprnce_prjct_pwr_sctr_optnl_atchmnt_file']['name'])){
					
					if ( ! $this->upload->do_upload('exprnce_prjct_pwr_sctr_optnl_atchmnt_file'))
						{ $error = array('error' => $this->upload->display_errors()); $exprnce_prjct_pwr_sctr_optnl_atchmnt_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$exprnce_prjct_pwr_sctr_optnl_atchmnt_file = $data['upload_data']['file_name'];
						
						}
				
				}else{
					$exprnce_prjct_pwr_sctr_optnl_atchmnt_file = '';
				}
				
				
				if(!empty($_FILES['devlped_oprtd_per_cmprble_prpsd_prjct_file']['name'])){
					
					if ( ! $this->upload->do_upload('devlped_oprtd_per_cmprble_prpsd_prjct_file'))
						{ $error = array('error' => $this->upload->display_errors()); $devlped_oprtd_per_cmprble_prpsd_prjct_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$devlped_oprtd_per_cmprble_prpsd_prjct_file = $data['upload_data']['file_name'];
						
						}
				
				}else{
					$devlped_oprtd_per_cmprble_prpsd_prjct_file = '';
				}
				unset($config);
				
				if(!empty($_FILES['exprnce_devlpng_oprtng_epc_srvcs_mnfctriing_file']['name'])){
					
					if ( ! $this->upload->do_upload('exprnce_devlpng_oprtng_epc_srvcs_mnfctriing_file'))
						{ $error = array('error' => $this->upload->display_errors()); $exprnce_devlpng_oprtng_epc_srvcs_mnfctriing_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$exprnce_devlpng_oprtng_epc_srvcs_mnfctriing_file = $data['upload_data']['file_name'];
						
						}
				
				}else{
					$exprnce_devlpng_oprtng_epc_srvcs_mnfctriing_file = '';
				}
				unset($config);
				
				if(!empty($_FILES['pwr_oprtng_capcties_top_domstc_plyrs_file']['name'])){
					
					if ( ! $this->upload->do_upload('pwr_oprtng_capcties_top_domstc_plyrs_file'))
						{ $error = array('error' => $this->upload->display_errors()); $pwr_oprtng_capcties_top_domstc_plyrs_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$pwr_oprtng_capcties_top_domstc_plyrs_file = $data['upload_data']['file_name'];
						
						}
				
				}else{
					$pwr_oprtng_capcties_top_domstc_plyrs_file = '';
				}
				unset($config);
				
				$data = array(
					
					'user_id' => $user_id,
					'app_id'=>$this->session->userdata('app_id'),
					'form_id'=> $this->session->userdata('form_id'),
					'respect_of_mngng_cmpltng_gnrtion_trnsmsion_dstrbtion' => $this->input->POST('respect_of_mngng_cmpltng_gnrtion_trnsmsion_dstrbtion'),
					'devlped_oprtd_per_cmprble_prpsd_prjct' => $this->input->post('devlped_oprtd_per_cmprble_prpsd_prjct'),
					'exprnce_devlpng_oprtng_epc_srvcs_mnfctriing' => $this->input->post('exprnce_devlpng_oprtng_epc_srvcs_mnfctriing'),
					'pwr_oprtng_capcties_top_domstc_plyrs' => $this->input->post('pwr_oprtng_capcties_top_domstc_plyrs'),
					'exprnce_prjct_pwr_sctr_optnl_atchmnt_file' => $exprnce_prjct_pwr_sctr_optnl_atchmnt_file,
					'devlped_oprtd_per_cmprble_prpsd_prjct_file' => $devlped_oprtd_per_cmprble_prpsd_prjct_file,
					'exprnce_devlpng_oprtng_epc_srvcs_mnfctriing_file' =>  $exprnce_devlpng_oprtng_epc_srvcs_mnfctriing_file,
					'pwr_oprtng_capcties_top_domstc_plyrs_file' => $pwr_oprtng_capcties_top_domstc_plyrs_file
				);
					$this->db->insert("tbl_section_c3_entity_appraisal_info", $data);
					
					if($new_id == 'GN'){
			   $data = array(
						'url' => "form2/next_step2/step-4",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_generation_a', $data);
		   }if($new_id == 'RN'){
			    $data = array(
                    'url' => "form2/next_step2/step-4",
                );
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
		   }
				
					redirect(base_url()."form2/next_step2/step-4");
			}
			}else{
				//$error = array('project_name' => form_error('project_name'));
				$error = $this->form_validation->error_array();
				$this->session->set_flashdata('step3', $error);
				redirect(base_url()."form2/next_step2/step-3");
			}
		}
	}
	public function sectionc4()
	{
		$user_id = $this->session->userdata('user')['id'];
		$app_id = $this->session->userdata('app_id');
		$new_id = substr($app_id,4,2);
			
		if($this->input->method(TRUE)=="POST"){
			
			$chk_c4_user = $this->WM->fectch_sec_c4($user_id);
			
			$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
		$config = 	array(
					array(
							'field' => 'core_prmtrs_prjct_simlr_natre',
							'label' => 'Given',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'infrstrcture_prjct_simlr_size',
							'label' => 'Given',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
										
					array(
							'field' => 'setup__mnged_indstrial_size_prjct',
							'label' => 'Given',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'providng_epc_srvces_indstrial_or_indstrial_prjcts',
							'label' => 'Given',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'manged_busines_devlpng_ecnomies',
							'label' => 'Given',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'prior_expirnce_dlng_gov_authrty_india',
							'label' => 'Given',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'acquiring_land_clernce_india',
							'label' => 'Given',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'successfully_devlpng_simlr_prjcts_ecnomies',
							'label' => 'Given',
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
		

			
			if($chk_c4_user){
				
			//Update Query-----------------------------
				
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
				if(!empty($_FILES['core_prmtrs_prjct_simlr_natre_file']['name'])){
					
					if ( ! $this->upload->do_upload('core_prmtrs_prjct_simlr_natre_file'))
						{ $error = array('error' => $this->upload->display_errors()); $core_prmtrs_prjct_simlr_natre_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$core_prmtrs_prjct_simlr_natre_file = $data['upload_data']['file_name'];
							
							$file1 = array(
								
								'core_prmtrs_prjct_simlr_natre_file' => $core_prmtrs_prjct_simlr_natre_file,
							);
						
							$this->WM->update_section_c4_file($file1, "core_prmtrs_prjct_simlr_natre_file");

						}
				
				}
				unset($config);
				if(!empty($_FILES['infrstrcture_prjct_simlr_size_file']['name'])){
					
					if ( ! $this->upload->do_upload('infrstrcture_prjct_simlr_size_file'))
						{ $error = array('error' => $this->upload->display_errors()); $infrstrcture_prjct_simlr_size_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$infrstrcture_prjct_simlr_size_file = $data['upload_data']['file_name'];
							
							$file1 = array(
								
								'infrstrcture_prjct_simlr_size_file' => $infrstrcture_prjct_simlr_size_file,
							);
							
							$this->WM->update_section_c4_file($file1, "infrstrcture_prjct_simlr_size_file");

						}
				
				}
				unset($config);
				
				if(!empty($_FILES['setup__mnged_indstrial_size_prjct_file']['name'])){
					
					if ( ! $this->upload->do_upload('setup__mnged_indstrial_size_prjct_file'))
						{ $error = array('error' => $this->upload->display_errors()); $setup__mnged_indstrial_size_prjct_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$setup__mnged_indstrial_size_prjct_file = $data['upload_data']['file_name'];
							
							$file1 = array(
								
								'setup__mnged_indstrial_size_prjct_file' => $setup__mnged_indstrial_size_prjct_file,
							);
							
							$this->WM->update_section_c4_file($file1, "setup__mnged_indstrial_size_prjct_file");

						}
				
				}
				unset($config);
				
				if(!empty($_FILES['providng_epc_srvces_indstrial_or_indstrial_prjcts_file']['name'])){
					
					if ( ! $this->upload->do_upload('providng_epc_srvces_indstrial_or_indstrial_prjcts_file'))
						{ $error = array('error' => $this->upload->display_errors()); $providng_epc_srvces_indstrial_or_indstrial_prjcts_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$providng_epc_srvces_indstrial_or_indstrial_prjcts_file = $data['upload_data']['file_name'];
							
							$file1 = array(
								
								'providng_epc_srvces_indstrial_or_indstrial_prjcts_file' => $providng_epc_srvces_indstrial_or_indstrial_prjcts_file,
							);
							
							$this->WM->update_section_c4_file($file1, "providng_epc_srvces_indstrial_or_indstrial_prjcts_file");
						}
				
				}
				unset($config);
				
				if(!empty($_FILES['manged_busines_devlpng_ecnomies_file']['name'])){
					
					if ( ! $this->upload->do_upload('manged_busines_devlpng_ecnomies_file'))
						{ $error = array('error' => $this->upload->display_errors()); $manged_busines_devlpng_ecnomies_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$manged_busines_devlpng_ecnomies_file = $data['upload_data']['file_name'];
							
							$file1 = array(
								
								'manged_busines_devlpng_ecnomies_file' => $manged_busines_devlpng_ecnomies_file,
							);
							
							$this->WM->update_section_c4_file($file1, "manged_busines_devlpng_ecnomies_file");
							
						}
				
				}
				
				unset($config);
				
				if(!empty($_FILES['prior_expirnce_dlng_gov_authrty_india_file']['name'])){
					
					if ( ! $this->upload->do_upload('prior_expirnce_dlng_gov_authrty_india_file'))
						{ $error = array('error' => $this->upload->display_errors()); $prior_expirnce_dlng_gov_authrty_india_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$prior_expirnce_dlng_gov_authrty_india_file = $data['upload_data']['file_name'];
							
							$file1 = array(
								
								'prior_expirnce_dlng_gov_authrty_india_file' => $prior_expirnce_dlng_gov_authrty_india_file,
							);
							
							$this->WM->update_section_c4_file($file1, "prior_expirnce_dlng_gov_authrty_india_file");

						}
				
				}
				unset($config);
				if(!empty($_FILES['acquiring_land_clernce_india_file']['name'])){
					
					if ( ! $this->upload->do_upload('acquiring_land_clernce_india_file'))
						{ $error = array('error' => $this->upload->display_errors()); $acquiring_land_clernce_india_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$acquiring_land_clernce_india_file = $data['upload_data']['file_name'];
							
							$file1 = array(
								
								'acquiring_land_clernce_india_file' => $acquiring_land_clernce_india_file,
							);
							
							$this->WM->update_section_c4_file($file1, "acquiring_land_clernce_india_file");
						}
				
				}
				
				unset($config);
				if(!empty($_FILES['successfully_devlpng_simlr_prjcts_ecnomies_file']['name'])){
					
					if ( ! $this->upload->do_upload('successfully_devlpng_simlr_prjcts_ecnomies_file'))
						{ $error = array('error' => $this->upload->display_errors()); $successfully_devlpng_simlr_prjcts_ecnomies_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$successfully_devlpng_simlr_prjcts_ecnomies_file = $data['upload_data']['file_name'];
							
							$file1 = array(
								
								'successfully_devlpng_simlr_prjcts_ecnomies_file' => $successfully_devlpng_simlr_prjcts_ecnomies_file,
							);
						
							$this->WM->update_section_c4_file($file1, "successfully_devlpng_simlr_prjcts_ecnomies_file");
						}
				
				}
				
				unset($config);
				
				$data = array(
					
					'user_id' => $user_id,
					'app_id' => $app_id,
					'form_id'=> $this->session->userdata('form_id'),
					'successfully_devlpng_simlr_prjcts_ecnomies' => $this->input->post('successfully_devlpng_simlr_prjcts_ecnomies'),
					'acquiring_land_clernce_india' => $this->input->post('acquiring_land_clernce_india'),
					'prior_expirnce_dlng_gov_authrty_india' => $this->input->post('prior_expirnce_dlng_gov_authrty_india'),
					'manged_busines_devlpng_ecnomies' => $this->input->post('manged_busines_devlpng_ecnomies'),
					'providng_epc_srvces_indstrial_or_indstrial_prjcts' => $this->input->post('providng_epc_srvces_indstrial_or_indstrial_prjcts'),
					'setup__mnged_indstrial_size_prjct' => $this->input->post('setup__mnged_indstrial_size_prjct'),
					'infrstrcture_prjct_simlr_size' => $this->input->post('infrstrcture_prjct_simlr_size'),
					'core_prmtrs_prjct_simlr_natre' => $this->input->post('core_prmtrs_prjct_simlr_natre')
					
				);
					$this->db->where('user_id', $user_id);
					$this->db->where('app_id', $this->session->userdata('app_id'));
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->update("tbl_section_c4_entity_appraisal_info", $data);
					redirect(base_url()."form2/next_step2/step-5");
			}else{	
				
				//insert Query-----------------------------
				
				$config['upload_path'] = './uploads/form2/';
				$config['allowed_types']        = '*';
				$config['max_size'] = 0; 
				$config['encrypt_name'] = TRUE;
					
				$this->upload->initialize($config);
				
				if(!empty($_FILES['core_prmtrs_prjct_simlr_natre_file']['name'])){
					
					if ( ! $this->upload->do_upload('core_prmtrs_prjct_simlr_natre_file'))
						{ $error = array('error' => $this->upload->display_errors()); $core_prmtrs_prjct_simlr_natre_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$core_prmtrs_prjct_simlr_natre_file = $data['upload_data']['file_name'];
						
						}
				
				}else{
					$core_prmtrs_prjct_simlr_natre_file = '';
				}
				unset($config);
				if(!empty($_FILES['infrstrcture_prjct_simlr_size_file']['name'])){
					
					if ( ! $this->upload->do_upload('infrstrcture_prjct_simlr_size_file'))
						{ $error = array('error' => $this->upload->display_errors()); $infrstrcture_prjct_simlr_size_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$infrstrcture_prjct_simlr_size_file = $data['upload_data']['file_name'];
						
						}
				
				}else{
					$infrstrcture_prjct_simlr_size_file = '';
				}
				unset($config);
				if(!empty($_FILES['setup__mnged_indstrial_size_prjct_file']['name'])){
					
					if ( ! $this->upload->do_upload('setup__mnged_indstrial_size_prjct_file'))
						{ $error = array('error' => $this->upload->display_errors()); $setup__mnged_indstrial_size_prjct_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$setup__mnged_indstrial_size_prjct_file = $data['upload_data']['file_name'];
						
						}
				
				}else{
					$setup__mnged_indstrial_size_prjct_file = '';
				}
				unset($config);
				if(!empty($_FILES['providng_epc_srvces_indstrial_or_indstrial_prjcts_file']['name'])){
					
					if ( ! $this->upload->do_upload('providng_epc_srvces_indstrial_or_indstrial_prjcts_file'))
						{ $error = array('error' => $this->upload->display_errors()); $providng_epc_srvces_indstrial_or_indstrial_prjcts_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$providng_epc_srvces_indstrial_or_indstrial_prjcts_file = $data['upload_data']['file_name'];
						
						}
				
				}else{
					$providng_epc_srvces_indstrial_or_indstrial_prjcts_file = '';
				}
				unset($config);
				if(!empty($_FILES['manged_busines_devlpng_ecnomies_file']['name'])){
					
					if ( ! $this->upload->do_upload('manged_busines_devlpng_ecnomies_file'))
						{ $error = array('error' => $this->upload->display_errors()); $manged_busines_devlpng_ecnomies_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$manged_busines_devlpng_ecnomies_file = $data['upload_data']['file_name'];
						
						}
				
				}else{
					$manged_busines_devlpng_ecnomies_file = '';
				}
				unset($config);
				if(!empty($_FILES['prior_expirnce_dlng_gov_authrty_india_file']['name'])){
					
					if ( ! $this->upload->do_upload('prior_expirnce_dlng_gov_authrty_india_file'))
						{ $error = array('error' => $this->upload->display_errors()); $prior_expirnce_dlng_gov_authrty_india_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$prior_expirnce_dlng_gov_authrty_india_file = $data['upload_data']['file_name'];
						
						}
				
				}else{
					$prior_expirnce_dlng_gov_authrty_india_file = '';
				}
				unset($config);
				if(!empty($_FILES['acquiring_land_clernce_india_file']['name'])){
					
					if ( ! $this->upload->do_upload('acquiring_land_clernce_india_file'))
						{ $error = array('error' => $this->upload->display_errors()); $acquiring_land_clernce_india_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$acquiring_land_clernce_india_file = $data['upload_data']['file_name'];
						
						}
				
				}else{
					$acquiring_land_clernce_india_file = '';
				}
				unset($config);
				if(!empty($_FILES['successfully_devlpng_simlr_prjcts_ecnomies_file']['name'])){
					
					if ( ! $this->upload->do_upload('successfully_devlpng_simlr_prjcts_ecnomies_file'))
						{ $error = array('error' => $this->upload->display_errors()); $successfully_devlpng_simlr_prjcts_ecnomies_file = '';
					 
						}
						else
						{
							$data = array('upload_data' => $this->upload->data());
							$successfully_devlpng_simlr_prjcts_ecnomies_file = $data['upload_data']['file_name'];
						
						}
				
				}else{
					$successfully_devlpng_simlr_prjcts_ecnomies_file = '';
				}
				unset($config);
				
				$data = array(
					
					'user_id' => $user_id,
					'app_id'=>$this->session->userdata('app_id'),
					'form_id'=> $this->session->userdata('form_id'),
					'successfully_devlpng_simlr_prjcts_ecnomies' => $this->input->post('successfully_devlpng_simlr_prjcts_ecnomies'),
					'acquiring_land_clernce_india' => $this->input->post('acquiring_land_clernce_india'),
					'prior_expirnce_dlng_gov_authrty_india' => $this->input->post('prior_expirnce_dlng_gov_authrty_india'),
					'manged_busines_devlpng_ecnomies' => $this->input->post('manged_busines_devlpng_ecnomies'),
					'providng_epc_srvces_indstrial_or_indstrial_prjcts' => $this->input->post('providng_epc_srvces_indstrial_or_indstrial_prjcts'),
					'setup__mnged_indstrial_size_prjct' => $this->input->post('setup__mnged_indstrial_size_prjct'),
					'infrstrcture_prjct_simlr_size' => $this->input->post('infrstrcture_prjct_simlr_size'),
					'core_prmtrs_prjct_simlr_natre' => $this->input->post('core_prmtrs_prjct_simlr_natre'),
					'core_prmtrs_prjct_simlr_natre_file' => $core_prmtrs_prjct_simlr_natre_file,
					'infrstrcture_prjct_simlr_size_file' => $infrstrcture_prjct_simlr_size_file,
					'setup__mnged_indstrial_size_prjct_file' => $setup__mnged_indstrial_size_prjct_file,
					'providng_epc_srvces_indstrial_or_indstrial_prjcts_file' => $providng_epc_srvces_indstrial_or_indstrial_prjcts_file,
					'manged_busines_devlpng_ecnomies_file' => $manged_busines_devlpng_ecnomies_file,
					'prior_expirnce_dlng_gov_authrty_india_file' => $prior_expirnce_dlng_gov_authrty_india_file,
					'acquiring_land_clernce_india_file' => $acquiring_land_clernce_india_file,
					'successfully_devlpng_simlr_prjcts_ecnomies_file' => $successfully_devlpng_simlr_prjcts_ecnomies_file
				);
				
					$this->db->insert("tbl_section_c4_entity_appraisal_info", $data);
					
					if($new_id == 'GN'){
			   $data = array(
						'url' => "form2/next_step2/step-5",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_generation_a', $data);
		   }if($new_id == 'RN'){
			    $data = array(
                    'url' => "form2/next_step2/step-5",
                );
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
		   }
				
					redirect(base_url()."form2/next_step2/step-5");
			}
			}else{
				
				$error = $this->form_validation->error_array();
				$this->session->set_flashdata('step4', $error);
				redirect(base_url()."form2/next_step2/step-4");
			}
		}
	}
	public function process_generation_success()
	{
		$app_id =  $this->session->userdata('app_id');
		$new_id = substr($app_id,4,2);
		//print_r($_POST);die;
		if($this->input->method(true)=="POST"){
			
			$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
		$config = 	array(
					array(
							'field' => 'place',
							'label' => 'Place',
							'rules' => 'trim|required|max_length[50]|alpha_numeric_spaces',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
					
					array(
							'field' => 'date',
							'label' => 'Date',
							'rules' => 'trim|required|max_length[12]|callback_SCOD1',
							'errors' => array(
									'required' 		=> '{field} must not be empty.',
									'max_length'     => '{field} must have at least {param} characters.',
								)
					),
										
				
				);	
				
				
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE)
			{
		
			
			$data = array(
			'place'=> $this->input->post('place'),
			'date' => $this->input->post('date'),
			'agree' => $this->input->post('agree')		
		);
		
		$this->db->where("user_id", $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->update('tbl_section_c4_entity_appraisal_info', $data);
		
				if($new_id == 'GN'){
					$this->db->select("url");
					$this->db->from('tbl_generation_a');
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$data = $this->db->get()->row_array();
					if($data['url']){
						$data = array(
							'url' => "",
						);
						$this->db->where('user_id', $this->session->userdata('user')['id']);
						$this->db->where('form_id', $this->session->userdata('form_id'));
						$this->db->where('app_id',$app_id);
						$this->db->update('tbl_generation_a', $data);
					}
		   }if($new_id == 'RN'){
			   $this->db->select("url");
					$this->db->from('tbl_renew_1');
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$data = $this->db->get()->row_array();
					if($data['url']){
			    $data = array(
                    'url' => "",
					);
					$this->db->where('user_id', $this->session->userdata('user')['id']);
					$this->db->where('form_id', $this->session->userdata('form_id'));
					$this->db->where('app_id',$app_id);
					$this->db->update('tbl_renew_1', $data);
				}	
		   }
			
			if($this->input->post('agree')){
				$data['msg'] = '<div class="alert alert-success">Dear %s, <br />Your Generation form has been successfully submitted. Please wait while we review your form. <br><br> Sincerely, <br>RECL Team</div>';	
			}else{
				$data['msg'] = '<div class="alert alert-warning">Dear %s, <br />Your Generation form has been successfully submitted. You must agree our T&C to complete your form if you do not afree to our T&C the form remains incomplete. 
				<br ><br > <a href="'.base_url().'form1/index/gn/step5" class="btn btn-default">Click here to go back to previous page</a> 
				<br><br> Sincerely, <br>RECL Team</div>';
			}
			$this->load->view('success', $data);
			
			}else{
				//$error = array('project_name' => form_error('project_name'));
				$error = $this->form_validation->error_array();
				$this->session->set_flashdata('step5', $error);
				redirect(base_url()."form2/next_step2/step-5");
			}
		}
			
			
			

	}


}
 
?>
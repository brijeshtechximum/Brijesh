<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_admin extends CI_Controller {

	function __construct() {
       parent::__construct();
       $this->load->model('wp-admin/Users_model','UM');
	   $this->load->model('wp-admin/Sub_admin_model', 'SM');
       $this->load->library('form_validation');
    }

	public function index()
	{
		if(!empty($this->session->userdata('login_session'))){
			$this->load->view("wp-admin/sub_admin");
		}else{
			redirect(base_url().'wp-admin/login');	
		}	
	}
	
	public function add_sub_admin()
	{
		checkToken($_POST['token']);
		if(!empty($this->session->userdata('login_session'))){
		
		if($this->input->method(true)=="POST"){
		$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
		$config = array(
		        		array(
								'field' => 'name',
								'label' => 'Name',
								'rules' => 'trim|required|max_length[20]|alpha_numeric_spaces',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'max_length'     => '{field} must have at least {param} characters.',
									)
						),
				array(
								'field' => 'email',
								'label' => 'Email',
								'rules' => 'trim|required|valid_email',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'valid_email' 	=> '{field} Please enter a valid email',
                                         
									)
						),
				array(
								'field' => 'password',
								'label' => 'Password',
								'rules' => 'trim|required|min_length[8]|alpha_numeric|callback_password',
								'errors' => array(
										'required' 		=> '{field} must not be empty.',
										'min_length' 	=> '{field} must have at least {param} characters.',
                                        'alpha_numeric' => '{field} must contain alpha numeric characters',
									)
						),		
				array(
								'field' => 'generation',
								'label' => 'Generation',
								'rules' => 'callback_generation',
								
						),
				array(
								'field' => 'renewable',
								'label' => 'Renewable',
								'rules' => 'callback_renewable',
								
						),
				array(
								'field' => 'TD',
								'label' => 'T&D',
								'rules' => 'callback_TD',
								
						),
				array(
								'field' => 'state_sector_generation',
								'label' => 'State Sector Generation',
								'rules' => 'callback_state_sector_generation',
								
						),		
						
             
               
              
        );
           
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == TRUE)
		{	
			$this->SM->add_sub_admin();
		}else{
			$this->load->view("wp-admin/sub_admin");
		}
	}
	}else{ 
		$this->session->unset_userdata("login_session");
		redirect(base_url().'wp-admin/login');	
	}
	}
	public function generation($generation){
		if(!empty($this->input->post('generation'))){
			if (! preg_match('/^[a-zA-Z\s]+$/', $generation)) {
				$this->form_validation->set_message('generation', 'The %s field may only contain Valid Input');
				return FALSE;
			} else {
				return TRUE;
			}
		}else{
			return TRUE;
		}
	}
		public function renewable($renewable){
			if(!empty($this->input->post('renewable'))){
				if (! preg_match('/^[a-zA-Z\s]+$/', $renewable)) {
					$this->form_validation->set_message('renewable', 'The %s field may only contain Valid Input');
					return FALSE;
				} else {
					return TRUE;
				}
			}else{
				return TRUE;
			}	
	}
		public function TD($TD){
			if(!empty($this->input->post('TD'))){
				if (! preg_match('/^[a-zA-Z\s\&]+$/', $TD)) {
					$this->form_validation->set_message('TD', 'The %s field may only contain Valid Input');
					return FALSE;
				} else {
					return TRUE;
				}
			}else{
				return TRUE;
			}	
	}
		public function state_sector_generation($state_sector_generation){
			if(!empty($this->input->post('state_sector_generation'))){
				if (! preg_match('/^[a-zA-Z\s]+$/', $state_sector_generation)) {
					$this->form_validation->set_message('state_sector_generation', 'The %s field may only contain Valid Input');
					return FALSE;
				} else {
					return TRUE;
				}
			}else{
				return TRUE;
			}	
	}
	public function password($password)
	{
	   if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password)) {
		   
			return TRUE;
		}
			$this->form_validation->set_message('password', 'The %s field may only contain minimam 8 characters 1 number ');
			return FALSE;
		}
	
	public function edit_sub_admin($id)
	{
		checkToken($_POST['token']);
		
		if(!empty($this->session->userdata('login_session'))){
			$this->form_validation->set_error_delimiters('<div class="has-error"><span class="help-block">', '</span></div>');
			$config = array(
							array(
									'field' => 'name',
									'label' => 'Name',
									'rules' => 'trim|required|max_length[20]|alpha_numeric_spaces',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'max_length'     => '{field} must have at least {param} characters.',
										)
							),
					array(
									'field' => 'email',
									'label' => 'Email',
									'rules' => 'trim|required|valid_email',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'valid_email' 	=> '{field} Please enter a valid email',
											 
										)
							),
					array(
									'field' => 'password',
									'label' => 'Password',
									'rules' => 'trim|required|min_length[8]|alpha_numeric|callback_password',
									'errors' => array(
											'required' 		=> '{field} must not be empty.',
											'min_length' 	=> '{field} must have at least {param} characters.',
											'alpha_numeric' => '{field} must contain alpha numeric characters',
										)
							),		
					array(
									'field' => 'generation',
									'label' => 'Generation',
									'rules' => 'callback_generation',
									
							),
					array(
									'field' => 'renewable',
									'label' => 'Renewable',
									'rules' => 'callback_renewable',
									
							),
					array(
									'field' => 'TD',
									'label' => 'T&D',
									'rules' => 'callback_TD',
									
							),
					array(
									'field' => 'state_sector_generation',
									'label' => 'State Sector Generation',
									'rules' => 'callback_state_sector_generation',
									
							),		
							
				 
				   
				  
			);
			   
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE)
			{
				if(!empty($this->session->userdata('login_session'))){
					$this->SM->edit_sub_admin($id);
				}else{
					redirect(base_url().'wp-admin/login');	
				}	
			}else{
				pr($error = array('password' => form_error('password'), 'name' => form_error('name')));
				$this->session->set_flashdata('errors', $error);
				//$this->session->set_flashdata('errors', validation_errors());
				//pr($this->session->flashdata('errors'));die;
				//echo "ssdfdf";die;
				//$data['admin_list'] = $this->SM->get_admin_list($id);
				//$data['sessiondata']="safsdgf";
				redirect($_SERVER['HTTP_REFERER']); 
				//$this->load->view("wp-admin/sub_admin", $data);
			}	
		}else{
			$this->session->unset_userdata("login_session");
			redirect(base_url().'wp-admin/login');	
		}
	}
		
	public function admin_list()
	{
		if(!empty($this->session->userdata('login_session'))){
			$data['list'] = $this->SM->sub_admin_list();
			$this->load->view("wp-admin/admin_list",$data);
		}else{
			$this->session->unset_userdata("login_session");
			redirect(base_url().'wp-admin/login');	
		}	
	}
	public function admin_delete($id)
	{
		$this->SM->admin_delete($id);
	}
	
	public function admin_edit($id)
	{	
		if(!empty($this->session->userdata('login_session'))){
			$data['admin_list'] = $this->SM->get_admin_list($id);
			$this->load->view("wp-admin/sub_admin", $data);
		}else{
			redirect(base_url().'wp-admin/login');	
		}	
	}
	public function form_list($id)
	{
		$data['admin_id'] =  $id;
		$data['users'] = $this->SM->userlist();
		$data['user_form_id'] = $this->SM->fetch_user_form_id($id);
		$this->load->view('wp-admin/form_list', $data);
	}
	public function assign($id)
	{
		$p = serialize($_POST['user_form_id']);
		$data = array(
			'user_form_id' => $p,
			'sub_admin_id' => $id
			
		);
		$this->db->select("sub_admin_id");
		$this->db->from("form_assign_to");
		$this->db->where("sub_admin_id", $id);
		$result =  $this->db->get()->row_array();
		
		if($result){
			$this->db->where('sub_admin_id', $id);
			$this->db->update('form_assign_to', $data);
			$this->session->set_flashdata("msg", "<div class='alert alert-success'><strong>Success!</strong> Successfully Updated</div>");
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$this->db->insert('form_assign_to', $data);
			$this->session->set_flashdata("msg", "<div class='alert alert-success'><strong>Success!</strong> Successfully Assign Forms</div>");
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	
	
}

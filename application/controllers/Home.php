<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
       parent::__construct();
	   $this->load->model('Welcome_model','WM');
	    $this->load->model('GetUser_model','GUM');
       $this->load->library('form_validation');
	   $this->load->library('email');
       }

	// Login Form
	
	public function index()
	{
		
		// redirect if user logged in
		$user_logged_in = $this->session->userdata('user');    
    	if ($user_logged_in) {
			
			redirect(base_url()."forms-list");
			
			
		}
		
		$data['action'] = base_url();
		$data['action_method'] = "POST";
		
		
		// validation for user login
		if($this->input->method(true)=="POST"){
					
			if($this->input->post('captcha') === $this->session->userdata('captcha')){
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$config = array(
			        array(
			                'field' => 'email',
			                'label' => 'Email',
			                'rules' => 'trim|required|valid_email',
			                'errors' => array(
			                        'required' => '{field} must not be empty.',
			                        'valid_email' => '{field} must contain a valid email address.',
			                ),
			        ),
					array(
			                'field' => 'password',
			                'label' => 'Password',
			                'rules' => 'trim|required',
			                'errors' => array(
			                        'required' => '{field} must not be empty.',
			                        
									
									
			                ),
			        )
			);
		
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules($config);
			
			// Check data if validation done
			if ($this->form_validation->run() == TRUE)
		    {
				
				//Check new user
				$userdata = array(
					'email' => $this->input->post('email'),
				    'password' => sha1($this->input->post('password'))
				);
				// doing login process
				
				$where = array('email'=> $userdata['email'], 'password' => $userdata['password'], 'status'=> "1");
				$this->db->select('status');
				$this->db->from('tbl_users');
				$this->db->where($where);				
				
				$query = $this->db->get()->row_array();
				
				
			if($query['status'] == 1){
					$check_login = $this->WM->process_userlogin($userdata);
					
				if($check_login){
					// set message if login successfully done
					$this->session->set_flashdata('success', 
					'<div class="alert alert-success alert-dismissable"> 
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Congratulation! '.$this->input->post('name').'</strong> you are logged in successfully.</div>');
					
						$this->db->where('ip_address', $this->input->ip_address);
						$this->db->delete('login_attempt');
					
					// set session data for users.
					$this->session->set_userdata('user', $check_login);
					
					//print_r($check_login);
						//pr($this->session->userdata('user')); die;
						redirect(base_url()."forms-list");
					
					
				}else{
					// set message if login successfully not done	
					$this->session->set_flashdata('success', 
					'<div class="alert alert-danger alert-dismissable"> 
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Sorry! '.$this->input->post('name').'</strong> Invalid email address and password.</div>');
					
					redirect(base_url());
					
				}
				
			}else{
				
				$this->db->select("ip_address");
				$this->db->from('login_attempt');
				$this->db->where('ip_address', $this->input->ip_address());
				$ip = $this->db->get()->row_array();
				
				if(empty($ip)){
					$datetime = date('Y-m-d H:i:s');
					$attempt_data = array(
						
						'datetime' => $datetime,
						'ip_address'	=>	$this->input->ip_address(),
						'attempt' 	=> 1
					);
					$this->db->insert('login_attempt', $attempt_data);
				}else{
					
					$this->db->select("attempt");
					$this->db->from('login_attempt');
					$this->db->where('ip_address', $this->input->ip_address());
					$attempt = $this->db->get()->row_array();
					
					if($attempt['attempt'] != 5){
						
						$attempts = $attempt['attempt']+1;
						
						$datetime = date('Y-m-d H:i:s');
						$attempt_data = array(
							
							'datetime' => $datetime,
							'ip_address'	=>	$this->input->ip_address(),
							'attempt' 	=> $attempts
						);
						$this->db->where('ip_address', $this->input->ip_address());
						$this->db->update('login_attempt', $attempt_data);
						
						$left_attempts =  5 - $attempts; 
						if($left_attempts == 1)
						{
							$msg = "You will be blocked if you enter wrong credential again";
						}else{
							$msg = 'You have '.$left_attempts.' attempts left';
						}
					}else{
						redirect(base_url().'block');
					}	
				}
				$this->session->set_flashdata('success', 
					'<div class="alert alert-danger alert-dismissable"> 
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Sorry! '.$this->input->post('name').'</strong> Your Account is not Active <br> <strong> '.$msg.' </strong></div>');
					
					redirect(base_url());
					
			}
				
		    }
			
		}else{
			$this->session->set_flashdata('cap', '<div class="error">Invalid Captcha</div>');
		}
	}
		// rand(10000, 99999);
		
		
		$length=5;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
		$captcha = $randomString;
		
		$this->session->set_userdata('captcha', $captcha);
		
			$this->db->select("attempt");
			$this->db->from('login_attempt');
			$this->db->where('ip_address', $this->input->ip_address());
			$attempt = $this->db->get()->row_array();
			
			if($attempt['attempt'] == 5){
				redirect(base_url().'block');
			}else{
				$this->load->view('homepage', $data);
			}
		
	}
	
	public function block_page()
	{
		$this->db->select("datetime");
			$this->db->from('login_attempt');
			$this->db->where('ip_address', $this->input->ip_address());
			$value = $this->db->get()->row_array();
			
			$date=date_create(date('Y-m-d H:i:s'));
			date_sub($date, date_interval_create_from_date_string("8 hour"));
			$last_date =  date_format($date,"Y-m-d H:i:s");
			
			$this->db->where('datetime <=', $last_date);
			$this->db->delete('login_attempt');
			
			$this->db->select("attempt");
			$this->db->from('login_attempt');
			$this->db->where('ip_address', $this->input->ip_address());
			$attempt = $this->db->get()->row_array();
			if($attempt['attempt'] == 5){
				$this->load->view('block_page');
			}else{
				redirect(base_url());
			}
			
		
	}
	public function password_check($str)
		{
		   if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
			 return TRUE;
		   }
		   return FALSE;
		}
	// Signup Form
	public function signup()
	{
		
		// redirect if user logged in
		$user_logged_in = $this->session->userdata('user');    
    	if ($user_logged_in) {
			redirect(base_url()."forms-list");
		}
		
		// form action url 
		$data['action'] = base_url()."signup";
		$data['action_method'] = "POST";
		
		// Check if the form is submited
		if($this->input->method(true)=="POST"){
			// form validations
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$config = array(
			        array(
			                'field' => 'name',
			                'label' => 'Name',
			                'rules' => 'trim|required|min_length[3]',
			                'errors' => array(
			                        'required' => '{field} must not be empty.',
			                        'min_length' => '{field} must have at least {param} characters.',
			                ),
			        ),
					array(
			                'field' => 'email',
			                'label' => 'Email',
			                'rules' => 'trim|required|valid_email|is_unique[tbl_users.email]',
			                'errors' => array(
			                        'required' => '{field} must not be empty.',
			                        'valid_email' => '{field} must contain a valid email address.',
			                        'is_unique' => '{field} already exists.',
			                ),
			        ),
					array(
			                'field' => 'password',
			                'label' => 'Password',
			                'rules' => 'trim|required|min_length[8]|max_length[15]|alpha_numeric|callback_password_check',
			                'errors' => array(
			                        'required' => '{field} must not be empty.',
			                        'min_length' => '{field} must have at least {param} characters.',
			                        'max_length' => '{field} field cannot exceed {param} characters in length.',
									'alpha_numeric' => '{field} must contain numbers',
									'password_check' => '{field}  must contain numbers',
			                ),
			        ),
					array(
			                'field' => 'passconf',
			                'label' => 'Confirm Password',
			                'rules' => 'trim|required|matches[password]',
			                'errors' => array(
			                        'required' => '{field} must not be empty.',
			                        'matches' => '{field} does not match the Password.',
			                ),
			        )
					
			);
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules($config);
			
			// Insert data if validation done
			if ($this->form_validation->run() == TRUE)
		    {
				//Insert new user
				$userdata = array(
					'name' => $this->input->post('name'),
				    'email' => $this->input->post('email'),
				    'password' => sha1($this->input->post('password')),
				    'status' => '0'
				);
				
				
				
				if($this->WM->adduser($userdata)){
					
					 //$enc = base64_encode($userdata['email']);
					 
					 $enc = strtr(base64_encode($userdata['email']), '+/=', '._-');
					
					 
					 $active_link = "<a href ='".base_url()."home/activeUser/$enc'>Click Here</a>";
					
					
					// send mail to user for registration confimartion
					$this->email->from(MAIL_FROM, $userdata['name']);
					$this->email->to($userdata['email']);
					$this->email->subject(sprintf(MAIL_SUBJECT_NEW_USER, $userdata['name']));
					$this->email->message(sprintf(MAIL_MSG_USER, $userdata['name'], $userdata['email'], $active_link));
					$this->email->set_mailtype("html");
					 
					
					if($this->email->send()){
						//mail data to be reset between cycles.	
						$this->email->clear();
						// send mail to admin for new account confimartion
						$this->email->from(MAIL_FROM, $userdata['name']);
						$this->email->to(MAIL_TO_ADMIN);
						$this->email->subject(sprintf(MAIL_SUBJECT_ADMIN, $userdata['name']));
						$this->email->message(sprintf(MAIL_MSG_ADMIN, $userdata['name'], $userdata['email']));
						$this->email->set_mailtype("html");
						$this->email->send();	
					}
					
					$this->session->set_flashdata('success', 
					'<div class="alert alert-success alert-dismissable"> 
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Congratulation! '.$this->input->post('name').'</strong> your account has been created successfully. <strong>Please check your mail to verfy your account.</strong></div>');
				}
				
				redirect(base_url());
		    }
		}
			
		$this->load->view('signup', $data);
	}
	public function activeUser($email)
	{
		$dnc = base64_decode($email);
		$data = array(
			 'status' => '1'
		);
		$this->db->where('email', $dnc);
		$this->db->update('tbl_users', $data);
		
		$this->session->set_flashdata('success', 
					'<div class="alert alert-success alert-dismissable"> 
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Your account has been Active successfully You can login now.</div>');
				redirect(base_url());
	}
	
	// Forgot Password Form
	public function forms_list()
	{
	
		// redirect if user not logged in
		$user_logged_in = $this->session->userdata('user'); 	
			
    	if (!$user_logged_in) {
			redirect(base_url());
		}
		$data['user_data'] = $this->GUM->get_user($user_logged_in['id']);
		//pr($data['user_data']); 
		$this->load->view('forms-list',$data);
	}
	
	// Forgot Password Form
	public function reset_pass()
	{
		// form action url 
		$data['action'] = base_url()."reset-pass/".$this->uri->segment(2);
		$data['action_method'] = "POST";
		
		// redirect if user logged in
		$user_logged_in = $this->session->userdata('user');    
    	if ($user_logged_in) {
			redirect(base_url()."forms-list");
		}
			
		// Check if the form is submited
		if($this->input->method(true)=="POST"){
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$config = array(
				        array(
				                'field' => 'password',
				                'label' => 'Password',
				                'rules' => 'trim|required|min_length[5]|max_length[12]',
				                'errors' => array(
				                        'required' => '{field} must not be empty.',
				                        'min_length' => '{field} must have at least {param} characters.',
				                        'max_length' => '{field} field cannot exceed {param} characters in length.',
				                ),
				        ),
						array(
				                'field' => 'passconf',
				                'label' => 'Confirm Password',
				                'rules' => 'trim|required|matches[password]',
				                'errors' => array(
				                        'required' => '{field} must not be empty.',
				                        'matches' => '{field} does not match the Password.',
				                ),
				        )
					
			);
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules($config);
			
			// Insert data if validation done
			if ($this->form_validation->run() == TRUE)
		    {
		    	//check if link expires
		 		$check_link_expires = $this->WM->check_reset_link_expires($this->uri->segment(2));
				
				if($check_link_expires){
				//Insert new user
				$userdata = array(
					'id' => $check_link_expires['user_id'],
					'password' => sha1($this->input->post('password')),
				);
				
				//edit password
				$userdata = $this->WM->edituser_password($userdata);
				
				if($userdata){
						
					//expire the reset code	
					$this->WM->set_reset_code_expires($this->uri->segment(2));
					
					// send mail to user for registration confimartion
					$this->email->from(MAIL_FROM, $userdata['name']);
					$this->email->to($userdata['email']);
					$this->email->subject(sprintf(MAIL_SUBJECT_CHANGE_PASS, $userdata['name']));
					$this->email->message(sprintf(MAIL_MSG_CHANGE_PASS, $userdata['name'], base_url()));
					$this->email->set_mailtype("html");
					$this->email->send();

					$this->session->set_flashdata('success', 
					'<div class="alert alert-success alert-dismissable"> 
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Congratulation! '.$this->input->post('name').'</strong> your password has been changed successfully.</div>');
					redirect(base_url());
				}
				}else{
					
					// set message to reset password link is expired
					$this->session->set_flashdata('success', 
					'<div class="alert alert-danger alert-dismissable"> 
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Oops!</strong> your link is expired.</div>');
					redirect(base_url());	
				}
				
		    }
			
		}

		$this->load->view('reset-password', $data);
	}
	
	// Forgot Password Form
	public function forgot_password()
	{
		// redirect if user logged in
		$user_logged_in = $this->session->userdata('user');    
    	if ($user_logged_in) {
			redirect(base_url()."forms-list");
		}
		
		// form action url 
		$data['action'] = base_url()."forgot-password";
		$data['action_method'] = "POST";
		
		// Check if the form is submited
		if($this->input->method(true)=="POST"){
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$config = array(
				        array(
				                'field' => 'email',
				                'label' => 'Email',
				                'rules' => 'trim|required|valid_email',
				                'errors' => array(
				                        'required' => '{field} must not be empty.',
				                        'valid_email' => '{field} must contain a valid email address.',
				        )
			        )
					
			);
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == TRUE)
		    {
			//Check new user
				$userdata = array(
					'email' => $this->input->post('email')
				);
				// doing login process
				$check_login = $this->WM->process_userforgotpass($userdata);
				
				if($check_login){
					
					$check_login = array('user_id'=>$check_login['id']);
					//insert a unique variable to the user to know if user has requested for forgot password.
					$pass_reset = $this->WM->forgot_pass_dataset($check_login);
					
					if($pass_reset){
						//send mail to user with reset link
						$this->email->from(MAIL_FROM, $pass_reset['name']);
						$this->email->to($pass_reset['email']);
						$this->email->subject(sprintf(MAIL_SUBJECT_FORGOT_PASS, $pass_reset['name']));
						$this->email->message(sprintf(MAIL_MSG_FORGOT_PASS, $pass_reset['name'], '<a href="'.base_url().'">RECL</a>', '<a href="'.base_url().'reset-pass/'.$pass_reset['id'].'">'.base_url().'reset-pass/'.$pass_reset['id'].'</a>'));
						$this->email->set_mailtype("html");	
						$this->email->send();
                        
					}
						
					// set message if login successfully done
					$this->session->set_flashdata('success', 
					'<div class="alert alert-success alert-dismissable"> 
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Dear '.$pass_reset['name'].'</strong>, please check your inbox.</div>');
					
					// set session data for users.
					redirect(base_url()."forgot-password");
					
				}else{
					// set message if login successfully not done	
					$this->session->set_flashdata('success', 
					'<div class="alert alert-danger alert-dismissable"> 
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Sorry! '.$this->input->post('email').'</strong> is Invalid email address and password.</div>');
					
					redirect(base_url()."forgot-password");
				}
			}
		}
		
		$this->load->view('forgot-password', $data);
	}
	
	// Logout User
	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('form_id');
		redirect(base_url());
	}
}

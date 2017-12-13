<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
       parent::__construct();
       $this->load->model('wp-admin/Login_model','LM');
       $this->load->library('form_validation');
    }

	public function index()
	{
		$length=5;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
		$captcha = $randomString;
		
		$this->session->set_userdata('captcha', $captcha);
		$this->load->view('wp-admin/login');
	}
	
	public function processing()
	{
		if($this->input->post('captcha') === $this->session->userdata('captcha')) {
			
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			
			if ($this->form_validation->run()) {
				
				$result = $this->LM->processing();
				if(!empty($result)){
					$this->session->set_userdata('login_session', $result);
					redirect(base_url().'wp-admin/dashboard');
				}else{
					$this->session->set_flashdata('form_validation', 'username or password is invalid.');
					redirect($_SERVER['HTTP_REFERER']);
				}
				
			}else{
				$this->session->set_flashdata('form_validation', validation_errors());
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			$this->session->set_flashdata('form_validation', '<div class="error" >Invalid Captcha</div>');
				redirect($_SERVER['HTTP_REFERER']);
		}
	}

		
	public function forget_password()
	{
		   extract($_POST);
		    $get_email = $this->db->get_where('admin_users',array('email'=>$forgot_email));
			if($get_email->num_rows()==0){
						
						 $email_not_found = 'TRUE';
					}
			 $login_details=$this->LM->admin_records($forgot_email);
			$msg = '<p>Dear Admin<br/><br/>
						 Your credentials is below with new password please visit on our website and try login attemts.<br>
				        Username:- '.$login_details['username'].'<br>
				        Password:- '.$login_details['password'].'<br><br>
				        
						Thanks<br>
						Recl
				
				</p>';
			   
			    $status = sendMail($login_details['email'],'RECL', 'lokeshtechximum@gmail.com', 'New Password | RECL', $msg);
				
				 if(isset($email_not_found)){
					$this -> session -> set_flashdata('message_name','<div class="alert alert-dismissible alert-danger text-center" style="margin-bottom: 10px;"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <b>Oops</b> This Email is Not Existing</div>');
					redirect(base_url().'wp-admin/login');
				}else{
				
					if ($status) {
						$this -> session -> set_flashdata('message_name','<div class="alert alert-dismissible alert-success text-center" style="margin-bottom: 10px;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <b>Congratulations</b> Your new password has been sent on your email id please check and try to login with new password.</div>');
						redirect(base_url("wp-admin/login"));
					}else{
						$this -> session -> set_flashdata('message_name','<div class="alert  alert-dismissible alert-danger text-center" style="margin-bottom: 10px;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <b>Warning</b> Email Not Sent</div>');
						redirect(base_url("wp-admin/login"));
					}
				     	}
		
	}

	public function logout()
	{
		$this->session->unset_userdata('login_session');
		redirect(base_url().'wp-admin/login');	
	}
}

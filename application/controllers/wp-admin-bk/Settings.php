<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct() {
       parent::__construct();
       $this->load->model('wp-admin/Settings_model','SSM');
       $this->load->library('form_validation');
    }

	public function index()
	{
		$user_detail=$this->session->userdata('login_session')['username'];
		$data['user_details']=$this->SSM->get_setting($user_detail);
		$this->load->view('wp-admin/settings/index',$data);
	}
	
	public function change_settings($username)
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if ($this->form_validation->run() == FALSE)
        {
        	$this->session->set_flashdata('form_validation', validation_errors());
			$this->session->set_flashdata('post_data', $_POST);
			redirect($_SERVER['HTTP_REFERER']);
        } else
        {
        	$this->SSM->update_setting($username);
			$this->session->set_flashdata("message_name","<div class='alert alert-dismissible alert-success text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <b>Success</b> Successfully Updated.</div>");
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function change_password()
	{
		$this->load->view('wp-admin/settings/change_password');
	}
	
	public function change_new_password()
	{
		extract($_POST);
		$pass=$this->input->post('old_password');
		$npass=$this->input->post('newpassword');
		$rpass=$this->input->post('re_password');
		if($npass!=$rpass){
			$this->session->set_flashdata("message_name","<div class='alert alert-dismissible alert-danger text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <b>Warning</b> Password Not Match.</div>");
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			$get_user=$this->SSM->processing($username,$pass);
			if($get_user){
				$this->SSM->update_password($username,$npass);
				$this->session->set_flashdata("message_name","<div class='alert alert-dismissible alert-success text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <b>Success</b> Password Successfully Change.</div>");
			    redirect($_SERVER['HTTP_REFERER']);
			}else{
				$this->session->set_flashdata("message_name","<div class='alert alert-dismissible alert-danger text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> <b>Warning</b> Password Not Changed.</div>");
			     redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}
	
	public function social()
	{
		$data['social_detail']=$this->SSM->get_social();
		$this->load->view('wp-admin/settings/social',$data);
	}
	
	public function updated_social()
	{
		$updated=$this->SSM->update_social();
		$this->session->set_flashdata("message_name","<div class='alert alert-dismissible alert-success text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> Successfully Updated.</div>");
		redirect($_SERVER['HTTP_REFERER']);
		
	}
	
}

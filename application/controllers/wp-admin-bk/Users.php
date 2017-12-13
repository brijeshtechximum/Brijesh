<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct() {
       parent::__construct();
       $this->load->model('wp-admin/Users_model','UM');
	   $this->load->model('Welcome_model','WM');
       $this->load->library('form_validation');
    }

	public function index()
	{
		$data['details']=$this->UM->get_user();
		$this->load->view('wp-admin/users/index',$data);
	}
	
	public function form_gen($id){
		
		// display generation form only and hiding all other radio buttons
			
		$data['form_type'] = 'gen' ;
			
		// fetch data if form is filed for generation form
		$data['gn_a'] = $this->WM->get_generation_a();
		$data['gn_b'] = $this->WM->get_generation_b();
		$data['gn_b1'] = $this->WM->get_generation_b1();
		$data['gn_c'] = $this->WM->get_generation_c();
		$data['gn_3'] = $this->WM->get_generation_3();
		
		$this->load->view('wp-admin/users/form_gen', $data);
	}
	
	public function delete($id)
	{
		$this->EM->delete($id);
		$this->session->set_flashdata("message_name","<div class='alert alert-dismissible alert-success text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> Successfully Delete.</div>");
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}

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
		if(!empty($this->session->userdata('login_session'))){
			$data['details']=$this->UM->get_user();
			$this->load->view('wp-admin/users/index',$data);
		}else{
			redirect(base_url().'wp-admin/login');	
		}
	}
	
	public function form_gen($id){
		//pr($id);
		// display generation form only and hiding all other radio buttons
			
		$data['form_type'] = 'gen' ;
		// fetch data if form is filed for generation form
		$data['gn_a'] = $this->UM->get_generation_a($id);
		
		$data['gn_b'] = $this->UM->get_generation_b($data['gn_a']['user_id']);
		$data['gn_2'] = $this->UM->get_generation_2($data['gn_a']['user_id']);
		$data['gn_2a'] = $this->UM->get_generation_2a($data['gn_a']['user_id']);
		$data['gn_2b'] = $this->UM->get_generation_2b($data['gn_a']['user_id']); 
		
		$data['gn_b1'] = $this->UM->get_generation_b1($data['gn_a']['user_id']);
		$data['gn_c'] = $this->UM->get_generation_c($data['gn_a']['user_id']);
		$data['gn_3'] = $this->UM->get_generation_3($data['gn_a']['user_id']);
		$data['gn_san'] = $this->UM->get_generation_2_sanction($data['gn_a']['user_id']);
		
		$data['gn_4'] = $this->UM->get_generation_4($data['gn_a']['user_id']);
		
		$this->load->view('wp-admin/users/form_gen', $data);
	}
	
	public function form_ren($id){
		
		// display generation form only and hiding all other radio buttons
			
		$data['form_type'] = 'ren' ;
			
		// fetch data if form is filed for generation form
		
		$data['rn1'] = $this->UM->get_ren_1($id);
		$data['rn1a'] = $this->UM->get_ren_1a($data['rn1']['user_id']);
		$data['rn_2'] = $this->UM->get_ren_2($data['rn1']['user_id']);
		$data['rn_2a'] = $this->UM->get_ren_2a($data['rn1']['user_id']);
		$data['rn_3'] = $this->UM->get_ren_3($data['rn1']['user_id']);
		$data['rn_4'] = $this->UM->get_ren_4($data['rn1']['user_id']);
		$data['rn_5'] = $this->UM->get_ren_5($data['rn1']['user_id']);
		
		$this->load->view('wp-admin/users/form_gen', $data);
	}
	public function form_ss($id){
		
		// display generation form only and hiding all other radio buttons
			
		$data['form_type'] = 'ss' ;
			
		// fetch data if form is filed for generation form
		
		$data['ss1'] = $this->UM->get_ss_1($id);
		$data['ss_a'] = $this->UM->get_ss_a($data['ss1']['user_id']);
		$data['ss_b'] = $this->UM->get_ss_b($data['ss1']['user_id']);
		$data['ss_c'] = $this->UM->get_ss_c($data['ss1']['user_id']);
		
		$this->load->view('wp-admin/users/form_gen', $data);		
	}
	
		public function form_ssgn($id){
		//pr($id);
		// display generation form only and hiding all other radio buttons
			
		$data['form_type'] = 'ss_gn' ;
		// fetch data if form is filed for generation form
		$data['ss_gn_a'] = $this->UM->get_ss_generation_a($id);
		$data['ss_gn_b'] = $this->UM->get_ss_generation_b($data['ss_gn_a']['user_id']);
		$data['ss_gn_2'] = $this->UM->get_ss_generation_2($data['ss_gn_a']['user_id']);
		$data['ss_gn_2a'] = $this->UM->get_ss_generation_2a($data['ss_gn_a']['user_id']);
		$data['ss_gn_2b'] = $this->UM->get_ss_generation_2b($data['ss_gn_a']['user_id']);
		$data['ss_gn_b1'] = $this->UM->get_ss_generation_b1($data['ss_gn_a']['user_id']);
		$data['ss_gn_c'] = $this->UM->get_ss_generation_c($data['ss_gn_a']['user_id']);
		$data['ss_gn_3'] = $this->UM->get_ss_generation_3($data['ss_gn_a']['user_id']);
		$data['ss_gn_san'] = $this->UM->get_ss_generation_2_sanction($data['ss_gn_a']['user_id']);
		$data['ss_gn_4'] = $this->UM->get_ss_generation_4($data['ss_gn_a']['user_id']);
		
	
		$this->load->view('wp-admin/users/form_gen', $data);
	}
	
	function form2(){
		$this->load->view('wp-admin/users/form2/index');
	}

	function form2_next_step(){
		$app_id = $this->uri->segment('4');
		
		//$check_user = $this->UM->check_borrower_form($app_id);
		$data['details']=$this->UM->get_firststep($app_id);
		$data['detail_sec']=$this->UM->get_secondstep($app_id);
		$data['detail_sec_c']=$this->UM->get_secondstep_c($app_id);
		$data['detail_sec_mod']=$this->UM->get_secondstepmod($app_id);
		$data['detail_third']=$this->UM->get_thirdstep($app_id);
		$data['tabs'] = "step1";
		//pr($data['detail_sec_mod']);
		$this->load->view('wp-admin/users/form2/first-first-step',$data);
	
	}
	
	function form2_next_step1()
	{
		$this->load->view('wp-admin/users/form2/sectionb');
	}
	function form2_next_step2()
	{
		$app_id = $this->uri->segment('4');
		$data['secb1'] = $this->UM->fectch_sec_b1($app_id);
		$data['secb2'] = $this->UM->fectch_sec_b2($app_id);
		$data['secb2a'] = $this->UM->fectch_sec_b2a($app_id);
		$data['secb3'] = $this->UM->fectch_sec_b3($app_id);
		$data['secb4'] = $this->UM->fectch_sec_b4($app_id);
		$data['secb5'] = $this->UM->fectch_sec_b5($app_id);
		$data['secb6'] = $this->UM->fectch_sec_b6($app_id);
		$data['secb7'] = $this->UM->fectch_sec_b7($app_id);
		$data['secb8'] = $this->UM->fectch_sec_b8($app_id);
		$data['secb9'] = $this->UM->fectch_sec_b9($app_id);
		$data['secb10'] = $this->UM->fectch_sec_b10($app_id);
		$data['tabs'] = "step1";
		
		$this->load->view('wp-admin/users/form2/sectionb1', $data);
	}
	function form2_next_step3()
	{
		$this->load->view('wp-admin/users/form2/first-first-step1');
	}
	function form2_next_step4()
	{
		$app_id = $this->uri->segment('4');
		$data['sec_c1'] = $this->UM->fectch_sec_c1($app_id);
		$data['sec_c2'] = $this->UM->fectch_sec_c2($app_id);
		$data['sec_c3'] = $this->UM->fectch_sec_c3($app_id);
		$data['sec_c4'] = $this->UM->fectch_sec_c4($app_id);
		$data['tabs'] = "step1";
		$this->load->view('wp-admin/users/form2/first-first-step2', $data);
	}
	
	public function delete($id)
	{
		$this->EM->delete($id);
		$this->session->set_flashdata("message_name","<div class='alert alert-dismissible alert-success text-center'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button> Successfully Delete.</div>");
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}

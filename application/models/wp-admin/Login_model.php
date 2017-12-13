<?php
class Login_model extends CI_Model{
    
	function __construct() {
		parent::__construct();
	}
	
	function processing(){
    	
		$result = $this->db->select('*')
					->from('admin_users')
					->where('email', $this->input->post('username'))
					->where('password', base64_encode($this->input->post('password')))
					->get()
					->row_array();
		
		return $result;
	}
	
	function admin_records($forgot_email){
		$this->db->select('*');
		$this->db->from('admin_users');
		$this->db->where('email',$forgot_email);
		$result = $this->db->get()->row_array();
		return $result;
	}
	
}

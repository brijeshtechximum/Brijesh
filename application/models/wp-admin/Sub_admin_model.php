<?php
class Sub_admin_model extends CI_Model{
    
	function __construct() {
		parent::__construct();
	}
	
	
	public function add_sub_admin()
	{
		//print_r($_POST);
		$v = array($this->input->post('generation'), $this->input->post('renewable'), $this->input->post('TD'), $this->input->post('state_sector_generation'));
		$a = serialize($v);
		
		$this->db->select('email');
		$this->db->from('admin_users');
		$this->db->where('email',$this->input->post('email'));
		$result = $this->db->get()->result();
		if(empty($result)){
			$data =  array(
				'username' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'password' => base64_encode($this->input->post('password')),
				'assign_form' => $a
			);
				$this->db->insert('admin_users',$data);
				$this->session->set_flashdata("error", "<div class='alert alert-success'><strong>Success!</strong> Successfully Add <strong><a href='".base_url()."wp-admin/sub_admin/admin_list'>List</a></strong></div>");
				redirect(base_url().'wp-admin/sub_admin');
		}else{
				$this->session->set_flashdata("error", "<div class='alert alert-danger'><strong>Danger!</strong> Email already exist.</div>");
				redirect(base_url().'wp-admin/sub_admin');
		}
	}
	
	public function edit_sub_admin($id)
	{
		//print_r($_POST);
		$v = array($this->input->post('generation'), $this->input->post('renewable'), $this->input->post('TD'), $this->input->post('state_sector_generation'));
		$a = serialize($v);
		
			$data =  array(
				'username' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'password' => base64_encode($this->input->post('password')),
				'assign_form' => $a
			);
			
				$this->db->where('id', $id);
				$this->db->update('admin_users',$data);
				$this->session->set_flashdata("error", "<div class='alert alert-success'><i class='fa fa-check' style='font-size:20px;'></i>    <strong>Successfully Updated... </strong></div>");
				redirect(base_url().'wp-admin/sub_admin/admin_edit/'.$id);
		
	}
	
	public function sub_admin_list()
	{
		$this->db->select("*");
		$this->db->from('admin_users');
		$this->db->where('role', 0);
		return $this->db->get()->result();
	}
	public function admin_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('admin_users');
		
		$this->session->set_flashdata("msg", "<div class='alert alert-success'><strong>Success!</strong> Successfully Deleted</div>");
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function get_admin_list($id)
	{
		$this->db->select("*");
		$this->db->from("admin_users");
		$this->db->where("id", $id);
		return $this->db->get()->row_array();
	}
	public function userlist()
	{
		$this->db->select("*");
		$this->db->from("tbl_users");
		return $this->db->get()->result();
	}
	public function fetch_user_form_id($id)
	{
		$this->db->select("user_form_id");
		$this->db->from("form_assign_to");
		$this->db->where('sub_admin_id', $id);
		return $this->db->get()->row_array();
	}
}

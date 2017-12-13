<?php
class Users_model extends CI_Model{
    
	function __construct() {
		parent::__construct();
	}
	
	function get_user(){
    	
		$result = $this->db->select('tbl_users.*,tbl_generation_a.app_id as gid,tbl_state_sector.app_id as sid,tbl_renew_1.app_id as rid')
					->from('tbl_users')
					->join('tbl_generation_a','tbl_users.id=tbl_generation_a.user_id','left')
					->join('tbl_state_sector','tbl_users.id=tbl_state_sector.user_id','left')
					->join('tbl_renew_1','tbl_users.id=tbl_renew_1.user_id','left')
					->order_by('tbl_users.id','desc')
					->get()
					->result_array();
		return $result;
	}
	
	function delete($id){
	   $this->db->where('id',$id);
	   $this->db->delete('tbl_enquiry');
	}
	
	
}

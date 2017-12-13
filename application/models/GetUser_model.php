<?php
class GetUser_model extends CI_Model{
    
	function __construct() {
		parent::__construct();
	}
	
		public function get_user($id)
	{
		$result = $this->db->select('tbl_users.email,tbl_users.name,tbl_generation_a.app_id as gid,tbl_generation_a.form_id as fid,tbl_renew_1.form_id as rfid,tbl_ss_generation_a.form_id as ssfid, tbl_state_sector.form_id as TDfid, tbl_generation_a.url as G_url,tbl_ss_generation_a.url as SSG_url, tbl_state_sector.url as TD_url, tbl_renew_1.url as RN_url,tbl_state_sector.app_id as sid,tbl_renew_1.app_id as rid,tbl_ss_generation_a.app_id as ssgid')
					
					->from('tbl_users')
					->join('tbl_generation_a','tbl_users.id=tbl_generation_a.user_id','left')
					->join('tbl_state_sector','tbl_generation_a.form_id=tbl_state_sector.form_id','left')
					->join('tbl_renew_1','tbl_generation_a.form_id=tbl_renew_1.form_id','left')
					->join('tbl_ss_generation_a','tbl_generation_a.form_id=tbl_ss_generation_a.form_id','left')
					->where('tbl_users.id', $id)
					->get()
					->result_array();
					
		$result1 = $this->db->select('tbl_users.email,tbl_users.name,tbl_generation_a.app_id as gid,tbl_generation_a.form_id as fid,tbl_renew_1.form_id as rfid,tbl_ss_generation_a.form_id as ssfid, tbl_state_sector.form_id as TDfid, tbl_generation_a.url as G_url,tbl_ss_generation_a.url as SSG_url, tbl_state_sector.url as TD_url, tbl_renew_1.url as RN_url,tbl_state_sector.app_id as sid,tbl_renew_1.app_id as rid,tbl_ss_generation_a.app_id as ssgid')
					
					->from('tbl_users')
					->join('tbl_renew_1','tbl_users.id=tbl_renew_1.user_id','left')
					->join('tbl_ss_generation_a','tbl_renew_1.form_id=tbl_ss_generation_a.form_id','left')
					->join('tbl_generation_a','tbl_renew_1.form_id=tbl_generation_a.form_id','left')
					->join('tbl_state_sector','tbl_renew_1.form_id=tbl_state_sector.form_id','left')
					->where('tbl_users.id', $id)
					->get()
					->result_array();			
					
		$result2 = $this->db->select('tbl_users.email,tbl_users.name,tbl_generation_a.app_id as gid,tbl_generation_a.form_id as fid,tbl_renew_1.form_id as rfid,tbl_ss_generation_a.form_id as ssfid, tbl_state_sector.form_id as TDfid, tbl_generation_a.url as G_url,tbl_ss_generation_a.url as SSG_url, tbl_state_sector.url as TD_url, tbl_renew_1.url as RN_url,tbl_state_sector.app_id as sid,tbl_renew_1.app_id as rid,tbl_ss_generation_a.app_id as ssgid')
		
				->from('tbl_users')
				->join('tbl_state_sector','tbl_users.id=tbl_state_sector.user_id','left')
				->join('tbl_generation_a','tbl_state_sector.form_id=tbl_generation_a.form_id','left')
				->join('tbl_renew_1','tbl_state_sector.form_id=tbl_renew_1.form_id','left')
				->join('tbl_ss_generation_a','tbl_state_sector.form_id=tbl_ss_generation_a.form_id','left')
				->where('tbl_users.id', $id)
				->get()
				->result_array();
				
				
					
	    $result3 = $this->db->select('tbl_users.email,tbl_users.name,tbl_generation_a.app_id as gid,tbl_generation_a.form_id as fid,tbl_renew_1.form_id as rfid,tbl_ss_generation_a.form_id as ssfid, tbl_state_sector.form_id as TDfid, tbl_generation_a.url as G_url,tbl_ss_generation_a.url as SSG_url, tbl_state_sector.url as TD_url, tbl_renew_1.url as RN_url,tbl_state_sector.app_id as sid,tbl_renew_1.app_id as rid,tbl_ss_generation_a.app_id as ssgid')
					
					->from('tbl_users')
					->join('tbl_ss_generation_a','tbl_users.id=tbl_ss_generation_a.user_id','left')
					->join('tbl_state_sector','tbl_ss_generation_a.form_id=tbl_state_sector.form_id','left')
					->join('tbl_renew_1','tbl_ss_generation_a.form_id=tbl_renew_1.form_id','left')
					->join('tbl_generation_a','tbl_ss_generation_a.form_id=tbl_generation_a.form_id','left')
					->where('tbl_users.id', $id)
					->get()
					->result_array();				
				
	
		$b = array_merge($result, $result1, $result2, $result3);

		$test =	$this->multi_unique($b);
		//pr($test);
		return $test;
	} 
	
	function multi_unique($array) {
    foreach ($array as $k=>$na)
        $new[$k] = serialize($na);
    $uniq = array_unique($new);
    foreach($uniq as $k=>$ser)
        $new1[$k] = unserialize($ser);
    return ($new1);
}
	
 	
 /*	public function get_user($id)
	{
		
		$result = $this->db->select('tbl_users.email,tbl_users.name,tbl_generation_a.app_id as gid,tbl_generation_a.form_id as fid, tbl_generation_a.url as G_url,tbl_ss_generation_a.url as SSG_url, tbl_state_sector.url as TD_url, tbl_renew_1.url as RN_url,tbl_state_sector.app_id as sid,tbl_renew_1.app_id as rid,tbl_ss_generation_a.app_id as ssgid')
					
					->from('tbl_users')
					->join('tbl_generation_a','tbl_users.id=tbl_generation_a.user_id','left')
					->join('tbl_state_sector','tbl_users.id=tbl_state_sector.user_id','left')
					->join('tbl_renew_1','tbl_users.id=tbl_renew_1.user_id','left')
					->join('tbl_ss_generation_a','tbl_users.id=tbl_ss_generation_a.user_id','left')
					->where('tbl_users.id', $id)
					->order_by('tbl_users.id','desc')
					->get()
					->result_array();
					//pr($result);die;
		return $result;
	}
	*/
/* 		public function get_user($id)
	{
		$result1 = $this->db->select('email,name')
					
					->from('tbl_users')
					->where('id', $id)
					->order_by('id','desc')
					->get()
					->result_array();
		
		
		$result2 = $this->db->select('tbl_generation_a.app_id as gid,tbl_generation_a.form_id as fid, tbl_generation_a.url as G_url')
					->from('tbl_generation_a')
					->order_by('user_id','desc')
					->where('user_id', $id)
					->get()
					->result_array();
					
		$result3 = $this->db->select('tbl_renew_1.app_id as rid,tbl_renew_1.form_id as fid, tbl_renew_1.url as RN_url')
					->from('tbl_renew_1')
					->order_by('user_id','desc')
					->where('user_id', $id)
					->get()
					->result_array();	
		
		$result4 = $this->db->select('tbl_state_sector.app_id as sid,tbl_state_sector.form_id as fid, tbl_state_sector.url as TD_url')
					->from('tbl_state_sector')
					->order_by('user_id','desc')
					->where('user_id', $id)
					->get()
					->result_array();
		
		$result5 = $this->db->select('tbl_ss_generation_a.app_id as ssgid,tbl_ss_generation_a.form_id as fid, tbl_ss_generation_a.url as SSG_url')
					->from('tbl_ss_generation_a')
					->order_by('user_id','desc')
					->where('user_id', $id)
					->get()
					->result_array();	
		
		$result=array($result1,$result2,$result3,$result4,$result5);
		
		return $result;
	} */

}
?>	
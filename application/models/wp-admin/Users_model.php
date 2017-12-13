<?php
class Users_model extends CI_Model{
    
	function __construct() {
		parent::__construct();
	}
	
	
	function get_user()
	{
		$result = $this->db->select('tbl_users.email,tbl_users.name, tbl_users.id,tbl_generation_a.app_id as gid,tbl_generation_a.form_id as fid,tbl_renew_1.form_id as rfid,tbl_ss_generation_a.form_id as ssfid, tbl_state_sector.form_id as TDfid, tbl_generation_a.url as G_url,tbl_ss_generation_a.url as SSG_url, tbl_state_sector.url as TD_url, tbl_renew_1.url as RN_url,tbl_state_sector.app_id as sid,tbl_renew_1.app_id as rid,tbl_ss_generation_a.app_id as ssgid')
					
					->from('tbl_users')
					->join('tbl_generation_a','tbl_users.id=tbl_generation_a.user_id','left')
					->join('tbl_state_sector','tbl_generation_a.form_id=tbl_state_sector.form_id','left')
					->join('tbl_renew_1','tbl_generation_a.form_id=tbl_renew_1.form_id','left')
					->join('tbl_ss_generation_a','tbl_generation_a.form_id=tbl_ss_generation_a.form_id','left')
					->order_by('tbl_users.id','desc')
					->get()
					->result_array();
					
		$result1 = $this->db->select('tbl_users.email,tbl_users.name, tbl_users.id,tbl_generation_a.app_id as gid,tbl_generation_a.form_id as fid,tbl_renew_1.form_id as rfid,tbl_ss_generation_a.form_id as ssfid, tbl_state_sector.form_id as TDfid, tbl_generation_a.url as G_url,tbl_ss_generation_a.url as SSG_url, tbl_state_sector.url as TD_url, tbl_renew_1.url as RN_url,tbl_state_sector.app_id as sid,tbl_renew_1.app_id as rid,tbl_ss_generation_a.app_id as ssgid')
					
					->from('tbl_users')
					->join('tbl_renew_1','tbl_users.id=tbl_renew_1.user_id','left')
					->join('tbl_ss_generation_a','tbl_renew_1.form_id=tbl_ss_generation_a.form_id','left')
					->join('tbl_generation_a','tbl_renew_1.form_id=tbl_generation_a.form_id','left')
					->join('tbl_state_sector','tbl_renew_1.form_id=tbl_state_sector.form_id','left')
					->order_by('tbl_users.id','desc')
					->get()
					->result_array();			
					
		$result2 = $this->db->select('tbl_users.email,tbl_users.name, tbl_users.id, tbl_generation_a.app_id as gid,tbl_generation_a.form_id as fid,tbl_renew_1.form_id as rfid,tbl_ss_generation_a.form_id as ssfid, tbl_state_sector.form_id as TDfid, tbl_generation_a.url as G_url,tbl_ss_generation_a.url as SSG_url, tbl_state_sector.url as TD_url, tbl_renew_1.url as RN_url,tbl_state_sector.app_id as sid,tbl_renew_1.app_id as rid,tbl_ss_generation_a.app_id as ssgid')
		
				->from('tbl_users')
				->join('tbl_state_sector','tbl_users.id=tbl_state_sector.user_id','left')
				->join('tbl_generation_a','tbl_state_sector.form_id=tbl_generation_a.form_id','left')
				->join('tbl_renew_1','tbl_state_sector.form_id=tbl_renew_1.form_id','left')
				->join('tbl_ss_generation_a','tbl_state_sector.form_id=tbl_ss_generation_a.form_id','left')
				->order_by('tbl_users.id','desc')
				->get()
				->result_array();
				
				
					
	    $result3 = $this->db->select('tbl_users.email,tbl_users.name, tbl_users.id,tbl_generation_a.app_id as gid,tbl_generation_a.form_id as fid,tbl_renew_1.form_id as rfid,tbl_ss_generation_a.form_id as ssfid, tbl_state_sector.form_id as TDfid, tbl_generation_a.url as G_url,tbl_ss_generation_a.url as SSG_url, tbl_state_sector.url as TD_url, tbl_renew_1.url as RN_url,tbl_state_sector.app_id as sid,tbl_renew_1.app_id as rid,tbl_ss_generation_a.app_id as ssgid')
					
					->from('tbl_users')
					->join('tbl_ss_generation_a','tbl_users.id=tbl_ss_generation_a.user_id','left')
					->join('tbl_state_sector','tbl_ss_generation_a.form_id=tbl_state_sector.form_id','left')
					->join('tbl_renew_1','tbl_ss_generation_a.form_id=tbl_renew_1.form_id','left')
					->join('tbl_generation_a','tbl_ss_generation_a.form_id=tbl_generation_a.form_id','left')
					->order_by('tbl_users.id','desc')
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
	
	
	
	
	// function get_user(){
    	
			// $result = $this->db->select('tbl_users.*,tbl_generation_a.app_id as gid,tbl_state_sector.app_id as sid,tbl_renew_1.app_id as rid,tbl_ss_generation_a.app_id as ssgid')
				// ->from('tbl_users')
				// ->join('tbl_generation_a','tbl_users.id=tbl_generation_a.user_id','left')
				// ->join('tbl_state_sector','tbl_users.id=tbl_state_sector.user_id','left')
				// ->join('tbl_renew_1','tbl_users.id=tbl_renew_1.user_id','left')
				// ->join('tbl_ss_generation_a','tbl_users.id=tbl_ss_generation_a.user_id','left')
				// ->order_by('tbl_users.id','desc')
				// ->get()
				// ->result_array();
			// return $result;
	// }
	
	function delete($id){
	   $this->db->where('id',$id);
	   $this->db->delete('tbl_enquiry');
	}
	
	function get_generation_a($id){
		$this->db->select('*');	
		$this->db->where('app_id', $id);
		return $query = $this->db->from('tbl_generation_a')->get()->row_array();
		
	}
	
	function get_ren_1($id){
		$this->db->select('*');	
		$this->db->where('app_id', $id);
		return $query = $this->db->from('tbl_renew_1')->get()->row_array();
		
	}
	
	function get_ren_1a($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_renew_1a')->get()->result_array();
		
	}

	function get_ren_2($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_renew_2')->get()->row_array();
		
	}		
	
	function get_ren_2a($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_renew_2a')->get()->result();
	}
	function get_ren_3($id){
		$this->db->select('*');
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_renew_3')->get()->row_array();
	}
	function get_ren_4($id){
		$this->db->select('*');
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_renew_4')->get()->row_array();
	}	
		
	function get_ren_5($id){
		$this->db->select('*');
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_renew_5')->get()->row_array();
	}	
	// get generation B
	
	function get_generation_b($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_generation_b')->get()->row_array();
		
	}
	
	// get generation B1
	
	function get_generation_b1($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_generation_b1')->get()->result_array();
		
	}


// get generation C
	
	function get_generation_c($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_generation_c')->get()->row_array();
		
	}
	
	
	function get_generation_2($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_generation_2')->get()->row_array();
		
	}
	function get_generation_2a($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_generation_2a')->get()->result_array();
		
	}
	function get_generation_2b($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_generation_2b')->get()->result_array();
		
	}
	
	
	// get generation 2 Sanction
	
	function get_generation_2_sanction($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_generation_2_sanction')->get()->result_array();
		
	}
	
	// get generation 3
	
	function get_generation_3($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_generation_3')->get()->row_array();
		
	}
	
	// get generation 4
	
	function get_generation_4($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_generation_4')->get()->row_array();
		
	}
	
	// GEN2 check if exists check_gn2_exist
	
	function check_gn2_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->from('tbl_generation_2');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}		
	function get_ss_1($id)	{
		$this->db->select('*');		
		$this->db->where('app_id', $id);
		return $query = $this->db->from('tbl_state_sector')->get()->row_array();	
		}		function get_ss_a($id)	{		
		$this->db->select('*');		
		$this->db->where('user_id', $id);	
		return $query = $this->db->from('tbl_state_sector_a')->get()->row_array();
		}	
	function get_ss_b($id)	
		{	
		$this->db->select('*');		
		$this->db->where('user_id', $id);	
		return $query = $this->db->from('tbl_state_sector_b')->get()->row_array();
		}
	function get_ss_c($id)	{	
		$this->db->select('*');	
		$this->db->where('user_id', $id);	
		return $query = $this->db->from('tbl_state_sector_c')->get()->row_array();	
		}
		
	/* function check_borrower_form($app_id){
		
			$this->db->select('id');
			$this->db->where('app_id', $app_id);
			$this->db->from('tbl_ea_section_a');
			$query = $this->db->get()->row_array();
			 
			if($this->db->count_all_results()){return $query;}else{return false;}
		} */
	
	function get_firststep($app_id){
		
		$this->db->select('*');
		$this->db->where('app_id', $app_id);
		$this->db->from('tbl_ea_section_a');
		$query = $this->db->get()->row_array();
		return $query;
	}
	
	function get_secondstep($app_id){
		$this->db->select('*');	
		$this->db->where('app_id', $app_id);
		$this->db->from('tbl_ea_section_b');
		$query = $this->db->get()->row_array();
		return $query;
	}
	
	function get_secondstep_c($app_id){
		$this->db->select('*');
		$this->db->where('app_id', $app_id);
		$this->db->from('tbl_ea_section_b_c');
		$query = $this->db->get()->result();
		return $query;
	}
	
	function get_secondstepmod($app_id){
		$this->db->select('*');	
		$this->db->where('app_id', $app_id);
		$this->db->from('tbl_ea_section_b_b');
		$query = $this->db->get()->result_array();
		return $query;
	}
	
	function get_thirdstep($app_id){
		$this->db->select('*');	
		$this->db->where('app_id', $app_id);
		$this->db->from('tbl_ea_section_c');
		$query = $this->db->get()->row_array();
		return $query;
	}
	//-----------------------------------------------------------//
	
	function fectch_sec_b1($app_id){
		
		$this->db->select('*');	
		$this->db->where('app_id', $app_id);
		 return $query = $this->db->from('tbl_section_b_entity_appraisal_info')->get()->row_array();
		
	}
	function fectch_sec_b2($app_id){
		$this->db->select('*');	
		$this->db->from('tbl_section_b2_entity_appraisal_info ');		
		$this->db->where('app_id', $app_id);
		return $query = $this->db->get()->row_array();
	
	}
	function fectch_sec_b2a($app_id)
	{
		$this->db->select('*');	
		$this->db->from('tbl_section_b2_entity_appraisal_info2 ');		
		$this->db->where('app_id', $app_id);
        return $query2 = $this->db->get()->result();
	}
	function fectch_sec_b3($app_id){
		$this->db->select('*');	
		$this->db->from('tbl_section_b3_entity_appraisal_info ');		
		$this->db->where('app_id', $app_id);
		return $query = $this->db->get()->row_array();
	
	}
	function fectch_sec_b4($app_id){
		$this->db->select('*');	
		$this->db->from('tbl_section_b4_entity_appraisal_info ');		
	$this->db->where('app_id', $app_id);
		return $query = $this->db->get()->row_array();
	
	}
	function fectch_sec_b5($app_id){
		$this->db->select('*');	
		$this->db->from('tbl_section_b5_entity_appraisal_info ');		
		$this->db->where('app_id', $app_id);
		return $query = $this->db->get()->row_array();
	}
	function fectch_sec_b6($app_id){
		$this->db->select('*');	
		$this->db->from('tbl_section_b6_entity_appraisal_info ');		
		$this->db->where('app_id', $app_id);
		return $query = $this->db->get()->row_array();
	}
	function fectch_sec_b7($app_id){
		$this->db->select('*');	
		$this->db->from('tbl_section_b7_entity_appraisal_info ');		
		$this->db->where('app_id', $app_id);
		return $query = $this->db->get()->row_array();
	}
	function fectch_sec_b8($app_id){
		$this->db->select('*');	
		$this->db->from('tbl_section_b8_entity_appraisal_info ');		
		$this->db->where('app_id', $app_id);
		return $query = $this->db->get()->row_array();
	}
	function fectch_sec_b9($app_id){
		$this->db->select('*');	
		$this->db->from('tbl_section_b9_entity_appraisal_info ');		
		$this->db->where('app_id', $app_id);
		return $query = $this->db->get()->row_array();
	}
	function fectch_sec_b10($app_id){
		$this->db->select('*');	
		$this->db->from('tbl_section_b10_entity_appraisal_info ');		
		$this->db->where('app_id', $app_id);
		return $query = $this->db->get()->row_array();
	}
	//--------------------------------------------------------------//
	
	function fectch_sec_c1($app_id){
		$this->db->select('*');	
		$this->db->from('tbl_section_c1_entity_appraisal_info ');	
		$this->db->where('app_id', $app_id);
		return $query = $this->db->get()->row_array();
	}
	function fectch_sec_c2($app_id){
		$this->db->select('*');	
		$this->db->from('tbl_section_c2_entity_appraisal_info ');
		$this->db->where('app_id', $app_id);	
		return $query = $this->db->get()->row_array();
	}
	function fectch_sec_c3($app_id){
		$this->db->select('*');
		$this->db->from('tbl_section_c3_entity_appraisal_info ');
		$this->db->where('app_id', $app_id);
		return $query = $this->db->get()->row_array();
	}
	function fectch_sec_c4($app_id){
		$this->db->select('*');	
		$this->db->from('tbl_section_c4_entity_appraisal_info ');
		$this->db->where('app_id', $app_id);
		return $query = $this->db->get()->row_array();
	}
	
		// get ss_generation a
		
	function get_ss_generation_a($id){
		$this->db->select('*');	
		$this->db->where('app_id', $id);
		return $query = $this->db->from('tbl_ss_generation_a')->get()->row_array();
		
	}
	
	
	// get ss_generation B
	
	function get_ss_generation_b($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_ss_generation_b')->get()->row_array();
		
	}
	
	// get ss_generation B1
	
	function get_ss_generation_b1($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_ss_generation_b1')->get()->result_array();
		
	}


// get ss_generation C
	
	function get_ss_generation_c($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_ss_generation_c')->get()->row_array();
		
	}
	
	
	function get_ss_generation_2($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_ss_generation_2')->get()->row_array();
		
	}
	
	function get_ss_generation_2a($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_ss_generation_2a')->get()->result_array();
		
	}
	
	function get_ss_generation_2b($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_ss_generation_2b')->get()->result_array();
		
	}
	
	
	// get generation 2 Sanction
	
	function get_ss_generation_2_sanction($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_ss_generation_2_sanction')->get()->result_array();
		
	}
	
	// get generation 3
	
	function get_ss_generation_3($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_ss_generation_3')->get()->row_array();
		
	}
	
	// get generation 4
	
	function get_ss_generation_4($id){
		$this->db->select('*');	
		$this->db->where('user_id', $id);
		return $query = $this->db->from('tbl_ss_generation_4')->get()->row_array();
		
	}
	
}

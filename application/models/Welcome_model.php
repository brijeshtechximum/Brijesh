<?php
class Welcome_model extends CI_Model{
    
	function __construct() {
		parent::__construct();
	}
	
	//adding user's into databse
	function adduser($userdata){
		if($this->db->insert('tbl_users', $userdata)){return true;}else{return false;}
	}
	
	//edit user's password
	function edituser_password($userdata){
		 $this->db->where('id', $userdata['id']);
    	 if($this->db->update('tbl_users', array('password'=>$userdata['password']))){
			return $this->getuserbyid($userdata['id']);
		 }else{
    	 	return false;
    	 }
	
	}
	
	//set password reset code to expires
	function set_reset_code_expires($sha1id){
		 $this->db->where('sha1(id)', $sha1id);
    	 if($this->db->update('tbl_pass_reset', array('status'=>'1'))){
			return true;
		 }else{
    	 	return false;
    	 }
	
	}
	
	//get user by id
	function getuserbyid($id){
			
		$this->db->select('id, email, name');
		$this->db->where('id', $id);
		$this->db->from('tbl_users');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	//check user's into databse
	function process_userlogin($userdata){
			
		$this->db->select('id, name, email, url');
		$this->db->where('email', $userdata['email']);
		$this->db->where('password', $userdata['password']);
		$this->db->from('tbl_users');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	//check reset pass link expires
	function check_reset_link_expires($sha1id){
		$this->db->select('id, user_id');
		$this->db->where('sha1(id)', $sha1id);
		$this->db->where('DATE(created) = CURDATE()');
		$this->db->where('status', '0');
		$this->db->from('tbl_pass_reset');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	
	//check user's email into databse
	function process_userforgotpass($userdata){
			
		$this->db->select('id, name, email');
		$this->db->where('email', $userdata['email']);
		$this->db->from('tbl_users');
		$query = $this->db->get()->row_array();
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	//check user's email into databse
	function forgot_pass_dataset($userdata){
			
		$user = $this->getuserbyid($userdata['user_id']);
		
		if($this->db->insert('tbl_pass_reset', $userdata)){
			return array('id'=>sha1($this->db->insert_id()), 'email'=>$user['email'], 'name'=>$user['name']);
		}else{
			return false;
		}
		
	}
	public function check_app_id($user_id)
	{
		$this->db->select("app_id");
		$this->db->from("tbl_generation_a");
		$this->db->where("user_id", $user_id);
		$query = $this->db->get()->row_array();
		return $query;
	}
	//check if user already filled up the form of tbl_state_sector
	function check_state_secotr_form_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_state_sector');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	//adding state sector form values into databse
	function insert_state_form1($state_sector){
		if($this->db->insert('tbl_state_sector', $state_sector)){
			
			$ins_id = $this->db->insert_id();
			$this->db->where('id', $ins_id);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			//if records is inserted then set the app id for the user	
			$this->db->update('tbl_state_sector', array('app_id'=>date('Y')."ST".str_pad($ins_id, 4, "0", STR_PAD_LEFT)));
			$this->session->set_userdata('app_id', date('Y')."ST".str_pad($ins_id, 4, "0", STR_PAD_LEFT));
			return $ins_id;
			
		}else{return false;}
	}
	
	//updating state sector form values into databse
	function update_state_form1($state_sector){
		
		
		$state_sector1 = array(
			'user_id'=>$state_sector['user_id'],
			'borrower_name' => $state_sector['borrower_name'],
		    'sector' => $state_sector['sector'],
		    'state' => $state_sector['state'],
		    'project_name' => $state_sector['project_name'],
		    'category' => $state_sector['category']
		);
	
		$this->db->where('user_id', $state_sector['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_state_sector', $state_sector)){return true;}else{return false;}
	}
	
	
	//check if user already filled up the form of tbl_state_sector_a
	function check_state_secotr_form_a_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_state_sector_a');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	//adding state sector A form values into databse
	function insert_state_form1_a($state_sector_a){
		if($this->db->insert('tbl_state_sector_a', $state_sector_a)){
			return true;
		}else{
			return false;
		}
	}
	
	//updating state sector form A values into databse
	function update_state_form1_a($state_sector_a){
		$this->db->where('user_id', $state_sector_a['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_state_sector_a', $state_sector_a)){return true;}else{return false;}
	}
	
	
	//check if user already filled up the form of tbl_state_sector_b
	function check_state_secotr_form_b_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_state_sector_b');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	//adding state sector B form values into databse
	function insert_state_form1_b($state_sector_b){
		if($this->db->insert('tbl_state_sector_b', $state_sector_b)){
			return true;
		}else{
			return false;
		}
	}
	
	//updating state sector form B values into databse
	function update_state_form1_b($state_sector_b){
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_state_sector_b', $state_sector_b)){return true;}else{return false;}
	}
	
	//updating state sector form B values into databse and deleting files
	function update_state_form1_b_file($state_sector_b, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_state_sector_b');
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/forms/".$v);}
		}
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_state_sector_b', $state_sector_b)){return true;}else{return false;}
	}
	
	
	//check if user already filled up the form of tbl_state_sector_c
	function check_state_secotr_form_c_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_state_sector_c');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	//adding state sector C form values into databse
	function insert_state_form1_c($state_sector_c){
		if($this->db->insert('tbl_state_sector_c', $state_sector_c)){
			return true;
		}else{
			return false;
		}
	}
	
	//updating state sector form C values into databse
	function update_state_form1_c($state_sector_c){
		$this->db->where('user_id', $state_sector_c['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_state_sector_c', $state_sector_c)){return true;}else{return false;}
	}
	
	//updating state sector form C values into databse and deleting files
	function update_state_form1_c_file($state_sector_b, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_state_sector_c');
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/forms/".$v);}
		}
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_state_sector_c', $state_sector_b)){return true;}else{return false;}
	}
	
	
	
	//check if user already filled up the form of tbl_generation_a
	function check_gn_a_exist($user_id){
		$this->db->select("app_id");
		$this->db->where("user_id", $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));	
		$this->db->from('tbl_generation_a');
		$result = $this->db->get()->row_array();
		$this->session->set_userdata("app_id",$result);
			
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_generation_a');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	//adding GN A form values into databse
	function insert_gn_a($gn_a){
		if($this->db->insert('tbl_generation_a', $gn_a)){
			$ins_id = $this->db->insert_id();
			
			//if records is inserted then set the app id for the user	
			$this->db->where('id', $ins_id);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			$this->db->update('tbl_generation_a', array('app_id'=>date('Y')."GN".str_pad($ins_id, 4, "0", STR_PAD_LEFT)));
			return $this->session->set_userdata('app_id', date('Y')."GN".str_pad($ins_id, 4, "0", STR_PAD_LEFT));
		}else{
			return false;
		}
	}
	
	//updating GN A values into databse
	function update_gn_a($gn_a){
		$this->db->where('user_id', $gn_a['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));	
		if($this->db->update('tbl_generation_a', $gn_a)){return true;}else{return false;}
	}
	
	//updating update_gn2_file values into databse and deleting files
	function update_gn2_file($state_sector_b, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_generation_2');
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/forms/".$v);}
		}
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_generation_2', $state_sector_b)){return true;}else{return false;}
	}
	
	
	//check if user already filled up the form of tbl_generation_b
	function check_gn_b_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_generation_b');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	//adding GN B form values into databse
	function insert_gn_b($gn_b){
		if($this->db->insert('tbl_generation_b', $gn_b)){
			return true;
		}else{
			return false;
		}
	}
	
	//updating GN B1 values into databse
	function update_gn_b($gn_b1){
		$this->db->where('user_id', $gn_b1['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_generation_b', $gn_b1)){return true;}else{return false;}
	}
	
	
	
	
	//check if user already filled up the form of tbl_generation_b1
	function check_gn_b1_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_generation_b1');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	//adding GN B1 form values into databse
	function insert_gn_b1($gn_b1){
		
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->delete('tbl_generation_b1');
			
		if($this->db->insert_batch('tbl_generation_b1', $gn_b1)){
			return true;
		}else{
			return false;
		}
	}
	
	
	
	
	//check if user already filled up the form of tbl_generation_c
	function check_gn_c_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_generation_c');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	//adding GN C form values into databse
	function insert_gn_c($gn_b){
		if($this->db->insert('tbl_generation_c', $gn_b)){
			return true;
		}else{
			return false;
		}
	}
	
	//updating GN C values into databse
	function update_gn_c($gn_b1){
		$this->db->where('user_id', $gn_b1['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_generation_c', $gn_b1)){return true;}else{return false;}
	}
	
	
	//updating GEN form C values into databse and deleting files
	function update_gn_c_file($state_sector_b, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_generation_c');
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/forms/".$v);}
		}
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_generation_c', $state_sector_b)){return true;}else{return false;}
	}
	
	// get generation A
	
	function get_generation_a(){
		$this->db->select('*');	
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		return $query = $this->db->from('tbl_generation_a')->get()->row_array();
		
	}
	
	// get generation B
	
	function get_generation_b(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->from('tbl_generation_b')->get()->row_array();
		
	}
	
	// get generation B1
	
	function get_generation_b1(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->from('tbl_generation_b1')->get()->result_array();
		
	}


// get generation B1
	
	function get_generation_c(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->from('tbl_generation_c')->get()->row_array();
		
	}
	
	// get generation 2 Sanction
	
	function get_generation_2_sanction(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->from('tbl_generation_2_sanction')->get()->result_array();
		
	}
	
	// get generation 3
	
	function get_generation_3(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->from('tbl_generation_3')->get()->row_array();
		
	}
	
	// get generation 4
	
	function get_generation_4(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->from('tbl_generation_4')->get()->row_array();
		
	}
	
	// Fetch data user already exist Or Not
	
	function check_ea_section_b($user_id){
			$this->db->select('id');
			$this->db->where('user_id', $this->session->userdata('user')['id']);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			$this->db->where('app_id', $this->session->userdata('app_id'));
			$this->db->from('tbl_ea_section_b');
			$query = $this->db->get()->row_array();
			
			if($this->db->count_all_results()){return $query;}else{return false;}
		}
	
	//Insert First Step
	
	function insert_ea_section_a($ea_section_a){
			if($this->db->insert('tbl_ea_section_a', $ea_section_a)){
				return true;
			}else{
				return false;
			}
		}
		//Insert Second Step
	
	function insert_ea_section_b($ea_sec_b){
			if($this->db->insert('tbl_ea_section_b', $ea_sec_b)){
				return true;
			}else{
				return false;
			}
		}
		
		function insert_ea_form_2($senc_data){
			
			$this->db->where('user_id', $this->session->userdata('user')['id']);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			$this->db->where('app_id', $this->session->userdata('app_id'));
			$this->db->delete('tbl_ea_section_b_b');
			
			if($this->db->insert_batch('tbl_ea_section_b_b', $senc_data)){
				return true;
			}else{
				return false;
			}
		}
	
	function update_ea_section_b($ea_section_b){
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('app_id', $this->session->userdata('app_id'));
		if($this->db->update('tbl_ea_section_b', $ea_section_b)){return true;}else{return false;}
	}
	
	function insert_ea_section_c($ea_section_c){
		
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->delete("tbl_ea_section_b_c");
		if($this->db->insert_batch("tbl_ea_section_b_c", $ea_section_c)){return true;}else{return false;}
	}

	 
	 //updating EA Section a values into databse and deleting files
	function update_ea_section_a_file($state_sector_b, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->from('tbl_ea_section_a');
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/form2/".$v);}
		}
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('app_id', $this->session->userdata('app_id'));
		if($this->db->update('tbl_ea_section_a', $state_sector_b)){return true;}else{return false;}
	}
	
	function update_ea_section_a($ea_section_a){
		
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('app_id', $this->session->userdata('app_id'));
		
		if($this->db->update('tbl_ea_section_a', $ea_section_a)){return true;}else{return false;}
	}
	
	// GEN2 check if exists check_gn2_exist
	
	function check_gn2_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->from('tbl_generation_2');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	//adding GN 2 form values into databse
	function insert_gn_2($gn_b){
		if($this->db->insert('tbl_generation_2', $gn_b)){
			return true;
		}else{
			return false;
		}
	}
	
	// GEN3 check if exists check_gn3_exist
	
	function check_gn3_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where("form_id", $this->session->userdata("form_id"));
		$this->db->from('tbl_generation_3');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	//adding GN 3 form values into databse
	function insert_gn_3($gn_b){
		if($this->db->insert('tbl_generation_3', $gn_b)){
			return true;
		}else{
			return false;
		}
	}
	
	//updating GEN3 values into databse and deleting files
	function update_gn_3_file($state_sector_b, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_generation_3');
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/forms/".$v);}
		}
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_generation_3', $state_sector_b)){return true;}else{return false;}
	}
	
	// insert Phase Second form data
	
	// Fetch data user already exist Or Not
	
	function check_borrower_form($user_id){
		
			$this->db->select('id');
			$this->db->where('user_id', $user_id);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			$this->db->where('app_id', $this->session->userdata('app_id'));
			$this->db->from('tbl_ea_section_a');
			$query = $this->db->get()->row_array();
			 
			if($this->db->count_all_results()){return $query;}else{return false;}
		}
	
	
	//update_gn_3
	
	//updating GN # values into databse
	function update_gn_3($gn_b1){
		$this->db->where('user_id', $gn_b1['user_id']);
		$this->db->where('form_id', $this->session->userdata("form_id"));
		if($this->db->update('tbl_generation_3', $gn_b1)){return true;}else{return false;}
	}
	
	// GEN4 check if exists check_gn4_exist
	
	function check_gn4_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where("form_id", $this->session->userdata('form_id'));
		$this->db->from('tbl_generation_4');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	
	//adding GN 4 form values into databse
	function insert_gn4($gn_b){
		$this->db->where('user_id',$this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->delete('tbl_generation_4');	
		if($this->db->insert('tbl_generation_4', $gn_b)){
			return true;
		}else{
			return false;
		}
	}
	
	function update_gn_4($gn_4){
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata("form_id"));
		if($this->db->update('tbl_generation_4', $gn_4)){return true;}else{return false;}
	}
	
	//updating GEN4 values into databse and deleting files
	
	function update_gn_4_file($update_gn_4_file, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$file =  $this->db->from('tbl_generation_4')->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/forms/".$v);}
		}
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_generation_4', $update_gn_4_file)){return true;}else{return false;}
	}
	
	
	// RN1 check if exists check_rn1_exist
	
	function check_rn1_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_renew_1');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}			
	
	
	
	//adding RN 3 form values into databse
	function insert_rn_1($gn_b){
		if($this->db->insert('tbl_renew_1', $gn_b)){
			$ins_id = $this->db->insert_id();
			$this->db->where('id', $ins_id);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			//if records is inserted then set the app id for the user	
			$this->db->update('tbl_renew_1', array('app_id'=>date('Y')."RN".str_pad($ins_id, 4, "0", STR_PAD_LEFT)));
			
			$this->session->set_userdata('app_id', date('Y')."RN".str_pad($ins_id, 4, "0", STR_PAD_LEFT));
			
			return $ins_id;
		}else{
			return false;
		}
	}
	
	//adding RN 1A form values into databse
	function insert_rn_1a($gn_b1){
		
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->delete('tbl_renew_1a');
			
		if($this->db->insert_batch('tbl_renew_1a', $gn_b1)){
			return true;
		}else{
			return false;
		}
	}
	
	
	//updating RN1 values into databse and deleting files
	function update_rn_1_file($state_sector_b, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->from('tbl_renew_1');
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/forms/".$v);}
		}
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_renew_1', $state_sector_b)){return true;}else{return false;}
	}
	
	
	//updating RN 3 values into databse
	function update_rn_1($gn_b1){
		$this->db->where('user_id', $gn_b1['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_renew_1', $gn_b1)){return true;}else{return false;}
	}
	
	
	//check rn2 data
	
	function check_rn2_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_renew_2');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	
	//insert_rn_form_2
	
	
	function update_rn_2_file($rn, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->from('tbl_renew_2');
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/forms/".$v);}
		}
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_renew_2', $rn)){return true;}else{return false;}
	}
	
	//insert_rn_form_2
	function update_rn_form_2($data){
			$this->db->where("user_id", $this->session->userdata('user')['id']);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			$this->db->delete('tbl_renew_2a');

		if($this->db->insert_batch('tbl_renew_2a', $data)){
			return true;
		}else{
			return false;
		}		
	}
		function update_rn_form_2delete(){
			$this->db->where("user_id", $this->session->userdata('user')['id']);
			$this->db->where('form_id', $this->session->userdata('form_id'));

		if($this->db->delete('tbl_renew_2a')){
			return true;
		}else{
			return false;
		}
			
	}
	
	function insert_rn_form_2($data){
		
		if($this->db->insert_batch('tbl_renew_2a', $data)){
			return true;
		}else{
			return false;
		}
			
	}
	
	//check rn3 data
	
	function check_rn3_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_renew_3');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	


	//adding RN 3 form values into databse
	function insert_rn_3($gn_b){
		if($this->db->insert('tbl_renew_3', $gn_b)){
			$ins_id = $this->db->insert_id();
			
			//if records is inserted then set the app id for the user	
			$this->db->where('id', $ins_id);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			$this->db->update('tbl_renew_3', array('app_id'=>date('Y')."RN".str_pad($ins_id, 4, "0", STR_PAD_LEFT)));
			$this->session->set_userdata('app_id', date('Y')."RN".str_pad($ins_id, 4, "0", STR_PAD_LEFT));
			return $ins_id;
		}else{
			return false;
		}
	}
	
	//updating RN3 values into databse and deleting files
	function update_rn_3_file($state_sector_b, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_renew_3');
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/forms/".$v);}
		}
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_renew_3', $state_sector_b)){return true;}else{return false;}
	}
	
	//updating RN 3 values into databse
	function update_rn_3($gn_b1){
		$this->db->where('user_id', $gn_b1['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_renew_3', $gn_b1)){return true;}else{return false;}
	}

	//check rn3 data
	
	function check_rn4_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_renew_4');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
		
	
	//adding RN 4 form values into databse
	function insert_rn_4($gn_b){
		if($this->db->insert('tbl_renew_4', $gn_b)){
			return true;
		}else{
			return false;
		}
	}
	
	//updating RN 3 values into databse
	function update_rn_4($gn_b1){
		$this->db->where('user_id', $gn_b1['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_renew_4', $gn_b1)){return true;}else{return false;}
	}
	
	
	function update_rn_4_file($wrp, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->where('user_id', $wrp['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_renew_4');
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/forms/".$v);}
		}
		$this->db->where('user_id', $wrp['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_renew_4', $wrp)){return true;}else{return false;}
	}
	
	
	//check rn5 data
	
	function check_rn5_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_renew_5');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	function update_rn_5_file($wrp, $field){
		// unlink user file
		$file = $this->db->select($field);
		$this->db->where('user_id', $wrp['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_renew_5');
		$this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/forms/".$v);}
		}
		$this->db->where('user_id', $wrp['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_renew_5', $wrp)){return true;}else{return false;}
	}
	
	
	function deleteDta($user_id){
	  $this->db->where('user_id', $user_id);
	  $this->db->where('form_id', $this->session->userdata('form_id'));
      $this->db->delete('tbl_generation_2_sanction');
	  return true;
	}
	
	function deleteDta2a($user_id){
	  $this->db->where('user_id', $user_id);
	  $this->db->where('form_id', $this->session->userdata('form_id'));
      $this->db->delete('tbl_generation_2a');
	  return true;
	}
	function deleteDta2b($user_id){
	  $this->db->where('user_id', $user_id);
	  $this->db->where('form_id', $this->session->userdata('form_id'));
      $this->db->delete('tbl_generation_2b');
	  return true;
	}
	
	function deleteSanID($id){
	  $this->db->where('id', $id);
	  $this->db->where('form_id', $this->session->userdata('form_id'));
      $this->db->delete('tbl_generation_2_sanction');
	  return true;
	}
	function getSanImage($id){
		$this->db->select('name_of_bank_status_attach');
		$this->db->where('id', $id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_generation_2_sanction');
		$query = $this->db->get()->row_array();
		return $query;
	}
	//RN1 fetch data		
	
	public function renewal_form_v(){		
		$user_id = $this->session->userdata('user')['id'];
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_renew_1');
		$query = $this->db->get()->row_array();	
		//print_r($query); die;
		return $query;	
	}
	
	//RN2 fetch data
	
	function renewal_form_2(){
		
		$user_id = $this->session->userdata('user')['id'];
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_renew_2');
		$query = $this->db->get()->row_array();
		
		return $query;
	}
	
	
	//get_renewal_1a
	
	function get_renewal_1a(){
			
		$user_id = $this->session->userdata('user')['id'];
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_renew_1a');
		$query = $this->db->get()->result_array();
		
		return $query;
	}

	//renewal_form_2a
	function renewal_form_2a(){
		$user_id = $this->session->userdata('user')['id'];
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_renew_2a');
		$query = $this->db->get()->result_array();
		
		return $query;
	}
	
	//RN3 fetch data
	
	function renewal_form_3(){
		
		$user_id = $this->session->userdata('user')['id'];
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_renew_3');
		$query = $this->db->get()->row_array();
		
		return $query;
		
	}
	
	//RN4 fetch data
	
	function renewal_form_4(){
		
		$user_id = $this->session->userdata('user')['id'];
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_renew_4');
		$query = $this->db->get()->row_array();
		return $query;
		
	}
	
	//RN_5 fetch data
	
	function renewal_form_5(){
		
		$user_id = $this->session->userdata('user')['id'];
		$this->db->select('*');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_renew_5');
		$query = $this->db->get()->row_array();
		return $query;
	}  
	
		
// fetch data for secb step 1
	
	function fectch_sec_b1(){
		
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		 return $query = $this->db->from('tbl_section_b_entity_appraisal_info')->get()->row_array();
		
	}
	function fectch_sec_b2(){
		$this->db->select('*');	
		$this->db->from('tbl_section_b2_entity_appraisal_info ');		
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		
		return $query = $this->db->get()->row_array();
	
	}
	function fectch_sec_b2a()
	{
		$this->db->select('*');	
		$this->db->from('tbl_section_b2_entity_appraisal_info2 ');		
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
        return $query2 = $this->db->get()->result();
	}
	function fectch_sec_b3(){
		
		$this->db->select('*');	
		$this->db->from('tbl_section_b3_entity_appraisal_info ');		
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->get()->row_array();
	
	}
	function fectch_sec_b4(){
		$this->db->select('*');	
		$this->db->from('tbl_section_b4_entity_appraisal_info ');		
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->get()->row_array();
	
	}
	function fectch_sec_b5(){
		$this->db->select('*');	
		$this->db->from('tbl_section_b5_entity_appraisal_info ');		
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->get()->row_array();
	}
	function fectch_sec_b6(){
		$this->db->select('*');	
		$this->db->from('tbl_section_b6_entity_appraisal_info ');		
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->get()->row_array();
	}
	function fectch_sec_b7(){
		$this->db->select('*');	
		$this->db->from('tbl_section_b7_entity_appraisal_info ');		
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->get()->row_array();
	}
	function fectch_sec_b8(){
		$this->db->select('*');	
		$this->db->from('tbl_section_b8_entity_appraisal_info ');		
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->get()->row_array();
	}
	function fectch_sec_b9(){
		$this->db->select('*');	
		$this->db->from('tbl_section_b9_entity_appraisal_info ');		
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->get()->row_array();
	}
	function fectch_sec_b10(){
		$this->db->select('*');	
		$this->db->from('tbl_section_b10_entity_appraisal_info ');		
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->get()->row_array();
	}
	
	function update_section_b2_file($file1, $field)
	{
		$this->db->select($field);
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_section_b2_entity_appraisal_info');
		$file = $this->db->get()->row_array();
		
		if($file){
			foreach($file as $v){ @unlink("./uploads/form2/".$v);}
		}
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_section_b2_entity_appraisal_info', $file1)){return true;}else{return false;}
	}
	
	function update_section_b3_file($file1, $field)
	{
		$this->db->select($field);
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_section_b3_entity_appraisal_info');
		$file = $this->db->get()->row_array();
		
		if($file){
			foreach($file as $v){ @unlink("./uploads/form2/".$v);}
		}
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_section_b3_entity_appraisal_info', $file1)){return true;}else{return false;}
	}
	
	function update_section_b4_file($file1, $field)
	{
		$this->db->select($field);
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_section_b4_entity_appraisal_info');
		$file = $this->db->get()->row_array();
		
		if($file){
			foreach($file as $v){ @unlink("./uploads/form2/".$v);}
		}
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_section_b4_entity_appraisal_info', $file1)){return true;}else{return false;}
	}
	
	function update_section_b5_file($file1, $field)
	{
		$this->db->select($field);
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_section_b5_entity_appraisal_info');
		$file = $this->db->get()->row_array();
		
		if($file){
			foreach($file as $v){ @unlink("./uploads/form2/".$v);}
		}
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_section_b5_entity_appraisal_info', $file1)){return true;}else{return false;}
	}
	
	function update_section_b6_file($file1, $field)
	{
		$this->db->select($field);
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_section_b6_entity_appraisal_info');
		$file = $this->db->get()->row_array();
		
		if($file){
			foreach($file as $v){ @unlink("./uploads/form2/".$v);}
		}
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_section_b6_entity_appraisal_info', $file1)){return true;}else{return false;}
	}
	
	function update_section_b7_file($file1, $field)
	{
		$this->db->select($field);
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_section_b7_entity_appraisal_info');
		$file = $this->db->get()->row_array();
		
		if($file){
			foreach($file as $v){ @unlink("./uploads/form2/".$v);}
		}
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_section_b7_entity_appraisal_info', $file1)){return true;}else{return false;}
	}
	
	function update_section_b8_file($file1, $field)
	{
		$this->db->select($field);
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_section_b8_entity_appraisal_info');
		$file = $this->db->get()->row_array();
		
		if($file){
			foreach($file as $v){ @unlink("./uploads/form2/".$v);}
		}
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_section_b8_entity_appraisal_info', $file1)){return true;}else{return false;}
	}
	
	function update_section_b9_file($file1, $field)
	{
		$this->db->select($field);
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_section_b9_entity_appraisal_info');
		$file = $this->db->get()->row_array();
		
		if($file){
			foreach($file as $v){ @unlink("./uploads/form2/".$v);}
		}
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_section_b9_entity_appraisal_info', $file1)){return true;}else{return false;}
	}
	function update_section_b10_file($file1, $field)
	{
		$this->db->select($field);
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_section_b10_entity_appraisal_info');
		$file = $this->db->get()->row_array();
		
		if($file){
			foreach($file as $v){ @unlink("./uploads/form2/".$v);}
		}
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_section_b10_entity_appraisal_info', $file1)){return true;}else{return false;}
	}
	// Fetch data user already exist Or Not
    
    function check_sec_b_entity_appr_info($user_id){
				
            $this->db->select('id');
            $this->db->where('user_id', $user_id);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			$this->db->where('app_id', $this->session->userdata('app_id'));
			
            $this->db->from('tbl_section_b_entity_appraisal_info');
            $query = $this->db->get()->row_array();
            
            if($this->db->count_all_results()){return $query;}else{return false;}
        }
	
	function fectch_sec_c1(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_section_c1_entity_appraisal_info ');		
		
		return $query = $this->db->get()->row_array();
	}
	function fectch_sec_c2(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_section_c2_entity_appraisal_info ');		
		
		return $query = $this->db->get()->row_array();
	}
	function fectch_sec_c3(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_section_c3_entity_appraisal_info ');		
		
		return $query = $this->db->get()->row_array();
	}
	function fectch_sec_c4(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_section_c4_entity_appraisal_info ');		
		
		return $query = $this->db->get()->row_array();
	}
	
	function update_section_c1_file($file1, $field){
		
		$this->db->select($field);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->from('tbl_section_c1_entity_appraisal_info');
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/form2/".$v);}
		}
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_section_c1_entity_appraisal_info', $file1)){return true;}else{return false;}
	}
	
	function update_section_c2_file($file1, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->from('tbl_section_c2_entity_appraisal_info');
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/form2/".$v);}
		}
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_section_c2_entity_appraisal_info', $file1)){return true;}else{return false;}
	}
	function update_section_c3_file($file1, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->from('tbl_section_c3_entity_appraisal_info');
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/form2/".$v);}
		}
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_section_c3_entity_appraisal_info', $file1)){return true;}else{return false;}
	}
	
	function update_section_c4_file($file1, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->from('tbl_section_c4_entity_appraisal_info');
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/form2/".$v);}
		}
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_section_c4_entity_appraisal_info', $file1)){return true;}else{return false;}
	}
	
	//Fetch First step data
	
	function get_firststep($user_id){
		
		$this->db->select('*'); 
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->from('tbl_ea_section_a');
		$query = $this->db->get()->row_array();
		return $query;
	}
	
	function get_secondstep($user_id){
		$this->db->select('*');
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->from('tbl_ea_section_b');
		$query = $this->db->get()->row_array();
		return $query;
	}
	
	function get_secondstep_b($user_id){
		$this->db->select('*');
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->from('tbl_ea_section_b_c');
		$query = $this->db->get()->result();
		return $query;
	}
	
	function get_secondstepmod($user_id){
		$this->db->select('*');
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->from('tbl_ea_section_b_b');
		$query = $this->db->get()->result_array();
		return $query;
	}
	
	function get_thirdstep($user_id){
		$this->db->select('*');
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('app_id', $this->session->userdata('app_id'));
		$this->db->from('tbl_ea_section_c');
		$query = $this->db->get()->row_array();
		return $query;
	}
	
	// Fetch data user already exist Or Not
	
	function check_ea_section_c($user_id){
			$this->db->select('id');
			$this->db->where('user_id', $this->session->userdata('user')['id']);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			$this->db->where('app_id', $this->session->userdata('app_id'));
			$this->db->from('tbl_ea_section_c');
			$query = $this->db->get()->row_array();
			
			if($this->db->count_all_results()){return $query;}else{return false;}
		}
	
	//updating EA Section a values into databse and deleting files
    function update_ea_section_c_file($state_sector_b, $field){
        // unlink user file
        $this->db->select($field);
        $this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('app_id', $this->session->userdata('app_id'));
        $this->db->from('tbl_ea_section_c');
		$file = $this->db->get()->row_array();
		
        if($file){
			
            foreach($file as $v){ @unlink("./uploads/form2/".$v);}
        }
        $this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('app_id', $this->session->userdata('app_id'));
        if($this->db->update('tbl_ea_section_c', $state_sector_b)){return true;}else{return false;}
    }
	
	//updating EA Section B values into databse and deleting files
    function update_sec_b_entity_app_info_files($state_sector_b, $field){
		
        // unlink user file
		$this->db->select($field);
        $this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('app_id', $this->session->userdata('app_id'));
        
        $file = $this->db->from('tbl_section_b_entity_appraisal_info')->get()->row_array();
        if($file){
            foreach($file as $v){ @unlink("./uploads/form2/".$v);}
        }
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('app_id', $this->session->userdata('app_id'));
		if($this->db->update('tbl_section_b_entity_appraisal_info', $state_sector_b[$field])){return true;}else{return false;}
		
    }
	public function fetch_state_sector()
	{
		$this->db->select("*");
		$this->db->from("tbl_state_sector");
		$this->db->where('user_id', $this->session->userdata("user")['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $this->db->get()->row_array();
	}
	public function fetch_state_sector_a()
	{
		$this->db->select("*");
		$this->db->from("tbl_state_sector_a");
		$this->db->where('user_id', $this->session->userdata("user")['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $this->db->get()->row_array();
	}
	public function fetch_state_sector_b() 
	{
		$this->db->select("*");
		$this->db->from("tbl_state_sector_b");
		$this->db->where('user_id', $this->session->userdata("user")['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $this->db->get()->row_array();
	}
	public function fetch_state_sector_c()
	{
		$this->db->select("*");
		$this->db->from("tbl_state_sector_c");
		$this->db->where('user_id', $this->session->userdata("user")['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $this->db->get()->row_array();
	}
	
	
	
	
	//check if user already filled up the form of tbl_ss_generation_a
	function check_ss_gn_a_exist($user_id){
		
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_ss_generation_a');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	//adding SG A form values into databse 
	function insert_ss_gn_a($ss_gn_a){
		if($this->db->insert('tbl_ss_generation_a', $ss_gn_a)){
			$ins_id = $this->db->insert_id();
			
			//if records is inserted then set the app id for the user	
			$this->db->where('id', $ins_id);
			$this->db->where('form_id', $this->session->userdata('form_id'));
			$this->db->update('tbl_ss_generation_a', array('app_id'=>date('Y')."SG".str_pad($ins_id, 4, "0", STR_PAD_LEFT)));
			return $this->session->set_userdata('app_id', date('Y')."SG".str_pad($ins_id, 4, "0", STR_PAD_LEFT));
		}else{
			return false;
		}
	}
	
	//updating SG A values into databse
	function update_ss_gn_a($ss_gn_a){
		$this->db->where('user_id', $ss_gn_a['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_ss_generation_a', $ss_gn_a)){return true;}else{return false;}
	}
	
	
	//check if user already filled up the form of tbl_ss_generation_b
	function check_ss_gn_b_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_ss_generation_b');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	//adding GN B form values into databse
	function insert_ss_gn_b($ss_gn_b){
		
		if($this->db->insert('tbl_ss_generation_b', $ss_gn_b)){
			return true;
		}else{
			return false;
		}
	}
	function update_ss_gn_b_file($ss_gn_b, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->where('user_id', $ss_gn_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_ss_generation_b');
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/forms/".$v);}
		}
		$this->db->where('user_id', $ss_gn_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_ss_generation_b', $ss_gn_b)){return true;}else{return false;}
	}
	
	//updating GN B1 values into databse
	function update_ss_gn_b($ss_gn_b){
		
		$this->db->where('user_id', $ss_gn_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_ss_generation_b', $ss_gn_b)){return true;}else{return false;}
	}
	
	
	
	
	//check if user already filled up the form of tbl_ss_generation_b1
	function check_ss_gn_b1_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_ss_generation_b1');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	//adding GN B1 form values into databse
	function insert_ss_gn_b1($ss_gn_b1){
				
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->delete('tbl_ss_generation_b1');
			
		if($this->db->insert_batch('tbl_ss_generation_b1', $ss_gn_b1)){
			return true;
		}else{
			return false;
		}
	}
	
	
	
	
	//check if user already filled up the form of tbl_ss_generation_c
	function check_ss_gn_c_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_ss_generation_c');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	//adding GN C form values into databse
	function insert_ss_gn_c($ss_gn_c){
		if($this->db->insert('tbl_ss_generation_c', $ss_gn_c)){
			return true;
		}else{
			return false;
		}
	}
	
	//updating GN C values into databse
	function update_ss_gn_c($ss_gn_c){
		$this->db->where('user_id', $ss_gn_c['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_ss_generation_c', $ss_gn_c)){return true;}else{return false;}
	}
	
	
	//updating GEN form C values into databse and deleting files
	function update_ss_gn_c_file($ss_gen_c, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->where('user_id', $ss_gen_c['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_ss_generation_c');
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/forms/".$v);}
		}
		$this->db->where('user_id', $ss_gen_c['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_ss_generation_c', $ss_gen_c)){return true;}else{return false;}
	}
	
	// get generation A
	
	function get_ss_generation_a(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->from('tbl_ss_generation_a')->get()->row_array();
		
	}
	
	function get_ss_generation_b(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->from('tbl_ss_generation_b')->get()->row_array();
		
	}
	
	// get generation B1
	
	function get_ss_generation_b1(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->from('tbl_ss_generation_b1')->get()->result_array();
		
	}


// get generation B1
	
	function get_ss_generation_c(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->from('tbl_ss_generation_c')->get()->row_array();
		
	}
	function get_ss_generation_2(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->from('tbl_ss_generation_2')->get()->row_array(); 
		
	}
	
	function get_ss_generation_2_sanction(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->from('tbl_ss_generation_2_sanction')->get()->result_array();
		
	}
	function get_ss_generation_2a(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->from('tbl_ss_generation_2a')->get()->result_array();
		
	}
	function get_ss_generation_2b(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->from('tbl_ss_generation_2b')->get()->result_array();
		
	}
	
	// SS_GEN2 check if exists check_ss_gn2_exist
	
	function check_ss_gn2_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_ss_generation_2');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	//adding SS_GN 2 form values into databse
	function insert_ss_gn_2($ss_gn_b){
		if($this->db->insert('tbl_ss_generation_2', $ss_gn_b)){
			return true;
		}else{
			return false;
		}
	}
	//updating update_ss_gn2_file values into databse and deleting files
	
	function update_ss_gn2_file($state_sector_b, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->from('tbl_ss_generation_2');
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/forms/".$v);}
		}
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_ss_generation_2', $state_sector_b)){return true;}else{return false;}
	}
	
	function ss_deleteDta($user_id){
	  $this->db->where('user_id', $user_id);
	  $this->db->where('form_id', $this->session->userdata('form_id'));
      $this->db->delete('tbl_ss_generation_2_sanction');
	  return true;
	}
	function ss_deleteDta2a($user_id){
	  $this->db->where('user_id', $user_id);
	  $this->db->where('form_id', $this->session->userdata('form_id'));
      $this->db->delete('tbl_ss_generation_2a');
	  return true;
	}
	function ss_deleteDta2b($user_id){
	  $this->db->where('user_id', $user_id);
	  $this->db->where('form_id', $this->session->userdata('form_id'));
      $this->db->delete('tbl_ss_generation_2b');
	  return true;
	}
	function ss_deleteSanID($id){
	  $this->db->where('id', $id);
	  $this->db->where('form_id', $this->session->userdata('form_id'));
      $this->db->delete('tbl_ss_generation_2_sanction');
	  return true;
	}
	
	function deleteSanID_gn($id){
	  $this->db->where('id', $id);
	  $this->db->where('form_id', $this->session->userdata('form_id'));
      $this->db->delete('tbl_generation_2a');
	  return true;
	}
	function deleteSanID_gn2($id){
	  $this->db->where('id', $id);
	  $this->db->where('form_id', $this->session->userdata('form_id'));
      $this->db->delete('tbl_generation_2b');
	  return true;
	}
	
	function ss_getSanImage($id){
		$this->db->select('name_of_bank_status_attach');
		$this->db->where('id', $id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_ss_generation_2_sanction');
		$query = $this->db->get()->row_array();
		return $query;
	}
	
	// GEN3 check if exists check_ss_gn3_exist
	
	function check_ss_gn3_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_ss_generation_3');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
		function get_ss_generation_3(){
		$this->db->select('*');	
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		return $query = $this->db->from('tbl_ss_generation_3')->get()->row_array();
		
	}
	
	function insert_ss_gn_3($ss_gn_3){
		if($this->db->insert('tbl_ss_generation_3', $ss_gn_3)){
			return true;
		}else{
			return false;
		}
	}
	//updating GN # values into databse
	function update_ss_gn_3($ss_gn_3){
		$this->db->where('user_id', $ss_gn_3['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_ss_generation_3', $ss_gn_3)){return true;}else{return false;}
	}
	//updating GEN3 values into databse and deleting files
	function update_ss_gn_3_file($state_sector_b, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->from('tbl_ss_generation_3');
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/forms/".$v);}
		}
		$this->db->where('user_id', $state_sector_b['user_id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_ss_generation_3', $state_sector_b)){return true;}else{return false;}
	}
	// get ss_generation 4
	
	function get_ss_generation_4(){
		$this->db->select('*');	
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		return $query = $this->db->from('tbl_ss_generation_4')->get()->row_array();
		
	}
	
	// GEN4 check if exists check_ss_gn4_exist
	
	function check_ss_gn4_exist($user_id){
		$this->db->select('id');
		$this->db->where('user_id', $user_id);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_ss_generation_4');
		$query = $this->db->get()->row_array();
		
		if($this->db->count_all_results()){return $query;}else{return false;}
	}
	
	
	//adding GN 4 form values into databse
	function insert_ss_gn4($ss_gen_4){
		$this->db->where('user_id',$this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->delete('tbl_ss_generation_4');	
		if($this->db->insert('tbl_ss_generation_4', $ss_gen_4)){
			return true;
		}else{
			return false;
		}
	}
	
	function update_ss_gn_4($ss_gen_4){
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_ss_generation_4', $ss_gen_4)){return true;}else{return false;}
	}
	
		//updating GEN4 values into databse and deleting files
	
	function update_ss_gn_4_file($attach, $field){
		// unlink user file
		$this->db->select($field);
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		$this->db->from('tbl_ss_generation_4');
		$file = $this->db->get()->row_array();
		if($file){
			foreach($file as $v){ @unlink("./uploads/forms/".$v);}
		}
		$this->db->where('user_id', $this->session->userdata('user')['id']);
		$this->db->where('form_id', $this->session->userdata('form_id'));
		if($this->db->update('tbl_ss_generation_4', $attach)){return true;}else{return false;}
	}
	
	
	
	
}
<?php
class Form1_model extends CI_Model{
    
	function __construct() {
		parent::__construct();
	}
	
	function get_silder(){
		$this->db->select('*');
		$this->db->from('tbl_slider');
		$result=$this->db->get()->result_array();
		return $result;
	}
	function get_testimonials(){
		$this->db->select('*');
		$this->db->from('tbl_testimonial');
		$this->db->order_by('id', 'desc');
		$result=$this->db->get()->result_array();
		return $result;
	}
	function get_clients(){
		$this->db->select('*');
		$this->db->from('tbl_client');
		$result=$this->db->get()->result_array();
		return $result;
	}
	
	function get_about(){
		$this->db->select('*');
		$this->db->from('tbl_pages');
		$this->db->where('id',1);
		$result=$this->db->get()->row_array();
		return $result;
	}
	
	function get_service(){
		$this->db->select('*');
		$this->db->from('tbl_pages');
		$this->db->where('id',2);
		$result=$this->db->get()->row_array();
		return $result;
	}
	
	function get_crane(){
		$this->db->select('*');
		$this->db->from('tbl_pages');
		$this->db->where('id',3);
		$result=$this->db->get()->row_array();
		return $result;
	}
	
	function get_semi(){
		$this->db->select('*');
		$this->db->from('tbl_pages');
		$this->db->where('id',4);
		$result=$this->db->get()->row_array();
		return $result;
	}
	
	function get_tailgates(){
		$this->db->select('*');
		$this->db->from('tbl_pages');
		$this->db->where('id',5);
		$result=$this->db->get()->row_array();
		return $result;
	}
	
	function get_taxi(){
		$this->db->select('*');
		$this->db->from('tbl_pages');
		$this->db->where('id',6);
		$result=$this->db->get()->row_array();
		return $result;
	}
	
	function get_warehousing(){
		$this->db->select('*');
		$this->db->from('tbl_pages');
		$this->db->where('id',7);
		$result=$this->db->get()->row_array();
		return $result;
	}
	
	function get_career(){
		$this->db->select('*');
		$this->db->from('tbl_pages');
		$this->db->where('id',8);
		$result=$this->db->get()->row_array();
		return $result;
	}
	
	function enquiry_save(){
		$postData = $_POST;
		$enquiry = array(
		                'datetime' 		=> current_date_time(),
		                'ip_address' 		=> $this->input->ip_address(),
		                'name' 		=> $this->input->post('name'),
		                'email' 		=> $this->input->post('email'),
		                'subject' 		=> $this->input->post('subject'),
		                'mobile' 		=> $this->input->post('mobile'),
		                'message' 		=> $this->input->post('message'),
	                );		
       $this->db->insert('tbl_enquiry',$enquiry);						
	}
	
	function get_a_quote_save(){
			$postData = $_POST;
			$enquiry = array(
			                'datetime' 		=> current_date_time(),
			                'ip_address' 		=> $this->input->ip_address(),
			                'name' 		=> $this->input->post('name'),
			                'email' 		=> $this->input->post('email'),
			                'mobile' 		=> $this->input->post('mobile'),
			                'shifting_date' 		=> $this->input->post('shifting_date'),
			                'shifting_type' 		=> $this->input->post('shifting_type'),
			                'item' 		=> $this->input->post('item'),
			                'pick_location' 		=> $this->input->post('pick_location'),
			                'delivery_location' 		=> $this->input->post('delivery_location'),
			                'message' 		=> $this->input->post('message'),
		                );		
	       $this->db->insert('tbl_get_a_quote',$enquiry);						
		}
		
		function contractors_save(){
			$postData = $_POST;
			$enquiry = array(
			                'datetime' 		=> current_date_time(),
			                'ip_address' 		=> $this->input->ip_address(),
			                'fname' 		=> $this->input->post('fname'),
			                'lname' 		=> $this->input->post('lname'),
			                'email' 		=> $this->input->post('email'),
			                'mobile' 		=> $this->input->post('mobile'),
			                'address' 		=> $this->input->post('address'),
			                'state' 		=> $this->input->post('state'),
			                'zipcode' 		=> $this->input->post('zipcode'),
			                'subject' 		=> $this->input->post('subject'),
			                'vdes' 		=> $this->input->post('vdes'),
			                'message' 		=> $this->input->post('message'),
		                );		
	       $this->db->insert('tbl_contractors',$enquiry);						
		}
		
		function application_save(){
			$postData = $_POST;
			$enquiry = array(
			                'datetime' 		=> current_date_time(),
			                'ip_address' 		=> $this->input->ip_address(),
			                'fname' 		=> $this->input->post('fname'),
			                'lname' 		=> $this->input->post('lname'),
			                'email' 		=> $this->input->post('email'),
			                'title' 		=> $this->input->post('title'),
			                'business_name' 		=> $this->input->post('business_name'),
			                'legal_entitiy' 		=> $this->input->post('legal_entitiy'),
			                'abn' 		=> $this->input->post('abn'),
			                'mobile' 		=> $this->input->post('mobile'),
			                'fax' 		=> $this->input->post('fax'),
			                'address' 		=> $this->input->post('address'),
			                'state' 		=> $this->input->post('state'),
			                'postal_code' 		=> $this->input->post('postal_code'),
			                'industry' 		=> $this->input->post('industry'),
			                'trone' 		=> $this->input->post('trone'),
			                'trone_mobile' 		=> $this->input->post('trone_mobile'),
			                'trone_fax' 		=> $this->input->post('trone_fax'),
			                'trone_email' 		=> $this->input->post('trone_email'),
			                'trtwo' 		=> $this->input->post('trtwo'),
			                'trtwomobile' 		=> $this->input->post('trtwomobile'),
			                'trtwo_fax' 		=> $this->input->post('trtwo_fax'),
			                'trtwo_email' 		=> $this->input->post('trtwo_email'),
			                'trthree' 		=> $this->input->post('trthree'),
			                'trthree_mobile' 		=> $this->input->post('trthree_mobile'),
			                'trthree_fax' 		=> $this->input->post('trthree_fax'),
			                'trthree_email' 		=> $this->input->post('trthree_email'),
			                'anticipated' 		=> $this->input->post('anticipated'),
			                'credit' 		=> $this->input->post('credit'),
			                'bank' 		=> $this->input->post('bank'),
			                'verification' 		=> $this->input->post('verification')			              
		                );		
	       $this->db->insert('tbl_application',$enquiry);						
		}
}

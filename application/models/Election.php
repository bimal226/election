<?php
class Election extends CI_Model{

	function __construct(){
		$this->load->database();
	}
	
	public function check_login($username,$password){
		$this->db->select('id,parent_id');
		$this->db->from('admin');
		$this->db->where('username',$username);
		$this->db->where('pwd',md5($password));
		if($data = $this->db->get()){
			return $data->row_array();
		}else{
			return array();
		}
	}
	
	public function insert_candidate($data){
		if($this->db->insert('candidate',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	public function edit_candidate($data,$id){
		$this->db->where('id',$id);
		if($this->db->update('candidate',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	public function get_all_candidate(){
		$this->db->from('candidate');
		if($data = $this->db->get()){
			return $data->result_array();
		}else{
			return array();
		}
	}
	
	public function get_candidate($id){
		$this->db->from('candidate');
		$this->db->where('id',$id);
		if($data = $this->db->get()){
			return $data->row_array();
		}else{
			return array();
		}
	}
	
	public function insert_voter($data){
		if($this->db->insert('voter',$data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
	
	public function select_voter_limit(){
		$this->db->from('max_count');
		if($data = $this->db->get()){
			return $data->row_array();
		}else{
			return array();
		}
	}
	
	public function insert_selected_candidate($data){
		if($this->db->insert('selected_candidated', $data)){
			return true;
		}else{
			return false;
		}
	}
	
	public function get_candidates_voter($id){
		$this->db->select('count(selected_candidated.id) as count ');
		$this->db->from('selected_candidated');
		$this->db->group_by('selected_candidated.candidate_id');
		$this->db->where('selected_candidated.candidate_id',$id);
		if($data = $this->db->get()){
			$array = $data->row_array();
			if(!empty($array)){
				return $array['count'];
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
	
	public function get_total_vote_count(){
		$this->db->select('count(voter.id) as count ');
		$this->db->from('voter');
		$this->db->where('vote_given','1');
		if($data = $this->db->get()){
			$array = $data->row_array();
			if(!empty($array)){
				return $array['count'];
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}
	
	public function get_voter(){
		$this->db->select('vo.*,adm.username as adm_name');
		$this->db->from('voter as vo');
		$this->db->join('admin as adm','adm.id = vo.added_by');
		
		if($data = $this->db->get()){
			return $data->result_array();
		}else{
			return array();
		}
	}
	
	public function get_voter_detail($where){
		$this->db->select('vo.*');
		$this->db->from('voter as vo');
		$this->db->where($where);
		if($data = $this->db->get()){
			return $data->row_array();
		}else{
			return array();
		}
	}
	
	public function update_voter_detail($id,$vote,$set_voting_session){
		$this->db->where('id',$id);
		$this->db->set('vote_given',$vote);
		if(isset($set_voting_session)){
			$this->db->set('voting_session',$set_voting_session);
		}
		if($this->db->update('voter')){
			return true;
		}else{
			return false;
		}
	}
	
	public function get_member($id){
		$this->db->select('adm.*');
		$this->db->from('admin as adm');
		$this->db->where('adm.parent_id',$id);
		if($data = $this->db->get()){
			return $data->result_array();
		}else{
			return array();
		}
	}
	
	public function get_member_detail($id){
		$this->db->select('adm.*');
		$this->db->from('admin as adm');
		$this->db->where('adm.id',$id);
		if($data = $this->db->get()){
			return $data->row_array();
		}else{
			return array();
		}
	}
	
	public function insert_member($data){
		if($this->db->insert('admin',$data)){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}
	
	public function update_member($data,$id){
		$this->db->where('id',$id);
		if($this->db->update('admin',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	public function get_booth(){
		$this->db->select('bo.*,adm.username as adm_name');
		$this->db->from('booth as bo');
		$this->db->join('admin as adm','adm.id = bo.admin_id');
		
		if($data = $this->db->get()){
			return $data->result_array();
		}else{
			return array();
		}
	}
	
	public function insert_booth($data){
		if($data = $this->db->insert('booth',$data)){
			return true;
		}else{
			return false;
		}
	}
	
	public function reset_voter($id){
		$this->db->trans_begin();
		$this->db->set('vote_given','0');
         $this->db->set('voting_session',null);
		$this->db->where('id',$id);
		if($this->db->update('voter')){
			$this->db->where('voter_id',$id);
			if($this->db->delete('selected_candidated')){
				
			}
		}
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	
	public function checker_voter_vote($candidate_id,$voter_id){
		$this->db->select('id');
		$this->db->from('selected_candidated');
		$this->db->where('candidate_id',$candidate_id);
		$this->db->where('voter_id',$voter_id);
		if($data = $this->db->get()){
			return $data->result_array();
		}else{
			return null;
		}
	}

}
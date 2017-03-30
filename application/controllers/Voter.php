<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voter extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('election');
	}

	public function index(){
		$this->load->view('voter/register');
	}
	
	public function add(){
		
		if($this->input->post()){
			$this->form_validation->set_rules('voter_number', 'Voter Number', 'required');
			if ($this->form_validation->run() == FALSE){
				$flash['type'] = "danger";
				$flash['msg'] = validation_errors();
				$this->session->set_flashdata('flash',$flash);
				redirect(base_url()."voter");
			}else{
				$dataField['voter_id'] = $this->input->post('voter_number');
				$voter_detail = $this->election->get_voter_detail($dataField);
				if(!empty($voter_detail)){
					if($voter_detail['vote_given'] == '0' || $voter_detail['vote_given'] == '2'){
						if(isset($voter_detail['voting_session']) && ($voter_detail['voting_session'] != $this->session->voting_session)){
							$flash['type'] = "danger";
							$flash['msg'] ="Unable to give vote, Voter already login.";
							$this->session->set_flashdata('flash',$flash);
							redirect(base_url()."voter");
						}else if(isset($voter_detail['voting_session']) && ($voter_detail['voting_session'] == $this->session->voting_session)){
							$set_voting_session = NULL;
						}else{
							$set_voting_session = strtotime(date("Y-m-d H:i:s"));
						}
							
							if($id = $this->election->update_voter_detail($voter_detail['id'],'2',$set_voting_session)){
								$data['flash']['type'] = "success";
								$data['flash']['msg'] = "Now Start Voting";
								if(isset($set_voting_session)){
									$this->session->voting_session = $set_voting_session;
								}
								$this->voting($voter_detail['id']);
							}else{
								$flash['type'] = "danger";
								$flash['msg'] ="Unable insert data";
								$this->session->set_flashdata('flash',$flash);
								redirect(base_url()."voter");
							}
					}else{
						$flash['type'] = "danger";
						$flash['msg'] ="Already Voted";
						$this->session->set_flashdata('flash',$flash);
						redirect(base_url()."voter");
					}
				}else{
						$flash['type'] = "danger";
						$flash['msg'] ="Voter Does not Exist.";
						$this->session->set_flashdata('flash',$flash);
						redirect(base_url()."voter");
					}
			}
		}else{
			redirect(base_url()."voter");
		}
		
	}
	
	public function voting($id =NULL){
		if(isset($id)){
			$data['voter'] = $id;
			$data['candidate_lists'] = $this->election->get_all_candidate();
			$data['voter_limit'] = $this->election->select_voter_limit();
			
			$data['base_url'] = base_url()."public/";
			$this->load->view('voter/head',$data);
			$this->load->view('voter/header',$data);
			$this->load->view('voter/left',$data);
			$this->load->view('voter/set_candidate_voting',$data);
			$this->load->view('voter/footer',$data);
		}else{
			redirect(base_url()."voter");
		}
	}
	
	public function submit_voting(){
		if($this->input->post()){
			$datas = $this->input->post('candidate');
			
			$this->db->trans_begin();
			foreach($datas as $data){
				if(isset($data['candidate_id'])){
					$checker_voter_vote = $this->election->checker_voter_vote($data['candidate_id'],$data['voter_id']);
					if(isset($checker_voter_vote) && empty($checker_voter_vote)){
						$this->election->insert_selected_candidate($data);
					}
				}
			}
	
			if ($this->db->trans_status() === FALSE){
				$flash['type'] = "danger";
				$flash['msg'] ="Kindly reset voting";
				$this->session->set_flashdata('flash',$flash);
				$this->db->trans_rollback();
				return false;
			}else{
				$flash['type'] = "success";
				$flash['msg'] ="Thank you for voting";
				$this->session->set_flashdata('flash',$flash);
				$this->election->update_voter_detail($datas[1]['voter_id'],'1',NULL);
				$this->db->trans_commit();
				redirect(base_url()."voter");
				return true;
			}
		}else{
			redirect(base_url()."voter");
		}
		
	}
	
}

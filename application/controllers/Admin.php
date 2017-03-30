<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		if((!isset($_SESSION['id']) || empty($_SESSION['id']))){
			if(($this->router->fetch_method() == 'login') || ($this->router->fetch_method() == 'check_login')){
			
			}else{
				redirect('');
			}
				
			
		}else if(($this->router->fetch_method() == 'login') || ($this->router->fetch_method() == 'check_login')){
			redirect(base_url().'candidate');
		}
		
		$this->load->model('election');
	}

	public function login(){
		$this->load->view('admin/login');
	}
	
	public function check_login(){
		if($this->input->post()){
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() == FALSE){
				$flash['type'] = "danger";
				$flash['msg'] = validation_errors();
				$this->session->set_flashdata('flash',$flash);
				redirect(base_url());
			}else{
				$field = $this->input->post();
				$result = $this->election->check_login($field['email'],$field['password']);
				if(!empty($result)){
					$this->session->set_userdata('id',$result['id']);
					$this->session->set_userdata('parent_id',$result['parent_id']);
					if($result['parent_id'] != '0'){
						redirect(base_url().'voter/list');
					}else{
						redirect(base_url().'candidate');
					}
					
				}else{
					$flash['type'] = "danger";
					$flash['msg'] = "In Valid User name and Password";
					$this->session->set_flashdata('flash',$flash);
					redirect(base_url());
				}
			}			
		}else{
			$flash['type'] = "danger";
			$flash['msg'] = "Invalid Method";
			$this->session->set_flashdata('flash',$flash);
			redirect(base_url());
		}
	}
	
	public function create_candidate($id = NULL){
		$data['base_url'] = base_url()."public/";
		$this->load->view('admin/head',$data);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/left',$data);
		if($this->input->post()){
			if(!isset($dataField['is_edit'])){
				$data['id'] = $id;
			}
			$this->form_validation->set_rules('name', 'Candidate Name', 'required');
			if ($this->form_validation->run() == FALSE){
				$data['flash']['type'] = "danger";
				$data['flash']['msg'] = validation_errors();
			}else{
				$dataField = $this->input->post();
				if(!isset($dataField['is_edit'])){
					$dataField['candidate_image'] = base_url()."public/dist/img/avatar.png";
				}
				
				if(isset($_FILES)){
					$config['upload_path']          = FCPATH."/public/img";
					$config['allowed_types']        = 'gif|jpg|png';
					$this->load->library('upload', $config);
					
					if ($this->upload->do_upload('candidate_image')){
						$upload_data = array('upload_data' => $this->upload->data());
						$dataField['candidate_image'] = base_url()."public/img/".$upload_data['upload_data']['file_name'];
					}
				}
				
				if(!isset($dataField['is_edit'])){
					if($this->election->insert_candidate($dataField)){
						$flash['type'] = "success";
						$flash['msg'] = "Data Inserted Successfully";
						$this->session->set_flashdata('flash',$flash);
						redirect(base_url()."candidate");
					}else{
						$data['flash']['type'] = "danger";
						$data['flash']['msg'] = 'Unable to insert data';
					}
				}else{
					unset($dataField['is_edit']);
					if($this->election->edit_candidate($dataField,$id)){
						$flash['type'] = "success";
						$flash['msg'] = "Data Edited Successfully";
						$this->session->set_flashdata('flash',$flash);
						redirect(base_url()."candidate");
					}else{
						$data['flash']['type'] = "danger";
						$data['flash']['msg'] = 'Unable to edit data';
					}
				}
			}			
		}else if(isset($id)){
			$data['candidate_detail'] = $this->election->get_candidate($id);
			$data['id'] = $id;
		}
			$data['candidate_lists']= $this->election->get_all_candidate();
			$this->load->view('admin/create_candidate',$data);
			$this->load->view('admin/footer',$data);
	}
	
	
	
	public function get_result(){
		$data['base_url'] = base_url()."public/";
		$this->load->view('admin/head',$data);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/left',$data);
		$data['candidate_lists']= $this->election->get_all_candidate();
		$data['total_vote_count']= $this->election->get_total_vote_count();
		foreach($data['candidate_lists'] as $key => $value){
			$data['candidate_lists'][$key]['count'] = $this->election->get_candidates_voter($value['id']);
		}
		
		usort($data['candidate_lists'],function($a,$b){
			return $a['count'] - $b['count'];
		});
		$data['candidate_lists'] = array_reverse($data['candidate_lists']);
		$this->load->view('admin/get_result',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function voter_list(){
		$data['base_url'] = base_url()."public/";
		
		if($this->input->post()){
			$this->form_validation->set_rules('voter_id', 'Voter ID', 'required|is_unique[voter.voter_id]');
			if ($this->form_validation->run() == FALSE){
				$data['flash']['type'] = "danger";
				$data['flash']['msg'] = validation_errors();
			}else{
				$dataField = $this->input->post();
				$dataField['added_by'] = $this->session->id;
				$dataField['vote_given'] = '0';
				if($this->election->insert_voter($dataField)){
					$flash['type'] = "success";
					$flash['msg'] = "Voter Added Successfully";
					$this->session->set_flashdata('flash',$flash);
					redirect(base_url()."voter/list");
				}else{
					$data['flash']['type'] = "danger";
					$data['flash']['msg'] = 'Unable to insert data';
				}
			}
		}
		
		$data['voter_lists'] = $this->election->get_voter();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/left',$data);
		$this->load->view('admin/voter_list',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function member_list($id = NULL){
		$data['base_url'] = base_url()."public/";
		
		if($this->input->post()){
			if(isset($dataField['is_edit'])){
				$this->form_validation->set_rules('username', 'User Name', 'required|is_unique[admin.username]');
			}else{
				$this->form_validation->set_rules('username', 'User Name', 'required');
			}
			$this->form_validation->set_rules('pwd', 'Password', 'required');
			if ($this->form_validation->run() == FALSE){
				$data['flash']['type'] = "danger";
				$data['flash']['msg'] = validation_errors();
			}else{
				$dataField = $this->input->post();
				$dataField['parent_id'] = $this->session->id;
				$dataField['pwd'] =md5($dataField['pwd']);
				if(!isset($dataField['is_edit'])){
					if($this->election->insert_member($dataField)){
						$flash['type'] = "success";
						$flash['msg'] = "Member Added Successfully";
						$this->session->set_flashdata('flash',$flash);
						redirect(base_url()."member/list");
					}else{
						$data['flash']['type'] = "danger";
						$data['flash']['msg'] = 'Unable to insert data';
					}
				}else{
					unset($dataField['is_edit']);
					if($this->election->update_member($dataField,$id)){
						$flash['type'] = "success";
						$flash['msg'] = "Member Edited Successfully";
						$this->session->set_flashdata('flash',$flash);
						redirect(base_url()."member/list");
					}else{
						$data['flash']['type'] = "danger";
						$data['flash']['msg'] = 'Unable to edit data';
					}
				}
				
			}
		}else if(isset($id)){
			$data['id'] = $id;
			$data['member_detail'] =  $this->election->get_member_detail($id);
		}
		
		$data['member_lists'] = $this->election->get_member($this->session->id);
		$this->load->view('admin/head',$data);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/left',$data);
		$this->load->view('admin/member_list',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function booth_list(){
		$data['base_url'] = base_url()."public/";
		
		if($this->input->post()){
			$this->form_validation->set_rules('booth_number', 'Booth Number', 'required|is_unique[booth.booth_number]');
			if ($this->form_validation->run() == FALSE){
				$data['flash']['type'] = "danger";
				$data['flash']['msg'] = validation_errors();
			}else{
				$dataField = $this->input->post();
				if($this->election->insert_booth($dataField)){
					$flash['type'] = "success";
					$flash['msg'] = "Booth Added Successfully";
					$this->session->set_flashdata('flash',$flash);
					redirect(base_url()."booth/list");
				}else{
					$data['flash']['type'] = "danger";
					$data['flash']['msg'] = 'Unable to insert data';
				}
			}
		}
		
		$data['member_lists'] = $this->election->get_member($this->session->id);
		$data['booth_lists'] = $this->election->get_booth();
		$this->load->view('admin/head',$data);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/left',$data);
		$this->load->view('admin/booth_list',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function logout(){
		unset($_SESSION['id']);
		redirect('');
	}
	
	public function reset_voting($id = NULL){
		if($this->election->reset_voter($id)){
			$flash['type'] = "success";
			$flash['msg'] = "Voter Reset Successfully";
			$this->session->set_flashdata('flash',$flash);
			redirect(base_url()."voter/list");
		}else{
			$flash['type'] = "danger";
			$flash['msg'] = "Voter Not Reset Successfully";
			$this->session->set_flashdata('flash',$flash);
			redirect(base_url()."voter/list");
		}
	}
	
}

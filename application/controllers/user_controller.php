<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('user/index');
	}

	public function login(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$check_user = $this->user_model->check_user($username);
		if ($this->form_validation->run() == FALSE){
	    	$this->load->view('user/index');
	    }
	    else{
			if($check_user->num_rows() == 1){
				foreach($check_user->result() as $sess){
					$sess_data['logged_in'] = 'Log in Success';
					$sess_data['id'] = $sess->id;
					$sess_data['username'] = $sess->username;
					$sess_data['level'] = $sess->level;
					$this->session->set_userdata($sess_data);
				}
				if($this->session->userdata('level') == 'Seller'){
					redirect('seller/seller_controller');
				}
				elseif ($this->session->userdata('level') == 'Buyer') {
					redirect('buyer/buyer_controller');
				}
			}	
			else {
				echo"<script>alert('Failed Login: Invalid Username or Password ! ');history.go(-1);</script>";
			}
	     }
	}

	public function register(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$level = $this->input->post('level');

		$data = array(
			'username' => $username,
			'password' => $password,
			'level' => $level
			);

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE){
	    	$this->load->view('user/index');
	    }
	    else{
	    	$this->user_model->register('user',$data);
	    	echo "<script>window.alert('Register Success');window.location = 'index'</script>";
	     }
	}

} ?>
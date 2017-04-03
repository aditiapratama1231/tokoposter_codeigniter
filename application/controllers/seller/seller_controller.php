<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_controller extends CI_Controller {
	function __construct(){
		parent::__construct();

		if($this->session->userdata('level') != "Seller"){
			redirect("user_controller");
		}
	}

	public function index(){
		$this->load->view('seller/login');
	}

	public function new_poster(){
		$data['id_user'] = $this->session->userdata('id');
		$data['category'] = $this->seller_model->category()->result();

		$this->load->view('seller/insert', $data);
	}

	public function create_poster(){
		$poster_name = $this->input->post('poster_name');
		$price = $this->input->post('price');
		$description = $this->input->post('description');
		$date_in = $this->input->post('date_in');
		$id_user = $this->input->post('id_user');
		$id_category = $this->input->post('id_category');

		$config['upload_path'] = './poster/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size'] = 1000;

		$this->load->library('upload', $config);

		if($_FILES['picture']){
			if($this->upload->do_upload('picture')){
				$pict = $this->upload->data();
				$data = array(
					'id_user' => $id_user,
					'id_category' => $id_category,
					'poster_name' => $poster_name,
					'price' => $price,
					'description' => $description,
					'date_in' => $date_in,
					'picture' => $pict['file_name'] 
				);

				$this->seller_model->create_poster('poster',$data);
			}
			else{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('seller/insert', $error);
			}
		}
	}

} ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyer_controller extends CI_Controller {
	function __construct(){
		parent::__construct();

		if($this->session->userdata('level') != "Seller"){
		redirect("user_controller");
		}
	}

	public function index(){
		$this->load->view('seller/insert');
	}

} ?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage_controller extends CI_Controller {
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('landing_page/index');
	}
}

?>
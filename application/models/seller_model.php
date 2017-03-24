<?php 
class Seller_model extends CI_Model{
	function create_poster($table,$data){
		$this->db->insert($table,$data);
	}

	function category(){
		return $this->db->get('category');
	}
}

?>
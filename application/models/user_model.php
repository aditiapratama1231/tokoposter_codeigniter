<?php 
class User_model extends CI_Model{
	function check_user($username){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username',$username);
		return $this->db->get();
	}

	function register($table,$data){
		$this->db->insert($table,$data);
	}
}

?>
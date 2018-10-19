<?php
class Model_index extends CI_Model {
	 
	  public function get_user_admin($name,$password){
	  	$this->db->select('tu.*');
		$this->db->where('tu.name',$name);
		$this->db->where('tu.password',$password);
		return $this->db->get('tb_admin tu');
	  }

}

?>
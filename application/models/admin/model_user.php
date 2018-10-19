<?php
class Model_user extends CI_Model {
	 
	public function get_all_user(){
		return $this->db->get('tb_user');
	}


}

?>
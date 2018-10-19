<?php
class Model_biodata extends CI_Model {
	 
	public function get_all_biodata(){
		return $this->db->get('tb_biodata');
	}

}

?>
<?php
class Model_sekolah extends CI_Model {
	 
	  public function get_kecamatan(){
		return $this->db->get('tb_kecamatan');
	  }

	  public function get_status_sekolah(){
		return $this->db->get('tb_status_sekolah');
	  }

}

?>
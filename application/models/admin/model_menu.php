<?php
class Model_menu extends CI_Model {
	 
	public function get_all_menu(){
		return $this->db->get('tb_materi');
	}

	public function get_sub_menu($id){
		return $this->db->where('materi_id',$id)->get('tb_sub_materi');
	}

	public function get_sub_sub_menu($id){
		return $this->db->where('materi_id',$id)->get('tb_sub_sub_materi');
	}

	public function get_sub_sub_sub_menu($id){
		return $this->db->where('materi_id',$id)->get('tb_sub_sub_sub_materi');
	}

	public function get_sub_sub_sub_sub_menu($id){
		return $this->db->where('materi_id',$id)->get('tb_sub_sub_sub_sub_materi');
	}

}

?>
<?php
class Model_news extends CI_Model {
	 
	public function get_all_news($flag){
		return $this->db->where('flag_news',$flag)->get('tb_news');
	}

	public function get_gantangan(){
		return $this->db->get('tb_gantangan');
	}

	public function get_sub_news($id){
		return $this->db->where('materi_id',$id)->get('tb_sub_materi');
	}

	public function get_sub_sub_news($id){
		return $this->db->where('materi_id',$id)->get('tb_sub_sub_materi');
	}

	public function get_sub_sub_sub_news($id){
		return $this->db->where('materi_id',$id)->get('tb_sub_sub_sub_materi');
	}

	public function get_sub_sub_sub_sub_news($id){
		return $this->db->where('materi_id',$id)->get('tb_sub_sub_sub_sub_materi');
	}

}

?>
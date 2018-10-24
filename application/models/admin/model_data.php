<?php
// Model Data All Function Created By Devanda Andrevianto //


class Model_data extends CI_Model {
	 
	  public function get_user_admin($name,$password){
	  	$this->db->select('tu.*');
		$this->db->where('tu.name',$name);
		$this->db->where('tu.password',$password);
		return $this->db->get('tb_user tu');
	  }

	  public function get_data_pelaporan(){
	  	return $this->db->get('tb_data_pelaporan');
	  }

	  public function get_data_pelaporans(){
	  	$this->db->select('tdp.*, tu.name as nama_user, tuu.name as nama_user_to');
	  	$this->db->join('tb_user tu','tdp.from = tu.id');
	  	$this->db->join('tb_user tuu','tdp.to = tuu.id');
	  	return $this->db->get('tb_data_pelaporan tdp');
	  }

	  public function get_data_pelaporans_from(){
	  	$this->db->select('tdp.*, tu.name as nama_user, tuu.name as nama_user_to');
	  	$this->db->join('tb_user tu','tdp.from = tu.id');
	  	$this->db->join('tb_user tuu','tdp.to = tuu.id');
	  	return $this->db->where('from',$_SESSION['data']['id'])
	  					->get('tb_data_pelaporan tdp');
	  }



}

?>
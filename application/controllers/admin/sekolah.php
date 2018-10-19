<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
/*
* CONTROLLER INDEX WEBSITE
* This controler for screen index
*
* Log Activity : ~ Create your log if you change this controller ~
* 1. Create 10 November 2017, Devanda Andrevianto Create controller
*/

class Sekolah extends CI_Controller {
	    var $data = array('scjav'=>'assets/jController/admin/CtrlSekolah.js');
      var $limit = 10;
      var $offset = 0;

	function __construct(){
        parent::__construct();
       
        if(empty($_SESSION['bird'])){
            redirect('admin/index/signin');
            return;          
        }
      $this->lang->load('admin', '');
      $this->load->model("admin/model_index");
      $this->load->model("admin/model_menu");
      $this->load->model("admin/model_sekolah");
 
    }

  public function index(){
    $this->data['Kecamatan'] = $this->model_sekolah->get_kecamatan();
    $this->template->dinas_pendidikan('sekolah/bg_sekolah',$this->data);
  }

  public function add_sekolah(){
    
    $this->data['Status_Sekolah'] = $this->model_sekolah->get_status_sekolah();
    $this->template->dinas_pendidikan('sekolah/bg_add_sekolah',$this->data);
  }

  public function save_sekolah(){
    $id_kecamatan = $this->input->post('id_kecamatan');
    $nama_sekolah = $this->input->post('nama_sekolah');
    $status = $this->input->post('status');   

    $insert = $this->db->set('name',$nama_sekolah)
                       ->set('status_sekolah_id',$status)
                       ->set('kecamatan_id',$id_kecamatan)
                       ->insert('tb_sekolah');
    if($insert){
      echo "1";
    }
  }  

}

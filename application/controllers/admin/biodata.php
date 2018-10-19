<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
/*
* CONTROLLER INDEX WEBSITE
* This controler for screen index
*
* Log Activity : ~ Create your log if you change this controller ~
* 1. Create 12 November 2017, Devanda Andrevianto Create controller
*/

class Biodata extends CI_Controller {
	    var $data = array('scjav'=>'assets/jController/admin/CtrlBiodata.js');
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
      $this->load->model("admin/model_biodata");
 
    }

  public function index(){
    unset($_SESSION['search']);
    $page=$this->uri->segment(4);
    $uri=4;
    $limit=$this->limit;
    if(!$page):
    $offset = $this->offset;
        else:
        $offset = $page;
    endif;
    $pg=$this->model_menu->get_all_menu();
    $url='admin/biodata/index';
    $this->data['biodata'] = $this->model_biodata->get_all_biodata($limit,$offset);
    $this->data['pagination'] = $this->template->paging2($pg,$uri,$url,$limit);
    if ($this->input->post('ajax')) {
      $this->load->view('admin/biodata/bg_menu_ajax', $this->data);
    }else{
    $this->template->dinas_pendidikan('biodata/bg_biodata',$this->data);
  }
   
  }

  function imageCreateFromAny( $filepath ) {
     
    $size=getimagesize($filepath);
      switch($size["mime"]){
          case "image/gif":
          $im = imageCreateFromGif($filepath); 
          break; 
          case "image/jpeg":
              $im = imageCreateFromJpeg($filepath); 
          break; 
          case "image/png":
              $im = imageCreateFromPng($filepath); 
          break; 
          case "image/bmp":
              $im = imageCreateFromBmp($filepath); 
          break; 
      }    
      return $im;  
  }

  public function add(){

    $this->template->dinas_pendidikan('biodata/bg_add',$this->data);

  }


  public function edit(){
    
    $this->template->dinas_pendidikan('biodata/bg_menu_edit',$this->data);

  }


  public function save_biodata(){
    $path             = 'assets/pic/biodata/';
    $nama             = $this->input->post('nama');
    $nip              = $this->input->post('nip');
    $golongan         = $this->input->post('golongan');
    $jabatan          = $this->input->post('jabatan');
    $alamat           = $this->input->post('alamat');
    $phone            = $this->input->post('phone');
    $tempat_lahir     = $this->input->post('tempat_lahir');
    $tanggal_lahir    = $this->input->post('tanggal_lahir');
    $tanggal_lahirr   = date('Y-m-d', strtotime('-0 days', strtotime($tanggal_lahir)));
    $gambar_default_1 = $this->input->post('gambar_default_1');
    $bagian           = $this->input->post('bagian');

    if($gambar_default_1 == 0){

    $picture = $this->template->upload_picture_not_resize($path,$_POST['image_high_1'],$_POST['image_tumb_1']);


    $data = array(
                    'fullname'              => $nama,
                    'nip'                   => $nip,
                    'golongan'              => $golongan,
                    'jabatan'               => $jabatan,
                    'alamat'                => $alamat,
                    'phone'                 => $phone,
                    'picture'               => $picture,
                    'tempat_lahir'          => $tempat_lahir,
                    'tanggal_lahir'         => $tanggal_lahirr,
                    'bagian'                => $bagian,
                    'create_date'           => date("Y-m-d H:i:s"),
                    'create_user'           => $_SESSION['bird']['username'],
                );
    $insert = $this->db->insert('tb_biodata',$data);
    $UploadPath1    = 'assets/pic/biodata/'.$picture;
    $UploadPath2    = 'assets/pic/biodata/resize/'.$picture;

    $source1 = $this->imageCreateFromAny($UploadPath1);
    $source2 = $this->imageCreateFromAny($UploadPath2);

    imagedestroy($source1);
    imagedestroy($source2);

    }else{
          $data = array(
                    'fullname'              => $nama,
                    'nip'                   => $nip,
                    'golongan'              => $golongan,
                    'jabatan'               => $jabatan,
                    'alamat'                => $alamat,
                    'phone'                 => $phone,
                    'tempat_lahir'          => $tempat_lahir,
                    'tanggal_lahir'         => $tanggal_lahirr,
                    'bagian'                => $bagian,
                    'create_date'           => date("Y-m-d H:i:s"),
                    'create_user'           => $_SESSION['bird']['username'],
                );
    $insert = $this->db->insert('tb_biodata',$data);
    }
    
    if($insert){
        echo "1";
    }

  }

  public function delete(){
    if($_POST != null){
      $delete = $this->input->post('delete');
      $delete = explode(",",$delete);
      $del  = array('');
      
      for($i=0;$i<count($delete);$i++) {
        $del[] = $delete[$i];
            }
            
      $this->db->where_in('id',$delete)->delete('tb_biodata');
      }
    } 


}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
/*
* CONTROLLER INDEX WEBSITE
* This controler for screen index
*
* Log Activity : ~ Create your log if you change this controller ~
* 1. Create 10 November 2017, Devanda Andrevianto Create controller
*/

class News extends CI_Controller {
	    var $data = array('scjav'=>'assets/jController/admin/CtrlNews.js');
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
      $this->load->model("admin/model_news");
 
    }

  public function index(){
    unset($_SESSION['search']);
    $flag = $this->uri->segment(4);
    $page=$this->uri->segment(4);
    $uri=4;
    $limit=$this->limit;
    if(!$page):
    $offset = $this->offset;
        else:
        $offset = $page;
    endif;
    $pg=$this->model_news->get_all_news($flag );
    $url='admin/news/index';
    $this->data['news'] = $this->model_news->get_all_news($flag,$limit,$offset);
    $this->data['pagination'] = $this->template->paging2($pg,$uri,$url,$limit);
    if ($this->input->post('ajax')) {
      $this->load->view('admin/m_news/bg_news_ajax', $this->data);
    }else{
    $this->template->dinas_pendidikan('m_news/bg_news',$this->data);
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

    $this->template->dinas_pendidikan('m_news/bg_news_add',$this->data);

  }


  public function edit(){
    $id = base64_decode($this->uri->segment(4));
    $this->data['data'] = $this->db->query("select * from tb_news where id = ".$id."")->row();
    $this->template->dinas_pendidikan('m_news/bg_news_edit',$this->data);

  }


  public function save_news(){
    $path           = 'assets/pic/news/';
    $nama_news      = $this->input->post('nama_news');
    $soal           = $this->input->post('soal');
    $status         = $this->input->post('status');
    $gambar_default_1 = $this->input->post('gambar_default_1');
    $flag           = $this->input->post('flag');

    if($gambar_default_1 == 0){

    $picture = $this->template->upload_picture_not_resize($path,$_POST['image_high_1'],$_POST['image_tumb_1']);


    $data = array(
                    'title'             => $nama_news,
                    'description'       => $soal,
                    'active'            => $status,
                    'flag_news'         => $flag,
                    'picture'           => $picture,
                    'create_date'       => date("Y-m-d H:i:s"),
                    'create_user'       => $_SESSION['bird']['username'],
                );
    $insert = $this->db->insert('tb_news',$data);
    $id_news = $this->db->insert_id();
    $UploadPath1    = 'assets/pic/news/'.$picture;
    $UploadPath2    = 'assets/pic/news/resize/'.$picture;

    $source1 = $this->imageCreateFromAny($UploadPath1);
    $source2 = $this->imageCreateFromAny($UploadPath2);

    imagedestroy($source1);
    imagedestroy($source2);

    }else{
          $data = array(
                    'title'             => $nama_news,
                    'description'       => $soal,
                    'active'            => $status,
                    'flag_news'         => $flag,
                    'create_date'       => date("Y-m-d H:i:s"),
                    'create_user'       => $_SESSION['bird']['username'],
                );
    $insert = $this->db->insert('tb_news',$data);
    $id_news = $this->db->insert_id();
    }
    
    if($insert){
      $get_data = $this->db->query("select * from tb_news where id = ".$id_news."")->row();
      if($flag == 0){
        $insert_data = $this->db->set('title',$get_data->title)->set('news_id',$id_news)->set('description',$get_data->description)->set('active',$get_data->active)->set('create_date',$get_data->create_date)->set('create_user',$get_data->create_user)->insert('tb_berita_lomba');
      }elseif($flag == 1){
        $insert_data = $this->db->set('title',$get_data->title)->set('news_id',$id_news)->set('description',$get_data->description)->set('active',$get_data->active)->set('create_date',$get_data->create_date)->set('create_user',$get_data->create_user)->insert('tb_data_juara');
      }else{
        $insert_data = $this->db->set('title',$get_data->title)->set('news_id',$id_news)->set('description',$get_data->description)->set('active',$get_data->active)->set('create_date',$get_data->create_date)->set('create_user',$get_data->create_user)->insert('tb_data_brosur');
      }

      if($insert_data){
        echo "1";
      }
    }

  }

  public function edit_news(){
    $path           = 'assets/pic/news/';
    $id             = $this->input->post('id');
    $nama_news      = $this->input->post('nama_news');
    $soal           = $this->input->post('soal');
    $status         = $this->input->post('status');
    $gambar_default_1 = $this->input->post('gambar_default_1');
    $flag           = $this->input->post('flag');

    if($gambar_default_1 == 0){

    $picture = $this->template->upload_picture_not_resize($path,$_POST['image_high_1'],$_POST['image_tumb_1']);


    $data = array(
                    'title'             => $nama_news,
                    'description'       => $soal,
                    'active'            => $status,
                    'flag_news'         => $flag,
                    'picture'           => $picture,
                );
    $insert = $this->db->where('id',$id)->update('tb_news',$data);
    $UploadPath1    = 'assets/pic/news/'.$picture;
    $UploadPath2    = 'assets/pic/news/resize/'.$picture;

    $source1 = $this->imageCreateFromAny($UploadPath1);
    $source2 = $this->imageCreateFromAny($UploadPath2);

    imagedestroy($source1);
    imagedestroy($source2);

    }else{
          $data = array(
                    'title'             => $nama_news,
                    'description'       => $soal,
                    'active'            => $status,
                    'flag_news'         => $flag,
                );
    $insert = $this->db->where('id',$id)->update('tb_news',$data);
    }
    
    if($insert){
      $get_data = $this->db->query("select * from tb_news where id = ".$id."")->row();
      if($flag == 0){
        $insert_data = $this->db->set('title',$get_data->title)->set('description',$get_data->description)->set('active',$get_data->active)->set('picture',$get_data->picture)->where('news_id',$id)->update('tb_berita_lomba');
      }elseif($flag == 1){
        $insert_data = $this->db->set('title',$get_data->title)->set('description',$get_data->description)->set('active',$get_data->active)->set('picture',$get_data->picture)->where('news_id',$id)->update('tb_data_juara');
      }else{
        $insert_data = $this->db->set('title',$get_data->title)->set('description',$get_data->description)->set('active',$get_data->active)->set('picture',$get_data->picture)->where('news_id',$id)->update('tb_data_brosur');
      }

      if($insert_data){
        echo "1";
      }
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
            
      $this->db->where_in('id',$delete)->delete('tb_news');
      }
    }

  public function delete_gantangan(){
    if($_POST != null){
      $delete = $this->input->post('delete');
      $delete = explode(",",$delete);
      $del  = array('');
      
      for($i=0;$i<count($delete);$i++) {
        $del[] = $delete[$i];
            }
            
      $this->db->where_in('id',$delete)->delete('tb_gantangan');
      }
    }

    public function gantangan(){
      $this->data['news'] = $this->model_news->get_gantangan();
      $this->template->dinas_pendidikan('gantangan/bg_gantangan',$this->data);
    } 

    public function add_gantangan(){
      $this->template->dinas_pendidikan('gantangan/bg_gantangan_add',$this->data);
    } 

    public function save_gantangan(){
      //date("Y-01-01 H:i:s",strtotime($date));
      $tanggal = $this->input->post('tanggal');
      $jam = $this->input->post('jam');
      $j_waktu = $this->input->post('j_waktu');
      $tempat = $this->input->post('tempat');

      $insert = $this->db->set('date',date("Y-m-d",strtotime($tanggal)))->set('jam',$jam)->set('am_pm',$j_waktu)->set('tempat',$tempat)->insert('tb_gantangan');

      if($insert){
        echo "1";
      }
    }

}

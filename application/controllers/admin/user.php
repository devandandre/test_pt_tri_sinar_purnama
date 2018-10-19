<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
/*
* CONTROLLER INDEX WEBSITE
* This controler for screen index
*
* Log Activity : ~ Create your log if you change this controller ~
* 1. Create 10 November 2017, Devanda Andrevianto Create controller
*/

class User extends CI_Controller {
	    var $data = array('scjav'=>'assets/jController/admin/Ctrluser.js');
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
      $this->load->model("admin/model_user");
 
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
    $pg=$this->model_user->get_all_user();
    $url='admin/user/index';
    $this->data['user'] = $this->model_user->get_all_user($limit,$offset);
    $this->data['pagination'] = $this->template->paging2($pg,$uri,$url,$limit);
    if ($this->input->post('ajax')) {
      $this->load->view('admin/m_user/bg_user_ajax', $this->data);
    }else{
    $this->template->dinas_pendidikan('m_user/bg_user',$this->data);
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

    $this->template->dinas_pendidikan('m_user/bg_user_add',$this->data);

  }


  public function edit(){
    
    $this->template->dinas_pendidikan('m_menu/bg_menu_edit',$this->data);

  }


  public function save_user(){
    $username       = $this->input->post('username');
    $password       = md5($this->input->post('password'));
    $level          = $this->input->post('level');

          $data = array(
                    'username'          => $username,
                    'password'          => $password,
                    'level'             => $level,
                    'create_date'       => date("Y-m-d H:i:s"),
                    'create_user'       => $_SESSION['bird']['username'],
                );

    $insert = $this->db->insert('tb_user',$data);
    
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
            
      $this->db->where_in('id',$delete)->delete('tb_user');
      }
    } 


}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
/*
* CONTROLLER INDEX WEBSITE
* This controler for screen index
*
* Log Activity : ~ Create your log if you change this controller ~
* 1. Create 10 November 2017, Devanda Andrevianto Create controller
*/

class So extends CI_Controller {
	    var $data = array('scjav'=>'assets/jController/admin/CtrlSo.js');
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
 
    }

  public function index(){
    $this->template->dinas_pendidikan('so/bg_so',$this->data);
  }
   
  }
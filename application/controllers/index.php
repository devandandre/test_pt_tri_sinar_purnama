<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
/*
* CONTROLLER INDEX WEBSITE
* This controler for screen index
*
* Log Activity : ~ Create your log if you change this controller ~
* 1. Create 24 November 2016 by Devanda Andrevianto, Create All Function, Create controller
*/
class Index extends CI_Controller {
	var $data = array('scjav'=>'');
    function __construct(){
        parent::__construct();
    }
	
	// fungsi untuk mengecek apakah user sudah login
	 public function index(){
      	$this->template->bird_index('index');
	 	//$this->load->view('enduser/index');
    }

    public function read_more(){
    	$this->template->bird('baca');
    }

    public function brosur(){
    	$this->template->bird('brosur');
    }

	 public function data_juara(){
      	$this->template->bird('data_juara');
	 	//$this->load->view('enduser/index');
    }

   public function gantangan(){
        $this->template->bird('gantangan');
    //$this->load->view('enduser/index');
    }

   	public function contact(){
      	$this->template->bird_index('contact');
	 	//$this->load->view('enduser/index');
    }

    public function send_comment(){
      $news_id = $this->input->post('news_id');
      $username = $this->input->post('username');
      $email = $this->input->post('email');
      $isi = $this->input->post('isi');

      $insert = $this->db->set('news_id',$news_id)->set('name',$username)->set('email',$email)->set('comment',$isi)->insert('tb_comment_news');

      if($insert){
        echo "1";
      }
    }



}

?>
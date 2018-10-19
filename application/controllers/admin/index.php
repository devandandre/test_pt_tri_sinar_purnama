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
        $this->lang->load('admin', '');
       	$this->load->model("admin/model_index");
        // $this->load->model("model_jookir");
    }
	
	// fungsi untuk mengecek apakah user sudah login
	 public function index(){
        if(empty($_SESSION['bird'])){
            redirect('admin/index/signin');
            return;
            
        }else{
            redirect('admin/index/dashboard');
            return;
        }

    }

    public function signin (){
		if(!$_POST){
			// $data['capcha']=$this->recaptcha->render();
			// $data['capcha1']=$this->recaptcha1->render();
			$this->load->view('admin/login/bg_login');
			//$this->template->sepatubesar_admin("login/bg_login");
        }else{
            $this->form_validation->set_rules('username', '', 'required');
            $this->form_validation->set_rules('password', '', 'required');
            
			$username      = mysql_real_escape_string($this->input->post('username'));
            $password   = md5(mysql_real_escape_string($this->input->post('password')));
			
            $QShop = $this->model_index->get_user_admin($username,$password)->row();
            if(!empty($QShop)){
					$_SESSION['bird']['id'] = $QShop->id;
					$_SESSION['bird']['username'] = $QShop->username;		
                    $_SESSION['bird']['level'] = $QShop->level;   
					echo "1";
			}else{
				echo "0";
			}   
        }
	}

	public function dashboard(){
	 if(empty($_SESSION['bird'] )){
            redirect('admin/index/signin');
            return;
        }else{
            $this->template->dinas_pendidikan('index',$this->data);
        }
	}

	public function logout(){
		 unset($_SESSION['bird']);
		 unset($_SESSION['login_error']);
        // session_destroy();
		 redirect('admin/index/signin');
	}


}

?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  
/*
* CONTROLLER INDEX WEBSITE
* This controler for screen index
*
* Log Activity : ~ Create your log if you change this controller ~
* 1. Create 20 Oktober 2018 by Devanda Andrevianto, Create All Function, Create controller
*/
class Data extends CI_Controller {
	var $data = array('scjav'=>'assets/jController/admin/CtrlData.js');
    function __construct(){
        parent::__construct();
        $this->lang->load('admin', '');
        $this->load->model("admin/model_index");
        $this->load->model("admin/model_data");
    }


	
	// fungsi untuk mengecek apakah user sudah login
	 public function data_pelaporan(){
        if($_SESSION['data']['level'] != 3){
            $this->data['Data'] = $this->model_data->get_data_pelaporans();
        }else{
            $this->data['Data'] = $this->model_data->get_data_pelaporans_from();
        }

        $this->data['Data_Karyawan'] = $this->db->query("select * from tb_user");

        $this->template->data('data_pelaporan/bg_index',$this->data);

    }

     public function input_data_pelaporan(){
        $this->data['Data'] = $this->model_data->get_data_pelaporan();
        $this->data['Data_Karyawan'] = $this->db->query("select * from tb_user");
        $this->template->data('data_pelaporan/bg_add',$this->data);

    }

    public function save_pelaporan(){
        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');

         $insert = $this->db->set('judul',$judul)
                            ->set('deskripsi',$deskripsi)
                            ->set('from',$_SESSION['data']['id'])
                            ->set('create_date',date("Y-m-d H:i:s"))
                            ->set('create_user',$_SESSION['data']['username'])
                            ->insert('tb_data_pelaporan');
        if($insert){
            echo "1";
        }
    }

    public function monitoring_server(){
        $url="https://server-status-tsp.firebaseapp.com/status";
        //  Initiate curl
        $ch = curl_init();
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL,$url);
        // Execute
        $result=curl_exec($ch);
        // Closing
        curl_close($ch);

        // Will dump a beauty json :3
        //var_dump(json_decode($result, true));
        //print(json_decode($result));

        $data = json_decode($result,true);
        ///Count
                  //    $total=count($data);
                  //    $Str='<h1>Total : '.$total.'';
                  //    echo $Str;
                  //    foreach ($data as $key => $value)
                  //     {
                      
                  // echo '  <td><font  face="calibri"color="red">'.$value[id].'   </font></td><td><font  face="calibri"color="blue">'.$value[alias].'   </font></td><td><font  face="calibri"color="green">'.$value[location].'   </font></tr><tr>';

                  //  }
                  //  echo "</tr></table>";
        $this->data['Data'] = $data;
        $this->template->data('data_server/bg_index',$this->data);        
    }

}
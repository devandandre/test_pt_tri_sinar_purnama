<?php 

class Gcm {
	
	// GCM Bonobo
	// var $url = 'https://gcm-http.googleapis.com/gcm/send';
	// var $key = 'AIzaSyAlMqr29mUEfKD1ooqgQHQXtVA8DGnCHK4'; 
	
	// GCM Juruparkir
	// var $url = 'https://gcm-http.googleapis.com/gcm/send';
	// var $key = 'AIzaSyCks0uocySyskoptq3Y_nypCT7Lh7yMSHo'; 
	

	// FCM Juruparkir
		var $url = 'https://fcm.googleapis.com/fcm/send';
		var $key = 	  'AAAAfSphFBw:APA91bGvEJ491mC3ZI8iDm4QLetLgU0Hr0qNjsnV7f-mGFbVeijzjJIOUmU3IVpKq5M71F5IAsm1eNUf_yB-eXB2AdEDK26LGlDpNEj7E3Agk7MN4Yv9UOohbEavdgK_OEyVhvTAfuc9DQO2JQWmtvl9zKBqOT7TwQ'; // GCM baru

	

	var $ids = array();
	var $to = "";
	var $data = array( 'message' => "Server meminta device untuk mengambil data ke Service API");
	var $isValid = false;
	var $message = "";
	
	public function addIds($id){
		if(!empty($id)){
			array_push($this->ids,$id);
		}
	}
	
	public function setIds($ids){
		$this->ids = $ids;
	}
	
	public function setTopic($topic){
		if(!empty($topic)){
			$this->to = $topic;
		}
	}
	
	public function setData($data){
		if(!empty($data)){
			$this->data = $data;
		}
	}
	
	public function isValid(){
		return $this->isValid;
	}
	
	public function getMessage(){
		return $this->message;
	}
		
	public function send(){
		try{

			// $this->data = array( 'message' => "5130");

			$headers = array( "Authorization: key=".$this->key, "Content-Type: application/json");
			
			if(empty($this->topic)){
				$post = array( 'registration_ids'  => $this->ids, 'data' => $this->data, );
			}else{
				$post = array('registration_ids' => $this->ids, "to" => $this->to, 'data' => $this->data, );
			}
			
			$ch = curl_init();

			curl_setopt( $ch, CURLOPT_URL, $this->url );
			curl_setopt( $ch, CURLOPT_POST, true );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
			curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $post ) );

			if ( curl_errno( $ch ) ){
				$this->message = curl_error( $ch );
				$this->isValid = false;
			}else{
				$this->message = curl_exec( $ch );
				$this->isValid = true;
			}
			
			curl_close( $ch );

		}catch(Exception $e){
			$this->message = $e;
			$this->isValid = false;
		}
	}
}
?>
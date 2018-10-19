<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$active_group 			= 'default';
$active_record 			= TRUE;
$active_online 			= FALSE;
$active_production		= FALSE;

if($active_online){
	if($active_production){
		$db['default']['hostname'] = 'localhost';
		$db['default']['username'] = 'root';
		$db['default']['password'] = 'h6ypV*nDJjoEed';
		$db['default']['database'] = 'government_step';
	}else{
		$db['default']['hostname'] = '130.211.251.219';
		$db['default']['username'] = 'dev';
		$db['default']['password'] = 'v1510n3v1510n3';
		$db['default']['database'] = 'government_step';
	}
}else{
	$db['default']['hostname'] = 'localhost';
	$db['default']['username'] = 'root';
	$db['default']['password'] = '';
	$db['default']['database'] = 'bird';
}

$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = APPPATH . 'cache';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */
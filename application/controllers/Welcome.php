<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('welcome_message');
	}
//-------------------------------------------------------------------------------	
	public function complete($enterurl=null,$token=null){
		
		$extended = $this->$enterurl();
		$url='http://api.boxberry.de/json.php?token='.$token.'&method='.$enterurl.$extended;
		$handle = fopen($url, "rb");
		$contents = stream_get_contents($handle);
		echo $contents;
		
	}
//-------------------------------------------------------------------------------	
	private function ListCities(){
		return null;
	}
//-------------------------------------------------------------------------------	
	private function DeliveryCosts(){
		$get = $_GET;
		$extend = '&weight='.$get['weight'].'&target='.$get['target'].'&ordersum='.$get['ordersum'].'&deliverysum=0&paysum=0';
		return $extend;
	}
}

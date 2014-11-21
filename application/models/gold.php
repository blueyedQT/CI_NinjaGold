<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gold extends CI_Model {

	public function gold_count()
	{	
		// $this->session->unset();
		if($this->session->userdata('gold') == NULL) {
			$this->session->set_userdata('gold', 0);
			$messages = array();
			$this->session->set_userdata('messages');
		}
		return $this;
	}

	public function farm()
	{
		$rand = rand(10, 20);
		$temp = $this->session->userdata('gold');
		$temp += $rand;
		$this->session->set_userdata('gold', $temp);
		$messages = $this->session->userdata('messages');
		$t=time();
		$date = date("F jS Y g:i a", $t);
		$message = 'You searched the farm and found '. $rand . ' gold. - '.$date;
		$messages[] = $message;
		$this->session->set_userdata('messages', $messages);
		$display['messages']= $this->session->userdata('messages');
		$this->load->view('ninja_gold', $display);
	}
}
?>
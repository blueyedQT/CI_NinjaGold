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
		$temp = $this->session->userdata('gold');
		$temp += 5;
		$this->session->set_userdata('gold', $temp);
		$display['gold'] = $this->session->userdata('gold');
		$message = 'You searched the farm and found 5 gold';
		$this->session->set_userdata('messages', $message);
		$display['message'] = $this->session->userdata('message');
		$this->load->view('ninja_gold', $display);
	}
}
?>
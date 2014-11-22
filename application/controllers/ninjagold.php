<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NinjaGold extends CI_Controller {

	public function index()
	{	
		if($this->session->userdata('gold') == NULL) {
			$this->session->set_userdata('gold', 0);
			$messages = array();
			$this->session->set_userdata('messages');
		}
		$display['gold'] = $this->session->userdata('gold');
		$display['messages'] = $this->session->userdata('messages');
		$this->load->view('ninja_gold', $display);
	}

	public function farm()
	{
		$rand = rand(10, 20);
		$temp = $this->session->userdata('gold');
		$temp += $rand;
		$this->session->set_userdata('gold', $temp);
		$display['gold'] = $this->session->userdata('gold');
		$messages = $this->session->userdata('messages');
		$t=time();
		$date = date("F jS Y g:i a", $t);
		$message = '<p class="green">You searched the farm and found '. $rand . ' gold. - '.$date.'</p>';
		$messages[] = $message;
		$this->session->set_userdata('messages', $messages);
		$display['messages']= $this->session->userdata('messages');
		$this->load->view('ninja_gold', $display);
	}

	public function cave()
	{
		$rand = rand(5, 10);
		$temp = $this->session->userdata('gold');
		$temp += $rand;
		$this->session->set_userdata('gold', $temp);
		$display['gold'] = $this->session->userdata('gold');
		$messages = $this->session->userdata('messages');
		$t=time();
		$date = date("F jS Y g:i a", $t);
		$message = '<p class="green">You searched the cave and found '. $rand . ' gold. - '.$date.'</p>';
		$messages[]= $message;
		$this->session->set_userdata('messages', $messages);
		$display['messages']= $this->session->userdata('messages');
		$this->load->view('ninja_gold', $display);
	}

	public function house()
	{
		$rand = rand(2, 5);
		$temp = $this->session->userdata('gold');
		$temp += $rand;
		$this->session->set_userdata('gold', $temp);
		$display['gold'] = $this->session->userdata('gold');
		$messages = $this->session->userdata('messages');
		$t=time();
		$date = date("F jS Y g:i a", $t);
		$message = '<p class="green">You searched the house and found '. $rand . ' gold. - '.$date.'</p>';
		$messages[]= $message;
		$this->session->set_userdata('messages', $messages);
		$display['messages']= $this->session->userdata('messages');
		$this->load->view('ninja_gold', $display);
	}

	public function casino()
	{
		$rand;
		$message;
		$odds = rand(1, 10); 
		if($odds > 3) {
			$rand = rand(-50, 0);
			$message = '<p class="red">You searched the casino and lost ';
		} else {
			$rand = rand(0, 50);
			$message = '<p class="green">You searched the casino and won ';
		}
		$temp = $this->session->userdata('gold');
		$temp += $rand;
		$this->session->set_userdata('gold', $temp);
		$display['gold'] = $this->session->userdata('gold');
		$messages = $this->session->userdata('messages');
		$t=time();
		$date = date("F jS Y g:i a", $t);
		$message .= $rand . ' gold. - '.$date.'</p>';
		$messages[]= $message;
		$this->session->set_userdata('messages', $messages);
		$display['messages']= $this->session->userdata('messages');
		$this->load->view('ninja_gold', $display);
	}

	public function reset() {
		$this->session->sess_destroy();
		$display['gold'] = 0;
		$this->load->view('ninja_gold', $display);
	}
}
?>
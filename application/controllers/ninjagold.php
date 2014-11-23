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

	public function process_money() {
		$bldg = $this->input->post('building');
		if($bldg == 'farm') {
			$rand = rand(10, 20);		
		} elseif ($bldg == 'cave') {
			$rand = rand(5, 10);
		} elseif ($bldg == 'house') {
			$rand = rand(2, 5);
		} elseif ($bldg == 'casino') {
			$odds = rand(1, 10); 
			if($odds > 3) {
				$rand = rand(-50, 0);
				$message = '<p class="red">You searched the casino and lost ';
			} else {
				$rand = rand(0, 50);
				$message = '<p class="gold">You searched the casino and won ';
			}
		}
		$temp = $this->session->userdata('gold');
		$temp += $rand;
		$this->session->set_userdata('gold', $temp);
		$display['gold'] = $this->session->userdata('gold');
		$messages = $this->session->userdata('messages');
		$t=time();
		$date = date("F jS Y g:i a", $t);
		if($bldg == 'casino') {
			$message .=  $rand . ' gold. - '.$date.'</p>';
		} else {
			$message = '<p class="green">You searched the '.$bldg.' and found '. $rand . ' gold. - '.$date.'</p>';
		}
		$messages[] = $message;
		$this->session->set_userdata('messages', $messages);
		$display['messages']= $this->session->userdata('messages');
		$this->page();
	}

	public function page() {
		redirect('');
	}

	public function reset() {
		$this->session->sess_destroy();
		redirect('');
	}
}
?>
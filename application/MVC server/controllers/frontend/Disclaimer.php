<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Disclaimer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Templates');
		
	}

	public function index()
	{	
		$c = $this->session->userdata('site_lang');
		if ($c == 'english' OR $c == NULL) {
			$this->load->model('M_home_en','home');
		}
		else {
			$this->load->model('M_home','home');
		}	
		$h = array_values($this->home->get_home()->result());
		$data['page'] = "Disclaimer";
		$data['disclaimer'] = $h['0']->disclaimer;
          $this->load->view('front_end/V_disclaimer' ,$data);        
        }	

}

/* End of file Prospektus.php */
/* Location: ./application/controllers/Prospektus.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {

	public function index()
	{
		$this->template->load('template', 'v_home');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
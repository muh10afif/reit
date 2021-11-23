<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saham_properti extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Cek_login_lib');
        $this->cek_login_lib->logged_in();
	}

	public function index()
	{
		$data['aktif'] = "saham_properti";
		$this->template->load('template', 'saham_properti/V_saham_properti', $data);
	}

}

/* End of file Saham_properti.php */
/* Location: ./application/controllers/Saham_properti.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publish_report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Cek_login_lib');
        $this->cek_login_lib->logged_in();
	}

	public function index()
	{
		$data['aktif'] = 'publish_report';
		$this->template->load('template', 'publish_report/V_publish_report', $data);
	}

}

/* End of file publish_report.php */
/* Location: ./application/controllers/publish_report.php */
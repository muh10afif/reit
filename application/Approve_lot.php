<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approve_lot extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Cek_login_lib');
        $this->cek_login_lib->logged_in();
	}

	public function index()
	{
		$data['aktif']	= "approve_lot";
		$this->template->load('template', 'approve_lot/v_approve_lot', $data);
	}

	public function detail()
	{
		$data['aktif']	= "approve_lot";
		$this->template->load('template', 'approve_lot/v_detail', $data);
	}

}

/* End of file Approve_lot.php */
/* Location: ./application/controllers/Approve_lot.php */
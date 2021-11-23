<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Histori_transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Cek_login_lib');
        $this->cek_login_lib->logged_in();
	}

	public function index()
	{
		$data['aktif'] = "histori_transaksi";
		$this->template->load('template', 'histori_transaksi/V_histori_transaksi', $data);
	}

}

/* End of file History_transaksi.php */
/* Location: ./application/controllers/History_transaksi.php */
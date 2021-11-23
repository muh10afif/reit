<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Investor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Cek_login_lib');
        $this->cek_login_lib->logged_in();
        $this->load->model(array('M_invest'));
	}

	/***************************************************************************************/
	//								   ------------ 									   //
	//								  SAHAM PROPERTI 									   //
	//								   ------------ 									   //
	/***************************************************************************************/

	public function saham_properti()
	{
		$data['aktif'] = "saham_properti";
		$this->template->load('template', 'investor/V_saham_properti', $data);
	}

	/***************************************************************************************/
	//								   ------------ 									   //
	//								  HISTORI TRANSAKSI 								   //
	//								   ------------ 									   //
	/***************************************************************************************/

	public function histori_transaksi()
	{
		$data = ['aktif' 	=> "histori_transaksi",
				 'judul'	=> "Histori Transaksi",
				 'tr_beli'	=> $this->M_invest->get_data_tr_beli($this->session->userdata('id_pengguna'))
				];

		$this->template->load('template', 'investor/V_histori_transaksi', $data);
	}

}

/* End of file investor.php */
/* Location: ./application/controllers/investor.php */
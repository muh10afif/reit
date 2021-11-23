<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approve_lot extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Cek_login_lib');
        $this->cek_login_lib->logged_in();
        $this->load->model(array('M_invest'));
	}

	public function index()
	{
		$data 	= [	'aktif' 		=> 'approve_lot',
					'data_invest'	=> $this->M_invest->get_data_invest($id_tr_investor = null)
				  ];

		$this->template->load('template', 'approve_lot/V_approve_lot', $data);
	}

	public function detail($id_tr_investor)
	{
		$data['aktif']	= "approve_lot";
		$data 	= [	'aktif' 		=> 'approve_lot',
					'data_invest'	=> $this->M_invest->get_data_invest($id_tr_investor)->row_array()
			   	  ];

		$this->template->load('template', 'approve_lot/V_detail', $data);
	}

}

/* End of file Approve_lot.php */
/* Location: ./application/controllers/Approve_lot.php */
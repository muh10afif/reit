<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Cek_login_lib');
        $this->cek_login_lib->logged_in();
        $this->load->model(array('M_invest'));
	}

	/***************************************************************************************/
	//									----------- 									   //
	//									APPROVE LOT 									   //
	//									----------- 									   //
	/***************************************************************************************/

	// menampilkan halaman awal approve lot
	public function approve_lot()
	{
		$data 	= [	'aktif'			=> 'approve_lot',
					'judul'     	=> 'Approve Lot',
					'data_invest'	=> $this->M_invest->get_data_invest()
				  ];

		$this->template->load('template', 'manager/V_approve_lot', $data);
	}

	// menampilkan detail approve lot
	public function detail_approve()
	{
		$kd_tr = $this->uri->segment(3);

		$data 	= [	'aktif' 		=> 'approve_lot',
					'data_invest_1'	=> $this->M_invest->get_detail_invest($kd_tr)->row_array(),
					'data_invest_2'	=> $this->M_invest->get_detail_invest($kd_tr)->result_array()
			   	  ];

		$this->template->load('template', 'manager/V_detail_approve', $data);
	}

	// merubah status approve lot
	public function ubah_stat_invest()
	{
		$kd_tr  		= $this->uri->segment(4);
		$id_tr_invest  	= $this->uri->segment(5);
		$jml_lot 	  	= $this->uri->segment(6);
		$kondisi 	  	= $this->uri->segment(7);

		if (!empty($kondisi)) {
			$kode = $this->input->post('status');
		} else {
			$kode = $this->uri->segment(3);
		}

		if ($kode == 1) {
			// mencari id_prospektus dari id_tr_investor
			$hasil_1 = $this->M_invest->cari_id_prospektus($id_tr_invest)->row_array();

			// mencari jumlah lot dari id_tr_investor
			$hasil_2 = $this->M_invest->cari_jumlah_lot_invest($hasil_1['id_prospektus'])->row_array();

			$sisa_lot = $jml_lot - $hasil_2['jml_lot'];

			if ($sisa_lot < 0) {
				$this->M_invest->ubah_status_approve(array('status' => 2), $id_tr_invest);

				$this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-times" style="margin-top: -10px"></i></span>
	                Lot ditolak, sisa lot bernilai minus!
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">×</span>
	                </button>
	            </div>');
			} else {
				$this->M_invest->ubah_status_approve(array('status' => $kode), $id_tr_invest);

				$this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
	                Data Sukses Disimpan
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">×</span>
	                </button>
	            </div>');
			}
		} else {
			$this->M_invest->ubah_status_approve(array('status' => $kode), $id_tr_invest);

			$this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Disimpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');
		}

		

		redirect('manager/detail_approve/'.$kd_tr);
		
	}

	/***************************************************************************************/
	//								   ------------ 									   //
	//								  PUBLISH REPORT 									   //
	//								   ------------ 									   //
	/***************************************************************************************/

	public function publish_report()
	{
		$data = ['aktif' 		=> 'publish_report',
				 'judul' 		=> 'Publish Report',
				 'data_pros'	=> $this->M_invest->get_data_pros(),
				 'data_unit'	=> $this->M_invest->get_data_unit()
				];

		$this->template->load('template', 'manager/V_publish_report', $data);
	}

}

/* End of file manager.php */
/* Location: ./application/controllers/manager.php */
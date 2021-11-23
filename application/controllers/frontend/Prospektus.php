<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prospektus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('M_prospektus', 'M_data'));
		$this->load->library('Templates');
		
	}

	public function index()
	{	
        $data['page_title'] = 'blok';       
        $this->load->library('Cek_login_lib');
        $this->cek_login_lib->logged_in();
        $this->load->library('pagination');
        $jumlah_data = $this->M_prospektus->count_data_blok_f()->num_rows();
        $config['base_url'] = base_url('frontend/Prospektus/index');
    	$config['total_rows'] = $jumlah_data;
    	$config['per_page'] = 6;
    	$config['uri_segment'] = 4;

    	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

    	$this->pagination->initialize($config);
    	$data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    	$data['data_blok']=  $this->M_prospektus->get_data_blok_f($config['per_page'],$data['page'])->result();
        $data['pagination'] = $this->pagination->create_links();

    	$this->templates->load('front_end/template','front_end/V_blok', $data);
	}

    public function unit($id_blok)
    { 
        $data['page_title'] = 'unit'; 
        $this->load->library('Cek_login_lib');
        $this->cek_login_lib->logged_in_3();
        $this->load->library('pagination');
        $jumlah_data = $this->M_prospektus->count_data_unit($id_blok)->num_rows();
        $config['base_url'] = base_url('frontend/Prospektus/index');
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 9;
        $config['uri_segment'] = 4;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $data['data_pros']=  $this->M_prospektus->get_data_unit($id_blok,$config['per_page'],$data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $this->templates->load('front_end/template','front_end/V_prospektus', $data);
    }

    public function detail_prospektus($id_prospektus)
    {       
        $this->load->library('Cek_login_lib');
        $this->cek_login_lib->logged_in_4($id_prospektus);

        $cek = $this->M_prospektus->cek_pengguna_prospektus($id_prospektus, $this->session->userdata('id_pengguna'))->num_rows();

        $data = ['aktif'           => 'prospektus',
                 'detail_pros'     => $this->M_prospektus->get_detail_pros($id_prospektus)->row_array(),
                 'det_foto_pros'   => $this->M_prospektus->get_foto_detail($id_prospektus)->result_array(),
                 'id_blok'         => $this->M_prospektus->get_id_blok_edit($id_prospektus),
                 'id_pros'         => $id_prospektus,
                 'detail'          => $this->M_prospektus->ambil_judul_detail($id_prospektus)->result_array(),
                 'data_dok'        => $this->M_prospektus->get_data_dok($id_prospektus),
                 'data_res'        => $this->M_prospektus->get_data_res($id_prospektus),
                 'cek_transaksi'   => $cek
                ];

        $this->template->load('front_end/template_d', 'front_end/V_detail', $data);
    }

    # ==========================================
    # =           transaksi investor           =
    # ==========================================
    
    // memproses awal transaksi investor
    public function buat_invest()
    {
        $id_pros  = $this->uri->segment(4);
        $kd_tr    = $this->uri->segment(5);

        $tr       = $this->M_prospektus->cari_kd_tr($kd_tr)->row_array();

        $da       = $this->M_data->cari_id_pengguna('detail_profil',$this->session->userdata('id_pengguna'))->row_array();
        $pros     = $this->M_prospektus->cari_id_prospektus($id_pros)->row_array();
        $ft       = $this->M_prospektus->cari_id_foto($id_pros)->row_array();

        $data  = ['pengguna'    => $da,
                  'pros'        => $pros,
                  'foto'        => $ft,
                  'id_pros'     => $id_pros,
                  'kd_tr'       => $kd_tr,
                  'total'       => $tr['total'],
                  'mt_bayar'    => $tr['mt_bayar'],
                  'bank'        => $tr['bank'],
                  'batas_bayar' => $tr['batas_bayar'],
                  'jml_lot'     => $pros['jumlah_lot']
                  ];

        $this->template->load('front_end/template_d', 'front_end/V_tr_invest', $data);
    }

    // meyimpan proses tr_investor
    public function simpan_tr_investor()
    {
        $today          = "RET".date('Ymd');
        $id_pros        = $this->input->post('id_pros');
        $id_pengguna    = $this->input->post('id_pengguna');
        $jml_lot        = $this->input->post('jml_lot');
        $mt_bayar       = $this->input->post('mt_bayar');
        $total          = $this->input->post('total');

        $total          = str_replace(".", "", $total);

        $cari_tgl       = $this->M_prospektus->cari_kd_transaksi($today)->row_array();

        if ($cari_tgl != null) {
            $last_kode_transaksi = $cari_tgl['kd_transaksi'];

            $lastNoUrut = substr($last_kode_transaksi, 11, 4);

            $nextNoUrut = $lastNoUrut + 1;

            $nextNoTransaksi = $today. sprintf('%04s', $nextNoUrut);
        } else {
            $nextNoTransaksi = "RET.$today.0001";
        }

        $data = ['id_pengguna'      => $id_pengguna,
                 'id_prospektus'    => $id_pros,
                 'jumlah_lot'       => $jml_lot,
                 'kode_transaksi'   => $nextNoTransaksi,
                 'status'           => 0
                ];

        $d_transfer = ['kode_transaksi'   => $nextNoTransaksi,
                       'mt_bayar'         => $mt_bayar,
                       'total'            => $total
                      ];

        $tgl_skrg       = date('Y-m-d H:i:s', now('Asia/Jakarta'));
        $new_tgl_skrg   = strtotime($tgl_skrg);

        $jml_hari       = 3;
        $new_jml_hari   = 86400 * $jml_hari;

        $hasil_jml      = $new_tgl_skrg + $new_jml_hari;
        $batas_bayar    = date('Y-m-d H:i:s', $hasil_jml);

        $bayar_cash = ['batas_bayar' => $batas_bayar];


        $this->M_prospektus->proses_simpan_tr_investor($data);
        $this->M_prospektus->proses_simpan_tr_transfer($d_transfer);
        
        if ($mt_bayar == 'cash') {
            $this->M_prospektus->simpan_bank($bayar_cash, $nextNoTransaksi);
        }

        redirect('frontend/Prospektus/buat_invest/'.$id_pros.'/'.$nextNoTransaksi);
    }
    

    // proses simpan bank
    public function simpan_bank()
    {
        $bank       = $this->input->post('bank');
        $kd_tr      = $this->input->post('kd_tr');
        $id_pros    = $this->input->post('id_pros');

        $tgl_skrg       = date('Y-m-d H:i:s', now('Asia/Jakarta'));
        $new_tgl_skrg   = strtotime($tgl_skrg);

        $jml_hari       = 3;
        $new_jml_hari   = 86400 * $jml_hari;

        $hasil_jml      = $new_tgl_skrg + $new_jml_hari;
        $batas_bayar    = date('Y-m-d H:i:s', $hasil_jml);

        $data = ['bank'         => $bank,
                 'batas_bayar'  => $batas_bayar
                ];

        $this->M_prospektus->simpan_bank($data, $kd_tr);

        redirect('frontend/Prospektus/buat_invest/'.$id_pros.'/'.$kd_tr); 
    }

    # ======  End of transaksi investor  =======

}

/* End of file Prospektus.php */
/* Location: ./application/controllers/Prospektus.php */
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prospektus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_prospektus');
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
        {       $this->load->library('Cek_login_lib');
                $this->cek_login_lib->logged_in_4($id_prospektus);
                $data = ['aktif'                   => 'prospektus',
                         'detail_pros'     => $this->M_prospektus->get_detail_pros($id_prospektus)->row_array(),
                         'det_foto_pros'   => $this->M_prospektus->get_foto_detail($id_prospektus)->result_array(),
                         'id_blok'         => $this->M_prospektus->get_id_blok_edit($id_prospektus),
                         'id_pros'         => $id_prospektus,
                         'detail'          => $this->M_prospektus->ambil_judul_detail($id_prospektus)->result_array(),
                         'data_dok'        => $this->M_prospektus->get_data_dok($id_prospektus),
                         'data_res'        => $this->M_prospektus->get_data_res($id_prospektus)
                                ];

                 $this->load->view('front_end/V_detail', $data);
        }

}

/* End of file Prospektus.php */
/* Location: ./application/controllers/Prospektus.php */
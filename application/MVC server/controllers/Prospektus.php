<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prospektus extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Cek_login_lib');
        $this->cek_login_lib->logged_in();
        $this->load->model(array('M_prospektus'));
        $this->load->library(array('upload', 'pagination'));
	}

    // load halaman default
	public function index()
	{
		$this->load->library('Cek_login_lib');
        $this->cek_login_lib->logged_in();
        $this->load->library('pagination');

        $jumlah_data = $this->M_prospektus->count_data_blok()->num_rows();

        $config['base_url'] 	= base_url('prospektus/index');
		$config['total_rows'] 	= $jumlah_data;
		$config['per_page'] 	= 6;
		$config['uri_segment'] 	= 3;

		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center mt-20"><nav class="pagination-wrap d-inline-block" aria-label="Page navigation example"><ul class="pagination custom-pagination pagination-rounded">';
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
		$data['page'] 		= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['data_blok']	= $this->M_prospektus->get_data_blok($config['per_page'],$data['page']);
		$data['pagination'] = $this->pagination->create_links();
		$data['aktif']		= 'prospektus';
		//$data['data_pros']	= $this->M_prospektus->get_data_pros($id_prospektus = null, $a = null, $b = null);
        $data['kawasan']    = $this->M_prospektus->get_data_kawasan()->result_array();

		$this->template->load('template','prospektus/V_prospektus', $data);
	}

	// menampikan form tambah data
	public function tambah($id_blok = null)
	{
		$data = [ 'aktif'	=> 'prospektus',
				  'unit'	=> $this->M_prospektus->get_unit_blok($id_blok),
                  'id_blok' => $id_blok
				];

		$this->template->load('template','prospektus/V_tambah_data', $data);
	}

	// menampilkan form halaman edit data prospektus
	public function edit($id_prospektus, $d = null)
	{
		$data = ['aktif'	=> 'prospektus',
				 'pros'		=> $this->M_prospektus->get_data_pros($id_prospektus, $a = null, $b = null)->row_array(),
				 'unit'		=> $this->M_prospektus->get_unit(),
                 'id_blok'  => $this->M_prospektus->get_id_blok_edit($id_prospektus),
				 'foto_pros'=> $this->M_prospektus->get_foto_edit($id_prospektus)->result_array(),
                 'd_pros'   => $d
				];

		$this->template->load('template','prospektus/V_edit_data', $data);
	}

    // untuk menampilkan form investasi
	public function buy()
	{
		$data['aktif']	= 'prospektus';
		$this->template->load('template','prospektus/V_buy', $data);
	}

    // menampilkan detail per unit
	public function detail($id_prospektus)
	{
		$data = ['aktif' 		   => 'prospektus',
				 'detail_pros'	   => $this->M_prospektus->get_detail_pros($id_prospektus)->row_array(),
				 'det_foto_pros'   => $this->M_prospektus->get_foto_detail($id_prospektus)->result_array(),
                 'id_blok'         => $this->M_prospektus->get_id_blok_edit($id_prospektus),
                 'id_pros'         => $id_prospektus,
                 'detail'          => $this->M_prospektus->ambil_judul_detail($id_prospektus)->result_array(),
                 'data_dok'        => $this->M_prospektus->get_data_dok($id_prospektus),
                 'data_res'        => $this->M_prospektus->get_data_res($id_prospektus),
                 'aksi'            => $this->uri->segment(4)
				];

		$this->template->load('template','prospektus/V_detail', $data);
	}

	// menampilkan detail tiap kawasan
	public function detail_kws($id_blok)
	{
		$this->load->library('Cek_login_lib');
        $this->cek_login_lib->logged_in();
        $this->load->library('pagination');

        // $jumlah_data = $this->db->count_all('prospektus');

        $jumlah_data = $this->M_prospektus->get_data_unit_jml($id_blok)->num_rows();

        $config['base_url'] 		= base_url("prospektus/detail_kws/".$id_blok);
        $config['total_rows'] 		= $jumlah_data;
        $config['per_page'] 		= 3;
        $config['uri_segment'] 		= 4;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center mt-20"><nav class="pagination-wrap d-inline-block" aria-label="Page navigation example"><ul class="pagination custom-pagination pagination-rounded">';
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

        $data['aktif']			= 'prospektus';
        $data['page'] 			= ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['data_unit_pros']	= $this->M_prospektus->get_data_unit($id_blok,$config['per_page'],$data['page']);
        $data['id_blok']        = $this->M_prospektus->get_id_blok($id_blok);
        $data['pagination'] 	= $this->pagination->create_links();

        $this->template->load('template','prospektus/V_unit', $data);
	}

	// Proses menyimpan data form tambah data prospektus
	public function proses($aksi)
	{
        $id_blok    = $this->input->post('id_blok');
		$id 		= $this->input->post('id_prospektus');
		$target 	= $this->input->post('target');
		$unit 		= $this->input->post('unit');
		$harga 		= $this->input->post('harga');
		$lokasi		= $this->input->post('lokasi');
		$ket		= $this->input->post('ket');
		$periode	= $this->input->post('periode');
		$invest_min	= $this->input->post('invest_min');
		$jml_lot 	= $this->input->post('jml_lot');
        $ft_thumb   = $this->input->post('ft_thumb');
        $id_ft_thumb= $this->input->post('id_ft_thumb');
        $d_pros     = $this->input->post('d_pros');

		$data = array(
        			'target_investor'	=> $target,
    				'unit' 				=> $unit,
    				'jumlah_lot' 		=> $jml_lot,
    				'minimal_investasi'	=> $invest_min,
    				'alamat' 			=> $lokasi,
    				'keterangan'		=> $ket,
    				'periode_investasi'	=> $periode
    				);

		if ($aksi == 'tambah') {
			$this->db->insert('prospektus', $data);

       		$id_prospektus = $this->db->insert_id();
		} else {
			$this->M_prospektus->simpan_edit($data, $id);
		}

        $config['upload_path']		= './assets/gambar/';
        $config['allowed_types'] 	= 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] 		= 2048;
        $config['encrypt_name'] 	= FALSE;
 
        $this->upload->initialize($config);

        if (!empty($_FILES['foto_thumb']['name']) || !empty($_FILES['foto']['name']))
        {
        	$this->upload->do_upload('foto_thumb');

            $gbr 	= $this->upload->data();
            $gambar = $gbr['file_name']; 

            if ($aksi == 'tambah') {

                if (!empty($_FILES['foto_thumb']['name'])) {
                    $d = array( 'file_foto'      => base64_encode($gambar),
                                'thumbnail'      => 1,
                                'id_prospektus'  => $id_prospektus);
                } else {
                    $d = array( 'file_foto'      => base64_encode("no_image.jpg"),
                                'thumbnail'      => 1,
                                'id_prospektus'  => $id_prospektus);
                }

            	$this->M_prospektus->simpan_upload($d);

            } else {

                if (!empty($_FILES['foto_thumb']['name'])) {

                    $this->db->where('id_file_foto', $id_ft_thumb);
                    $this->db->delete('file_foto');

                    $x = array('file_foto'      => base64_encode($gambar),
                               'thumbnail'      => 1,
                               'id_prospektus'  => $id);

                    $this->M_prospektus->simpan_upload($x);

                } else {
                    $x = array('file_foto'      => $ft_thumb,
                               'thumbnail'      => 1,
                               'id_prospektus'  => $id);

                    $this->M_prospektus->edit_upload($x, $id_ft_thumb);
                }

                
            }
            
           	$jml_foto = count($_FILES['foto']['name']);

           	for ($i = 0; $i < $jml_foto; $i++) {

           		$_FILES['foto[]']['name'] 		= $_FILES['foto']['name'][$i];
           		$_FILES['foto[]']['type'] 		= $_FILES['foto']['type'][$i];
	            $_FILES['foto[]']['tmp_name'] 	= $_FILES['foto']['tmp_name'][$i];
	            $_FILES['foto[]']['error'] 		= $_FILES['foto']['error'][$i];
	            $_FILES['foto[]']['size'] 		= $_FILES['foto']['size'][$i];

				$this->upload->do_upload('foto[]');

				$gbr_pro		= $this->upload->data();
				$gambar_pro 	= $gbr_pro['file_name'];

				if ($aksi == 'tambah') {

                    if (!empty($_FILES['foto[]']['name'])) {
                        $e = array('file_foto'      => base64_encode($gambar_pro),
                                   'thumbnail'      => 0,
                                   'id_prospektus'  => $id_prospektus);

                        $this->M_prospektus->simpan_upload($e);
                    }

				} else {

                    if (!empty($_FILES['foto[]']['name'])) {
                        $id_ft  = $this->input->post('id_ft');

                        foreach ($id_ft as $d) {
                            $this->db->where('id_file_foto', $d);
                            $this->db->delete('file_foto');
                        }

                        $b = array( 'file_foto'      => base64_encode($gambar_pro),
                                    'thumbnail'      => 0,
                                    'id_prospektus'  => $id);
                        
                        $this->M_prospektus->simpan_upload($b);   

                    } else {
                        $ft     = $this->input->post('ft');
                        $id_ft  = $this->input->post('id_ft');

                        
                        for ($i = 0; $i < count($ft) ; $i++) {
                            foreach ($ft as $f) {
                                foreach ($id_ft as $d) {
                                    $b = array( 'file_foto'      => $f,
                                                'thumbnail'      => 0,
                                                'id_prospektus'  => $id);
                                }

                                $this->M_prospektus->edit_upload_ft($b, $d);
                            }
                        }
                        

                    }

                    
				}
	            
           	}

            $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
               	Data Sukses Disimpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

            if ($id_blok != null) {
                if ($d_pros == 'd_pros') {
                    redirect('prospektus/data_pros');
                } else {
                    redirect('prospektus/detail_kws/'.$id_blok);
                }
            } else {
                redirect('prospektus/data_pros');
            }
            

        }else{

            $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-times" style="margin-top: -10px"></i></span>
               	Data Gagal disimpan!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

            if ($id_blok != null) {
                if ($d_pros == 'd_pros') {
                    redirect('prospektus/data_pros');
                } else {
                    redirect('prospektus/detail_kws/'.$id_blok);
                }
            } else {
                redirect('prospektus/data_pros');
            }
        }

	}

	// untuk menampilkan harga saat jenis unit dipilih
	public function get_harga(){
        $id_unit =	$this->input->post('kode');

        $data 	 =	$this->M_prospektus->get_data_harga($id_unit);

        echo json_encode($data);
    }

    

    /******************************************************************/
    /*                                                                */
    /*                            KAWASAN                             */
    /*                                                                */
    /******************************************************************/

    public function kawasan()
    {
        $data = ['aktif'    => 'kawasan',
                 'data_kws' => $this->M_prospektus->get_data_kawasan()->result_array()
                ];

        $this->template->load('template', 'prospektus/V_kawasan', $data);
    }

    public function tambah_kws()
    {
        $nama   = $this->input->post('nama');
        $alamat = $this->input->post('alamat');

        $data = ['nama_kawasan' => $nama,
                 'alamat'       => $alamat
                ];

        $this->M_prospektus->simpan_kws($data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Disimpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

       echo json_encode(array('status' => TRUE));

    }

    public function ambil_data_kws($id_kawasan)
    {
        $where = array('id_kawasan' => $id_kawasan);

        $data = $this->M_prospektus->get_id_kawasan($where)->row();

        echo json_encode($data);
    }

    // untuk memproses simpan edit data kawasan
    public function ubah_data_kws()
    {
        $id     = $this->input->post('id_kawasan');
        $nama   = $this->input->post('nama');
        $alamat = $this->input->post('alamat');

        $data = array('nama_kawasan'    => $nama,
                      'alamat'          => $alamat);

        $this->M_prospektus->simpan_ubah_kws($data,$id);

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-warning alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Disimpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

       echo json_encode(array('status' => TRUE));
    }

    // untuk menghapus data kawasan
    public function hapus_kws($id_kawasan)
    {
        $where = ['id_kawasan'  => $id_kawasan];

        $this->M_prospektus->hapus_kws($where);

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Dihapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

       echo json_encode(array('status' => TRUE));      
    }

    /******************************************************************/
    /*                                                                */
    /*                          U N I T                               */
    /*                                                                */
    /******************************************************************/

    // menampilkan data unit
    public function unit()
    {
        $data = ['aktif'        => 'unit',
                 'data_unit'    => $this->M_prospektus->get_unit_menu()->result_array(),
                 'data_blok'    => $this->M_prospektus->get_blok_kws()->result_array()
                ];

        $this->template->load('template','prospektus/V_data_unit', $data);
    }

    // proses simpan data
    public function tambah_unit()
    {
        $nama       = $this->input->post('nama');
        $harga      = $this->input->post('harga');
        $id_blok    = $this->input->post('blok');

        $data = ['nama_unit'    => $nama,
                 'harga'        => $harga,
                 'id_blok'      => $id_blok
                ];

        $this->M_prospektus->simpan_unit($data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Disimpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        echo json_encode(array('status' => TRUE));
    }

    // proses ambil data unit
    public function ambil_data_unit($id_unit)
    {
        $where = ['id_unit' => $id_unit];

        $data = $this->M_prospektus->cari_id_unit($where)->row();

        echo json_encode($data);
    }

    // proses menyimpan form edit unit
    public function ubah_data_unit()
    {
        $id         = $this->input->post('id_unit');
        $nama       = $this->input->post('nama');
        $harga      = $this->input->post('harga');
        $id_blok    = $this->input->post('blok');

        $data = ['nama_unit'    => $nama,
                 'harga'        => $harga,
                 'id_blok'      => $id_blok
                ];

        $this->M_prospektus->simpan_ubah_unit($data,array('id_unit' => $id));

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-warning alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Disimpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        echo json_encode(array('status' => TRUE));
    }

    // proses hapus unit
    public function hapus_unit($id_unit)
    {
        $where = ['id_unit' => $id_unit];

        $this->M_prospektus->hapus_unit($where);

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Disimpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        echo json_encode(array('status' => TRUE));
    }

    /******************************************************************/
    /*                                                                */
    /*                  DATA P R O S P E K T U S                      */
    /*                                                                */
    /******************************************************************/

    // menampilkan halaman awal data prospektus
    public function data_pros()
    {
        $data   = [ 'aktif'         => 'pros',
                    'prospektus'    => $this->M_prospektus->get_data_prospektus()
                ];

        $this->template->load('template', 'prospektus/V_data_pros', $data);
    }

    // menghapus data id_prospektus
    public function hapus_pros($id_prospektus)
    {
        $this->M_prospektus->hapus_id_pros('prospektus', array('id_prospektus'  => $id_prospektus));

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Dihapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        redirect('prospektus/data_pros');
    }

    /******************************************************************/
    /*                                                                */
    /*                          DATA  B L O K                         */
    /*                                                                */
    /******************************************************************/

    // memanggil halaman data blok
    public function data_blok()
    {
        $data = ['aktif'        => 'blok',
                 'data_blok'    => $this->M_prospektus->tampil_data_blok(),
                 'kawasan'      => $this->M_prospektus->get_data_kawasan()->result_array()
                ];

        $this->template->load('template','prospektus/V_data_blok', $data);
    }

    // menghapus data blok
    public function hapus_blok($id_blok)
    {
        $where = ['id_blok' => $id_blok];

        $this->M_prospektus->hapus_blok('blok', $where);

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Dihapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        echo json_encode(array('status' => TRUE));
    }

    // untuk menyimpan data blok
    public function simpan_blok($aksi)
    {
        $id     = $this->input->post('id');
        $nama   = $this->input->post('nama');
        $kws    = $this->input->post('kawasan');
        $unit   = $this->input->post('unit');
        $ft     = $this->input->post('foto');

        $config['upload_path']      = './assets/gambar/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
        $config['max_size']         = 2048;
        $config['encrypt_name']     = FALSE;
 
        $this->upload->initialize($config);


            $this->upload->do_upload('foto');

            $g      = $this->upload->data();
            $foto   = $g['file_name'];

            if (!empty($_FILES['foto']['name'])) {
                $data   = [ 'nama_blok'     => $nama,
                            'id_kawasan'    => $kws,
                            'gambar'        => base64_encode($foto),
                            'jumlah_unit'   => $unit 
                          ];
            } else {

                if ($aksi == 'tambah') {
                    $data   = [ 'nama_blok'     => $nama,
                                'id_kawasan'    => $kws,
                                'gambar'        => base64_encode("no_image.jpg"),
                                'jumlah_unit'   => $unit 
                              ];
                } else {
                    $data   = [ 'nama_blok'     => $nama,
                                'id_kawasan'    => $kws,
                                'jumlah_unit'   => $unit
                              ];
                }
                
            }
            
            if ($aksi == 'tambah') {
                $result = $this->M_prospektus->simpan_data_blok($data);
            } else {
                $result = $this->M_prospektus->simpan_edit_blok($data, $id);
            }
            

            $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Disimpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

           echo json_decode($result);
    }

    // untuk mengambil data blok sesuai id_blok
    public function ambil_data_ajax_blok($id_blok)
    {
        $data = $this->M_prospektus->get_ajax_blok($id_blok)->row_array();

        $result = array('nama'   => $data['nama_blok'],
                        'id'     => $data['id_blok'],
                        'kawasan'=> $data['id_kawasan'],
                        'unit'   => $data['jumlah_unit'],
                        'foto'   => base64_decode($data['gambar'])
                        );

        echo json_encode($result);
    }

    /******************************************************************/
    /*                                                                */
    /*                         DATA D E T A I L                       */
    /*                                                                */
    /******************************************************************/

    // menghapus sub judul detail
    public function hapus_judul_sub_det()
    {
        $id_det_pros        = $this->uri->segment(3);
        $id_pros            = $this->uri->segment(4);
        $id_sub_det_judul   = $this->uri->segment(5);

        $this->M_prospektus->proses_hapus_sub_judul_det('sub_detail_pros', array('id_sub_detail_pros' => $id_sub_det_judul));

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Dihapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        redirect("prospektus/tambah_sub_detail/$id_det_pros/$id_pros/detail");

    }

    // menghapus judul detail
    public function hapus_judul_det()
    {
        $id_det_pros = $this->uri->segment(3);
        $id_pros     = $this->uri->segment(4);

        $this->M_prospektus->proses_hapus_judul_det('detail_pros', array('id_detail_pros' => $id_det_pros));

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Dihapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        redirect("prospektus/tambah_detail/$id_pros/detail");
    }

    // menampilkan halaman buat detail
    public function tambah_detail()
    {
        $id_pros = $this->uri->segment(3);
        $detail  = $this->uri->segment(4);

        $data = ['aktif'        => 'pros',
                 'data_pros'    => $this->M_prospektus->get_data_id_pros($id_pros)->row_array(),
                 'data_judul'   => $this->M_prospektus->get_data_judul($id_pros),
                 'id_pros'      => $id_pros,
                 'detail'       => $detail
                ];

        $this->template->load('template', 'prospektus/V_data_detail', $data);
    }

    // menampilkan halaman buat sub detail
    public function tambah_sub_detail()
    {
        $id_det_pros = $this->uri->segment(3);
        $id_pros     = $this->uri->segment(4);
        $detail      = $this->uri->segment(5);

        $data = [ 'aktif'       => 'pros',
                  'sub_detail'  => $this->M_prospektus->get_data_sub_judul($id_det_pros),
                  'id_det_pros' => $id_det_pros,
                  'id_pros'     => $id_pros,
                  'detail'      => $detail
                ];

        $this->template->load('template', 'detail_pros/V_data_sub_detail', $data);
    }

    // menampilkan form tambah detail
    public function tampil_form_tambah()
    {
        $id_pros = $this->uri->segment(3);
        $detail  = $this->uri->segment(4);

        $data = ['aktif'        => 'pros',
                 'judul'        => $this->M_prospektus->get_judul_detail('judul_detail', array('sub'=> '0')),
                 'id_pros'      => $id_pros,
                 'detail'       => $detail,
                 'data_gambar'  => $this->M_prospektus->get_file_foto()
                ];

        $this->template->load('template', 'detail_pros/V_tambah', $data);
    }

    // menampilkan form tambah sub detail
    public function tampil_form_tambah_sub()
    {
        $id_det_pros = $this->uri->segment(3);
        $id_pros     = $this->uri->segment(4);
        $detail      = $this->uri->segment(5);

        $data = ['aktif'        => 'pros',
                 'judul'        => $this->M_prospektus->get_judul_detail('judul_detail', array('sub'=> '1')),
                 'id_det_pros'  => $id_det_pros,
                 'id_pros'      => $id_pros,
                 'detail'       => $detail,
                 'data_gambar'  => $this->M_prospektus->get_file_foto()
                ];

        $this->template->load('template', 'detail_pros/V_tambah_sub_judul', $data);
    }

    // proses tambah data judul detail
    public function tambah_data_judul()
    {
        $id_pros   = $this->input->post('id_pros');
        $id_judul  = $this->input->post('judul');
        $isi       = $this->input->post('isi_judul');

        $data = ['id_prospektus'    => $id_pros,
                 'id_judul'         => $id_judul,
                 'isi'              => $isi
                ];

        $this->M_prospektus->simpan_data_detail($data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Disimpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        redirect('prospektus/tambah_detail/'.$id_pros.'/detail');
        
    }

    // proses tambah data sub judul detail
    public function tambah_data_sub_judul()
    {
        $id_pros        = $this->input->post('id_pros');
        $id_det_pros    = $this->input->post('id_det_pros');
        $id_sub_judul   = $this->input->post('judul');
        $isi            = $this->input->post('isi_judul');

        $data = [ 'id_sub_judul'    => $id_sub_judul,
                  'id_detail_pros'  => $id_det_pros,
                  'sub_isi'         => $isi
                 ];

        $this->M_prospektus->simpan_sub_detail($data);
            
        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Disimpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        redirect('prospektus/tambah_sub_detail/'.$id_det_pros.'/'.$id_pros.'/detail');

    }

    // menampilkan data judul detail
    public function data_judul()
    {
        $data = ['aktif'        => 'judul',
                 'data_judul'   => $this->M_prospektus->ambil_data_judul()
                ];

        $this->template->load('template','prospektus/V_data_judul', $data);
    }

    // proses simpan judul
    public function tambah_judul()
    {
        $nama   = $this->input->post('nama');
        $sub    = $this->input->post('sub');

        $data = ['nama'     => $nama,
                 'sub'      => $sub
                ];

        $this->M_prospektus->simpan_judul('judul_detail', $data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Disimpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        echo json_encode(array('status' => true));

    }

    // proses ambil data
    public function ambil_isi_judul($id_judul)
    {
        $where = ['id_judul'    => $id_judul];

        $data = $this->M_prospektus->ambil_id_judul('judul_detail', $where)->row();

        echo json_encode($data);
    }

    // proses ubah judul
    public function ubah_judul()
    {
        $id_judul = $this->input->post('id_judul');
        $nama     = $this->input->post('nama');
        $sub      = $this->input->post('sub');

        $data = ['nama'     => $nama,
                 'sub'      => $sub
                ];

        $this->M_prospektus->simpan_ubah_judul($data, array('id_judul' => $id_judul));

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-warning alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Diubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        echo json_encode(array('status' => true));
    }

    // proses hapus judul 
    public function hapus_judul($id_judul)
    {
        $this->M_prospektus->hapus_judul($id_judul);

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Dihapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        echo json_encode(array('status' => true));
    }

    /******************************************************************/
    /*                                                                */
    /*                         DATA Dokumen                           */
    /*                                                                */
    /******************************************************************/

    // menampilkan halaman tambah dokumen
    public function tambah_dok()
    {
        $id_pros = $this->uri->segment(3);

        $data = ['aktif'    => 'prospektus',
                 'id_pros'  => $id_pros
                ];

        $this->template->load('template', 'prospektus/V_tambah_dok', $data);
    }

    // proses simpan dokumen
    public function simpan_dok()
    {
        $judul      = $this->input->post('judul');
        $dok        = $this->input->post('dok');
        $id_pros    = $this->input->post('id_pros');

        $config['upload_path']      = './dokumen/';
        $config['allowed_types']    = 'pdf';
        $config['max_size']         = 2048;
        $config['encrypt_name']     = FALSE;
 
        $this->upload->initialize($config);

        $jml_foto = count($_FILES['dok']['name']);

        for ($i = 0; $i < $jml_foto; $i++) {

            $_FILES['dok[]']['name']       = $_FILES['dok']['name'][$i];
            $_FILES['dok[]']['type']       = $_FILES['dok']['type'][$i];
            $_FILES['dok[]']['tmp_name']   = $_FILES['dok']['tmp_name'][$i];
            $_FILES['dok[]']['error']      = $_FILES['dok']['error'][$i];
            $_FILES['dok[]']['size']       = $_FILES['dok']['size'][$i];

            $this->upload->do_upload('dok[]');

            $dk         = $this->upload->data();
            $dokumen    = $dk['file_name'];

            $data = ['id_prospektus'    => $id_pros,
                     'judul'            => $judul[$i],
                     'dokumen'          => base64_encode($dokumen)
                    ];

            $this->M_prospektus->simpan_data_dok($data);

        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Disimpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        redirect("prospektus/detail/$id_pros/x");

    }

    // menampilkan pdf
    public function tampil_pdf()
    {
        $nama = $this->uri->segment(3);

        $data = ['nama_dok' => $nama];

        $this->load->view('prospektus/V_dokumen', $data);
    }

    /******************************************************************/
    /*                                                                */
    /*                       DATA Resources                           */
    /*                                                                */
    /******************************************************************/

    // menampilkan halaman resources
    public function tambah_resources()
    {
        $id_pros = $this->uri->segment(3);

        $data = ['id_pros'      => $id_pros,
                 'aktif'        => 'prospektus',
                 'data_gambar'  => $this->M_prospektus->get_file_foto()
                ];

        $this->template->load('template', 'prospektus/V_tambah_res', $data);

    }

    // proses simpan resources
    public function simpan_res()
    {
        $id_pros = $this->input->post('id_pros');
        $judul   = $this->input->post('judul');
        $isi_res = $this->input->post('isi_res');

        $data = ['id_prospektus'    => $id_pros,
                 'judul'            => $judul,
                 'isi'              => $isi_res
                 ];        

        $this->M_prospektus->simpan_data_res('resources',$data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Disimpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        redirect("prospektus/detail/$id_pros/x");
    }

    // menampilkan data res sesuai id_prospektus
    public function tampil_res()
    {
        $id_res  = $this->uri->segment(3);
        $id_pros = $this->uri->segment(4);

        $where = ['id_resources' => $id_res];

        $data = [ 'data_res'    => $this->M_prospektus->get_res_id_pros('resources',$where)->row_array(),
                  'aktif'       => 'prospektus',
                  'id_pros'     => $id_pros
                ];

        $this->template->load('template','prospektus/Tampil_res', $data);
    }

    /******************************************************************/
    /*                                                                */
    /*                    DATA UBAH D E T A I L                       */
    /*                                                                */
    /******************************************************************/

    // proses hapus gambar detail
    public function hapus_gambar_detail()
    {
        $id_det_pros    = $this->uri->segment(3);
        $id_pros        = $this->uri->segment(4);
        $sub            = $this->uri->segment(5);

        $id = $this->input->post('hapus');

        $jml = count($id);

        for ($i = 0; $i < $jml; $i++) {
            
            $nama_gbr = $this->M_prospektus->get_nama_gbr('file_foto', array('id_file_foto' => $id[$i]))->row_array();

            unlink("assets/gambar/".base64_decode($nama_gbr['file_foto']));

            $this->M_prospektus->hapus_gbr_detail('file_foto', array('id_file_foto' => $id[$i]));

        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Dihapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        if ($id_det_pros == 'kosong') {
            redirect("prospektus/tampil_form_tambah/$id_pros/detail");
        } elseif ($id_det_pros == 'res') {
             redirect("prospektus/tambah_resources/$id_pros");
        } else {
            if (!empty($sub)) {
                redirect("prospektus/tampil_form_tambah_sub/$id_det_pros/$id_pros/detail");
            } else {
                redirect("prospektus/edit_judul_detail/$id_det_pros/$id_pros/");
            }
            
        }

        

    }

    // simpan gambar detail
    public function simpan_gambar_detail()
    {
        $sub = $this->uri->segment(3);

        $id_pros            = $this->input->post('id_pros');
        $id_det_pros        = $this->input->post('id_det_pros');

        $config['upload_path']      = './assets/gambar';
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
        $config['max_size']         = 2048;
        $config['encrypt_name']     = FALSE;
 
        $this->upload->initialize($config);

        $jml_foto = count($_FILES['gambar']['name']);

        for ($i = 0; $i < $jml_foto; $i++) {

            $_FILES['gambar[]']['name']       = $_FILES['gambar']['name'][$i];
            $_FILES['gambar[]']['type']       = $_FILES['gambar']['type'][$i];
            $_FILES['gambar[]']['tmp_name']   = $_FILES['gambar']['tmp_name'][$i];
            $_FILES['gambar[]']['error']      = $_FILES['gambar']['error'][$i];
            $_FILES['gambar[]']['size']       = $_FILES['gambar']['size'][$i];

            $this->upload->do_upload('gambar[]');

            $gb        = $this->upload->data();
            $gambar    = $gb['file_name'];

            $data = [
                     'file_foto'    => base64_encode($gambar),
                     'keterangan'   => 'gambar_detail'
                    ];

            $this->M_prospektus->simpan_gbr_detail($data);

        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Disimpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        if (empty($id_det_pros)) {
            redirect("prospektus/tampil_form_tambah/$id_pros/detail");
        } elseif ($id_det_pros == 'res') {
             redirect("prospektus/tambah_resources/$id_pros");
        } else {
            if (!empty($sub)) {
                redirect("prospektus/tampil_form_tambah_sub/$id_det_pros/$id_pros/detail");
            } else {
                redirect("prospektus/edit_judul_detail/$id_det_pros/$id_pros/");
            }
        }
        
    }

    /* menampilkan edit judul detail */
    public function edit_judul_detail()
    {
        $id_det_pros = $this->uri->segment(3);
        $id_pros     = $this->uri->segment(4);

        $this->load->library('pagination');

        $jumlah_data = $this->M_prospektus->get_jml_record_file_foto();

        $config['base_url']         = base_url('prospektus/edit_judul_detail/'.$id_det_pros.'/'.$id_pros);
        $config['total_rows']       = $jumlah_data;
        $config['per_page']         = 12;
        $config['uri_segment']      = 5;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center mt-20"><nav class="pagination-wrap d-inline-block" aria-label="Page navigation example"><ul class="pagination custom-pagination pagination-rounded">';
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

        $page                       = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        /*$data['page']               = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $data['pagination']         = $this->pagination->create_links();*/

        $data['aktif']            = 'prospektus';
        $data['data_detail']      = $this->M_prospektus->get_edit_detail($id_det_pros)->row_array();
        $data['id_pros']          = $id_pros;
        $data['id_det_pros']      = $id_det_pros;
        $data['sub_detail']       = $this->M_prospektus->get_edit_sub_detail($id_det_pros);
                 //'data_gambar'  => $this->M_prospektus->get_file_foto()
        $data['page']             = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $data['pagination']       = $this->pagination->create_links();
        //$data['data_gambar']      = $this->M_prospektus->get_record_file_foto($page,$config['per_page']);
        $data['data_gambar']      = $this->M_prospektus->get_file_foto();

        $this->template->load('template', 'prospektus/V_ubah_judul_detail', $data);
    }

    // memproses simpan ubah judul
    public function simpan_ubah_judul_det()
    {
        $id_pros    = $this->input->post('id_pros');

        $id_det     = $this->input->post('id_det');
        $isi        = $this->input->post('isi');

        $data = [ 'isi'  => $isi ];

        $this->M_prospektus->ubah_judul_detail($data, array('id_detail_pros' => $id_det));

        $id_sub     = $this->input->post('id_sub');
        $sub_isi    = $this->input->post('sub_isi');

        $jml_isi = count($sub_isi);

        for ($i = 0; $i < $jml_isi ; $i++) {

            $where  = array("id_sub_detail_pros" => $id_sub[$i]);

            $data   = array("sub_isi" => $sub_isi[$i]);

            $this->M_prospektus->ubah_subjudul_detail($data, $where);
        }

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Disimpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        redirect("prospektus/detail/$id_pros/x");

    }

    // menampilkan data title prospektus
    public function ambil_title_pros($id_pros)
    {
        $hasil = $this->M_prospektus->get_title_pros('prospektus',array('id_prospektus' => $id_pros))->row();

        echo json_encode($hasil);
    }

    // menyimpan data title prospektus
    public function simpan_title_pros()
    {
        $id_pros = $this->input->post('id_pros');
        $title   = $this->input->post('title');

        $data = ['title' => $title];

        $this->M_prospektus->simpan_pros_title('prospektus', $data, array('id_prospektus' => $id_pros));

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Disimpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

        echo json_encode(array('status' => true));
    }

    /******************************************************************/
    /*                                                                */
    /*                      DATA Kontributor                          */
    /*                                                                */
    /******************************************************************/

    // menampilkan halaman awal Kontributor
    public function kontributor()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');

        $cek         = $this->M_prospektus->cek_id_pengguna($id_pengguna)->num_rows();

        $jumlah_data = $this->M_prospektus->cari_id_blok_con($id_pengguna, $limit=0, $start=0)->num_rows();

        $config['base_url']         = base_url("prospektus/kontributor/");
        $config['total_rows']       = $jumlah_data;
        $config['per_page']         = 3;
        $config['uri_segment']      = 3;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center mt-20"><nav class="pagination-wrap d-inline-block" aria-label="Page navigation example"><ul class="pagination custom-pagination pagination-rounded">';
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

        $data['aktif']              = 'prospektus';
        $data['page']               = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['data_blok']          = $this->M_prospektus->cari_id_blok_con($id_pengguna, $config['per_page'], $data['page']);
        $data['pagination']         = $this->pagination->create_links();
        $data['cek_pengguna']       = $cek;
        $data['kawasan']            = $this->M_prospektus->get_data_kawasan()->result_array();

        $this->template->load('template', 'kontributor/V_prospektus', $data);
    }

    // membuat project
    public function buat_project($id = null, $buat = "kawasan")
    {
        $array = array(
            'sess_buat' => $buat,
            'id'        => $id
        );
        
        $this->session->set_userdata( $array );

        $nama_kws  = $this->M_prospektus->cari_id_kawasan($id)->row_array();

        $nama_blok = $this->M_prospektus->cari_id_blok($id)->row_array(); 

        $nama_unit = $this->M_prospektus->cari_id_unit_con($id)->row_array();

        $data = array(  'nama_kws'      => $nama_kws['nama_kawasan'],
                        'nama_blok'     => $nama_blok['nama_blok'],
                        'nama_unit'     => $nama_unit['nama_unit'],
                        'harga'         => $nama_unit['harga'],
                        'id_pengguna'   => $this->session->userdata('id_pengguna'),
                        'aktif'         => 'prospektus'
                    );  

        $this->template->load('template', 'kontributor/V_buat_project', $data);
    }

    // menyimpan kawasan
    public function simpan_kawasan_con()
    {
        $nama   = $this->input->post('nama');
        $alamat = $this->input->post('alamat');

        $data = ['nama_kawasan' => $nama,
                 'alamat'       => $alamat
                ];

        $this->db->insert('kawasan', $data);

        $id_kws = $this->db->insert_id();

        redirect("prospektus/buat_project/$id_kws/blok");

    }

    // menyimpan blok
    public function simpan_blok_con()
    {
        $id_kws = $this->input->post('id_kws');
        $nama   = $this->input->post('nama');
        $unit   = $this->input->post('unit');

        $config['upload_path']      = './assets/gambar/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
        $config['max_size']         = 2048;
        $config['encrypt_name']     = FALSE;
 
        $this->upload->initialize($config);

        $this->upload->do_upload('foto');

        $g      = $this->upload->data();
        $foto   = $g['file_name'];

        if (!empty($_FILES['foto']['name'])) {
            $data   = [ 'nama_blok'     => $nama,
                        'id_kawasan'    => $id_kws,
                        'gambar'        => base64_encode($foto),
                        'jumlah_unit'   => $unit,
                        'keterangan'    => 'kontributor' 
                      ];
        } else {

            $data   = [ 'nama_blok'     => $nama,
                        'id_kawasan'    => $id_kws,
                        'gambar'        => base64_encode("no_image.jpg"),
                        'jumlah_unit'   => $unit,
                        'keterangan'    => 'kontributor' 
                      ];
        }
        
        $this->db->insert('blok', $data);

        $id_blok = $this->db->insert_id();

        redirect("prospektus/buat_project/$id_blok/unit");
    }

    // menyimpan unit
    public function simpan_unit_con()
    {
        $id_blok = $this->input->post('id_blok');
        $nama    = $this->input->post('nama');
        $harga   = $this->input->post('harga');

        $data = ['nama_unit'    => $nama,
                 'harga'        => $harga,
                 'id_blok'      => $id_blok
                ];

        $this->db->insert('unit', $data);

        $id_unit = $this->db->insert_id();

        redirect("prospektus/buat_project/$id_unit/prospektus");
    }

    // menyimpan prospektus
    public function simpan_pros_con()
    {
        $id_pengguna    = $this->input->post('id_pengguna');
        $id_unit        = $this->input->post('id_unit');
        $target         = $this->input->post('target');
        $lokasi         = $this->input->post('lokasi');
        $ket            = $this->input->post('ket');
        $periode        = $this->input->post('periode');
        $invest_min     = $this->input->post('invest_min');
        $jml_lot        = $this->input->post('jml_lot');

        $data = array(
                    'id_pengguna'       => $id_pengguna,
                    'target_investor'   => $target,
                    'unit'              => $id_unit,
                    'jumlah_lot'        => $jml_lot,
                    'minimal_investasi' => $invest_min,
                    'alamat'            => $lokasi,
                    'keterangan'        => $ket,
                    'periode_investasi' => $periode
                    );

        $this->db->insert('prospektus', $data);

        $id_pros = $this->db->insert_id();

        $config['upload_path']      = './assets/gambar/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
        $config['max_size']         = 2048;
        $config['encrypt_name']     = FALSE;
 
        $this->upload->initialize($config);

        if (!empty($_FILES['foto_thumb']['name']) || !empty($_FILES['foto']['name']))
        {
            $this->upload->do_upload('foto_thumb');

            $gbr    = $this->upload->data();
            $gambar = $gbr['file_name']; 


            if (!empty($_FILES['foto_thumb']['name'])) {
                $d = array( 'file_foto'      => base64_encode($gambar),
                            'thumbnail'      => 1,
                            'keterangan'     => "kontributor",
                            'id_prospektus'  => $id_pros);
            } else {
                $d = array( 'file_foto'      => base64_encode("no_image.jpg"),
                            'thumbnail'      => 1,
                            'keterangan'     => "kontributor",
                            'id_prospektus'  => $id_pros);
            }

            $this->M_prospektus->simpan_upload($d);

            
            $jml_foto = count($_FILES['foto']['name']);

            for ($i = 0; $i < $jml_foto; $i++) {

                $_FILES['foto[]']['name']       = $_FILES['foto']['name'][$i];
                $_FILES['foto[]']['type']       = $_FILES['foto']['type'][$i];
                $_FILES['foto[]']['tmp_name']   = $_FILES['foto']['tmp_name'][$i];
                $_FILES['foto[]']['error']      = $_FILES['foto']['error'][$i];
                $_FILES['foto[]']['size']       = $_FILES['foto']['size'][$i];

                $this->upload->do_upload('foto[]');

                $gbr_pro        = $this->upload->data();
                $gambar_pro     = $gbr_pro['file_name'];


                if (!empty($_FILES['foto[]']['name'])) {
                    $e = array('file_foto'      => base64_encode($gambar_pro),
                               'thumbnail'      => 0,
                               'keterangan'     => "kontributor",
                               'id_prospektus'  => $id_pros);

                    $this->M_prospektus->simpan_upload($e);
                }
                
            }

        }

        redirect("prospektus/detail/$id_pros/x");


    }

    // merubah status prospektus, jika tekan kirim
    public function ubah_status_pros_con()
    {
        $id_pros = $this->uri->segment(3);

        $data = ['status' => 3];

        $this->M_prospektus->proses_ubah_status_con($data, array('id_prospektus' => $id_pros));

        $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-info alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Dikirim
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');


        redirect("prospektus/detail/$id_pros/x");
    }
  
    /******************************************************************/
    /*                                                                */
    /*              Approve Prospektus Kontributor                    */
    /*                                                                */
    /******************************************************************/

    // menampilkan data approve prospektus kontributor
    public function approve_pros()
    {
        $data = [ 'aktif'       => 'approve_pros',
                  'data_pros'   => $this->M_prospektus->get_data_pros_con()->result_array(),

                ];

        $this->template->load('template', 'kontributor/V_approve_pros', $data);
    }

    // merubah status prospektus dari approve manager
    public function ubah_status_pros()
    {
        $st      = $this->uri->segment(3);
        $id_pros = $this->uri->segment(4);

        $data = ['status' => $st];

        $this->M_prospektus->proses_ubah_status_pros($data, array('id_prospektus' => $id_pros));

        // ubah keterangan pada tabel blok menjadi null
        $hasil_id_blok = $this->M_prospektus->ambil_id_blok($id_pros)->row_array();

        if ($st == 1) {

            $data2 = ['keterangan' => null];

            $this->M_prospektus->proses_ubah_ket_blok($data2, $hasil_id_blok['id_blok']);

        } elseif ($st == 2) {

            $data2 = ['keterangan' => 'kontributor'];

            $this->M_prospektus->proses_ubah_ket_blok($data2, $hasil_id_blok['id_blok']);
        }

        redirect('prospektus/approve_pros');
    }

}
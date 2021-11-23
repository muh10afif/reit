<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('M_data'));
		$this->load->library('upload');
	}

	// tampilan awal halaman pengguna
	public function index()
	{
		$data = ['aktif' 		 => 'pengguna',
				 'data_pengguna' => $this->M_data->get_data_pengguna()
				];

		$this->template->load('template','pengguna/V_tampil_data', $data);
	}

	// proses hapus pengguna
	public function hapus_pengguna()
	{
		$id_pengguna = $this->input->post('id_pengguna');

		$jml = count($id_pengguna);

		if ($jml == 0) {
			
			$this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Pilih checkbox yang akan dihapus!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

		} else {

			for ($i = 0; $i < $jml; $i++) {
				$cek_id = $this->M_data->cek_id_pengguna('detail_profil',array('id_pengguna' => $id_pengguna[$i]))->num_rows();

				if ($cek_id != 0) {
					$this->M_data->hapus_detail_prof('detail_profil', array('id_pengguna' => $id_pengguna[$i]));
					$this->M_data->hapus_id_pengguna('pengguna',array('id_pengguna' => $id_pengguna[$i]));
				} else {
					$this->M_data->hapus_id_pengguna('pengguna',array('id_pengguna' => $id_pengguna[$i]));
				}
			}

			$this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Dihapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');
		}

		redirect('pengguna');
	}

	// menampilkan halaman tambah data pengguna
	public function aksi_data()
	{
		$aksi 		 = $this->uri->segment(3);
		$id_pengguna = $this->uri->segment(4);

		$data = ['aktif'		=> 'pengguna',
				 'level'		=> $this->M_data->get_data_level(),
				 'aksi' 		=> $aksi,
				 'd_provinsi'	=> $this->M_data->get_provinsi(),
				 'd_kota'		=> $this->M_data->get_kota(),
				 'd_kecamatan'	=> $this->M_data->get_kecamatan(),
				 'd_kelurahan'	=> $this->M_data->get_kelurahan(),
				 'profil' 		=> $this->uri->segment(5)
				];

		if ($aksi != 'tambah') {
			$data['d_pengguna'] = $this->M_data->get_data_id_pengguna($id_pengguna)->row_array();
			$data['selected'] 	= $this->M_data->get_data_profil($id_pengguna)->row_array();
		}
		
		$this->template->load('template', 'pengguna/V_form', $data);
	}

	// proses menyimpan tambah data pengguna
	public function simpan_data_pengguna()
	{
		$aksi 			= $this->uri->segment(3);
		$profil 		= $this->uri->segment(4);

		$id_pengguna 	= $this->input->post('id_pengguna');
		$foto_awal 		= $this->input->post('ft');

		$nama_pengguna  = $this->input->post('nama_pengguna');
		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password');
		$email 			= $this->input->post('email');
		$level 			= $this->input->post('level');
		$status 		= $this->input->post('status');
		$nik 			= $this->input->post('nik');
		$sid 			= $this->input->post('sid');
		$tmp_lahir 		= $this->input->post('tempat_lahir');
		$tgl_lahir 		= $this->input->post('tgl_lahir');
		$alamat 		= $this->input->post('alamat');
		$provinsi 		= $this->input->post('provinsi');
		$kota 			= $this->input->post('kota');
		$kecamatan 		= $this->input->post('kecamatan');
		$kelurahan 		= $this->input->post('kelurahan');

		if ($profil) {
			
			$this->session->set_userdata('nama', $nama_pengguna);

			$nama = $this->M_data->cari_level('level', array('id_level' => $level))->row_array();

			$this->session->set_userdata('level', $nama['level']);

		}

		

		if ($tgl_lahir != null) {
			$tgl_lahir 	= nice_date($tgl_lahir, 'Y-d-m');
		} else {
			$tgl_lahir 	= null;
		}

		$data_p = ['nama_pengguna' 	=> $nama_pengguna,
				   'username' 		=> $username,
				   'level' 			=> $level,
				   'email' 			=> $email,
				   'aktif'			=> $status
				  ];

		if ($password != null) {
			$data_p['password'] = password_hash($password, PASSWORD_DEFAULT);
		}

		if ($aksi == 'tambah') {
			$id_pengguna = $this->M_data->simpan_pengguna('pengguna', $data_p);
		} else {
			$this->M_data->ubah_pengguna(array('id_pengguna' => $id_pengguna), $data_p);
		}

		$config['upload_path']      = './assets/foto_profil/';
        $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
        $config['max_size']         = 2048;
        $config['encrypt_name']     = FALSE;
 
        $this->upload->initialize($config);

        $this->upload->do_upload('foto');

        $a 	= $this->upload->data();
        $ft = $a['file_name'];

        $foto 	= base64_encode($ft);

        $foto_1 = base64_encode($foto_awal);

        if (!empty($_FILES['foto']['name'])) {
        	if ($aksi != 'tambah') {

        		if ($foto_awal != $ft) {

        			unlink("assets/foto_profil/".$foto_awal);

	        		$data_dp = ['nik' 				=> $nik,
								'sid' 				=> $sid,
								'tempat_lahir' 		=> $tmp_lahir,
								'tanggal_lahir'		=> $tgl_lahir,
								'alamat'			=> $alamat,
								'provinsi'			=> $provinsi,
								'kota' 				=> $kota,
								'kecamatan'			=> $kecamatan,
								'kelurahan'			=> $kelurahan,
								'id_pengguna'		=> $id_pengguna,
								'foto' 				=> $foto
								];

					if ($profil) {
						$this->session->set_userdata('foto', $foto);
					}
					
	        	} else {
	        		$data_dp = ['nik' 				=> $nik,
								'sid' 				=> $sid,
								'tempat_lahir' 		=> $tmp_lahir,
								'tanggal_lahir'		=> $tgl_lahir,
								'alamat'			=> $alamat,
								'provinsi'			=> $provinsi,
								'kota' 				=> $kota,
								'kecamatan'			=> $kecamatan,
								'kelurahan'			=> $kelurahan,
								'id_pengguna'		=> $id_pengguna,
								'foto' 				=> $foto_1
								];

					if ($profil) {
						$this->session->set_userdata('foto', $foto_1);
					}

	        	}
        	} else {
        		$data_dp = ['nik' 				=> $nik,
							'sid' 				=> $sid,
							'tempat_lahir' 		=> $tmp_lahir,
							'tanggal_lahir'		=> $tgl_lahir,
							'alamat'			=> $alamat,
							'provinsi'			=> $provinsi,
							'kota' 				=> $kota,
							'kecamatan'			=> $kecamatan,
							'kelurahan'			=> $kelurahan,
							'id_pengguna'		=> $id_pengguna,
							'foto' 				=> $foto
							];

				if ($profil) {
					$this->session->set_userdata('foto', $foto);
				}

        	}
        	
        	
        } else {
        	if ($aksi != 'tambah') {
        		$data_dp = ['nik' 				=> $nik,
							'sid' 				=> $sid,
							'tempat_lahir' 		=> $tmp_lahir,
							'tanggal_lahir'		=> $tgl_lahir,
							'alamat'			=> $alamat,
							'provinsi'			=> $provinsi,
							'kota' 				=> $kota,
							'kecamatan'			=> $kecamatan,
							'kelurahan'			=> $kelurahan,
							'id_pengguna'		=> $id_pengguna,
							'foto' 				=> $foto_1
							];

				if ($profil) {
					$this->session->set_userdata('foto', $foto_1);
				}

        	} else {
	    		$data_dp = ['nik' 				=> $nik,
							'sid' 				=> $sid,
							'tempat_lahir' 		=> $tmp_lahir,
							'tanggal_lahir'		=> $tgl_lahir,
							'alamat'			=> $alamat,
							'provinsi'			=> $provinsi,
							'kota' 				=> $kota,
							'kecamatan'			=> $kecamatan,
							'kelurahan'			=> $kelurahan,
							'id_pengguna'		=> $id_pengguna,
							'foto' 				=> ""
							];

				if ($profil) {
					$this->session->set_userdata('foto', "");
				}
        	}
        	
        }

		if ($aksi == 'tambah') {
			$this->M_data->simpan_detail_profil('detail_profil', $data_dp);
		} else {
			$cek_id = $this->M_data->cek_id_pengguna('detail_profil', array('id_pengguna' => $id_pengguna))->num_rows();

    		if ($cek_id != 0) {
    			$this->M_data->ubah_detail_profil(array('id_pengguna' => $id_pengguna), $data_dp);
    		} else {
    			$this->M_data->simpan_detail_profil('detail_profil', $data_dp);
    		}

		}
		

		$this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
                Data Sukses Disimpan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');

		if ($aksi == 'tambah') {
			redirect('pengguna');
		} else {
			if ($profil) {
				redirect('pengguna/aksi_data/edit/'.$id_pengguna.'/profil');
			} else {
				redirect('pengguna/aksi_data/edit/'.$id_pengguna);
			}
			
		}
		
	}

	# =============================================
	# =           Halaman Profil Akun     	      =
	# =============================================
	
	// menampilkan halaman profil
	public function profil()
	{
		$id_pengguna = $this->session->userdata('id_pengguna');

		$dt = $this->M_data->get_data_id_pengguna($id_pengguna)->row_array();

		$data = ['aktif' 		=> '-',
				 'd_pengguna'	=> $dt,
				 'provinsi' 	=> $this->M_data->cari_provinsi($dt['provinsi'])->row_array(),
				 'kota'			=> $this->M_data->cari_kota($dt['kota'])->row_array(),
				 'kecamatan'	=> $this->M_data->cari_kecamatan($dt['kecamatan'])->row_array(),
				 'kelurahan'	=> $this->M_data->cari_kelurahan($dt['kelurahan'])->row_array()
				];

		$this->template->load('template', 'pengguna/V_profil', $data);
	}
	
	# ======  End of Halaman Profil Akun  =======
	

}

/* End of file Pengguna.php */
/* Location: ./application/controllers/Pengguna.php */
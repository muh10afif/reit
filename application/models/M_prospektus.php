<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_prospektus extends CI_Model {

    // edit data
    public function edit_data($tabel, $data, $where)
    {
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }

    // tampil edit data
    public function get_data_edit($tabel, $where)
    {
        return $this->db->get_where($tabel, $where);
        
    }

    // cari id_detail_invest
    public function cari_id_det_invest($id_det)
    {
        return $this->db->get_where('detail_investasi', array('id_detail_investasi' => $id_det));        
    }

    // input data pengguna
    public function input_pengguna($data)
    {
        $this->db->insert('detail_profil', $data);
    }

    // update data pengguna
    public function ubah_detail_pengguna($id_pengguna, $data)
    {
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->update('detail_profil', $data);
    }

    // cari pengguna
    public function cari_pengguna($id_pengguna)
    {
        $this->db->from('detail_profil');
        $this->db->where('id_pengguna', $id_pengguna);

        return $this->db->get();
    }

    // get data pengguna
    public function get_data_pengguna($id_pengguna)
    {
        $this->db->from('detail_profil as d');
        $this->db->join('pengguna as p', 'p.id_pengguna = d.id_pengguna', 'left');
        $this->db->where('d.id_pengguna', $id_pengguna);

        return $this->db->get()->row_array();
    }

    // cek kode transaksi dan id_pros
    public function cek_kode_pros($id_pros, $kode)
    {
        return $this->db->get_where('tr_investor', array('id_prospektus' => $id_pros, 'kode_transaksi' => $kode));
    }

    /////////////// 02/07/2019 /////////////////////////////

    // cek pengguna prospektus
    public function cek_pengguna_prospektus($id_pros, $id_pengguna)
    {
        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->where('id_prospektus', $id_pros);
        
        return $this->db->get('tr_investor');
    }

    // proses update bank
    public function simpan_bank($data, $kd_tr)
    {
        $this->db->where('kode_transaksi', $kd_tr);
        $this->db->update('tr_transfer', $data);
    }

    // proses simpan tr_transfer
    public function proses_simpan_tr_transfer($data)
    {
        $this->db->insert('tr_transfer', $data);
    }

    // cari kd_tr
    public function cari_kd_tr($kd_tr)
    {
        return $this->db->get_where('tr_transfer', array('kode_transaksi' => $kd_tr));
    }

    // cari max kode transaksi
    public function cari_kd_transaksi($today)
    {
        $this->db->select('max(kode_transaksi) as kd_transaksi');
        $this->db->from('tr_investor');
        $this->db->like('kode_transaksi', $today, 'after');

        return $this->db->get();
    }

    // cari id_prospektus
    public function cari_id_prospektus($id_pros)
    {
        $this->db->from('prospektus as p');
        $this->db->join('unit as u', 'p.unit = u.id_unit', 'inner');
        $this->db->join('blok as b', 'b.id_blok = u.id_blok', 'inner');
        $this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');
        $this->db->where('p.id_prospektus', $id_pros);

        return $this->db->get();
    }

    // cari foto pd file_foto
    public function cari_id_foto($id_pros)
    {
        $this->db->from('file_foto as f');
        $this->db->where('f.id_prospektus', $id_pros);
        $this->db->where('f.thumbnail', 1);

        return $this->db->get();
    }

    // simpan tr_investor
    public function proses_simpan_tr_investor($data)
    {
        $this->db->insert('tr_investor', $data);
    }


	/******************************************************************/
    /*                                                                */
    /*                 		DATA Approve Prospektus           	      */
    /*                                                                */
    /******************************************************************/

    // proses menyimpan ubah status
    public function proses_ubah_status_pros($data, $where)
    {
    	$this->db->where($where);
    	$this->db->update('prospektus', $data);
    }

    // menampilkan data status pada prospektus
    public function get_data_pros_con()
    {
    	$this->db->select('p.add_time, n.nama_pengguna, p.id_prospektus, p.status');
    	$this->db->from('prospektus as p');
    	$this->db->join('pengguna as n', 'n.id_pengguna = p.id_pengguna', 'inner');
    	$this->db->where('p.status !=', null);
    	$this->db->order_by('p.add_time', 'desc');

    	return $this->db->get();
    }

    // mengubah keterangan pada tabel blok menjadi null
    public function proses_ubah_ket_blok($data, $id_blok)
    {
        $this->db->where('id_blok', $id_blok);
        $this->db->update('blok', $data);
    }

    // mengambil id_blok
    public function ambil_id_blok($id_pros)
    {
        $this->db->select('b.id_blok');
        $this->db->from('prospektus as p');
        $this->db->join('unit as u', 'u.id_unit = p.unit', 'inner');
        $this->db->join('blok as b', 'b.id_blok = u.id_blok', 'inner');
        $this->db->where('p.id_prospektus', $id_pros);

        return $this->db->get();
    }

    /******************************************************************/
    /*                                                                */
    /*                  		KONTRIBUTOR 	                      */
    /*                                                                */
    /******************************************************************/

    // mengubah status prospektus saat kirim
    public function proses_ubah_status_con($data, $where)
    {
    	$this->db->where($where);
    	$this->db->update('prospektus', $data);
    }

    // mencari id_pengguna
    public function cek_id_pengguna($id_pengguna)
    {
    	return $this->db->get_where('prospektus', array('id_pengguna' => $id_pengguna));
    }

	// mencari id_pros
	public function cari_id_blok_con($id_pengguna, $limit, $start)
	{
		$this->db->select('k.nama_kawasan, b.nama_blok, b.gambar, b.add_time, b.jumlah_unit, k.alamat, b.id_blok');
		$this->db->from('blok as b');
		$this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');
		$this->db->join('unit as u', 'u.id_blok = b.id_blok', 'inner');
		$this->db->join('prospektus as p', 'p.unit = u.id_unit', 'inner');
		$this->db->limit($limit,$start);
		$this->db->where('p.id_pengguna', $id_pengguna);
		$this->db->order_by('b.nama_blok', 'asc');

		return $this->db->get();
	}
	// mencari id_pros
	public function cari_id_blok_con_jml($id_pengguna)
	{
		$this->db->select('k.nama_kawasan, b.nama_blok, b.gambar, b.add_time, b.jumlah_unit, k.alamat, b.id_blok');
		$this->db->from('blok as b');
		$this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');
		$this->db->join('unit as u', 'u.id_blok = b.id_blok', 'inner');
		$this->db->join('prospektus as p', 'p.unit = u.id_unit', 'inner');
		$this->db->where('p.id_pengguna', $id_pengguna);
		$this->db->order_by('b.nama_blok', 'asc');

		return $this->db->get();
	}

	// mencari nama unit
	public function cari_id_unit_con($id_unit)
	{
		return $this->db->get_where('unit', array('id_unit' => $id_unit));
	}

	// mencari nama blok
	public function cari_id_blok($id_blok)
	{
		return $this->db->get_where('blok', array('id_blok' => $id_blok));
	}

	// mencari nama kawasan
	public function cari_id_kawasan($id_kws)
	{
		return $this->db->get_where('kawasan', array('id_kawasan' => $id_kws));
	}

	// menampilkan data title
	public function get_title_pros($tabel, $where)
	{
		return $this->db->get_where($tabel, $where);
	}

	// menyimpan data title prospektus
	public function simpan_pros_title($tabel, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($tabel, $data);
	}

	/******************************************************************/
    /*                                                                */
    /*                  		DATA Resources 	                      */
    /*                                                                */
    /******************************************************************/

    // proses simpan tambah data resources
    public function simpan_data_res($tabel, $data)
    {
    	$this->db->insert($tabel, $data);
    }

    // menampilkan data resources sesuai id_prospektus
    public function get_data_res($id_prospektus)
    {
    	return $this->db->get_where('resources', array('id_prospektus' => $id_prospektus));
    }

    // menampilkan data resources sesuai id_resources
    public function get_res_id_pros($tabel, $where)
    {
    	return $this->db->get_where($tabel, $where);
    }

    /******************************************************************/
    /*                                                                */
    /*                  		DATA Dokumen 	                      */
    /*                                                                */
    /******************************************************************/

	// proses simpan tambah data dokumen
	public function simpan_data_dok($data)
	{
		$this->db->insert('file_dok', $data);
	}

	// menampilkan data dokumen sesuai id_prospektus
	public function get_data_dok($id_prospektus)
	{
		return $this->db->get_where('file_dok', array('id_prospektus' => $id_prospektus));
    }
    
    // proses hapus
    public function hapus_data($tabel, $where)
    {
        $this->db->where($where);
        $this->db->delete($tabel);
    }

	/******************************************************************/
    /*                                                                */
    /*                  		DATA D E T A I L                      */
    /*                                                                */
    /******************************************************************/

    // menghapus sub judul detail
    public function proses_hapus_sub_judul_det($tabel, $where)
    {
        $this->db->where($where);
        $this->db->delete($tabel);
    }

    // menghapus judul detail
    public function proses_hapus_judul_det($tabel, $where)
    {
        $this->db->where($where);
        $this->db->delete($tabel);
    }
    
    // menampilkan data file foto
    public function get_record_file_foto($rowno, $rowperpage)
    {
    	$this->db->select('*');
    	$this->db->from('file_foto');
    	$this->db->limit($rowperpage, $rowno);
    	//$this->db->order_by('add_time', 'desc');

    	$hasil = $this->db->get();

    	$value = array();

    	foreach ($hasil->result_array() as $h) {
    		if (base64_decode($h['file_foto']) == "no_image.jpg") {
    			unset($hasil);
    		} else {
    			$nama_file 		= base64_decode($h['file_foto']);
    			$id_file_foto 	= $h['id_file_foto'];

    			$value[] = ['file_foto' 	=> $nama_file,
	    					'id_file_foto'	=> $id_file_foto
	    				   ];
    		}

    	}

    	return $value;
    }

    // menghitung record file_foto kecuali foto no_image.jpg
    public function get_jml_record_file_foto()
    {
    	$hasil = $this->db->get('file_foto');

    	$value = array();

    	foreach ($hasil->result_array() as $h) {
    		if (base64_decode($h['file_foto']) == "no_image.jpg") {
    			unset($hasil);

    		} else {
    			$nama_file = base64_decode($h['file_foto']);

    			$value[] = ['file_foto' => $nama_file];
    		}

    	}

    	$jml = count($value);

    	return $jml;
    }

    // proses hapus gambar detail 
    public function hapus_gbr_detail($tabel, $where)
    {
    	$this->db->where($where);
    	$this->db->delete($tabel);
    }

    // proses ambil nama gambar
    public function get_nama_gbr($tabel, $where)
    {
    	$this->db->from($tabel);
    	$this->db->where($where);

    	return $this->db->get();
    }

    // simpan gambar detail
    public function simpan_gbr_detail($data)
    {
    	$this->db->insert('file_foto', $data);
    }

    // menampilkan data file foto
    public function get_file_foto()
    {
    	/*$this->db->order_by('add_time', 'desc');
    	return $this->db->get('file_foto');*/

    	$this->db->select('*');
    	$this->db->from('file_foto');
    	$this->db->order_by('add_time', 'desc');

    	$hasil = $this->db->get();

    	$value = array();

    	foreach ($hasil->result_array() as $h) {
    		if (base64_decode($h['file_foto']) == "no_image.jpg") {
    			unset($hasil);
    		} else {
    			$nama_file 		= base64_decode($h['file_foto']);
    			$id_file_foto 	= $h['id_file_foto'];

    			$value[] = ['file_foto' 	=> $nama_file,
	    					'id_file_foto'	=> $id_file_foto
	    				   ];
    		}

    	}

    	return $value;
    }

    // menampilkan file foto 2
    public function get_file_foto_2()
    {
        $hasil = $this->db->get_where('file_foto', array('keterangan' => 'gambar_detail'))->result_array();

        $value = array();
        
        foreach ($hasil as $h) {
            $nama_file 		= base64_decode($h['file_foto']);
    		$id_file_foto 	= $h['id_file_foto'];

    		$value[] = ['file_foto' 	=> $nama_file,
	    				'id_file_foto'	=> $id_file_foto
	    				];
        }

        return $value;
        
    }

    // menyimpan data judul detail
    public function ubah_judul_detail($data, $where)
    {
    	$this->db->where($where);
    	$this->db->update('detail_pros', $data);
    }

    // menyimpan data sub judul detail
    public function ubah_subjudul_detail($data, $where)
    {
    	$this->db->where($where);
    	$this->db->update('sub_detail_pros', $data);
    }

    // menampilkan edit data sub detail
    public function get_edit_sub_detail($id_det_pros)
    {
    	$this->db->from('sub_detail_pros as d');
    	$this->db->join('judul_detail as j', 'j.id_judul = d.id_sub_judul', 'inner');
    	$this->db->where('d.id_detail_pros', $id_det_pros);

    	return $this->db->get();
    }

    // menampilkan edit data detail
    public function get_edit_detail($id_det_pros)
    {
    	$this->db->from('detail_pros as d');
    	$this->db->join('judul_detail as j', 'j.id_judul = d.id_judul', 'inner');
    	$this->db->where('d.id_detail_pros', $id_det_pros);

    	return $this->db->get();
    }

    // hapus judul 
    public function hapus_judul($id_judul)
    {
    	$this->db->where('id_judul', $id_judul);
    	$this->db->delete('judul_detail');
    }

    // proses simpan ubah judul
    public function simpan_ubah_judul($data, $where)
    {
    	$this->db->where($where);
    	$this->db->update('judul_detail', $data);
    }

    // proses ambil data menurut id
    public function ambil_id_judul($tabel, $where)
    {
    	return $this->db->get_where($tabel, $where);
    }

    // proses simpan judul
    public function simpan_judul($tabel, $data)
    {
    	$this->db->insert($tabel, $data);
    }

    // ambil data judul
    public function ambil_data_judul()
    {
    	$this->db->select('*');
    	$this->db->from('judul_detail');
    	$this->db->order_by('sub', 'asc');
    	return $this->db->get();
    }

    // menampilkan sub detail
    public function get_sub_detail($id_detail_pros)
    {
    	$this->db->from('sub_detail_pros as s');
    	$this->db->join('judul_detail as j', 's.id_sub_judul = j.id_judul', 'inner');
    	$this->db->where('s.id_detail_pros', $id_detail_pros);

    	return $this->db->get();
    }

    // menampilkan data detail_pros
    public function ambil_judul_detail($id_prospektus)
    {
    	$this->db->from('detail_pros as d');
    	$this->db->join('judul_detail as j', 'j.id_judul = d.id_judul', 'inner');
    	$this->db->where('d.id_prospektus', $id_prospektus);
    	$this->db->order_by('d.id_detail_pros', 'asc');

    	return $this->db->get();
    }

	// menampilkan data judul
	public function get_data_judul($id_pros)
	{
		$this->db->from('detail_pros as d');
		$this->db->join('judul_detail as j', 'j.id_judul = d.id_judul', 'inner');
		$this->db->where('d.id_prospektus', $id_pros);

		return $this->db->get();
	}

	// menampilkan data sesuai id_prospektus
	public function get_data_id_pros($id_pros)
	{
		$this->db->from('prospektus as p');
		$this->db->join('unit as u', 'u.id_unit = p.unit', 'inner');
		$this->db->join('blok as b', 'b.id_blok = u.id_blok', 'inner');
		$this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');
		$this->db->where('p.id_prospektus', $id_pros);

		return $this->db->get();
	}

	// menampilkan list data judul detail
	public function get_judul_detail($tabel, $where)
	{
		$this->db->from($tabel);
		$this->db->where($where);
		$this->db->order_by('id_judul', 'asc');

		return $this->db->get();
	}

	// menyimpan data judul detail
	public function simpan_data_detail($data)
	{
		$this->db->insert('detail_pros', $data);
	}

	// menyimpan data sub judul detail
	public function simpan_sub_detail($data)
	{
		$this->db->insert('sub_detail_pros', $data);
	}

	// menampilkan data sub judul sesuai dengan id_detail_pros
	public function get_data_sub_judul($id_det_pros)
	{
		$this->db->from('detail_pros as d');
		$this->db->join('sub_detail_pros as s', 'd.id_detail_pros = s.id_detail_pros', 'inner');
		$this->db->join('judul_detail as j', 'j.id_judul = s.id_sub_judul', 'inner');
		$this->db->where('d.id_detail_pros', $id_det_pros);

		return $this->db->get();
	}

	/******************************************************************/
    /*                                                                */
    /*                  		DATA B L O K 	                      */
    /*                                                                */
    /******************************************************************/

    // menampilkan data
    public function tampil_data_blok()
    {
    	$this->db->from('blok as b');
    	$this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');

    	return $this->db->get();
    }

    /******************************************************************/
    /*                                                                */
    /*                  DATA P R O S P E K T U S                      */
    /*                                                                */
    /******************************************************************/

    // menampilkan data
    public function get_data_prospektus()
    {
    	$this->db->from('prospektus as p');
    	$this->db->join('unit as u', 'u.id_unit = p.unit', 'inner');

    	return $this->db->get();
    }

    // menghapus id_prospektus
    public function hapus_id_pros($tabel, $where)
    {
    	$this->db->delete($tabel, $where);
    }

    /******************************************************************/
    /*                                                                */
    /*                  		DATA U N I T 	                      */
    /*                                                                */
    /******************************************************************/

	// proses hapus unit
	public function hapus_unit($where)
	{
		$this->db->where($where);
		$this->db->delete('unit');
	}

	// proses simpan ubah unit
	public function simpan_ubah_unit($data,$where)
	{
		$this->db->where($where);
		$this->db->update('unit', $data);
	}
	// mencari id_unit
	public function cari_id_unit($where)
	{
		$this->db->select('u.id_unit, u.nama_unit, u.harga, u.id_blok');
		$this->db->from('unit as u');
		$this->db->join('blok as b', 'b.id_blok = u.id_blok', 'inner');
		$this->db->where($where);

		return $this->db->get();
	}

	// menyimpan data unit
	public function simpan_unit($data)
	{
		$this->db->insert('unit', $data);
	}

	// menampilkan data blok pada data unit
	public function get_blok_kws()
	{
		return $this->db->get('blok');
	}

	// menampilkan data unit
	public function get_unit_menu()
	{
		$this->db->from('unit as u');
		$this->db->join('blok as b', 'b.id_blok = u.id_blok', 'inner');

		return $this->db->get();
	}

	/******************************************************************/
    /*                                                                */
    /*                   	DATA K A W A S A N	                      */
    /*                                                                */
    /******************************************************************/

	// untuk menyimpan data kawasan
	public function simpan_kws($data)
	{
		$this->db->insert('kawasan', $data);
	}

	// ambil data sesuai id_kawasan
	public function get_id_kawasan($where)
	{
		$this->db->from('kawasan');
		$this->db->where($where);

		return $this->db->get();
	}

	// ubah data kawasan
	public function simpan_ubah_kws($data, $id)
	{
		$this->db->where('id_kawasan', $id);
		$this->db->update('kawasan', $data);
	}

	// hapus data kawasan
	public function hapus_kws($where)
	{
		$this->db->where($where);
		$this->db->delete('kawasan');
	}

	// mengambil data blok sesuai id_blok
	public function get_ajax_blok($id_blok)
	{
		$this->db->from('blok as b');
		$this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');
		$this->db->where('b.id_blok', $id_blok);

		return $this->db->get();
	}

	// simpan data edit blok
	public function simpan_edit_blok($data, $id)
	{
		$this->db->where('id_blok', $id);
		$this->db->update('blok', $data);

		return $a = $this->db->affected_rows();
	}

	// simpan data blok
	public function simpan_data_blok($data)
	{
		$result = $this->db->insert('blok', $data);

		return $result;
	}

	// hapus data blok
	public function hapus_blok($tabel, $where)
	{
		$this->db->delete($tabel, $where);
	}

	// ambil data kawasan
	public function get_data_kawasan()
	{
		return $this->db->get('kawasan');
	}

	public function get_unit()
	{
		return $this->db->get('unit');
	}

	public function get_data_harga($id_unit)
	{

		$this->db->select('*');
		$this->db->from('unit');
		$this->db->where('id_unit', $id_unit);

		$un = $this->db->get();

		if ($un->num_rows() > 0) {
			foreach ($un->result() as $u) {
				$hasil = array('harga'	=> number_format($u->harga,0,'.','.'));
			}
		} else {
			$hasil = array('harga' => 0);
		}

		return $hasil;
	}

	// proses simpan upload
	public function simpan_upload($data)
	{
		$this->db->insert('file_foto', $data);
	}

	// proses edit data upload
	public function edit_upload($data, $id)
	{
		$this->db->where('id_prospektus', $id);
		$this->db->update('file_foto', $data);
	}

	// proses edit data upload
	public function edit_upload_ft($data, $id)
	{
		$this->db->where('id_file_foto', $id);
		$this->db->update('file_foto', $data);
	}

	// proses edit data upload
	public function edit_upload_ft_isi($data, $id)
	{
		$this->db->where('id_prospektus', $id);
		$this->db->where('thumbnail', 0);
		$this->db->update('file_foto', $data);
	}

    // menampilkan jumlah unit pada halaman v_unit
    public function get_jumlah_unit($id_blok)
    {
        $this->db->from('blok as u');
        $this->db->where('u.id_blok', $id_blok);

        return $this->db->get()->row_array();
    }

	public function get_data_blok_jml()
	{	
		$this->db->select('k.nama_kawasan, b.nama_blok, b.gambar, b.add_time, b.jumlah_unit, k.alamat, b.id_blok, b.keterangan as ket');
		$this->db->from('blok as b');
		$this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');
		$this->db->order_by('b.keterangan', 'asc');
		return $this->db->get();
    }

    public function get_data_blok($limit,$start)
	{	
		/*$this->db->distinct('b.id_blok');
		$this->db->select('k.nama_kawasan, b.nama_blok, b.gambar, b.add_time, b.jumlah_unit, b.id_blok');
		$this->db->from('blok as b');
		$this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');
		$this->db->join('unit as u', 'u.id_blok = b.id_blok', 'inner');
		$this->db->limit($limit,$start);
		return $this->db->get();*/
		$this->db->select('k.nama_kawasan, b.nama_blok, b.gambar, b.add_time, b.jumlah_unit, k.alamat, b.id_blok, b.keterangan as ket');
		$this->db->from('blok as b');
		$this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');
		$this->db->limit($limit,$start);
		$this->db->order_by('b.keterangan', 'asc');
		return $this->db->get();
    }
    
    public function get_data_blok_investor_jml()
    {   
        $this->db->select('k.nama_kawasan, b.nama_blok, b.gambar, b.add_time, u.id_unit, b.jumlah_unit, k.alamat, b.id_blok, b.keterangan as ket');
        $this->db->from('blok as b');
        $this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');
        $this->db->join('unit as u', 'u.id_blok = b.id_blok', 'inner');
        $this->db->where('b.keterangan', null);
        $this->db->order_by('b.keterangan', 'asc');

        $hasil_1 = $this->db->get()->result_array();

        $value = array();

        foreach ($hasil_1 as $h) {

            $nm_kws     = $h['nama_kawasan'];
            $nm_blok    = $h['nama_blok'];
            $gambar     = $h['gambar'];
            $add_time   = $h['add_time'];
            $id_unit    = $h['id_unit'];
            $jml_unit   = $h['jumlah_unit'];
            $alamat     = $h['alamat'];
            $id_blok    = $h['id_blok'];
            $ket        = $h['ket'];

            $this->db->from('prospektus');
            $this->db->where('unit', $id_unit);

            $hasil_2 = $this->db->get()->num_rows();

            $value[] = ['nama_kawasan'  => $nm_kws,
                        'nama_blok'     => $nm_blok,
                        'gambar'        => $gambar,
                        'add_time'      => $add_time,
                        'jumlah_unit'   => $jml_unit,
                        'alamat'        => $alamat,
                        'id_blok'       => $id_blok,
                        'ket'           => $ket,
                        'j_unit'        => $hasil_2
                        ];
            
        }

        return $value;
    }

    public function get_data_blok_investor($limit,$start)
    {   
        $this->db->select('k.nama_kawasan, b.nama_blok, b.gambar, b.add_time, u.id_unit, b.jumlah_unit, k.alamat, b.id_blok, b.keterangan as ket');
        $this->db->from('blok as b');
        $this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');
        $this->db->join('unit as u', 'u.id_blok = b.id_blok', 'inner');
        $this->db->limit($limit,$start);
        $this->db->where('b.keterangan', null);
        $this->db->order_by('b.keterangan', 'asc');

        $hasil_1 = $this->db->get()->result_array();

        $value = array();

        foreach ($hasil_1 as $h) {

            $nm_kws     = $h['nama_kawasan'];
            $nm_blok    = $h['nama_blok'];
            $gambar     = $h['gambar'];
            $add_time   = $h['add_time'];
            $id_unit    = $h['id_unit'];
            $jml_unit   = $h['jumlah_unit'];
            $alamat     = $h['alamat'];
            $id_blok    = $h['id_blok'];
            $ket        = $h['ket'];

            $this->db->from('prospektus');
            $this->db->where('unit', $id_unit);

            $hasil_2 = $this->db->get()->num_rows();

            $value[] = ['nama_kawasan'  => $nm_kws,
                        'nama_blok'     => $nm_blok,
                        'gambar'        => $gambar,
                        'add_time'      => $add_time,
                        'jumlah_unit'   => $jml_unit,
                        'alamat'        => $alamat,
                        'id_blok'       => $id_blok,
                        'ket'           => $ket,
                        'j_unit'        => $hasil_2
                        ];
            
        }

        return $value;
    }

    public function get_data_blok_koperasi($limit,$start)
    {   
        $this->db->select('k.nama_kawasan, b.nama_blok, b.gambar, b.add_time, b.jumlah_unit, k.alamat, b.id_blok, b.keterangan as ket');
        $this->db->from('blok as b');
        $this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');
        $this->db->limit($limit,$start);
        $this->db->where('b.keterangan', null);
        $this->db->order_by('b.keterangan', 'asc');
        return $this->db->get();
    }

    public function get_data_blok_koperasi_jml()
    {   
        $this->db->select('k.nama_kawasan, b.nama_blok, b.gambar, b.add_time, b.jumlah_unit, k.alamat, b.id_blok, b.keterangan as ket');
        $this->db->from('blok as b');
        $this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');
        $this->db->where('b.keterangan', null);
        $this->db->order_by('b.keterangan', 'asc');
        return $this->db->get();
    }

	public function get_data_blok_f($limit,$start)
	{	
		$this->db->distinct('b.id_blok');
		$this->db->select('k.nama_kawasan,k.alamat, b.nama_blok, b.gambar, b.add_time, b.jumlah_unit, b.id_blok');
		$this->db->from('blok as b');
		$this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');
		$this->db->join('unit as u', 'u.id_blok = b.id_blok', 'inner');
		$this->db->join('prospektus as p', 'u.id_unit = p.unit');
		$this->db->order_by('b.id_blok');
		$this->db->limit($limit,$start);

		return $this->db->get();
	}

	public function count_data_blok()
	{	
		/*$this->db->distinct('unit.id_blok');
		$this->db->select('b.id_blok,b.nama_blok,k.nama_kawasan,b.gambar,b.add_time,k.alamat');
		$this->db->from('blok as b');
		$this->db->join('kawasan as k','b.id_kawasan = k.id_kawasan');
		$this->db->join('unit as u', 'u.id_blok = b.id_blok');*/

		$this->db->select('k.nama_kawasan, b.nama_blok, b.gambar, b.add_time, b.jumlah_unit, k.alamat, b.id_blok');
		$this->db->from('blok as b');
		$this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');

		return $this->db->get();
	}

    public function count_data_blok_kopeasi()
    {   
        $this->db->select('k.nama_kawasan, b.nama_blok, b.gambar, b.add_time, b.jumlah_unit, k.alamat, b.id_blok');
        $this->db->from('blok as b');
        $this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');
        $this->db->where('b.keterangan', null);

        return $this->db->get();
    }

	public function get_data_pros($id, $limit,$start)
	{
		$this->db->select('*');
		$this->db->from('prospektus as p');
		$this->db->join('file_foto as f', 'f.id_prospektus = p.id_prospektus', 'inner');
		$this->db->join('unit as u', 'u.id_unit = p.unit', 'inner');
		$this->db->where('f.thumbnail', 1);
		if ($id != null) {
			$this->db->where('p.id_prospektus', $id);
		}
		$this->db->limit($limit,$start);

		return $this->db->get();
	}
	
	// untuk detail prospektus
	public function get_detail_pros($id_prospektus)
	{
		$this->db->select('*');
		$this->db->from('prospektus as p');
		$this->db->join('file_foto as f', 'f.id_prospektus = p.id_prospektus', 'inner');
		$this->db->join('unit as u', 'u.id_unit = p.unit', 'inner');
		$this->db->where('p.id_prospektus', $id_prospektus);

		return $this->db->get();
	}

    public function get_jml_lot_beli($id_prospektus)
    {
        $this->db->select('sum(i.jumlah_lot) as jml_lot_beli');
        $this->db->from('tr_investor as i');
        $this->db->join('tr_transfer as t', 't.id_tr_investor = i.id_tr_investor', 'inner');
        $this->db->where('i.id_prospektus', $id_prospektus);
        $this->db->where('i.status', 1);

        return $this->db->get()->row_array();
    }

	// untuk ambil foto detail
	public function get_foto_detail($id_prospektus)
	{
		$this->db->select('*');
		$this->db->from('prospektus as p');
		$this->db->join('file_foto as f', 'f.id_prospektus = p.id_prospektus', 'inner');
		$this->db->join('unit as u', 'u.id_unit = p.unit', 'inner');
		$this->db->where('f.id_prospektus', $id_prospektus);
		$this->db->order_by('f.thumbnail', 'desc');

		return $this->db->get();
	}

	public function get_foto_edit($id_prospektus)
	{
		$this->db->select('*');
		$this->db->from('prospektus as p');
		$this->db->join('file_foto as f', 'f.id_prospektus = p.id_prospektus', 'inner');
		$this->db->join('unit as u', 'u.id_unit = p.unit', 'inner');
		$this->db->where('f.id_prospektus', $id_prospektus);
		$this->db->where('f.thumbnail', 0);

		return $this->db->get();
	}

	// untuk hapus fot thumbnail
	public function hapus_foto_thumb($id)
	{
		$this->db->where('id_file_foto', $id);
		$this->db->delete('file_foto');
	}

	// proses simpan edit
	public function simpan_edit($data, $id)
	{
		$this->db->where('id_prospektus', $id);
		$this->db->update('prospektus', $data);
	}

	public function get_unit_blok($id_blok)
	{
		$this->db->from('unit');
		if ($id_blok != null) {
			$this->db->where('id_blok', $id_blok);
		}
		return $this->db->get();
	}

	public function get_id_blok_edit($id_prospektus)
	{
		$this->db->select('u.id_blok');
		$this->db->from('prospektus as p');
		$this->db->join('unit as u', 'u.id_unit = p.unit');
		$this->db->where('p.id_prospektus', $id_prospektus);

		return $this->db->get()->row_array();
	}

	public function get_data_unit($id_blok,$limit,$start)
	{	
		$this->db->select('p.id_prospektus, f.file_foto, p.add_time, p.status, p.target_investor, u.nama_unit, u.harga, p.periode_investasi, p.minimal_investasi, p.jumlah_lot, k.nama_kawasan, b.nama_blok');
		$this->db->from('unit as u');
		$this->db->join('prospektus as p', 'u.id_unit = p.unit');
		$this->db->join('blok as b', 'b.id_blok = u.id_blok');
		$this->db->join('file_foto as f', 'f.id_prospektus = p.id_prospektus');
		$this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan');
		$this->db->where('u.id_blok',$id_blok);
		$this->db->where('f.thumbnail', 1);
		$this->db->limit($limit,$start);
		$this->db->order_by('p.add_time', 'desc');

		$hasil = $this->db->get()->result_array();

        $value = array();

        foreach ($hasil as $h) {

            $this->db->select('sum(i.jumlah_lot) as jml_lot_beli');
            $this->db->from('tr_investor as i');
            $this->db->join('tr_transfer as t', 't.id_tr_investor = i.id_tr_investor', 'inner');
            $this->db->where('i.id_prospektus', $h['id_prospektus']);
            //$this->db->where('t.status_bayar', 1);
            $this->db->where('i.status', 1);

            $hasil_1 = $this->db->get()->row_array();

            $sisa = $h['jumlah_lot'] - $hasil_1['jml_lot_beli'];

            $value[] = array('id_prospektus'    => $h['id_prospektus'],
                             'file_foto'        => $h['file_foto'],
                             'add_time'         => $h['add_time'],
                             'status'           => $h['status'],
                             'target_investor'  => $h['target_investor'],
                             'nama_unit'        => $h['nama_unit'],
                             'harga'            => $h['harga'],
                             'periode_investasi'=> $h['periode_investasi'],
                             'minimal_investasi'=> $h['minimal_investasi'],
                             'jumlah_lot'       => $h['jumlah_lot'],
                             'nama_kawasan'     => $h['nama_kawasan'],
                             'nama_blok'        => $h['nama_blok'],
                             'sisa_lot'         => $sisa
                            );

        }

        return $value;
	}

	public function get_id_blok($id_blok)
	{	
		$this->db->select('*');
		$this->db->from('blok');
		$this->db->where('id_blok',$id_blok);

		return $this->db->get()->row_array();
	}

	public function get_data_unit_jml($id_blok)
	{
		$this->db->select('*');
		$this->db->from('unit as u');
		$this->db->join('prospektus as p', 'u.id_unit = p.unit');
		$this->db->join('blok as b', 'b.id_blok = u.id_blok');
		$this->db->join('file_foto as f', 'f.id_prospektus = p.id_prospektus');
		$this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan');
		$this->db->where('b.id_blok',$id_blok);
		$this->db->where('f.thumbnail', 1);

		return $this->db->get();
	}

	public function count_data_blok_f()
	{	
		$this->db->distinct('unit.id_blok');
		$this->db->select('b.id_blok,b.nama_blok,k.nama_kawasan,b.gambar,b.add_time,k.alamat');
		$this->db->from('blok as b');
		$this->db->join('kawasan as k','b.id_kawasan = k.id_kawasan');
		$this->db->join('unit as u', 'u.id_blok = b.id_blok');
		$this->db->join('prospektus as p', 'u.id_unit = p.unit');

		return $this->db->get();
	}

	public function count_data_unit($id_blok)
	 {	$query = $this->db->query("
	 	SELECT *
		FROM unit
		JOIN prospektus ON prospektus.unit = unit.id_unit
		JOIN file_foto ON file_foto.id_prospektus = prospektus.id_prospektus
		JOIN blok ON blok.id_blok = unit.id_blok
		JOIN kawasan ON kawasan.id_kawasan = blok.id_kawasan
		WHERE unit.id_blok = '{$id_blok}' "
		);
		return $query;
	}

	public function get_data_unit_f($id_blok,$limit,$start)
	{	
		$this->db->select('*');
		$this->db->from('unit as u');
		$this->db->join('prospektus as p ', 'u.id_unit = p.unit');
		$this->db->join('blok as b ', 'b.id_blok = u.id_blok');
		$this->db->join('file_foto as f', 'f.id_prospektus = p.id_prospektus');
		$this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan');
		$this->db->where('u.id_blok',$id_blok);
		$this->db->where('f.thumbnail', 1);
		
		$this->db->limit($limit,$start);
		return $this->db->get();
	}

	public function get_id_blok_by_pros($id_prospektus)
	{
		$this->db->select('u.id_blok');
		$this->db->from('prospektus as p');
		$this->db->join('unit as u ', 'u.id_unit = p.unit');
		$this->db->where('id_prospektus',$id_prospektus);

		return $this->db->get()->row_array();

	}

    /*===========================================
    =            Transaksi Koperasi {YPO}            =
    ===========================================*/
    public function get_transaksi_kop($kode)
    {   
      $this->db->select('inv.id_tr_investor,inv.kode_transaksi,inv.jumlah_lot,trf.harga');
      $this->db->from('tr_investor as inv');
      $this->db->join('tr_transfer as trf', 'trf.id_tr_investor = inv.id_tr_investor');
      $this->db->where('inv.kode_transaksi', $kode);
      $this->db->where('trf.total =',null);
       return $this->db->get();
    }

    public function get_transaksi_kop_2($kode)
    {   
      $this->db->select('inv.id_tr_investor,inv.kode_transaksi,inv.jumlah_lot,trf.harga');
      $this->db->from('tr_investor as inv');
      $this->db->join('tr_transfer as trf', 'trf.id_tr_investor = inv.id_tr_investor');
      $this->db->where('trf.kode_transaksi', $kode);
      $this->db->where('trf.total =',null);
       return $this->db->get();
    }
    
     public function get_transaksi_kop_total($kode)
    {   
      $this->db->select('sum(inv.jumlah_lot) as jumlah_lot,sum(trf.harga) as harga');
      $this->db->from('tr_investor as inv');
      $this->db->join('tr_transfer as trf', 'trf.id_tr_investor = inv.id_tr_investor');
      $this->db->where('inv.kode_transaksi', $kode);
      $this->db->where('trf.total =',null);

       return $this->db->get()->result();
    }
    
    public function hapus_tr_inv($id)
    {
        $this->db->where('id_tr_investor', $id);
        $this->db->delete('tr_investor');
    }

    public function hapus_tr_trf($id)
    {
        $this->db->where('id_tr_investor', $id);
        $this->db->delete('tr_transfer');
    }

    public function tr_cash($data,$k)
    {
        $this->db->where('kode_transaksi', $k);
        $this->db->update('tr_transfer', $data);
    }

    public function tr_trf($data,$k)
    {
        $this->db->where('kode_transaksi', $k);
        $this->db->update('tr_transfer', $data);
    }
    /*=====  End of Transaksi Koperasi {YPO}  ======*/
    

    /*=================================
    =          Anggoata {YPO}         =
    =================================*/
    public function get_data_anggota()
    {
        $this->db->where('id_pengguna', $this->session->userdata('id_pengguna'));
     return $this->db->get('anggota');
    }
    
     public function tambah_anggota($data)
    {
     $this->db->insert('anggota',$data);
    }

     public function hapus_anggota($id)
    {
     $this->db->where('id_anggota', $id);   
     $this->db->delete('anggota');
    }
    
    public function update_anggota($data)
    {
        $this->db->where('id_anggota', $data['id_anggota']);
        $this->db->update('anggota',$data);

    }
    /*=====  End of Anggoata {YPO}  ======*/

    
    /*============================================
    =            history koperasi {YPO}            =
    ============================================*/
    
    public function get_data_history_kop()
    {
        $this->db->select('inv.id_tr_investor,inv.kode_transaksi,sum(inv.jumlah_lot) as jumlah_lot,trf.harga,ff.file_foto,u.nama_unit,b.nama_blok,k.nama_kawasan,trf.total');
        $this->db->from('tr_investor as inv');
        $this->db->group_by('inv.kode_transaksi,trf.harga,ff.file_foto,u.nama_unit,b.nama_blok,k.nama_kawasan,trf.total,inv.id_tr_investor,');
        $this->db->join('tr_transfer as trf', 'trf.id_tr_investor = inv.id_tr_investor');
        $this->db->join('file_foto as ff','ff.id_prospektus = inv.id_prospektus');
        $this->db->where('ff.thumbnail', '1');
        $this->db->join('prospektus as p', 'p.id_prospektus = inv.id_prospektus');
        $this->db->join('unit as u', 'u.id_unit = p.unit');
        $this->db->join('blok as b', 'b.id_blok = u.id_blok');
        $this->db->join('kawasan k', 'k.id_kawasan = b.id_kawasan');

        return $this->db->get()->result();
    }

    // menampilkan data history koperasi
    public function get_data_history_koperasi($id_pengguna)
    {
        $this->db->select('ti.kode_transaksi, sum(ti.jumlah_lot) as total_lot, tt.total as total_bayar');
        $this->db->from('tr_investor as ti');
        $this->db->join('tr_transfer as tt', 'tt.id_tr_investor = ti.id_tr_investor', 'inner');
        $this->db->where('tt.total !=', null);
        $this->db->where('ti.id_pengguna', $id_pengguna);
        $this->db->group_by('ti.kode_transaksi')->group_by('tt.total');
        $this->db->order_by('ti.kode_transaksi', 'desc');    

        $hasil = $this->db->get()->result_array();
        $value = array();

        foreach ($hasil as $h) {
            $kd_tr      = $h['kode_transaksi'];
            $tot_lot    = $h['total_lot'];
            $total_bayar= $h['total_bayar'];

            $this->db->select('add_time as tgl_transaksi');
            $this->db->from('tr_transfer');
            $this->db->where('kode_transaksi', $kd_tr);

            $hasil_2 = $this->db->get()->row_array();

            $value[] = ['kode_transaksi' => $kd_tr,
                        'total_lot'      => $tot_lot,
                        'total_bayar'    => $total_bayar,
                        'add_time'       => $hasil_2['tgl_transaksi']
                        ];
        }

        return $value;
    }

    /*

    SELECT ti.*, tt.*, p.minimal_investasi
    FROM    tr_investor as ti
    JOIN tr_transfer as tt ON tt.id_tr_investor = ti.id_tr_investor
    JOIN prospektus as p ON ti.id_prospektus = p.id_prospektus
    JOIN unit as u ON u.id_unit = p.unit
    join blok as b ON b.id_blok = u.id_blok
    JOIN kawasan as k ON k.id_kawasan = b.id_kawasan
    WHERE tt.total is not null and ti.id_pengguna = 14 and ti.kode_transaksi = 'RET201908010001'

    */

    // menampilkan list detail
    public function get_data_detail_history($kd_tr, $id_pengguna)
    {
        $this->db->select('ti.*, tt.*, u.nama_unit, b.nama_blok, k.nama_kawasan, p.alamat, ti.jumlah_lot as jml_lot');
        $this->db->from('tr_investor as ti');
        $this->db->join('tr_transfer as tt', 'tt.id_tr_investor = ti.id_tr_investor', 'inner');
        $this->db->join('prospektus as p', 'p.id_prospektus = ti.id_prospektus', 'inner');
        $this->db->join('unit as u', 'u.id_unit = p.unit', 'inner');
        $this->db->join('blok as b', 'b.id_blok = u.id_blok', 'inner');
        $this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');
        $this->db->where('tt.total !=', null);
        $this->db->where('ti.id_pengguna', $id_pengguna);
        $this->db->where('ti.kode_transaksi', $kd_tr);

        return $this->db->get();

    }

    public function get_data_anggota_id($id_pengguna)
    {
        return $this->db->get_where('anggota', array('id_pengguna' => $id_pengguna));
    }
    
    // menampilkan data detail invest per unit
    public function get_data_det_invest($id_tr_investor)
    {
        $this->db->select('a.*, d.*');
        $this->db->from('detail_investasi as d');
        $this->db->join('anggota as a', 'a.id_anggota = d.id_anggota', 'inner');
        $this->db->where('d.id_tr_investor', $id_tr_investor);

        return $this->db->get();
    }

    // simpan detail investasi
    public function simpan_detail_invest($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function hapus_det_his($tabel, $where)
    {
        $this->db->where($where);
        $this->db->delete($tabel);
    }

    public function ubah_nilai_invest($tabel, $where, $data)
    {
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }

    public function hapus_nilai_invest($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    /*=====  End of history koperasi {YPO}  ======*/


}

/* End of file M_prospektus.php */
/* Location: ./application/models/M_prospektus.php */
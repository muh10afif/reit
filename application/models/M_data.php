<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

	# =====================================
	# =           Data Pengguna           =
	# =====================================

	// cari id_pengguna detail profil
	public function cari_id_pengguna($tabel, $id_pengguna)
	{
		$this->db->from('detail_profil as dp');
		$this->db->join('pengguna as p', 'p.id_pengguna = dp.id_pengguna', 'left');
		$this->db->where('dp.id_pengguna', $id_pengguna);

		return $this->db->get();
	}

	// mencari level
	public function cari_level($tabel, $where)
	{
		return $this->db->get_where($tabel, $where);
	}

	// mencari provinsi
	public function cari_provinsi($id_provinsi)
	{
		return $this->db->get_where('provinsi', array('id_provinsi' => $id_provinsi));
	}

	// mencari kota
	public function cari_kota($id_kota)
	{
		return $this->db->get_where('kota', array('id_kota' => $id_kota));
	}

	// mencari kecamatan
	public function cari_kecamatan($id_kecamatan)
	{
		return $this->db->get_where('kecamatan', array('id_kec' => $id_kecamatan));
	}

	// mencari kelurahan
	public function cari_kelurahan($id_kel)
	{
		return $this->db->get_where('kelurahan', array('id_kel' => $id_kel));
	}
	
	// menampilkan tampil data pengguna
	public function get_data_pengguna()
	{
		$this->db->select('p.*, l.*, l.level as nama_level');
		$this->db->from('pengguna as p');
		$this->db->join('level as l', 'l.id_level = p.level', 'inner');
		$this->db->order_by('p.add_time', 'desc');

		return $this->db->get();
	}

	// memproses hapus data pengguna
	public function hapus_id_pengguna($tabel, $where)
	{
		$this->db->where($where);
		$this->db->delete($tabel);
	}

	// menampilkan data level
	public function get_data_level()
	{
		return $this->db->get('level');
	}

	// menyimpan data pengguna
	public function simpan_pengguna($tabel, $data)
	{
		$this->db->insert($tabel, $data);

		return $this->db->insert_id();
	}

	// menyimpan data detail profil
	public function simpan_detail_profil($tabel, $data)
	{
		$this->db->insert($tabel, $data);
	}

	// cek id_pengguna di detail profil
	public function cek_id_pengguna($tabel, $where)
	{
		$this->db->from($tabel);
		$this->db->where($where);

		return $this->db->get();
	}

	// proses hapus detail profil
	public function hapus_detail_prof($tabel, $where)
	{
		$this->db->where($where);
		$this->db->delete($tabel);
	}

	// mencari pengguna menurut id_pengguna
	public function get_data_id_pengguna($id_pengguna)
	{
		$this->db->select('p.*, l.*, l.level as nama_level, d.*, p.id_pengguna as id');
		$this->db->from('pengguna as p');
		$this->db->join('level as l', 'l.id_level = p.level', 'inner');
		$this->db->join('detail_profil as d', 'd.id_pengguna = p.id_pengguna', 'left');
		$this->db->where('p.id_pengguna', $id_pengguna);

		return $this->db->get();
	}

	// proses mengubah data pada tabel pengguna
	public function ubah_pengguna($where, $data)
	{
		$this->db->where($where);
		$this->db->update('pengguna', $data);
	}

	// proses ubah detail profil
	public function ubah_detail_profil($where, $data)
	{
		$this->db->where($where);
		$this->db->update('detail_profil', $data);
	}

	// mengambil list data provinsi
	public function get_provinsi()
	{
		$this->db->order_by('nama_provinsi', 'asc');
		return $this->db->get('provinsi')->result();
	}

	// mengambil list data kota
	public function get_kota()
	{
		$this->db->select('k.*, p.*, k.id_provinsi as id_provinsi_2');
		$this->db->from('kota as k');
		$this->db->join('provinsi as p', 'p.id_provinsi = k.id_provinsi', 'inner');
		$this->db->order_by('k.nama_kota', 'asc');
		return $this->db->get()->result();
	}

	// mengambil list data kecamatan
	public function get_kecamatan()
	{
		$this->db->select('k.*, o.*, k.id_kota as id_kota_2');
		$this->db->from('kecamatan as k');
		$this->db->join('kota as o', 'o.id_kota = k.id_kota', 'inner');
		$this->db->order_by('k.nama_kecamatan', 'asc');
		return $this->db->get()->result();
	}

	// mengambil list data kelurahan
	public function get_kelurahan()
	{
		$this->db->select('k.*, c.*, k.id_kec as id_kec_2');
		$this->db->from('kelurahan as k');
		$this->db->join('kecamatan as c', 'c.id_kec = k.id_kec', 'inner');
		$this->db->order_by('k.nama_kelurahan', 'asc');
		return $this->db->get()->result();
	}

	// mengambil data id_profil
	public function get_data_profil($id_pengguna)
	{
		return $this->db->get_where('detail_profil', array('id_pengguna' => $id_pengguna));
	}

	
	# ======  End of Data Pengguna  =======
	
	

	

}

/* End of file M_data.php */
/* Location: ./application/models/M_data.php */
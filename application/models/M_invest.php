<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_invest extends CI_Model {

	// mencari id_prospektus
	public function cari_id_prospektus($id_tr_investor)
	{
		$this->db->select('id_prospektus');
		$this->db->from('tr_investor');
		$this->db->where('id_tr_investor', $id_tr_investor);

		return $this->db->get();
	}

	// mencari jumlah lot dari id_prospektus
	public function cari_jumlah_lot_invest($id_prospektus)
	{
		$this->db->select('sum(jumlah_lot) as jml_lot');
		$this->db->from('tr_investor');
		$this->db->where('status', 1);
		$this->db->where('id_prospektus', $id_prospektus);

		return $this->db->get();
	}

	// menampilkan transaksi data investor
	public function get_detail_invest($kd_tr)
	{
		$this->db->select('u.nama_unit, i.jumlah_lot, p.nama_pengguna, i.kode_transaksi, i.status, r.alamat, i.id_tr_investor, b.nama_blok, k.nama_kawasan');
		$this->db->from('tr_investor as i');
		$this->db->join('pengguna as p', 'p.id_pengguna = i.id_pengguna', 'inner');
		$this->db->join('prospektus as r', 'r.id_prospektus = i.id_prospektus', 'inner');
		$this->db->join('unit as u', 'u.id_unit = r.unit', 'inner');
		$this->db->join('blok as b', 'b.id_blok = u.id_blok', 'inner');
		$this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');
		$this->db->where('i.kode_transaksi', $kd_tr);

		return $this->db->get();
	}

	public function get_data_invest()
	{
		$this->db->select('t.kode_transaksi, p.nama_pengguna');
		$this->db->from('tr_investor as t');
		$this->db->join('pengguna as p', 'p.id_pengguna = t.id_pengguna', 'inner');
		$this->db->group_by('t.kode_transaksi, p.nama_pengguna');
		$this->db->order_by('t.kode_transaksi', 'desc');

		$hasil = $this->db->get()->result_array();
		
		$value 	 = array();

		foreach ($hasil as $h) {
			$kd_tr 	= $h['kode_transaksi'];
			$nama_p = $h['nama_pengguna'];

			$this->db->from('tr_investor');
			$this->db->where('kode_transaksi', $kd_tr);

			$hasil_2 = $this->db->get()->result_array();

			$tot_lot = 0;
			$status  = array();
			foreach ($hasil_2 as $k) {
				$tot_lot += $k['jumlah_lot'];

				$status[] = $k['status'];
			}

			$value[] = array('nama_pengguna' => $nama_p, 'kode_transaksi' => $kd_tr, 'jml_unit' => count($hasil_2), 'tot_lot' => $tot_lot, 
							 'status' => $status);
		}

		return $value;
	}

	// ubah status transaksi
	public function ubah_status_approve($data, $id_tr_investor)
	{
		$this->db->where(array('id_tr_investor' => $id_tr_investor));
		$this->db->update('tr_investor', $data);
	}


	////////////////////////////////////////////////////////////////////
	/// 						PUBLISH REPORT 						 ///	
	////////////////////////////////////////////////////////////////////

	# MENAMPILKAN HALAMAN PUBLISH REPORT
	public function get_data_pros()
	{
		$this->db->select('p.jumlah_lot, u.id_unit, u.nama_unit, p.id_prospektus, u.harga');
		$this->db->from('prospektus as p');
		$this->db->join('unit as u', 'u.id_unit = p.unit', 'inner');
		$this->db->order_by('id_prospektus', 'desc');

		$hasil = $this->db->get()->result_array();

		$value = array();

		foreach ($hasil as $h) {
			
			$jml_lot 	= $h['jumlah_lot'];
			$id_unit 	= $h['id_unit'];
			$nm_unit 	= $h['nama_unit'];
			$id_pros 	= $h['id_prospektus'];
			$harga_unit = $h['harga'];

			$this->db->select('sum(jumlah_lot) as tot_lot');
			$this->db->from('tr_investor as t');
			$this->db->where('id_prospektus', $id_pros);
			$this->db->where('status', 1);

			$hasil_2 = $this->db->get()->row_array();

			$sisa = $jml_lot - $hasil_2['tot_lot'];

			$value[] = ['id_pros' 		=> $id_pros,
						'jml_lot'		=> $jml_lot,
						'id_unit'		=> $id_unit,
						'nama_unit' 	=> $nm_unit,
						'harga_unit'	=> $harga_unit,
						'jml_terjual'	=> $hasil_2['tot_lot'],
						'sisa'			=> $sisa
						];
		}

		return $value;
	}

	# MENAMPILKAN HALAMAN DATA UNIT
	public function get_data_unit()
	{
		$this->db->select('p.nama_pengguna, i.id_prospektus, u.harga');
		$this->db->from('tr_investor as i');
		$this->db->join('pengguna as p', 'p.id_pengguna = i.id_pengguna', 'inner');
		$this->db->join('prospektus as e', 'e.id_prospektus = i.id_prospektus', 'inner');
		$this->db->join('unit as u', 'u.id_unit = e.unit', 'inner');
		$this->db->where('i.status', 1);
		$this->db->group_by('i.id_prospektus');
		$this->db->group_by('p.nama_pengguna');
		$this->db->group_by('u.harga');

		$hasil = $this->db->get()->result_array();

		$value = array();

		foreach ($hasil as $h) {

			$nm_pengguna 	= $h['nama_pengguna'];
			$id_pros		= $h['id_prospektus'];
			$nilai_unit 	= $h['harga'];

			$this->db->select('sum(jumlah_lot) as tot_lot');
			$this->db->from('tr_investor as i');
			$this->db->where('i.status', 1);
			$this->db->where('i.id_prospektus', $id_pros);

			$hasil_2 = $this->db->get()->row_array();

			$this->db->from('tr_investor as t');
			$this->db->where('t.status', 1);
			$this->db->where('t.id_prospektus', $id_pros);

			$hasil_3 = $this->db->get()->result_array();

			$value[] = ['pembeli'		=> $nm_pengguna,
						'jumlah_lot'	=> $hasil_2['tot_lot'],
						'jumlah_unit'	=> count($hasil_3),
						'nilai_unit'	=> $nilai_unit*count($hasil_3)
						];
			
		}

		return $value;

	}


	////////////////////////////////////////////////////////////////////
	/// 					HISTORI TRANSAKSI 						 ///	
	////////////////////////////////////////////////////////////////////

	// menampilkan data transaksi beli
	public function get_data_tr_beli($id_pengguna)
	{
		$this->db->select('p.kode_prospektus, i.kode_transaksi, i.jumlah_lot, t.harga, t.add_time, t.batas_bayar, i.status');
		$this->db->from('tr_investor as i');
		$this->db->join('tr_transfer as t', 't.id_tr_investor = i.id_tr_investor', 'inner');
		$this->db->join('prospektus as p', 'p.id_prospektus = i.id_prospektus', 'inner');
		$this->db->where('i.id_pengguna', $id_pengguna);
		$this->db->order_by('i.kode_transaksi', 'asc');

		return $this->db->get();
	}

}

/* End of file M_invest.php */
/* Location: ./application/models/M_invest.php */
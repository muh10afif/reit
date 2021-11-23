<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_invest extends CI_Model {

	// menampilkan transaksi data investor
	public function get_data_invest($id_tr_investor)
	{
		$this->db->select('i.id_tr_investor, i.status, p.nama_pengguna, i.kode_transaksi, i.jumlah_lot, u.nama_unit, b.nama_blok, k.nama_kawasan');
		$this->db->from('tr_investor as i');
		$this->db->join('pengguna as p', 'p.id_pengguna = i.id_pengguna', 'inner');
		$this->db->join('prospektus as r', 'r.id_prospektus = i.id_prospektus', 'inner');
		$this->db->join('unit as u', 'u.id_unit = r.unit', 'inner');
		$this->db->join('blok as b', 'b.id_blok = u.id_blok', 'inner');
		$this->db->join('kawasan as k', 'k.id_kawasan = b.id_kawasan', 'inner');
		if ($id_tr_investor != null) {
			$this->db->where('i.id_tr_investor', $id_tr_investor);
		}

		return $this->db->get();
	}

}

/* End of file M_invest.php */
/* Location: ./application/models/M_invest.php */
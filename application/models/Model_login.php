<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function cek_user_login($user)
	{
		$this->db->select('p.level, p.password, p.username, l.level as nama_level, p.nama_pengguna, p.id_pengguna, dp.foto, p.aktif');
		$this->db->from('pengguna as p');
		$this->db->join('level as l', 'l.id_level = p.level', 'inner');
		$this->db->join('detail_profil as dp', 'dp.id_pengguna = p.id_pengguna', 'left');
		$this->db->where('p.username', $user);

		return $this->db->get();
	}

	public function register($data)
	{
	  $this->db->insert('pengguna',$data);
	}

	public function getUser($id)
	{
		$query = $this->db->get_where('pengguna',array('id_pengguna' => $id));
		return $query->row_array();

	}

	public function activate($data, $id){
		$this->db->where('pengguna.id_pengguna', $id);
		return $this->db->update('pengguna', $data);
	}
	
}

/* End of file Model_login.php */
/* Location: ./application/models/Model_login.php */
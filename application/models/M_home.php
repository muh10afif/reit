<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_home extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_home()
	{
		$this->db->select('*');
		$this->db->from('t_m_home');
		$this->db->where('id','1');

		return $this->db->get();
	}

	public function get_disclaimer()
	{
		$this->db->select('disclaimer');
		$this->db->from('t_m_home');
		$this->db->where('id','1');

		return $this->db->get();
	}

	public function get_image_inv()
	{
		$this->db->select('*');
		$this->db->from('t_m_investasi');
		$this->db->where('id','1');

		return $this->db->get();
	}

	public function get_faq()
	{
		$this->db->select('*');
		$this->db->from('t_m_faq');
		$this->db->where('bahasa','1');
		$this->db->order_by('id');
		

		return $this->db->get();
	}

	public function get_faq_cms()
	{
		$this->db->select('*');
		$this->db->from('t_m_faq');
		$this->db->where('bahasa','1');
		$this->db->order_by('id');


		return $this->db->get();
	}

	public function get_video()
	{
		$this->db->select('*');
		$this->db->from('t_m_video');
		$this->db->where('id','1');
		
		return $this->db->get();
	}


	public function delete_faq($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('t_m_faq');
	}


	public function get_data_project()
	{
		$this->db->select('*');
		$this->db->from('prospektus as p');
		$this->db->join('file_foto as f', 'f.id_prospektus= p.id_prospektus');
		$this->db->join('unit as u' ,'u.id_unit = p.unit');
		$this->db->join('blok as b' , 'b.id_blok = u.id_blok');
		$this->db->join('kawasan as k','k.id_kawasan = b.id_kawasan');
		$this->db->Where('status != ','2');
		$this->db->or_Where('status != ','3');

		return $this->db->get();
	}


	public function get_data_project_2()
	{
		$this->db->select('*');
		$this->db->from('prospektus as p');
		$this->db->join('file_foto as f', 'f.id_prospektus= p.id_prospektus');
		$this->db->join('unit as u' ,'u.id_unit = p.unit');
		$this->db->join('blok as b' , 'b.id_blok = u.id_blok');
		$this->db->join('kawasan as k','k.id_kawasan = b.id_kawasan');
		$this->db->order_by("p.id_prospektus","desc");
		$this->db->Where('status != ','2');
		$this->db->or_Where('status != ','3');

	

		return $this->db->get();
	}

	public function update_gambar_thumb($data)
	{
		$this->db->where('id_kawasan',$data['id_kawasan']);
		$this->db->update('kawasan',$data);
	}

	public function update_project_thumb($data)
	{
		$this->db->where('id',$data['id']);
		$this->db->update('t_m_project',$data);

	}

	public function inv_promo_update($data)
	{
		$this->db->where('id','1');
		$this->db->update('t_m_investasi',$data);
	}

	public function footer_update($data)
	{
		$this->db->where('id','1');
		$this->db->update('t_m_home',$data);
	}
}
/* End of file M_home.php */
/* Location: ./application/models/M_home.php */
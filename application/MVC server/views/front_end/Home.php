<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_home','home');
	}


	public function index()
	{	
		$h = array_values($this->home->get_image_jumbo()->result());
		$i = array_values($this->home->get_image_inv()->result());
		$f = $this->home->get_faq()->result();
		$v = array_values($this->home->get_video()->result());
		$p = $this->home->get_data_project();
		
		$data = array(
			'gb_jumbotron' 			=> base64_decode($h['0']->gb_jumbotron),
			'inv_gambar' 			=> base64_decode($i['0']->inv_gambar) ,
			'inv_proyek_selesai'	=> $i['0']->inv_proyek_selesai,
			'inv_client'			=> $i['0']->inv_client,
			'inv_proyek_berjalan'	=> $i['0']->inv_proyek_berjalan,
			'inv_title_promo'		=> $i['0']->inv_title_promo,
			'inv_promo_cont1'		=> $i['0']->inv_promo_cont1,
			'inv_promo_cont2'		=> $i['0']->inv_promo_cont2,
			'inv_promo_cont3'		=> $i['0']->inv_promo_cont3,
			'inv_promo_cont4'		=> $i['0']->inv_promo_cont4,
			'inv_promo_title_cont1'	=> $i['0']->inv_promo_title_cont1,
			'inv_promo_title_cont2'	=> $i['0']->inv_promo_title_cont2,
			'inv_promo_title_cont3'	=> $i['0']->inv_promo_title_cont3,
			'inv_promo_title_cont4'	=> $i['0']->inv_promo_title_cont4,
			'inv_proyek_berjalan'	=> $i['0']->inv_proyek_berjalan,
			'data_faq'				=> $f,
			'vid_link'				=> $v['0']->vid_link,
			'vid_narasi'			=> $v['0']->vid_narasi,
			'vid_youtube_link'		=> $v['0']->vid_youtube_link,
			'data_project_thumb'	=> $p,

		);
		$this->load->view('front_end/V_home',$data);
	}

	public function home_edit()
	{	
		$h = array_values($this->home->get_image_jumbo()->result());
		$i = array_values($this->home->get_image_inv()->result());
		$f = $this->home->get_faq_cms()->result();
		$v = array_values($this->home->get_video()->result());
		$p = $this->home->get_data_project();

		$data = array(
			'aktif' 				=> 'home',
			'gb_jumbotron' 			=> base64_decode($h['0']->gb_jumbotron),
			'inv_gambar' 			=> base64_decode($i['0']->inv_gambar) ,
			'inv_proyek_selesai'	=> $i['0']->inv_proyek_selesai,
			'inv_client'			=> $i['0']->inv_client,
			'inv_proyek_berjalan'	=> $i['0']->inv_proyek_berjalan,
			'inv_title_promo'		=> $i['0']->inv_title_promo,
			'inv_promo_cont1'		=> $i['0']->inv_promo_cont1,
			'inv_promo_cont2'		=> $i['0']->inv_promo_cont2,
			'inv_promo_cont3'		=> $i['0']->inv_promo_cont3,
			'inv_promo_cont4'		=> $i['0']->inv_promo_cont4,
			'inv_promo_title_cont1'	=> $i['0']->inv_promo_title_cont1,
			'inv_promo_title_cont2'	=> $i['0']->inv_promo_title_cont2,
			'inv_promo_title_cont3'	=> $i['0']->inv_promo_title_cont3,
			'inv_promo_title_cont4'	=> $i['0']->inv_promo_title_cont4,
			'data_faq'				=> $f,
			'vid_link'				=> $v['0']->vid_link,
			'vid_narasi'			=> $v['0']->vid_narasi,
			'vid_youtube_link'		=> $v['0']->vid_youtube_link,
			'data_project_thumb'	=> $p,
		);

		$this->output->delete_cache(FCPATH.'assets_frontend/images/bg');
		$this->output->delete_cache(FCPATH.'assets_frontend/images/all');
		$this->template->load('template','front_end/v_home_edit',$data);
	}

	public function jumbotron_edit_proses()
	{		$config['upload_path']          = realpath(FCPATH.'assets_frontend/images/bg');
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;
            $config['file_name']			= '1.jpg';
            $config['overwrite']		 	= TRUE; 

             $this->load->library('upload', $config);
            if (! $this->upload->do_upload('gb_jumbotron')) {
    			$error = $this->upload->display_errors();
    			$this->session->set_flashdata('pesan',"<div class='alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show' role='alert'><span class='alert-icon-wrap'><i class='fa fa-times' style='margin-top: -10px'></i></span>
	               	Gambar Gagal Diupdate ,$error
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                    <span aria-hidden='true'>×</span>
	                </button>
	            </div>");
	            $this->output->delete_cache(FCPATH.'assets_frontend/images/bg');
                redirect('home/home_edit');
            	}
            	else
            	{
						$this->session->set_flashdata('pesan','<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Sukses Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
			            $this->output->delete_cache(FCPATH.'assets_frontend/images/bg');
						redirect('home/home_edit');
					}
            	
	}
	
	public function inv_gb_edit_proses()
	{		$config['upload_path']          = realpath(FCPATH.'assets_frontend/images/all');
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;
            $config['file_name']			= '1.jpg';
            $config['overwrite']		 	= TRUE; 

             $this->load->library('upload', $config);
            if (! $this->upload->do_upload('inv_gambar')) {
    			$error = $this->upload->display_errors();
    			$this->session->set_flashdata('pesan1',"<div class='alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show' role='alert'><span class='alert-icon-wrap'><i class='fa fa-times' style='margin-top: -10px'></i></span>
	               	Gambar Gagal Diupdate ,$error
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                    <span aria-hidden='true'>×</span>
	                </button>
	            </div>");
	            $this->output->delete_cache(realpath(FCPATH.'assets_frontend/images/all'));
                redirect('home/home_edit');
            	}
            	else
            	{
				$this->session->set_flashdata('pesan1','<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
	               	Data Sukses Diupdate
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">×</span>
	                </button>
	            </div>');
	            $this->output->delete_cache(realpath(FCPATH.'assets_frontend/images/all'));
				redirect('home/home_edit');
					}
            	
	}

	public function edit_data_project()
	{
		$data = array(
			'inv_proyek_selesai' => $this->input->POST('proyek_selesai'),
			'inv_client' => $this->input->POST('client'),
			'inv_proyek_berjalan' => $this->input->POST('proyek_berjalan'),
		);
		$this->db->where('id','1');
		$this->db->update('t_m_investasi',$data);

		if ($this->db->affected_rows()) {
			$this->session->set_flashdata('pesan2','<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Sukses Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
			redirect('home/home_edit');
		}
		else
		{
			$this->session->set_flashdata('pesan2','<div class="alert alert-inv alert-inv-warning alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Gagal Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit');
		}
	}


	public function edit_video_proses()
	{	$url = 'http://youtube.com/'.$this->input->post('video');
		$data = array(
			'vid_link' 			=> $this->input->POST('video'),
			'vid_narasi' 		=> $this->input->POST('narasi'),
			'vid_youtube_link'	=> $url
		);
		$this->db->where('id','1');
		$this->db->update('t_m_video',$data);

		if ($this->db->affected_rows()) {
			$this->session->set_flashdata('pesan3','<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Sukses Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
			redirect('home/home_edit');
		}
		else
		{
			$this->session->set_flashdata('pesan3','<div class="alert alert-inv alert-inv-warning alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Gagal Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit');
		}
	}
	
	public function faq_delete($id)
	{
		$this->home->delete_faq($id);

		if ($this->db->affected_rows() == 0) {
				$this->session->set_flashdata('pesan4','<div class="alert alert-inv alert-inv-warning alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Gagal Dihapus
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit');
		}
		else
		{
		$this->session->set_flashdata('pesan4','<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Sukses Dihapus
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
			redirect('home/home_edit');
		}
	}


	public function faq_update()
	{	$id = $this->input->POST('id');
		$faq_judul = $this->input->POST('faq_judul');
		$faq_content= $this->input->POST('faq_content') ;

		$faq= array(
				'faq_judul' =>$faq_judul,
				'faq_content'=>$faq_content
				);

		$this->db->where('id',$id);
		$this->db->update('t_m_faq',$faq);
		

		if ($this->db->affected_rows()) {
			$this->session->set_flashdata('pesan4','<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Sukses Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
			redirect('home/home_edit');
		}
		else
		{
			$this->session->set_flashdata('pesan4','<div class="alert alert-inv alert-inv-warning alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Gagal Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit');
		}
	}


	public function faq_add()
	{	$id = $this->input->POST('id');
		$faq_judul = $this->input->POST('faq_judul');
		$faq_content= $this->input->POST('faq_content') ;
					$faq= array(
				'faq_judul' =>$faq_judul,
				'faq_content'=>$faq_content
				);
		$this->db->insert('t_m_faq',$faq);

		if ($this->db->affected_rows()) {
			$this->session->set_flashdata('pesan4','<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Sukses Disimpan
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
			redirect('home/home_edit');
		}
		else
		{
			$this->session->set_flashdata('pesan4','<div class="alert alert-inv alert-inv-warning alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Gagal Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit');
		}
	}

	public function edit_project_thumb()
	{		$id 							= $this->input->POST('id');
			$config['upload_path']          = realpath(FCPATH.'assets/gambar');
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;
            $config['overwrite']		 	= TRUE; 

             $this->load->library('upload', $config);
             
             	if (! $this->upload->do_upload('gambar_thumb')) {
             		$data = array(
            				'id' 	  => $id,
            				'project' => $this->input->POST('project')	
            			);
            			$this->home->update_project_thumb($data);
    			$this->session->set_flashdata('pesan5',"<div class='alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show' role='alert'><span class='alert-icon-wrap'><i class='fa fa-times' style='margin-top: -10px'></i></span>
	               	Gambar Gagal Diupdate 
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                    <span aria-hidden='true'>×</span>
	                </button>
	            </div>");
                redirect('home/home_edit');
            	}
            	elseif( $this->upload->do_upload('gambar_thumb'))
            	{		$filename = base64_encode($this->upload->data('file_name'));
            			$data = array('gambar' => $filename ,
            							'id_kawasan'   => $id);
            			$this->home->update_gambar_thumb($data);

            			$data = array(
            				'id' 	  => $id,
            				'project' => $this->input->POST('project')	
            			);
            			$this->home->update_project_thumb($data);
            			if ($this->db->affected_rows() > 1) {
            				$this->session->set_flashdata('pesan5','<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Sukses Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit');
            			}
            			else
            			{
            			$this->session->set_flashdata('pesan5','<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data gagal update
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit');
            			}
						
					}
             
         }
            
    public function inv_promo_update()
    {
    	$data = array(
    	'inv_title_promo'		=> $this->input->POST('inv_title_promo'),
		'inv_promo_cont1'		=> $this->input->POST('inv_promo_cont1'),
		'inv_promo_cont2'		=> $this->input->POST('inv_promo_cont2'),
		'inv_promo_cont3'		=> $this->input->POST('inv_promo_cont3'),
		'inv_promo_cont4'		=> $this->input->POST('inv_promo_cont4'),
		'inv_promo_title_cont1'	=> $this->input->POST('inv_promo_title_cont1'),
		'inv_promo_title_cont2'	=> $this->input->POST('inv_promo_title_cont2'),
		'inv_promo_title_cont3'	=> $this->input->POST('inv_promo_title_cont3'),
		'inv_promo_title_cont4'	=> $this->input->POST('inv_promo_title_cont4'),	
    	);

    	$this->home->inv_promo_update($data);

    	if ($this->db->affected_rows() > 0) {
    		$this->session->set_flashdata('pesan5','<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Sukses Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit');
    	}
    	else
    	{
    		$this->session->set_flashdata('pesan5','<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data gagal update
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit');
    	}
    }
	


}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */

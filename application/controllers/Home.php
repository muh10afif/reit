<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

	}


	public function index()
	{	$c = $this->session->userdata('site_lang');
		if ($c == 'english' OR $c == NULL) {
			$this->load->model('M_home_en','home');
		}
		else {
			$this->load->model('M_home','home');
		}
		$h = array_values($this->home->get_home()->result());
		$i = array_values($this->home->get_image_inv()->result());
		$f = $this->home->get_faq()->result();
		$v = array_values($this->home->get_video()->result());
		$p = $this->home->get_data_project();
		$p2 = $this->home->get_data_project_2();
		
		$data = array(
			'gb_jumbotron' 			=> base64_decode($h['0']->gb_jumbotron),
			'inv_gambar' 			=> base64_decode($i['0']->inv_gambar) ,
			'facebook'				=> $h['0']->facebook,
			'instagram'				=> $h['0']->instagram,
			'twitter'				=> $h['0']->twitter,
			'title_jumbotron'		=> $h['0']->title_jumbotron,
			'phone_footer'			=> $h['0']->phone_footer,
			'email_footer'			=> $h['0']->email_footer,
			'address_footer'		=> $h['0']->address_footer,
			'berita'				=> $h['0']->berita,
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
			'data_project_thumb_2'	=> $p2,

		);
		$this->load->view('front_end/V_home',$data);
	}

	public function home_edit($id_tab = 1)
	{	$this->load->model('M_home','home');
		$this->load->library('Cek_login_lib');
        $this->cek_login_lib->logged_in();
		$h = array_values($this->home->get_home()->result());
		$i = array_values($this->home->get_image_inv()->result());
		$f = $this->home->get_faq_cms()->result();
		$v = array_values($this->home->get_video()->result());
		$p = $this->home->get_data_project();
		
		$data = array(
			'aktif' 				=> 'home',
			'gb_jumbotron' 			=> base64_decode($h['0']->gb_jumbotron),
			'inv_gambar' 			=> base64_decode($i['0']->inv_gambar) ,
			'disclaimer'			=> $h['0']->disclaimer,
			'facebook'				=> $h['0']->facebook,
			'instagram'				=> $h['0']->instagram,
			'twitter'				=> $h['0']->twitter,
			'title_jumbotron'		=> $h['0']->title_jumbotron,
			'phone_footer'			=> $h['0']->phone_footer,
			'email_footer'			=> $h['0']->email_footer,
			'address_footer'		=> $h['0']->address_footer,
			'berita'				=> $h['0']->berita,
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
			'id_tab'				=> $id_tab

		);

		$this->output->delete_cache(FCPATH.'assets_frontend/images/bg');
		$this->output->delete_cache(FCPATH.'assets_frontend/images/all');
		$this->template->load('template','front_end/v_home_edit',$data);
	}

	public function jumbotron_edit_proses()
	{		$this->load->model('M_home','home');
			$id_tab = $this->input->post('id_tab');
			$config['upload_path']          = realpath(FCPATH.'assets_frontend/images/bg');
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;
            $config['overwrite']			= TRUE;

             $this->load->library('upload', $config);
            if (! $this->upload->do_upload('gb_jumbotron') AND ! $this->input->POST('title') ) {
    			$error = $this->upload->display_errors();
    			$this->session->set_flashdata('pesan',"<div class='alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show' role='alert'><span class='alert-icon-wrap'><i class='fa fa-times' style='margin-top: -10px'></i></span>
	               	Gambar Gagal Diupdate ,$error
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	                    <span aria-hidden='true'>×</span>
	                </button>
	            </div>");
	            $this->output->delete_cache(FCPATH.'assets_frontend/images/bg');
                redirect('home/home_edit/'.$id_tab);
            	}
            	elseif(! $this->upload->do_upload('gb_jumbotron') AND $this->input->POST('title') )
            	{	
            		$data = array(
            				'title_jumbotron' => $this->input->POST('title')
            			);
            			$this->db->where('id','1');
            			$this->db->update('t_m_home',$data);
						$this->session->set_flashdata('pesan','<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Sukses Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
			            $this->output->delete_cache(FCPATH.'assets_frontend/images/bg');
						redirect('home/home_edit/'.$id_tab);
            	}
            	else
            	{		$filename = $this->upload->data('file_name');
            			$data = array(
            				'gb_jumbotron' => base64_encode($filename) ,
            				'title_jumbotron' => $this->input->POST('title')
            			);
            			$this->db->where('id','1');
            			$this->db->update('t_m_home',$data);
						$this->session->set_flashdata('pesan','<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Sukses Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
			            $this->output->delete_cache(FCPATH.'assets_frontend/images/bg');
						redirect('home/home_edit/'.$id_tab);
					}
            	
	}
	
	public function inv_gb_edit_proses()
	{		$id_tab = $this->input->post('id_tab');
			$this->load->model('M_home','home');	
			$config['upload_path']          = realpath(FCPATH.'assets_frontend/images/all');
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10000;
            $config['max_width']            = 10240;
            $config['max_height']           = 7680;
            $config['overwrite']			= TRUE;

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
                redirect('home/home_edit/'.$id_tab);
            	}
            	else
            	{
				$filename = $this->upload->data('file_name');
    			$data = array(
    				'inv_gambar' => base64_encode($filename) ,
    			);
    			$this->db->where('id','1');
    			$this->db->update('t_m_investasi',$data);
				$this->session->set_flashdata('pesan1','<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
	               	Data Sukses Diupdate
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">×</span>
	                </button>
	            </div>');
	            $this->output->delete_cache(realpath(FCPATH.'assets_frontend/images/all'));
				redirect('home/home_edit/'.$id_tab);
					}
            	
	}

	public function edit_data_project()
	{	$this->load->model('M_home','home');
		$id_tab = $this->input->post('id_tab');
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
			redirect('home/home_edit/'.$id_tab);
		}
		else
		{
			 $errNo   = $this->db->_error_number();
   			 $errMess = $this->db->_error_message();
			$this->session->set_flashdata('pesan2','<div class="alert alert-inv alert-inv-warning alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Gagal Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>'.$errNo);
						redirect('home/home_edit/'.$id_tab);
		}
	}


	public function edit_video_proses()
	{	$this->load->model('M_home','home');
		$id_tab = $this->input->post('id_tab');
		$data = array(
			'vid_link' 			=> $this->input->POST('video'),
			'vid_narasi' 		=> $this->input->POST('narasi'),
			'vid_youtube_link'	=> $this->input->POST('yt_link')
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
			redirect('home/home_edit/'.$id_tab);
		}
		else
		{
			$this->session->set_flashdata('pesan3','<div class="alert alert-inv alert-inv-warning alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Gagal Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit/'.$id_tab);
		}
	}
	
	public function faq_delete($id)
	{	$this->load->model('M_home','home');
		$id_tab = $this->input->post('id_tab');
		$this->home->delete_faq($id);

		if ($this->db->affected_rows() == 0) {
				$this->session->set_flashdata('pesan4','<div class="alert alert-inv alert-inv-warning alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Gagal Dihapus
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit/'.$id_tab);
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
	{	$this->load->model('M_home','home');
		$id_tab = $this->input->post('id_tab');
		$id = $this->input->POST('id');
		$faq_judul = $this->input->POST('faq_judul');
		$faq_content= $this->input->POST('faq_content') ;

		$faq= array(
				'faq_judul' =>$faq_judul,
				'faq_content'=>$faq_content,
				'update_at' => date("Y-m-d H:i:s")
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
			redirect('home/home_edit/'.$id_tab);
		}
		else
		{
			$this->session->set_flashdata('pesan4','<div class="alert alert-inv alert-inv-warning alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Gagal Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit/'.$id_tab);
		}
	}


	public function faq_add()
	{	$this->load->model('M_home','home');
		$id_tab = $this->input->post('id_tab');
		$id = $this->input->POST('id');
		$faq_judul = $this->input->POST('faq_judul');
		$faq_content= $this->input->POST('faq_content') ;
					$faq= array(
				'faq_judul' =>$faq_judul,
				'faq_content'=>$faq_content,
				'bahasa' => '1'
				);
		$this->db->insert('t_m_faq',$faq);

		if ($this->db->affected_rows()) {
			$this->session->set_flashdata('pesan4','<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Sukses Disimpan
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
			redirect('home/home_edit/'.$id_tab);
		}
		else
		{
			$this->session->set_flashdata('pesan4','<div class="alert alert-inv alert-inv-warning alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Gagal Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit/'.$id_tab);
		}
	}

	public function edit_project_thumb()
	{		$this->load->model('M_home','home');
			$id_tab = $this->input->post('id_tab');
			$id 							= $this->input->POST('id');
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
                redirect('home/home_edit/'.$id_tab);
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
						redirect('home/home_edit/'.$id_tab);
            			}
            			else
            			{
            			$this->session->set_flashdata('pesan5','<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data gagal update
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit/'.$id_tab);
            			}
						
					}
             
         }
            
    public function inv_promo_update()
    {	$this->load->model('M_home','home');
    	$id_tab = $this->input->post('id_tab');
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
						redirect('home/home_edit/'.$id_tab);
    	}
    	else
    	{
    		$this->session->set_flashdata('pesan5','<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data gagal update
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit/'.$id_tab);
    	}
    }

    public function footer_update()
    {	$this->load->model('M_home','home');
    	$id_tab = $this->input->post('id_tab');
    	$data = array(
    	'phone_footer'		=> $this->input->POST('phone'),
    	'email_footer'		=> $this->input->POST('email'),
    	'address_footer'	=> $this->input->POST('address'),
    	'facebook'			=> $this->input->POST('facebook'),
    	'instagram'			=> $this->input->POST('instagram'),
    	'twitter'			=> $this->input->POST('twitter'),
    	);

    	$this->home->footer_update($data);

    	if ($this->db->affected_rows() > 0) {
    		$this->session->set_flashdata('pesan6','<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Sukses Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit/'.$id_tab);
    	}
    	else
    	{
    		$this->session->set_flashdata('pesan6','<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data gagal update
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit/'.$id_tab);
    	}
    }

    public function berita_update()
    {	$this->load->model('M_home','home');
    	$id_tab = $this->input->post('id_tab');
    	$data = array(
    	'berita'		=> $this->input->POST('berita'),
    	);

    	$this->db->where('id','1');
    	$this->db->update('t_m_home',$data);

    	if ($this->db->affected_rows() > 0) {
    		$this->session->set_flashdata('pesan7','<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Sukses Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit/'.$id_tab);
    	}
    	else
    	{
    		$this->session->set_flashdata('pesan7','<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data gagal update
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit/'.$id_tab);
    	}
    }
	

	public function disclaimer_update()
    {	$this->load->model('M_home','home');
    	$id_tab = $this->input->post('id_tab');
    	$data = array(
    	'disclaimer'		=> $this->input->POST('disclaimer'),
    	);

    	$this->db->where('id','1');
    	$this->db->update('t_m_home',$data);

    	if ($this->db->affected_rows() > 0) {
    		$this->session->set_flashdata('pesan8','<div class="alert alert-inv alert-inv-success alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data Sukses Diupdate
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit/'.$id_tab);
    	}
    	else
    	{
    		$this->session->set_flashdata('pesan7','<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert"><span class="alert-icon-wrap"><i class="fa fa-check" style="margin-top: -10px"></i></span>
			               	Data gagal update
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                    <span aria-hidden="true">×</span>
			                </button>
			            </div>');
						redirect('home/home_edit/'.$id_tab);
    	}
    }

    public function contact()
    {	$this->load->model('M_home','home');
    	$this->load->view('front_end/V_contacts');
    }


    public function disc()
    {	$c = $this->session->userdata('site_lang');
		if ($c == 'english' OR $c == NULL) {
			$this->load->model('M_home_en','home');
		}
		else {
			$this->load->model('M_home','home');
		}	
    	$h = array_values($this->home->get_home()->result());
    	$data = array(
    		'disclaimer'			=> $h['0']->disclaimer,
    		'facebook'				=> $h['0']->facebook,
			'instagram'				=> $h['0']->instagram,
			'twitter'				=> $h['0']->twitter,
			'phone_footer'			=> $h['0']->phone_footer,
			'email_footer'			=> $h['0']->email_footer,
			'address_footer'		=> $h['0']->address_footer,
    	);
    	$this->load->view('front_end/V_disc',$data);
    }


}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */

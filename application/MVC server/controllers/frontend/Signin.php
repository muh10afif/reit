<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
    $this->load->library('form_validation');
		$this->load->model(array('Model_login'));
  
	}

	public function index()
	{ 
		$this->load->library('Cek_login_lib');
    if ($this->session->userdata('masuk') != TRUE ) {
      $this->load->view('front_end/V_signin');
    }
		else{
      redirect('frontend/Prospektus');
    }
	}

	public function cek_login()
	{
    $q = $this->session->userdata('id_prospektus');
		$user  = trim(htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES));
		$pwd   = trim(htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES));
		$cek_username = $this->Model_login->cek_user_login($user);

      // cek apakah username ada di tabel
      if ($cek_username->num_rows() != 0) {

         $p = array();

         // melakukan perulangan bilamana terdapat lebir dari satu username yang sama
         foreach ($cek_username->result_array() as $c) {
            $ac = $c['password'];

            // manampung ke variable array
            array_push($p, $ac);
         
            // melakukan perulangan terhadap array $p
            for ($i = 0; $i < count($p); $i++) {

               $v = password_verify($pwd,$p[$i]);

               // jika password cocok
               if ($v == 1) {
                  // mengecek akun anda aktif atau tidak
                if ($c['aktif'] == 1) {

                    if($c['level'] == "3" AND $this->session->userdata('id_prospektus') != NULL){

                      $array = array(
                          'level'     => $c['nama_level'],
                          'masuk'     => TRUE,
                          'username'  => $c['username'],
                          'nama'      => $c['nama_pengguna']
                       );
                       
                       $this->session->set_userdata( $array );

                       redirect('frontend/Prospektus/detail_prospektus/'.$q);

                   } elseif ($c['level'] == "3"){

                      $array = array(
                            'level'     => $c['nama_level'],
                            'masuk'     => TRUE,
                            'username'  => $c['username'],
                            'nama'      => $c['nama_pengguna']
                         );
                         
                         $this->session->set_userdata( $array );

                         redirect('frontend/Prospektus');

                   } elseif ($c['level'] == "1" OR $c['level'] == "2" OR $c['level'] == "5") {

                        $array = array(
                            'level'       => $c['nama_level'],
                            'masuk'       => TRUE,
                            'username'    => $c['username'],
                            'nama'        => $c['nama_pengguna'],
                            'foto'        => $c['foto'],
                            'id_pengguna' => $c['id_pengguna']
                         );
                     
                       $this->session->set_userdata( $array );

                       redirect('Prospektus');

                   } elseif ($c['level'] == "6") {

                        $array = array(
                          'level'       => $c['nama_level'],
                          'masuk'       => TRUE,
                          'username'    => $c['username'],
                          'nama'        => $c['nama_pengguna'],
                          'id_pengguna' => $c['id_pengguna']
                       );
                       
                       $this->session->set_userdata( $array );

                       redirect('Prospektus/kontributor');

                   } else {

                     $this->session->set_flashdata('pesan', '<div class="alert  alert-danger alert-wth-icon alert-dismissible fade show" role="alert">
                        <span class="alert-icon-wrap"><i class="fa fa-user-times" style="margin-top: -10px"></i></span> Login failed!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        </div>');

                      redirect('frontend/Signin');

                   }
                  
                // akhir cek aktif atau tidak
                } else {
                   $this->session->set_flashdata('pesan', '<div class="alert  alert-danger alert-wth-icon alert-dismissible fade show" role="alert">
                      <span class="alert-icon-wrap"><i class="fa fa-user-times" style="margin-top: -10px"></i></span> Login failed! Akun anda belum AKTIF!
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                      </div>');

                    redirect('frontend/Signin');
                }
               // jika password tidak cocok, tatapi langsung di reset ke index awal array
               } elseif ($v == 0) {
                  reset($p);

               }/*akhir if*/

            }/*akhir for*/

         }/*akhir foreach*/

         // jika password salah
         $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert">
                <span class="alert-icon-wrap"><i class="fa fa-key" style="margin-top: -10px"></i></span> Password salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');
               
         $this->session->set_flashdata('username', $user);

         redirect('frontend/Signin');

      // jika username tidak ada pada tabel
      } else {
         $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert">
                <span class="alert-icon-wrap"></span> Username tidak temukan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');
         
            redirect('frontend/Signin');
      }

	}
  public function register()
  { $data = array('nama' => set_value('nama'),
    'username' => set_value('username'),
    'password' => set_value('password'),
    'level'    => set_value('level'),
    'email'    => set_value('email')
                    );
    $this->load->view('front_end/V_register',$data);
  }

  public function register_proses()
  {
    $this->load->library('email');
    $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
    $this->form_validation->set_rules('nama','nama','required');
    $this->form_validation->set_rules('username','username','required|min_length[6]|is_unique[pengguna.username]',
      array('is_unique' => 'Username already exist')
    );
    $this->form_validation->set_rules('password','password','required|min_length[6]|alpha_numeric');
    $this->form_validation->set_rules('confirm_password', 'confirm_password', 'required|matches[password]',
   array('matches' => 'Password confirmation does not match'));
    if ($this->form_validation->run() == FALSE) {
       
       $this->register();
    }
    else
    {
      $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $code = substr(str_shuffle($set), 0, 12);

      $data = array(
        'nama_pengguna' => $this->input->POST('nama'),
        'username'      => $this->input->POST('username'),
        'password'      => password_hash($this->input->POST('password'), PASSWORD_DEFAULT),
        'level'         => $this->input->POST('level'),
        'email'         => $this->input->POST('email'),
        'aktif'        => "1",
        'code'          => $code
      );

      $id = $this->Model_login->register($data);
      $id_pengguna = $this->db->insert_id();
      $this->load->library('email');
      //set up email
      $config = array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_user' => 'yogi.pranoto26@gmail.com', // change it to yours
          'smtp_pass' => '5692621997', // change it to yours
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE
      );

      $message =  "
            <html>
            <head>
              <title>Verification Code</title>
            </head>
            <body>
              <h2>Thank you for Register.</h2>
              <p>Your Account:</p>
              <p>Email: ".$data['email']."</p>
              <p>Password: ".$data['password']."</p>
              <p>Please click the link below to activate your account.</p>
              <h4><a href='".base_url()."frontend/Signin/activate/".$id_pengguna."/".$data['code']."'>Activate My Account</a></h4>
            </body>
            </html>
            ";
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($config['smtp_user']);
        $this->email->to($data['email']);
        $this->email->subject('Signup Verification Email');
        $this->email->message($message);
         //sending email
        if($this->email->send()){
          $this->session->set_flashdata('message','<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert">
                <span class="alert-icon-wrap"></span> Activation code sent to email
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');
        }
        else{
          $this->session->set_flashdata('message', $this->email->print_debugger());
   
        }

          redirect('frontend/Signin/register');
    }

  }

  public function activate(){
    $id =  $this->uri->segment(4);
    $code = $this->uri->segment(5);

    //fetch user details
    $user = $this->Model_login->getUser($id);

    //if code matches
    if($user['code'] == $code){
      //update user active status
      $data['aktif'] = "2";
      $query = $this->Model_login->activate($data, $id);

      if($query){
        $this->session->set_flashdata('message', '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert">
                <span class="alert-icon-wrap"></span> User activated successfully
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');
      }
      else{
        $this->session->set_flashdata('message', '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert">
                <span class="alert-icon-wrap"></span> Something went wrong in activating account
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');
      }
    }
    else{
      $this->session->set_flashdata('message', '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert">
                <span class="alert-icon-wrap"></span> Cannot activate account. Code didnt match
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');
    }

    redirect('frontend/Signin/register');

  }

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('frontend/Signin');
	}

 
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
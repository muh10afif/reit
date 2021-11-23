<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('Model_login'));
	}

	public function index()
	{
			$this->load->library('Cek_login_lib');
    	$this->cek_login_lib->logged_in_2();
    	
		$this->load->view('login/V_login');
	}

	public function cek_login()
	{
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
                  $array = array(
                        'level'     => $c['nama_level'],
                        'masuk'     => TRUE,
                        'username'  => $c['username'],
                        'nama'      => $c['nama_pengguna']
                     );
                     
                     $this->session->set_userdata( $array );

                     redirect('prospektus');

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

         redirect('login');

      // jika username tidak ada pada tabel
      } else {
         $this->session->set_flashdata('pesan', '<div class="alert alert-inv alert-inv-danger alert-wth-icon alert-dismissible fade show" role="alert">
                <span class="alert-icon-wrap"><i class="fa fa-user-times" style="margin-top: -10px"></i></span> Username tidak temukan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>');
         
            redirect('login');
      }

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('frontend/Signin');
	}

  public function tes()
   {
      $a = password_hash('siap', PASSWORD_DEFAULT);
      echo $a;
      /*$a = '$2y$10$c4ANBK0QgzlhxvhAo007v.BQu8Z9UspJ5K0CSwMX9vTOhupwhbNFa';

      if (password_verify('manager', $a)) {
         echo 'Password is valid';
      } else {
         echo 'Invalid Password';
      }*/

   }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_login_lib
{
    public function logged_in()
    {
        $_this =& get_instance();
        if ($_this->session->userdata('masuk') != TRUE) {
            redirect('frontend/Signin','refresh');
        }
    }

    public function logged_in_2()
    {
        $_this =& get_instance();
        if ($_this->session->userdata('masuk') == TRUE) {
            redirect('prospektus','refresh');
        }
    }

    public function logged_in_3()
    {
        $_this =& get_instance();
        if ($_this->session->userdata('masuk') == TRUE && $_this->session->userdata('level') != 'investor'){
             redirect('Prospektus','refresh');
        }
    }

      public function logged_in_4($id_prospektus)
    {
        $_this =& get_instance();
        $id_prospektus = $id_prospektus;
        if ($_this->session->userdata('masuk') != TRUE) {
            $_this->session->set_userdata('id_prospektus',$id_prospektus);
            redirect('frontend/Signin','refresh');
        }
    }
}
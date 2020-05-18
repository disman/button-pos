<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index()
    {
        already_login();
        $this->load->view('login');
    }

    public function proccess()
    {
        $post = $this->input->post(null, true);

        if (isset($post['login'])) {
            $query = $this->user_model->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = [
                    'user_id' => $row->user_id,
                    'name'    => $row->name,
                    'address' => $row->address,
                    'level'  => $row->level
                ];
                $this->session->set_userdata($params);
                echo "<script>
               alert('Selamat, login berhasil');
               window.location='" . site_url('dashboard') . "';
            </script>";
            } else {
                echo "<script>
               alert('Login gagal');
               window.location='" . site_url('auth') . "';
            </script>";
            }
        }
    }

    public function logout()
    {
        $params = ['user_id', 'level'];
        $this->session->unset_userdata($params);
        redirect('auth');
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        not_login();
    }

    public function index()
    {
        $data['user'] = $this->user_model->get();
        $data['title'] = "User";
        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar');
        $this->load->view('user/index', $data);
        $this->load->view('_partials/footer');
    }

    public function add()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('fullname', 'Full name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == true) {
            $post = $this->input->post(null, true);
            $this->user_model->add($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data user berhasil ditambahkan!</div>');
            redirect('user');
        } else {
            $data['title'] = "Add user";
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar');
            $this->load->view('user/add', $data);
            $this->load->view('_partials/footer');
        }
    }

    public function delete($id = null)
    {
        if (!isset($id))
            show_404();
        $delete = $this->user_model->delete($id);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data user berhasil dihapus!</div>');
            redirect('user');
        }
    }
}

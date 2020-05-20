<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('supplier_model');
        not_login();
    }

    public function index()
    {
        $data['supplier'] = $this->supplier_model->get();
        $data['title'] = "Supplier";
        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar');
        $this->load->view('supplier/index', $data);
        $this->load->view('_partials/footer');
    }

    public function add()
    {
        $supplier = new stdClass();
        $supplier->supplier_id = null;
        $supplier->name = null;
        $supplier->phone = null;
        $supplier->address = null;
        $supplier->description = null;
        $data = array(
            'page' => 'add',
            'row' => $supplier
        );
        $data['title'] = "Add supplier";
        $this->load->view('_partials/header', $data);
        $this->load->view('_partials/sidebar');
        $this->load->view('supplier/supplier_form', $data);
        $this->load->view('_partials/footer');
    }

    public function edit($id)
    {
        $query = $this->supplier_model->get($id);
        if ($query->num_rows() > 0) {
            $supplier = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $supplier
            );
            $data['title'] = "Edit supplier";
            $this->load->view('_partials/header', $data);
            $this->load->view('_partials/sidebar');
            $this->load->view('supplier/supplier_form', $data);
            $this->load->view('_partials/footer');
        } else {
            echo "<script>alert('Data tidak ditemukan')";
            echo "window.location='" . site_url('supplier') . "'</script>";
        }
    }

    public function proccess()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->supplier_model->add($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fa fa-check"></i> Data berhasil ditambahkan!</div>');
            redirect('supplier');
        } else if (isset($_POST['edit'])) {
            $this->supplier_model->edit($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fa fa-check"></i> Data berhasil diupdate!</div>');
            redirect('supplier');
        }
    }

    public function delete($id = null)
    {
        if (!isset($id))
            show_404();
        $delete = $this->supplier_model->delete($id);

        if ($delete) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fa fa-check"></i> Data berhasil dihapus!</div>');
            redirect('supplier');
        }
    }
}

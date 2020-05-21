<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      not_login();
      $this->load->model('customer_model');
   }

   public function index()
   {
      $data['customer'] = $this->customer_model->get();
      $data['title'] = "Customer";
      $this->load->view('_partials/header', $data);
      $this->load->view('_partials/sidebar');
      $this->load->view('customer/index', $data);
      $this->load->view('_partials/footer');
   }

   public function add()
   {
      $customer = new stdClass();
      $customer->customer_id = null;
      $customer->name = null;
      $customer->gender = null;
      $customer->phone = null;
      $customer->address = null;
      $data = array(
         'page' => 'add',
         'row' => $customer
      );
      $data['title'] = "Add customer";
      $this->load->view('_partials/header', $data);
      $this->load->view('_partials/sidebar');
      $this->load->view('customer/customer_form', $data);
      $this->load->view('_partials/footer');
   }

   public function edit($id)
   {
      $query = $this->customer_model->get($id);
      if ($query->num_rows() > 0) {
         $customer = $query->row();
         $data = array(
            'page' => 'edit',
            'row' => $customer
         );
         $data['title'] = "Edit customer";
         $this->load->view('_partials/header', $data);
         $this->load->view('_partials/sidebar');
         $this->load->view('customer/customer_form', $data);
         $this->load->view('_partials/footer');
      } else {
         echo "<script>alert('Data tidak ditemukan')";
         echo "window.location='" . site_url('customer') . "'</script>";
      }
   }

   public function proccess()
   {
      $post = $this->input->post(null, true);
      if (isset($_POST['add'])) {
         $this->customer_model->add($post);
         $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
         redirect('customer');
      } else if (isset($_POST['edit'])) {
         $this->customer_model->edit($post);
         $this->session->set_flashdata('success', 'Data berhasil diupdate!');
         redirect('customer');
      }
   }

   public function delete($id = null)
   {
      if (!isset($id))
         show_404();
      $delete = $this->customer_model->delete($id);

      if ($delete) {
         $this->session->set_flashdata('success', 'Data berhasil dihapus!');
         redirect('customer');
      }
   }
}

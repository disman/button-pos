<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('unit_model');
      not_login();
   }

   public function index()
   {
      $data['unit'] = $this->unit_model->get();
      $data['title'] = "Unit";
      $this->load->view('_partials/header', $data);
      $this->load->view('_partials/sidebar');
      $this->load->view('product/unit/index', $data);
      $this->load->view('_partials/footer');
   }

   public function add()
   {
      $unit = new stdClass();
      $unit->unit_id = null;
      $unit->name = null;
      $data = array(
         'page' => 'add',
         'row' => $unit
      );
      $data['title'] = "Add unit";
      $this->load->view('_partials/header', $data);
      $this->load->view('_partials/sidebar');
      $this->load->view('product/unit/unit_form', $data);
      $this->load->view('_partials/footer');
   }

   public function edit($id)
   {
      $query = $this->unit_model->get($id);
      if ($query->num_rows() > 0) {
         $unit = $query->row();
         $data = array(
            'page' => 'edit',
            'row' => $unit
         );
         $data['title'] = "Edit unit";
         $this->load->view('_partials/header', $data);
         $this->load->view('_partials/sidebar');
         $this->load->view('product/unit/unit_form', $data);
         $this->load->view('_partials/footer');
      } else {
         echo "<script>alert('Data tidak ditemukan')";
         echo "window.location='" . site_url('unit') . "'</script>";
      }
   }

   public function proccess()
   {
      $post = $this->input->post(null, true);
      if (isset($_POST['add'])) {
         $this->unit_model->add($post);
         $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
         redirect('unit');
      } else if (isset($_POST['edit'])) {
         $this->unit_model->edit($post);
         $this->session->set_flashdata('success', 'Data berhasil diupdate!');
         redirect('unit');
      }
   }

   public function delete($id = null)
   {
      if (!isset($id))
         show_404();
      $delete = $this->unit_model->delete($id);

      if ($delete) {
         $this->session->set_flashdata('success', 'Data berhasil dihapus!');
         redirect('unit');
      }
   }
}

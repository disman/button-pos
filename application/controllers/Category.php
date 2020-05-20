<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('category_model');
      not_login();
   }

   public function index()
   {
      $data['category'] = $this->category_model->get();
      $data['title'] = "Category";
      $this->load->view('_partials/header', $data);
      $this->load->view('_partials/sidebar');
      $this->load->view('product/category/index', $data);
      $this->load->view('_partials/footer');
   }

   public function add()
   {
      $category = new stdClass();
      $category->category_id = null;
      $category->name = null;
      $data = array(
         'page' => 'add',
         'row' => $category
      );
      $data['title'] = "Add category";
      $this->load->view('_partials/header', $data);
      $this->load->view('_partials/sidebar');
      $this->load->view('product/category/category_form', $data);
      $this->load->view('_partials/footer');
   }

   public function edit($id)
   {
      $query = $this->category_model->get($id);
      if ($query->num_rows() > 0) {
         $category = $query->row();
         $data = array(
            'page' => 'edit',
            'row' => $category
         );
         $data['title'] = "Edit category";
         $this->load->view('_partials/header', $data);
         $this->load->view('_partials/sidebar');
         $this->load->view('product/category/category_form', $data);
         $this->load->view('_partials/footer');
      } else {
         echo "<script>alert('Data tidak ditemukan')";
         echo "window.location='" . site_url('category') . "'</script>";
      }
   }

   public function proccess()
   {
      $post = $this->input->post(null, true);
      if (isset($_POST['add'])) {
         $this->category_model->add($post);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fa fa-check"></i> Data berhasil ditambahkan!</div>');
         redirect('category');
      } else if (isset($_POST['edit'])) {
         $this->category_model->edit($post);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fa fa-check"></i> Data berhasil diupdate!</div>');
         redirect('category');
      }
   }

   public function delete($id = null)
   {
      if (!isset($id))
         show_404();
      $delete = $this->category_model->delete($id);

      if ($delete) {
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fa fa-check"></i> Data berhasil dihapus!</div>');
         redirect('category');
      }
   }
}

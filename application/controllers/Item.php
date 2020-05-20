<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      not_login();
      $this->load->model(['item_model', 'category_model', 'unit_model']);
   }

   public function index()
   {
      $data['item'] = $this->item_model->get();
      $data['title'] = "Product item";
      $this->load->view('_partials/header', $data);
      $this->load->view('_partials/sidebar');
      $this->load->view('product/item/index', $data);
      $this->load->view('_partials/footer');
   }

   public function add()
   {
      $item = new stdClass();
      $item->item_id = null;
      $item->barcode = null;
      $item->name = null;
      $item->price = null;
      $item->category_id = null;

      $query_category = $this->category_model->get();
      $query_unit = $this->unit_model->get();
      $unit[null] = '- Select Unit -';
      foreach ($query_unit->result() as $row) {
         $unit[$row->unit_id] = $row->name;
      }

      $data = array(
         'page' => 'add',
         'row' => $item,
         'category' => $query_category,
         'unit' => $unit, 'selected_unit' => null
      );
      $data['title'] = "Add product";
      $this->load->view('_partials/header', $data);
      $this->load->view('_partials/sidebar');
      $this->load->view('product/item/item_form', $data);
      $this->load->view('_partials/footer');
   }

   public function edit($id)
   {
      $query = $this->item_model->get($id);
      if ($query->num_rows() > 0) {
         $item = $query->row();

         $query_category = $this->category_model->get();
         $query_unit = $this->unit_model->get();
         $unit[null] = '- Select Unit -';
         foreach ($query_unit->result() as $row) {
            $unit[$row->unit_id] = $row->name;
         }

         $data = array(
            'page' => 'edit',
            'row' => $item,
            'category' => $query_category,
            'unit' => $unit, 'selected_unit' => $item->unit_id
         );
         $data['title'] = "Edit product";
         $this->load->view('_partials/header', $data);
         $this->load->view('_partials/sidebar');
         $this->load->view('product/item/item_form', $data);
         $this->load->view('_partials/footer');
      } else {
         echo "<script>alert('Data tidak ditemukan')";
         echo "window.location='" . site_url('item') . "'</script>";
      }
   }

   public function proccess()
   {
      $post = $this->input->post(null, true);
      if (isset($_POST['add'])) {
         if ($this->item_model->check_barcode($post['barcode'])->num_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon fa fa-ban"></i> Barcode ' . $post['barcode'] . ' sudah dipakai barang lain!</div>');
            redirect('item');
         } else {
            $this->item_model->add($post);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fa fa-check"></i> Data berhasil ditambahkan!</div>');
            redirect('item');
         }
      } else if (isset($_POST['edit'])) {
         $this->item_model->edit($post);
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fa fa-check"></i> Data berhasil diupdate!</div>');
         redirect('item');
      }
   }

   public function delete($id = null)
   {
      if (!isset($id))
         show_404();
      $delete = $this->item_model->delete($id);

      if ($delete) {
         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i class="icon fa fa-check"></i> Data berhasil dihapus!</div>');
         redirect('item');
      }
   }
}

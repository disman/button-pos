<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      not_login();
      $this->load->model(['item_model', 'supplier_model', 'stock_model']);
   }

   public function stock_in_data()
   {
      $data['title'] = "Stock in data";
      $this->load->view('_partials/header', $data);
      $this->load->view('_partials/sidebar');
      $this->load->view('transaction/stock_in/stock_in_data');
      $this->load->view('_partials/footer');
   }

   public function stock_in_add()
   {
      $item = $this->item_model->get()->result();
      $supplier = $this->supplier_model->get()->result();
      $data = ['item' => $item, 'supplier' => $supplier];
      $data['title'] = "Stock in add";
      $this->load->view('_partials/header', $data);
      $this->load->view('_partials/sidebar');
      $this->load->view('transaction/stock_in/stock_in_form', $data);
      $this->load->view('_partials/footer');
   }

   public function proccess()
   {
      if (isset($_POST['in_add'])) {
         $post = $this->input->post(null, true);
         $this->stock_model->add_stock_in($post);
         $this->item_model->update_stock_in($post);
         $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
      }
      redirect('stock/in');
   }
}

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
      $config['upload_path'] = 'images/product/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $config['max_size'] = 2048;
      $config['file_name'] = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
      $this->load->library('upload', $config);
      $post = $this->input->post(null, true);
      if (isset($_POST['add'])) {
         if ($this->item_model->check_barcode($post['barcode'])->num_rows() > 0) {
            $this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain!");
            redirect('item/add');
         } else {
            if (@$_FILES['image']['name'] != null) {
               if ($this->upload->do_upload('image')) {
                  $post['image'] = $this->upload->data('file_name');
                  $this->item_model->add($post);
                  $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
                  redirect('item');
               } else {
                  $error = $this->upload->display_errors();
                  $this->session->set_flashdata('error', $error);
                  redirect('item/add');
               }
            } else {
               $post['image'] = null;
               $this->item_model->add($post);
               $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
               redirect('item');
            }
         }
      } else if (isset($_POST['edit'])) {
         if ($this->item_model->check_barcode($post['barcode'], $post['id'])->num_rows() > 0) {
            $this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain!");
            redirect('item/edit/' . $post['id']);
         } else {

            if (@$_FILES['image']['name'] != null) {
               if ($this->upload->do_upload('image')) {
                  $item = $this->item_model->get($post['id'])->row();
                  if ($item->image != null) {
                     $target_file = './images/product/' . $item->image;
                     unlink($target_file);
                  }

                  $post['image'] = $this->upload->data('file_name');
                  $this->item_model->edit($post);
                  $this->session->set_flashdata('success', 'Data berhasil diupdate!');
                  redirect('item');
               } else {
                  $error = $this->upload->display_errors();
                  $this->session->set_flashdata('success', $error);
                  redirect('item/add');
               }
            } else {
               $post['image'] = null;
               $this->item_model->edit($post);
               $this->session->set_flashdata('success', 'Data berhasil diupdate!');
               redirect('item');
            }
         }
      }
   }

   public function delete($id = null)
   {
      $item = $this->item_model->get($id)->row();
      if ($item->image != null) {
         $target_file = './images/product/' . $item->image;
         unlink($target_file);
      }

      if (!isset($id))
         show_404();
      $delete = $this->item_model->delete($id);

      if ($delete) {
         $this->session->set_flashdata('success', 'Data berhasil dihapus!');
         redirect('item');
      }
   }

   public function barcode_generator($id)
   {
      $data['item'] = $this->item_model->get($id)->row();
      $data['title'] = "Barcode generator";
      $this->load->view('_partials/header', $data);
      $this->load->view('_partials/sidebar');
      $this->load->view('product/item/barcode_generator', $data);
      $this->load->view('_partials/footer');
   }

   public function qrcode()
   {
      $qrCode = new Endroid\QrCode\QrCode('12345');
      header('Content-Type: ' . $qrCode->getContentType());
      echo $qrCode->writeString();
   }
}

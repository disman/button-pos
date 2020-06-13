<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item_model extends CI_Model
{
   private $_table   = 'p_item';
   private $_primary = 'item_id';


   public function get($id = null)
   {
      $this->db->select('p_item.*, p_category.name as category_name, p_unit.name as unit_name');
      $this->db->from($this->_table);
      $this->db->join('p_category', 'p_category.category_id = p_item.category_id');
      $this->db->join('p_unit', 'p_unit.unit_id = p_item.unit_id');
      if ($id != null) {
         $this->db->where($this->_primary, $id);
      }
      $this->db->order_by('barcode', 'asc');
      $query = $this->db->get();
      return $query;
   }

   public function add($post)
   {
      $params = [
         'barcode' => $post['barcode'],
         'name' => $post['product_name'],
         'category_id' => $post['category'],
         'unit_id' => $post['unit'],
         'price' => $post['price'],
         'image' => $post['image']
      ];
      $this->db->insert($this->_table, $params);
   }

   public function check_barcode($barcode, $id = null)
   {
      $this->db->from($this->_table);
      $this->db->where('barcode', $barcode);
      if ($id != null) {
         $this->db->where('item_id !=', $id);
      }
      $query = $this->db->get();
      return $query;
   }

   public function edit($post)
   {
      $params = [
         'barcode' => $post['barcode'],
         'name' => $post['product_name'],
         'category_id' => $post['category'],
         'unit_id' => $post['unit'],
         'price' => $post['price'],
         'updated' => date('Y-m-d H:i:s')
      ];
      if ($post['image'] != null) {
         $params['image'] = $post['image'];
      }
      $this->db->where($this->_primary, $post['id']);
      $this->db->update($this->_table, $params);
   }

   public function delete($id)
   {
      return $this->db->delete($this->_table, [$this->_primary => $id]);
   }

   public function update_stock_in($data)
   {
      $qty = $data['qty'];
      $id = $data['item_id'];
      $sql = "UPDATE p_item SET stock = stock + '$qty' WHERE item_id = '$id'";
      $this->db->query($sql);
   }
}

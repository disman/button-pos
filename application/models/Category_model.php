<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
   private $_table   = 'p_category';
   private $_primary = 'category_id';


   public function get($id = null)
   {
      $this->db->from($this->_table);
      if ($id != null) {
         $this->db->where($this->_primary, $id);
      }
      $query = $this->db->get();
      return $query;
   }

   public function add($post)
   {
      $params = [
         'name' => $post['category_name'],
      ];
      $this->db->insert($this->_table, $params);
   }

   public function edit($post)
   {
      $params = [
         'name' => $post['category_name'],
         'updated' => date('Y-m-d H:i:s')
      ];
      $this->db->where($this->_primary, $post['id']);
      $this->db->update($this->_table, $params);
   }

   public function delete($id)
   {
      return $this->db->delete($this->_table, [$this->_primary => $id]);
   }
}

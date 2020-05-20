<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
   private $_table   = 'user';
   private $_primary = 'user_id';

   public function login($post)
   {
      $this->db->select('*');
      $this->db->from($this->_table);
      $this->db->where('username', $post['username']);
      $this->db->where('password', sha1($post['password']));
      $query = $this->db->get();
      return $query;
   }

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
      $fullname = $this->input->post('fullname');
      $username = $this->input->post('username');
      $password = sha1($this->input->post('password'));
      $address = $this->input->post('address');
      $level = $this->input->post('level');
      $post = [
         'name' => $fullname,
         'username' => $username,
         'password' => $password,
         'address' => $address,
         'level' => $level
      ];
      $this->db->insert($this->_table, $post);
   }

   public function delete($id)
   {
      return $this->db->delete($this->_table, [$this->_primary => $id]);
   }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier_model extends CI_Model
{
    private $_table   = 'supplier';
    private $_primary = 'supplier_id';


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
            'name' => $post['supplier_name'],
            'phone' => $post['phone'],
            'address' => $post['addr'],
            'description' => empty($post['desc']) ? null : $post['desc']
        ];
        $this->db->insert($this->_table, $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['supplier_name'],
            'phone' => $post['phone'],
            'address' => $post['addr'],
            'description' => empty($post['desc']) ? null : $post['desc'],
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

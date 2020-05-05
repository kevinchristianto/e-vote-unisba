<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Model {
    private $tablename = 'kelas';
    
    function get_by_cond($cond) {
        $get = $this->db->get_where($this->tablename, $cond);

        return $get->result_array();
    }

    function insert($data) {
        $insert = $this->db->insert($this->tablename, $data);

        if ($insert) {
            return ['success' => 1];
        } else {
            return ['success' => 0];
        }
    }

    function delete($id) {
        $delete = $this->db->delete($this->tablename, $id);

        if ($delete) {
            return ['success' => 1];
        } else {
            return ['success' => 0];
        }
    }

    function update($cond, $data) {
        $this->db->where($cond);
        $update = $this->db->update($this->tablename, $data);

        if ($update) {
            return ['success' => 1];
        } else {
            return ['success' => 0];
        }
    }

}
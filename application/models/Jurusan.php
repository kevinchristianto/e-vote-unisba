<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Model {
    private $tablename = 'jurusan';
    
    function get() {
        $get = $this->db->get($this->tablename);

        return $get->result();
    }

    function get_where($id) {
        $get = $this->db->get_where($this->tablename, $id);

        if ($get->num_rows() > 0) {
            return ['success' => 1, 'data' => $get->row_array()];
        } else {
            return ['success' => 0];
        }
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
        if ($this->db->delete($this->tablename, $id)) {
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
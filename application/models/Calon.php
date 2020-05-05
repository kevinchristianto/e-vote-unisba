<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calon extends CI_Model {
    private $tablename = 'calon';
    
    function get() {
        $this->db->select('*')
                ->from($this->tablename)
                ->join('kelas', 'kelas.id_kelas = calon.kelas')
                ->join('jurusan', 'jurusan.id_jurusan = kelas.jurusan');
        $get = $this->db->get();

        return $get->result();
    }

    function get_by_cond($cond) {
        $this->db->select('*')
                ->from($this->tablename)
                ->join('kelas', 'kelas.id_kelas = calon.kelas')
                ->join('jurusan', 'jurusan.id_jurusan = kelas.jurusan')
                ->where($cond);
        $get = $this->db->get();

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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Model {
    private $tablename = 'jurusan';
    
    function get() {
        $get = $this->db->get($this->tablename);

        return $get->result();
    }

}
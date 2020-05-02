<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->has_userdata('username')) {
            redirect(base_url('/login'));
        }

        $this->load->model('Jurusan', 'jurusan');
        // $this->load->model('Kelas', 'kelas');
    }

    function index() {
        $page_data = [
            'title' => 'Dashboard',
            'page' => 'admin/dashboard',
            'dashboard' => 'active'
        ];

        return $this->load->view('layout/dashboard', $page_data);
    }

    function index_jurusan() {
        $page_data = [
            'title' => 'Kelola Jurusan',
            'jurusan' => 'active',
            'page' => 'admin/jurusan',
            'data' => $this->jurusan->get()
        ];

        return $this->load->view('layout/dashboard', $page_data);
    }

}

// function random_str(
//     int $length = 64,
//     string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
// ): string {
//     if ($length < 1) {
//         throw new RangeException("Length must be a positive integer");
//     }
//     $pieces = [];
//     $max = mb_strlen($keyspace, '8bit') - 1;
//     for ($i = 0; $i < $length; ++$i) {
//         $pieces []= $keyspace[random_int(0, $max)];
//     }
//     return implode('', $pieces);
// }

// echo random_str(8);
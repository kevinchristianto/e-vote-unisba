<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    function __construct() {
        parent::__construct();

        // if ($this->session->userdata('username')) {
        //     redirect(base_url('menu/dashboard'));
        // }

        $this->load->model('User', 'user');
    }

    function index() {
        $this->load->view('layout/public');
    }

    function login() {
        if ($this->session->userdata('username')) {
            redirect(base_url('menu/dashboard'));
        } else {
            $this->load->view('login');
        }
    }

    function auth() {
        $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        ];
        $check = $this->user->auth($data);

        if ($check['success']) {
            $session = [
                'username' => $check['data']['username'],
                'admin' => $check['data']['nama_admin'],
                'superuser' => $check['data']['is_superuser']
            ];
            $this->session->set_userdata($session);

            redirect(base_url('menu/dashboard'));
        } else if ($check['error'] == 'username') {
            $this->session->set_flashdata('error', 'Username yang anda masukkan salah');
            redirect(base_url('login'));
        } else if ($check['error'] == 'password') {
            $this->session->set_flashdata('error', 'Password yang anda masukkan salah');
            redirect(base_url('login'));
        } else if ($check['error'] == 'inactive') {
            $this->session->set_flashdata('error', 'Akun anda tidak aktif');
            redirect(base_url('login'));
        }
    }

    function register() {
        if ($this->session->userdata('username')) {
            redirect(base_url('menu/dashboard'));
        } else {
            $this->load->view('register');
        }
    }

    function proceed_registration() {

    }

}
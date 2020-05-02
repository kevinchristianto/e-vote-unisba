<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
    
    function auth($data) {
        // Pemilih data
        $data_pemilih = [
            'email' => $data['username']
        ];
        // Admin data
        $data_admin = [
            'username' => $data['username']
        ];

        // Pemilih check
        $check_pemilih = $this->db->get_where('pemilih', $data_pemilih);
        // Admin check
        $check_admin = $this->db->get_where('user', $data_admin);

        if ($check_pemilih->num_rows() == 1) {              // Check if pemilih found
            $pemilih = $check_pemilih->row_array();

            if (password_verify($data['password'], $pemilih['password'])) {         // Check if password true
                if ($pemilih['is_active'] == 1) {
                    $deactivate = $this->update_pemilih(['npm' => $pemilih['npm']], ['is_active' => 0]);

                    if ($deactivate) {                      // Check if deactivate success
                        return [
                            'success' => 0,
                            'error' => 'deactivate'
                        ];
                    } else {
                        return [
                            'success' => 1,
                            'data' => $pemilih
                        ];
                    }
                } else {
                    return [
                        'success' => 0,
                        'error' => 'inactive'
                    ];
                }
            } else {
                return [
                    'success' => 0,
                    'error' => 'password'
                ];
            }
        } else if ($check_admin->num_rows() == 1) {                 // Check if admin found
            $admin = $check_admin->row_array();

            if (password_verify($data['password'], $admin['password'])) {               // Check if password true
                return [
                    'success' => 1,
                    'data' => $admin
                ];
            } else {
                return [
                    'success' => 0,
                    'error' => 'password'
                ];
            }
        } else {
            return [
                'success' => 0,
                'error' => 'username'
            ];
        }
    }

    function update_pemilih($npm, $data_update) {
        $where = $this->db->where($npm);
        $update = $this->db->update('pemilih', $data_update);

        if ($update) {
            return 1;
        } else {
            return 0;
        }
    }

}
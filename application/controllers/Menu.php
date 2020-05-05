<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->has_userdata('username')) {
            redirect(base_url('/login'));
        }

        $this->load->model('Jurusan', 'jurusan');
        $this->load->model('Kelas', 'kelas');
        $this->load->model('Calon', 'calon');
    }

    function set_flash($key = '', $msg = '') {
        $this->session->set_flashdata($key, $msg);
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

    function insert_jurusan() {
        $data = [
            'id_jurusan' => $this->input->post('id'),
            'nama_jurusan' => $this->input->post('nama')
        ];
        $insert = $this->jurusan->insert($data);

        if ($insert['success']) {
            $this->set_flash('success', 'Jurusan berhasil ditambahkan');
        } else {
            $this->set_flash('error', 'Jurusan gagal ditambahkan');
        }
        redirect(base_url('menu/jurusan'));
    }

    function delete_jurusan() {
        $delete = $this->jurusan->delete(['id_jurusan' => $this->uri->segment(3)]);

        if ($delete['success']) {
            $this->set_flash('success', 'Data jurusan berhasil dihapus');
        } else {
            $this->set_flash('error', 'Data jurusan gagal dihapus');
        }
        redirect(base_url('menu/jurusan'));
    }

    function update_jurusan() {
        $data = [
            'id_jurusan' => $this->input->post('id'),
            'nama_jurusan' => $this->input->post('nama')
        ];
        $update = $this->jurusan->update(['id_jurusan' => $this->uri->segment(3)], $data);

        if ($update['success']) {
            $this->set_flash('success', 'Data jurusan berhasil diubah');
        } else {
            $this->set_flash('error', 'Data jurusan gagal diubah');
        }
        redirect(base_url('menu/jurusan'));
    }

    function get_single_jurusan_ajax() {
        $data = [
            'id_jurusan' => $this->uri->segment(3)
        ];
        $get = $this->jurusan->get_where($data);

        header('Content-Type: application/json');
        echo json_encode($get);
    }

    function index_kelas() {
        $page_data = [
            'title' => 'Kelola Kelas',
            'kelas' => 'active',
            'page' => 'admin/kelas',
            'list_jurusan' => $this->jurusan->get()
        ];

        return $this->load->view('layout/dashboard', $page_data);
    }

    function get_kelas() {
        if (is_numeric($this->uri->segment(3))) {
            $cond = [
                'id_kelas' => $this->uri->segment(3)
            ];
        } else {
            $cond = [
                'jurusan' => $this->uri->segment(3)
            ];
        }
        $kelas = $this->kelas->get_by_cond($cond);

        header('Content-Type: application/json');
        echo json_encode($kelas);
    }

    function insert_kelas() {
        $data = [
            'nama_kelas' => $this->input->post('nama'),
            'angkatan' => $this->input->post('angkatan'),
            'jurusan' => $this->input->post('jurusan')
        ];
        $insert = $this->kelas->insert($data);

        header('Content-Type: application/json');
        if ($insert['success']) {
            $result = [
                'success' => 1,
                'msg' => 'Data berhasil ditambahkan'
            ];
        } else {
            $result = [
                'success' => 0,
                'msg' => 'Data gagal ditambahkan'
            ];
        }
        echo json_encode($result);
    }

    function delete_kelas() {
        $cond = ['id_kelas' => $this->uri->segment(3)];
        $delete = $this->kelas->delete($cond);

        header('Content-Type: application/json');
        if ($delete['success']) {
            $result = ['success' => 1, 'msg' => 'Data kelas berhasil dihapus'];
        } else {
            $result = ['success' => 0, 'msg' => 'Data kelas gagal dihapus'];
        }
        echo json_encode($result);
    }

    function update_kelas() {
        $data = [
            'nama_kelas' => $this->input->post('nama'),
            'angkatan' => $this->input->post('angkatan')
        ];
        $update = $this->kelas->update(['id_kelas' => $this->uri->segment(3)], $data);

        if ($update['success']) {
            $this->set_flash('success', 'Data jurusan berhasil diubah');
        } else {
            $this->set_flash('error', 'Data jurusan gagal diubah');
        }
        redirect(base_url('menu/kelas'));
    }

    function index_calon() {
        $page_data = [
            'title' => 'Kelola Calon Ketua',
            'calon' => 'active',
            'page' => 'admin/calon',
            'data' => $this->calon->get(),
            'list_jurusan' => $this->jurusan->get()
        ];

        return $this->load->view('layout/dashboard', $page_data);
    }

    function insert_calon() {
        $upload_config = [
            'upload_path' => './content/uploads/calon/',
            'allowed_types' => 'jpg|png|gif|jpeg',
            'max_size' => 2048,
            'encrypt_name' => TRUE,
            'file_ext_tolower' => TRUE,
        ];
        $this->load->library('upload', $upload_config);

        if ($this->upload->do_upload('foto')) {
            $resize_config = [
                'image_library' => 'gd2',
                'source_image' => $this->upload->data('full_path'),
                'maintain_ratio' => TRUE,
                'width' => 480,
                'height' => 800
            ];
            $this->load->library('image_lib', $resize_config);

            if ($this->image_lib->resize()) {
                $data = [
                    'npm' => $this->input->post('npm'),
                    'nama_calon' => $this->input->post('nama'),
                    'tipe_calon' => $this->input->post('tipe'),
                    'kelas' => $this->input->post('kelas'),
                    'visi' => $this->input->post('visi'),
                    'misi' => $this->input->post('misi'),
                    'keagamaan' => $this->input->post('keagamaan'),
                    'kepemimpinan' => $this->input->post('kepemimpinan'),
                    'foto' => $this->upload->data('file_name'),
                ];
                $insert = $this->calon->insert($data);

                if ($insert) {
                    $this->set_flash('success', 'Data calon ketua berhasil ditambahkan');
                } else {
                    $this->set_flash('error', 'Data calon ketua gagal ditambahkan');
                }
            } else {
                $this->set_flash('error', 'Gagal resize foto calon ketua');
            }
        } else {
            $this->set_flash('error', $this->upload->display_errors());
        }
        
        redirect(base_url('menu/calon'));
    }

    function delete_calon() {
        $cond = ['id_calon' => $this->uri->segment(3)];
        $calon = $this->calon->get_by_cond($cond);
        $foto = $calon[0]['foto'];

        if (unlink('./content/uploads/calon/' . $foto)) {
            $delete = $this->calon->delete($cond);

            if ($delete) {
                $this->set_flash('success', 'Data calon ketua berhasil dihapus');
            } else {
                $this->set_flash('error', 'Gagal menghapus data calon ketua');
            }
        } else {
            $this->set_flash('error', 'Gagal menghapus foto calon ketua');
        }

        redirect(base_url('menu/calon'));
    }

    function get_single_calon_ajax() {
        $cond = ['id_calon' => $this->uri->segment(3)];
        $calon = $this->calon->get_by_cond($cond);
        $cond = ['jurusan' => $this->uri->segment(4)];
        $kelas = $this->kelas->get_by_cond($cond);
        $jurusan = $this->jurusan->get();

        header('Content-Type: application/json');
        echo json_encode([
            'calon' => $calon[0],
            'kelas' => $kelas,
            'jurusan' => $jurusan
        ]);
    }

    function update_calon() {
        $cond = ['id_calon' => $this->uri->segment(3)];
        $data = [
            'npm' => $this->input->post('npm'),
            'nama_calon' => $this->input->post('nama'),
            'tipe_calon' => $this->input->post('tipe'),
            'kelas' => $this->input->post('kelas'),
            'visi' => $this->input->post('visi'),
            'misi' => $this->input->post('misi'),
            'keagamaan' => $this->input->post('keagamaan'),
            'kepemimpinan' => $this->input->post('kepemimpinan')
        ];

        if (!empty($_FILES['foto']['name'])) {
            $calon = $this->calon->get_by_cond($cond);
            $foto = $calon[0]['foto'];

            if (unlink('./content/uploads/calon/' . $foto)) {
                $upload_config = [
                    'upload_path' => './content/uploads/calon/',
                    'allowed_types' => 'jpg|png|gif|jpeg',
                    'max_size' => 2048,
                    'encrypt_name' => TRUE,
                    'file_ext_tolower' => TRUE,
                ];
                $this->load->library('upload', $upload_config);

                if ($this->upload->do_upload('foto')) {
                    $resize_config = [
                        'image_library' => 'gd2',
                        'source_image' => $this->upload->data('full_path'),
                        'maintain_ratio' => TRUE,
                        'width' => 480,
                        'height' => 800
                    ];
                    $this->load->library('image_lib', $resize_config);

                    if ($this->image_lib->resize()) {
                        $data['foto'] = $this->upload->data('file_name');
                        $update = $this->calon->update($cond, $data);

                        if ($update) {
                            $this->set_flash('success', 'Data calon ketua berhasil diubah');
                        } else {
                            $this->set_flash('error', 'Data calon ketua gagal diubah');
                        }
                    } else {
                        $this->set_flash('error', 'Gagal resize foto calon ketua');
                    }
                }
            } else {
                $this->set_flash('error', 'Gagal mengubah foto calon ketua');
            }
        } else {
            $update = $this->calon->update($cond, $data);

            if ($update) {
                $this->set_flash('success', 'Data calon ketua berhasil diubah');
            } else {
                $this->set_flash('error', 'Data calon ketua gagal diubah');
            }
        }

        redirect(base_url('menu/calon'));
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


// Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem veritatis et asperiores molestias quasi voluptates facilis reiciendis quas incidunt animi expedita commodi corrupti repellendus magni deserunt quod quis, illo obcaecati.
<?php
class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $is_login = $this->session->userdata('is_login');
        if (!$is_login) {
            redirect('Auth');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Kategori',
            'meta' => 'kategori',
            'menus' => 'master_data'
        ];
        $this->admin_template->view('backend/category/index', $data);
    }

    public function load()
    {
        $results = $this->db->get('tbl_category')->result_array();
        echo json_encode($results);
    }

    public function tambah()
    {
        $response = [];
        $cekData = $this->db->get_where('tbl_category', ['category' => $this->input->post('category')])->row_array();

        if (!$cekData) {
            $dataInsert = [
                'category' => $this->input->post('category'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->trans_start();
            $this->db->insert('tbl_category', $dataInsert);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal tambah data'];
            } else {
                $response = ['code' => 200, 'status' => true, 'data' => $dataInsert, 'message' => 'Berhasil tambah data'];
            }
        } else {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Data kategori sudah tersedia'];
        }

        echo json_encode($response);
    }

    public function edit()
    {
        $response = [];
        $cekData = $this->db->get_where('tbl_category', ['category' => $this->input->post('category')])->row_array();

        if (!$cekData) {
            $dataUpdated = [
                'category' => $this->input->post('category'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->trans_start();
            $this->db->where('id_category', $this->input->post('id_category'));
            $this->db->update('tbl_category', $dataUpdated);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal edit data'];
            } else {
                $response = ['code' => 200, 'status' => true, 'data' => $dataUpdated, 'message' => 'Berhasil edit data'];
            }
        } else {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Data kategori sudah tersedia'];
        }

        echo json_encode($response);
    }

    public function hapus()
    {
        $response = [];
        $this->db->trans_start();
        $this->db->where('id_category', $this->input->post('id'));
        $this->db->delete('tbl_category');
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal hapus data'];
        } else {
            $response = ['code' => 200, 'status' => true, 'data' => null, 'message' => 'Berhasil hapus data'];
        }
        echo json_encode($response);
    }
}

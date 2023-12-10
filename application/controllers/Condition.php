<?php
class Condition extends CI_Controller
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
            'title' => 'Kondisi',
            'meta' => 'kondisi',
            'menus' => 'master_data'
        ];
        $this->admin_template->view('backend/condition/index', $data);
    }

    public function load()
    {
        $results = $this->db->get('tbl_condition')->result_array();
        echo json_encode($results);
    }

    public function tambah()
    {
        $response = [];
        $cekData = $this->db->get_where('tbl_condition', ['condition' => $this->input->post('condition')])->row_array();

        if (!$cekData) {
            $dataInsert = [
                'condition' => $this->input->post('condition'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->trans_start();
            $this->db->insert('tbl_condition', $dataInsert);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal tambah data'];
            } else {
                $response = ['code' => 200, 'status' => true, 'data' => $dataInsert, 'message' => 'Berhasil tambah data'];
            }
        } else {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Data kondisi sudah tersedia'];
        }

        echo json_encode($response);
    }

    public function edit()
    {
        $response = [];
        $cekData = $this->db->get_where('tbl_condition', ['condition' => $this->input->post('condition')])->row_array();

        if (!$cekData) {
            $dataUpdated = [
                'condition' => $this->input->post('condition'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->trans_start();
            $this->db->where('id_condition', $this->input->post('id_condition'));
            $this->db->update('tbl_condition', $dataUpdated);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal edit data'];
            } else {
                $response = ['code' => 200, 'status' => true, 'data' => $dataUpdated, 'message' => 'Berhasil edit data'];
            }
        } else {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Data kondisi sudah tersedia'];
        }

        echo json_encode($response);
    }

    public function hapus()
    {
        $response = [];
        $this->db->trans_start();
        $this->db->where('id_condition', $this->input->post('id'));
        $this->db->delete('tbl_condition');
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal hapus data'];
        } else {
            $response = ['code' => 200, 'status' => true, 'data' => null, 'message' => 'Berhasil hapus data'];
        }
        echo json_encode($response);
    }
}

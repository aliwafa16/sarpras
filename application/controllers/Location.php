<?php
class Location extends CI_Controller
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
            'title' => 'Lokasi',
            'meta' => 'lokasi',
            'menus' => 'master_data'
        ];
        $this->admin_template->view('backend/location/index', $data);
    }

    public function load()
    {
        $results = $this->db->get('tbl_location')->result_array();
        echo json_encode($results);
    }

    public function tambah()
    {
        $response = [];
        $cekData = $this->db->get_where('tbl_location', ['location' => $this->input->post('location')])->row_array();

        if (!$cekData) {
            $dataInsert = [
                'location' => $this->input->post('location'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->trans_start();
            $this->db->insert('tbl_location', $dataInsert);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal tambah data'];
            } else {
                $response = ['code' => 200, 'status' => true, 'data' => $dataInsert, 'message' => 'Berhasil tambah data'];
            }
        } else {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Data lokasi sudah tersedia'];
        }

        echo json_encode($response);
    }

    public function edit()
    {
        $response = [];
        $cekData = $this->db->get_where('tbl_location', ['location' => $this->input->post('location')])->row_array();

        if (!$cekData) {
            $dataUpdated = [
                'location' => $this->input->post('location'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->trans_start();
            $this->db->where('id_location', $this->input->post('id_location'));
            $this->db->update('tbl_location', $dataUpdated);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal edit data'];
            } else {
                $response = ['code' => 200, 'status' => true, 'data' => $dataUpdated, 'message' => 'Berhasil edit data'];
            }
        } else {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Data lokasi sudah tersedia'];
        }

        echo json_encode($response);
    }

    public function hapus()
    {
        $response = [];
        $this->db->trans_start();
        $this->db->where('id_location', $this->input->post('id'));
        $this->db->delete('tbl_location');
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal hapus data'];
        } else {
            $response = ['code' => 200, 'status' => true, 'data' => null, 'message' => 'Berhasil hapus data'];
        }
        echo json_encode($response);
    }
}

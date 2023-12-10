<?php
class Brand extends CI_Controller
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
        $brand = $this->db->get('tbl_brand')->result_array();

        $this->db->select('tbl_type_brand.*, tbl_brand.brand');
        $this->db->from('tbl_type_brand');
        $this->db->join('tbl_brand', 'tbl_type_brand.brand_id=tbl_brand.id_brand', 'LEFT JOIN');
        $this->db->order_by('tbl_brand.brand');
        $type_brand = $this->db->get()->result_array();
        $data = [
            'title' => 'Merek',
            'meta' => 'merek',
            'menus' => 'master_data',
            'brand' => $brand,
            'type_brand' => $type_brand
        ];
        $this->admin_template->view('backend/brand/index', $data);
    }

    public function load()
    {
        $results = [];
        $this->db->select('tbl_brand.*, tbl_type_brand.type');
        $this->db->from('tbl_brand');
        $this->db->join('tbl_type_brand', 'tbl_brand.id_brand=tbl_type_brand.brand_id');
        $data = $this->db->get()->result_array();


        foreach ($data as $item) {
            $idBrand = $item["id_brand"];
            if (!isset($results[$idBrand])) {
                $results[$idBrand] = [
                    "id_brand" => $idBrand,
                    "brand" => $item["brand"],
                    "created_at" => $item["created_at"],
                    "updated_at" => $item["updated_at"],
                    "type" => [$item["type"]]
                ];
            } else {
                $results[$idBrand]["type"][] = $item["type"];
            }
        }
        $results = array_values($results);

        echo json_encode($results);
    }

    public function tambah()
    {
        $response = [];
        $cekData = $this->db->get_where('tbl_brand', ['brand' => $this->input->post('brand')])->row_array();

        if (!$cekData) {
            $dataInsert = [
                'brand' => $this->input->post('brand'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->trans_start();
            $this->db->insert('tbl_brand', $dataInsert);
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
        $cekData = $this->db->get_where('tbl_brand', ['brand' => $this->input->post('brand')])->row_array();

        if (!$cekData) {
            $dataUpdated = [
                'brand' => $this->input->post('brand'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->trans_start();
            $this->db->where('id_brand', $this->input->post('id_brand'));
            $this->db->update('tbl_brand', $dataUpdated);
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
        $this->db->where('id_brand', $this->input->post('id'));
        $this->db->delete('tbl_brand');
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal hapus data'];
        } else {
            $response = ['code' => 200, 'status' => true, 'data' => null, 'message' => 'Berhasil hapus data'];
        }
        echo json_encode($response);
    }

    public function tambah_tipe()
    {
        $response = [];
        $cekData = $this->db->get_where('tbl_type_brand', ['brand_id' => $this->input->post('brand_id'), 'type' => $this->input->post('type')])->row_array();

        if (!$cekData) {
            $dataInsert = [
                'brand_id' => $this->input->post('brand_id'),
                'type' => $this->input->post('type'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->trans_start();
            $this->db->insert('tbl_type_brand', $dataInsert);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal tambah data'];
            } else {
                $response = ['code' => 200, 'status' => true, 'data' => $dataInsert, 'message' => 'Berhasil tambah data'];
            }
        } else {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Data tipe sudah tersedia'];
        }

        echo json_encode($response);
    }

    public function hapus_tipe()
    {
        if (!empty($this->input->post('id_type_brand'))) {
            $this->db->trans_start();
            $this->db->where_in('id_type_brand', $this->input->post('id_type_brand'));
            $this->db->delete('tbl_type_brand');
            $this->db->trans_complete();
        }

        if ($this->db->trans_status() === FALSE) {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Gagal hapus data'];
        } else {
            $response = ['code' => 200, 'status' => true, 'data' => null, 'message' => 'Berhasil hapus data'];
        }
        echo json_encode($response);
    }
}

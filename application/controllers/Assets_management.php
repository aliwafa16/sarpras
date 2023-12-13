<?php
class Assets_management extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $is_login = $this->session->userdata('is_login');
        if (!$is_login) {
            redirect('Auth');
        }
        $this->load->library('ciqrcode');

    }

    public function index()
    {
        $data = [
            'title' => 'Manajemen Aset',
            'meta' => 'manajemen aset',
            'menus' => 'manajemen_asset',
        ];
        $this->admin_template->view('backend/asset/index', $data);
    }

    public function load()
    {
        $this->db->select('tbl_assets.*,
        tbl_main_category.main_category,
        tbl_main_category.id_main_category, 
        tbl_brand.id_brand, 
        tbl_brand.brand,
        tbl_location.id_location, 
        tbl_location.location,
        tbl_category.id_category, 
        tbl_category.category,
        tbl_status.id_status, 
        tbl_status.status,
        tbl_condition.id_condition, 
        tbl_condition.condition');
        $this->db->from('tbl_assets');
        $this->db->join('tbl_main_category', 'tbl_assets.main_category_id=tbl_main_category.id_main_category');
        $this->db->join('tbl_brand', 'tbl_assets.brand_id=tbl_brand.id_brand');
        $this->db->join('tbl_location', 'tbl_assets.location_id=tbl_location.id_location');
        $this->db->join('tbl_category', 'tbl_assets.category_id=tbl_category.id_category');
        $this->db->join('tbl_status', 'tbl_assets.status_id=tbl_status.id_status');
        $this->db->join('tbl_condition', 'tbl_assets.condition_id=tbl_condition.id_condition');
        $this->db->order_by('tbl_assets.created_at', 'ASC');
        $results = $this->db->get()->result_array();
        echo json_encode($results);
    }

    public function add()
    {

        $code = 'EBS' . date('YmdHis');
        $main_category = $this->db->get('tbl_main_category')->result_array();
        $category = $this->db->get('tbl_category')->result_array();
        $location = $this->db->get('tbl_location')->result_array();
        $condition = $this->db->select('tbl_condition.*')->from('tbl_condition')->order_by('condition', 'ASC')->get()->result_array();
        $brand = $this->db->get('tbl_brand')->result_array();
        // $condition = $this->db->get('tbl_condition')->result_array();

        $status = $this->db->get('tbl_status')->result_array();

        $this->db->select('tbl_type_brand.*, tbl_brand.brand');
        $this->db->from('tbl_type_brand');
        $this->db->join('tbl_brand', 'tbl_type_brand.brand_id=tbl_brand.id_brand', 'INNER');
        $this->db->order_by('tbl_brand.brand');
        $type_brand  = $this->db->get()->result_array();
        

        $data = [
            'title' => 'Manajemen Aset - Tambah',
            'meta' => 'manajemen aset',
            'menus' => 'manajemen_asset',
            'kode_asset' => $code,
            'kategori_utama' => $main_category,
            'kategori' => $category,
            'lokasi' => $location,
            'kondisi' => $condition,
            'merek' => $brand,
            'status' => $status,
            'tipe' => $type_brand
        ];





        $this->admin_template->view('backend/asset/add', $data);
    }

    public function addSubmit()
    {
        $response = [];
        if (!$this->input->post('name_assets')) {
            $response = ['code' => 403, 'status' => false, 'data' => null, 'message' => 'Nama aset tidak boleh kosong !!'];
        } else {

            // Generate QR
            $params['data'] = base_url('SearchAsset') . '/' . $this->input->post('code_assets');
            $params['level'] = 'H';
            $params['size'] = 20;


            $dataTambah = [
                // 'qr_code' =>        $this->ciqrcode->generate($params),

                'code_assets' => $this->input->post('code_assets'),
                'name_assets' => $this->input->post('name_assets'),
                'desc_assets' => $this->input->post('desc_assets'),
                'main_category_id' => $this->input->post('main_category_id'),
                'category_id' => $this->input->post('category_id'),
                'location_id' => $this->input->post('location_id'),
                'brand_id' => $this->input->post('brand_id'),
                'type_brand_id' => $this->input->post('type_brand_id'),
                'condition_id' => $this->input->post('condition_id'),
                'status_id' => $this->input->post('status_id'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')

            ];

            var_dump($dataTambah);
        }

        echo json_encode($response);
    }
}

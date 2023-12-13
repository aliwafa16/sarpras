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
        $data = [
            'title' => 'Manajemen Aset - Tambah',
            'meta' => 'manajemen aset',
            'menus' => 'manajemen_asset',
        ];

        $this->load->library('ciqrcode');

        // header("Content-Type: image/png");
        $params['data'] = '';
        $params['level'] = 'H';
        $params['size'] = 3000;
        $results =  $this->ciqrcode->generate($params);

        $this->admin_template->view('backend/asset/add', $data);
    }
}

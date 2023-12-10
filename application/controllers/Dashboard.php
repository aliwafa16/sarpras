<?php
class Dashboard extends CI_Controller
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
            'title' => 'Dashboard',
            'meta' => 'dashboard',
            'menus' => 'dashboard'
        ];
        $this->admin_template->view('backend/dashboard/index', $data);
    }
}
